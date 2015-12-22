<?php

class page_header_text{

    protected static $metabox_config = array(
        'page_header_text',
        'Texto do header da página',
        'page',
        'normal'
    );

    static function init() {
        add_action('add_meta_boxes', array(__CLASS__, 'addMetaBox'));
        add_action('save_post', array(__CLASS__, 'savePost'));
    }

    static function addMetaBox() {
        add_meta_box(
            self::$metabox_config[0],
            self::$metabox_config[1],
            array(__CLASS__, 'metabox'),
            self::$metabox_config[2],
            self::$metabox_config[3]

        );
    }

    static function metabox(){
        global $post;

        wp_nonce_field( 'save_'.__CLASS__, __CLASS__.'_noncename' );

        $metadata = get_metadata('post', $post->ID);
        if(!isset($metadata['header_text'])){
           $link = "";
        }else{
            $link = $metadata['header_text'][0];
        }
        ?>
        <p class="notice notice-warning">Só utizar este campo para as páginas que usem o template "Sobre", "Software" e "Rede".</p>
        <textarea name="<?php echo __CLASS__ ?>[header_text]" style="height: 150px; width: 80%; min-width:300px" ><?php echo  $link; ?></textarea>
        <?php
    }

    static function savePost($post_id) {
        // verify if this is an auto save routine.
        // If it is our form has not been submitted, so we dont want to do anything
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
            return;

        // verify this came from the our screen and with proper authorization,
        // because save_post can be triggered at other times
        if(!isset($_POST[__CLASS__.'_noncename']))
            return;
        if (!wp_verify_nonce($_POST[__CLASS__.'_noncename'], 'save_'.__CLASS__))
            return;


        // Check permissions
        if ('page' == $_POST['post_type']) {
            if (!current_user_can('edit_page', $post_id))
                return;
        }
        else {
            if (!current_user_can('edit_post', $post_id))
                return;
        }

        // OK, we're authenticated: we need to find and save the data
        if(isset($_POST[__CLASS__])){
            foreach($_POST[__CLASS__] as $meta_key => $value)
                update_post_meta($post_id, $meta_key, $value);
        }
    }


}
page_header_text::init();
