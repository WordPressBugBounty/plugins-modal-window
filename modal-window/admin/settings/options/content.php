<?php

use ModalWindow\Settings_Helper;

defined( 'ABSPATH' ) || exit;

return [
	'content'        => [
		'type'  => 'editor',
		'class' => 'is-full',
		'val'   => __( 'Welcome to Modal Window plugin', 'modal-window' ),
		'atts'  => [
			'class' => 'wpie-fulleditor',
		]
	],

	'aria_live' => [
		'type'  => 'select',
		'title' => __( 'Aria Live', 'modal-window' ),
		'val'   => 'off',
		'atts'  => [
			'off'       => 'off',
			'polite'    => 'polite',
			'assertive' => 'assertive',
		]
	],

	'shortcode_type' => [
		'type'  => 'select',
		'title' => __( 'Shortcode Type', 'modal-window' ),
		'val'   => 'button',
		'atts'  => [
			'button' => __( 'Button', 'modal-window' ),
			'video'  => __( 'Video', 'modal-window' ),
			'iframe' => __( 'Iframe', 'modal-window' ),
			'icon'   => __( 'Icon', 'modal-window' ),
		],
	],

	'shortcode_video_from' => [
		'type'  => 'select',
		'title' => __( 'Video Hosting', 'modal-window' ),
		'atts'  => [
			'youtube' => __( 'YouTube', 'modal-window' ),
			'vimeo'   => __( 'Vimeo', 'modal-window' ),
		],
	],

	'shortcode_video_id' => [
		'title' => __( 'Video ID', 'modal-window' ),
		'type'  => 'text',
		'atts'  => [
			'placeholder' => __( 'Enter video ID', 'modal-window' ),
		],
	],

	'shortcode_video_width' => [
		'title' => __( 'Video Width', 'modal-window' ),
		'type'  => 'number',
		'val'   => '560',
		'atts'  => [
			'min'  => '0',
			'step' => '1',
		],
		'addon' => 'px',
	],

	'shortcode_video_height' => [
		'title' => __( 'Video Height', 'modal-window' ),
		'type'  => 'number',
		'val'   => '315',
		'atts'  => [
			'min'  => '0',
			'step' => '1',
		],
		'addon' => 'px',
	],

	'shortcode_btn_type' => [
		'type'  => 'select',
		'title' => __( 'Button Type', 'modal-window' ),
		'val'   => 'close',
		'atts'  => [
			'close' => __( 'Popup Close Button', 'modal-window' ),
			'link'  => __( 'Button with Link', 'modal-window' ),
		],
	],

	'shortcode_btn_size' => [
		'type'  => 'select',
		'title' => __( 'Button Size', 'modal-window' ),
		'val'   => 'normal',
		'atts'  => [
			'small'  => __( 'Small', 'modal-window' ),
			'normal' => __( 'Normal', 'modal-window' ),
			'medium' => __( 'Medium', 'modal-window' ),
			'large'  => __( 'Large', 'modal-window' ),
		],
	],

	'shortcode_btn_fullwidth' => [
		'type'  => 'select',
		'title' => __( 'Full Width', 'modal-window' ),
		'val'   => '',
		'atts'  => [
			''    => __( 'No', 'modal-window' ),
			'yes' => __( 'Yes', 'modal-window' ),
		],
	],

	'shortcode_btn_text' => [
		'type'  => 'text',
		'title' => __( 'Button Text', 'modal-window' ),
		'val'   => __( 'Close Popup', 'modal-window' ),
	],

	'shortcode_btn_color' => [
		'title' => __( 'Text Color', 'modal-window' ),
		'type'  => 'text',
		'val'   => '#ffffff',
		'atts'  => [
			'class'              => 'wpie-color',
			'data-alpha-enabled' => 'true',
		],
	],

	'shortcode_btn_bgcolor' => [
		'title' => __( 'Background Color', 'modal-window' ),
		'type'  => 'text',
		'val'   => '#00d1b2',
		'atts'  => [
			'class'              => 'wpie-color',
			'data-alpha-enabled' => 'true',
		],
	],

	'shortcode_btn_link' => [
		'title' => __( 'Link', 'modal-window' ),
		'type'  => 'text',
		'val'   => '',
		'atts'  => [
			'placeholder' => __( 'Enter URL', 'modal-window' ),
		],
	],

	'shortcode_btn_target' => [
		'type'  => 'select',
		'title' => __( 'Target', 'modal-window' ),
		'val'   => '_blank',
		'atts'  => [
			'_blank' => __( 'New tab', 'modal-window' ),
			'_self'  => __( 'Same tab', 'modal-window' ),
		],
	],

	'shortcode_btn_class' => [
		'title' => __( 'Extra class', 'modal-window' ),
		'type'  => 'text',
		'val'   => '',
	],


	'iframe_link' => [
		'type'  => 'text',
		'title' => __( 'Iframe link', 'modal-window' ),
		'val'   => '',
		'atts'  => [
			'placeholder' => 'https://',
		],
	],

	'iframe_width' => [
		'title' => __( 'Width', 'modal-window' ),
		'type'  => 'number',
		'val'   => '600',
		'atts'  => [
			'min' => '0',
		],
		'addon' => [
			'type' => 'select',
			'name' => 'iframe_width_unit',
			'atts' => [
				''  => __( 'px', 'modal-window' ),
				'%' => __( '%', 'modal-window' ),
			],
		],
	],

	'iframe_height' => [
		'title' => __( 'Height', 'modal-window' ),
		'type'  => 'number',
		'val'   => '450',
		'atts'  => [
			'min' => '0',
		],
		'addon' => [
			'type' => 'select',
			'name' => 'iframe_height_unit',
			'atts' => [
				''  => __( 'px', 'modal-window' ),
				'%' => __( '%', 'modal-window' ),
			],
		],
	],

	'iframe_id' => [
		'title' => __( 'ID', 'modal-window' ),
		'type'  => 'text',
	],

	'iframe_class' => [
		'title' => __( 'Class', 'modal-window' ),
		'type'  => 'text',
	],

	'iframe_style' => [
		'title' => __( 'Style', 'modal-window' ),
		'type'  => 'text',
	],

	//region Icon

	'shortcode_icon' => [
		'type'  => 'select',
		'title' => __( 'Select Icon', 'modal-window' ),
		'val'   => '',
		'class' => 'wpie-icon-box',
		'atts'  => Settings_Helper::icons(),
	],

	'icon_color' => [
		'title' => __( 'Color', 'modal-window' ),
		'type'  => 'text',
		'val'   => '#797979',
		'atts'  => [
			'class'              => 'wpie-color',
			'data-alpha-enabled' => 'true',
		],
	],

	'icon_size' => [
		'title' => __( 'Size', 'modal-window' ),
		'type'  => 'number',
		'val'   => '24',
		'atts'  => [
			'min' => '0',
		],
		'addon' => 'px',
	],

	'icon_link' => [
		'title' => __( 'Link', 'modal-window' ),
		'type'  => 'text',
		'val'   => '',
		'atts'  => [
			'placeholder' => __( 'Enter URL', 'modal-window' ),
		],
	],

	'icon_target' => [
		'type'  => 'select',
		'title' => __( 'Target', 'modal-window' ),
		'val'   => '_blank',
		'atts'  => [
			'_blank' => __( 'New tab', 'modal-window' ),
			'_self'  => __( 'Same tab', 'modal-window' ),
		],
	],



	//endregion

];