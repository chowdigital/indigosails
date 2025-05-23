<?php
/**
 * Template Name: Yacht Page Template
 * @package Cloudsdale_Theme
 */
get_header(); // Adds the header
?>

<section class="hero-video">
    <video class="hero-video__bg" autoplay muted loop playsinline>
        <source src="<?php echo get_template_directory_uri(); ?>/assets/video/indigo25.mp4" type="video/mp4"> Your
        browser does not support the video tag.
    </video>
    <div class="hero-video__overlay">
        <h1 class="h-lg italic">Sail through breathtaking destinations,<br>embrace adventure,<br>and discover
            something deeper within yourself.</h1>
        <div class="hero-video__buttons">
            <a href="#" class="video-btn"><span class="btn-text">Discover our retreats</span></a>
            <a href="#" class="video-btn"><span class="btn-text">Explore yacht charters</span></a>
        </div>
    </div>
</section>
<style>
/* Default: Mobile (xs) */
.ns-parent {
    margin-bottom: 0;
    padding: 20px 0px;
}

/* Small tablets (≥480px) */
@media (min-width: 361px) {
    .ns-parent {
        margin-bottom: -160px;
    }
}

/* Tablets (≥768px) */
@media (min-width: 608px) {
    .ns-parent {
        margin-bottom: -260px;
    }
}

@media (min-width: 641px) {
    .ns-parent {
        margin-bottom: -260px;
    }
}


/* Desktops (≥1024px) */
@media (min-width: 863px) {
    .ns-parent {
        margin-bottom: -310px;
    }
}
</style>
<div class="ns-parent">

    <div class="small-screen" id="nsWidget"
        style="margin: 0 auto; max-width: 1000px; width: 100%; height: 500px; position: relative;"></div>

    <script src="https://widgets.nausys.com/js/widgets/nausys_widget_1.2.js"></script>
    <script>
    var opts = {
        companyId: '29113128',
        type: 'searchForm',
        language: 'en',
        method: 'GET',
        results: 'https://www.indigosails.co.uk/yacht-charter-results/'
    };
    new NsWidget("nsWidget", opts);
    </script>

</div>
<section class="container">

    <?php while ( have_posts() ) : the_post(); ?>
    <div class="single-post-container">
        <div class="single-post-image lux-reveal">
            <?php if ( has_post_thumbnail() ) : ?>
            <?php the_post_thumbnail( 'large' ); ?>
            <?php endif; ?>
        </div>
        <div class="single-post-content">
            <h1 class="entry-title"><?php the_title(); ?></h1>
            <div class="entry-content">
                <?php the_content(); ?>
            </div>
        </div>
    </div>
    <?php endwhile; // End of the loop. ?>
</section>
<section id="yachts">

    <div id="category-filters" class="yacht-filter">
        <div class="container padding-30">
            <h2>Explore Our Feature Yachts</h2>
            <!-- Reset Button -->
            <button id="reset-filters" class="reset-button">Show All</button>

            <?php
        $parent_terms = get_terms([
            'taxonomy' => 'yacht_category',
            'hide_empty' => false,
            'parent' => 0
        ]);

        foreach ($parent_terms as $parent) {
            $children = get_terms([
                'taxonomy' => 'yacht_category',
                'hide_empty' => false,
                'parent' => $parent->term_id
            ]);

            if (!empty($children)) {
                echo '<select class="yacht-category-dropdown" data-filter-group="' . esc_attr($parent->slug) . '">';
                echo '<option value="">Select ' . esc_html($parent->name) . '</option>';
                foreach ($children as $child) {
                    echo '<option value=".' . esc_attr($child->slug) . '">' . esc_html($child->name) . '</option>';
                }
                echo '</select>';
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
        layoutMode: 'fitRows'
    });

    var filters = {};

    $('.yacht-category-dropdown').on('change', function() {
        var group = $(this).data('filter-group');
        var value = $(this).val();
        filters[group] = value;

        var filterValue = Object.values(filters).filter(Boolean).join('');
        $grid.isotope({
            filter: filterValue || '*'
        });
    });

    $('#reset-filters').on('click', function() {
        // Reset dropdowns
        $('.yacht-category-dropdown').val('');
        // Clear filters object
        filters = {};
        // Show all items
        $grid.isotope({
            filter: '*'
        });
    });
});
</script>

<?php get_footer(); ?>