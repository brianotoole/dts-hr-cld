<?php get_header(); 
// HERO
get_template_part('template-parts/hero', '');
?>

<div class="container">
  <?php
  if ( have_posts() ) :
    while ( have_posts() ) :
      the_post();
      the_content();
  ?>
  <?php endwhile; else : ?>

  <?php endif; ?>
</div>

<?php get_footer(); ?>
