<?php 

function custom_theme_customize_register( $wp_customize ) {
    // Footer Section
    $wp_customize->add_section( 'footer_section', array(
        'title'       => __( 'Footer Settings', 'your-theme-textdomain' ),
        'priority'    => 160,
        'description' => 'Customize the footer content',
    ) );

    // Footer Title
    $wp_customize->add_setting( 'footer_title', array(
        'default'           => 'Find Us',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'footer_title_control', array(
        'label'    => __( 'Footer Title', 'your-theme-textdomain' ),
        'section'  => 'footer_section',
        'settings' => 'footer_title',
        'type'     => 'text',
    ) );

    // Footer Name
    $wp_customize->add_setting( 'footer_name', array(
        'default'           => 'Your Name',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'footer_name_control', array(
        'label'    => __( 'Name', 'your-theme-textdomain' ),
        'section'  => 'footer_section',
        'settings' => 'footer_name',
        'type'     => 'text',
    ) );

    // Footer Address
    $wp_customize->add_setting( 'footer_address', array(
        'default'           => '123 Your Address, City, Country',
        'sanitize_callback' => 'sanitize_textarea_field',
    ) );

    $wp_customize->add_control( 'footer_address_control', array(
        'label'    => __( 'Address', 'your-theme-textdomain' ),
        'section'  => 'footer_section',
        'settings' => 'footer_address',
        'type'     => 'textarea',
    ) );

    // Footer Phone
    $wp_customize->add_setting( 'footer_phone', array(
        'default'           => '+1234567890',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'footer_phone_control', array(
        'label'    => __( 'Phone Number', 'your-theme-textdomain' ),
        'section'  => 'footer_section',
        'settings' => 'footer_phone',
        'type'     => 'text',
    ) );

    // Footer Email
    $wp_customize->add_setting( 'footer_email', array(
        'default'           => 'email@example.com',
        'sanitize_callback' => 'sanitize_email',
    ) );

    $wp_customize->add_control( 'footer_email_control', array(
        'label'    => __( 'Email Address', 'your-theme-textdomain' ),
        'section'  => 'footer_section',
        'settings' => 'footer_email',
        'type'     => 'email',
    ) );

    // Footer Appointment URL
    $wp_customize->add_setting( 'footer_appointment_url', array(
        'default'           => '#',
        'sanitize_callback' => 'esc_url_raw',
    ) );

    $wp_customize->add_control( 'footer_appointment_url_control', array(
        'label'    => __( 'Book Appointment URL', 'your-theme-textdomain' ),
        'section'  => 'footer_section',
        'settings' => 'footer_appointment_url',
        'type'     => 'url',
    ) );

    // Footer Button Text
    $wp_customize->add_setting( 'footer_button_text', array(
        'default'           => 'Book an Appointment',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'footer_button_text_control', array(
        'label'    => __( 'Appointment Button Text', 'your-theme-textdomain' ),
        'section'  => 'footer_section',
        'settings' => 'footer_button_text',
        'type'     => 'text',
    ) );

    // Custom Logo URL
    $wp_customize->add_setting( 'custom_logo_url', array(
        'default'           => get_template_directory_uri() . '/assets/logo/logo_wide.svg',
        'sanitize_callback' => 'esc_url_raw',
    ) );

    $wp_customize->add_control( 'custom_logo_url_control', array(
        'label'    => __( 'Logo URL', 'your-theme-textdomain' ),
        'section'  => 'footer_section',
        'settings' => 'custom_logo_url',
        'type'     => 'url',
    ) );
}

add_action( 'customize_register', 'custom_theme_customize_register' );