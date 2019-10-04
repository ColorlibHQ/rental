<?php 
/**
 * @Packge     : Rental
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 * Customizer panels and sections
 *
 */

/***********************************
 * Register customizer panels
 ***********************************/

$panels = array(
    /**
     * Theme Options Panel
     */
    array(
        'id'   => 'rental_theme_options_panel',
        'args' => array(
            'priority'       => 0,
            'capability'     => 'edit_theme_options',
            'theme_supports' => '',
            'title'          => esc_html__( 'Theme Options', 'rental' ),
        ),
    )
);


/***********************************
 * Register customizer sections
 ***********************************/


$sections = array(
    /**
     * General Section
     */
    array(
        'id'   => 'rental_general_section',
        'args' => array(
            'title'    => esc_html__( 'General', 'rental' ),
            'panel'    => 'rental_theme_options_panel',
            'priority' => 1,
        ),
    ),

    /**
     * Header Section
     */
    array(
        'id'   => 'rental_header_section',
        'args' => array(
            'title'    => esc_html__( 'Header', 'rental' ),
            'panel'    => 'rental_theme_options_panel',
            'priority' => 2,
        ),
    ),

    /**
     * Blog Section
     */
    array(
        'id'   => 'rental_blog_section',
        'args' => array(
            'title'    => esc_html__( 'Blog', 'rental' ),
            'panel'    => 'rental_theme_options_panel',
            'priority' => 3,
        ),
    ),

    /**
     * Blog Section
     */
    array(
        'id'   => 'rental_portfolio_section',
        'args' => array(
            'title'    => esc_html__( 'Portfolio', 'rental' ),
            'panel'    => 'rental_theme_options_panel',
            'priority' => 4,
        ),
    ),



    /**
     * 404 Page Section
     */
    array(
        'id'   => 'rental_fof_section',
        'args' => array(
            'title'    => esc_html__( '404 Page', 'rental' ),
            'panel'    => 'rental_theme_options_panel',
            'priority' => 6,
        ),
    ),

    /**
     * Footer Section
     */
    array(
        'id'   => 'rental_footer_section',
        'args' => array(
            'title'    => esc_html__( 'Footer Page', 'rental' ),
            'panel'    => 'rental_theme_options_panel',
            'priority' => 7,
        ),
    ),



);


/***********************************
 * Add customizer elements
 ***********************************/
$collection = array(
    'panel'   => $panels,
    'section' => $sections,
);

Epsilon_Customizer::add_multiple( $collection );

?>