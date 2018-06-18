<?php
// Section About
?>
<section class="section section--about-intro">
  <div class="container">

    <div class="row row--intro">
      <div class="col-xs-12">
        <h4 class="about__title u-color-primary">Industry Expertise</h4>
      </div><!--/.col-->
    </div><!--/.row-->

    <div class="row row--intro">
      <div class="col-sm-5 col-xs-12">
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quia ex ipsum illo eligendi ipsa necessitatibus qui voluptas officia, est molestias explicabo deleniti, accusantium sunt harum ad, vitae nesciunt? Iste, accusamus?</p>
      </div><!--/.col-->
    </div><!--/.row-->
   
    <?php if( have_rows('stat_blocks') ): ?>
    <div class="row row--stats u-text-center">

    <?php while ( have_rows('stat_blocks') ) : the_row(); 
      $number = get_sub_field('stat_number');
      $text = get_sub_field('stat_text');
    ?>
      <div class="col-sm-3 col-xs-12">
        <div class="stat">
          <h2 class="stat__number h1"><?php echo $number; ?></h2>
          <p class="stat__text"><?php echo $text; ?></p>
        </div><!--/.stat-->
      </div><!--/.col-->
      <?php endwhile; ?>
      
    </div><!--/.row-->
    <?php endif;?>

    <?php if( have_rows('text_blocks') ): ?>
    <div class="row row--text-blocks u-text-center">

    <?php while ( have_rows('text_blocks') ) : the_row(); 
      $text_title = get_sub_field('textblock_title');
      $text_content = get_sub_field('textblock_content');
    ?>
      <div class="col-sm-4 col-xs-12">
        <div class="text-block">
          <h4 class="text-block__title u-color-primary"><?php echo $text_title; ?></h4>
          <p class="text-block__content"><?php echo $text_content; ?></p>
        </div><!--/.stat-->
      </div><!--/.col-->
      <?php endwhile; ?>
      
    </div><!--/.row-->
    <?php endif;?>

  </div><!--/.container-->
</section>

<section class="section section--about-values">
  <div class="container">

    <div class="row">
      <h2>Core<br/>Values</h2>
    </div><!--/.row-->

    <?php if( have_rows('text_blocks') ): ?>
    <div class="row row--icon-blocks u-text-center">

    <?php while ( have_rows('icon_blocks') ) : the_row(); 
      $icon_img = get_sub_field('iconblock_img');
      $icon_title = get_sub_field('iconblock_title');
    ?>
      <div class="col-sm-4 col-xs-12">
        <div class="icon-block">
          <img src="<?php echo $icon_img; ?>">
          <h4 class="icon-block__title u-color-primary"><?php echo $icon_title; ?></h4>
        </div><!--/.icon-block-->
      </div><!--/.col-->
      <?php endwhile; ?>
      
    </div><!--/.row-->
    <?php endif;?>

  </div>
</section>

<section class="section section--accent section--about-join">
  <div class="container">

    <div class="row">
      <div class="col-xs-12">
        <h4>Join the Team</h4>
      </div><!--/.col-->
    </div><!--/.row-->

    <div class="row">
      <div class="col-sm-8 col-xs-12">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam reiciendis natus itaque pariatur a, ut assumenda sapiente.</p>
      </div><!--/.col-->
      <div class="col-sm-4 col-xs-12 end-xs">
        <a href="" class="btn btn--primary">Explore Careers</a>
      </div><!--/.col-->
    </div><!--/.row-->

  </div><!--/.container-->
</section>