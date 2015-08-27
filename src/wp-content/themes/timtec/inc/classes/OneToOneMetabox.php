<?php

/**
 * Class MetaboxEspacoRelacionado
 *
 * Classe para criar o metabox de relação entre dois post types
 */
class OneToOneMetabox
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
                array(&$this, 'metabox'),
                $post_type,
                $this->meta_cfg['context']
            );
        }
    }

    public function metabox()
    {
        global $post;
        // Post type do relacionamento
        $post_type_relacionado = $this->meta_cfg['post_type_relacionado'];
        $meta_name = $this->meta_cfg['meta_name'];

        // Use nonce for verification
        wp_nonce_field("save_metabox_post_relacionado_" . $this->meta_cfg['slug'], "metabox_post_relacionado_noncename_" . $this->meta_cfg['slug']);

        $__post_id = get_post_meta($post->ID, $meta_name, true);
        
        if(!is_null($this->meta_cfg['post_parent']))
            $__posts = get_posts("numberposts=-1&orderby=title&order=ASC&post_type={$post_type_relacionado}&post_parent=".$this->meta_cfg['post_parent']);
        else
            $__posts = get_posts("numberposts=-1&orderby=title&order=ASC&post_type={$post_type_relacionado}");

        ?>
        <label> selecione o <?php echo $post_type_relacionado; ?> :
            <select name="<?php echo $meta_name ?>">
                <option value=""></option>
                <?php foreach ($__posts as $__post): ?>
                    <option
                        value="<?php echo $__post->ID; ?>" <?php if ($__post->ID == $__post_id) echo 'selected="selected"' ?>><?php echo $__post->post_title; ?></option>
                <?php endforeach; ?>
            </select>
        </label>
    <?php
    }

    public function savePost($post_id)
    {

        $meta_name = $this->meta_cfg['meta_name'];

        // verify if this is an auto save routine.
        // If it is our form has not been submitted, so we dont want to do anything
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
            return;

        // verify this came from the our screen and with proper authorization,
        // because save_post can be triggered at other times


        $metabox_post_relacionado_noncename = filter_input(INPUT_POST, 'metabox_post_relacionado_noncename_' . $this->meta_cfg['slug']);

        if (!wp_verify_nonce($metabox_post_relacionado_noncename, 'save_metabox_post_relacionado_' . $this->meta_cfg['slug']))
            return;

        // Check permissions
        if (!in_array($_POST['post_type'], $this->meta_cfg['post_types'])) {
            return;
        }


        if (!current_user_can('edit_post', $post_id))
            return;


        // OK, we're authenticated: we need to find and save the data


        update_post_meta($post_id, $meta_name, trim($_POST[$meta_name]));
    }

}
