<article id="page-<?php the_ID(); ?>" <?php post_class('article'); ?>>
  <?php
  if ('' !== get_the_post_thumbnail()) {
    skelvy_edit_link();
    the_title('<h1>', '</h1>');
  }

  the_content();

  wp_link_pages(array(
      'link_before' => '<span class="page-number">',
      'link_after' => '</span>',
  ));
  ?>
</article>
