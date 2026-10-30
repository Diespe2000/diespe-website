<?php
/**
 * Projectkaart.
 *
 * @package Diespe
 */

$terms = get_the_term_list( get_the_ID(), 'diespe_projecttype', '', ', ' );
?>
<article <?php post_class( 'project-card' ); ?>>
	<?php if ( has_post_thumbnail() ) : ?>
		<a class="project-thumb" href="<?php the_permalink(); ?>" tabindex="-1" aria-hidden="true">
			<?php the_post_thumbnail( 'large' ); ?>
		</a>
	<?php endif; ?>
	<div class="project-body">
		<?php if ( $terms ) : ?>
			<p class="project-meta"><?php echo wp_kses_post( $terms ); ?></p>
		<?php endif; ?>
		<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
		<p><?php echo esc_html( get_the_excerpt() ); ?></p>
		<a class="btn btn--outline" href="<?php the_permalink(); ?>"><?php esc_html_e( 'Lees meer', 'diespe' ); ?></a>
	</div>
</article>
