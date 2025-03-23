<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package indigosails
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>
    <?php
if (is_singular()) { // Checks if it's a single post, page, or custom post type
    $meta_description = get_post_meta(get_the_ID(), 'meta-description-text', true);
    $meta_keywords = get_post_meta(get_the_ID(), 'meta-keywords-text', true);

    if ($meta_description) {
        echo '<meta name="description" content="' . esc_attr($meta_description) . '">' . "\n";
    }

    if ($meta_keywords) {
        echo '<meta name="keywords" content="' . esc_attr($meta_keywords) . '">' . "\n";
    }
}
?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <!--
    <nav class="navbar ">
        <div class="navbar-container container the-content">
            <input type="checkbox" name="" id="">
            <label class="hamburger-lines" for="nav-toggle">
                <span class="line line1"></span>
                <span class="line line2"></span>
                <span class="line line3"></span>
            </label>
            <?php
        wp_nav_menu(
            array(
                'theme_location' => 'menu-1',
				'menu_class'     => 'menu-items', // Set the class for <ul>
                'container'      => false,
                'walker'         => new Custom_Nav_Walker(),
                'depth'          => 2, // Ensure child items are rendered
            )
        );
        ?> <div id="page" class="site">
                <a class="skip-link screen-reader-text"
                    href="#primary"><?php esc_html_e( 'Skip to content', 'indigosails' ); ?></a>

                <header id="masthead" class="site-header">
                    <div class="site-branding">

                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/logo/logo_wide.svg"
                                alt="Tara Flynn" class="custom-logo">
                        </a>

                    </div>


                </header>
    </nav> -->