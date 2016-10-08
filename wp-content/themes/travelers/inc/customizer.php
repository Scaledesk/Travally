<?php
/**
 * Travelers Theme Customizer.
 *
 * @package Travelers
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function travelers_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	// Home Page Featured posts
	$wp_customize->add_section( 'home_featured_posts', array(
		'title' 			=> __( 'Home Page Slider', 'travelers' )
	) );

	$wp_customize->add_setting( 'home_featured_posts', array(
		'default' 			=> '',
		'capability' 		=> 'edit_theme_options',
		'sanitize_callback' => 'travelers_checkbox_sanitize'
	) );

	$wp_customize->add_control( 'home_featured_posts', array(
		'type' 				=> 'checkbox',
		'label' 			=> __( 'Check to enable featured posts', 'travelers' ),
		'settings' 			=> 'home_featured_posts',
		'section' 			=> 'home_featured_posts'
	) );

	$cats = array();
	foreach ( get_categories() as $categories => $category ){
		$cats[$category->term_id] = $category->name;
	}
	$wp_customize->add_setting( 'home_featured_posts_select', array(
		'default' => '',
		'sanitize_callback' => 'absint'
	) );

	$wp_customize->add_control( 'home_featured_posts_select', array(
		'type'      => 'select',
		'label' 	=> __( 'Select Category', 'travelers' ),
		'choices'   => $cats,
		'settings'  => 'home_featured_posts_select',
		'section'   => 'home_featured_posts'
	) );

	$wp_customize->add_setting( 'dt_slide_number', array(
		'default' 			=> '3',
		'capability' 		=> 'edit_theme_options',
		'sanitize_callback' => 'travelers_sanitize_integer'
	) );

	$wp_customize->add_control( 'dt_slide_number', array(
		'type'			 	=> 'number',
		'label' 			=> __( 'No. of Slide', 'travelers' ),
		'section'			=> 'home_featured_posts',
		'settings' 			=> 'dt_slide_number'
	) );

	// Sticky Menu
	$wp_customize->add_section( 'dt_sticky_menu_section', array(
		'priority' 			=> 100,
		'title' 			=> __( 'Sticky Menu', 'travelers' )
	) );

	$wp_customize->add_setting( 'dt_sticky_menu', array(
			'default' 			=> 0,
			'capability' 		=> 'edit_theme_options',
			'sanitize_callback' => 'travelers_checkbox_sanitize'
	) );

	$wp_customize->add_control( 'dt_sticky_menu', array(
			'type' 				=> 'checkbox',
			'label' 			=> __( 'Check to enable the sticky Main menu', 'travelers' ),
			'settings' 			=> 'dt_sticky_menu',
			'section' 			=> 'dt_sticky_menu_section'
	) );

	// Primary Color
    $wp_customize->add_setting( 'travelers_primary_color', array(
			'priority' 			     => 4,
			'default' 			     => '#ff357b',
			'capability' 			 => 'edit_theme_options',
			'sanitize_callback'		 => 'travelers_color_sanitize'
	) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'travelers_primary_color', array(
			'label' 		=> __( 'Primary Color', 'travelers' ),
			'section' 		=> 'colors',
			'settings' 		=> 'travelers_primary_color'
	) ) );

    // Main Menu Color
    $wp_customize->add_setting( 'travelers_menu_color', array(
			'priority' 			     => 5,
			'default' 			     => '#ffffff',
			'capability' 			 => 'edit_theme_options',
			'sanitize_callback'		 => 'travelers_color_sanitize'
	) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'travelers_menu_color_picker', array(
			'label' 		=> __( 'Menu Font Color', 'travelers' ),
			'section' 		=> 'colors',
			'settings' 		=> 'travelers_menu_color'
	) ) );

    $wp_customize->add_setting( 'travelers_menu_bg_color', array(
			'priority' 				 => 6,
			'default' 				 => '#273039',
			'capability' 			 => 'edit_theme_options',
			'sanitize_callback'		 => 'travelers_color_sanitize'
	) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'travelers_menu_bg_color_picker', array(
			'label' 			=> __( 'Menu Background', 'travelers' ),
			'section' 			=> 'colors',
			'settings' 			=> 'travelers_menu_bg_color'
	) ) );

    $wp_customize->add_setting( 'travelers_menu_color_hover', array(
			'priority' 			     => 7,
			'default' 			     => '#ffffff',
			'capability' 			 => 'edit_theme_options',
			'sanitize_callback'		 => 'travelers_color_sanitize'
	) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'travelers_menu_hover_color_picker', array(
			'label' 			=> __( 'Menu Hover Font Color', 'travelers' ),
			'section' 			=> 'colors',
			'settings' 			=> 'travelers_menu_color_hover'
	) ) );

    $wp_customize->add_setting( 'travelers_menu_hover_bg_color', array(
			'priority' 			     => 8,
			'default' 			     => '#ff357b',
			'capability' 			 => 'edit_theme_options',
			'sanitize_callback'		 => 'travelers_color_sanitize'
	) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'travelers_menu_hover_bg_color_picker', array(
			'label' 			=> __( 'Menu Hover Background', 'travelers' ),
			'section' 			=> 'colors',
			'settings' 			=> 'travelers_menu_hover_bg_color'
	) ) );

	// Related Posts
	$wp_customize->add_section(
		'travelers_related_posts_section',
		array(
			'title' 			=> __( 'Related Posts', 'travelers' )
		)
	);

	$wp_customize->add_setting(
		'travelers_related_posts_setting',
		array(
			'default' 			=> 0,
			'capability' 		=> 'edit_theme_options',
			'sanitize_callback'	=> 'travelers_checkbox_sanitize'
		)
	);

	$wp_customize->add_control(
		'travelers_related_posts',
		array(
			'type' 				=> 'checkbox',
			'label' 			=> __( 'Check to activate the related posts', 'travelers' ),
			'section' 			=> 'travelers_related_posts_section',
			'settings' 			=> 'travelers_related_posts_setting'
		)
	);

	// Checkbox Sanitize
	function travelers_checkbox_sanitize( $input ) {
		if ( $input == 1 ) {
			return 1;
		} else {
			return '';
		}
	}

	// Color Sanitizate
	function travelers_color_sanitize( $hex_color, $setting ) {
		// Sanitize $input as a hex value without the hash prefix.
		$hex_color = sanitize_hex_color( $hex_color );

		// If $input is a valid hex value, return it; otherwise, return the default.
		return ( ! null( $hex_color ) ? $hex_color : $setting->default );
	}

	// Number Integer
	function travelers_sanitize_integer( $input ) {
		return absint( $input );
	}

}
add_action( 'customize_register', 'travelers_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function travelers_customize_preview_js() {
	wp_enqueue_script( 'travelers_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'travelers_customize_preview_js' );

/**
 * Enqueue Inline styles generated by customizer
 */
function travelers_customizer_styles() {

	$travelers_primary_color_val = esc_attr( get_theme_mod( 'travelers_primary_color' ) );

	if ( $travelers_primary_color_val != '#ff357b' && $travelers_primary_color_val != '' ) {
		$travelers_primary_color = "

    a:hover,
    .dt-logo a,
    .dt-featured-post .entry-header:hover h2 a,
    .dt-pagination-nav a:hover,
	.dt-pagination-nav .current:hover,
	.dt-pagination-nav .current,
	.dt-footer-bar a:hover {
        color: {$travelers_primary_color_val};
    }

    .dt-pagination-nav a:hover,
	.dt-pagination-nav .current:hover,
	.dt-pagination-nav .current {
        border-color: {$travelers_primary_color_val};
    }

    .tagcloud a:hover,
    .dt-front-post .entry-footer a:hover,
    #back-to-top:hover,
    .cat-links a:hover,
	.tags-links a:hover {
        background: {$travelers_primary_color_val};
    }
	";
	} else {
		$travelers_primary_color = '';
	}

	$travelers_menu_color_val = esc_attr( get_theme_mod( 'travelers_menu_color' ) );

	if ( $travelers_menu_color_val != '#ffffff' && $travelers_menu_color_val != '' ) {
		$travelers_menu_color = "

	.dt-menu-wrap li:hover > a,
	.dt-menu-wrap .current-menu-item a {
			color: {$travelers_menu_color_val} !important;
	}

	.dt-menu-wrap li a {
		color: {$travelers_menu_color_val};
	}
	";
	} else {
		$travelers_menu_color = '';
	}

	$travelers_menu_bg_color_val = esc_attr( get_theme_mod( 'travelers_menu_bg_color' ) );

	if ( $travelers_menu_bg_color_val != '#273039' && $travelers_menu_bg_color_val != '' ) {
		$travelers_menu_bg_color = "
	.dt-menu-wrap,
	.dt-menu-wrap ul {
		background: {$travelers_menu_bg_color_val};
	}
	";
	} else {
		$travelers_menu_bg_color = '';
	}

	$travelers_menu_color_hover_val = esc_attr( get_theme_mod( 'travelers_menu_color_hover' ) );

	if ( $travelers_menu_color_hover_val != '#ffffff' && $travelers_menu_color_hover_val != '' ) {
		$travelers_menu_color_hover = "
	.dt-menu-wrap li:hover > a,
	.dt-menu-wrap .current-menu-item a {
		color: {$travelers_menu_color_hover_val} !important;
	}

	.dt-menu-wrap li a:hover {
		color: {$travelers_menu_color_hover_val};
	}
	";
	} else {
		$travelers_menu_color_hover = '';
	}

	$travelers_menu_hover_bg_color_val = esc_attr( get_theme_mod( 'travelers_menu_hover_bg_color' ) );

	if ( $travelers_menu_hover_bg_color_val != '#ff357b' && $travelers_menu_hover_bg_color_val != '' ) {
		$travelers_menu_hover_bg_color = "
	.dt-menu-wrap li:hover > a,
	.dt-menu-wrap .current-menu-item a {
		background: {$travelers_menu_hover_bg_color_val} !important;
	}

	.dt-menu-wrap {
		border-color: {$travelers_menu_hover_bg_color_val};
	}

	";
	} else {
		$travelers_menu_hover_bg_color = '';
	}

	$dt_related_posts = 33.333333;

	$dt_related_posts_li = ".dt-related-posts li { width: calc({$dt_related_posts}% - 20px); }";

	$custom_css = $travelers_primary_color . $travelers_menu_color .$travelers_menu_bg_color .$travelers_menu_color_hover .$travelers_menu_hover_bg_color . $dt_related_posts_li;

	wp_add_inline_style( 'travelers-style', $custom_css );
}
add_action( 'wp_enqueue_scripts', 'travelers_customizer_styles' );
