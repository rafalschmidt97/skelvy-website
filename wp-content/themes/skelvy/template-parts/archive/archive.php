<header class="header text-white text-center d-flex">
  <div class="my-auto w-100 py-5">
    <div class="container-fluid">
      <?php
      the_archive_title('<h1 class="display-4">', '</h1>');
      the_archive_description('<p class="mb-0">', '</p>');
      ?>
    </div>
  </div>
</header>
<main class="archive my-5">
  <div class="container-blog">
    <?php
    if (have_posts()) : ?><?php
      while (have_posts()) : the_post();
        get_template_part('template-parts/post/content', 'excerpt');
      endwhile;

      the_posts_pagination(array(
          'prev_text' => '<i class="fas fa-long-arrow-alt-left mr-2"></i> ' . __('Previous', 'skelvy'),
          'next_text' => __('Next', 'skelvy') . ' <i class="fas fa-long-arrow-alt-right ml-2"></i>',
      ));

    else :
      get_template_part('template-parts/post/content', 'none');
    endif; ?>
  </div>
</main>