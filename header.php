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



    <header class="site-header">
        <div class="site-branding">
            <?php the_custom_logo(); ?>
        </div>

        <button class="menu-toggle" aria-controls="site-navigation" aria-expanded="false">
            <span class="menu-icon">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </span>
        </button>

        <nav id="site-navigation" class="main-navigation">
            <?php
    wp_nav_menu(array(
      'theme_location' => 'menu-1',
      'menu_class'     => 'primary-menu',
      'container'      => false,
      'walker'         => new Custom_Nav_Walker(),
    ));
    ?>
        </nav>
    </header>
    </nav>