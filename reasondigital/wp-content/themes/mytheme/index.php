<?php
  get_header();

  if (have_posts()) : ?>
    <ul class="category-filter">
      <?php
      $categories = get_categories($args); ?>
        <li data-key="all-cage">All Cage</li>
        <?php foreach($categories as $category): ?>
          <li data-key="<?php echo $category->slug ?>"><?php echo $category->name ?></li>
        <?php endforeach; ?>
    </ul>
    <div class="posts-feed">
      <?php while (have_posts()) : the_post();
        get_template_part( 'templates/post');
      endwhile; ?>
    </div>
    <?php else :
      echo "Where did all the Nick Cages go?!";
    endif;

  get_footer();
?>
