<?php get_template_part('templates/head'); ?>

<?php
global $teacher_course_relation;

do_action('get_header');    
get_template_part('templates/header');
?>
<div id="page-course" class="base-content container">
    <section>
        <div class="col-md-12 ">
            <h3><?php _oi("MANUAIS DA PLATAFORMA"); ?></h3>  
            
            <p><?php _oi("Aqui você encontra manuais que irão ajudá-lo a navegar pela plataforma, e a instalar e desenvolver o software."); ?></p> 

            <p><?php _oi("Manuais de Uso – Estes manuais ajudam os futuros gestores da plataforma a entender de que forma podem melhor aproveitá-la e quais são suas funcionalidades."); ?></p> 

            <p><?php _oi("Manual de Instalação – Este manual aponta passos e caminhos possíveis para quem quer instalar a ferramenta."); ?></p> 

            <p><?php _oi("Manual de Tema – Esta manual é voltado para desenvolvedores que querem criar novos temas para a plataforma. Atualmente, a plataforma TIM Tec oferece dois temas."); ?></p> 

            
            <span class="box"><?php _oi("Uma forma interessante de conhecer a plataforma é acessar as demos do software. Você pode navegar usando quatro perfis diferentes: administrador, professor coordenador, professor assistente ou aluno."); ?></span>

            <span class="box"><?php _oi("A ferramenta TIM Tec é um software livre. Por isso, pode ser usada, compartilhada, modificada e instalada gratuitamente."); ?></span>

        </div>
    </section>
    <div class="clear"></div>
</div>

<?php
do_action('get_footer');
get_template_part('templates/footer');
wp_footer();
