<?php
/**
 * Template Name: Forum
 */
?>
<?php while (have_posts()) : the_post(); ?>
    <?php get_template_part('templates/page', 'header'); ?>
    <?php get_template_part('templates/content', 'forum'); ?>
<?php endwhile; ?>