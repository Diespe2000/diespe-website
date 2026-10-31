<?php
/**
 * Project-tegel (flip) voor het projectenoverzicht.
 *
 * @package Diespe
 */

$cats      = wp_get_post_terms( get_the_ID(), 'diespe_projecttype' );
$cat       = $cats ? $cats[0] : null;
$cat_naam  = $cat ? $cat->name : '';
$cat_slug  = $cat ? $cat->slug : '';

$kleuren = array(
	'watersysteem'       => '#2b97d9',
	'energietransitie'   => '#ff8000',
	'waterketen'         => '#41d92c',
	'waterveiligheid'    => '#001f99',
	'gebiedsontwikkeling' => '#84db2d',
	'natuurherstel'      => '#84db2d',
);
$kleur = isset( $kleuren[ $cat_slug ] ) ? $kleuren[ $cat_slug ] : '#84db2d';

$cat_slugs = wp_get_post_terms( get_the_ID(), 'diespe_projecttype', array( 'fields' => 'slugs' ) );
$fallback = '';
foreach ( array( $cat_slug, 'gebiedsontwikkeling' ) as $slug ) {
	if ( $slug && file_exists( get_template_directory() . '/assets/img/projecten/' . $slug . '.png' ) ) {
		$fallback = get_template_directory_uri() . '/assets/img/projecten/' . $slug . '.png';
		break;
	}
}
?>
<div class="flip-tile" data-cat="<?php echo esc_attr( $cat_slug ); ?>">
	<div class="flip-inner">
		<div class="flip-face flip-front" style="border-top-color:<?php echo esc_attr( $kleur ); ?>">
			<?php if ( has_post_thumbnail() ) : ?>
				<?php the_post_thumbnail( 'large', array( 'loading' => 'lazy' ) ); ?>
			<?php elseif ( $fallback ) : ?>
				<img src="<?php echo esc_url( $fallback ); ?>" alt="<?php echo esc_attr( $cat_naam ); ?>" loading="lazy">
			<?php endif; ?>
			<div class="tile-label">
				<span class="tile-cat" style="color:<?php echo esc_attr( $kleur ); ?>"><?php echo esc_html( $cat_naam ); ?></span>
				<span class="tile-titel"><?php the_title(); ?></span>
			</div>
		</div>
		<div class="flip-face flip-back" style="border-top-color:<?php echo esc_attr( $kleur ); ?>">
			<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
			<p><?php echo esc_html( wp_trim_words( get_the_excerpt(), 22 ) ); ?></p>
			<ul class="tile-info">
				<?php
				$velden = array(
					array( 'key' => 'diespe_opdrachtgever', 'label' => __( 'Opdrachtgever', 'diespe' ) ),
					array( 'key' => 'diespe_fasen',        'label' => __( 'Projectfasen', 'diespe' ) ),
					array( 'key' => 'diespe_rol',          'label' => __( 'Rol', 'diespe' ) ),
					array( 'key' => 'diespe_contract',     'label' => __( 'Contractvorm', 'diespe' ) ),
				);
				foreach ( $velden as $veld ) {
					$waarde = get_post_meta( get_the_ID(), $veld['key'], true );
					if ( $waarde ) {
						echo '<li><strong>' . esc_html( $veld['label'] ) . ':</strong> ' . esc_html( $waarde ) . '</li>';
					}
				}
				?>
			</ul>
			<a class="btn btn--outline tile-meer" href="<?php the_permalink(); ?>"><?php esc_html_e( 'Lees meer', 'diespe' ); ?> &rarr;</a>
		</div>
	</div>
</div>
