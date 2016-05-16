<?php
/**
 * increare functions and definitions
 * 
 * @package WordPress
 * @subpackage increare
 * @since increare 0.01
 * 
 */
const SIDEBAR_IDS = [ 'main-widgets', 'footer-widgets', 'header-widget' ];

/*
 * Add theme supports
 */
add_theme_support( 'custom-logo' );
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 150, 150, array( 'center', 'center' ) );
add_theme_support( 'html5', array( 'gallery', 'caption' ) );
add_theme_support( 'post-formats', array( 'gallery' ) );
/**
 * Enables the Excerpt meta box in Page edit screen.
 * Source: WordPress-Codex
 */
function wpcodex_add_excerpt_support_for_pages() {
	add_post_type_support( 'page', 'excerpt' );
}
add_action( 'init', 'wpcodex_add_excerpt_support_for_pages' );
/**
 * Remove the more links scroll
 * Source: WordPress-Codex
 */
function remove_more_link_scroll( $link ) {
	$link = preg_replace( '|#more-[0-9]+|', '', $link );
	return $link;
}
add_filter( 'the_content_more_link', 'remove_more_link_scroll' );
/*
 * Clean WordPress header
 * Source: https://digwp.com/2010/03/wordpress-functions-php-template-custom-functions/
 */
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
/*
 * Disable admin bar
 */
add_filter('show_admin_bar', '__return_false');
/*
 * Load FontAwesome
 */
function ic_theme_register_styles() {
	wp_register_style('font-awesome', get_stylesheet_directory_uri() . '/css/font-awesome.min.css');
//	wp_register_style('font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css');
	wp_enqueue_style('font-awesome');
}
add_action('wp_print_styles', 'ic_theme_register_styles');
/*
 * Register javascript
 */
function ic_theme_register_js() {
	wp_enqueue_script('functions', get_template_directory_uri() . '/js/functions.js', array('jquery'));
}
add_action('wp_print_scripts', 'ic_theme_register_js');
/*
 * Register custom image sices
 * 
 */
function ic_theme_register_image_size() {
    add_image_size( 'custom_logo', '300', '58', true );
	add_image_size( 'portfolio_thumbnail', '65', '65', true );
	add_image_size( 'portfolio-image', '256', '256', true );
}
add_action( 'after_setup_theme', 'ic_theme_register_image_size' );
/*
 * Make the Portfolio image size selectable in backend
 */
function ict_portfolio_image( $sizes ) {
	return array_merge( $sizes, array( 
		'portfolio-image'	=> __( 'Portfolio size', 'increaretd' ),
	) );
}
add_filter( 'image_size_names_choose', 'ict_portfolio_image');

/*
 * Register menu
 */
register_nav_menu( 'ict-main-menu', __( 'Main Menu (header)', 'increaretd' ) );

/*
 * No footer callback
 */
function no_footer_cb() {
	echo $html  = '<div id="ict-footer-cb"></div>';
}
/*
 * Add sidebars/widgets
 */
function ict_init_widgets() {
	register_sidebar( array(
		'id'			=> SIDEBAR_IDS[0],
		'name'			=> __( 'Main widgets', 'increaretd' ),
		'description'	=> __( 'Select widgets for the main widget area', 'increaretd' ),
		'before_widget'	=> '<div id="%1$s" class="ict-sidebar %2$s">',
		'after_widget'	=> '</div>'
	) );
	register_sidebar( array(
		'id'			=> SIDEBAR_IDS[1],
		'name'			=> __( 'Footer widgets', 'increaretd' ),
		'description'	=> __( 'Select widgets for the footer widget area', 'increaretd' ),
		'before_widget'	=> '<div id="%1$s" class="%2$s">',
		'after_widget'	=> '</div>'
	) );
	register_sidebar( array(
		'id'			=> SIDEBAR_IDS[2],
		'name'			=> __( 'Header widget', 'increaretd' ),
		'description'	=> __( 'Widget for social media, only the first widget will be displayed', 'increaretd' ),
		'before_widget'	=> '<div id="%1$s" class="%2$s">',
		'after_widget'	=> '</div>'
	) );
}
add_action( 'widgets_init', 'ict_init_widgets');

//add portfolio feature
function portfolio_theme_customizer( $wp_customize ) {
	function get_post_choices_array() {
		$options = array(
				'select_option' => '&mdash; Select &mdash;',
		);
		foreach ( get_posts() as $post) {
			$options[ $post->ID ] = $post->post_title;
		}
		foreach ( get_pages() as $post) {
			$options[ $post->ID ] = $post->post_title;
		}
		return $options;
	}
	$wp_customize->add_section( 'portfolio_post_section', array(
			'title'			=> __( 'IN|creare - Portfolio', 'increaretd' ),
			'description'	=> __( 'Select posts to display as portfolio.', 'incraretd' ),
			'priority'		=> 160 )
		);
	$wp_customize->add_setting( 'portfolio_selection_0', array ( 
			'default'	=> 'select_option' )
		);
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'portfolio_selection_0', array(
			'label'		=> 'Portfolio (left)',
			'section'	=> 'portfolio_post_section',
			'settings'	=> 'portfolio_selection_0',
			'type'		=> 'select',
			'choices'	=> get_post_choices_array() )
	) );
	$wp_customize->add_setting( 'portfolio_selection_1', array (
			'default'	=> 'select_option',
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'portfolio_selection_1', array(
			'label'		=> 'Portfolio (center)',
			'section'	=> 'portfolio_post_section',
			'settings'	=> 'portfolio_selection_1',
			'type'		=> 'select',
			'choices'	=> get_post_choices_array() )
	) );
	$wp_customize->add_setting( 'portfolio_selection_2', array (
			'default'	=> 'select_option',
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'portfolio_selection_2', array(
			'label'		=> 'Portfolio (right)',
			'section'	=> 'portfolio_post_section',
			'settings'	=> 'portfolio_selection_2',
			'type'		=> 'select',
			'choices'	=> get_post_choices_array() )
	) );
}
add_action('customize_register', 'portfolio_theme_customizer');