<section class="container-wide">
    <div id="yt-splide" class="splide">
        <div class="splide__track">
            <ul class="splide__list">
                <?php
                    $args = [
                        'post_type' => 'yacht',
                        'posts_per_page' => -1
                    ];
                    $yachts = new WP_Query($args);
                    if ($yachts->have_posts()) :
                        while ($yachts->have_posts()) : $yachts->the_post(); ?>
                <li class="splide__slide yt-slide">
                    <div class="boat-wrapper">
                        <!-- Full-width feature image -->
                        <div class="boat-feature-image"
                            style="background-image: url('<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'full')); ?>');">
                        </div>

                        <!-- Interior photo and boat stats -->
                        <div class="boat-details">

                            <?php
                                // Retrieve the interior photo custom field
                                $interior_photo = get_post_meta(get_the_ID(), '_yacht_interior_photo', true);
                                ?>
                            <div class="boat-interior"
                                style="background-image: url('<?php echo esc_url($interior_photo); ?>'); background-size: cover; background-position: center; background-repeat: no-repeat; height: 100%; width: 100%;">
                            </div>
                            <div class="boat-stats">
                                <div class="boat-stat">
                                    <h3><?php the_title(); ?></h3> <!-- Add the page title here -->
                                </div>
                                <?php
                                    $cabins = get_post_meta(get_the_ID(), '_yacht_cabins', true);
                                    $guests = get_post_meta(get_the_ID(), '_yacht_guests', true);
                                    $charter_dates = get_post_meta(get_the_ID(), '_yacht_charter_dates', true);
                                    $location = get_post_meta(get_the_ID(), '_yacht_location', true);
                                    $price_per_week = get_post_meta(get_the_ID(), '_yacht_price_per_week', true);
                                    $price_per_person_per_week = get_post_meta(get_the_ID(), '_yacht_price_per_person_per_week', true);
                                    ?>

                                <?php if (!empty($cabins)) : ?>
                                <div class="boat-stat">
                                    <strong>Cabins:</strong> <?php echo esc_html($cabins); ?>
                                </div>
                                <?php endif; ?>

                                <?php if (!empty($guests)) : ?>
                                <div class="boat-stat">
                                    <strong>Guests:</strong> <?php echo esc_html($guests); ?>
                                </div>
                                <?php endif; ?>

                                <?php if (!empty($charter_dates)) : ?>
                                <div class="boat-stat">
                                    <strong>Charter Dates:</strong> <?php echo esc_html($charter_dates); ?>
                                </div>
                                <?php endif; ?>

                                <?php if (!empty($location)) : ?>
                                <div class="boat-stat">
                                    <strong>Location:</strong> <?php echo esc_html($location); ?>
                                </div>
                                <?php endif; ?>

                                <?php if (!empty($price_per_week)) : ?>
                                <div class="boat-stat">
                                    <strong>Price Per Week:</strong> <?php echo esc_html($price_per_week); ?>
                                </div>
                                <?php endif; ?>

                                <?php if (!empty($price_per_person_per_week)) : ?>
                                <div class="boat-stat">
                                    <strong>Price Per Person Per Week:</strong>
                                    <?php echo esc_html($price_per_person_per_week); ?>
                                </div>
                                <?php endif; ?>
                                <div class="boat-stat">
                                    <a href="<?php echo esc_url(get_permalink()); ?>" class="u-link">learn more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <?php endwhile;
                        wp_reset_postdata();
                    else : ?>
                <p>No yachts found.</p>
                <?php endif; ?>
            </ul>
        </div>
    </div>
    </div>
</section>
<script>
document.addEventListener('DOMContentLoaded', function() {
    new Splide('#yt-splide', {
        type: 'loop',
        perPage: 1,
        perMove: 1,
        autoplay: true,
        interval: 5000,
        pagination: true,
        arrows: true,
    }).mount();
});
</script>