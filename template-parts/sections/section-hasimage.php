<?php if (SCF::get( 'boolean_hasimage' )) { ?>
  <!-- begin hasimage-->
  <section class="hasimage section" id="hasimage">
      <div class="container_center">
          <div class="hasimage__content">
            <?php if (SCF::get( 'hasimage__title' )) { ?>
              <h2 class="section__title"><?php echo SCF::get( 'hasimage__title' ); ?></h2>
            <?php } ?>
            <?php if (SCF::get( 'hasimage__img' )) { $img = wp_get_attachment_image(SCF::get( 'hasimage__img' ), 'full'); ?>
              <div class="hasimage__img img"><?php echo $img; ?></div>
            <?php } ?>
            <?php if (SCF::get( 'hasimage__text' )) { ?>
              <div class="hasimage__text"><?php echo SCF::get( 'hasimage__text' ); ?></div>
            <?php } ?>
          </div>
      </div>
  </section>
  <!-- end hasimage-->
<?php } ?>

