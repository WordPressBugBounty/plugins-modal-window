<?php

namespace ModalWindow;

defined( 'ABSPATH' ) || exit;

class Script_Maker {
	private array $script;
	/**
	 * @var mixed
	 */
	private $param;
	/**
	 * @var mixed
	 */
	private $id;

	public function __construct( $id, $param ) {
		$this->id     = $id;
		$this->param  = $param;
		$this->script = [];
	}


	public function init(): array {
		$this->script['overlay']     = ! empty( $this->param['include_overlay'] );
		$this->script['blockPage']   = isset( $this->param['modal_position'] ) && $this->param['modal_position'] === 'fixed';
		$this->script['action']      = ['load', 0];

		$this->script['closeBtn']    = [
			! empty( $this->param['close_button_remove'] ),
			absint( $this->param['close_delay'] ),
		];
		$this->script['closeAction'] = [true, true];
		$mobile_unit                 = ( $this->param['mobile_width_par'] !== 'px' ) ? '%' : 'px';
		$this->script['mobile']      = [
			absint( $this->param['screen_size'] ),
			absint( $this->param['mobile_width'] ),
			$mobile_unit,
		];
		$this->script['triggers']    = [
			'wow-modal-id-' . absint( $this->id ),
			'wow-modal-close-' . absint( $this->id ),
			'wow-button-close' . absint( $this->id ),
		];

		if(!empty($this->param['open_selectors'])) {
			$this->script['openSelectors'] = esc_html($this->param['open_selectors']);
		}

		if(!empty($this->param['close_selectors'])) {
			$this->script['closeSelectors'] = esc_html($this->param['close_selectors']);
		}


		$closeForm = isset($this->param['mail_send_timer']) ? absint($this->param['mail_send_timer']) : 3;
		$this->script['closeForm'] = $closeForm;

		$this->animation();
		$this->scrolled();
		$this->modal_style();
		return $this->script;

	}

	private function animation(): void {
		$this->script['animation'] = [
			$this->param['window_animate'],
			absint( $this->param['speed_window'] ),
			$this->param['window_animate_out'],
			absint( $this->param['speed_window_out'] ),
		];
	}

	private function scrolled(): void {
		if ( $this->param['modal_show'] === 'scroll' ) {
			$this->script['scrolled'] = [
				$this->param['reach_window'],
				$this->param['reach_window_unit'],
			];
		}
	}


	private function modal_style(): void {

		$general    = $this->general_style();
		$location   = $this->location();
		$title      = $this->title();
		$close_btn  = $this->close_btn();
		$float_btn  = $this->float_btn();
		$form_style = $this->form_style();

		$args = array_merge( $general, $location, $title, $close_btn, $float_btn, $form_style );

		$esc_args = array_map( 'esc_attr', $args );

		$this->script['style'] = $esc_args;
	}

	private function general_style(): array {
		$param = $this->param;
		$args  = [
			'--mw-zindex'          => $param['modal_zindex'] ?? '999999',
			'--mw-position'        => $param['modal_position'] ?? 'fixed',
			'--mw-radius'          => ( $param['border_radius'] ?? '5' ) . 'px',
			'--mw-padding'         => ( $param['modal_padding'] ?? '10' ) . 'px',
			'--mw-font-size'       => ( $param['content_size'] ?? '16' ) . 'px',
			'--mw-font-family'     => $param['content_font'] ?? 'inherit',
			'--mw-bg-color'        => $param['bg_color'] ?? '#ffffff',
			'--mw-overlay'         => $param['overlay_color'] ?? 'rgba(0,0,0,.7)',
			'--mw-scrollbar-width' => $param['scrollbar_width'] ?? 'thin',
			'--mw-scrollbar-color' => $param['scrollbar_color'] ?? '#4F4F4F',
			'--mw-scrollbar-track' => $param['scrollbar_background'] ?? 'rgba(255,255,255, 0)',
		];

		$scrollbar = $param['scrollbar_width'] ?? 'thin';
		if ( $scrollbar === 'thin' ) {
			$args['--mw-scrollbar-thin'] = '6px';
		}
		if ( $scrollbar === 'auto' ) {
			$args['--mw-scrollbar-thin'] = '8px';
		}
		if ( $scrollbar === 'none' ) {
			$args['--mw-scrollbar-thin'] = '0';
		}

		$width              = $param['modal_width'] ?? '662';
		$width_unit         = $param['modal_width_par'] ?? 'px';
		$width_unit         = ( $width_unit === 'pr' ) ? '%' : 'px';
		$args['--mw-width'] = $width . $width_unit;

		$height              = $param['modal_height'] ?? '350';
		$height_unit         = $param['modal_height_par'] ?? 'auto';
		$height_unit         = ( $height_unit === 'pr' ) ? '%' : $height_unit;
		$args['--mw-height'] = ( $height_unit === 'auto' ) ? 'auto' : $height . $height_unit;

		if ( ! empty( $param['modal_background_img'] ) ) {
			$args['--mw-bg-img'] = 'url(' . esc_url( $param['modal_background_img'] ) . ')';
		}

		if ( $param['shadow'] !== 'none' ) {
			$inset        = ( $param['shadow'] === 'inset' ) ? 'inset ' : '';
			$offset_x     = ( $param['shadow_h_offset'] ?? '0' ) . 'px';
			$offset_y     = ( $param['shadow_v_offset'] ?? '0' ) . 'px';
			$blur         = ( $param['shadow_blur'] ?? '0' ) . 'px';
			$spread       = ( $param['shadow_spread'] ?? '0' ) . 'px';
			$shadow_color = $param['shadow_color'] ?? '#ffffff';

			$args['--mw-shadow'] = "$inset$offset_x $offset_y $blur $spread $shadow_color";
		}

		if ( $param['border_style'] !== 'none' ) {
			$border_width = ( $param['border_width'] ?? '0' ) . 'px';
			$border_style = $param['border_style'] ?? 'solid';
			$border_color = $param['border_color'] ?? '#ffffff';

			$args['--mw-border'] = "$border_width $border_style $border_color";
		}

		return $args;
	}

	private function location(): array {
		$param = $this->param;
		$args  = [];

		if ( ! empty( $param['include_modal_top'] ) ) {
			$modal_top_unit         = $param['modal_top_unit'] === '%' ? 'vh' : 'px';
			$args['--mw-inset-top'] = $param['modal_top'] . $modal_top_unit;
		}

		if ( ! empty( $param['include_modal_right'] ) ) {
			$modal_right_unit         = $param['modal_right_unit'] === '%' ? 'vh' : 'px';
			$args['--mw-inset-right'] = $param['modal_right'] . $modal_right_unit;
		}

		if ( ! empty( $param['include_modal_bottom'] ) ) {
			$modal_bottom_unit         = $param['modal_bottom_unit'] === '%' ? 'vh' : 'px';
			$args['--mw-inset-bottom'] = $param['modal_bottom'] . $modal_bottom_unit;
		}

		if ( ! empty( $param['include_modal_left'] ) ) {
			$modal_left_unit         = $param['modal_bottom_unit'] === '%' ? 'vh' : 'px';
			$args['--mw-inset-left'] = $param['modal_left'] . $modal_left_unit;
		}

		return $args;
	}

	private function title(): array {
		$param = $this->param;
		if ( empty( $param['popup_title'] ) ) {
			return [];
		}
		$args = [
			'--mw-title-size'        => ( $param['title_size'] ?? '32' ) . 'px',
			'--mw-title-line-height' => ( $param['title_line_height'] ?? '32' ) . 'px',
			'--mw-title-font'        => $param['title_font'] ?? 'inherit',
			'--mw-title-weight'      => $param['title_font_weight'] ?? '400',
			'--mw-title-style'       => $param['title_font_style'] ?? 'normal',
			'--mw-title-align'       => $param['title_align'] ?? 'left',
			'--mw-title-color'       => $param['title_color'] ?? '#383838',
			'--mw-title-bg'          => $param['title_background'] ?? 'rgba(255, 255, 255, 0)',
		];

		return $args;
	}

	private function close_btn(): array {
		$param = $this->param;
		if ( ! empty( $param['close_button_remove'] ) ) {
			return [];
		}
		$args = [
			'--mw-close-padding' => $param['close_padding'] ?? '6px 12px',
			'--mw-close-size'    => ( $param['close_size'] ?? '12' ) . 'px',
			'--mw-close-font'    => $param['close_font'] ?? 'inherit',
			'--mw-close-weight'  => $param['close_weight'] ?? '400',
			'--mw-close-style'   => $param['close_font_style'] ?? 'normal',
			'--mw-close-radius'  => ( $param['close_border_radius'] ?? '0' ) . 'px',
			'--mw-close-box'     => ( $param['close_box_size'] ?? '24' ) . 'px',
			'--mw-close-color'   => $param['close_content_color'] ?? '#ffffff',
			'--mw-close-h-color' => $param['close_content_color_hover'] ?? '#000000',
			'--mw-close-bg'      => $param['close_background_color'] ?? '#000000',
			'--mw-close-h-bg'    => $param['close_background_hover'] ?? '#ffffff',
		];

		$top    = ( $param['close_top_position'] ?? '0' ) . 'px';
		$right  = ( $param['close_right_position'] ?? '0' ) . 'px';
		$left   = ( $param['close_left_position'] ?? '0' ) . 'px';
		$bottom = ( $param['close_bottom_position'] ?? '0' ) . 'px';

		if ( $param['close_location'] === 'topRight' ) {
			$args['--mw-close-inset'] = "$top $right auto auto";
		}

		if ( $param['close_location'] === 'topLeft' ) {
			$args['--mw-close-inset'] = "$top auto auto $left";
		}

		if ( $param['close_location'] === 'bottomRight' ) {
			$args['--mw-close-inset'] = "auto $right $bottom auto";
		}

		if ( $param['close_location'] === 'bottomLeft' ) {
			$args['--mw-close-inset'] = "auto auto $bottom $left";
		}

		return $args;
	}

	private function float_btn(): array {
		$param = $this->param;
		$type  = $param['umodal_button'] ?? 'no';
		if ( $type === 'no' ) {
			return [];
		}
		$args = [
			'--mw-flbtn-padding'   => $param['button_padding'] ?? '14px 14px',
			'--mw-flbtn-radius'    => ( $param['button_radius'] ?? '4' ) . 'px',
			'--mw-flbtn-size'      => ( $param['button_text_size'] ?? '1.2' ) . ( $param['button_text_size_unit'] ?? 'em' ),
			'--mw-flbtn-color'     => $param['button_text_color'] ?? '#ffffff',
			'--mw-flbtn-h-color'   => $param['button_text_hcolor'] ?? '#ffffff',
			'--mw-flbtn-bg'        => $param['umodal_button_color'] ?? '#383838',
			'--mw-flbtn-h-bg'      => $param['umodal_button_hover'] ?? '#797979',
			'--mw-anime-duration'  => ( $param['button_animate_duration'] ?? '5' ) . 's',
			'--mw-anime-iteration' => $param['button_animate_time'] ?? '5',
		];

		$offset = ( $param['button_position'] ?? '50' ) . '%';
		$margin = ( $param['button_margin'] ?? '-4' ) . 'px';

		if ( $param['umodal_button_position'] === 'wow_modal_button_right' ) {
			$args['--mw-flbtn-inset'] = "$offset $margin auto auto";
		}

		if ( $param['umodal_button_position'] === 'wow_modal_button_left' ) {
			$args['--mw-flbtn-inset'] = "$offset auto auto $margin";
		}

		if ( $param['umodal_button_position'] === 'wow_modal_button_top' ) {
			$args['--mw-flbtn-inset'] = "auto $margin $offset auto";
		}

		if ( $param['umodal_button_position'] === 'wow_modal_button_bottom' ) {
			$args['--mw-flbtn-inset'] = "auto auto $offset $margin";
		}

		return $args;
	}

	private function form_style(): array {
		$param = $this->param;

		if ( empty( $param['include_form_name'] ) && empty( $param['include_form_email'] ) && empty( $param['include_form_text'] ) ) {
			return [];
		}

		if ( strpos( $param['content'], "{form}" ) === false ) {
			return [];
		}

		$args = [
			'--mw-form-width'            => $param['form_width'] ?? '100%',
			'--mw-form-padding'          => $param['form_padding'] ?? '10px',
			'--mw-form-margin'           => $param['form_margin'] ?? '0 auto',
			'--mw-form-border'           => ( $param['form_border'] ?? '1px' ) . ' solid ' . ( $param['form_border_color'] ?? '#ffffff' ),
			'--mw-form-radius'           => $param['form_radius'] ?? '0px',
			'--mw-form-bg'               => $param['form_background'] ?? '#ffffff',
			'--mw-field-border-width'    => $param['field_border'] ?? '1px',
			'--mw-field-border-color'    => $param['field_border_color'] ?? '#383838',
			'--mw-field-radius'          => $param['field_radius'] ?? '0px',
			'--mw-field-size'            => $param['form_text_size'] ?? '16px',
			'--mw-field-input-height'    => $param['form_input_height'] ?? '36px',
			'--mw-field-textarea-height' => $param['form_textarea_height'] ?? '72px',
			'--mw-field-bg'              => $param['field_background'] ?? '#ffffff',
			'--mw-field-color'           => $param['form_text_color'] ?? '#ffffff',
			'--mw-form-btn-size'         => $param['form_button_size'] ?? '16px',
			'--mw-form-btn-color'        => $param['form_button_text_color'] ?? '#ffffff',
			'--mw-form-btn-bg'           => $param['button_background_color'] ?? '#e95645',
			'--mw-form-btn-h-bg'         => $param['button_hover_color'] ?? '#d45041',
			'--mw-form-text-size'        => ( $param['mail_send_text_size'] ?? '16' ) . 'px',
			'--mw-form-text-color'       => $param['mail_send_text_color'] ?? '#48c774',

		];

		return $args;

	}
}