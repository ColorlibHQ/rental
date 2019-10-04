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
class Rental_Pricing extends Widget_Base {

	public function get_name() {
		return 'rental-pricing';
	}

	public function get_title() {
		return __( 'Pricing', 'rental' );
	}

	public function get_icon() {
		return 'eicon-price-table';
	}

	public function get_categories() {
		return [ 'rental-elements' ];
	}

	protected function _register_controls() {

        
		// ----------------------------------------  Pricing content ------------------------------
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
				'description'   => __( "Use < span> tag for color italic word", "rental" ),
				'type'          => Controls_Manager::TEXT,
				'label_block'   => true,
				'default'       => __( 'Perfect  <span>Price</span> Plan', 'rental' )
			]
		);
		$this->add_control(
			'sec_subtitle', [
				'label'         => esc_html__( 'Sub Title', 'rental' ),
				'type'          => Controls_Manager::TEXT,
				'label_block'   => true,
				'default'       => esc_html__( 'She\'d earth that midst void creeping him above seas.', 'rental' )

			]
		);
		$this->end_controls_section();

		// Pricing Content ======================================
		$this->start_controls_section(
			'pricing_block',
			[
				'label' => __( 'Pricing Table', 'rental' ),
			]
		);
		$this->add_control(
			'pricing_content', [
				'label' => __( 'Create Pricing Table', 'rental' ),
				'type'  => Controls_Manager::REPEATER,
				'title_field' => '{{{ label }}}',
				'fields' => [
					[
						'name'  => 'label',
						'label' => __( 'Package Title', 'rental' ),
						'type'  => Controls_Manager::TEXT,
						'label_block' => true,
						'default' => esc_html__('Weeding', 'rental')
					],
					[
						'name'      => 'subtitle',
						'label'     => __( 'Sub Title', 'rental' ),
						'type'      => Controls_Manager::TEXTAREA,
                        'default'   => esc_html__( 'Attend only first day', 'rental' )
					],
					[
						'name'  => 'item_price',
						'label' => __( 'Package Price', 'rental' ),
						'type'  => Controls_Manager::NUMBER,
						'min'   => 1,
						'max'   => 100000,
						'step'  => 5,
						'default' => absint('76.00')
					],
                    [
						'name'      => 'feature_list',
						'label'     => __( 'Feature List', 'rental' ),
						'type'      => Controls_Manager::WYSIWYG,
                        'default'   => __( '<ul class="priceTable-list">
                                <li>Unlimited Entrance</li>
                                <li>Comfortable Seat</li>
                                <li>Paid Certificate</li>
                                <li>Day One Workshop</li>
                                <li>One Certificate</li>
                            </ul>', 'rental' )
					],
					[
						'name'      => 'btn_label',
						'label'     => __( 'Button Label', 'rental' ),
						'type'      => Controls_Manager::TEXTAREA,
						'label_block'=> true,
						'default'   => esc_html__( 'Book Now', 'rental' )
					],
					[
						'name'      => 'btn_url',
						'label'     => __( 'Button URL', 'rental' ),
						'type'      => Controls_Manager::URL,
						'default'   => ''
					],

				],
			]
		);

		$this->end_controls_section(); // End Pricing content



		// Feature Style ==============================
        $this->start_controls_section(
            'stylecolor', [
                'label' => __( 'Style Heading', 'rental' ),
                'tab' => Controls_Manager::TAB_STYLE,
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
				'default'   => '#8888888',
				'selectors' => [
					'{{WRAPPER}} .area-heading p' => 'color: {{VALUE}};',
				],
			]
		);
        $this->end_controls_section();


        /*=================================================
            Background Style
        ===================================================*/
        $this->start_controls_section(
            'section_bg', [
                'label' => __( 'Style Pricing Item', 'rental' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
		$this->add_control(
			'price_color', [
				'label'     => esc_html__( 'Price Color', 'rental' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#1a1d24',
				'selectors' => [
					'{{WRAPPER}} .priceTable-header h1' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'package_title_color', [
				'label'     => esc_html__( 'Package Title Color', 'rental' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#1a1d24',
				'selectors' => [
					'{{WRAPPER}} .priceTable-header h3' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'price_feature_color', [
				'label'     => esc_html__( 'Package Feature Color', 'rental' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .priceTable-list li' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'btn_label_color', [
				'label'     => esc_html__( 'Button Label Color', 'rental' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .priceTable-footer .main_btn' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'btn_bg_color', [
				'label'     => esc_html__( 'Button Background Color', 'rental' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .priceTable-footer .main_btn' => 'background: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'item_hover_label_color', [
				'label'     => esc_html__( 'Item Hover Label Color', 'rental' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .card-priceTable:hover .main_btn' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'item_hover_bg_color', [
				'label'     => esc_html__( 'Item Hover Background Color', 'rental' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .card-priceTable:hover .main_btn' => 'background: {{VALUE}};',
				],
			]
		);

        $this->end_controls_section();

	}

	protected function render() {
        $settings = $this->get_settings();
        $pricing  = !empty( $settings['pricing_content'] ) ? $settings['pricing_content'] : '';

        ?>
        <section class="pricing-table-area bg-1 area-padding">
            <div class="container">
                <div class="area-heading">
                    <h3>perfect <span> price</span> plan</h3>
                    <p>She'd earth that midst void creeping him above seas</p>
                </div>

                <div class="row">
                    <?php
                    if( is_array( $pricing ) && count( $pricing ) > 0 ) {
	                    foreach ( $pricing as $item ) {
	                        $title    = !empty( $item['label'] ) ? $item['label'] : '';
	                        $subtitle = !empty( $item['subtitle'] ) ? $item['subtitle'] : '';
	                        $price = !empty( $item['item_price'] ) ? $item['item_price'] : '';
	                        $featureList = !empty( $item['feature_list'] ) ? $item['feature_list'] : '';
	                        $btn_label = !empty( $item['btn_label'] ) ? $item['btn_label'] : '';
		                    $btn_url = !empty( $item['btn_url']['url'] ) ? $item['btn_url']['url'] : '';
		                    ?>
                            <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                                <div class="text-center card-priceTable">
                                    <div class="priceTable-header">
                                        <?php
                                        if( $title ){
                                            echo '<h3>'. esc_html( $title ) .'</h3>';
                                        }
                                        if( $subtitle ){
                                            echo '<p>'. esc_html( $subtitle ) .'</p>';
                                        }

                                        if( $price ){
                                            echo '<h1 class="priceTable-price"><span>$ </span> '.  esc_html( $price ) .'</h1>';
                                        }
                                        ?>
                                    </div>
                                    <?php
                                    if( $featureList ){
                                        echo wp_kses_post( $featureList );
                                    }
                                    ?>

                                    <div class="priceTable-footer">
                                        <?php
                                        if( $btn_label ){
                                            echo '<a class="main_btn" href="'. esc_url( $btn_url ) .'">'. esc_html( $btn_label ) .'</a>';
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
		                    <?php
	                    }
                    } ?>
                </div>
            </div>
        </section>

        <?php
    }
}
