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
            <div class="day-thumbnail lux-reveal"
                style="background-image: url('<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'large')); ?>'); background-size: cover; background-position: center;">
            </div>
            <div class="day-content">
                <h4 class="day-title text-reveal in-view">
                    <?php the_title(); ?>
                </h4>
                <div class="day-full-content js-hide-content">
                    <?php the_content(); // Display the full content ?>
                </div>
                <a class="toggle-content-btn u-link">Read More</a>
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
<script>
document.addEventListener("DOMContentLoaded", function() {
    const toggleButtons = document.querySelectorAll(".toggle-content-btn");

    toggleButtons.forEach((button) => {
        button.addEventListener("click", function() {
            const content = this.previousElementSibling; // Select the .js-hide-content div

            if (content.classList.contains("expanded")) {
                // Collapse the content
                content.style.maxHeight = "150px"; // Set back to the collapsed height
                content.classList.remove("expanded");
                this.textContent = "Read More"; // Change button text to "Read More"
            } else {
                // Expand the content
                content.style.maxHeight = content.scrollHeight +
                    "px"; // Dynamically set to the full height
                content.classList.add("expanded");
                this.textContent = "Close"; // Change button text to "Close"
            }
        });
    });
});
</script>