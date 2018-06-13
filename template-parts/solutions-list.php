<?php // Solutions-List == Solutions-Main Landing 

//Custom Field Group == PostType: Solution
$solutions_main_button = get_field('solutions_main_button'); 
?>

<section class="section section--solutions-list section--white">
  <div class="container container--narrow">
  
  <div class="solutions" id="js-stagger-solutions-trigger">
    <div class="solutions__line u-visible-desktop">
      <?php get_template_part('template-parts/svg', 'solutions-lines2.svg'); ?>
    </div>
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
      <div class="row solution__item <?php if($reverse == true) : echo 'reverse'; endif; ?>" id="solution__item--<?php echo $i; ?>">
        <div class="col-sm-7 col-xs-12 solution__wrap <?php if($reverse == true) : echo 'col-sm-offset-1'; else: echo ''; endif; ?>">
          <h6 class="solution__title"><?php echo $solution_title; ?></h6>
          <div class="solution__text">
            <?php echo $solution_excerpt; ?>
            <div>
              <a href="<?php the_permalink(); ?>" class="solution__btn"><?php echo $solution_button_title; ?> <i class="fas fa-long-arrow-alt-right"></i></a>
            </div>
          </div>
        </div><!--/.col-->
        <div class="col-sm-3 col-sm-offset-1 col-xs-12 first-xs last-sm">
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

  <!--<div class="row">
    <div class="col-xs-12 center-xs end-sm">
      <a href=" $solutions_main_button['url']; ?>" class="btn btn--primary" target="$solutions_main_button['target']; ?>"> $solutions_main_button['title']; ?></a>
    </div>
  </div>-->

</div><!--/.container-->
</section>