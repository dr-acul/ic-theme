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

<!-- rewrite to css -->
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
<nav>
	<div id="ict_header">
		<div id="ict_brand_wrapper">
			<?php if ( get_theme_mod( 'custom_logo' ) ) : ?>
			<a id="ict_brand_link" href="<?php echo home_url( '/' ); ?>">
				<?php $post_id = get_theme_mod( 'custom_logo' ); ?>
				<img src="<?php echo wp_get_attachment_url( $post_id ); ?>"
					 alt="<?php echo get_the_title( $post_id ); ?>" />
			</a><!-- #ict_brand_link -->
			<?php else : ?> <!-- text --> 
			<a id="ict_brand_link" href="<?php echo esc_url( home_url( '/' ) ); ?>">
				<h1><?php bloginfo( 'name'); ?></h1>
				<p><?php bloginfo( 'description' ); ?></p>
			</a><!-- #ict_brand_link -->
			<?php endif; ?>
		</div><!-- #ict_brand_wrapper -->
		<!-- TODO write scritp -->
		<button id="ict_navbar_button" type="button" class="collapsed" aria-expanded="false" aria-controls="ict_main_menu">
			<i class="fa fa-bars" aria-hidden="true"></i>
<!--
			<span class="ict_icon_bar"></span>
			<span class="ict_icon_bar"></span>
			<span class="ict_icon_bar"></span>
-->
		</button>
		<?php wp_nav_menu( array(
			'container_id'		=> 'ict_main_menu_container',
			'menu_id'			=> 'ict_main_menu',
			'theme_location'	=> 'ict_main_menu'
		) ); ?>
	</div><!-- #ic_header -->
</nav>