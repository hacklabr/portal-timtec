<?php
do_action('get_header');
get_template_part('templates/header');
?>

<div id="page-news" class="base-content page single">
    <div class="banner">
        <div class="container">
            <h2 class="title"><?php _oi("Novidades"); ?></h2>
        </div>
    </div>
    <?php get_template_part('templates/content-single', get_post_type()); ?>
</div>
