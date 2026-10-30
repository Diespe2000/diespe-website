<?php
/**
 * Voorpagina (statische homepage met secties).
 *
 * @package Diespe
 */

get_header();
?>

<section class="hero">
	<div class="container">
		<h1><?php esc_html_e( 'Partner in duurzame omgevingsprojecten', 'diespe' ); ?></h1>
		<p>
			<?php esc_html_e( 'DIESPE Management & Advies is gespecialiseerd in Project-, Technisch- en Omgevingsmanagement van omgevings- en energieprojecten. Eerst denken, dan doen.', 'diespe' ); ?>
		</p>
		<?php if ( get_theme_mod( 'diespe_tagline' ) ) : ?>
			<p><em><?php echo esc_html( get_theme_mod( 'diespe_tagline' ) ); ?></em></p>
		<?php endif; ?>
		<a class="btn btn--accent" href="#werkvelden"><?php esc_html_e( 'Lees verder', 'diespe' ); ?></a>
		<a class="btn" href="#projecten"><?php esc_html_e( 'Bekijk meer', 'diespe' ); ?></a>
	</div>
</section>

<section class="section" id="werkvelden">
	<div class="container">
		<h2 class="section-title"><?php esc_html_e( 'Werkvelden', 'diespe' ); ?></h2>
		<p class="section-intro"><?php esc_html_e( 'Van initiëring tot oplevering: DIESPE verbindt denkkracht en uitvoering in de gebouwde en levende omgeving.', 'diespe' ); ?></p>
		<div class="grid-3">
			<div class="card">
				<span class="card-icon" aria-hidden="true">&#9851;</span>
				<h3><?php esc_html_e( 'Projectmanagement', 'diespe' ); ?></h3>
				<p><?php esc_html_e( 'Regie over het hele traject: planning, budget, kwaliteit en communicatie met alle partijen.', 'diespe' ); ?></p>
				<ul>
					<li><?php esc_html_e( 'Procesregie en bestuurlijke besluitvorming', 'diespe' ); ?></li>
					<li><?php esc_html_e( 'Risicomanagement', 'diespe' ); ?></li>
					<li><?php esc_html_e( 'Inkoop en contracteren', 'diespe' ); ?></li>
				</ul>
			</div>
			<div class="card">
				<span class="card-icon" aria-hidden="true">&#9881;</span>
				<h3><?php esc_html_e( 'Technisch management', 'diespe' ); ?></h3>
				<p><?php esc_html_e( 'Vertaling van doel naar ontwerp en uitvoering, met oog voor haalbaarheid en duurzaamheid.', 'diespe' ); ?></p>
				<ul>
					<li><?php esc_html_e( 'Energie- en middenspanningsprojecten', 'diespe' ); ?></li>
					<li><?php esc_html_e( 'Vertalen van KRW- en NBW-doelen naar maatregelen', 'diespe' ); ?></li>
					<li><?php esc_html_e( 'Systems Engineering en SE-GIS', 'diespe' ); ?></li>
				</ul>
			</div>
			<div class="card">
				<span class="card-icon" aria-hidden="true">&#127795;</span>
				<h3><?php esc_html_e( 'Omgevingsmanagement', 'diespe' ); ?></h3>
				<p><?php esc_html_e( 'Samenwerking, vertrouwen en het versterken van elkaars krachten — binnen en buiten het project.', 'diespe' ); ?></p>
				<ul>
					<li><?php esc_html_e( 'Draagvlak en betrokkenheid van belanghebbenden', 'diespe' ); ?></li>
					<li><?php esc_html_e( 'Belangen balanceren, win-win oplossingen vinden', 'diespe' ); ?></li>
					<li><?php esc_html_e( 'Gebiedsontwikkeling en maatschappelijke meerwaarde', 'diespe' ); ?></li>
				</ul>
			</div>
		</div>
	</div>
</section>

<section class="section section--alt" id="projecten">
	<div class="container">
		<h2 class="section-title"><?php esc_html_e( 'Projecten', 'diespe' ); ?></h2>
		<p class="section-intro"><?php esc_html_e( 'Een selectie van opgaven waaraan wij werken.', 'diespe' ); ?></p>

		<?php
		$projects = new WP_Query( array(
			'post_type'      => 'diespe_project',
			'posts_per_page' => 3,
		) );

		if ( $projects->have_posts() ) :
			?>
			<div class="project-grid">
				<?php
				while ( $projects->have_posts() ) :
					$projects->the_post();
					get_template_part( 'template-parts/project', 'card' );
				endwhile;
				wp_reset_postdata();
				?>
			</div>
			<p style="text-align:center; margin-top:36px;">
				<a class="btn btn--outline" href="<?php echo esc_url( get_post_type_archive_link( 'diespe_project' ) ); ?>"><?php esc_html_e( 'Alle projecten', 'diespe' ); ?></a>
			</p>
		<?php else : ?>
			<p style="text-align:center;"><?php esc_html_e( 'Nog geen projecten gepubliceerd.', 'diespe' ); ?></p>
		<?php endif; ?>
	</div>
</section>

<section class="section" id="over">
	<div class="container">
		<h2 class="section-title"><?php esc_html_e( 'Over DIESPE', 'diespe' ); ?></h2>
		<p class="section-intro"><?php esc_html_e( 'Betrokken en proactief, met een pragmatische "eerst denken, dan doen"-aanpak. Expertise in het organiseren en coördineren van complexe omgevingsprojecten binnen de grond-, weg- en waterbouwsector.', 'diespe' ); ?></p>
		<div class="contact-grid">
			<div>
				<h3><?php esc_html_e( 'Diederik Speksnijder', 'diespe' ); ?></h3>
				<p><?php esc_html_e( 'Flexibel in verschillende IPM-rollen, met een voorkeur voor technisch manager, projectmanager of omgevingsmanager. De kracht ligt in het verbinden van specialisten en stakeholders om gezamenlijke doelen te bereiken en maatschappelijke meerwaarde te creëren.', 'diespe' ); ?></p>
				<p><?php esc_html_e( 'Met focus op duurzame en efficiënte oplossingen draagt DIESPE bij aan technisch solide projecten die voldoen aan de behoeften van de gemeenschap.', 'diespe' ); ?></p>
				<a class="btn" href="<?php echo esc_url( home_url( '/over-diederik-speksnijder/' ) ); ?>"><?php esc_html_e( 'Meer over Diederik', 'diespe' ); ?></a>
			</div>
			<div class="card">
				<h3><?php esc_html_e( 'Werkgebieden', 'diespe' ); ?></h3>
				<ul>
					<li><?php esc_html_e( 'Watersysteemprojecten (KRW, NBW, klimaatrobuustheid)', 'diespe' ); ?></li>
					<li><?php esc_html_e( 'Energietransitie (middenspanningsnetten, windparken)', 'diespe' ); ?></li>
					<li><?php esc_html_e( 'Waterketen en waterveiligheid', 'diespe' ); ?></li>
					<li><?php esc_html_e( 'Grond-, weg- en waterbouw', 'diespe' ); ?></li>
				</ul>
			</div>
		</div>
		<p class="section-intro" style="margin-top:44px; margin-bottom:0;"><?php esc_html_e( 'We voeren onze diensten en werkzaamheden uit volgens De Nieuwe Regeling 2011 (DNR 2011), herziening juli 2013.', 'diespe' ); ?></p>
	</div>
</section>

<section class="section section--alt" id="nieuws">
	<div class="container">
		<h2 class="section-title"><?php esc_html_e( 'Nieuws', 'diespe' ); ?></h2>
		<?php
		$posts = new WP_Query( array( 'posts_per_page' => 3 ) );
		if ( $posts->have_posts() ) :
			while ( $posts->have_posts() ) :
				$posts->the_post();
				get_template_part( 'template-parts/post', 'card' );
			endwhile;
			wp_reset_postdata();
		else :
			?>
			<p style="text-align:center;"><?php esc_html_e( 'Nog geen berichten geplaatst.', 'diespe' ); ?></p>
		<?php endif; ?>
	</div>
</section>

<?php
get_footer();
