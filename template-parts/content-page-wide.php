<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package indigosails
 */

?>
<section class="hero-video">
    <div class="hero-video__background"
        style="background-image: url('<?php echo esc_url( get_the_post_thumbnail_url( get_the_ID(), 'full' ) ); ?>'); background-size: cover; background-position: center; background-repeat: no-repeat; width: 100%; height: 100%;">
        <div class="hero-video__overlay">
            <h1 class="h-lg italic"><?php the_title(); ?></h1>
        </div>
    </div>

</section>

<section class="page-content">
    <div class="container">

        <!-- Display the title of the page -->

        <div class="the-content">
            <p><?php the_content(); ?></p>
        </div>

    </div>


</section>