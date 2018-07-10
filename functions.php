<?php

// little function to include partials for functions
function include_function($filename) {
  return require_once( dirname( __FILE__ ) . '/functions/' . $filename . '.php' );
}

include_function('add-theme-support');

include_function('add-styles');

include_function('add-custom-jquery');

include_function('add-scripts');

include_function('add-custom-post-types');

include_function('add-svg-upload-support');

include_function('add-gform-overrides');

include_function('remove-head-junk');

include_function('remove-autoformatting');

include_function('remove-wpversion-nag');

include_function('resources-ajax');

//remove default post type from admin
add_action('admin_menu','remove_default_post_type');
function remove_default_post_type() {
	remove_menu_page('edit.php');
}

add_image_size('hero-small', 500);
add_image_size('hero-medium', 768);
add_image_size('hero-large', 1300);