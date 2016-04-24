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
			<a class="ic_small_header_contact_link" href="#">
				<i class="fa fa-phone" aria-hidden="true"></i>
				<span class="ic_small_header_contact_text">(+49) 531 731 06</span>
			</a>
			<a class="ic_small_header_contact_link" href="mailto:info@increare.de">
				<i class="fa fa-envelope-o" aria-hidden="true"></i>
				<span class="ic_small_header_contact_text">info@increare.de</span>
			</a>
		</span>

		<span id="ic_small_header_social">
<?php
/* omitted check for social links, they will not be printed if they are empty 
 * should be enabled when ic_select_iconset ist registered
 * TODO: fix init color first bug
 */
if ( get_theme_mod( 'ic_select_icon_hover' ) ) {
	global $ic_social_links;
	$link_class = 'ic_small_header_social_link';

	foreach ( array_keys($ic_social_links) as $key ) {
		if ( get_theme_mod( $key ) ) { ?>
			<a class="<?php echo $link_class ?>" href="<?php echo get_theme_mod( $key ) ?>">
				<?php echo $ic_social_links[$key]; ?>
			</a>
		<?php }
	}?>

<script type="text/javascript">
	jQuery( ".<?php echo $link_class ?>" ).hover(function() {
		jQuery( this ).css( "color", "<?php echo get_theme_mod( 'ic_select_icon_hover' ); ?>" );
	}, function() {
		jQuery( this ).css( "color", "WhiteSmoke");
	} );
</script>

<?php } ?>
		</span><!-- #ic_small_header_social -->
	</div><!-- #ic_s_header -->
</header>
<header>
	<div id="ic_header">
		<div id="ic_logo">
		<?php
		?>
		<?php if ( get_theme_mod( 'custom_logo' ) ) : ?>
			<div id="ic_logo_img">
				<a href="<?php bloginfo( 'url' ); ?>">
					<?php echo wp_get_attachment_image( get_theme_mod( 'custom_logo' ), 'custom_logo' ); ?>
				</a>
			</div><!-- #ic_logo_img -->
		<?php else : ?>
			<h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name'); ?></a></h1>
			<p><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'description' ); ?></a></p>
		<?php endif; ?>
		</div><!-- #ic_logo -->

		<nav>

		<?php wp_nav_menu( array(
			'menu_class'		=> 'ict_main_menu clearfix',
			'container_class'	=> 'ict_main_menu_container',
			'theme_location'	=> 'ict_main_menu'
			
		) ); ?>

		</nav>

	</div><!-- #ic_header -->
</header>