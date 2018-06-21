<?php /* Template Name: Services */ ?>

<?php get_header(); ?>

<?php
// HERO
get_template_part('template-parts/hero', '');

// SECTION ABOUT
get_template_part('template-parts/services', 'list');

// CTA (if yes)
if (get_field('has_cta') == 'true') :
get_template_part('template-parts/section', 'cta');
endif;

?>

<?php get_footer(); ?>
