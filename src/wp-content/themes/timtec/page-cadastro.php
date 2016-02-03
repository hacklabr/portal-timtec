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

    <section class="page-content">
        <div class="container">
            <form class="form-cadastro js-create-user-meta" method="post">
                <fieldset>
                    <legend><span>Crie uma conta</span></legend>
                    <p class="obrigatorios">* campos obrigatórios</p>
                    <div class="form-group">
                        <label for="nome">Nome completo *</label>
                        <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome completo" required>
                    </div>
                    <div class="form-group">
                        <label for="usuario">Nome de usuario *</label>
                        <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Nome de usuário" required>
                        <div class="mensagem_erro erro_usuario">Este nome de usuário já existe!<br />Por favor digite outro nome de usuário.</div>
                    </div>
                    <div class="form-group">
                        <label for="email">E-mail *</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="E-mail" required>
                        <div class="mensagem_erro erro_email">Este email já está em uso!<br />Por favor digite outro email.</div>
                    </div>
                    <div class="form-group">
                        <label for="confirmemail">Confirmar e-mail *</label>
                        <input type="email" class="form-control" id="confirmemail" name="confirmemail" placeholder="Confirmar e-mail" required>
                    </div>
                    <div class="form-group">
                        <label for="cidade">Estado *</label>
                        <input type="text" class="form-control" id="estado" name="estado" placeholder="Estado" required>
                    </div>
                    <div class="form-group">
                        <label for="cidade">Cidade *</label>
                        <input type="text" class="form-control" id="cidade" name="cidade" placeholder="Cidade" required>
                    </div>
                    <div class="form-group">
                        <label for="instituicao">Instituição</label>
                        <input type="text" class="form-control" id="instituicao" name="instituicao" placeholder="Instituição">
                    </div>
                    <div class="form-group">
                        <label for="senha">Senha *</label>
                        <input type="password" class="form-control" id="senha" name="senha" placeholder="Senha" required>
                    </div>
                    <div class="form-group">
                        <label for="senha">Repetir Senha *</label>
                        <input type="password" class="form-control" id="repetir_senha" name="repetir_senha" placeholder="Repetir Senha" required>
                    </div>
                    <button type="submit" class="btn btn-default btn-block">Criar conta</button>
                </fieldset>
            </form>
        </div>
    </section>
    <?php endwhile; // end of the loop. ?>
</div>
