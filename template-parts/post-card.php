<?php
/**
 * Berichtkaart.
 *
 * @package Diespe
 */
?>
<article <?php post_class( 'post-card' ); ?>>
	<div class="post-date" aria-hidden="true">
		<span class="day"><?php echo esc_html( get_the_date( 'd' ) ); ?></span>
		<span class="month"><?php echo esc_html( get_the_date( 'M' ) ); ?></span>
	</div>
	<div>
		<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
		<p><?php echo esc_html( get_the_excerpt() ); ?></p>
	</div>
</article>
