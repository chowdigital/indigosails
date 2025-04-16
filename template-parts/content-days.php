<section class="days-section">
    <div class="container">
        <h2 class="section-title">Our Days</h2>
        <?php
        // Define the day categories in the desired order
        $day_categories = [
            'day-1',
            'day-2',
            'day-3',
            'day-4',
            'day-5',
            'day-6',
            'day-7',
            'day-8',
        ];

        // Loop through each day category
        foreach ($day_categories as $day_category_slug) {
            // Query posts that belong to both the current day category and the "Prestige" category
            $day_posts = new WP_Query([
                'post_type'      => 'day',
                'posts_per_page' => 1, // Only one post per category
                'tax_query'      => [
                    'relation' => 'AND',
                    [
                        'taxonomy' => 'day_category',
                        'field'    => 'slug',
                        'terms'    => $day_category_slug, // Current day category
                    ],
                    [
                        'taxonomy' => 'day_category',
                        'field'    => 'slug',
                        'terms'    => 'prestige', // Ensure it also belongs to "Prestige"
                    ],
                ],
            ]);

            // Display the post if found
            if ($day_posts->have_posts()) {
                while ($day_posts->have_posts()) {
                    $day_posts->the_post();
                    ?>
        <div class="day-post">
            <div class="day-thumbnail lux-reveal">
                <?php if (has_post_thumbnail()) { ?>
                <a href="<?php echo esc_url(get_permalink()); ?>">
                    <?php the_post_thumbnail('large'); ?>
                </a>
                <?php } ?>
            </div>
            <div class="day-content">
                <h4 class="day-title">
                    <a href="<?php echo esc_url(get_permalink()); ?>">
                        <?php the_title(); ?>
                    </a>
                </h4>
                <div class="day-excerpt">
                    <?php the_content(); // Display the full content ?>
                </div>
                <a class="u-link" href="#">read more</a>

            </div>
        </div>
        <?php
                }
            } else {
                // If no post is found for the current category, display a placeholder or message
                echo '<p>No content found for ' . esc_html($day_category_slug) . ' in the Prestige category.</p>';
            }

            wp_reset_postdata(); // Reset the query
        }
        ?>
    </div>
</section>