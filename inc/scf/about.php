<?php

if ( ! defined( 'PAGE_TEMPL_ABOUT' ) ) {
	define( 'PAGE_TEMPL_ABOUT', 'template-about.php' );
}

function admissions_about_fields($settings, $type, $id, $meta_type, $types)
{
    if ( $type === 'page' ) {
		if ( get_page_template_slug( $id ) == PAGE_TEMPL_ABOUT ) {

			$Setting = SCF::add_setting( 'asf_head_about', 'Head about section' );
			$Setting->add_group(
				'head_about_id',
				false,
				array (
                    array(
                        'type'        => 'text', // Тип поля. Обязательный.
                        'name'        => 'head__about__title', // Ключ поля. Обязательный.
                        'label'       => 'Title', // Заголовок поля.
                    ),
                    array(
                        'type'        => 'textarea', // Тип поля. Обязательный.
                        'name'        => 'head__about__description', // Ключ поля. Обязательный.
                        'label'       => 'Description', // Заголовок поля.
                        'rows'        => 5, // Количество строк. По умолчанию 5.
                    ),
                    array(
                        'name'        => 'head__about__img',
                        'label'       => 'Section image',
                        'type'        => 'image',
                        'size'        => 'medium',
                    ),
                    array(
                        'type'        => 'text', // Тип поля. Обязательный.
                        'name'        => 'head_about_help', // Ключ поля. Обязательный.
                        'label'       => 'Link: connect for help', // Заголовок поля.
                    ),
        
				) 
			);

			$settings[] = $Setting;
		}
	}

    if ( $type === 'page' ) {
		if ( get_page_template_slug( $id ) == PAGE_TEMPL_ABOUT ) {

			$Setting = SCF::add_setting( 'asf_advantage', 'Advantage section' );

			$Setting->add_group(
				'advantage_id',
				false,
				array (
                    array(
                        'type'        => 'text', // Тип поля. Обязательный.
                        'name'        => 'advantage__label', // Ключ поля. Обязательный.
                        'label'       => 'Label', // Заголовок поля.
                    ),
                    array(
                        'type'        => 'text', // Тип поля. Обязательный.
                        'name'        => 'advantage__title', // Ключ поля. Обязательный.
                        'label'       => 'Title', // Заголовок поля.
                    ),
				) 
			);

			$Setting->add_group(
				'advantage_list',
				true,
				array (
                    array(
                        'type'        => 'textarea', // Тип поля. Обязательный.
                        'name'        => 'advantage__content', // Ключ поля. Обязательный.
                        'label'       => 'Content', // Заголовок поля.
                        'rows'        => 5,
                        'notes'       => 'For boldness, use the <b>text</b>'
                    ),
                    array(
                        'name'        => 'advantage__image',
                        'label'       => 'Image',
                        'type'        => 'image',
                        'size'        => 'thumbnail',
                    ),
				) 
			);

			$settings[] = $Setting;
		}
	}

    if ( $type === 'page' ) {
		if ( get_page_template_slug( $id ) == PAGE_TEMPL_ABOUT ) {

			$Setting = SCF::add_setting( 'asf_advantage_form', 'Advantage form section' );

			$Setting->add_group(
				'advantage_form_id',
				false,
				array (
                    array(
                        'type'        => 'text', // Тип поля. Обязательный.
                        'name'        => 'advantage_form__title', // Ключ поля. Обязательный.
                        'label'       => 'Title form', // Заголовок поля.
                        'notes'       => 'use the <br> tag to wrap text on a new line',
                    ),
                    array(
                        'name'        => 'advantage_form__bg',
                        'label'       => 'Background form',
                        'type'        => 'image',
                        'size'        => 'medium',
                    ),
                    array(
                        'type'        => 'text', // Тип поля. Обязательный.
                        'name'        => 'advantage_form__video', // Ключ поля. Обязательный.
                        'label'       => 'Form link to video', // Заголовок поля.
                        'default'     => '', // Значение по умолчанию.
                        'instruction' => 'upload the file to media, copy the link to it and paste it into the field', // Текст над полем.
                        'notes'       => 'Example: /wp-content/uploads/filename', // Текст под полем.
                    ),
				) 
			);

			$settings[] = $Setting;
		}
	}

    if ( $type === 'page' ) {
		if ( get_page_template_slug( $id ) == PAGE_TEMPL_ABOUT ) {

			$Setting = SCF::add_setting( 'asf_certificates', 'Certificates section' );

			$Setting->add_group(
				'certificates_id',
				false,
				array (
                    array(
                        'type'        => 'text', // Тип поля. Обязательный.
                        'name'        => 'certificates__label', // Ключ поля. Обязательный.
                        'label'       => 'Label', // Заголовок поля.
                    ),
                    array(
                        'type'        => 'text', // Тип поля. Обязательный.
                        'name'        => 'certificates__title', // Ключ поля. Обязательный.
                        'label'       => 'Title', // Заголовок поля.
                        'notes'       => 'use the <br> tag to wrap text on a new line',
                    ),
    
				) 
			);

			$Setting->add_group(
				'certificates_list',
				true,
				array (
                    array(
                        'type'        => 'text', // Тип поля. Обязательный.
                        'name'        => 'certificates__item__link', // Ключ поля. Обязательный.
                        'label'       => 'Item_link', // Заголовок поля.
                    ),
                    array(
                        'type'        => 'text', // Тип поля. Обязательный.
                        'name'        => 'certificates__item__title', // Ключ поля. Обязательный.
                        'label'       => 'Item title', // Заголовок поля.
                    ),
    
				) 
			);

			$settings[] = $Setting;
		}
	}

    if ( $type === 'page' ) {
		if ( get_page_template_slug( $id ) == PAGE_TEMPL_ABOUT ) {

			$Setting = SCF::add_setting( 'asf_certificates_slider', 'Certificates slider' );

			$Setting->add_group(
				'certificates_slider',
				true,
				array (
                    array(
                        'type'        => 'text', // Тип поля. Обязательный.
                        'name'        => 'certificates__slider__title', // Ключ поля. Обязательный.
                        'label'       => 'Document title', // Заголовок поля.
                    ),
                    array(
                        'name'        => 'certificates__slider__img',
                        'label'       => 'Document image',
                        'type'        => 'image',
                        'size'        => 'medium',
                    ),
    
				) 
			);

			$settings[] = $Setting;
		}
	}

    if ( $type === 'page' ) {
		if ( get_page_template_slug( $id ) == PAGE_TEMPL_ABOUT ) {

			$Section = SCF::add_setting('asf_aboutpage_ourblog', 'Our blog section');

            $Section->add_group(
                'ourblog-aboutpage-section',
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
	}

	return $settings;
}
add_filter('smart-cf-register-fields', 'admissions_about_fields', 10, 5);
