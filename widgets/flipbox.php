<?php
		namespace RigElements\Widgets;

		use Elementor\Widget_Base;
		use Elementor\Controls_Manager;

		if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


		class Flipbox extends Widget_Base {


			public function get_name() {
				return 'flipbox';
			}


			public function get_title() {
				return __( '3D Flipbox', 'rig-elements' );
			}


			public function get_icon() {
				return 'eicon-posts-ticker';
			}


			public function get_categories() {
				return [ 'rig_elements_widgets' ];
			}


			public function get_style_depends() {
				return [ 'core_css'];
			}

			public function get_script_depends() {
				return [ 'rig-elements','rig-main' ];
			}


			protected function _register_controls() {
				$this->start_controls_section(
					'flipbox_content',
					[
						'label' => __( 'Content', 'rig-elements' ),
					]
				);

				$this->add_control(
					'flipbox_front_text',
					[
						'label' => __( 'Front Text', 'rig-elements' ),
						'type' => Controls_Manager::TEXTAREA,
						'default' => 'Rig Elements',
					]
				);

				$this->add_control(
					'flipbox_back_text',
					[
						'label' => __( 'Back Text', 'rig-elements' ),
						'type' => Controls_Manager::TEXTAREA,
						'default' => 'Lorem Ipsum Dollar Sit Amet Nulla',
					]
				);

				$this->add_control(
					'flipbox_button_text',
					[
						'label' => __( 'Button Text', 'rig-elements' ),
						'type' => Controls_Manager::TEXT,
						'default' => 'Click Here',
					]
				);

				$this->add_control(
					'flipbox_image',
					[
						'label' => __( 'Choose Image', 'plugin-domain' ),
						'type' => \Elementor\Controls_Manager::MEDIA,
						'default' => [
							'url' => \Elementor\Utils::get_placeholder_image_src(),
						],
					]
				);

				$this->end_controls_section();

				$this->start_controls_section(
					'section_style',
					[
						'label' => __( 'Style', 'rig-elements' ),
						'tab' => Controls_Manager::TAB_STYLE,
					]
				);

				$this->add_control(
					'text_transform',
					[
						'label' => __( 'Text Transform', 'rig-elements' ),
						'type' => Controls_Manager::SELECT,
						'default' => '',
						'options' => [
							'' => __( 'None', 'rig-elements' ),
							'uppercase' => __( 'UPPERCASE', 'rig-elements' ),
							'lowercase' => __( 'lowercase', 'rig-elements' ),
							'capitalize' => __( 'Capitalize', 'rig-elements' ),
						],
						'selectors' => [
							'{{WRAPPER}} .title' => 'text-transform: {{VALUE}};',
						],
					]
				);

				$this->end_controls_section();
			}


			protected function render() {
                $settings = $this->get_settings_for_display();
                ?>

            <div class="content">
            <a class="card" href="#!">
                <div class="front" style="background-image: url(<?php echo $settings ['flipbox_image']['url'];?>)">
                <p><?php echo $settings ['flipbox_front_text'];?></p>
                </div>
                <div class="back">
                <div>
                    <p><?php echo $settings ['flipbox_back_text'];?></p>
                    <button class="button"><?php echo $settings ['flipbox_button_text'];?></button>
                </div>
                </div></a>
            </div>
                <?php

				// echo '<div class="title">';
				// echo $settings['title'];
				// echo '</div>';
			}


			
		}
