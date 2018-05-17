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
        <h3 class="section__title h2 u-text-upper"><?php echo $home_unified_title; ?></h3>
      </div><!--/.col-->
    </div><!--/.row-->
    <div class="row row--content">
      <div class="col-sm-offset-6 col-sm-6 end-sm col-xs-12 center-xs">

        <div class="row row--nested">
          <?php
          if( have_rows('home_unified_features') ):
            while ( have_rows('home_unified_features') ) : the_row();
              $item_title = get_sub_field('title');
              $item_icon = get_sub_field('icon');
            ?>

          <div class="col-xs-6">
            <div class="unified__item">
              <div class="unified__icon"><i class="fas fa-compass"></i></div>
              <div class="unified__title"><?php echo $item_title; ?></div>
            </div>
          </div><!--/.col-->
          <?php
            endwhile;
          endif;
          ?>
        
         
         </div><!--/.row-->

         <div class="row">
          <div class="col-xs-12 start-xs">
            <a href="<?php echo $home_unified_button['url']; ?>" class="unified__button btn btn--primary" target="<?php echo $home_unified_button['target']; ?>"><?php echo $home_unified_button['title']; ?></a>
          </div><!--/.col-->
        </div><!--/.row-->


      </div><!--/.col-->
    </div><!--/.row-->
  </div><!--/.container-->
</section>