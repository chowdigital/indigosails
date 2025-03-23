<?php
// Add custom color palette to the block editor
function taraflynn_editor_colors() {
    add_theme_support( 'editor-color-palette', array(
        array(
            'name'  => __( 'White', 'taraflynn' ),
            'slug'  => 'white',
            'color' => '#fdf8ef',
        ),
        array(
            'name'  => __( 'Black', 'taraflynn' ),
            'slug'  => 'black',
            'color' => '#000',
        ),
        array(
            'name'  => __( 'Purple Dark', 'taraflynn' ),
            'slug'  => 'purple-d',
            'color' => '#72506d',
        ),
        array(
            'name'  => __( 'Purple Medium', 'taraflynn' ),
            'slug'  => 'purple-m',
            'color' => '#bfa1c1',
        ),
        array(
            'name'  => __( 'Purple Light', 'taraflynn' ),
            'slug'  => 'purple-l',
            'color' => '#ddc9db',
        ),
        array(
            'name'  => __( 'Green Dark', 'taraflynn' ),
            'slug'  => 'green-d',
            'color' => '#4a4d2e',
        ),
        array(
            'name'  => __( 'Green Medium', 'taraflynn' ),
            'slug'  => 'green-m',
            'color' => '#d3d9c1',
        ),
        array(
            'name'  => __( 'Green Light', 'taraflynn' ),
            'slug'  => 'green-l',
            'color' => '#fdf8ef',
        ),
        array(
            'name'  => __( 'Pink Dark', 'taraflynn' ),
            'slug'  => 'pink-d',
            'color' => '#8c4566',
        ),
        array(
            'name'  => __( 'Pink Medium', 'taraflynn' ),
            'slug'  => 'pink-m',
            'color' => '#d3d9c1',
        ),
        array(
            'name'  => __( 'Pink Light', 'taraflynn' ),
            'slug'  => 'pink-l',
            'color' => '#e8d2da',
        ),
    ));
}
add_action( 'after_setup_theme', 'taraflynn_editor_colors' );

// Remove custom colors option
function taraflynn_disable_custom_colors() {
    add_theme_support( 'disable-custom-colors' );
}
add_action( 'after_setup_theme', 'taraflynn_disable_custom_colors' );