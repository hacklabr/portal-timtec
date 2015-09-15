<?php get_template_part('templates/head'); ?>

<?php
do_action('get_header');    
get_template_part('templates/header');
?>
<div id="page-course">
    <section id="banner" class=" ">
        <div class="container">
            <div class="col-md-12 image">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/banner_cursos_v1.png" />
            </div>
            <div class="col-md-12 text">
                <h4 >
                    <?php _oi("Cadastro", "Cursos - Texto Banner"); ?>
                </h4>   
            </div>

        </div>
    </section>

    <section id="section1" class="">
        <div class="container"> 
            <div class="row text">
                <h2>
                    <?php _oi("Cadastre-se, para fazer o download dos cursos"); ?>
                </h2>
                <p><?php _oi("Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas id velit lobortis, ultricies magna porta, molestie diam. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas id velit lobortis, ultricies magna porta, molestie diam."); ?></p>
                <form>  
                    <input type="text" placeholder="Nome" />
                    <input type="email" placeholder="Email" />
                    <input type="text" placeholder="telefone" />
                    <input type="hidden" name="form_sent" value="true" />
                    <input type="hidden" name="id_user" value="" />
                </form>
                <a href="#" class="btn_cadastrese"><?php _oi("Enviar"); ?></a>
            </div>
        </div><!-- /container-->
    </section>

   
</div>

<?php
do_action('get_footer');
get_template_part('templates/footer');
wp_footer();
