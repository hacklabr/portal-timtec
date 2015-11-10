<?php /* Template Name: Página  */ ?>
<?php
do_action('get_header');    

the_post();
?>
<div id="page" class="base-content container">
    <section>
        <div class="col-md-12 ">
            <h3><?php the_title(); ?></h3>  
            
            <?php the_content(); ?>
        </div>
    </section>
    <div class="clear"></div>
</div>

<?php
do_action('get_footer');
wp_footer();
