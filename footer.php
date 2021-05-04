  </main>

  <footer class="footer">
    <div class="container container--large clearfix">
      <hr />
      <nav class="navigation margin-bottom-large">
        <div class="navigation__container">
          <?php

            wp_nav_menu([
              'container' => 'div',
              'menu_class' => 'navigation__menu',
              'theme_location' => 'main-menu',
            ]);

          ?>
        </div>
      </nav>
      <p class="text-center">
        <span class="font-size-3-quaters">
          <?php _e('Made with 💔 in Mardan. Concept and design inspired by', 'hasnain'); ?>
          <a href="https://gomakethings.com" title="Go Make Things is a website that is focused on making vanilla JavaScript easy to learn">
            <?php _e('GoMakeThings', 'hasnain'); ?>
          </a>
          .
        </span>
      </p>
    </div>
  </footer>

  <?php wp_footer(); ?>

</body>
</html>
