<div class="soc">
    <?php if (SCF::get_option_meta('my-theme-settings', 'facebook')) { ?>
        <a class="soc__link" href="<?php echo SCF::get_option_meta('my-theme-settings', 'facebook'); ?>" target="_blank"><i class="icon_fb"></i></a>
    <?php } ?>
    <?php if (SCF::get_option_meta('my-theme-settings', 'twitter')) { ?>
        <a class="soc__link" href="<?php echo SCF::get_option_meta('my-theme-settings', 'twitter'); ?>" target="_blank"><i class="icon_twitter"></i></a>
    <?php } ?>
    <?php if (SCF::get_option_meta('my-theme-settings', 'yelp')) { ?>
        <a class="soc__link" href="<?php echo SCF::get_option_meta('my-theme-settings', 'yelp'); ?>" target="_blank"><i class="icon_soc"></i></a>
    <?php } ?>
    <?php if (SCF::get_option_meta('my-theme-settings', 'instagram')) { ?>
        <a class="soc__link" href="<?php echo SCF::get_option_meta('my-theme-settings', 'instagram'); ?>" target="_blank"><i class="icon_insta"></i></a>
    <?php } ?>
</div>