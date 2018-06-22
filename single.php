<?php get_header(); ?>

<?php
// HERO
get_template_part('template-parts/hero', '');

// SOLUTIONS LIST
get_template_part('template-parts/resources', 'single');

// RELATED RESOURCES
//get_template_part('template-parts/section', 'related_resources');

// CTA 
get_template_part('template-parts/section', 'cta');

?>

<?php get_footer(); ?>