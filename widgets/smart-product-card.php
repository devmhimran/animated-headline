<?php
		namespace RigElements\Widgets;

		use Elementor\Widget_Base;
		use Elementor\Controls_Manager;

		if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


		class SmartProductCard extends Widget_Base {


			public function get_name() {
				return 'smart-product-card';
			}


			public function get_title() {
				return __( 'Smart Product Card', 'rig-elements' );
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
				return [ 'rig-main' ];
			}


			protected function _register_controls() {

				$this->start_controls_section(
					'product_card_content_controls',
					[
						'label' => __( 'Product Controls', 'plugin-name' ),
						'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
					]
				);

				$this->add_control(
					'product_card_show_products',
					[
						'label' => __( 'Show Products', 'rig-elements' ),
						'type' => \Elementor\Controls_Manager::NUMBER,
						'min' => 1,
						'max' => 500,
						'step' => 1,
						'default' => 12,
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
						'selector' => '{{WRAPPER}} .product-card-title',
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
							'{{WRAPPER}} .product-card-title' => 'color: {{VALUE}}',
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
				
				$args = array(
					'post_type'        => 'product',
					'numberposts'	=> $settings['blog_card_show_posts'],
				);

				// $products = get_posts( $args );
				$loop = new \WP_Query( $args );

                ?>
               
               <div class="card-container">
                    
                <?php
                
                while ( $loop->have_posts() ) : $loop->the_post();
					global $product;

					echo '
					<div class="product-card">
					<a href='.get_post_permalink($p->ID).'>
					<img class="product-card-image" src='.get_the_post_thumbnail_url($p->ID).' alt='.$p->post_title.'>
					</a>
					<div class="product-card-content">
					<p class="product-card-title">'.esc_html($product->get_name()).'</p>
						<p class="product-card-price">'.wc_price($product->get_price()).'</p>
								</div>
					</div>';

				endwhile;
				wp_reset_postdata();

				// echo $output;

                ?>
        
        </div>

            <?php


			}


			
		}
