<?php
/**
 * Template part for displaying blog loops
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package TaraFlynn
 */

?>

<section class="gallery-section">
    <div class="container">
        <h2 class="dynamic-title h2-stripe">
            <?php echo esc_html(get_theme_mod('gallery_section_title', 'Title')); ?>
        </h2>
        <div class="gallery-row">
            <div class="gallery-col gallery-col-1 gallery-plant">
                <div class="gallery-image"
                    style="background-image: url(<?php echo esc_url(get_theme_mod('gallery_col1_image')); ?>);"></div>
            </div>
            <div class="gallery-col gallery-col-2">
                <div class="gallery-image"
                    style="background-image: url(<?php echo esc_url(get_theme_mod('gallery_col2_image')); ?>);"></div>
            </div>
            <div class="gallery-col gallery-col-3">
                <div class="gallery-image"
                    style="background-image: url(<?php echo esc_url(get_theme_mod('gallery_col3_image')); ?>);"></div>
            </div>
            <div class="gallery-col gallery-col-4">
                <div class="gallery-text">
                    <p><?php echo nl2br(esc_html(get_theme_mod('gallery_col4_text'))); ?></p>

                </div>
                <a href="<?php echo esc_url(get_theme_mod('gallery_col4_button_link')); ?>" class="cta">
                    <div><?php echo esc_html(get_theme_mod('gallery_col4_button_text')); ?></div>
                </a>
            </div>
        </div>
    </div>
</section>