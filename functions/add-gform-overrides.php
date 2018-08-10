<?php

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
    $post_url = 'https://go.datis.com/l/106012/2018-05-31/3mg413'; // Form handler endpoint URL
    $body = array(
        'firstname' => rgar($entry, '1'), //'firstname' == name in pardot; '1' == id of form field IN GF admin
        'email' => rgar($entry, '2'),
    );
    $request = new WP_Http();
    $response = $request->post($post_url, array('body' => $body));
}
// Add function to form (or whichever form you need)
add_action('gform_after_submission', 'gform_post_to_pardot', 10, 2);

 
function gf_trigger_wistia() {
    { ?>
    <script>
    // trigger a click on video
    jQuery('.wistia_embed').attr('src', '//fast.wistia.net/embed/iframe/yzhn558bcf');
    jQuery('.vid-click').trigger('click');
    </script>
    <?php }
}

add_filter('gform_after_submission', 'gf_trigger_wistia', 20, 2);



/**
 * function to validate email address
 * check against array of blacklisted domains
 */
function gf_email_validation($validation_result) {
    // Set the $validation_result object to $form
    $form = $validation_result["form"];
    // Get the value the user entered for the email field (name of input)
    $email = $_POST["input_2"];
    $email_blacklist = array("yahoo.com", "hotmail.com", "aol.com", "msn.com", "verizon.com", "comcast.com", "live.com", "gmx.com", "outlook.com", "gmail.com");
    //explode will store the string into array, e.g: example@gmail.com
    $udomain = explode('@', $email);
    //select the email domain from the above splitted array
    $email_domain = $udomain[1];
    
    if (in_array($email_domain, $email_blacklist)) {
        // set the form validation to false
        $validation_result["is_valid"] = false;
        // specify the invalid field and provide custom validation message
        $form["fields"][1]["failed_validation"] = true;
        $form["fields"][1]["validation_message"] = __('You must enter a business email address.', 'spx');
    }
    // update the form in the validation result with the form object you modified
    $validation_result["form"] = $form;
    return $validation_result;
}
add_filter('gform_validation', 'gf_email_validation');




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
