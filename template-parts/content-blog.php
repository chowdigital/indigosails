<?php
/**
 * Template part for displaying blog loops
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package TaraFlynn
 */

?>

<section class="blog-content">
    <div class="container blog-plant">
        <h2 class="dynamic-title h2-stripe">Finding Flow Yoga</h2>
        <ul id="responsive" class="content-slider">
            <?php
    $the_query = new WP_Query(array(
        'post_type' => 'post', // Default post type
        'posts_per_page' => 7, // Number of posts to display
    ));
    if ($the_query->have_posts()) {
        while ($the_query->have_posts()) {
            $the_query->the_post();
            ?>
            <li class="item-body">
                <div class="item-content">

                    <div class="event-card">
                        <a href="<?php echo get_permalink(); ?>">
                            <!-- Background image as a container -->
                            <div class="event-card-image"
                                style="background-image: url(<?php the_post_thumbnail_url(); ?>);">
                            </div>
                        </a>
                        <!-- Button with post title -->
                        <a href="<?php echo get_permalink(); ?>" class="cta">
                            <div><?php the_title(); ?></div>
                        </a>
                    </div>

                </div>
            </li>
            <?php
        } // End while
        wp_reset_postdata();
    } // End if
    ?>
        </ul>
    </div>
</section>