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
}

// Save meta box data
function save_packages_meta($post_id) {
    if (!isset($_POST['packages_meta_nonce']) || !wp_verify_nonce($_POST['packages_meta_nonce'], 'save_packages_meta')) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;

    // Save two image fields
    for ($i = 1; $i <= 2; $i++) {
        if (isset($_POST["packages_image_$i"])) {
            update_post_meta($post_id, "_packages_image_$i", intval($_POST["packages_image_$i"]));
        } else {
            delete_post_meta($post_id, "_packages_image_$i");
        }
    }
}
add_action('save_post', 'save_packages_meta');