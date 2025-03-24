<?php
/**
 * Template Name: Home Page Template
 * Description: A custom template for the home page.
 *
 * @package Cloudsdale_Theme
 */
get_header(); // Adds the header
?>
<!--
<section class="hero-video">
    <video class="hero-video__bg" autoplay muted loop playsinline>
        <source src="<?php echo get_template_directory_uri(); ?>/assets/video/indigo25.mp4" type="video/mp4"> Your
        browser does not support the video tag.
    </video>
    <div class="hero-video__overlay">
        <h1 class="h-lg italic">Sail through breathtaking destinations,<br>embrace adventure,<br>and discover
            something deeper within yourself.</h1>
        <div class="hero-video__buttons">
            <a href="#" class="video-btn"><span class="btn-text">Discover our retreats</span></a>
            <a href="#" class="video-btn"><span class="btn-text">Explore yacht charters</span></a>
        </div>
    </div>
</section>-->
<main id="primary" class="site-main">

    <section class="section-three-image">
        <div class="three-image-wrapper">
            <div class="three-image-images">
                <div class="three-image image-1"></div>
                <div class="three-image image-2"></div>
                <div class="three-image image-3"></div>
            </div>
            <div class="three-image-content">
                <h2 class="h-xxl title">Your Journey Awaits</h2>
                <div class="three-image-text body">
                    <p>Text area here – fill with your story or message.</p>
                </div>
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
                <div class="journey-image image-1 lux-reveal"
                    style="background-image: url('<?php echo esc_url(wp_get_attachment_image_url($image1_id, 'full')); ?>');">
                </div>
                <?php endif; ?>

                <?php if ($image2_id): ?>
                <div class="journey-image image-2 lux-reveal"
                    style="background-image: url('<?php echo esc_url(wp_get_attachment_image_url($image2_id, 'full')); ?>');">
                </div>
                <?php endif; ?>

                <?php if ($image3_id): ?>
                <div class="journey-image image-3 lux-reveal"
                    style="background-image: url('<?php echo esc_url(wp_get_attachment_image_url($image3_id, 'full')); ?>');">
                </div>
                <?php endif; ?>

                <?php if ($image4_id): ?>
                <div class="journey-image image-4 lux-reveal"
                    style="background-image: url('<?php echo esc_url(wp_get_attachment_image_url($image4_id, 'full')); ?>');">
                </div>
                <?php endif; ?>

                <?php if ($image5_id): ?>
                <div class="journey-image image-5 lux-reveal"
                    style="background-image: url('<?php echo esc_url(wp_get_attachment_image_url($image5_id, 'full')); ?>');">
                </div>
                <?php endif; ?>


                <div class="journey-text journey-text-1 text-reveal">
                    <h2 class="h-lg italic">Who will you become on your journey</h2>
                </div>
                <div class="journey-text journey-text-2 text-reveal fade-right">
                    <h2>Luxury Meets Purpose</h2>
                    <p>Indigo Sails is more than a yacht charter company. We blend high-end sailing with
                        transformative
                        personal development experiences, led by world-class facilitators. Whether you’re looking
                        for a
                        bespoke sailing adventure or a retreat to reset and recharge, our curated journeys are
                        designed
                        for
                        those who seek more.</p>

                    <a class="u-link" href="#">find your retreat</a>
                </div>
                <div class="journey-text journey-text-3 text-reveal fade-left">
                    <div class="text-block">
                        <h2>Transformative retreats on the ocean</h3>
                            <p>Step away from the noise and into a life-changing retreat. Our exclusive sailing
                                retreats
                                combine
                                self-discovery, coaching, and adventure in breathtaking destinations.</p>
                            <a class="u-link" href="#">find your retreat</a>
                    </div>
                </div>
            </div>
    </section>
    <div class="ticker">
        <div class="ticker__track">

            <!-- Set 1 -->
            <div class="ticker__item review-1">
                <img src="http://localhost/indigo/wp-content/uploads/2025/03/AdobeStock_357300899_Preview.jpeg"
                    alt="Photo of James L.">
                <p class="italic">“Indigo Sails crafted the most incredible journey—every detail was perfection. I’ve
                    never felt more relaxed and inspired.” – James L.</p>
            </div>

            <div class="ticker__item review-2">
                <img src="http://localhost/indigo/wp-content/uploads/2025/03/AdobeStock_1135554656_Preview.jpeg"
                    alt="Photo of Emily R.">
                <p class="italic">“From the moment we set sail, everything was seamless. Pure luxury, breathtaking
                    views, and an experience we’ll never forget.” – Emily R.</p>
            </div>

            <div class="ticker__item review-3">
                <img src="http://localhost/indigo/wp-content/uploads/2025/03/AdobeStock_599423575_Preview.jpeg"
                    alt="Photo of Sarah D.">
                <p class="italic">“Waking up to the sound of the waves, practicing mindfulness at sunrise—this was the
                    most profound journey I’ve ever taken.” – Sarah D.</p>
            </div>

            <div class="ticker__item review-4">
                <img src="http://localhost/indigo/wp-content/uploads/2025/03/shutterstock_2422173345.jpg"
                    alt="Photo of Daniel M.">
                <p class="italic">“Every moment onboard felt intentional. The blend of calm, connection, and clarity was
                    something I didn’t know I needed.” – Daniel M.</p>
            </div>

            <!-- Set 2 (duplicate) -->
            <div class="ticker__item review-1">
                <img src="http://localhost/indigo/wp-content/uploads/2025/03/AdobeStock_357300899_Preview.jpeg"
                    alt="Photo of James L.">
                <p class="italic">“Indigo Sails crafted the most incredible journey—every detail was perfection. I’ve
                    never felt more relaxed and inspired.” – James L.</p>
            </div>

            <div class="ticker__item review-2">
                <img src="http://localhost/indigo/wp-content/uploads/2025/03/AdobeStock_1135554656_Preview.jpeg"
                    alt="Photo of Emily R.">
                <p class="italic">“From the moment we set sail, everything was seamless. Pure luxury, breathtaking
                    views, and an experience we’ll never forget.” – Emily R.</p>
            </div>

            <div class="ticker__item review-3">
                <img src="http://localhost/indigo/wp-content/uploads/2025/03/AdobeStock_599423575_Preview.jpeg"
                    alt="Photo of Sarah D.">
                <p class="italic">“Waking up to the sound of the waves, practicing mindfulness at sunrise—this was the
                    most profound journey I’ve ever taken.” – Sarah D.</p>
            </div>

            <div class="ticker__item review-4">
                <img src="http://localhost/indigo/wp-content/uploads/2025/03/shutterstock_2422173345.jpg"
                    alt="Photo of Daniel M.">
                <p class="italic">“Every moment onboard felt intentional. The blend of calm, connection, and clarity was
                    something I didn’t know I needed.” – Daniel M.</p>
            </div>

        </div>
    </div>

</main>

<?php get_footer(); ?>