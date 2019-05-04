<main class="front-page">
  <header class="header text-white d-flex">
    <div class="my-auto w-100 py-5 py-lg-0">
      <div class="container">
        <div class="row no-gutters">
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
          <div class="col-lg-5 d-flex text-center text-lg-left">
            <div class="my-auto w-100">
              <h1 class="header-text display-4 mb-4"><?php _e('Mobile app for meetings over your favorite drinks', 'skelvy'); ?></h1>
              <a href="#" class="btn btn-lg btn-outline-light mr-2">Google Play <i class="fab fa-google-play"></i></a>
              <a href="#" class="btn btn-lg btn-outline-light">App Store <i class="fab fa-app-store"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
</main>