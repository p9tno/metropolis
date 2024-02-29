<?php
// AJAX загрузка постов 
function load_posts () {
    $args = unserialize( stripslashes( $_POST['query'] ) );
	// $args['posts_per_page'] = get_option('posts_per_page');
	$args['posts_per_page'] = 8; // должно совпадать с количеством выгружаемых постов в цикле
    $args['paged'] = $_POST['page'] + 1; // следующая страница 
	//$args = remove_query_arg( ['post_parent'] );

    query_posts( $args ); 

	$i = 0;

	if ( have_posts() ) {
		while ( have_posts() ) { the_post();
			if ($_POST['tpl'] === 'recallButton') {
				if ($i === 0 || $i % 8 == 0) { get_template_part( 'template-parts/previews/recall/preview', 'recallFull' );}
				else {get_template_part( 'template-parts/previews/recall/preview', 'recall' );}
				
			}
			$i++;
		}

		die();
	}
}
add_action('wp_ajax_loadmore', 'load_posts');
add_action('wp_ajax_nopriv_loadmore', 'load_posts');