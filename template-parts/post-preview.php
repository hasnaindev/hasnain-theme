<article>
  <header>
    <?php

      if (has_post_thumbnail())
      {
        the_post_thumbnail('thumbnail');
      }

    ?>
    <h2 class="flex flex__align--center">
      <a href="<?php echo get_the_permalink(); ?>" class="flex__grow" title="<?php the_title(); ?>" alt="<?php the_title(); ?>">
        <?php the_title(); ?>
      </a>
      <span class="color-grey d-block font-size-half font-weight-light">
        <?php the_time('F j, Y'); ?>
      </span>
    </h2>
  </header>
  <main>
    <?php the_excerpt(); ?>
  </main>
</article>
