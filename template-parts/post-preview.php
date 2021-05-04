<article>
  <header>
    <?php

      if (has_post_thumbnail())
      {
        the_post_thumbnail('thumbnail');
      }

    ?>
    <h2>
      <a href="<?php echo get_the_permalink(); ?>" title="<?php the_title(); ?>" alt="<?php the_title(); ?>">
        <?php the_title(); ?>
      </a>
    </h2>
  </header>
  <main>
    <?php the_excerpt(); ?>
  </main>
</article>
