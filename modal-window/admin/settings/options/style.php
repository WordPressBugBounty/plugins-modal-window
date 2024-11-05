<?php

use ModalWindow\Settings_Helper;

defined( 'ABSPATH' ) || exit;

return [
	//region General Style

	//region Properties
	'modal_width'  => [
		'type'  => 'number',
		'title' => __( 'Width', 'modal-window' ),
		'val'   => '662',
		'addon' => [
			'type' => 'select',
			'name' => 'modal_width_par',
			'val'  => 'px',
			'atts' => [
				'px' => __( 'px', 'modal-window' ),
				'pr' => __( '%', 'modal-window' ),
			],
		],
	],
	'modal_height' => [
		'type'  => 'number',
		'title' => __( 'Height', 'modal-window' ),
		'val'   => 350,
		'addon' => [
			'type' => 'select',
			'name' => 'modal_height_par',
			'val'  => 'auto',
			'atts' => [
				'auto' => __( 'auto', 'modal-window' ),
				'px'   => __( 'px', 'modal-window' ),
				'pr'   => __( '%', 'modal-window' ),
			],
		],
	],

	'modal_zindex' => [
		'type'  => 'number',
		'title' => __( 'Z-index', 'modal-window' ),
		'val'   => '999999'
	],

	'modal_position' => [
		'type'  => 'select',
		'title' => __( 'Block page', 'modal-window' ),
		'val'   => 'fixed',
		'atts'  => [
			'fixed'    => __( 'Yes', 'modal-window' ),
			'absolute' => __( 'No', 'modal-window' ),
		],
	],

	//endregion

	//region Border
	'border_radius'  => [
		'type'  => 'number',
		'title' => __( 'Radius', 'modal-window' ),
		'val'   => 5,
		'atts'  => [
			'min' => '0',
		],
		'addon' => 'px',
	],

	'border_style' => [
		'type'  => 'select',
		'title' => __( 'Style', 'modal-window' ),
		'val'   => 'none',
		'atts'  => [
			'none'   => __( 'None', 'modal-window' ),
			'solid'  => __( 'Solid', 'modal-window' ),
			'dotted' => __( 'Dotted', 'modal-window' ),
			'dashed' => __( 'Dashed', 'modal-window' ),
			'double' => __( 'Double', 'modal-window' ),
			'groove' => __( 'Groove', 'modal-window' ),
			'inset'  => __( 'Inset', 'modal-window' ),
			'outset' => __( 'Outset', 'modal-window' ),
			'ridge'  => __( 'Ridge', 'modal-window' ),
		],
	],

	'border_width' => [
		'type'  => 'number',
		'title' => __( 'Thickness', 'modal-window' ),
		'val'   => 0,
		'atts'  => [
			'min' => '0',
		],
		'addon' => 'px',
	],

	'border_color' => [
		'type'  => 'text',
		'val'   => '#ffffff',
		'title' => __( 'Color', 'modal-window' ),
		'atts'  => [
			'class'              => 'wpie-color',
			'data-alpha-enabled' => 'true',
		],
	],

	//endregion

	//region Shadow
	'shadow'       => [
		'type'  => 'select',
		'title' => __( 'Shadow', 'modal-window' ),
		'val'   => 'none',
		'atts'  => [
			'none'   => __( 'None', 'modal-window' ),
			'outset' => __( 'Yes', 'modal-window' ),
			'inset'  => __( 'Inset', 'modal-window' ),
		],
	],

	'shadow_h_offset' => [
		'type'  => 'number',
		'title' => __( 'Horizontal Position', 'modal-window' ),
		'addon' => 'px',
		'val'   => 0,
	],

	'shadow_v_offset' => [
		'type'  => 'number',
		'title' => __( 'Vertical Position', 'modal-window' ),
		'addon' => 'px',
		'val'   => 0,
	],

	'shadow_blur' => [
		'type'  => 'number',
		'title' => __( 'Blur', 'modal-window' ),
		'addon' => 'px',
		'val'   => 3,
	],

	'shadow_spread' => [
		'type'  => 'number',
		'title' => __( 'Spread', 'modal-window' ),
		'addon' => 'px',
		'val'   => 0,
	],

	'shadow_color'  => [
		'type'  => 'text',
		'val'   => '#020202',
		'title' => __( 'Color', 'modal-window' ),
		'atts'  => [
			'class'              => 'wpie-color',
			'data-alpha-enabled' => 'true',
		],
	],
	//endregion

	//region Content
	'modal_padding' => [
		'type'  => 'number',
		'title' => __( 'Padding', 'modal-window' ),
		'addon' => 'px',
		'val'   => 10,
		'atts'  => [
			'min' => '0',
		],
	],

	'content_size' => [
		'type'  => 'number',
		'title' => __( 'Font Size', 'modal-window' ),
		'addon' => 'px',
		'val'   => 16,
		'atts'  => [
			'min' => '0',
		],
	],

	'content_font'  => [
		'type'  => 'select',
		'title' => __( 'Font Family', 'modal-window' ),
		'val'   => 'inherit',
		'atts'  => [
			'inherit'         => __( 'Use Your Themes', 'modal-window' ),
			'Sans-Serif'      => 'Sans-Serif',
			'Tahoma'          => 'Tahoma',
			'Georgia'         => 'Georgia',
			'Comic Sans MS'   => 'Comic Sans MS',
			'Arial'           => 'Arial',
			'Lucida Grande'   => 'Lucida Grande',
			'Times New Roman' => 'Times New Roman',
		],
	],

	'scrollbar_width' => [
		'type' => 'select',
		'title' => __('Scrollbar Thickness', 'modal-window'),
		'val' => 'thin',
		'atts' => [
			'thin' => __('Thin', 'modal-window'),
			'auto' => __('Default', 'modal-window'),
			'none' => __('No shown', 'modal-window'),
		],
	],

	'scrollbar_color' => [
		'type'  => 'text',
		'val'   => '#4F4F4F',
		'title' => __( 'Scrollbar Color', 'modal-window' ),
		'atts'  => [
			'class'              => 'wpie-color',
			'data-alpha-enabled' => 'true',
		],
	],

	'scrollbar_background' => [
		'type'  => 'text',
		'val'   => 'rgba(255,255,255, 0)',
		'title' => __( 'Scrollbar Background', 'modal-window' ),
		'atts'  => [
			'class'              => 'wpie-color',
			'data-alpha-enabled' => 'true',
		],
	],
	//endregion

	//region Background
	'overlay_color' => [
		'type'  => 'text',
		'val'   => 'rgba(0,0,0,.7)',
		'title' => [
			'label'  => __( 'Overlay', 'modal-window' ),
			'name'   => 'include_overlay',
			'toggle' => true,
			'val'    => 1
		],
		'atts'  => [
			'class'              => 'wpie-color',
			'data-alpha-enabled' => 'true',
		],
	],

	'bg_color' => [
		'type'  => 'text',
		'val'   => '#ffffff',
		'title' => __( 'Background', 'modal-window' ),
		'atts'  => [
			'class'              => 'wpie-color',
			'data-alpha-enabled' => 'true',
		],
	],
	//endregion


	//endregion

	//region Location
	'modal_top'            => [
		'type'  => 'number',
		'val'   => 10,
		'title' => [
			'label'  => __( 'Top', 'modal-window' ),
			'name'   => 'include_modal_top',
			'toggle' => true,
			'val'    => 1
		],
		'addon' => [
			'type' => 'select',
			'name' => 'modal_top_unit',
			'val'  => '%',
			'atts' => [
				'%'  => __( '%', 'modal-window' ),
				'px' => __( 'px', 'modal-window' ),
			],
		],
	],

	'modal_bottom' => [
		'type'  => 'number',
		'val'   => 10,
		'title' => [
			'label'  => __( 'Bottom', 'modal-window' ),
			'name'   => 'include_modal_bottom',
			'toggle' => true,
			'val'    => 0
		],
		'addon' => [
			'type' => 'select',
			'name' => 'modal_bottom_unit',
			'val'  => '%',
			'atts' => [
				'%'  => __( '%', 'modal-window' ),
				'px' => __( 'px', 'modal-window' ),
			],
		],
	],

	'modal_left' => [
		'type'  => 'number',
		'val'   => 10,
		'title' => [
			'label'  => __( 'Left', 'modal-window' ),
			'name'   => 'include_modal_left',
			'toggle' => true,
			'val'    => 1
		],
		'addon' => [
			'type' => 'select',
			'name' => 'modal_left_unit',
			'val'  => '%',
			'atts' => [
				'%'  => __( '%', 'modal-window' ),
				'px' => __( 'px', 'modal-window' ),
			],
		],
	],

	'modal_right' => [
		'type'  => 'number',
		'val'   => 10,
		'title' => [
			'label'  => __( 'Right', 'modal-window' ),
			'name'   => 'include_modal_right',
			'toggle' => true,
			'val'    => 1
		],
		'addon' => [
			'type' => 'select',
			'name' => 'modal_right_unit',
			'val'  => '%',
			'atts' => [
				'%'  => __( '%', 'modal-window' ),
				'px' => __( 'px', 'modal-window' ),
			],
		],
	],



	//endregion

	//region Title

	'popup_title' => [
		'type'  => 'checkbox',
		'title' => __( 'Used title as Modal Title.', 'modal-window' ),
		'label' => __( 'Enable', 'modal-window' ),
	],

	'title_size' => [
		'type'  => 'number',
		'title' => __( 'Font Size', 'modal-window' ),
		'val'   => '32',
		'addon' => 'px',
		'atts'  => [
			'min' => 0,
		],
	],

	'title_line_height' => [
		'type'  => 'number',
		'title' => __( 'Line Height', 'modal-window' ),
		'val'   => '36',
		'addon' => 'px',
		'atts'  => [
			'min' => 0,
		],
	],

	'title_font' => [
		'type'  => 'select',
		'title' => __( 'Font Family', 'modal-window' ),
		'val'   => 'inherit',
		'atts'  => [
			'inherit'         => __( 'Use Your Themes', 'modal-window' ),
			'Tahoma'          => 'Tahoma',
			'Georgia'         => 'Georgia',
			'Comic Sans MS'   => 'Comic Sans MS',
			'Arial'           => 'Arial',
			'Lucida Grande'   => 'Lucida Grande',
			'Times New Roman' => 'Times New Roman',
		],
	],

	'title_font_weight' => [
		'type'  => 'select',
		'title' => __( 'Font Weight', 'modal-window' ),
		'val'   => '400',
		'atts'  => [
			'100' => '100',
			'200' => '200',
			'300' => '300',
			'400' => '400',
			'500' => '500',
			'600' => '600',
			'700' => '700',
			'800' => '800',
			'900' => '900',
		],
	],

	'title_font_style' => [
		'type'  => 'select',
		'title' => __( 'Font Style', 'modal-window' ),
		'val'   => 'normal',
		'atts'  => [
			'normal' => 'Normal',
			'italic' => 'Italic',
		],
	],

	'title_align' => [
		'type'  => 'select',
		'title' => __( 'Align', 'modal-window' ),
		'val'   => 'left',
		'atts'  => [
			'left'   => 'Left',
			'center' => 'Center',
			'right'  => 'Right',
		],
	],

	'title_color' => [
		'type'  => 'text',
		'title' => __( 'Color', 'modal-window' ),
		'val'   => '#14102C',
		'atts'  => [
			'class'              => 'wpie-color',
			'data-alpha-enabled' => 'true',
		],
	],

	'title_background' => [
		'type'  => 'text',
		'title' => __( 'Background', 'modal-window' ),
		'val'   => 'rgba(255,255,255,0)',
		'atts'  => [
			'class'              => 'wpie-color',
			'data-alpha-enabled' => 'true',
		],
	],

	//endregion

	//region Close Button
	'close_location' => [
		'type'  => 'select',
		'title' => __( 'Location', 'modal-window' ),
		'val'   => 'topRight',
		'atts'  => [
			'topRight'    => __( 'Top Right', 'modal-window' ),
			'topLeft'     => __( 'Top Left', 'modal-window' ),
			'bottomRight' => __( 'Bottom Right', 'modal-window' ),
			'bottomLeft'  => __( 'Bottom Left', 'modal-window' ),
		],
	],

	'close_top_position' => [
		'type'  => 'number',
		'title' => __( 'Top', 'modal-window' ),
		'val'   => '0',
		'addon' => 'px',
	],

	'close_bottom_position' => [
		'type'  => 'number',
		'title' => __( 'Bottom', 'modal-window' ),
		'val'   => '0',
		'addon' => 'px',
	],

	'close_left_position' => [
		'type'  => 'number',
		'title' => __( 'Left', 'modal-window' ),
		'val'   => '0',
		'addon' => 'px',
	],

	'close_right_position' => [
		'type'  => 'number',
		'title' => __( 'Right', 'modal-window' ),
		'val'   => '0',
		'addon' => 'px',
	],


	'close_type'            => [
		'type'  => 'select',
		'title' => __( 'Button type', 'modal-window' ),
		'val'   => 'text',
		'atts'  => [
			'text' => __( 'Text', 'modal-window' ),
			'image' => __( 'Icon', 'modal-window' ),
		],
	],

	'close_box_size' => [
		'type'  => 'number',
		'title' => __( 'Box Size', 'modal-window' ),
		'val'   => '24',
		'addon' => 'px',
		'atts' => [
			'min'   => '0',
			'step'  => '0.01',
		],
	],

	'close_content' => [
		'type'  => 'text',
		'title' => __( 'Text', 'modal-window' ),
		'val'   => __( 'Close', 'modal-window' ),
	],

	'close_padding' => [
		'type'  => 'text',
		'title' => __( 'Padding', 'modal-window' ),
		'val'   => __( '6px 12px', 'modal-window' ),
	],

	'close_border_radius' => [
		'type'  => 'number',
		'title' => __( 'Border Radius', 'modal-window' ),
		'val'   => '0',
		'addon' => 'px',
		'atts' => [
			'min'   => '0',
		],
	],


	'close_font' => [
		'type'  => 'select',
		'title' => __( 'Font Family', 'modal-window' ),
		'val'   => 'inherit',
		'atts'  => [
			'inherit'         => __( 'Use Your Themes', 'modal-window' ),
			'Tahoma'          => 'Tahoma',
			'Georgia'         => 'Georgia',
			'Comic Sans MS'   => 'Comic Sans MS',
			'Arial'           => 'Arial',
			'Lucida Grande'   => 'Lucida Grande',
			'Times New Roman' => 'Times New Roman',
		],
	],

	'close_weight' => [
		'type'  => 'select',
		'title' => __( 'Font Weight', 'modal-window' ),
		'val'   => '400',
		'atts'  => [
			'100' => '100',
			'200' => '200',
			'300' => '300',
			'400' => '400',
			'500' => '500',
			'600' => '600',
			'700' => '700',
			'800' => '800',
			'900' => '900',
		],
	],

	'close_font_style' => [
		'type'  => 'select',
		'title' => __( 'Font Style', 'modal-window' ),
		'val'   => 'normal',
		'atts'  => [
			'normal' => 'Normal',
			'italic' => 'Italic',
		],
	],

	'close_size' => [
		'type'  => 'number',
		'title' => __( 'Font Size', 'modal-window' ),
		'val'   => '12',
		'addon' => 'px',
		'atts' => [
			'min'   => '0',
		],
	],


	'close_content_color' => [
		'type'  => 'text',
		'title' => __( 'Text', 'modal-window' ),
		'val'   => '#ffffff',
		'atts'  => [
			'class'              => 'wpie-color',
			'data-alpha-enabled' => 'true',
		],
	],

	'close_content_color_hover' => [
		'type'  => 'text',
		'title' => __( 'Hover', 'modal-window' ),
		'val'   => '#000000',
		'atts'  => [
			'class'              => 'wpie-color',
			'data-alpha-enabled' => 'true',
		],
	],

	'close_background_color' => [
		'type'  => 'text',
		'title' => __( 'Background', 'modal-window' ),
		'val'   => '#000000',
		'atts'  => [
			'class'              => 'wpie-color',
			'data-alpha-enabled' => 'true',
		],
	],

	'close_background_hover' => [
		'type'  => 'text',
		'title' => __( 'Background Hover', 'modal-window' ),
		'val'   => '#ffffff',
		'atts'  => [
			'class'              => 'wpie-color',
			'data-alpha-enabled' => 'true',
		],
	],

	//endregion

	//region Mobile Rules
	'screen_size'      => [
		'type'  => 'number',
		'title'  => __( 'Mobile screen', 'modal-window' ),
		'val'   => '480',
		'addon' => 'px',
	],

	'mobile_width' => [
		'type'  => 'number',
		'title' => __( 'Width', 'modal-window' ),
		'val'   => '100',
		'addon' => [
			'type' => 'select',
			'name' => 'mobile_width_par',
			'atts' => [
				'px' => __( 'px', 'modal-window' ),
				'pr' => __( '%', 'modal-window' ),
			],
		],
	],
	//endregion

];