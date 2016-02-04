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

			<form name="lostpasswordform" class="form-cadastro"  action="<?php echo site_url('wp-login.php?action=lostpassword', 'login_post') ?>" method="post">			    
				<fieldset>
				<legend><span>Recuperar Senha</span></legend>
				<div class="form-group">
			        <label for="user_login">Digite o usuário ou email:</label>
			        <input type="text" name="user_login" id="user_login" class="form-control" value="">
			    </div>
			    <?php 
					if(isset($_GET['userexist']) && $_GET['userexist'] == 'emailfalse')
					{
				?>
						<div id="login-error" >
							<p><i class="fa fa-exclamation-triangle"></i> Este email não existe, cadastre-se por favor.</p>
						</div>
				<?php
					}else if(isset($_GET['userexist']) && $_GET['userexist'] == 'userfalse'){
				?>
					<div id="login-error" >
						<p><i class="fa fa-exclamation-triangle"></i> Este usuário não existe, cadastre-se por favor.</p>
					</div>
				<?php 
					}
				?>
			    <input type="hidden" name="redirect_to" value="/login/?action=forgot&success=1">
			    <p class="submit"><input type="submit" name="wp-submit" id="wp-submit" value="Gerar nova senha" class="btn btn-default btn-block btn_azul"/></p>
				<hr>
			</form>


			<div class="form-cadastro infos-form">
				<a href="<?php echo get_option('home'); ?>/login" title="Fazer login!">Fazer login!</a><br />
				<hr>
				<a href="<?php echo get_option('home'); ?>/cadastro" title="Cadastro">Clique aqui para fazer o Cadastro.</a><br />
				<span>O cadastro permite acessar os fóruns e baixar os cursos.</span>
			</div>
		</div>
		</fieldset>
    </section>
</div>