<?php
function allow_editor_access_to_customizer() {
    $role = get_role('editor'); // Get the editor role
    
    if ($role) {
        // Grant access to the Customizer
        $role->add_cap('edit_theme_options');
        $role->add_cap('customize');
    }
}
add_action('init', 'allow_editor_access_to_customizer');

function restrict_editor_admin_menu() {
    if (current_user_can('editor')) {
        // Remove "Comments" menu
        remove_menu_page('edit-comments.php');

        // Remove "Tools" menu
        remove_menu_page('tools.php');

        // Restrict other theme-related pages except Customizer
        global $submenu;
        if (isset($submenu['themes.php'])) {
            foreach ($submenu['themes.php'] as $key => $menu_item) {
                if ($menu_item[2] !== 'customize.php') {
                    unset($submenu['themes.php'][$key]);
                }
            }
        }
    }
}
add_action('admin_menu', 'restrict_editor_admin_menu', 999);