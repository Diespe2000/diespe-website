<?php
/**
 * Voorpagina (statische homepage met secties).
 * Alle teksten zijn aanpasbaar via Customizer → Homepage-teksten.
 *
 * @package Diespe
 */

get_header();

$hero_titel  = diespe_home_text( 'hero_titel', __( 'DIESPE: Uw partner in projecten', 'diespe' ) );
$hero_tekst  = diespe_home_text( 'hero_tekst', __( 'Kansen benutten en denken in oplossingen: voor elke uitdaging is een kans om iets moois te realiseren. Met een out-of-the-box kijk en een pragmatische aanpak, van initiatief tot realisatie.', 'diespe' ) );

$werkgebieden_raw = diespe_home_text( 'werkgebieden', __( "Watersysteem\nEnergietransitie\nWaterketen\nWaterveiligheid\nUtiliteit\nNatuurherstel", 'diespe' ) );
$werkgebieden     = array_filter( array_map( 'trim', explode( "\n", $werkgebieden_raw ) ) );

$werkvelden_intro = diespe_home_text( 'werkvelden_intro', __( 'Van initiëring tot oplevering: DIESPE verbindt denkkracht en uitvoering in de gebouwde en levende omgeving.', 'diespe' ) );

$kaarten = array(
	array(
		'icon'    => '&#9851;',
		'titel'   => diespe_home_text( 'kaart1_titel', __( 'Management', 'diespe' ) ),
		'tekst'   => diespe_home_text( 'kaart1_tekst', __( 'Leidinggeven aan teams van professionals: integrale projectteams en IPM-teams, van initiatief tot realisatie.', 'diespe' ) ),
		'punten'  => diespe_home_text( 'kaart1_punten', __( "Leidinggeven aan teams van professionals, integrale projectteams, IPM-teams\nTeamleden in hun kracht zetten\nProcesregie en bestuurlijke besluitvorming\nRisicomanagement, inkoop en contracteren", 'diespe' ) ),
		'voorbeeld' => diespe_home_text( 'kaart1_voorbeeld', __( 'Zoals: Vispassage Doesburg — één van Nederlands grootste vispassages, van verkenning tot realisatie.', 'diespe' ) ),
	),
	array(
		'icon'    => '&#9881;',
		'titel'   => diespe_home_text( 'kaart2_titel', __( 'Integrale ontwerpleiding', 'diespe' ) ),
		'tekst'   => diespe_home_text( 'kaart2_tekst', __( 'Vertalen van beleidsdoelen en opgaven naar integrale oplossingen: realiseerbaar, betaalbaar en acceptabel, met oog voor detail en duurzaamheid.', 'diespe' ) ),
		'punten'  => diespe_home_text( 'kaart2_punten', __( "Beleidsdoelen en opgaven vertalen naar integrale, realiseerbare oplossingen\nOntwerpfasering: verkenning, planuitwerking, realiseerbaar ontwerp\nSysteembenadering en passende contractvormen", 'diespe' ) ),
		'voorbeeld' => diespe_home_text( 'kaart2_voorbeeld', __( 'Zoals: Waardevolle Kleine Wateren, Bovenlopen Loolee — KRW-doelen vertaald naar inrichtingsmaatregelen voor vier beken.', 'diespe' ) ),
	),
	array(
		'icon'    => '&#127795;',
		'titel'   => diespe_home_text( 'kaart3_titel', __( 'Omgevingsgericht werken', 'diespe' ) ),
		'tekst'   => diespe_home_text( 'kaart3_tekst', __( 'Samenwerking, vertrouwen en het versterken van elkaars krachten — binnen en buiten het project.', 'diespe' ) ),
		'punten'  => diespe_home_text( 'kaart3_punten', __( "Omgevingsbewust werken met oog voor belangen\nDraagvlak creëren en betrokkenheid van belanghebbenden\nBelangen balanceren en win-win oplossingen vinden\nGebiedsontwikkeling met maatschappelijke meerwaarde", 'diespe' ) ),
		'voorbeeld' => diespe_home_text( 'kaart3_voorbeeld', __( 'Zoals: Optimalisatie watersysteem Lichtenvoorde — wateroverlast aangepakt met een uitgebreid burgerparticipatietraject.', 'diespe' ) ),
	),
);

$over_intro = diespe_home_text( 'over_intro', __( 'DIESPE is Diederik Speksnijder: betrokken, proactief en met een pragmatische "eerst denken, dan doen"-aanpak. Al meer dan 25 jaar het gezicht achter duurzame omgevingsprojecten in de grond-, weg- en waterbouwsector.', 'diespe' ) );
$over_naam  = diespe_home_text( 'over_naam', __( 'Diederik Speksnijder', 'diespe' ) );
$over_tekst1 = diespe_home_text( 'over_tekst1', __( 'Als ervaren manager verbindt Diederik specialisten en stakeholders om gezamenlijke doelen te bereiken. Hij denkt in kansen, balanceert belangen en zet teamleden in hun kracht. Diederik weet het proces te verbinden aan de inhoud, doorziet de materie snel en komt tot oplossingen.', 'diespe' ) );
$over_tekst2 = diespe_home_text( 'over_tekst2', __( 'Met de focus op duurzame, effici&euml;nte oplossingen realiseert hij solide projecten met maatschappelijke meerwaarde die voldoen aan de behoeften van de gemeenschap.', 'diespe' ) );
?>

<section class="hero">
	<div class="container hero-inner">
		<div class="hero-text">
			<h1><?php echo esc_html( $hero_titel ); ?></h1>
			<p><?php echo esc_html( $hero_tekst ); ?></p>
			<a class="btn btn--accent" href="<?php echo esc_url( home_url( '/over-diederik-speksnijder/' ) ); ?>"><?php esc_html_e( 'Maak kennis', 'diespe' ); ?></a>
			<a class="btn btn--white" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Contact', 'diespe' ); ?></a>
		</div>
		<div class="hero-visual" aria-hidden="true">
			<?php if ( get_theme_mod( 'diespe_hero_afbeelding' ) ) : ?>
				<img src="<?php echo esc_url( get_theme_mod( 'diespe_hero_afbeelding' ) ); ?>" alt="">
			<?php else : ?>
				<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/hero-visual.png' ); ?>" alt="">
			<?php endif; ?>
		</div>
	</div>
</section>

<section class="section workfields-strip" id="werkgebieden">
	<div class="container">
		<ul class="workfields-list">
			<?php foreach ( $werkgebieden as $item ) : ?>
				<li><?php echo esc_html( $item ); ?></li>
			<?php endforeach; ?>
		</ul>
	</div>
</section>

<section class="section" id="werkvelden">
	<div class="container">
		<h2 class="section-title"><?php esc_html_e( 'Werkvelden', 'diespe' ); ?></h2>
		<p class="section-intro"><?php echo esc_html( $werkvelden_intro ); ?></p>
		<div class="grid-3">
			<?php foreach ( $kaarten as $kaart ) : ?>
				<div class="card">
					<div class="card-header">
						<span class="card-icon" aria-hidden="true"><?php echo $kaart['icon']; ?></span>
						<h3><?php echo esc_html( $kaart['titel'] ); ?></h3>
					</div>
					<p><?php echo esc_html( $kaart['tekst'] ); ?></p>
					<ul>
						<?php foreach ( array_filter( array_map( 'trim', explode( "\n", $kaart['punten'] ) ) ) as $punt ) : ?>
							<li><?php echo esc_html( $punt ); ?></li>
						<?php endforeach; ?>
					</ul>
					<p class="card-case"><?php echo esc_html( $kaart['voorbeeld'] ); ?></p>
					<a class="btn btn--outline card-more" href="<?php echo esc_url( home_url( '/werkvelden/' ) ); ?>"><?php esc_html_e( 'Lees verder', 'diespe' ); ?></a>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<section class="section section--alt" id="projecten">
	<div class="container">
		<h2 class="section-title"><?php esc_html_e( 'Projecten', 'diespe' ); ?></h2>
		<p class="section-intro"><?php esc_html_e( 'Een selectie van de opgaven waaraan wij werken.', 'diespe' ); ?></p>

		<?php
		$showcase = new WP_Query( array(
			'post_type'      => 'diespe_project',
			'posts_per_page' => 3,
			'name'           => 'vispassage-doesburg',
		) );

		$showcase_ids = array();
		if ( $showcase->have_posts() ) {
			$showcase_ids[] = $showcase->posts[0]->ID;
		}
		foreach ( array( 'windpark-duiven-te-duiven', 'transportsystemen-lochem-zutphen' ) as $slug ) {
			$proj = get_page_by_path( $slug, OBJECT, 'diespe_project' );
			if ( $proj ) {
				$showcase_ids[] = $proj->ID;
			}
		}

		if ( $showcase_ids ) {
			$showcase = new WP_Query( array(
				'post_type'      => 'diespe_project',
				'posts_per_page' => 3,
				'post__in'       => $showcase_ids,
				'orderby'        => 'post__in',
			) );
		} else {
			$showcase = new WP_Query( array(
				'post_type'      => 'diespe_project',
				'posts_per_page' => 3,
			) );
		}

		if ( $showcase->have_posts() ) :
			?>
			<div class="project-grid">
				<?php
				while ( $showcase->have_posts() ) :
					$showcase->the_post();
					get_template_part( 'template-parts/project', 'card' );
				endwhile;
				wp_reset_postdata();
				?>
			</div>
			<p style="text-align:center; margin-top:36px;">
				<a class="btn btn--outline" href="<?php echo esc_url( get_post_type_archive_link( 'diespe_project' ) ); ?>"><?php esc_html_e( 'Meer projecten', 'diespe' ); ?></a>
			</p>
		<?php else : ?>
			<p style="text-align:center;"><?php esc_html_e( 'Nog geen projecten gepubliceerd.', 'diespe' ); ?></p>
		<?php endif; ?>
	</div>
</section>

<section class="section" id="over">
	<div class="container">
		<h2 class="section-title"><?php esc_html_e( 'Over DIESPE', 'diespe' ); ?></h2>
		<p class="section-intro"><?php echo esc_html( $over_intro ); ?></p>
		<div class="grid-3">
			<div class="card card--diederik">
				<div class="card-header">
					<span class="card-icon" aria-hidden="true">&#128100;</span>
					<h3><?php echo esc_html( $over_naam ); ?></h3>
				</div>
				<p><?php echo esc_html( $over_tekst1 ); ?></p>
				<p><?php echo esc_html( $over_tekst2 ); ?></p>
				<p><?php esc_html_e( 'DIESPE werkt samen met een grote groep specialisten om zo kenniselementen op te vullen en de opdrachtgever een hoge dienstverlening te bieden.', 'diespe' ); ?></p>
				<a class="btn btn--kleur1 card-more" href="<?php echo esc_url( home_url( '/over-diederik-speksnijder/' ) ); ?>"><?php esc_html_e( 'Meer over Diederik', 'diespe' ); ?></a>
			</div>
			<div class="card">
				<div class="card-header">
					<span class="card-icon" aria-hidden="true">&#9733;</span>
					<h3><?php esc_html_e( 'Kernkwaliteiten', 'diespe' ); ?></h3>
				</div>
				<ul>
					<li><?php esc_html_e( 'Eerst denken, dan doen', 'diespe' ); ?></li>
					<li><?php esc_html_e( 'Denkt in kansen en oplossingen', 'diespe' ); ?></li>
					<li><?php esc_html_e( 'Verbindt specialisten en stakeholders', 'diespe' ); ?></li>
					<li><?php esc_html_e( 'Omgevingsgericht werken, oog voor belang van stakeholders', 'diespe' ); ?></li>
					<li><?php esc_html_e( 'Integrale benadering, innovatieve methoden', 'diespe' ); ?></li>
					<li><?php esc_html_e( 'Maatschappelijke meerwaarde als uitgangspunt', 'diespe' ); ?></li>
				</ul>
				<a class="btn btn--kleur2 card-more" href="<?php echo esc_url( home_url( '/werkvelden/' ) ); ?>"><?php esc_html_e( 'Naar de werkvelden', 'diespe' ); ?></a>
			</div>
			<div class="card">
				<div class="card-header">
					<span class="card-icon" aria-hidden="true">&#127757;</span>
					<h3><?php esc_html_e( 'Werkgebieden', 'diespe' ); ?></h3>
				</div>
				<ul>
					<li><?php esc_html_e( 'Watersysteem', 'diespe' ); ?></li>
					<li><?php esc_html_e( 'Energietransitie', 'diespe' ); ?></li>
					<li><?php esc_html_e( 'Waterketen', 'diespe' ); ?></li>
					<li><?php esc_html_e( 'Waterveiligheid', 'diespe' ); ?></li>
					<li><?php esc_html_e( 'Gebiedsontwikkeling', 'diespe' ); ?></li>
					<li><?php esc_html_e( 'Natuurherstel', 'diespe' ); ?></li>
				</ul>
				<a class="btn btn--kleur3 card-more" href="<?php echo esc_url( get_post_type_archive_link( 'diespe_project' ) ); ?>"><?php esc_html_e( 'Bekijk de projecten', 'diespe' ); ?></a>
			</div>
		</div>
		<p class="section-intro" style="margin-top:44px; margin-bottom:0;"><?php esc_html_e( 'We voeren onze diensten en werkzaamheden uit volgens De Nieuwe Regeling 2011 (DNR 2011), herziening juli 2013.', 'diespe' ); ?></p>
		<p class="lid-van"><?php esc_html_e( 'Lid van:', 'diespe' ); ?> <strong>ZZP Nederland</strong> &nbsp;&middot;&nbsp; <strong><?php esc_html_e( 'KNW — Koninklijk Waternetwerk', 'diespe' ); ?></strong></p>
	</div>
</section>


<?php
get_footer();
