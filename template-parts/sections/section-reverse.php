<?php if (SCF::get( 'boolean_reverse' )) { ?>
  <!-- begin reverse-->
  <section class="reverse section" id="reverse">
      <div class="reverse__wrap">
          <div class="container_center">
              <div class="reverse__content">
                  <?php if (SCF::get( 'reverse__title' )) { ?>
                    <h2 class="section__title fade delay_0 fade_scroll_js"><?php echo SCF::get( 'reverse__title' ); ?></h2>
                  <?php } ?>
                  <?php if (SCF::get( 'reverse__text' )) { ?>
                    <div class="reverse__text fade delay_0 fade_scroll_js"><?php echo SCF::get( 'reverse__text' ); ?></div>
                  <?php } ?>
              </div>
          </div>
          <?php if (SCF::get( 'reverse__img' )) { $img = wp_get_attachment_image(SCF::get( 'reverse__img' ), 'full'); ?>
            <div class="reverse__img img"><?php echo $img; ?></div>
          <?php } ?>
      </div>
  </section>
  <!-- end reverse-->
<?php } ?>