<?php 

function mytheme_customize_google_reviews($wp_customize) {
    // Add Reviews Section
    $wp_customize->add_section('google_reviews_section', array(
        'title'    => __('Google Reviews', 'mytheme'),
        'priority' => 40,
    ));

    // Add setting for the slider title
    $wp_customize->add_setting('google_reviews_title', array(
        'default'   => 'What Our Clients Say', // Default title
        'transport' => 'postMessage', // Enable live preview
    ));

    // Add control for the slider title
    $wp_customize->add_control('google_reviews_title', array(
        'label'    => __('Reviews Section Title', 'mytheme'),
        'section'  => 'google_reviews_section',
        'type'     => 'text',
    ));

    // Add settings and controls for each review
    for ($i = 1; $i <= 4; $i++) {
        // Review Text
        $wp_customize->add_setting("google_review_text_$i", array('default' => 'Amazing service!'));
        $wp_customize->add_control("google_review_text_$i", array(
            'label'    => __("Review Text $i", 'mytheme'),
            'section'  => 'google_reviews_section',
            'type'     => 'textarea',
        ));

        // Reviewer Name
        $wp_customize->add_setting("google_review_name_$i", array('default' => 'John Doe'));
        $wp_customize->add_control("google_review_name_$i", array(
            'label'    => __("Reviewer Name $i", 'mytheme'),
            'section'  => 'google_reviews_section',
            'type'     => 'text',
        ));
    }
}
add_action('customize_register', 'mytheme_customize_google_reviews');