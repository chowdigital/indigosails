<?php
/**
 * Indigo Sails functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Indigo_Sails
 */

if ( ! defined( '_S_VERSION' ) ) {
	define( '_S_VERSION', '1.0.0' );
}

function indigo_sails_setup() {
	load_theme_textdomain( 'indigo-sails', get_template_directory() . '/languages' );

	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );

	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'indigo-sails' ),
		)
	);

	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	add_theme_support(
		'custom-background',
		apply_filters(
			'indigo_sails_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	add_theme_support( 'customize-selective-refresh-widgets' );

	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'indigo_sails_setup' );

function indigo_sails_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'indigo_sails_content_width', 640 );
}
add_action( 'after_setup_theme', 'indigo_sails_content_width', 0 );

function indigo_sails_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'indigo-sails' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'indigo-sails' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'indigo_sails_widgets_init' );

function indigo_sails_scripts() {
	// Splide core CSS
	wp_enqueue_style(
		'splide',
		'https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.3/dist/css/splide.min.css',
		array(),
		'4.1.3'
	);

	// Theme styles
	wp_enqueue_style('lightslider', get_template_directory_uri() . '/lightslider.css', array(), '1.2');
	wp_enqueue_style('indigo-sails-style', get_stylesheet_uri(), array(), _S_VERSION);
	wp_style_add_data('indigo-sails-style', 'rtl', 'replace');
	wp_enqueue_style('indigo-sails-typekit', 'https://use.typekit.net/xlb7tkc.css', array(), null);

	// Splide core JS
	wp_enqueue_script(
		'splide',
		'https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.3/dist/js/splide.min.js',
		array(),
		'4.1.3',
		true
	);

	// Splide AutoScroll extension
	wp_enqueue_script(
		'splide-autoscroll',
		'https://cdn.jsdelivr.net/npm/@splidejs/splide-extension-auto-scroll@0.4.1/dist/js/splide-extension-auto-scroll.min.js',
		array('splide'),
		'0.4.1',
		true
	);

	// Custom scripts
	wp_enqueue_script('indigo-sails-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);
	wp_enqueue_script('custom', get_template_directory_uri() . '/js/custom.js', array('splide', 'splide-autoscroll'), null, true);

	// Comment reply support
	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'indigo_sails_scripts');


// Includes
require get_template_directory() . '/inc/custom-header.php';
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/template-functions.php';
require get_template_directory() . '/inc/customizer.php';

if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

require_once get_template_directory() . '/functions/colours.php';
require_once get_template_directory() . '/functions/custom-about.php';
require_once get_template_directory() . '/functions/custom-gallery.php';
require_once get_template_directory() . '/functions/custom-reviews.php';
require_once get_template_directory() . '/functions/custom-timetable.php';
require_once get_template_directory() . '/functions/custom-footer.php';
require_once get_template_directory() . '/functions/nav-walker.php';
require_once get_template_directory() . '/functions/editor-setup.php';
require_once get_template_directory() . '/functions/metabox.php';
require_once get_template_directory() . '/functions/seo-metabox.php';
require_once get_template_directory() . '/functions/services.php';
require_once get_template_directory() . '/functions/google.php';

/** test area before moving to another file  */