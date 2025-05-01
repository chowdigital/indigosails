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
        <div class="single-post-container">
            <div class="single-post-image lux-reveal">
                <?php if ( has_post_thumbnail() ) : ?>
                <?php the_post_thumbnail( 'large' ); ?>
                <?php endif; ?>
            </div>
            <div class="single-post-content">
                <h1 class="entry-title"><?php the_title(); ?></h1>
                <div class="entry-content">
                    <div class="boat-stats">
                        <?php
    // Retrieve custom field values
    $interior_photo = get_post_meta(get_the_ID(), '_yacht_interior_photo', true);
    $cabins = get_post_meta(get_the_ID(), '_yacht_cabins', true);
    $guests = get_post_meta(get_the_ID(), '_yacht_guests', true);
    $charter_dates = get_post_meta(get_the_ID(), '_yacht_charter_dates', true);
    $location = get_post_meta(get_the_ID(), '_yacht_location', true);
    $price_per_week = get_post_meta(get_the_ID(), '_yacht_price_per_week', true);
    $price_per_person_per_week = get_post_meta(get_the_ID(), '_yacht_price_per_person_per_week', true);
    ?>

                        <?php if (!empty($interior_photo)) : ?>
                        <div class="boat-stat">
                            <strong>Interior Photo:</strong>
                            <img src="<?php echo esc_url($interior_photo); ?>" alt="Interior Photo"
                                style="max-width: 100%; height: auto;" />
                        </div>
                        <?php endif; ?>

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
                    </div><?php the_content(); ?>

                </div>
            </div>
        </div>
        <?php endwhile; // End of the loop. ?>
    </section>


</main><!-- #main -->

<?php
get_footer();