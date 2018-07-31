<?php
// Function to include custom post types in archive or author.php 
function author_for_resource( $query ) {
  if( is_author() && empty( $query->query_vars['suppress_filters'] ) ) {
    $query->set( 'post_type', array(
     'post', 'resource'
    ));
    return $query;
  }
}
add_filter( 'pre_get_posts', 'author_for_resource' );

// Function like "in_category" for custom taxonomies
// USAGE: if (has_type('blog')) 
function has_type( $type, $_post = null ) {
  if ( empty( $type) )
      return false;

  if ( $_post )
      $_post = get_post( $_post );
  else
      $_post =& $GLOBALS['post'];

  if ( !$_post )
      return false;

  $r = is_object_in_term( $_post->ID, 'type', $type);

  if ( is_wp_error( $r ) )
      return false;

  return $r;
}

// Convert HEX to RGBA
function ak_convert_hex2rgba($color, $opacity = false) {
  $default = 'rgb(0,0,0)';    
  
  if (empty($color))
      return $default;    

  if ($color[0] == '#')
      $color = substr($color, 1);
  
  if (strlen($color) == 6)
      $hex = array($color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5]);
  
  elseif (strlen($color) == 3)
      $hex = array($color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2]);
  
  else
      return $default;
     
  $rgb = array_map('hexdec', $hex);    

  if ($opacity) {
      if (abs($opacity) > 1)
          $opacity = 1.0;

      $output = 'rgba(' . implode(",", $rgb) . ',' . $opacity . '';
  } else {
      $output = 'rgba(' . implode(",", $rgb) . '';
  }    
  return $output;
}

// Return RGBA
function get_rgba($color) {
  //$color = '#323a45';
  $color = get_field('overlay_color');
  return ak_convert_hex2rgba($color);
}

// Get Custom Taxonomy Term Name: Type
function get_tax_name() {
  $terms = get_the_terms( $post->ID, 'type' );
  if ( !empty( $terms ) ){
      // get the first term
      $term = array_shift( $terms );
      return $term->slug;
  }
}

// Get Single-item's Featured Img URL
function get_thumb_img($id) {
  $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); 
  return $image[0];
}

// Get Resouce CTA link field
function get_cta_text($id) {
  if (!get_field('resource_cta_text')) {
    return 'View';
  } else {
    return get_field('resource_cta_text');
  }
}

// Build Resource Card
function get_the_resource_card($id) {

  $card_html = '
  <a href="'. get_the_permalink($id) .'" class="card__overlay grow" style="background:linear-gradient('. get_rgba($color) .', 0.9), '. get_rgba($color) .', 0.9)), url('. get_thumb_img($id) .')">'.
    '<h5 class="card__type">'. get_tax_name($id) .'</h5>'.
    '<h5 class="card__title">'. get_the_title($id) .'</h5>'.
    '<span class="card__more">'. get_cta_text($id) .'</span>'.
  '</a>';

  $gated_card_html = '
  <div class="card-flip grow">'.
  '<a class="flip">'.
    '<div class="card__overlay front" style="background:linear-gradient('. get_rgba($color) .', 0.9), '. get_rgba($color) .', 0.9)), url('. get_thumb_img($id) .')">'.
      '<h5 class="card__type">'. get_tax_name($id) .'</h5>'.
      '<h5 class="card__title">'. get_the_title($id) .'</h5>'.
      '<span class="card__more">'. get_cta_text($id) .'</span>'.
    '</div>'. //.front
    '<div class="back">'.
      '<div class="card__form">'. get_field('gated_form_embed') .'</div>'.
    '</div>'. //.back
  '</a>'. //.card
  '</div>'; //.card-flip

  $related_card_html = '
  <a href="'. get_the_permalink($id, $post_object_id) .'" class="card__overlay grow" style="background:linear-gradient('. get_rgba($color) .', 0.9), '. get_rgba($color) .', 0.9)), url('. get_thumb_img($id) .')">'.
    '<h5 class="card__type">'. get_tax_name($id) .'</h5>'.
    '<h5 class="card__title">'. get_the_title($id) .'</h5>'.
    '<span class="card__more">'. get_cta_text($id) .'</span>'.
  '</a>';

  $related_gated_card_html = '
  <div class="card-flip grow">'.
  '<a class="flip">'.
    '<div class="card__overlay front" style="background:linear-gradient('. get_rgba($color) .', 0.9), '. get_rgba($color) .', 0.9)), url('. get_thumb_img($id) .')">'.
    '<h5 class="card__type">'. get_tax_name($id) .'</h5>'.
    '<h5 class="card__title">'. get_the_title($id) .'</h5>'.
    '<span class="card__more">'. get_cta_text($id) .'</span>'.
    '</div>'. //.front
    '<div class="back">'.
      '<div class="card__form">'. get_field('gated_form_embed') .'</div>'.
    '</div>'. //.back
  '</a>'. //.card
  '</div>'; //.card-flip

  if (is_singular() && get_field('is_resource_gated') == 'true' ) :
    return $related_gated_card_html;
  elseif (is_singular() ) :
    return $related_card_html;
  elseif (get_field('is_resource_gated') == 'true' ) :
    return $gated_card_html;
  else :
    return $card_html;
  endif;
}

function the_resource_card($id) {
  echo get_the_resource_card($id);
}



// Get Resources
add_action('wp_ajax_nopriv_ont_get_resources', 'ont_get_resources');
add_action('wp_ajax_ont_get_resources', 'ont_get_resources');
function ont_get_resources() {

  $ppp = $_POST["ppp"];
  $page = $_POST["page"];
  $type = $_POST["type"];
  $topic = $_POST["topic"];

  // default for all
  $args = array(
    'post_type' => 'resource',
    'posts_per_page' => $ppp,
    'paged' => $page,
    'order' => 'DESC',
  );

  // if no filers, or == all
  if ($topic == 'All' && $type == 'All') {
    $args = array(
      'post_type' => 'resource',
      'posts_per_page' => $ppp,
      'paged' => $page,
      'order' => 'DESC',
      'relation' => 'AND',
      'meta_key' => 'is_resource_popular',
      'meta_value' => '1' //if is checked as popular section
    );
  }
  // if topic is filtered
  if ($topic != 'All') {
    $args["tax_query"] = array(
      'relation' => 'AND',
      array(
        'field' => 'slug',
        'taxonomy' => 'topic',
        'terms' => $topic
      )
    );
  }
  // if type is filtered
  if ($type != 'All') {
    $args["tax_query"] = array(
      'relation' => 'AND',
      array(
        'field' => 'slug',
        'taxonomy' => 'type',
        'terms' => $type
      )
    );
  }

  // if type is filtered
  if ($type != 'All' && $topic != 'All') {
    $args["tax_query"] = array(
      'relation' => 'AND',
      array(
        'field' => 'slug',
        'taxonomy' => 'type',
        'terms' => $type
      ),
      array(
        'field' => 'slug',
        'taxonomy' => 'topic',
        'terms' => $topic
      )
    );
  }

  $resQuery = new WP_Query($args);

?>
  <script type="text/javascript">
    var total_resources = <?php echo $resQuery->found_posts ?>;
  </script>
  <?php

  // $found = 0;
  if($resQuery->have_posts()) :
    while ( $resQuery->have_posts() ) :
      $resQuery->the_post(); ?>
      <li class="col-md-3 col-sm-4 col-xs-12 card">
        <?php the_resource_card(get_the_ID()) ?>
      </li>
      <?php
    endwhile;
  endif;

  wp_reset_query();
  exit();
}
?>