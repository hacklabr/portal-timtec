<?php
/**
 * Template Name: Software
 */
?>

<?php
do_action('get_header');
get_template_part('templates/header');
?>
<div id="page-default-template" class="page-software base-content">
    <?php while ( have_posts() ) : the_post(); ?>
    <div class="banner">
        <div class="container">
            <h2 class="title"><?php _oi("Software"); ?> <span class="subtitle">[<?php the_title(); ?>]</span></h2>
            <div class="info">
                <?php the_excerpt(); ?>
            </div>
        </div>
    </div>

    <section class="page-content">
        <div class="container">
            <?php the_content(); ?>
        </div>
    </section>

    <section class="page-featured">
        <h2 class="title">lorem ipsum dolor sit amet</h2>
        <div class="featured-line">
            <div class="row">
                <div class="container">
                    <div class="featured-box">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icones-1.png" alt="1">
                        <h3 class="subtitle">Subtítulo</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eleifend ex nec odio ultricies ornare. Ut facilisis tellus sit amet turpis sagittis, vitae pretium risus vulputate. Cras dolor ligula, aliquam in convallis non, ullamcorper eget risus. Sed malesuada lacus nec libero tempor viverra.</p>
                    </div>
                    <div class="featured-box">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icones-2.png" alt="2">
                        <h3 class="subtitle">Subtítulo</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eleifend ex nec odio ultricies ornare. Ut facilisis tellus sit amet turpis sagittis, vitae pretium risus vulputate. Cras dolor ligula, aliquam in convallis non, ullamcorper eget risus. Sed malesuada lacus nec libero tempor viverra.</p>
                    </div>
                    <div class="featured-box">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icones-3.png" alt="3">
                        <h3 class="subtitle">Subtítulo</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eleifend ex nec odio ultricies ornare. Ut facilisis tellus sit amet turpis sagittis, vitae pretium risus vulputate. Cras dolor ligula, aliquam in convallis non, ullamcorper eget risus. Sed malesuada lacus nec libero tempor viverra.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php endwhile; // end of the loop. ?>
</div>
