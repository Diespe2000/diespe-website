<?php
/**
 * Projectenarchief.
 *
 * @package Diespe
 */

get_header();
?>
<div class="container section">
	<header class="entry-header">
		<h1><?php esc_html_e( 'Projecten', 'diespe' ); ?></h1>
		<p class="section-intro" style="margin-bottom:0;"><?php esc_html_e( 'Een selectie van de opgaven waaraan wij werken.', 'diespe' ); ?></p>
	</header>

	<?php if ( have_posts() ) : ?>
		<div class="project-grid" style="margin-top:36px;">
			<?php
			while ( have_posts() ) :
				the_post();
				get_template_part( 'template-parts/project', 'card' );
			endwhile;
			?>
		</div>
		<div class="pagination">
			<?php the_posts_pagination( array( 'mid_size' => 1 ) ); ?>
		</div>
	<?php else : ?>
		<p><?php esc_html_e( 'Nog geen projecten gepubliceerd.', 'diespe' ); ?></p>
	<?php endif; ?>
</div>
<?php
get_footer();
