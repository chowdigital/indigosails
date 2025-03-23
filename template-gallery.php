<?php
/**
 * Template Name: Gallery
 * Description: A custom template for the Yoga page.
 *
 * @package Cloudsdale_Theme
 */
get_header(); // Adds the header
?>

<main id="primary" class="site-main">
    <?php while ( have_posts() ) : the_post();
			get_template_part( 'template-parts/content', 'page-wide' );
		endwhile; // End of the loop.
	?>


    <?php get_template_part( 'template-parts/content', 'reviews' ); ?>



</main>

<?php get_footer(); ?>