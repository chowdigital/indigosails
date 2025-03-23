<?php
/**
 * Template Name: Soulspace
 * Description: A custom template for the home page.
 *
 * @package Cloudsdale_Theme
 */
get_header(); // Adds the header
?>
<main id="primary" class="site-main">
    <section class="hidden-section"></section>
    <section class="hidden-section"></section>
    <?php while ( have_posts() ) : the_post();
			get_template_part( 'template-parts/content', 'page-wide' );
		endwhile; // End of the loop.
	?>
    <!-- Archive for "Private Sessions" Category -->
    <?php
    // Query for the "private-sessions" category
    $private_sessions_query = new WP_Query(array(
        'category_name' => 'soul-space', // Category slug
        'posts_per_page' => 10, // Adjust the number of posts as needed
    ));

    if ($private_sessions_query->have_posts()) :
        /* Start the Loop */
        while ($private_sessions_query->have_posts()) :
            $private_sessions_query->the_post();
    ?>
    <section class="blog-listcontent">
        <div class="container">
            <div class="left">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 400 400" preserveAspectRatio="xMidYMid meet">
                    <defs>
                        <clipPath id="blob-clip-1">
                            <path
                                d="M238.1,0C224.5,0,192.3,5.3,166.9,10.5c-39,8.8-55.9,19.3-94.9,49.1C26.3,96.5,21.2,105.3,2.6,168.5c-8.5,22.8,5.6,113.1,15.8,134.2,20.3,52.6,57.1,87,140.1,94,69.4,7,148.8,8.3,201.3-49.6,45.7-49.1,34.7-94.8,39.8-145.7C407.9,108.2,312.6,0,238.1,0" />
                        </clipPath>
                    </defs>
                    <image href="<?php the_post_thumbnail_url(); ?>" class="blob-image" clip-path="url(#blob-clip-1)" />
                </svg>
            </div>
            <div class="right">
                <h2 class="dynamic-title h2-stripe"><?php the_title(); ?></h2>
                <p class="blog-excerpt">
                    <?php
                            // Get the excerpt and limit to 30 words
                            $excerpt = get_the_excerpt();
                            echo wp_trim_words($excerpt, 30, '...');
                            ?>
                </p>
                <a href="<?php the_permalink(); ?>" class="cta">
                    <div>Read More</div>
                </a>
            </div>
        </div>
    </section>
    <?php
        endwhile;
     
    endif;

    // Reset post data
    wp_reset_postdata();
    ?>
    <?php get_template_part( 'template-parts/content', 'gallery' ); ?>
    <?php get_template_part( 'template-parts/content', 'blog' ); ?>

    <?php get_template_part( 'template-parts/content', 'reviews' ); ?>
</main>

<?php get_footer(); ?>