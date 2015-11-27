<header id="main-navbar" class="navbar-inverse" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <h1 class="text-hide">
                <a class="brand" href="<?= esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
                <a class="timtec" href="" > TIMTec</a>
            </h1>
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#main-navbar-collapse">
                <span class="sr-only">Alternar navegação</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <nav class="collapse navbar-collapse navbar-nav" id="main-navbar-collapse">
            <ul id="menu-menu-pt" class="nav">
                <li class="menu-item menu-item-type-post_type menu-item-has-children">
                    <a href="#">Sobre</a>
                    <?php
                    wp_nav_menu(array(
                        'items_wrap' => '<ul id="%1$s" class="sub-menu">%3$s</ul>',
                        'menu'    => 'sobre-topo',
//                        'walker'  => new MenuWalker_SubMenu() //use our custom walker
                    ));
                    ?>
                </li>
                <li class="menu-item menu-item-type-post_type menu-item-has-children">
                    <a href="#">Software</a>
                    <?php
                    wp_nav_menu(array(
                        'items_wrap' => '<ul id="%1$s" class="sub-menu">%3$s</ul>',
                        'menu'    => 'software-topo',
//                        'walker'  => new MenuWalker_SubMenu() //use our custom walker
                    ));
                    ?>
                </li>
                <li class="menu-item menu-item-type-post_type menu-item-has-children">
                    <a href="#">Cursos</a>
                    <?php
                    wp_nav_menu(array(
                        'items_wrap' => '<ul id="%1$s" class="sub-menu">%3$s</ul>',
                        'menu'    => 'cursos-topo',
//                        'walker'  => new MenuWalker_SubMenu() //use our custom walker
                    ));
                    ?>
                </li>
                <li class="menu-item menu-item-type-post_type menu-item-has-children">
                    <a href="#">Rede</a>
                    <?php
                    wp_nav_menu(array(
                        'items_wrap' => '<ul id="%1$s" class="sub-menu">%3$s</ul>',
                        'menu'    => 'rede-topo',
//                        'walker'  => new MenuWalker_SubMenu() //use our custom walker
                    ));
                    ?>
                </li>
                <li class="menu-item menu-item-type-post_type menu-item-object-page"><a href="http://timtec.hacklab.com.br/pt/noticias/">Notícias</a></li>
                <li class="menu-item menu-item-type-post_type menu-item-object-page"><a href="http://timtec.hacklab.com.br/pt/contato/">Contato</a></li>
            </ul>

        </nav>
    </div>
</header>
