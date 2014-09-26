<?php
/**
 * Instagram users
 */
register_field_group(array (
	'id' => 'acf_instagram-anvandare',
	'title' => 'Instagram användare',
	'fields' => array (
		array (
			'key' => 'field_54218df234873',
			'label' => 'Visa bilder från',
			'name' => 'page_instagram_users',
			'type' => 'relationship',
			'return_format' => 'id',
			'post_type' => array (
				0 => 'coworker',
			),
			'taxonomy' => array (
				0 => 'all',
			),
			'filters' => array (
				0 => 'search',
			),
			'result_elements' => array (
				0 => 'featured_image',
				1 => 'post_title',
			),
			'max' => '',
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'page_template',
				'operator' => '==',
				'value' => 'page-tpl-instagram.php',
				'order_no' => 0,
				'group_no' => 0,
			),
		),
	),
	'options' => array (
		'position' => 'normal',
		'layout' => 'default',
		'hide_on_screen' => array (
		),
	),
	'menu_order' => 0,
));