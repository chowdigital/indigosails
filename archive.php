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
    <section>
        <div class="container">
            <?php
// Remove "Category:" prefix from archive title
add_filter('get_the_archive_title', function ($title) {
    if (is_category()) {
        $title = single_cat_title('', false); // Get the category name without prefix
    }
    return $title;
});
?>
            <?php
the_archive_title('<h1 class="page-title dynamic-title h2-stripe">', '</h1>');
?>
        </div>
    </section>
    <main id="primary" class="site-main">

        <?php if ( have_posts() ) : ?>

        <header class="page-header">

        </header><!-- .page-header -->

        <?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

		?><section class="blog-listcontent">
            <div class="container">
                <div class="left">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 400 400" preserveAspectRatio="xMidYMid meet">
                        <defs>
                            <clipPath id="blob-clip-1">
                                <path
                                    d="M238.1,0C224.5,0,192.3,5.3,166.9,10.5c-39,8.8-55.9,19.3-94.9,49.1C26.3,96.5,21.2,105.3,2.6,168.5c-8.5,22.8,5.6,113.1,15.8,134.2,20.3,52.6,57.1,87,140.1,94,69.4,7,148.8,8.3,201.3-49.6,45.7-49.1,34.7-94.8,39.8-145.7C407.9,108.2,312.6,0,238.1,0" />
                            </clipPath>
                        </defs>
                        <image href="<?php the_post_thumbnail_url(); ?>" class="blob-image"
                            clip-path="url(#blob-clip-1)" />
                    </svg>
                </div>
                <div class="right">
                    <h2 class="dynamic-title h2-stripe"> <?php the_title(); ?></h2>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 400 400" preserveAspectRatio="xMidYMid meet">
                        <defs>
                            <clipPath id="blob-clip-2">
                                <path
                                    d="M238.1,0C224.5,0,192.3,5.3,166.9,10.5c-39,8.8-55.9,19.3-94.9,49.1C26.3,96.5,21.2,105.3,2.6,168.5c-8.5,22.8,5.6,113.1,15.8,134.2,20.3,52.6,57.1,87,140.1,94,69.4,7,148.8,8.3,201.3-49.6,45.7-49.1,34.7-94.8,39.8-145.7C407.9,108.2,312.6,0,238.1,0" />
                            </clipPath>
                        </defs>
                        <image href="<?php the_post_thumbnail_url(); ?>" class="blob-image"
                            clip-path="url(#blob-clip-2)" />
                    </svg>

                    <!-- Display Categories -->


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
        </section> <?php

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

    </main><!-- #main -->


</main><!-- #main -->

<?php

get_footer();