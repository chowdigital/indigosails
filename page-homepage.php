<?php
/* Template Name: Homepage 2 */
get_header();
?>
<section class="hero-video">
    <video class="hero-video__bg" autoplay muted loop playsinline>
        <source src="<?php echo get_template_directory_uri(); ?>/assets/video/Boat-clips_1.mp4" type="video/mp4"> Your
        browser does not support the video tag.
    </video>
    <div class="hero-video__overlay">
        <h1>Discover Your Authentic Self on a Luxury Yacht Retreat</h1>
        <p>A transformative week sailing the Croatian islands — where life and executive coaching meet fine dining,
            private beaches, and personal clarity.</p>
        <div class="hero-video__buttons">
            <a href="#" class="video-btn"><span class="btn-text">Explore the Retreat</span></a>
            <a href="#" class="video-btn"><span class="btn-text">Explore yacht charters</span></a>
        </div>
        <p class="hp-hero__badge">Now booking for Summer 2025</p>
    </div>
</section>

<!-- RETREAT SNAPSHOT -->
<!-- Journey Section -->
<section class="section-journey">

    <?php
$image1_id = get_post_meta(get_the_ID(), '_journey_image_1', true);
$image2_id = get_post_meta(get_the_ID(), '_journey_image_2', true);
$image3_id = get_post_meta(get_the_ID(), '_journey_image_3', true);
$image4_id = get_post_meta(get_the_ID(), '_journey_image_4', true);
$image5_id = get_post_meta(get_the_ID(), '_journey_image_5', true);
?>
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
            <h2 class="h-lg">Eight Days, Three Islands, One Life-Changing Journey</h2>
        </div>
        <div class="journey-text journey-text-2 text-reveal fade-right">
            <h2>Sail.<br>Reflect. <br>Transform.
            </h2>
            <p>From the cultural streets of Split to the beaches of Brac and the vibrant energy of Hvar, this
                retreat takes you
                through six Croatian destinations by luxury yacht.</p>

            <a class="u-link" href="#">find your retreat</a>
        </div>
        <div class="journey-text journey-text-3 text-reveal fade-left">
            <div class="text-block">

                <ul class="hp-journey__list">
                    <h2>Your Retreat, at a Glance
                    </h2>
                    <li>Private cabins on modern monohulls and catamarans</li>
                    <li>Sushi at Carpe Diem Beach Club, Stipanska</li>
                    <li>Yoga overlooking the Adriatic</li>
                    <li>Wine tasting at the award-winning Stina Winery</li>
                    <li>Sunset beach parties and spa time</li>
                </ul>
                <p class="hp-journey__subhead">All inclusive. No sailing experience required.</p>

                <a class="u-link" href="#">learn more</a>
            </div>
        </div>
</section>
<!-- RETREAT SNAPSHOT -->


<!-- Journey Section 2  -->
<!-- STORY BLOCK -->
<!-- VALUE PROPOSITION -->
<section class="hp-value-prop texture">
    <h2>Luxury, Coaching, and Adventure </h2>
    <h3 class="italic">All in One Extraordinary Journey</h3>
    <div class="hp-value-prop__grid">
        <div class="hp-value-prop__pillar">
            <div class="hp-value-prop__icon">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/icon/lantern.svg"
                    alt="Activities Illustration">
            </div>
            <h3>Personal Growth, Redefined</h3>
            <p>20+ hours of expertly guided life and executive coaching with globally recognised facilitators. Discover
                what truly drives you, and leave with clarity and direction.</p>
            <a class="u-link" href="#coaches">meet your coaches</a>
        </div>
        <div class="hp-value-prop__pillar">
            <div class="hp-value-prop__icon">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/icon/illo-sailing.svg"
                    alt="Activities Illustration">
            </div>
            <h3>Luxury, Without Pretence</h3>
            <p>Sail aboard premium yachts with your own cabin. Enjoy authentic Croatian cuisine, world-class wine, yoga
                at sunrise, and unforgettable evenings under the stars.</p>
            <a class="u-link" href="#coaches">view our yachts</a>
        </div>
        <div class="hp-value-prop__pillar">
            <div class="hp-value-prop__icon">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/icon/illo-programs.svg"
                    alt="Activities Illustration">
            </div>
            <h3>Connection That Lasts</h3>
            <p>Join a small group of open-minded travellers and build real connections — with others and with yourself.
                This is more than a retreat. It’s a movement.</p>
            <a class="u-link" href="#coaches">view the retreats</a>
        </div>
    </div>
</section>
<!-- STORY BLOCK -->
<section class="hp-story-block">
    <div class="hp-story-block__video">
        <video autoplay muted loop playsinline>
            <source src="<?php echo get_template_directory_uri(); ?>/assets/video/Boat-clips_1.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>
    <div class="hp-story-block__content texture">
        <blockquote>
            <p>“Indigo Sails merges self-discovery with Croatian island-hopping for a soulful escape."</p>
            <p>- The Daily Telegraph:</p>
        </blockquote>
    </div>
</section>

<!-- RETREAT INCLUSIONS -->


<section class="hp-inclusions">
    <h2>What’s Included</h2>

    <div class="hp-inclusions__grid">
        <div class="hp-inclusions__item">
            <div class="hp-value-prop__icon">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/icon/night.svg" alt="Activities Icon">
            </div>
            <p>7 nights on a luxury yacht (single, double, or shared cabin)</p>
        </div>
        <div class="hp-inclusions__item">
            <div class="hp-value-prop__icon">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/icon/lantern.svg" alt="Coaching Icon">
            </div>
            <p>20+ hours of workshops, masterclasses, and personal coaching</p>
        </div>
        <div class="hp-inclusions__item">
            <div class="hp-value-prop__icon">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/icon/food.svg" alt="Dining Icon">
            </div>
            <p>3 hosted dinners including a Michelin-listed gala</p>
        </div>
        <div class="hp-inclusions__item">
            <div class="hp-value-prop__icon">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/icon/coffee.svg" alt="Refreshments Icon">
            </div>
            <p>Daily coffee breaks, light lunches, and fresh breakfasts</p>
        </div>
        <div class="hp-inclusions__item">
            <div class="hp-value-prop__icon">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/icon/wine.svg" alt="Wine Icon">
            </div>
            <p>Beach BBQ, wine tastings, and sunset events</p>
        </div>
        <div class="hp-inclusions__item">
            <div class="hp-value-prop__icon">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/icon/yoga.svg" alt="Wellness Icon">
            </div>
            <p>Yoga, meditation, and optional water sports</p>
        </div>
        <div class="hp-inclusions__item">
            <div class="hp-value-prop__icon">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/icon/spa.svg" alt="Spa Icon">
            </div>
            <p>Spa access, wellness sessions, and private pool lounges</p>
        </div>
    </div>

    <p class="hp-inclusions__note">Every moment is designed to help you pause, reflect, and reconnect.</p>
</section>
<!-- RETREAT INCLUSIONS -->
<?php get_template_part('template-parts/content', 'meet'); ?>

<!-- TESTIMONIALS 

<div class="overflow"> 

    <section class="splide ticker-slider full-width reviews-section" aria-label="Luxury Review Ticker">
        <h2 class="center-text">Real Journeys. Real Results.</h2>
        <div class="splide__track">
            <ul class="splide__list">
                <li class="splide__slide ticker__item review-1">
                    <img src="http://localhost/indigo/wp-content/uploads/2025/03/AdobeStock_357300899_Preview.jpeg"
                        alt="Photo of James L.">
                    <p class="italic">“The coaches weren’t just experts — they were human, generous, and real. I’ve
                        never felt so supported.” — Alex, August 2023.</p>
                </li>

                <li class="splide__slide ticker__item review-2">
                    <img src="http://localhost/indigo/wp-content/uploads/2025/03/AdobeStock_1135554656_Preview.jpeg"
                        alt="Photo of Emily R.">

                    <p class="italic">“I expected a break. I left with a blueprint for the next chapter of my life.” -
                        Sarah, June 2023 guest</p>
                </li>

                <li class="splide__slide ticker__item review-3">
                    <img src="http://localhost/indigo/wp-content/uploads/2025/03/AdobeStock_599423575_Preview.jpeg"
                        alt="Photo of Sarah D.">
                    <p class="italic">“Waking up to the sound of the waves, practicing mindfulness at sunrise—this
                        was
                        the most profound journey I’ve ever taken.” – Sarah D.</p>
                </li>

                <li class="splide__slide ticker__item review-4">
                    <img src="http://localhost/indigo/wp-content/uploads/2025/03/shutterstock_2422173345.jpg"
                        alt="Photo of Daniel M.">
                    <p class="italic">“Every moment onboard felt intentional. The blend of calm, connection, and
                        clarity
                        was something I didn’t know I needed.” – Daniel M.</p>
                </li>
            </ul>
        </div>
    </section>
</div>
<!-- STORY BLOCK -->
<section class="hp-story-block">
    <div class="hp-story-block__video">
        <video autoplay muted loop playsinline>
            <source src="<?php echo get_template_directory_uri(); ?>/assets/video/Boat-clips_1.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>
    <div class="hp-story-block__content">
        <blockquote>
            <p>Most holidays help you escape.<br>This one helps you come back to yourself.</p>
            <p>Indigo Sails blends the indulgence of a premium holiday with the depth of a coaching retreat — to leave
                you
                aligned, energised, and alive.</p>
        </blockquote>
    </div>
</section>
<!-- FINAL CTA -->
<section class="hp-final-cta texture">
    <div class="hp-split-cta__item">
        <div class="hp-split-cta__image">
            <video autoplay muted loop playsinline>
                <source src="<?php echo get_template_directory_uri(); ?>/assets/video/sunset.mp4" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>
        <div class="hp-split-cta__content">
            <h3>Your Next Chapter Starts at Sea</h3>
            <p>Indigo Sails isn’t just a getaway — it’s a chance to chart a new course.</p>
            <div class="hp-cta__buttons">
                <a href="#" class="u-link">View Retreat Dates</a><br>
                <a href="#" class="u-link">Book a Call</a><br>
                <a href="#" class="u-link">Get the Full Guide</a>
            </div>
        </div>
    </div>
</section>

<!-- SPLIT CTA BLOCK -->
<section class="hp-split-cta texture">
    <div class="hp-split-cta__item">
        <div class="hp-split-cta__image">
            <img src="http://localhost/indigo/wp-content/uploads/2025/04/main-scaled.jpg" alt="Private Yacht Charter">
        </div>
        <div class="hp-split-cta__content">
            <h3>Private Yacht Charter</h3>
            <p>Crewed and bareboat options in Croatia and beyond, with concierge-level service at no extra cost.</p>
            <a href="#" class="u-link">Explore Yacht Charters</a>
        </div>
    </div>

    <div class="hp-split-cta__item">
        <div class="hp-split-cta__image">
            <img src="http://localhost/indigo/wp-content/uploads/2025/04/AdobeStock_494234553-scaled.jpeg"
                alt="Corporate Retreats">
        </div>
        <div class="hp-split-cta__content">
            <h3>Corporate Retreats</h3>
            <p>Tailored 3–4 day leadership and team-building experiences for high-performing companies.</p>
            <a href="#" class="u-link">Corporate Enquiries</a>
        </div>
    </div>
</section>

<?php get_footer(); ?>