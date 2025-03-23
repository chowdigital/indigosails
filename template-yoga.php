<?php
/**
 * Template Name: Finding Flow Yoga
 * Description: A custom template for the home page.
 *
 * @package Cloudsdale_Theme
 */
get_header(); // Adds the header
?>
<main id="primary" class="site-main">
    <section class="hidden-section"></section>
    <?php while ( have_posts() ) : the_post();
			get_template_part( 'template-parts/content', 'page' );
		endwhile; // End of the loop.
	?>

    <?php get_template_part( 'template-parts/content', 'blog' ); ?>
    <?php get_template_part( 'template-parts/content', 'timetable' ); ?>
    <?php get_template_part( 'template-parts/content', 'gallery' ); ?>
    <?php get_template_part( 'template-parts/content', 'reviews' ); ?>
</main>

<?php get_footer(); ?>