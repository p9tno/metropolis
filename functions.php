<?php
if ( ! defined( '_S_VERSION' ) ) {
	define( '_S_VERSION', '1.0.13' );
}

function metropolis_scripts() {
	wp_enqueue_style( 'metropolis-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_enqueue_style('metropolis-swiper-bundle', get_template_directory_uri() . '/assets/css/swiper-bundle.min.css', array(), _S_VERSION, 'all');
	wp_enqueue_style('metropolis-main-style', get_template_directory_uri() . '/assets/css/style.css', array(), _S_VERSION, 'all');

	wp_deregister_script( 'jquery' ); //разрегистирируем скрипт jquery
    wp_register_script( 'jquery', get_template_directory_uri() . '/assets/js/jquery.js', array(), false, true);
    wp_enqueue_script( 'jquery' );

	if ( is_page_template(['template-homepage.php']) ){
		wp_enqueue_script( 'metropolis-map', get_template_directory_uri() . '/assets/js/map.js', array(), _S_VERSION, true );
	}

	wp_enqueue_script( 'metropolis-swiper', get_template_directory_uri() . '/assets/js/swiper-bundle.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'metropolis-modal', get_template_directory_uri() . '/assets/js/modal.js', array(), _S_VERSION, true );
	
	if ( is_page_template(['template-portfolio.php']) ){
		wp_enqueue_script( 'metropolis-filter', get_template_directory_uri() . '/assets/js/filter.js', array(), _S_VERSION, true );
	}

	if ( is_page_template(['template-testimonials.php']) ){
		wp_enqueue_script( 'metropolis-loadmore', get_template_directory_uri() . '/assets/js/loadmore.js', array(), _S_VERSION, true );
	}

	wp_enqueue_script( 'metropolis-function', get_template_directory_uri() . '/assets/js/function.js', array(), _S_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'metropolis_scripts' );


function metropolis_setup() {
	add_theme_support( 'title-tag' );

	add_theme_support( 'post-thumbnails' );
	// add_image_size( 'custom-lg', 900, 600, true);

	register_nav_menus(
		array(
			'header' => esc_html__( 'header', 'metropolis' ),
			'footer' => esc_html__( 'footer', 'metropolis' ),
		)
	);

	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);
}
add_action( 'after_setup_theme', 'metropolis_setup' );

function metropolis_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'metropolis_content_width', 640 );
}
add_action( 'after_setup_theme', 'metropolis_content_width', 0 );

//Разрешаем загрузку WebP
function webp_upload_mimes( $existing_mimes ) {
    // add webp to the list of mime types
    $existing_mimes['webp'] = 'image/webp';

    // return the array back to the function with our added mime type
    return $existing_mimes;
}
add_filter( 'mime_types', 'webp_upload_mimes' );

//скрываем пункты меню в админ панели
add_action('admin_menu', 'remove_menus');
function remove_menus() {
    //remove_menu_page('index.php');                # Консоль 
    remove_menu_page('edit.php');                 # Записи 
    remove_menu_page('edit-comments.php');        # Комментарии 
    //remove_menu_page('edit.php?post_type=page');  # Страницы 
    //remove_menu_page('upload.php');               # Медиафайлы 
    //remove_menu_page('themes.php');               # Внешний вид 
    //remove_menu_page('plugins.php');              # Плагины 
    // remove_menu_page('users.php');                # Пользователи 
    // remove_menu_page('tools.php');                # Инструменты 
    //remove_menu_page('options-general.php');      # Параметры 
    remove_menu_page('edit.php?post_type=smart-custom-fields'); # smart-custom-fields
}

add_filter( 'get_the_archive_title', 'fixcode_archive_title' );
	function fixcode_archive_title( $title ) {
		if ( is_post_type_archive() ) {
		$title = post_type_archive_title( '', false );
	}
	return $title;
}

function my_paginate ($query) {
	if ($query->max_num_pages > 1) {
		echo '<nav class="pagination">';
			$big = 999999999; // need an unlikely integer
			$paged = (isset($query_data['paged']) ) ? intval($query_data['paged']) : 1;
			echo paginate_links( array(
				'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				'format' => '?paged=%#%',
				'current' => max( 1, $paged ),
				'prev_text' => '<i class="icon_long_arrow_left"></i>',
				'next_text' => '<i class="icon_long_arrow_right"></i>',
				'total' => $query->max_num_pages,
				'end_size' => 3,
				'mid_size' => 3
			) );
		echo '</nav>';
	}
}

function my_cat_list_filter ( $post_type = 'post' , $taxonomy = '', $posts_per_page = '1') { ?>
	<?php $count = wp_count_posts( $post_type ); // get_pr($count);?>

	<div class="portfolio__category filter filter-list-js">
		<div class="category">
			<div class="category__label"><span>Project category:</span></div>
		
			<div class="category__list">
				<div class="category__item filter-cat-js">
					<input 
						type="radio" 
						name="cat_name" 
						id="term_all" 
						checked="checked" 
						value="all"  
						data-taxonomy=<?php echo $taxonomy; ?>
						data-post-type=<?php echo $post_type; ?>
						data-posts_per_page = <?php echo $posts_per_page; ?>
						/>
					<label for="term_all"><span>All</span><i><?php echo $count->publish; ?></i></label>
				</div>
				<?php
				$categories = get_terms(
					$taxonomy,
					array (
						// 'meta_key'                 => 'video_lab_number',
						// 'orderby'                  => 'meta_value_num',
						// 'order'                    => 'ASC',
						'hierarchical' => true,
						'hide_empty' => 1,
						'parent' => 0
					) 
				);
				foreach($categories as $cat) { // get_pr($cat); ?>   
					<div class="category__item filter-cat-js">
						<input 
							type="radio" 
							name="cat_name"
							id="term_<?php echo $cat->term_id; ?>" 
							value="<?php echo $cat->term_id; ?>" 
							data-taxonomy=<?php echo $taxonomy; ?> 
							data-post-type=<?php echo $post_type; ?>
							data-posts_per_page = <?php echo $posts_per_page; ?>
							/>
						<label for="term_<?php echo $cat->term_id; ?>"><span><?php echo $cat->name; ?></span><i><?php echo $cat->count; ?></i></label>
					</div>
				<?php } ?>
			</div>
		</div>

	</div>

	<?php
}

// Notice: ob_end_flush(): Failed to send buffer of zlib output compression (0) in /home/deesseucp/public_html/newbeginnings.deessemedia.com/wp-includes/functions.php on line 5373
remove_action('shutdown', 'wp_ob_end_flush_all', 1);

// Отключаем принудительную проверку новых версий WP, плагинов и темы в админке,
require get_template_directory() . '/inc/disable-verification.php';
require get_template_directory() . '/inc/helpers.php';
require get_template_directory() . '/inc/breadcrumb.php';
require get_template_directory() . '/inc/post-type.php';
require get_template_directory() . '/inc/filter.php';
require get_template_directory() . '/inc/ajax-load-posts.php';

/**
 * SCF
 */
require get_template_directory() . '/inc/scf/home.php';
require get_template_directory() . '/inc/scf/project.php';
require get_template_directory() . '/inc/scf/recall-page.php';
require get_template_directory() . '/inc/scf/recall.php';
require get_template_directory() . '/inc/scf/services.php';
require get_template_directory() . '/inc/scf/service.php';
require get_template_directory() . '/inc/scf/contacts.php';

/**
 * SCF settings. my-theme-settings
 */
add_action('init', function () {
	SCF::add_options_page( 'Site management', 'Site management', 'manage_options', 'my-theme-settings','dashicons-welcome-widgets-menus', 150 );
});
require get_template_directory() . '/inc/scf/settings.php';


