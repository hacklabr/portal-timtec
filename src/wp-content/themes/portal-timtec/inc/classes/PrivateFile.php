<?php

class PrivateFile {

    private $_config;
    
    private $_error = '';

    public function __construct($args) {
        
        $defaults = array(
            'slug' => '',
            'input_name' => '',
            'post_type' => '',
            'meta_name' => '',
            'title' => 'Title 1',
            'description' => '',
            'validation' => '.*',
            'access_control' => function () {
                return is_user_logged_in();
            },
            'context' => 'side'
        );

        $args_parsed = wp_parse_args($args, $defaults);
        
        if(!$args_parsed['slug']) {
            $args_parsed['slug'] = 'private-file-' . $meta_name;
        }
        
        if(!$args_parsed['input_name']) {
            $args_parsed['input_name'] = 'file_' . $args_parsed['slug'];
        }

        $this->_config = $args_parsed;

        if(isset($_SESSION[$this->_config['slug'] . ':ERROR'])){
            $this->_error = $_SESSION[$this->_config['slug'] . ':ERROR'];
            unset($_SESSION[$this->_config['slug'] . ':ERROR']);
        }
        
        $this->_init();
    }

    private function _init() {
        add_action('add_meta_boxes', array(&$this, 'addMetaBox'));
        add_action('save_post', array(&$this, 'savePost'));
    }
    
    public function addMetaBox() {
        add_meta_box(
            $this->_config['slug'],
            $this->_config['title'],
            array(&$this, 'metabox'),
            $this->_config['post_type'],
            $this->_config['context']
        );
    }
    
    public function metabox(){
        wp_nonce_field('save_' . $this->_config['slug'], $this->_config['slug'] . '_noncename');
        ?> 
        <script type="text/javascript">
            (function($){
                $("#post").attr('enctype', 'multipart/form-data');
            })(jQuery);
        </script>
        <?php if($this->_error): ?>
            ERROR: <?php echo $this->_error ?>
        <?php endif; ?>
        <p><?php echo $this->_config['description'] ?></p>
        <input type="file" name="<?php echo $this->_config['input_name'] ?>" />
        <?php 
    }
    
    public function savePost(){
        // verify if this is an auto save routine.
        // If it is our form has not been submitted, so we dont want to do anything
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
            return;

        // verify this came from the our screen and with proper authorization,
        // because save_post can be triggered at other times

        $meta_cfg_slug_noncename = filter_input(INPUT_POST, $this->_config['slug'] . '_noncename');

        if (!wp_verify_nonce($meta_cfg_slug_noncename, 'save_' . $this->_config['slug']))
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
        
        $_SESSION[$this->_config['slug'] . ':ERROR'] = 'O arquivo é inválido';
    }

}
