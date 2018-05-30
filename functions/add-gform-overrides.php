<?php

// Gravity Forms Plugin Overrides

add_filter( 'gform_ajax_spinner_url', 'spinner_url', 10, 2 );
function spinner_url( $image_src, $form ) {
    return get_template_directory_uri() . '/dist/img/loading.svg';
}