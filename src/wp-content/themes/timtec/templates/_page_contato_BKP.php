<?php get_template_part('templates/head'); ?>

<?php
do_action('get_header');    
get_template_part('templates/header');
?>
<div id="page-contato" class="base-content">

    <section id="section1" class="">
        <div class="container"> 
            <div class="row ">
                <div class="col-md-8 text">
                    <h2><?php _oi("Contato"); ?></h2>
                    <p><?php _oi("Lorem ipsum dolor sit amet, consectetur, uneaml."); ?></p>
                    <div class="formulario">
                        <form>
                            <input type="text" name="nome" placeholder="Nome" class="nome">
                            <input type="email" name="email" placeholder="Email" class="email">
                            <input type="text" name="telefone" placeholder="+55 (XX) 99999-9999" class="telefone">
                            <textarea>Mensagem</textarea>
                            <input type="button" value="Enviar >" class="nome">
                        </form>
                    </div>
                </div>
                <div class="col-md-4 image">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/contato.png" />
                </div>
            </div>
        </div><!-- /container-->
    </section>
</div>

<?php
do_action('get_footer');
get_template_part('templates/footer');
wp_footer();
