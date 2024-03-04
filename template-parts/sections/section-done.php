<?php if (SCF::get( 'boolean_done' )) { ?>
  <!-- begin done-->
  <section class="done section" id="done">
    <div class="container_center">
      <div class="done__content animate_fade fade_scroll_js">
          <?php if (SCF::get( 'done__title' )) { ?>
            <h2 class="section__title"><?php echo SCF::get( 'done__title' ); ?></h2>
          <?php } ?>
          <?php if (SCF::get( 'done__text' )) { ?>
            <div class="done__text"><?php echo SCF::get( 'done__text' ); ?></div>
          <?php } ?>
        </div>
      </div>
  </section>
  <!-- end done-->
<?php } ?>