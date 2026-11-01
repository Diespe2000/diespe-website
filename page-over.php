<?php
/**
 * Template Naam: Over DIESPE
 * Over-pagina met de drie kolommen (Diederik, Waarom DIESPE, Werkwijze).
 *
 * @package Diespe
 */

get_header();
$over_intro  = diespe_home_text( 'over_intro', __( 'DIESPE Omgevingsprojecten is het bureau van oprichter Diederik Speksnijder: pragmatisch, betrokken en proactief — met de focus op duurzame omgevingsprojecten in de grond-, weg- en waterbouwsector.', 'diespe' ) );
$over_tekst1 = diespe_home_text( 'over_tekst1', __( 'Diederik is oprichter en eigenaar van DIESPE, en al meer dan 25 jaar een bevlogen en integer manager in de grond-, weg- en waterbouw. Hij stuurt het DIESPE-team aan en is zelf één van de gepassioneerde medewerkers.', 'diespe' ) );
$over_tekst2 = diespe_home_text( 'over_tekst2', __( 'Diederik verbindt het proces aan de inhoud, doorziet de materie snel en komt tot oplossingen — met persoonlijke aandacht voor opdrachtgevers en teamleden. Denk aan watersysteem- en energieprojecten, waterveiligheid en gebiedsontwikkeling.', 'diespe' ) );
?>
<div class="container section">
	<header class="entry-header">
		<h1><span class="titel-badge titel-badge--donkerblauw" aria-hidden="true"><img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/iconen/persoon.svg' ); ?>" alt=""></span> <?php esc_html_e( 'Over DIESPE', 'diespe' ); ?></h1>
		<p class="section-intro" style="margin-bottom:0;"><?php echo esc_html( $over_intro ); ?></p>
	</header>

	<div class="grid-3">
		<div class="card card--diederik">
			<div class="card-header"><span class="card-icon" aria-hidden="true"><img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/iconen/persoon.svg' ); ?>" alt=""></span><h3><?php esc_html_e( 'Diederik Speksnijder', 'diespe' ); ?></h3></div>
			<p><?php echo esc_html( $over_tekst1 ); ?></p>
			<p><?php echo esc_html( $over_tekst2 ); ?></p>
			<a class="btn btn--kleur1 card-more" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Neem contact op', 'diespe' ); ?></a>
		</div>
		<div class="card">
			<div class="card-header"><span class="card-icon card-icon--oranje" aria-hidden="true"><img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/iconen/ster.svg' ); ?>" alt=""></span><h3><?php esc_html_e( 'Waarom DIESPE', 'diespe' ); ?></h3></div>
			<p><?php esc_html_e( 'DIESPE staat voor pragmatisch projectmanagement met de mens en de omgeving centraal, op zoek naar maatschappelijke meerwaarde.', 'diespe' ); ?></p>
			<ul>
				<li><?php esc_html_e( 'Eerst denken, dan doen', 'diespe' ); ?></li>
				<li><?php esc_html_e( 'Denkt in kansen en oplossingen, ook out-of-the-box', 'diespe' ); ?></li>
				<li><?php esc_html_e( 'Omgevingsbewust en resultaatgericht', 'diespe' ); ?></li>
				<li><?php esc_html_e( 'Hoge dienstverlening', 'diespe' ); ?></li>
				<li><?php esc_html_e( 'Eén aanspreekpunt, van initiatief tot realisatie', 'diespe' ); ?></li>
			</ul>
			<a class="btn btn--kleur4 card-more" href="<?php echo esc_url( home_url( '/werkvelden/' ) ); ?>"><?php esc_html_e( 'Naar de diensten', 'diespe' ); ?></a>
		</div>
		<div class="card">
			<div class="card-header"><span class="card-icon card-icon--groen" aria-hidden="true"><img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/iconen/wereld.svg' ); ?>" alt=""></span><h3><?php esc_html_e( 'Werkwijze', 'diespe' ); ?></h3></div>
			<p><?php esc_html_e( 'Persoonlijk contact staat bij DIESPE voorop. Na een uitgebreide kennismaking om uw vraag echt te doorgronden, volgt een gedegen analyse en aanpak die met u wordt besproken — maatwerk, opnieuw en opnieuw.', 'diespe' ); ?></p>
			<ul>
				<li><?php esc_html_e( 'Verkennen: opgave helder krijgen, kansen benoemen', 'diespe' ); ?></li>
				<li><?php esc_html_e( 'Ontwerpen: integrale oplossingen, realiseerbaar en betaalbaar', 'diespe' ); ?></li>
				<li><?php esc_html_e( 'Verbinden: draagvlak bij belanghebbenden en bestuur', 'diespe' ); ?></li>
				<li><?php esc_html_e( 'Realiseren: passende contractvorm, van plan tot oplevering', 'diespe' ); ?></li>
			</ul>
			<a class="btn btn--kleur2 card-more" href="<?php echo esc_url( get_post_type_archive_link( 'diespe_project' ) ); ?>"><?php esc_html_e( 'Bekijk de projecten', 'diespe' ); ?></a>
		</div>
	</div>

	<p style="text-align:center; margin-top:44px;">
		<a class="btn btn--accent" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Maak kennis', 'diespe' ); ?></a>
	</p>
</div>
<?php
get_footer();
