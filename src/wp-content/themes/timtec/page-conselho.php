<?php
/**
 * Template Name: Conselho
 */
?>

<?php
    do_action('get_header');    
    get_template_part('templates/header');
?>

<div id="page-default-template" class="page-about page-conselho base-content">
    <div class="banner <?php if(!$header_text) echo "no-text"; ?>">
        <div class="container">
            <h2 class="title"><?php _e("Sobre"); ?> <span class="subtitle">[<?php the_title(); ?>]</span></h2>
        </div>
    </div>
    <section class="page-content">
        <div class="container">

            <section id="content-texto">
                <p><?php _oi("O Conselho Consultivo TIM Tec foi criado em agosto de 2013, com função pedagógica e estratégica. Ele acompanhou a construção da plataforma e de suas funcionalidades, contribuiu para a definição dos cursos a serem produzidos, apontou caminhos e parcerias possíveis para o projeto, entre outras ações."); ?></p> 
                <p><?php _oi("Participaram do Conselho Consultivo TIM Tec acadêmicos, especialistas e profissionais com sólida experiência e formação em tecnologia, informação, comunicação, pedagogia e ensino a distância."); ?></p>
            </section>

            <section class="list-conselho">
                <ul>
                    <?php
                    $args = array(
                        'posts_per_page' => -1,
                        'post_type' => 'conselho'
                    );
                    $loop_courses = new WP_Query($args);

                    while ($loop_courses->have_posts()) : $loop_courses->the_post();
                    $url = get_the_permalink();
                    $thumb = wp_get_attachment_url(get_post_thumbnail_id());
                    $title = get_the_title();

                    ?>
                    <li>
                        <img src="<?php echo $thumb ?>" alt="<?php echo $title ?>"  title="<?php echo $title ?>">
                        <h4><?php echo $title ?></h4>
                        <?php echo the_excerpt(); ?>
                    </li>
                    <?php
                    endwhile;
                    wp_reset_query();
                    ?>
                </ul>
            </section>
        </div>
    </section>
</div>