<?php

/**
 * Class UpdateDB
 *
 * Contains methods for updating the database structure and data
 *
 * @package    ModalWindow
 * @subpackage Update
 * @author     Dmytro Lobov <hey@wow-company.com>, Wow-Company
 * @copyright  2024 Dmytro Lobov
 * @license    GPL-2.0+
 *
 */

namespace ModalWindow\Update;

use ModalWindow\Admin\DBManager;
use ModalWindow\Settings_Helper;
use ModalWindow\WOWP_Plugin;

class UpdateDB {

	public static function init(): void {
		$current_db_version = get_option( WOWP_Plugin::PREFIX . '_db_version' );

		if ( $current_db_version && version_compare( $current_db_version, '5.0', '>=' ) ) {
			return;
		}

		self::start_update();

		update_option( WOWP_Plugin::PREFIX . '_db_version', '5.0' );
	}

	public static function start_update(): void {
		self::update_database();
		self::update_fields();
	}

	public static function update_database(): void {

		global $wpdb;
		$table           = $wpdb->prefix . WOWP_Plugin::PREFIX;
		$charset_collate = $wpdb->get_charset_collate();

		$columns = "
			id mediumint(9) NOT NULL AUTO_INCREMENT,
			title VARCHAR(200) DEFAULT '' NOT NULL,
			param longtext DEFAULT '' NOT NULL,
			status boolean DEFAULT 0 NOT NULL,
			mode boolean DEFAULT 0 NOT NULL,
			tag text DEFAULT '' NOT NULL,
			PRIMARY KEY  (id)
			";

		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

		$sql = "CREATE TABLE $table ($columns) $charset_collate;";
		dbDelta( $sql );
	}


	public static function update_fields(): void {
		$results = DBManager::get_all_data();

		if ( empty( $results ) || ! is_array( $results ) ) {
			return;
		}
		foreach ( $results as $result ) {
			$param     = maybe_unserialize( $result->param );
			$test_mode = $param['test_mode'] ?? '';
			$status    = ( ! empty( $result->status ) ) ? 0 : 1;

			$param = self::update_param( $param );

			$data = [
				'param'  => maybe_serialize( $param ),
				'status' => absint( $status ),
				'mode'   => absint( $test_mode ),
				'tag'    => '',
			];

			$where = [ 'id' => $result->id ];

			$data_formats = [ '%s', '%d', '%d', '%s' ];

			DBManager::update( $data, $where, $data_formats );

		}
	}

	public static function update_param( $param ) {

		// Show
		if ( ! is_array( $param['show'] ) ) {
			$show_old = ! empty( $param['show'] ) ? $param['show'] : 'everywhere';

			$param['show']      = [];
			$param['operator']  = [];
			$param['page_type'] = [];
			$param['ids']       = [];

			$param['show'][0]      = 'shortcode';
			$param['operator'][0]  = '1';
			$param['page_type'][0] = 'is_front_page';
			$param['ids'][0]       = ! empty( $param['id_post'] ) ? $param['id_post'] : '';

			switch ( $show_old ) {
				case 'all':
					$param['show'][0] = 'everywhere';
					break;
				case 'onlypost':
					$param['show'][0] = 'post_all';
					break;
				case 'posts':
					$param['show'][0] = 'post_selected';
					break;
				case 'postsincat':
					$param['show'][0] = 'post_category';
					break;
				case 'expost':
					$param['show'][0]     = 'post_selected';
					$param['operator'][0] = 0;
					break;
				case 'onlypage':
					$param['show'][0] = 'page_all';
					break;
				case 'pages':
					$param['show'][0] = 'page_selected';
					break;
				case 'expage':
					$param['show'][0]     = 'page_selected';
					$param['operator'][0] = 0;
					break;
				case 'homepage':
					$param['show'][0]      = 'page_type';
					$param['page_type'][0] = 'is_front_page';
					break;
				case 'searchpage':
					$param['show'][0]      = 'page_type';
					$param['page_type'][0] = 'is_search';
					break;
				case 'archivepage':
					$param['show'][0]      = 'page_type';
					$param['page_type'][0] = 'is_archive';
					break;
				case 'error_page':
					$param['show'][0]      = 'page_type';
					$param['page_type'][0] = 'is_404';
					break;
				case 'post_type':
					$custom_post      = $param['post_types'] ?? '';
					$param['show'][0] = 'custom_post_all_' . $custom_post;
					break;
				case 'taxonomy':
					$taxonomy         = $param['taxonomy'] ?? '';
					$param['show'][0] = 'custom_post_tax_|' . $taxonomy;
					break;
			}
		}

		return $param;
	}

}