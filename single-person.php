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
                <?php echo get_post_meta(get_the_ID(), '_people_qualifications', true) ? '<h3>' . esc_html(get_post_meta(get_the_ID(), '_people_qualifications', true)) . '</h3>' : ''; ?>
                <?php
// Get social media links
$linkedin = get_post_meta(get_the_ID(), '_people_linkedin', true);
$twitter = get_post_meta(get_the_ID(), '_people_twitter', true);
$instagram = get_post_meta(get_the_ID(), '_people_instagram', true);

// Path to the icons folder
$icon_path = get_template_directory_uri() . '/assets/icon/';
?>

                <div class="social-media-links">
                    <?php if (!empty($linkedin)) : ?>
                    <a href="<?php echo esc_url($linkedin); ?>" target="_blank" rel="noopener noreferrer">
                        <img src="<?php echo esc_url($icon_path . 'in.svg'); ?>" alt="LinkedIn" class="social-icon" />
                    </a>
                    <?php endif; ?>

                    <?php if (!empty($twitter)) : ?>
                    <a href="<?php echo esc_url($twitter); ?>" target="_blank" rel="noopener noreferrer">
                        <img src="<?php echo esc_url($icon_path . 'x.svg'); ?>" alt="X" class="social-icon" />
                    </a>
                    <?php endif; ?>

                    <?php if (!empty($instagram)) : ?>
                    <a href="<?php echo esc_url($instagram); ?>" target="_blank" rel="noopener noreferrer">
                        <img src="<?php echo esc_url($icon_path . 'instagram.svg'); ?>" alt="Instagram"
                            class="social-icon" />
                    </a>
                    <?php endif; ?>
                </div>

                <?php
$bio = get_post_meta(get_the_ID(), '_people_bio', true);
if (!empty($bio)) : ?>
                <div class="person-bio">

                    <?php echo wpautop(esc_textarea($bio)); ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
        <?php endwhile; // End of the loop. ?>
    </section>
    <?php get_template_part('template-parts/person', 'quotes'); ?>

    <section class="container">
        <div class="entry-content">
            <?php the_content(); ?>

        </div>
    </section>
    <?php get_template_part('template-parts/person', 'video'); ?>
    <?php get_template_part('template-parts/home', 'reviews'); ?>

    <?php get_template_part('template-parts/person', 'books'); ?>
    <?php get_template_part('template-parts/person', 'intrests'); ?>


    <?php get_template_part('template-parts/content', 'meet'); ?>
</main><!-- #main -->

<?php
get_footer();