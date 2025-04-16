<?php
/**
 * Template part for displaying days
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package indigosails
 */

?>
<section class="days-section">
    <div class="container">
        <h2 class="section-title">Our Days</h2>
        <?php
        // Get all categories for the 'day' post type
        $day_categories = get_terms([
            'taxonomy'   => 'day_category', // Replace with your taxonomy slug
            'orderby'    => 'name',
            'order'      => 'ASC',
            'hide_empty' => true,
        ]);

        // Loop through each category
        if (!empty($day_categories) && !is_wp_error($day_categories)) {
            foreach ($day_categories as $category) {
                // Display the category title
                echo '<div class="day-category">';
                echo '<h3 class="category-title">' . esc_html($category->name) . '</h3>';

                // Query posts in this category
                $day_posts = new WP_Query([
                    'post_type'      => 'day',
                    'posts_per_page' => -1,
                    'tax_query'      => [
                        [
                            'taxonomy' => 'day_category',
                            'field'    => 'slug',
                            'terms'    => $category->slug,
                        ],
                    ],
                ]);

                // Display posts in this category
                if ($day_posts->have_posts()) {
                    echo '<div class="day-posts">';
                    while ($day_posts->have_posts()) {
                        $day_posts->the_post();
                        ?>
        <div class="day-post">
            <h4 class="day-title"><?php the_title(); ?></h4>
            <div class="day-thumbnail">
                <?php if (has_post_thumbnail()) {
                                    the_post_thumbnail('medium');
                                } ?>
            </div>
            <div class="day-excerpt">
                <?php the_excerpt(); ?>
            </div>
        </div>
        <?php
                    }
                    echo '</div>'; // Close day-posts
                } else {
                    echo '<p>No days found in this category.</p>';
                }

                wp_reset_postdata(); // Reset the query
                echo '</div>'; // Close day-category
            }
        } else {
            echo '<p>No categories found for Days.</p>';
        }
        ?>
    </div>
</section>