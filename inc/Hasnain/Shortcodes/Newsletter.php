<?php

  namespace Hasnain\Shortcodes;

  use Hasnain\Abstracts\Shortcode;

  if (class_exists('Newsletter')) return;

  class Newsletter extends Shortcode
  {
    function render($attributes, string $content): string
    {
      return "
        <div data-component='newsletter'>
          <p>
            I send out a short email each weekday with code snippets, tools, techniques and interesting stuff from around the web. Join 10,800+ daily subscribers.
          </p>
          <form
            class='form'
            style='margin-bottom: 2.2rem;'
            v-on:submit.prevent='submit'
          >
            <div class='flex flex__space--between flex__align--center'>
              <div class='flex__col flex__grow'>
                <input
                  type='email'
                  class='form__control'
                  placeholder='email'
                  required='true'
                  v-model='email'
                  v-bind:disabled='loading'
                />
              </div>
              <div class='flex__col flex__col--1'>
                <input
                  type='submit'
                  class='button button--primary'
                  value='Subscribe'
                  v-bind:disabled='loading'
                />
              </div>
            </div>
          </form>
          <blockquote>
            This has easily been the most valuable newsletter I have ever subscribed to. Thank you very much for sharing and educating!
            <cite>Muhammad Hasnain</cite>
          </blockquote>
        </div>
      ";
    }
  }
