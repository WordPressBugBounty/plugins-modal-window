<?php

use ModalWindow\Settings_Helper;

defined( 'ABSPATH' ) || exit;

return [
	//region Triggers
	'modal_show' => [
		'type' => 'select',
		'title'   => esc_attr__( 'Trigger Types', 'modal-window' ),
		'value' => 'auto',
		'atts' => [
			'click'        => esc_attr__('Click', 'modal-window'),
			'load'         => esc_attr__('Auto', 'modal-window'),
			'hover'        => esc_attr__('Hover', 'modal-window'),
			'close'        => esc_attr__('Exit', 'modal-window'),
			'scroll'       => esc_attr__('Scrolled', 'modal-window'),
		],
	],

	'modal_timer' => [
		'type' => 'number',
		'title'   => esc_attr__( 'Delay time', 'modal-window' ),
		'val' => 0,
		'atts' => [
			'min'   => '0',
			'step'        => '0.1',
		],
		'addon'   => 'sec',
	],

	'reach_window' => [
		'type' => 'number',
		'title'   => esc_attr__( 'Scroll distance', 'modal-window' ),
		'val' => 0,
		'atts' => [
			'min'   => '0',
		],
		'addon'   => [
			'type' => 'select',
			'val' => 'px',
			'name' => 'reach_window_unit',
			'atts' => [
				'px' => esc_attr__( 'px', 'modal-window' ),
				'%' => esc_attr__( '%', 'modal-window' ),
			]
		],
	],

	'use_cookies' => [
		'type' => 'select',
		'title'   => esc_attr__( 'Show only once', 'modal-window' ),
		'val' => 'no',
		'atts' => [
			'no' => esc_attr__( 'no', 'modal-window' ),
			'yes' => esc_attr__( 'yes', 'modal-window' ),
		],
	],

	'modal_cookies' => [
		'type' => 'number',
		'title' => __( 'Reset', 'modal-window' ),
		'val' => '1',
		'atts' => [
			'min'   => '0',
			'step'   => '0.01',
		],
		'addon' => 'days',
	],
	//endregion

	//region CLose Popup
	'close_button_overlay' => [
		'type' => 'checkbox',
		'title'   => esc_attr__( 'Overlay', 'modal-window' ),
		'val' => 1,
		'label' => esc_attr__( 'Enable', 'modal-window' ),
	],

	'close_button_esc' => [
		'type' => 'checkbox',
		'title'   => esc_attr__( 'Esc', 'modal-window' ),
		'val' => 1,
		'label' => esc_attr__( 'Enable', 'modal-window' ),
	],
	//endregion

	//region Animation
	'window_animate' => [
		'type' => 'select',
		'title'   => esc_attr__( 'AnimateIn', 'modal-window' ),
		'val' => 'fade',
		'atts' => Settings_Helper::animation(),
	],

	'speed_window' => [
		'type' => 'number',
		'title' => esc_attr__( 'AnimateIn Speed', 'modal-window' ),
		'val' => '400',
		'addon'    => 'ms',
		'atts' => [
			'step' => 1
		],
	],

	'window_animate_out' => [
		'type' => 'select',
		'title'   => esc_attr__( 'AnimateOut', 'modal-window' ),
		'val' => 'fade',
		'atts' => Settings_Helper::animation(),
	],

	'speed_window_out' => [
		'type' => 'number',
		'title' => esc_attr__( 'AnimateOut Speed', 'modal-window' ),
		'val' => '400',
		'addon'    => 'ms',
		'atts' => [
			'step' => 1
		],
	],

	//endregion



];