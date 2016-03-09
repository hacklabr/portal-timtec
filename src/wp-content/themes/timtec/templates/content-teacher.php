<?php 
	global $teacher_course_relation, $couse_download;
	do_action('get_header');
	get_template_part('templates/header');
?>
<div id="page-teacher" class="base-content">
    <div class="banner">
        <div class="container">
            <h2 class="title"><?php _oi("CURSOS"); ?> 
            	<span class="subtitle">[<?php _oi("Sobre o Professor"); ?>]</span>
            </h2>
        </div>
    </div>

	<div class="container">
	    <div class="single-news">
	        <?php while (have_posts()) : the_post(); ?>
	            <article <?php post_class(); ?>>
	             	<div class="row">
		            	<div class="col-md-3 img-professor">
		            		<?php
		                    	$thumb = wp_get_attachment_url(get_post_thumbnail_id());
		                    ?>
		                    <img src="<?php echo $thumb; ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" class="circular">
		            	</div>
		            	<div class="col-md-9">
			                <header>
			                    <span class="post-category" style="background:"></span>
			                    <h3 class="post-title">
			                        <?php the_title() ?>
			                    </h3>
			                   
			                </header>
			                <hr>
			                <div class="post-content">
			                	<h4>Biografia</h4>
			                    <?php the_content(); ?>
			                </div>
			            </div>
			            
			        </div>
		            <hr />
		            <div class="lista-cursos row">
		            	<h4><?php _oi("Cursos do professor"); ?> <?php the_title();?></h4>
		            	<ul>
		                <?php
							$id_teacher = $post->ID;
							$args = array(
								'post_type' => 'course',
								'meta_key' => 'teacher_ids',
								'meta_value' => $id_teacher,
							);
							
							$loop_courses = new WP_Query( $args );
							
							while ( $loop_courses->have_posts()) : $loop_courses->the_post();
								$url = get_the_permalink();
		                        $thumb = wp_get_attachment_url(get_post_thumbnail_id());
		                        $title = get_the_title();
		                        $course_url = get_metadata('post', get_the_ID(), 'url_course', true);
		                        $youtube_url = get_metadata('post', get_the_ID(), 'url_youtube_course', true);
								$instituto = get_metadata('post', get_the_ID(), 'instituto_course', true);

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

						<li>
                            <?php 
                                if( empty( $youtube_url) ){
                            ?>
                                    <img src="<?php echo $thumb ?>" alt="<?php echo $title ?>"  title="<?php echo $title ?>">
                            <?php 
                                }else{
                                    $embed_code = wp_oembed_get( $youtube_url , array('width'=>355) ); 
                                    echo $embed_code;
                                }
                            ?>
                            <div class="content-curso">
                             	<div class="content-lista">
	                                <div class="institute"><?php echo $instituto; ?></div>
	                                <h4><a href="<?php echo $url;  ?>" class="link-curso"><?php echo $title ?></a></h4>
	                                <div class="author"><?php echo $teacher; ?></div>
                                </div>
                                <div class="btns_lista_curso">
	                                <?php if ($course_url): ?>
	                                    <a href="<?php echo $course_url; ?>" class="btn goto">Assistir aula</a>
	                                <?php endif; ?>
	                                <?php
	                                if ($couse_download->getFilePath(get_the_ID())):
	                                    $download_url = $couse_download->getFileUrl(get_the_ID());
	                                    ?>
	                                    <a href="<?php echo $download_url ?>" class="download">
	                                        <i class="fa fa-cloud-download"></i> Baixar pacote
	                                    </a>
	                                <?php endif; ?>
                                </div>
                            </div>

                        </li>
						<?php	
							endwhile;
						?>
						</ul>
					</div>
	            </article>
	        <?php endwhile; ?>
	        </div>
	    </div>
	</div>
</div>