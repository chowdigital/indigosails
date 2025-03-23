<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #margins div and all margins after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package indigosails
 */

?>
<!-- footer.php -->
<img class="purple-plant" src="<?php echo get_template_directory_uri(); ?>/assets/plants/plant-6-pu.svg"
    alt="Purple plant" class="underline-stripe" />
<footer id="colophon" class="site-footer">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/edge-purple.svg" alt="Underline Stripe"
        class="underline-stripe" />



    <div class="container">
        <div class="find-us">
            <div class="map-container">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2490.721061572743!2d1.019171798009499!3d51.35619098023518!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47d933ac1f8e764b%3A0x40e2102c87c097b1!2sFinding%20Flow%20Yoga%20%26%20Soul%20Space!5e0!3m2!1sen!2suk!4v1734793960595!5m2!1sen!2suk"
                    width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="footer-info">
                <h2><?php echo esc_html( get_theme_mod( 'footer_title', 'Find Us' ) ); ?></h2>
                <p><strong><?php echo esc_html( get_theme_mod( 'footer_name', 'Your Name' ) ); ?></strong></p>
                <p><?php echo nl2br( esc_html( get_theme_mod( 'footer_address', '123 Your Address, City, Country' ) ) ); ?>
                </p>
                <p>Phone: <a
                        href="tel:<?php echo esc_attr( get_theme_mod( 'footer_phone', '+1234567890' ) ); ?>"><?php echo esc_html( get_theme_mod( 'footer_phone', '+1234567890' ) ); ?></a>
                </p>
                <p>Email: <a
                        href="mailto:<?php echo antispambot( get_theme_mod( 'footer_email', 'email@example.com' ) ); ?>"><?php echo antispambot( get_theme_mod( 'footer_email', 'email@example.com' ) ); ?></a>
                </p>
                <a href="<?php echo esc_url( get_theme_mod( 'footer_appointment_url', '#' ) ); ?>"
                    class="btn-book-appointment">
                    <?php echo esc_html( get_theme_mod( 'footer_button_text', 'Book an Appointment' ) ); ?>
                </a>
            </div>
        </div>
        <div class="white-break"></div>

        <div class="site-info">


            <div class="sitemap">
                <h3>Sitemap</h3>
                <ul>
                    <?php
                    wp_list_pages( array(
                        'title_li' => '',
                    ) );
                ?>
                </ul>
            </div>
            <div class="site-logo">
                <img src="<?php echo esc_url( get_theme_mod( 'custom_logo_url', get_template_directory_uri() . '/assets/logo/logo_tall.svg' ) ); ?>"
                    alt="<?php bloginfo( 'name' ); ?>" class="custom-logo">
            </div>
        </div><!-- .site-info -->
    </div>
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>