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
 * elementor projects section widget.
 *
 * @since 1.0
 */
class Rental_projects extends Widget_Base {

	public function get_name() {
		return 'rental-projects';
	}

	public function get_title() {
		return __( 'Projects', 'rental' );
	}

	public function get_icon() {
		return 'eicon-gallery-grid';
	}

	public function get_categories() {
		return [ 'rental-elements' ];
	}

	protected function _register_controls() {

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
                'default'       => __( 'Our <span>Recent</span> Project', 'rental' )
            ]
        );
        $this->add_control(
            'sec_subtitle', [
                'label'         => esc_html__( 'Sub Title', 'rental' ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
                'default'       => esc_html__( 'Together female let signs for for fish fowl may first.', 'rental' )
                                
            ]
        );
		$this->end_controls_section(); 


        // ----------------------------------------  Projects Content ------------------------------
        $this->start_controls_section(
            'menu_tab_sec',
            [
                'label' => __( 'Projects', 'rental' ),
            ]
        );
		$this->add_control(
			'portfolio_number', [
				'label'         => esc_html__( 'Portfolio Number', 'rental' ),
				'type'          => Controls_Manager::NUMBER,
				'max'           => 15,
				'min'           => 1,
				'step'          => 1,
				'default'       => 5

			]
		);

        $this->end_controls_section(); // End projects content

        //------------------------------ Style title ------------------------------
        $this->start_controls_section(
            'style_title', [
                'label' => __( 'Style Category', 'rental' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'sec_title_color', [
                'label'     => __( 'Section Title Color', 'rental' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#202e31',
                'selectors' => [
                    '{{WRAPPER}} .area-heading h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'sec_subtitle_color', [
                'label'     => __( 'Section Sub Title Color', 'rental' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#888888',
                'selectors' => [
                    '{{WRAPPER}} .area-heading p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_title', [
                'label'     => __( 'Category Title Color', 'rental' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#222',
                'selectors' => [
                    '{{WRAPPER}} .portfolio_area .filters ul li' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'cat_title_hover', [
                'label'     => __( 'Category Item Hover Color', 'rental' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .portfolio_area .filters ul li:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'active_cat_title_color', [
                'label'     => __( 'Active Category Title Color', 'rental' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .portfolio_area .filters ul li.active' => 'color: {{VALUE}};',
                ],
            ]
        );
        

        $this->end_controls_section();



        //------------------------------ Style Tab  ------------------------------
        $this->start_controls_section(
            'style_tab', [
                'label' => __( 'Style Menu Item', 'rental' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_menu_item_color', [
                'label'     => __( 'Menu Item Color', 'rental' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-menu-list'  => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_menu_item', [
                'label'     => __( 'Menu Item Background Color', 'rental' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-menu-list' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_menu_item_hover', [
                'label'     => __( 'Menu Item Hover Background Color', 'rental' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-menu-list:hover'  => 'background-color: {{VALUE}};',
                ],
            ]
        );
        

        $this->end_controls_section();

	}

	protected function render() {

    $settings = $this->get_settings();
    $this->load_widget_script();
    $pNumber = $settings['portfolio_number'];

    $secTitle = !empty( $settings['sec_title'] ) ? $settings['sec_title'] : '';
    $subTitle = !empty( $settings['sec_subtitle'] ) ? $settings['sec_subtitle'] : '';
    ?>
        <section class="portfolio_area area-padding" id="portfolio">
            <div class="container">
                <div class="area-heading">
	                <?php
	                // Section Title =========
	                if( $secTitle ){
		                echo '<h3>'. wp_kses_post( $secTitle ) .'</h3>';
	                }
	                // Section Sub Title=====
	                if( $subTitle ){
		                echo '<p>'. esc_html( $subTitle ) .'</p>';
	                }
	                ?>
                </div>

                <?php
                rental_portfolio_section( $pNumber );
                ?>

            </div>
        </section>

    <?php

    }

    public function load_widget_script(){
        if( \Elementor\Plugin::$instance->editor->is_edit_mode() === true  ) {
        ?>
        <script>
        ( function( $ ){


                $('.portfolio-filter ul li').on('click', function () {
                    $('.portfolio-filter ul li').removeClass('active');
                    $(this).addClass('active');

                    var data = $(this).attr('data-filter');
                    $workGrid.isotope({
                        filter: data
                    });
                });

                if (document.getElementById('portfolio')) {
                    var $workGrid = $('.portfolio-grid').isotope({
                        itemSelector: '.all',
                        percentPosition: true,
                        masonry: {
                            columnWidth: '.grid-sizer'
                        }
                    });
                }
            

        })(jQuery);
        </script>
        <?php 
        }
    }
	
}
