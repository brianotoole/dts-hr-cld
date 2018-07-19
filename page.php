<?php get_header(); ?>

<?php
// HERO
get_template_part('template-parts/hero', '');
?>
<section class="section section--default">
<div class="container">
  <div class="row">
    <div class="col-xs-12">
      <?php
      if ( have_posts() ) :
        while ( have_posts() ) :
          the_post();
          the_content();
      ?>
      <?php endwhile; else : ?>

      <?php endif; ?>
    </div><!--/.col-->
  </div><!--/.row-->   
</div><!--/.container-->
</section>
<?php get_footer(); ?>
