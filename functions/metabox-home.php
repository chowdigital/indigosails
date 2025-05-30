<?php
function journey_images_meta_box() {
    // Add metabox only to the homepage or pages using the "page-homepage.php" template
    $template = get_page_template_slug(get_the_ID());
    if (get_option('page_on_front') == get_the_ID() || $template === 'page-homepage.php') {
        add_meta_box(
            'journey_images_box',
            'Homepage Journey Images',
            'journey_images_meta_box_callback',
            'page',
            'normal',
            'high'
        );
    }
}
add_action('add_meta_boxes', 'journey_images_meta_box');

function journey_images_meta_box_callback($post) {
    wp_nonce_field('save_journey_images', 'journey_images_nonce');

    for ($i = 1; $i <= 5; $i++) {
        $image_id = get_post_meta($post->ID, "_journey_image_$i", true);
        $image_url = $image_id ? wp_get_attachment_image_url($image_id, 'medium') : '';
        ?>
<div style="margin-bottom: 15px;">
    <label>Image <?php echo $i; ?>:</label><br>
    <img src="<?php echo esc_url($image_url); ?>" id="journey-image-preview-<?php echo $i; ?>"
        style="max-width: 200px; display: block; margin-bottom: 5px;" />
    <input type="hidden" name="journey_image_<?php echo $i; ?>" id="journey-image-input-<?php echo $i; ?>"
        value="<?php echo esc_attr($image_id); ?>" />
    <button type="button" class="button select-journey-image" data-target="<?php echo $i; ?>">Select Image</button>
</div>
<?php
    }
}

function journey_images_admin_scripts($hook) {
    if ($hook === 'post.php' || $hook === 'post-new.php') {
        wp_enqueue_media();
        wp_enqueue_script('journey-images-js', get_template_directory_uri() . '/js/journey-images.js', ['jquery'], null, true);
    }
}
add_action('admin_enqueue_scripts', 'journey_images_admin_scripts');

function save_journey_images_meta($post_id) {
    if (!isset($_POST['journey_images_nonce']) || !wp_verify_nonce($_POST['journey_images_nonce'], 'save_journey_images')) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;

    for ($i = 1; $i <= 5; $i++) {
        if (isset($_POST["journey_image_$i"])) {
            update_post_meta($post_id, "_journey_image_$i", intval($_POST["journey_image_$i"]));
        }
    }
}
add_action('save_post', 'save_journey_images_meta');

function add_short_title_metabox() {
    add_meta_box(
        'short_title_metabox', // ID
        'Short Title',         // Title
        'render_short_title_metabox', // Callback
        'person',              // Post type
        'side',                // Context
        'default'              // Priority
    );
}
add_action('add_meta_boxes', 'add_short_title_metabox');

function render_short_title_metabox($post) {
    // Retrieve the current value of the short title
    $short_title = get_post_meta($post->ID, '_short_title', true);
    ?>
<label for="short_title">Short Title:</label>
<input type="text" id="short_title" name="short_title" value="<?php echo esc_attr($short_title); ?>"
    style="width: 100%;" />
<?php
}

function save_short_title_metabox($post_id) {
    // Check if the short title is set and save it
    if (isset($_POST['short_title'])) {
        update_post_meta($post_id, '_short_title', sanitize_text_field($_POST['short_title']));
    }
}
add_action('save_post', 'save_short_title_metabox');