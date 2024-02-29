<?php
function recall_fields($settings, $type, $id, $meta_type, $types)
{
    if ($type === 'testimonials' && get_page_template_slug($id) == '') {

		$Section = SCF::add_setting('acf_testimonials_settings', '<span>Testimonials main settings. <span style="color:#517DC0;">Only 1 and every 9 elements can display content and video in one element. On the testimonials page</span></span>');

		$Section->add_group(
			'testimonials-settings',
			false,
			array(
                array(
                    'type'        => 'text', // Тип поля. Обязательный.
                    'name'        => 'person__title', // Ключ поля. Обязательный.
                    'label'       => 'Person title', // Заголовок поля.
                    'default'     => '', // Значение по умолчанию.
                    'instruction' => '', // Текст над полем.
                    'notes'       => '', // Текст под полем.
                ),
                array(
                    'type'        => 'text', // Тип поля. Обязательный.
                    'name'        => 'person__desc', // Ключ поля. Обязательный.
                    'label'       => 'Person desc', // Заголовок поля.
                    'default'     => '', // Значение по умолчанию.
                    'instruction' => '', // Текст над полем.
                    'notes'       => '', // Текст под полем.
                ),
                array(
                    'type'        => 'image', // Тип поля. Обязательный.
                    'name'        => 'person__img', // Ключ поля. Обязательный.
                    'label'       => 'Person img', // Заголовок поля.
                    'size'        => 'thumbnail', // Размер изображения в метабоксе.
                    'instruction' => '', // Текст над полем.
                    'notes'       => '', // Текст под полем.
                ),
  
			)
		);

		$settings[] = $Section;
	}
    if ($type === 'testimonials' && get_page_template_slug($id) == '') {

		$Section = SCF::add_setting('acf_testimonials_youtube', '<span>Testimonials youtube. If you fill out this block, all other data will <span style="color:#517DC0;">not be displayed</span>. Only 1 and every 9 elements оn the testimonials page.</span>');

		$Section->add_group(
			'testimonials-video',
			false,
			array(
                array(
                    'type'        => 'text', // Тип поля. Обязательный.
                    'name'        => 'id_youtube_video', // Ключ поля. Обязательный.
                    'label'       => 'ID video', // Заголовок поля.
                    'default'     => '', // Значение по умолчанию.
                    'instruction' => 'ID is the set of characters after "watch?v=" in the browser line. As an example from the line https://www.youtube.com/watch?v=yCChjRhpV64 , id= yCChjRhpV64', // Текст над полем.
                    'notes'       => 'yCChjRhpV64', // Текст под полем.
                ),
                array(
                    'type'        => 'image', // Тип поля. Обязательный.
                    'name'        => 'bg_youtube_video', // Ключ поля. Обязательный.
                    'label'       => 'Background video', // Заголовок поля.
                    'size'        => 'thumbnail', // Размер изображения в метабоксе.
                    'instruction' => '', // Текст над полем.
                    'notes'       => '', // Текст под полем.
                ),
  
			)
		);

		$settings[] = $Section;
	}
	if ($type === 'testimonials' && get_page_template_slug($id) == '') {

		$Section = SCF::add_setting('acf_testimonials_gallery', '<span>Testimonials gallery. Will appear in all elements, <span style="color:#517DC0;">except 1 and every 9.</span></span> ');

        $Section->add_group(
			'recall__slider',
			true,
			array(
                array(
                    'type'        => 'image', // Тип поля. Обязательный.
                    'name'        => 'recall_img', // Ключ поля. Обязательный.
                    'label'       => 'Item', // Заголовок поля.
                    'size'        => 'thumbnail', // Размер изображения в метабоксе.
                    'instruction' => '', // Текст над полем.
                    'notes'       => '', // Текст под полем.
                ),  
			)
		);

		$settings[] = $Section;
	}
	return $settings;
}
add_filter('smart-cf-register-fields', 'recall_fields', 10, 5);