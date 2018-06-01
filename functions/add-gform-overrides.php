<?php

/**
 * Move Gravity Forms scripts to footer and
 * delay until jQuery is loaded
 */

// Move the scripts to the footer
add_filter('gform_init_scripts_footer', '__return_true');
// Prevent scripts from firing before Google's CDN copy of jQuery is downloaded
add_filter('gform_cdata_open', 'vtl_wrap_gform_cdata_open');
function vtl_wrap_gform_cdata_open($content = '') {
    $content = 'document.addEventListener("DOMContentLoaded", function() { ';
    return $content;
}
add_filter('gform_cdata_close', 'vtl_wrap_gform_cdata_close');
function vtl_wrap_gform_cdata_close($content = '') {
    $content = ' }, false );';
    return $content;
}

/**
* Change Grvity Form spinner image (what shows on submit)
*/
add_filter( 'gform_ajax_spinner_url', 'spinner_url', 10, 2 );
function spinner_url( $image_src, $form ) {
    return get_template_directory_uri() . '/dist/img/loading.svg';
}


/**
 * Post Gravity Form data to Pardot
 */
function gform_post_to_pardot($entry, $form) {
    $post_url = 'http://go.datis.com/l/106012/2018-05-31/3mg413'; // Form handler endpoint URL
    $body = array(
        'firstname' => rgar($entry, '1'), //'firstname' == name in pardot; '1' == id of form field IN GF admin
        'email' => rgar($entry, '2'),
    );
    $request = new WP_Http();
    $response = $request->post($post_url, array('body' => $body));
}
// Add function to form (or whichever form you need)
add_action('gform_after_submission', 'gform_post_to_pardot', 10, 2);



/**
 * gform_confirmation_anchor
 *
 * Customize the confirmation anchor behavior that automatically
 * scrolls the page upon submission/validation
 *
 * https://www.gravityhelp.com/documentation/article/gform_confirmation_anchor/
 */
// Disable scroll on form
add_filter('gform_confirmation_anchor', '__return_false');
