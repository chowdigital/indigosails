<?php
/**
 * Template Name: Yacht Page Template
 * @package Cloudsdale_Theme
 */
get_header(); // Adds the header
?>

<section id="yachts">

    <div id="category-filters" class="yacht-filter">
        <div class="container padding-30">

            <!-- Reset Button -->
            <button id="reset-filters" class="reset-button">Show All</button>

            <?php
            // Define the parent categories
            $specific_parents = ['guests', 'type']; // Replace with your actual parent category slugs

            foreach ($specific_parents as $parent_slug) {
                $parent = get_term_by('slug', $parent_slug, 'yacht_category'); // Get the parent term by slug

                if ($parent) {
                    $children = get_terms([
                        'taxonomy' => 'yacht_category',
                        'hide_empty' => false,
                        'parent' => $parent->term_id
                    ]);

                    if (!empty($children)) {
                        echo '<div class="filter-group" data-filter-group="' . esc_attr($parent->slug) . '">';
                        echo '<p>' . esc_html($parent->name) . '</p>';
                        foreach ($children as $child) {
                            echo '<button class="filter-button" data-filter=".' . esc_attr($child->slug) . '">' . esc_html($child->name) . '</button>';
                        }
                        echo '</div>';
                    }
                }
            }
            ?>
        </div>
    </div>

    <!-- Isotope Grid -->
    <div class="container">
        <div id="isotope-list" class="grid">
            <?php
            $args = [
                'post_type' => 'yacht',
                'posts_per_page' => -1
            ];
            $yachts = new WP_Query($args);
            if ($yachts->have_posts()) : while ($yachts->have_posts()) : $yachts->the_post(); ?>
            <div class="category-item 
                <?php 
                $terms = get_the_terms(get_the_ID(), 'yacht_category');
                if ($terms && !is_wp_error($terms)) {
                    foreach ($terms as $term) {
                        echo esc_attr($term->slug) . ' ';
                    }
                }
                ?> grid-item">
                <div class="card">
                    <a href="<?php the_permalink(); ?>" class="card-image">
                        <?php the_post_thumbnail(null, ['alt' => get_the_title()]); ?>
                    </a>
                    <div class="card-content">
                        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        <p><?php the_excerpt(); ?></p>
                    </div>
                </div>
            </div>
            <?php endwhile; wp_reset_postdata(); else : ?>
            <p>No yachts found.</p>
            <?php endif; ?>
        </div>
    </div>
</section>

<script>
jQuery(document).ready(function($) {
    var $grid = $('#isotope-list').isotope({
        itemSelector: '.grid-item',
        layoutMode: 'fitRows',
    });

    var filters = {};

    // Handle button clicks
    $('.filter-button').on('click', function() {
        var $button = $(this);
        var group = $button.closest('.filter-group').data('filter-group');
        var filter = $button.data('filter');

        // Toggle active state for the clicked button
        if ($button.hasClass('active')) {
            $button.removeClass('active');
            delete filters[group]; // Remove the filter for this group
        } else {
            // Allow multiple active buttons, one per group
            $button.siblings('.filter-button').removeClass(
            'active'); // Remove active class from other buttons in the same group
            $button.addClass('active');
            filters[group] = filter; // Add the filter for this group
        }

        // Combine all filters
        var filterValue = Object.values(filters).join('');
        $grid.isotope({
            filter: filterValue || '*',
        });

        // Update button states for other categories
        updateButtonStates();
    });

    // Reset filters
    $('#reset-filters').on('click', function() {
        // Reset buttons
        $('.filter-button').removeClass('active disabled');
        // Clear filters object
        filters = {};
        // Show all items
        $grid.isotope({
            filter: '*',
        });
    });

    // Function to update button states for other categories
    function updateButtonStates() {
        // Get currently visible items
        var visibleItems = $grid.isotope('getFilteredItemElements');

        // Loop through each filter group
        $('.filter-group').each(function() {
            var $group = $(this);
            var group = $group.data('filter-group');

            // Skip the currently active group
            if (filters[group]) {
                return;
            }

            // Reset all buttons in this group
            $group.find('.filter-button').removeClass('disabled');

            // Loop through each button in this group
            $group.find('.filter-button').each(function() {
                var $button = $(this);
                var filter = $button.data('filter');

                // Check if any visible item matches the button's filter
                var isRelevant = Array.from(visibleItems).some(function(item) {
                    return $(item).hasClass(filter.replace('.', ''));
                });

                // If no visible item matches, disable the button
                if (!isRelevant) {
                    $button.addClass('disabled');
                }
            });
        });
    }
});
</script>

<?php get_footer(); ?>