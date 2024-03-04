
<?php if (SCF::get( 'boolean_hasvideo' )) { ?>
  <?php
    $no_img = wp_get_attachment_image(SCF::get_option_meta( 'my-theme-settings', 'option_no_img' ), 'full');
    if (SCF::get( 'hasvideo__big__image' )) {
      $big_img = wp_get_attachment_image(SCF::get( 'hasvideo__big__image' ), 'full');
    } else {
      $big_img = $no_img;
    }
    if (SCF::get( 'bg_youtube_hasvideo' )) {
      $bg_video = wp_get_attachment_image(SCF::get( 'bg_youtube_hasvideo' ), 'full');
    } else {
      $bg_video = $no_img;
    }
  ?>
  <!-- begin hasvideo-->
  <section class="hasvideo section" id="hasvideo">
      <div class="container_center">
          <div class="hasvideo__content">
              <div class="hasvideo__left">
                  <?php if (SCF::get( 'hasvideo__title' )) { ?>
                    <h2 class="section__title animate_fade delay_0 fade_scroll_js"><?php echo SCF::get( 'hasvideo__title' ); ?></h2>
                  <?php } ?>
                  <?php if (SCF::get( 'hasvideo__img' )) { $img = wp_get_attachment_image(SCF::get( 'hasvideo__img' ), 'full');  ?>
                    <div class="hasvideo__img img animate_fade delay_0 fade_scroll_js"><?php echo $img; ?></div>
                  <?php } ?>
                  <?php if (SCF::get( 'hasvideo__text' )) { ?>
                    <div class="hasvideo__text animate_fade delay_0 fade_scroll_js"><?php echo SCF::get( 'hasvideo__text' ); ?></div>
                  <?php } ?>
              </div>
  
              <div class="hasvideo__right">
                  <div class="hasvideo__bg img desktop"><?php echo $big_img; ?></div>
                  <?php if (SCF::get( 'id_youtube_hasvideo' )) { ?>
                    <div class="hasvideo__video">
                        <div class="hasvideo__play img">
                            <?php echo $bg_video; ?>
                            <div class="video__play youtubeModal_js" id="<?php echo SCF::get( 'id_youtube_hasvideo' ); ?>"></div>
                        </div>
                    </div>
                  <?php } ?>
              </div>
          </div>
      </div>
  </section>
  <!-- end hasvideo-->
<?php } ?>