<?php

add_action('admin_menu', function(){
    DestaquesNoticias::register();
});

class DestaquesNoticias{
    const option_name = 'destaques-noticias';
    
    static protected $idsCache = [];

    static function register(){
        add_submenu_page( 'edit.php', 'Destaques', 'Destaques', 'manage_options', 'noticias-destaques', [__CLASS__, 'renderPage'] );
    }

    static function renderPage() {
        if(isset($_POST['destaques'])){
            if(!get_option(self::option_name)){
                add_option(self::option_name, $_POST['destaques'],'','no');
            } else {
                update_option(self::option_name, $_POST['destaques']);
            }
        }

        $destaques = get_option(self::option_name, ['header' => '', 'principal' => '']);//, 'geral' => ''
        ?>
        <style>
            .destaques{
                margin-bottom:20px;
            }
            
            .destaques label {
                font-weight: bold;
                font-size: 18px;
                display:block;
            }

            .destaques textarea {
                width: 80%;
                min-height: 110px;
            }
        </style>
        <div class="wrap"><div id="icon-tools" class="icon32"></div>
            <h2>Destaques da página de notícia</h2>
            <form method="POST">
                <p class="destaques">
                    <label for="destaques-header">Texto de destaque do header</label>
                    <textarea id="destaques-header" name="destaques[header]"><?php echo $destaques['header'] ?></textarea>
                </p>

                <p class="destaques">
                    <label for="destaques-principal">Destaques principais</label>
                    <descripiton>Cole aqui os links de destaques principais( no máximo )</descripiton><br />
                    <textarea id="destaques-principal" name="destaques[principal]"><?php echo $destaques['principal'] ?></textarea>
                </p>

                <!-- 
                <p class="destaques">
                    <label for="destaques-geral">Notícias geral</label>
                    <textarea id="destaques-geral" name="destaques[geral]">< ?php echo $destaques['geral'] ?></textarea>
                </p>
                -->
                <input type="submit" class="button button-primary button-large" value="salvar"/>
            </form>
        </div>
        <?php
    }

    protected static function _getPostIdsByConfig($type) {

        if(isset(self::$idsCache[$type])){
            return self::$idsCache[$type];
        }

        $option = get_option(self::option_name);

        if (!isset($option[$type]) || !$option[$type]) {
            return array();
        }

        $post_ids = array();

        foreach (explode("\n", $option[$type]) as $url){
            $url = trim($url);
            $post_id = url_to_postid($url);
            if($post_id){
                $post_ids[] = $post_id;
            }
        }

        self::$idsCache[$type] = $post_ids;

        return $post_ids;
    }

    protected static function _getArgsByConfig($type){
        $post_ids = self::_getPostIdsByConfig($type);
        $args = null;
        if($post_ids){
            $args = array(
                'ignore_sticky_posts' => true,
                'post__in' => $post_ids,
                'posts_per_page' => -1,
                'order' => 'ASC',
                'orderby' => 'post__in'
            );
        }

        return $args;
    }


    protected static function _getPostsByConfig($type) {
        $args = self::_getArgsByConfig($type);

        if($args){
            return get_posts($args);
        }else{
            return array();
        }
    }

    protected static function _getQueryByConfig($type) {
        $args = self::_getArgsByConfig($type);

        if($args){
            return new WP_Query($args);
        }else{
            return null;
        }
    }
    
    static function getPosts($type) {
        return self::_getPostsByConfig($type);
    }

    static function getQuery($type) {
        return self::_getQueryByConfig($type);
    }


}