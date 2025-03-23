<?php 

function mytheme_customize_register_timetable($wp_customize) {
    // Add Class Timetable Section
    $wp_customize->add_section('class_timetable_section', array(
        'title'    => __('Class Timetable', 'mytheme'),
        'priority' => 35,
    ));

    // Add a setting for the title
    $wp_customize->add_setting('class_timetable_title', array(
        'default'   => 'Class Timetable',
        'transport' => 'postMessage', // Enables live preview
    ));

    $wp_customize->add_control('class_timetable_title', array(
        'label'    => __('Section Title', 'mytheme'),
        'section'  => 'class_timetable_section',
        'type'     => 'text',
    ));

    // Add settings and controls for each day
    $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
    foreach ($days as $day) {
        $slug = strtolower($day); // Generate slug for each day
        $wp_customize->add_setting("class_timetable_{$slug}", array(
            'default'   => '',
            'transport' => 'postMessage',
        ));

        $wp_customize->add_control("class_timetable_{$slug}", array(
            'label'    => __("{$day} Timetable", 'mytheme'),
            'section'  => 'class_timetable_section',
            'type'     => 'textarea',
        ));
    }
}
add_action('customize_register', 'mytheme_customize_register_timetable');