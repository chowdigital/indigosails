<?php
/**
 * Template Name: Packages
 * Description: A custom template for displaying package details with Days 1-8.
 *
 * @package indigosails
 */

get_header(); // Include the header
?>

<main id="primary" class="site-main">
    <div class="container">
        <h1 class="page-title"><?php the_title(); ?></h1>
        <div class="page-content">
            <?php
            // Display the main content of the page
       /*     while (have_posts()) : the_post();
                the_content();
            endwhile; */

            // Retrieve and display the meta fields for Days 1-8
            for ($day = 1; $day <= 8; $day++) {
                $day_title = get_post_meta(get_the_ID(), "_package_day_{$day}_title", true);
                $day_content = get_post_meta(get_the_ID(), "_package_day_{$day}_content", true);

                // Default title if not set
                $default_title = "Day $day";
                $day_title = !empty($day_title) ? $day_title : $default_title;

                if (!empty($day_content)) {
                    echo '<div class="package-day day-' . esc_attr($day) . '">';
                    echo '<h2 class="day-title">' . esc_html($day_title) . '</h2>';
                    echo '<div class="day-content">' . wp_kses_post($day_content) . '</div>';
                    echo '</div>';
                }
            }
            ?>
        </div>
    </div>
</main>

<?php get_footer(); // Include the footer ?>