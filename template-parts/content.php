<article>
  <header class="margin-bottom-extra-extra-extra-large">
    <?php

      if (has_post_thumbnail())
      {
        the_post_thumbnail('thumbnail');
      }

    ?>
    <h1 class="font-size-x32">
      <span class="d-block flex__grow margin-bottom-medium">
        <?php the_title(); ?>
      </span>
    </h1>
    <span class="color-grey d-block font-size-x14 font-weight-bold margin-bottom-small">
      <?php the_time('F j, Y'); ?>
    </span>
  </header>
  <main>
    <?php the_content(); ?>
  </main>

  <?php

    $next_post = get_next_post();
    $previous_post = get_previous_post();

    if (false && $next_post || $previous_post):

  ?>

    <p class="clearfix">
      <?php if ($previous_post): ?>
        <span class="d-block float-left w-50 font-size-3-quaters">
          Previous:
          <a href="<?php echo $previous_post->guid; ?>">
            <?php echo $previous_post->post_title; ?>
          </a>
        </span>
      <?php endif; ?>
      <?php if ($next_post): ?>
        <span class="d-block float-right text-right w-50 font-size-3-quaters">
          Next:
          <a href="<?php echo $next_post->guid; ?>">
            <?php echo $next_post->post_title; ?>
          </a>
        </span>
      <?php endif; ?>
    </p>

  <?php endif; ?>

</article>
