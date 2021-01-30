<?php
		namespace RigElements\Widgets;

		use Elementor\Widget_Base;
		use Elementor\Controls_Manager;

		if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


		class Rig_Card extends Widget_Base {


			public function get_name() {
				return 'Card';
			}


			public function get_title() {
				return __( 'Card', 'rig-elements' );
			}


			public function get_icon() {
				return 'eicon-posts-ticker';
			}


			public function get_categories() {
				return [ 'rig_elements_widgets' ];
			}


			public function get_style_depends() {
				return [ 'core_css','rig_bootstrap'];
			}

			public function get_script_depends() {
				return [ 'rig-main' ];
			}


			protected function _register_controls() {

				// Content Controls
				
				$this->start_controls_section(
					'rig_card_image_control',
					[
						'label' => __( 'Card Image', 'rig-elements' ),
						'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
					]
				);

				$this->add_control(
					'rig_cards_enable_image',
					[
						'label' => __( 'Show Image', 'rig-elements' ),
						'type' => \Elementor\Controls_Manager::SWITCHER,
						'enable' => __( 'Enable', 'rig-elements' ),
						'disable' => __( 'Disable', 'rig-elements' ),
						'return_value' => 'enable_image',
						'default' => 'enable_image',
					]
				);

				$this->add_control(
					'rig_cards_image_link',
					[
						'label' => __( 'Choose Image', 'rig-elements' ),
						'type' => \Elementor\Controls_Manager::MEDIA,
						
						'conditions' => [
                            'relation' => 'or',
                            'terms' => [
                                [
                                    'name' => 'rig_cards_enable_image',
                                    'operator' => '==',
                                    'value' => 'enable_image',
                                ],
                            ],
						],
						
						'default' => [
							'url' => \Elementor\Utils::get_placeholder_image_src(),
						],
					]
				);
		

				$this->end_controls_section();

				$this->start_controls_section(
					'rig_card_title_control',
					[
						'label' => __( 'Card Title', 'rig-elements' ),
						'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
					]
				);


				$this->add_control(
					'rig_card_enable_title',
					[
						'label' => __( 'Show Title', 'rig-elements' ),
						'type' => \Elementor\Controls_Manager::SWITCHER,
						'enable_title' => __( 'Enable', 'rig-elements' ),
						'disable_title' => __( 'Disable', 'rig-elements' ),
						'return_value' => 'enable_title',
						'default' => 'enable_title',
					]
				);

				$this->add_control(
					'rig_card_title',
					[
						'label' => __( 'Card Title', 'rig-elements' ),
						'type' => \Elementor\Controls_Manager::TEXT,
						'default' => __( 'Rig Elements', 'rig-elements' ),
						'placeholder' => __( 'Type your title here', 'rig-elements' ),
						'conditions' => [
							'relation' => 'or',
							'terms' => [
								[
									'name' => 'rig_card_enable_title',
									'operator' => '==',
									'value' => 'enable_title',
								],
							],
						],
					]
				);

				$this->end_controls_section();

				$this->start_controls_section(
					'rig_card_description_control',
					[
						'label' => __( 'Card Content', 'rig-elements' ),
						'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
					]
				);

				$this->add_control(
					'rig_card_enable_descriprion',
					[
						'label' => __( 'Show Content', 'rig-elements' ),
						'type' => \Elementor\Controls_Manager::SWITCHER,
						'enable_description' => __( 'Enable', 'rig-elements' ),
						'disable_description' => __( 'Disable', 'rig-elements' ),
						'return_value' => 'enable_description',
						'default' => 'enable_description',
					]
				);

				$this->add_control(
					'rig_card_description',
					[
						'label' => __( 'Content', 'rig-elements' ),
						'type' => \Elementor\Controls_Manager::WYSIWYG,

						'conditions' => [
							'relation' => 'or',
							'terms' => [
								[
									'name' => 'rig_card_enable_descriprion',
									'operator' => '==',
									'value' => 'enable_description',
								],
							],
						],

						'default' => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'plugin-domain' ),
						'placeholder' => __( 'Type your description here', 'rig-elements' ),
					]
				);
		

				$this->end_controls_section();

				$this->start_controls_section(
					'rig_card_avatar_control',
					[
						'label' => __( 'Card Avatar', 'rig-elements' ),
						'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
					]
				);

				$this->add_control(
					'rig_cards_enable_avatar',
					[
						'label' => __( 'Show Avatar', 'rig-elements' ),
						'type' => \Elementor\Controls_Manager::SWITCHER,
						'enable_avatar' => __( 'Enable', 'rig-elements' ),
						'disable_avatar' => __( 'Disable', 'rig-elements' ),
						'return_value' => 'enable_avatar',
						'default' => 'disable_avatar',
					]
				);

				$this->add_control(
					'rig_card_avatar_type',
					[
						'label' => __( 'Avatar Type', 'rig-elements' ),
						'type' => \Elementor\Controls_Manager::CHOOSE,
						'options' => [
							'image' => [
								'title' => __( 'Image', 'rig-elements' ),
								'icon' => 'fas fa-image',
							],
							'icon' => [
								'title' => __( 'Icon', 'rig-elements' ),
								'icon' => 'fas fa-star',
						],
					],

					'conditions' => [
						'relation' => 'or',
						'terms' => [
							[
								'name' => 'rig_cards_enable_avatar',
								'operator' => '==',
								'value' => 'enable_avatar',
							],
						],
					],
						// 'default' => 'image',
						'toggle' => true,
					]
				);
		

				$this->add_control(
					'rig_cards_avatar_image',
					[
						'label' => __( 'Choose Image', 'rig-elements' ),
						'type' => \Elementor\Controls_Manager::MEDIA,
						
						'conditions' => [
                            'relation' => 'and',
                            'terms' => [
                                [
                                    'name' => 'rig_card_avatar_type',
                                    'operator' => '==',
                                    'value' => 'image',
								],
								[
                                    'name' => 'rig_cards_enable_avatar',
                                    'operator' => '==',
                                    'value' => 'enable_avatar',
                                ],
                            ],
						],
						
						'default' => [
							'url' => \Elementor\Utils::get_placeholder_image_src(),
						],
					]
				);

				$this->add_control(
					'rig_cards_avatar_icon',
					[
						'label' => __( 'Icon', 'rig-elements' ),
						'type' => \Elementor\Controls_Manager::ICONS,
						'conditions' => [
                            'relation' => 'and',
                            'terms' => [
                                [
                                    'name' => 'rig_card_avatar_type',
                                    'operator' => '==',
                                    'value' => 'icon',
								],
								
								[
                                    'name' => 'rig_cards_enable_avatar',
                                    'operator' => '==',
                                    'value' => 'enable_avatar',
                                ],
                            ],
						],
						'default' => [
							'value' => 'fas fa-star',
							'library' => 'solid',
						],
					]
				);

				$this->end_controls_section();

				$this->start_controls_section(
					'rig_card_avatar_control',
					[
						'label' => __( 'Card Avatar', 'rig-elements' ),
						'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
					]
				);

				$this->end_controls_section();

				$this->start_controls_section(
					'rig_card_button_control',
					[
						'label' => __( 'Card Button', 'rig-elements' ),
						'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
					]
				);

				$this->end_controls_section();

				$this->start_controls_section(
					'rig_card_additional_info_control',
					[
						'label' => __( 'Card Additional Info', 'rig-elements' ),
						'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
					]
				);

				$this->end_controls_section();
				
				// Typography Controls

				$this->start_controls_section(
					'product_card_typography_controls',
					[
						'label' => __( 'Typography Controls', 'rig-elements' ),
						'tab' => Controls_Manager::TAB_STYLE,
					]
				);

				$this->add_group_control(
					\Elementor\Group_Control_Typography::get_type(),
					[
						'name' => 'product_title_typography',
						'label' => __( 'Product Title Typography', 'rig-elements' ),
						'selector' => '{{WRAPPER}} .product-card-info',
					]
				);

				$this->add_group_control(
					\Elementor\Group_Control_Typography::get_type(),
					[
						'name' => 'product_category_typography',
						'label' => __( 'Product Category Typography', 'rig-elements' ),
						'selector' => '{{WRAPPER}} .product-card-category',
					]
				);

				$this->add_group_control(
					\Elementor\Group_Control_Typography::get_type(),
					[
						'name' => 'product_price_typography',
						'label' => __( 'Product Price Typography', 'rig-elements' ),
						'selector' => '{{WRAPPER}} .product-card-price',
					]
				);


				$this->end_controls_section();


				// Color Controls

				$this->start_controls_section(
					'product_card_color_controls',
					[
						'label' => __( 'Color Controls', 'rig-elements' ),
						'tab' => Controls_Manager::TAB_STYLE,
					]
				);


				$this->add_control(
					'product_card_background_color',
					[
						'label' => __( 'Product Card Background Color', 'rig-elements' ),
						'type' => \Elementor\Controls_Manager::COLOR,
						// 'scheme' => [
						// 	'type' => \Elementor\Scheme_Color::get_type(),
						// 	'value' => \Elementor\Scheme_Color::COLOR_1,
						// ],
						'selectors' => [
							'{{WRAPPER}} .product-card' => 'background-color: {{VALUE}}',
						],
					]
				);

				$this->add_control(
					'product_information_background_color',
					[
						'label' => __( 'Product Information Background Color', 'rig-elements' ),
						'type' => \Elementor\Controls_Manager::COLOR,
						'scheme' => [
							'type' => \Elementor\Scheme_Color::get_type(),
							'value' => \Elementor\Scheme_Color::COLOR_1,
						],
						'selectors' => [
							'{{WRAPPER}} .product-card-content' => 'background-color: {{VALUE}}',
						],
					]
				);

				$this->add_control(
					'product_title_color',
					[
						'label' => __( 'Product Name Color', 'rig-elements' ),
						'type' => \Elementor\Controls_Manager::COLOR,
						'scheme' => [
							'type' => \Elementor\Scheme_Color::get_type(),
							'value' => \Elementor\Scheme_Color::COLOR_1,
						],
						'selectors' => [
							'{{WRAPPER}} .product-card-info' => 'color: {{VALUE}}',
						],
					]
				);

				$this->add_control(
					'product_catrgory_color',
					[
						'label' => __( 'Product Category Color', 'rig-elements' ),
						'type' => \Elementor\Controls_Manager::COLOR,
						'scheme' => [
							'type' => \Elementor\Scheme_Color::get_type(),
							'value' => \Elementor\Scheme_Color::COLOR_1,
						],
						'selectors' => [
							'{{WRAPPER}} .product-card-catrgory' => 'color: {{VALUE}}',
						],
					]
				);

				$this->add_control(
					'product_price_color',
					[
						'label' => __( 'Product Price Color', 'rig-elements' ),
						'type' => \Elementor\Controls_Manager::COLOR,
						'scheme' => [
							'type' => \Elementor\Scheme_Color::get_type(),
							'value' => \Elementor\Scheme_Color::COLOR_1,
						],
						'selectors' => [
							'{{WRAPPER}} .product-card-price' => 'color: {{VALUE}}',
						],
					]
				);

				$this->end_controls_section();
			}


			protected function render() {
				$settings = $this->get_settings_for_display();
							
				
				$card_title = $this->rig_card_generate_title();
				$card_description = $this->rig_card_generate_description();
				$card_image = $this->rig_card_generate_image();
				$card_avatar = $this->rig_card_generate_avatar();


					echo'<div class="rig-card">';
					echo $card_image;
					echo'
						<div class="card-body">';
					echo $card_avatar;
					echo $card_title;
					echo $card_description;
					echo'
						
						<button href="#" class="card-link">Read More</button>
						</div>
					</div>';
				

			}


			// Custom Functions For Card Element

			

			// Card Title Function

			protected function rig_card_generate_title() {
				$settings = $this->get_settings_for_display();
				$enable_title = $settings['rig_card_enable_title'];
				$card_title = $settings['rig_card_title'];

				if ($enable_title == 'enable_title') {
					$title = '<h2 class="rig-card-title">'.$card_title.'</h2>';
				}
				
				return $title;
			}


			// Card Description Function

			protected function rig_card_generate_description() {
				$settings = $this->get_settings_for_display();
				$enable_description = $settings['rig_card_enable_descriprion'];
				$card_description = $settings['rig_card_description'];

				if ($enable_description == 'enable_description') {
					$description = '<div class="card-text">'.$card_description.'</div>';
				}
				
				return $description;
			}


			// Card Button Function

			protected function rig_card_generate_button() {
				
			}


			// Card Image Function

			protected function rig_card_generate_image() {
				$settings = $this->get_settings_for_display();
				$enable_image = $settings['rig_cards_enable_image'];
				$image_url = $settings['rig_cards_image_link'];

				
				if ($enable_image == 'enable_image') {
					$image = '<img src="'.$image_url['url'].'" alt="...">';
				}
				
				return $image;
			}


			// Card Avatar Function

			protected function rig_card_generate_avatar() {
				$settings = $this->get_settings_for_display();
				$enable_avatar = $settings['rig_cards_enable_avatar'];
				$avatar_type = $settings['rig_cards_avatar_type'];
				$avatar_image = $settings['rig_cards_avatar_image'];
				$avatar_icon = $settings['rig_cards_avatar_icon'];


					if ($avatar_type = 'image') {
						$avatar_media = '<img src="'.$avatar_image['url'].'" alt="...">';
					}
					else {
						$avatar_media = '<i class="'.$avatar_icon['value'].'"></i>';
					}

				if ($enable_avatar == 'enable_avatar') {
					$avatar = '<div class="rig-card-avatar">'.$avatar_media.'</div>';
				}

				return $avatar;

			}


		}
