<?php
    $no_img = wp_get_attachment_image(SCF::get_option_meta( 'my-theme-settings', 'option_no_img' ), 'full');

    if (SCF::get( 'contacts__img' )) {
        $img = wp_get_attachment_image(SCF::get( 'contacts__img' ), 'full');
    } else {
        $img = $no_img;
    }
?>
<!-- begin contact-->
<section class="contact section" id="contact">
    <div class="container_center">
        <div class="contact__head">
            <h1 class="section__title animate_fade fade_top_js"><?php the_title(); ?></h1>
            <?php if (SCF::get( 'contacts__text' )) { ?>
                <div class="contact__desc"><?php echo SCF::get( 'contacts__text' ); ?></div>
            <?php } ?>
        </div>

        <?php if (SCF::get( 'contacts__form' )) { ?>
            <div class="contact__content">
                <div class="contact__form">
                    <?php echo do_shortcode(  SCF::get( 'contacts__form' ) ); ?>
                    <!-- <div class="contact__label">Contact Form:</div>
                    <div class="form form_grid">
                        <div class="form__row form__row_full tick">
                            <input type="text" placeholder="Name" />
                        </div>
                        <div class="form__row tick">
                            <input type="email" placeholder="E-mail" />
                        </div>
                        <div class="form__row tick">
                            <input type="tel" placeholder="Phone" />
                        </div>
                        <div class="form__row form__row_full tick">
                            <input type="text" placeholder="Address" />
                        </div>
                        <div class="form__row form__row_full">
                            <textarea type="text" placeholder="Progect: write a few words about your project"></textarea>
                        </div>
                        <div class="form__row form__row_full tick">
                            <input type="number" placeholder="Budget" />
                        </div>
                        <div class="form__row form__row_full">
                            <button class="btn" type="submit"><span>request quote</span></button>
                        </div>
                    </div> -->
                </div>
                <div class="contact__img img"><?php echo $img; ?></div>  
            </div>
        <?php } ?>
    </div>
</section>
<!-- end contact-->