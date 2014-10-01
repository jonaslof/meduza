<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	
	<?php if( wp_title("", false) != '' ) : ?>
	<title><?php bloginfo('name'); ?> &raquo; <?php wp_title("", true); ?></title>
	<?php else : ?>
	<title><?php bloginfo('name'); ?> &raquo; <?php bloginfo('description'); ?></title>
	<?php endif; ?>
	
	<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	
	<!--[if IE]>
		<link rel="stylesheet" href="<?php bloginfo('template_directory')?>/public/assets/css/custom.ie.css" />
	  	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
		
	<?php wp_head(); ?>
	
</head>
<body <?php body_class(); ?>>
	
	<header id="header" role="banner">

			<div id="header-menu-button" class="visible-in-mobile-landscape btn btn-menu">Meny</div>

			<?php if (get_option('options_logo_png')): ?>
				<div class="container">
					<div class="header-logo"><?php echo wp_get_attachment_image(get_option('options_logo_png'), 'thumbnail'); ?></div>
				</div>
			<?php else: ?>
				<div class="container">
					<h1><a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo( 'name' ); ?></a></h1>
				</div>
			<?php endif; ?>

			<?php 
				$menu_args = array(
					'theme_location' => 'header-menu',
					'menu_class' => 'header-menu'
				);
				wp_nav_menu($menu_args); 
			?>
	</header>