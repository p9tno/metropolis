<?php
function reviews_fields($settings, $type, $id, $meta_type, $types)
{
	if ($type === 'review' && get_page_template_slug($id) == '') {

		$Section = SCF::add_setting('acf_review_settings', 'Review settings');

		$Section->add_group(
			'review-settings',
			false,
			array(
				array(
					'type'            => 'radio',
					'name'            => 'review__stars',
					'label'           => 'Star rating',
					'choices'         => array(
						'1' => '1',
						'2' => '2',
						'3' => '3',
						'4' => '4',
						'5' => '5',
					),
					'check_direction' => 'horizontal',
                    'default'         => '5'
				),
				array(
					'name'        => 'review__text',
					'label'       => 'Review text',
					'type'        => 'textarea',
				),
			)
		);

		$settings[] = $Section;
	}

	return $settings;
}
add_filter('smart-cf-register-fields', 'reviews_fields', 10, 5);