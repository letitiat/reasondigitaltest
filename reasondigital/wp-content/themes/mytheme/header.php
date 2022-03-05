<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php bloginfo('name'); ?></title>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div class="container">
		<header class="site-header">
			<div class="container container--header-top">
				<a class="brand" href="<?= esc_url(home_url('/')); ?>">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="<?php bloginfo('name'); ?>" title="<?php bloginfo('name'); ?>" style="max-height:40px;">
				</a>

				<div class="menu-btn">
					<span class="top"></span>
					<span class="mid"></span>
					<span class="bot"></span>
				</div>
				<div id="toggleMenu">
					<?php
					wp_nav_menu( array(
						'theme_location' => 'main-menu') );
						?>
					</div>
				</div>
			</header>
