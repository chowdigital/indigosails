<?php 
function rename_post_type_to_services() {
    global $wp_post_types;

    // Check if the 'post' post type exists
    if (isset($wp_post_types['post'])) {
        $wp_post_types['post']->labels = (object) array_merge((array) $wp_post_types['post']->labels, [
            'name'                  => 'Services',
            'singular_name'         => 'Service',
            'add_new'               => 'Add New Service',
            'add_new_item'          => 'Add New Service',
            'edit_item'             => 'Edit Service',
            'new_item'              => 'New Service',
            'view_item'             => 'View Service',
            'view_items'            => 'View Services',
            'search_items'          => 'Search Services',
            'not_found'             => 'No services found',
            'not_found_in_trash'    => 'No services found in Trash',
            'all_items'             => 'All Services',
            'archives'              => 'Service Archives',
            'attributes'            => 'Service Attributes',
            'insert_into_item'      => 'Insert into service',
            'uploaded_to_this_item' => 'Uploaded to this service',
            'featured_image'        => 'Featured image',
            'set_featured_image'    => 'Set featured image',
            'remove_featured_image' => 'Remove featured image',
            'use_featured_image'    => 'Use as featured image',
            'menu_name'             => 'Services',
            'filter_items_list'     => 'Filter services list',
            'items_list_navigation' => 'Services list navigation',
            'items_list'            => 'Services list',
        ]);
    }
}
add_action('init', 'rename_post_type_to_services');