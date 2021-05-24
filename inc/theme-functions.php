<?php

  namespace Hasnain;

  /**
   * Adds theme support and registers nav menus,
   * callable for `after_setup_theme` action hook.
   *
   * @return void
   * @access public
   */
  function theme_setup(): void
  {
    add_theme_support('title-tag');

    add_theme_support('post-thumbnails');

    add_theme_support(
      'html5',
      array(
        'gallery',
        'caption',
        'search-form',
        'comment-list',
        'comment-form',
      ),
    );

    register_nav_menu(
      __('main-menu', 'hasnain'),
      __('Main navigation for them theme', 'hasnain'),
    );
  }

  /**
   * Adds sidebars to theme, call inside
   * `widgets_init` action hook.
   *
   * @return void
   * @access public
   */
  function widgets_init(): void
  {
    $sidebar = new Sidebar(
      'Primary Sidebar',
      'primary-sidebar',
      "Theme's primary sidebar",
    );

    $sidebar->register();
  }

  /**
   * Enqueue style and script assets for the theme,
   * call inside `wp_enqueue_scripts` action hook.
   *
   * @return void
   * @access public
   */
  function enqueue_assets(): void
  {
    /**
     * Creates instance of Enqueuer, passes it microtime by
     * default and converts it's type to string,
     * use `wp_get_theme()->get('Version')` instead of microtime
     * before going into production.
     */
    $enqueuer = new Enqueuer(wp_get_theme()->get('Version'));

    /**
     * Let's deregister some scripts that the
     * WordPress is registering by default.
     */
    $enqueuer->deregister_scripts(['jquery', 'wp-embed']);

    /**
     * Deregisters the block library, comment is
     * state the obvious, I know.
     */
    $enqueuer->dequeue_styles(['wp-block-library']);

    /**
     * Adding stylesheets, fonts, scripts and other assets
     * to the enqueuer and then enqueueing them, call
     * inside `init` action hook.
     */
    $enqueuer
      ->add_style('main', '/assets/styles/main.css')
      ->add_script('runtime', '/assets/scripts/runtime.js')
      ->add_script('main', '/assets/scripts/main.js')
      ->enqueue();

      wp_localize_script(
        'main',
        'THEME_REST',
        [
          'ajax_url' => admin_url('admin-ajax.php'),
        ],
      );
  }

  /**
   * Remove bloat that the WordPress theme injects by default,
   * i-e emojis, links, wordpress version etc.
   *
   * @return void
   * @access public
   */
  function remove_bloat(): void
  {
    /**
     * Removes WordPress Version, RSD link and wlwmanifest
     */
    remove_action('wp_head', 'wp_generator');
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wlwmanifest_link');

    /**
     * Removes WordPress shortlinks.
     */
    remove_action('wp_head', 'wp_shortlink_wp_head');

    /**
     * Removes REST API link from the head.
     */
    remove_action('wp_head', 'rest_output_link_wp_head', 10);

    /**
     * Remove all actions related to emojis.
     */
    remove_action('admin_print_styles', 'print_emoji_styles');
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
    remove_filter('the_content_feed', 'wp_staticize_emoji');
    remove_filter('comment_text_rss', 'wp_staticize_emoji');

    /**
     * Remove TinyMCE's emojis.
     */
    add_filter('emoji_svg_url', '__return_false');

    /**
     * Filter to remove the DNS prefetch.
     */
    // add_filter('tiny_mce_plugins', 'disable_emojicons_tinymce');
  }

  /**
   * Simply registers shortcodes, does not require any hooks.
   *
   * @return void
   */
  function register_shortcodes(): void
  {
    $shortcodes = [
      new Shortcodes\Image(),
      new Shortcodes\Newsletter(),
    ];

    foreach ($shortcodes as $shortcode) $shortcode->register();
  }

  /**
   * Gets a list of REST API routes which can be registered under
   * `wp_ajax_` and `wp_ajax_nopriv_` action hooks.
   *
   * @return array Tuples where [0] is route postfix, [1] is handler and [2] is whether route should be nopriv.
   */
  function get_rest_api_routes(): array
  {
    return [
      ['create_newsletter', '\Hasnain\REST\Newsletter::create', true],
    ];
  }
