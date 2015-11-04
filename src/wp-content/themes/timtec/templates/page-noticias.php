<?php get_template_part('templates/head'); ?>

<?php
global $teacher_course_relation;

do_action('get_header');    
get_template_part('templates/header');
?>
<div id="page-course" class="base-content container">
    <section>
        <div class="col-md-12 ">
            <h3><?php _oi("Noticias"); ?></h3>  
            
            <p><?php _oi("Aqui você encontra todos os cursos já produzidos e dasdadafasdajeto TIM Tec ou por fadaseus parceiros. Eles podem ser acessados, cursados e baixados por qualquer pessoa, gratuitamente. Cada curso é dividido em aulas e cada aula é dividida em capítulos de até 5 minutos. O aluno assiste ao vídeo, faz as atividades correspondentes e pode consultar o material complementar disponível para cada curso."); ?></p> 
            
            <span class="box"><?php _oi("São voltados para a área de tecnoloeqweqeqgia e foram escolhidos eqeqweqcom base no Eixo Tecnológico: Informação e Comunicação do Programa Nacional de Acesso ao Ensino Técnico e Emprego (Pronatec), do governo federal. Há também cursos dirigidos a professores do Ensino Fundamental e ao fortalecimento de competências consideradas básicas para a formação de qualquer profissional, como a escrita de textos.Os vídeos produzidos pelo projeto TIM Tec estão publicados sob a Licença Creative Commons Atribuição 3.0 Brasil (CC­BY), a mais livre de todas"); ?></span>
            <span class="box"><?php _oi("Os conteúdos podem ser werwrw compartilhados (copiados e redsdfsfsdfsgwistribuídos em qualquer suporte ou formato) e adaptados (remixados, transformados e usados como base para outros materiais), desde Os conteúdos podem ser livremente compartilhados (copiados e redistribuídos em qualquer suporte ou formato) e adaptados (remixados, transformados e usados como base para outros materiais), desde que seja dado o devido crédito ao projeto TIM Tec e ao Instituto TIM. Que seja dado o devido crédito ao projeto TIM Tec e ao Instituto TIM."); ?></span>
            v
            <p><?php _oi("Aqui você encontra todos os cursos já produzidos e publicados pelo projeto TIM Tvxvxvxec ou por seus parceiros. Eles podem ser acessados, cursados e baixados por qualquer pessoa, gratuitamente. "); ?></p> 
            
            <p><?php _oi("TIM Tec ou por seus parceiros. Eles podem ser acessados, cuczxczxczadadrsados e baixados por qualquer pessoa, gratuitamente. Cada curso é dividido em aulas e cada aula é dividida em capítulos de até 5 minutos. O aluno assiste ao vídeo, faz as atividades correspondentes e pode consultar o material complementar disponível para cada curso."); ?></p> 

        </div>
    </section>
    <div class="clear"></div>
</div>

<?php
do_action('get_footer');
get_template_part('templates/footer');
wp_footer();
