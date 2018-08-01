<?php
// Section-Unified

//Custom Field Group == Page: Home
$home_unified_title = get_field('home_unified_title');
$home_unified_button = get_field('home_unified_button');
?>


<section class="section section--white section--pad-top-xl">
  <div class="container">
    <div class="row row--title">
      <div class="col-xs-12">
        <h2 class="section__title h2 u-width-sm"><?php echo $home_unified_title; ?></h2>
      </div><!--/.col-->
    </div><!--/.row-->
    <div class="row row--content">
      <div class="col-sm-offset-6 col-sm-6 end-sm col-xs-12 center-xs">

        <div class="row row--nested">
          <?php
          if( have_rows('home_unified_features') ):
            while ( have_rows('home_unified_features') ) : the_row();
              $item_title = get_sub_field('title');
              $item_screenshot = get_sub_field('screenshot');
              $item_icon_type = get_sub_field('icon_type');
              $item_icon_type_font = get_sub_field('icon_font');
              $item_icon_type_custom = get_sub_field('icon_custom');
            ?>

          <div class="col-xs-6">
            <div class="unified__item" data-src="<?php echo $item_screenshot['url']; ?>">
              <div class="unified__icon">
                <?php if ($item_icon_type == 'font') : //if 'font awesome' is selected, show icon class ?>
                <i class="<?php echo $item_icon_type_font; ?> fa-3x"></i>
                <?php else: //if not set, use custom image upload ?>
                <img src="<?php echo $item_icon_type_custom['url']; ?>">
                <?php endif; ?>
              </div>
              <div class="unified__title"><?php echo $item_title; ?></div>
            </div>
          </div><!--/.col-->
          <?php
            endwhile;
          endif;
          ?>
        
         
         </div><!--/.row-->

         <div class="row u-visible-desktop">
          <div class="col-xs-12 start-xs">
            <a href="<?php echo $home_unified_button['url']; ?>" class="unified__button btn btn--primary" target="<?php echo $home_unified_button['target']; ?>"><?php echo $home_unified_button['title']; ?></a>
          </div><!--/.col-->
        </div><!--/.row-->


      </div><!--/.col-->
    </div><!--/.row-->
  </div><!--/.container-->
  <div class="unified__spacer u-visible-desktop"></div>
  <div class="unified__img u-visible-desktop">
    <img src="<?php echo get_template_directory_uri() . '/dist/img/home-devices.png'; ?>">
  </div>
  <div class="row u-hidden-desktop">
    <div class="col-xs-12">
      <div class="unified__img unified__img--mobile">
        <img src="<?php echo get_template_directory_uri() . '/dist/img/home-devices.png'; ?>">
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row u-hidden-desktop">
      <div class="col-xs-12 start-xs">
        <a href="<?php echo $home_unified_button['url']; ?>" class="unified__button btn btn--primary" target="<?php echo $home_unified_button['target']; ?>"><?php echo $home_unified_button['title']; ?></a>
      </div><!--/.col-->
    </div><!--/.row-->
  </div><!-- /.container -->
  <div class="unified__spacer u-visible-desktop"></div>
</section>