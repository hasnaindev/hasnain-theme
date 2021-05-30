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
      $email = strtolower($_POST['email']);
      $subscriptions = get_option($option, []);

      if (self::is_test_email($email))
      {
        return wp_send_json(['message' => 'Test email received!'], 200);
      }

      if (!filter_var($email, FILTER_VALIDATE_EMAIL))
      {
        return wp_send_json(['message' => 'Are you sure this is a valid email address?'], 400);
      }

      if (in_array($email, $subscriptions))
      {
        return wp_send_json(['message' => 'This email address has already subscribed!'], 400);
      }

      $updated_subscriptions = [...$subscriptions, $_POST['email']];
      update_option($option, $updated_subscriptions);

      return wp_send_json(['message' => 'Thank you for subscribing to our newsletter!'], 200);
    }

    /**
     * Checks whether email is a test email by checking
     * if the email starts with the test phrase.
     *
     * @param string $email
     * @return boolean
     */
    public static function is_test_email(string $email): bool
    {
      $test_phrase = 'test@';
      $length = strlen($test_phrase);
      return substr($email, 0, $length) == $test_phrase;
    }
  }
