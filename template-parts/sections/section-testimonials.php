<?php if (SCF::get( 'boolean_service_testimonials' )) { ?>
  <!-- begin testimonials-->
  <section class="testimonials section" id="testimonials">
      <div class="container_center">
        <?php if (SCF::get( 'service_testimonials__title' )) { ?>
          <h2 class="section__title fade delay_0 fade_scroll_js"><?php echo SCF::get( 'service_testimonials__title' ); ?></h2>
        <?php } ?>

        <?php if (SCF::get( 'relation_service_testimonials' )) { ?>
          <div class="testimonials__slider">
              <div class="swiper testimonials_js">
                  <div class="swiper-wrapper">
                    <?php
                      $post_id = SCF::get( 'relation_service_testimonials' );
                      $args = array(
                          'post_type' => 'testimonials',
                          'posts_per_page' => -1,
                          'post__in' => $post_id,
                          'orderby'   => 'post__in',
                      );
                      $query = new WP_Query($args);
                    ?>
        
                    <?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
                      <div class="swiper-slide">
                        <div class="recall__grid">
                          <?php get_template_part( 'template-parts/previews/recall/preview', 'recallFull' ); ?>
                        </div>
                      </div>
                    <?php endwhile;?>
        
                    <?php else : ?>
                        <p>No testimonials found</p>
                    <?php endif; ?>
        
                    <?php wp_reset_postdata(); ?>
                  </div>
              </div>
              <div class="testimonials__control">
                <i class="swiper-arrow icon_arrow_left swiper-arrow-dark"></i>
                <i class="swiper-arrow icon_arrow_right swiper-arrow-dark"></i>
              </div>
          </div>
        <?php } ?>
      </div>
  </section>
  <!-- end testimonials-->
<?php } ?>
