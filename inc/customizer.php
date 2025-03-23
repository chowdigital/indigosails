<?php
/**
 * TaraFlynn Theme Customizer
 *
 * @package TaraFlynn
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function taraflynn_customize_register( $wp_customize ) {
	// Only keep Site Identity (blogname and blogdescription) and About Section.

	// Add postMessage support for Site Identity.
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'taraflynn_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'taraflynn_customize_partial_blogdescription',
			)
		);
	}

	// Remove default sections you don't need.
	$wp_customize->remove_section( 'colors' );            // Colors Section.
	$wp_customize->remove_section( 'header_image' );      // Header Image Section.
	$wp_customize->remove_section( 'background_image' );  // Background Image Section.
	$wp_customize->remove_section( 'static_front_page' ); // Static Front Page Section.
	$wp_customize->remove_section( 'menus' );
	$wp_customize->remove_section( 'widgets' );
	$wp_customize->remove_section( 'custom_css' );
}

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function taraflynn_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function taraflynn_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function taraflynn_customize_preview_js() {
	wp_enqueue_script(
		'taraflynn-customizer',
		get_template_directory_uri() . '/js/customizer.js',
		array( 'customize-preview' ),
		_S_VERSION,
		true
	);
}
add_action( 'customize_register', 'taraflynn_customize_register' );
add_action( 'customize_preview_init', 'taraflynn_customize_preview_js' );