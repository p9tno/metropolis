<div class="recall__item">
    <div class="recall__box">
        <div class="recall__text"><?php the_content(); ?></div>
        <?php include 'parts/persone.php'; ?>
    </div>
    <?php if (SCF::get( 'id_youtube_video' )) { ?>
        <?php include 'parts/video.php'; ?>
    <?php } ?>
</div>
