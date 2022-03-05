<?php

    // Enqueue styles and scripts
    function add_theme_scripts() {
        wp_enqueue_style( 'style', get_stylesheet_uri() );
        wp_enqueue_script( 'script', get_template_directory_uri() . '/main.js', array ( 'jquery' ), 1.1, true);
        wp_enqueue_script('jquery'); # Loading the WordPress bundled jQuery version.
      }
    add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );


    // Add features images to posts
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 1568, 9999 );

    // Add menu support to theme
    function wpb_custom_new_menu() {
      register_nav_menu('main-menu',__( 'Main Menu' ));
    }
    add_action( 'init', 'wpb_custom_new_menu' );

// create custom function to return nav menu for api on vue site
function get_menu() {
  # Change 'menu' to your own navigation slug.
  $menu_items = wp_get_nav_menu_items('Menu 1');
  foreach($menu_items as $menu_item) {
      // ALTERNATIVE: $slug = get_post_field( 'post_name', $menu_item->object_id );
      $slug = basename( get_permalink($menu_item->object_id) );
      $menu_item->slug = $slug;
  }
  return $menu_items;
}

add_action( 'rest_api_init', function () {
      register_rest_route( 'wp/v2', 'menu', array(
      'methods' => 'GET',
      'callback' => 'get_menu',
  ) );
} );
?>
