<?php 
    $no_bg_url = wp_get_attachment_url(SCF::get_option_meta( 'my-theme-settings', 'option_no_img' ));

    if (SCF::get( 'bg_youtube_video' )) { 
        $bg_url = wp_get_attachment_url(SCF::get( 'bg_youtube_video' ));
    } else {
        $bg_url = $no_bg_url;
    }
?>

<div class="recall__video">
    <div class="player">
        <div 
            class="player__wrap" 
            style="background-image: url('<?php echo $bg_url; ?>')">
            <div class="player__play"></div>
            <video 
                width="100%" 
                controls 
                allowfullscreen="true" 
                playsinline="playsinline">
                <source src="<?php echo SCF::get( 'src_player_video' ); ?>" type="video/mp4" />
            </video>
        </div>
    </div>
</div>
