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

        <?php while ( have_posts() ) : the_post(); ?>
        <div class="single-post-container">
            <div class="single-post-image lux-reveal">
                <?php if ( has_post_thumbnail() ) : ?>
                <?php the_post_thumbnail( 'large' ); ?>
                <?php endif; ?>
            </div>
            <div class="single-post-content">
                <h1 class="entry-title"><?php the_title(); ?></h1>
                <?php
$bio = get_post_meta(get_the_ID(), '_people_bio', true);
if (!empty($bio)) : ?>
                <div class="person-bio">
                    <h2>Bio</h2>
                    <?php echo wpautop(esc_textarea($bio)); ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
        <?php endwhile; // End of the loop. ?>
    </section>
    <section class="container">
        <div class="entry-content">
            <?php the_content(); ?>

        </div>
    </section>
    <?php get_template_part('template-parts/content', 'meet'); ?>
</main><!-- #main -->

<?php
get_footer();