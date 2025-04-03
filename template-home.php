<?php
/**
 * Template Name: Home Page Template
 * Description: A custom template for the home page.
 *
 * @package Cloudsdale_Theme
 */
get_header(); // Adds the header
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
            <a href="#" class="video-btn"><span class="btn-text">Discover our retreats</span></a>
            <a href="#" class="video-btn"><span class="btn-text">Explore yacht charters</span></a>
        </div>
    </div>
</section>
<main id="primary" class="site-main">



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
    <div class="overflow">

        <section class="splide ticker-slider full-width" aria-label="Luxury Review Ticker">
            <div class="splide__track">
                <ul class="splide__list">
                    <li class="splide__slide ticker__item review-1">
                        <img src="http://localhost/indigo/wp-content/uploads/2025/03/AdobeStock_357300899_Preview.jpeg"
                            alt="Photo of James L.">
                        <p class="italic">“Indigo Sails crafted the most incredible journey—every detail was perfection.
                            I’ve never felt more relaxed and inspired.” – James L.</p>
                    </li>

                    <li class="splide__slide ticker__item review-2">
                        <img src="http://localhost/indigo/wp-content/uploads/2025/03/AdobeStock_1135554656_Preview.jpeg"
                            alt="Photo of Emily R.">
                        <p class="italic">“From the moment we set sail, everything was seamless. Pure luxury,
                            breathtaking
                            views, and an experience we’ll never forget.” – Emily R.</p>
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
    <section class="section-three-image">
        <div class="three-image-wrapper">
            <div class="three-image-images">
                <div class="three-image image-1 lux-reveal"
                    style="background-image: url('http://localhost/indigo/wp-content/uploads/2025/03/shutterstock_158192810-scaled.jpg');">
                </div>
                <div class="three-image image-2 lux-reveal"
                    style="background-image: url('http://localhost/indigo/wp-content/uploads/2025/03/shutterstock_1306660198-scaled.jpg');">
                </div>
                <div class="three-image image-3 lux-reveal"
                    style="background-image: url('http://localhost/indigo/wp-content/uploads/2025/03/shutterstock_562748494-scaled.jpg');">
                </div>
            </div>
            <div class="three-image-content">
                <h2 class="h-xxl title">Set Sail With Indigo</h2>
                <div class="three-image-text body text-reveal fade-right">
                    <h4>Unmatched Expertise</h4>

                    <p>Over X years in luxury yacht travel & personal development.</p>


                    <a class="u-link" href="#"> learn about our history</a>

                    <h4>World-Class Facilitators</h4>

                    <p>Renowned coaches and mentors.</p>

                    <a class="u-link" href="#">meet our mentors</a>


                    <h4>Seamless, Personalized Service
                    </h4>
                    <p>Concierge-level travel planning</p>

                    <a class="u-link" href="#">plan your luxury trip</a>
                </div>
            </div>
        </div>
    </section>


    <section class="section-profiles">
        <div class="intro text-reveal">
            <h2>Meet our Life & Executive Coaches</h2>
            <p class="subheading text-reveal fade-right">Our personal development programme is led by a blend of
                reputable academic
                professionals,
                renowned authors,
                and inspirational storytellers with a wide array of unique experiences.
            </p>
        </div>
        <div class="profiles" data-splide-breakpoint>
            <!-- Profile 1 -->
            <div class="profile active">
                <div class="profile-image"
                    style="background-image: url('http://localhost/indigo/wp-content/uploads/2025/03/AdobeStock_357300899_Preview.jpeg');">
                </div>
                <div class="profile-title">Alexander Mackenzie</div>
                <div class="profile-content">
                    <p>Adjunct Professor in Experiential Leadership Programmes - Hult International Business School;
                        Ashridge Executive Education (driving commercial ambition with personal integrity through story
                        telling and arts)
                    </p>
                    <a class="u-link" href="#">read more</a>
                </div>
            </div>

            <!-- Profile 2 -->
            <div class="profile ready">
                <div class="profile-image"
                    style="background-image: url('http://localhost/indigo/wp-content/uploads/2025/03/AdobeStock_1135554656_Preview.jpeg');">
                </div>
                <div class="profile-title">Emily R.</div>
                <div class="profile-content">
                    <p>Director of Fearless Leadership Programme, Cranfield University
                    </p>
                    <a class="u-link" href="#">read more</a>
                </div>
            </div>

            <!-- Profile 3 -->
            <div class="profile ready">
                <div class="profile-image"
                    style="background-image: url('http://localhost/indigo/wp-content/uploads/2025/03/AdobeStock_599423575_Preview.jpeg');">
                </div>
                <div class="profile-title">Sarah D.</div>
                <div class="profile-content">
                    <p>Director of Fearless Leadership Programme, Cranfield University
                    </p>
                    <a class="u-link" href="#">read more</a>
                </div>
            </div>

            <!-- Profile 4 -->
            <div class="profile ready">
                <div class="profile-image"
                    style="background-image: url('http://localhost/indigo/wp-content/uploads/2025/03/shutterstock_2422173345.jpg');">
                </div>
                <div class="profile-title">Daniel M.</div>
                <div class="profile-content">
                    <p>Director of Fearless Leadership Programme, Cranfield University
                    </p>
                    <a class="u-link" href="#">read more</a>
                </div>
            </div>

            <!-- Profile 5 (repeat image 1) -->
            <div class="profile ready">
                <div class="profile-image"
                    style="background-image: url('http://localhost/indigo/wp-content/uploads/2025/03/AdobeStock_357300899_Preview.jpeg');">
                </div>
                <div class="profile-title">Amelia B.</div>
                <div class="profile-content">
                    <p>Director of Fearless Leadership Programme, Cranfield University
                    </p>
                    <a class="u-link" href="#">read more</a>
                </div>
            </div>

            <!-- Profile 6 (repeat image 2) -->
            <div class="profile ready">
                <div class="profile-image"
                    style="background-image: url('http://localhost/indigo/wp-content/uploads/2025/03/AdobeStock_1135554656_Preview.jpeg');">
                </div>
                <div class="profile-title">Leo S.</div>
                <div class="profile-content">
                    <p>Director of Fearless Leadership Programme, Cranfield University
                    </p>
                    <a class="u-link" href="#">read more</a>
                </div>
            </div>

            <!-- Profile 7 (repeat image 3) -->
            <div class="profile ready">
                <div class="profile-image"
                    style="background-image: url('http://localhost/indigo/wp-content/uploads/2025/03/AdobeStock_599423575_Preview.jpeg');">
                </div>
                <div class="profile-title">Isabelle W.</div>
                <div class="profile-content">
                    <p>Director of Fearless Leadership Programme, Cranfield University
                    </p>
                    <a class="u-link" href="#">read more</a>
                </div>
            </div>

            <!-- Profile 8 (repeat image 4) -->
            <div class="profile ready">
                <div class="profile-image"
                    style="background-image: url('http://localhost/indigo/wp-content/uploads/2025/03/shutterstock_2422173345.jpg');">
                </div>
                <div class="profile-title">Max T.</div>
                <div class="profile-content">
                    <p>Director of Fearless Leadership Programme, Cranfield University
                    </p>
                    <a class="u-link" href="#">read more</a>
                </div>
            </div>
        </div>
    </section>
    <div class="overflow">
        <section class="section-profiles-mobile splide" aria-label="Meet Our Coaches">
            <div class="intro text-reveal">
                <h2>Meet our Life & Executive Coaches</h2>
                <p class="subheading text-reveal fade-right">
                    Our personal development programme is led by a blend of reputable academic professionals,
                    renowned authors, and inspirational storytellers with a wide array of unique experiences.
                </p>
            </div>

            <div class="splide__track">
                <ul class="splide__list">
                    <!-- Profile 1 -->
                    <li class="splide__slide">
                        <div class="profile">
                            <div class="profile-image"
                                style="background-image: url('http://localhost/indigo/wp-content/uploads/2025/03/AdobeStock_357300899_Preview.jpeg');">
                            </div>
                            <div class="profile-title">James L.</div>
                            <div class="profile-content">
                                <p>Director of Fearless Leadership Programme, Cranfield University</p>
                                <a class="u-link" href="#">read more</a>
                            </div>
                        </div>
                    </li>

                    <!-- Profile 2 -->
                    <li class="splide__slide">
                        <div class="profile">
                            <div class="profile-image"
                                style="background-image: url('http://localhost/indigo/wp-content/uploads/2025/03/AdobeStock_1135554656_Preview.jpeg');">
                            </div>
                            <div class="profile-title">Emily R.</div>
                            <div class="profile-content">
                                <p>Director of Fearless Leadership Programme, Cranfield University</p>
                                <a class="u-link" href="#">read more</a>
                            </div>
                        </div>
                    </li>

                    <!-- Profile 3 -->
                    <li class="splide__slide">
                        <div class="profile">
                            <div class="profile-image"
                                style="background-image: url('http://localhost/indigo/wp-content/uploads/2025/03/AdobeStock_599423575_Preview.jpeg');">
                            </div>
                            <div class="profile-title">Sarah D.</div>
                            <div class="profile-content">
                                <p>Director of Fearless Leadership Programme, Cranfield University</p>
                                <a class="u-link" href="#">read more</a>
                            </div>
                        </div>
                    </li>

                    <!-- Profile 4 -->
                    <li class="splide__slide">
                        <div class="profile">
                            <div class="profile-image"
                                style="background-image: url('http://localhost/indigo/wp-content/uploads/2025/03/shutterstock_2422173345.jpg');">
                            </div>
                            <div class="profile-title">Daniel M.</div>
                            <div class="profile-content">
                                <p>Director of Fearless Leadership Programme, Cranfield University</p>
                                <a class="u-link" href="#">read more</a>
                            </div>
                        </div>
                    </li>

                    <!-- Profile 5 -->
                    <li class="splide__slide">
                        <div class="profile">
                            <div class="profile-image"
                                style="background-image: url('http://localhost/indigo/wp-content/uploads/2025/03/AdobeStock_357300899_Preview.jpeg');">
                            </div>
                            <div class="profile-title">Amelia B.</div>
                            <div class="profile-content">
                                <p>Director of Fearless Leadership Programme, Cranfield University</p>
                                <a class="u-link" href="#">read more</a>
                            </div>
                        </div>
                    </li>

                    <!-- Profile 6 -->
                    <li class="splide__slide">
                        <div class="profile">
                            <div class="profile-image"
                                style="background-image: url('http://localhost/indigo/wp-content/uploads/2025/03/AdobeStock_1135554656_Preview.jpeg');">
                            </div>
                            <div class="profile-title">Leo S.</div>
                            <div class="profile-content">
                                <p>Director of Fearless Leadership Programme, Cranfield University</p>
                                <a class="u-link" href="#">read more</a>
                            </div>
                        </div>
                    </li>

                    <!-- Profile 7 -->
                    <li class="splide__slide">
                        <div class="profile">
                            <div class="profile-image"
                                style="background-image: url('http://localhost/indigo/wp-content/uploads/2025/03/AdobeStock_599423575_Preview.jpeg');">
                            </div>
                            <div class="profile-title">Isabelle W.</div>
                            <div class="profile-content">
                                <p>Director of Fearless Leadership Programme, Cranfield University</p>
                                <a class="u-link" href="#">read more</a>
                            </div>
                        </div>
                    </li>

                    <!-- Profile 8 -->
                    <li class="splide__slide">
                        <div class="profile">
                            <div class="profile-image"
                                style="background-image: url('http://localhost/indigo/wp-content/uploads/2025/03/shutterstock_2422173345.jpg');">
                            </div>
                            <div class="profile-title">Max T.</div>
                            <div class="profile-content">
                                <p>Director of Fearless Leadership Programme, Cranfield University</p>
                                <a class="u-link" href="#">read more</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </section>
    </div>

    <section class="section-collection">
        <div class="collection-block prestige">
            <div class="collection-image flipped-horizontal"
                style="background-image: url('http://localhost/indigo/wp-content/uploads/2025/03/m48-38.jpeg');"></div>
            <div class="text-area">
                <h2 class="h-xl title text-reveal fade-right">Prestige Retreat</h2>
                <h5>The Ultimate in Luxury & Transformation</h5>
                <p>
                    Sail in absolute luxury aboard a private yacht, where 5-star service meets deep personal growth.
                    Exclusive venues, world-class facilitators, and a journey designed for those who demand the best.
                </p>
                <ul class="collection-list">
                    <li>Private catamarans & motor yachts</li>
                    <li>Michelin-level dining & curated experiences</li>
                    <li>Luxury spa, coaching & personal transformation</li>
                </ul>
                <a class="u-link" href="#"> discover prestige</a>


            </div>
        </div>

        <div class="collection-bottom">
            <div class="collection-block essence">
                <div class="collection-image lux-reveal"
                    style="background-image: url('http://localhost/indigo/wp-content/uploads/2025/03/shutterstock_2495693753-scaled.jpg');">
                </div>
                <div class="text-area text-reveal fade-right">
                    <h2 class="h-xl title">Essence Escape</h2>
                    <p>
                        Sail in absolute luxury aboard a private yacht, where 5-star service meets deep personal growth.
                        Exclusive venues, world-class facilitators, and a journey designed for those who demand the
                        best.
                    </p>
                    <ul class="collection-list">
                        <li>Private catamarans & motor yachts</li>
                        <li>Michelin-level dining & curated experiences</li>
                        <li>Luxury spa, coaching & personal transformation</li>
                    </ul>
                    <a class="u-link" href="#"> discover essence</a>

                </div>
            </div>

            <div class="collection-block authentic">
                <div class="collection-image lux-reveal"
                    style="background-image: url('http://localhost/indigo/wp-content/uploads/2025/03/AdobeStock_228561155_Preview.jpeg');">
                </div>
                <div class="text-area text-reveal fade-right">
                    <h2 class="h-xl title">Authentic Adventure</h2>
                    <p>
                        Sail in absolute luxury aboard a private yacht, where 5-star service meets deep personal growth.
                        Exclusive venues, world-class facilitators, and a journey designed for those who demand the
                        best.
                    </p>
                    <ul class="collection-list">
                        <li>Private catamarans & motor yachts</li>
                        <li>Michelin-level dining & curated experiences</li>
                        <li>Luxury spa, coaching & personal transformation</li>
                    </ul>
                    <a class="u-link" href="#"> discover adventure</a>
                </div>
            </div>
        </div>
    </section>


</main>

<?php get_footer(); ?>