<?php

  namespace Hasnain\Shortcodes;

  use Hasnain\Abstracts\Shortcode;

  if (class_exists('Newsletter')) return;

  class Newsletter extends Shortcode
  {
    function render($attributes, string $content): string
    {
      $cite = $attributes['cite'];
      $testimony = $attributes['testimony'];

      $content = $content
        ?: 'I send out a short email each weekday with code snippets, tools, techniques and interesting stuff from around the web. Join 10,800+ daily subscribers.';

      return "
        <div
          data-module='newsletter.vue'
          data-lazy-target='this'
          data-lazy-event='[\"mousemove\", \"click\", \"touchstart\"]'
        >
          <p>{$content}</p>
          <notification :title='notification.title' :message='notification.message'></notification>
          <form
            id='newsletter-form'
            class='my-5'
            @submit.prevent='submit'
            submit='return false'
          >
            <div class='columns'>
              <div class='column is-four-fifths'>
                <input
                  id='newsletter-email'
                  type='email'
                  class='input is-primary'
                  placeholder='Email Address'
                  required='true'
                  v-model='email'
                  :disabled='loading'
                />
              </div>
              <div class='column'>
                <input
                  id='newsletter-submit'
                  type='submit'
                  class='button is-primary w-100'
                  value='Subscribe'
                  :disabled='loading'
                />
              </div>
            </div>
          </form>
          <blockquote>
            <div>{$testimony}</div>
            <div><cite>{$cite}</cite></div>
          </blockquote>
        </div>
      ";
    }
  }
