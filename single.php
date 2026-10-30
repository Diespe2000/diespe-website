<?php
/**
 * Eén bericht.
 *
 * @package Diespe
 */

get_header();
while ( have_posts() ) :
	the_post();
	?>
	<div class="container section">
		<article <?php post_class(); ?>>
			<header class="entry-header">
				<p class="entry-meta"><?php echo esc_html( get_the_date() ); ?> <?php the_author(); ?></p>
				<h1><?php the_title(); ?></h1>
			</header>
			<?php if ( has_post_thumbnail() ) : ?>
				<figure class="post-thumbnail"><?php the_post_thumbnail( 'large' ); ?></figure>
			<?php endif; ?>
			<div class="entry-content page-content--center">
				<?php the_content(); ?>
			</div>
		</article>
		<div class="pagination">
			<?php
			the_post_navigation( array(
				'prev_text' => '&larr; %title',
				'next_text' => '%title &rarr;',
			) );
			?>
		</div>
	</div>
	<?php
endwhile;
get_footer();
