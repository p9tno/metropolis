<?php
if ( ! defined( 'POST_TYPE_NAME' ) ) {
	define( 'POST_TYPE_NAME', 'page' );
}

if ( ! defined( 'PAGE_TEMPL_BLOG' ) ) {
	define( 'PAGE_TEMPL_BLOG', 'template-blog.php' );
}

function our_blog_section_fields($settings, $type, $id, $meta_type, $types)
{
    if ( $type === POST_TYPE_NAME ) {
		if ( get_page_template_slug( $id ) == PAGE_TEMPL_BLOG ) {

			$Setting = SCF::add_setting( 'asf_head_blog', 'Settings head blog' );
			$Setting->add_group(
				'head_blog_id',
				false,
				array(
                    array(
                        'type'        => 'relation', // Тип поля. Обязательный.
                        'name'        => 'head_blog_relation', // Ключ поля. Обязательный.
                        'label'       => 'Field with a selection of related records', // Заголовок поля.
                        'post-type'   => array('post'), // Типы записей.
                        'limit'       => 1, // Максимальное количество выбираемых элементов.
                    ),

				) 
			);

			$settings[] = $Setting;
		}
	}

    if ( $type === POST_TYPE_NAME ) {
		if ( get_page_template_slug( $id ) == PAGE_TEMPL_BLOG ) {

			$Setting = SCF::add_setting( 'asf_main_blog', 'Settings main blog' );
			$Setting->add_group(
				'main_blog_id',
				false,
				array(
                    array(
                        'type'        => 'text', // Тип поля. Обязательный.
                        'name'        => 'main_blog_posts_per_page', // Ключ поля. Обязательный.
                        'label'       => 'Posts per page', // Заголовок поля.
                        'notes'       => 'Only numbers',
                        'default'     => '4',
                    ),
                    array(
                        'type'        => 'taxonomy',
                        'name'        => 'main_blog_taxonomy', 
                        'label'       => 'Select a category', 
                        'taxonomy'   => array(), 
                        // 'limit'       => 1, 
                    ),

				) 
			);

			$settings[] = $Setting;
		}
	}

    if ( $type === POST_TYPE_NAME ) {
		if ( get_page_template_slug( $id ) == PAGE_TEMPL_BLOG ) {

			$Setting = SCF::add_setting( 'asf_bootom_blog', 'Settings bootom blog' );

            $Setting->add_group(
			    'head_blog_up_id',
				false,
				array(
                    array(
                        'type'        => 'relation', // Тип поля. Обязательный.
                        'name'        => 'bootom_blog_relation', // Ключ поля. Обязательный.
                        'label'       => 'Field with a selection of related records', // Заголовок поля.
                        'post-type'   => array('post'), // Типы записей.
                        'limit'       => 1, // Максимальное количество выбираемых элементов.
                    ),
				) 
			);

			$Setting->add_group(
				'bootom_blog_down_id',
				false,
				array(
                    array(
                        'type'        => 'text', // Тип поля. Обязательный.
                        'name'        => 'bootom_blog_posts_per_page', // Ключ поля. Обязательный.
                        'label'       => 'Posts per page', // Заголовок поля.
                        'notes'       => 'Only numbers',
                        'default'     => '4',
                    ),
                    array(
                        'type'        => 'taxonomy',
                        'name'        => 'bootom_blog_taxonomy', 
                        'label'       => 'Select a category', 
                        'taxonomy'   => array(), 
                        // 'limit'       => 1, 
                    ),
				) 
			);

			$settings[] = $Setting;
		}
	}

    if ( $type === POST_TYPE_NAME ) {
		if ( get_page_template_slug( $id ) == PAGE_TEMPL_BLOG ) {

			$Setting = SCF::add_setting( 'asf_feedback', 'Feedback section' );

            $Setting->add_group(
			    'feedback-section',
				false,
				array(
                    array(
                        'type'        => 'text',
                        'name'        => 'feedback__title', 
                        'label'       => 'Title', 
                    ),
                    array(
                        'type'        => 'textarea', 
                        'name'        => 'feedback__description', 
                        'label'       => 'Description', 
                        'rows'        => 2, 
                    ),
                    array(
                        'name'        => 'feedback__image',
                        'label'       => 'Section image',
                        'type'        => 'image',
                        'size'        => 'medium',
                    ),
            
				) 
			);

			$settings[] = $Setting;
		}
	}

	return $settings;
}
add_filter('smart-cf-register-fields', 'our_blog_section_fields', 10, 5);
