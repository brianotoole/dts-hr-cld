<?php /* Template Name: Team */ ?>

<?php get_header(); ?>

<?php
// HERO
get_template_part('template-parts/hero', '');

// SECTION TEAM
get_template_part('template-parts/section', 'team');

// CTA (if yes)
if (get_field('has_cta') == 'true') :
get_template_part('template-parts/section', 'cta');
endif;

?>

<?php get_footer(); ?>
