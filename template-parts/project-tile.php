<?php
/**
 * Project-tegel (flip) voor het projectenoverzicht.
 * Ondersteunt meerdere categorieën per project.
 *
 * @package Diespe
 */

$cats     = wp_get_post_terms( get_the_ID(), 'diespe_projecttype' );
$slugs    = wp_get_post_terms( get_the_ID(), 'diespe_projecttype', array( 'fields' => 'slugs' ) );

$kleuren = array(
	'watersysteem'        => '#2b97d9',
	'energietransitie'    => '#ff8000',
	'waterketen'          => '#41d92c',
	'waterveiligheid'     => '#001f99',
	'gebiedsontwikkeling' => '#84db2d',
	'natuurherstel'       => '#84db2d',
);
$kleur = $cats && isset( $kleuren[ $slugs[0] ] ) ? $kleuren[ $slugs[0] ] : '#84db2d';

$fallback = '';
foreach ( array_merge( $slugs, array( 'gebiedsontwikkeling' ) ) as $slug ) {
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
?>
<div class="flip-tile" data-cats="<?php echo esc_attr( implode( ' ', $slugs ) ); ?>">
	<div class="flip-inner">
		<div class="flip-face flip-front" style="border-top-color:<?php echo esc_attr( $kleur ); ?>">
			<?php if ( has_post_thumbnail() ) : ?>
				<?php the_post_thumbnail( 'large', array( 'loading' => 'lazy' ) ); ?>
			<?php elseif ( $fallback ) : ?>
				<img src="<?php echo esc_url( $fallback ); ?>" alt="" loading="lazy">
			<?php endif; ?>
			<div class="tile-label">
				<span class="tile-cats">
					<?php foreach ( $cats as $index => $cat ) : ?>
						<span class="tile-cat" style="color:<?php echo esc_attr( isset( $kleuren[ $cat->slug ] ) ? $kleuren[ $cat->slug ] : '#84db2d' ); ?>"><?php echo esc_html( $cat->name ); ?></span><?php echo $index < count( $cats ) - 1 ? ' &middot; ' : ''; ?>
					<?php endforeach; ?>
				</span>
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
