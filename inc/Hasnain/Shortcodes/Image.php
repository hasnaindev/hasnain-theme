<?php

  namespace Hasnain\Shortcodes;

  use Hasnain\Abstracts\Shortcode;

  if (class_exists('Image')) return;

  class Image extends Shortcode
  {
    function render($attributes, string $content): string
    {
      $src = $attributes['src'];
      $alt = $attributes['alt'];

      return "<img src='{$src}' alt='{$alt}' class='margin-bottom-extra-extra-large' />";
    }
  }
