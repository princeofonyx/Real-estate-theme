<?php
function real_estate_theme_setup() {
    // Add theme support
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));

    // Register menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'real-estate-theme'),
    ));
}
add_action('after_setup_theme', 'real_estate_theme_setup');

// Enqueue scripts and styles
function real_estate_theme_enqueue_assets() {
    wp_enqueue_style('real-estate-theme-style', get_stylesheet_uri());
    wp_enqueue_script('real-estate-theme-scripts', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'real_estate_theme_enqueue_assets');

// Register Custom Post Type for Properties
function create_property_post_type() {
    $labels = array(
        'name' => __('Properties', 'real-estate-theme'),
        'singular_name' => __('Property', 'real-estate-theme'),
        'add_new_item' => __('Add New Property', 'real-estate-theme'),
        'edit_item' => __('Edit Property', 'real-estate-theme'),
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'has_archive' => true,
        'rewrite' => array('slug' => 'properties'),
    );
    register_post_type('property', $args);
}
add_action('init', 'create_property_post_type');

// Register Taxonomy for Property Types
function create_property_taxonomy() {
    $labels = array(
        'name' => _x('Property Types', 'taxonomy general name', 'real-estate-theme'),
        'singular_name' => _x('Property Type', 'taxonomy singular name', 'real-estate-theme'),
    );

    $args = array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'property-type'),
    );
    register_taxonomy('property_type', array('property'), $args);
}
add_action('init', 'create_property_taxonomy');
