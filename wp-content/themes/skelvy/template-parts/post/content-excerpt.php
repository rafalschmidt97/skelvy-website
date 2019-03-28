<article id="post-<?php the_ID(); ?>" <?php post_class('article excerpt'); ?>>
  <?php
  if ('post' === get_post_type()) {
    skelvy_time_link();
  }

  skelvy_edit_link();
  the_title(sprintf('<h2><a href="%s">', esc_url(get_permalink())), '</a></h2>');
  the_excerpt();
  ?>
</article>
