<?php

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| our theme. We will simply require it into the script here so that we
| don't have to worry about manually loading any of our classes later on.
|
*/

if (! file_exists($composer = __DIR__.'/vendor/autoload.php')) {
    wp_die(__('Error locating autoloader. Please run <code>composer install</code>.', 'sage'));
}

require $composer;

/*
|--------------------------------------------------------------------------
| Register The Bootloader
|--------------------------------------------------------------------------
|
| The first thing we will do is schedule a new Acorn application container
| to boot when WordPress is finished loading the theme. The application
| serves as the "glue" for all the components of Laravel and is
| the IoC container for the system binding all of the various parts.
|
*/

try {
    \Roots\bootloader();
} catch (Throwable $e) {
    wp_die(
        __('You need to install Acorn to use this theme.', 'sage'),
        '',
        [
            'link_url' => 'https://docs.roots.io/acorn/2.x/installation/',
            'link_text' => __('Acorn Docs: Installation', 'sage'),
        ]
    );
}

/*
|--------------------------------------------------------------------------
| Register Sage Theme Files
|--------------------------------------------------------------------------
|
| Out of the box, Sage ships with categorically named theme files
| containing common functionality and setup to be bootstrapped with your
| theme. Simply add (or remove) files from the array below to change what
| is registered alongside Sage.
|
*/

collect(['setup', 'filters'])
    ->each(function ($file) {
        if (! locate_template($file = "app/{$file}.php", true, true)) {
            wp_die(
                /* translators: %s is replaced with the relative file path */
                sprintf(__('Error locating <code>%s</code> for inclusion.', 'sage'), $file)
            );
        }
    });

/*
|--------------------------------------------------------------------------
| Enable Sage Theme Support
|--------------------------------------------------------------------------
|
| Once our theme files are registered and available for use, we are almost
| ready to boot our application. But first, we need to signal to Acorn
| that we will need to initialize the necessary service providers built in
| for Sage when booting.
|
*/

add_theme_support('sage');

// Theme Options

if( function_exists('acf_add_options_page') ) {
    acf_add_options_page(array(
        'page_title'    => __('Theme Options', 'tetleyinvestment'),
        'capability'    => 'manage_options',
        'position'      => '62'
    ));
}

// Testimonial

// Register Custom Post Type testimonial
function create_testimonial_cpt() {

	$labels = array(
		'name' => _x( 'testimonial', 'Post Type General Name', 'textdomain' ),
		'singular_name' => _x( 'testimonial', 'Post Type Singular Name', 'textdomain' ),
		'menu_name' => _x( 'testimonial', 'Admin Menu text', 'textdomain' ),
		'name_admin_bar' => _x( 'testimonial', 'Add New on Toolbar', 'textdomain' ),
		'archives' => __( 'testimonial Archives', 'textdomain' ),
		'attributes' => __( 'testimonial Attributes', 'textdomain' ),
		'parent_item_colon' => __( 'Parent testimonial:', 'textdomain' ),
		'all_items' => __( 'All testimonial', 'textdomain' ),
		'add_new_item' => __( 'Add New testimonial', 'textdomain' ),
		'add_new' => __( 'Add New', 'textdomain' ),
		'new_item' => __( 'New testimonial', 'textdomain' ),
		'edit_item' => __( 'Edit testimonial', 'textdomain' ),
		'update_item' => __( 'Update testimonial', 'textdomain' ),
		'view_item' => __( 'View testimonial', 'textdomain' ),
		'view_items' => __( 'View testimonial', 'textdomain' ),
		'search_items' => __( 'Search testimonial', 'textdomain' ),
		'not_found' => __( 'Not found', 'textdomain' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'textdomain' ),
		'featured_image' => __( 'Featured Image', 'textdomain' ),
		'set_featured_image' => __( 'Set featured image', 'textdomain' ),
		'remove_featured_image' => __( 'Remove featured image', 'textdomain' ),
		'use_featured_image' => __( 'Use as featured image', 'textdomain' ),
		'insert_into_item' => __( 'Insert into testimonial', 'textdomain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this testimonial', 'textdomain' ),
		'items_list' => __( 'testimonial list', 'textdomain' ),
		'items_list_navigation' => __( 'testimonial list navigation', 'textdomain' ),
		'filter_items_list' => __( 'Filter testimonial list', 'textdomain' ),
	);
	$args = array(
		'label' => __( 'testimonial', 'textdomain' ),
		'description' => __( '', 'textdomain' ),
		'labels' => $labels,
		'menu_icon' => 'dashicons-format-chat',
		'supports' => array('title','editor', 'excerpt', 'thumbnail'),
		'taxonomies' => array(),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 8,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'can_export' => true,
		'has_archive' => true,
		'hierarchical' => true,
		'exclude_from_search' => false,
		'show_in_rest' => true,
		'publicly_queryable' => true,
		'capability_type' => 'post',
	);
	register_post_type( 'testimonial', $args );

}
add_action( 'init', 'create_testimonial_cpt', 0 );


// Register Custom Taxonomy
// function Category() {

// 	$labels = array(
// 		'name'                       => _x( 'Category', 'Category', 'text_domain' ),
// 		'singular_name'              => _x( 'category', 'Category', 'text_domain' ),
// 		'menu_name'                  => __( 'Category', 'text_domain' ),
// 		'all_items'                  => __( 'All Items', 'text_domain' ),
// 		'parent_item'                => __( 'Parent Item', 'text_domain' ),
// 		'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
// 		'new_item_name'              => __( 'New Item Name', 'text_domain' ),
// 		'add_new_item'               => __( 'Add New Item', 'text_domain' ),
// 		'edit_item'                  => __( 'Edit Item', 'text_domain' ),
// 		'update_item'                => __( 'Update Item', 'text_domain' ),
// 		'view_item'                  => __( 'View Item', 'text_domain' ),
// 		'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
// 		'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
// 		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
// 		'popular_items'              => __( 'Popular Items', 'text_domain' ),
// 		'search_items'               => __( 'Search Items', 'text_domain' ),
// 		'not_found'                  => __( 'Not Found', 'text_domain' ),
// 		'no_terms'                   => __( 'No items', 'text_domain' ),
// 		'items_list'                 => __( 'Items list', 'text_domain' ),
// 		'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
// 	);
// 	$args = array(
// 		'labels'                     => $labels,
// 		'hierarchical'               => false,
// 		'public'                     => true,
// 		'show_ui'                    => true,
// 		'show_admin_column'          => true,
// 		'show_in_nav_menus'          => true,
// 		'show_tagcloud'              => true,
// 	);
// 	register_taxonomy( 'category', array( 'testimonial' ), $args );

// }
// add_action( 'init', 'Category', 0 );


// svg
function cc_mime_types($mimes) {
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
  }
  add_filter('upload_mimes', 'cc_mime_types');
