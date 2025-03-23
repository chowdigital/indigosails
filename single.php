<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package indigosails
 */

get_header();
?>



<main id="primary" class="site-main">
    <?php while ( have_posts() ) : the_post();
			get_template_part( 'template-parts/content', 'page' );
		endwhile; // End of the loop.
	?>

    <?php get_template_part( 'template-parts/content', 'blog' ); ?>

    <?php get_template_part( 'template-parts/content', 'timetable' ); ?>

    <?php get_template_part( 'template-parts/content', 'gallery' ); ?>

    <?php get_template_part( 'template-parts/content', 'reviews' ); ?>


</main><!-- #main -->

<?php
get_footer();