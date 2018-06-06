<?php

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

// Build Resource Card
function get_the_resource_card($id) {

  $thumb = 'http://localhost:3000/datis/wp-content/uploads/2018/05/benefits2.png';

  $card_html = '
  <a href="'. get_the_permalink($id) .'" class="card__overlay" style="background:linear-gradient( '. get_rgba($color) .', 0.8), '. get_rgba($color) .', 0.99)), url('. $thumb .')">'.
    '<h5 class="card__type">Type</h5>'.
    '<h4 class="card__title">'. get_the_title($id) .'</h4>'.
    '<span class="card__more">View</span>'.
  '</a>';

  return $card_html;

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
      'meta_key' => 'is_resource_featured',
      'meta_value' => '1' //if is featured
    );
  }
  // if topic is filtered
  if ($topic != 'All') {
    $args["tax_query"] = array(
      'relation' => 'AND',
      array(
        'field' => 'ID',
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
        'field' => 'ID',
        'taxonomy' => 'type',
        'terms' => $type
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
      <li class="col-sm-3 col-xs-12 card">
        <?php the_resource_card(get_the_ID()) ?>
      </li>
      <?php
    endwhile;
  endif;

  wp_reset_query();
  exit;
}
?>