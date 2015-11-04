<?php get_template_part('templates/head'); ?>

<?php
global $teacher_course_relation;

do_action('get_header');    
get_template_part('templates/header');
?>
<div id="page-course" class="base-content container">
    <section>
        <div class="col-md-12 ">
            <h3><?php _oi("O que  os MOOCs"); ?></h3>  
            
            <p><?php _oi("Aqui  dasdadaos cursos já produzidos e pufdsfsafblicados pelo projeto TIM Tec ou por seus pfasdfaarceiros. Eles podem ser acessados, cursados e baixados por qualquer pessoa, gratuitamente. Cada curso é dividido em aulas e cadvzxcvza aula é dividida em capítulos de até 5 minutos. O aluno assiste ao vídeo, faz as atividades correspondentes e pode consultar o material complementar disponível para cadxcbcva curso."); ?></p> 
            
            <span class="box"><?php _oi("São voltadodasdas área de tecnologia e foram escolhidos com base no Eixo Tecnológico: Informação e Comunicação do Programa Nacional de Adasdacesso ao Ensino Técnico e Emprego (Pronatec), do governo federal. Há zcvxvtambém cursos dirigidos a professores do Ensino Fundamental e ao fortalecimento de competências consideradas básicas para a formação de qualquer profissional, como a escrita de textos.Os vídeos produzidos pelo projexcvbcxvto TIM Tec estão publicados sob a Licença bvcxbCreative Commons Atribuição 3.0 Brasil (CC­BY), a mais lixcvbxcvre de todas"); ?></span>
            <span class="box"><?php _oi("Os conteúdodasda podem ser compartilhados (copiados e redistribuídos em qualquer suporte ou formato) e adaptados (remixados, transformadodasds e usados como base para outros materiais), desde Os conteúdos podem vzxcvser livremente compartilhados (copiados e redistribuídos em qualquer suporte ou formato) e adaptados (remixados, transformados e usados como base para outros materiais), desde que seja dadoxbvcbxc o devido crédito ao projeto TIM Tec e ao Instituto TIvxcbxcvbxcM. Que seja dado o devido crédito ao projeto TIM Tec e ao Institbcxvbuto TIM."); ?></span>
            
            <p><?php _oi("Aqui você encontra todos os curafsdfsadfsos  e publicados pelo projeto TIM Tec ou por seusfasdfasdf parceiros. Eles podem ser acessados, cursados vzxvzxe baixados por qualquer pessoa, gratuitamente. "); ?></p> 
            
            <p><?php _oi("TIM Tec ou por seus parfasdfaceiros. acessados, cursados e baixados por qualquer pessoa, gratuitamente. Cada curso é dividido em aulas e cadazxvzx aula é dividida em capítulos de até 5 minutos. O aluno assiste ao vídeo, faz as atividades correspondentes e pode consultar o material complementar disponível para cada curso."); ?></p> 
           
            <span class="box"><?php _oi("São voltadodasdasds base no Eixo Tecnológico: Informação e Comunicação do Programa Nacional de Acesso ao Ensino Técnico e Edasdasdamprego (Pronatec), do governo federal. Há também cursos dirigidos a zvxzcvprofessores do Ensino Fundamental e ao fortalecimento de competências consideradas básicas para a formação de qualquer profissional, como a escrita de textos.Os vídeos produzidos pelo projeto TIM Tec estão publicados sob a Licença Creative Commons Atribuição bxcvbxcvb3.0 Brasil (CC­BY), a mais livre de todas"); ?></span>

        </div>
    </section>
    <div class="clear"></div>
</div>

<?php
do_action('get_footer');
get_template_part('templates/footer');
wp_footer();
