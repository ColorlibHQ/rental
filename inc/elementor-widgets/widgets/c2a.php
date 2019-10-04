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
 * Rental elementor few words section widget.
 *
 * @since 1.0
 */

class Rental_C2a extends Widget_Base {

	public function get_name() {
		return 'rental-c2a';
	}

	public function get_title() {
		return __( 'Call To Action', 'rental' );
	}

	public function get_icon() {
		return 'eicon-call-to-action';
	}

	public function get_categories() {
		return [ 'rental-elements' ];
	}

	protected function _register_controls() {

        // ----------------------------------------  Blog content ------------------------------
        $this->start_controls_section(
            'c2a_content',
            [
                'label' => __( 'Call To Action', 'rental' ),
            ]
        );
		$this->add_control(
			'sec_title',
			[
				'label'         => esc_html__( 'Title', 'rental' ),
				'type'          => Controls_Manager::TEXTAREA,
				'label_block'   => true,
				'default'       => __( 'Are You Ready For Move', 'rental' )
			]
		);
		$this->add_control(
			'sec_subtitle', [
				'label'         => esc_html__( 'Sub Title', 'rental' ),
				'type'          => Controls_Manager::TEXTAREA,
				'label_block'   => true,
				'default'       => esc_html__( 'Lights had saw moving saw female blessed', 'rental' )

			]
		);
        $this->add_control(
            'btn_label',
            [
                'label'     => esc_html__( 'Button Label', 'rental' ),
                'type'      => Controls_Manager::TEXT,
                'label_block'=> true,
                'default'   => 'Sign Up'
            ]
        );
        $this->add_control(
            'btn_url',
            [
                'label'     => esc_html__( 'Button URL', 'rental' ),
                'type'      => Controls_Manager::URL,
                'label_block'=> true,

            ]
        );

        $this->end_controls_section(); // End few words content



        //------------------------------ Style text ------------------------------
        $this->start_controls_section(
            'style_content', [
                'label' => __( 'Style Content', 'rental' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_title', [
                'label'     => __( 'Title Color', 'rental' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .cta_part h1' => 'color: {{VALUE}};',
                ],
            ]
        );
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'label' => __( 'Typography', 'rental' ),
				'selector' => '{{WRAPPER}} .cta_part h1',
			]
		);

		$this->add_control(
			'color_subtitle', [
				'label'     => __( 'Sub Title Color', 'rental' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .cta_part p' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'subtitle_typography',
				'label' => __( 'Typography', 'rental' ),
				'selector' => '{{WRAPPER}} .cta_part p',
			]
		);
		$this->end_controls_section();


		$this->start_controls_section(
			'style_button', [
				'label' => __( 'Style Button', 'rental' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->start_controls_tabs(
			'style_tabs'
		);
		$this->start_controls_tab(
            'style_normal',
            [
                'label' => __( 'Normal', 'rental' ),
            ]
        );
		$this->add_control(
			'btn_label_color', [
				'label'     => __( 'Button Color', 'rental' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .cta_part .cta_btn' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'btn_bg', [
				'label'     => __( 'Button Background Color', 'rental' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .cta_part .cta_btn' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'border_color', [
				'label'     => __( 'Border Color', 'rental' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .cta_part .cta_btn' => 'border-color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();


		$this->start_controls_tab(
            'style_hover',
            [
                'label' => __( 'Hover', 'rental' ),
            ]
        );
		$this->add_control(
			'btn_hover_color', [
				'label'     => __( 'Button Hover Color', 'rental' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .cta_part .cta_btn:hover' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'btn_hover_bg', [
				'label'     => __( 'Button Hover Background Color', 'rental' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .cta_part .cta_btn:hover' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'border_hover_color', [
				'label'     => __( 'Hover Border Color', 'rental' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .cta_part .cta_btn:hover' => 'border-color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();
		$this->end_controls_tabs();

		$this->end_controls_section();


		$this->start_controls_section(
			'style_background', [
				'label' => __( 'Style Background', 'rental' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'sec_bg',
				'label' => __( 'Background', 'rental' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .cta_part',
			]
		);

		$this->add_control(
			'btn_color', [
				'label'     => __( 'Button Label Color', 'rental' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .cta_part .cta_btn' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'btn_bg_color', [
				'label'     => __( 'Button Background Color', 'rental' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .cta_part .cta_btn' => 'background: {{VALUE}};',
				],
			]
		);

        $this->end_controls_section();

	}

	protected function render() {

    $settings  = $this->get_settings();
    $title      = !empty( $settings['sec_title'] ) ? $settings['sec_title'] : '';
    $subTitle   = !empty( $settings['sec_subtitle'] ) ? $settings['sec_subtitle'] : '';
    $btn_label  = !empty( $settings['btn_label'] ) ? $settings['btn_label'] : '';
    $btn_url    = !empty( $settings['btn_url']['url'] ) ? $settings['btn_url']['url'] : '';
    ?>

    <div class="cta_part">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="cta_iner">
                        <?php
                        if( $title ){
                            echo '<h1>'. wp_kses_post( nl2br( $title ) ) .'</h1>';
                        }
                        if( $subTitle ){
                            echo '<p>'. esc_html( $subTitle ) .'</p>';
                        }

                        if( $btn_label ){
                            echo '<a href="'. esc_url( $btn_url ) .'" class="cta_btn">'. esc_html( $btn_label ) .'</a>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
	}
}
