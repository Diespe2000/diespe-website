<?php
/**
 * Generiek archief (blog / categorie).
 *
 * @package Diespe
 */

get_header();
?>
<div class="container section">
	<header class="entry-header">
		<h1>
			<?php
			if ( is_home() && ! is_front_page() ) {
				esc_html_e( 'Nieuws', 'diespe' );
			} elseif ( is_archive() ) {
				the_archive_title();
			} elseif ( is_search() ) {
				printf( esc_html__( 'Zoekresultaten voor: %s', 'diespe' ), '<span>' . get_search_query() . '</span>' );
			}
			?>
		</h1>
	</header>

	<?php if ( have_posts() ) : ?>
		<?php
		while ( have_posts() ) :
			the_post();
			get_template_part( 'template-parts/post', 'card' );
		endwhile;
		?>
		<div class="pagination">
			<?php the_posts_pagination( array( 'mid_size' => 1 ) ); ?>
		</div>
	<?php else : ?>
		<p><?php esc_html_e( 'Geen resultaten gevonden.', 'diespe' ); ?></p>
		<?php get_search_form(); ?>
	<?php endif; ?>
</div>
<?php
get_footer();
