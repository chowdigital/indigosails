<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package indigosails
 */

get_header();
?>

<main id="primary" class="site-main">
    <section class="container">
        <?php
// Remove "Archives:" prefix from the archive title
add_filter('get_the_archive_title', function ($title) {
    if (strpos($title, 'Archives:') === 0) {
        $title = str_replace('Archives: ', '', $title);
    }
    return $title;
});
?>

        <?php the_archive_title('<h1 class="page-title dynamic-title h2-stripe">', '</h1>'); ?>

        <?php if (have_posts()) : ?>
        <div class="archive-posts">
            <?php
                $index = 0; // Counter to alternate layout
                while (have_posts()) : the_post();
                    $is_even = $index % 2 === 0; // Check if the iteration is even
                ?>
            <div class="archive-post <?php echo $is_even ? 'left-image' : 'right-image'; ?>">
                <div class="archive-post-image lux-reveal">
                    <?php if (has_post_thumbnail()) : ?>
                    <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail('medium', ['class' => 'square-image']); ?>
                    </a>
                    <?php endif; ?>
                </div>
                <div class="archive-post-content">
                    <h2 class="archive-post-title">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h2>
                    <p class="archive-post-excerpt"><?php echo wp_trim_words(get_the_excerpt(), 100, '...'); ?></p>
                    <a class="u-link" href="<?php the_permalink(); ?>">Read More</a>
                </div>
            </div>
            <?php
                    $index++; // Increment the counter
                endwhile;
                ?>
        </div>
        <?php else : ?>
        <p>No posts found.</p>
        <?php endif; ?>
    </section>
</main>

<?php
get_footer();