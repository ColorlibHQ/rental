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
 * Rental elementor section widget.
 *
 * @since 1.0
 */
class Rental_Testimonial extends Widget_Base {

	public function get_name() {
		return 'rental-testimonial';
	}

	public function get_title() {
		return __( 'Testimonial', 'rental' );
	}

	public function get_icon() {
		return 'eicon-post-slider';
	}

	public function get_categories() {
		return [ 'rental-elements' ];
	}

	protected function _register_controls() {

        // Testimonial Heading
		$this->start_controls_section(
			'section_heading',
			[
				'label' => __( 'Section Heading', 'rental' ),
			]
		);
        $this->add_control(
            'sec_title',
            [
                'label'         => esc_html__( 'Title', 'rental' ),
                'description'   => __( "Use < span> tag for color and italic word", "rental" ),
                'type'          => Controls_Manager::TEXTAREA,
                'label_block'   => true,
                'default'       => __( 'Our Happy Customer Says About us', 'rental' )
            ]
        );
		$this->end_controls_section(); 


		// ----------------------------------------  Customers review content ------------------------------
		$this->start_controls_section(
			'customers_review',
			[
				'label' => __( 'Customers Review', 'rental' ),
			]
		);

		$this->add_control(
            'review_slider', [
                'label' => __( 'Create Review', 'rental' ),
                'type'  => Controls_Manager::REPEATER,
                'title_field' => '{{{ label }}}',
                'fields' => [
                    [
                        'name'  => 'label',
                        'label' => __( 'Name', 'rental' ),
                        'type'  => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => esc_html__( 'Name', 'rental' )
                    ],
                    [
                        'name'  => 'designation',
                        'label' => __( 'Designation', 'rental' ),
                        'type'  => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => esc_html__( 'Chief Customer', 'rental' )
                    ],
                    [
                        'name'  => 'desc',
                        'label' => __( 'Descriptions', 'rental' ),
                        'type'  => Controls_Manager::TEXTAREA,
                        'default'   => __('Also made from. Give may saying meat there from heaven it lights face had is gathered god earth light for life may itself shall whales made they\'re blessed whales also made from give may saying meat. There from heaven it lights face had', 'rental')
                    ],
                    [
                        'name'  => 'img',
                        'label' => __( 'Image', 'rental' ),
                        'type'  => Controls_Manager::MEDIA,
                    ]
                ],
            ]
		);

		$this->end_controls_section(); // End exibition content

        /**
         * Style Tab
         *
         */
		//------------------------------ Style Section ------------------------------
		$this->start_controls_section(
			'style_section', [
				'label' => __( 'Style Section Heading', 'rental' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'color_secttitle', [
				'label'     => __( 'Section Title Color', 'rental' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#202e31',
				'selectors' => [
					'{{WRAPPER}} .area-heading h3' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'color_sectsubtitle', [
				'label'     => __( 'Section Sub Title Color', 'rental' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#888888',
				'selectors' => [
					'{{WRAPPER}} .area-heading p' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();


		$this->start_controls_section(
			'style_item',
			[
				'label' => __( 'Style Item', 'rental' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

        $this->add_control(
            'more_options',
            [
                'label' => __( 'Description Color', 'rental' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'testimonial_name_color', [
                'label'     => __( 'Testimonial Name Color', 'rental' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#1a1d24',
                'selectors' => [
                    '{{WRAPPER}} .testimonial__content h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'testimonial_desc_color', [
                'label'     => __( 'Testimonial Description Color', 'rental' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#797979',
                'selectors' => [
                    '{{WRAPPER}} .testimonial__i' => 'color: {{VALUE}};',
                ],
            ]
        );

		$this->end_controls_section();



        /*------------------------------ Background Style ------------------------------*/
		$this->start_controls_section(
            'section_bg', [
                'label' => __( 'Style Background', 'rental' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'section_bgheading',
            [
                'label'     => __( 'Background Settings', 'rental' ),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'sectionbg',
                'label' => __( 'Background', 'rental' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .testimonial_sec',
            ]
        );

        $this->end_controls_section();

	}

	protected function render() {

    $settings = $this->get_settings();
    // call load widget script
	$this->load_widget_script();
	$title = !empty( $settings['sec_title'] ) ? $settings['sec_title'] : '';
	$reviews = !empty( $settings['review_slider'] ) ? $settings['review_slider'] : '';

    ?>
        <div class="review_part" id="testimonial">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 col-lg-7">
                        <div class="section_tittle">
                            <?php
                            if( $title ){
                                echo '<h1>'. wp_kses_post( nl2br( $title ) ) .'</h1>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="review_part_text owl-carousel">
                            <?php
                            if( is_array( $reviews ) ){
                                foreach ( $reviews as $review ) {
                                    $image = !empty( $review['img']['id'] ) ? wp_get_attachment_image( $review['img']['id'], 'rantel_90x90' ) : '';
                                    $name  = !empty( $review['label'] ) ? $review['label'] : '';
                                    $desig = !empty( $review['designation'] ) ? $review['designation'] : '';
                                    $desc  = !empty( $review['desc'] ) ? $review['desc'] : '';
                                    ?>
                                    <div class="singler_eview_part">
                                        <div class="client_info">
                                            <?php
                                            if( $image ){
                                                echo wp_kses_post( $image );
                                            }

                                            if( $name ){
                                                echo '<h4>'. esc_html( $name ) .'</h4>';
                                            }

                                            if( $desig ){
                                                echo '<p>'. esc_html( $desig ) .'</p>';
                                            }
                                            ?>
                                        </div>
                                        <?php
                                        if( $desc ){
                                            echo '<p><i>'. esc_html( $desc ) .'</i></p>';
                                        }
                                        ?>
                                    </div>
                                <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php

    }

    public function load_widget_script(){
        if( \Elementor\Plugin::$instance->editor->is_edit_mode() === true  ) {
        ?>
        <script>
        ( function( $ ){

            var review = $('.review_part_text');
            if (review.length) {
                review.owlCarousel({
                    items: 2,
                    loop: true,
                    dots: true,
                    autoplay: true,
                    margin: 40,
                    autoplayHoverPause: true,
                    autoplayTimeout:5000,
                    nav: false,
                    responsive: {
                        0:{
                            items: 1
                        },
                        480:{
                            items: 1
                        },
                        769:{
                            items: 2
                        }
                    }
                });
            }
            
        })(jQuery);
        </script>
        <?php 
        }
    }
	
}
