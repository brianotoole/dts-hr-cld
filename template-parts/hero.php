<?php
// Hero

//Custom Field Group == Component: Hero
$hero_background = get_field('hero_background');
$hero_heading = get_field('hero_heading');
$hero_subheading = get_field('hero_subheading');
$hero_button = get_field('hero_button');
?>

<?php 
  // set hero background: if acf field is not set, use thumbnail
  if ($hero_background) : $hero_background = $hero_background; 
  else : $hero_background = the_post_thumbnail_url(); 
  endif; 
?>

<div class="hero <?php if (is_page('about')) : echo 'hero--about'; endif; ?>">
  <?php echo wp_get_attachment_image( $hero_background['id'], 'full', false, array( 'class' => 'hero__img' )); ?>
    
    <div class="hero__inner">
      <div class="container">
        <div class="row">
         <?php
          if ( have_posts() ) :
            while ( have_posts() ) :
              the_post();
          ?>
          <div class="col-sm-10 col-xs-12">
            <div class="hero__text">
              <?php if (is_singular('resource')) : ?>
              <h4 class="hero__category"><?php echo get_tax_name(); ?></h4>
              <?php endif; ?>
              <h1 class="hero__heading h2 u-text-bold u-text-upper"><?php the_field('hero_heading'); ?></h1>
              <p class="hero__subheading"><?php the_field('hero_subheading'); ?></p>
              <?php if ( get_field( 'hero_button' ) ) : ?>
                <div class="hero__button"><a class="<?php if (!is_singular('resource')) : echo 'js-watch-demo'; endif; ?> btn btn--primary" target="<?php echo $hero_button['target']; ?>"><?php echo $hero_button['title']; ?></a></div>
              <?php endif; ?>
            </div><!--/.hero__text-->
          </div><!--/.col-->
          <?php
            endwhile;
          endif;
          ?>
          </div><!--/.row-->
        </div><!--/.container-->
    </div><!--/.hero__inner-->

  <?php if (is_page('about')) : 
    $hero_side_bg = get_field('hero_side_image');
  ?>
    <div class="hero__side-img u-visible-desktop" style="background-image: url(<?php echo $hero_side_bg; ?>);"></div>
  <?php endif; ?>
</div><!--/.hero-->
