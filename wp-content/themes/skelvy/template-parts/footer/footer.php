<footer class="footer border-top">
  <div class="container pt-5 pb-0 pb-xl-5">
    <div class="row">
      <div class="col-xl-2 col-lg-3 col-md-6 mb-lg-0 mb-3">
        <nav>
          <?php
          wp_nav_menu(array(
              'theme_location' => 'bottom_1',
              'container' => false,
              'menu_class' => 'nav flex-column',
          ));
          ?>
        </nav>
      </div>
      <div class="col-xl-2 col-lg-3 col-md-6 mb-lg-0 mb-3">
        <nav>
          <?php
          wp_nav_menu(array(
              'theme_location' => 'bottom_2',
              'container' => false,
              'menu_class' => 'nav flex-column',
          ));
          ?>
        </nav>
      </div>
      <div class="col-xl-2 col-lg-3 col-md-6 mb-md-0 mb-3">
        <nav>
          <?php
          wp_nav_menu(array(
              'theme_location' => 'bottom_3',
              'container' => false,
              'menu_class' => 'nav flex-column',
          ));
          ?>
        </nav>
      </div>
      <div class="col-xl-3 col-lg-3 col-md-6">
        <nav>
          <?php
          wp_nav_menu(array(
              'theme_location' => 'bottom_4',
              'container' => false,
              'menu_class' => 'nav flex-column',
          ));
          ?>
        </nav>
      </div>
      <div class="col-xl-3 col text-xl-right text-center align-self-end pt-5 pt-xl-0">
        <?php
        $menu_name = 'languages';
        $locations = get_nav_menu_locations();
        $menu = wp_get_nav_menu_object($locations[$menu_name]);
        $menuitems = wp_get_nav_menu_items($menu->term_id, array('order' => 'DESC'));
        ?>

        <div class="dropdown dropup d-none d-xl-block">
          <div class="nav-link" id="languages_footer" data-toggle="dropdown">
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
        <div class="nav-link copyright py-3 py-xl-0">
          &copy; <?php echo date("Y"); ?>
          <span class="text-primary font-weight-bold">Skelvy</span>
        </div>
      </div>
    </div>
  </div>
  <div id="cookie-info" class="border-top d-none">
    <div class="container">
      <div id="cookie-info-alert" class="alert mb-0 alert-dismissible" role="alert">
        <?php _e('We are using cookies. If you do not adjust your settings we assume that you are fine with this.', 'skelvy'); ?>
        <button type="button" class="close" data-dismiss="alert">
          <span>&times;</span>
        </button>
      </div>
    </div>
  </div>
</footer>
<?php get_template_part('template-parts/gallery/gallery'); ?>