<!-- begin construction-->
<section class="construction section" id="construction">
    <div class="container_center">

        <?php if (SCF::get( 'map__title' )) { ?>
            <h2 class="section__title"><?php echo SCF::get( 'map__title' ); ?></h2>
        <?php } ?>

        <?php 
            // $args = array(
            //     'post_type' => 'project',
            //     'posts_per_page' => -1,
            // );

            // $query = new WP_Query($args);
            // $show_in_map = 0;

            // if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();
            //     $show_in_map = get_post_meta( get_the_ID(), 'project__boolean', true ); 
            //     // get_pr($show_in_map);
            //     if ($show_in_map) {
            //         echo '<hr>';
            //         echo the_ID() . '<br>';
            //         $meta_title = get_post_meta( get_the_ID(), 'project__title', true );
            //         $meta_location = get_post_meta( get_the_ID(), 'project__location', true );
            //         $meta_link = get_post_meta( get_the_ID(), 'project__link', true );
            //         $meta_position_lat = get_post_meta( get_the_ID(), 'project__position_lat', true );
            //         $meta_position_lng = get_post_meta( get_the_ID(), 'project__position_lng', true );
            //         $meta_excerpt = get_post_meta( get_the_ID(), 'project__excerpt', true );
            //         $meta_marker = wp_get_attachment_url(get_post_meta( get_the_ID(), 'project__marker', true ));
            //         $meta_thumb = get_post_meta( get_the_ID(), 'project__thumb', false ); 

            //         echo '<b>meta_title: </b>' . $meta_title . '<br>';
            //         echo '<b>meta_location: </b>' . $meta_location . '<br>';
            //         echo '<b>meta_excerpt: </b>' . $meta_excerpt . '<br>';
            //         echo '<b>meta_link: </b>' . $meta_link . '<br>';
            //         echo '<b>meta_position_lat: </b>' . $meta_position_lat . '<br>';
            //         echo '<b>meta_position_lng: </b>' . $meta_position_lng . '<br>';
            //         echo '<b>meta_marker: </b>' . $meta_marker . '<br>';

            //     }
            // endwhile;
            // endif;
            // wp_reset_postdata();
        ?>
        
        <div class="construction__content">
            <div class="map__wrap" id="wrap">
                <div class="map" id="map"></div>
                <div class="mark">
                    <div class="mark__close"></div>
                    <div class="mark__content"></div>
                </div>
            </div>
        </div>

        <script>
            ((g) => {
                var h,
                    a,
                    k,
                    p = 'The Google Maps JavaScript API',
                    c = 'google',
                    l = 'importLibrary',
                    q = '__ib__',
                    m = document,
                    b = window;
                b = b[c] || (b[c] = {});
                var d = b.maps || (b.maps = {}),
                    r = new Set(),
                    e = new URLSearchParams(),
                    u = () =>
                    h ||
                    (h = new Promise(async (f, n) => {
                        await (a = m.createElement('script'));
                        e.set('libraries', [...r] + '');
                        for (k in g)
                            e.set(
                                k.replace(/[A-Z]/g, (t) => '_' + t[0].toLowerCase()),
                                g[k]
                            );
                        e.set('callback', c + '.maps.' + q);
                        a.src = `https://maps.${c}apis.com/maps/api/js?` + e;
                        d[q] = f;
                        a.onerror = () => (h = n(Error(p + ' could not load.')));
                        a.nonce = m.querySelector('script[nonce]')?.nonce || '';
                        m.head.append(a);
                    }));
                d[l] ? console.warn(p + ' only loads once. Ignoring:', g) : (d[l] = (f, ...n) => r.add(f) && u().then(
                () => d[l](f, ...n)));
            })({
                key: 'AIzaSyBVY9bdJtxFyjxthJGdsXG7G7A6jXPRFJg',
                // v: 'weekly',
                // Use the 'v' parameter to indicate the version to use (weekly, beta, alpha, etc.).
                // Add other bootstrap parameters as needed, using camel case.
            });

            const mapMarkers = 
            [   
                <?php 
                    $args = array(
                        'post_type' => 'project',
                        'posts_per_page' => -1,
                    );
                    $query = new WP_Query($args);

                    $show_in_map = 0;

                    if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();

                        $show_in_map = get_post_meta( get_the_ID(), 'project__boolean', true ); 
                        $meta_position_lat = get_post_meta( get_the_ID(), 'project__position_lat', true );
                        $meta_position_lng = get_post_meta( get_the_ID(), 'project__position_lng', true );

                        if ($show_in_map && is_numeric($meta_position_lat) && is_numeric($meta_position_lng)) {
                            $meta_title = get_post_meta( get_the_ID(), 'project__title', true );
                            $meta_location = get_post_meta( get_the_ID(), 'project__location', true );
                            $meta_link = get_post_meta( get_the_ID(), 'project__link', true );
                            $meta_excerpt = get_post_meta( get_the_ID(), 'project__excerpt', true );
                            $meta_thumb = get_post_meta( get_the_ID(), 'project__thumb', false );
                     
                            if (get_post_meta( get_the_ID(), 'project__marker', true )) {
                                $meta_marker = wp_get_attachment_url(get_post_meta( get_the_ID(), 'project__marker', true ));
                            } else {
                                $meta_marker = get_template_directory_uri() . '/assets/img/marker.svg';
                            }
 
                            ?>
                                {
                                    title: '<?php echo $meta_title; ?>',
                                    place: '<?php echo $meta_location; ?>',
                                    text: '<?php echo $meta_excerpt; ?>',
                                    link: '<?php echo $meta_link; ?>',
                                    images: [
                                        <?php foreach ($meta_thumb as $img_id) { $img_url = wp_get_attachment_url($img_id); ?> '<?php echo $img_url; ?>', <?php } ?>
                                    ],
                                    icon: '<?php echo $meta_marker; ?>',
                                    position: {
                                        lat: Number('<?php echo $meta_position_lat; ?>'),
                                        lng: Number('<?php echo $meta_position_lng; ?>'),
                                    },
                                },
                            <?php 
                        }
                    endwhile;
                    endif;
                    wp_reset_postdata();
                ?>

                // {
                //     title: '15 Castilian Ct',
                //     place: 'Thousand Oaks',
                //     text: '<p>Like most homes that were built as part of a development project in Thousand oaks the kitchen in this home was extremely small and enclosed from all sides with only 2 small pathways leading to it. The first think on the list was to remove the largest wall and opening the spaceto the living area.</p><p>Like most homes that were built as part of a development project in Thousand oaks the kitchen in this home was extremely small and enclosed from all sides with only 2 small pathways leading to it. The first think on the list was to remove the largest wall and opening the spaceto the living area. <a href="">Read More</a></p>',
                //     link: 'http://frontendie.ru',
                //     images: ['/img/slide-1.jpg', '/img/slide-2.jpg'],
                //     icon: '../../img/marker.svg',
                //     position: {
                //         lat: 34.055,
                //         lng: -118.367
                //     },
                // },
            ];
            // console.log(mapMarkers);
            const ram = navigator.deviceMemory;
            const cpu = navigator.hardwareConcurrency;
        </script>
    </div>
</section>
<!-- end construction-->