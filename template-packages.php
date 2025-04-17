<?php
/**
 * Template Name: Packages
 * Description: A custom template for displaying package details with Days 1-8.
 *
 * @package indigosails
 */

get_header(); // Include the header
?>



<section class="hero-video">
    <video class="hero-video__bg" autoplay muted loop playsinline>
        <source src="<?php echo get_template_directory_uri(); ?>/assets/video/indigo25.mp4" type="video/mp4"> Your
        browser does not support the video tag.
    </video>
    <div class="hero-video__overlay">
        <h1 class="h-lg italic">Sail through breathtaking destinations,<br>embrace adventure,<br>and discover
            something deeper within yourself.</h1>
        <div class="hero-video__buttons">
            <a href="#" class="video-btn"><span class="btn-text">Request an Invitation</span></a>
            <a href="#" class="video-btn"><span class="btn-text">Explore the Experience</span></a>
        </div>
    </div>
</section>
<main id="primary" class="site-main">

    <section class="section-three-image">
        <div class="three-image-wrapper">
            <div class="three-image-images">
                <?php
                // Feature image (Image 1)
                if (has_post_thumbnail()) {
                    $feature_image_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
                    echo '<div class="three-image image-1 lux-reveal" style="background-image: url(\'' . esc_url($feature_image_url) . '\');"></div>';
                }

                // Retrieve custom meta fields for additional images
                $image_1 = get_post_meta(get_the_ID(), '_packages_image_1', true);
                $image_2 = get_post_meta(get_the_ID(), '_packages_image_2', true);

                // Display Image 1
                if ($image_1) {
                    $image_1_url = wp_get_attachment_image_url($image_1, 'full');
                    echo '<div class="three-image image-2 lux-reveal" style="background-image: url(\'' . esc_url($image_1_url) . '\');"></div>';
                }

                // Display Image 2
                if ($image_2) {
                    $image_2_url = wp_get_attachment_image_url($image_2, 'full');
                    echo '<div class="three-image image-3 lux-reveal" style="background-image: url(\'' . esc_url($image_2_url) . '\');"></div>';
                }
                ?>
            </div>
            <div class="three-image-content">
                <!-- Display the title as an H1 -->
                <h1 class="h-xxl title"><?php the_title(); ?></h1>

                <!-- Sailing Route and Date -->
                <div class="three-image-text body text-reveal fade-right">
                    <h3>Sailing Route</h3>

                    <p><?php echo esc_html(get_post_meta(get_the_ID(), '_packages_sailing_route', true)); ?></p>
                    <h3>Date</h3>
                    <p><?php echo esc_html(get_post_meta(get_the_ID(), '_packages_date', true)); ?></p>
                </div>
            </div>
        </div>
    </section>

    <section class="container">

        <div class="map-sailing-route-section">
            <div class="map-sailing-route-wrapper">
                <div class="map-image lux-reveal">
                    <?php
                $map_image_id = get_post_meta(get_the_ID(), '_packages_map_image', true);
                if ($map_image_id) {
                    $map_image_url = wp_get_attachment_image_url($map_image_id, 'full');
                    echo '<img src="' . esc_url($map_image_url) . '" alt="Map" style="width: 100%;">';
                }
                ?>
                </div>
                <div class="sailing-route-text">
                    <?php
            // Display the content of the page
            while (have_posts()) : the_post();
                the_content();
            endwhile; // End of the loop.
            ?>
                </div>
            </div>
        </div>

    </section>
    <?php get_template_part('template-parts/content', 'days'); ?>
    <?php get_template_part('template-parts/content', 'locations'); ?>


</main>

<?php get_footer(); // Include the footer ?>