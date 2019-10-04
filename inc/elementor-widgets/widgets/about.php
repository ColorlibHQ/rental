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
class Rental_About extends Widget_Base {

	public function get_name() {
		return 'rental-about';
	}

	public function get_title() {
		return __( 'About', 'rental' );
	}

	public function get_icon() {
		return 'eicon-thumbnails-half';
	}

	public function get_categories() {
		return [ 'rental-elements' ];
	}

	protected function _register_controls() {

        
		// ----------------------------------------  About content ------------------------------
		$this->start_controls_section(
			'about_content',
			[
				'label' => __( 'About Us', 'rental' ),
			]
		);
        $this->add_control(
            'content',
            [
                'label'         => esc_html__( 'Content', 'rental' ),
                'description'   => esc_html__('Use <br> tag for line break', 'rental'),
                'type'          => Controls_Manager::WYSIWYG,
                'label_block'   => true,
                'default'       => __( '<h2>Living From <br> The Team That Cares</h2> <p>Unto all set life creeping own set. Saw make multiply female watge deb all set life
                     creeping own set. Saw make multiply female watge abund winged subdue dominion
                     own night days second</p> ', 'rental' )
            ]
        );

        $this->add_control(
            'button_label',
            [
                'label'         => esc_html__( 'Button Label', 'rental' ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
                'default'       => esc_html__('Learn More', 'rental')
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

        // List Item ==============================
		$this->start_controls_section(
			'content_list',
			[
				'label' => __( 'Content List Item', 'rental' ),
			]
		);
		$this->add_control(
			'social_links', [
				'label' => __( 'Social Profile Links', 'rental' ),
				'type'  => Controls_Manager::REPEATER,
				'title_field' => '{{{ label }}}',
				'fields' => [
					[
						'name'  => 'label',
						'label' => __( 'List Item Label', 'rental' ),
						'type'  => Controls_Manager::TEXTAREA,
						'label_block' => true,
						'default' => esc_html__( 'Set dry signs spirit a kind First shall them windged creping', 'rental' )
					],
					[
						'name'  => 'icon',
						'label' => __( 'Icon', 'rental' ),
						'type'  => Controls_Manager::ICON,

					]
				],
			]
		);
		$this->end_controls_section(); // End about content


		$this->start_controls_section(
			'about_feature_image',
			[
				'label' => __( 'Featured Images', 'rental' ),
			]
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'about_featured_img',
				'label' => __( 'Featured Image', 'rental' ),
				'types' => [ 'classic' ],
				'selector' => '{{WRAPPER}} .team_part:before',
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
            'btn_color', [
                'label'     => __( 'Button label Color', 'rental' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .team_part .team_member_text .btn_1' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'btn_bg_color', [
                'label'     => __( 'Button Background Color', 'rental' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .team_part .team_member_text .btn_1' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'btn_hover_color', [
                'label'     => __( 'Button Hover label Color', 'rental' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .team_part .team_member_text .btn_1:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'btn_hover_bg_color', [
                'label'     => __( 'Button Hover Background Color', 'rental' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .team_part .team_member_text .btn_1:hover' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_section();


	}

	protected function render() {
        $settings = $this->get_settings();
        $content  = !empty( $settings['content'] ) ? $settings['content'] : '';
        $button_label = !empty( $settings['button_label'] ) ? $settings['button_label'] : '';
        $list_items   = !empty( $settings['social_links'] ) ? $settings['social_links'] : '';
        $button_url   = !empty( $settings['button_url']['url'] ) ? $settings['button_url']['url'] : '';


        ?>
        <section class="team_part">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="team_img"></div>
                    </div>
                    <div class="offset-lg-1 col-lg-5">
                        <div class="team_member_text">
                            <?php
                            if( !empty($content ) ){
                                echo wp_kses_post( nl2br( $content ) );
                            }
                            ?>
                            <ul>
                                <?php
                                if( is_array( $list_items ) && count( $list_items ) > 0 ){
                                    foreach ( $list_items as $list ) {
	                                    echo '<li><span class="'. esc_attr( $list['icon'] ) .'"></span>' . esc_html( $list['label'] ) . '</li>';
                                    }
                                }
                                ?>
                            </ul>

                            <?php
                            if( $button_label ){
                                echo '<a href="'. esc_url( $button_url ) .'" class="btn_1">'. esc_html( $button_label ) .'</a>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <img src="<?php echo get_template_directory_uri().'/assets/img/section_pattern.png'; ?>" alt="<?php echo esc_html__('pattern image', 'rental') ?>">
        </section>
        <?php

    }

}
