<?php 
	global $teacher_course_relation, $couse_download;
?>
<div id="single-course" class="base-content">
	<div class="banner">
        <div class="container">
            <h2 class="title"><?php _oi("CURSOS"); ?> 
            	<span class="subtitle">[<?php _oi("Sobre o Curso"); ?>]</span>
            </h2>
        </div>
    </div>
	<?php while (have_posts()) : the_post(); 
		$pre_requisito = get_metadata('post', get_the_ID(), 'pre_requisito_course', true);  
		$estrutura = get_metadata('post', get_the_ID(), 'estrutura_course', true);
		$instituto = get_metadata('post', get_the_ID(), 'instituto_course', true);
		$qtd_aulas = get_metadata('post', get_the_ID(), 'qtd_aulas_course', true);
		$qtd_horas = get_metadata('post', get_the_ID(), 'qtd_horas_course', true);
		$nivel = get_metadata('post', get_the_ID(), 'nivel_course', true);
		$course_url = get_metadata('post', get_the_ID(), 'url_course', true);

		$teachers = $teacher_course_relation->getRelatedPosts();
        $teacher = [];
        $teacher_name = [];

        if (is_array($teachers)) { 
            $teachers_name = array_map(function($e) {
                return $e->post_title;
            }, $teachers );

            $teachers_id = array_map(function($e) {
                return $e->ID;
            }, $teachers );

            $teachers_resumo = array_map(function($e) {
                return $e->post_excerpt;
            }, $teachers );
            
          
            for( $i = 0; $i < count( $teachers_id ); $i++  ){
                $link = get_the_permalink( $teachers_id[ $i ] );
                $url_image = wp_get_attachment_url( get_post_thumbnail_id( $teachers_id[ $i ] ) );
                
                $teachers[ $i ]  = "<div class='instrutor'>";
                if( !empty( $url_image )){
                	$teachers[ $i ] .= "<img src='".$url_image."' alt='".$teachers_name[ $i ]."' class='circular' />";
                };
                $teachers[ $i ] .= "<a href='".$link."' alt='".$teachers_name[ $i ]."'>" .$teachers_name[ $i ]. "</a>";
            	if( !empty( $teachers_resumo[ $i ] )){
            		$teachers[ $i ] .= "<p>". $teachers_resumo[ $i ] ."</p>";
            	};
            	$teachers[ $i ] .= "</div>";

            	$teacher_title[ $i ] = "<a href='".$link."' alt='".$teachers_name[ $i ]."'>" .$teachers_name[ $i ]. "</a>";


            	$teacher_name[ $i ] = "<span class='prof'>" .$teachers_name[ $i ]. "</span>";

            };
            $teacher_title = implode( ", ", $teacher_title);
            $teachers = implode( "", $teachers);
            $teacher_name = implode( ", ", $teacher_name);	
        }
	?>
	<div class="container">
	    <article <?php post_class(); ?>>
	        <header>
	            <h1 class="entry-title"><?php the_title(); ?></h1>
	            <div class="instrutor">
	            	<span>Instrutor: </span><?php echo $teacher_title; ?>
	            </div>
	            <div class="instituto">Instituição: <span><?php echo $instituto; ?></span></div>
	        </header>
	        <hr />
	        <div class="col-md-10 colunm-content">
		        <div class="row">
		        	<div class="col-md-6 video-curso colunm">
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
		            <div class="col-md-6 colunm">
		            	<h4><?php _oi("Descrição do curso"); ?></h4>
		            	<?php the_content(); ?>

		            	<?php if ($course_url): ?>
	                        <a href="<?php echo $course_url; ?>" class="btn goto">Assistir aulas</a>
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
		        <div class="row">
		        	<div class="col-md-6 colunm">
		        		<h4><?php _oi("Pré-Requisitos"); ?></h4>
		            	<?php echo $pre_requisito; ?>
		            </div>
		            <div class="col-md-6 colunm">
		            	<h4><?php _oi("Estrutura do Curso"); ?></h4>
		            	<?php echo $estrutura; ?>
		            </div>
		        </div>
		    </div>
            <hr class="hidden-md hidden-lg">
		    <div class="col-md-2 side-curso">
	    		<div class="infos-curso">
	            	<?php 
	            		if( !empty( $qtd_aulas ) ){
	            	?>
	            		<p>Aulas: <span><?php echo $qtd_aulas; ?></span></p>
	            	<?php 
	            		}

	            		if( !empty( $nivel ) ){
	            	?>
	            		<p>Horas: <span><?php echo $qtd_horas; ?></span></p>
	            	<?php 
	            		}

	            		if( !empty( $nivel ) ){
	            	?>
	            		<p>Nível: <span><?php echo $nivel; ?></span></p>
	            	<?php 
	            		}
	            	?>
	            </div>
	            <div class="instrutores">
	            	<h5>Instrutores:</h5>
	            	<?php echo $teacher_name; ?>
	            </div>
		    </div>
	    </article>
    </div>
	<?php endwhile; ?>
</div>