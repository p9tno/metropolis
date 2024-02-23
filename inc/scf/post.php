<?php
function posts_fields($settings, $type, $id, $meta_type, $types)
{
	if ($type === 'post' && get_page_template_slug($id) == '') {

		$Section = SCF::add_setting('acf_post_settings', 'Post settings');

		$Section->add_group(
			'post-settings',
			false,
			array(
                array(
                    'type'        => 'relation', // Тип поля. Обязательный.
                    'name'        => 'post_relation', // Ключ поля. Обязательный.
                    'label'       => 'Field with a selection of related records', // Заголовок поля.
                    'post-type'   => array('post'), // Типы записей.
                    'limit'       => 1, // Максимальное количество выбираемых элементов.
                ),
	
			)
		);

		$settings[] = $Section;
	}

	return $settings;
}
add_filter('smart-cf-register-fields', 'posts_fields', 10, 5);