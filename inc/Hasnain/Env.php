<?php

  namespace Hasnain;

  if (class_exists('Env')) return;

  /**
   * Env class handle the environment of the app,
   * defaults to production, can be switched to
   * `development` using `wp-config.php` file by
   * defining `THEME_ENV` constant with value
   * `development` or `staging` for `staging`.
   *
   * @access public
   */
  class Env {
    protected static string $theme_env = '';

    /**
     * Initializes the Env class with environment
     * variables, must run before any other method
     * is executed.
     *
     * @return void
     */
    public static function init(): void
    {
      if (!defined('THEME_ENV'))
      {
        define('THEME_ENV', 'production');
      }

      self::$theme_env = THEME_ENV;
    }

    /**
     * Gets the current theme environment global
     * `THEME_ENV` constant.
     *
     * @return string Global `THEME_ENV` constant.
     */
    static function get_env(): string
    {
      return THEME_ENV;
    }

    /**
     * Checks whether theme is in development
     * mode.
     *
     * @return boolean `true` if theme is in development mode.
     */
    static function is_dev(): bool
    {
      return substr(THEME_ENV, 0, 3) == 'dev';
    }
  }
