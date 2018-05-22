<?php
// add stylesheets
function spx_styles() {

  // google font
  //wp_enqueue_style( 'google-font-poppins', '//fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,700,700i' );

  // font awesome icons
  wp_enqueue_style( 'font-awesome', '//use.fontawesome.com/releases/v5.0.13/css/all.css', array(), '5.0.13' );

  // change version based on modified date
  $ver = filemtime( get_template_directory() . '/dist/css/main.css' );
  // main stylesheet
  wp_enqueue_style( 'main', get_stylesheet_directory_uri() . '/dist/css/main.css', array(), $ver );

  // slick carousel
  //wp_enqueue_style( 'slick-carousel', '//cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css', array(), '1.8.1' );

}
add_action( 'wp_enqueue_scripts', 'spx_styles' );
?>
