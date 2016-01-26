<?php


class ShortcodeDestaque{

    static $count_item_destaque;

    static function destaque ($atts, $content) {
        ob_start();

        $title = isset($atts['titulo']) ? $atts['titulo'] : false;
    ?>
            <section class="page-featured">
                <?php if($title): ?>
                    <h2 class="title"><?php echo $title ?></h2>
                <?php endif; ?>
                    
                <div class="featured-line">
                    <div class="container">
                        <?php echo $content; ?>
                    </div>
                </div>
            </section>
        <?php

        $html = ob_get_clean();

        $html = preg_replace('#(<p> *\[destaque-item)#', '[destaque-item', $html);
        $html = preg_replace('#(\[/destaque-item\] *</p>)#', '[/destaque-item]', $html);

        //Verificar quantidade de 'destaque_item' de um 'destaque';
        self::$count_item_destaque = substr_count( $content, '[destaque-item' );

        return do_shortcode($html);
    }

    static function destaque_item ($atts, $content) {
        ob_start();
        

        $num = isset($atts['num']) && $atts['num'] > 0 && $atts['num'] < 4 ? $atts['num'] : false;
        $title = isset($atts['titulo']) ? $atts['titulo'] : false;
        $content = preg_replace('#^ *( *<br>| *<br />)*#', '', $content);

    ?>

        <div class="featured-box-<?php echo self::$count_item_destaque ?>">

            <?php if($num): ?>
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icones-<?php echo $num; ?>.png" alt="1">
            <?php endif; ?>
            <?php if($title): ?>
                <h3 class="subtitle"><?php echo $title ?></h3>
            <?php endif; ?>
            <p><?php echo $content ?></p>
        </div>
        <?php

        $html = ob_get_clean();

        return $html;
    }

    

    static function init(){
       add_shortcode('destaque-item', ['ShortcodeDestaque','destaque_item']); 
       add_shortcode('destaque', ['ShortcodeDestaque','destaque']);
    }

}

add_action('init', ['ShortcodeDestaque','init']);

