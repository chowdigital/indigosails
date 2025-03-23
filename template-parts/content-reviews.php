<?php
/**
 * Template part for displaying reviews
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package TaraFlynn
 */

?>
<section id="reviews" class="google-reviews-slider">
    <div class="container reviews-plant">

        <h2 class="dynamic-title h2-stripe">
            <?php echo esc_html(get_theme_mod('google_reviews_title', 'What Our Clients Say')); ?></h2>
        <ul id="googleReviewsSlider" class="google-reviews-slider-wrapper">
            <?php for ($i = 1; $i <= 4; $i++) : ?>
            <li class="google-review">
                <div class="google-review-stars">
                    <?php for ($j = 1; $j <= 5; $j++) : ?>
                    <svg class="custom-star" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" aria-hidden="true"
                        role="img">
                        <clipPath id="clippath-<?php echo $j; ?>">
                            <rect width="20" height="20" />
                        </clipPath>
                        <g clip-path="url(#clippath-<?php echo $j; ?>)">
                            <path
                                d="M15.1,18.9l-3.4-2.1c-.6-.4-1.4-.3-2,.2l-3,2.6c-.7.6-1.8.5-2.4-.2-.3-.4-.5-1-.4-1.5l.9-3.9c.2-.7-.1-1.5-.8-1.9l-3.4-2.1C0,9.5-.2,8.5.2,7.7c.3-.5.8-.8,1.3-.8l3.9-.3c.7,0,1.3-.6,1.5-1.3l.9-3.9c.2-.9,1.1-1.5,2-1.3.5.1.9.5,1.2,1l1.5,3.7c.3.7,1,1.1,1.7,1l3.9-.3c.9,0,1.7.6,1.8,1.6,0,.5-.2,1.1-.6,1.4l-3,2.6c-.5.5-.7,1.3-.5,1.9l1.5,3.7c.4.9,0,1.9-.9,2.2-.5.2-1.1.2-1.5-.1" />
                        </g>
                    </svg>
                    <?php endfor; ?>
                </div>
                <p class="google-review-text">
                    <?php echo esc_html(get_theme_mod("google_review_text_$i", '')); ?>
                </p>
                <p class="google-review-author">
                    - <?php echo esc_html(get_theme_mod("google_review_name_$i", '')); ?>
                </p>
            </li>
            <?php endfor; ?>
        </ul>

    </div>
</section>