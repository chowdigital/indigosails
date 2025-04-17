<?php
/**
 * Template Name: Yacht Page Template
 * @package Cloudsdale_Theme
 */
get_header(); // Adds the header
?>

<section id="yachts">
    <h1>Yachts</h1>
    <div id="category-filters" class="yacht-filter">
        <div class="container padding-30">

            <!-- Reset Button -->
            <button id="reset-filters" class="reset-button">Show All</button>

            <?php
            // Define the parent category for "guests"
            $parent_slug = 'guests'; // Replace with your actual parent category slug
            $parent = get_term_by('slug', $parent_slug, 'yacht_category'); // Get the parent term by slug

            if ($parent) {
                $children = get_terms([
                    'taxonomy' => 'yacht_category',
                    'hide_empty' => false,
                    'parent' => $parent->term_id
                ]);

                if (!empty($children)) {
                    // Sort children numerically by their name (assuming names are numbers)
                    usort($children, function ($a, $b) {
                        return intval($b->name) - intval($a->name); // Descending order
                    });

                    echo '<div class="filter-group" data-filter-group="' . esc_attr($parent->slug) . '">';
                    echo '<p>' . esc_html($parent->name) . '</p>';
                    foreach ($children as $child) {
                        echo '<label class="filter-button">';
                        echo '<input type="radio" name="filter" class="filter-radio" data-filter=".' . esc_attr($child->slug) . '">';
                        echo esc_html($child->name);
                        echo '</label>';
                    }
                    echo '</div>';
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

    // Handle radio button toggles
    $('.filter-radio').on('change', function() {
        var filterValue = $(this).data('filter') || '*';
        $grid.isotope({
            filter: filterValue
        });
    });

    // Reset filters
    $('#reset-filters').on('click', function() {
        // Reset radio buttons
        $('.filter-radio').prop('checked', false);
        // Show all items
        $grid.isotope({
            filter: '*'
        });
    });
});
</script>

<?php get_footer(); ?>