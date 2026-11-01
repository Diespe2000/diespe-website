<?php
/**
 * Template Naam: Diensten
 * Diensten-pagina met de drie disciplines als kaarten.
 *
 * @package Diespe
 */

get_header();
$intro = diespe_home_text( 'werkvelden_intro', __( 'Van initiatief tot oplevering: DIESPE verbindt denkkracht en uitvoering in de gebouwde en levende omgeving.', 'diespe' ) );
?>
<div class="container section">
	<header class="entry-header">
		<h1><span class="titel-badge" aria-hidden="true"><img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/iconen/gereedschap.svg' ); ?>" alt=""></span> <?php esc_html_e( 'Diensten', 'diespe' ); ?></h1>
		<p class="section-intro" style="margin-bottom:0;"><?php echo esc_html( $intro ); ?></p>
	</header>

	<div class="grid-3">
		<div class="card">
			<div class="card-header"><span class="card-icon" aria-hidden="true"><img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/iconen/gereedschap.svg' ); ?>" alt=""></span><h3><?php esc_html_e( 'Management', 'diespe' ); ?></h3></div>
			<p><?php esc_html_e( 'Leidinggeven aan teams van professionals: integrale projectteams en IPM-teams, van initiatief tot realisatie.', 'diespe' ); ?></p>
			<ul>
				<li><?php esc_html_e( 'Leidinggeven aan teams van professionals, integrale projectteams, IPM-teams', 'diespe' ); ?></li>
				<li><?php esc_html_e( 'Teamleden in hun kracht zetten', 'diespe' ); ?></li>
				<li><?php esc_html_e( 'Procesregie en bestuurlijke besluitvorming', 'diespe' ); ?></li>
				<li><?php esc_html_e( 'Risicomanagement, inkoop en contracteren', 'diespe' ); ?></li>
			</ul>
			<p class="card-case"><?php esc_html_e( 'Zoals: Vispassage Doesburg — één van Nederlands grootste vispassages, van verkenning tot realisatie.', 'diespe' ); ?></p>
		</div>
		<div class="card">
			<div class="card-header"><span class="card-icon card-icon--oranje" aria-hidden="true"><img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/iconen/tandwiel.svg' ); ?>" alt=""></span><h3><?php esc_html_e( 'Integrale ontwerpleiding', 'diespe' ); ?></h3></div>
			<p><?php esc_html_e( 'Vertalen van beleidsdoelen en opgaven naar integrale oplossingen: realiseerbaar, betaalbaar en acceptabel, met oog voor detail en duurzaamheid.', 'diespe' ); ?></p>
			<ul>
				<li><?php esc_html_e( 'Beleidsdoelen en opgaven vertalen naar integrale, realiseerbare oplossingen', 'diespe' ); ?></li>
				<li><?php esc_html_e( 'Ontwerpfasering: verkenning, planuitwerking, realiseerbaar ontwerp', 'diespe' ); ?></li>
				<li><?php esc_html_e( 'Systeembenadering en passende contractvormen', 'diespe' ); ?></li>
			</ul>
			<p class="card-case"><?php esc_html_e( 'Zoals: Waardevolle Kleine Wateren, Bovenlopen Loolee — KRW-doelen vertaald naar inrichtingsmaatregelen voor vier beken.', 'diespe' ); ?></p>
		</div>
		<div class="card">
			<div class="card-header"><span class="card-icon card-icon--groen" aria-hidden="true"><img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/iconen/natuur.svg' ); ?>" alt=""></span><h3><?php esc_html_e( 'Omgevingsgericht werken', 'diespe' ); ?></h3></div>
			<p><?php esc_html_e( 'Samenwerking, vertrouwen en het versterken van elkaars krachten — binnen en buiten het project.', 'diespe' ); ?></p>
			<ul>
				<li><?php esc_html_e( 'Omgevingsbewust werken met oog voor belangen', 'diespe' ); ?></li>
				<li><?php esc_html_e( 'Draagvlak creëren en betrokkenheid van belanghebbenden', 'diespe' ); ?></li>
				<li><?php esc_html_e( 'Belangen balanceren en win-win oplossingen vinden', 'diespe' ); ?></li>
				<li><?php esc_html_e( 'Gebiedsontwikkeling met maatschappelijke meerwaarde', 'diespe' ); ?></li>
			</ul>
			<p class="card-case"><?php esc_html_e( 'Zoals: Optimalisatie watersysteem Lichtenvoorde — wateroverlast aangepakt met draagvlak in de wijk.', 'diespe' ); ?></p>
		</div>
	</div>

	<p style="text-align:center; margin-top:44px;">
		<a class="btn btn--accent" href="<?php echo esc_url( get_post_type_archive_link( 'diespe_project' ) ); ?>"><?php esc_html_e( 'Bekijk de projecten', 'diespe' ); ?></a>
	</p>
</div>
<?php
get_footer();
