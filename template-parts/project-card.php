<?php
/**
 * Projectkaart.
 *
 * @package Diespe
 */

$terms = get_the_term_list( get_the_ID(), 'diespe_projecttype', '', ', ' );

$cat_slugs = wp_get_post_terms( get_the_ID(), 'diespe_projecttype', array( 'fields' => 'slugs' ) );
$cat_slug = $cat_slugs ? $cat_slugs[0] : '';
$fallback = '';
foreach ( array( $cat_slug, 'gebiedsontwikkeling' ) as $slug ) {
	if ( $slug && file_exists( get_template_directory() . '/assets/img/projecten/' . $slug . '.png' ) ) {
		$fallback = get_template_directory_uri() . '/assets/img/projecten/' . $slug . '.png';
		break;
	}
}
?>
<article <?php post_class( 'project-card' ); ?>>
	<?php if ( has_post_thumbnail() ) : ?>
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
