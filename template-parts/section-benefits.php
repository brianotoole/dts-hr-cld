<?php
// Section-Benefits
?>

<section class="section section--benefits section--white">
  <div class="container benefits">
    <div class="row">
      <div class="col-xs-12">
        <h2 class="section__title benefits__title u-width-sm"><?php the_field('home_benefits_section_title'); ?></h2>
      </div><!--/.col-->
    </div><!--/.row-->

    <div class="row center-xs">
    <?php
      if( have_rows('home_benefits') ):
        $i = 0;
        while ( have_rows('home_benefits') ) : the_row();
          //Custom Field Group == Page: Home
          $image = get_sub_field('image');
          $title = get_sub_field('title');
          $text = get_sub_field('text');
      ?>
      <div class="col-sm-4 col-xs-12" id="benefits__item--<?php echo $i; ?>">
        <div class="benefits__img-wrap">
          <img src="<?php echo $image['url']; ?>" class="benefits__img benefits__img--has-border">
        </div>
        <div class="benefits__item">
          <h6 class="benefits__item-title"><?php echo $title; ?></h6>
          <div class="benefits__item-text"><?php echo $text; ?></div>
        </div>
      </div><!--/.col-->

    <?php
      $i++;
      endwhile;
    endif;
    wp_reset_postdata();
    ?>
    <div class="benefits__line u-visible-desktop"></div>
    </div><!--/.row-->

  </div><!--/.container-->
</section>