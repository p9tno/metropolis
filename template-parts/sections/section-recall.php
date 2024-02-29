<!-- begin recall-->
<section class="recall section" id="recall">
    <div class="container_center">
        <?php if (SCF::get( 'testimonials__title' )) { ?>
            <h1 class="section__title"><?php echo SCF::get( 'testimonials__title' ); ?></h1>
        <?php } ?>

        <div class="recall__grid">

            <?php
                $args = array(
                    'post_type' => 'testimonials',
                    'posts_per_page' => 9,
                    'orderby' => 'menu_order',
                    'order' => 'ASC',
                );
                $query = new WP_Query($args);
            ?>

            <?php $i = 0; if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
                <?php 
                    if ($i === 0) { get_template_part( 'template-parts/previews/recall/preview', 'recallFull' );}
                    else {get_template_part( 'template-parts/previews/recall/preview', 'recall' );}
                
                ?>
            <?php $i++; endwhile;?>

            <?php else : ?>
                not found
            <?php endif; ?>

            <?php wp_reset_postdata(); ?>

            <?php // my_paginate ($query); ?>

            <!-- begin recall__item 2-->
            <!-- <div class="recall__item">
                
                <div class="recall__video">
                    <div class="video">
                        <div class="video__wrapper js-youtube" id="OuOXvavAy1c"
                            style="background-image: url('../../img/recall_1.webp')">
                            <div class="video__play"></div>
                        </div>
                    </div>
                </div>
            </div> -->
            <!-- end recall__item 2-->

            <!-- begin recall__item 3-->
            <!-- <div class="recall__item">
                <div class="recall__box">
                    <div class="recall__text">
                        <p>We screened at least 5 contractors before settling on Jonathan and his team. We had three
                            bathrooms to completely remodel and miscellaneous items around the home to redo. Jonathan
                            took us through the entire process and provided us with accurate estimates. He accommodated
                            the inevitable changes along the way and assisted with the entire process from design to
                            selecting fixtures. We are very happy with the outcome and plan on using his team to remodel
                            our Kitchen next year.</p>
                        <p>The only bad thing is I used to look forward to traveling, so that I could use the shower at
                            the hotel. I recently stayed at the Trump Tower and it’s bathrooms didn’t come close to
                            mine, so I have lost the only positive of business travel.</p>
                    </div>
                    <div class="recall__person">
                        <div class="person">
                            <div class="person__img img"><img src="../../img/person.webp" alt="image" loading="lazy" />
                            </div>
                            <div class="person__info">
                                <div class="person__title">Leor & Gordon Ownby</div>
                                <div class="person__desc">3715 Los Olivos Ln. Glendale Angeles, CA</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
            <!-- end recall__item 3-->

            <!-- begin recall__item 4-->
            <!-- <div class="recall__item">
                <div class="recall__box">
                    <div class="recall__text">
                        <p>We screened at least 5 contractors before settling on Jonathan and his team. We had three
                            bathrooms to completely remodel and miscellaneous items around the home to redo. Jonathan
                            took us through the entire process and provided us with accurate estimates. He accommodated
                            the inevitable changes along the way and assisted with the entire process from design to
                            selecting fixtures. We are very happy with the outcome and plan on using his team to remodel
                            our Kitchen next year.</p>
                        <p>The only bad thing is I used to look forward to traveling, so that I could use the shower at
                            the hotel. I recently stayed at the Trump Tower and it’s bathrooms didn’t come close to
                            mine, so I have lost the only positive of business travel.</p>
                    </div>
                    <div class="recall__person">
                        <div class="person">
                            <div class="person__img img"><img src="../../img/person.webp" alt="image" loading="lazy" />
                            </div>
                            <div class="person__info">
                                <div class="person__title">Leor & Gordon Ownby</div>
                                <div class="person__desc">3715 Los Olivos Ln. Glendale Angeles, CA</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
            <!-- end recall__item 4-->

            <!-- begin recall__item 5-->
            <!-- <div class="recall__item">
                <div class="recall__video">
                    <div class="video">
                        <div class="video__wrapper js-youtube" id="OuOXvavAy1c"
                            style="background-image: url('../../img/recall_1.webp')">
                            <div class="video__play"></div>
                        </div>
                    </div>
                </div>
                <div class="recall__slider">
                    <div class="swiper recall_js">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="recall__img img"><img src="../../img/preview_2.webp" alt="image"
                                        loading="lazy" /></div>
                            </div>
                            <div class="swiper-slide">
                                <div class="recall__img img"><img src="../../img/preview_1.webp" alt="image"
                                        loading="lazy" /></div>
                            </div>
                            <div class="swiper-slide">
                                <div class="recall__img img"><img src="../../img/preview_4.webp" alt="image"
                                        loading="lazy" /></div>
                            </div>
                            <div class="swiper-slide">
                                <div class="recall__img img"><img src="../../img/preview_5.webp" alt="image"
                                        loading="lazy" /></div>
                            </div>
                        </div>
                        <div class="recall__control swiper-control dark"><i class="swiper-arrow icon_arrow_left"></i>
                            <div class="swiper-pagination"></div><i class="swiper-arrow icon_arrow_right"></i>
                        </div>
                    </div>
                </div>
            </div> -->
            <!-- end recall__item 5-->

            <!-- begin recall__item 6-->
            <!-- <div class="recall__item">
                <div class="recall__slider">
                    <div class="swiper recall_js">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="recall__img img"><img src="../../img/preview_2.webp" alt="image"
                                        loading="lazy" /></div>
                            </div>
                            <div class="swiper-slide">
                                <div class="recall__img img"><img src="../../img/preview_1.webp" alt="image"
                                        loading="lazy" /></div>
                            </div>
                            <div class="swiper-slide">
                                <div class="recall__img img"><img src="../../img/preview_4.webp" alt="image"
                                        loading="lazy" /></div>
                            </div>
                            <div class="swiper-slide">
                                <div class="recall__img img"><img src="../../img/preview_5.webp" alt="image"
                                        loading="lazy" /></div>
                            </div>
                        </div>
                        <div class="recall__control swiper-control dark"><i class="swiper-arrow icon_arrow_left"></i>
                            <div class="swiper-pagination"></div><i class="swiper-arrow icon_arrow_right"></i>
                        </div>
                    </div>
                </div>
                <div class="recall__box">
                    <div class="recall__text">
                        <p>The only bad thing is I used to look forward to traveling, so that I could use the shower at
                            the hotel. </p>
                    </div>
                    <div class="recall__person">
                        <div class="person">
                            <div class="person__img img"><img src="../../img/person.webp" alt="image" loading="lazy" />
                            </div>
                            <div class="person__info">
                                <div class="person__title">Dao & Fritz Allen</div>
                                <div class="person__desc">95 Edgar Ct,Newbury Park</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
            <!-- end recall__item 6-->

            <!-- begin recall__item 7-->
            <!-- <div class="recall__item">
                <div class="recall__box">
                    <div class="recall__text">
                        <p>We screened at least 5 contractors before settling on Jonathan and his team. We had three
                            bathrooms to completely remodel and miscellaneous items around the home to redo. Jonathan
                            took us through the entire process and provided us with accurate estimates. He accommodated
                            the inevitable changes along the way and assisted with the entire process from design to
                            selecting fixtures. We are very happy with the outcome and plan on using his team to remodel
                            our Kitchen next year.</p>
                        <p>The only bad thing is I used to look forward to traveling, so that I could use the shower at
                            the hotel. I recently stayed at the Trump Tower and it’s bathrooms didn’t come close to
                            mine, so I have lost the only positive of business travel.</p>
                    </div>
                    <div class="recall__person">
                        <div class="person">
                            <div class="person__img img"><img src="../../img/person.webp" alt="image" loading="lazy" />
                            </div>
                            <div class="person__info">
                                <div class="person__title">Leor & Gordon Ownby</div>
                                <div class="person__desc">3715 Los Olivos Ln. Glendale Angeles, CA</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
            <!-- end recall__item 7-->

            <!-- begin recall__item 8-->
            <!-- <div class="recall__item">
                <div class="recall__slider">
                    <div class="swiper recall_js">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="recall__img img"><img src="../../img/preview_2.webp" alt="image"
                                        loading="lazy" /></div>
                            </div>
                            <div class="swiper-slide">
                                <div class="recall__img img"><img src="../../img/preview_1.webp" alt="image"
                                        loading="lazy" /></div>
                            </div>
                            <div class="swiper-slide">
                                <div class="recall__img img"><img src="../../img/preview_4.webp" alt="image"
                                        loading="lazy" /></div>
                            </div>
                            <div class="swiper-slide">
                                <div class="recall__img img"><img src="../../img/preview_5.webp" alt="image"
                                        loading="lazy" /></div>
                            </div>
                        </div>
                        <div class="recall__control swiper-control dark"><i class="swiper-arrow icon_arrow_left"></i>
                            <div class="swiper-pagination"></div><i class="swiper-arrow icon_arrow_right"></i>
                        </div>
                    </div>
                </div>
                <div class="recall__box">
                    <div class="recall__text">
                        <p>We screened at least 5 contractors before settling on Jonathan and his team. We had three
                            bathrooms to completely remodel and miscellaneous items around the home to redo. Jonathan
                            took us through the entire process and provided us with accurate estimates. He accommodated
                            the inevitable changes along the way and assisted with the entire process from design to
                            selecting fixtures. We are very happy with the outcome and plan on using his team to remodel
                            our Kitchen next year.</p>
                    </div>
                    <div class="recall__person">
                        <div class="person">
                            <div class="person__img img"><img src="../../img/person.webp" alt="image" loading="lazy" />
                            </div>
                            <div class="person__info">
                                <div class="person__title">Leor & Gordon Ownby</div>
                                <div class="person__desc">3715 Los Olivos Ln. Glendale Angeles, CA</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
            <!-- end recall__item 8-->
        </div>
    </div>
</section>
<!-- end recall-->