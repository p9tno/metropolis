<!-- begin portfolio-->
<section class="portfolio section" id="portfolio">
    <div class="container_center">
        <div class="portfolio__header">
            <h1 class="section__title"><?php the_title(); ?></h1>

            <div class="portfolio__category">
                <div class="category">
                    <div class="category__head">
                        <div class="category__label"><span>Project category:</span></div>
                        <div class="category__toggle"></div>
                        <div class="category__item filter-cat-js">
                            <input type="radio" id="term_id_1" name="cat_name" value="term_id_1" checked="checked" />
                            <label for="term_id_1"><span>All</span><i>116</i></label>
                        </div>
                    </div>
                    <div class="category__list">
                        <div class="category__item filter-cat-js">
                            <input type="radio" id="term_id_2" name="cat_name" value="term_id_2" />
                            <label for="term_id_2"><span>Home Remodeling</span><i>116</i></label>
                        </div>
                        <div class="category__item filter-cat-js">
                            <input type="radio" id="term_id_3" name="cat_name" value="term_id_3" />
                            <label for="term_id_3"><span>Kitchen Remodeling</span><i>16</i></label>
                        </div>
                        <div class="category__item filter-cat-js">
                            <input type="radio" id="term_id_4" name="cat_name" value="term_id_4" />
                            <label for="term_id_4"><span>Bathroom Remodeling</span><i>28</i></label>
                        </div>
                        <div class="category__item filter-cat-js">
                            <input type="radio" id="term_id_5" name="cat_name" value="term_id_5" />
                            <label for="term_id_5"><span>Room Addition</span><i>52</i></label>
                        </div>
                        <div class="category__item filter-cat-js">
                            <input type="radio" id="term_id_7" name="cat_name" value="term_id_7" />
                            <label for="term_id_7"><span>Blueprints &amp; Drafting</span><i>23</i></label>
                        </div>
                        <div class="category__item filter-cat-js">
                            <input type="radio" id="term_id_6" name="cat_name" value="term_id_6" />
                            <label for="term_id_6"><span>3D Design</span><i>12</i></label>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="portfolio__main">

            <?php
                $args = array(
                    'post_type' => 'project',
                    'posts_per_page' => -1,
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

            <?php // my_paginate ($query); ?>

        </div>

        <div class="section__more"><a href="#"> <span>see more Projects</span><i>(16)</i></a></div>
        
    </div>
</section>
<!-- end portfolio-->