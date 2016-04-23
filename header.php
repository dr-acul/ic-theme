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
	<meta name="viewport" content="width=device-width">
	<link rel="stylesheet" type="text/css" href="<?php bloginfo( 'stylesheet_url' ); ?>" media="screen">
	<title><?php bloginfo( 'name' ); ?></title>
	<!-- do we still need to load this here -->
	<?php wp_enqueue_script("jquery"); ?>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<header>
	<div id="ic_s_header">
		<span id="ic_s_header_contact">
			<img class="ic_social_links" src="<?php echo get_template_directory_uri()
			. '/images/Blue_White_icons/Phone.png'; ?> " /> (+49)1268 785 623
			<img class="ic_social_links" src="<?php echo get_template_directory_uri()
			. '/images/Blue_White_icons/E-Mail.png'; ?>" /> info@increare.de
		</span>

		<span id="ic_s_header_socialnetwork">
<?php
/* omitted check for social links,
 * should be enabled when ic_select_iconset ist registered
 * TODO: cleanup, rewrite, this is not a good way to do all that stuff...
 */
if ( get_theme_mod( 'ic_select_iconset' ) ) {
	global $ic_social_links;

	foreach ($ic_social_links as $key => $value) {
		$link_to_icon = get_theme_mod( 'ic_select_iconset' )
				. '/' . $key . '.png';
		$hover_link_to_icon = get_theme_mod( 'ic_select_iconset' )
				. '/' . $key . '_hover.png';
?>
			<a class="ic_social_links" href="<?php echo get_theme_mod( $key ) ?>">
				<img id="<?php echo $key ?>" class="ic_social_links"
					 src="<?php echo $link_to_icon ?>" />
			</a>

			<script type="text/javascript">
				jQuery( '#<?php echo $key ?>').mouseover(function() {
					jQuery( '#<?php echo $key ?>').attr("src", "<?php echo $hover_link_to_icon ?>");
				} );
				jQuery( '#<?php echo $key ?>').mouseout(function() {
					jQuery( '#<?php echo $key ?>').attr("src", "<?php echo $link_to_icon ?>");
				});
			</script>
<?php
	}
}
?>
		</span>
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