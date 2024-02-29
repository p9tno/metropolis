<?php

$no_img = wp_get_attachment_image(SCF::get_option_meta( 'my-theme-settings', 'option_no_img' ), 'full');
$no_img_url = wp_get_attachment_url(SCF::get_option_meta( 'my-theme-settings', 'option_no_img' ));
if (SCF::get( 'person__img' )) { 
    $img = wp_get_attachment_image(SCF::get( 'person__img' ), 'full');
} else {
    $img = $no_img;
}
  
if (SCF::get( 'bg_youtube_video' )) { 
    $img_url = wp_get_attachment_url(SCF::get( 'bg_youtube_video' ));
} else {
    $img_url = $no_img_url;
}
  
?>

<div class="recall__item">
    <div class="recall__box">
        <div class="recall__text"><?php the_content(); ?></div>
        <div class="recall__person">
            <div class="person">
                <div class="person__img img"><?php echo $img; ?></div>
                <div class="person__info">
                    <?php if (SCF::get( 'person__title' )) { ?>
                        <div class="person__title"><?php echo SCF::get( 'person__title' ); ?></div>
                    <?php } ?>
                    <?php if (SCF::get( 'person__desc' )) { ?>
                        <div class="person__desc"><?php echo SCF::get( 'person__desc' ); ?></div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <?php if (SCF::get( 'id_youtube_video' )) { ?>
        <div class="recall__video">
            <div class="video">
                <div 
                    class="video__wrapper js-youtube" 
                    id="<?php echo SCF::get( 'id_youtube_video' ); ?>"
                    style="background-image: url('<?php echo $img_url; ?>')">
                    <div class="video__play"></div>
                </div>
            </div>
        </div>
    <?php } ?>
</div>
