<?php

$isPostType = get_post_type() != 'post';

//Header title default
if ( $isPostType ) :
    get_template_part('templates/page', 'header');
endif;

if (!have_posts()) : ?>

<div class="alert alert-warning">
    <?php _e('Sorry, no results were found.', 'sage'); ?>
</div>

<?php
    get_search_form();
elseif ( !$isPostType ): // If post-type is POST

    get_template_part('templates/archive-noticias');

else:

    while (have_posts()) : the_post();
        get_template_part('templates/content', ( $isPostType ) ? get_post_type() : get_post_format());
    endwhile;

    the_posts_navigation();

endif;
?>
