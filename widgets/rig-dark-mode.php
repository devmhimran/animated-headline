<?php
		namespace RigElements\Widgets;

		use Elementor\Widget_Base;
		use Elementor\Controls_Manager;

		if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


		class Rig_Dark_Mode extends Widget_Base {


			public function get_name() {
				return 'rig-dark-mode';
			}


			public function get_title() {
				return __( 'Dark Mode', 'rig-elements' );
			}


			public function get_icon() {
				return 'fas fa-toggle-on';
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
					'rig_dark_mode_dark_button',
					[
						'label' => __( 'Dark Button', 'rig-elements' ),
					]
				);

				$this->add_control(
					'rig_dark_mode_dark_button_text',
					[
						'label' => __( 'Button Text', 'rig-elements' ),
						'type' => \Elementor\Controls_Manager::TEXT,
						'default' => __( 'Dark Mode', 'rig-elements' ),
						'placeholder' => __( 'Enter Dark Button Text', 'rig-elements' ),
					]
				);

				$this->add_control(
					'rig_dark_mode_dark_button_icon',
					[
						'label' => __( 'Button Icon', 'rig-elements' ),
						'type' => \Elementor\Controls_Manager::ICONS,
						'default' => [
							'value' => 'fas fa-moon',
							'library' => 'solid',
						],
					]
				);

				
				$this->end_controls_section();

				$this->start_controls_section(
					'rig_dark_mode_light_button',
					[
						'label' => __( 'Light Button', 'rig-elements' ),
					]
				);

				$this->add_control(
					'rig_dark_mode_light_button_text',
					[
						'label' => __( 'Button Text', 'rig-elements' ),
						'type' => \Elementor\Controls_Manager::TEXT,
						'default' => __( 'Light Mode', 'rig-elements' ),
						'placeholder' => __( 'Enter Light Button Text', 'rig-elements' ),
					]
				);


				$this->add_control(
					'rig_dark_mode_light_button_icon',
					[
						'label' => __( 'Button Icon', 'rig-elements' ),
						'type' => \Elementor\Controls_Manager::ICONS,
						'default' => [
							'value' => 'fas fa-sun',
							'library' => 'solid',
						],
					]
				);
				

				$this->end_controls_section();

				$this->start_controls_section(
					'rig_dark_mode_typography_controls',
					[
						'label' => __( 'Typography', 'rig-elements' ),
						'tab' => Controls_Manager::TAB_STYLE,
					]
				);

				$this->add_group_control(
					\Elementor\Group_Control_Typography::get_type(),
					[
						'name' => 'rig_dark_mode_dark_button_typography',
						'label' => __( 'Dark Button Typography', 'rig-elements' ),
						'selector' => '{{WRAPPER}} .rig-dark-mode-button',
					]
				);

				$this->add_group_control(
					\Elementor\Group_Control_Typography::get_type(),
					[
						'name' => 'rig_dark_mode_light_button_typography',
						'label' => __( 'Light Button Typography', 'rig-elements' ),
						'selector' => '{{WRAPPER}} .rig-light-mode-button',
					]
				);


				$this->end_controls_section();

				$this->start_controls_section(
					'rig_dark_mode_color_controls',
					[
						'label' => __( 'Color', 'rig-elements' ),
						'tab' => Controls_Manager::TAB_STYLE,
					]
				);

				$this->add_control(
					'rig_dark_mode_dark_button_bg_color',
					[
						'label' => __( 'Dark Button Color', 'rig-elements' ),
						'type' => \Elementor\Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} .rig-dark-mode-button' => 'background-color: {{VALUE}}',
						],
					]
				);

				$this->add_control(
					'rig_dark_mode_dark_button_text_color',
					[
						'label' => __( 'Dark Button Text Color', 'rig-elements' ),
						'type' => \Elementor\Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} .rig-dark-mode-button' => 'color: {{VALUE}}',
						],
					]
				);


				$this->add_control(
					'rig_dark_mode_light_button_bg_color',
					[
						'label' => __( 'Light Button Color', 'rig-elements' ),
						'type' => \Elementor\Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} .rig-dark-mode-button' => 'background-color: {{VALUE}}',
						],
					]
				);

				$this->add_control(
					'rig_dark_mode_light_button_text_color',
					[
						'label' => __( 'Dark Button Text Color', 'rig-elements' ),
						'type' => \Elementor\Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} .rig-light-mode-button' => 'color: {{VALUE}}',
						],
					]
				);

				$this->end_controls_section();

				
			}


			protected function render() {
				$settings = $this->get_settings_for_display();
                
				echo'
				<button class="rig-dark-mode-button"><i class="'.$settings['rig_dark_mode_dark_button_icon']['value'].'"></i> '.$settings['rig_dark_mode_dark_button_text'].'</button>
				<button class="rig-light-mode-button" hidden="hidden"><i class="'.$settings['rig_dark_mode_light_button_icon']['value'].'"></i> '.$settings['rig_dark_mode_light_button_text'].'</button>';

			}
			
		}
