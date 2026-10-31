<?php
/**
 * Projectenarchief: filterbare flip-tegels.
 *
 * @package Diespe
 */

get_header();

$cats = get_terms( array(
	'taxonomy'   => 'diespe_projecttype',
	'hide_empty' => true,
) );
?>
<div class="container section">
	<header class="entry-header">
		<h1><?php esc_html_e( 'Projecten', 'diespe' ); ?></h1>
		<p class="section-intro" style="margin-bottom:0;"><?php esc_html_e( 'Op deze pagina een selectie van de projecten waaraan DIESPE heeft bijgedragen — van watersysteem- en energieprojecten tot waterveiligheid en gebiedsontwikkeling. Klik op een tegel voor meer informatie.', 'diespe' ); ?></p>
	</header>

	<?php if ( $cats && ! is_wp_error( $cats ) ) : ?>
		<div class="project-filters">
			<button class="filter-btn is-active" data-filter="all"><?php esc_html_e( 'Alle', 'diespe' ); ?></button>
			<?php foreach ( $cats as $cat ) : ?>
				<button class="filter-btn" data-filter="<?php echo esc_attr( $cat->slug ); ?>"><?php echo esc_html( $cat->name ); ?> (<?php echo (int) $cat->count; ?>)</button>
			<?php endforeach; ?>
		</div>
	<?php endif; ?>

	<?php if ( have_posts() ) : ?>
		<div class="tile-grid">
			<?php
			while ( have_posts() ) :
				the_post();
				get_template_part( 'template-parts/project', 'tile' );
			endwhile;
			?>
		</div>
		<p class="tile-hint"><?php esc_html_e( 'Klik op een tegel om deze om te draaien en de projectgegevens te bekijken.', 'diespe' ); ?></p>
		<div class="pagination">
			<?php the_posts_pagination( array( 'mid_size' => 1 ) ); ?>
		</div>
	<?php else : ?>
		<p><?php esc_html_e( 'Nog geen projecten gepubliceerd.', 'diespe' ); ?></p>
	<?php endif; ?>
</div>
<?php
get_footer();
