<?php get_template_part('templates/head'); ?>

<?php
global $teacher_course_relation;

do_action('get_header');    
get_template_part('templates/header');
?>
<div id="page-course" class="base-content container">
    <section>
        <div class="col-md-12 ">
            <h3><?php _oi("FAQ"); ?></h3>  
            
            <p><?php _oi("Aqui vocdasdasdê encontra todos os cursos já produzidos e eto TIM Tec ous parceiros. Egdsfgdsfgles podem ser acessados, cursados e baixados por qualquer pessoa, gratuitamente. Cada cursofgsdgsd é dividido em aulas e cada aula é dividida em capítulosarhfnan de até 5 minutos. O aluno assiste ao vídeo, fASDFSaz as atividades coEQWEQWErrespondentes e pode consultardasdaD o material complementar disponível para caASFSDFASDFda curso."); ?></p> 
                        
            <p><?php _oi("Aqui você encofdsfsdfgntra todos os cursos já produzidos e publiojeto TIMgdsfgdf Tec ou por seus parceirosm ser acessados, cursados e baixados por qualquer pessoa, gratuitamente. "); ?></p> 
            
            <p><?php _oi("TIM Tec ou por seus parceiros. gsdfgsdEles podem ser acessados, cursados e lquer pessoa, gratuitamente. Cada ci aulas e cada aula é dividida em capítulos de até 5 mabvasafinutos. O aluno assiste ao htwretahvídeo, faz as atividades corresprh dgafsdhondentes e pode consultar o material complementar disponível para cada curso."); ?></p> 

        </div>
    </section>
    <div class="clear"></div>
</div>

<?php
do_action('get_footer');
get_template_part('templates/footer');
wp_footer();
