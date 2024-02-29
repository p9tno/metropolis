<div class="recall__item">
    
    <?php if (SCF::get( 'id_youtube_video' )) { ?>

        <?php include 'parts/video.php'; ?>

    <?php } else { ?>

        <?php include 'parts/slider.php'; ?>
        <div class="recall__box">
            <div class="recall__text"><?php the_content(); ?></div>
            <?php include 'parts/persone.php'; ?>
        </div>

    <?php } ?>

</div>
