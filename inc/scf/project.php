<?php
function project_fields($settings, $type, $id, $meta_type, $types)
{
	if ($type === 'project' && get_page_template_slug($id) == '') {

		$Section = SCF::add_setting('acf_project_thumbnails', 'Project thumbnails');

        $Section->add_group(
			'project__thumbnails',
			true,
			array(
                array(
                    'type'        => 'image', // Тип поля. Обязательный.
                    'name'        => 'project__thumb', // Ключ поля. Обязательный.
                    'label'       => 'Project thumb', // Заголовок поля.
                    'size'        => 'thumbnail', // Размер изображения в метабоксе.
                    'instruction' => '', // Текст над полем.
                    'notes'       => '', // Текст под полем.
                ),  
			)
		);

		$settings[] = $Section;
	}

	if ($type === 'project' && get_page_template_slug($id) == '') {

		$Section = SCF::add_setting('acf_project_settings', 'Project main settings');

		$Section->add_group(
			'project-settings',
			false,
			array(
                array(
                    'type'        => 'text', // Тип поля. Обязательный.
                    'name'        => 'project__title', // Ключ поля. Обязательный.
                    'label'       => 'Project title', // Заголовок поля.
                    'default'     => '', // Значение по умолчанию.
                    'instruction' => '', // Текст над полем.
                    'notes'       => '', // Текст под полем.
                ),
                array(
                    'type'        => 'text', // Тип поля. Обязательный.
                    'name'        => 'project__location', // Ключ поля. Обязательный.
                    'label'       => 'Project location', // Заголовок поля.
                    'default'     => '', // Значение по умолчанию.
                    'instruction' => '', // Текст над полем.
                    'notes'       => '', // Текст под полем.
                ),
                // array(
                //     'type'        => 'wysiwyg', // Тип поля. Обязательный.
                //     'name'        => 'project__excerpt', // Ключ поля. Обязательный.
                //     'label'       => 'Project excerpt', // Заголовок поля.
                //     'default'     => '', // Значение по умолчанию.
                //     'instruction' => '', // Текст над полем.
                //     'notes'       => '', // Текст под полем.
                // ),
                array(
                    'type'        => 'textarea', // Тип поля. Обязательный.
                    'name'        => 'project__excerpt', // Ключ поля. Обязательный.
                    'label'       => 'Project excerpt', // Заголовок поля.
                    'rows'        => 5, // Количество строк. По умолчанию 5.
                    'default'     => '', // Значение по умолчанию.
                    'instruction' => 'Wrap content in a tag <p>content</p>', // Текст над полем.
                    'notes'       => 'Example of content filling: <p>text</p>', // Текст под полем. 
                ),
                array(
                    'type'        => 'text', // Тип поля. Обязательный.
                    'name'        => 'project__link', // Ключ поля. Обязательный.
                    'label'       => 'Project link', // Заголовок поля.
                    'default'     => '', // Значение по умолчанию.
                    'instruction' => '', // Текст над полем.
                    'notes'       => '', // Текст под полем.
                ),
			)
		);

		$settings[] = $Section;
	}

    if ($type === 'project' && get_page_template_slug($id) == '') {

		$Section = SCF::add_setting('acf_project_gallery', 'Project gallery');

        $Section->add_group(
			'project__gallery',
			true,
			array(
                array(
                    'type'        => 'image', // Тип поля. Обязательный.
                    'name'        => 'gallery_item', // Ключ поля. Обязательный.
                    'label'       => 'Gallery item', // Заголовок поля.
                    'size'        => 'thumbnail', // Размер изображения в метабоксе.
                    'instruction' => '', // Текст над полем.
                    'notes'       => '', // Текст под полем.
                ),  
                array(
                    'type'            => 'radio', // Тип поля. Обязательный.
                    'name'            => 'gallery_radio', // Ключ поля. Обязательный.
                    'label'           => 'Before, after', // Заголовок поля.
                    'choices'         => array( // Массив с вариантами выбора.
                        'no' => 'no',
                        'before' => 'before',
                        'after' => 'after',
                    ),
                    'radio_direction' => 'horizontal', // или vertical. Вариант отображения пунктов.
                    'default'         => 'no', // Значение по умолчанию.
                ),
			)
		);

		$settings[] = $Section;
	}

    if ($type === 'project' && get_page_template_slug($id) == '') {

		$Section = SCF::add_setting('acf_project_map', 'Project map');

        $Section->add_group(
			'project_map',
			false,
			array(
                array(
                    'type'        => 'boolean', // Тип поля. Обязательный.
                    'name'        => 'project__boolean', // Ключ поля. Обязательный.
                    'label'       => 'Add a project to the map?', // Заголовок поля.
                    'default'     => '', // Значение по умолчанию.
                    'instruction' => '', // Текст над полем.
                    'notes'       => '', // Текст под полем.
                    'true_label'  => 'Yes', // Текст радио-кнопки (true)
                    'false_label' => 'No', // Текст радио-кнопки (false)
                ),

                array(
                    'type'        => 'text', // Тип поля. Обязательный.
                    'name'        => 'project__position_lat', // Ключ поля. Обязательный.
                    'label'       => 'Project position lat', // Заголовок поля.
                    'default'     => '', // Значение по умолчанию.
                    'instruction' => 'Setting for map, only numbers', // Текст над полем.
                    'notes'       => '34.003', // Текст под полем.
                ),
                array(
                    'type'        => 'text', // Тип поля. Обязательный.
                    'name'        => 'project__position_lng', // Ключ поля. Обязательный.
                    'label'       => 'Project position lng', // Заголовок поля.
                    'default'     => '', // Значение по умолчанию.
                    'instruction' => 'Setting for map, only numbers', // Текст над полем.
                    'notes'       => '-118.252', // Текст под полем.
                ),
                array(
                    'type'        => 'image', // Тип поля. Обязательный.
                    'name'        => 'project__marker', // Ключ поля. Обязательный.
                    'label'       => 'Project map marker', // Заголовок поля.
                    'size'        => 'Thumbnail', // Размер изображения в метабоксе.
                    'instruction' => 'Setting for map, select svg', // Текст над полем.
                    'notes'       => 'Recommended sizes svg: width="60" height="60"', // Текст под полем.
                ),
			)
		);



		$settings[] = $Section;
	}

	return $settings;
}
add_filter('smart-cf-register-fields', 'project_fields', 10, 5);