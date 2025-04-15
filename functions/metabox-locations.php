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
    for ($i = 1; $i <= 5; $i++) {
        ${"image_$i"} = get_post_meta($post->ID, "_location_image_$i", true);
    }

    // Retrieve existing meta values for text areas
    $title_1 = get_post_meta($post->ID, '_location_title_1', true);
    $text_area_1 = get_post_meta($post->ID, '_location_text_area_1', true);
    $title_2 = get_post_meta($post->ID, '_location_title_2', true);
    $text_area_2 = get_post_meta($post->ID, '_location_text_area_2', true);

    // Render fields
    ?>
<h3>Image Fields</h3>
<?php for ($i = 1; $i <= 5; $i++): ?>
<div style="margin-bottom: 15px;">
    <label for="location-image-<?php echo $i; ?>">Image <?php echo $i; ?>:</label><br>
    <img src="<?php echo esc_url(wp_get_attachment_image_url(${"image_$i"}, 'medium')); ?>"
        id="location-image-preview-<?php echo $i; ?>" style="max-width: 200px; display: block; margin-bottom: 5px;" />
    <input type="hidden" name="location_image_<?php echo $i; ?>" id="location-image-input-<?php echo $i; ?>"
        value="<?php echo esc_attr(${"image_$i"}); ?>" />
    <button type="button" class="button select-location-image" data-target="<?php echo $i; ?>">Select Image</button>
</div>
<?php endfor; ?>

<h3>Text Fields</h3>
<div style="margin-bottom: 15px;">
    <label for="location-title-1">Title 1:</label><br>
    <input type="text" name="location_title_1" id="location-title-1" style="width: 100%;"
        value="<?php echo esc_attr($title_1); ?>" />
</div>
<div style="margin-bottom: 15px;">
    <label for="location-text-area-1">Text Area 1:</label><br>
    <textarea name="location_text_area_1" id="location-text-area-1"
        style="width: 100%; height: 100px;"><?php echo esc_textarea($text_area_1); ?></textarea>
</div>
<div style="margin-bottom: 15px;">
    <label for="location-title-2">Title 2:</label><br>
    <input type="text" name="location_title_2" id="location-title-2" style="width: 100%;"
        value="<?php echo esc_attr($title_2); ?>" />
</div>
<div style="margin-bottom: 15px;">
    <label for="location-text-area-2">Text Area 2:</label><br>
    <textarea name="location_text_area_2" id="location-text-area-2"
        style="width: 100%; height: 100px;"><?php echo esc_textarea($text_area_2); ?></textarea>
</div>
<?php
}

// Save meta box data for Locations
function save_location_images_meta($post_id) {
    if (!isset($_POST['location_images_nonce']) || !wp_verify_nonce($_POST['location_images_nonce'], 'save_location_images')) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;

    // Save image fields
    for ($i = 1; $i <= 5; $i++) {
        if (isset($_POST["location_image_$i"])) {
            update_post_meta($post_id, "_location_image_$i", sanitize_text_field($_POST["location_image_$i"]));
        }
    }

    // Save text fields
    if (isset($_POST['location_title_1'])) {
        update_post_meta($post_id, '_location_title_1', sanitize_text_field($_POST['location_title_1']));
    }
    if (isset($_POST['location_text_area_1'])) {
        update_post_meta($post_id, '_location_text_area_1', sanitize_textarea_field($_POST['location_text_area_1']));
    }
    if (isset($_POST['location_title_2'])) {
        update_post_meta($post_id, '_location_title_2', sanitize_text_field($_POST['location_title_2']));
    }
    if (isset($_POST['location_text_area_2'])) {
        update_post_meta($post_id, '_location_text_area_2', sanitize_textarea_field($_POST['location_text_area_2']));
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