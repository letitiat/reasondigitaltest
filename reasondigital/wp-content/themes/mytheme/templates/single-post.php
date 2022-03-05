<div class="container--1-1">
  <div class="block block--1">
  <h1><?php the_title(); ?></a></h1>
<?php  $content = apply_filters( 'the_content', get_the_content() );
        echo $content; ?>
  </div>
  <div class="block block--2">
    <?php echo get_the_post_thumbnail( $page->ID, 'large'); ?>
  </div>
</div>
