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
    // Add a nonce field for security
    wp_nonce_field('save_package_days', 'package_days_nonce');

    // Loop through 8 days
    for ($day = 1; $day <= 8; $day++) {
        // Retrieve the title and content for the day
        $day_title = get_post_meta($post->ID, "_package_day_{$day}_title", true);
        $day_content = get_post_meta($post->ID, "_package_day_{$day}_content", true);

        // Default title if not set
        $default_title = "Day $day";
        $day_title = !empty($day_title) ? $day_title : $default_title;

        // Render the title field
        echo '<h3>' . esc_html($default_title) . '</h3>';
        echo '<p><label for="package-day-' . esc_attr($day) . '-title">Title:</label></p>';
        echo '<input type="text" id="package-day-' . esc_attr($day) . '-title" name="package_day_' . esc_attr($day) . '_title" value="' . esc_attr($day_title) . '" style="width: 100%; margin-bottom: 15px;">';

        // Render the WYSIWYG editor for content
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
    // Verify nonce
    if (!isset($_POST['package_days_nonce']) || !wp_verify_nonce($_POST['package_days_nonce'], 'save_package_days')) {
        return;
    }

    // Prevent autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    // Check user permissions
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    // Save data for each day
    for ($day = 1; $day <= 8; $day++) {
        // Save the title
        if (isset($_POST["package_day_{$day}_title"])) {
            update_post_meta($post_id, "_package_day_{$day}_title", sanitize_text_field($_POST["package_day_{$day}_title"]));
        }

        // Save the content
        if (isset($_POST["package_day_{$day}_content"])) {
            update_post_meta($post_id, "_package_day_{$day}_content", wp_kses_post($_POST["package_day_{$day}_content"]));
        }
    }
}
add_action('save_post', 'save_package_days_meta');