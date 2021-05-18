<?php

  /**
   * This file will serve as a configuration file for the theme,
   * all the functions and classes needed for the theme
   * will be defined inside the `inc` folder and only
   * included or called here for initialization.
   */

  /**
   * Requiring autoloader.
   */
  require_once('inc' . DIRECTORY_SEPARATOR . 'autoloader.php');

  /**
   * Requiring theme functions.
   */
  require_once('inc' . DIRECTORY_SEPARATOR . 'theme-functions.php');

  /**
   * Add theme supports and nav menus.
   */
  add_action('after_setup_theme', 'Hasnain\theme_setup');

  /**
   * Add theme widgets.
   */
  add_action('widgets_init', 'Hasnain\widgets_init');

  /**
   * Enqueue theme assets.
   */
  add_action('wp_enqueue_scripts', 'Hasnain\enqueue_assets');

  /**
   * Removes WordPress theme bloat, this doesn't seem to have
   * significant impact on the load time of the website.
   */
  add_action('init', 'Hasnain\remove_bloat');

  /**
   * Registers shortcodes, since there is no hook for registering
   * shortcodes, we directly execute the function that is responsible
   * for adding or register shortcodes via `add_shortcode` function.
   */
  Hasnain\register_shortcodes();

  /**
   * Registering REST API routes.
   */
  $routes = Hasnain\get_rest_api_routes();

  foreach ($routes as $route)
  {
    add_action("wp_ajax_{$route[0]}", $route[1]);
    if ($route[2]) add_action("wp_ajax_nopriv_{$route[0]}", $route[1]);
  }

