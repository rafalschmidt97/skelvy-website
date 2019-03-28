<?php

function theme_suport() {
  load_theme_textdomain( 'skelvy', get_template_directory() . '/languages' );
  add_theme_support('automatic-feed-links');
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
  add_image_size('featured', 1920, 1200, true);
  register_nav_menus(array(
      'top' => 'Top Menu',
      'bottom_1' => 'Bottom Menu 1',
      'bottom_2' => 'Bottom Menu 2',
      'bottom_3' => 'Bottom Menu 3',
      'bottom_4' => 'Bottom Menu 4',
      'languages' => 'Languages',
  ));
  add_theme_support('html5', array(
      'comment-form',
      'comment-list',
      'gallery',
      'caption',
  ));
  add_theme_support('post-formats', array(
      'image',
  ));
  add_theme_support('custom-logo', array(
      'width' => 250,
      'height' => 250,
      'flex-width' => true,
  ));
  add_theme_support('customize-selective-refresh-widgets');
}

add_action('after_setup_theme', 'theme_suport');

function skelvy_excerpt_more($link) {
  if (is_admin()) {
    return $link;
  }

  $link = sprintf('<div><a href="%1$s" class="btn btn-primary">%2$s</a></div>',
      esc_url(get_permalink(get_the_ID())),
      __('Read more', 'skelvy')
  );
  return '... ' . $link;
}

add_filter('excerpt_more', 'skelvy_excerpt_more');

function skelvy_pingback_header() {
  if (is_singular() && pings_open()) {
    printf('<link rel="pingback" href="%s">' . "\n", get_bloginfo('pingback_url'));
  }
}

add_action('wp_head', 'skelvy_pingback_header');

function skelvy_scripts() {
  wp_enqueue_style('skelvy-style', get_stylesheet_uri(), null, '0.0.0');
  wp_enqueue_script( 'skelvy-scripts', get_theme_file_uri( 'scripts.js' ), null, '0.0.0', true );

  if (is_customize_preview()) {
    wp_enqueue_style('skelvy-ie9', get_theme_file_uri('/fix/ie9.css'), array('skelvy-style'), '1.0');
    wp_style_add_data('skelvy-ie9', 'conditional', 'IE 9');
  }

  wp_enqueue_style('skelvy-ie8', get_theme_file_uri('/fix/ie8.css'), array('skelvy-style'), '1.0');
  wp_style_add_data('skelvy-ie8', 'conditional', 'lt IE 9');

  wp_enqueue_script('html5', get_theme_file_uri('/fix/html5.js'), array(), '3.7.3');
  wp_script_add_data('html5', 'conditional', 'lt IE 9');

  wp_enqueue_script('skelvy-skip-link-focus-fix', get_theme_file_uri('/fix/skip-link-focus-fix.js'), array(), '1.0', true);

  if (is_singular() && comments_open() && get_option('thread_comments')) {
    wp_enqueue_script('comment-reply');
  }
}

add_action('wp_enqueue_scripts', 'skelvy_scripts');

function skelvy_front_page_template($template) {
  return is_home() ? '' : $template;
}

add_filter('frontpage_template', 'skelvy_front_page_template');

function skelvy_widget_tag_cloud_args($args) {
  $args['largest'] = 1;
  $args['smallest'] = 1;
  $args['unit'] = 'em';
  $args['format'] = 'list';

  return $args;
}

add_filter('widget_tag_cloud_args', 'skelvy_widget_tag_cloud_args');

function skelvy_nav_menu_css_class($classes, $item, $args, $depth) {
  $classes[] = 'nav-item';
  return $classes;
}
add_filter('nav_menu_css_class', 'skelvy_nav_menu_css_class', 10, 4);

function skelvy_wp_nav_menu($ulclass) {
  return preg_replace('/<a /', '<a class="nav-link" ', $ulclass);
}
add_filter('wp_nav_menu', 'skelvy_wp_nav_menu');

function skelvy_gallery_default_type_set_link( $settings ) {
  $settings['galleryDefaults']['link'] = 'file';
  return $settings;
}
add_filter( 'media_view_settings', 'skelvy_gallery_default_type_set_link');

function skelvy_remove_columns($columns) {
  unset( $columns['wpseo-score-readability']);
  unset( $columns['wpseo-score']);
  unset( $columns['wpseo-links']);
  unset( $columns['tags'] );
  unset( $columns['comments'] );
  return $columns;
}

add_filter ('manage_edit-post_columns', 'skelvy_remove_columns');
add_filter ('manage_edit-page_columns', 'skelvy_remove_columns');

require('inc/template-tags.php');
require('inc/gallery.php');
