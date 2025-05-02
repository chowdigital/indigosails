<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package indigosails
 */

get_header();
?>

<main id="primary" class="site-main">
    <section class="container">

        <?php while ( have_posts() ) : the_post(); ?>
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
                </div>
            </div>
        </div>
    </section>
    <section class="container">
        <!-- Full-width content container -->
        <div class="boat-content">
            <?php the_content(); ?>
        </div>
        <?php endwhile; // End of the loop. ?>

    </section>
</main><!-- #main -->

<?php
get_footer();