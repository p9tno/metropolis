<?php
$size = 'full'; // (thumbnail, medium, full)
if (SCF::get_option_meta('my-theme-settings', 'option_no_img')) { 
    $no_img = wp_get_attachment_image(SCF::get_option_meta('my-theme-settings', 'option_no_img'), $size);
}  else {
    $no_img_url = get_template_directory_uri() . '/assets/img/no_img.webp' ;
    $no_img = '<img src="'.  $no_img_url .'" alt="not found" loading="lazy" />';   
}

$meta_thumb = get_post_meta( get_the_ID(), 'project__thumb', false ); 

$img_1 = false;
$img_2 = false;
$img_3 = false;
if (isset($meta_thumb[0])) {
    $img_1 = wp_get_attachment_image($meta_thumb[0], $size);
}  else {
    $img_1 = $no_img;
}
if (isset($meta_thumb[1])) {
    $img_2 = wp_get_attachment_image($meta_thumb[1], $size);
}  else {
    $img_2 = $no_img;
}
if (isset($meta_thumb[2])) {
    $img_3 = wp_get_attachment_image($meta_thumb[2], $size);
}  else {
    $img_3 = $no_img;
}
?>

<div class="portfolio__item" data-modal="#project" id=<?php the_ID(); ?>>
    <div class="portfolio__content">
        <?php if (SCF::get( 'project__location' )) { ?>
            <div class="portfolio__locatin"><?php echo SCF::get( 'project__location' ); ?></div>
        <?php } ?>
        
        <div class="portfolio__img img"><?php if ($img_1) {echo $img_1; } ?></div>

        <div class="portfolio__box">
            <?php $category = get_the_terms($post->ID, 'project-cat');
                if ($category) {
                    $i = '';
                    echo '<div class="portfolio__cat">';
                        foreach ($category as $cat) {
                            echo $i . $cat->name;
                            $i = ', ';
                        }
                    echo '</div>';
                }
            ?>
            <?php if (SCF::get( 'project__title' )) { ?>
                <div class="portfolio__title"><?php echo SCF::get( 'project__title' ); ?></div>
            <?php } ?>
            <?php if (SCF::get( 'project__excerpt' )) { ?>
                <div class="portfolio__text"><?php echo SCF::get( 'project__excerpt' ); ?></div>
            <?php } ?>
            <?php if (SCF::get( 'project__location' )) { ?>
                <div class="portfolio__locatin"><?php echo SCF::get( 'project__location' ); ?></div>
            <?php } ?>
        </div>
    </div>

    <div class="portfolio__img img"><?php if ($img_2) {echo $img_2; } ?></div>
    
    <div class="portfolio__img img"><?php if ($img_3) {echo $img_3; } ?></div>

    <?php 
        $project = get_post( get_the_ID() );
        // get_pr($project);
        
        $projectMetas = [];
        $post_ID = $project->ID;
        $metas = get_post_meta($post_ID); // get_pr($metas);
        $category = get_the_terms($post_ID, 'project-cat'); //get_pr($category);
        $gallery = SCF::get( 'project__gallery', $post_ID );
        $post_meta = new StdClass();
        
        $post_meta->id = $project->ID;
        $post_meta->content = $project->post_content;

        $category_arr = [];
        if (! empty($category)) { 
            $total = count($category);
            $counter = 0;
            foreach ($category as $cat) {
                $counter++;
                if($counter == $total){
                    $cat_name = $cat->name;
                } else {
                    $cat_name = $cat->name . ', ';
                }
                array_push($category_arr, $cat_name);
            }
        }
        $post_meta->category = $category_arr;

        $post_meta->title = $metas['project__title'][0];
        $post_meta->location = $metas['project__location'][0];
        $post_meta->link = $metas['project__link'][0];

        $post_meta->slides = [];
        foreach ($gallery as $slide) { 
            $slideObject = new StdClass();
            $slideObject->radio = $slide['gallery_radio'];
            $slideObject->url = wp_get_attachment_url($slide['gallery_item']);
            $arr[] = $slideObject;
            $post_meta->slides = $arr;
        }

        // start recall
        if (array_key_exists('project_relation_recall', $metas) ) {
            $post_meta->recall = [];
            $recall_id = $metas['project_relation_recall'][0];
            $recall = get_post( $recall_id );
            $recall_metas = get_post_meta( $recall_id );
    
            $recall_content = new StdClass();
            $recall_content->content = $recall->post_content;
            $recall_content->title = $recall_metas['person__title'][0];
            $recall_content->desc = $recall_metas['person__desc'][0];
            $recall_content->url = wp_get_attachment_url($recall_metas['person__img'][0]);
            
            $post_meta->recall = $recall_content;
        }
        // end recall



        // $gallery_item = [];
        // foreach ($metas['gallery_item'] as $img_id) { 
        //     $img_url = wp_get_attachment_url($img_id);
        //     array_push($gallery_item, $img_url);
        // }
        // $post_meta->gallery = $gallery_item;

        array_push($projectMetas, $post_meta);
        
    ?>
    
    <script>
        modalData[<?php the_ID(); ?>] = <?php echo json_encode($projectMetas); ?>
    </script>
</div>
