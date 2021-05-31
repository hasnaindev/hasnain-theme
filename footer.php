  </main>

  <footer class="footer">
    <div class="theme-container theme-container--large">
      <hr />
      <nav class="navbar mb-5">
        <?php

          wp_nav_menu(array(
            'theme_location' => 'main-menu',
            'depth' => 0,
            'container' => false,
            'menu_class' => 'navbar-menu',
            'menu_id' => 'primary-menu',
            'walker' => new Hasnain\Walkers\Bulma(),
          ));

        ?>
      </nav>
      <p class="has-text-centered">
        <span class="is-size-7">
          <?php _e('Made with 💖 Design inspired by', 'hasnain'); ?>
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
