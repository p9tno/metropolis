<?php
function custom_register_post_type() {

    // START recall
    register_post_type('review', array(
		'labels'             => array(
			'name'               => 'Review', 
			'singular_name'      => 'Review', 
			'add_new'            => 'Add a review',
			'add_new_item'       => 'Add a new review',
			'edit_item'          => 'Редактировать отзыв',
			'new_item'           => 'Edit review',
			'view_item'          => 'View review',
			'menu_name'          => 'Review'
		  ),
		'public'     => false,
		'supports'   => array('title'),
        'menu_icon'  => 'dashicons-megaphone',
        'menu_position' => 10,
        'show_ui' => true, 
		'rewrite'    => [
			'with_front' => false
		]
	));
    // END recall

}
 
add_action( 'init', 'custom_register_post_type' );

//обновления ЧПУ после инициализации post type
function my_template_rewrite_rules(){
    my_template_rewrite_rukes();
    flush_rewrite_rules();
}

add_action('after_switch_theme', 'my_template_rewrite_rules');

