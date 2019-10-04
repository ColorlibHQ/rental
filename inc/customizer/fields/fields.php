<?php 
/**
 * @Packge     : Rental
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 * Customizer section fields
 *
 */

/***********************************
 * General Section Fields
 ***********************************/
// Header top background color
Epsilon_Customizer::add_field(
    'rental_theme_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Theme Color', 'rental' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'rental_general_section',
        'default'     => '#cfb579',
    )
);

/***********************************
 * Header Section Fields =====================================
 ***********************************/


Epsilon_Customizer::add_field(
	'rental_header_c2a_label',
	array(
		'type'        => 'text',
		'label'       => esc_html__( 'Header Call To Action Label', 'rental' ),
		'sanitize_callback' => 'sanitize_text_field',
		'section'     => 'rental_header_section',
		'default'     => 'Submit property',
	)
);
Epsilon_Customizer::add_field(
	'rental_header_c2a_url',
	array(
		'type'        => 'url',
		'label'       => esc_html__( 'Header Call To Action URL', 'rental' ),
		'sanitize_callback' => 'sanitize_text_field',
		'section'     => 'rental_header_section'
	)
);


// Header navbar============================================
Epsilon_Customizer::add_field(
    'header_sec',
    array(
        'type'        => 'epsilon-separator',
        'label'       => esc_html__( 'Header Navbar', 'rental' ),
        'section'     => 'rental_header_section',
        
    )
);


// Header background color field
Epsilon_Customizer::add_field(
    'rental_header_bg_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Header Background Color', 'rental' ),
        'description' => esc_html__( 'Select the header background color.', 'rental' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'rental_header_section',
        'default'     => '',
    )
);

// Header nav menu color field
Epsilon_Customizer::add_field(
    'rental_header_menu_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Header menu color', 'rental' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'rental_header_section',
        'default'     => '#14303a',
    )
);

// Header nav menu hover color field
Epsilon_Customizer::add_field(
    'rental_header_menu_hover_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Header menu hover color', 'rental' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'rental_header_section',
        'default'     => '',
    )
);
// Header menu dropdown background color field
Epsilon_Customizer::add_field(
    'rental_header_menu_dropbg_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Header menu dropdown background color', 'rental' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'rental_header_section',
        'default'     => '#fafafa',
    )
);

// Header dropdown menu color field
Epsilon_Customizer::add_field(
    'rental_header_drop_menu_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Dropdown menu color', 'rental' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'rental_header_section',
        'default'     => '#14303a',
    )
);
// Header dropdown menu hover color field
Epsilon_Customizer::add_field(
    'rental_drop_menu_item_hover_bg',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Dropdown menu item hover background', 'rental' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'rental_header_section',
        'default'     => '',
    )
);
// Header dropdown menu hover color field
Epsilon_Customizer::add_field(
    'rental_header_drop_menu_hover_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Dropdown menu hover color', 'rental' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'rental_header_section',
        'default'     => '',
    )
);


/***********************************
 * Blog Section Fields
 ***********************************/
 
// Post excerpt length field
Epsilon_Customizer::add_field(
    'rental_excerpt_length',
    array(
        'type'        => 'text',
        'label'       => esc_html__( 'Set post excerpt length', 'rental' ),
        'description' => esc_html__( 'Set post excerpt length.', 'rental' ),
        'section'     => 'rental_blog_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'     => '30',
    )
);



// Blog sidebar layout field
Epsilon_Customizer::add_field(
    'rental_blog_layout',
    array(
        'type'     => 'epsilon-layouts',
        'label'    => esc_html__( 'Blog Layout', 'rental' ),
        'section'  => 'rental_blog_section',
        'description' => esc_html__( 'Select the option to set blog page layout.', 'rental' ),
        'layouts'  => array(
            '1' => get_template_directory_uri() . '/inc/libraries/epsilon-framework/assets/img/one-column.png',
            '2' => get_template_directory_uri() . '/inc/libraries/epsilon-framework/assets/img/epsilon-section-titleright.jpg',
            '3' => get_template_directory_uri() . '/inc/libraries/epsilon-framework/assets/img/epsilon-section-titleleft.jpg',
        ),
        'default'  => array(
            'columnsCount' => 2,
            'columns'      => array(
                1 => array(
                    'index' => 1,
                ),
                2 => array(
                    'index' => 2,
                ),
                3 => array(
                    'index' => 3,
                ),
            ),
        ),
        'min_span' => 4,
        'fixed'    => true
    )
);

// Blog single page social share icon
Epsilon_Customizer::add_field(
    'rental_blog_meta',
    array(
        'type'        => 'epsilon-toggle',
        'label'       => esc_html__( 'Blog page post meta show/hide', 'rental' ),
        'section'     => 'rental_blog_section',
        'default'     => false
    )
);
Epsilon_Customizer::add_field(
    'rental_blog_single_meta',
    array(
        'type'        => 'epsilon-toggle',
        'label'       => esc_html__( 'Blog single post meta show/hide', 'rental' ),
        'section'     => 'rental_blog_section',
        'default'     => false
    )
);

/*==============================================
	Portfolio Section
 =============================================*/


Epsilon_Customizer::add_field(
	'rental_portfolio_single_rp',
	array(
		'type'        => 'epsilon-toggle',
		'label'       => esc_html__( 'Portfolio Recent Post Section show/hide', 'rental' ),
		'section'     => 'rental_portfolio_section',
		'default'     => false
	)
);
Epsilon_Customizer::add_field(
	'portfolio_recent_post_section_title',
	array(
		'type'              => 'epsilon-text-editor',
		'label'             => esc_html__( 'Recent Portfolio Section Title ', 'rental' ),
		'description'       => esc_html__( 'Use "< span>Tag< /span>" for color with italic', 'rental' ),
		'section'           => 'rental_portfolio_section',
		'default'           => wp_kses_post('Check <span>Recent</span> Work')
	)
);
Epsilon_Customizer::add_field(
	'portfolio_recent_post_section_subtitle',
	array(
		'type'              => 'text',
		'label'             => esc_html__( 'Section Sub Title', 'rental' ),
		'section'           => 'rental_portfolio_section',
		'sanitize_callback' => 'sanitize_text_field',
		'default'           => __('She\'d earth that midst void creeping him above seas.', 'rental')
	)
);
Epsilon_Customizer::add_field(
	'portfolio_recent_post_number',
	array(
		'type'              => 'number',
		'label'             => esc_html__( 'Recent Portfolio Number', 'rental' ),
		'section'           => 'rental_portfolio_section',
		'sanitize_callback' => 'sanitize_text_field',
		'default'           => absint('3')
	)
);


/***********************************
 * 404 Page Section Fields
 ***********************************/

// 404 text #1 field
Epsilon_Customizer::add_field(
    'rental_fof_titleone',
    array(
        'type'              => 'text',
        'label'             => esc_html__( '404 Text #1', 'rental' ),
        'section'           => 'rental_fof_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => 'Say Hello.'
    )
);
// 404 text #2 field
Epsilon_Customizer::add_field(
    'rental_fof_titletwo',
    array(
        'type'              => 'text',
        'label'             => esc_html__( '404 Text #2', 'rental' ),
        'section'           => 'rental_fof_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => 'Say Hello.'
    )
);
// 404 text #1 color field
Epsilon_Customizer::add_field(
    'rental_fof_textone_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( '404 Text #1 Color', 'rental' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'rental_fof_section',
        'default'     => '#000000',
    )
);
// 404 text #2 color field
Epsilon_Customizer::add_field(
    'rental_fof_texttwo_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( '404 Text #2 Color', 'rental' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'rental_fof_section',
        'default'     => '#656565',
    )
);
// 404 background color field
Epsilon_Customizer::add_field(
    'rental_fof_bg_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( '404 Page Background Color', 'rental' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'rental_fof_section',
        'default'     => '#fff',
    )
);

/***********************************
 * Footer Section Fields
 ***********************************/

// Footer widget toggle field
Epsilon_Customizer::add_field(
    'rental_footer_widget_toggle',
    array(
        'type'        => 'epsilon-toggle',
        'label'       => esc_html__( 'Footer widget show/hide', 'rental' ),
        'description' => esc_html__( 'Toggle to display footer widgets.', 'rental' ),
        'section'     => 'rental_footer_section',
        'default'     => false,
    )
);


Epsilon_Customizer::add_field(
	'social_pro_separator',
	array(
		'type'        => 'epsilon-separator',
		'label'       => esc_html__( 'Social Profile', 'rental' ),
		'section'     => 'rental_footer_section',

	)
);
// Social Profile Show/Hide
Epsilon_Customizer::add_field(
	'rental_social_profile_toggle',
	array(
		'type'        => 'epsilon-toggle',
		'label'       => esc_html__( 'Social Profile Show/Hide', 'rental' ),
		'section'     => 'rental_footer_section',
		'default'     => false,
	)
);

//Social Profile links
Epsilon_Customizer::add_field(
	'rental_footer_social',
	array(
		'type'         => 'epsilon-repeater',
		'section'      => 'rental_footer_section',
		'label'        => esc_html__( 'Social Profile Links', 'rental' ),
		'button_label' => esc_html__( 'Add new social link', 'rental' ),
		'row_label'    => array(
			'type'  => 'field',
			'field' => 'social_link_title',
		),
		'fields'       => array(
			'social_link_title'       => array(
				'label'             => esc_html__( 'Title', 'rental' ),
				'type'              => 'text',
				'sanitize_callback' => 'wp_kses_post',
				'default'           => 'Twitter',
			),
			'social_url' => array(
				'label'             => esc_html__( 'Social URL', 'rental' ),
				'type'              => 'text',
				'sanitize_callback' => 'sanitize_text_field',
				'default'           => 'https://twitter.com',
			),
			'social_icon'        => array(
				'label'   => esc_html__( 'Icon', 'rental' ),
				'type'    => 'epsilon-icon-picker',
				'default' => 'fa fa-twitter',
			),

		),
	)
);


// Copy right text
$url = 'https://colorlib.com/';
$copyText = sprintf( __( 'Theme by %s colorlib %s Copyright &copy; %s  |  All rights reserved.', 'rental' ), '<a target="_blank" href="' . esc_url( $url ) . '">', '</a>', date( 'Y' ) );
Epsilon_Customizer::add_field(
    'rental_footer_copyright_text',
    array(
        'type'        => 'epsilon-text-editor',
        'label'       => esc_html__( 'Footer copyright text', 'rental' ),
        'section'     => 'rental_footer_section',
        'default'     => wp_kses_post( $copyText ),
    )
);

// Footer widget background color field
Epsilon_Customizer::add_field(
    'rental_footer_widget_bdcolor',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Background Color', 'rental' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'rental_footer_section',
        'default'     => '#19191b',
    )
);

// Footer widget text color field
Epsilon_Customizer::add_field(
    'rental_footer_widget_textcolor',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Text Color', 'rental' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'rental_footer_section',
        'default'     => '#888888',
    )
);

// Footer widget title color field
Epsilon_Customizer::add_field(
    'rental_footer_widget_titlecolor',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Widget Title Color', 'rental' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'rental_footer_section',
        'default'     => '#FFFFFF',
    )
);

// Footer widget anchor color field
Epsilon_Customizer::add_field(
    'rental_footer_widget_anchorcolor',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Anchor Color', 'rental' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'rental_footer_section',
        'default'     => '#888888',
    )
);

// Footer widget anchor hover color field
Epsilon_Customizer::add_field(
    'rental_footer_widget_anchorhovcolor',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Anchor Hover Color', 'rental' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'rental_footer_section',
        'default'     => '',
    )
);



