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
                <ul id="menu-menu-pt" class="nav">
                    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children">
                        <a>Sobre</a>
                        <?php
                        wp_nav_menu(array(
                            'items_wrap' => '<ul id="%1$s" class="sub-menu">%3$s</ul>',
                            'theme_location'    => 'sobre-topo',
                        ));
                        ?>
                    </li>
                    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children">
                        <a>Software</a>
                        <?php
                        wp_nav_menu(array(
                            'items_wrap' => '<ul id="%1$s" class="sub-menu">%3$s</ul>',
                            'theme_location'    => 'software-topo',
                        ));
                        ?>
                    </li>
                    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children">
                        <a>Cursos</a>
                        <?php
                        wp_nav_menu(array(
                            'items_wrap' => '<ul id="%1$s" class="sub-menu">%3$s</ul>',
                            'theme_location'    => 'cursos-topo',
                        ));
                        ?>
                    </li>
                    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children">
                        <a>Rede</a>
                        <?php
                        wp_nav_menu(array(
                            'items_wrap' => '<ul id="%1$s" class="sub-menu">%3$s</ul>',
                            'theme_location'    => 'rede-topo',
                        ));
                        ?>
                    </li>
                    <li class="menu-item menu-item-type-post_type menu-item-object-page"><a href="/pt/lista-de-noticias/">Notícias</a></li>
                    <li class="menu-item menu-item-type-post_type menu-item-object-page"><a href="/pt/contato/">Contato</a></li>
                </ul>
            </div>
        </nav>
    </div>
</header>
