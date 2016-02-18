<?php


do_action('get_header');
get_template_part('templates/header');
?>

<div id="page-forum" class=" page single">
    <div class="banner">
        <div class="container">
            <h2 class="title"><?php _oi("Fórum - Pergunta"); ?></h2>
        </div>
    </div>
   	
   	<div class="container">
	    <div class="row">
	        <div class="single">
	        <?php while (have_posts()) : the_post(); ?>
	            <article <?php post_class(); ?>>
	                <header>
	                    <h3 class="post-title">
	                        <?php the_title() ?>
	                    </h3>
	                </header>
	                <div class="post-content">
	                    <?php the_content(); ?>
	                </div>
	            </article>
	        <?php endwhile; ?>
	        </div>
	    </div>
	</div>

</div>
