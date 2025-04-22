<?php 


// Add homepage metaboxes only for pages using 'page-homepage.php'
add_action('add_meta_boxes', 'hp_register_homepage_metaboxes');
function hp_register_homepage_metaboxes() {
    global $post;
    if (!isset($post) || !hp_is_homepage_template($post)) return;

    add_meta_box('hp_hero_metabox', 'Hero Section', 'hp_render_hero_metabox', 'page', 'normal', 'high');
    add_meta_box('hp_value_prop_metabox', 'Value Proposition (3 Columns)', 'hp_render_value_prop_metabox', 'page', 'normal', 'high');
    add_meta_box('hp_itinerary_metabox', 'Itinerary Highlights (6 Items)', 'hp_render_itinerary_metabox', 'page', 'normal', 'high');
    add_meta_box('hp_story_metabox', 'Story Block (2 Lines)', 'hp_render_story_metabox', 'page', 'normal', 'high');
    add_meta_box('hp_coaches_metabox', 'Featured Coaches (4)', 'hp_render_coaches_metabox', 'page', 'normal', 'high');
    add_meta_box('hp_inclusions_metabox', 'Inclusions (Bulleted List)', 'hp_render_inclusions_metabox', 'page', 'normal', 'high');
    add_meta_box('hp_cta_metabox', 'Final CTA', 'hp_render_cta_metabox', 'page', 'normal', 'high');
}

function hp_is_homepage_template($post) {
    return is_object($post) && get_page_template_slug($post->ID) === 'page-homepage.php';
}

// Hero Section
function hp_render_hero_metabox($post) {
    wp_nonce_field('hp_hero_nonce', 'hp_hero_nonce_field');
    ?>
<p><label>Headline</label><br>
    <input type="text" name="hp_hero_headline"
        value="<?php echo esc_attr(get_post_meta($post->ID, '_hp_hero_headline', true)); ?>" style="width:100%;">
</p>
<p><label>Subheadline</label><br>
    <textarea name="hp_hero_subheadline" rows="2"
        style="width:100%;"><?php echo esc_textarea(get_post_meta($post->ID, '_hp_hero_subheadline', true)); ?></textarea>
</p>
<?php
}

// Value Proposition
function hp_render_value_prop_metabox($post) {
    for ($i = 1; $i <= 3; $i++) {
        ?>
<p><strong>Pillar <?php echo $i; ?>:</strong></p>
<p><label>Title</label><br>
    <input type="text" name="hp_pillar<?php echo $i; ?>_title"
        value="<?php echo esc_attr(get_post_meta($post->ID, "_hp_pillar{$i}_title", true)); ?>" style="width:100%;">
</p>
<p><label>Description</label><br>
    <textarea name="hp_pillar<?php echo $i; ?>_text" rows="2"
        style="width:100%;"><?php echo esc_textarea(get_post_meta($post->ID, "_hp_pillar{$i}_text", true)); ?></textarea>
</p>
<?php
    }
}

// Itinerary
function hp_render_itinerary_metabox($post) {
    for ($i = 1; $i <= 6; $i++) {
        ?>
<p><label>Item <?php echo $i; ?></label><br>
    <input type="text" name="hp_itin<?php echo $i; ?>"
        value="<?php echo esc_attr(get_post_meta($post->ID, "_hp_itin{$i}", true)); ?>" style="width:100%;">
</p>
<?php
    }
}

// Story Block
function hp_render_story_metabox($post) {
    ?>
<p><label>Line 1</label><br>
    <textarea name="hp_story_line1" rows="2"
        style="width:100%;"><?php echo esc_textarea(get_post_meta($post->ID, '_hp_story_line1', true)); ?></textarea>
</p>
<p><label>Line 2</label><br>
    <textarea name="hp_story_line2" rows="2"
        style="width:100%;"><?php echo esc_textarea(get_post_meta($post->ID, '_hp_story_line2', true)); ?></textarea>
</p>
<?php
}

// Coaches
function hp_render_coaches_metabox($post) {
    for ($i = 1; $i <= 4; $i++) {
        ?>
<p><strong>Coach <?php echo $i; ?>:</strong></p>
<p><label>Name</label><br>
    <input type="text" name="hp_coach<?php echo $i; ?>_name"
        value="<?php echo esc_attr(get_post_meta($post->ID, "_hp_coach{$i}_name", true)); ?>" style="width:100%;">
</p>
<p><label>Description</label><br>
    <textarea name="hp_coach<?php echo $i; ?>_desc" rows="2"
        style="width:100%;"><?php echo esc_textarea(get_post_meta($post->ID, "_hp_coach{$i}_desc", true)); ?></textarea>
</p>
<?php
    }
}

// Inclusions
function hp_render_inclusions_metabox($post) {
    $inclusions = get_post_meta($post->ID, '_hp_inclusions', true);
    ?>
<p><label>Bulleted List (one per line)</label><br>
    <textarea name="hp_inclusions" rows="6" style="width:100%;"><?php echo esc_textarea($inclusions); ?></textarea>
</p>
<?php
}

// Final CTA
function hp_render_cta_metabox($post) {
    ?>
<p><label>Headline</label><br>
    <input type="text" name="hp_cta_head"
        value="<?php echo esc_attr(get_post_meta($post->ID, '_hp_cta_head', true)); ?>" style="width:100%;">
</p>

<p><label>CTA Button Text</label><br>
    <input type="text" name="hp_cta1_text"
        value="<?php echo esc_attr(get_post_meta($post->ID, '_hp_cta1_text', true)); ?>" style="width:100%;">
</p>

<p><label>CTA Button URL</label><br>
    <input type="url" name="hp_cta1_url" value="<?php echo esc_attr(get_post_meta($post->ID, '_hp_cta1_url', true)); ?>"
        style="width:100%;">
</p>
<?php
}

// Save all fields
add_action('save_post', 'hp_save_homepage_metaboxes');
function hp_save_homepage_metaboxes($post_id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;

    // Save Hero
    if (isset($_POST['hp_hero_nonce_field']) && wp_verify_nonce($_POST['hp_hero_nonce_field'], 'hp_hero_nonce')) {
        update_post_meta($post_id, '_hp_hero_headline', sanitize_text_field($_POST['hp_hero_headline']));
        update_post_meta($post_id, '_hp_hero_subheadline', sanitize_textarea_field($_POST['hp_hero_subheadline']));
    }

    // Save Value Props
    for ($i = 1; $i <= 3; $i++) {
        if (isset($_POST["hp_pillar{$i}_title"])) {
            update_post_meta($post_id, "_hp_pillar{$i}_title", sanitize_text_field($_POST["hp_pillar{$i}_title"]));
            update_post_meta($post_id, "_hp_pillar{$i}_text", sanitize_textarea_field($_POST["hp_pillar{$i}_text"]));
        }
    }

    // Save Itinerary
    for ($i = 1; $i <= 6; $i++) {
        if (isset($_POST["hp_itin{$i}"])) {
            update_post_meta($post_id, "_hp_itin{$i}", sanitize_text_field($_POST["hp_itin{$i}"]));
        }
    }

    // Save Story Block
    if (isset($_POST['hp_story_line1'])) {
        update_post_meta($post_id, '_hp_story_line1', sanitize_textarea_field($_POST['hp_story_line1']));
        update_post_meta($post_id, '_hp_story_line2', sanitize_textarea_field($_POST['hp_story_line2']));
    }

    // Save Coaches
    for ($i = 1; $i <= 4; $i++) {
        if (isset($_POST["hp_coach{$i}_name"])) {
            update_post_meta($post_id, "_hp_coach{$i}_name", sanitize_text_field($_POST["hp_coach{$i}_name"]));
            update_post_meta($post_id, "_hp_coach{$i}_desc", sanitize_textarea_field($_POST["hp_coach{$i}_desc"]));
        }
    }

    // Save Inclusions
    if (isset($_POST['hp_inclusions'])) {
        update_post_meta($post_id, '_hp_inclusions', sanitize_textarea_field($_POST['hp_inclusions']));
    }

    // Save CTA
    if (isset($_POST['hp_cta_head'])) {
        update_post_meta($post_id, '_hp_cta_head', sanitize_text_field($_POST['hp_cta_head']));
        update_post_meta($post_id, '_hp_cta1_text', sanitize_text_field($_POST['hp_cta1_text']));
        update_post_meta($post_id, '_hp_cta1_url', esc_url_raw($_POST['hp_cta1_url']));
    }
}