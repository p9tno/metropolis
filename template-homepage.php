<?php
/**
 * Template name: Home Page Template
 */
?>

<?php get_header(); ?>

<?php 
    // get_template_part( 'template-parts/sections/section', 'preview' );
    // get_template_part( 'template-parts/sections/section', 'construction' );
?>


<?php // include 'sections.php'; ?>

<?php // echo get_template_directory_uri() . '/assets.' ?>


<?php if ( is_page_template(['template-homepage.php']) ) {} ?>


<?php if (SCF::get_option_meta('my-theme-settings', 'test')) { ?>
    <?php echo SCF::get_option_meta('my-theme-settings', 'test'); ?>
<?php } ?>


<?php if (SCF::get( 'test' )) { ?>
    <?php echo SCF::get( 'test' ); ?>
<?php } ?>

<?php if (SCF::get( 'test' )) { ?>
<?php } ?>
<?php echo SCF::get( 'test' ); ?>

<!-- each -->
<?php $row = SCF::get('test');
if ($row) { ?>
    <?php foreach ($row as $col) {  ?>
        <?php echo $col['test']; ?>
    <?php } ?>
<?php }; ?>

<!-- geti -->
<?php echo wp_get_attachment_image(SCF::get( 'test' ), 'full') ?>
    

<!-- getiu -->
<?php echo wp_get_attachment_url(SCF::get( 'test' )) ?>

<!-- item -->
<?php // echo $item[''] ?>

<!-- eachimg -->
<?php // echo wp_get_attachment_image($item['tetst']) ?>
<?php // echo wp_get_attachment_url($item['test']) ?>


<?php get_footer(); ?>