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
      // ->add_style('main', '/assets/styles/main.css')
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
   * Echo critical CSS in order to prevent thread blocking,
   * this theme has around 2 KBs of styles, hence we don't
   * need to handpick critical CSS, call inside `wp_head`
   * action hook.
   *
   * @return void
   * @access public
   */
  function print_critical_css(): void
  {
    echo "<style>.slide-enter-active,.slide-leave-active{overflow:hidden;transition:max-height 0.6s cubic-bezier(0.65, 0, 0.35, 1)}.slide-enter-to,.slide-leave{overflow:hidden}.slide-enter,.slide-leave-to{max-height:0;overflow:hidden}.barba-leave-active,.barba-enter-active,.barba-leave-active .slide,.barba-enter-active .slide{transition:transform 0.6s}.barba-leave .slide{transform:translateX(-100%)}.barba-leave-to .slide{transform:translateX(0)}.barba-enter .slide{transform:translateX(0)}.barba-enter-to .slide{transform:translateX(100%)}*,*::after,*::before{box-sizing:border-box;margin:0;padding:0}h1,h2,h3,h4,h5,h6{margin-bottom:1.8rem;padding-top:1.8rem}p{margin-bottom:2.2rem}hr{border:0;border-top:1px solid #E5E5E5;margin:2rem 0}html{font-size:62.5%}body{font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif}h1{font-size:3.6rem}h2{font-size:3.2rem}h3{font-size:2.8rem}h4{font-size:2.4rem}h5{font-size:2rem}h6{font-size:1.6rem}p{font-size:1.8rem;line-height:1.5}blockquote{color:#555;font-style:italic}blockquote,blockquote p{font-size:1.6rem;line-height:1.8}ol,ul{font-size:1.6rem}h1,h2,h3,h4,h5,h6,p,ul,ol,input,button,textarea{font-family:inherit}a,a:link,a:visited{color:#55F}.suppress{color:#000 !important;text-decoration:none !important}.text-decoration-none{text-decoration:none}.text-uppercase{text-transform:uppercase}.text-lowercase{text-transform:uppercase}.text-capitalize{text-transform:capitalize}.text-left{text-align:left}.text-right{text-align:right}.text-center{text-align:center}.font-weight-bold{font-weight:bold}.font-weight-light{font-weight:lighter}.font-weight-normal{font-weight:normal}.font-size-x10{font-size:1rem}.font-size-x12{font-size:1.2rem}.font-size-x14{font-size:1.4rem}.font-size-x16{font-size:1.6rem}.font-size-x18{font-size:1.8rem}.font-size-x20{font-size:2rem}.font-size-x22{font-size:2.2rem}.font-size-x24{font-size:2.4rem}.font-size-x26{font-size:2.6rem}.font-size-x28{font-size:2.8rem}.font-size-x30{font-size:3rem}.font-size-x32{font-size:3.2rem}.font-size-half{font-size:0.5em}.font-size-quater{font-size:0.25em}.font-size-3-quaters{font-size:0.75em}.color-grey{color:#888}.color-black{color:#000}.mega-heading{font-size:6.2rem}.clearfix::before{clear:both;content:' ';display:table}.margin-top-non{margin-top:0}.margin-top-small{margin-top:1.2rem}.margin-top-medium{margin-top:1.8rem}.margin-top-large{margin-top:2.4rem}.margin-top-extra-large{margin-top:3rem}.margin-top-extra-extra-large{margin-top:3.6rem}.margin-top-extra-extra-extra-large{margin-top:4.2rem}.margin-bottom-non{margin-bottom:0}.margin-bottom-small{margin-bottom:1.2rem}.margin-bottom-medium{margin-bottom:1.8rem}.margin-bottom-large{margin-bottom:2.4rem}.margin-bottom-extra-large{margin-bottom:3rem}.margin-bottom-extra-extra-large{margin-bottom:3.6rem}.margin-bottom-extra-extra-extra-large{margin-bottom:4.2rem}.d-flex{display:flex}.d-block{display:block}.align-center{align-items:center}.space-between{justify-content:space-between}.w-25{width:25%}.w-50{width:50%}.w-75{width:75%}.float-left{float:left}.float-right{float:right}blockquote{border-left:2px solid #BBB;margin-bottom:2.6rem;padding:1.2rem;padding-left:1.6rem}blockquote p{margin-bottom:0}blockquote cite{display:block;margin-top:1.8rem}.brand{font-size:2.2rem;font-weight:bold;text-decoration:none;text-transform:capitalize}.button{background-color:transparent;border-radius:.4rem;color:#000;cursor:pointer;display:inline-block;font-family:inherit;font-size:1.4rem;padding:.8rem 1.2rem;transition:transform 0.3s ease-in-out}.button,.button:focus{border:0;outline:0}.button:hover{transform:translateY(-.2rem)}.button:active{transform:translateY(-.1rem)}.button:disabled{cursor:not-allowed;opacity:0.75}.button--primary{background-color:#55F;color:#fff}.form__row{display:flex}.form__group{display:block}.form__group:not(:last-child){margin-bottom:1.6rem}.form__control{border-radius:.4rem;color:rgba(0,0,0,0.8);display:block;font-size:1.6rem;font-weight:normal;padding:.8rem;width:100%}.form__control,.form__control:focus{border:1px solid #888;outline:0}.form__control:disabled{background-color:#BBB;cursor:not-allowed}.header{margin-bottom:3.6rem;margin-top:1.6rem}.slide{align-items:center;background:linear-gradient(to left, #EEE, #fff);display:flex;height:100%;justify-content:center;left:0;position:fixed;top:0;transform:translateX(-100%);width:100%;z-index:1000}.slide .loader{color:#333;display:block;font-size:10px;margin:80px auto;position:relative;text-indent:-9999em;transform:translateZ(0);z-index:1001}.slide .loader,.slide .loader::before,.slide .loader::after{animation:load 1.8s infinite ease-in-out;animation-fill-mode:both;border-radius:50%;height:2.5em;width:2.5em}.slide .loader::before,.slide .loader::after{content:'';position:absolute;top:0}.slide .loader::before{animation-delay:-0.16s;left:-3.5em}.slide .loader::after{animation-delay:0.16s;left:3.5em}@keyframes load{0%,80%,100%{box-shadow:0 2.5em 0 -1.3em}40%{box-shadow:0 2.5em 0 0}}.navigation__container{align-items:center;display:flex;justify-content:space-between}.navigation ul{display:flex;list-style:none}.navigation ul a{display:inline-block;font-size:1.6rem;text-decoration:none}.navigation ul a:hover{color:red}.navigation ul li:not(:last-child){margin-right:1.6rem}.container{margin:0 auto;max-width:68rem;padding:0 1.2rem}.container--large{max-width:98rem}.flex{display:flex}.flex__col:not(:last-child){margin-right:2.4rem}.flex__col--1{flex-basis:16.6667%}.flex__col--2{flex-basis:33.3333%}.flex__col--3{flex-basis:50%}.flex__col--4{flex-basis:66.6667%}.flex__col--5{flex-basis:83.3333%}.flex__space--between{justify-content:space-between}.flex__align--center{align-items:center}.flex__grow{flex-grow:1}.invisible{opacity:0}.visible{opacity:1}.transition{transition:opacity 1s ease}</style>";
  }

  /**
   * Remove bloat that the WordPress theme injects by default,
   * i-e emojis, links, wordpress version etc, call inside
   * `init` action hook.
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
   * @return array Tuples where [0] is route postfix, [1] is handler and [2] whether route should be nopriv.
   */
  function get_rest_api_routes(): array
  {
    return [
      ['create_newsletter', '\Hasnain\REST\Newsletter::create', true],
    ];
  }
