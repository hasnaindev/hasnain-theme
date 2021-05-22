<?php

  get_header();

  if (have_posts())
  {
    while (have_posts())
    {
      the_post();
      get_template_part('template-parts/post', 'preview');
    }
  }
  else
  {
    get_template_part('template-parts/post', '404');
  }

  get_footer();
