<?php
/**
 * Contactpagina.
 *
 * @package Diespe
 */

get_header();

$phone  = get_theme_mod( 'diespe_phone', '+31 653 14 23 95' );
$email  = get_theme_mod( 'diespe_email', '' );
$addr   = get_theme_mod( 'diespe_address', 'Mercurius 19' );
$postal = get_theme_mod( 'diespe_postal', '7131 HS Lichtenvoorde' );
?>
<div class="container section">
	<header class="entry-header">
		<h1><?php esc_html_e( 'Contact', 'diespe' ); ?></h1>
	</header>

	<div class="contact-grid">
		<div class="contact-details">
			<h2><?php esc_html_e( 'DIESPE Omgevingsprojecten', 'diespe' ); ?></h2>
			<p><?php esc_html_e( 'Partner in duurzame omgevingsprojecten', 'diespe' ); ?></p>
			<?php if ( $addr || $postal ) : ?>
				<p><strong><?php esc_html_e( 'Bezoekadres', 'diespe' ); ?></strong><br>
				<?php echo esc_html( $addr ); ?><br><?php echo esc_html( $postal ); ?><br><?php esc_html_e( 'Nederland', 'diespe' ); ?></p>
			<?php endif; ?>
			<?php if ( $phone ) : ?>
				<p><strong><?php esc_html_e( 'Telefoon', 'diespe' ); ?></strong><br>
				<a href="tel:<?php echo esc_attr( preg_replace( '/\s+/', '', $phone ) ); ?>"><?php echo esc_html( $phone ); ?></a></p>
			<?php endif; ?>
			<?php if ( $email ) : ?>
				<p><strong><?php esc_html_e( 'E-mail', 'diespe' ); ?></strong><br>
				<a href="mailto:<?php echo esc_attr( antispambot( $email ) ); ?>"><?php echo esc_html( antispambot( $email ) ); ?></a></p>
			<?php endif; ?>
			<?php $kvk = get_theme_mod( 'diespe_kvk', '94509832' ); ?>
			<?php if ( $kvk ) : ?>
				<p><strong><?php esc_html_e( 'KvK', 'diespe' ); ?></strong><br><?php echo esc_html( $kvk ); ?></p>
			<?php endif; ?>
				<p class="lid-van"><?php esc_html_e( 'Lid van:', 'diespe' ); ?> <strong><a href="https://www.waternetwerk.nl" target="_blank" rel="noopener" style="color:inherit;"><?php esc_html_e( 'KNW — Koninklijk Waternetwerk', 'diespe' ); ?></a></strong></p>
				<p class="lid-van"><?php esc_html_e( 'We voeren onze diensten en werkzaamheden uit volgens', 'diespe' ); ?> <a href="https://www.dgmr.nl/regelgeving/dnr-2011/" target="_blank" rel="noopener" style="color:inherit;"><?php esc_html_e( 'De Nieuwe Regeling 2011 (DNR 2011)', 'diespe' ); ?></a>, <?php esc_html_e( 'herziening juli 2013', 'diespe' ); ?>.</p>
		</div>

		<div>
			<h2><?php esc_html_e( 'Stuur een bericht', 'diespe' ); ?></h2>
			<?php
			while ( have_posts() ) :
				the_post();
				?>
				<div class="entry-content">
					<?php the_content(); ?>
				</div>
				<?php endwhile; ?>
			<?php
			if ( defined( 'WPCF7_VERSION' ) ) {
				$cf7_posts = get_posts( array(
					'post_type'      => 'wpcf7_contact_form',
					'posts_per_page' => 1,
					'orderby'        => 'ID',
					'order'          => 'ASC',
				) );
				if ( $cf7_posts ) {
						echo do_shortcode( '[contact-form-7 id="' . $cf7_posts[0]->ID . '"]' );
				} else {
					echo '<p>' . esc_html__( 'Maak eerst een formulier aan via Contact → Contactformulieren.', 'diespe' ) . '</p>';
				}
			} else {
				echo do_shortcode( '[diespe_contactformulier]' );
			}
			?>
		</div>
	</div>
</div>
<?php
get_footer();
