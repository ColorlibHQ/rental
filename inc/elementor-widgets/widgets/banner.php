<?php
namespace Rentalelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
//use Elementor\Scheme_Color;
//use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
//use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Background;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;  
}


/**
 *
 * Rental elementor about us section widget.
 *
 * @since 1.0
 */
class Rental_Banner extends Widget_Base {

	public function get_name() {
		return 'rental-banner';
	}

	public function get_title() {
		return __( 'Banner', 'rental' );
	}

	public function get_icon() {
		return 'eicon-banner';
	}

	public function get_categories() {
		return [ 'rental-elements' ];
	}

	protected function _register_controls() {

        // ----------------------------------------  content ------------------------------
        $this->start_controls_section(
            'banner_section',
            [
                'label' => __( 'Banner Section Content', 'rental' ),
            ]
        );
        $this->add_control(
            'banner_content',
            [
                'label'         => esc_html__( 'Banner Content', 'rental' ),
                'type'          => Controls_Manager::WYSIWYG,
                'default'       => __( ' <h5>Beautiful investments</h5>
                                <h2>Everyone Deserves
                                    the Opportunity of
                                    the Home</h2>
                                <p>Enim a, scelerisque aliquet vivamus neque diam sed at pede do laos orci. Potenti vel
                                    in sagittis nulla augue vitae et tempus torquent dicid Lacinia neque mus maleware
                                    poside</p>', 'rental' )
            ]
        );

        $this->add_control(
            'banner_btnlabel',
            [
                'label'         => esc_html__( 'Button Label', 'rental' ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
                'default'       => esc_html__( 'Get Started', 'rental' )
            ]
        );
        $this->add_control(
            'banner_btnurl',
            [
                'label'         => esc_html__( 'Button Url', 'rental' ),
                'type'          => Controls_Manager::URL,
                'show_external' => false
            ]
        );
		$this->end_controls_section();


		// YouTube Video Play Button =======================
		$this->start_controls_section(
			'video_btn',
			[
				'label' => __( 'Video Play Button', 'rental' ),
			]
		);
		$this->add_control(
			'video_url',
			[
				'label'         => esc_html__( 'YouTube Video Url', 'rental' ),
				'type'          => Controls_Manager::URL,
                'default'       => [
                    'url'   => 'https://www.youtube.com/watch?v=pBFQdxA-apI'
                ]
			]
		);

		$this->end_controls_section();

        // Social Links ==================================
		$this->start_controls_section(
			'social_profiles',
			[
				'label' => __( 'Social Profile', 'rental' ),
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
						'label' => __( 'Social Profile Label', 'rental' ),
						'type'  => Controls_Manager::TEXT,
						'label_block' => true,
						'default' => esc_html__( 'Facebook', 'rental' )
					],
					[
						'name'  => 'icon',
						'label' => __( 'Icon', 'rental' ),
						'type'  => Controls_Manager::ICON,

					],
                    [
                        'name'  => 'link',
                        'label' => __( 'Social URL', 'rental' ),
                        'type'  => Controls_Manager::URL,

                    ]
				],
			]
		);
        $this->end_controls_section(); // End content


        //------------------------------ Style button ------------------------------
        $this->start_controls_section(
            'style_btn', [
                'label' => __( 'Style Button', 'rental' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_btnlabel', [
                'label'     => __( 'Button Label Color', 'rental' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .banner_content .main_btn' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_btnhoverlabel', [
                'label'     => __( 'Button Hover Label Color', 'rental' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .banner_content .main_btn:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_btnbg', [
                'label'       => __( 'Button Background Color', 'rental' ),
                'type'        => Controls_Manager::COLOR,
                'default'     => '',
                'selectors'   => [
                    '{{WRAPPER}} .banner_content .main_btn' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_btnhovbg', [
                'label'     => __( 'Button Hover Background Color', 'rental' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .banner_content .main_btn:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );


        $this->end_controls_section();

        /**
         * Style Tab
         * ------------------------------ Background Style ------------------------------
         *
         */
        $this->start_controls_section(
            'section_bg', [
                'label' => __( 'Style Background', 'rental' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'bg_overlay',
            [
                'label' => __( 'Overlay', 'rental' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __( 'Show', 'rental' ),
                'label_off' => __( 'Hide', 'rental' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'sect_ooverlay_bgcolor',
            [
                'label'     => __( 'Overlay Color', 'rental' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before',
                'condition' => [
                    'bg_overlay' => 'yes'
                ]
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'sectionoverlaybg',
                'label' => __( 'Overlay', 'rental' ),
                'types' => [ 'gradient' ],
                'selector' => '{{WRAPPER}} .banner-area .overlay-bg',
                'condition' => [
                    'bg_overlay' => 'yes'
                ]
            ]
        );
        $this->add_control(
            'section_bgheading',
            [
                'label'     => __( 'Background Settings', 'rental' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'sectionbg',
                'label' => __( 'Background', 'rental' ),
                'types' => [ 'classic' ],
                'selector' => '{{WRAPPER}} .banner_part:after',
            ]
        );

        $this->end_controls_section();

	}

	protected function render() {
        $settings = $this->get_settings();
        $ban_content = !empty( $settings['banner_content'] ) ? $settings['banner_content'] : '';
        $btn_label = !empty( $settings['banner_btnlabel'] ) ? $settings['banner_btnlabel'] : '';
        $buttonUrl = !empty( $settings['banner_btnurl']['url'] ) ? $settings['banner_btnurl']['url'] : '';
        $socialLinks = !empty( $settings['social_links'] ) ? $settings['social_links'] : '';
        ?>
        <section class="banner_part">
            <div class="container">
                <div class="row align-content-center">
                    <div class="col-lg-6">
                        <div class="banner_text aling-items-center">
                            <div class="banner_text_iner">
                               <?php
                               if( !empty( $ban_content ) ){
                                   echo wp_kses_post( nl2br( $ban_content ) );
                               }

                               //Button
                               if( !empty( $btn_label ) ){
                                   echo '<a href="'. esc_url( $buttonUrl ) .'" class="btn_1 banner_btn ">'. esc_html( $btn_label ) .'</a>';
                               }

                               if( is_array( $socialLinks ) && count( $socialLinks ) > 0 ) {
	                               ?>
                                   <div class="d-none d-xl-block banner_social_icon">
                                       <ul class="list-inline">
                                           <?php
                                           $total = count( $socialLinks );
                                           $net = $total - 1;
                                           $i =0;

                                           foreach ( $socialLinks as $slink ){
	                                           $circle = $net > $i++ ? '<i class="fa fa-circle"></i>' : '';
                                               echo '<li class="list-inline-item"><a href="'. esc_url( $slink['link']['url'] ) .'"><span class="'. esc_attr( $slink['icon'] ) .'"></span>'. esc_html( $slink['label'] ) .'</a><span class="dot">'. $circle .'</span></li>';
                                           }
                                           ?>
                                       </ul>
                                   </div>
	                               <?php
                               } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            if( !empty( $settings['video_url']['url'] ) ){
                echo '<a href="'. esc_url( $settings['video_url']['url'] ) .'" class="popup-youtube video_popup"><span class="ti-control-play"></span></a>';
            }
            ?>
        </section>
        <?php

    }
	
}
