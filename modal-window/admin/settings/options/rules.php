<?php


use ModalWindow\Settings_Helper;

defined( 'ABSPATH' ) || exit;

$show = [
	'general_start' => __( 'General', 'modal-window' ),
	'everywhere'    => __( 'Everywhere', 'modal-window' ),
	'shortcode'     => __( 'Shortcode', 'modal-window' ),
	'general_end'   => __( 'General', 'modal-window' ),
];

$args = [
	//region Display Rules
	'show' => [
		'type'  => 'select',
		'title' => __( 'Display', 'modal-window' ),
		'val'   => 'everywhere',
		'atts'  => $show,
	],
	//endregion



	//region Responsive Visibility
	'screen' => [
		'type'  => 'number',
		'title' => [
			'label'  => __( 'Hide on smaller screens', 'modal-window' ),
			'name'   => 'include_mobile',
			'toggle' => true,
		],
		'val'   => 480,
		'addon' => 'px',
	],

	'screen_more' => [
		'type'  => 'number',
		'title' => [
			'label'  => __( 'Hide on larger screens', 'modal-window' ),
			'name'   => 'include_more_screen',
			'toggle' => true,
		],
		'val'   => 1024,
		'addon' => 'px'
	],
	//endregion

];

return $args;
