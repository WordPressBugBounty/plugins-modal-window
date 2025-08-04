<?php
/**
 * AdminActions class for Modal Window plugin.
 *
 * @package ModalWindow\Admin
 *
 * Methods:
 * - init()            Initialize admin actions hook
 * - actions()         Handle admin requests based on request name
 * - verify( $name )   Verify nonce and user capability
 * - check_name()      Detect action name from $_REQUEST
 */

namespace ModalWindow\Admin;

use ModalWindow\WOWP_Plugin;

defined( 'ABSPATH' ) || exit;

class AdminActions {

	public static function init(): void {
		add_action( 'admin_init', [ __CLASS__, 'actions' ] );
	}

	public static function actions(): bool {
		$name = self::check_name();

		if ( ! $name || ! self::verify( $name ) ) {
			return false;
		}

		$map = [
			'_export_data'     => [ ImporterExporter::class,     'export_data' ],
			'_export_item'     => [ ImporterExporter::class,     'export_item' ],
			'_import_data'     => [ ImporterExporter::class,     'import_data' ],
			'_remove_item'     => [ DBManager::class,            'remove_item' ],
			'_settings'        => [ Settings::class,             'save_item' ],
			'_activate_item'   => [ Settings::class,             'activate_item' ],
			'_deactivate_item' => [ Settings::class,             'deactivate_item' ],
			'_activate_mode'   => [ Settings::class,             'activate_mode' ],
			'_deactivate_mode' => [ Settings::class,             'deactivate_mode' ],
			'_capabilities'    => [ ManageCapabilities::class,   'save' ],
		];

		foreach ( $map as $key => $callback ) {
			if ( is_callable( $callback ) && strpos( $name, $key ) !== false ) {
				$callback();
				break;
			}
		}

		return true;
	}

	public static function verify( string $name ): bool {
		$nonce_action = WOWP_Plugin::PREFIX . '_nonce';
		$nonce        = sanitize_text_field( wp_unslash( $_REQUEST[ $name ] ?? '' ) );
		$capability   = ManageCapabilities::get_capability();

		return $nonce && wp_verify_nonce( $nonce, $nonce_action ) && current_user_can( $capability );
	}

	private static function check_name(): string {
		$actions = [
			'_import_data',
			'_export_data',
			'_export_item',
			'_remove_item',
			'_settings',
			'_activate_item',
			'_deactivate_item',
			'_activate_mode',
			'_deactivate_mode',
			'_capabilities',
		];

		foreach ( $actions as $action ) {
			$name = WOWP_Plugin::PREFIX . $action;
			// phpcs:ignore WordPress.Security.NonceVerification.Recommended
			if ( isset( $_REQUEST[ $name ] ) ) {
				return $name;
			}
		}

		return '';
	}
}