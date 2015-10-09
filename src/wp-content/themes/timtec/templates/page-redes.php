<?php get_template_part('templates/head'); ?>

<?php
do_action('get_header');    
get_template_part('templates/header');
?>
<div id="page-rede" class="base-content">
    <section id="banner" class=" ">
        <div class="container">
            <div class="col-md-12 image">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/redes.png" />
            </div>
            <div class="col-md-12 text">
                <h4 >
                    <?php _oi("Lorem ipsum dolor sit amet, consectetur", "Cursos - Texto Banner"); ?>
                </h4>   
            </div>
            <span class="icon-seta fa fa-angle-down"></span>
        </div>
    </section>

    <section id="section1" class="">
        <div class="container"> 
            <div class="row text">
                <h2><?php _oi("Lorem ipsum dolor sit amet, consectetur"); ?></h2>
                <p class="mec"><?php _oi("Lorem ipsum dolor sit amet, consectetur, uneaml."); ?></p>
                <p class="ifs"><?php _oi("Lorem ipsum dolor sit amet, ifs federais, uneaml."); ?></p>
                <p class="organizacao"><?php _oi("Lorem ipsum dolor sit amet, organizacao, uneaml."); ?></p>
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/redes-info.png" />
            </div>
        </div><!-- /container-->
    </section>
</div>

<?php
do_action('get_footer');
get_template_part('templates/footer');
wp_footer();
