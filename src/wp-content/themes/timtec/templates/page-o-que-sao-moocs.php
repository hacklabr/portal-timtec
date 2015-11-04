<?php get_template_part('templates/head'); ?>

<?php
global $teacher_course_relation;

do_action('get_header');    
get_template_part('templates/header');
?>
<div id="page-course" class="base-content container">
    <section>
        <div class="col-md-12 ">
            <h3><?php _oi("O QUE SAO MOOCS?"); ?></h3>  
            
            <p><?php _oi("MOOC significa Massive Open Online Courses (cursos online abertos e massivos, em tradução livre). É uma nova forma de aprender e ampliar o conhecimento por meio de cursos que são disponibilizados em ambientes virtuais de aprendizagem."); ?></p> 
                        
            <p><?php _oi("Cursos MOOC podem ser focados nos mais variados temas, mas são sempre abertos e buscam envolver um grande número de alunos. "); ?></p> 
            
            <p><?php _oi("É uma modalidade de educação a distância, mas com suas próprias particularidades: os cursos são normalmente gratuitos e não exigem pré-requisitos.
Os MOOCs foram criados em 2007, nos Estados Unidos, e se popularizaram a partir de 2011, quando o professor Sebastian Thrun, da Universidade de Stanford, criou o curso “Introdução à Inteligência Artificial” em parceria com o diretor do Google Peter Norvig. O curso atraiu mais de 160 mil pessoas em todo o mundo e deu origem à plataforma Udacity. "); ?></p> 
            
            <p><?php _oi("Nesse mesmo período, outros professores de Stanford criaram o Coursera; pouco tempo depois, MIT e Harvard anunciaram a criação do Edx."); ?></p> 

            <p><?php _oi("O desenvolvimento das plataformas MOOC levou muitos educadores a apontar essa modalidade de ensino como uma verdadeira revolução digital na educação."); ?></p> 

            <p><?php _oi("TIM Tec é a primeira plataforma MOOC desenvolvida inteiramente no Brasil."); ?></p> 

            <span class="box"><?php _oi("TIM Tec também é o nome da primeira instalação do software TIM Tec, ou seja, a plataforma MOOC do Instituto TIM. Lá estão publicados todos os cursos já produzidos no projeto."); ?></span>

        </div>
    </section>
    <div class="clear"></div>
</div>

<?php
do_action('get_footer');
get_template_part('templates/footer');
wp_footer();
