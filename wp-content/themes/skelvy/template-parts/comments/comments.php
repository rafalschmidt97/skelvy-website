<?php
if (post_password_required()) {
  return;
}
?>

<div id="comments" class="comments-area">
  <?php
  if (have_comments()) : ?>
    <div class="comment-list">
      <?php
      wp_list_comments(array(
          'style' => 'div'
      ));
      ?>
    </div>

    <?php the_comments_pagination();

  endif;

  if (!comments_open() && get_comments_number() && post_type_supports(get_post_type(), 'comments')) : ?>
    <p class="no-comments">Comments are closed.</p>
  <?php
  endif;

  comment_form();
  ?>
</div>
