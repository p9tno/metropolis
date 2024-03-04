<?php
    $no_img = wp_get_attachment_image(SCF::get_option_meta( 'my-theme-settings', 'option_no_img' ), 'full');
?>

<!-- begin preview-->
<section class="preview section" id="preview">
    <div class="preview__wrap">
        <div class="container_center">
            <div class="preview__content">
                <div class="preview__caption">
                    <?php if (SCF::get( 'preview_title' )) { ?>
                        <h1 class="section__title animate_fade fade_top_js"><?php echo SCF::get( 'preview_title' ); ?></h1>
                    <?php } ?>
                    <?php if (SCF::get( 'preview_desc' )) { ?>
                        <div class="preview__desc"><?php echo SCF::get( 'preview_desc' ); ?></div>
                    <?php } ?>
                </div>

                <?php $row = SCF::get('preview_sliders');
                if ($row) { ?>
                    <div class="preview__sliders" id="sliders">
    
                        <div class="preview__imgs">
    
                            <div class="preview__lg">
                                <div class="swiper preview_lg_js">
                                    <div class="swiper-wrapper">
                                        <?php foreach ($row as $col) {  
                                                $img = false;
                                                if ($col['preview__lg']) {
                                                    $img = wp_get_attachment_image($col['preview__lg'], 'full');
                                                } else {
                                                    $img = $no_img;
                                                }
                                            ?>
                                            <div class="swiper-slide">
                                                <div class="preview__img img"><?php echo $img; ?></div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
    
                            <div class="preview__sm">
                                <div class="swiper preview_sm_js">
                                    <div class="swiper-wrapper">
                                        <?php foreach ($row as $col) {
                                            $img = false;
                                            if ($col['preview__sm']) {
                                                $img = wp_get_attachment_image($col['preview__sm'], 'full');
                                            } else {
                                                $img = $no_img;
                                            }
                                        ?>  
                                            <div class="swiper-slide">
                                                <div class="preview__img img"><?php echo $img; ?></div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
    
                        <div class="preview__info">
                            <div class="swiper preview_info_js">
                                <div class="swiper-wrapper">
                                    <?php foreach ($row as $col) {  ?>
                                        <div class="swiper-slide">
                                            <div class="preview__box">
                                                <?php if ($col['preview__label']) { ?>
                                                    <div class="preview__label"><?php echo $col['preview__label']; ?></div>
                                                <?php } ?>
                                                <?php if ($col['preview__title']) { ?>
                                                    <div class="preview__title"><?php echo $col['preview__title']; ?></div>
                                                <?php } ?>
                                                <?php if ($col['preview__text']) { ?>
                                                    <div class="preview__text"><?php echo $col['preview__text']; ?></div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
    
                            <div class="preview__control swiper-control">
                                <i class="swiper-arrow icon_arrow_left"></i>
                                <div class="swiper-pagination"></div>
                                <i class="swiper-arrow icon_arrow_right"></i>
                            </div>
    
                        </div>
                        
                    </div>
                <?php }; ?>

            </div>
        </div>
    </div>
</section>
<!-- end preview-->