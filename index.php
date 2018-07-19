<?php get_header(); 
// HERO
get_template_part('template-parts/hero', '');
?>

<div class="container">
  <?php
  if ( have_posts() ) :
    while ( have_posts() ) :
      the_post();
      //the_content();
      get_template_part('template-parts/content', '');
  ?>
  <?php endwhile; 
  else : 
      get_template_part( 'template-parts/content', 'none' );
  ?>

  <?php endif; ?>
</div>

<?php get_footer(); ?>