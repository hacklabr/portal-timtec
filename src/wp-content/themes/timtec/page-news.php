<?php
/**
 * Template Name: Notícias
 */

$q_header = DestaquesNoticias::getQuery('header');
$q_principal = DestaquesNoticias::getQuery('principal');
$q_geral = DestaquesNoticias::getQuery('geral');
$q_atuais = new WP_Query(['posts_per_page' => 3]);

function _cat(){
    foreach((get_the_category()) as $i => $category) {
        if($i > 0){
            echo ', ';
        }
        echo '#' . $category->cat_name;
    }
}

function _img_url(){
    if (has_post_thumbnail( get_the_ID() ) ){
        $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
        echo "background-image:url({$image[0]})";
    }else{
        echo 'background:black';
    }
}

function _date(){
    //as 00h00 dia 00/00/0000
    the_time('\a\s G:i \d\i\a d/m/Y');
}

do_action('get_header');
get_template_part('templates/header');
?>
<div id="page-news" class="base-content">
    <div class="banner">
        <div class="container">
            <div id="carousel-news" class="carousel slide" data-ride="carousel">
                <h2 class="title"><?php _oi("Novidades"); ?></h2>

                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                    <?php while($q_header->have_posts()): $q_header->the_post(); ?>
                    <div class="item <?php if(!$q_header->current_post) echo 'active'; ?>">
                        <span></span>
                        <span class="post-category orange"><?php _cat(); ?></span>
                        <h3 class="post-title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
                        <div class="post-excerpt"><a href="<?php the_permalink() ?>"><?php the_excerpt() ?></a></div>
                        <div class="read-more"><a href="<?php the_permalink() ?>"><?php _e("Leia mais"); ?> <span class="arrow"><i class="fa fa-arrow-right"></i></span></a></div>
                    </div>
                    <?php endwhile; ?>
                </div>

                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <?php for($i = 0; $i < $q_header->post_count; $i++): ?>
                    <li data-target="#carousel-news" data-slide-to="<?php echo $i ?>" <?php if(!$i) echo 'class="active"' ?>></li>
                    <?php endfor; ?>;
                </ol>
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
                        if($q_principal->post_count > 3)
                            break;
                    ?>
                        <?php if($q_principal->current_post === 0 && ($q_principal->post_count == 1 || $q_principal->post_count >= 3)): ?>
                            <div class="featured-big">
                                <div class="news-box" style="<?php _img_url() ?>">
                                    <span class="post-category blue"><?php _cat() ?></span>
                                    <h3 class="post-title"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>
                                    <div class="post-excerpt"><a href="<?php the_permalink() ?>"><?php the_excerpt() ?></a></div>
                                </div>
                            </div>
                        <?php else: ?>
                            <div class="featured-small">
                                <div class="news-box" style="<?php _img_url() ?>">
                                    <span class="post-category blue"><?php _cat() ?></span>
                                    <h3 class="post-title"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endwhile; ?>
                </div>

                <div class="list">
                    <h2 class="list-title"><?php _oi("Notícias geral") ?></h2>
                    <?php while($q_geral->have_posts()): $q_geral->the_post(); ?>
                        <div class="list-item">
                            <span class="post-category orange"><?php _cat() ?></span>
                            <time class="post-date"><?php _date() ?></time>
                            <h3 class="post-title"><a href="<?php the_permalink()?>"><?php the_title() ?></a></h3>
                            <div class="post-excerpt"><a href="<?php the_permalink()?>"><?php the_excerpt() ?></a></div>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
            <div class="sidebar-news">
                <div class="last-news">
                    <h2 class="sidebar-title"><?php _e("As mais atuais"); ?></h2>
                    <?php while($q_atuais->have_posts()): $q_atuais->the_post(); ?>
                        <div class="list-item">
                            <h3 class="post-title"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>
                            <time class="post-date"><?php _date() ?></time>
                            <div class="news-box" style="<?php _img_url() ?>"><span class="post-category orange"><?php _cat() ?></span></div>
                        </div>
                    <?php endwhile; ?>
                </div>

                <?php dynamic_sidebar('sidebar-primary'); ?>

                <?php /* 
                <div class="twitter-news">
                                        
                    <h2 class="sidebar-title"><?php _e("Do Twitter"); ?></h2>

                    <div class="list-item">
                        <div class="twitter-avatar"><a href="https://twitter.com/timtec_oficial"><img src="https://pbs.twimg.com/profile_images/481125416648728578/kmFmSt39_400x400.jpeg" alt="TIM Tec Oficial"></a></div>
                        <div class="twitter-username"><a href="https://twitter.com/timtec_oficial">TIM Tec Oficial</a></div>
                        <time class="twitter-date">00/00/0000 00:00</time>
                        <div class="twitter-content">
                            RT <a href="#">@UFMGBR</a> Importância cultural de jogos digitais será tema de simpósio nesta semana <a href="#">https://t.co/zEXB6LB0G2</a>
                        </div>
                    </div>
                    <div class="list-item">
                        <div class="twitter-avatar"><a href="https://twitter.com/timtec_oficial"><img src="https://pbs.twimg.com/profile_images/481125416648728578/kmFmSt39_400x400.jpeg" alt="TIM Tec Oficial"></a></div>
                        <div class="twitter-username"><a href="https://twitter.com/timtec_oficial">TIM Tec Oficial</a></div>
                        <time class="twitter-date">00/00/0000 00:00</time>
                        <div class="twitter-content">
                            RT <a href="#">@UFMGBR</a> Importância cultural de jogos digitais será tema de simpósio nesta semana <a href="#">https://t.co/zEXB6LB0G2</a>
                        </div>
                    </div>
                    
                    <div class="list-item">
                        <div class="twitter-avatar"><a href="https://twitter.com/timtec_oficial"><img src="https://pbs.twimg.com/profile_images/481125416648728578/kmFmSt39_400x400.jpeg" alt="TIM Tec Oficial"></a></div>
                        <div class="twitter-username"><a href="https://twitter.com/timtec_oficial">TIM Tec Oficial</a></div>
                        <time class="twitter-date">00/00/0000 00:00</time>
                        <div class="twitter-content">
                            RT <a href="#">@UFMGBR</a> Importância cultural de jogos digitais será tema de simpósio nesta semana <a href="#">https://t.co/zEXB6LB0G2</a>
                        </div>
                    </div>

                    <div class="list-item">
                        <div class="twitter-avatar"><a href="https://twitter.com/timtec_oficial"><img src="https://pbs.twimg.com/profile_images/481125416648728578/kmFmSt39_400x400.jpeg" alt="TIM Tec Oficial"></a></div>
                        <div class="twitter-username"><a href="https://twitter.com/timtec_oficial">TIM Tec Oficial</a></div>
                        <time class="twitter-date">00/00/0000 00:00</time>
                        <div class="twitter-content">
                            RT <a href="#">@UFMGBR</a> Importância cultural de jogos digitais será tema de simpósio nesta semana <a href="#">https://t.co/zEXB6LB0G2</a>
                        </div>
                    </div>

                </div>

                <?php  */ ?>
            </div>
        </div>
    </div>
</div>
