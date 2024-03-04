<?php
  $no_img = wp_get_attachment_image(SCF::get_option_meta( 'my-theme-settings', 'option_no_img' ), 'full');
?>

<!-- begin gallery-->
<section class="gallery section" id="gallery">
    <div class="container_center">
        <h1 class="section__title fade fade_top_js"><?php the_title(); ?></h1>
    </div>
    <?php $row = SCF::get('service_gallery_list');
    if ($row) { ?>
        <div class="gallery__content">
          <?php $i = 0; foreach ($row as $col) { ?>
            <?php 
              if ($col['service_gallery_item']) {
                $img = wp_get_attachment_image($col['service_gallery_item'], 'full');
              } else {
                $img = $no_img;
              }
            ?>
            <div class="gallery__item img fade fade_down_big_js"><?php echo $img; ?></div>
            <?php if ($i == 5) { break; } ?>
          <?php $i++; } ?>
        </div>
    <?php }; ?>
</section>
<!-- end gallery-->