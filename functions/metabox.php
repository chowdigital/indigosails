<?php
function cta_metabox_callback($post) {
    wp_nonce_field('save_cta_meta', 'cta_meta_nonce');

    $cta_text = get_post_meta($post->ID, '_cta_text', true) ?: 'Make a booking';
    $cta_link = get_post_meta($post->ID, '_cta_link', true) ?: 'https://app.acuityscheduling.com/schedule.php?owner=33595336';

    ?>
<label for="cta_text" style="display: block; margin-bottom: 5px;">Button Text:</label>
<input type="text" name="cta_text" id="cta_text" value="<?php echo esc_attr($cta_text); ?>"
    style="width: 100%; margin-bottom: 10px;" />

<label for="cta_link" style="display: block; margin-bottom: 5px;">Button Link:</label>
<input type="url" name="cta_link" id="cta_link" value="<?php echo esc_attr($cta_link); ?>"
    style="width: 100%; margin-bottom: 10px;" />
<?php
}

function save_cta_metabox($post_id) {
    if (!isset($_POST['cta_meta_nonce']) || !wp_verify_nonce($_POST['cta_meta_nonce'], 'save_cta_meta')) {
        return;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    if (isset($_POST['cta_text'])) {
        update_post_meta($post_id, '_cta_text', sanitize_text_field($_POST['cta_text']));
    }
    if (isset($_POST['cta_link'])) {
        update_post_meta($post_id, '_cta_link', esc_url_raw($_POST['cta_link']));
    }
}

function add_cta_metabox() {
    add_meta_box(
        'cta_metabox', // ID
        'CTA Settings', // Title
        'cta_metabox_callback', // Callback function
        ['page', 'post', 'services'], // Add meta box to Pages, Posts (Services), and Custom Post Type Services
        'normal', // Context
        'default' // Priority
    );
}

add_action('add_meta_boxes', 'add_cta_metabox');
add_action('save_post', 'save_cta_metabox');