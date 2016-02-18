<?php
/**
 * Template Name: Forum
 */
?>
<div id="page-forum" class="page single">
	
		<?php while (have_posts()) : the_post(); ?>
		    <div class="banner">
		    	<div class="container">
		        	<h2 class="title"><?php _oi("Forúm"); ?></h2>
		        </div>
		    </div>
		    <div class="container">
		    	<?php the_content(); ?>
		    </div>
		<?php endwhile; ?>
	</div>
</div>