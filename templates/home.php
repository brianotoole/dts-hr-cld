<?php /* Template Name: Home */ ?>

<?php get_header(); ?>

<?php
// HERO
get_template_part('template-parts/hero', '');

// CTA-HOME
get_template_part('template-parts/hero', 'home-below');

// BENEFITS
get_template_part('template-parts/section', 'benefits');

// CTA-HOME
get_template_part('template-parts/section', 'cta-home');

// AUDIENCES
get_template_part('template-parts/section', 'audiences');

// UNIFIED
get_template_part('template-parts/section', 'unified');

// TESTIMONIALS
get_template_part('template-parts/carousel', 'testimonials');
?>

<?php get_footer(); ?>
