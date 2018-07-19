<?php
// Section-Team

$teamArgs = array(
  'post_type' => 'team',
  'posts_per_page' => -1,
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
              <div class="card-image__content">
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

  </div><!-- /.container -->
</section>

<section class="section section--cta-home section--accent">
  <div class="container">
    <div class="row cta u-text-center">
      <div class="col-xs-12">
        <h4 class="cta__title u-color-text">Join the Team</h4>
        <p>Think you have what it takes to work with us? Cool. Check out our job postings below.</p>
        <a href="" class="btn btn--primary">View Open Positions</a>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- .container -->
</section>

<script>
$(function() {
  if ($(window).width() <= 768) {
    $('.card-image').on('click', function() {
      var this_card = $(this).find('.card-image__content');
      this_card.toggleClass('card-image__content--bio-shown');
    });
  }
});
</script>