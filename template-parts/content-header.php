<header class="header">

    <div class="container_center">
        <div class="header__row">
            <!-- start content home page -->
            <?php if (SCF::get_option_meta('my-theme-settings', 'option_header_img')) { ?>
                <a class="header__logo img mobile" href="<?php echo esc_url(home_url("/")); ?>">
                    <?php echo wp_get_attachment_image(SCF::get_option_meta( 'my-theme-settings', 'option_header_img' ), 'full') ?>
                </a>
            <?php } ?>
            <?php if (SCF::get_option_meta('my-theme-settings', 'option_phone')) { ?>
                <a class="header__phone mobile" href="tel:<?php echo preg_replace('/\s+/', '', SCF::get_option_meta('my-theme-settings', 'option_phone')); ?>">
                    <i class="icon_phone"></i>
                </a>
            <?php } ?>
            <!-- end content home page -->
            <div class="header__info">
                <?php if (SCF::get_option_meta('my-theme-settings', 'option_phone')) { ?>
                    <a href="tel:<?php echo preg_replace('/\s+/', '', SCF::get_option_meta('my-theme-settings', 'option_phone')); ?>"><?php echo SCF::get_option_meta('my-theme-settings', 'option_phone'); ?></a>
                <?php } ?>
                <?php if (SCF::get_option_meta('my-theme-settings', 'option_email')) { ?>
                    <a href="mailto:<?php echo SCF::get_option_meta('my-theme-settings', 'option_email'); ?>"><?php echo SCF::get_option_meta('my-theme-settings', 'option_email'); ?></a>
                <?php } ?>
            </div>
            
            <div class="header__toggle"><i></i><span class="desktop">MENU</span></div>
        </div>
    </div>

    <?php get_template_part( 'template-parts/parts/part', 'link' ); ?>

    <div class="header__nav">
        <div class="container_center">
            <?php if (SCF::get_option_meta('my-theme-settings', 'option_header_img')) { ?>
                <a class="header__logo img desktop" href="<?php echo esc_url(home_url("/")); ?>">
                    <?php echo wp_get_attachment_image(SCF::get_option_meta( 'my-theme-settings', 'option_header_img' ), 'full') ?>
                </a>
            <?php } ?>
            <nav class="header__navbar">
                <?php 
                    wp_nav_menu(array(
                        'theme_location' => 'header',
                        'container' =>'ul',
                    )); 
                ?>
            </nav>
        </div>
    </div>

</header>
