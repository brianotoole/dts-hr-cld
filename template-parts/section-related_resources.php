<?php
// Section Related Resources

//Custom Field Group == Page: Home
//$cta_heading = get_field('cta_heading');
//$cta_button_text = get_field('cta_button_text');
//$cta_button_link = get_field('cta_button_link');

// default for all
$relatedArgs = array(
  'post_type' => 'resource',
  'posts_per_page' => 3,
  'order' => 'DESC',
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
    <?php if( $relatedQuery->have_posts() ) :
      while ( $relatedQuery->have_posts() ) :
        $relatedQuery->the_post(); ?>
        <li class="col-sm-4 col-xs-12 card card--related">
          <?php the_resource_card(get_the_ID()) ?>
        </li>
        <?php
      endwhile;
    endif; 
    wp_reset_query();?>
    </div><!--/.row-->

    <div class="row u-pad">
      <div class="col-xs-12 u-text-center">
        <a href="<?php echo home_url(); ?>/resources" class="btn btn--primary">View All Resources</a>
      </div><!--/.col-->
    </div><!--/.row-->
    
  </div><!--/.container-->
</section>