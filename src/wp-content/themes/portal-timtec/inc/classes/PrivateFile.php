<?php

class PrivateFile {

    static protected $_instances = array();
    static $_initRewriteRules = false;
    private $_config;
    private $_error = '';
    private $_privateFolder = '';

    public function __construct($args) {
        $this->_privateFolder = defined('PRIVATE_FILES_PATH') ?
                defined('PRIVATE_FILES_PATH') :
                dirname($_SERVER['DOCUMENT_ROOT']) . '/private-files/';

        $defaults = array(
            'slug' => '',
            'input_name' => '',
            'post_type' => '',
            'meta_name' => '',
            'title' => 'Title 1',
            'description' => '',
            'validation' => '.*',
            'validation_error' => __('Invalid file type', SLUG),
            'access_control' => function () {
                return is_user_logged_in();
            },
            'context' => 'side',
            'download_url' => ''
        );

        $args_parsed = wp_parse_args($args, $defaults);

        if (!$args_parsed['slug']) {
            $args_parsed['slug'] = 'private-file-' . $meta_name;
        }

        if (!$args_parsed['input_name']) {
            $args_parsed['input_name'] = 'file_' . $args_parsed['slug'];
        }

        $this->_config = $args_parsed;

        if (isset($_SESSION[$this->_config['slug'] . ':ERROR'])) {
            $this->_error = $_SESSION[$this->_config['slug'] . ':ERROR'];
            unset($_SESSION[$this->_config['slug'] . ':ERROR']);
        }

        $this->_init();

        self::$_instances[$this->_config['post_type'] . ':' . $this->_config['meta_name']] = $this;
    }

    static function instance($post_type, $meta_name) {
        if (isset(self::$_instances["$post_type:$meta_name"])) {
            return self::$_instances["$post_type:$meta_name"];
        } else {
            return null;
        }
    }

    private function _init() {
        add_action('add_meta_boxes', array(&$this, 'addMetaBox'));
        add_action('save_post', array(&$this, 'savePost'));

        if (!self::$_initRewriteRules) {
            self::$_initRewriteRules = true;

            add_filter('query_vars', function($public_query_vars) {
                $public_query_vars[] = "private_file_post_type";
                $public_query_vars[] = "private_file_post_id";
                $public_query_vars[] = "private_file_meta_name";

                return $public_query_vars;
            });

            add_filter('generate_rewrite_rules', function($wp_rewrite) {
                $new_rules = array(
                    "download/([^\/]+)/([^\/]+)/([0-9]+)/?$" => "index.php?private_file_post_type=" . $wp_rewrite->preg_index(1) . "&private_file_meta_name=" . $wp_rewrite->preg_index(2) . "&private_file_post_id=" . $wp_rewrite->preg_index(3)
                );
                $wp_rewrite->rules = $new_rules + $wp_rewrite->rules;

                return $wp_rewrite;
            }, 10, 1);
        }

        add_action('template_redirect', array(&$this, 'downloadFile'));
    }

    function downloadFile() {
        global $wp_query;
        if ($wp_query->get('private_file_post_type') && $wp_query->get('private_file_meta_name') && $wp_query->get('private_file_post_id')) {
            $post_type = $wp_query->get('private_file_post_type');
            $post_id = $wp_query->get('private_file_post_id');
            $meta_name = $wp_query->get('private_file_meta_name');

            if ($post_type == $this->_config['post_type'] && $meta_name == $this->_config['meta_name']) {
                $access_function = $this->_config['access_control'];
                if (!$access_function()) {
                    header_remove();
                    http_response_code(403);
                    die('403');
                }

                $filename = $this->getFilePath($post_id);

                if (!$filename || !file_exists($filename)) {
                    header_remove();
                    http_response_code(404);
                    die('404');
                }

                $finfo = finfo_open(FILEINFO_MIME_TYPE);
                $mime_type = finfo_file($finfo, $filename);

                header('Content-type: ' . $mime_type);

                header('Content-Disposition: attachment; filename="' . basename($filename) . '"');

                readfile($filename);
                
                do_action('download_private_file', array('post_type' => $post_type, 'meta_name' => $meta_name, 'post_id' => $post_id));

                die;
            }
        }
    }

    private function _getRelativePath($post_id) {
        return "{$this->_config['post_type']}/{$post_id}/{$this->_config['meta_name']}/";
    }

    public function getFilePath($post_id) {
        $filename = get_post_meta($post_id, $this->_config['meta_name'], true);
        if ($filename) {
            return $this->_privateFolder . $this->_getRelativePath($post_id) . $filename;
        } else {
            return null;
        }
    }

    public function getFileUrl($post_id = null) {
        return get_bloginfo('url') . "{$this->_config['post_type']}/{$post_id}/{$this->_config['meta_name']}/";
    }

    public function addMetaBox() {
        add_meta_box(
                $this->_config['slug'], $this->_config['title'], array(&$this, 'metabox'), $this->_config['post_type'], $this->_config['context']
        );
    }

    public function metabox() {
        global $post;
        wp_nonce_field('save_' . $this->_config['slug'], $this->_config['slug'] . '_noncename');
        ?> 
        <script type="text/javascript">
            (function ($) {
                $("#post").attr('enctype', 'multipart/form-data');
            })(jQuery);
        </script>
        <?php if ($this->_error): ?>
            ERROR: <?php echo $this->_error ?>
        <?php endif; ?>
        <p><?php echo $this->_config['description'] ?></p>
        <input type="file" name="<?php echo $this->_config['input_name'] ?>" /><br>
        <?php if ($url = $this->getFileUrl($post->ID)): ?>
            <h4><?php _e('attached file:', SLUG) ?></h4>
            <a href="<?php echo $url ?>"><?php echo get_post_meta($post->ID, $this->_config['meta_name'], true) ?></a>
            <label>
                <input type="checkbox" name="<?php echo $this->_config['input_name'] ?>_delete"/>
                <?php _e('remove', SLUG); ?>
            </label>
        <?php endif; ?>
        <?php
    }

    public function savePost($post_id) {
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

        if (isset($_FILES[$this->_config['input_name']])) {
            $f = $_FILES[$this->_config['input_name']];
            $path = $this->_privateFolder . $this->_getRelativePath($post_id);

            if (preg_match('#' . $this->_config['validation'] . '#', $f['type'])) {
                if (!is_dir($path)) {
                    mkdir($path, 0777, true);
                }

                if ($file = $this->getFilePath($post_id)) {
                    unlink($file);
                    delete_post_meta($post_id, $this->_config['meta_name']);
                }

                move_uploaded_file($f['tmp_name'], $path . $f['name']);

                add_post_meta($post_id, $this->_config['meta_name'], $f['name']);
            } else {
                $_SESSION[$this->_config['slug'] . ':ERROR'] = 'O arquivo é inválido';
            }
        }
    }

}
