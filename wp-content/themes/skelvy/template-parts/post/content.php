<article id="post-<?php the_ID(); ?>" <?php post_class('article'); ?>>
  <?php if ('' !== get_the_post_thumbnail()) : ?>
    <div class="post-thumbnail mb-5">
      <?php the_post_thumbnail('featured'); ?>
    </div>
  <?php endif;
  the_content();

  wp_link_pages(array(
      'link_before' => '<span class="page-number">',
      'link_after' => '</span>',
  ));
  ?>
</article>
