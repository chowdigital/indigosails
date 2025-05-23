<?php
// Add metaboxes for the "People" custom post type
function add_people_metaboxes() {
    add_meta_box(
        'people_videos_metabox', // Metabox ID
        'YouTube Videos, Social Media Links, and Books', // Title
        'render_people_videos_metabox', // Callback function
        'person',                // Post type
        'normal',                // Context (normal, side, etc.)
        'high'                   // Priority
    );

    // Add Quotes Metabox
    add_meta_box(
        'people_quotes_metabox', // Metabox ID
        'Quotes',                // Title
        'render_people_quotes_metabox', // Callback function
        'person',                // Post type
        'normal',                // Context (normal, side, etc.)
        'high'                   // Priority
    );

    // Add Specialising In and Interested In Metabox
    add_meta_box(
        'people_specialising_interested_metabox', // Metabox ID
        'Specialising In and Interested In',     // Title
        'render_people_specialising_interested_metabox', // Callback function
        'person',                                // Post type
        'normal',                                // Context (normal, side, etc.)
        'high'                                   // Priority
    );
}
add_action('add_meta_boxes', 'add_people_metaboxes');

// Render the "YouTube Videos, Social Media Links, and Books" metabox
function render_people_videos_metabox($post) {
    wp_nonce_field('save_people_videos', 'people_videos_nonce');

    // Loop through 4 video slots
    for ($i = 1; $i <= 4; $i++) {
        $video_title = get_post_meta($post->ID, "_people_video_{$i}_title", true);
        $video_description = get_post_meta($post->ID, "_people_video_{$i}_description", true);
        $video_link = get_post_meta($post->ID, "_people_video_{$i}_link", true);
        ?>
<div style="margin-bottom: 20px;">
    <label for="people_video_<?php echo $i; ?>_title">Video <?php echo $i; ?> Title:</label>
    <input type="text" id="people_video_<?php echo $i; ?>_title" name="people_video_<?php echo $i; ?>_title"
        value="<?php echo esc_attr($video_title); ?>" style="width: 100%; margin-bottom: 10px;" />

    <label for="people_video_<?php echo $i; ?>_description">Video <?php echo $i; ?> Description:</label>
    <input type="text" id="people_video_<?php echo $i; ?>_description" name="people_video_<?php echo $i; ?>_description"
        value="<?php echo esc_attr($video_description); ?>" style="width: 100%; margin-bottom: 10px;" />

    <label for="people_video_<?php echo $i; ?>_link">Video <?php echo $i; ?> YouTube Link:</label>
    <input type="url" id="people_video_<?php echo $i; ?>_link" name="people_video_<?php echo $i; ?>_link"
        value="<?php echo esc_url($video_link); ?>" style="width: 100%;" />
</div>
<?php
    }

    // Social Media Links
    $linkedin = get_post_meta($post->ID, '_people_linkedin', true);
    $twitter = get_post_meta($post->ID, '_people_twitter', true);
    $instagram = get_post_meta($post->ID, '_people_instagram', true);
    ?>
<div style="margin-top: 20px;">
    <h3>Social Media Links</h3>
    <label for="people_linkedin">LinkedIn:</label>
    <input type="url" id="people_linkedin" name="people_linkedin" value="<?php echo esc_url($linkedin); ?>"
        style="width: 100%; margin-bottom: 10px;" />

    <label for="people_twitter">Twitter:</label>
    <input type="url" id="people_twitter" name="people_twitter" value="<?php echo esc_url($twitter); ?>"
        style="width: 100%; margin-bottom: 10px;" />

    <label for="people_instagram">Instagram:</label>
    <input type="url" id="people_instagram" name="people_instagram" value="<?php echo esc_url($instagram); ?>"
        style="width: 100%;" />
</div>

<?php
    // Books Section
    for ($i = 1; $i <= 5; $i++) {
        $book_image = get_post_meta($post->ID, "_people_book_{$i}_image", true);
        $book_title = get_post_meta($post->ID, "_people_book_{$i}_title", true);
        $book_link = get_post_meta($post->ID, "_people_book_{$i}_link", true);
        ?>
<div style="margin-top: 20px; border: 1px solid #ddd; padding: 10px;">
    <h3>Book <?php echo $i; ?></h3>
    <label for="people_book_<?php echo $i; ?>_image">Book Image:</label>
    <div style="margin-bottom: 10px;">
        <img id="people_book_<?php echo $i; ?>_image_preview" src="<?php echo esc_url($book_image); ?>" alt=""
            style="max-width: 100%; height: auto; display: <?php echo $book_image ? 'block' : 'none'; ?>;" />
        <input type="hidden" id="people_book_<?php echo $i; ?>_image" name="people_book_<?php echo $i; ?>_image"
            value="<?php echo esc_url($book_image); ?>" />
        <button type="button" class="button select-image-button"
            data-target="people_book_<?php echo $i; ?>_image">Select Image</button>
        <button type="button" class="button remove-image-button" data-target="people_book_<?php echo $i; ?>_image"
            style="display: <?php echo $book_image ? 'inline-block' : 'none'; ?>;">Remove Image</button>
    </div>

    <label for="people_book_<?php echo $i; ?>_title">Book Title:</label>
    <input type="text" id="people_book_<?php echo $i; ?>_title" name="people_book_<?php echo $i; ?>_title"
        value="<?php echo esc_attr($book_title); ?>" style="width: 100%; margin-bottom: 10px;" />

    <label for="people_book_<?php echo $i; ?>_link">Book Link:</label>
    <input type="url" id="people_book_<?php echo $i; ?>_link" name="people_book_<?php echo $i; ?>_link"
        value="<?php echo esc_url($book_link); ?>" style="width: 100%;" />
</div>
<?php
    }
}

// Render the "Quotes" metabox
function render_people_quotes_metabox($post) {
    wp_nonce_field('save_people_quotes', 'people_quotes_nonce');

    // Loop through 3 quotes
    for ($i = 1; $i <= 3; $i++) {
        $quote_title = get_post_meta($post->ID, "_people_quote_{$i}_title", true);
        $quote_text = get_post_meta($post->ID, "_people_quote_{$i}_text", true);
        ?>
<div style="margin-bottom: 20px; border: 1px solid #ddd; padding: 10px;">
    <h3>Quote <?php echo $i; ?></h3>
    <label for="people_quote_<?php echo $i; ?>_title">Title:</label>
    <input type="text" id="people_quote_<?php echo $i; ?>_title" name="people_quote_<?php echo $i; ?>_title"
        value="<?php echo esc_attr($quote_title); ?>" style="width: 100%; margin-bottom: 10px;" />

    <label for="people_quote_<?php echo $i; ?>_text">Quote:</label>
    <textarea id="people_quote_<?php echo $i; ?>_text" name="people_quote_<?php echo $i; ?>_text" rows="4"
        style="width: 100%;"><?php echo esc_textarea($quote_text); ?></textarea>
</div>
<?php
    }
}

// Render the "Specialising In and Interested In" metabox
function render_people_specialising_interested_metabox($post) {
    wp_nonce_field('save_people_specialising_interested', 'people_specialising_interested_nonce');

    // Specialising In Fields
    echo '<h3>Specialising In</h3>';
    for ($i = 1; $i <= 6; $i++) {
        $specialising_in = get_post_meta($post->ID, "_specialising_in_{$i}", true);
        ?>
<div style="margin-bottom: 10px;">
    <label for="specialising_in_<?php echo $i; ?>">Specialising In <?php echo $i; ?>:</label>
    <input type="text" id="specialising_in_<?php echo $i; ?>" name="specialising_in_<?php echo $i; ?>"
        value="<?php echo esc_attr($specialising_in); ?>" style="width: 100%;" />
</div>
<?php
    }

    // Interested In Fields
    echo '<h3>Interested In</h3>';
    for ($i = 1; $i <= 3; $i++) {
        $interested_in = get_post_meta($post->ID, "_interested_in_{$i}", true);
        ?>
<div style="margin-bottom: 10px;">
    <label for="interested_in_<?php echo $i; ?>">Interested In <?php echo $i; ?>:</label>
    <input type="text" id="interested_in_<?php echo $i; ?>" name="interested_in_<?php echo $i; ?>"
        value="<?php echo esc_attr($interested_in); ?>" style="width: 100%;" />
</div>
<?php
    }
}

// Save the "YouTube Videos", Social Media Links, Books, "Quotes", and "Specialising In and Interested In" field values
function save_people_metaboxes($post_id) {
    // Verify the nonce for "YouTube Videos, Social Media Links, and Books"
    if (isset($_POST['people_videos_nonce']) && wp_verify_nonce($_POST['people_videos_nonce'], 'save_people_videos')) {
        for ($i = 1; $i <= 4; $i++) {
            if (isset($_POST["people_video_{$i}_title"])) {
                update_post_meta($post_id, "_people_video_{$i}_title", sanitize_text_field($_POST["people_video_{$i}_title"]));
            }
            if (isset($_POST["people_video_{$i}_description"])) {
                update_post_meta($post_id, "_people_video_{$i}_description", sanitize_textarea_field($_POST["people_video_{$i}_description"]));
            }
            if (isset($_POST["people_video_{$i}_link"])) {
                update_post_meta($post_id, "_people_video_{$i}_link", esc_url_raw($_POST["people_video_{$i}_link"]));
            }
        }

        // Save Social Media Links
        if (isset($_POST['people_linkedin'])) {
            update_post_meta($post_id, '_people_linkedin', esc_url_raw($_POST['people_linkedin']));
        }
        if (isset($_POST['people_twitter'])) {
            update_post_meta($post_id, '_people_twitter', esc_url_raw($_POST['people_twitter']));
        }
        if (isset($_POST['people_instagram'])) {
            update_post_meta($post_id, '_people_instagram', esc_url_raw($_POST['people_instagram']));
        }

        // Save Books
        for ($i = 1; $i <= 5; $i++) {
            if (isset($_POST["people_book_{$i}_image"])) {
                update_post_meta($post_id, "_people_book_{$i}_image", esc_url_raw($_POST["people_book_{$i}_image"]));
            }
            if (isset($_POST["people_book_{$i}_title"])) {
                update_post_meta($post_id, "_people_book_{$i}_title", sanitize_text_field($_POST["people_book_{$i}_title"]));
            }
            if (isset($_POST["people_book_{$i}_link"])) {
                update_post_meta($post_id, "_people_book_{$i}_link", esc_url_raw($_POST["people_book_{$i}_link"]));
            }
        }
    }

    // Verify the nonce for "Quotes"
    if (isset($_POST['people_quotes_nonce']) && wp_verify_nonce($_POST['people_quotes_nonce'], 'save_people_quotes')) {
        for ($i = 1; $i <= 3; $i++) {
            if (isset($_POST["people_quote_{$i}_title"])) {
                update_post_meta($post_id, "_people_quote_{$i}_title", sanitize_text_field($_POST["people_quote_{$i}_title"]));
            }
            if (isset($_POST["people_quote_{$i}_text"])) {
                update_post_meta($post_id, "_people_quote_{$i}_text", sanitize_textarea_field($_POST["people_quote_{$i}_text"]));
            }
        }
    }

    // Verify the nonce for "Specialising In and Interested In"
    if (isset($_POST['people_specialising_interested_nonce']) && wp_verify_nonce($_POST['people_specialising_interested_nonce'], 'save_people_specialising_interested')) {
        // Save Specialising In Fields
        for ($i = 1; $i <= 6; $i++) {
            if (isset($_POST["specialising_in_{$i}"])) {
                update_post_meta($post_id, "_specialising_in_{$i}", sanitize_text_field($_POST["specialising_in_{$i}"]));
            }
        }

        // Save Interested In Fields
        for ($i = 1; $i <= 3; $i++) {
            if (isset($_POST["interested_in_{$i}"])) {
                update_post_meta($post_id, "_interested_in_{$i}", sanitize_text_field($_POST["interested_in_{$i}"]));
            }
        }
    }
}
add_action('save_post', 'save_people_metaboxes');

function enqueue_admin_scripts($hook) {
    if ('post.php' === $hook || 'post-new.php' === $hook) {
        wp_enqueue_media(); // Enqueue the WordPress Media Uploader
        wp_enqueue_script('custom-admin-scripts', get_template_directory_uri() . '/js/custom.js', ['jquery'], null, true);
    }
}
add_action('admin_enqueue_scripts', 'enqueue_admin_scripts');