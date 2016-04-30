<?php
/**
 * increare functions and definitions
 * 
 * @package WordPress
 * @subpackage increare
 * @since increare 0.01
 * 
 */
const WIDGET_IDS = [ 'left_footer_widgets', 'middle_footer_widgets', 'right_footer_widgets' ];
 
//add theme supports & post formats
add_theme_support( 'custom-background' );
add_theme_support( 'custom-logo' );

/**
 * Enables the Excerpt meta box in Page edit screen.
 * Source: WordPress-Codex
 */
function wpcodex_add_excerpt_support_for_pages() {
	add_post_type_support( 'page', 'excerpt' );
}
add_action( 'init', 'wpcodex_add_excerpt_support_for_pages' );

/*
 * Clean WordPress header
 * Source: https://digwp.com/2010/03/wordpress-functions-php-template-custom-functions/
 */
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');

/*
 * Disable admin bar on standalone page
 */
add_filter('show_admin_bar', '__return_false');

/*
 * Load FontAwesome from CDN
 * 
 */
function ic_theme_register_styles() {
	wp_register_style('font-awesome-cdn', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css');
	wp_enqueue_style('font-awesome-cdn');
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
 * Register logo image sice
 */
function ic_theme_register_image_size() {
    add_image_size( 'custom_logo', '300', '58', array( 'top', 'center' ) );
}
add_action( 'after_setup_theme', 'ic_theme_register_image_size' );

/*
 * Register menu's
 */
register_nav_menu( 'ict_main_menu', __( 'Header Menu (main)', 'increaetd' ) );
register_nav_menu( 'ict_footer_menu', __( 'Footer Menu', 'increaretd' ) );

/* 
 * Initialize social links and icons
 * Iconsets are registered automatically.
 * You need to create a new subfolder called 'Your_Iconset_icons' in the theme's
 * image folder to make get_icon_path() look for it. Put your icons in this
 * folder with the name of the sozial icon/link you want to add.
 * 
 * @return	returns a list of icon paths for sozial links
 */
function get_icon_path() {
	$ic_iconset = array();
	$img_dir = scandir(get_template_directory() . '/images');
	
	foreach( $img_dir as $path) {
		$icon_dir_filter = strpos( $path, 'icons' ); 
		if ( $icon_dir_filter ) { //path contains 'icons'
			$new_path = get_template_directory_uri() . '/images/' . $path;
			$ic_iconset[$new_path] =
					str_replace('_', ' ',  substr( $path, 0, $icon_dir_filter-1 ) );
		}
	}
	return $ic_iconset;
}

function no_footer_cb() {
	echo $html  = '<div id="ict-footer-cb"></div>';
}
/* Initialize social network links
 * 'social_network_name' => 'social_network_link'
 */
$ic_social_links = array(
	'DaWanda'		=> '<i class="fa fa-heart" aria-hidden="true"></i>',
	'Facebook'		=> '<i class="fa fa-facebook" aria-hidden="true"></i>',
	'Twitter'		=> '<i class="fa fa-twitter" aria-hidden="true"></i>',
	'GooglePlus'	=> '<i class="fa fa-google-plus" aria-hidden="true"></i>',
	'YouTube'		=> '<i class="fa fa-youtube" aria-hidden="true"></i>',
);

/*
 * Add footer sidebar feature
 */
function footer_widget_init() {
	register_sidebar( array(
		'id' 			=> WIDGET_IDS[0],
		'name' 			=> __( 'Left Footer', 'increaretd'),
		'description' 	=> __( 'Select widgets for the left footer area.', 'increaretd' ),
		'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
		'after_widget'	=> '</div>',
	) );
	register_sidebar( array(
		'id'			=> WIDGET_IDS[1],
		'name'			=> __( 'Middle Footer', 'increaretd'),
		'description'	=> __( 'Select widgets for the middle footer area.', 'increaretd' ),
		'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
		'after_widget'	=> '</div>',
	) );
		register_sidebar( array(
		'id'			=> WIDGET_IDS[2],
		'name'			=> __( 'Right Footer', 'increaretd'),
		'description'	=> __( 'Select widgets for the right footer area.', 'increaretd' ),
		'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
		'after_widget'	=> '</div>',
	) );
}
add_action( 'widgets_init', 'footer_widget_init');

//add portfolio feature
function portfolio_theme_customizer( $wp_customize ) {
	
	function get_post_choices_array() {
		$post_choices = get_posts();
		$post_choice_options = array(
				'select_option' => '&mdash; Select &mdash;',
		);
		foreach ( $post_choices as $post_choice) {
			$post_choice_options[ $post_choice->ID ] = $post_choice->post_title;
		}
		return $post_choice_options;
	}

	$wp_customize->add_section( 'portfolio_post_section', array(
			'title'	=> 'Portfolio',
			'priority' => 30,
			'description' => 'Select three posts to dispalay them in the portfolio boxes.',
	) );
	
	$wp_customize->add_setting( 'portfolio_selection_0', array ( 
			'default'	=> 'select_option',
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'portfolio_selection_0', array(
			'label'		=> 'Portfolio (left)',
			'section'	=> 'portfolio_post_section',
			'settings'	=> 'portfolio_selection_0',
			'type'		=> 'select',
			'choices'	=> get_post_choices_array(),
			)
	) );
	
	$wp_customize->add_setting( 'portfolio_selection_1', array (
			'default'	=> 'select_option',
	) );
	
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'portfolio_selection_1', array(
			'label'		=> 'Portfolio (center)',
			'section'	=> 'portfolio_post_section',
			'settings'	=> 'portfolio_selection_1',
			'type'		=> 'select',
			'choices'	=> get_post_choices_array(),
			)
	) );
	
	$wp_customize->add_setting( 'portfolio_selection_2', array (
			'default'	=> 'select_option',
	) );
	
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'portfolio_selection_2', array(
			'label'		=> 'Portfolio (right)',
			'section'	=> 'portfolio_post_section',
			'settings'	=> 'portfolio_selection_2',
			'type'		=> 'select',
			'choices'	=> get_post_choices_array(),
	)
			) );
	
}
add_action('customize_register', 'portfolio_theme_customizer');

/* add social customization (iconsets, links & source */
function ic_social_icon_customizer( $wp_customize ) {

	global $ic_social_links;
	
	$wp_customize->add_section( 'ic_social_icon_customizer', array(
		'title'			=> __('Social settings', 'increaretd'),
		'description'	=> __('Select social iconsets and set links.', 'increaretd'),
	) );

	$wp_customize->add_setting( 'ic_select_icon_hover', array(
		'type'					=> 'theme_mod',
		'default'				=> '#00ff00',
		'transport'				=> 'refresh',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ic_select_icon_hover', array(
		'label'		=>	__( 'Select header :hover color', 'increaretd' ),
		'section'	=>	'ic_social_icon_customizer',
		'settings'	=>	'ic_select_icon_hover',
	) ) );

	foreach (array_keys($ic_social_links) as $setting_key ) {
		$wp_customize->add_setting( $setting_key, array(
			'type'		=> 'theme_mod',
			'default'	=> '',
			'transport'	=> 'refresh',
		) );
		$wp_customize->add_control( $setting_key, array(
			'label'		=> __( $setting_key, 'increaretd' ),
			'section'	=> 'ic_social_icon_customizer',
			'type'		=> 'text',
		) );
	}
}
add_action( 'customize_register', 'ic_social_icon_customizer' );