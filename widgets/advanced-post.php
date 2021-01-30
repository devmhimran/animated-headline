<?php
		namespace RigElements\Widgets;

		use Elementor\Widget_Base;
		use Elementor\Controls_Manager;

		if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


		class AdvancedPosts extends Widget_Base {


			public function get_name() {
				return 'rig_advanced_posts';
			}


			public function get_title() {
				return __( 'Advanced Posts', 'rig-elements' );
			}


			public function get_icon() {
				return 'eicon-posts-ticker';
			}


			public function get_categories() {
				return [ 'rig_elements_widgets' ];
			}


			public function get_style_depends() {
				return [ 'core_css','rig_bootstrap','rigmain'];
			}

			public function get_script_depends() {
				return [ 'rig-main' ];
            }
            
            public function get_post_types() {
                $args = array(
                    'public' => true,
                );
                 
                $post_types = get_post_types( $args, 'objects' );
                 
                foreach ( $post_types  as $post_type ) {
					$final_post_name = $post_type->name;
					// $post_type->singular_name;
                //    echo '<p>Custom Post Type name: ' . $post_type->name . "<br />\n";
                //    echo 'Single name: ' . $post_type->labels->singular_name . "<br />\n";
				}
				return $post_type_name = $final_post_name;
				// $post_type_label = $post_type->singular_name;
				// return
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
                    'advanced_posts_post_type',
                    [
                        'label' => __( 'Post Type', 'rig-elements' ),
                        'type' => \Elementor\Controls_Manager::SELECT,
                        'default' => 'post',
                        'options' => [
                            $this->post_type_name  => __( $this->get_post_types(), 'rig-elements' ),
                            'page' => __( 'Pages', 'rig-elements' ),
                        ],
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
                
                $this->add_control(
                    'advanced_posts_post_style',
                    [
                        'label' => __( 'Post Style', 'rig-elements' ),
                        'type' => \Elementor\Controls_Manager::SELECT,
                        'default' => 'standard',
                        'options' => [
                            'standard'  => __( 'Standard', 'rig-elements' ),
                            'grid' => __( 'Grid', 'rig-elements' ),
                            'masonry' => __( 'Masonry', 'rig-elements' ),
                        ],
                    ]
                );

                $this->add_control(
                    'advanced_posts_grids',
                    [
                        'label' => __( 'Grids', 'rig-elements' ),
                        'type' => \Elementor\Controls_Manager::SELECT,
                        'default' => '6',
                        'options' => [
                            '6'  => __( '2 Grids', 'rig-elements' ),
                            '4' => __( '3 Grids', 'rig-elements' ),
                        ],

                        'conditions' => [
                            'relation' => 'or',
                            'terms' => [
                                [
                                    'name' => 'advanced_posts_post_style',
                                    'operator' => '==',
                                    'value' => 'grid',
                                ],
                            ],
                        ],
            
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
                    'numberposts' => 10,
                    'orderby'     => 'title',
                    'post_type'   => $settings['advanced_posts_post_type'],
                  );
                   
                  $latest_posts = get_posts( $args );

                  $post_style = $settings['advanced_posts_post_style'];

                  switch ($post_style) {
                    case "standard":
                        $post_parent_class = '<div class="posts blog mb-md50">';
                        $post_inner_class = '<div>';
                      break;
                    case "grid":
                        $grids = $settings['advanced_posts_grids'];
                        $post_parent_class = '<div class="posts blog row mb-md50">';
                        $post_inner_class = '<div class="col-md-'.$grids.'">';
                      break;
                      case "masonry":
                        $post_parent_class = '<div class="posts blog row masonry">';
                        $post_inner_class = '<div class="col-md-4 mas">';
                      break;
                    default:
                    }


                // if ($post_style = 'standard') {
                //     $post_parent_class = '<div class="posts blog mb-md50">';
                //     $post_inner_class = '<div>';
                // }
                
                // elseif ($post_style = 'grid') {
                //     $post_parent_class = '<div class="posts blog row mb-md50">';
                //     $post_inner_class = '<div class="col-md-6">';
                // }

                // elseif ($post_style = 'masonry') {
                //     $post_parent_class = '<div class="posts blog row masonry">';
                //     $post_inner_class = '<div class="col-md-4 mas">';
                // }

                // else {
                //     return 0;
                // }



                  echo $post_parent_class;
                  foreach ( $latest_posts as $post ) {
                    echo $post_inner_class;
                    echo '
                    <div class="item">
	                            <div class="post-img">
	                                <div class="img">
	                                    <img src='.get_the_post_thumbnail_url($post->ID).' alt="">
	                                </div>
	                                <div class="tag">
	                                	<a href="#0"><span class="icon"><i class="fas fa-tags"></i></span> Business</a>
	                                </div>
	                            </div>
	                            <div class="cont">
	                                <h6><a href="blog-single.html">'.$post->post_title.'</a></h6>
	                                <p>'.$post->post_excerpt.'</p>
	                                <div class="info">
	                                    <a href="#0"><span class="author"><img src="img/blog/01.png" alt=""></span>'.$post->post_author.'</a>
	                                    <a href="#0" class="right"><span class="icon"><i class="fas fa-clock"></i></span> 06 Aug 2017</a>
	                                </div>
	                            </div>
                            </div>
                            </div>
                    ';
                    // echo $post->post_title;
                 }
                 echo '</div>';

                ?>



							<div class="pagination col-lg-12 mt-20">
								<ul>
									<li>
										<a href="#0"><i class="fas fa-angle-double-left"></i></a>
									</li>
									<li class="active">
										<a href="#0">1</a>
									</li>
									<li>
										<a href="#0">2</a>
									</li>
									<li>
										<a href="#0"><i class="fas fa-angle-double-right"></i></a>
									</li>
								</ul>
							</div>

						</div>

            <?php


			}


			
		}
