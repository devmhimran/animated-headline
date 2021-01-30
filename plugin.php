<?php

		namespace RigElements;

		use RigElements\PageSettings\Page_Settings;


		class Plugin {


			private static $_instance = null;


			public static function instance() {
				if ( is_null( self::$_instance ) ) {
					self::$_instance = new self();
				}
				return self::$_instance;
			}
			

			// Load Styles And Scripts

			public function rig_elements_widget_styles() {
				wp_register_style( 'core_css', plugins_url( 'assets/css/core.css', __FILE__ ) );
				// wp_register_style( 'test_css', plugins_url( 'assets/css/test.css', __FILE__ ) );
				wp_register_style( 'rigmain', plugins_url( 'assets/css/main.css', __FILE__ ) );
				wp_register_style( 'slick_css', plugins_url( 'assets/css/slick.css', __FILE__ ) );
				// wp_register_style( 'core_css', plugins_url( 'assets/css/core.css', __FILE__ ) );
				wp_register_style( 'rig_bootstrap', plugins_url( 'lib/css/bs.min.css', __FILE__ ) );
			}

			public function rig_elements_widget_scripts() {
				wp_register_script( 'rig-elements', plugins_url( '/assets/js/hello-world.js', __FILE__ ), [ 'jquery' ], false, true );
				wp_register_script( 'slickjs', plugins_url( '/assets/js/slick.min.js', __FILE__ ), [ 'jquery' ], false, true );
				wp_register_script( 'rig-main', plugins_url( '/assets/js/main.js', __FILE__ ), [ 'jquery' ], false, true );
			}


			// Load Admin Scripts
			public function rig_elements_editor_scripts() {
				add_filter( 'script_loader_tag', [ $this, 'editor_scripts_as_a_module' ], 10, 2 );

				wp_enqueue_script(
					'rig-elements-editor',
					plugins_url( '/assets/js/editor/editor.js', __FILE__ ),
					['elementor-editor',],'1.2.1',true);

					// wp_enqueue_script(
					// 	'rig-main-admin',
					// 	plugins_url( '/assets/js/main.js', __FILE__ ),
					// 	['jquery',],false,true);
			}


			public function editor_scripts_as_a_module( $tag, $handle ) {
				if ( 'rig-elements-editor' === $handle ) {
					$tag = str_replace( '<script', '<script type="module"', $tag );
				}

				return $tag;
			}


			// Include/Require Widgets

			private function rig_elements_include_widgets() {
				//require_once( __DIR__ . '/widgets/hello-world.php' );
				// require_once( __DIR__ . '/widgets/inline-editing.php' );
				require_once( __DIR__ . '/widgets/flipbox.php' );
				require_once( __DIR__ . '/widgets/smart-product-card.php' );
				require_once( __DIR__ . '/widgets/rig-card.php' );
				require_once( __DIR__ . '/widgets/rig-advance-products.php' );
				require_once( __DIR__ . '/widgets/advanced-post.php' );
				require_once( __DIR__ . '/widgets/rig-dark-mode.php' );
				// require_once( __DIR__ . '/widgets/advanced-testimonial.php' );
			}


			// Register Widgets

			public function rig_elements_register_widgets() {
				$this->rig_elements_include_widgets();

			//	\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Hello_World() );
				// \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Inline_Editing() );
				\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Flipbox() );
				\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\SmartProductCard() );
				\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Rig_Card() );
				\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Rig_Advance_Products() );
				\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\AdvancedPosts() );
				\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Rig_Dark_Mode() );
				// \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\AdvancedTestimonial() );
			}


			private function rig_elements_page_settings_controls() {
				require_once( __DIR__ . '/page-settings/manager.php' );
				new Page_Settings();
			}

			public function rig_elements_widget_category($elements_manager) {
				$elements_manager->add_category(
					'rig_elements_widgets',
					[
						'title' => __( 'Rig Elements', 'rig-elements' ),
						'icon' => 'fa fa-plug',
					]
				);
			
			}


			public function __construct() {
				add_action( 'elementor/elements/categories_registered', [ $this, 'rig_elements_widget_category' ] );
				add_action( 'elementor/frontend/after_enqueue_styles', [ $this, 'rig_elements_widget_styles' ] );
				add_action( 'elementor/frontend/after_register_scripts', [ $this, 'rig_elements_widget_scripts' ] );
				add_action( 'elementor/widgets/widgets_registered', [ $this, 'rig_elements_register_widgets' ] );
				add_action( 'elementor/editor/after_enqueue_scripts', [ $this, 'rig_elements_editor_scripts' ] );
				
				
				$this->rig_elements_page_settings_controls();
			}
		}


		Plugin::instance();
