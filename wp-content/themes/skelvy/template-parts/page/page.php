<?php while (have_posts()) : the_post(); ?>
  <?php if ('' !== get_the_post_thumbnail()) : ?>
    <header class="header text-white image" style="background-image: url('<?php the_post_thumbnail_url('featured'); ?>')"></header>
  <?php else: ?>
    <header class="header text-white text-center d-flex">
      <div class="my-auto w-100 py-5">
        <div class="container">
          <?php
          the_title('<h1 class="display-4 mb-0">', '</h1>');
          skelvy_edit_link();
          ?>
        </div>
      </div>
    </header>
  <?php endif; ?>

  <main class="post my-5">
    <div class="container">
      <?php
      get_template_part('template-parts/page/content', get_post_format());
      ?>
    </div>
  </main>
<?php endwhile; ?>
