<?php add_theme_support( 'custom-background' );

// clean wp header
// source: https://digwp.com/2010/03/wordpress-functions-php-template-custom-functions/

remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');

//disable admin bar
add_filter('show_admin_bar', '__return_false');

//add footer sidebar feature

function footer_widget_init() {
	register_sidebar( array(
		'name' 			=> __( 'Left Footer Widget Area', 'increare'),
		'id' 			=> 'left-footer-widget-area',
		'description' 	=> __( 'Widget Area for the left footer.' ),
		'before_widget' => '<div id="%1$s" clas="widget-container %2$s">',
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

//add Logo support
function themeslug_theme_customizer( $wp_customize ) {
	$wp_customize->add_section( 'themeslug_logo_section' , array(
			'title' => __( 'Logo', 'themeslug' ),
			'priority' => 30,
			'description' => 'Upload a logo to replace the default site name and description in the header',
	) );
	$wp_customize->add_setting( 'themeslug_logo' );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themeslug_logo', array(
			'label' => __( 'Logo', 'themeslug' ),
			'section' => 'themeslug_logo_section',
			'settings' => 'themeslug_logo',
	) ) );
}
add_action('customize_register', 'themeslug_theme_customizer');
add_action('customize_register', 'portfolio_theme_customizer');
?>