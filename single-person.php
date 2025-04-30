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
                <?php echo get_post_meta(get_the_ID(), '_people_qualifications', true) ? '<p><strong>' . esc_html(get_post_meta(get_the_ID(), '_people_qualifications', true)) . '</strong></p>' : ''; ?>


                <?php
$bio = get_post_meta(get_the_ID(), '_people_bio', true);
if (!empty($bio)) : ?>
                <div class="person-bio">
                    <h2>Bio</h2>
                    <?php echo wpautop(esc_textarea($bio)); ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
        <?php endwhile; // End of the loop. ?>
    </section>
    <section class="container">
        <div class="entry-content">
            <?php the_content(); ?>

        </div>
    </section>
    <section class="container video-section">
        <?php
    // Loop through up to 4 videos
    $videos = [];
    for ($i = 1; $i <= 4; $i++) {
        $video_title = get_post_meta(get_the_ID(), "_people_video_{$i}_title", true);
        $video_description = get_post_meta(get_the_ID(), "_people_video_{$i}_description", true);
        $video_link = get_post_meta(get_the_ID(), "_people_video_{$i}_link", true);

        if (!empty($video_link)) {
            $videos[] = [
                'title' => $video_title,
                'description' => $video_description,
                'link' => $video_link,
            ];
        }
    }

    if (!empty($videos)) : ?>
        <div class="splide pvid-splide">
            <div class="splide__track">
                <ul class="splide__list">
                    <?php foreach ($videos as $video) : ?>
                    <li class="splide__slide">
                        <div class="pvid-video-container">
                            <div class="pvid-video-wrapper">
                                <iframe src="<?php echo esc_url($video['link']); ?>?enablejsapi=1" frameborder="0"
                                    allow="autoplay; encrypted-media" allowfullscreen>
                                </iframe>
                            </div>
                            <?php if (!empty($video['title']) || !empty($video['description'])) : ?>
                            <div class="pvid-video-info">
                                <?php if (!empty($video['title'])) : ?>
                                <h3 class="pvid-video-title"><?php echo esc_html($video['title']); ?></h3>
                                <?php endif; ?>
                                <?php if (!empty($video['description'])) : ?>
                                <p class="pvid-video-description"><?php echo esc_html($video['description']); ?></p>
                                <?php endif; ?>
                            </div>
                            <?php endif; ?>
                        </div>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
        <?php endif; ?>
    </section>
    <section class="container">
        <h2>hello workd</h2>
    </section>
    <?php get_template_part('template-parts/content', 'meet'); ?>
</main><!-- #main -->

<?php
get_footer();