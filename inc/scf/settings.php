<?php
if (!defined('MY_THEME_SETTINGS')) {
	define('MY_THEME_SETTINGS', 'my-theme-settings');
}

function global_theme_settings($settings, $type, $id, $meta_type, $types)
{
	if ($type == MY_THEME_SETTINGS) {

		$Section = SCF::add_setting('asf_theme_settings', 'Theme settings');

		$Section->add_group(
			'theme_settings_field',
			false,
			array(
				array(
					'name'        => 'option__header__img',
					'label'       => 'Logo header',
					'type'        => 'image',
					'size'        => 'medium',
				),
				array(
					'name'        => 'option__header__label',
					'label'       => 'Label site in header',
					'type'        => 'text',
					'notes'       => 'use the <br> tag to wrap text on a new line',
				),
				array(
					'name'        => 'option__phone',
					'label'       => 'Phone',
					'type'        => 'text',
				),
				array(
					'name'        => 'option__policy',
					'label'       => 'Privacy Policy link',
					'type'        => 'text',
				),
				array(
					'type'        => 'image', // Тип поля. Обязательный.
					'name'        => 'option__logo__footer', // Ключ поля. Обязательный.
					'label'       => 'Logo footer', // Заголовок поля.
					'size'        => 'full', // Размер изображения в метабоксе.
					'instruction' => '', // Текст над полем.
					'notes'       => '', // Текст под полем.
				),
				array(
					'name'        => 'option__address',
					'label'       => 'Address',
					'type'        => 'text',
				),
				array(
					'name'        => 'option__email',
					'label'       => 'Email',
					'type'        => 'text',
				),
				array(
					'name'        => 'option__footer__btn',
					'label'       => 'Get Directions btn link',
					'type'        => 'text',
				),
				array(
					'type'        => 'wysiwyg', // Тип поля. Обязательный.
					'name'        => 'option__developed', // Ключ поля. Обязательный.
					'label'       => 'Developed', // Заголовок поля.
					'default'     => '', // Значение по умолчанию.
					'instruction' => '', // Текст над полем.
					'notes'       => '', // Текст под полем.
				),
				array(
					'type'        => 'image', // Тип поля. Обязательный.
					'name'        => 'option__no_img', // Ключ поля. Обязательный.
					'label'       => 'No img', // Заголовок поля.
					'size'        => 'medium', // Размер изображения в метабоксе.
					'instruction' => '', // Текст над полем.
					'notes'       => '', // Текст под полем.
				),
			)
		);

		$settings[] = $Section;
	}

	return $settings;
}
add_filter('smart-cf-register-fields', 'global_theme_settings', 10, 5);