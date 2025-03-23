<?php function theme_customize_register($wp_customize) {
    // Section for "About Content"
    $wp_customize->add_section('about_section', array(
        'title'    => __('About Section', 'theme-textdomain'),
        'priority' => 30,
    ));

    // Title Setting
    $wp_customize->add_setting('about_title', array(
        'default'           => __('Meet Tara Flynn', 'theme-textdomain'),
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('about_title', array(
        'label'    => __('About Title', 'theme-textdomain'),
        'section'  => 'about_section',
        'settings' => 'about_title',
        'type'     => 'text',
    ));

    // Image Setting
    $wp_customize->add_setting('about_image', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'about_image', array(
        'label'    => __('About Image', 'theme-textdomain'),
        'section'  => 'about_section',
        'settings' => 'about_image',
    )));

    // Content Setting
    $wp_customize->add_setting('about_content', array(
        'default'           => __('Default about content text.', 'theme-textdomain'),
        'sanitize_callback' => 'wp_kses_post',
    ));
    $wp_customize->add_control('about_content', array(
        'label'    => __('About Content', 'theme-textdomain'),
        'section'  => 'about_section',
        'settings' => 'about_content',
        'type'     => 'textarea',
    ));

    // Call-to-Action Button Text
    $wp_customize->add_setting('about_cta_text', array(
        'default'           => __('Call to Action', 'theme-textdomain'),
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('about_cta_text', array(
        'label'    => __('Button Text', 'theme-textdomain'),
        'section'  => 'about_section',
        'settings' => 'about_cta_text',
        'type'     => 'text',
    ));

    // Call-to-Action Button Link
    $wp_customize->add_setting('about_cta_link', array(
        'default'           => '#',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('about_cta_link', array(
        'label'    => __('Button Link', 'theme-textdomain'),
        'section'  => 'about_section',
        'settings' => 'about_cta_link',
        'type'     => 'url',
    ));
}
add_action('customize_register', 'theme_customize_register');