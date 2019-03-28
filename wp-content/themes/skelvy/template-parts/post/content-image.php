<article id="post-<?php the_ID(); ?>" <?php post_class('article'); ?>>
  <?php
  skelvy_tags();
  skelvy_posted_on();
  skelvy_edit_link();
  the_title('<h1>', '</h1>');
  the_content();

  wp_link_pages(array(
      'link_before' => '<span class="page-number">',
      'link_after' => '</span>',
  ));
  ?>
</article>
