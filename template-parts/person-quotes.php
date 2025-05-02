<section class="hp-value-prop texture">
    <h2>Quotes from <?php echo get_the_title(); ?></h2>
    <div class="hp-value-prop__grid">
        <div class="hp-value-prop__pillar">
            <h3><?php echo esc_html(get_post_meta(get_the_ID(), '_people_quote_1_title', true)); ?></h3>
            <p><?php echo esc_html(get_post_meta(get_the_ID(), '_people_quote_1_text', true)); ?></p>
        </div>
        <div class="hp-value-prop__pillar">
            <h3><?php echo esc_html(get_post_meta(get_the_ID(), '_people_quote_2_title', true)); ?></h3>
            <p><?php echo esc_html(get_post_meta(get_the_ID(), '_people_quote_2_text', true)); ?></p>
        </div>
        <div class="hp-value-prop__pillar">
            <h3><?php echo esc_html(get_post_meta(get_the_ID(), '_people_quote_3_title', true)); ?></h3>
            <p><?php echo esc_html(get_post_meta(get_the_ID(), '_people_quote_3_text', true)); ?></p>
        </div>
    </div>
</section>