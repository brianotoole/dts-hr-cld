<?php
// Section Hero-Home-Below

//Custom Field Group == Page: Home
?>

<section class="section section--white">
  <div class="container">
    <div class="row hero-below">
      <div class="col-sm-6 col-xs-12">
        <div class="hero-below__image">
          <!--<img src=" echo get_template_directory_uri() . '/dist/img/home-macbook.png';>">-->
          <div class="macbook">
            <div class="macbook__screen">
              <div class="macbook__viewport">
                <img src="<?php echo get_template_directory_uri() . '/dist/img/home-demo.gif';?>">
              </div>
            </div>
            <div class="macbook__base"></div>
            <div class="macbook__notch"></div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-xs-12">
        <h6 class="hero-below__title u-text-primary"><?php the_field('home_below_hero_title'); ?></h6>
        <p class="hero-below__text"><?php the_field('home_below_hero_text'); ?></p>
      </div><!--/.col-->
    </div><!--/.row-->
  </div><!--/.container-->
</section>