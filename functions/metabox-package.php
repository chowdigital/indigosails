<?php
// Add meta box for Packages
function package_days_meta_box() {
    add_meta_box(
        'package_days_box', // Meta box ID
        'Package Days',     // Title
        'package_days_meta_box_callback', // Callback function
        'page',             // Post type
        'normal',           // Context
        'high'              // Priority
    );
}
add_action('add_meta_boxes', 'package_days_meta_box');

// Callback function to render the meta box
function package_days_meta_box_callback($post) {
    wp_nonce_field('save_package_days', 'package_days_nonce');

    for ($day = 1; $day <= 8; $day++) {
        $day_content = get_post_meta($post->ID, "_package_day_{$day}_content", true);

        echo '<h3>Day ' . esc_html($day) . '</h3>';
        echo '<p><label for="package-day-' . esc_attr($day) . '-content">Content:</label></p>';
        wp_editor($day_content, "package_day_{$day}_content", [
            'textarea_name' => "package_day_{$day}_content",
            'textarea_rows' => 8,
            'media_buttons' => true,
        ]);
    }
}

// Save meta box data
function save_package_days_meta($post_id) {
    if (!isset($_POST['package_days_nonce']) || !wp_verify_nonce($_POST['package_days_nonce'], 'save_package_days')) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    for ($day = 1; $day <= 8; $day++) {
        if (isset($_POST["package_day_{$day}_content"])) {
            update_post_meta($post_id, "_package_day_{$day}_content", wp_kses_post($_POST["package_day_{$day}_content"]));
        }
    }
}
add_action('save_post', 'save_package_days_meta');