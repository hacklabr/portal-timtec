<?php get_template_part('templates/head'); ?>

<?php
    do_action('get_header');    
    get_template_part('templates/header');
?>

<div id="page-conselho" class="base-content container">
    <section id="content-texto">
        <div class="col-md-12 ">
            <h3>
                <?php _oi("CONSELHO CONSULTIVO"); ?>
            </h3>  
            <p><?php _oi("O Conselho Consultivo TIM Tec foi criado em agosto de 2013, com função pedagógica e estratégica. Ele acompanhou a construção da plataforma e de suas funcionalidades, contribuiu para a definição dos cursos a serem produzidos, apontou caminhos e parcerias possíveis para o projeto, entre outras ações."); ?></p> 
            <p><?php _oi("Participaram do Conselho Consultivo TIM Tec acadêmicos, especialistas e profissionais com sólida experiência e formação em tecnologia, informação, comunicação, pedagogia e ensino a distância."); ?></p>
        </div>

    </section>
    <section class="list-conselho">
        <div class="col-md-12 ">
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
        </div>

    </section>
</div>

<?php
    do_action('get_footer');
    get_template_part('templates/footer');
    wp_footer();
