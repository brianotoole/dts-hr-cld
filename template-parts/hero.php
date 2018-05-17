<?php
// Hero

//Custom Field Group == Component: Hero
$hero_background = get_field('hero_background');
$hero_heading = get_field('hero_heading');
$hero_subheading = get_field('hero_subheading');
$hero_button = get_field('hero_button');
?>

<?php // set hero background: if acf field is not set, use thumbnail
  if ($hero_background) : $hero_background = $hero_background; 
  else : $hero_background = the_post_thumbnail_url(); 
  endif; 
?>

<div class="hero">
  <div class="hero__bg hero__bg--is-full-height" style="background-image: url(<?php echo $hero_background; ?>);">
    <div class="hero__inner">
      <div class="container">
        <?php
          if ( have_posts() ) :
            while ( have_posts() ) :
              the_post();
          ?>
            <div class="hero__text">
              <h1 class="hero__heading h2 u-text-bold u-text-upper"><?php the_field('hero_heading'); ?></h1>
              <p class="hero__subheading"><?php the_field('hero_subheading'); ?></p>
            </div><!--/.hero__text-->
          <?php
            endwhile;
          endif;
          ?>
        </div><!--/.container-->
    </div><!--/.hero__inner-->
  </div><!--/.hero__bg-->
</div><!--/.hero-->
