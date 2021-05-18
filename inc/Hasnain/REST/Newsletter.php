<?php

  namespace Hasnain\REST;

  if (class_exists('Newsletter')) return;

  class Newsletter
  {
    private function __construct() {}

    public static function create()
    {
      wp_send_json(['message' => 'created'], 200);
    }
  }
