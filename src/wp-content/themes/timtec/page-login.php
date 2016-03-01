<?php
/*
* Template Name: Login Page
*/
?>

<?php
	do_action('get_header');
	get_template_part('templates/header');

	$header_text = trim(get_post_meta(get_the_ID(), 'header_text', true ));

	

?>
<div id="page-default-template" class="page-cadastro base-content">
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

	    	<h2><span>TIM</span>Tec</h2>

			<form name="loginform" class="form-cadastro" id="loginform" action="<?php echo get_option('home'); ?>/wp-login.php" method="post">
				<fieldset>
				<legend><span>Login</span></legend>
				<div class="form-group">
					<label>Nome *</label>
					<input type="text" name="log" class="form-control" id="user_login" value="" size="20" tabindex="10" />
				</div>
				<div class="form-group">
					<label>Senha *</label>
					<input type="password" name="pwd" id="user_pass" class="form-control" value="" size="20" tabindex="20" />
				</div>
				<p class="forgetmenot"><label><input name="rememberme" type="checkbox" id="rememberme" value="forever" tabindex="90" /> Lembrar-me</label></p>
				<?php 
					if(isset($_GET['login']) && $_GET['login'] == 'failed')
					{
				?>
						<div id="login-error" >
							<p><i class="fa fa-exclamation-triangle"></i> A senha ou usuário não existe.</p>
						</div>
				<?php
					}
				?>
				<p class="submit">
					<input type="submit" name="wp-submit" id="wp-submit" class="btn btn-default btn-block btn_azul" value="Iniciar sessão" tabindex="100" />
					<input type="hidden" name="redirect_to" value="<?php echo get_option('home'); ?>/wp-admin/" />
					<input type="hidden" name="testcookie" value="1" />
				</p>
				</fieldset>
				<hr>
			</form>
			<div class="form-cadastro infos-form">
				<a href="<?php echo get_option('home'); ?>/reset-login" title="Esqueceu sua senha? Clique aqui!">Esqueceu sua senha? Clique aqui!</a><br />
				<hr>
				<a href="<?php echo get_option('home'); ?>/cadastro" title="Cadastro">Clique aqui para fazer o Cadastro.</a><br />
				<span>O cadastro permite acessar os fóruns e baixar os cursos.</span>
			</div>
		</div>
    </section>
</div>