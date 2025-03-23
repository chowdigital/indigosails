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

    <!-- <section class="hero-video">
        <video class="hero-video__bg" autoplay muted loop playsinline>
            <source src="<?php echo get_template_directory_uri(); ?>/assets/video/indigo25.mp4" type="video/mp4"> Your
            browser does not support the video tag.
        </video>
        <div class="hero-video__overlay">
            <h1 class="h-lg italic">Sail through breathtaking destinations,<br>embrace adventure,<br>and discover
                something deeper within yourself.</h1>
            <div class="hero-video__buttons">
                <a href="#" class="btn">Discover our retreats</a>
                <a href="#" class="btn">Explore yacht charters</a>
            </div>
        </div>
    </section>

    <!-- Journey Section -->
    <section class="section-journey">

        <?php
$image1_id = get_post_meta(get_the_ID(), '_journey_image_1', true);
$image2_id = get_post_meta(get_the_ID(), '_journey_image_2', true);
$image3_id = get_post_meta(get_the_ID(), '_journey_image_3', true);
$image4_id = get_post_meta(get_the_ID(), '_journey_image_4', true);
$image5_id = get_post_meta(get_the_ID(), '_journey_image_5', true);
?>
        <div class="journey-section">
            <div class="journey-wrapper">
                <?php if ($image1_id): ?>
                <div class="journey-image image-1"
                    style="background-image: url('<?php echo esc_url(wp_get_attachment_image_url($image1_id, 'full')); ?>');">
                </div>
                <?php endif; ?>

                <?php if ($image2_id): ?>
                <div class="journey-image image-2"
                    style="background-image: url('<?php echo esc_url(wp_get_attachment_image_url($image2_id, 'full')); ?>');">
                </div>
                <?php endif; ?>

                <?php if ($image3_id): ?>
                <div class="journey-image image-3"
                    style="background-image: url('<?php echo esc_url(wp_get_attachment_image_url($image3_id, 'full')); ?>');">
                </div>
                <?php endif; ?>

                <?php if ($image4_id): ?>
                <div class="journey-image image-4"
                    style="background-image: url('<?php echo esc_url(wp_get_attachment_image_url($image4_id, 'full')); ?>');">
                </div>
                <?php endif; ?>

                <?php if ($image5_id): ?>
                <div class="journey-image image-5"
                    style="background-image: url('<?php echo esc_url(wp_get_attachment_image_url($image5_id, 'full')); ?>');">
                </div>
                <?php endif; ?>
            </div>

            <div class="journey-text journey-text-1">
                <h2 class="h-lg italic">Who will you become on your journey</h2>
            </div>
            <div class="journey-text journey-text-2">
                <h2>Luxury Meets Purpose</h2>
                <p>Indigo Sails is more than a yacht charter company. We blend high-end sailing with transformative
                    personal development experiences, led by world-class facilitators. Whether you’re looking for a
                    bespoke sailing adventure or a retreat to reset and recharge, our curated journeys are designed for
                    those who seek more.</p>

                <a class="u-link" href="#">find your retreat</a>
            </div>
            <div class="journey-text journey-text-3">
                <div class="text-block">
                    <h2>Transformative retreats on the ocean</h3>
                        <p>Step away from the noise and into a life-changing retreat. Our exclusive sailing retreats
                            combine
                            self-discovery, coaching, and adventure in breathtaking destinations.</p>
                        <a class="u-link" href="#">find your retreat</a>
                </div>
            </div>

    </section>

</main>

<?php get_footer(); ?>