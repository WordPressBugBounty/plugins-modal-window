<?php

/**
 * Class WOWP_Admin
 *
 * The main admin class responsible for initializing the admin functionality of the plugin.
 *
 * @package    ModalWindow
 * @subpackage Admin
 * @author     Dmytro Lobov <hey@wow-company.com>, Wow-Company
 * @copyright  2024 Dmytro Lobov
 * @license    GPL-2.0+
 */

namespace ModalWindow;

use ModalWindow\Admin\AdminActions;
use ModalWindow\Admin\Dashboard;

defined( 'ABSPATH' ) || exit;

class WOWP_Admin {
	public function __construct() {
		Dashboard::init();
		AdminActions::init();
		$this->includes();

		add_action( WOWP_Plugin::PREFIX . '_admin_header_links', [ $this, 'plugin_links' ] );
		add_filter( WOWP_Plugin::PREFIX . '_save_settings', [ $this, 'save_settings' ] );
		add_action( WOWP_Plugin::PREFIX . '_admin_load_assets', [ $this, 'load_assets' ] );

		add_action( 'wp_ajax_modal_window_preview_content', [ $this, 'modal_window_preview_content' ] );
	}

	public function modal_window_preview_content(): void {
		if ( empty( $_POST['security_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['security_nonce'] ) ),
				WOWP_Plugin::PREFIX . '_nonce' ) ) {
			wp_send_json_error( 'Invalid nonce' );
			die();
		}

		if ( empty( $_POST['data'] ) ) {
			return;
		}

		$content = do_shortcode( wp_unslash( $_POST['data'] ) );
		parse_str( wp_unslash($_POST['form_data']), $output );

		$modal_maker = new Modal_Maker( 'preview', $output['param'], $output['title'], $content );
		$modal       = $modal_maker->init();

		$option_maker = new Script_Maker( 'preview', $output['param'] );
		$options      = $option_maker->init();

		$response = [
			'content' => $modal,
			'options' => $options,
		];

		wp_send_json_success( $response );
		die();
	}

	public function includes(): void {
		require_once plugin_dir_path( __FILE__ ) . 'class-settings-helper.php';
		require_once plugin_dir_path( __FILE__ ) . 'class-modal-maker.php';
		require_once plugin_dir_path( __FILE__ ) . 'class-script-maker.php';
	}

	public function plugin_links(): void {
		?>
        <div class="wpie-links">
            <a href="<?php
			echo esc_url( WOWP_Plugin::info( 'pro' ) ); ?>" target="_blank">PRO Plugin</a>
            <a href="<?php
			echo esc_url( WOWP_Plugin::info( 'docs' ) ); ?>" target="_blank">Documentation</a>
            <a href="<?php
			echo esc_url( WOWP_Plugin::info( 'rating' ) ); ?>" target="_blank" class="wpie-color-orange">Rating</a>
            <a href="<?php echo esc_url( WOWP_Plugin::info( 'change' ) ); ?>" target="_blank">Check Version</a>
        </div>
		<?php
	}

	public function save_settings() {
		$param            = ! empty( $_POST['param'] ) ? map_deep( $_POST['param'], 'sanitize_text_field' ) : [];
		$param['content'] = $this->sanitize_content( wp_unslash( $_POST['param']['content'] ) );

		return $param;
	}


	private function sanitize_content( $content ) {
		// Define a custom allowed HTML array including form elements
		$allowed_html = array_merge(
			wp_kses_allowed_html( 'post' ), // Allow all tags permitted by wp_kses_post
			array(
				'form'     => array(
					'action' => true,
					'method' => true,
					'id'     => true,
					'class'  => true,
				),
				'input'    => array(
					'type'        => true,
					'name'        => true,
					'value'       => true,
					'placeholder' => true,
					'id'          => true,
					'class'       => true,
					'checked'     => true,
				),
				'textarea' => array(
					'name'        => true,
					'id'          => true,
					'class'       => true,
					'rows'        => true,
					'cols'        => true,
					'placeholder' => true,
				),
				'button'   => array(
					'type'  => true,
					'name'  => true,
					'value' => true,
					'id'    => true,
					'class' => true,
				),
				'select'   => array(
					'name'  => true,
					'id'    => true,
					'class' => true,
				),
				'option'   => array(
					'value'    => true,
					'selected' => true,
				),
			)
		);

		$sanitized_content = wp_kses( wp_encode_emoji( $content ), $allowed_html );

		return $sanitized_content;
	}

	public function sanitize_text( $text ): string {
		return sanitize_text_field( wp_unslash( $text ) );
	}


	public function load_assets(): void {
		wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_script( 'wp-color-picker' );
		wp_enqueue_script( 'wp-tinymce' );
		wp_enqueue_editor();
		wp_enqueue_media();
		wp_enqueue_script( 'thickbox' );
		wp_enqueue_style( 'thickbox' );

		wp_enqueue_script( 'code-editor' );
		wp_enqueue_style( 'code-editor' );
		wp_enqueue_script( 'htmlhint' );
		wp_enqueue_script( 'csslint' );

		wp_enqueue_style( 'modal-fontawesome', WOWP_Plugin::url() . 'vendors/fontawesome/css/all.min.css', [], '6.6' );

		// include fonticonpicker styles & scripts
		$url_assets        = WOWP_Plugin::url() . 'vendors/';
		$slug              = 'modal-window';
		$fonticonpicker_js = $url_assets . 'fonticonpicker/fonticonpicker.min.js';
		wp_enqueue_script( $slug . '-fonticonpicker', $fonticonpicker_js, array( 'jquery' ), '2.0', true );

		$fonticonpicker_css = $url_assets . 'fonticonpicker/css/fonticonpicker.min.css';
		wp_enqueue_style( $slug . '-fonticonpicker', $fonticonpicker_css, null, '2.0' );

		$fonticonpicker_dark_css = $url_assets . 'fonticonpicker/fonticonpicker.darkgrey.min.css';
		wp_enqueue_style( $slug . '-fonticonpicker-darkgrey', $fonticonpicker_dark_css, null, '2.0' );

		$arg = [
			'plugin_url' => WOWP_Plugin::url(),
		];

		wp_localize_script( 'wp-tinymce', 'modal_window_obj', $arg );
	}


}