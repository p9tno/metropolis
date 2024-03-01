<?php if (SCF::get( 'boolean_stages' )) { ?>
  <!-- begin stages-->
  <section class="stages section" id="stages">
      <div class="container_center">
          <div class="stages__content counter-wrap">

            <?php if (SCF::get( 'stages_section_title' )) { ?>
              <h2 class="section__title"><?php echo SCF::get( 'stages_section_title' ); ?></h2>
            <?php } ?>

            <?php $row = SCF::get('stages_list');
            if ($row) { ?>
                <?php foreach ($row as $col) {  ?>
                  <div class="stages__item counter-item">
                      <div class="stages__number counter-el"></div>
                      <?php if ($col['stages__title']) { ?>
                        <div class="stages__title"><?php echo $col['stages__title']; ?></div>
                      <?php } ?>
                      <?php if ($col['stages__text']) { ?>
                        <div class="stages__text"><p><?php echo $col['stages__text']; ?></p></div>
                      <?php } ?>
                  </div>
                <?php } ?>
            <?php }; ?>

          </div>
      </div>
  </section>
  <!-- end stages-->
<?php } ?>