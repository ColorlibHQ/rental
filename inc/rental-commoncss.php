<?php
// Block direct access
if( !defined( 'ABSPATH' ) ){
    exit( 'Direct script access denied.' );
} 
/**
 * @Packge     : Rental
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */
 
 
// enqueue css
function rental_common_custom_css(){
    
    wp_enqueue_style( 'rental-common', get_template_directory_uri().'/assets/css/dynamic.css' );
		$header_bg         		  = esc_url( get_header_image() );
		$header_bg_img 			  = !empty( $header_bg ) ? 'background-image: url('.esc_url( $header_bg ).')' : '';

		$themeColor     		  = rental_opt( 'rental_theme_color', '#cfb579' );

		$headerBg          		  = rental_opt( 'rental_header_bg_color' );
		$menuColor          	  = rental_opt( 'rental_header_menu_color', '#14303a' );
		$menuHoverColor           = rental_opt( 'rental_header_menu_hover_color' );

		$dropMenuBgColor          = rental_opt( 'rental_header_menu_dropbg_color' );
		$dropMenuColor            = rental_opt( 'rental_header_drop_menu_color' );
		$dropMenuHovColor         = rental_opt( 'rental_header_drop_menu_hover_color' );
		$dropMenuHovItemBg        = rental_opt( 'rental_drop_menu_item_hover_bg' );


		$footerwbgColor     	  = rental_opt('rental_footer_widget_bdcolor');
		$footerwTextColor   	  = rental_opt('rental_footer_widget_textcolor');
		$footerwanchorcolor 	  = rental_opt('rental_footer_widget_anchorcolor');
		$footerwanchorhovcolor    = rental_opt('rental_footer_widget_anchorhovcolor');
		$widgettitlecolor  		  = rental_opt('rental_footer_widget_titlecolor');


		$fofbg  	  		  = rental_opt('rental_fof_bg_color');
		$foftonecolor  	  	  = rental_opt('rental_fof_textone_color');
		$fofttwocolor  	  	  = rental_opt('rental_fof_texttwo_color');


		$customcss ="
			.blog_bg{
				{$header_bg_img}
			}
			.main_menu{
				background-color: {$headerBg}
			}

			
			a:hover,
			.main_menu .navbar .main-menu-item .navbar-nav > li > a:hover,
			.main_menu .navbar .main-menu-item .navbar-nav > li.active > a,
			.dropdown .dropdown-menu .dropdown-item:hover,
			.home_banner_area .banner_inner .banner_content h1 .basecolor,
			.banner_area .banner_inner .banner_content .page_link a:hover,
			.banner-breadcrumb .breadcrumb-item a:hover,
			.single-blog .short_details a:hover,
			.single-blog .meta-top a:hover,
			.blog_details h2.p_title:hover,
			.l_blog_item .l_blog_text h4:hover,
			.blog_details a:hover,
			.blog_right_sidebar .post_category_widget .cat-list li:hover a,
			.blog_right_sidebar .widget_rental_recent_widget .post_item .media-body a:hover,
			.single-post-area .navigation-top .social-icons li:hover i,
			.single-post-area .navigation-top .social-icons li:hover span,
			.single-post-area .blog-author a:hover,
			.contact-info .media-body h3 a:hover,
			.wpcf7-form label,
			.modal-message .modal-dialog .modal-content .modal-header h2,
			.sample-text-area p b,
			.sample-text-area p i,
			.sample-text-area p sup,
			.sample-text-area p sub,
			.sample-text-area p del,
			.sample-text-area p u,
			.navigation-area .detials h4:hover,
			.link-border,
			.footer_part .footer_icon li a :hover,
			.footer_part .single_footer_part ul li a:hover,
			.main_btn:hover,
			.submit_btn:hover,
			.black_btn,
			.team_item .team_img .hover a:hover,
			.team_item:hover .team_name h4,
			.portfolio_area .filters ul li:hover,
			.portfolio_area .filters ul li.active,
			.portfolio_details_inner .portfolio_right_text .list li i,
			.service-area .single-service:hover .service-icon,
			.area-heading h3 span,
			.copy-right-text i,
			.copy-right-text a,
			.footer-social a:hover i,
			.footer-text a,
			.footer-text i,
			.blog_right_sidebar .widget_rental_recent_widget .post_item .media-body h3:hover,
			.blog_right_sidebar .widget_categories ul li a:hover, 
			.blog_right_sidebar .widget_rss ul li:hover a, 
			.blog_right_sidebar .widget_recent_entries ul li:hover a, 
			.blog_right_sidebar .widget_recent_comments ul li:hover a, 
			.blog_right_sidebar .widget_archive ul li:hover a, 
			.blog_right_sidebar .widget_meta ul li:hover a,
			.team_part .team_member_text ul li span,
			.passion_part .single_passion:hover .single_passion_item .passion_icon i,
			.apartment_part .view_more_btn a:hover,
			.apartment_part .single_appartment_content h4:hover,
			.apartment_part .single_appartment_content p,
			.room_part .container-fluid .room_1 .room_text_1 .btn_2:hover,
			.blog_part .right_single_blog .single_blog .media-body p a,
			.blog_part .single_blog .single_appartment_content p a,
			.room_part .container-fluid .room_2 .room_text_2 .btn_2:hover,
			.banner_part .banner_social_icon a:hover,
			.banner_part .banner_social_icon i,
			.footer_part .copyright_text p a,
			.apartment_part .single_appartment_content .list-unstyled li:hover span,
			.apartment_part .single_appartment_content .list-unstyled li:hover			
			{
				color: {$themeColor}
			}			

			.header_area .navbar .nav > .nav-item.submenu > ul > .nav-item:hover > .nav-link,
			.header_area .navbar .nav > .nav-item:before,
			.search-inner,
			.card-priceTable:hover .main_btn,
			.home_banner_area .social_area .round,
			.causes_slider .owl-dots .owl-dot.active,
			.blog_item_img .blog_item_date,
			.blog_right_sidebar .tag_cloud_widget ul li a:hover,
			.blog-pagination .page-link:hover,
			.card-priceTable:hover .main_btn,
			.link-border:before,
			.main_btn2:hover,
			.submit_btn,
			.white_bg_btn:hover,
			.black_btn:hover,
			.button,
			.btn_1,
			.button-header,
			.button-contactForm,
			.testimonial .owl-dot.active,
			.portfolio_area .filters ul li:before,
			.about-area .about-content .main_btn,
			.single-footer-widget .click-btn,
			.single_sidebar_widget .tagcloud a:hover,
			.footer_part .single_footer_part .mail_part .email_icon,
			.banner_part .video_popup span,
			.team_part .team_member_text h2:after,
			.section_tittle h1:after,
			.btn_2:after,
			.apartment_part .single_appartment_part:hover .love_us .ti-heart,
			.review_part .owl-dots .owl-dot.active,
			.cta_part .cta_btn:hover
			{
				background: {$themeColor}
			}

			.card-priceTable:hover .main_btn,
			.single-post-area .quotes,
			.card-priceTable:hover .main_btn,
			.link-border,
			.main_btn2:hover,
			.submit_btn,
			.white_bg_btn:hover,
			.button,
			.btn_1,
			.button-header,
			.button-contactForm,
			.testimonial .owl-dot.active,
			.about-area .about-content .main_btn,
			.single-footer-widget input:focus,
			blockquote p,
			.cta_part .cta_btn:hover
			{
				border-color: {$themeColor}
			}
			
		
			
			.main_menu .navbar .main-menu-item .navbar-nav > li > a {
			   color: {$menuColor};
			}
			.main_menu .navbar .main-menu-item .navbar-nav > li > a:hover{
			   color: {$menuHoverColor};
			}
			.dropdown .dropdown-menu {
			   background: {$dropMenuBgColor};
			}
			.dropdown .dropdown-menu .dropdown-item {
			   color: {$dropMenuColor};
			}
			
			.main_menu .navbar .main-menu-item .navbar-nav > li > .dropdown-menu li a:hover{
				background: {$dropMenuHovItemBg};
				color: {$dropMenuHovColor}
			}

			.footer-area {
				background-color: {$footerwbgColor};
			}
			footer.footer-area p{
				color: {$footerwTextColor}
			}
			.footer-area h6 {
				color: {$widgettitlecolor}
			}
			footer a,
			.single-footer-widget ul li a{
			   color: {$footerwanchorcolor};
			}
			footer a:hover,
			.single-footer-widget ul li:hover a{
			   color: {$footerwanchorhovcolor};
			}
			#f0f {
			   background-color: {$fofbg};
			}
			.f0f-content .h1 {
			   color: {$foftonecolor};
			}
			.f0f-content p {
			   color: {$fofttwocolor};
			}

        ";
       
    wp_add_inline_style( 'rental-common', $customcss );
    
}
add_action( 'wp_enqueue_scripts', 'rental_common_custom_css', 50 );