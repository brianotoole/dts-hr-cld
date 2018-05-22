<?php // Solutions-List 

?>

<section class="section section--solutions-list section--white">
  <div class="container container--narrow">

  <div class="solutions">
    <?php
      $solution_args = array(
        'post_type'   => 'solution',
        'post_status' => 'publish'
      );
      $solutions = new WP_Query($solution_args);
      if ($solutions->have_posts()) :
        $i = 0;
        while ($solutions->have_posts()) : $solutions->the_post();
          $solution_title = get_the_title();
          $solution_text = get_the_content();
          //Custom Field Group == PostType: Solution
          //$solution_position = get_field('solution_position'); 

          // if is odd item, set reverse to false and add class to item
          if ($i % 2 == 0) : $reverse = false;
          else :
          $reverse = true;
          endif;
      ?>
      <div class="row solution__item <?php if($reverse == true) : echo 'reverse'; else: echo 'not-reversed'; endif; ?>" id="solution__item--<?php echo $i; ?>">
        <div class="col-xs-8">
          <h6 class="solution__title"><?php echo $solution_title; ?></h6>
          <p class="solution__text"><?php echo $solution_text; ?></p>
        </div><!--/.col-->
        <div class="col-xs-3">
          <div class="solution__icon-wrap">
            <i class="solution__icon">icon</i>
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

</div><!--/.container-->
</section>