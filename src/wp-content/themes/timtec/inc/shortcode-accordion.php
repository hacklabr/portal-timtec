<?php
 

class ShortcodeAccordion{

    static $id_cont_acordion_item  = 1;

    static function accordion ($atts, $content) {
        ob_start();
        
        $title = isset($atts['titulo']) ? $atts['titulo'] : false;
        ?>
            <section class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
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

        $html = preg_replace('#(<p> *\[item)#', '[item', $html);
        $html = preg_replace('#(\[/item\] *</p>)#', '[/item]', $html);

        return do_shortcode($html);
    }

    static function item ($atts, $content) {
        ob_start();
        
        $title = isset($atts['title']) ? $atts['title'] : false;
        $content = preg_replace('#^ *( *<br>| *<br />)*#', '', $content);

        //id de cada item para o accordion
        self::$id_cont_acordion_item++;

        ?>

        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="heading<?php echo self::$id_cont_acordion_item; ?>">
                <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo self::$id_cont_acordion_item; ?>" aria-expanded="true" aria-controls="collapse<?php echo self::$id_cont_acordion_item; ?>">
                    <span class="text"><?php echo $title ?></span>
                    <span class="icon"></span>
                    </a>
                </h4>
            </div>
            <div id="collapse<?php echo self::$id_cont_acordion_item; ?>" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading<?php echo self::$id_cont_acordion_item; ?>">
                <div class="panel-body">
                    <?php echo $content; ?>
                </div>
            </div>
        </div>

        <?php
        

        $html = ob_get_clean();

        return $html;
    }

    static function init(){
        add_shortcode('accordion', ['ShortcodeAccordion','accordion']);
        add_shortcode('item', ['ShortcodeAccordion','item']);
    }
    
}

add_action('init', ['ShortcodeAccordion','init']);


