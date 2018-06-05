<?php
// Build Resource Card
function get_the_resource_card($id) {

  // $type = get_field( 'resource_type', $hc_id );

  $card_html = '
  <a href="'. get_the_permalink($id) .'" class="ont-card resource hc">'.
    '<div class="card__overlay"></div>'.
    '<h3 class="card__title">'. get_the_title($id) .'</h3>'.
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

  $args = array(
    'post_type' => 'resource',
    'posts_per_page' => $ppp,
    'paged' => $page,
    'order' => 'DESC'
  );
  // if topic
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
  // if type
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
    <ul class="row cards">
      <li class="col-sm-3 col-xs-12>
        <?php the_resource_card(get_the_ID()) ?>
      </li>

      <?php
    endwhile;
  endif;

  wp_reset_query();
  exit;
}
?>