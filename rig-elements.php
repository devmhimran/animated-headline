<?php
/**
 * Plugin Name: Rig Elements For Elementor
 * Description: An Ultimate collections of Elements, Blocks, Landing Page, Popups and much more for Elementor
 * Plugin URI:  https://codember.com/
 * Version:     1.0
 * Author:      Codember
 * Author URI:  https://elementor.com/
 * Text Domain: rig-elements
 */

		if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


		final class Rig_Elements {

			const VERSION = '1.2.1';

			const MINIMUM_ELEMENTOR_VERSION = '3.0.0';


			const MINIMUM_PHP_VERSION = '7.0';


			public function __construct() {

				// Load translation
				add_action( 'init', array( $this, 'i18n' ) );

				// Init Plugin
				add_action( 'plugins_loaded', array( $this, 'init' ) );

				// include_once ( plugin_dir_path( __FILE__ ) . '/includes/library/library-manager.php' );
				require_once plugin_dir_path( __FILE__ ) .'library-manager.php'; // All Enqueued Scripts
			}


			public function i18n() {
				load_plugin_textdomain( 'rig-elements' );
			}


			public function init() {

				// Check if Elementor installed and activated
				if ( ! did_action( 'elementor/loaded' ) ) {
					add_action( 'admin_notices', array( $this, 'admin_notice_missing_main_plugin' ) );
					return;
				}

				// Check for required Elementor version
				if ( ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
					add_action( 'admin_notices', array( $this, 'admin_notice_minimum_elementor_version' ) );
					return;
				}

				// Check for required PHP version
				if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
					add_action( 'admin_notices', array( $this, 'admin_notice_minimum_php_version' ) );
					return;
				}

				// Once we get here, We have passed all validation checks so we can safely include our plugin
				require_once( 'plugin.php' );
			}



			public function admin_notice_missing_main_plugin() {
				if ( isset( $_GET['activate'] ) ) {
					unset( $_GET['activate'] );
				}

				$message = sprintf(
					/* translators: 1: Plugin name 2: Elementor */
					esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'rig-elements' ),
					'<strong>' . esc_html__( 'Rig Elements', 'rig-elements' ) . '</strong>',
					'<strong>' . esc_html__( 'Elementor', 'rig-elements' ) . '</strong>'
				);

				printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
			}


			public function admin_notice_minimum_elementor_version() {
				if ( isset( $_GET['activate'] ) ) {
					unset( $_GET['activate'] );
				}

				$message = sprintf(
					/* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */
					esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'rig-elements' ),
					'<strong>' . esc_html__( 'Rig Elements', 'rig-elements' ) . '</strong>',
					'<strong>' . esc_html__( 'Elementor', 'rig-elements' ) . '</strong>',
					self::MINIMUM_ELEMENTOR_VERSION
				);

				printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
			}


			public function admin_notice_minimum_php_version() {
				if ( isset( $_GET['activate'] ) ) {
					unset( $_GET['activate'] );
				}

				$message = sprintf(
					/* translators: 1: Plugin name 2: PHP 3: Required PHP version */
					esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'rig-elements' ),
					'<strong>' . esc_html__( 'Rig Elements', 'rig-elements' ) . '</strong>',
					'<strong>' . esc_html__( 'PHP', 'rig-elements' ) . '</strong>',
					self::MINIMUM_PHP_VERSION
				);

				printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
			}
		}

		// Instantiate Rig_Elements.

		new Rig_Elements();
