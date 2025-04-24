<section class="home-intro">
    <!-- Full-width block -->
    <div class="home-intro__block home-intro__block--wide">
        <div class="home-intro__text">
            <h3>Awaken with the Adriatic</h3>
            <p>Begin your day with sunrise yoga, warm sea air, and fresh perspective. This is clarity in motion.</p>
        </div>
        <div class="home-intro__image"
            style="background-image: url('<?php echo esc_url(wp_get_attachment_image_src(get_post_meta(get_the_ID(), '_journey_image_1', true), 'full')[0]); ?>');">
        </div>
    </div>

    <!-- Side-by-side blocks -->
    <div class="home-intro__grouped">
        <div class="home-intro__tile home-intro__tile--wide">
            <div class="home-intro__image"
                style="background-image: url('<?php echo esc_url(wp_get_attachment_image_src(get_post_meta(get_the_ID(), '_journey_image_2', true), 'full')[0]); ?>');">
            </div>
            <div class="home-intro__text">
                <h3>Shared Moments, Unscripted</h3>
                <p>Island dinners, quiet laughter, long swims. The experience unfolds at its own perfect pace.</p>
            </div>
        </div>

        <div class="home-intro__tile home-intro__tile--narrow">
            <div class="home-intro__image"
                style="background-image: url('<?php echo esc_url(wp_get_attachment_image_src(get_post_meta(get_the_ID(), '_journey_image_3', true), 'full')[0]); ?>');">
            </div>
            <div class="home-intro__text">
                <h3>Time to Reflect</h3>
                <p>Workshops, coaching, and moments of stillness help you realign with what matters most.</p>
            </div>
        </div>
    </div>
</section>