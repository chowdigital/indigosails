<?php
/**
 * The template for displaying single posts for the "location" post type
 *
 * @package indigosails
 */

get_header();
?>

<main id="primary" class="site-main">
    <section class="section-journey">

        <?php
        // Retrieve custom meta fields
        $image1_id = get_post_meta(get_the_ID(), '_location_image_1', true);
        $image2_id = get_post_meta(get_the_ID(), '_location_image_2', true);
        $image3_id = get_post_meta(get_the_ID(), '_location_image_3', true);
        $image4_id = get_post_meta(get_the_ID(), '_location_image_4', true);
        $image5_id = get_post_meta(get_the_ID(), '_location_image_5', true);

        $title_1 = get_post_meta(get_the_ID(), '_location_title_1', true);
        $text_area_1 = get_post_meta(get_the_ID(), '_location_text_area_1', true);
        $title_2 = get_post_meta(get_the_ID(), '_location_title_2', true);
        $text_area_2 = get_post_meta(get_the_ID(), '_location_text_area_2', true);
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

                <?php if ($title_1 || $text_area_1): ?>
                <div class="journey-text journey-text-1 text-reveal">
                    <h1><?php the_title(); ?></h1>
                </div>
                <?php endif; ?>

                <?php if ($title_2 || $text_area_2): ?>
                <div class="journey-text journey-text-2 text-reveal fade-right">
                    <h2><?php echo esc_html($title_1); ?></h2>
                    <p><?php echo esc_html($text_area_1); ?></p>
                </div>
                <?php endif; ?>

                <div class="journey-text journey-text-3 text-reveal fade-left">
                    <div class="text-block">
                        <h2><?php echo esc_html($title_2); ?></h2>
                        <p><?php echo esc_html($text_area_2); ?></p>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <div class="section">
        <div>
            <?php the_content(); ?>
            <!-- Main content -->
        </div>
    </div>
</main>

<?php
get_footer();