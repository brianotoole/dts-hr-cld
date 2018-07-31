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



// Register Custom Post Type Solution
// Post Type Key: solution
function create_solution_cpt() {

	$labels = array(
		'name' => __( 'Solutions', 'Post Type General Name', 'spx' ),
		'singular_name' => __( 'Solution', 'Post Type Singular Name', 'spx' ),
		'menu_name' => __( 'Solutions', 'spx' ),
		'name_admin_bar' => __( 'Solution', 'spx' ),
		'archives' => __( 'Solution Archives', 'spx' ),
		'attributes' => __( 'Solution Attributes', 'spx' ),
		'parent_item_colon' => __( 'Parent Solution:', 'spx' ),
		'all_items' => __( 'All Solutions', 'spx' ),
		'add_new_item' => __( 'Add New Solution', 'spx' ),
		'add_new' => __( 'Add New', 'spx' ),
		'new_item' => __( 'New Solution', 'spx' ),
		'edit_item' => __( 'Edit Solution', 'spx' ),
		'update_item' => __( 'Update Solution', 'spx' ),
		'view_item' => __( 'View Solution', 'spx' ),
		'view_items' => __( 'View Solutions', 'spx' ),
		'search_items' => __( 'Search Solution', 'spx' ),
		'not_found' => __( 'Not found', 'spx' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'spx' ),
		'featured_image' => __( 'Featured Image', 'spx' ),
		'set_featured_image' => __( 'Set featured image', 'spx' ),
		'remove_featured_image' => __( 'Remove featured image', 'spx' ),
		'use_featured_image' => __( 'Use as featured image', 'spx' ),
		'insert_into_item' => __( 'Insert into Solution', 'spx' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Solution', 'spx' ),
		'items_list' => __( 'Solutions list', 'spx' ),
		'items_list_navigation' => __( 'Solutions list navigation', 'spx' ),
		'filter_items_list' => __( 'Filter Solutions list', 'spx' ),
	);
	$args = array(
		'label' => __( 'Solution', 'spx' ),
		'description' => __( 'Solutions', 'spx' ),
		'labels' => $labels,
		'menu_icon' => 'dashicons-list-view',
		'supports' => array('title', 'thumbnail', 'editor' ),
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
		'rewrite' => array('slug' => 'solutions'),
	);
	register_post_type( 'solution', $args );

}
add_action( 'init', 'create_solution_cpt', 1 );



// Register Custom Post Type resource
// Post Type Key: resource
function create_resource_cpt() {

	$labels = array(
		'name' => __( 'Resources', 'Post Type General Name', 'spx' ),
		'singular_name' => __( 'Resource', 'Post Type Singular Name', 'spx' ),
		'menu_name' => __( 'Resources', 'spx' ),
		'name_admin_bar' => __( 'Resource', 'spx' ),
		'archives' => __( 'resource Archives', 'spx' ),
		'attributes' => __( 'resource Attributes', 'spx' ),
		'parent_item_colon' => __( 'Parent resource:', 'spx' ),
		'all_items' => __( 'All resources', 'spx' ),
		'add_new_item' => __( 'Add New resource', 'spx' ),
		'add_new' => __( 'Add New', 'spx' ),
		'new_item' => __( 'New resource', 'spx' ),
		'edit_item' => __( 'Edit resource', 'spx' ),
		'update_item' => __( 'Update resource', 'spx' ),
		'view_item' => __( 'View resource', 'spx' ),
		'view_items' => __( 'View resources', 'spx' ),
		'search_items' => __( 'Search resource', 'spx' ),
		'not_found' => __( 'Not found', 'spx' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'spx' ),
		'featured_image' => __( 'Featured Image', 'spx' ),
		'set_featured_image' => __( 'Set featured image', 'spx' ),
		'remove_featured_image' => __( 'Remove featured image', 'spx' ),
		'use_featured_image' => __( 'Use as featured image', 'spx' ),
		'insert_into_item' => __( 'Insert into resource', 'spx' ),
		'uploaded_to_this_item' => __( 'Uploaded to this resource', 'spx' ),
		'items_list' => __( 'resources list', 'spx' ),
		'items_list_navigation' => __( 'resources list navigation', 'spx' ),
		'filter_items_list' => __( 'Filter resources list', 'spx' ),
	);
	$args = array(
		'label' => __( 'Resource', 'spx' ),
		'description' => __( 'Resources for the site', 'spx' ),
		'labels' => $labels,
		'menu_icon' => 'dashicons-book',
		'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'author','category' ),
		'taxonomies' => array('topic', 'type' ),
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
	register_post_type( 'resource', $args );

}
add_action( 'init', 'create_resource_cpt', 2 );

// Register Taxonomy Topic
// Taxonomy Key: topic
function create_topic_tax() {

	$labels = array(
		'name'              => _x( 'Topics', 'taxonomy general name', 'spx' ),
		'singular_name'     => _x( 'Topic', 'taxonomy singular name', 'spx' ),
		'search_items'      => __( 'Search Topics', 'spx' ),
		'all_items'         => __( 'All Topics', 'spx' ),
		'parent_item'       => __( 'Parent Topic', 'spx' ),
		'parent_item_colon' => __( 'Parent Topic:', 'spx' ),
		'edit_item'         => __( 'Edit Topic', 'spx' ),
		'update_item'       => __( 'Update Topic', 'spx' ),
		'add_new_item'      => __( 'Add New Topic', 'spx' ),
		'new_item_name'     => __( 'New Topic Name', 'spx' ),
		'menu_name'         => __( 'Topic', 'spx' ),
	);
	$args = array(
		'labels' => $labels,
		'description' => __( 'Topic taxonomy for "Resource" Post Type', 'spx' ),
		'hierarchical' => true,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'show_in_nav_menus' => true,
		'show_in_rest' => false,
		'show_tagcloud' => true,
		'show_in_quick_edit' => true,
		'show_admin_column' => false,
	);
	register_taxonomy( 'topic', array('resource', ), $args );

}
add_action( 'init', 'create_topic_tax' );

// Register Taxonomy Type
// Taxonomy Key: type
function create_type_tax() {

	$labels = array(
		'name'              => _x( 'Types', 'taxonomy general name', 'spx' ),
		'singular_name'     => _x( 'Type', 'taxonomy singular name', 'spx' ),
		'search_items'      => __( 'Search Types', 'spx' ),
		'all_items'         => __( 'All Types', 'spx' ),
		'parent_item'       => __( 'Parent Type', 'spx' ),
		'parent_item_colon' => __( 'Parent Type:', 'spx' ),
		'edit_item'         => __( 'Edit Type', 'spx' ),
		'update_item'       => __( 'Update Type', 'spx' ),
		'add_new_item'      => __( 'Add New Type', 'spx' ),
		'new_item_name'     => __( 'New Type Name', 'spx' ),
		'menu_name'         => __( 'Type', 'spx' ),
	);
	$args = array(
		'labels' => $labels,
		'description' => __( 'Type taxonomy for "Resource" Post Type', 'spx' ),
		'hierarchical' => true,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'show_in_nav_menus' => true,
		'show_in_rest' => false,
		'show_tagcloud' => true,
		'show_in_quick_edit' => true,
		'show_admin_column' => false,
	);
	register_taxonomy( 'type', array('resource', ), $args );

}
add_action( 'init', 'create_type_tax' );



// Register Custom Post Type Service
// Post Type Key: service
function create_service_cpt() {

	$labels = array(
		'name' => __( 'Services', 'Post Type General Name', 'spx' ),
		'singular_name' => __( 'Service', 'Post Type Singular Name', 'spx' ),
		'menu_name' => __( 'Services', 'spx' ),
		'name_admin_bar' => __( 'Service', 'spx' ),
		'archives' => __( 'Service Archives', 'spx' ),
		'attributes' => __( 'Service Attributes', 'spx' ),
		'parent_item_colon' => __( 'Parent Service:', 'spx' ),
		'all_items' => __( 'All Services', 'spx' ),
		'add_new_item' => __( 'Add New Service', 'spx' ),
		'add_new' => __( 'Add New', 'spx' ),
		'new_item' => __( 'New Service', 'spx' ),
		'edit_item' => __( 'Edit Service', 'spx' ),
		'update_item' => __( 'Update Service', 'spx' ),
		'view_item' => __( 'View Service', 'spx' ),
		'view_items' => __( 'View Services', 'spx' ),
		'search_items' => __( 'Search Service', 'spx' ),
		'not_found' => __( 'Not found', 'spx' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'spx' ),
		'featured_image' => __( 'Featured Image', 'spx' ),
		'set_featured_image' => __( 'Set featured image', 'spx' ),
		'remove_featured_image' => __( 'Remove featured image', 'spx' ),
		'use_featured_image' => __( 'Use as featured image', 'spx' ),
		'insert_into_item' => __( 'Insert into Service', 'spx' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Service', 'spx' ),
		'items_list' => __( 'Services list', 'spx' ),
		'items_list_navigation' => __( 'Services list navigation', 'spx' ),
		'filter_items_list' => __( 'Filter Services list', 'spx' ),
	);
	$args = array(
		'label' => __( 'Service', 'spx' ),
		'description' => __( '', 'spx' ),
		'labels' => $labels,
		'menu_icon' => 'dashicons-portfolio',
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
	register_post_type( 'service', $args );

}
add_action( 'init', 'create_service_cpt', 0 );



// Register Custom Post Type Team
// Post Type Key: team
function create_team_cpt() {

	$labels = array(
		'name' => __( 'Team', 'Post Type General Name', 'spx' ),
		'singular_name' => __( 'Team', 'Post Type Singular Name', 'spx' ),
		'menu_name' => __( 'Team', 'spx' ),
		'name_admin_bar' => __( 'Team', 'spx' ),
		'archives' => __( 'Team Archives', 'spx' ),
		'attributes' => __( 'Team Attributes', 'spx' ),
		'parent_item_colon' => __( 'Parent Team:', 'spx' ),
		'all_items' => __( 'All Team', 'spx' ),
		'add_new_item' => __( 'Add New Team', 'spx' ),
		'add_new' => __( 'Add New', 'spx' ),
		'new_item' => __( 'New Team', 'spx' ),
		'edit_item' => __( 'Edit Team', 'spx' ),
		'update_item' => __( 'Update Team', 'spx' ),
		'view_item' => __( 'View Team', 'spx' ),
		'view_items' => __( 'View Team', 'spx' ),
		'search_items' => __( 'Search Team', 'spx' ),
		'not_found' => __( 'Not found', 'spx' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'spx' ),
		'featured_image' => __( 'Featured Image', 'spx' ),
		'set_featured_image' => __( 'Set featured image', 'spx' ),
		'remove_featured_image' => __( 'Remove featured image', 'spx' ),
		'use_featured_image' => __( 'Use as featured image', 'spx' ),
		'insert_into_item' => __( 'Insert into Team', 'spx' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Team', 'spx' ),
		'items_list' => __( 'Team list', 'spx' ),
		'items_list_navigation' => __( 'Team list navigation', 'spx' ),
		'filter_items_list' => __( 'Filter Team list', 'spx' ),
	);
	$args = array(
		'label' => __( 'Team', 'spx' ),
		'description' => __( '', 'spx' ),
		'labels' => $labels,
		'menu_icon' => 'dashicons-admin-users',
		'supports' => array('title', 'editor', 'revisions', ),
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
	register_post_type( 'team', $args );

}
add_action( 'init', 'create_team_cpt', 0 );



?>
