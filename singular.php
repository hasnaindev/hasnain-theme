<?php

  get_header();

  if (is_front_page() && !is_home()) {
    get_template_part('template-parts/content', 'wysiwyg');
  } else {
    get_template_part('template-parts/content', 'page');
  }

  get_footer();
