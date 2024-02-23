<?php

if ( ! defined( 'PAGE_TEMPL_ADMISSIONS' ) ) {
	define( 'PAGE_TEMPL_ADMISSIONS', 'template-admissions.php' );
}

function admissions_section_fields($settings, $type, $id, $meta_type, $types)
{
    if ( $type === 'page' ) {
		if ( get_page_template_slug( $id ) == PAGE_TEMPL_ADMISSIONS ) {

			$Setting = SCF::add_setting( 'asf_head_admissions', 'Head admissions section' );
			$Setting->add_group(
				'head_admissions_id',
				false,
				array (
                    array(
                        'type'        => 'text', // Тип поля. Обязательный.
                        'name'        => 'head__admissions__title', // Ключ поля. Обязательный.
                        'label'       => 'Title', // Заголовок поля.
                    ),
                    array(
                        'type'        => 'textarea', // Тип поля. Обязательный.
                        'name'        => 'head__admissions__description', // Ключ поля. Обязательный.
                        'label'       => 'Description', // Заголовок поля.
                        'rows'        => 5, // Количество строк. По умолчанию 5.
                    ),
                    array(
                        'name'        => 'head__admissions__img',
                        'label'       => 'Section image',
                        'type'        => 'image',
                        'size'        => 'medium',
                    ),
        
				) 
			);

			$settings[] = $Setting;
		}
	}

    if ( $type === 'page' ) {
		if ( get_page_template_slug( $id ) == PAGE_TEMPL_ADMISSIONS ) {

			$Setting = SCF::add_setting( 'asf_info', 'Info section' );
			$Setting->add_group(
				'info_id',
				false,
				array (
                    array(
                        'type'        => 'text', // Тип поля. Обязательный.
                        'name'        => 'info__title', // Ключ поля. Обязательный.
                        'label'       => 'Title', // Заголовок поля.
                    ),
                    array(
                        'type'        => 'wysiwyg', // Тип поля. Обязательный.
                        'name'        => 'info__description', // Ключ поля. Обязательный.
                        'label'       => 'Description', // Заголовок поля.
                    ),
        
				) 
			);

			$settings[] = $Setting;
		}
	}

	return $settings;
}
add_filter('smart-cf-register-fields', 'admissions_section_fields', 10, 5);
