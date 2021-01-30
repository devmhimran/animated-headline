<?php
		namespace RigElements\Widgets;

		use Elementor\Widget_Base;
		use Elementor\Controls_Manager;

		if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


		class Rig_Advance_Products extends Widget_Base {


			public function get_name() {
				return 'rig-advance-products';
			}


			public function get_title() {
				return __( 'Advance Products', 'rig-elements' );
			}


			public function get_icon() {
				return 'eicon-woocommerce';
			}


			public function get_categories() {
				return [ 'rig_elements_widgets' ];
			}


			public function get_style_depends() {
				return [ 'core_css'];
			}

			public function get_script_depends() {
				return [ 'rig-main' ];
			}


			protected function _register_controls() {

				$this->start_controls_section(
					'rig_advance_products_content_controls',
					[
						'label' => __( 'Product Controls', 'plugin-name' ),
						'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
					]
				);

				$this->add_control(
					'rig_advance_products_show_products',
					[
						'label' => __( 'Show Products', 'rig-elements' ),
						'type' => \Elementor\Controls_Manager::NUMBER,
						'min' => 1,
						'max' => 500,
						'step' => 1,
						'default' => 12,
					]
				);


				$this->add_control(
					'rig_advance_products_cart_button_text',
					[
						'label' => __( 'Cart Button Text', 'rig-elements' ),
						'type' => \Elementor\Controls_Manager::TEXT,
						'default' => __( 'Add To Cart', 'rig-elements' ),
						// 'placeholder' => __( 'Type your title here', 'rig-elements' ),
					]
				);
		

                $this->end_controls_section();
                
				
				// Product Name Styles

				$this->start_controls_section(
					'rig_advance_products_product_name_style',
					[
						'label' => __( 'Product Name', 'rig-elements' ),
						'tab' => Controls_Manager::TAB_STYLE,
					]
				);

				$this->add_group_control(
					\Elementor\Group_Control_Typography::get_type(),
					[
						'name' => 'rig_advance_products_product_name_typography',
						'label' => __( 'Typography', 'rig-elements' ),
						'selector' => '{{WRAPPER}} .rig-woo-products-name',
					]
				);


				$this->add_responsive_control(
					'rig_advance_products_product_name_alignment',
					[
						'label' => __( 'Alignment', 'rig-elements' ),
						'type' => \Elementor\Controls_Manager::CHOOSE,
						'options' => [
							'left' => [
								'title' => __( 'Left', 'rig-elements' ),
								'icon' => 'fa fa-align-left',
							],
							'center' => [
								'title' => __( 'Center', 'rig-elements' ),
								'icon' => 'fa fa-align-center',
							],
							'right' => [
								'title' => __( 'Right', 'rig-elements' ),
								'icon' => 'fa fa-align-right',
							],
						],
						'default' => 'center',
						'devices' => [ 'desktop', 'tablet' ],
						'selectors' => [
							'{{WRAPPER}} .rig-woo-products-name' => 'float: {{VALUE}};',
						],
					]
				);
				

                $this->add_control(
					'rig_advance_products_product_name_color',
					[
						'label' => __( 'Color', 'rig-elements' ),
						'type' => \Elementor\Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} .rig-woo-products-name' => 'color: {{VALUE}}',
						],
					]
				);

                $this->end_controls_section();


                // Product Price Styles
                
                $this->start_controls_section(
					'rig_advance_products_product_price_style',
					[
						'label' => __( 'Product Price', 'rig-elements' ),
						'tab' => Controls_Manager::TAB_STYLE,
					]
				);

				$this->add_group_control(
					\Elementor\Group_Control_Typography::get_type(),
					[
						'name' => 'rig_advance_products_product_price_typography',
						'label' => __( 'Typography', 'rig-elements' ),
						'selector' => '{{WRAPPER}} .rig-woo-products-price',
					]
				);
				

				$this->add_responsive_control(
					'rig_advance_products_product_price_alignment',
					[
						'label' => __( 'Alignment', 'rig-elements' ),
						'type' => \Elementor\Controls_Manager::CHOOSE,
						'options' => [
							'left' => [
								'title' => __( 'Left', 'rig-elements' ),
								'icon' => 'fa fa-align-left',
							],
							'center' => [
								'title' => __( 'Center', 'rig-elements' ),
								'icon' => 'fa fa-align-center',
							],
							'right' => [
								'title' => __( 'Right', 'rig-elements' ),
								'icon' => 'fa fa-align-right',
							],
						],
						'default' => 'center',
						'devices' => [ 'desktop', 'tablet' ],
						'selectors' => [
							'{{WRAPPER}} .rig-woo-products-price' => 'float: {{VALUE}};',
						],
					]
				);
                
                $this->add_control(
					'rig_advance_products_product_price_color',
					[
						'label' => __( 'Color', 'rig-elements' ),
						'type' => \Elementor\Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} .rig-woo-products-price' => 'color: {{VALUE}}',
						],
					]
				);


				$this->end_controls_section();


                // Add To Cart Button
                
               
				$this->start_controls_section(
					'rig_advance_products_cart_button_styles',
					[
						'label' => __( 'Add To Cart Button', 'rig-elements' ),
						'tab' => Controls_Manager::TAB_STYLE,
					]
                );
                

                $this->add_group_control(
					\Elementor\Group_Control_Typography::get_type(),
					[
						'name' => 'add_to_cart_button_typography',
						'label' => __( 'Typography', 'rig-elements' ),
						'selector' => '{{WRAPPER}} .rig-woo-products-button',
					]
				);
				
				$this->add_control(
					'add_to_cart_button_width',
					[
						'label' => __( 'Button Width', 'rig-elements' ),
						'type' => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%', 'em' ],
						'selectors' => [
							'{{WRAPPER}} .rig-woo-products-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);

				
				$this->add_control(
					'add_to_cart_button_color_controls_seperator',
					[
						'type' => \Elementor\Controls_Manager::DIVIDER,
					]
				);

				// Add To Cart Button Color Controls

				$this->start_controls_tabs(
					'add_to_cart_button_color_controls'
				);

				
				// Normal Color
				
				$this->start_controls_tab(
					'add_to_cart_button_color_normal_controls',
					[
						'label' => __( 'Normal', 'rig-elements' ),
					]
				);

				$this->add_control(
					'add_to_cart_button_text_color',
					[
						'label' => __( 'Text Color', 'rig-elements' ),
						'type' => \Elementor\Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} .rig-woo-products-button' => 'color: {{VALUE}}',
						],
					]
				);


				$this->add_control(
					'add_to_cart_button_background_color',
					[
						'label' => __( 'Background Color', 'rig-elements' ),
						'type' => \Elementor\Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} .rig-woo-products-button' => 'background-color: {{VALUE}}',
						],
					]
				);

				$this->end_controls_tab();



				// Hover Color

				$this->start_controls_tab(
					'add_to_cart_button_color_hover_controls',
					[
						'label' => __( 'Hover', 'rig-elements' ),
					]
				);


				$this->add_control(
					'add_to_cart_button_text_hover_color',
					[
						'label' => __( 'Text Color', 'rig-elements' ),
						'type' => \Elementor\Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} .rig-woo-products-button:hover' => 'color: {{VALUE}}',
						],
					]
				);


				$this->add_control(
					'add_to_cart_button_background_hover_color',
					[
						'label' => __( 'Background Color', 'rig-elements' ),
						'type' => \Elementor\Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} .rig-woo-products-button:hover' => 'background-color: {{VALUE}}',
						],
					]
				);


				$this->end_controls_tab();


				$this->end_controls_tabs();


				// Add To Cart Button Border Controls


				$this->add_control(
					'add_to_cart_button_border_controls_seperator',
					[
						'type' => \Elementor\Controls_Manager::DIVIDER,
					]
				);

				$this->start_controls_tabs(
					'add_to_cart_button_border_controls'
				);


				// Normal Controls

				$this->start_controls_tab(
					'add_to_cart_button_border_normal_controls',
					[
						'label' => __( 'Normal', 'rig-elements' ),
					]
				);


				$this->add_control(
					'add_to_cart_button_border_type',
					[
						'label' => __( 'Border Type', 'rig-elements' ),
						'type' => \Elementor\Controls_Manager::SELECT,
						'default' => 'none',
						'options' => [
							'none'  => __( 'None', 'rig-elements' ),
							'solid'  => __( 'Solid', 'rig-elements' ),
							'dotted'  => __( 'Dotted', 'rig-elements' ),
							'dashed'  => __( 'Dashed', 'rig-elements' ),
							'groove'  => __( 'Groove', 'rig-elements' ),
						],
						'selectors' => [
							'{{WRAPPER}} .rig-woo-products-button' => 'border-style: {{VALUE}}',
						],
					]
				);


				$this->add_control(
					'add_to_cart_button_border_color',
					[
						'label' => __( 'Border Color', 'rig-elements' ),
						'type' => \Elementor\Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} .rig-woo-products-button' => 'border-color: {{VALUE}}',
						],
					]
				);


				$this->add_control(
					'add_to_cart_button_border_width',
					[
						'label' => __( 'Border Width', 'rig-elements' ),
						'type' => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%', 'em' ],
						'selectors' => [
							'{{WRAPPER}} .rig-woo-products-button' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);


				
				$this->add_control(
					'add_to_cart_button_border_radius',
					[
						'label' => __( 'Border Radius', 'rig-elements' ),
						'type' => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%', 'em' ],
						'selectors' => [
							'{{WRAPPER}} .rig-woo-products-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);

				$this->end_controls_tab();


				$this->start_controls_tab(
					'add_to_cart_button_border_hover_controls',
					[
						'label' => __( 'Hover', 'rig-elements' ),
					]
				);


				$this->add_control(
					'add_to_cart_button_border_hover_color',
					[
						'label' => __( 'Border Color', 'rig-elements' ),
						'type' => \Elementor\Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} .rig-woo-products-button:hover' => 'border-color: {{VALUE}}',
						],
					]
				);


				$this->add_control(
					'add_to_cart_button_border_hover_width',
					[
						'label' => __( 'Border Width', 'rig-elements' ),
						'type' => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%', 'em' ],
						'selectors' => [
							'{{WRAPPER}} .rig-woo-products-button:hover' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);


				$this->add_control(
					'add_to_cart_button_border_hover_radius',
					[
						'label' => __( 'Border Radius', 'rig-elements' ),
						'type' => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%', 'em' ],
						'selectors' => [
							'{{WRAPPER}} .rig-woo-products-button:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);

				$this->end_controls_tab();

				$this->end_controls_tabs();

		

				$this->end_controls_section();
			}


			protected function render() {
				$settings = $this->get_settings_for_display();
                
				$args = array(
					'post_type'        => 'product',
					'posts_per_page'   => $settings['rig_advance_products_show_products'],
				);

                // $products = get_posts( $args );
                $loop = new \WP_Query( $args );
                ?>
               
               <div class="card-container">
                    
                <?php

                while ( $loop->have_posts() ) : $loop->the_post();
				global $product;

				// All Product Styles
				
				echo '
                    <div class="rig-woo-products">
                    <a href='.get_post_permalink($p->ID).'>
                    <img class="rig-woo-products-img" src='.get_the_post_thumbnail_url($p->ID).' alt="Avatar">
					</a>
                    <p class="rig-woo-products-name">'.esc_html($product->get_name()).'</p>
					<p class="rig-woo-products-price">'.wc_price($product->get_price()).'</p>
                    <form action="'.esc_url( $product->add_to_cart_url() ).'" method="post" enctype="multipart/form-data">
                    <button type="submit" name="button" class="rig-woo-products-button">'.$settings['rig_advance_products_cart_button_text'].'</button>
                    </form>
					</div>';

            endwhile;
			wp_reset_postdata();
			
			// echo '<pre>';
			// print_r($product);
			// echo '</pre>';

                ?>
        
        </div>

            <?php

			}
			
		}
