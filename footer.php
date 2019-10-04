<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package
 */

    $url = 'https://colorlib.com/';
    $copyText = sprintf( __( 'Theme by %s colorlib %s Copyright &copy; %s  |  All rights reserved.', 'rental' ), '<a target="_blank" href="' . esc_url( $url ) . '">', '</a>', date( 'Y' ) );
    $copyRight = !empty( rental_opt( 'rental_footer_copyright_text' ) ) ? rental_opt( 'rental_footer_copyright_text' ) : $copyText;
    $footer_class = rental_opt( 'rental_footer_widget_toggle' ) == 1 ? 'footer_part' : 'footer_part no_widget';

    $footer_social = rental_opt( 'rental_footer_social' );

    ?>

        <!--================ start footer Area =================-->

        <footer class="<?php echo esc_attr( $footer_class ) ?>">
            <div class="container">
                <?php
                if( rental_opt( 'rental_footer_widget_toggle' ) == 1 ) {
                    ?>
                    <div class="row">
                        <?php
                        // Footer Widget 1
                        if ( is_active_sidebar( 'footer-1' ) ) {
                            echo '<div class="col-sm-6 col-lg-3">';
                            dynamic_sidebar( 'footer-1' );
                            echo '</div>';
                        }

                        // Footer Widget 2
                        if ( is_active_sidebar( 'footer-2' ) ) {
                            echo '<div class="col-sm-6 col-lg-3">';
                            dynamic_sidebar( 'footer-2' );
                            echo '</div>';
                        }

                        // Footer Widget 3
                        if ( is_active_sidebar( 'footer-3' ) ) {
                            echo '<div class="col-sm-6 col-lg-3">';
                            dynamic_sidebar( 'footer-3' );
                            echo '</div>';
                        }

                        // Footer Widget 4
                        if ( is_active_sidebar( 'footer-4' ) ) {
                            echo '<div class="col-sm-6 col-lg-3">';
                            dynamic_sidebar( 'footer-4' );
                            echo '</div>';
                        }

                        ?>
                        <hr>
                    </div>
                    <hr>
                    <?php
                } ?>
                <div class="row ">
                    <div class="col-sm-6 col-lg-6">
                        <div class="copyright_text">
                            <P><?php echo wp_kses_post( $copyRight ); ?></P>
                        </div>
                    </div>
                    <?php
                    if( is_array( $footer_social ) ) {
	                    ?>
                        <div class="col-sm-6 col-lg-6">
                            <div class="footer_icon">
                                <ul class="list-unstyled">
                                    <?php
                                    foreach ( $footer_social as $social ){
                                        echo '<li><a href="'. esc_url( $social['social_url'] ) .'" class="single_social_icon"><i class="'. esc_attr( $social['social_icon'] ) .'"></i></a></li>';
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>
	                    <?php
                    } ?>
                </div>
            </div>
        </footer>

    <?php wp_footer(); ?>
    </body>
</html>