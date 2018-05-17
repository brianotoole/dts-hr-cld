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
  <div class="hero__bg" style="background-image: url(<?php echo $hero_background; ?>);"></div>
  <div class="hero__inner">
   hi
  </div><!--/.hero__inner-->
</div><!--/.hero-->
