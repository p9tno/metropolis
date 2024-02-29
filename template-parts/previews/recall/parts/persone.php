<?php if (SCF::get( 'person__title' ) || SCF::get( 'person__desc' ) || SCF::get( 'person__img' )) { ?>
    <div class="recall__person">
        <div class="person">
            <?php if (SCF::get( 'person__img' )) { $person_img = wp_get_attachment_image(SCF::get( 'person__img' ), 'full'); ?>
                <div class="person__img img"><?php echo $person_img; ?></div>
            <?php } ?>
            <div class="person__info">
                <?php if (SCF::get( 'person__title' )) { ?>
                    <div class="person__title"><?php echo SCF::get( 'person__title' ); ?></div>
                <?php } ?>
                <?php if (SCF::get( 'person__desc' )) { ?>
                    <div class="person__desc"><?php echo SCF::get( 'person__desc' ); ?></div>
                <?php } ?>
            </div>
        </div>
    </div>
<?php } ?>