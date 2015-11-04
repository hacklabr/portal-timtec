<?php get_template_part('templates/head'); ?>

<?php
global $teacher_course_relation;

do_action('get_header');    
get_template_part('templates/header');
?>
<div id="page-course" class="base-content container">
    <section>
        <div class="col-md-12 ">
            <h3><?php _oi("Download"); ?></h3>  
            
            <p><?php _oi("TIM Tec é um software livre que pode ser instalado por qualquer pessoa ou organização – escolas, universidades, coletivos, empresas – gratuitamente. Mas para fazer isso é preciso ter conhecimentos de programação ou contar com a assistência de uma equipe de programadores."); ?></p> 

            <p><?php _oi("Quem instala TIM Tec tem total autonomia para alterar o código e fazer mudanças na sua versão da plataforma, de acordo com suas necessidades. Também pode adicionar à instalação os cursos já produzidos pelo projeto ou adicionar seus próprios cursos. Do ponto de vista da gestão de TI, TIM Tec é semelhante ao Moodle."); ?></p> 
            
            <span class="box"><?php _oi("A plataforma e os conteúdos de TIM Tec estão sendo compartilhados com instituições públicas de ensino por meio da Secretaria de Educação Profissional e Tecnológica do Ministério da Educação (Setec/MEC). Saiba mais sobre o projeto aqui (LINK PARA A PÁGINA ‘CONHEÇA TIM TEC’)"); ?></span>
        
            
            <p><?php _oi("Gostei, quero instalar TIM Tec. O que preciso fazer?"); ?></p> 
            
            <p><?php _oi("Para iniciar a instalação, é preciso baixar o pacote de dados contendo todas as informações sobre o código."); ?></p>

            <p><?php _oi("Para iniciar a instalação, é preciso baixar o pacote de dados contendo todas as informações sobre o código."); ?></p>  

        </div>
    </section>
    <div class="clear"></div>
</div>

<?php
do_action('get_footer');
get_template_part('templates/footer');
wp_footer();
