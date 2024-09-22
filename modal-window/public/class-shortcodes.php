<?php

namespace ModalWindow;

defined( 'ABSPATH' ) || exit;

class WOWP_Shortcodes {
	public function __construct() {

		add_shortcode( 'videoBox', [ $this, 'video_shortcode' ] );
		add_shortcode( 'buttonBox', [ $this, 'button_shortcode' ] );
		add_shortcode( 'iframeBox', [ $this, 'iframe_shortcode' ] );
		add_shortcode( 'wow-icon', [ $this, 'shortcode_icon' ] );
		add_shortcode( 'w-row', [ $this, 'shortcode_row' ] );
		add_shortcode( 'w-column', [ $this, 'shortcode_columns' ] );
	}

	public function video_shortcode( $atts ): string {
		$atts = shortcode_atts( array(
			'id'     => '',
			'from'   => 'youtube',
			'width'  => '560',
			'height' => '315',
		), $atts, 'videoBox' );

		if ( empty( $atts['id'] ) ) {
			return false;
		}

		if ( $atts['from'] === 'youtube' ) {
			$url = 'https://www.youtube.com/embed/';
		} elseif ( $atts['from'] === 'vimeo' ) {
			$url = 'https://player.vimeo.com/video/';
		}

		return '<iframe width="' . absint( $atts['width'] ) . '" height="' . absint( $atts['height'] ) . '" src="' . esc_url( $url ) . esc_attr( $atts['id'] ) . '" allow="autoplay" frameborder="0" loading="lazy"></iframe>';
	}

	public function button_shortcode( $atts, $content ): string {
		$atts = shortcode_atts( array(
			'type'      => 'close',
			'link'      => '',
			'target'    => '_blank',
			'color'     => 'white',
			'bgcolor'   => 'mediumaquamarine',
			'size'      => 'normal',
			'fullwidth' => 'no',
		), $atts, 'buttonBox' );

		$size      = 'is-' . $atts['size'];
		$button    = '';
		$fullwidth = ( $atts['fullwidth'] === 'yes' ) ? 'is-fullwidth' : '';
		if ( $atts['type'] === 'close' ) {
			$button = '<button class="modal-button modal-close-button ' . esc_attr( $size ) . ' ' . esc_attr( $fullwidth ) . '" style="color:' . esc_attr( $atts['color'] ) . '; background:' . esc_attr( $atts['bgcolor'] ) . '">' . esc_html( $content ) . '</button>';
		} elseif ( $atts['type'] === 'link' ) {
			$button = '<a href="' . esc_url( $atts['link'] ) . '" target="' . esc_attr( $atts['target'] ) . '" class="modal-button ' . esc_attr( $size ) . ' ' . esc_attr( $fullwidth ) . '" style="color:' . esc_attr( $atts['color'] ) . '; background:' . esc_attr( $atts['bgcolor'] ) . '">' . esc_attr( $content ) . '</a>';
		}

		return $button;
	}

	public function iframe_shortcode( $atts ): string {
		$atts = shortcode_atts( array(
			'link'   => '',
			'width'  => '560',
			'height' => '450',
			'attr'   => '',
		), $atts, 'iframeBox' );

		$iframe = '<iframe width="' . esc_attr( $atts['width'] ) . '" height="' . esc_attr( $atts['height'] ) . '" src="' . esc_url( $atts['link'] ) . '" ' . wp_kses_post( $atts['attr'] ) . ' loading="lazy"></iframe>';

		return $iframe;
	}

	public function shortcode_icon( $atts ): string {

		$handle          = WOWP_Plugin::SLUG;
		$assets          = plugin_dir_url( __FILE__ ) . 'assets/';
		$version         = WOWP_Plugin::info( 'version' );
		$url_fontawesome = WOWP_Plugin::url() . '/vendors/fontawesome/css/all.min.css';

		$atts = shortcode_atts( array(
			'name'   => "",
			'size'   => "",
			'color'  => "",
			'link'   => "",
			'target' => "",
		), $atts );

		if ( ! empty( $atts['size'] ) || ! empty( $atts['color'] ) ) {
			$size  = ( ! empty( $atts['size'] ) ) ? "font-size:" . $atts['size'] . "px;" : '';
			$color = ( ! empty( $atts['color'] ) ) ? "color:" . $atts['color'] : '';
			$style = ' style="' . esc_attr($size . $color) . '"';
		} else {
			$style = '';
		}
		if ( ! empty( $atts['link'] ) ) {
			$icon = '<a href="' . esc_url($atts['link']) . '" target="' . esc_attr($atts['target']) . '"><i class="' . esc_attr($atts['name']) . '"' . $style . '></i></a>';
		} else {
			$icon = '<i class="' . esc_attr($atts['name']) . '"' . $style . '></i>';
		}

		wp_enqueue_style( $handle . '-fontawesome', $url_fontawesome, null, '6.5.1' );

		return $icon;

	}

	public function shortcode_row( $atts, $content = null ) {
		return '<div class="wow-col">' . do_shortcode( wp_kses_post( $content ) ) . '</div>';
	}

	public function shortcode_columns( $atts, $content = null ) {

		$atts = shortcode_atts(
			[ 'width' => "12", 'align' => 'left' ],
			$atts,
			'w-column'
		);

		return '<div class="wow-col-' . esc_attr( $atts['width'] ) . '" style="text-align: ' . esc_attr( $atts['align'] ) . '">' . do_shortcode( wp_kses_post( $content ) ) . '</div>';
	}
}

new WOWP_Shortcodes;