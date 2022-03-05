<?php $categories = get_the_category(); ?>

<div class="post active <?php echo $categories[0]->slug ?>">
  <div class="post_image">
      <a href="<?php the_permalink(); ?>">
        <?php echo get_the_post_thumbnail( $page->ID, 'large'); ?>
      </a>
  </div>
  <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
  <div class="content"><a href="<?php the_permalink(); ?>"><?php echo wp_strip_all_tags( get_the_excerpt(), true ); ?></a></div>
</div>
