<?php

class redes_sociais {
    const NAME = "Redes Sociais";

    protected static $nameClass;
    protected static $nameGroup;
    protected static $options;

    static function init() {
        self::$nameClass = strtolower(__CLASS__);
        self::$nameGroup = strtolower(__CLASS__) . 'group';

        add_action( 'admin_init', array( __CLASS__, 'optionsInit' ) );
        add_action( 'admin_menu', array( __CLASS__, 'menu' ) );
    }

    static function optionsInit() {
        register_setting( self::$nameGroup, self::$nameClass, array( __CLASS__, 'optionsValidation') );
    }

    static function menu() {
        add_menu_page (
            self::NAME,
            self::NAME,
            'manage_options',
            self::$nameClass,
            array( __CLASS__, 'callbackPage' )
        );
    }

    static function optionsValidation($input) {
        return $input;
    }

    static function callbackPage() {
?>
        <form action="options.php" method="post">

            <?php
                settings_fields( self::$nameGroup );
                self::$options = get_option( self::$nameClass );
            ?>
            <h2><div class="dashicons dashicons-text"></div> <?php echo get_admin_page_title();?></h2>

            <label for="titulo">Título</label>
            <input type="text" id="titulo" class="text" name="<?php echo self::$nameClass . '[welcome_title]'; ?>" value="<?php echo htmlspecialchars(self::$options['welcome_title']); ?>" />

            <?php submit_button(); ?>

        </form>
<?php
    }

}
redes_sociais::init();
?>
