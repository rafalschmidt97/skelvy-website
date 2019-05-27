<article id="post-<?php the_ID(); ?>" <?php post_class('article'); ?>>
  <?php
  the_content();
  wp_link_pages(array(
      'link_before' => '<span class="page-number">',
      'link_after' => '</span>',
  ));
  ?>
</article>
