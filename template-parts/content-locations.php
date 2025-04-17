<section class="locations-section">
    <div class="container">
        <h2 class="section-title">The Locations We Visit</h2>
        <?php
        // Query all posts in the "Prestige" category for the "location" post type
        $location_posts = new WP_Query([
            'post_type'      => 'location',
            'posts_per_page' => -1, // Fetch all posts
            'tax_query'      => [
                [
                    'taxonomy' => 'location_category',
                    'field'    => 'slug',
                    'terms'    => 'prestige', // Filter by the "Prestige" category
                ],
            ],
        ]);

        // Display the posts if found
        if ($location_posts->have_posts()) {
            while ($location_posts->have_posts()) {
                $location_posts->the_post();
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
            // If no posts are found, display a placeholder or message
            echo '<p>No locations found in the Prestige category.</p>';
        }

        wp_reset_postdata(); // Reset the query
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