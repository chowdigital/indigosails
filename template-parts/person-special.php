<section class="hp-inclusions texture coral">
    <h2>Specialising in</h2>

    <div class="hp-inclusions__grid container">
        <?php for ($i = 1; $i <= 6; $i++) : 
            $specialising_in = get_post_meta(get_the_ID(), "_specialising_in_{$i}", true);
            if (!empty($specialising_in)) : ?>
        <div class="hp-inclusions__item">
            <h4><?php echo esc_html($specialising_in); ?></h4>
        </div>
        <?php endif; ?>
        <?php endfor; ?>
    </div>


</section>