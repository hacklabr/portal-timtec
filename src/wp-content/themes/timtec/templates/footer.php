<footer class="content-info" role="contentinfo">
    <div id="footer-info">
        <div class="container">
            <div class="row">
                <div class="content-footer col-md-8">
                    <?php dynamic_sidebar('sidebar-footer'); ?>
                </div>
                <div class="social col-md-4">
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
                    <p>Tim 2015. Todos os direitos reservados.</p>
                </div>
            </div>
        </div>
    </div>
    <div id="footer">
        <div class="container" >
            <div class="row">
                <div class="col-md-3 col-md-offset-9 links-footer">
                    <a class="timtec" href="" > TIMTec</a>
                    <span > | </span>
                    <a class="contato" href="" >CONTATO</a>
                </div>
            </div>
        </div>
    </div>
</footer>
