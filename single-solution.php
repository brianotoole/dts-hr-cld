<?php get_header(); ?>

<?php
// HERO
get_template_part('template-parts/hero', '');

// SOLUTIONS LIST
get_template_part('template-parts/solutions', 'single');

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