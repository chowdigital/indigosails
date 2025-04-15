<?php
// Add meta box for Locations post type
function location_images_meta_box() {
    add_meta_box(
        'location_images_box', // Meta box ID
        'Location Content',    // Title
        'location_images_meta_box_callback', // Callback function
        'location',            // Correct post type key (singular)
        'normal',              // Context (below the editor)
        'high'                 // Priority
    );
}
add_action('add_meta_boxes', 'location_images_meta_box');

// Callback function to render the meta box
function location_images_meta_box_callback($post) {
    wp_nonce_field('save_location_images', 'location_images_nonce');

    // Retrieve existing meta values for images
    $image_1 = get_post_meta($post->ID, '_location_image_1', true);
    $image_2 = get_post_meta($post->ID, '_location_image_2', true);

    // Retrieve existing meta value for the text box
    $custom_text = get_post_meta($post->ID, '_location_custom_text', true);

    // Render fields
    ?>
<h3>Image Fields</h3>
<div style="margin-bottom: 15px;">
    <label for="location-image-1">Image 1:</label><br>
    <img src="<?php echo esc_url(wp_get_attachment_image_url($image_1, 'medium')); ?>" id="location-image-preview-1"
        style="max-width: 200px; display: block; margin-bottom: 5px;" />
    <input type="hidden" name="location_image_1" id="location-image-input-1"
        value="<?php echo esc_attr($image_1); ?>" />
    <button type="button" class="button select-location-image" data-target="1">Select Image</button>
</div>
<div style="margin-bottom: 15px;">
    <label for="location-image-2">Image 2:</label><br>
    <img src="<?php echo esc_url(wp_get_attachment_image_url($image_2, 'medium')); ?>" id="location-image-preview-2"
        style="max-width: 200px; display: block; margin-bottom: 5px;" />
    <input type="hidden" name="location_image_2" id="location-image-input-2"
        value="<?php echo esc_attr($image_2); ?>" />
    <button type="button" class="button select-location-image" data-target="2">Select Image</button>
</div>

<h3>Custom Text</h3>
<div style="margin-bottom: 15px;">
    <label for="location-custom-text">Custom Text:</label><br>
    <textarea name="location_custom_text" id="location-custom-text"
        style="width: 100%; height: 100px;"><?php echo esc_textarea($custom_text); ?></textarea>
</div>
<?php
}

// Save meta box data for Locations
function save_location_images_meta($post_id) {
    // Verify nonce
    if (!isset($_POST['location_images_nonce']) || !wp_verify_nonce($_POST['location_images_nonce'], 'save_location_images')) {
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

    // Save image fields
    if (isset($_POST['location_image_1'])) {
        update_post_meta($post_id, '_location_image_1', sanitize_text_field($_POST['location_image_1']));
    }
    if (isset($_POST['location_image_2'])) {
        update_post_meta($post_id, '_location_image_2', sanitize_text_field($_POST['location_image_2']));
    }

    // Save custom text
    if (isset($_POST['location_custom_text'])) {
        update_post_meta($post_id, '_location_custom_text', sanitize_textarea_field($_POST['location_custom_text']));
    }
}
add_action('save_post', 'save_location_images_meta');

// Enqueue media uploader script
function location_images_admin_scripts($hook) {
    if ($hook === 'post.php' || $hook === 'post-new.php') {
        wp_enqueue_media();
        wp_enqueue_script('location-images-js', get_template_directory_uri() . '/js/location-images.js', ['jquery'], null, true);
    }
}
add_action('admin_enqueue_scripts', 'location_images_admin_scripts');