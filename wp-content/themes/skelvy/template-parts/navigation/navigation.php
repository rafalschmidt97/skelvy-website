<nav id="nav" class="navbar navbar-expand-md speed-3">
  <div class="container-fluid">
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

      $menu_name = 'languages';
      $locations = get_nav_menu_locations();
      $menu = wp_get_nav_menu_object($locations[$menu_name]);
      $menuitems = wp_get_nav_menu_items($menu->term_id, array('order' => 'DESC'));
      ?>

      <div class="dropdown">
        <div class="nav-link dropdown-toggle" id="languages" data-toggle="dropdown">
          <?php _e('Language', 'skelvy'); ?>
        </div>
        <div class="dropdown-menu dropdown-menu-right">
          <?php foreach ($menuitems as $item):
            $link = $item->url;
            $title = $item->title; ?>
            <a class="dropdown-item" href="<?php echo $link; ?>"><?php echo $title; ?></a>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</nav>