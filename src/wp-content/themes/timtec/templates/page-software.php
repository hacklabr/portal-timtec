<?php get_template_part('templates/head'); ?>

<?php
do_action('get_header');    
get_template_part('templates/header');
?>
<div id="page-software" class="base-content">
    <section id="banner" class=" ">
        <div class="container">
            <div class="col-md-12 image">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/ilustra-curso-curso.png" />
            </div>
            <div class="col-md-12 text">
                <h4 >
                    <?php _oi("Lorem ipsum dolor sit amet, consectetur", "Cursos - Texto Banner"); ?>
                </h4>   
            </div>
            <span class="icon-seta fa fa-angle-down"></span>
        </div>
    </section>

    <section id="section1" class="">
        <div class="container"> 
            <div class="row text">
                <h2>
                    <?php _oi("Sobre o software"); ?>
                </h2>
                <p><?php _oi("Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas id velit lobortis, ultricies magna porta, molestie diam. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas id velit lobortis, ultricies magna porta, molestie diam."); ?></p>
                <a href="#" class="btn "><?php _oi("Saiba mais"); ?></a>
            </div>
        </div><!-- /container-->
    </section>

    <section id="section2" class="">
        <div class="container"> 
            <div class="row text">
                <h2>
                    <?php _oi("Funcionalidades"); ?>
                </h2>
                <p><?php _oi("Lorem ipsum dolor sit amet, consectetur adipiscing elit."); ?></p>
                <ul>
                    <li><?php _oi("Lorem ipsum dolor sit amet bas."); ?></li>
                    <li><?php _oi("Lorem ipsum dolor sit am."); ?></li>
                    <li><?php _oi("Lorem ipsum dolor sit amt."); ?></li>
                    <li><?php _oi("Lorem ipsum dolor sit asr."); ?></li> 
                </ul>
            </div>
        </div><!-- /container-->
    </section>
    <section id="section3" class="">
        <div class="container">
            <div class="row">
                <div class="text">
                    <div class="icon">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/curso-cursos.png" />
                    </div>
                    <h2>
                        <?php _oi("Demos"); ?>
                    </h2>
                    <p><?php _oi("Aprenda a montar seu próprio curso com a teconologia de ponta do TIMTec."); ?></p>
                    <ul>
                        <li>
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/demo-alunos.png" />
                            <p><?php _oi("Aluno"); ?></p>
                        </li>
                        <li>
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/demo-admin.png" />
                            <p><?php _oi("Administrador"); ?></p>
                        </li>
                        <li>
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/demo-assistente.png" />
                            <p><?php _oi("Professor Assistente"); ?></p>
                        </li>
                        <li>
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/demo-professor.png" />
                            <p><?php _oi("Professor Orientador"); ?></p>
                        </li>

                    </ul>
                </div>
            </div>      
        </div><!-- /container-->
    </section>
    <section id="section4" class="">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text">
                     <h2>
                        <?php _oi("Instale agora"); ?>
                    </h2>
                    <p><?php _oi("Aprenda a montar seu próprio curso com a teconologia de ponta do TIMTec. "); ?></p>
                    <a href="#" class="btn_branco"><?php _oi("Faça o download"); ?></a>
                    <a href="#" class="btn_branco"><?php _oi("Acesse a documentação"); ?></a>
                </div>
                <div class="col-md-6 image">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/software-ilustra-inferior.png" />
                </div>

            </div>      
        </div><!-- /container-->
    </section>
    <section id="section5" class="">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text">
                     <h2>
                        <?php _oi("Desenvolvimento"); ?>
                    </h2>
                    <p><?php _oi("Aprenda a montar seu próprio curso com a teconologia de ponta do TIMTec. Aprenda a montar seu próprio curso com a teconologia de ponta do TIMTec.Aprenda a montar seu próprio curso com a teconologia de ponta do TIMTec."); ?></p>
                    <a href="#" class="btn_transparent"><?php _oi("+ Documentação do desenvolvimento"); ?></a>
                    <a href="#" class="btn_transparent"><?php _oi("Chat do desenvolvimento"); ?></a>
                    <a href="#" class="btn_transparent"><?php _oi("Código(GITHUB)"); ?></a>
                    <a href="#" class="btn_transparent"><?php _oi("ISSUES (GITHUB)"); ?></a>
                    <a href="#" class="btn_transparent"><?php _oi("Tradução"); ?></a>
                    <a href="#" class="btn_transparent"><?php _oi("Fórum"); ?></a>
                </div>
            </div>      
        </div><!-- /container-->
    </section>
</div>

<?php
do_action('get_footer');
get_template_part('templates/footer');
wp_footer();
