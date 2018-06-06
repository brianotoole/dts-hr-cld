<?php /* Template Name: Solutions */ ?>

<?php get_header(); ?>

<?php
// HERO
get_template_part('template-parts/hero', '');

// SOLUTIONS LIST
get_template_part('template-parts/solutions', 'list');

// CTA (if yes)
if (get_field('has_cta') == 'true') :
get_template_part('template-parts/section', 'cta');
endif;

?>

<?php get_footer(); ?>
