<?php 
// Block direct access
if( !defined( 'ABSPATH' ) ){
	exit( 'Direct script access denied.' );
}
/**
 * @Packge 	   : Rental
 * @Version    : 1.0
 * @Author 	   : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */


?>

<div id="f0f">
	<div class="container">
		<div class="row">
			<div class="f0f-content text-center">
			<div class="f0f-content-inner">
				<?php 
				$errorText = esc_html__( 'Ooops 404 Error !', 'rental' );
				if( rental_opt( 'rental_fof_titleone' ) ){
					$errorText = rental_opt( 'rental_fof_titleone' );
				}
				//
				echo '<h1 class="h1">'.esc_html( $errorText ).'</h1>';
				

				// Wrong text block

				$wrongText = wp_kses_post( __( 'Either something went wrong or the page dosen&rsquo;t exist anymore.', 'rental' ) );

				if( rental_opt('rental_fof_titletwo') ){
					$wrongText = rental_opt('rental_fof_titletwo');
				}

				$anchor = rental_anchor_tag(
					array(
						'url' 	 => esc_url( site_url( '/' ) ),
						'text' 	 => esc_html__( 'Go To Home page', 'rental' ),
						'class'	 => 'button button-contactForm'
					)
				);

				echo rental_paragraph_tag(
					array(
						'text' 	 => esc_html( $wrongText ).' '.wp_kses_post( $anchor ),
					)
				);
				?>
			</div>
			</div>
		</div>
	</div>
</div>