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
      $email = $_POST['email'];
      $subscriptions = get_option($option, []);

      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return wp_send_json(['message' => 'Are you sure this is a valid email address?'], 400);
      }

      if (in_array($email, $subscriptions)) {
        return wp_send_json(['message' => 'This email address has already subscribed!'], 400);
      }

      $updated_subscriptions = [...$subscriptions, $_POST['email']];
      update_option($option, $updated_subscriptions);

      return wp_send_json(['message' => 'Thank you for subscribing to our newsletter!'], 200);
    }
  }
