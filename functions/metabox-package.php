<?php
// Add meta box for the "Packages" page template
function packages_meta_box() {
    add_meta_box(
        'packages_meta_box', // Meta box ID
        'Packages Meta Box', // Title
        'packages_meta_box_callback', // Callback function
        'page',              // Post type
        'normal',            // Context (below the editor)
        'high'               // Priority
    );
}
add_action('add_meta_boxes', 'packages_meta_box');

// Callback function to render the meta box
function packages_meta_box_callback($post) {
    // Check if the page uses the "Packages" template
    $template = get_page_template_slug($post->ID);
    if ($template !== 'template-packages.php') {
        echo '<p>This meta box is only available for pages using the "Packages" template.</p>';
        return;
    }

    wp_nonce_field('save_packages_meta', 'packages_meta_nonce');

    // Sailing Route Text Box
    $sailing_route = get_post_meta($post->ID, '_packages_sailing_route', true);
    ?>
<div style="margin-bottom: 15px;">
    <label for="packages-sailing-route">Sailing Route:</label><br>
    <textarea id="packages-sailing-route" name="packages_sailing_route"
        style="width: 100%; height: 80px;"><?php echo esc_textarea($sailing_route); ?></textarea>
</div>
<?php

    // Date Text Box
    $date = get_post_meta($post->ID, '_packages_date', true);
    ?>
<div style="margin-bottom: 15px;">
    <label for="packages-date">Date:</label><br>
    <input type="text" id="packages-date" name="packages_date" value="<?php echo esc_attr($date); ?>"
        style="width: 100%;" placeholder="Enter the date" />
</div>
<?php

    // Loop through two image fields
    for ($i = 1; $i <= 2; $i++) {
        $image_id = get_post_meta($post->ID, "_packages_image_$i", true);
        $image_url = $image_id ? wp_get_attachment_image_url($image_id, 'medium') : '';
        ?>
<div style="margin-bottom: 15px;">
    <label>Image <?php echo $i; ?>:</label><br>
    <img src="<?php echo esc_url($image_url); ?>" id="packages-image-preview-<?php echo $i; ?>"
        style="max-width: 200px; display: block; margin-bottom: 5px;" />
    <input type="hidden" name="packages_image_<?php echo $i; ?>" id="packages-image-input-<?php echo $i; ?>"
        value="<?php echo esc_attr($image_id); ?>" />
    <button type="button" class="button select-packages-image" data-target="<?php echo $i; ?>">Select Image</button>
</div>
<?php
    }

    // Map Image Area
    $map_image_id = get_post_meta($post->ID, '_packages_map_image', true);
    $map_image_url = $map_image_id ? wp_get_attachment_image_url($map_image_id, 'medium') : '';
    ?>
<div style="margin-bottom: 15px;">
    <label for="packages-map-image">Map Image:</label><br>
    <img src="<?php echo esc_url($map_image_url); ?>" id="packages-map-image-preview"
        style="max-width: 200px; display: block; margin-bottom: 5px;" />
    <input type="hidden" name="packages_map_image" id="packages-map-image-input"
        value="<?php echo esc_attr($map_image_id); ?>" />
    <button type="button" class="button select-packages-map-image">Select Map Image</button>
</div>
<?php
}

// Save meta box data
function save_packages_meta($post_id) {
    if (!isset($_POST['packages_meta_nonce']) || !wp_verify_nonce($_POST['packages_meta_nonce'], 'save_packages_meta')) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;

    // Save Sailing Route
    if (isset($_POST['packages_sailing_route'])) {
        update_post_meta($post_id, '_packages_sailing_route', sanitize_textarea_field($_POST['packages_sailing_route']));
    }

    // Save Date
    if (isset($_POST['packages_date'])) {
        update_post_meta($post_id, '_packages_date', sanitize_text_field($_POST['packages_date']));
    }

    // Save two image fields
    for ($i = 1; $i <= 2; $i++) {
        if (isset($_POST["packages_image_$i"])) {
            update_post_meta($post_id, "_packages_image_$i", intval($_POST["packages_image_$i"]));
        } else {
            delete_post_meta($post_id, "_packages_image_$i");
        }
    }

    // Save Map Image
    if (isset($_POST['packages_map_image'])) {
        update_post_meta($post_id, '_packages_map_image', intval($_POST['packages_map_image']));
    } else {
        delete_post_meta($post_id, '_packages_map_image');
    }
}
add_action('save_post', 'save_packages_meta');