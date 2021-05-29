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
          data-lazy-event='focus'
          data-lazy-target='newsletter-email'
        >
          <p>{$content}</p>
          <notification :title='notification.title' :message='notification.message'></notification>
          <form
            id='newsletter-form'
            class='form'
            style='margin-bottom: 2.2rem;'
            @submit.prevent='submit'
            submit='return false'
          >
            <div class='flex flex__space--between flex__align--center'>
              <div class='flex__col flex__grow'>
                <input
                  id='newsletter-email'
                  type='email'
                  class='form__control'
                  placeholder='Email Address'
                  required='true'
                  v-model='email'
                  :disabled='loading'
                />
              </div>
              <div class='flex__col flex__col--1'>
                <input
                  id='newsletter-submit'
                  type='submit'
                  class='button button--primary'
                  value='Subscribe'
                  :disabled='loading'
                />
              </div>
            </div>
          </form>
          <blockquote class='margin-bottom-non'>{$testimony}<cite>{$cite}</cite></blockquote>
        </div>
      ";
    }
  }
