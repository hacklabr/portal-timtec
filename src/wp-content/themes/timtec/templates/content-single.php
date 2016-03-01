<div class="container">
    <div class="row">
        <div class="single-news">
        <?php while (have_posts()) : the_post(); ?>
            <article <?php post_class(); ?>>
                <?php  
                    $category = get_the_category( $post->ID ); 
                    $cat_id = $category[0]->term_id;
                    $cat_name = $category[0]->name;
                    $cat_data = get_option( "category_$cat_id" );
                    $cat_url =  get_category_link( $cat_id );
                    $cat_bg = !empty($cat_data['catBG']) ? $cat_data['catBG'] : '#05C3FF';
                ?>
                <header>
                    <a href="<?php echo esc_url( $cat_url ); ?>" title="<?php echo $cat_name ?>"><span class="post-category" style="background:<?php echo $cat_bg; ?>">#<?php echo $cat_name ?></span></a>
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
    <div id="post_relacionados" class="content row">
        <h3><?php _oi('Notícias relacionadas'); ?></h3>
        <?php 
            $post_id = $post->ID;
            $args = array(
                'post__not_in' =>  array($post_id),
                'post_type' => 'post',
                'cat' => $cat_id,
                'posts_per_page' => 4, 
            );
            
            $loop_relacionados = new WP_Query($args);

            while($loop_relacionados->have_posts()): $loop_relacionados->the_post();
        ?>
            <div class="col-md-3">
                <h4><a href="<?php the_permalink(); ?>"><?php  the_title(); ?></a></h4>
                <p><?php  the_excerpt(); ?></p>
            </div>
        <?php     
            endwhile; 
        ?>

    </div>
</div>
