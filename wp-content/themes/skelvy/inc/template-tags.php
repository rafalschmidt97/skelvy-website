<?php

if (!function_exists('skelvy_time_link')) :
  function skelvy_time_link() {
    $time_string = '<time datetime="%1$s">%2$s</time>';

    echo sprintf($time_string,
        get_the_date(DATE_W3C),
        get_the_date()
    );
  }
endif;

if (!function_exists('skelvy_edit_link')) :
  function skelvy_edit_link() {
    edit_post_link('<i class="far fa-edit mx-2"></i>');
  }
endif;

if (!function_exists('skelvy_posted_on')) :
  function skelvy_posted_on() {
    $byline = sprintf(
        __('by %s', 'skelvy'),
        '<span class="author vcard"><a class="url fn n" href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">' . get_the_author() . '</a></span>'
    );

    echo '<span class="posted-on">' . skelvy_time_link() . '</span><span class="byline"> ' . $byline . '</span>';
  }
endif;

if (!function_exists('skelvy_tags')) :
  function skelvy_tags() {
    $tags_list = get_the_tag_list();

    if ($tags_list) {
      echo '<div class="tags-links">';

      if ($tags_list && !is_wp_error($tags_list)) {
        echo $tags_list;
      }

      echo '</div>';
    }
  }
endif;

function skelvy_category_transient_flusher() {
  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
    return;
  }
  // Like, beat it. Dig?
  delete_transient('skelvy_categories');
}

add_action('edit_category', 'skelvy_category_transient_flusher');
add_action('save_post', 'skelvy_category_transient_flusher');
