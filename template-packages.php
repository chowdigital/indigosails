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
            // Retrieve and display the meta fields for Days 1-8
            for ($day = 1; $day <= 8; $day++) {
                $day_title = get_post_meta(get_the_ID(), "_package_day_{$day}_title", true);
                $day_content = get_post_meta(get_the_ID(), "_package_day_{$day}_content", true);

                // Default title if not set
                $default_title = "Day $day";
                $day_title = !empty($day_title) ? $day_title : $default_title;

                if (!empty($day_content)) {
                    // Split content into intro and remaining parts
                    $intro_content = wp_trim_words($day_content, 100, ''); // First 100 words
                    $remaining_content = wp_trim_words($day_content, -1, ''); // Full content
                    $remaining_content = str_replace($intro_content, '', $remaining_content); // Remove intro from remaining content

                    echo '<div class="package-day day-' . esc_attr($day) . '">';
                    echo '<h2 class="day-title">' . esc_html($day_title) . '</h2>';
                    echo '<div class="day-content">';
                    echo '<div class="day-intro">' . wp_kses_post(wpautop($intro_content)) . '</div>';
                    if (!empty(trim($remaining_content))) {
                        echo '<a href="#" class="day-more-toggle" data-day="' . esc_attr($day) . '">Read More</a>';
                        echo '<div class="day-more-content" id="day-more-' . esc_attr($day) . '" style="display: none;">' . wp_kses_post(wpautop($remaining_content)) . '</div>';
                    }
                    echo '</div>';
                    echo '</div>';
                }
            }
            ?>
        </div>
    </div>
</main>

<?php get_footer(); // Include the footer ?>