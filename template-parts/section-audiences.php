<section class="section section--accent">
<div class="section__img u-visible-desktop" style="background-image: url('<?php echo get_field('home_audience_image'); ?>')"></div>
  <div class="container">
  <div class="section--pad">
     <div class="carousel carousel--audience-nav" id="carousel--audience-nav">
       <div class="carousel__slide">
          <li class="carousel__nav-item">CEO</li>
        </div>
        <div class="carousel__slide">
          <li class="carousel__nav-item">CFO</li>
        </div>
        <div class="carousel__slide">
          <li class="carousel__nav-item">HR</li>
        </div>
        <div class="carousel__slide">
          <li class="carousel__nav-item">OPS</li>
        </div>
      </div>
    <div class="carousel" id="carousel--audience">
      <?php
      if( have_rows('home_audience_slides') ):
        $i = 0;
        while ( have_rows('home_audience_slides') ) : the_row();
          //Custom Field Group == Page: Home

          $item_title = get_sub_field('title');
          $item_text = get_sub_field('text');
          $item_button = get_sub_field('button');
      ?>
      <div class="carousel__slide" data-index="<?php echo $i; ?>">
        <div class="audience">
          <div class="row">
            <div class="audience__description col-sm-6 col-xs-12">
            <h2 class="audience__title u-width-sm">Executives Empowered</h2>
            
              <p><?php echo $item_text; ?></p>
              <a href="<?php echo $item_button['url']; ?>" class="audience_button btn btn--primary" target="<?php echo $item_button['target']; ?>"><?php echo $item_button['title']; ?></a>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.audience -->
      </div><!-- /.carousel__slide -->
    <?php
      $i++;
      endwhile;
    endif;
    wp_reset_postdata();
    ?>
    </div><!-- /.carousel -->
  </div><!-- /.section--pad -->
    
  </div><!-- /.container -->
  
</section>