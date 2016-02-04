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

			<h2><?php the_title(); ?></h2>

			<form name="loginform" id="loginform" action="<?php echo get_option('home'); ?>/wp-login.php" method="post">
				<p>
					<label>Nome<br />
					<input type="text" name="log" id="user_login" class="input" value="" size="20" tabindex="10" /></label>
				</p>
				<p>

					<label>Senha<br />
					<input type="password" name="pwd" id="user_pass" class="input" value="" size="20" tabindex="20" /></label>
				</p>
				<p class="forgetmenot"><label><input name="rememberme" type="checkbox" id="rememberme" value="forever" tabindex="90" /> Lembrar-me</label></p>
				<?php 
					if(isset($_GET['login']) && $_GET['login'] == 'failed')
					{
				?>
						<div id="login-error" >
							<p>A senha ou usuário não existe.</p>
						</div>
				<?php
					}
				?>
				<p class="submit">
					<input type="submit" name="wp-submit" id="wp-submit" class="button-primary" value="Iniciar Sessão" tabindex="100" />
					<input type="hidden" name="redirect_to" value="<?php echo get_option('home'); ?>/wp-admin/" />
					<input type="hidden" name="testcookie" value="1" />
				</p>
			</form>



			<a href="<?php echo get_option('home'); ?>/wp-login.php?action=lostpassword" title="Esqueceu sua senha? Clique aqui!">Esqueceu sua senha? Clique aqui!</a><br />
			<a href="<?php echo get_option('home'); ?>/cadastro" title="Cadastro">Clique aqui para fazer o Cadastro.</a><br />
			<span>O cadastro permite acessar os fóruns e baixar os cursos.</span>
		</div>
    </section>
</div>