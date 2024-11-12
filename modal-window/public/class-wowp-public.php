<?php

/**
 * Class WOWP_Public
 *
 * This class handles the public functionality of the Float Menu Pro plugin.
 *
 * @package    ModalWindow
 * @subpackage Public
 * @author     Dmytro Lobov <hey@wow-company.com>, Wow-Company
 * @copyright  2024 Dmytro Lobov
 * @license    GPL-2.0+
 */

namespace ModalWindow;

use ModalWindow\Admin\DBManager;
use ModalWindow\Maker\Modal;
use ModalWindow\Maker\Script;
use ModalWindow\Publish\Conditions;
use ModalWindow\Publish\Display;
use ModalWindow\Publish\Singleton;

defined( 'ABSPATH' ) || exit;

class WOWP_Public {

	private string $pefix;

	public function __construct() {
		$this->includes();
		// prefix for plugin assets
		$this->pefix = '.min';

		add_shortcode( WOWP_Plugin::SHORTCODE, [ $this, 'shortcode' ] );

		add_action( 'wp_enqueue_scripts', [ $this, 'assets' ] );
		add_action( 'wp_footer', [ $this, 'footer' ] );
		add_action( 'wp_footer', [ $this, 'load_assets' ] );
	}

	public function includes(): void {
		require_once plugin_dir_path( __FILE__ ) . 'class-shortcodes.php';
	}

	public function shortcode($atts): string {
		$atts = shortcode_atts(
			[ 'id' => "" ],
			$atts,
			WOWP_Plugin::SHORTCODE
		);

		if ( empty( $atts['id'] ) ) {
			return '';
		}
		$result = DBManager::get_data_by_id( $atts['id'] );

		if ( empty( $result->param ) ) {
			return '';
		}

		$conditions = Conditions::init( $result );
		if ( $conditions === false ) {
			return '';
		}

		$param  = maybe_unserialize( $result->param );
		$walker = new Modal( $atts['id'], $param, $result->title );
		$out    = $walker->init();

		$singleton = Singleton::getInstance();
		$singleton->setValue( $atts['id'], $param );

		return $out;
	}


	public function load_assets(): void {
		$handle          = WOWP_Plugin::SLUG;
		$assets          = plugin_dir_url( __FILE__ ) . 'assets/';
		$version         = WOWP_Plugin::info( 'version' );
		$url_fontawesome = WOWP_Plugin::url() . '/vendors/fontawesome/css/all.min.css';

		$singleton  = Singleton::getInstance();
		$args = $singleton->getValue();

		if ( ! empty( $args ) ) {
			wp_enqueue_script( $handle, $assets . 'js/modalWindow' . $this->pefix . '.js', ['jquery'], $version, true );
			$data = [];
			foreach ( $args as $id => $param ) {
				$script = new Script( $id, $param );
				$data['modal-window-' . absint( $id)] = $script->init();
				if($param['button_type'] === '2' || $param['button_type'] === '3') {
					wp_enqueue_style( $handle . '-fontawesome', $url_fontawesome, null, '6.6' );
				}
			}

			$data['ajaxurl'] = admin_url( 'admin-ajax.php' );
			$data['nonce'] = wp_create_nonce( 'modal_nonce' );
			wp_localize_script( $handle, 'ModalWindow', $data );
		}
	}

	public function assets(): void {
		$handle  = WOWP_Plugin::SLUG;
		$assets  = plugin_dir_url( __FILE__ ) . 'assets/';
		$version = WOWP_Plugin::info( 'version' );

		wp_enqueue_style( $handle, $assets . 'css/modal' . $this->pefix . '.css', null, $version );
	}

	public function footer(): void {
		$args = $this->check_display();

		if ( empty( $args ) ) {
			return;
		}
		$shortcodes = '';
		foreach ( $args as $id => $param ) {
			$shortcodes .= '[' . WOWP_Plugin::SHORTCODE . ' id="' . absint( $id ) . '"]';
		}

		echo do_shortcode( $shortcodes );
	}

	private function check_display(): array {
		$args    = [];
		$results = DBManager::get_all_data();

		if ( $results === false ) {
			return $args;
		}

		foreach ( $results as $result ) {
			$param = maybe_unserialize( $result->param );
			if ( Display::init( $result->id, $param ) === true && Conditions::init( $result ) === true ) {
				$args[ $result->id ] = $param;
			}
		}

		return $args;
	}

}