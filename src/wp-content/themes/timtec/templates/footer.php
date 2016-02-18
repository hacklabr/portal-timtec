<?php global $_MENUS; ?>
<footer class="content-info hidden-xs" role="contentinfo">
    <div id="footer-info">
        <div class="container">
            <div class="row">
                <div class="content-footer col-md-9 col-sm-12">

                    <section class="widget nav_menu-2 widget_nav_menu ">
                        <h3>Sobre</h3>
                        <div class="menu-sobre-container">
                            <?php
                            wp_nav_menu(array(
                                'items_wrap' => '<ul id="%1$s" class="sub-menu">%3$s</ul>',
                                'theme_location'    => 'sobre-footer',
                            ));
                            ?>
                        </div>
                    </section>

                    <section class="widget nav_menu-3 widget_nav_menu ">
                        <h3>Software</h3>
                        <div class="menu-software-container">
                            <?php
                            wp_nav_menu(array(
                                'items_wrap' => '<ul id="%1$s" class="sub-menu">%3$s</ul>',
                                'theme_location'    => 'software-footer',
                            ));
                            ?>
                        </div>
                    </section>

                    <section class="widget nav_menu-4 widget_nav_menu ">
                        <h3>Cursos</h3>
                        <div class="menu-cursos-container">
                            <?php
                            wp_nav_menu(array(
                                'items_wrap' => '<ul id="%1$s" class="sub-menu">%3$s</ul>',
                                'theme_location'    => 'cursos-footer',
                            ));
                            ?>
                        </div>
                    </section>

                    <section class="widget nav_menu-5 widget_nav_menu ">
                        <h3>Rede</h3>
                        <div class="menu-rede-container">
                            <?php
                            wp_nav_menu(array(
                                'items_wrap' => '<ul id="%1$s" class="sub-menu">%3$s</ul>',
                                'theme_location'    => 'rede-footer',
                            ));
                            ?>
                        </div>
                    </section>
                </div>
                <div class="social col-md-3 col-sm-12">
                    <h4>Acompanhe nossas redes</h4>
                    <ul>
                        <?php
                        $loop_redessociais = new WP_Query(
                            array(
                                'post_type' => 'rede_social',
                                'posts_per_page' => -1,
                            )
                        );

                        while ($loop_redessociais->have_posts())
                            :$loop_redessociais->the_post();

                            $link_rede_social = get_post_meta($post->ID, 'rede_social_link', true);
                            $icon_rede_social = get_post_meta($post->ID, 'icone_awesome', true);
                            ?>
                            <li class="<?php the_title(); ?>"><a href="<?php echo $link_rede_social ?>" target="_blank"><i class="fa <?php echo $icon_rede_social ?>"></i></a></li>
                            <?php
                        endwhile;
                        ?>
                    </ul>
                    <p>Powered by Instituto TIM.</p>
                </div>
            </div>
            <div class="row creative-commons">
                <div class="container">
                    <div class="pull-left"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/cc-banner.png" alt="Licença Creative Commons Atribuição 4.0 Internacional"></div>
                    <div class="col-sm-10 col-md-8 col-lg-8">
                        <?php 
                            
                            $current_lang = pll_current_language();

                            if( $current_lang == "pt"){
                              dynamic_sidebar('creative-commons-pt');
                            }

                            if( $current_lang == "en"){
                              dynamic_sidebar('creative-commons-en');
                            }

                            if( $current_lang == "es"){
                              dynamic_sidebar('creative-commons-es');
                            }
                         ?>  
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
