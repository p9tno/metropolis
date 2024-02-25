<?php
$size = 'full'; // (thumbnail, medium, full)
if (SCF::get_option_meta('my-theme-settings', 'option_no_img')) { 
    $no_img = wp_get_attachment_image(SCF::get_option_meta('my-theme-settings', 'option_no_img'), $size);
}  else {
    $no_img_url = get_template_directory_uri() . '/assets/img/no_img.webp' ;
    $no_img = '<img src="'.  $no_img_url .'" alt="not found" loading="lazy" />';   
}

$meta_thumb = get_post_meta( get_the_ID(), 'project__thumb', false ); 

$img_1 = false;
$img_2 = false;
$img_3 = false;
if (isset($meta_thumb[0])) {
    $img_1 = wp_get_attachment_image($meta_thumb[0], $size);
}  else {
    $img_1 = $no_img;
}
if (isset($meta_thumb[1])) {
    $img_2 = wp_get_attachment_image($meta_thumb[1], $size);
}  else {
    $img_2 = $no_img;
}
if (isset($meta_thumb[2])) {
    $img_3 = wp_get_attachment_image($meta_thumb[2], $size);
}  else {
    $img_3 = $no_img;
}

?>





<div class="portfolio__item" href="#project1" id="<?php the_ID(); ?>">
    <div class="portfolio__content">
        <?php if (SCF::get( 'project__location' )) { ?>
            <div class="portfolio__locatin"><?php echo SCF::get( 'project__location' ); ?></div>
        <?php } ?>
        
        <div class="portfolio__img img"><?php if ($img_1) {echo $img_1; } ?></div>

        <div class="portfolio__box">
            <?php $category = get_the_terms($post->ID, 'project-cat');
                if ($category) {
                    $i = '';
                    echo '<div class="portfolio__cat">';
                        foreach ($category as $cat) {
                            echo $i . $cat->name;
                            $i = ', ';
                        }
                    echo '</div>';
                }
            ?>
            <?php if (SCF::get( 'project__title' )) { ?>
                <div class="portfolio__title"><?php echo SCF::get( 'project__title' ); ?></div>
            <?php } ?>
            <?php if (SCF::get( 'project__excerpt' )) { ?>
                <div class="portfolio__text"><?php echo SCF::get( 'project__excerpt' ); ?></div>
            <?php } ?>
            <?php if (SCF::get( 'project__location' )) { ?>
                <div class="portfolio__locatin"><?php echo SCF::get( 'project__location' ); ?></div>
            <?php } ?>
        </div>
    </div>

    <div class="portfolio__img img"><?php if ($img_2) {echo $img_2; } ?></div>
    
    <div class="portfolio__img img"><?php if ($img_3) {echo $img_3; } ?></div>
</div>