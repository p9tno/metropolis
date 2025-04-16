<?php if (SCF::get( 'boolean_awards' )) { ?>
  <!-- begin awards-->
  <section class="awards section" id="awards">
      <div class="awards__wrap">
            <?php if (SCF::get( 'awards__title' ) || SCF::get( 'awards__text' )) { ?>
                <div class="awards__content">
                    <h2 class="section__title animate_fade delay_0 fade_scroll_js"><?php echo SCF::get( 'awards__title' ); ?></h2>
                    <?php if (SCF::get( 'awards__text' )) { ?>
                        <div class="section__content animate_fade delay_0 fade_scroll_js"><?php echo SCF::get( 'awards__text' ); ?></div>
                    <?php } ?>
                </div>
            <?php } ?>

            <?php if (SCF::get( 'reverse__img' )) { $img = wp_get_attachment_image(SCF::get( 'reverse__img' ), 'full'); ?>
                <div class="reverse__img img"><?php echo $img; ?></div>
            <?php } ?>

            <?php $row = SCF::get('awards_images_settings');
            if ($row) { ?>
                <div class="awards__list">
                    <?php foreach ($row as $col) {  
                        $img = wp_get_attachment_image($col['awards__img'], 'full');
                        $foto = wp_get_attachment_image($col['awards__foto'], 'full');
                    ?>
                        <div class="awards__item">
                            <?php if ($col['awards__img_link']) { ?>
                                <a href="<?php echo $col['awards__img_link']; ?>" class="awards__img_wrap">
                                    <div class="awards__img img"><?php echo $img; ?></div>
                                </a>
                            <?php } else { ?>
                                <div class="awards__img_wrap">
                                    <div class="awards__img img"><?php echo $img; ?></div>
                                </div>
                            <?php } ?>

                            <div class="awards__foto img"><?php echo $foto; ?></div>
                        </div>
                    <?php } ?>
                </div>
            <?php }; ?>
      </div>
  </section>
  <!-- end awards-->
<?php } ?>