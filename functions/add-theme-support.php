<?php
if ( ! function_exists( 'spx_setup' ) ) :
  function spx_setup() {
    // translation support
    load_theme_textdomain( 'spx', get_template_directory() . '/languages' );

    // default posts and comments RSS feed links in head.
    add_theme_support( 'automatic-feed-links' );

    // dynamic title tags
    add_theme_support( 'title-tag' );

    // featured images
    add_theme_support( 'post-thumbnails' );

    // wp_nav_menu()
    register_nav_menus( array(
     'primary' => esc_html__( 'Primary', 'spx' ),
     'secondary' => esc_html__( 'Secondary', 'spx' ),
     'mobile'  => esc_html__( 'Mobile', 'spx'),
     'footer'  => esc_html__( 'Footer', 'spx')
    ) );
   }
    // ACF - Add Options page-header
    // Usage within template file: the_field('header_title', 'option');
    if( function_exists('acf_add_options_page') ) {
      acf_add_options_page();
    }

endif;
add_action( 'after_setup_theme', 'spx_setup' );


/**
  * Define menus to call as functions 
  */

// Primary Nav
function primary_nav() {
	wp_nav_menu(
	array(
		'theme_location'  => 'primary',
    'menu_class'      => 'nav__inner',
    'container'       => 'div',
    'container_class' => 'nav-primary'
		)
	);
}

// Secondary Nav
function secondary_nav() {
	wp_nav_menu(
	array(
		'theme_location'  => 'secondary',
		//'menu'            => '',
		'container'       => '',
		'container_class' => '',
		'container_id'    => '',
		'menu_class'      => '',
		'menu_id'         => '',
		'echo'            => true,
		//'fallback_cb'     => 'wp_page_menu',
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
    'items_wrap'      => '%3$s',		
    'depth'           => 0,
		//'walker'          => new Description_Walker
		)
	);
}

// Mobile Nav
function mobile_nav() {
	wp_nav_menu(
	array(
		'theme_location' => 'mobile',
    'menu_class'     => '',
    'container'      => 'div',
    'container_class' => 'nav-mobile'
		)
	);
}


// Footer Nav
function footer_nav() {
	wp_nav_menu(
	array(
		'theme_location'  => 'footer',
    'menu_class'      => 'footer__top-menu',
    'container'       => 'div',
    'container_class' => 'nav-footer'
		)
	);
}


// allow html inside menu description
remove_filter( 'nav_menu_description', 'strip_tags' );
// Add menu description support
function prefix_nav_description( $item_output, $item, $depth, $args ) {
  if ( !empty( $item->description ) ) {
      $item_output = '<div class="menu-item-description">' . $item->description . '</div>';
  }

  return $item_output;
}
add_filter( 'walker_nav_menu_start_el', 'prefix_nav_description', 10, 4 );



?>
