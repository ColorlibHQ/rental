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
class Rental_Services extends Widget_Base {

	public function get_name() {
		return 'rental-services';
	}

	public function get_title() {
		return __( 'Services', 'rental' );
	}

	public function get_icon() {
		return 'eicon-info-box';
	}

	public function get_categories() {
		return [ 'rental-elements' ];
	}

	protected function _register_controls() {

		$repeater = new \Elementor\Repeater();

        // ----------------------------------------  training Section Heading ------------------------------
        $this->start_controls_section(
            'services_heading',
            [
                'label' => __( 'Services Section Heading', 'rental' ),
            ]
        );
        $this->add_control(
            'sect_title', [
                'label' => __( 'Section Title', 'rental' ),
                'description'  => esc_html__('Use "<br>" tag for color and italic word', 'rental'),
                'type'  => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default'   => __( 'Our Passion is <br>People What Yours?', 'rental' )

            ]
        );

        $this->end_controls_section(); // End section top content
        
		// ----------------------------------------   Services content ------------------------------
		$this->start_controls_section(
			'services_block',
			[
				'label' => __( 'Services', 'rental' ),
			]
		);
		$this->add_control(
            'services_content', [
                'label' => __( 'Create Training', 'rental' ),
                'type'  => Controls_Manager::REPEATER,
                'title_field' => '{{{ label }}}',
                'fields' => [
                    [
                        'name'  => 'label',
                        'label' => __( 'Title', 'rental' ),
                        'type'  => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => __( 'Creative Design', 'rental' )
                    ],
                    [
                        'name'      => 'desc',
                        'label'     => __( 'Descriptions', 'rental' ),
                        'type'      => Controls_Manager::TEXTAREA,
                        'default'   => __( 'Hac facilisi ac vitae consec tetu commod vel magna suspen disse on senectus pharetra magnfauc bed', 'rental' )
                    ],
                    [
                        'name'  => 'select_type',
                        'label' => __( 'Image/Icon', 'rental' ),
                        'type'  => Controls_Manager::SELECT,
                        'options'=> [
                            'style1' => 'Image Icon',
                            'style2' => 'Font Icon',
                        ],
                        'default'   => 'style2'
                    ],
                    [
                        'name'  => 'img',
                        'label' => __( 'Photo', 'rental' ),
                        'type'  => Controls_Manager::MEDIA,
                        'condition' => [
                                'select_type' => 'style1'
                        ]
                    ],
                    [
                        'name'  => 'icon',
                        'label' => __( 'Icon', 'rental' ),
                        'type'  => Controls_Manager::ICON,
                        'options'   => rental_flaticon_list(),
                        'condition' => [
                                'select_type' => 'style2'
                        ]
                    ],
	                [
		                'name'  => 'btn_label',
		                'label' => __( 'Service Button Label', 'rental' ),
		                'type'  => Controls_Manager::TEXT,
		                'label_block' => true,
                        'default'=> esc_html__('Read More', 'rental')
	                ],
	                [
		                'name'  => 'btn_url',
		                'label' => __( 'Service URL', 'rental' ),
		                'type'  => Controls_Manager::URL,
		                'label_block' => true,
	                ]

                ],
            ]
		);

		$this->end_controls_section(); // End Services content


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
                'default'   => '#8888888',
                'selectors' => [
                    '{{WRAPPER}} .area-heading p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        //------------------------------ Style services Box ------------------------------
        $this->start_controls_section(
            'style_trainingbox', [
                'label' => __( 'Style Services Content', 'rental' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_service_icon', [
                'label' => __( 'Icon Color', 'rental' ),
                'type'  => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .passion_part .single_passion .single_passion_item .passion_icon i' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'service_hover_icon_color', [
                'label' => __( 'Hover Icon Color', 'rental' ),
                'type'  => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .passion_part .single_passion:hover .single_passion_item .passion_icon i' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_servicestitle', [
                'label' => __( 'Title Color', 'rental' ),
                'type'  => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .passion_part .single_passion .single_passion_item h4' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_serviceshovertitle', [
                'label' => __( 'Title Hover Color', 'rental' ),
                'type'  => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .passion_part .single_passion:hover .single_passion_item h4' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_servicesdescription', [
                'label' => __( 'Description Color', 'rental' ),
                'type'  => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .passion_part .single_passion .single_passion_item p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'service_hover_desc', [
                'label' => __( 'Service Hover Description Color', 'rental' ),
                'type'  => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .passion_part .single_passion:hover .single_passion_item p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'service_hover_bg', [
                'label' => __( 'Service Hover Background Color', 'rental' ),
                'type'  => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .passion_part .single_passion:hover .single_passion_item:after' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'service_item_pattern_heading', [
                'label' => __( 'Service Item Background ', 'rental' ),
                'type'  => Controls_Manager::HEADING,
                'separator' => 'before'

            ]
        );
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'service_item_pattern',
				'label' => __( 'Background', 'rental' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .passion_part .single_passion .single_passion_item:after',
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
                'selector' => '{{WRAPPER}} .passion_part',
            ]
        );

		$this->add_control(
			'section_overlay',
			[
				'label'     => __( 'Section Overlay Background', 'rental' ),
				'type'      => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'sec_overlay',
                'label' => __( 'Background', 'rental' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .passion_part:after',
            ]
        );

        $this->end_controls_section();


	}

	protected function render() {

    $settings = $this->get_settings();
    $title = !empty( $settings['sect_title'] ) ? $settings['sect_title'] : '';
    $services = !empty( $settings['services_content'] ) ? $settings['services_content'] : '';

    ?>

        <div class="passion_part">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">
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
                    <?php
                    if( is_array( $services ) && count( $services ) > 0 ){
                        foreach ( $services as $service ) { ?>
                            <div class="col-md-6 col-lg-3">
                                <div class="single_passion">
                                    <div class="single_passion_item">
                                        <?php
                                        if( isset( $service['icon'] ) ){
                                            echo '<span class="passion_icon"><i class="'. esc_attr( $service['icon'] ) .'"></i></span>';
                                        }

                                        if( !empty( $service['label'] ) ){
                                            echo '<a href="'. esc_url( $service['btn_url']['url'] ) .'"><h4>'. esc_html( $service['label'] ) .'</h4></a>';
                                        }

                                        if( !empty( $service['desc'] ) ){
                                            echo '<p>'. esc_html( $service['desc'] ) .'</p>';
                                        }

                                        if( !empty( $service['btn_label'] ) ){
                                            echo '<a href="'. esc_url( $service['btn_url']['url'] ) .'" class="btn_2">'. esc_html( $service['btn_label'] ) .'<span class="ti-arrow-right"></span></a>';
                                        }
                                        ?>

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
