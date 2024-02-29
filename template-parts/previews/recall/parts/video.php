<?php 
    $no_bg_url = wp_get_attachment_url(SCF::get_option_meta( 'my-theme-settings', 'option_no_img' ));

    if (SCF::get( 'bg_youtube_video' )) { 
        $bg_url = wp_get_attachment_url(SCF::get( 'bg_youtube_video' ));
    } else {
        $bg_url = $no_bg_url;
    }
?>
<div class="recall__video">
    <div class="video">
        <div 
            class="video__wrapper js-youtube" 
            id="<?php echo SCF::get( 'id_youtube_video' ); ?>"
            style="background-image: url('<?php echo $bg_url; ?>')">
            <div class="video__play"></div>
        </div>
    </div>
</div>