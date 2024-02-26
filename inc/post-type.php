<?php
function custom_register_post_type() {

    // START recall
    register_post_type('testimonials', array(
		'labels'             => array(
			'name'               => 'Testimonials', 
			'singular_name'      => 'Testimonials', 
			'add_new'            => 'Add a testimonials',
			'add_new_item'       => 'Add a new testimonials',
			'edit_item'          => 'Edit testimonials',
			'new_item'           => 'New testimonials',
			'view_item'          => 'View testimonials',
			'menu_name'          => 'Testimonials'
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

    // START project
	$labels = array(
	'name'              => ( 'Category' ),
	'singular_name'     => ( 'Category' ),
	'search_items'      => ( 'Search by category' ),
	'all_items'         => ( 'All categories' ),
	'edit_item'         => ( 'Edit category' ),
	'update_item'       => ( 'Update category' ),
	'add_new_item'      => ( 'Add a new category' ),
	'new_item_name'     => ( 'Name of the new category' ),
	'menu_name'         => ( 'Categories' ),
	);

	$args = array(
		//вложеность термов(например вложность для стран и городов) иерархический
		'hierarchical'	=> true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		// 'rewrite'           => array( 'slug' => 'project-cat' ),
		'rewrite'           => true,
		// 'show_in_rest'      => true,
		
	);

	if (!taxonomy_exists( 'project-cat' )) {
		register_taxonomy('project-cat', array('project'), $args);
	}
	unset($args);
	unset($labels);
	// очищаем $args

    register_post_type('project', array(
		'labels'             => array(
			'name'               => 'Project', 
			'singular_name'      => 'Project', 
			'add_new'            => 'Add a project',
			'add_new_item'       => 'Add a new project',
			'edit_item'          => 'Edit project',
			'new_item'           => 'New project',
			'view_item'          => 'View project',
			'menu_name'          => 'Projects'
		  ),
		'public'     => false,
		'supports'   => array('title', 'editor'), //excerpt
        'menu_icon'  => 'dashicons-index-card',
        'menu_position' => 20,
        'show_ui' => true, 
		'rewrite'    => [
			'with_front' => false
		],
		// 'show_in_rest'  => true,
	));
    // END project

}
 
add_action( 'init', 'custom_register_post_type' );

//обновления ЧПУ после инициализации post type
function my_template_rewrite_rules(){
    my_template_rewrite_rukes();
    flush_rewrite_rules();
}

add_action('after_switch_theme', 'my_template_rewrite_rules');

