<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <!-- For Resposive Device -->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>

    <!--  class for Home page  "home_menu"-->
    <?php
    $headerClass = is_page_template('template-builder.php') && is_front_page() ? 'home_menu' : '';
    ?>

    <header class="main_menu <?php echo $headerClass; ?>">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
	                    <?php echo rental_theme_logo( 'navbar-brand logo_h' ); ?>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <?php
                        if(has_nav_menu('primary-menu')) {
                            wp_nav_menu(array(
                                'menu'           => 'primary-menu',
                                'theme_location' => 'primary-menu',
                                'menu_id'        => 'menu-main-menu',
                                'container_class'=> 'collapse navbar-collapse main-menu-item',
                                'container_id'   => 'navbarNav',
                                'menu_class'     => 'navbar-nav',
                                'walker'         => new rental_bootstrap_navwalker,
                                'depth'          => 3
                            ));
                        }

                        if( !empty( rental_opt( 'rental_header_c2a_label' ) ) ){ ?>
                            <div class="btn_1 d-none d-lg-block">
                                <?php echo '<a href="'. esc_url( rental_opt( 'rental_header_c2a_url' ) ) .'" class="float-right">'. esc_html( rental_opt( 'rental_header_c2a_label' ) ) .'</a>'; ?>
                            </div>
                            <?php
                        }
                        ?>
                    </nav>
                </div>
            </div>
        </div>
    </header>

    <?php
    //Page Title Bar
    if( function_exists( 'rental_page_titlebar' ) ){
	    rental_page_titlebar();
    }

