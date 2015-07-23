<?php
/**
 * Class OneToManyMetabox
 *
 * Adiciona um metabox e faz uma relação de muitos para o post type em edição
 */
class ManyToManyRelation{
    protected $meta_cfg;

    /**
     * Construtor da classe de metabox.
     *
     * @param array $args
     *
     * $args deve ter os seguintes elementos associados:
     * slug => slug do novo metabox
     * title => título do novo metabox
     * placeholder => descritivo longo
     * post_types => array dos post types suportados pelo metabox
     * meta_name => nome da meta variável associada
     * context => contexto em que o metabox será exibido default 'side'
     * post_type_relacionado => o post type com o qual o metabox fará a relação
     *
     */
    public function __construct($args) {
        $defaults = array(
            'post_type1' => '',
            'post_type2' => '',
            'meta_name1' => '',
            'meta_name2' => '',
            'title1' => 'Title 1',
            'title2' => 'Title 2',
            'placeholder1' => 'Buscar',
            'placeholder2' => 'Buscar',
            'context' => 'side'
        );
        
        $args_parsed = wp_parse_args( $args, $defaults );
        
        $args_parsed['slug'] = $args_parsed['post_type1'] . '-' . $args_parsed['post_type2'] . '-relation';
        
        if(!$args_parsed['meta_name1']){
            $args_parsed['meta_name1'] = $args_parsed['post_type2'] . '_ids';
        }
        
        if(!$args_parsed['meta_name2']){
            $args_parsed['meta_name2'] = $args_parsed['post_type1'] . '_ids';
        }

        $this->meta_cfg = $args_parsed;

        $this->init();
    }

    private function init()
    {
        add_action('add_meta_boxes', array(&$this, 'addMetaBox'));
        add_action('save_post', array(&$this, 'savePost'));
        add_action('admin_enqueue_scripts', function(){
            wp_enqueue_script('jquery-ui-autocomplete');
        });
    }

    public function addMetabox()
    {
        if (!is_array($this->meta_cfg['post_types'])) {
            $this->meta_cfg['post_types'] = array($this->meta_cfg['post_types']);
        }

        add_meta_box(
            $this->meta_cfg['slug'],
            $this->meta_cfg['title1'],
            array(&$this, 'metabox'),
            $this->meta_cfg['post_type1'],
            $this->meta_cfg['context']
        );

        add_meta_box(
            $this->meta_cfg['slug'],
            $this->meta_cfg['title2'],
            array(&$this, 'metabox'),
            $this->meta_cfg['post_type2'],
            $this->meta_cfg['context']
        );
    }

    private function getRelatedPosts()
    {
        global $post;
        
        if ($post->post_type == $this->meta_cfg['post_type1']) {
            $meta_name = $this->meta_cfg['meta_name1'];
            $related_post_type = $this->meta_cfg['post_type2'];
            
        } else if ($post->post_type == $this->meta_cfg['post_type2']) {
            $meta_name = $this->meta_cfg['meta_name2'];
            $related_post_type = $this->meta_cfg['post_type1'];
            
        } else {
            return array();
        }
        
        $metadata = get_post_meta($post->ID, $meta_name);
        if (is_array($metadata) && count($metadata) > 0) {
            $args = array(
                'post_type' => $related_post_type,
                'post__in' => $metadata,
                'orderby' => 'title'
            );

            if(!is_null($this->meta_cfg['post_parent']))
                $args['post_parent'] = $this->meta_cfg['post_parent'];

            $result = get_posts($args);
            return $result;
        } else {
            return array();
        }

    }

    public function metabox()
    {
        global $post;
        
        if ($post->post_type == $this->meta_cfg['post_type1']) {
            $meta_name = $this->meta_cfg['meta_name1'];
            $related_post_type = $this->meta_cfg['post_type2'];
            $post_type = $this->meta_cfg['post_type1'];
            $placeholder = $this->meta_cfg['placeholder1'];
            
        } else if ($post->post_type == $this->meta_cfg['post_type2']) {
            $meta_name = $this->meta_cfg['meta_name2'];
            $related_post_type = $this->meta_cfg['post_type1'];
            $post_type = $this->meta_cfg['post_type2'];
            $placeholder = $this->meta_cfg['placeholder2'];
            
        } else {
            return;
        }

        wp_nonce_field('save_' . $this->meta_cfg['slug'], $this->meta_cfg['slug'] . '_noncename');

        $relatedPosts = $this->getRelatedPosts();
        $uniqueID = uniqid();

        $meta_cfg_to_js = array_merge($this->meta_cfg, array(
            'slug' => $this->meta_cfg['slug'],
            'uniqueID' => $uniqueID,
            'related_post_type' => $related_post_type,
            'meta_name' => $meta_name
        ));

        ?>
        <input id="<?php echo $uniqueID; ?>" placeholder="<?php echo $placeholder; ?>">
        <ul id="selected-items-container-<?php echo $uniqueID; ?>">
            <?php
            foreach ($relatedPosts as $relatedPost) {
                echo '<li><input type="hidden" name="' . $this->meta_cfg['slug'] . '[' . $meta_name . '][]" value="' . $relatedPost->ID . '"/>' . $relatedPost->post_title . ' <a href="#" class="js-remove-selected-item">[x]</a></li>';
            }

            ?>
        </ul>
        <script>
            (function ($) {
                $(function () {
                    var meta_cfg = <?php echo json_encode($meta_cfg_to_js); ?>;
                    var $el = $('#' + meta_cfg.uniqueID);
                    var $selectedItemsContainer = $('#selected-items-container-' + meta_cfg.uniqueID);
                    var alreadySelectedItems = [];

                    function updateAlreadySelectedItems() {
                        alreadySelectedItems = [];
                        $selectedItemsContainer.find('input:hidden').each(function () {
                            alreadySelectedItems.push($(this).val());
                        });
                    }

                    updateAlreadySelectedItems();

                    $selectedItemsContainer.on('click', '.js-remove-selected-item', function () {
                        $(this).parent().remove();
                        updateAlreadySelectedItems();
                        return false;
                    });

                    $el.autocomplete({
                        source: [],
                        search: function () {
                            if (!$el.data('autocomplete-loading')) {
                                $el.data('autocomplete-loading', true);

                                $.getJSON(ajaxurl, {
                                        action: 'search',
                                        post_type: meta_cfg.related_post_type,
                                        fields: 'ID,post_title',
                                        keyword: $el.val()
                                    },
                                    function (result) {
                                        var selectableItems = result.map(function (item) {
                                            return {value: item.ID, label: item.post_title};
                                        }).filter(function (item) {
                                            if (alreadySelectedItems.indexOf(item.value.toString()) === -1) {
                                                return {value: item.ID, label: item.post_title};
                                            }
                                        });

                                        $el.autocomplete('option', 'source', selectableItems);

                                        $el.autocomplete('search', $el.val());

                                        $el.data('autocomplete-loading', false);
                                    }
                                );
                                return false;
                            }
                        },
                        focus: function( event, ui ) {
                            event.preventDefault();
                            $el.val(ui.item.label);
                            return false;
                        },
                        select: function (event, ui) {
                            $selectedItemsContainer.append('<li><input type="hidden" name="' + meta_cfg.slug + '[' + meta_cfg.meta_name + '][]" value="' + ui.item.value + '"/>' + ui.item.label + ' <a href="#" class="js-remove-selected-item">[x]</a></li>');
                            updateAlreadySelectedItems();
                            $el.val('');
                            return false;
                        }
                    });
                });
            })(jQuery);
        </script>
    <?php
    }



    public function savePost($post_id) {
        
        // verify if this is an auto save routine.
        // If it is our form has not been submitted, so we dont want to do anything
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
            return;

        // verify this came from the our screen and with proper authorization,
        // because save_post can be triggered at other times

        $meta_cfg_slug_noncename = filter_input(INPUT_POST, $this->meta_cfg['slug'] . '_noncename');

        if (!wp_verify_nonce($meta_cfg_slug_noncename, 'save_' . $this->meta_cfg['slug']))
            return;

        // Check permissions
        if ('page' == $_POST['post_type']) {
            if (!current_user_can('edit_page', $post_id))
                return;
        } else {
            if (!current_user_can('edit_post', $post_id))
                return;
        }
        
        global $post, $wpdb;
        
        if ($post->post_type == $this->meta_cfg['post_type1']) {
            $meta_name1 = $this->meta_cfg['meta_name1'];
            $meta_name2 = $this->meta_cfg['meta_name2'];
            $post_type = $this->meta_cfg['post_type1'];
            $related_post_type = $this->meta_cfg['post_type2'];
            
            
        } else if ($post->post_type == $this->meta_cfg['post_type2']) {
            $meta_name1 = $this->meta_cfg['meta_name2'];
            $meta_name2 = $this->meta_cfg['meta_name1'];
            $post_type = $this->meta_cfg['post_type2'];
            $related_post_type = $this->meta_cfg['post_type1'];
            
            
        } else {
            return;
        }
        
        // Apaga o meta pra reinserir todos os valores
        delete_post_meta($post_id, $meta_name1);
        $wpdb->query("DELETE FROM $wpdb->post_meta WHERE meta_key = '$meta_name2' AND meta_value = '$post_id'");

        // OK, we're authenticated: we need to find and save the data
        if (isset($_POST[$this->meta_cfg['slug']][$meta_name1])) {
            foreach($_POST[$this->meta_cfg['slug']][$meta_name1] as $post_id_rel) {
                add_post_meta($post_id, $meta_name1, $post_id_rel);
                add_post_meta($post_id_rel, $meta_name2, $post_id);
            }
        }
    }

}
