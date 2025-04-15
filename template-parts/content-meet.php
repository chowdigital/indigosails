<?php
/**
 * Template part for displaying profiles dynamically from the 'person' custom post type.
 *
 * @package indigosails
 */

// Query the 'person' custom post type
$args = [
    'post_type'      => 'person',
    'posts_per_page' => -1, // Retrieve all profiles
    'orderby'        => 'date',
    'order'          => 'DESC',
];
$person_query = new WP_Query($args);
?>

<section class="section-profiles">
    <div class="intro text-reveal">
        <h2>Meet our Life & Executive Coaches</h2>
        <p class="subheading text-reveal fade-right">
            Our personal development programme is led by a blend of reputable academic professionals,
            renowned authors, and inspirational storytellers with a wide array of unique experiences.
        </p>
    </div>

    <?php if ($person_query->have_posts()) : ?>
    <div class="profiles" data-splide-breakpoint>
        <?php while ($person_query->have_posts()) : $person_query->the_post(); ?>
        <div class="profile ready">
            <div class="profile-image"
                style="background-image: url('<?php echo get_the_post_thumbnail_url(get_the_ID(), 'medium'); ?>');">
            </div>
            <div class="profile-title">
                <span
                    class="short-title"><?php echo esc_html(get_post_meta(get_the_ID(), '_short_title', true) ?: get_the_title()); ?></span>
                <span class="full-title"><?php the_title(); ?></span>
            </div>
            <div class="profile-content">
                <p><?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?></p>
                <a class="u-link" href="<?php the_permalink(); ?>">read more</a>
            </div>
        </div>
        <?php endwhile; ?>
    </div>
    <?php else : ?>
    <p>No profiles found.</p>
    <?php endif; ?>

    <?php wp_reset_postdata(); ?>
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

        <?php if ($person_query->have_posts()) : ?>
        <div class="splide__track">
            <ul class="splide__list">
                <?php while ($person_query->have_posts()) : $person_query->the_post(); ?>
                <li class="splide__slide">
                    <div class="profile">
                        <div class="profile-image"
                            style="background-image: url('<?php echo get_the_post_thumbnail_url(get_the_ID(), 'medium'); ?>');">
                        </div>
                        <div class="profile-title"><?php the_title(); ?></div>
                        <div class="profile-content">
                            <p><?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?></p>
                            <a class="u-link" href="<?php the_permalink(); ?>">read more</a>
                        </div>
                    </div>
                </li>
                <?php endwhile; ?>
            </ul>
        </div>
        <?php else : ?>
        <p>No profiles found.</p>
        <?php endif; ?>

        <?php wp_reset_postdata(); ?>
    </section>
</div>