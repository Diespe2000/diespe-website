<?php
/**
 * Projectkaart.
 *
 * @package Diespe
 */

$terms = get_the_term_list( get_the_ID(), 'diespe_projecttype', '', ', ' );

$cat_slugs = wp_get_post_terms( get_the_ID(), 'diespe_projecttype', array( 'fields' => 'slugs' ) );
$cat_slug  = $cat_slugs ? $cat_slugs[0] : '';

$kleuren = array(
	'watersysteem'        => '#2b97d9',
	'energietransitie'    => '#ff8000',
	'waterketen'          => '#41d92c',
	'waterveiligheid'     => '#001f99',
	'gebiedsontwikkeling' => '#84db2d',
	'natuurherstel'       => '#84db2d',
);
$kleur = isset( $kleuren[ $cat_slug ] ) ? $kleuren[ $cat_slug ] : '#84db2d';

$iconen = array(
	'watersysteem'        => 'druppel',
	'energietransitie'    => 'bliksem',
	'waterketen'          => 'keten',
	'waterveiligheid'     => 'golven',
	'gebiedsontwikkeling' => 'gebouw',
	'natuurherstel'       => 'natuur',
);
$icoon = isset( $iconen[ $cat_slug ] ) ? $iconen[ $cat_slug ] : 'gebouw';

$fallback = '';
foreach ( array( $cat_slug, 'gebiedsontwikkeling' ) as $slug ) {
	if ( $slug && file_exists( get_template_directory() . '/assets/img/projecten/' . $slug . '.png' ) ) {
		$fallback = get_template_directory_uri() . '/assets/img/projecten/' . $slug . '.png';
		break;
	}
}
$onderwerp = get_post_meta( get_the_ID(), 'diespe_placeholder', true );
if ( $onderwerp ) {
	$bestand = get_template_directory() . '/assets/img/projecten/placeholders/' . sanitize_key( $onderwerp ) . '.png';
	if ( file_exists( $bestand ) ) {
		$fallback = get_template_directory_uri() . '/assets/img/projecten/placeholders/' . sanitize_key( $onderwerp ) . '.png';
	}
}

$thumb_id = get_post_thumbnail_id();
$geldige_thumb = false;
if ( $thumb_id ) {
	$geldige_thumb = (bool) wp_get_attachment_url( $thumb_id );
}
?>
<article class="project-card" style="border-top:4px solid <?php echo esc_attr( $kleur ); ?>;">
	<?php if ( $geldige_thumb ) : ?>
		<a class="project-thumb" href="<?php the_permalink(); ?>" tabindex="-1" aria-hidden="true">
			<?php the_post_thumbnail( 'large' ); ?>
		</a>
	<?php elseif ( $fallback ) : ?>
		<a class="project-thumb" href="<?php the_permalink(); ?>" tabindex="-1" aria-hidden="true">
			<img src="<?php echo esc_url( $fallback ); ?>" alt="" loading="lazy">
		</a>
	<?php endif; ?>
	<div class="project-body">
		<div class="card-header">
			<span class="card-icon" style="background:<?php echo esc_attr( $kleur ); ?>;" aria-hidden="true"><img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/iconen/' . $icoon . '.svg' ); ?>" alt=""></span>
			<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
		</div>
		<p class="project-meta" style="color:<?php echo esc_attr( $kleur ); ?>;"><?php echo wp_kses_post( $terms ); ?></p>
		<p><?php echo esc_html( get_the_excerpt() ); ?></p>
		<a class="btn card-more" style="background:<?php echo esc_attr( $kleur ); ?>; border-color:<?php echo esc_attr( $kleur ); ?>; color:#fff;" href="<?php the_permalink(); ?>"><?php esc_html_e( 'Bekijk het project', 'diespe' ); ?></a>
	</div>
</article>
