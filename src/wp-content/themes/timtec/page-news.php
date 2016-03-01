<?php
/**
 * Template Name: Notícias
 */

$q_header = get_option('destaques-noticias');
$q_principal = DestaquesNoticias::getQuery('principal');
$q_atuais = new WP_Query(['posts_per_page' => 3]);
$not_post_list_id;

function _cat(){
    foreach((get_the_category()) as $i => $category) {
        if($i > 0){
            echo ', ';
        }
        echo '#' . $category->cat_name;
    }
}

function _img_url(){
    if ( has_post_thumbnail( get_the_ID() ) ){
        $image = wp_get_attachment_image_src( get_post_thumbnail_id( ), 'single-post-thumbnail' );
        echo "background-image:url({$image[0]})";
    }else{
        echo 'background:black';
    }
}

function _date(){
    //as 00h00 dia 00/00/0000
    the_time('d/m/Y');
}

do_action('get_header');
get_template_part('templates/header');
?>
<div id="page-news" class="base-content">
    <div class="banner">
        <div class="container">
            <h2 class="title"><?php _oi("Notícias"); ?></h2>
            <div class="info">
                <?php echo $q_header['header']; ?>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="main-news">
                <div class="featured">
                    <?php
                    while($q_principal->have_posts()):
                        $q_principal->the_post();
                        $not_post_list_id[] = $post->ID; 

                        if($q_principal->post_count > 3)
                            break;
                    ?>
                    <?php  
                        $category = get_the_category( $post->ID ); 
                        $cat_id = $category[0]->cat_ID;
                        $cat_url =  get_category_link( $cat_id );
                        $cat_data = get_option( "category_$cat_id" );
                        $cat_bg = !empty($cat_data['catBG']) ? $cat_data['catBG'] : '#05C3FF';
                    ?>
                        <?php if($q_principal->current_post === 0 && ($q_principal->post_count == 1 || $q_principal->post_count >= 3)): ?>
                            <div class="featured-big">
                                <div class="news-box" style="<?php _img_url(); ?>">
                                    <div class="gradient"></div>
                                    <a href="<?php echo esc_url( $cat_url ); ?>" title="<?php _cat() ?>"><span class="post-category" style="background:<?php echo $cat_bg; ?>"><?php _cat() ?></span></a>
                                    <div class="clearfix"></div>
                                    <div class="info">
                                        <h3 class="post-title"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>
                                        <div class="post-excerpt"><a href="<?php the_permalink() ?>"><?php the_excerpt() ?></a></div>
                                    </div>
                                </div>
                            </div>
                        <?php else: ?>
                            <div class="featured-small">
                                <div class="news-box" style="<?php _img_url() ?>">
                                    <div class="gradient"></div>
                                    <a href="<?php echo esc_url( $cat_url ); ?>" title="<?php _cat() ?>"><span class="post-category" style="background:<?php echo $cat_bg; ?>"><?php _cat() ?></span></a>
                                    <div class="clearfix"></div>
                                    <div class="info">
                                        <h3 class="post-title"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endwhile; ?>
                </div>

                <div class="list">
                    <h2 class="list-title"><?php _oi("Últimas notícias") ?></h2>
                    <?php  

                        $args = array(
                            'post_type' => 'post',
                            'post__not_in' => $not_post_list_id,
                            'posts_per_page' => 4,                            
                        );
                        
                        $loop_news = new WP_Query($args);

                        while($loop_news->have_posts()): $loop_news->the_post(); 
                 
                        $category = get_the_category( $post->ID ); 
                        $cat_name =  $category[0]->name;
                        $cat_id = $category[0]->term_id;
                        $cat_url =  get_category_link( $cat_id );
                        $cat_data = get_option( "category_$cat_id" );
                        $cat_bg = !empty($cat_data['catBG']) ? $cat_data['catBG'] : '#05C3FF';
                    ?>
                        <div class="list-item">
                            <a href="<?php echo esc_url( $cat_url ); ?>" title="<?php echo $cat_name; ?>"><span class="post-category" style="background:<?php echo $cat_bg; ?>">#<?php echo $cat_name; ?></span></a>
                            <time class="post-date"><?php _date() ?></time>
                            <h3 class="post-title"><a href="<?php the_permalink()?>"><?php the_title() ?></a></h3>
                            <div class="post-excerpt"><a href="<?php the_permalink()?>"><?php the_excerpt() ?></a></div>
                        </div>
                    <?php endwhile; ?>
                </div>
                <a href="/todas-as-noticias/" class="btn-ver-mais"> Ver mais notícias </a>
            </div>
            <div class="sidebar-news">
               
                <?php dynamic_sidebar('sidebar-primary'); ?>

            </div>
        </div>
    </div>
</div>
