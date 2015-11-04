<?php get_template_part('templates/head'); ?>

<?php
global $teacher_course_relation;

do_action('get_header');    
get_template_part('templates/header');
?>
<div id="page-course" class="base-content container">
    <section>
        <div class="col-md-12 ">
            <h3><?php _oi("CONHEÇA TIM TEC"); ?></h3>  
            
            <p><?php _oi("TIM Tec é uma iniciativa do Instituto TIM baseada em três pilares: software livre, produção de cursos e parcerias com instituições de ensino. O projeto começou em 2013 com o objetivo de desenvolver uma plataforma virtual que disponibilizasse cursos online, livres e gratuitos sobre tecnologia, produzidos especialmente para esse fim."); ?></p> 

            <p><?php _oi("Com o tempo, esse objetivo foi ampliado. Hoje, a plataforma e os conteúdos de TIM Tec estão sendo compartilhados com instituições federais de ensino por meio da Secretaria de Educação Profissional e Tecnológica do Ministério da Educação (Setec/MEC). As instituições parceiras conhecem o projeto, instalam o software e, se quiserem, podem adicionar os cursos de TIM Tec ou seus próprios cursos à plataforma."); ?></p> 
            
            <p><?php _oi("TIM Tec é uma plataforma no estilo MOOC. Qualquer pessoa pode acessá-la e fazer os cursos gratuitamente. Ao mesmo tempo, TIM Tec é um software livre que pode ser usado por escolas, universidades, coletivos – cada instituição pode ter sua própria instalação, totalmente autônoma, da plataforma. O software pode ser baixado, instalado, modificado, melhorado, alterado (desde que os programadores envolvidos conheçam sua linguagem). Os cursos de TIM Tec são licenciados em Creative Commons e também podem ser utilizados livremente."); ?></p> 
            
            <span class="box"><?php _oi("MOOC é a sigla para Massive Open Online Courses, uma modalidade de educação a distância que oferece cursos livres, abertos e gratuitos em ambientes virtuais."); ?></span>

            <span class="box"><?php _oi("Software livre é aquele que permite que sejam feitas adaptações ou modificações em seu código de forma espontânea, ou seja, sem a permissão de seu proprietário. Vale lembrar que só consegue modificar o código de um software quem possui conhecimento em programação de sistemas."); ?></span>
            
            <p><?php _oi("O Instituto TIM acredita que inovações tecnológicas são a base de uma nova forma de trabalho; por isso, investe na criação e democratização de recursos e estratégias que promovam a inclusão tecnológica produtiva das pessoas – como é o caso de TIM Tec. O projeto contribui para ampliar a oferta gratuita de cursos técnicos, de formação inicial e continuada ou de qualificação profissional à distância."); ?></p> 
            
            <p><?php _oi("Seja bem-vindo e fique à vontade!"); ?></p> 
           
            <span class="box"><?php _oi("O Instituto TIM tem a missão de criar e potencializar recursos e estratégias para a democratização da ciência, tecnologia e inovação e a a promoção do desenvolvimento humano."); ?></span>

        </div>
    </section>
    <div class="clear"></div>
</div>

<?php
do_action('get_footer');
get_template_part('templates/footer');
wp_footer();
