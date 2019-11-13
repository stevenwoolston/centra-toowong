<?php
/* Custom Post Type ===> apartment */
add_action( 'init', 'register_apartment_type' );
function register_apartment_type() {
$labels = array(
    'name' => _x( 'Apartment', 'apartment' ),
    'singular_name' => _x( 'Apartment', 'apartment' ),
    'add_new' => _x( 'Add New', 'apartment' ),
    'add_new_item' => _x( 'Add New Apartment', 'apartment' ),
    'edit_item' => _x( 'Edit Apartment', 'apartment' ),
    'new_item' => _x( 'New Apartment', 'apartment' ),
    'view_item' => _x( 'View Apartment', 'apartment' ),
    'search_items' => _x( 'Search Apartment', 'apartment' ),
    'not_found' => _x( 'No Apartment found', 'apartment' ),
    'not_found_in_trash' => _x( 'No Apartment found in Trash', 'apartment' ),
    'menu_name' => _x( 'Apartments', 'apartment' ),
);
$args = array(
    'labels' => $labels,
    'hierarchical' => false,
    'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'custom-fields', 'revisions', 'page-attributes' ),
    //'taxonomies' => array('post_tag'),
    'public' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'menu_icon' => 'dashicons-admin-users',
    'show_in_nav_menus' => true,
    'publicly_queryable' => true,
    'exclude_from_search' => false,
    'has_archive' => true,
    'query_var' => true,
    'can_export' => true,
    'rewrite' => array('slug' => 'apartment'),
    'capability_type' => 'post'
);
register_post_type( 'apartment', $args );
}
?>