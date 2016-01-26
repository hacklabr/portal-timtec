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
                <li class="dropdown"> 
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
                <li role="presentation" class="dropdown"> 
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
                <li role="presentation" class="dropdown"> 
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
                <li role="presentation" class="dropdown"> 
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
            </div>
        </nav>
    </div>
</header>
