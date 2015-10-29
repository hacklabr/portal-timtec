<?php
/**
 * Template Name: Forum
 */
?>
<div class="container">
<?php while (have_posts()) : the_post(); ?>
    <?php get_template_part('templates/page', 'header'); ?>
    <?php get_template_part('templates/content', 'forum'); ?>
<?php endwhile; ?>
</div>
