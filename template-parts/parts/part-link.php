<?php if (SCF::get_option_meta('my-theme-settings', 'header_link_href') && SCF::get_option_meta('my-theme-settings', 'header_link_title')) { ?>
    <!-- start content home page -->
    <a 
        class="header__link mobile" 
        href="<?php echo SCF::get_option_meta('my-theme-settings', 'header_link_href'); ?>">
        <?php echo SCF::get_option_meta('my-theme-settings', 'header_link_title'); ?>
    </a>
    <!-- end content home page -->
<?php } elseif (SCF::get_option_meta('my-theme-settings', 'header_link_title')) { ?>
        <!-- start content home page -->
        <span class="header__link mobile">
            <?php echo SCF::get_option_meta('my-theme-settings', 'header_link_title'); ?>
        </span>
        <!-- end content home page -->
<?php } ?>