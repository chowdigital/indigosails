<?php
/**
 * Template Name: Yacht Page Template
 * @package Cloudsdale_Theme
 */
get_header(); // Adds the header
?>

<section id="yachts">
    <h1>test</h1>
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
                            echo '<label>';
                            echo '<input type="checkbox" class="filter-checkbox" data-filter=".' . esc_attr($child->slug) . '">';
                            echo esc_html($child->name);
                            echo '</label>';
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

    // Handle checkbox toggles
    $('.filter-checkbox').on('change', function() {
        var $checkbox = $(this);
        var group = $checkbox.closest('.filter-group').data('filter-group');
        var filter = $checkbox.data('filter');

        // Update filters for the group
        if (!filters[group]) {
            filters[group] = [];
        }

        if ($checkbox.is(':checked')) {
            // Add the filter to the group if checked
            if (!filters[group].includes(filter)) {
                filters[group].push(filter);
            }
        } else {
            // Remove the filter from the group if unchecked
            filters[group] = filters[group].filter(function(f) {
                return f !== filter;
            });
        }

        // Combine all filters
        var filterValue = Object.values(filters)
            .map(function(groupFilters) {
                return groupFilters.length ? groupFilters.join('') : '*';
            })
            .join('');
        $grid.isotope({
            filter: filterValue || '*',
        });
    });

    // Reset filters
    $('#reset-filters').on('click', function() {
        // Reset checkboxes
        $('.filter-checkbox').prop('checked', false);
        // Clear filters object
        filters = {};
        // Show all items
        $grid.isotope({
            filter: '*',
        });
    });
});
</script>

<?php get_footer(); ?>