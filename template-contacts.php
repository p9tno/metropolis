<?php
/**
 * Template name: Contact Template
 */
?>

<?php get_header(); ?>


<!-- begin testmeta -->
<section id="testmeta" class="testmeta section">
    <div class="container_center">
        <div class="testmeta__content">
           
            <h2 class="section__title">testmeta</h2>
            <div class="section__sub"></div>

            <?php 
                $projects = get_posts(array(
                    'post_type' => 'project',
                    'posts_per_page' => -1,
                ));
                $projectMetas = [];
                foreach($projects as $project) {
                    $post_ID = $project->ID;
                    $metas = get_post_meta($post_ID);
                    $cat = get_the_terms($post_ID, 'project-cat');
                    $post_meta = new StdClass();

                    echo $project->ID . '<br>';
                    echo $project->guid . '<br>';
                    echo $project->post_title . '<br>';

                    
                    if ( isset($cat[0]->name)) {
                        echo $cat[0]->name . '<br>';

                    }
                    // get_pr($cat) ;
                    // get_pr($metas) ;
                    // get_pr($project) ;

                    echo $metas['project__title'][0] . '<br>';

                    echo wp_get_attachment_url($metas['gallery_item'][0]) . '<br>';

                    foreach ($metas['gallery_item'] as $img_id) { 
                        $img_url = wp_get_attachment_url($img_id);
                        echo '<b>' . $img_url . '</b> <br>';
                    }

                    foreach ($metas['gallery_radio'] as $item) { 
                        // $img_url = wp_get_attachment_url($img_id);
                        echo '<b>' . $item . '</b> <br>';
                    }

                    // $data_gallery = SCF::get('project__gallery');
                    // if ($data_gallery) { 


                    //     echo '([';
                    //         foreach ($data_gallery as $item) {  
                    //             $img_url = wp_get_attachment_url($item['gallery_item']);
                    //             $attribute = $item['gallery_radio']; 
                    //             echo "['" . $attribute . "', '"  . $img_url . "'],";
                    //         } 
                    //     echo '])';
                    // }; 

               




                    // echo $project->ID;
                    // echo $project->ID;
                    // echo $project->ID;
                    // echo $project->ID;

                    // get_pr($project);
                    // get_pr($post_meta);

                    echo '<hr>';
                }

            ?>

            <script>

                <?php 
                    $projects = get_posts(array(
                        'post_type' => 'project',
                        'posts_per_page' => -1,
                    ));
                    $projectMetas = [];
                    foreach($projects as $project) {
                        $post_ID = $project->ID;
                        $metas = get_post_meta($post_ID);
                        $cat = get_the_terms($post_ID, 'project-cat');
                        $post_meta = new StdClass();
                        $post_meta->id = $project->ID;
                        $post_meta->title = $project->post_title;
                        if(isset($cat[0]->name)) {
                            $post_meta->cat = $cat[0]->name;
                        };
                        $post_meta->mettitle = $metas['project__title'][0];
                        $post_meta->img = wp_get_attachment_url($metas['gallery_item'][0]);

                        $gallery_item = [];
                        foreach ($metas['gallery_item'] as $img_id) { 
                            $img_url = wp_get_attachment_url($img_id);
                            // $post_meta->item = $img_url;
                            array_push($gallery_item, $img_url);
                        }
                        $post_meta->gallery = $gallery_item;

                        $gallery_radio = [];
                        foreach ($metas['gallery_radio'] as $item) { 
                            // $post_meta->item = $item;
                            array_push($gallery_radio, $item);
                        }
                        $post_meta->radio = $gallery_radio;

                        // $array_merge = array_merge($gallery_radio, $gallery_item );
                        $array_merge = [...$gallery_radio,...$gallery_item];
                        $array_combine = array_combine($gallery_radio, $gallery_item );
                        $post_meta->merge = $array_merge;
                        $post_meta->combine = $array_combine;

                        $full = [];
                        $array_plus = $gallery_item + $gallery_radio;
                        $post_meta->plus = $array_plus;



                        $post_meta->NEW = array($gallery_radio, $gallery_item);
                        


                  
                  


                       



                    

                        array_push($projectMetas, $post_meta);
                    }

                ?>

                const allProjects = <?php echo json_encode($projectMetas); ?>;
                console.log(allProjects);



                const datatest =
                {
                    // cat: 'Kitchen Remodeling',
                    title: '1208 N. Lima St.',
                    location: 'Thousand Oaks',
                    text: '<p>Like most homes that were built as part of a development project in Thousand oaks the kitchen in this home was extremely small and enclosed from all sides with only 2 small pathways leading to it. The first think on the list was to remove the largest wall and opening the spaceto the living area.</p><p>Like most homes that were built as part of a development project in Thousand oaks the kitchen in this home was extremely small and enclosed from all sides with only 2 small pathways leading to it. The first think on the list was to remove the largest wall and opening the spaceto the living area.</p>',
                    link: 'http://frontendie.ru',
                    images: ([
                        ['', '../../img/preview_1.webp'],
                        ['before', '../../img/preview_2.webp'],
                        ['after', '../../img/preview_3.webp'],
                    ]),
                };

                console.log(datatest);




            </script>
                
        
        </div>
    </div>
</section>
<!-- end testmeta -->







<?php 
// get_template_part( 'template-parts/sections/section', 'contacts' );





?>

<?php get_footer();