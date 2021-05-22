<?php

  get_header();

  if (have_posts())
  {
    the_archive_title('<h1 class="text-center">', '</h1>');

    while (have_posts())
    {
      the_post();
      get_template_part('template-parts/post', 'preview');
    }
  }
  else
  {
    get_template_part('template-parts/archive', '404');
  }

  get_footer();
