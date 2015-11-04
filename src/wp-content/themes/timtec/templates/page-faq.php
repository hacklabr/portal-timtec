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
            
            <h4>
                <?php _oi("Quem pode se inscrever nos cursos?"); ?>
            </h4>
            <p><?php _oi("Qualquer pessoa pode se inscrever nos cursos de TIM Tec, pois eles são livres e abertos. Mas fique atento: cada curso possui pré-requisitos de conhecimento, indicados nas descrições, para que os usuários tenham um melhor entendimento do conteúdo."); ?></p> 

            <h4>
                <?php _oi(" Os cursos são gratuitos?"); ?>
            </h4>
            <p><?php _oi("Sim, todos os cursos de TIM Tec são gratuitos."); ?></p> 

            <h4>
                <?php _oi("Como posso me inscrever nos cursos?"); ?>
            </h4>
            <p><?php _oi("Vá até a página “Lista de cursos”, selecione o curso de seu interesse e clique em “Fazer o curso”. Se você selecionar um curso que está publicado na plataforma MOOC TIM Tec, será direcionado para a página inicial do curso. Você vai precisar fazer um pequeno cadastro, clicando no botão “Cadastre-se”, no canto superior direito. Depois, é só clicar em “Ir para o curso”. Você terá acesso a todos os vídeos, materiais e exercícios para fazer o curso no seu ritmo e nos dias e horários que preferir."); ?></p> 


            <h4>
                <?php _oi("Como é a estrutura dos cursos?"); ?>
            </h4>
            <p><?php _oi("Cada curso possui sua própria estrutura, indicada na descrição. Mas todos envolvem aulas expositivas por vídeo, exercícios online e materiais para estudo."); ?></p> 

            <h4>
                <?php _oi("Qual é a carga horária dos cursos?"); ?>
            </h4>
            <p><?php _oi("Cada curso tem uma carga horária total de 40 horas (considerando os vídeos e o tempo estimado para o estudo do material e a realização dos exercícios). Mas essa definição varia conforme a instituição de ensino, já que cada uma tem suas próprias diretrizes sobre o de estudo tempo necessário para cursos na modalidade a distância."); ?></p> 

            <h4>
                <?php _oi("Quem pode se inscrever nos cursos?"); ?>
            </h4>
            <p><?php _oi("Qualquer pessoa pode se inscrever nos cursos de TIM Tec, pois eles são livres e abertos. Mas fique atento: cada curso possui pré-requisitos de conhecimento, indicados nas descrições, para que os usuários tenham um melhor entendimento do conteúdo."); ?></p> 

            
             <h4 class="subtitle">
                <?php _oi("O que preciso saber antes de fazer os cursos – conclusão e certificação"); ?>
            </h4>

            <h4>
                <?php _oi("Há certificação para quem finaliza os cursos?"); ?>
            </h4>
            <p><?php _oi("Como os cursos de TIM Tec são de caráter livre, não há certificação. Os usuários que completarem os cursos poderão baixar um atestado de horas digital disponibilizado na própria plataforma. Os alunos de instituições parceiras de TIM Tec (Rede e-Tec Brasil) devem consultar a instituição para verificar os requisitos necessários para receber uma certificação."); ?></p> 

            <h4>
                <?php _oi("Já concluí meu curso, mas não obtive o atestado de horas digital. Posso obtê-lo de forma retroativa?"); ?>
            </h4>
            <p><?php _oi("Sim. Basta acessar a plataforma com seu login e senha, selecionar o curso concluído e fazer o download do atestado de horas digital."); ?></p> 

            <h4>
                <?php _oi("Qual o prazo que tenho para concluir o curso?"); ?>
            </h4>
            <p><?php _oi("Não há um prazo determinado: você pode fazer o curso no tempo que preferir. Porém, o atestado de horas digital só será disponibilizado depois que você assistir a todas as aulas e completar todas as atividades."); ?></p> 

            <h4>
                <?php _oi("Há provas ou atividades para avaliar o desempenho do aluno?"); ?>
            </h4>
            <p><?php _oi("Não há provas e os alunos não são avaliados por seu desempenho. Entretanto, todos os cursos incluem atividades que devem ser completadas corretamente para a conclusão do curso. Os alunos de instituições parceiras de TIM Tec (Rede e-Tec Brasil) devem consultar a instituição para verificar se ela exige avaliações específicas."); ?></p> 

            <h4 class="subtitle">
                <?php _oi("Sou aluno/professor e tenho dúvidas sobre os cursos e a plataforma"); ?>
            </h4>
            <h4>
                <?php _oi(" Como posso entrar em contato com professores e colegas de curso para tirar dúvidas sobre o conteúdo?"); ?>
            </h4>
            <p><?php _oi("Os cursos de TIM Tec são no formato MOOC (cursos online abertos e massivos). Nesse formato não há tutores ou pessoas dedicadas a esclarecer dúvidas sobre o conteúdo. Você pode utilizar os fóruns dos cursos para discutir suas dúvidas e ideias com outras pessoas que estejam fazendo o curso, além de consultar os materiais de apoio disponíveis."); ?></p> 

            <h4>
                <?php _oi("Como fico sabendo do lançamento de novos cursos?"); ?>
            </h4>
            <p><?php _oi("Acompanhe o portal, o Facebook e o Twitter de TIM Tec. Os lançamentos de novos cursos são publicados imediatamente nesses canais."); ?></p> 

            <h4>
                <?php _oi("Estou com problemas para acessar a plataforma ou para entrar em contato pelo formulário. O que faço?"); ?>
            </h4>
            <p><?php _oi("Envie um e-mail para contato@timtec.com.br e informe o problema com detalhes. Se possível, inclua capturas de tela que mostrem o problema para que a equipe TIM Tec possa ajudá-lo com mais facilidade."); ?></p> 

            <h4>
                <?php _oi("Sou professor e gostaria de contribuir com um curso aberto na plataforma TIM Tec. É possível?"); ?>
            </h4>
            <p><?php _oi("Entre em contato com a equipe TIM Tec pelo e-mail contato@timtec.com.br para enviar sua proposta de curso."); ?></p> 

            <h4 class="subtitle">
                <?php _oi("O que preciso saber antes de utilizar os cursos de TIM Tec e instalar a ferramenta TIM Tec"); ?>
            </h4>
            <h4>
                <?php _oi("Posso instalar o software TIM Tec em minha instituição?"); ?>
            </h4>
            <p><?php _oi("Sim. A ferramenta TIM Tec é um software livre: pode ser instalado gratuitamente por qualquer pessoa ou organização – escolas, universidades, coletivos, empresas – que queira ter sua própria plataforma de cursos MOOC. O único requisito é ter um servidor compatível com a plataforma. Um técnico de informática ou administrador de sistema pode fazer essa instalação, seguindo as orientações que estão na página “Instale agora” (LINK). Entre em contato com a equipe de TIM Tec através do e-mail contato@timtec.com.br para mais informações."); ?></p> 

            <h4>
                <?php _oi("Posso disponibilizar os cursos de TIM Tec em meu site ou utilizá-los em minha plataforma MOOC?"); ?>
            </h4>
            <p><?php _oi("Sim. Os cursos de TIM Tec estão licenciados em Creative Commons, atribuição 4.0 internacional (CC BY 4.0). Isso significa que o conteúdo pode ser usado por qualquer pessoa ou organização da maneira que preferir, gratuitamente, desde que a fonte seja mencionada. TIM Tec disponibiliza os pacotes completos dos cursos. Você pode baixá-los na página “Lista de cursos” (LINK) e incorporá-los diretamente em seu site ou na sua plataforma. Assim, o curso já fica disponível por completo, incluindo todas as aulas separadas por assunto, materiais de apoio e exercícios."); ?></p> 

            <h4>
                <?php _oi("Quais instituições podem utilizar os cursos de TIM Tec e/ou instalar o software?"); ?>
            </h4>
            <p><?php _oi("Qualquer organização, seja uma instituição de ensino ou não, tanto públicas quanto privadas."); ?></p> 

            <h4>
                <?php _oi(" Se eu instalar a ferramenta TIM Tec, minha instituição vai ter uma plataforma própria e personalizada ou essa instalação será compartilhada com outras instituições?"); ?>
            </h4>
            <p><?php _oi("Quem instala TIM Tec tem sua própria plataforma de cursos MOOC personalizada, com autonomia de controle sobre cursos, turmas, professores e funcionalidades."); ?></p> 

            <h4>
                <?php _oi(" Posso acrescentar novos cursos na minha instalação ou devo utilizar apenas os cursos de TIM Tec?"); ?>
            </h4>
            <p><?php _oi("Fica a critério da instituição utilizar apenas cursos próprios, apenas cursos de TIM Tec ou ambos. Os pacotes e instruções para importar os cursos estão disponíveis"); ?></p> 

            <h4>
                <?php _oi(" PÉ possível importar cursos de outras plataformas MOOC para a plataforma que utiliza o software TIM Tec?"); ?>
            </h4>
            <p><?php _oi("Não é possível importar cursos de outras plataformas MOOC."); ?></p> 
            
            <h4>
                <?php _oi(" Posso acrescentar novos cursos na minha instalação ou devo utilizar apenas os cursos de TIM Tec?"); ?>
            </h4>
            <p><?php _oi("Fica a critério da instituição utilizar apenas cursos próprios, apenas cursos de TIM Tec ou ambos. Os pacotes e instruções para importar os cursos estão disponíveis"); ?></p> 


            <h4 class="subtitle">
                <?php _oi("O que preciso saber antes de usar os cursos e a ferramenta TIM Tec em meu site ou instituição – requisitos técnicos"); ?>
            </h4>
            <h4>
                <?php _oi("O software só pode ser instalado no Linux?"); ?>
            </h4>
            <p><?php _oi("De acordo com a documentação e o suporte atual do software, ele precisa ser instalado em um ambiente Linux. Para rodar em um servidor, a indicação é usar servidor Debian 8 ou Ubuntu 14.04 – pois a documentação do software tem suporte para estes dois tipos de servidores – mas nada impede que alguém tente fazer a instalação em outro sistema ou, ainda, numa máquina virtual web. Depois que o software for instalado, a plataforma pode ser acessada por qualquer pessoa conectada à internet."); ?></p> 


            
            <h4>
                <?php _oi(" Minha instituição precisa ter uma estrutura com antena parabólica ou outros equipamentos para ter acesso à plataforma?"); ?>
            </h4>
            <p><?php _oi("Não. A plataforma TIM Tec é, grosso modo, um portal com videoaulas hospedadas no YouTube. Para acessar a plataforma só é necessário ter uma conexão com a internet."); ?></p> 


            <h4>
                <?php _oi("É possível utilizar outras opções de hospedagem de vídeos ao invés do YouTube?"); ?>
            </h4>
            <p><?php _oi("Não, a plataforma foi desenvolvida para operar apenas com vídeos hospedados no YouTube."); ?></p> 


            <h4>
                <?php _oi("As plataformas que utilizam o software TIM Tec têm suporte para plug-ins?"); ?>
            </h4>
            <p><?php _oi("Não há suporte para plug-ins na plataforma."); ?></p> 

            <h4>
                <?php _oi("Existe algum fórum de discussão específico sobre o software TIM Tec?"); ?>
            </h4>
            <p><?php _oi("Sim, existe um Fórum dedicado ao software aqui mesmo, no portal TIM Tec"); ?></p> 

            <h4>
                <?php _oi("Quais são as especificações técnicas para produzir vídeos para a plataforma de minha instituição?"); ?>
            </h4>
            <p><?php _oi("Não há regras, mas a recomendação é que os cursos tenham duração média de 5 horas de vídeo. O curso é dividido em aulas, e cada aula é dividida em vídeos curtos, com duração de até 5 minutos. A soma do tempo de vídeo com o esforço acadêmico estimado para o estudo do material e a realização dos exercícios é de 40 horas. "); ?></p> 
    
                        
        </div>
    </section>
    <div class="clear"></div>
</div>

<?php
do_action('get_footer');
get_template_part('templates/footer');
wp_footer();
