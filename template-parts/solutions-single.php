<?php // Solutions-Single == Solutions-Detail 
?>

<section class="section--solutions-single section--white">
  <div class="container">
  <?php

  // check if the repeater field has rows of data
  if( have_rows('solution_feature') ): 
    $i = 0;
      while ( have_rows('solution_feature') ) : the_row();

          //Custom Field Group == PostType: Solution
          $title = get_sub_field('title');
          $text = get_sub_field('text');
          $img = get_sub_field('image')['url'];      
          // if is odd item, set reverse to false and add class to item
          if ($i % 2 == 0) : $reverse = false;
          else :
          $reverse = true;
          endif;
      ?>
      <div class="row solution__item <?php if($reverse == true) : echo 'reverse'; endif; ?>">
      <div class="col-sm-6 col-xs-12 solution__wrap">
        <h6 class="solution__title solution__title--single"><?php echo $title; ?></h6>
        <p class="solution__text"><?php echo $text; ?></p>
      </div><!--/.col-->
      <div class="col-sm-6 col-xs-12 solution__img-wrap solution__img-wrap--<?php echo $i;?>">
        <img src="<?php echo $img; ?>">
      </div><!--/.col-->

      </div><!--/.row-->
      <?php
        $i++;
        endwhile;
      endif;
      wp_reset_postdata();
    ?>

  </div><!--/.container-->
</section>