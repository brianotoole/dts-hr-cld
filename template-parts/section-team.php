<?php
// Section-Team

$teamArgs = array(
  'post_type' => 'team',
  //'posts_per_page' => 3, //limit
);
$teamQuery = new WP_Query($teamArgs);
?>

<section class="section">
  <div class="container">
    <div class="row row--team">

      <?php
        if($teamQuery->have_posts()) :
          while ( $teamQuery->have_posts() ) :
            $teamQuery->the_post(); ?>
           
            <div class="card-image" style="background-image:url(<?php the_field('team_image'); ?>)">
              <div class="card-image__content card-image__content--bio-shown">
                <h6 class="card-image__name"><?php the_title(); ?></h6>
                <p class="card-image__title"><?php the_field('team_title'); ?></p>
                <p class="card-image__bio"><?php the_content(); ?></p>
              </div><!-- /.card-image__content -->
            </div><!-- /.card-image -->


            <?php
          endwhile;
        endif;

        wp_reset_query();
    
      ?>

      
    </div><!--/.row-->

  </div>
</section>

<script>
$(function() {
  $('.card-image').on('click', function(e) {
    e.preventDefault();
    $('.card-image__content').toggleClass('card-image__content--bio-shown');
  });
});
</script>