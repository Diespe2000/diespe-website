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
				<?php echo esc_html( $addr ); ?><br><?php echo esc_html( $postal ); ?></p>
			<?php endif; ?>
			<?php if ( $phone ) : ?>
				<p><strong><?php esc_html_e( 'Telefoon', 'diespe' ); ?></strong><br>
				<a href="tel:<?php echo esc_attr( preg_replace( '/\s+/', '', $phone ) ); ?>"><?php echo esc_html( $phone ); ?></a></p>
			<?php endif; ?>
			<?php if ( $email ) : ?>
				<p><strong><?php esc_html_e( 'E-mail', 'diespe' ); ?></strong><br>
				<a href="mailto:<?php echo esc_attr( antispambot( $email ) ); ?>"><?php echo esc_html( antispambot( $email ) ); ?></a></p>
			<?php endif; ?>
		</div>

		<div>
			<?php
			while ( have_posts() ) :
				the_post();
				?>
				<div class="entry-content">
					<?php the_content(); ?>
				</div>
			<?php endwhile; ?>
		</div>
	</div>
</div>
<?php
get_footer();
