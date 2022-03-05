<?php
  get_header();

  /* Start the Loop */
  while ( have_posts() ) :
    the_post();
    get_template_part( 'templates/single-page' );

  endwhile;

  get_footer();
?>
