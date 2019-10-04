<?php
namespace Rentalelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Background;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 *
 * Rental elementor Team Member section widget.
 *
 * @since 1.0
 */
class Rental_Apartment extends Widget_Base {

	public function get_name() {
		return 'rental-apartments';
	}

	public function get_title() {
		return __( 'Apartments', 'rental' );
	}

	public function get_icon() {
		return 'eicon-posts-grid';
	}

	public function get_categories() {
		return [ 'rental-elements' ];
	}

	protected function _register_controls() {

		$repeater = new \Elementor\Repeater();
        
		// ----------------------------------------   Apartments content ------------------------------
		$this->start_controls_section(
			'apartments_block',
			[
				'label' => __( 'Apartments', 'rental' ),
			]
		);
		$this->add_control(
			'sec_title', [
				'label'     => __( 'Title', 'rental' ),
				'description'=> esc_html__( 'Use <br> for line break', 'rental' ),
				'type'      => Controls_Manager::TEXTAREA,
				'default'   => 'Provide The <br>Beautiful Apartment',
			]
		);
		$this->add_control(
            'apartments', [
                'label' => __( 'Create Apartments', 'rental' ),
                'type'  => Controls_Manager::REPEATER,
                'separator' => 'before',
                'title_field' => '{{{ label }}}',
                'fields' => [
                    [
                        'name'  => 'label',
                        'label' => __( 'Title', 'rental' ),
                        'type'  => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => __('Money back gurantee', 'rental')
                    ],
                    [
                        'name'  => 'title_url',
                        'label' => __( 'Title URL', 'rental' ),
                        'type'  => Controls_Manager::URL,
                        'label_block' => true,
                    ],
	                [
		                'name'  => 'cat',
		                'label' => __( 'Category', 'rental' ),
                        'type'  => Controls_Manager::TEXT,
		                'label_block' => true,
                        'default' => __('Home, Apartment', 'rental')
	                ],
                    [
		                'name'  => 'price',
		                'label' => __( 'Price', 'rental' ),
		                'type'  => Controls_Manager::TEXT,
	                ],
                    [
		                'name'  => 'location',
		                'label' => __( 'Location', 'rental' ),
		                'type'  => Controls_Manager::TEXT,
		                'label_block' => true
	                ],
                    [
		                'name'  => 'bedroom',
		                'label' => __( 'Total Bedroom', 'rental' ),
		                'type'  => Controls_Manager::NUMBER,
	                ],
                    [
		                'name'  => 'bathroom',
		                'label' => __( 'Total Bathroom', 'rental' ),
		                'type'  => Controls_Manager::NUMBER,
	                ],
                    [
		                'name'  => 'squarefeet',
		                'label' => __( 'Total Square Feet', 'rental' ),
		                'type'  => Controls_Manager::NUMBER,
	                ],
                    [
		                'name'  => 'image',
		                'label' => __( 'Feature Image', 'rental' ),
		                'type'  => Controls_Manager::MEDIA,
	                ]
                ],
            ]
		);
		$this->add_control(
			'all_apartment', [
				'label'     => __( 'All apartment link Label', 'rental' ),
				'type'      => Controls_Manager::TEXT,
                'separator' => 'before',
                'label_block'=> true,
                'default'   => 'Read More'
			]
		);
		$this->add_control(
			'all_apartment_url', [
				'label'     => __( 'All apartment link', 'rental' ),
				'type'      => Controls_Manager::URL,
			]
		);
		$this->end_controls_section(); // End apartments content


        //------------------------------ Style Apartments ------------------------------
        $this->start_controls_section(
            'style_apartments', [
                'label' => __( 'Style Apartments', 'rental' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'apartments_title_heading',
            [
                'label'     => __( 'Style Feature Title ', 'rental' ),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'color_featuretitle', [
                'label' => __( 'Title Color', 'rental' ),
                'type'  => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .apartment_part .single_appartment_content h4' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'feature_hover_title', [
                'label' => __( 'Title Hover Color', 'rental' ),
                'type'  => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .apartment_part .single_appartment_content h4:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'title_hover_bg', [
                'label' => __( 'Feature Hover Overlay Color', 'rental' ),
                'type'  => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .apartment_part .appartment_img:after' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'feature_meta_color', [
                'label' => __( 'Feature Meta Color', 'rental' ),
                'type'  => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .apartment_part .single_appartment_content .list-unstyled li' => 'color: {{VALUE}};'
                ],
            ]
        );
        $this->add_control(
            'feature_meta_hover_color', [
                'label' => __( 'Feature Meta Hover Color', 'rental' ),
                'type'  => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .apartment_part .single_appartment_content .list-unstyled li:hover' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .apartment_part .single_appartment_content .list-unstyled li:hover span' => 'color: {{VALUE}};'
                ],
            ]
        );

        $this->end_controls_section();
        

	}

	protected function render() {

    $settings = $this->get_settings();
    $apartments = $settings['apartments'];
    $sTitle     = !empty( $settings['sec_title'] ) ? $settings['sec_title'] : '';
    $alinksLabel= !empty( $settings['all_apartment'] ) ? $settings['all_apartment'] : '';
    $alinks     = !empty( $settings['all_apartment_url']['url'] ) ? $settings['all_apartment_url']['url'] : '';

    ?>
        <div class="apartment_part">
            <div class="container">
                <div class="row justify-content-between align-content-center">
                    <div class="col-md-8 col-lg-7">
                        <div class="section_tittle">
                            <?php
                            if( $sTitle ){
                                echo '<h1>'. wp_kses_post( nl2br( $sTitle ) ) .'</h1>';
                            }
                            ?>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-5">
                        <div class="view_more_btn float-right d-none d-md-block">
                            <?php
                            if( $alinksLabel ){
                                echo '<a href="'. esc_url( $alinks ) .'" class="btn_2">'. esc_html( $alinksLabel ) .'<span class="ti-arrow-right"></span></a>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php
                    if( is_array( $apartments ) && count( $apartments ) > 0 ){
                        foreach ( $apartments as $apartment ){
                            $image = !empty( $apartment['image']['id'] ) ? wp_get_attachment_image( $apartment['image']['id'], 'rental_360x435' ) : '';
                            $price = !empty( $apartment['price'] ) ? $apartment['price'] : '';
                            $location = !empty( $apartment['location'] ) ? $apartment['location'] : '';
                            $cat    = !empty( $apartment['cat'] ) ? $apartment['cat'] : '';
                            $title  = !empty( $apartment['label'] ) ? $apartment['label'] : '';
                            $tUrl   = !empty( $apartment['title_url']['url'] ) ? $apartment['title_url']['url'] : '';
                            $bed    = !empty( $apartment['bedroom'] ) ? $apartment['bedroom'] : '';
                            $bath   = !empty( $apartment['bathroom'] ) ? $apartment['bathroom'] : '';
                            $square = !empty( $apartment['squarefeet'] ) ? $apartment['squarefeet'] : '';

                            ?>
                            <div class="col-md-4 col-lg-4">
                                <div class="single_appartment_part">
                                    <div class="appartment_img">
                                        <?php
                                        if( $image ){
                                            echo wp_kses_post( $image );
                                        }
                                        ?>

                                        <div class="single_appartment_text">
                                            <?php
                                            if( $price ){
                                                echo '<h3>$'. absint( $price ) .'</h3>';
                                            }

                                            if( $location ){
                                                echo '<p><span class="ti-location-pin"></span>'. esc_html( $location ) .'</p>';
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="single_appartment_content">
                                        <a href="" class="love_us"> <span class="ti-heart"></span> </a>
                                        <?php
                                        if( $cat ){
                                            echo '<p>'. esc_html( $cat ) .'</p>';
                                        }

                                        if( $title ){
                                            echo '<a href="'. esc_url( $tUrl ) .'"><h4>'. esc_html( $title ) .'</h4></a>';
                                        }
                                        ?>
                                        <ul class="list-unstyled">
                                            <?php
                                            if( $bed ){
                                                echo '<li><span class="flaticon-bath"></span>'.sprintf( "%02d", $bed ) .'</li>';

                                            }

                                            if( $bath ){
                                                echo '<li><span class="flaticon-bed"></span>'. sprintf( "%02d", $bath ) .'</li>';
                                            }

                                            if( $square ){
                                                echo '<li><span class="flaticon-frame"></span>'. absint( $square ) .' sqft</li>';
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    <?php

    }
}
