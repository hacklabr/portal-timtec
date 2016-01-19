<div class="container">
    <div class="row">
        <div class="single-news">
        <?php while (have_posts()) : the_post(); ?>
            <article <?php post_class(); ?>>
                <?php  
                    $category = get_the_category( $post->ID ); 
                    $cat_id = $category[0]->term_id;
                    $cat_data = get_option( "category_$cat_id" );
                    $cat_bg = $cat_data['catBG'];
                ?>
                <header>
                    <span class="post-category" style="background:<?php echo $cat_bg; ?>"><?php _cat(); ?></span>
                    <time class="post-date"><?php _date() ?></time>
                    <h3 class="post-title">
                        <?php the_title() ?>
                    </h3>
                    <?php 
                        if ( function_exists( 'sharing_display' ) ) {
                            sharing_display( '', true );
                        }
                         
                        if ( class_exists( 'Jetpack_Likes' ) ) {
                            $custom_likes = new Jetpack_Likes;
                            echo $custom_likes->post_likes( '' );
                        }
                    ?>
                </header>
                <div class="post-content">
                    <?php the_content(); ?>
                </div>
            </article>
        <?php endwhile; ?>
        </div>
        <div class="sidebar-news">
                <?php dynamic_sidebar('sidebar-primary'); ?>
        </div>
    </div>
</div>
