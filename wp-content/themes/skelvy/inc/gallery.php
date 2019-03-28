<?php
function skelvy_gallery_output($output, $attr, $instance ) {
  global $post, $wp_locale;
  $html5 = current_theme_supports( 'html5', 'gallery' );
  $atts = shortcode_atts( array(
      'order'      => 'ASC',
      'orderby'    => 'menu_order ID',
      'id'         => $post ? $post->ID : 0,
      'itemtag'    => $html5 ? 'figure'     : 'dl',
      'icontag'    => $html5 ? 'div'        : 'dt',
      'captiontag' => $html5 ? 'figcaption' : 'dd',
      'columns'    => 3,
      'size'       => 'thumbnail',
      'include'    => '',
      'exclude'    => '',
      'link'       => ''
  ), $attr, 'gallery' );
  $id = intval( $atts['id'] );
  if ( ! empty( $atts['include'] ) ) {
    $_attachments = get_posts( array( 'include' => $atts['include'], 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $atts['order'], 'orderby' => $atts['orderby'] ) );
    $attachments = array();
    foreach ( $_attachments as $key => $val ) {
      $attachments[$val->ID] = $_attachments[$key];
    }
  } elseif ( ! empty( $atts['exclude'] ) ) {
    $attachments = get_children( array( 'post_parent' => $id, 'exclude' => $atts['exclude'], 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $atts['order'], 'orderby' => $atts['orderby'] ) );
  } else {
    $attachments = get_children( array( 'post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $atts['order'], 'orderby' => $atts['orderby'] ) );
  }
  if ( empty( $attachments ) ) {
    return '';
  }
  if ( is_feed() ) {
    $output = "\n";
    foreach ( $attachments as $att_id => $attachment ) {
      $output .= wp_get_attachment_link( $att_id, $atts['size'], true ) . "\n";
    }
    return $output;
  }
  $itemtag = tag_escape( $atts['itemtag'] );
  $captiontag = tag_escape( $atts['captiontag'] );
  $icontag = tag_escape( $atts['icontag'] );
  $valid_tags = wp_kses_allowed_html( 'post' );
  if ( ! isset( $valid_tags[ $itemtag ] ) ) {
    $itemtag = 'dl';
  }
  if ( ! isset( $valid_tags[ $captiontag ] ) ) {
    $captiontag = 'dd';
  }
  if ( ! isset( $valid_tags[ $icontag ] ) ) {
    $icontag = 'dt';
  }
  $columns = intval( $atts['columns'] );
  $selector = "gallery-{$instance}";
  $gallery_style = '';

  $gallery_div = "<div id='$selector' class='gallery galleryid-{$id} row'>";
  $output = apply_filters( 'gallery_style', $gallery_style . $gallery_div );
  $i = 0;
  foreach ( $attachments as $id => $attachment ) {
    $attr = ( trim( $attachment->post_excerpt ) ) ? array( 'aria-describedby' => "$selector-$id" ) : '';
    $image_meta  = wp_get_attachment_metadata( $id );
    $image_output = "<a href='" . wp_get_attachment_url( $id ) . "' data-size='{$image_meta['width']}x{$image_meta['height']}'>" . wp_get_attachment_image($id, $atts['size'], false, $attr ) . "</a>";
    $bootstrap_columns = 12 / $columns;
    $output .= "<{$itemtag} class='gallery-item col-{$bootstrap_columns}'>";
    $output .= $image_output;
    if ( $captiontag && trim($attachment->post_excerpt) ) {
      $output .= "
			<{$captiontag} class='wp-caption-text gallery-caption' id='$selector-$id'>
			" . wptexturize($attachment->post_excerpt) . "
			</{$captiontag}>";
    }
    $output .= "</{$itemtag}>";
    if ( ! $html5 && $columns > 0 && ++$i % $columns == 0 ) {
      $output .= '<br style="clear: both" />';
    }
  }

  $output .= "</div>";
  return $output;
}
add_filter( 'post_gallery', 'skelvy_gallery_output', 10, 3);
