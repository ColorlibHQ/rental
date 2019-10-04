<?php 
/**
 * @Packge 	   : Colorlib
 * @Version    : 1.0
 * @Author 	   : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */
 
	// Block direct access
	if( !defined( 'ABSPATH' ) ){
		exit( 'Direct script access denied.' );
	}

	/**
	 *
	 * Define constant
	 *
	 */
	
	 
	// Base URI
	if( !defined( 'RENTAL_DIR_URI' ) )
		define( 'RENTAL_DIR_URI', get_template_directory_uri().'/' );
	
	// assets URI
	if( !defined( 'RENTAL_DIR_ASSETS_URI' ) )
		define( 'RENTAL_DIR_ASSETS_URI', RENTAL_DIR_URI.'assets/' );
	
	// Css File URI
	if( !defined( 'RENTAL_DIR_CSS_URI' ) )
		define( 'RENTAL_DIR_CSS_URI', RENTAL_DIR_ASSETS_URI .'css/' );
	
	// Js File URI
	if( !defined( 'RENTAL_DIR_JS_URI' ) )
		define( 'RENTAL_DIR_JS_URI', RENTAL_DIR_ASSETS_URI .'js/' );
	
	// Icon Images
	if( !defined('RENTAL_DIR_ICON_IMG_URI') )
		define( 'RENTAL_DIR_ICON_IMG_URI', RENTAL_DIR_URI.'img/core-img/' );
	
	//DIR inc
	if( !defined( 'RENTAL_DIR_INC' ) )
		define( 'RENTAL_DIR_INC', RENTAL_DIR_URI.'inc/' );

	//Elementor Widgets Folder Directory
	if( !defined( 'RENTAL_DIR_ELEMENTOR' ) )
		define( 'RENTAL_DIR_ELEMENTOR', RENTAL_DIR_INC.'elementor-widgets/' );

	// Base Directory
	if( !defined( 'RENTAL_DIR_PATH' ) )
		define( 'RENTAL_DIR_PATH', get_parent_theme_file_path().'/' );
	
	//Inc Folder Directory
	if( !defined( 'RENTAL_DIR_PATH_INC' ) )
		define( 'RENTAL_DIR_PATH_INC', RENTAL_DIR_PATH.'inc/' );
	
	//Colorlib framework Folder Directory
	if( !defined( 'RENTAL_DIR_PATH_LIB' ) )
		define( 'RENTAL_DIR_PATH_LIB', RENTAL_DIR_PATH_INC.'libraries/' );
	
	//Classes Folder Directory
	if( !defined( 'RENTAL_DIR_PATH_CLASSES' ) )
		define( 'RENTAL_DIR_PATH_CLASSES', RENTAL_DIR_PATH_INC.'classes/' );

	
	//Widgets Folder Directory
	if( !defined( 'RENTAL_DIR_PATH_WIDGET' ) )
		define( 'RENTAL_DIR_PATH_WIDGET', RENTAL_DIR_PATH_INC.'widgets/' );
		
	//Elementor Widgets Folder Directory
	if( !defined( 'RENTAL_DIR_PATH_ELEMENTOR_WIDGETS' ) )
		define( 'RENTAL_DIR_PATH_ELEMENTOR_WIDGETS', RENTAL_DIR_PATH_INC.'elementor-widgets/' );
	

		
	/**
	 * Include File
	 *
	 */
	
	// Breadcrumbs file include
	require_once( RENTAL_DIR_PATH_INC . 'rental-breadcrumbs.php' );
	// Sidebar register file include
	require_once( RENTAL_DIR_PATH_INC . 'widgets/rental-widgets-reg.php' );
	// Post widget file include
	require_once( RENTAL_DIR_PATH_INC . 'widgets/rental-recent-post-thumb.php' );
	// News letter widget file include
	require_once( RENTAL_DIR_PATH_INC . 'widgets/rental-newsletter-widget.php' );
	//Social Links
	require_once( RENTAL_DIR_PATH_INC . 'widgets/rental-social-links.php' );
	// Instagram Widget
	require_once( RENTAL_DIR_PATH_INC . 'widgets/rental-instagram.php' );
	// Nav walker file include
	require_once( RENTAL_DIR_PATH_INC . 'wp_bootstrap_navwalker.php' );
	// Theme function file include
	require_once( RENTAL_DIR_PATH_INC . 'rental-functions.php' );

	// Theme Demo file include
	require_once( RENTAL_DIR_PATH_INC . 'demo/demo-import.php' );

	// Inline css file include
	require_once( RENTAL_DIR_PATH_INC . 'rental-commoncss.php' );
	// Post Like
	require_once( RENTAL_DIR_PATH_INC . 'post-like.php' );
	// Theme support function file include
	require_once( RENTAL_DIR_PATH_INC . 'support-functions.php' );
	// Html helper file include
	require_once( RENTAL_DIR_PATH_INC . 'wp-html-helper.php' );
	// Pagination file include
	require_once( RENTAL_DIR_PATH_INC . 'wp_bootstrap_pagination.php' );
	// Elementor Widgets
	require_once( RENTAL_DIR_PATH_ELEMENTOR_WIDGETS . 'elementor-widget.php' );
	//
	require_once( RENTAL_DIR_PATH_CLASSES . 'Class-Enqueue.php' );
	
	require_once( RENTAL_DIR_PATH_CLASSES . 'Class-Config.php' );
	// Customizer
	require_once( RENTAL_DIR_PATH_INC . 'customizer/customizer.php' );
	// Class autoloader
	require_once( RENTAL_DIR_PATH_INC . 'class-epsilon-dashboard-autoloader.php' );
	// Class rental dashboard
	require_once( RENTAL_DIR_PATH_INC . 'class-epsilon-init-dashboard.php' );



	// Admin Enqueue Script
	function rental_admin_script(){
		wp_enqueue_style( 'rental-admin', get_template_directory_uri().'/assets/css/rental_admin.css', false, '1.0.0' );
		wp_enqueue_script( 'rental_admin', get_template_directory_uri().'/assets/js/rental_admin.js', false, '1.0.0' );
	}
	add_action( 'admin_enqueue_scripts', 'rental_admin_script' );




	/**
	 * Instantiate Rental object
	 *
	 * Inside this object:
	 * Enqueue scripts, Google font, Theme support features, Rental Dashboard .
	 *
	 */
	
	$Rental = new Rental();
	
