<main class="front-page">
  <header class="header text-white d-flex">
    <div class="container">
      <div class="row h-100 no-gutters">
        <div class="col-xl-5 col-lg-4 d-flex text-center text-lg-left py-5 py-lg-0">
          <div class="my-auto w-100">
            <h1 class="header-text display-4 mb-4"><?php _e('Mobile app for meetings over your favorite drinks', 'skelvy'); ?></h1>
            <a href="https://play.google.com/store/apps/details?id=com.skelvy" target="_blank" class="btn btn-lg btn-outline-light mr-2 mb-lg-2 mb-0">Google Play <i class="fab fa-google-play"></i></a>
            <a href="https://itunes.apple.com/us/app/facebook/id1462518070" target="_blank" class="btn btn-lg btn-outline-light">App Store <i class="fab fa-app-store"></i></a>
          </div>
        </div>
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
        <div class="col-xl-7 col-lg-8 d-flex">
          <div class="mt-auto">
            <img class="mockup img-fluid" src="<?php bloginfo( 'template_url' ); ?>/views/front-page/images/<?php echo $current_language ?>.png'">
          </div>
        </div>
      </div>
    </div>
  </header>
</main>