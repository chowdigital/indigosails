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
    <section class="container">
        <h1>hello Yachts</h1>
        <?php while ( have_posts() ) : the_post(); ?>
        <div class="single-post-container">
            <div class="single-post-image lux-reveal">
                <?php if ( has_post_thumbnail() ) : ?>
                <?php the_post_thumbnail( 'large' ); ?>
                <?php endif; ?>
            </div>
            <div class="single-post-content">
                <h1 class="entry-title"><?php the_title(); ?></h1>
                <div class="entry-content">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
        <?php endwhile; // End of the loop. ?>
    </section>
    <section class="container">
        <h2>View our other Yachts</h2>
    </section>
    <?php get_template_part('template-parts/content', 'yachts'); ?>

</main><!-- #main -->

<?php
get_footer();