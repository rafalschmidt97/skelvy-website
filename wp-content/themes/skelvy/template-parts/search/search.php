<header class="header text-white text-center d-flex">
  <div class="my-auto w-100 py-5">
    <div class="container-fluid">
      <?php if (have_posts()) : ?>
        <h1 class="display-4"><?php printf(__('Search results for: %s', 'skelvy'), '<span>' . get_search_query() . '</span>'); ?></h1>
      <?php else : ?>
        <h1 class="display-4"><?php _e('Nothing found', 'skelvy'); ?></h1>
      <?php endif; ?>
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

      the_posts_pagination();

    else :
      get_template_part('template-parts/post/content', 'none');
    endif; ?>
  </div>
</main>