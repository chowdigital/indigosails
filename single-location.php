<?php
/**
 * The template for displaying single posts for the "location" post type
 *
 * @package indigosails
 */

get_header();
?>

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

                // Retrieve custom meta field for Image 2
                $image2_id = get_post_meta(get_the_ID(), '_location_image_2', true);

                // Display Image 2
                if ($image2_id) {
                    $image2_url = wp_get_attachment_image_url($image2_id, 'full');
                    echo '<div class="three-image image-2 lux-reveal" style="background-image: url(\'' . esc_url($image2_url) . '\');"></div>';
                }
                ?>
            </div>
            <div class="three-image-content">
                <!-- Display the title as an H1 -->
                <h1 class="h-xxl title"><?php the_title(); ?></h1>

                <!-- Custom Text Box Content -->
                <div class="three-image-text body text-reveal fade-right">
                    <?php
                    $custom_text = get_post_meta(get_the_ID(), '_location_custom_text', true);
                    if (!empty($custom_text)) {
                        echo wp_kses_post(wpautop($custom_text));
                    }
                    ?>
                </div>
            </div>
        </div>

        <!-- Main content -->
        <div class="main-content">
            <?php the_content(); ?>
        </div>
    </section>
</main>

<?php
get_footer();