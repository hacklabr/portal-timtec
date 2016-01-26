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

                    <section class="widget nav_menu-6 widget_nav_menu ">
                        <a href="/pt/lista-de-noticias/"><h3>Notícias</h3></a>
                        <?php /* $q_atuais = new WP_Query(['posts_per_page' => 3]); ?>
                        <div class="menu-noticias-container">
                            <ul id="menu-noticias" class="menu">
                                <?php while($q_atuais->have_posts()): $q_atuais->the_post(); ?>
                                <li class="menu-item menu-item-type-custom menu-item-object-custom"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></li>
                                <?php endwhile; ?>
                                
                            </ul>
                        </div> */ ?>
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
                </div>
            </div>
        </div>
    </div>

</footer>
