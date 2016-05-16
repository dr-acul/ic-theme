<?php
/**
 * IN|creare header layout.
 * 
 * @package increare
 * @subpackage increare-theme
 * @since increare 0.01
 * 
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> >
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="<?php bloginfo( 'stylesheet_url' ); ?>" media="screen">
	<title><?php bloginfo( 'name' ); ?></title>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div class="testing"></div>
	<header>
		<div id="ict-small-header">
			<span id="ict-small-header-contact">
				<a class="ict-small-header-contact-link" href="#">
					<i class="fa fa-phone" aria-hidden="true"></i>
					<span class="ict-small-header-contact-text">(+49) 531 731 06</span>
				</a>
				<a class="ict-small-header-contact-link" href="mailto:info@increare.de">
					<i class="fa fa-envelope-o" aria-hidden="true"></i>
					<span class="ict-small-header-contact-text">info@increare.de</span>
				</a>
			</span><!-- #ict-small-header-contact -->

			<span id="ict-small-header-social">
				<?php if (is_active_sidebar( SIDEBAR_IDS[2] ) ) : ?>
					<?php dynamic_sidebar( SIDEBAR_IDS[2] ); ?>
				<?php endif; ?>
			</span><!-- #ict-small-header-social -->
		</div><!-- #ict-small-header -->
	</header>
	<nav>
		<div id="ict-header">
			<div id="ict-brand-wrapper">
				<?php if ( get_theme_mod( 'custom_logo' ) ) : ?>
				<a id="ict-brand-link" href="<?php echo home_url( '/' ); ?>">
					<?php $post_id = get_theme_mod( 'custom_logo' ); ?>
					<img src="<?php echo wp_get_attachment_url( $post_id ); ?>"
						 alt="<?php echo get_the_title( $post_id ); ?>" />
				</a><!-- #ict-brand-link -->
				<?php else : ?> <!-- TODO: implement non-image header --> 
				<a id="ict-brand-link" href="<?php echo esc_url( home_url( '/' ) ); ?>">
					<h1><?php bloginfo( 'name'); ?></h1>
					<p><?php bloginfo( 'description' ); ?></p>
				</a><!-- #ict-brand-link -->
				<?php endif; ?>
			</div><!-- #ict-brand-wrapper -->
			<button id="ict-navbar-button" type="button" class="collapsed" aria-expanded="false" aria-controls="ict-main-menu">
				<i class="fa fa-bars" aria-hidden="true"></i>
			</button><!-- #ict-navbar-button -->
			<?php wp_nav_menu( array(
				'container_id'		=> 'ict-main-menu-container',
				'menu_id'			=> 'ict-main-menu',
				'theme_location'	=> 'ict-main-menu'
			) ); ?>
		</div><!-- #ict-header -->
	</nav>