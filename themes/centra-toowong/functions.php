<?php
///	Requires WWD-Developer plugin
wwd_add_custom_post('layout', 'Layout', 'Layouts', 'dashicons-editor-table');
wwd_add_custom_post('apartment', 'Apartment', 'Apartments', 'dashicons-editor-table');
wwd_add_custom_post('floorplan', 'Floor Plan', 'Floor Plans', 'dashicons-editor-table');
wwd_add_custom_post('floorplanapartment', 'Floor Plan Apartment', 'Floor Plan Apartments', 'dashicons-editor-table');
// wwd_add_custom_post('carousel', 'Carousel', 'Carousels', 'dashicons-editor-table');
// add_action( 'init', 'wwd_custom_floorplan_type', 0 );
// add_action( 'init', 'wwd_custom_floorplan_apartment_type', 0 );
// add_action( 'init', 'wwd_custom_apartment_type', 0 );
// add_action( 'init', 'wwd_custom_layout_type', 0 );
// add_filter('post_gallery','wwd_gallery', 10, 2);

add_theme_support( 'post-thumbnails' );
add_post_type_support( 'layout', 'thumbnail' );
add_theme_support( 'yamm' );
add_theme_support( 'automatic-feed-links' );
add_image_size( 'medium_large', 600, 600 );

function register_my_menus() {
  register_nav_menus(
        array(
            'main-menu' => __( 'Main Menu', 'blankslate' )
        )
  );
}
add_action( 'init', 'register_my_menus' );

add_action( 'init', 'add_taxonomies_to_pages' );
function add_taxonomies_to_pages() {
    register_taxonomy_for_object_type( 'post_tag', 'page' );
    register_taxonomy_for_object_type( 'category', 'page' );
    add_post_type_support( 'page', 'excerpt' );

}

function wwd_load_scripts() {
    wp_deregister_script('jquery');
    wp_register_script('jquery', get_template_directory_uri() . '/js/jquery-2.2.4.min.js', false, '2.2.4', true);
    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '3.3.6', true);
}
add_action('wp_enqueue_scripts', 'wwd_load_scripts');

add_filter( 'the_title', 'blankslate_title' );
function blankslate_title( $title ) {
    if ( $title == '' ) {
        return '&rarr;';
    } else {
        return $title;
    }
}
