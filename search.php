<?php
/**
 * Zoekresultaten.
 *
 * @package Diespe
 */

get_header();
?>
<div class="container section">
	<header class="entry-header">
		<h1>
			<?php
			printf( esc_html__( 'Zoekresultaten voor: %s', 'diespe' ), '<span>' . get_search_query() . '</span>' );
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
		<p><?php esc_html_e( 'Geen resultaten gevonden. Probeer een andere zoekterm.', 'diespe' ); ?></p>
		<?php get_search_form(); ?>
	<?php endif; ?>
</div>
<?php
get_footer();
