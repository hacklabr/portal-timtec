<?php
/**
 * Template Name: Rede
 */
?>

<?php
do_action('get_header');
get_template_part('templates/header');

$header_text = trim(get_post_meta ( get_the_ID(), 'header_text', true ));
?>
<div id="page-default-template" class="page-network base-content">
    <?php while ( have_posts() ) : the_post(); ?>
    <div class="banner <?php if(!$header_text) echo "no-text"; ?>">
        <div class="container">
            <h2 class="title"><?php _e("Rede"); ?> <span class="subtitle">[<?php the_title(); ?>]</span></h2>
            <?php if($header_text): ?>
            <div class="info">
                <?php echo nl2br($header_text) ?>
            </div>
            <?php endif; ?>
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
    </section>
    <?php endwhile; // end of the loop. ?>
</div>
