<article>
  <header>
    <?php

      if (has_post_thumbnail())
      {
        the_post_thumbnail('thumbnail');
      }

    ?>
    <h1>
      <?php the_title(); ?>
    </h1>
  </header>
  <main>
    <?php the_content(); ?>
  </main>
</article>
