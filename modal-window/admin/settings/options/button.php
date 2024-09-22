<?php

use ModalWindow\Settings_Helper;

defined( 'ABSPATH' ) || exit;

return [
	//region General
	'umodal_button' => [
		'type' => 'select',
		'title'   => esc_attr__( 'Show button', 'modal-window' ),
		'val' => 'no',
		'atts' => [
			'no'  => __( 'no', 'modal-window' ),
			'yes' => __( 'yes', 'modal-window' ),
		],
	],

	'button_type' => [
		'type' => 'select',
		'title'   => esc_attr__( 'Appearance', 'modal-window' ),
		'val' => '1',
		'atts' => [
			'1' => __( 'Only Text', 'modal-window' ),
			'2' => __( 'Text and icon', 'modal-window' ),
			'3' => __( 'Only Icon', 'modal-window' ),
		],
	],

	'umodal_button_text' => [
		'type' => 'text',
		'title'   => esc_attr__( 'Text', 'modal-window' ),
		'val' => __('Feedback', 'modal-window' ),
	],

	//endregion

	//region Button Icon

	'button_icon' => [
		'type'  => 'select',
		'title' => __( 'Icon', 'modal-window' ),
		'val'   => '',
		'class' => 'wpie-icon-box',
		'atts'  => Settings_Helper::icons(),
	],

	'rotate_icon' => [
		'type' => 'select',
		'title'   => esc_attr__( 'Rotate icon', 'modal-window' ),
		'val' => '',
		'atts' => [
			''              => esc_attr__( 'none', 'modal-window' ),
			'fa-rotate-90'  => esc_attr__( '90&deg;', 'modal-window' ),
			'fa-rotate-180' => esc_attr__( '180&deg;', 'modal-window' ),
			'fa-rotate-270' => esc_attr__( '270&deg;', 'modal-window' ),
		],
	],

	'button_icon_after' => [
		'type' => 'select',
		'title'   => esc_attr__( 'Text location', 'modal-window' ),
		'val' => '0',
		'atts' => [
			'0' => esc_attr__( 'Before Icon', 'modal-window' ),
			'1' => esc_attr__( 'After Icon', 'modal-window' ),
		],
	],

	'button_shape' => [
		'type' => 'select',
		'title'   => esc_attr__( 'Shape', 'modal-window' ),
		'val' => '',
		'class' => 'wpie-icon-box',
		'atts' => [
			''                   => 'none',
			'fas fa-circle'      => 'fas fa-circle',
			'far fa-circle'      => 'far fa-circle',
			'fas fa-square'      => 'fas fa-square',
			'far fa-square'      => 'far fa-square',
			'fas fa-bookmark'    => 'fas fa-bookmark',
			'far fa-bookmark'    => 'far fa-bookmark',
			'fas fa-calendar'    => 'fas fa-calendar',
			'far fa-calendar'    => 'far fa-calendar',
			'fas fa-certificate' => 'fas fa-certificate',
			'fas fa-ban'         => 'fas fa-ban',
		],
	],

	//endregion

	//region Location
	'umodal_button_position' => [
		'type' => 'select',
		'title'   => esc_attr__( 'Location', 'modal-window' ),
		'val' => 'wow_modal_button_right',
		'atts' => [
			'wow_modal_button_right'  => __( 'Right', 'modal-window' ),
			'wow_modal_button_left'   => __( 'Left', 'modal-window' ),
			'wow_modal_button_top'    => __( 'Top', 'modal-window' ),
			'wow_modal_button_bottom' => __( 'Bottom', 'modal-window' ),
		],
	],

	'button_position' => [
		'type' => 'number',
		'title'   => esc_attr__( 'Offset', 'modal-window' ),
		'val' => '50',
		'atts' => [
			'min'   => '0',
		],
		'addon' => '%',
	],

	'button_margin' => [
		'type' => 'number',
		'title'   => esc_attr__( 'Margin', 'modal-window' ),
		'val' => '-4',
		'atts' => [
			'step'  => '0.1',
		],
		'addon' => 'px',
	],
	//endregion

	//region Animation
	'button_animate' => [
		'type' => 'select',
		'title'   => esc_attr__( 'Type', 'modal-window' ),
		'val' => 'no',
		'atts' => [
			'no'         => esc_attr__( 'no', 'modal-window' ),
			'bounce'     => esc_attr__( 'bounce', 'modal-window' ),
			'flash'      => esc_attr__( 'flash', 'modal-window' ),
			'pulse'      => esc_attr__( 'pulse', 'modal-window' ),
			'rubberBand' => esc_attr__( 'rubberBand', 'modal-window' ),
			'shake'      => esc_attr__( 'shake', 'modal-window' ),
			'swing'      => esc_attr__( 'swing', 'modal-window' ),
			'tada'       => esc_attr__( 'tada', 'modal-window' ),
			'wobble'     => esc_attr__( 'wobble', 'modal-window' ),
			'jello'      => esc_attr__( 'jello', 'modal-window' ),
		],
	],

	'button_animate_duration' => [
		'type' => 'number',
		'title'   => esc_attr__( 'Duration', 'modal-window' ),
		'val' => '5',
		'atts' => [
			'min'   => '0',
			'step'  => '0.01',
		],
		'addon' => 'sec',
	],

	'button_animate_time' => [
		'type' => 'number',
		'title'   => esc_attr__( 'Iteration Count', 'modal-window' ),
		'val' => '5',
		'atts' => [
			'min'   => '0',
			'step'  => '0.01',
		],
		'addon' => 'sec',
	],

	'button_animate_pause' => [
		'type' => 'number',
		'title'   => esc_attr__( 'Pause', 'modal-window' ),
		'val' => '5',
		'atts' => [
			'min'   => '0',
			'step'  => '0.01',
		],
		'addon' => 'sec',
	],
	//endregion

	//region Style
	'button_text_size' => [
		'type' => 'number',
		'title'   => esc_attr__( 'Text size', 'modal-window' ),
		'val' => '1.2',
		'atts' => [
			'min'   => '0',
			'step'  => '0.01',
		],
		'addon' => [
			'type' => 'select',
			'name' => 'button_text_size_unit',
			'val' => 'em',
			'atts' => [
				'em' => esc_attr__( 'em', 'modal-window' ),
				'px' => esc_attr__( 'px', 'modal-window' ),
			],

		],
	],
	'button_padding' => [
		'type' => 'text',
		'title'   => esc_attr__( 'Padding', 'modal-window' ),
		'val' => '14px 14px',
	],

	'button_radius' => [
		'type' => 'number',
		'title'   => esc_attr__( 'Radius', 'modal-window' ),
		'val' => '4',
		'atts' => [
			'min'   => '0',
		],
		'addon' => 'px',
	],

	'button_text_color' => [
		'type'  => 'text',
		'title' => __( 'Text color', 'modal-window' ),
		'val'   => '#ffffff',
		'atts'  => [
			'class'              => 'wpie-color',
			'data-alpha-enabled' => 'true',
		],
	],

	'button_text_hcolor' => [
		'type'  => 'text',
		'title' => __( 'Text hover color', 'modal-window' ),
		'val'   => '#ffffff',
		'atts'  => [
			'class'              => 'wpie-color',
			'data-alpha-enabled' => 'true',
		],
	],

	'umodal_button_color' => [
		'type'  => 'text',
		'title' => __( 'Background', 'modal-window' ),
		'val'   => '#383838',
		'atts'  => [
			'class'              => 'wpie-color',
			'data-alpha-enabled' => 'true',
		],
	],

	'umodal_button_hover' => [
		'type'  => 'text',
		'title' => __( 'Hover Background', 'modal-window' ),
		'val'   => '#797979',
		'atts'  => [
			'class'              => 'wpie-color',
			'data-alpha-enabled' => 'true',
		],
	],

	//endregion
];