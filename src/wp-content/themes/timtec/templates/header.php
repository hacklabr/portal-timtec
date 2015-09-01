<header id="main-navbar" class="navbar-inverse" role="navigation">
  <div class="container">
    <div class="navbar-header">
      <h1 class="text-hide">
        <a class="brand" href="<?= esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
        <a class="timtec" href="" > TIMTec</a>
      </h1>
    </div>
    <nav class="collapse navbar-collapse navbar-nav" id="main-navbar-collapse">
      <?php
      if (has_nav_menu('primary_navigation')) :
        wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']);
      endif;
      ?>
    </nav>
  </div>
</header>
