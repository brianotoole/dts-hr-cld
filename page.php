<?php get_header(); ?>

<?php
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
</div><!--/.container-->

<?php get_footer(); ?>
