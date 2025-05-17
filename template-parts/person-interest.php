<section class="hp-inclusions texture coral">

    <h2>Interested in</h2>

    <div class="hp-inclusions__grid">
        <?php for ($i = 1; $i <= 3; $i++) : 
            $interested_in = get_post_meta(get_the_ID(), "_interested_in_{$i}", true);
            if (!empty($interested_in)) : ?>
        <div class="hp-inclusions__item">
            <h4><?php echo esc_html($interested_in); ?></h4>
        </div>
        <?php endif; ?>
        <?php endfor; ?>
    </div>
</section>