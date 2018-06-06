<?php /* Template Name: Resources */ ?>

<?php get_header(); ?>

<?php
// HERO
get_template_part('template-parts/hero', '');

// RESOURCES LIST
get_template_part('template-parts/resources', 'all');

// CTA (if yes)
if (get_field('has_cta') == 'true') :
get_template_part('template-parts/section', 'cta');
endif;

?>

<?php get_footer(); ?>