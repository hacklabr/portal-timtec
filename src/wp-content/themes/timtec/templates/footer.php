<?php global $_MENUS; ?>
<footer class="content-info hidden-xs" role="contentinfo">
    <div id="footer-info">
        <div class="container">
            <div class="row">
                <div class="content-footer col-md-9 col-sm-12">
                    
                    <section class="widget nav_menu-2 widget_nav_menu ">
                        <h3>Sobre</h3>
                        <div class="menu-sobre-container">
                            <ul class="menu">
                                <?php foreach($_MENUS['sobre'] as $label => $url): ?>
                                <li class="menu-item menu-item-type-post_type menu-item-object-page"><a href="<?php echo $url ?>"><?php echo $label ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </section>
                    
                    <section class="widget nav_menu-3 widget_nav_menu ">
                        <h3>Software</h3>
                        <div class="menu-software-container">
                            <ul class="menu">
                                <?php foreach($_MENUS['software'] as $label => $url): ?>
                                <li class="menu-item menu-item-type-post_type menu-item-object-page"><a href="<?php echo $url ?>"><?php echo $label ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </section>
                    
                    <section class="widget nav_menu-4 widget_nav_menu ">
                        <h3>Cursos</h3>
                        <div class="menu-cursos-container">
                            <ul class="menu">
                                <?php foreach($_MENUS['cursos'] as $label => $url): ?>
                                <li class="menu-item menu-item-type-post_type menu-item-object-page"><a href="<?php echo $url ?>"><?php echo $label ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </section>
                    
                    <section class="widget nav_menu-5 widget_nav_menu ">
                        <h3>Rede</h3>
                        <div class="menu-rede-container">
                            <ul class="menu">
                                <?php foreach($_MENUS['rede'] as $label => $url): ?>
                                <li class="menu-item menu-item-type-post_type menu-item-object-page"><a href="<?php echo $url ?>"><?php echo $label ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </section>
                    
                    <section class="widget nav_menu-6 widget_nav_menu ">
                        <h3>Notícias</h3>
                        <div class="menu-noticias-container">
                            <ul id="menu-noticias" class="menu">
                                <li id="menu-item-91" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-91"><a href="#">Notícia 1</a></li>
                                <li id="menu-item-92" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-92"><a href="#">Notícia 2</a></li>
                                <li id="menu-item-93" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-93"><a href="#">Notícia 3</a></li>
                            </ul>
                        </div>
                    </section>                
                </div>
                <div class="social col-md-3 col-sm-12">
                    <h4>Acompanhe nossas redes.</h4>
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
                    <p>TIM 2015. Todos os direitos reservados.</p>
                </div>
            </div>
        </div>
    </div>
    
</footer>
