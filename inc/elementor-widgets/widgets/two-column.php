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
class Rental_Two_Column extends Widget_Base {

	public function get_name() {
		return 'rental-two-column';
	}

	public function get_title() {
		return __( 'Two Column Feature', 'rental' );
	}

	public function get_icon() {
		return 'eicon-column';
	}

	public function get_categories() {
		return [ 'rental-elements' ];
	}

	protected function _register_controls() {

        
		// ----------------------------------------  About content ------------------------------
		$this->start_controls_section(
			'two_column_left',
			[
				'label' => __( 'Column Left', 'rental' ),
			]
		);
        $this->add_control(
            'title',
            [
                'label'         => esc_html__( 'Title', 'rental' ),
                'description'   => esc_html__('Use <br> tag for line break', 'rental'),
                'type'          => Controls_Manager::TEXTAREA,
                'label_block'   => true,
                'default'       => __( 'Beginning own <br> light divided male <br>is light', 'rental' )
            ]
        );

        $this->add_control(
            'feature_img',
            [
                'label'         => esc_html__( 'Feature Image', 'rental' ),
                'type'          => Controls_Manager::MEDIA,
                'label_block'   => true,
            ]
        );
        $this->add_control(
            'button_label',
            [
                'label'         => esc_html__( 'Button Label', 'rental' ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
                'default'       => 'Read More'
                
            ]
        );
        $this->add_control(
            'button_url',
            [
                'label'         => esc_html__( 'Button URL', 'rental' ),
                'type'          => Controls_Manager::URL,
                'label_block'   => true,

            ]
        );
		$this->end_controls_section(); // End about content

        $this->start_controls_section(
			'two_column_right',
			[
				'label' => __( 'Column Right', 'rental' ),
			]
		);
        $this->add_control(
            'rc_title',
            [
                'label'         => esc_html__( 'Title', 'rental' ),
                'description'   => esc_html__('Use <br> tag for line break', 'rental'),
                'type'          => Controls_Manager::TEXTAREA,
                'label_block'   => true,
                'default'       => __( 'Beginning own <br> light divided male <br>is light', 'rental' )
            ]
        );

        $this->add_control(
            'rc_feature_img',
            [
                'label'         => esc_html__( 'Feature Image', 'rental' ),
                'type'          => Controls_Manager::MEDIA,
                'label_block'   => true,
            ]
        );
        $this->add_control(
            'rc_button_label',
            [
                'label'         => esc_html__( 'Button Label', 'rental' ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
                'default'       => 'Read More'

            ]
        );
        $this->add_control(
            'rc_button_url',
            [
                'label'         => esc_html__( 'Button URL', 'rental' ),
                'type'          => Controls_Manager::URL,
                'label_block'   => true,

            ]
        );
		$this->end_controls_section(); // End about content




        // Feature Style ==============================
        $this->start_controls_section(
            'stylecolor', [
                'label' => __( 'Style Feature', 'rental' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );        
        $this->add_control(
            'title_color', [
                'label'     => __( 'Title Color', 'rental' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .room_1 .room_text_1 h1' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .room_2 .room_text_2 h1' => 'color: {{VALUE}};'
                ],
            ]
        );
        $this->add_control(
            'btn_color', [
                'label'     => __( 'Button label Color', 'rental' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .room_1 .room_text_1 .btn_2' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .room_2 .room_text_2 .btn_2' => 'color: {{VALUE}};'
                ],
            ]
        );
        $this->add_control(
            'btn_hover_color', [
                'label'     => __( 'Button Hover label Color', 'rental' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .room_1 .room_text_1 .btn_2:hover' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .room_2 .room_text_2 .btn_2:hover' => 'color: {{VALUE}};'
                ],
            ]
        );
        $this->end_controls_section();


	}

	protected function render() {
        $settings = $this->get_settings();
        $title    = !empty( $settings['title'] ) ? $settings['title'] : '';
        $imgLeft  = !empty( $settings['feature_img']['id'] ) ? wp_get_attachment_image( $settings['feature_img']['id'], 'rental_935x775' ) : '';
		$btn_left = !empty( $settings['button_label'] ) ? $settings['button_label'] : '';
		$btnl_url = !empty( $settings['button_url']['url'] ) ? $settings['button_url']['url'] : '';

		$rc_title = !empty( $settings['rc_title'] ) ? $settings['rc_title'] : '';
		$imgRight = !empty( $settings['rc_feature_img']['id'] ) ? wp_get_attachment_image( $settings['rc_feature_img']['id'], 'rental_935x775' ) : '';
		$rc_btnl  = !empty( $settings['rc_button_label'] ) ? $settings['rc_button_label'] : '';
		$rc_btnurl = !empty( $settings['rc_button_url']['url'] ) ? $settings['rc_button_url']['url'] : '';


        ?>
        <div class="room_part">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 col-lg-6">
                        <div class="room_1">
                            <?php
                            if( $imgLeft ){
                                echo wp_kses_post( $imgLeft );
                            }
                            ?>
                            <div class="room_text_1">
                                <?php
                                if( $title ){
                                    echo '<h1>'. wp_kses_post( nl2br( $title ) ) .'</h1>';
                                }

                                if( $btn_left ){
                                    echo '<a href="'. esc_url( $btnl_url ) .'" class="btn_2">'. esc_html( $btn_left ) .'<span class="ti-arrow-right"></span></a>';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6">
                        <div class="room_2">
	                        <?php
	                        if( $imgRight ){
		                        echo wp_kses_post( $imgRight );
	                        }
	                        ?>
                            <div class="room_text_2">
	                            <?php
	                            if( $rc_title ){
		                            echo '<h1>'. wp_kses_post( nl2br( $rc_title ) ) .'</h1>';
	                            }

	                            if( $rc_btnl ){
		                            echo '<a href="'. esc_url( $rc_btnurl ) .'" class="btn_2">'. esc_html( $rc_btnl ) .'<span class="ti-arrow-right"></span></a>';
	                            }
	                            ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
}
