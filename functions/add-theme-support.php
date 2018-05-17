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
     'mobile'  => esc_html__( 'Mobile', 'spx')
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
  * Removes li elements from menu, with ability to define classes
  */
class Description_Walker extends Walker_Nav_Menu
{
    function start_el(&$output, $item, $depth, $args)
    {
        $classes = empty($item->classes) ? array () : (array) $item->classes;
        $class_names = join(' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
        !empty ( $class_names ) and $class_names = ' class="btn btn--small btn--outline"';
        $output .= "";
        $attributes  = '';
        !empty( $item->attr_title ) and $attributes .= ' title="'  . esc_attr( $item->attr_title ) .'"';
        !empty( $item->target ) and $attributes .= ' target="' . esc_attr( $item->target     ) .'"';
        !empty( $item->xfn ) and $attributes .= ' rel="'    . esc_attr( $item->xfn        ) .'"';
        !empty( $item->url ) and $attributes .= ' href="'   . esc_attr( $item->url        ) .'"';
        $title = apply_filters( 'the_title', $item->title, $item->ID );
        $item_output = $args->before
        . "<a $attributes $class_names>"
        . $args->link_before
        . $title
        . '</a>'
        . $args->link_after
        . $args->after;
        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }
}


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


?>
