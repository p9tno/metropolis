<?php
/**
 * Template name: Home Page Template
 */
?>

<?php get_header(); ?>

<?php 
    get_template_part( 'template-parts/sections/section', 'preview' );
    get_template_part( 'template-parts/sections/section', 'construction' );
?>

<?php get_footer(); ?>