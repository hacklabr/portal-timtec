<?php
/**
 * Template Name: Cadastro
 */
?>

<?php
do_action('get_header');
get_template_part('templates/header');

$header_text = trim(get_post_meta(get_the_ID(), 'header_text', true ));
?>
<div id="page-default-template" class="page-cadastro base-content">
    <?php while ( have_posts() ) : the_post(); ?>
    <div class="banner <?php if(!$header_text) echo "no-text"; ?>">
        <div class="container">
            <h2 class="title"><?php the_title(); ?></h2>
            <?php if($header_text): ?>
            <div class="info">
                <?php echo nl2br($header_text) ?>
            </div>
            <?php endif; ?>
        </div>
    </div>
    <?php
        $current_user = null;
        $user_id = null;
        $nome_completo = null;
        $nome_usuario = null;
        $email = null;
        $confirmar_email = null;
        $estado = null;
        $cidade = null;
        $instituicao = null;
        $editable = "";
        $attr_editable = "";

        if ( is_user_logged_in() ) {
            $current_user = wp_get_current_user();
            $user_id = $current_user->ID;
            $nome_completo = $current_user->display_name;
            $nome_usuario = $current_user->user_login;
            $email = $current_user->user_email;
            $confirmar_email = $current_user->user_email;
            $estado = get_user_meta( $user_id , 'estado' , true); 
            $cidade = get_user_meta( $user_id , 'cidade', true);
            $instituicao = get_user_meta( $user_id , 'instituicao' , true); 
            $editable = "not-editable";
            $attr_editable = 'disabled="disabled" readonly';
        }
    ?>

    <section class="page-content">
        <div class="container">
            <form class="form-cadastro js-create-user-meta" method="post">
                <fieldset>
                    <?php
                        if ( is_user_logged_in() ) {
                            echo "<legend><span>Edite sua conta</span></legend>";
                        }else{
                            echo "<legend><span>Crie uma conta</span></legend>";
                        }
                    ?>
                    

                    <p class="obrigatorios">* campos obrigatórios</p>
                    <div class="form-group">
                        <label for="nome">Nome completo *</label>
                        <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome completo" value="<?php echo $nome_completo; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="usuario">Nome de usuario *</label>
                        <input type="text" class="form-control <?php echo $editable; ?>" id="usuario" name="usuario" placeholder="Nome de usuário" value="<?php echo $nome_usuario; ?>" <?php echo $attr_editable; ?>>
                        <div class="mensagem_erro erro_usuario">Este nome de usuário já existe!<br />Por favor digite outro nome de usuário.</div>
                        <?php
                        if ( is_user_logged_in() ) {
                            echo '<span class="description- not-editable">Não é possível alterar nomes de usuário.</span>';
                        }
                        ?>
                    </div>
                    <div class="form-group">
                        <label for="email">E-mail *</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="E-mail" value="<?php echo $email; ?>" required>
                        <div class="mensagem_erro erro_email">Este email já está em uso!<br />Por favor digite outro email.</div>
                    </div>
                    <div class="form-group">
                        <label for="confirmemail">Confirmar e-mail *</label>
                        <input type="email" class="form-control" id="confirmemail" name="confirmemail" placeholder="Confirmar e-mail" value="<?php echo $email; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="cidade">Estado *</label>
                        <input type="text" class="form-control" id="estado" name="estado" placeholder="Estado" value="<?php echo $estado; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="cidade">Cidade *</label>
                        <input type="text" class="form-control" id="cidade" name="cidade" placeholder="Cidade" value="<?php echo $cidade; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="instituicao">Instituição</label>
                        <input type="text" class="form-control" id="instituicao" name="instituicao"  value="<?php echo $instituicao; ?>" placeholder="Instituição">
                    </div>
                    <div class="form-group">
                        <label for="senha">Senha <?php echo (!is_user_logged_in()) ? "*": ""; ?></label>
                        <input type="password" class="form-control" id="senha" name="senha" placeholder="Senha" <?php echo (!is_user_logged_in()) ? "required": ""; ?>>
                    </div>
                    <div class="form-group">
                        <label for="senha">Repetir Senha <?php echo (!is_user_logged_in()) ? "*": ""; ?></label>
                        <input type="password" class="form-control" id="repetir_senha" name="repetir_senha" placeholder="Repetir Senha" <?php echo (!is_user_logged_in()) ? "required": ""; ?>>
                    </div>
                    <?php
                        if ( is_user_logged_in() ) {
                    ?>
                        <button type="submit" class="btn btn-default btn-block">Editar conta</button>
                    <?php 
                        }else{
                    ?>
                       <button type="submit" class="btn btn-default btn-block">Criar conta</button>
                    <?php        
                        }
                    ?>
                    
                </fieldset>
            </form>
        </div>
    </section>
    <?php endwhile; // end of the loop. ?>
</div>
