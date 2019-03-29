<main class="front-page">
  <header class="header text-white text-center d-flex">
    <div class="my-auto w-100 py-5 py-lg-0">
      <div class="container">
        <div class="row no-gutters">
          <div class="col-lg-5 d-flex">
            <div class="my-auto w-100">
              <h1 class="header-text display-4"><?php _e('Mobile app for meetings over beer or coffee', 'skelvy'); ?></h1>
            </div>
          </div>
          <div class="col-lg-7 d-lg-flex">
            <?php
            $current_language = '';

            switch (get_locale()) {
              case 'pl_PL':
                $current_language = "mockup-pl";
                break;
              default:
                $current_language = "mockup";
            }
            ?>
            <img src="<?php bloginfo( 'template_url' ); ?>/views/front-page/images/<?php echo $current_language ?>.png" class="mockup my-auto img-fluid">
          </div>
        </div>
      </div>
    </div>
  </header>
</main>