<?php get_template_part('templates/head'); ?>

<?php
global $teacher_course_relation;

do_action('get_header');    
get_template_part('templates/header');
?>
<div id="page-course" class="base-content container">
    <section>
        <div class="col-md-12 ">
            <h3><?php _oi("Oão os MOOCs"); ?></h3>  
            
            <p><?php _oi("Aqui vodasdasdasdcê encontra todos os cursos já produzipelo projeto TIM Tec ou por seus parceiros. Eles podem sAGDFGDSFGer acessados, cursados e baixados por qualquer pessoa, gratuitamente. Cada curso é dividido em aulas e cadasfghfdghfd aula é dividida em capítulos de até 5 minutos. O aluno hdfghdfghvídeo, faz as atividades correspondentes e pode consultar o material complementar disponívesdfgsdfg cadabcxbx curso."); ?></p> 
                        
            <p><?php _oi("Aqui Asvocê encotryrthdfnbvnmsntra todos os cursos já produzicados pelo projeto TIM Tec ou por seus parceiros. Eles podem ser acessados, BVCNBJDGcursados e baixados por qualquer pessoa, gratuitamente. "); ?></p> 
            
            <p><?php _oi("TIM Tec ou por seus parce cursados e baixados por qualquer pessoa, gratuitamente. Cada curso é dividido em aulas e cada aula é dividida em capítulos de até 5 minutos. O aluno assiste ao vídeo, faz as atividades correspondentes e pode consultar o material complementar disponível para cada curso."); ?></p> 

        </div>
    </section>
    <div class="clear"></div>
</div>

<?php
do_action('get_footer');
get_template_part('templates/footer');
wp_footer();
