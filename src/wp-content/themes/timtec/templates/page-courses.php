<?php get_template_part('templates/head'); ?>

<?php
global $teacher_course_relation;

do_action('get_header');	
get_template_part('templates/header');
?>
<div id="page-course" class="base-content container">
	<section>
        <div class="col-md-12 ">
            <h3><?php _oi("CURSOS"); ?></h3>  
            <p><?php _oi("Aqui você encontra todos os cursos já produzidos e publicados pelo projeto TIM Tec ou por seus parceiros. Eles podem ser acessados, cursados e baixados por qualquer pessoa, gratuitamente. Cada curso é dividido em aulas e cada aula é dividida em capítulos de até 5 minutos. O aluno assiste ao vídeo, faz as atividades correspondentes e pode consultar o material complementar disponível para cada curso."); ?></p> 
            <span class="box"><?php _oi("São voltados para a área de tecnologia e foram escolhidos com base no Eixo Tecnológico: Informação e Comunicação do Programa Nacional de Acesso ao Ensino Técnico e Emprego (Pronatec), do governo federal. Há também cursos dirigidos a professores do Ensino Fundamental e ao fortalecimento de competências consideradas básicas para a formação de qualquer profissional, como a escrita de textos.Os vídeos produzidos pelo projeto TIM Tec estão publicados sob a Licença Creative Commons Atribuição 3.0 Brasil (CC­BY), a mais livre de todas"); ?></span>
            <span class="box"><?php _oi("Os conteúdos podem ser livremente compartilhados (copiados e redistribuídos em qualquer suporte ou formato) e adaptados (remixados, transformados e usados como base para outros materiais), desde Os conteúdos podem ser livremente compartilhados (copiados e redistribuídos em qualquer suporte ou formato) e adaptados (remixados, transformados e usados como base para outros materiais), desde que seja dado o devido crédito ao projeto TIM Tec e ao Instituto TIM. Que seja dado o devido crédito ao projeto TIM Tec e ao Instituto TIM."); ?></span>
        </div>
    </section>
    <div class="clear"></div>

	<section id="section2" class="">
		<div class="container">
			<div class="list-courses">
				<ul>
					<?php
					$args = array(
						'posts_per_page' => -1,
						'post_type' => 'course'
						);
					$loop_courses = new WP_Query($args);

					while ($loop_courses->have_posts()) : $loop_courses->the_post();
					$url = get_the_permalink();
					$thumb = wp_get_attachment_url(get_post_thumbnail_id());
					$title = get_the_title();
					$teacher = $teacher_course_relation->getRelatedPosts();
					$teacher = $teacher[0]->post_title;


					?>
					<li>
						<img src="<?php echo $thumb ?>" alt="<?php echo $title ?>"  title="<?php echo $title ?>">
						<div class="content-curso">
							<h4><?php echo $title ?></h4>
							<p class="author"><?php echo $teacher; ?></p>
							<?php echo the_excerpt(); ?>
							<a href="<?php echo $url ?>" >Ir para o curso</a>
						</div>
					</li>
					<?php
					endwhile;
					wp_reset_query();
					?>
				</ul>
			</div>
			
		</div><!-- /container-->
	</section>
</div>

<?php
do_action('get_footer');
get_template_part('templates/footer');
wp_footer();
