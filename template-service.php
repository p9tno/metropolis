<?php
/**
 * Template name: Service (single) Template
 */
?>

<?php get_header(); ?>

<?php 

get_template_part( 'template-parts/sections/section', 'gallery' );
get_template_part( 'template-parts/sections/section', 'done' );
get_template_part( 'template-parts/sections/section', 'hasvideo' );
get_template_part( 'template-parts/sections/section', 'hasimage' );
get_template_part( 'template-parts/sections/section', 'stages' );
// get_template_part( 'template-parts/sections/section', 'reverse' );
// get_template_part( 'template-parts/sections/section', 'testimonials' );
// get_template_part( 'template-parts/sections/section', 'consult' );


?>



<?php get_footer();