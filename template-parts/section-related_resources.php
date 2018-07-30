<?php
// Section Related Resources


$terms = wp_get_post_terms( $post->ID, 'topic'); 
$terms_ids = [];

foreach ( $terms as $term ) {
    $terms_ids[] = $term->term_id;
}

$current_id = get_the_ID();

// default for all
$relatedArgs = array(
  'post_type' => 'resource',
  'posts_per_page' => 3,
  'post__not_in' => array($current_id),
  'order' => 'DESC',
  'orderby' => 'title',
  'no_found_rows' => true, // Skip pagination
  'tax_query' => array(
  'relation' => 'AND',
    array(
        'taxonomy' => 'topic',
        'field'    => 'topic_id',
        'terms'    => $terms_ids
         )
    ),
 );
$relatedQuery = new WP_Query($relatedArgs);
?>

<section class="section section--related section--accent">
  <div class="container">

    <div class="row">
      <div class="col-xs-12">
        <h2 class="related__title u-color-white">Related Resources</h2>
      </div><!--/.col-->
    </div><!--/.row-->
  
    <div class="row related u-re-li">
    <?php 

  if (!get_field('resources_is_selected')) : //if manual selection IS NOT set, run default

      if( $relatedQuery->have_posts() ) :
        while ( $relatedQuery->have_posts() ) :
          $relatedQuery->the_post(); ?>
          <li class="col-sm-4 col-xs-12 card card--related">
            <?php the_resource_card(get_the_ID()) ?>
          </li>
          <?php 
        endwhile;
      endif; 
      //wp_reset_query();

  elseif( have_rows('related_resources') ):

    while ( have_rows('related_resources') ) : the_row(); ?>
      <li class="col-sm-4 col-xs-12 card card--related">
        <?php 
          $post_object = get_sub_field('resource');
          $post = $post_object;
          setup_postdata($post);
          the_resource_card($post);
          //print_r($post);
          wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly
        ?>
      </li>
  <?php
    endwhile;
  endif;
  ?>
    </div><!--/.row-->

    <div class="row u-pad">
      <div class="col-xs-12 u-text-center">
        <a href="<?php echo home_url(); ?>/resources" class="btn btn--primary">View All Resources</a>
      </div><!--/.col-->
    </div><!--/.row-->
    
  </div><!--/.container-->
</section>