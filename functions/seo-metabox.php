<?php
// Custom Meta Tags Box
function add_custom_meta_boxes() {
    // Meta Description for all post types
    add_meta_box("meta-description", "Meta Description", "custom_meta_box_markup", "post", "side", "high", null);
    add_meta_box("meta-description", "Meta Description", "custom_meta_box_markup", "page", "side", "high", null);
    add_meta_box("meta-description", "Meta Description", "custom_meta_box_markup", "features", "side", "high", null);
    add_meta_box("meta-description", "Meta Description", "custom_meta_box_markup", "people", "side", "high", null);
    add_meta_box("meta-description", "Meta Description", "custom_meta_box_markup", "yachts", "side", "high", null);

    // Short Title for "people" post type (below editor)
    add_meta_box("short-title", "Short Title", "short_title_meta_box_markup", "people", "normal", "high", null);
}
add_action("add_meta_boxes", "add_custom_meta_boxes");

// Meta Description Markup
function custom_meta_box_markup($object) {
    wp_nonce_field(basename(__FILE__), "meta-box-nonce");
    ?>
<div>
    <label for="meta-description-text">Description</label>
    <textarea name="meta-description-text" id="meta-description-text"
        style="width: 100%;"><?php echo esc_html(get_post_meta($object->ID, "meta-description-text", true)); ?></textarea>
</div>
<?php
}

// Short Title Markup for "people" post type
function short_title_meta_box_markup($object) {
    wp_nonce_field(basename(__FILE__), "short-title-meta-box-nonce");
    ?>
<div>
    <label for="short-title-text">Short Title</label>
    <input name="short-title-text" id="short-title-text" type="text" style="width: 100%;"
        value="<?php echo esc_attr(get_post_meta($object->ID, "short-title-text", true)); ?>">
</div>
<?php
}

// Save Meta Box Data
function save_custom_meta_boxes($post_id, $post, $update) {
    // Verify nonce
    if (!isset($_POST["meta-box-nonce"]) || !wp_verify_nonce($_POST["meta-box-nonce"], basename(__FILE__))) {
        return $post_id;
    }

    if (!isset($_POST["short-title-meta-box-nonce"]) || !wp_verify_nonce($_POST["short-title-meta-box-nonce"], basename(__FILE__))) {
        return $post_id;
    }

    // Check user permissions
    if (!current_user_can("edit_post", $post_id)) {
        return $post_id;
    }

    // Prevent autosave
    if (defined("DOING_AUTOSAVE") && DOING_AUTOSAVE) {
        return $post_id;
    }

    // Save Meta Description
    if (isset($_POST["meta-description-text"])) {
        update_post_meta($post_id, "meta-description-text", sanitize_text_field($_POST["meta-description-text"]));
    }

    // Save Short Title for "people" post type
    if (isset($_POST["short-title-text"])) {
        update_post_meta($post_id, "short-title-text", sanitize_text_field($_POST["short-title-text"]));
    }
}
add_action("save_post", "save_custom_meta_boxes", 10, 3);