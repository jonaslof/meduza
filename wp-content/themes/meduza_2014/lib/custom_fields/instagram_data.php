<?php 
/**
 * Instagram image data
 */
register_field_group(array (
	'id' => 'acf_instagram_data',
	'title' => 'Inläggsdata',
	'fields' => array (
		array (
			'key' => 'field_34212f8830701',
			'label' => 'Instagram ID',
			'name' => 'instagram_id',
			'type' => 'text',
			'formatting' => 'none',
			'maxlength' => '',
		),
		array (
			'key' => 'field_34212fae30702',
			'label' => 'Uppladdad datum',
			'name' => 'instagram_date',
			'type' => 'text',
			'formatting' => 'none',
			'maxlength' => '',
		),
		array (
			'key' => 'field_34212fcd30703',
			'label' => 'Länk till bild på Instagram',
			'name' => 'instagram_image_url',
			'type' => 'text',
			'default_value' => '',
			'formatting' => 'none',
			'maxlength' => '',
		),
		array (
			'key' => 'field_34212fcd30704',
			'label' => 'Uppladdad av',
			'name' => 'instagram_user',
			'type' => 'text',
			'default_value' => '',
			'formatting' => 'none',
			'maxlength' => '',
		),
		array (
			'key' => 'field_34212fcd30705',
			'label' => 'Antal likes',
			'name' => 'instagram_likes',
			'type' => 'text',
			'default_value' => '',
			'formatting' => 'none',
			'maxlength' => '',
		),
		array (
			'key' => 'field_34212fcd30706',
			'label' => 'Bildtext',
			'name' => 'instagram_text',
			'type' => 'text',
			'default_value' => '',
			'formatting' => 'none',
			'maxlength' => '',
		),
		array (
			'key' => 'field_34212fcd30707',
			'label' => 'Länk till inlägg på Instagram',
			'name' => 'instagram_link',
			'type' => 'text',
			'default_value' => '',
			'formatting' => 'none',
			'maxlength' => '',
		)
	),
	'location' => array (
		array (
			array (
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'instagram-image',
				'order_no' => 0,
				'group_no' => 0,
			),
		),
	),
	'options' => array (
		'position' => 'normal',
		'layout' => 'no_box',
		'hide_on_screen' => array (
		),
	),
	'menu_order' => 0,
));