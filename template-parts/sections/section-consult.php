<?php if (SCF::get( 'boolean_consult' )) { ?>
  <!-- begin consult-->
  <section class="consult section" id="consult">
      <div class="container_center">
          <div class="consult__content animate_fade delay_0 fade_scroll_js">
            <?php if (SCF::get( 'consult__title' )) { ?>
              <h2 class="section__title"><?php echo SCF::get( 'consult__title' ); ?></h2>
            <?php } ?>
            <?php if (SCF::get( 'consult__link' )) { ?>
              <div class="consult__btn">
                <a class="btn" href="<?php echo SCF::get( 'consult__link' ); ?>"><span>to get consultation</span></a>
              </div>
            <?php } ?>
          </div>
      </div>
  </section>
  <!-- end consult-->
<?php } ?>