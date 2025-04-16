<?php
/**
 * Template Name: Packages
 * Description: A custom template for displaying package details with Days 1-8.
 *
 * @package indigosails
 */

get_header(); // Include the header
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
            <a href="#" class="video-btn"><span class="btn-text">Request an Invitation</span></a>
            <a href="#" class="video-btn"><span class="btn-text">Explore the Experiance</span></a>
        </div>
    </div>
</section>
<main id="primary" class="site-main">
    <div class="container">
        <h1 class="page-title"><?php the_title(); ?></h1>
        <div class="page-content">
            <?php
            // Display the content of the page
            while (have_posts()) : the_post();
                the_content();
            endwhile; // End of the loop.
            // ?>
        </div>
    </div>
</main>

<?php get_footer(); // Include the footer ?>