<?php
// Add a metabox for the "People" custom post type
function add_people_bio_metabox() {
    add_meta_box(
        'people_bio_metabox', // Metabox ID
        'Bio',                // Title
        'render_people_bio_metabox', // Callback function
        'person',             // Post type
        'normal',             // Context (normal, side, etc.)
        'high'                // Priority
    );
}
add_action('add_meta_boxes', 'add_people_bio_metabox');

// Render the metabox
function render_people_bio_metabox($post) {
    // Retrieve the current value of the "Bio" field
    $bio = get_post_meta($post->ID, '_people_bio', true);

    // Add a nonce field for security
    wp_nonce_field('save_people_bio', 'people_bio_nonce');
    ?>
<label for="people_bio">Enter the bio:</label>
<textarea id="people_bio" name="people_bio" rows="5" style="width: 100%;"><?php echo esc_textarea($bio); ?></textarea>
<?php
}

// Save the "Bio" field value
function save_people_bio_metabox($post_id) {
    // Verify the nonce
    if (!isset($_POST['people_bio_nonce']) || !wp_verify_nonce($_POST['people_bio_nonce'], 'save_people_bio')) {
        return;
    }

    // Prevent auto-saves from overwriting data
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    // Check user permissions
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    // Save the "Bio" field value
    if (isset($_POST['people_bio'])) {
        update_post_meta($post_id, '_people_bio', sanitize_textarea_field($_POST['people_bio']));
    }
}
add_action('save_post', 'save_people_bio_metabox');