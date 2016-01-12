<?php
/**
 * Template Name: Faq
 */
?>

<?php
    do_action('get_header');    
    get_template_part('templates/header');
?>
<div id="page-faq" class="base-content container">
    <section>
        <div class="col-md-12 ">
            <h3><?php _oi("FAQ"); ?></h3>
            <?php while ( have_posts() ) : the_post(); ?>  
 			 <?php the_content(); ?>
 			 <?php endwhile; // end of the loop. ?>

        </div>
    </section>
</div>