<?php

/**
 * increare functions and definitions
 * 
 * @package WordPress
 * @subpackage increare
 * @since increare 0.01
 * 
 */
 
//add theme supports
add_theme_support( 'custom-background' );
add_theme_support( 'custom-logo' );

// clean wp header
// source: https://digwp.com/2010/03/wordpress-functions-php-template-custom-functions/
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');

//disable admin bar
add_filter('show_admin_bar', '__return_false');

/* init social stuff
 * "register" more iconsets here
 * 'iconset_suffix' => 'iconset_name'
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

$ic_icon_suffix = array(
	'_01.png'	=> 'jeans',
	'_02.png'	=> 'blue - white',
	'_03.png'	=> 'white - blue',
);

/* "register" morge social stuff here
 * 'social_network_name' => 'social_network_link'
 * social_network_link will be displayed as the placeholder property
 */
$ic_social_links = array(
	'DaWanda'		=> 'Link to DaWanda',
	'Facebook'		=> 'Link to Facebook',
	'Twitter'		=> 'Link to Twitter',
	'GooglePlus'	=> 'Link to Google plus',
	'YouTube'		=> 'Link to YouTube',
);

//add footer sidebar feature

function footer_widget_init() {

	register_sidebar( array(
		'name' 			=> __( 'Footer Widgets (left)', 'increare'),
		'id' 			=> 'left_footer_widgets',
		'description' 	=> __( 'Select widgets for the left footer area.', 'increare' ),
		'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
		'after_widget'	=> '</div>',
		'before_title'	=> '<h3 class="widget-title">',
		'after_title'	=> '</h3>', 
	) );
		
	register_sidebar( array( 
		'name'			=> __( 'Footer Widgets (middle)', 'increare'),
		'id'			=> 'middle_footer_widgets',
		'description'	=> __( 'Select widgets for the middle footer area.', 'increare' ),
		'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
		'after_widget'	=> '</div>',
		'before_title'	=> '<h3 class="widget-title">',
		'after_title'	=> '</h3>',
	) );
	
		register_sidebar( array( 
		'name'			=> __( 'Footer Widgets (right)', 'increare'),
		'id'			=> 'right_footer_widgets',
		'description'	=> __( 'Select widgets for the right footer area.', 'increare' ),
		'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
		'after_widget'	=> '</div>',
		'before_title'	=> '<h3 class="widget-title">',
		'after_title'	=> '</h3>',
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

	global $ic_social_links, $ic_icon_suffix;
	
	$wp_customize->add_section( 'ic_social_icon_customizer', array(
		'title'			=> __('Social settings', 'increaretd'),
		'description'	=> __('Select social iconsets and set links.', 'increaretd'),
	) );

	$wp_customize->add_setting( 'ic_select_iconset', array(
		'type'					=> 'theme_mod',
		'default'				=> 'empty',
		'transport'				=> 'refresh',
	) );

	$wp_customize->add_control( 'ic_select_iconset', array(
		'label'		=> __( 'Select iconset.', 'incerearetd' ),
		'section'	=> 'ic_social_icon_customizer',
		'type'		=> 'select',
		'choices'	=> get_icon_path(),
	) );

	foreach ($ic_social_links as $setting_key => $social_link) {

		$label = 'Set ' . $setting_key . ' link';

		$wp_customize->add_setting( $setting_key, array(
			'type'		=> 'theme_mod',
			'default'	=>	$setting_key,
			'transport'	=>	'refresh',
		) );
		
		$wp_customize->add_control( $setting_key, array(
			'label'			=> __( $label, 'increaretd'),
			'section'		=> 'ic_social_icon_customizer',
			'type'			=> 'text',
		) );
	}
}

add_action( 'customize_register', 'ic_social_icon_customizer' );

function ic_social_link_customizer() {}

add_action( 'customize_register', 'ic_social_link_customizer' );

function ic_head_contact_customizer() {}

add_action( 'customize_register', 'ic_head_contact_customizer' );