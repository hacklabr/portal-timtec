<?php
/**
 * Class MetaboxEspacoRelacionado
 *
 * Classe para criar o metabox de relação entre dois post types
 */
class OneToManyMetabox_related
{
    protected $meta_cfg = array();

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
    public function __construct($args)
    {
        $defaults = array(
            'slug' => 'slug',
            'title' => 'Title',
            'placeholder' => 'Buscar',
            'post_types' => array('post'), // post types
            'meta_name' => 'slug_ids',
            'context' => 'side', // onde colocar o metabox
            'post_type_relacionado' => 'slug_relacionado',
            'post_parent' => 0
        );

        $args_parsed = wp_parse_args( $args, $defaults );

        $this->meta_cfg = $args_parsed;

        $this->init();
    }

    private function init()
    {
        add_action('add_meta_boxes', array(&$this, 'addMetabox'), 10);
        add_action('save_post', array(&$this, 'savePost'));
    }

    public function addMetabox()
    {
        if (!is_array($this->meta_cfg['post_types'])) {
            $this->meta_cfg['post_types'] = array($this->meta_cfg['post_types']);
        }

        foreach ($this->meta_cfg['post_types'] as $post_type) {
            
            add_meta_box(
                $this->meta_cfg['slug'],
                $this->meta_cfg['title'],
                array(&$this, 'hiddenRelatedMetabox'),
                $post_type,
                $this->meta_cfg['context']
            );
        }
    }

    public function hiddenRelatedMetabox() {
        global $post;

        wp_nonce_field('save_' . $this->meta_cfg['slug'], $this->meta_cfg['slug'] . '_noncename');

        $thisData = get_post_meta($post->ID, $this->meta_cfg['meta_name']);
        $relatedData = get_post_meta($post->ID, $this->meta_cfg['related_meta_name'], true);
        $uniqueID = uniqid();
        //var_dump($relatedData, $thisData);
        $meta_cfg_to_js = array_merge($this->meta_cfg, array(
            'slug' => $this->meta_cfg['slug'],
            'uniqueID' => $uniqueID,
            'relatedMetaValue' => $relatedData
        ));

        ?>
        <div class="js-hidden-container related">
            <?php
            foreach ($thisData as $d) {
                $content = '';
                if(key_exists('id', $d) && $d['id']){
                    $content .= '<span><input type="hidden" name="' . $this->meta_cfg['slug'] . '[' . $this->meta_cfg['meta_name'] . '][id][]" value="' . $d['id'] . '"/>';
                    $content .= '<a href="#" class="js-remove-selected-item">[x]</a></span>';
                }
            }
            ?>
            <input id="<?php echo $uniqueID; ?>" name="<?php echo $this->meta_cfg['slug'] . '[' . $this->meta_cfg['meta_name'] . '][name][]';?>" value="<?php echo $d['name']; ?>" placeholder="<?php echo $this->meta_cfg['placeholder']; ?>">
            <span class="js-error error">Forneça o nome do Espaço</span>
            <span id="selected-items-container-<?php echo $uniqueID; ?>">
                <?php echo $content; ?>
            </span>
        </div>
        <style>
            /*This metabox is hidden */
            #<?php echo $this->meta_cfg['slug']; ?>{display:none;}
            .js-hidden-container{display:none}
            .related{margin:3px 0;}
            .error{display:none; color:red}
        </style>
        <script>
            (function($) {
                $(function() {

                    var meta_cfg = <?php echo json_encode($meta_cfg_to_js); ?>;
                    var $el = $('#' + meta_cfg.uniqueID);
                    var $selectedItemsContainer = $('#selected-items-container-' + meta_cfg.uniqueID);
                    var alreadySelectedItems = [];

                    var appendOptionTemplate = '<option value="-1">Outros</option>';

                    //bind the relation between the two metadata
                    $relatedMetaboxContainer = $('#' + meta_cfg.related_metabox);
                    $relatedSelect = $relatedMetaboxContainer.find('select');
                    $relatedSelect.append(appendOptionTemplate);

                    $inside = $relatedMetaboxContainer.find('.inside');
                    $relatedSelect.on('change', function() {
                        if ($(this).val() == -1) {
                            if (!$inside.find('.js-hidden-container').length){
                                $inside.append($('#' + meta_cfg.slug).find('.js-hidden-container'));
                            }
                            if($selectedItemsContainer.find('input:hidden').val()){
                                $el.attr('readonly', true);
                            }
                            $el.focus();
                            $inside.find('.js-hidden-container').show('fast');
                        } else {
                            $inside.find('.js-hidden-container').hide('fast');
                        }
                        $el.focus();
                    });

                    //Update from DB
                    if(meta_cfg.relatedMetaValue == '-1'){
                        $relatedSelect.val('-1');
                        $relatedSelect.trigger('change');
                    }

                    //form submit check
                    $el.parents('form').on('submit', function (){
                        if($relatedSelect.val() == -1 && !$el.val().trim().length) {
                            $('.js-error').show('fast');
                            $el.on('keydown', function(){
                                $('.js-error:visible').hide('fast');
                            });
                            $el.focus();
                            return false;
                        }
                    });

                    //no using, but if multiple items
                    function updateAlreadySelectedItems() {
                        alreadySelectedItems = [];
                        $selectedItemsContainer.find('input:hidden').each(function() {
                            alreadySelectedItems.push($(this).val());
                        });
                    }
                    updateAlreadySelectedItems();

                    //remove button
                    $selectedItemsContainer.on('click', '.js-remove-selected-item', function() {
                        $el.val('').attr('readonly', false).focus();
                        $(this).parent().remove();
                        updateAlreadySelectedItems();
                        return false;
                    });

                    //the autocomplete
                    $el.autocomplete({
                        source: [],
                        search: function() {
                            if (!$el.data('autocomplete-loading')) {
                                $el.data('autocomplete-loading', true);

                                $.getJSON(ajaxurl, {
                                    action: 'search',
                                    post_type: meta_cfg.post_type_relacionado,
                                    fields: 'ID,post_title',
                                    keyword: $el.val()
                                },
                                function(result) {
                                    var selectableItems = result.map(function(item) {
                                        return {value: item.ID, label: item.post_title};
                                    }).filter(function(item) {
                                        if (alreadySelectedItems.indexOf(item.value.toString()) === -1) {
                                            return {value: item.ID, label: item.post_title};
                                        }
                                    });

                                    $el.autocomplete('option', 'source', selectableItems);
                                    $el.autocomplete('search', $el.val());
                                    $el.data('autocomplete-loading', false);
                                });
                                return false;
                            }
                        },
                        focus: function( event, ui ) {
                            event.preventDefault();
                            $el.val(ui.item.label);
                            return false;
                        },
                        select: function(event, ui) {
                            $selectedItemsContainer.append('\n\
                                <span><input type="hidden" name="' + meta_cfg.slug + '[' + meta_cfg.meta_name + '][id][]" value="' + ui.item.value + '"/>\n\
                                <a href="#" class="js-remove-selected-item">[x]</a></span>');
                            updateAlreadySelectedItems();
                            $el.val(ui.item.label);
                            $el.attr('readonly', true);
                            return false;
                        }
                    });
                });
            })(jQuery);
        </script>
        <?php
    }

    public function savePost($post_id)
    {


//        die();
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


        var_dump($_POST[$this->meta_cfg['slug']][$this->meta_cfg['meta_name']]);
        var_dump($_POST[$this->meta_cfg['related_meta_name']]);

        // Apaga o meta pra reinserir todos os valores
        delete_post_meta($post_id, $this->meta_cfg['meta_name']);

        // Se o dado do metadado relacionado não for -1, só deleta este e retorna
        if($_POST[$this->meta_cfg['related_meta_name']] != -1){
            return;
        }

        // OK, we're authenticated: we need to find and save the data
        if (isset($_POST[$this->meta_cfg['slug']][$this->meta_cfg['meta_name']])) {
            $postData = $_POST[$this->meta_cfg['slug']][$this->meta_cfg['meta_name']];
            foreach($postData['name'] as $k=>$name) {
                $metaData = array('name' => $name);
                if(key_exists('id', $postData)){
                    $metaData['id'] = $postData['id'][$k];
                }
                //$arr = array($post_id_rel['id'],$post_id_rel['name']);
                var_dump($metaData);
                add_post_meta($post_id, $this->meta_cfg['meta_name'], $metaData);
            }
        }
    }

}
