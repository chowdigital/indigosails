<?php
function register_custom_post_types() {
    // Common config
    $supports = ['title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'];
    $public_args = [
        'public'       => true,
        'has_archive' => false,
        'show_in_rest' => true,
        'supports'     => $supports,
    ];

    // Yachts
    register_post_type('yacht', array_merge($public_args, [
        'labels'    => [
            'name' => 'Yachts', 'singular_name' => 'Yacht', 'menu_name' => 'Yachts',
            'add_new' => 'Add New Yacht', 'add_new_item' => 'Add New Yacht',
            'edit_item' => 'Edit Yacht', 'new_item' => 'New Yacht', 'view_item' => 'View Yacht',
            'all_items' => 'All Yachts', 'search_items' => 'Search Yachts',
            'not_found' => 'No yachts found', 'not_found_in_trash' => 'No yachts found in Trash'
        ],
        'rewrite'   => ['slug' => 'yachts'],
        'menu_icon' => 'dashicons-palmtree',
        'taxonomies' => ['yacht_category', 'yacht_tag'],
    ]));

    // Packages
    register_post_type('package', array_merge($public_args, [
        'labels'    => [
            'name' => 'Packages', 'singular_name' => 'Package', 'menu_name' => 'Packages',
            'add_new' => 'Add New Package', 'add_new_item' => 'Add New Package',
            'edit_item' => 'Edit Package', 'new_item' => 'New Package', 'view_item' => 'View Package',
            'all_items' => 'All Packages', 'search_items' => 'Search Packages',
            'not_found' => 'No packages found', 'not_found_in_trash' => 'No packages found in Trash'
        ],
        'rewrite'   => ['slug' => 'packages'],
        'menu_icon' => 'dashicons-portfolio',
        'taxonomies' => ['package_category', 'package_tag'],
    ]));

    // Locations
    register_post_type('location', array_merge($public_args, [
        'labels'    => [
            'name' => 'Locations', 'singular_name' => 'Location', 'menu_name' => 'Locations',
            'add_new' => 'Add New Location', 'add_new_item' => 'Add New Location',
            'edit_item' => 'Edit Location', 'new_item' => 'New Location', 'view_item' => 'View Location',
            'all_items' => 'All Locations', 'search_items' => 'Search Locations',
            'not_found' => 'No locations found', 'not_found_in_trash' => 'No locations found in Trash'
        ],
        'rewrite'   => ['slug' => 'locations'],
        'menu_icon' => 'dashicons-location-alt',
        'taxonomies' => ['location_category', 'location_tag'],
    ]));

    // People
    register_post_type('person', array_merge($public_args, [
        'labels'    => [
            'name' => 'People',
            'singular_name' => 'Person',
            'menu_name' => 'People',
            'add_new' => 'Add New Person',
            'add_new_item' => 'Add New Person',
            'edit_item' => 'Edit Person',
            'new_item' => 'New Person',
            'view_item' => 'View Person',
            'all_items' => 'All People',
            'search_items' => 'Search People',
            'not_found' => 'No people found',
            'not_found_in_trash' => 'No people found in Trash'
        ],
        'rewrite'   => ['slug' => 'people'],
        'menu_icon' => 'dashicons-groups', // better fit for a team
        'taxonomies' => ['team_category', 'team_tag'],
    ]));
}
add_action('init', 'register_custom_post_types');


function register_custom_taxonomies() {
    $custom_taxonomies = [
        'yacht' => ['yacht_category', 'yacht_tag'],
        'package' => ['package_category', 'package_tag'],
        'location' => ['location_category', 'location_tag'],
        'person' => ['team_category', 'team_tag'],
    ];

    foreach ($custom_taxonomies as $post_type => $taxonomies) {
        // Categories (hierarchical)
        register_taxonomy($taxonomies[0], $post_type, [
            'labels' => ['name' => ucfirst($post_type) . ' Categories'],
            'hierarchical' => true,
            'show_in_rest' => true,
            'public' => true,
            'rewrite' => ['slug' => $post_type . '-category']
        ]);

        // Tags (non-hierarchical)
        register_taxonomy($taxonomies[1], $post_type, [
            'labels' => ['name' => ucfirst($post_type) . ' Tags'],
            'hierarchical' => false,
            'show_in_rest' => true,
            'public' => true,
            'rewrite' => ['slug' => $post_type . '-tag']
        ]);
    }
}
add_action('init', 'register_custom_taxonomies');