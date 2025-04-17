<?php
// Add meta box for Locations post type
function location_images_meta_box() {
    add_meta_box(
        'location_images_box', // Meta box ID
        'Location Images',     // Title
        'location_images_meta_box_callback', // Callback function
        'location',           // Post type
        'normal',              // Context (below the editor)
        'high'                 // Priority
    );

    // Add meta box for custom text
    add_meta_box(
        'location_custom_text_box', // Meta box ID
        'Location Custom Text',     // Title
        'location_custom_text_meta_box_callback', // Callback function
        'location',                 // Post type
        'normal',                   // Context (below the editor)
        'high'                      // Priority
    );
}
add_action('add_meta_boxes', 'location_images_meta_box');

// Callback function to render the images meta box
function location_images_meta_box_callback($post) {
    wp_nonce_field('save_location_images', 'location_images_nonce');

    for ($i = 1; $i <= 2; $i++) {
        $image_id = get_post_meta($post->ID, "_location_image_$i", true);
        $image_url = $image_id ? wp_get_attachment_image_url($image_id, 'medium') : '';
        ?>
<div style="margin-bottom: 15px;">
    <label>Image <?php echo $i; ?>:</label><br>
    <img src="<?php echo esc_url($image_url); ?>" id="location-image-preview-<?php echo $i; ?>"
        style="max-width: 200px; display: block; margin-bottom: 5px;" />
    <input type="hidden" name="location_image_<?php echo $i; ?>" id="location-image-input-<?php echo $i; ?>"
        value="<?php echo esc_attr($image_id); ?>" />
    <button type="button" class="button select-location-image" data-target="<?php echo $i; ?>">Select Image</button>
</div>
<?php
    }
}

// Callback function to render the custom text meta box
function location_custom_text_meta_box_callback($post) {
    wp_nonce_field('save_location_custom_text', 'location_custom_text_nonce');

    $custom_text = get_post_meta($post->ID, '_location_custom_text', true);
    ?>
<div style="margin-bottom: 15px;">
    <label for="location-custom-text">Custom Text:</label><br>
    <textarea name="location_custom_text" id="location-custom-text" rows="5"
        style="width: 100%;"><?php echo esc_textarea($custom_text); ?></textarea>
</div>
<?php
}

// Save meta box data for Locations
function save_location_images_meta($post_id) {
    // Save images
    if (!isset($_POST['location_images_nonce']) || !wp_verify_nonce($_POST['location_images_nonce'], 'save_location_images')) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;

    for ($i = 1; $i <= 5; $i++) {
        if (isset($_POST["location_image_$i"])) {
            update_post_meta($post_id, "_location_image_$i", intval($_POST["location_image_$i"]));
        }
    }

    // Save custom text
    if (!isset($_POST['location_custom_text_nonce']) || !wp_verify_nonce($_POST['location_custom_text_nonce'], 'save_location_custom_text')) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;

    if (isset($_POST['location_custom_text'])) {
        update_post_meta($post_id, '_location_custom_text', sanitize_textarea_field($_POST['location_custom_text']));
    }
}
add_action('save_post', 'save_location_images_meta');