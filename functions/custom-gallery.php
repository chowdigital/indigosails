<?php 

function mytheme_customize_register($wp_customize) {
    // Add Gallery Section
    $wp_customize->add_section('gallery_section', array(
        'title'    => __('Gallery', 'mytheme'),
        'priority' => 30,
    ));
          // Add a setting for the dynamic title
          $wp_customize->add_setting('gallery_section_title', array(
            'default'   => 'Title', // Default title
            'transport' => 'postMessage', // For live preview updates
        ));
    
        // Add a control for the dynamic title
        $wp_customize->add_control('gallery_section_title', array(
            'label'    => __('Gallery Section Title', 'mytheme'),
            'section'  => 'gallery_section', // Add to the existing Gallery section
            'type'     => 'text',
        ));

    // Column 1 Image
    $wp_customize->add_setting('gallery_col1_image', array('default' => ''));
    $wp_customize->add_control(new WP_Customize_Image_Control(
        $wp_customize,
        'gallery_col1_image',
        array(
            'label'    => __('Column 1 Image', 'mytheme'),
            'section'  => 'gallery_section',
            'settings' => 'gallery_col1_image',
        )
    ));

    // Column 2 Image
    $wp_customize->add_setting('gallery_col2_image', array('default' => ''));
    $wp_customize->add_control(new WP_Customize_Image_Control(
        $wp_customize,
        'gallery_col2_image',
        array(
            'label'    => __('Column 2 Image', 'mytheme'),
            'section'  => 'gallery_section',
            'settings' => 'gallery_col2_image',
        )
    ));

    // Column 3 Image
    $wp_customize->add_setting('gallery_col3_image', array('default' => ''));
    $wp_customize->add_control(new WP_Customize_Image_Control(
        $wp_customize,
        'gallery_col3_image',
        array(
            'label'    => __('Column 3 Image', 'mytheme'),
            'section'  => 'gallery_section',
            'settings' => 'gallery_col3_image',
        )
    ));

    // Column 4 Text Area
    $wp_customize->add_setting('gallery_col4_text', array('default' => ''));
    $wp_customize->add_control('gallery_col4_text', array(
        'label'    => __('Column 4 Text', 'mytheme'),
        'type'     => 'textarea',
        'section'  => 'gallery_section',
        'settings' => 'gallery_col4_text',
    ));

    // Column 4 Button Text
    $wp_customize->add_setting('gallery_col4_button_text', array('default' => 'View Gallery'));
    $wp_customize->add_control('gallery_col4_button_text', array(
        'label'    => __('Button Text', 'mytheme'),
        'type'     => 'text',
        'section'  => 'gallery_section',
        'settings' => 'gallery_col4_button_text',
    ));

    // Column 4 Button Link
    $wp_customize->add_setting('gallery_col4_button_link', array('default' => '/gallery'));
    $wp_customize->add_control('gallery_col4_button_link', array(
        'label'    => __('Button Link', 'mytheme'),
        'type'     => 'url',
        'section'  => 'gallery_section',
        'settings' => 'gallery_col4_button_link',
    ));

}
add_action('customize_register', 'mytheme_customize_register');