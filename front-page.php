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

$werkgebieden_raw = diespe_home_text( 'werkgebieden', __( "Watersysteem\nEnergietransitie\nWaterketen\nWaterveiligheid\nGebiedsontwikkeling\nNatuurherstel", 'diespe' ) );
$werkgebieden     = array_filter( array_map( 'trim', explode( "\n", $werkgebieden_raw ) ) );

$werkvelden_intro = diespe_home_text( 'werkvelden_intro', __( 'Van initiëring tot oplevering: DIESPE verbindt denkkracht en uitvoering in de gebouwde en landelijke omgeving.', 'diespe' ) );

$kaarten = array(
	array(
		'icon'    => '<img src="' . esc_url( get_template_directory_uri() . '/assets/img/iconen/gereedschap.svg' ) . '" alt="">',
		'kleur'   => '',
		'kaartkleur' => ' card--blauw',
		'titel'   => diespe_home_text( 'kaart1_titel', __( 'Management', 'diespe' ) ),
		'tekst'   => diespe_home_text( 'kaart1_tekst', __( 'Leidinggeven aan teams van professionals: integrale projectteams en IPM-teams, van initiatief tot realisatie.', 'diespe' ) ),
		'punten'  => diespe_home_text( 'kaart1_punten', __( "Leidinggeven aan teams van professionals, integrale projectteams, IPM-teams\nTeamleden in hun kracht zetten\nProcesregie en bestuurlijke besluitvorming\nRisicomanagement, inkoop en contracteren", 'diespe' ) ),
		'voorbeeld' => diespe_home_text( 'kaart1_voorbeeld', __( 'Zoals: Vispassage Doesburg — één van Nederlands grootste vispassages, van verkenning tot realisatie.', 'diespe' ) ),
	),
	array(
		'icon'    => '<img src="' . esc_url( get_template_directory_uri() . '/assets/img/iconen/tandwiel.svg' ) . '" alt="">',
		'kleur'   => ' card-icon--oranje',
		'kaartkleur' => ' card--oranje',
		'titel'   => diespe_home_text( 'kaart2_titel', __( 'Integrale ontwerpleiding', 'diespe' ) ),
		'tekst'   => diespe_home_text( 'kaart2_tekst', __( 'Vertalen van beleidsdoelen en opgaven naar integrale oplossingen: realiseerbaar, betaalbaar en acceptabel, met oog voor detail en duurzaamheid.', 'diespe' ) ),
		'punten'  => diespe_home_text( 'kaart2_punten', __( "Beleidsdoelen en opgaven vertalen naar integrale, realiseerbare oplossingen\nOntwerpfasering: verkenning, planuitwerking, realiseerbaar ontwerp\nSysteembenadering en passende contractvormen", 'diespe' ) ),
		'voorbeeld' => diespe_home_text( 'kaart2_voorbeeld', __( 'Zoals: Waardevolle Kleine Wateren, Bovenlopen Loolee — KRW-doelen vertaald naar inrichtingsmaatregelen voor vier beken.', 'diespe' ) ),
	),
	array(
		'icon'    => '<img src="' . esc_url( get_template_directory_uri() . '/assets/img/iconen/natuur.svg' ) . '" alt="">',
		'kleur'   => ' card-icon--groen',
		'kaartkleur' => ' card--groen',
		'titel'   => diespe_home_text( 'kaart3_titel', __( 'Omgevingsgericht werken', 'diespe' ) ),
		'tekst'   => diespe_home_text( 'kaart3_tekst', __( 'Samenwerking, vertrouwen en het versterken van elkaars krachten — binnen en buiten het project.', 'diespe' ) ),
		'punten'  => diespe_home_text( 'kaart3_punten', __( "Omgevingsbewust werken met oog voor belangen\nDraagvlak creëren en betrokkenheid van belanghebbenden\nBelangen balanceren en win-win oplossingen vinden\nGebiedsontwikkeling met maatschappelijke meerwaarde", 'diespe' ) ),
		'voorbeeld' => diespe_home_text( 'kaart3_voorbeeld', __( 'Zoals: Optimalisatie watersysteem Lichtenvoorde — wateroverlast aangepakt met een uitgebreid burgerparticipatietraject.', 'diespe' ) ),
	),
);

$over_intro = diespe_home_text( 'over_intro', __( 'DIESPE Omgevingsprojecten is het adviesbureau van oprichter Diederik Speksnijder. Bevlogen, betrokken en integer — met de focus op omgevingsprojecten in de grond-, weg- en waterbouw.', 'diespe' ) );
$over_tekst1 = diespe_home_text( 'over_tekst1', __( 'Diederik Speksnijder is oprichter van DIESPE en al meer dan 25 jaar een bevlogen, betrokken en integer manager in de grond-, weg- en waterbouw. Hij stuurt het team van DIESPE aan en is zelf, als een van de gepassioneerde medewerkers, dagelijks betrokken bij de projecten.', 'diespe' ) );
$over_tekst2 = diespe_home_text( 'over_tekst2', __( 'Diederik verbindt het proces aan de inhoud, doorziet de materie snel en komt tot oplossingen — met persoonlijke aandacht voor opdrachtgevers en teamleden. Denk aan watersysteem- en energieprojecten, waterveiligheid en gebiedsontwikkeling.', 'diespe' ) );
$over_naam   = diespe_home_text( 'over_naam', __( 'Diederik Speksnijder', 'diespe' ) );

$waarom_titel  = diespe_home_text( 'waarom_titel', __( 'Waarom DIESPE', 'diespe' ) );
$waarom_tekst  = diespe_home_text( 'waarom_tekst', __( 'DIESPE staat voor pragmatisch projectmanagement met de mens en de omgeving centraal, op zoek naar maatschappelijke meerwaarde.', 'diespe' ) );
$waarom_punten = diespe_home_text( 'waarom_punten', __( "Eerst denken, dan doen\nDenkt in kansen en oplossingen, ook out-of-the-box\nOmgevingsbewust en resultaatgericht\nHoge dienstverlening\nEén aanspreekpunt, van initiatief tot realisatie", 'diespe' ) );

$werkwijze_titel  = diespe_home_text( 'werkwijze_titel', __( 'Werkwijze', 'diespe' ) );
$werkwijze_tekst  = diespe_home_text( 'werkwijze_tekst', __( 'Persoonlijk contact staat bij DIESPE voorop. Na een uitgebreide kennismaking om uw vraag echt te doorgronden, volgt een gedegen analyse en aanpak die met u wordt besproken — maatwerk, opnieuw en opnieuw.', 'diespe' ) );
$werkwijze_punten = diespe_home_text( 'werkwijze_punten', __( "Verkennen: opgave helder krijgen, kansen benoemen\nOntwerpen: integrale oplossingen, realiseerbaar en betaalbaar\nVerbinden: draagvlak bij belanghebbenden en bestuur\nRealiseren: passende contractvorm, van plan tot oplevering", 'diespe' ) );

$sponsoring_titel = diespe_home_text( 'sponsoring_titel', __( 'DIESPE in de regio', 'diespe' ) );
$sponsoring_intro = diespe_home_text( 'sponsoring_intro', __( 'DIESPE is maatschappelijk betrokken en ondersteunt regionale clubs en verenigingen.', 'diespe' ) );

$sponsorkaarten = array(
	array(
		'afbeelding' => get_theme_mod( 'diespe_sponsor1_afbeelding' ) ? get_theme_mod( 'diespe_sponsor1_afbeelding' ) : get_template_directory_uri() . '/assets/img/sponsor-dames2.jpg',
		'alt'        => 'Dames 2 van Handbalvereniging Erix in de sportzaal',
		'icon'       => 'sport.svg',
		'kleur'      => '',
		'knopkleur'  => 'btn--kleur1',
		'titel'      => diespe_home_text( 'sponsor1_titel', __( 'Sponsor van HV Erix Dames 2', 'diespe' ) ),
		'tekst'      => diespe_home_text( 'sponsor1_tekst', __( 'DIESPE is shirtsponsor van het Dames 2-team van Handbalvereniging Erix. Bij DIESPE hechten we veel waarde aan samenwerking, vertrouwen en het versterken van elkaars krachten — op het veld én daarbuiten.', 'diespe' ) ),
		'knop'       => diespe_home_text( 'sponsor1_knop', __( 'Bekijk HV Erix', 'diespe' ) ),
		'url'        => diespe_home_text( 'sponsor1_url', 'https://hverix.nl' ),
	),
	array(
		'afbeelding' => get_theme_mod( 'diespe_sponsor2_afbeelding' ) ? get_theme_mod( 'diespe_sponsor2_afbeelding' ) : get_template_directory_uri() . '/assets/img/sponsor-bmx-3d.jpg',
		'alt'        => '3D-visualisatie van de nieuwe BMX-accommodatie van FCCL op het Eschpark',
		'icon'       => 'fiets.svg',
		'kleur'      => ' card-icon--oranje',
		'knopkleur'  => 'btn--kleur4',
		'titel'      => diespe_home_text( 'sponsor2_titel', __( 'BMX-accommodatie FCCL', 'diespe' ) ),
		'tekst'      => diespe_home_text( 'sponsor2_tekst', __( 'DIESPE heeft het projectmanagement verzorgd voor de nieuwe BMX-accommodatie van Fietscrossclub Lichtenvoorde (FCCL) op het Eschpark — van de eerste aanzet en locatiestudie tot de voltooide baan.', 'diespe' ) ),
		'knop'       => diespe_home_text( 'sponsor2_knop', __( 'Bekijk FCCL', 'diespe' ) ),
		'url'        => diespe_home_text( 'sponsor2_url', 'https://fccl.nl' ),
	),
	array(
		'afbeelding' => get_theme_mod( 'diespe_sponsor3_afbeelding' ) ? get_theme_mod( 'diespe_sponsor3_afbeelding' ) : get_template_directory_uri() . '/assets/img/sponsor-modelspoor.jpg',
		'alt'        => 'Modulebaan met tunnel op een FREMO/FKTT Treffen',
		'icon'       => 'trein.svg',
		'kleur'      => ' card-icon--groen',
		'knopkleur'  => 'btn--kleur2',
		'titel'      => diespe_home_text( 'sponsor3_titel', __( 'Modelspoor', 'diespe' ) ),
		'tekst'      => diespe_home_text( 'sponsor3_tekst', __( 'Diederik is lid van de Freundeskreis TT-Module (FKTT) en FREMO, en bouwt zelf aan modulebanen. Hij is ook lid van modelspoorvereniging De Seinpaal te Eibergen en helpt mee met het organiseren van diverse Treffen.', 'diespe' ) ),
		'knop'       => diespe_home_text( 'sponsor3_knop', __( 'Bekijk FKTT', 'diespe' ) ),
		'url'        => diespe_home_text( 'sponsor3_url', 'https://www.fktt-module.de/de' ),
	),
);

$partners_titel  = diespe_home_text( 'partners_titel', __( 'Onze partners', 'diespe' ) );
$partners_intro  = diespe_home_text( 'partners_intro', __( 'Een selectie van de specialisten en partnerbedrijven waarmee DIESPE samenwerkt.', 'diespe' ) );
?>

<section class="hero">
	<div class="container hero-inner">
		<div class="hero-text">
			<h1><?php echo esc_html( $hero_titel ); ?></h1>
			<p><?php echo esc_html( $hero_tekst ); ?></p>
			<a class="btn btn--accent" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Maak kennis', 'diespe' ); ?></a>
		</div>
		<div class="hero-visual">
			<?php if ( get_theme_mod( 'diespe_hero_afbeelding' ) ) : ?>
				<img src="<?php echo esc_url( get_theme_mod( 'diespe_hero_afbeelding' ) ); ?>" alt="">
			<?php else : ?>
				<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/hero-foto.png' ); ?>" alt="<?php echo esc_attr( 'Diederik Speksnijder, oprichter van DIESPE' ); ?>">
			<?php endif; ?>
		</div>
	</div>
</section>

<section class="section workfields-strip" id="werkgebieden">
	<div class="container">
		<ul class="workfields-list">
			<?php foreach ( $werkgebieden as $item ) : ?>
				<?php
				$term = get_term_by( 'name', $item, 'diespe_projecttype' );
				$link = $term && ! is_wp_error( $term ) ? get_term_link( $term ) : get_post_type_archive_link( 'diespe_project' );
				?>
				<li><a href="<?php echo esc_url( $link ); ?>" style="color:inherit;"><?php echo esc_html( $item ); ?></a></li>
			<?php endforeach; ?>
		</ul>
	</div>
</section>

<section class="section" id="werkvelden">
	<div class="container">
		<h2 class="section-title"><span class="titel-badge" aria-hidden="true"><img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/iconen/gereedschap.svg' ); ?>" alt=""></span> <?php echo esc_html( diespe_home_text( 'werkvelden_titel', __( 'Werkvelden', 'diespe' ) ) ); ?></h2>
		<p class="section-intro"><?php echo esc_html( $werkvelden_intro ); ?></p>
		<div class="grid-3">
			<?php foreach ( $kaarten as $kaart ) : ?>
				<div class="card<?php echo esc_attr( $kaart['kaartkleur'] ?? '' ); ?>">
					<div class="card-header">
						<span class="card-icon<?php echo esc_attr( $kaart['kleur'] ?? '' ); ?>" aria-hidden="true"><?php echo $kaart['icon']; ?></span>
						<h3><?php echo esc_html( $kaart['titel'] ); ?></h3>
					</div>
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
	</div>
</section>

<section class="section section--alt" id="projecten">
	<div class="container">
		<h2 class="section-title"><span class="titel-badge titel-badge--oranje" aria-hidden="true"><img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/iconen/meetlat.svg' ); ?>" alt=""></span> <?php echo esc_html( diespe_home_text( 'projecten_titel', __( 'Projecten', 'diespe' ) ) ); ?></h2>
		<p class="section-intro"><?php echo esc_html( diespe_home_text( 'projecten_intro', __( 'Een selectie van opgaven waaraan DIESPE heeft gewerkt.', 'diespe' ) ) ); ?></p>

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
			// Cachevriendelijke selectie: seed per dag, zodat de drie projecten
			// per dag rouleren maar binnen een dag stabiel blijven.
			$dag_seed = (int) gmdate( 'Ymd' );
			$showcase = new WP_Query( array(
				'post_type'      => 'diespe_project',
				'posts_per_page' => 3,
				'orderby'        => 'rand(' . $dag_seed . ')',
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
		<h2 class="section-title"><span class="titel-badge titel-badge--donkerblauw" aria-hidden="true"><img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/iconen/persoon.svg' ); ?>" alt=""></span> <?php echo esc_html( diespe_home_text( 'over_titel', __( 'Over DIESPE', 'diespe' ) ) ); ?></h2>
		<p class="section-intro"><?php echo esc_html( $over_intro ); ?></p>
		<div class="grid-3">
			<div class="card card--blauw card--diederik">
				<div class="card-header">
					<span class="card-icon" aria-hidden="true"><img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/iconen/persoon.svg' ); ?>" alt=""></span>
					<h3><?php echo esc_html( $over_naam ); ?></h3>
				</div>
				<p><?php echo esc_html( $over_tekst1 ); ?></p>
				<p><?php echo esc_html( $over_tekst2 ); ?></p>
				<a class="btn btn--kleur1 card-more" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Neem contact op', 'diespe' ); ?></a>
			</div>
			<div class="card card--oranje">
				<div class="card-header">
					<span class="card-icon card-icon--oranje" aria-hidden="true"><img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/iconen/ster.svg' ); ?>" alt=""></span>
					<h3><?php echo esc_html( $waarom_titel ); ?></h3>
				</div>
				<p><?php echo esc_html( $waarom_tekst ); ?></p>
				<ul>
				<?php foreach ( array_filter( array_map( 'trim', explode( "\n", $waarom_punten ) ) ) as $punt ) : ?>
					<li><?php echo esc_html( $punt ); ?></li>
				<?php endforeach; ?>
				</ul>
				<a class="btn btn--kleur4 card-more" href="<?php echo esc_url( home_url( '/werkvelden/' ) ); ?>"><?php esc_html_e( 'Naar de werkvelden', 'diespe' ); ?></a>
			</div>
			<div class="card card--groen">
				<div class="card-header">
					<span class="card-icon card-icon--groen" aria-hidden="true"><img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/iconen/wereld.svg' ); ?>" alt=""></span>
					<h3><?php echo esc_html( $werkwijze_titel ); ?></h3>
				</div>
				<p><?php echo esc_html( $werkwijze_tekst ); ?></p>
				<ul>
				<?php foreach ( array_filter( array_map( 'trim', explode( "\n", $werkwijze_punten ) ) ) as $punt ) : ?>
					<li><?php echo esc_html( $punt ); ?></li>
				<?php endforeach; ?>
				</ul>
				<a class="btn btn--kleur2 card-more" href="<?php echo esc_url( get_post_type_archive_link( 'diespe_project' ) ); ?>"><?php esc_html_e( 'Bekijk de projecten', 'diespe' ); ?></a>
			</div>
		</div>
	</div>
</section>



<section class="section" id="sponsoring">
	<div class="container">
		<h2 class="section-title"><span class="titel-badge titel-badge--groen" aria-hidden="true"><img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/iconen/vlag.svg' ); ?>" alt=""></span> <?php echo esc_html( $sponsoring_titel ); ?></h2>
		<p class="section-intro"><?php echo esc_html( $sponsoring_intro ); ?></p>
		<div class="grid-3 sponsor-grid">
			<?php foreach ( $sponsorkaarten as $kaart ) : ?>
				<div class="card card--blauw sponsor-card">
					<div class="sponsor-visual"><img src="<?php echo esc_url( $kaart['afbeelding'] ); ?>" alt="<?php echo esc_attr( $kaart['alt'] ); ?>"></div>
					<div class="sponsor-body">
						<div class="card-header"><span class="card-icon<?php echo esc_attr( $kaart['kleur'] ); ?>" aria-hidden="true"><img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/iconen/' . $kaart['icon'] ); ?>" alt=""></span><h3><?php echo esc_html( $kaart['titel'] ); ?></h3></div>
						<p><?php echo esc_html( $kaart['tekst'] ); ?></p>
						<?php if ( $kaart['url'] ) : ?>
							<a class="btn <?php echo esc_attr( $kaart['knopkleur'] ); ?> card-more" href="<?php echo esc_url( $kaart['url'] ); ?>" target="_blank" rel="noopener"><?php echo esc_html( $kaart['knop'] ); ?></a>
						<?php endif; ?>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<section class="section partners-strip" id="partners">
	<div class="container">
		<h2 class="section-title" style="color:#fff;"><span class="titel-badge" style="background:#fff;" aria-hidden="true"><img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/iconen/samenwerking.svg' ); ?>" alt="" style="filter:invert(1);"></span> <?php echo esc_html( $partners_titel ); ?></h2>
		<p class="section-intro" style="color:rgba(255,255,255,0.85);"><?php echo esc_html( $partners_intro ); ?></p>
		<div class="logo-marquee">
			<div class="logo-track">
			<?php
			for ( $set = 1; $set <= 2; $set++ ) {
				for ( $i = 1; $i <= 8; $i++ ) {
					$logo = get_theme_mod( 'diespe_netwerk_logo_' . $i );
					$url  = get_theme_mod( 'diespe_netwerk_url_' . $i );
					if ( $logo ) {
						if ( $url ) {
							echo '<a class="logo-item" href="' . esc_url( $url ) . '" target="_blank" rel="noopener"><img src="' . esc_url( $logo ) . '" alt="" loading="lazy"></a>';
						} else {
							echo '<span class="logo-item"><img src="' . esc_url( $logo ) . '" alt="" loading="lazy"></span>';
						}
					}
				}
			}
			?>
			</div>
		</div>
	</div>
</section>

<?php get_footer();
