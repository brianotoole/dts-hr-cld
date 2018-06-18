<?php
// Section About
?>
<section class="section section--about">
  <div class="container">

    <div class="row row--intro">
      <div class="col-xs-12">
        <h4 class="about__title u-color-primary">Industry Expertise</h4>
      </div><!--/.col-->
    </div><!--/.row-->

    <div class="row row--intro">
      <div class="col-xs-12 col-sm-6">
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quia ex ipsum illo eligendi ipsa necessitatibus qui voluptas officia, est molestias explicabo deleniti, accusantium sunt harum ad, vitae nesciunt? Iste, accusamus?</p>
      </div><!--/.col-->
    </div><!--/.row-->
   
    <?php if( have_rows('stat_blocks') ): ?>
    <div class="row row--stats u-text-center">

    <?php while ( have_rows('stat_blocks') ) : the_row(); 
      $number = get_sub_field('stat_number');
      $text = get_sub_field('stat_text');
    ?>
      <div class="col-xs-12 col-sm-3">
        <div class="stat">
          <h2 class="stat__number h1"><?php echo $number; ?></h2>
          <p class="stat__text"><?php echo $text; ?></p>
        </div><!--/.stat-->
      </div><!--/.col-->
      <?php endwhile; ?>
      
    </div><!--/.row-->
    <?php endif;?>

  </div><!--/.container-->
</section>