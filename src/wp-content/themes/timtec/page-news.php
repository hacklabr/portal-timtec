<?php
/**
 * Template Name: Notícias
 */
?>

<?php
do_action('get_header');
get_template_part('templates/header');
?>
<div id="page-news" class="base-content">
    <div class="banner" style="background-image: url(http://lorempixel.com/1920/500/);">
        <div class="container">
            <h2 class="title"><?php _oi("Novidades"); ?></h2>
            <div class="info">
                <span class="post-category">#Categoria</span>
                <h3 class="post-title"><a href="">Lorem ipsum dolor sit amet consectetur adipiscing elit</a></h3>
                <div class="post-excerpt"><a href="">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis molestie a dui at porttitor. Nunc at imperdiet ipsum, in consequat elit.</a></div>
                <div class="read-more"><a href=""><?php _oi("Leia mais"); ?> <span class="arrow"><i class="fa fa-arrow-right"></i></span></a></div>
            </div>
        </div>
    </div>

    <div class="container">
        <section>

        </section>
    </div>
</div>
