<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package indigosails
 */

?>

<section class="page-content">
    <div class="container">
        <div class="left">
            <!-- Display the title of the page -->
            <div class="section-title ">
                <h1 class="dynamic-title h1-stripe"><?php the_title(); ?></h1>
            </div>

            <!-- Display the featured image -->
            <?php if ( has_post_thumbnail() ) : ?>
            <img src="<?php the_post_thumbnail_url( 'full' ); ?>" alt="<?php the_title_attribute(); ?>">
            <?php endif; ?>

            <!-- Display the content of the page -->


        </div>
        <div class="right">
            <?php if ( has_post_thumbnail() ) : ?>
            <img src="<?php the_post_thumbnail_url( 'full' ); ?>" alt="<?php the_title_attribute(); ?>">
            <?php endif; ?>
        </div>

    </div>
    <div class="container">
        <div class="the-content">
            <p><?php the_content(); ?></p>
        </div>

    </div>
    <?php
if (is_page()) {
    $cta_text = get_post_meta(get_the_ID(), '_cta_text', true) ?: 'Make a booking';
    $cta_link = get_post_meta(get_the_ID(), '_cta_link', true) ?: 'https://app.acuityscheduling.com/schedule.php?owner=33595336';
    $cta_target = get_post_meta(get_the_ID(), '_cta_target', true) ? 'target="_blank"' : '';

    if ($cta_text && $cta_link) {
        ?>
    <a class="cta" href="<?php echo esc_url($cta_link); ?>">
        <div><?php echo esc_html($cta_text); ?></div>
    </a>
    <?php
    }
}
?>

</section>