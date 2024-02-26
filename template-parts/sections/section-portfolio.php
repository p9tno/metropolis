<!-- begin portfolio-->
<section class="portfolio section" id="portfolio">
    <div class="container_center">
        <div class="portfolio__header">
            <h1 class="section__title"><?php the_title(); ?></h1>

            <?php echo my_cat_list_filter(
                $post_type = 'project',
                $taxonomy = 'project-cat',
                $posts_per_page = '5',
            ); ?>

        </div>

        <div class="preloaderFilter__inner">
            <div class="preloaderFilter__wrap preloaderFilter-js">
                <div class="preloaderFilter"></div>
            </div>

            <div class="portfolio__main filter__content">
    
                <?php
                    $args = array(
                        'post_type' => 'project',
                        'posts_per_page' => 5,
                        'orderby' => 'menu_order',
                        'order' => 'ASC',
                    );
                    $query = new WP_Query($args);
                ?>
    
                <?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
                    <?php get_template_part( 'template-parts/previews/preview', 'portfolio' );?>
                <?php endwhile; ?>
    
                <?php else : ?>
                    <p>No projects found</p>
                <?php endif; ?>
    
                <?php wp_reset_postdata(); ?>
    
                <?php my_paginate ($query); ?>
    
            </div>

        </div>


        <!-- <div class="section__more"><a href="#"> <span>see more Projects</span><i>(16)</i></a></div> -->
        
    </div>
</section>
<!-- end portfolio-->