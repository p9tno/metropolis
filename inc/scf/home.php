<?php
if (!defined('HOME_ID')) {
	$homeId = get_option('page_on_front');
	define('HOME_ID', $homeId);
}

function home_first_section_fields($settings, $type, $id, $meta_type, $types)
{
	if (HOME_ID == $id && $type === 'page') {

		$Section = SCF::add_setting('asf_homepage_firstscreen', 'First section');

		$Section->add_group(
			'first-section',
			false,
			array(
                array(
                    'type'        => 'text', // Тип поля. Обязательный.
                    'name'        => 'first__title', // Ключ поля. Обязательный.
                    'label'       => 'Title', // Заголовок поля.
                    'default'     => '', // Значение по умолчанию.
                    'instruction' => '', // Текст над полем.
                    'notes'       => '', // Текст под полем.
                ),
                array(
                    'type'        => 'textarea', // Тип поля. Обязательный.
                    'name'        => 'first__description', // Ключ поля. Обязательный.
                    'label'       => 'Description', // Заголовок поля.
                    'rows'        => 5, // Количество строк. По умолчанию 5.
                    'default'     => '', // Значение по умолчанию.
                    'instruction' => '', // Текст над полем.
                    'notes'       => '', // Текст под полем.
                ),
                array(
                    'type'        => 'text', // Тип поля. Обязательный.
                    'name'        => 'first__doc', // Ключ поля. Обязательный.
                    'label'       => 'Link to file', // Заголовок поля.
                    'default'     => '', // Значение по умолчанию.
                    'instruction' => 'upload the file to media, copy the link to it and paste it into the field', // Текст над полем.
                    'notes'       => 'Example: /wp-content/uploads/filename', // Текст под полем.
                ),
                array(
					'name'        => 'first__bg',
					'label'       => 'Section background',
					'type'        => 'image',
					'size'        => 'medium',
				),
                array(
                    'type'        => 'text', // Тип поля. Обязательный.
                    'name'        => 'first__video', // Ключ поля. Обязательный.
                    'label'       => 'Link to video', // Заголовок поля.
                    'default'     => '', // Значение по умолчанию.
                    'instruction' => 'upload the file to media, copy the link to it and paste it into the field', // Текст над полем.
                    'notes'       => 'Example: /wp-content/uploads/filename', // Текст под полем.
                ),
                array(
                    'type'        => 'text', // Тип поля. Обязательный.
                    'name'        => 'first__audio', // Ключ поля. Обязательный.
                    'label'       => 'Link to audio', // Заголовок поля.
                    'default'     => '', // Значение по умолчанию.
                    'instruction' => 'upload the file to media, copy the link to it and paste it into the field', // Текст над полем.
                    'notes'       => 'Example: /wp-content/uploads/filename', // Текст под полем.
                ),
			)
		);
		$settings[] = $Section;
	}

	if (HOME_ID == $id && $type === 'page') {

		$Section = SCF::add_setting('asf_homepage_start', 'Start section');

		$Section->add_group(
			'start-section',
			false,
			array(
                array(
                    'type'        => 'text', // Тип поля. Обязательный.
                    'name'        => 'start__label', // Ключ поля. Обязательный.
                    'label'       => 'Label', // Заголовок поля.
                ),
                array(
                    'type'        => 'text', // Тип поля. Обязательный.
                    'name'        => 'start__title', // Ключ поля. Обязательный.
                    'label'       => 'Title', // Заголовок поля.
                ),
                array(
                    'type'        => 'textarea', // Тип поля. Обязательный.
                    'name'        => 'start__description', // Ключ поля. Обязательный.
                    'label'       => 'Description', // Заголовок поля.
                    'rows'        => 5, // Количество строк. По умолчанию 5.
                ),
                array(
					'name'        => 'start__bg__desktop',
					'label'       => 'Section background desktop',
					'type'        => 'image',
					'size'        => 'medium',
				),
                array(
					'name'        => 'start__bg__mobile',
					'label'       => 'Section background mobile',
					'type'        => 'image',
					'size'        => 'medium',
				),
                array(
                    'type'        => 'text', // Тип поля. Обязательный.
                    'name'        => 'start__btn', // Ключ поля. Обязательный.
                    'label'       => 'Btn link', // Заголовок поля.
                ),
			)
		);
		$settings[] = $Section;
	}

	if (HOME_ID == $id && $type === 'page') {

		$Section = SCF::add_setting('asf_homepage_programs', 'Programs section');

		$Section->add_group(
			'programs-section',
			false,
			array(
                array(
                    'type'        => 'text', // Тип поля. Обязательный.
                    'name'        => 'programs__label', // Ключ поля. Обязательный.
                    'label'       => 'Label', // Заголовок поля.
                ),
                array(
                    'type'        => 'text', // Тип поля. Обязательный.
                    'name'        => 'programs__title', // Ключ поля. Обязательный.
                    'label'       => 'Title', // Заголовок поля.
                ),
                array(
                    'type'        => 'text', // Тип поля. Обязательный.
                    'name'        => 'programs__btn', // Ключ поля. Обязательный.
                    'label'       => 'Btn link', // Заголовок поля.
                ),
			)
		);
        $Section->add_group(
			'programs-list',
			true,
			array(
                array(
                    'type'        => 'text', // Тип поля. Обязательный.
                    'name'        => 'item_title', // Ключ поля. Обязательный.
                    'label'       => 'Item title', // Заголовок поля.
                    'notes'       => 'use the <br> tag to wrap text on a new line',
                ),
                array(
                    'type'        => 'text', // Тип поля. Обязательный.
                    'name'        => 'item_delay', // Ключ поля. Обязательный.
                    'label'       => 'animation delay', // Заголовок поля.
                    'notes'       => 'only numbers (recommended value from 0 to 20)',
                    'default'     => '0', 
                ),
                array(
                    'type'            => 'radio', // Тип поля. Обязательный.
                    'name'            => 'item_size', // Ключ поля. Обязательный.
                    'label'           => 'Item size', // Заголовок поля.
                    'choices'         => array( // Массив с вариантами выбора.
                        'sm' => 'sm',
                        'md' => 'md',
                        'lg' => 'lg',
                    ),
                    'radio_direction' => 'horizontal', // или vertical. Вариант отображения пунктов.
                    'default'         => 'sm', // Значение по умолчанию.
                ),
			)
		);
		$settings[] = $Section;
	}

	if (HOME_ID == $id && $type === 'page') {

		$Section = SCF::add_setting('asf_homepage_understanding', 'Understanding section');

		$Section->add_group(
			'understanding-section',
			false,
			array(
                array(
                    'type'        => 'text', // Тип поля. Обязательный.
                    'name'        => 'understanding__label', // Ключ поля. Обязательный.
                    'label'       => 'Label', // Заголовок поля.
                ),
                array(
                    'type'        => 'text', // Тип поля. Обязательный.
                    'name'        => 'understanding__title', // Ключ поля. Обязательный.
                    'label'       => 'Title', // Заголовок поля.
                ),
                array(
                    'type'        => 'textarea', // Тип поля. Обязательный.
                    'name'        => 'understanding__description', // Ключ поля. Обязательный.
                    'label'       => 'Description', // Заголовок поля.
                    'rows'        => 10, // Количество строк. По умолчанию 5.
                ),
                array(
					'name'        => 'understanding__bg',
					'label'       => 'Section background',
					'type'        => 'image',
					'size'        => 'medium',
				),
                array(
                    'type'        => 'text', // Тип поля. Обязательный.
                    'name'        => 'understanding__video', // Ключ поля. Обязательный.
                    'label'       => 'Link to video', // Заголовок поля.
                    'default'     => '', // Значение по умолчанию.
                    'instruction' => 'upload the file to media, copy the link to it and paste it into the field', // Текст над полем.
                    'notes'       => 'Example: /wp-content/uploads/filename', // Текст под полем.
                ),
                array(
                    'type'        => 'text', // Тип поля. Обязательный.
                    'name'        => 'understanding__btn__help', // Ключ поля. Обязательный.
                    'label'       => 'Btn Get Help link', // Заголовок поля.
                ),
                array(
                    'type'        => 'text', // Тип поля. Обязательный.
                    'name'        => 'understanding__btn__admissions', // Ключ поля. Обязательный.
                    'label'       => 'Btn Admissions link', // Заголовок поля.
                ),
			)
		);
		$settings[] = $Section;
	}

	if (HOME_ID == $id && $type === 'page') {

		$Section = SCF::add_setting('asf_homepage_facility', 'Facility section');
        
		$Section->add_group(
			'facility-section',
			false,
			array(
                array(
                    'type'        => 'text', // Тип поля. Обязательный.
                    'name'        => 'facility__label', // Ключ поля. Обязательный.
                    'label'       => 'Label', // Заголовок поля.
                ),
                array(
                    'type'        => 'text', // Тип поля. Обязательный.
                    'name'        => 'facility__title', // Ключ поля. Обязательный.
                    'label'       => 'Title', // Заголовок поля.
                ),
			)
		);

		$Section->add_group(
			'facility-list',
			true,
			array(
                array(
                    'type'            => 'select', // Тип поля. Обязательный.
                    'name'            => 'facility__select__icon', // Ключ поля. Обязательный.
                    'label'           => 'Icon', // Заголовок поля.
                    'choices'         => array( // Массив с вариантами выбора.
                        'facebook' => 'facebook',
                        'link' => 'link',
                        'instagram' => 'instagram',
                        'twitter' => 'twitter',
                        'quotes' => 'quotes',
                        'heart' => 'heart',
                        'hand' => 'hand',
                        'date' => 'date',
                        'star' => 'star',
                        'share' => 'share',
                        'eye' => 'eye',
                        'person' => 'person',
                        'file' => 'file',
                        'hotel' => 'hotel',
                        'email' => 'email',
                        'sport' => 'sport',
                        'apple' => 'apple',
                        'chat' => 'chat',
                        'clock' => 'clock',
                        'speaker' => 'speaker',
                        'phone' => 'phone',
                    ),
                ),
                array(
                    'type'        => 'text', // Тип поля. Обязательный.
                    'name'        => 'facility__text', // Ключ поля. Обязательный.
                    'label'       => 'Text', // Заголовок поля.
                ),
                array(
					'name'        => 'facility__image',
					'label'       => 'Section image',
					'type'        => 'image',
					'size'        => 'medium',
				),
			)
		);
		$settings[] = $Section;
	}

	if (HOME_ID == $id && $type === 'page') {

		$Section = SCF::add_setting('asf_homepage_mission', 'Mission section');

		$Section->add_group(
			'mission-section',
			false,
			array(
                array(
                    'type'        => 'text', // Тип поля. Обязательный.
                    'name'        => 'mission__label', // Ключ поля. Обязательный.
                    'label'       => 'Label', // Заголовок поля.
                ),
                array(
                    'type'        => 'text', // Тип поля. Обязательный.
                    'name'        => 'mission__title', // Ключ поля. Обязательный.
                    'label'       => 'Title', // Заголовок поля.
                ),
			)
		);

		$Section->add_group(
			'mission-list',
			true,
			array(
                array(
                    'type'        => 'text', // Тип поля. Обязательный.
                    'name'        => 'title', // Ключ поля. Обязательный.
                    'label'       => 'Title', // Заголовок поля.
                ),
                array(
                    'type'        => 'text', // Тип поля. Обязательный.
                    'name'        => 'desc', // Ключ поля. Обязательный.
                    'label'       => 'Description', // Заголовок поля.
                    'notes'       => 'use the <br> tag to wrap text on a new line',
                ),
                array(
					'name'        => 'image',
					'label'       => 'Section image',
					'type'        => 'image',
					'size'        => 'thumbnail',
				),
			)
		);
		$settings[] = $Section;
	}

	if (HOME_ID == $id && $type === 'page') {

		$Section = SCF::add_setting('asf_homepage_review', 'Review section');

		$Section->add_group(
			'review-section',
			false,
			array(
                array(
					'name'        => 'review__bg__desktop',
					'label'       => 'Background desktop',
					'type'        => 'image',
					'size'        => 'medium',
				),
                array(
					'name'        => 'review__bg__mobile',
					'label'       => 'Background mobile',
					'type'        => 'image',
					'size'        => 'medium',
				),
                // array(
                //     'type'        => 'relation', // Тип поля. Обязательный.
                //     'name'        => 'review_relation', // Ключ поля. Обязательный.
                //     'label'       => 'Field with a selection of related records', // Заголовок поля.
                //     'post-type'   => array('review'), // Типы записей.
                //     'limit'       => 0, // Максимальное количество выбираемых элементов.
                //     'instruction' => '', // Текст над полем.
                //     'notes'       => '', // Текст под полем.
                // ),
         
			)
		);

		$settings[] = $Section;
	}

	if (HOME_ID == $id && $type === 'page') {

		$Section = SCF::add_setting('asf_homepage_faq', 'FAQ section');

		$Section->add_group(
			'faq-section',
			false,
			array(
                array(
                    'type'        => 'text', // Тип поля. Обязательный.
                    'name'        => 'faq__title', // Ключ поля. Обязательный.
                    'label'       => 'Title', // Заголовок поля.
                ),
			)
		);

		$Section->add_group(
			'faq-list',
			true,
			array(
                array(
                    'type'        => 'text', // Тип поля. Обязательный.
                    'name'        => 'question', // Ключ поля. Обязательный.
                    'label'       => 'Question', // Заголовок поля.
                ),
                array(
                    'type'        => 'textarea', // Тип поля. Обязательный.
                    'name'        => 'answer', // Ключ поля. Обязательный.
                    'label'       => 'Answer', // Заголовок поля.
                    'rows'        => 5, // Количество строк. По умолчанию 5.
                ),
			)
		);

        $Section->add_group(
			'faq-form',
			false,
			array(
                array(
                    'type'        => 'text', // Тип поля. Обязательный.
                    'name'        => 'faq_form_title', // Ключ поля. Обязательный.
                    'label'       => 'Form title', // Заголовок поля.
                    'notes'       => 'use the <br> tag to wrap text on a new line',
                ),
                array(
					'name'        => 'faq__bg',
					'label'       => 'Form background',
					'type'        => 'image',
					'size'        => 'medium',
				),
                array(
                    'type'        => 'text', // Тип поля. Обязательный.
                    'name'        => 'faq_form__video', // Ключ поля. Обязательный.
                    'label'       => 'Form link to video', // Заголовок поля.
                    'default'     => '', // Значение по умолчанию.
                    'instruction' => 'upload the file to media, copy the link to it and paste it into the field', // Текст над полем.
                    'notes'       => 'Example: /wp-content/uploads/filename', // Текст под полем.
                ),
			)
		);
		$settings[] = $Section;
	}

	if (HOME_ID == $id && $type === 'page') {

		$Section = SCF::add_setting('asf_homepage_ourblog', 'Our blog section');

		$Section->add_group(
			'ourblog-section',
			false,
			array(
                array(
                    'type'        => 'text', // Тип поля. Обязательный.
                    'name'        => 'ourblog__label', // Ключ поля. Обязательный.
                    'label'       => 'Label', // Заголовок поля.
                ),
                array(
                    'type'        => 'text', // Тип поля. Обязательный.
                    'name'        => 'ourblog__title', // Ключ поля. Обязательный.
                    'label'       => 'Title', // Заголовок поля.
                ),
                array(
                    'type'        => 'relation', // Тип поля. Обязательный.
                    'name'        => 'ourblog_relation', // Ключ поля. Обязательный.
                    'label'       => 'Field with a selection of related records', // Заголовок поля.
                    'post-type'   => array('post'), // Типы записей.
                    'limit'       => -1, // Максимальное количество выбираемых элементов.
                    'instruction' => '', // Текст над полем.
                    'notes'       => '', // Текст под полем.
                ),
                array(
                    'type'        => 'text', // Тип поля. Обязательный.
                    'name'        => 'ourblog__btn', // Ключ поля. Обязательный.
                    'label'       => 'Btn link', // Заголовок поля.
                    'notes'       => 'The button is only visible on a mobile device'
                ),

			)
		);

		$settings[] = $Section;
	}

	return $settings;
}
add_filter('smart-cf-register-fields', 'home_first_section_fields', 1, 5);
