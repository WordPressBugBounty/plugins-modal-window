<?php

/**
 * Class Conditions
 *
 * Provides methods to check conditions for displaying item
 *
 * @package    WowPlugin
 * @subpackage Publish
 * @author     Dmytro Lobov <hey@wow-company.com>, Wow-Company
 * @copyright  2024 Dmytro Lobov
 * @license    GPL-2.0+
 */

namespace ModalWindow\Publish;

use ModalWindow\WOWP_Plugin;
use ModalWindow\WOWP_Public;

defined( 'ABSPATH' ) || exit;

class Conditions {

	public static function init( $result ): bool {
		$param = ! empty( $result->param ) ? maybe_unserialize( $result->param ) : [];

		$check = [
			'status'    => self::status( $result->status ),
			'mode'      => self::mode( $result->mode ),
			'show_once' => self::show_once( $result->id, $param ),
		];

		if ( in_array( false, $check, true ) ) {
			return false;
		}

		return true;
	}

	private static function status( $status ): bool {
		return empty( $status );
	}

	private static function mode( $mode ): bool {
		return empty( $mode ) || current_user_can( 'manage_options' );
	}

	private static function show_once( $id, $param ): bool {
		if ( $param['use_cookies'] !== 'yes' ) {
			return true;
		}
		$name = 'wow-modal-id-' . $id;

		return ! isset( $_COOKIE[ $name ] );
	}

}