<?php // Solutions-List 

?>

<section class="section section--solutions-list section--white">
  <div class="container container--narrow">
  
  <div class="solutions" id="js-stagger-solutions-trigger" style="background-image: url('<?php echo get_template_directory_uri() . '/dist/img/solutions-lines.png'; ?>');">
    <?php
      $solution_args = array(
        'post_type'   => 'solution',
        'post_status' => 'publish'
      );
      $solutions = new WP_Query($solution_args);
      if ($solutions->have_posts()) :
        $i = 0;
        while ($solutions->have_posts()) : $solutions->the_post();
          //$solution_title = get_the_title();
          //Custom Field Group == PostType: Solution
          $solution_title = get_field('solution_title'); 
          $solution_excerpt = get_field('solution_excerpt'); 
          $solution_icon = get_field('solution_icon'); 
          $solution_button_title = get_field('solution_button_title'); 

          // if is odd item, set reverse to false and add class to item
          if ($i % 2 == 0) : $reverse = false;
          else :
          $reverse = true;
          endif;
      ?>
      <div class="row solution__item <?php if($reverse == true) : echo 'reverse'; else: echo '-xs'; endif; ?>" id="solution__item--<?php echo $i; ?>">
        <div class="col-xs-7 <?php if($reverse == true) : echo 'col-xs-offset-1'; else: echo ''; endif; ?>">
          <h6 class="solution__title"><?php echo $solution_title; ?></h6>
          <div class="solution__text">
            <?php echo $solution_excerpt; ?>
            <a href="<?php the_permalink(); ?>" class="solution__btn"><?php echo $solution_button_title; ?> <i class="fas fa-long-arrow-alt-right"></i></a>
          </div>
        </div><!--/.col-->
        <div class="col-xs-3 col-xs-offset-1">
          <div class="solution__icon-wrap">
            <img src="<?php echo $solution_icon['url']; ?>" class="solution__icon">
          </div>
        </div><!--/.col-->
      </div><!--/.solution__item-->
        
    <?php
        $i++;
        endwhile;
      endif;
      wp_reset_postdata();
    ?>
  </div><!--/.solutions-->
  <div class="solution__line"></div>

</div><!--/.container-->
</section>