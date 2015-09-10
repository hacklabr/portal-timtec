<?php get_template_part('templates/head'); ?>

<?php
do_action('get_header');    
get_template_part('templates/header');
?>
<div id="page-course">
    <section id="banner" class=" ">
        <div class="container">
            <div class="col-md-12 image">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/banner_cursos_v1.png" />
            </div>
            <div class="col-md-12 text">
                <h4 >
                    <?php _oi("Software - Lorem ipsum dolor sit amet, consectetur"); ?>
                </h4>   
            </div>

        </div>
    </section>

    <section id="section1" class="">
        <div class="container"> 
            <div class="row text">
                <h2>
                    <?php _oi("Sobre os cursos"); ?>
                </h2>
                <p><?php _oi("Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas id velit lobortis, ultricies magna porta, molestie diam. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas id velit lobortis, ultricies magna porta, molestie diam."); ?></p>
                <a href="#" class="btn_cadastrese"><?php _oi("Saiba mais"); ?></a>
            </div>
        </div><!-- /container-->
    </section>

    <section id="section2" class="">
        <div class="container">
            <div class="row text">
                <h2>
                    <?php _oi("Cursos em destaque"); ?>
                </h2>
                <p><?php _oi("Lorem ipsum dolor sit amet, consectetur adipiscing elit. "); ?></p>
            </div>
            <div class="row list-courses">
                <ul>
                    <?php
                    $args = array(
                        'posts_per_page' => -1,
                        'post_type' => 'course'
                        );
                    $loop_courses = new WP_Query($args);

                    while ($loop_courses->have_posts()) : $loop_courses->the_post();
                    $url = get_the_permalink();
                    $thumb = wp_get_attachment_url(get_post_thumbnail_id());
                    $title = get_the_title();
                    ?>
                    <li>
                        <a href="<?php echo $url ?>">
                            <img src="<?php echo $thumb ?>" alt="<?php echo $title ?>"  title="<?php echo $title ?>">
                            <h4><?php echo $title ?></h4>
                        </a>
                    </li>
                    <?php
                    endwhile;
                    wp_reset_query();
                    ?>
                </ul>
            </div>
            <div class="row text">
                <a href="#" class="btn_cadastrese"><?php _oi("+ Jeja mais cursos"); ?></a>
            </div>
        </div><!-- /container-->
    </section>
    <section id="section3" class="">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text">
                    <div class="icon">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icon_cursos.png" />
                    </div>
                    <h2>
                        <?php _oi("Monte seus cursos"); ?>
                    </h2>
                    <p><?php _oi("Aprenda a montar seu próprio curso com a teconologia de ponta do TIMTec. orem ipsum dolor sit amet, consectetur adipiscing elit. Maecen id velit lobortis, ultricies magna porta, molest.orem ipsum dolor sit amet, elit."); ?></p>
                    <a href="#" class="btn_conheca"><?php _oi("+ Saiba mais fazendo esse curso"); ?></a>
                </div>
                <div class="col-md-6 image">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icon_curso_soft.png" />
                </div>

            </div>      
        </div><!-- /container-->
    </section>
</div>

<?php
do_action('get_footer');
get_template_part('templates/footer');
wp_footer();
