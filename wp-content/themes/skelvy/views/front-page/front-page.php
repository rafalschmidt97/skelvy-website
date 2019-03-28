<main class="front-page">
  <header class="header text-white text-center d-flex">
    <div class="my-auto w-100 py-5 py-lg-0">
      <div class="container">
        <div class="row no-gutters">
          <div class="col-lg-5 d-flex">
            <div class="my-auto w-100">
              <h1 class="font-weight-normal"><?php _e('We work really hard to deliver the app on time', 'skelvy'); ?></h1>
              <div id="timer" class="timer invisible">
                <span id="days">00</span>:<span id="hours">00</span>:<span id="minutes">00</span>:<span id="seconds">00</span>
              </div>
            </div>
          </div>
          <div class="col-lg-7 d-lg-flex">
            <?php
            $current_language = '';

            switch (get_locale()) {
              case 'pl_PL':
                $current_language = "mockup-pl";
                break;
              case 'cs_CZ':
                $current_language = "mockup-cs";
                break;
              case 'de_DE':
                $current_language = "mockup-de";
                break;
              case 'es_ES':
                $current_language = "mockup-es";
                break;
              case 'fr_FR':
                $current_language = "mockup-fr";
                break;
              case 'it_IT':
                $current_language = "mockup-it";
                break;
              case 'pt_PT':
                $current_language = "mockup-pt";
                break;
              case 'ru_RU':
                $current_language = "mockup-ru";
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
<script type="text/javascript" src="<?php bloginfo( 'template_url' ); ?>/views/front-page/front-page.js"></script>