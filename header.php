<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <?php wp_head(); ?>

</head>

<body <?php body_class('transition'); ?>>

  <header class="header">
    <nav class="navigation">
      <div class="navigation__container container container--large">

        <a href="<?php echo site_url(); ?>" class="brand">
          <?php echo bloginfo('name'); ?>
        </a>

        <?php

          wp_nav_menu([
            'container' => 'div',
            'menu_class' => 'navigation__menu',
            'theme_location' => 'main-menu',
          ]);

        ?>

      </div>
    </nav>
  </header>

  <main class="container clearfix">

    <div class="slide"></div>
