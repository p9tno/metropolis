<?php
if ( ! defined( '_S_VERSION' ) ) {
	define( '_S_VERSION', '1.0.0' );
}

function metropolis_scripts() {
	wp_enqueue_style( 'metropolis-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_enqueue_style('metropolis-swiper-bundle', get_template_directory_uri() . '/assets/css/swiper-bundle.min.css', array(), _S_VERSION, 'all');
	wp_enqueue_style('metropolis-main-style', get_template_directory_uri() . '/assets/css/style.css', array(), _S_VERSION, 'all');

	wp_deregister_script( 'jquery' ); //разрегистирируем скрипт jquery
    wp_register_script( 'jquery', get_template_directory_uri() . '/assets/js/jquery.js', array(), false, true);
    wp_enqueue_script( 'jquery' );

	if ( is_page_template(['template-homepage.php']) ){
	}
	
	wp_enqueue_script( 'metropolis-map', get_template_directory_uri() . '/assets/js/map.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'metropolis-project', get_template_directory_uri() . '/assets/js/project.js', array(), _S_VERSION, true );

	wp_enqueue_script( 'metropolis-swiper', get_template_directory_uri() . '/assets/js/swiper-bundle.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'metropolis-modal', get_template_directory_uri() . '/assets/js/modal.js', array(), _S_VERSION, true );



	wp_enqueue_script( 'metropolis-function', get_template_directory_uri() . '/assets/js/function.js', array(), _S_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'metropolis_scripts' );


function metropolis_setup() {
	add_theme_support( 'title-tag' );

	
	add_theme_support( 'post-thumbnails' );
	// add_image_size( 'custom-lg', 900, 600, true);
	// add_image_size( 'custom', 600, 400, true);
	// add_image_size( 'custom-sm', 160, 105, true);

	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'metropolis' ),
			// 'header' => esc_html__( 'header', 'allwillas' ),
			// 'footer' => esc_html__( 'footer', 'allwillas' ),
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

## отключаем создание миниатюр файлов для указанных размеров
// add_filter( 'intermediate_image_sizes', 'delete_intermediate_image_sizes' );  
// function delete_intermediate_image_sizes( $sizes ){
//     // размеры которые нужно удалить
//     return array_diff( $sizes, [
//         // 'thumbnail',
//         'medium',
//         'medium_large',
//         'large',
//         '1536x1536',
//         '2048x2048',
//     ] );
// }

//скрываем пункты меню в админ панели
add_action('admin_menu', 'remove_menus');
function remove_menus() {
    //remove_menu_page('index.php');                # Консоль 
    // remove_menu_page('edit.php');                 # Записи 
    remove_menu_page('edit-comments.php');        # Комментарии 
    //remove_menu_page('edit.php?post_type=page');  # Страницы 
    //remove_menu_page('upload.php');               # Медиафайлы 
    //remove_menu_page('themes.php');               # Внешний вид 
    //remove_menu_page('plugins.php');              # Плагины 
    // remove_menu_page('users.php');                # Пользователи 
    // remove_menu_page('tools.php');                # Инструменты 
    //remove_menu_page('options-general.php');      # Параметры 
    // remove_menu_page('edit.php?post_type=acf-field-group'); # ACF smart-custom-fields
}

function the_excerpt_max_charlength( $charlength ){
	$excerpt = get_the_excerpt();
	$charlength++;

	if ( mb_strlen( $excerpt ) > $charlength ) {
		$subex = mb_substr( $excerpt, 0, $charlength - 5 );
		$exwords = explode( ' ', $subex );
		$excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
		if ( $excut < 0 ) {
			echo mb_substr( $subex, 0, $excut );
		} else {
			echo $subex;
		}
		echo '...';
	} else {
		echo $excerpt;
	}
}

// function formatSum($number){
//     $number = number_format($number, 0, '', ' ');
//     return $number;
// }

// function get_meta_values( $meta_key, $post_type = 'post' ) {

//     $posts = get_posts(
//         array(
//             'post_type'      => $post_type,
//             'meta_key'       => $meta_key,
//             'posts_per_page' => - 1,
//         )
//     );

//     $meta_values = array();
//     foreach ( $posts as $post ) {
//         $meta_values[] = get_post_meta( $post->ID, $meta_key, true );
//     }
//     $meta_values = array_diff($meta_values, array(''));

//     return array_unique( $meta_values );
// }


// function metropolis_widgets_init() {
// 	register_sidebar(
// 		array(
// 			'name'          => esc_html__( 'Sidebar', 'metropolis' ),
// 			'id'            => 'sidebar-1',
// 			'description'   => esc_html__( 'Add widgets here.', 'metropolis' ),
// 			'before_widget' => '<section id="%1$s" class="widget %2$s">',
// 			'after_widget'  => '</section>',
// 			'before_title'  => '<h2 class="widget-title">',
// 			'after_title'   => '</h2>',
// 		)
// 	);
// }
// add_action( 'widgets_init', 'metropolis_widgets_init' );

add_filter( 'get_the_archive_title', 'fixcode_archive_title' );
	function fixcode_archive_title( $title ) {
		if ( is_post_type_archive() ) {
		$title = post_type_archive_title( '', false );
	}
	return $title;
}


/**
 * Склонение существительных после числительных. https://snipp.ru/php/word-declination
 * 
 * @param string $value Значение
 * @param array $words Массив вариантов, например: array('товар', 'товара', 'товаров')
 * @param bool $show Включает значение $value в результирующею строку
 * @return string
 */
function num_word($value, $words, $show = true) {
	$num = $value % 100;
	if ($num > 19) { 
		$num = $num % 10; 
	}
	
	$out = ($show) ?  $value . ' ' : '';
	switch ($num) {
		case 1:  $out .= $words[0]; break;
		case 2: 
		case 3: 
		case 4:  $out .= $words[1]; break;
		default: $out .= $words[2]; break;
	}
	
	return $out;
}




// Отключаем принудительную проверку новых версий WP, плагинов и темы в админке,
// require get_template_directory() . '/inc/disable-verification.php';
// require get_template_directory() . '/inc/helpers.php';
// require get_template_directory() . '/inc/acf-options.php';
// require get_template_directory() . '/inc/breadcrumb.php';
// require get_template_directory() . '/inc/post-type.php';
// require get_template_directory() . '/inc/filter.php';
// require get_template_directory() . '/inc/ajax-load-posts.php';



/**
 * SCF
 */
// require get_template_directory() . '/inc/scf/home.php';
// require get_template_directory() . '/inc/scf/review.php';
// require get_template_directory() . '/inc/scf/post.php';
// require get_template_directory() . '/inc/scf/ourblog.php';
// require get_template_directory() . '/inc/scf/admissions.php';
// require get_template_directory() . '/inc/scf/about.php';

/**
 * SCF settings. my-theme-settings
 */
// add_action('init', function () {
// 	SCF::add_options_page( 'Site management', 'Site management', 'manage_options', 'my-theme-settings','dashicons-welcome-widgets-menus', 150 );
// });
// require get_template_directory() . '/inc/scf/settings.php';


