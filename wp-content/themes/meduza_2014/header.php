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
		<script src="<?php bloginfo('template_directory'); ?>/js/modernizr.custom.86772.js"></script>
	<![endif]-->
		
	<?php wp_head(); ?>
	
</head>
<body <?php body_class(); ?>>

<div class="container-fluid">

	<div class="row-fluid">
	
		<header id="site-header" class="span12" role="banner">
			<hgroup class="page-header">
				<?php if (get_option('options_logo_png')): ?>
					<?php echo wp_get_attachment_image(get_option('options_logo_png'), 'thumbnail'); ?>

				<?php else: ?>
					<h1><a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo( 'name' ); ?></a></h1>
				<?php endif; ?>
			</hgroup>

			<?php wp_nav_menu('header-menu'); ?>
		</header>
	
	</div>