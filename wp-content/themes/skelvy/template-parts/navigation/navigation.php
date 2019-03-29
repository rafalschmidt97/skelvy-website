<nav id="nav" class="navbar navbar-expand-lg speed-3">
  <div class="container">
    <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>">
      <div class="logo">skelvy</div>
    </a>
    <button class="navbar-toggler pointer"
            type="button"
            data-toggle="collapse"
            data-target="#navbar">
      <i class="fas fa-bars text-white"></i>
    </button>
    <div id="navbar" class="collapse navbar-collapse">
      <?php
      wp_nav_menu(array(
          'theme_location' => 'top',
          'container' => false,
          'menu_class' => 'navbar-nav ml-auto',
      ));
      ?>
    </div>
  </div>
</nav>