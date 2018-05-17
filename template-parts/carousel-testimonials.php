<?php // Carousel-Testimonials 

//Custom Field Group == Page: Home
$testimonial_image = get_field('testimonial_image'); 
$testimonial_button = get_field('testimonial_button'); 
?>


<section class="section section--secondary section--image" style="background-image: url(<?php echo $testimonial_image['url']; ?>)">
<div class="container">
  <div class="carousel carousel--testimonial">
  <?php
  $testimonial_args = array(
    'post_type'   => 'testimonial',
    'post_status' => 'publish'
  );
  $testimonials = new WP_Query($testimonial_args);
  if ($testimonials->have_posts()) :
    while ($testimonials->have_posts()) : $testimonials->the_post();
      $testimonial_title = get_the_title();
      $testimonial_description = get_the_content();
      //Custom Field Group == PostType: Testimonial
      $testimonial_position = get_field('testimonial_position');
  ?>
    <div class="carousel__slide">
      <div class="testimonial">
        <div class="row">
          <div class="testimonial__description col-sm-10 col-xs-12">
            <p>"<?php echo $testimonial_description; ?>"</p>
            <h4 class="testimonial__title"><?php echo $testimonial_title; ?></h4>
            <h4 class="testimonial__position"><?php echo $testimonial_position; ?></h4>
            <a href="<?php echo $testimonial_button['url']; ?>" class="testimonial__button btn btn--primary" target="<?php echo $testimonial_button['target']; ?>"><?php echo $testimonial_button['title']; ?></a>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.team-member -->
    </div><!-- /.carousel__slide -->
  <?php
    endwhile;
  endif;
  wp_reset_postdata();
  ?>
  
  </div><!-- /.carousel -->
</div><!-- /.container -->
</section>
