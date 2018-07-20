<?php get_header(); ?>

<?php
// HERO
get_template_part('template-parts/hero', ''); ?>

<section class="section section--default">
<div class="container">
  <div class="row">
    <div clas="col-xs-12">
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

<?php
// CTA (if yes)
if (get_field('has_cta') == 'true') :
  get_template_part('template-parts/section', 'cta');
endif;

// RELATED RESOURCES
if (get_field('resources_is_selected') == 'true') :
  get_template_part('template-parts/section', 'related_resources');
endif;

?>

<?php get_footer(); ?>