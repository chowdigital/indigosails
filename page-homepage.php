<?php
/* Template Name: Homepage 2 */
get_header();
?>


<?php get_template_part('template-parts/home', 'video'); ?>
<?php get_template_part('template-parts/home', 'value'); ?>
<h2>The Indigo Sails retreat takes you across six Croatian destinations in eight unforgettable days.</h2>
<?php get_template_part('template-parts/home', 'intro'); ?>
<?php get_template_part('template-parts/home', 'quote2'); ?>
<?php get_template_part('template-parts/home', 'meet'); ?>
<?php get_template_part('template-parts/home', 'mission'); ?>
<?php
/*
get_template_part('template-parts/home', 'reviews');
get_template_part('template-parts/home', 'quote1');
get_template_part('template-parts/home', 'included');
*/
?>
<?php get_template_part('template-parts/home', 'cta'); ?>


<?php get_footer(); ?>