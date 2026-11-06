<?php
/**
 * Template Naam: Diensten
 * Diensten-pagina met de drie disciplines als kaarten.
 *
 * @package Diespe
 */

get_header();
$intro = diespe_home_text( 'werkvelden_intro', __( 'Van initiatief tot oplevering: DIESPE verbindt denkkracht en uitvoering in de gebouwde en landelijke omgeving.', 'diespe' ) );
?>
<div class="container section">
	<header class="entry-header">
		<h1><span class="titel-badge" aria-hidden="true"><img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/iconen/gereedschap.svg' ); ?>" alt=""></span> <?php esc_html_e( 'Diensten', 'diespe' ); ?></h1>
		<p class="section-intro" style="margin-bottom:0;"><?php echo esc_html( $intro ); ?></p>
	</header>

	<div class="grid-3">
		<?php
		$diensten_kaarten = array(
			array(
				'icon'  => 'gereedschap.svg',
				'kleur' => '',
				'titel' => diespe_home_text( 'kaart1_titel', __( 'Management', 'diespe' ) ),
				'tekst' => diespe_home_text( 'kaart1_tekst', __( 'Leidinggeven aan teams van professionals: integrale projectteams en IPM-teams, van initiatief tot realisatie.', 'diespe' ) ),
				'punten' => diespe_home_text( 'kaart1_punten', __( "Leidinggeven aan teams van professionals, integrale projectteams, IPM-teams\nTeamleden in hun kracht zetten\nProcesregie en bestuurlijke besluitvorming\nRisicomanagement, inkoop en contracteren", 'diespe' ) ),
				'voorbeeld' => diespe_home_text( 'kaart1_voorbeeld', __( 'Zoals: Vispassage Doesburg — één van Nederlands grootste vispassages, van verkenning tot realisatie.', 'diespe' ) ),
			),
			array(
				'icon'  => 'tandwiel.svg',
				'kleur' => ' card-icon--oranje',
				'titel' => diespe_home_text( 'kaart2_titel', __( 'Integrale ontwerpleiding', 'diespe' ) ),
				'tekst' => diespe_home_text( 'kaart2_tekst', __( 'Vertalen van beleidsdoelen en opgaven naar integrale oplossingen: realiseerbaar, betaalbaar en acceptabel, met oog voor detail en duurzaamheid.', 'diespe' ) ),
				'punten' => diespe_home_text( 'kaart2_punten', __( "Beleidsdoelen en opgaven vertalen naar integrale, realiseerbare oplossingen\nOntwerpfasering: verkenning, planuitwerking, realiseerbaar ontwerp\nSysteembenadering en passende contractvormen", 'diespe' ) ),
				'voorbeeld' => diespe_home_text( 'kaart2_voorbeeld', __( 'Zoals: Waardevolle Kleine Wateren, Bovenlopen Loolee — KRW-doelen vertaald naar inrichtingsmaatregelen voor vier beken.', 'diespe' ) ),
			),
			array(
				'icon'  => 'natuur.svg',
				'kleur' => ' card-icon--groen',
				'titel' => diespe_home_text( 'kaart3_titel', __( 'Omgevingsgericht werken', 'diespe' ) ),
				'tekst' => diespe_home_text( 'kaart3_tekst', __( 'Samenwerking, vertrouwen en het versterken van elkaars krachten — binnen en buiten het project.', 'diespe' ) ),
				'punten' => diespe_home_text( 'kaart3_punten', __( "Omgevingsbewust werken met oog voor belangen\nDraagvlak creéren en betrokkenheid van belanghebbenden\nBelangen balanceren en win-win oplossingen vinden\nGebiedsontwikkeling met maatschappelijke meerwaarde", 'diespe' ) ),
				'voorbeeld' => diespe_home_text( 'kaart3_voorbeeld', __( 'Zoals: Optimalisatie watersysteem Lichtenvoorde — wateroverlast aangepakt met draagvlak in de wijk.', 'diespe' ) ),
			),
		);
		foreach ( $diensten_kaarten as $kaart ) : ?>
			<div class="card">
				<div class="card-header"><span class="card-icon<?php echo esc_attr( $kaart['kleur'] ); ?>" aria-hidden="true"><img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/iconen/' . $kaart['icon'] ); ?>" alt=""></span><h3><?php echo esc_html( $kaart['titel'] ); ?></h3></div>
				<p><?php echo esc_html( $kaart['tekst'] ); ?></p>
			<ul>
				<?php foreach ( array_filter( array_map( 'trim', explode( "\n", $kaart['punten'] ) ) ) as $punt ) : ?>
					<li><?php echo esc_html( $punt ); ?></li>
				<?php endforeach; ?>
			</ul>
			<p class="card-case"><?php echo esc_html( $kaart['voorbeeld'] ); ?></p>
			</div>
		<?php endforeach; ?>
	</div>

	<p style="text-align:center; margin-top:44px;">
		<a class="btn btn--accent" href="<?php echo esc_url( get_post_type_archive_link( 'diespe_project' ) ); ?>"><?php esc_html_e( 'Bekijk de projecten', 'diespe' ); ?></a>
	</p>
</div>
<?php
get_footer();
