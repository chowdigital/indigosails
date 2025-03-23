<?php
// Add custom color palette to the block editor
function indigosails_editor_colors() {
    add_theme_support( 'editor-color-palette', array(
        array(
            'name'  => __( 'White', 'indigosails' ),
            'slug'  => 'white',
            'color' => '#fdf8ef',
        ),
        array(
            'name'  => __( 'Black', 'indigosails' ),
            'slug'  => 'black',
            'color' => '#000',
        ),
        array(
            'name'  => __( 'Purple Dark', 'indigosails' ),
            'slug'  => 'purple-d',
            'color' => '#72506d',
        ),
        array(
            'name'  => __( 'Purple Medium', 'indigosails' ),
            'slug'  => 'purple-m',
            'color' => '#bfa1c1',
        ),
        array(
            'name'  => __( 'Purple Light', 'indigosails' ),
            'slug'  => 'purple-l',
            'color' => '#ddc9db',
        ),
        array(
            'name'  => __( 'Green Dark', 'indigosails' ),
            'slug'  => 'green-d',
            'color' => '#4a4d2e',
        ),
        array(
            'name'  => __( 'Green Medium', 'indigosails' ),
            'slug'  => 'green-m',
            'color' => '#d3d9c1',
        ),
        array(
            'name'  => __( 'Green Light', 'indigosails' ),
            'slug'  => 'green-l',
            'color' => '#fdf8ef',
        ),
        array(
            'name'  => __( 'Pink Dark', 'indigosails' ),
            'slug'  => 'pink-d',
            'color' => '#8c4566',
        ),
        array(
            'name'  => __( 'Pink Medium', 'indigosails' ),
            'slug'  => 'pink-m',
            'color' => '#d3d9c1',
        ),
        array(
            'name'  => __( 'Pink Light', 'indigosails' ),
            'slug'  => 'pink-l',
            'color' => '#e8d2da',
        ),
    ));
}
add_action( 'after_setup_theme', 'indigosails_editor_colors' );

// Remove custom colors option
function indigosails_disable_custom_colors() {
    add_theme_support( 'disable-custom-colors' );
}
add_action( 'after_setup_theme', 'indigosails_disable_custom_colors' );