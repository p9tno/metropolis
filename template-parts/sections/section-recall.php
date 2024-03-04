<!-- begin recall-->
<section class="recall section" id="recall">
    <div class="container_center">
        <?php if (SCF::get( 'testimonials__title' )) { ?>
            <h1 class="section__title fade fade_top_js"><?php echo SCF::get( 'testimonials__title' ); ?></h1>
        <?php } ?>

        <?php if (SCF::get( 'testimonials__relation' )) { ?>
            <div class="recall__grid" id="loadmore_wrap_js">
                <?php
                    $post_id = SCF::get( 'testimonials__relation' );
                    $args = array(
                        'post_type' => 'testimonials',
                        'posts_per_page' => 8,
                        'post__in' => $post_id,
                        'orderby'   => 'post__in',
                    );
                    $query = new WP_Query($args);
                ?>
    
                <?php $i = 0; if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
                    <?php 
                        if ($i === 0 || $i % 8 == 0) { get_template_part( 'template-parts/previews/recall/preview', 'recallFull' );}
                        else {get_template_part( 'template-parts/previews/recall/preview', 'recall' );}
                    ?>
                <?php $i++; endwhile;?>
    
                <?php else : ?>
                    not found
                <?php endif; ?>
    
                <?php wp_reset_postdata(); ?>
            </div>

            <?php if ( $query->max_num_pages > 1 ) { ?>
                <div class="section__more">
                    <?php 
                        $count_posts = wp_count_posts('testimonials');
                        $published_posts = $count_posts->publish;
                        $left_post = $published_posts - 8;
                    ?>

                    <script> 
                        let this_page = 1; 
                        let this_left_post = <?php echo $left_post; ?>
                    </script>

                    <a class="btn_loadmore_js" 
                        href="#"
                        data-param-posts='<?php echo serialize($query->query_vars); ?>'
                        data-max-pages='<?php echo $query->max_num_pages; ?>'
                        data-tpl='recallButton'
                    >
                        <span>see more feedback</span>
                        <i>(<?php echo $left_post; ?>)</i>
                    </a>
                </div>

            <?php } ?>

        <?php } else { 
            echo '<h2>Fill in the "Testimonials main settings" field on the testimonials page</h2>'; 
        } ?>

    </div>
</section>
<!-- end recall-->
