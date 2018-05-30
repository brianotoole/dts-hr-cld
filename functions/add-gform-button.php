<?php

// Filter to change Gravity Forms Plugin button type
add_filter( 'gform_submit_button', 'form_submit_button', 10, 2 );
function form_submit_button( $button, $form ) {
    return "<button class='btn btn--primary {$form['id']}'>Get Started</button>";
}

?>