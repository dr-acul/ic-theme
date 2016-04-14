<?php

/**
 * increare header layout
 * 
 * @package WordPress
 * @subpackage increare
 * @since increare 0.01
 * 
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> >
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="stylesheet" type="text/css" href="<?php bloginfo( 'stylesheet_url' ); ?>" media="screen">
	<title><?php bloginfo( 'name' ); ?></title>
	<?php wp_enqueue_script("jquery"); ?>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<header>
	<div id="ic_s_header">
		<span id="ic_s_header_contact">Phone: (+49)1268 785 623 - E-Mail: info@increare.de</span>
		<span id="ic_s_header_socialnetwork">f - T - g+ - dw</span>
	</div><!-- #ic_s_header -->
</header>
<header>
	<div id="ic_header">
		<div id="ic_logo">
		<?php if ( get_theme_mod( 'themeslug_logo' ) ) : ?>
			<div id="ic_logo_img">
				<img src='<?php echo esc_url( get_theme_mod( 'themeslug_logo' ) ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'>
			</div><!-- #ic_logo_img -->
		<?php else : ?>
			<h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name'); ?></a></h1>
		<?php endif; ?>
			<p><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'description' ); ?></a></p>
		</div><!-- #ic_logo -->

		<nav>

		<?php wp_nav_menu(); ?>

		</nav>

	</div><!-- #ic_header -->
</header>