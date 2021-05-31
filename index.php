<?php

  /**
   * Front page template that is not blog.
   *
   * @see https://developer.wordpress.org/themes/basics/template-hierarchy/
   * @see https://developer.wordpress.org/files/2014/10/Screenshot-2019-01-23-00.20.04.png Hierarchy Image Illustration
   */

  get_header();

  echo "<h1>INDEX.PHP<h1>";

?>

  <div class="content"><?php the_content(); ?></div>

<?php

  get_footer();
