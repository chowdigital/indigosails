<?php
// Add a metabox for the "Yacht" custom post type
function add_yacht_metabox() {
    add_meta_box(
        'yacht_details_metabox', // Unique ID for the metabox
        'Yacht Details',         // Title of the metabox
        'render_yacht_metabox',  // Callback function to render the metabox
        'yacht',                 // Post type where the metabox will appear
        'normal',                // Context (normal, side, etc.)
        'high'                   // Priority
    );
}
add_action('add_meta_boxes', 'add_yacht_metabox');

// Render the "Yacht Details" metabox
function render_yacht_metabox($post) {
    // Retrieve the current values of the fields
    $interior_photo = get_post_meta($post->ID, '_yacht_interior_photo', true);
    $cabins = get_post_meta($post->ID, '_yacht_cabins', true);
    $guests = get_post_meta($post->ID, '_yacht_guests', true);
    $charter_dates = get_post_meta($post->ID, '_yacht_charter_dates', true);
    $location = get_post_meta($post->ID, '_yacht_location', true);
    $price_per_week = get_post_meta($post->ID, '_yacht_price_per_week', true);
    $price_per_person_per_week = get_post_meta($post->ID, '_yacht_price_per_person_per_week', true);

    // Add a nonce field for security
    wp_nonce_field('save_yacht_metabox', 'yacht_metabox_nonce');
    ?>
<div style="margin-bottom: 20px;">
    <label for="yacht_interior_photo">Interior Photo:</label>
    <div style="margin-bottom: 10px;">
        <img id="yacht_interior_photo_preview" src="<?php echo esc_url($interior_photo); ?>" alt=""
            style="max-width: 100%; height: auto; display: <?php echo $interior_photo ? 'block' : 'none'; ?>;" />
        <input type="hidden" id="yacht_interior_photo" name="yacht_interior_photo"
            value="<?php echo esc_url($interior_photo); ?>" />
        <button type="button" class="button select-image-button" data-target="yacht_interior_photo">Select
            Image</button>
        <button type="button" class="button remove-image-button" data-target="yacht_interior_photo"
            style="display: <?php echo $interior_photo ? 'inline-block' : 'none'; ?>;">Remove Image</button>
    </div>
</div>
<div style="margin-bottom: 20px;">
    <label for="yacht_cabins">Cabins:</label>
    <input type="text" id="yacht_cabins" name="yacht_cabins" value="<?php echo esc_attr($cabins); ?>"
        style="width: 100%;" />
</div>
<div style="margin-bottom: 20px;">
    <label for="yacht_guests">Guests:</label>
    <input type="text" id="yacht_guests" name="yacht_guests" value="<?php echo esc_attr($guests); ?>"
        style="width: 100%;" />
</div>
<div style="margin-bottom: 20px;">
    <label for="yacht_charter_dates">Charter Dates:</label>
    <input type="text" id="yacht_charter_dates" name="yacht_charter_dates"
        value="<?php echo esc_attr($charter_dates); ?>" style="width: 100%;" />
</div>
<div style="margin-bottom: 20px;">
    <label for="yacht_location">Location:</label>
    <input type="text" id="yacht_location" name="yacht_location" value="<?php echo esc_attr($location); ?>"
        style="width: 100%;" />
</div>
<div style="margin-bottom: 20px;">
    <label for="yacht_price_per_week">Price Per Week:</label>
    <input type="text" id="yacht_price_per_week" name="yacht_price_per_week"
        value="<?php echo esc_attr($price_per_week); ?>" style="width: 100%;" />
</div>
<div style="margin-bottom: 20px;">
    <label for="yacht_price_per_person_per_week">Price Per Person Per Week:</label>
    <input type="text" id="yacht_price_per_person_per_week" name="yacht_price_per_person_per_week"
        value="<?php echo esc_attr($price_per_person_per_week); ?>" style="width: 100%;" />
</div>
<?php
}

// Save the "Yacht Details" values
function save_yacht_metabox($post_id) {
    // Verify the nonce
    if (!isset($_POST['yacht_metabox_nonce']) || !wp_verify_nonce($_POST['yacht_metabox_nonce'], 'save_yacht_metabox')) {
        return;
    }

    // Check user permissions
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    // Prevent autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    // Save the fields
    $fields = [
        'yacht_interior_photo',
        'yacht_cabins',
        'yacht_guests',
        'yacht_charter_dates',
        'yacht_location',
        'yacht_price_per_week',
        'yacht_price_per_person_per_week',
    ];

    foreach ($fields as $field) {
        if (isset($_POST[$field])) {
            $value = $field === 'yacht_interior_photo' ? esc_url_raw($_POST[$field]) : sanitize_text_field($_POST[$field]);
            update_post_meta($post_id, "_$field", $value);
        }
    }
}
add_action('save_post', 'save_yacht_metabox');

// Enqueue admin scripts for media uploader
function enqueue_yacht_admin_scripts($hook) {
    if ('post.php' === $hook || 'post-new.php' === $hook) {
        wp_enqueue_media(); // Enqueue the WordPress Media Uploader
        wp_enqueue_script('custom-admin-scripts', get_template_directory_uri() . '/js/custom.js', ['jquery'], null, true);
    }
}
add_action('admin_enqueue_scripts', 'enqueue_yacht_admin_scripts');