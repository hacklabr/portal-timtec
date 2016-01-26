<?php 
	global $teacher_course_relation, $couse_download;
?>
<div id="single-course" class="base-content">
	<div class="banner">
        <div class="container">
            <h2 class="title"><?php _oi("CURSOS"); ?> 
            	<span class="subtitle">{<?php _oi("Detalhes do Curso"); ?>}</span>
            </h2>
        </div>
    </div>
	<?php while (have_posts()) : the_post(); 

		$pre_requisito_course;
		$estrutura_course;
		$instituto_course;
		$qtd_aulas_course;
		$qtd_horas_course;
		$nivel_course;
	?>


		<div class="container">
		    <article <?php post_class(); ?>>
		        <header>
		            <h1 class="entry-title"><?php the_title(); ?></h1>
		            <div class="instrutor">
		            	<?php
		            		$teachers = $teacher_course_relation->getRelatedPosts();
	                        $teacher = '';
	                        if (is_array($teachers)) {  

	                            $teachers_name = array_map(function($e) {
	                                return $e->post_title;
	                            }, $teachers );

	                            $teachers_id = array_map(function($e) {
	                                return $e->ID;
	                            }, $teachers );
	                          
	                            for( $i = 0; $i < count( $teachers_id ); $i++  ){
	                                $link = get_the_permalink( $teachers_id[ $i ] );
	                                $teacher[ $i ] = "<a href='".$link."' alt='".$teachers_name[ $i ]."'>" .$teachers_name[ $i ]. "</a>";
	                            };

	                            $teacher = implode( ", ", $teacher);
	                        }
		            	?>
		            	<span>Instrutor: </span><?php echo $teacher; ?>
		            </div>
		            <div class="instituo">Instituto: </div>
		        </header>
		        <div class="col-md-9">
			        <div class="row">
			        	<div class="col-md-5">
			            	<?php 
			            		$thumb = wp_get_attachment_url(get_post_thumbnail_id());
		                        $youtube_url = get_metadata('post', get_the_ID(), 'url_youtube_course', true);

                                if( empty( $youtube_url) ){
                            ?>
                                    <img src="<?php echo $thumb ?>" alt="<?php echo $title ?>"  title="<?php echo $title ?>">
                            <?php 
                                }else{
                                    $embed_code = wp_oembed_get( $youtube_url , array('width'=>355) ); 
                                    echo $embed_code;
                                }
                            ?>
			            </div>
			            <div class="col-md-7 ">
			            	<?php the_content(); ?>
			            </div>
			        </div>
			        <div class="row">
			        	<div class="col-md-5 ">
			            	<?php the_content(); ?>
			            </div>
			            <div class="col-md-7">
			            	<?php the_content(); ?>
			            </div>
			        </div>
			    </div>
			    <div class="col-md-3">
		    		<div class="row">
		            	<?php the_content(); ?>
		            </div>
			    </div>
		    </article>
	    </div>
	<?php endwhile; ?>
</div>