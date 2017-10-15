<?php
/**
 * Created by PhpStorm.
 * User: david1
 * Date: 15/10/2017
 * Time: 00:07
 */
if( function_exists('acf_add_local_field_group') ):

	acf_add_local_field_group(array (
		'key' => 'group_590efa5491dc2',
		'title' => 'assets',
		'fields' => array (
			array (
				'key' => 'field_590efa5963485',
				'label' => 'links',
				'name' => 'link',
				'type' => 'url',
				'value' => NULL,
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'assets_post_type',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'acf_after_title',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => 1,
		'description' => '',
	));

endif;