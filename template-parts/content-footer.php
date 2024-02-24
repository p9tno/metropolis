<footer class="footer">
    <div class="footer__content">
        <div class="container_center">
            <div class="footer__row">
                <div class="footer__col">
                    <?php if (SCF::get_option_meta('my-theme-settings', 'option_footer_img')) { ?>
                        <a class="footer__logo img" href="<?php echo esc_url(home_url("/")); ?>">
                            <?php echo wp_get_attachment_image(SCF::get_option_meta( 'my-theme-settings', 'option_footer_img' ), 'full') ?>
                        </a>
                    <?php } ?>
                    <?php if (SCF::get_option_meta('my-theme-settings', 'footer_info')) { ?>
                        <div class="footer__info desktop">
                            <?php get_template_part( 'template-parts/parts/part', 'info' ); ?>
                        </div>
                    <?php } ?>
                </div>

                <div class="footer__col">
                    <nav class="footer__navbar">
                        <?php 
                            wp_nav_menu(array(
                                'theme_location' => 'footer',
                                'container' =>'ul',
                            )); 
                        ?>
                    </nav>
                </div>

                <div class="footer__col">
                    <div class="action">
                        <div class="action__label">contact info:</div>
                        <div class="action__list">
                            <?php if (SCF::get_option_meta('my-theme-settings', 'option_phone')) { ?>
                                <a class="action__item" href="tel:<?php echo preg_replace('/\s+/', '', SCF::get_option_meta('my-theme-settings', 'option_phone')); ?>">
                                    <i class="icon_phone"></i><span><?php echo SCF::get_option_meta('my-theme-settings', 'option_phone'); ?></span>
                                </a>
                            <?php } ?>
                            <?php if (SCF::get_option_meta('my-theme-settings', 'option_email')) { ?>
                                <a class="action__item" href="mailto:<?php echo SCF::get_option_meta('my-theme-settings', 'option_email'); ?>">
                                    <i class="icon_email"></i><span><?php echo SCF::get_option_meta('my-theme-settings', 'option_email'); ?></span>
                                </a>
                            <?php } ?>
                            <?php if (SCF::get_option_meta('my-theme-settings', 'option_address')) { ?>
                                <span class="action__item">
                                    <i class="icon_loc"></i><span><?php echo SCF::get_option_meta('my-theme-settings', 'option_address'); ?></span>
                                </span>
                            <?php } ?>
                        </div>
                    </div>
                </div>

                <?php if (SCF::get_option_meta('my-theme-settings', 'footer_info')) { ?>
                    <div class="footer__col mobile">
                        <div class="footer__info">
                            <?php get_template_part( 'template-parts/parts/part', 'info' ); ?>
                        </div>
                    </div>
                <?php } ?>
            </div>

            <?php get_template_part( 'template-parts/parts/part', 'soc' ); ?>

            <div class="footer__to"><a class="scroll_js" href="#wrapper">Back to the Top ↑</a></div>

        </div>
    </div>

    <?php if (SCF::get_option_meta('my-theme-settings', 'developed_link') && SCF::get_option_meta('my-theme-settings', 'developed_label')) { ?>
        <div class="footer__developed desktop"><a href="<?php echo SCF::get_option_meta('my-theme-settings', 'developed_link'); ?>" target="_blank"><?php echo SCF::get_option_meta('my-theme-settings', 'developed_label'); ?></a></div>
    <?php } ?>

</footer>