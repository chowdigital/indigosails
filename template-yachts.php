<?php
/**
 * Template Name: Yacht Page Template
 * @package Cloudsdale_Theme
 */
get_header(); // Adds the header
?>


<?php get_template_part('template-parts/yachts', 'video'); ?>

<?php get_template_part('template-parts/yachts', 'value'); ?>
<div class="section center-text standalone-headline">
    <h2>Find Your Perfect Yacht</h2>
    <p>Browse our curated picks or search hundreds of global options — from Croatian catamarans to Mediterranean motor
        yachts.</p>
    <a href="#yacht-search" class="u-link">Start your search</a>
</div>
<?php get_template_part('template-parts/yachts', 'splide'); ?>
<div id="yacht-search"></div>
<?php get_template_part('template-parts/yachts', 'search'); ?>
<?php get_template_part('template-parts/home', 'quote1'); ?>
<!-- Splide Slider -->

<?php get_footer(); ?>