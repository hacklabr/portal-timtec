<?php

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

<div id="page-news" class="base-content page single">
    <div class="banner">
        <div class="container">
            <h2 class="title"><?php _oi("Novidades"); ?></h2>
        </div>
    </div>
    <?php get_template_part('templates/content-single', get_post_type()); ?>
</div>
