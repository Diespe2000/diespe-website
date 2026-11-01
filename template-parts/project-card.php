<?php
/**
 * Projectkaart.
 *
 * @package Diespe
 */

$terms = get_the_term_list( get_the_ID(), 'diespe_projecttype', '', ', ' );

$cat_slugs = wp_get_post_terms( get_the_ID(), 'diespe_projecttype', array( 'fields' => 'slugs' ) );
$cat_slug  = $cat_slugs ? $cat_slugs[0] : '';

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

$thumb_id  = get_post_thumbnail_id();
$thumb_src = $thumb_id ? wp_get_attachment_image_src( $thumb_id, 'large' ) : false;
$heeft_img = $thumb_src && ! empty( $thumb_src[0] ) && ! str_contains( $thumb_src[0], '/uploads/' ) === false ? $thumb_src[0] : ( $thumb_src ? $thumb_src[0] : '' );
// simpeler: geldige src = attachment-bestand bestaat
$geldige_thumb = false;
if ( $thumb_id ) {
	$att = get_post( $thumb_id );
	$geldige_thumb = $att && wp_get_attachment_url( $thumb_id );
}
?>
<article <?php post_class( 'project-card' ); ?>>
	<?php if ( $geldige_thumb ) : ?>
		<a class="project-thumb" href="<?php the_permalink(); ?>" tabindex="-1" aria-hidden="true">
			<?php the_post_thumbnail( 'large' ); ?>
		</a>
	<?php elseif ( $fallback ) : ?>
		<a class="project-thumb" href="<?php the_permalink(); ?>" tabindex="-1" aria-hidden="true">
			<img src="<?php echo esc_url( $fallback ); ?>" alt="<?php echo esc_attr( wp_strip_all_tags( $terms ) ); ?>" loading="lazy">
		</a>
	<?php endif; ?>
	<div class="project-body">
		<?php if ( $terms ) : ?>
			<p class="project-meta"><?php echo wp_kses_post( $terms ); ?></p>
		<?php endif; ?>
		<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
		<p><?php echo esc_html( get_the_excerpt() ); ?></p>
	</div>
</article>
