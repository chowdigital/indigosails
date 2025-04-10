<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package indigosails
 */

get_header();
?>



<main id="primary" class="site-main">

    <?php
$terms = get_the_terms(get_the_ID(), 'yacht_category');

if (!empty($terms) && !is_wp_error($terms)) {
    $grouped = [];

    foreach ($terms as $term) {
        $parent = $term->parent ? get_term($term->parent, 'yacht_category') : null;
        $parent_name = $parent ? $parent->name : null;

        if ($parent_name) {
            $grouped[$parent_name][] = $term->name;
        }
    }

    if (!empty($grouped)) {
        echo '<ul class="yacht-taxonomy-groups">';
        foreach ($grouped as $group_label => $children) {
            echo '<li><strong>' . esc_html($group_label) . ':</strong> ' . implode(', ', array_map('esc_html', $children)) . '</li>';
        }
        echo '</ul>';
    }
}
?>


    <?php while ( have_posts() ) : the_post();
			get_template_part( 'template-parts/content', 'page' );
		endwhile; // End of the loop.
	?>



</main><!-- #main -->

<?php
get_footer();