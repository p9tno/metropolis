<?php
    $no_img_slide = wp_get_attachment_image(SCF::get_option_meta( 'my-theme-settings', 'option_no_img' ), 'full');
?>

<?php $slider = SCF::get('recall__slider');

// get_pr(count($slider));


if ($slider[0]['recall_img']) { ?>
    <div class="recall__slider">
        <div class="swiper recall_js">
            <div class="swiper-wrapper">
                <?php foreach ($slider as $slide) {  
                    if ($slide['recall_img']) {
                        $img_slide = wp_get_attachment_image($slide['recall_img'], 'full');
                    } else {
                        $img_slide = $no_img_slide;
                    }
                ?>
                    <div class="swiper-slide">
                        <div class="recall__img img"><?php echo $img_slide; ?></div>
                    </div>
                <?php } ?>
            </div>

            <?php if (count($slider) > 1) { ?>
                <div class="recall__control swiper-control dark">
                    <i class="swiper-arrow icon_arrow_left"></i>
                    <div class="swiper-pagination"></div>
                    <i class="swiper-arrow icon_arrow_right"></i>
                </div>
            <?php } ?>
        </div>
    </div>
<?php }; ?>
