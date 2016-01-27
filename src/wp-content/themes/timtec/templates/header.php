<?php global $_MENUS; ?>
<header id="main-navbar" class="navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <h1 class="text-hide">
                <a class="brand" href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
                <a class="timtec" href="<?php echo esc_url(home_url('/')); ?>" > TIMTec</a>
            </h1>
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#main-navbar-collapse">
                <span class="sr-only">Alternar navegação</span>
                <span class="text">Menu</span>
            </button>
        </div>
        <nav class="collapse navbar-collapse navbar-nav" id="main-navbar-collapse">
            <div class="menu-menu-pt-container">
            <ul class="nav nav-pills" role="tablist">
                <li role="presentation" class="menu-item dropdown"> 
                    <a id="sobrebtn" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> 
                        Sobre 
                    </a>
                    <?php
                        wp_nav_menu(array(
                            'items_wrap' => '<ul id="menu1" class="dropdown-menu" aria-labelledby="sobrebtn">%3$s</ul>',
                            'link_before'     => '',
                            'link_after'      => '',
                            'container'       => '',
                            'theme_location'    => 'sobre-topo',
                        ));
                    ?>
                    
                </li>
                <li role="presentation" class="menu-item dropdown"> 
                    <a id="softwarenv" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> 
                        Software
                    </a>
                    <?php
                        wp_nav_menu(array(
                            'items_wrap' => '<ul id="menu2" class="dropdown-menu" aria-labelledby="softwarenv">%3$s</ul>',
                            'link_before'     => '',
                            'link_after'      => '',
                            'container'       => '',
                            'theme_location'    => 'software-topo', 
                        ));
                    ?>
                </li>
                <li role="presentation" class="menu-item dropdown"> 
                    <a id="cursonv" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> 
                        Cursos
                    </a>
                    <?php
                        wp_nav_menu(array(
                            'items_wrap' => '<ul id="menu3" class="dropdown-menu" aria-labelledby="cursonv">%3$s</ul>',
                            'link_before'     => '',
                            'link_after'      => '',
                            'container'       => '',
                            'theme_location'    => 'cursos-topo',
                        ));
                    ?>
                </li>
                <li role="presentation" class="menu-item dropdown"> 
                    <a id="redenv" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> 
                        Rede
                    </a>
                    <?php
                        wp_nav_menu(array(
                            'items_wrap' => '<ul id="menu4" class="dropdown-menu" aria-labelledby="redenv">%3$s</ul>',
                            'link_before'     => '',
                            'link_after'      => '',
                            'container'       => '',
                            'theme_location'    => 'rede-topo',
                        ));
                    ?>
                </li>
                <li class="menu-item menu-item-type-post_type menu-item-object-page"><a href="/pt/lista-de-noticias/">Notícias</a></li>
                <li class="menu-item menu-item-type-post_type menu-item-object-page"><a href="/pt/contato/">Contato</a></li>
            </ul>
            <!-- menu login/logado -->
            <div class="menu-login"><a href="" data-toggle="modal" data-target="#modal-login"><span class="icon"></span>Login</a></div>
            <div class="menu-logado"><a href="" data-toggle="modal" data-target="#modal-logado"><span class="icon">MM</span>Logado</a></div>
        </nav>
    </div>
</header>

<!-- modal login -->
<div class="modal modal-menu fade" id="modal-login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-container">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-triangle-up"></div>
        <div class="modal-content">
          <div class="modal-body">
            <h3><span>Login</span></h3>
            <h4>Olá, deseja entrar? ;)</h4>
            <form>
              <div class="form-group">
                <label for="emailornamelogin-email" class="sr-only">Email ou nome</label>
                <input type="email" class="form-control" id="login-email" placeholder="email ou nome">
              </div>
              <div class="form-group">
                <label for="login-password" class="sr-only">Password</label>
                <input type="password" class="form-control" id="login-password" placeholder="senha">
              </div>
              <button type="submit" class="btn">Iniciar Sessão</button>
            </form>
            <p>Faça o cadastro para acessar nossos fóruns e para poder baixar cursos. <a href="#">Clique aqui</a></p>
          </div>
        </div>
      </div>
    </div>
</div>

<!-- modal logado -->
<div class="modal modal-menu fade" id="modal-logado" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-container">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-triangle-up"></div>
        <div class="modal-content">
          <div class="modal-body">
            <h3>Olá, <span>Pessoa de Tal</span>, deseja sair? ;)</h3>
            <a href="#" class="btn btn-logout">Sim, quero me deslogar</a>
            <a href="#" class="btn btn-cancel">Cancelar</a>
            <div class="info">
                <div class="icon">MM</div>
                <div class="text"><span>Pessoa de Tal</span>, para acessar seus dados de perfil e editar <a href="">clique aqui</a>.</div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
