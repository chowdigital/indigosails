<?php
/**
 * Template Name: Home Page Template
 * Description: A custom template for the home page.
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
    <?php get_template_part( 'template-parts/content', 'meet' ); ?>


    <?php get_template_part( 'template-parts/content', 'blog' ); ?>


    <?php get_template_part( 'template-parts/content', 'gallery' ); ?>

    <?php get_template_part( 'template-parts/content', 'reviews' ); ?>

    <?php get_template_part( 'template-parts/content', 'timetable' ); ?>

</main>

<?php get_footer(); ?>