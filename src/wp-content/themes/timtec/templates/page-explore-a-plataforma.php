<?php get_template_part('templates/head'); ?>

<?php
global $teacher_course_relation;

do_action('get_header');    
get_template_part('templates/header');
?>
<div id="page-course" class="base-content container">
    <section>
        <div class="col-md-12 ">
            <h3><?php _oi("EXPLORE A PLATAFORMA"); ?></h3>  
            
            <p><?php _oi("Como todo MOOC, TIM Tec pode ser utilizado por muitas pessoas ao mesmo tempo. A plataforma é responsiva e leve: os vídeos ficam hospedados no Youtube, por isso, não é preciso ter um servidor pesado para assisti-los."); ?></p> 

            <p><?php _oi("A ferramenta foi concebida desde a raiz para ser replicada e adotada por instituições de ensino. Ela possui diversas funcionalidades específicas para a gestão de estudantes. É possível criar turmas (cada curso pode ter sua própria divisão de turmas) e atribuir diferentes perfis para professores (professor coordenador e professor assistente). Para os educadores, fica fácil acompanhar o progresso dos estudantes, saber os cursos e atividades que cada um fez e inserir atividades novas e materiais adicionais além daqueles que já estão na plataforma. Além disso, os professores podem interagir direto com os alunos por meio de mensagem privada."); ?></p>

            <p><?php _oi("A plataforma permite gerar certificados de conclusão do curso e atestados de horas. TIM Tec fornece os esqueletos desses documentos, e os professores os complementam incluindo o logo da instituição de ensino, nome, assinatura, data, etc. Outra funcionalidade é que os cursos podem ser facilmente exportados e importados entre instituições. Dá para exportar um curso, gerando um pacote que mantém todas as configurações, e enviá-lo para que outras instituições o utilizem nas suas instalações da plataforma TIM Tec"); ?></p>  
                                  
            <p><?php _oi("Quem faz o curso pode assistir às aulas em qualquer ordem, onde quiser e na hora que quiser, e assistir novamente a aulas já vistas. Os vídeos sempre iniciam e encerram um assunto; por isso, dá para ir direto ao vídeo relacionado ao tema de interesse. Há um espaço ao lado do vídeo em que o estudante pode fazer anotações enquanto assiste à aula. Cada curso tem a sua lista de materiais didáticos (uma espécie de bibliografia básica) e cada aula possui material adicional. No fórum, os estudantes podem interagir, discutir sobre o curso e trocar experiências com outros usuários da plataforma."); ?></p> 
            
        </div>
    </section>
    <div class="clear"></div>
</div>

<?php
do_action('get_footer');
get_template_part('templates/footer');
wp_footer();
