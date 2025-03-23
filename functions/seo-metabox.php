<?php
// Custom Meta Tags Box
function add_custom_meta_box() {
    add_meta_box("meta-description", "Meta Description", "custom_meta_box_markup", "post", "side", "high", null);
    add_meta_box("meta-description", "Meta Description", "custom_meta_box_markup", "page", "side", "high", null);
    add_meta_box("meta-description", "Meta Description", "custom_meta_box_markup", "features", "side", "high", null); // Add to features
    add_meta_box("meta-keywords", "Meta Keywords", "custom_meta_box_markup_keywords", "post", "side", "high", null);
    add_meta_box("meta-keywords", "Meta Keywords", "custom_meta_box_markup_keywords", "page", "side", "high", null);
    add_meta_box("meta-keywords", "Meta Keywords", "custom_meta_box_markup_keywords", "features", "side", "high", null); // Add to features
}
add_action("add_meta_boxes", "add_custom_meta_box");

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

function custom_meta_box_markup_keywords($object) {
    wp_nonce_field(basename(__FILE__), "meta-box-nonce");
    ?>
<div>
    <label for="meta-keywords-text">Keywords</label>
    <input name="meta-keywords-text" id="meta-keywords-text" type="text"
        value="<?php echo esc_attr(get_post_meta($object->ID, "meta-keywords-text", true)); ?>">
</div>
<?php
}

function save_custom_meta_box($post_id, $post, $update) {
    if (!isset($_POST["meta-box-nonce"]) || !wp_verify_nonce($_POST["meta-box-nonce"], basename(__FILE__))) {
        return $post_id;
    }

    if (!current_user_can("edit_post", $post_id)) {
        return $post_id;
    }

    if (defined("DOING_AUTOSAVE") && DOING_AUTOSAVE) {
        return $post_id;
    }

    if (isset($_POST["meta-description-text"])) {
        update_post_meta($post_id, "meta-description-text", sanitize_text_field($_POST["meta-description-text"]));
    }

    if (isset($_POST["meta-keywords-text"])) {
        update_post_meta($post_id, "meta-keywords-text", sanitize_text_field($_POST["meta-keywords-text"]));
    }
}
add_action("save_post", "save_custom_meta_box", 10, 3);