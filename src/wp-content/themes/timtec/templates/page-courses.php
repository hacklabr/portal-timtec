<?php get_template_part('templates/head'); ?>

<?php
global $teacher_course_relation, $couse_download;

do_action('get_header');
get_template_part('templates/header');
?>
<div id="page-course" class="base-content container">
    <section>
        <div class="col-md-12 ">
            <h3><?php _oi("CURSOS"); ?></h3>
            <p><?php _oi("Aqui você encontra todos os cursos já produzidos e publicados pelo projeto TIM Tec ou por seus parceiros. Eles podem ser acessados, cursados e baixados por qualquer pessoa, gratuitamente. Cada curso é dividido em aulas e cada aula é dividida em capítulos de até 5 minutos. O aluno assiste ao vídeo, faz as atividades correspondentes e pode consultar o material complementar disponível para cada curso"); ?></p>

            <p><?php _oi("Os cursos são voltados para a área de tecnologia e foram escolhidos com base no Eixo Tecnológico: Informação e Comunicação do Programa Nacional de Acesso ao Ensino Técnico e Emprego (Pronatec), do governo federal. Há também cursos dirigidos a professores do Ensino Fundamental e ao fortalecimento de competências consideradas básicas para a formação de qualquer profissional, como a escrita de textos."); ?></p>

            <p><?php _oi("Os vídeos produzidos pelo projeto TIM Tec estão publicados sob a Licença Creative Commons Atribuição 3.0 Brasil (CC-BY), a mais livre de todas. Os conteúdos podem ser livremente compartilhados (copiados e redistribuídos em qualquer suporte ou formato) e adaptados (remixados, transformados e usados como base para outros materiais), desde que seja dado o devido crédito ao projeto TIM Tec e ao Instituto TIM."); ?></p>

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
                        $course_url = get_metadata('post', get_the_ID(), 'url_course', true);

                        $teachers = $teacher_course_relation->getRelatedPosts();
                        $teacher = '';
                        if (is_array($teachers)) {
                            $teachers = array_map(function($e) {
                                return $e->post_title;
                            }, $teachers);
                            $teacher = implode(', ', $teachers);
                        }
                        ?>
                        <li>
                            <img src="<?php echo $thumb ?>" alt="<?php echo $title ?>"  title="<?php echo $title ?>">
                            <div class="content-curso">
                                <h4><?php echo $title ?></h4>
                                <div class="author"><?php echo $teacher; ?></div>
                                <div class="description"><?php the_excerpt(); ?></div>
                                <?php if ($course_url): ?>
                                    <a href="<?php echo $course_url; ?>" class="btn goto">Fazer curso</a>
                                <?php endif; ?>
                                <?php
                                if ($couse_download->getFilePath(get_the_ID())):
                                    $download_url = $couse_download->getFileUrl(get_the_ID());
                                    ?>
                                    <a href="<?php echo $download_url ?>" class="btn download">Baixar o curso</a>
                                <?php endif; ?>

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
