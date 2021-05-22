<?php

  namespace Hasnain\REST;

  if (class_exists('Newsletter')) return;

  class Newsletter
  {
    protected static string $option = 'subscriptions';

    private function __construct() {}

    public static function create()
    {
      $option = self::$option;
      $subscriptions = get_option($option, []);
      $updated_subscriptions = [...$subscriptions, $_POST['email']];

      update_option($option, $updated_subscriptions);

      wp_send_json(['message' => 'created'], 200);
    }
  }
