<?php while (have_posts()) : the_post(); ?>
  <?php if ('' !== get_the_post_thumbnail() && get_post_format() == 'image') : ?>
    <header class="header image text-white d-flex" style="background-image: linear-gradient(rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.6)), url('<?php the_post_thumbnail_url('featured'); ?>')">
      <div class="my-auto w-100 py-5">
        <div class="container">
          <?php
          skelvy_tags();
          the_title('<h1 class="display-3 mb-0">', '</h1>');
          skelvy_posted_on();
          skelvy_edit_link();
          ?>
        </div>
      </div>
    </header>
  <?php else: ?>
    <header class="header"></header>
  <?php endif; ?>

  <main class="post my-5">
    <div class="container-blog">
      <?php
      get_template_part('template-parts/post/content', get_post_format());

      if (comments_open() || get_comments_number()) :
        comments_template();
      endif;

      the_post_navigation(array(
          'prev_text' => '<i class="fas fa-long-arrow-alt-left mr-2"></i> %title',
          'next_text' => '%title <i class="fas fa-long-arrow-alt-right ml-2"></i>',
      ));
      ?>
    </div>
  </main>
<?php endwhile; ?>
