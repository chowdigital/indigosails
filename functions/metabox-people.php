<?php
// Add metaboxes for the "People" custom post type
function add_people_metaboxes() {
    add_meta_box(
        'people_qualifications_metabox', // Metabox ID
        'Qualifications',                // Title
        'render_people_qualifications_metabox', // Callback function
        'person',                        // Post type
        'normal',                        // Context (normal, side, etc.)
        'high'                           // Priority
    );

    add_meta_box(
        'people_bio_metabox', // Metabox ID
        'Bio',                // Title
        'render_people_bio_metabox', // Callback function
        'person',             // Post type
        'normal',             // Context (normal, side, etc.)
        'high'                // Priority
    );
}
add_action('add_meta_boxes', 'add_people_metaboxes');

// Render the "Qualifications" metabox
function render_people_qualifications_metabox($post) {
    // Retrieve the current value of the "Qualifications" field
    $qualifications = get_post_meta($post->ID, '_people_qualifications', true);

    // Add a nonce field for security
    wp_nonce_field('save_people_qualifications', 'people_qualifications_nonce');
    ?>
<label for="people_qualifications">Enter the qualifications:</label>
<input type="text" id="people_qualifications" name="people_qualifications"
    value="<?php echo esc_attr($qualifications); ?>" style="width: 100%;" />
<?php
}

// Render the "Bio" metabox
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

// Save the "Qualifications" and "Bio" field values
function save_people_metaboxes($post_id) {
    // Verify the nonce for "Qualifications"
    if (isset($_POST['people_qualifications_nonce']) && wp_verify_nonce($_POST['people_qualifications_nonce'], 'save_people_qualifications')) {
        // Save the "Qualifications" field value
        if (isset($_POST['people_qualifications'])) {
            update_post_meta($post_id, '_people_qualifications', sanitize_text_field($_POST['people_qualifications']));
        }
    }

    // Verify the nonce for "Bio"
    if (isset($_POST['people_bio_nonce']) && wp_verify_nonce($_POST['people_bio_nonce'], 'save_people_bio')) {
        // Save the "Bio" field value
        if (isset($_POST['people_bio'])) {
            update_post_meta($post_id, '_people_bio', sanitize_textarea_field($_POST['people_bio']));
        }
    }
}
add_action('save_post', 'save_people_metaboxes');