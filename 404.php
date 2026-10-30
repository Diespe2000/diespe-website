<?php
/**
 * 404.
 *
 * @package Diespe
 */

get_header();
?>
<div class="container section" style="text-align:center;">
	<h1><?php esc_html_e( 'Pagina niet gevonden', 'diespe' ); ?></h1>
	<p><?php esc_html_e( 'De gezochte pagina bestaat niet (meer). Gebruik het menu of zoek hieronder.', 'diespe' ); ?></p>
	<?php get_search_form(); ?>
	<p style="margin-top:24px;">
		<a class="btn" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Naar de homepage', 'diespe' ); ?></a>
	</p>
</div>
<?php
get_footer();
