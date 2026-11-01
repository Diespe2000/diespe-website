<?php
/**
 * Hoofdtemplate (fallback): blogoverzicht / archieven.
 *
 * @package Diespe
 */

get_header();
?>
<div class="container section">
	<?php if ( have_posts() ) : ?>
		<header class="entry-header">
			<?php
			the_archive_title( '<h1 class="page-title">', '</h1>' );
			the_archive_description( '<p class="section-intro">', '</p>' );
			?>
		</header>
		<div class="grid-3">
			<?php
			while ( have_posts() ) :
				the_post();
				?>
				<article <?php post_class( 'card post-card' ); ?>>
					<?php if ( has_post_thumbnail() ) : ?>
						<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'large', array( 'loading' => 'lazy' ) ); ?></a>
					<?php endif; ?>
					<div class="card-body">
						<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						<p><?php echo esc_html( wp_trim_words( get_the_excerpt(), 20 ) ); ?></p>
					</div>
				</article>
				<?php
			endwhile;
			?>
		</div>
		<div class="pagination">
			<?php the_posts_pagination( array( 'mid_size' => 1 ) ); ?>
		</div>
	<?php else : ?>
		<header class="entry-header">
			<h1><?php esc_html_e( 'Niets gevonden', 'diespe' ); ?></h1>
		</header>
		<p><?php esc_html_e( 'Er zijn geen resultaten voor deze zoekopdracht.', 'diespe' ); ?></p>
		<?php get_search_form(); ?>
	<?php endif; ?>
</div>
<?php
get_footer();
