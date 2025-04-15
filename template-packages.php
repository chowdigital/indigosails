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
           /* while (have_posts()) : the_post();
                the_content();
            endwhile; */

            // Retrieve and display the meta fields for Days 1-8
            for ($day = 1; $day <= 8; $day++) {
                $day_content = get_post_meta(get_the_ID(), "_package_day_{$day}_content", true);

                if (!empty($day_content)) {
                    // Truncate content to 300 characters
                    $truncated_content = wp_trim_words($day_content, 50, '...');
                    echo '<div class="package-day day-' . esc_attr($day) . '">';
                    echo '<h2 class="day-title">Day ' . esc_html($day) . '</h2>';
                    echo '<div class="day-content">';
                    echo '<p class="day-intro">' . wp_kses_post($truncated_content) . '</p>';
                    echo '<a href="#" class="day-more-toggle" data-day="' . esc_attr($day) . '">Read More</a>';
                    echo '<div class="day-more-content" id="day-more-' . esc_attr($day) . '" style="display: none;">' . wp_kses_post($day_content) . '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            }
            ?>
        </div>
    </div>
</main>

<?php get_footer(); // Include the footer ?>