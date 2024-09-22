<?php

namespace ModalWindow;

defined( 'ABSPATH' ) || exit;

class Modal_Maker {
	/**
	 * @var mixed
	 */
	private $id;
	/**
	 * @var mixed
	 */
	private $param;
	/**
	 * @var mixed
	 */
	private $title;

	public function __construct( $id, $param, $title, $content ) {
		$this->id    = $id;
		$this->param = $param;
		$this->title = $title;
		$this->content = $content;
	}

	public function init(): string {
		return $this->create_modal();
	}

	private function create_modal(): string {
		$param          = $this->param;

		$modal = '<div class="modal-window" id="modal-window-' . esc_attr( $this->id ) . '">';
		$modal .= '<div class="modal-window__wrapper">';
		$modal .= '<div class="modal-window__content">';
		$modal .= $this->close_button();
		$modal .= '<div class="modal-window__content-wrapper">';
		if ( ! empty( $param['popup_title'] ) ) {
			$modal .= '<div class="modal-window__title">' . esc_html( $this->title ) . '</div>';
		}
		$modal .= '<div class="modal-window__content-main">';
		$modal_content = $this->content;
		$form  = $this->create_form();
		$modal .= str_replace( '{form}', $form, $modal_content );
		$modal .= '</div></div></div></div>';
		$modal .= '</div>';

		return $modal;

	}

	private function close_button(): string {
		$param  = $this->param;
		if(!empty($param['close_button_remove'])) {
			return '';
		}
		if($param['close_type'] === 'text') {
			return '<div class="modal-window__close">'.esc_html($param['close_content']).'</div>';
		}
		return '<div class="modal-window__close -image"></div>';
	}

	private function create_form(): string {
		$id    = $this->id;
		$param = $this->param;
		$form  = '';

		if ( empty( $param['include_form_name'] ) && empty( $param['include_form_email'] ) && empty( $param['include_form_text'] ) ) {
			return $form;
		}

		$form .= '<form id="mw-form-' . absint( $id ) . '" class="modal-window__form">';

		if ( ! empty( $param['include_form_name'] ) ) {
			$form .= '<input class="name smw-input" name="name" type="text" placeholder="' . esc_attr( $param['form_name'] ) . '" required>';
		}
		if ( ! empty( $param['include_form_email'] ) ) {
			$form .= '<input class="email smw-input" name="email" type="email" placeholder="' . esc_attr( $param['form_email'] ) . '" required>';
		}
		if ( ! empty( $param['include_form_text'] ) ) {
			$form .= '<textarea name="textarea" class="textarea" placeholder="' . esc_attr( $param['form_text'] ) . '" required></textarea>';
		}
		$form .= '<div class="modal-window__form-result"></div>';
		$form .= '<input type="submit" value="' . esc_attr( $param['form_button'] ) . '">';
		$form .= '</form>';

		return $form;

	}

	private function create_button(): string {
		$param  = $this->param;
		$button = '';

		if ( $param['umodal_button'] === 'no' ) {
			return '';
		}

		$position = str_replace( 'wow_modal_button_', 'is-', $param['umodal_button_position'] );

		$button .= '<div class="modal-float-button is-inactive ' . esc_attr( $position ) . ' wow-modal-id-' . absint( $this->id ) . '">';

		$button .= $this->button_content();

		$button .= '</div>';


		return $button;
	}

	private function button_content(): string {
		$param       = $this->param;
		$content     = '';
		$text        = ! empty( $param['umodal_button_text'] ) ? esc_html( $param['umodal_button_text'] ) : 'Feedback';
		$rotate_icon = ! empty( $param['rotate_icon'] ) ? ' ' . $param['rotate_icon'] : '';
		$icon        = '<i class="' . esc_attr( $param['button_icon'] . $rotate_icon ) . '" aria-hidden="true"></i>';

		$type = $param['button_type'] ?? '1';

		if ( $type === '1' ) {
			$content .= $text;
		}
		if ( $type === '2' ) {
			if ( ! empty( $param['button_icon_after'] ) ) {
				$content .= $text . $icon;
			} else {
				$content .= $icon . $text;
			}
		}

		if ( $type === '3' ) {
			if ( ! empty( $param['button_shape'] ) ) {
				$content .= '<span class="fa-stack fa-2x' . esc_attr( $rotate_icon ) . '">';
				$content .= '<i class="' . esc_attr( $param['button_shape'] ) . ' fa-stack-2x wow-icon-parent-' . absint( $this->id ) . '"></i>';
				$content .= '<i class="' . esc_attr( $param['button_icon'] ) . ' fa-stack-1x fa-inverse wow-icon-child-' . absint( $this->id ) . '"></i>';
				$content .= '</span>';
			} else {
				$content = '<i class="' . esc_attr( $param['button_icon'] ) . esc_attr( $rotate_icon ) . ' wow-icon-child-' . absint( $this->id ) . '"></i>';
			}
		}

		return $content;
	}


}