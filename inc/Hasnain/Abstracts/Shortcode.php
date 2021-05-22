<?php

  namespace Hasnain\Abstracts;

  use Hasnain\Interfaces\Registerable;

  if (class_exists('Shortcode')) return;

  abstract class Shortcode implements Registerable
  {
    protected string $tag;

    function __construct()
    {
      $parts = explode('\\', get_called_class());
      $this->tag = end($parts);
    }

    function register(): void
    {
      add_shortcode($this->tag, [$this, 'render']);
    }

    abstract function render($attributes, string $content): string;
  }
