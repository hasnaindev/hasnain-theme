<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <?php wp_head(); ?>

</head>

<body <?php body_class('transition'); ?>>

  <header class="mb-6">
    <nav class="navbar theme-container theme-container--large" role="navigation" aria-label="main navigation">
      <div class="navbar-brand">
        <a class="navbar-item" href="<?php echo site_url(); ?>">
          <img src="<?php echo get_template_directory_uri() . '/static/images/logo-1.png'; ?>" />
        </a>

        <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
          <span aria-hidden="true"></span>
          <span aria-hidden="true"></span>
          <span aria-hidden="true"></span>
        </a>
      </div>
      <?php

        wp_nav_menu(array(
          'theme_location' => 'main-menu',
          'depth' => 0,
          'container' => false,
          'menu_class' => 'navbar-menu',
          'menu_id' => 'primary-menu',
          'walker' => new Hasnain\Walkers\Bulma(),
        ));

      ?>
    </nav>
  </header>

  <main class="theme-container mb-6">

    <div class="slide"></div>
