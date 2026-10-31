<?php
/**
 * Eén project.
 *
 * @package Diespe
 */

get_header();
while ( have_posts() ) :
	the_post();
	?>
	<div class="container section">
		<p class="project-meta"><a href="<?php echo esc_url( get_post_type_archive_link( 'diespe_project' ) ); ?>">&larr; <?php esc_html_e( 'Alle projecten', 'diespe' ); ?></a></p>
		<article <?php post_class(); ?>>
			<header class="entry-header">
				<?php
				$terms = get_the_term_list( get_the_ID(), 'diespe_projecttype', '', ', ' );
				if ( $terms ) :
					?>
					<p class="entry-meta project-meta"><?php echo wp_kses_post( $terms ); ?></p>
				<?php endif; ?>
				<h1><?php the_title(); ?></h1>
			</header>

			<?php if ( has_post_thumbnail() ) : ?>
				<figure class="post-thumbnail"><?php the_post_thumbnail( 'large' ); ?></figure>
			<?php endif; ?>

			<div class="entry-content page-content--center">
				<?php the_content(); ?>
			</div>
		</article>
	</div>
	<?php
endwhile;
get_footer();
