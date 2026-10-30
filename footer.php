<?php
/**
 * Footersjabloon.
 *
 * @package Diespe
 */

$phone   = get_theme_mod( 'diespe_phone', '+31 653 14 23 95' );
$address = get_theme_mod( 'diespe_address', 'Mercurius 19' );
$postal  = get_theme_mod( 'diespe_postal', '7131 HS Lichtenvoorde' );
?>
</main>

<footer class="site-footer" role="contentinfo">
	<div class="diespe-stripes" aria-hidden="true"></div>
	<div class="container">
		<div class="footer-grid">
			<div>
				<h4>DIESPE Omgevingsprojecten</h4>
				<p><?php esc_html_e( 'Partner in duurzame omgevingsprojecten. Project-, Technisch- en Omgevingsmanagement van omgevings- en energieprojecten.', 'diespe' ); ?></p>
			</div>
			<div>
				<h4><?php esc_html_e( 'Contact', 'diespe' ); ?></h4>
				<?php if ( $address || $postal ) : ?>
					<p><?php echo esc_html( $address ); ?><br><?php echo esc_html( $postal ); ?></p>
				<?php endif; ?>
				<?php if ( $phone ) : ?>
					<p><a href="tel:<?php echo esc_attr( preg_replace( '/\s+/', '', $phone ) ); ?>"><?php echo esc_html( $phone ); ?></a></p>
				<?php endif; ?>
			</div>
			<div>
				<h4><?php esc_html_e( 'Quick links', 'diespe' ); ?></h4>
				<?php
				wp_nav_menu( array(
					'theme_location' => 'footer',
					'container'      => false,
					'fallback_cb'    => false,
					'depth'          => 1,
				) );
				?>
			</div>
		</div>
		<div class="footer-bottom">
			<span>&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> DIESPE Omgevingsprojecten</span>
			<span><?php esc_html_e( 'Algemene voorwaarden: DNR 2011', 'diespe' ); ?></span>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
