<?php
// Service List
?>

<section class="section section--services-intro">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <h4 class="about__title u-color-primary">Superior Service<br/>From Experts Who Care</h4>
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Incidunt repellat sequi esse sapiente velit maxime consequuntur exercitationem, quibusdam numquam optio facilis odio iste aut blanditiis excepturi consectetur tempore officia minima.</p>
      </div><!--/.col-->
    </div><!--/.row-->
  </div><!--/.container-->
</section>

<section class="section section--services-icons section--accent">
  <div class="container">
    <?php if( have_rows('icon_block') ): ?>
    <div class="row row--icons u-text-center">

    <?php while ( have_rows('icon_block') ) : the_row(); 
      $image = get_sub_field('image');
      $title = get_sub_field('title');
    ?>
      <div class="col-sm-3 col-xs-12">
        <div class="icon">
          <div class="icon__image icon__image--centered"><img src="<?php echo $image; ?>"></div>
          <h4 class="icon__title"><?php echo $title; ?></h4>
        </div><!--/.icon-->
      </div><!--/.col-->
      <?php endwhile; ?>
      
    </div><!--/.row-->
    <?php endif;?>
  </div>
</section>



<section class="section section--services-list section--white">
  
  <div class="services">
    <?php
      $service_args = array(
        'post_type'   => 'service',
        'post_status' => 'publish'
      );
      $services = new WP_Query($service_args);
      if ($services->have_posts()) :
        $i = 0;
        while ($services->have_posts()) : $services->the_post();
          //Custom Field Group == PostType: Service
          $service_title = get_field('service_title'); 
          $service_excerpt = get_field('service_excerpt'); 
          $service_image = get_field('service_image'); 
          $service_button_title = get_field('service_button_title'); 

          // if is odd item, set reverse to false and add class to item
          if ($i % 2 == 0) : $reverse = false;
          else :
          $reverse = true;
          endif;
      ?>
      <div class="row service-item <?php if($reverse == true) : echo 'service-item--reverse'; endif; ?>" id="service-item--<?php echo $i; ?>">
        <div class="service-item__bg" style="background-image:url('<?php echo $service_image['url']; ?>')"></div>
        <div class="container">
          <div class="row">
            <div class="col-sm-6"><?php echo $service_excerpt; ?></div>
          </div>
        </div><!--/.container-->
      </div><!--/.service-item-->
        
    <?php
        $i++;
        endwhile;
      endif;
      wp_reset_postdata();
    ?>
  </div><!--/.services-->
</section>