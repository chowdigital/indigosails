<section class="class-timetable">
    <div class="container timetable-plant">
        <h2 class="dynamic-title h2-stripe">
            <?php echo esc_html(get_theme_mod('class_timetable_title', 'Class Timetable')); ?>
        </h2>
        <div class="accordion">
            <?php
            $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
            foreach ($days as $day) :
                $slug = strtolower($day);
                $content = nl2br(esc_html(get_theme_mod("class_timetable_{$slug}", ''))); // Remove default text
                if (!empty(trim($content))) : // Check if the content is not empty
            ?>
            <div class="accordion-item">
                <button class="accordion-header" data-day="<?php echo $slug; ?>">
                    <?php echo esc_html($day); ?>
                    <span class="accordion-icon"></span>
                </button>
                <div class="accordion-content">
                    <p><?php echo $content; ?></p>
                </div>
            </div>
            <?php
                endif;
            endforeach;
            ?>
        </div>
    </div>
</section>