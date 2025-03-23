<?php
/**
 * Template part for displaying page content in meet.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package indigosails
 */

?>

<section class="meet-content">
    <div class="container meet-plant">
        <div class="left">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 400 400" preserveAspectRatio="xMidYMid meet">
                <defs>
                    <clipPath id="blob-clip-left">
                        <path
                            d="M238.1,0C224.5,0,192.3,5.3,166.9,10.5c-39,8.8-55.9,19.3-94.9,49.1C26.3,96.5,21.2,105.3,2.6,168.5c-8.5,22.8,5.6,113.1,15.8,134.2,20.3,52.6,57.1,87,140.1,94,69.4,7,148.8,8.3,201.3-49.6,45.7-49.1,34.7-94.8,39.8-145.7C407.9,108.2,312.6,0,238.1,0" />
                    </clipPath>
                </defs>
                <image href="<?php echo esc_url(get_theme_mod('about_image')); ?>" class="blob-image"
                    clip-path="url(#blob-clip-left)" />
            </svg>
        </div>
        <div class="right">
            <h2 class="dynamic-title h2-stripe">
                <?php echo esc_html(get_theme_mod('about_title', 'Meet Tara Flynn')); ?></h2>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 400 400" preserveAspectRatio="xMidYMid meet">
                <defs>
                    <clipPath id="blob-clip-right">
                        <path
                            d="M238.1,0C224.5,0,192.3,5.3,166.9,10.5c-39,8.8-55.9,19.3-94.9,49.1C26.3,96.5,21.2,105.3,2.6,168.5c-8.5,22.8,5.6,113.1,15.8,134.2,20.3,52.6,57.1,87,140.1,94,69.4,7,148.8,8.3,201.3-49.6,45.7-49.1,34.7-94.8,39.8-145.7C407.9,108.2,312.6,0,238.1,0" />
                    </clipPath>
                </defs>
                <image href="<?php echo esc_url(get_theme_mod('about_image')); ?>" class="blob-image"
                    clip-path="url(#blob-clip-right)" />
            </svg>
            <div class="the-content">
                <p><?php echo wp_kses_post(get_theme_mod('about_content', 'Default about content text.')); ?></p>
            </div>
            <a class="cta" href="<?php echo esc_url(get_theme_mod('about_cta_link', '#')); ?>">
                <div><?php echo esc_html(get_theme_mod('about_cta_text', 'Call to Action')); ?></div>
            </a>
        </div>
    </div>
</section>