<?php
    $no_img = wp_get_attachment_image(SCF::get_option_meta( 'my-theme-settings', 'option_no_img' ), 'full');

    if (SCF::get( 'services_main_img' )) { 
        $img = wp_get_attachment_image(SCF::get('services_main_img' ), 'full');
    } else {
        $img = $no_img;
    }
?>
<!-- begin services-->
<section class="services section" id="services">
    <div class="container_center">
        <div class="services__content counter-wrap">
            <div class="services__img img desktop"><?php echo $img; ?></div>
            <?php $row = SCF::get('service_list_settings');
            if ($row) { ?>
                <?php $i = 0; foreach ($row as $col) {  ?>
                    <div class="collapse counter-item" id="collapse<?php echo $i; ?>">

                        <div class="collapse__title" data-top="#collapse<?php echo $i; ?>">
                            <?php if ($col['collapse__title']) { ?>
                                <span><?php echo $col['collapse__title']; ?></span><i class="counter-el"></i>
                            <?php } ?>
                        </div>
                            
                        <div class="collapse__body">
                            <?php if ($col['collapse__body']) { ?>
                                <?php echo $col['collapse__body']; ?>
                            <?php } ?>
                                
                            <?php if ($col['collapse__link'] && $col['collapse__title']) { ?>
                                <div class="collapse__link">
                                    <a href="<?php echo get_permalink( $col['collapse__link'][0] ) ?>">learn more about <?php echo $col['collapse__title']; ?></a>
                                </div>
                            <?php } ?>

                            <?php if ($col['collapse__img']) { $img = wp_get_attachment_image($col['collapse__img'], 'full'); ?>
                                <div class="collapse__img img mobile"><?php echo $img;?></div>
                            <?php } ?>
                        </div>

                        <?php if ($col['collapse__img']) { $img = wp_get_attachment_image($col['collapse__img'], 'full'); ?>
                                <div class="collapse__img img desktop"><?php echo $img;?></div>
                        <?php } ?>
                    </div>
                <?php $i++; } ?>
            <?php }; ?>
        </div>
    </div>
</section>
<!-- end services-->