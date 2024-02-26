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


$meta_gallery = get_post_meta( get_the_ID(), 'project__gallery', true );
if ($meta_gallery) {
    get_pr($meta_gallery);
    
    // foreach ($meta_gallery as $img_id) { 
    //     $img_url = wp_get_attachment_url($img_id);  
    //     echo $img_url . ',<br>';  
    // } 

}

// $data_gallery = SCF::get('project__gallery');
// if ($data_gallery) { 


//     echo '([';
//         foreach ($data_gallery as $item) {  
//             $img_url = wp_get_attachment_url($item['gallery_item']);
//             $attribute = $item['gallery_radio']; 
//             echo "['" . $attribute . "', '"  . $img_url . "'],";
//         } 
//     echo '])';
//  }; 







?>

<!-- 
        ([
            ['', '../../img/preview_1.webp'],
            ['before', '../../img/preview_2.webp'],
            ['after', '../../img/preview_3.webp'],
        ]), -->





<div 
    class="portfolio__item" 
    data-modal="#project" 
    data-title="<?php the_title(); ?>" 
    data-cat="<?php $category = get_the_terms($post->ID, 'project-cat');
            if ($category) { $i = '';
                foreach ($category as $cat) {
                    echo $i . $cat->name;
                    $i = ', ';
                }
            } else {echo '';}
        ?>" 
    data-location="<?php echo (SCF::get( 'project__location' )) ? SCF::get( 'project__location' ) : ''; ?>" 
    data-text="<?php echo the_content(); ?>" 
    data-link="<?php echo (SCF::get( 'project__link' )) ? SCF::get( 'project__link' ) : ''; ?>" 
    data-images="<?php $data_gallery = SCF::get('project__gallery');
        if ($data_gallery) { 


            echo '[';
                foreach ($data_gallery as $item) {  
                    $img_url = wp_get_attachment_url($item['gallery_item']);
                    $attribute = $item['gallery_radio']; 
                    echo "['" . $attribute . "', '"  . $img_url . "'],";
                } 
            echo ']';
        }; ?>" 
    id="<?php the_ID(); ?>"
    >
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