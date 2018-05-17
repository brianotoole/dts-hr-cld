<?php
// Register Custom Post Type: Testimonial
// Post Type Key: testimonial
function create_testimonial_cpt() {

	$labels = array(
		'name' => __( 'Testimonials', 'Post Type General Name', 'spx' ),
		'singular_name' => __( 'Testimonial', 'Post Type Singular Name', 'spx' ),
		'menu_name' => __( 'Testimonials', 'spx' ),
		'name_admin_bar' => __( 'Testimonial', 'spx' ),
		'archives' => __( 'Testimonial Archives', 'spx' ),
		'attributes' => __( 'Testimonial Attributes', 'spx' ),
		'parent_item_colon' => __( 'Parent Testimonial:', 'spx' ),
		'all_items' => __( 'All Testimonials', 'spx' ),
		'add_new_item' => __( 'Add New Testimonial', 'spx' ),
		'add_new' => __( 'Add New', 'spx' ),
		'new_item' => __( 'New Testimonial', 'spx' ),
		'edit_item' => __( 'Edit Testimonial', 'spx' ),
		'update_item' => __( 'Update Testimonial', 'spx' ),
		'view_item' => __( 'View Testimonial', 'spx' ),
		'view_items' => __( 'View Testimonials', 'spx' ),
		'search_items' => __( 'Search Testimonial', 'spx' ),
		'not_found' => __( 'Not found', 'spx' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'spx' ),
		'featured_image' => __( 'Featured Image', 'spx' ),
		'set_featured_image' => __( 'Set featured image', 'spx' ),
		'remove_featured_image' => __( 'Remove featured image', 'spx' ),
		'use_featured_image' => __( 'Use as featured image', 'spx' ),
		'insert_into_item' => __( 'Insert into Testimonial', 'spx' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Testimonial', 'spx' ),
		'items_list' => __( 'Testimonials list', 'spx' ),
		'items_list_navigation' => __( 'Testimonials list navigation', 'spx' ),
		'filter_items_list' => __( 'Filter Testimonials list', 'spx' ),
	);
	$args = array(
		'label' => __( 'Testimonial', 'spx' ),
		'description' => __( 'Site testimonials', 'spx' ),
		'labels' => $labels,
		'menu_icon' => 'dashicons-star-filled',
		'supports' => array('title', 'editor', ),
		'taxonomies' => array(),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'can_export' => true,
		'has_archive' => true,
		'hierarchical' => false,
		'exclude_from_search' => false,
		'show_in_rest' => true,
		'publicly_queryable' => true,
		'capability_type' => 'post',
	);
	register_post_type( 'testimonial', $args );

}
add_action( 'init', 'create_testimonial_cpt', 0 );



?>
