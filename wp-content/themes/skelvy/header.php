<!doctype html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>
    <?php get_template_part('template-parts/navigation/navigation'); ?>