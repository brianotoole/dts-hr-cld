<?php /* Template Name: Home */ ?>

<?php get_header(); ?>

<?php
// HERO
get_template_part('template-parts/hero', '');

// AUDIENCES
get_template_part('template-parts/section', 'audiences');

// UNIFIED
get_template_part('template-parts/section', 'unified');

// TESTIMONIALS
get_template_part('template-parts/carousel', 'testimonials');
?>

<?php get_footer(); ?>
