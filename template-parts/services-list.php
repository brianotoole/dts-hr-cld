<?php
// Service List
?>

<section class="section section--services-intro">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <h4 class="about__title u-color-primary"><?php the_field('service_intro_title'); ?></h4>
        <p><?php the_field('service_intro_text'); ?></p>
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
          <h5 class="icon__title"><?php echo $title; ?></h5>
        </div><!--/.icon-->
      </div><!--/.col-->
      <?php endwhile; ?>
      
    </div><!--/.row-->
    <?php endif;?>
  </div>
</section>



<section class="section section--services-list section--white">
  
  <div class="services u-pt-20">
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
      <div class="row service-item service-item--is-padded <?php if($reverse == true) : echo 'service-item--reverse'; endif; ?>" id="service-item--<?php echo $i; ?>">
        <div class="service-item__bg" style="background-image:url('<?php echo $service_image['url']; ?>')"></div>
        <div class="container">
          <div class="row <?php if($reverse == true) : echo 'reverse'; endif; ?>">
            <img class="service-item__img service-item__img--mobile col-xs-12" style="background-image:url('<?php echo $service_image['url']; ?>')">
            <div class="service-item__content col-sm-6 col-xs-12">
              <h4 class="service-item__title"><?php echo $service_title; ?></h4>
              <?php echo $service_excerpt; ?>
              <div class"service-item__btn-wrap">
                <a href="<?php the_permalink(); ?>" class="service-item__btn solution__btn"><?php echo $service_button_title; ?> <i class="fas fa-long-arrow-alt-right"></i></a>
              </div>
            </div><!--/.col-->
          </div><!--/.row-->
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