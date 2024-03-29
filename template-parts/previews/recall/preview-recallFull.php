<div class="recall__item">
    <div class="recall__box">
        <div class="recall__scrolled">
            <div class="recall__text"><?php the_content(); ?></div>
        </div>
        <?php include 'parts/persone.php'; ?>
    </div>
        

    <?php if (SCF::get( 'radio_video' ) === 'video_youtube') { ?>
        <?php include 'parts/video.php'; ?>
    <?php } elseif (SCF::get( 'radio_video' ) === 'src_player' ) { ?>
        <?php include 'parts/player.php'; ?>
    <?php } else { ?>
        <?php include 'parts/slider.php'; ?>
    <?php } ?>

</div>
