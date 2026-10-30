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
					<li><?php esc_html_e( 'Procesregie en besluitvorming', 'diespe' ); ?></li>
					<li><?php esc_html_e( 'Risicomanagement', 'diespe' ); ?></li>
					<li><?php esc_html_e( 'Inkoop en contracteren', 'diespe' ); ?></li>
				</ul>
			</div>
			<div class="card">
				<span class="card-icon" aria-hidden="true">&#9881;</span>
				<h3><?php esc_html_e( 'Technisch management', 'diespe' ); ?></h3>
				<p><?php esc_html_e( 'Vertaling van doel naar ontwerp en uitvoering, met oog voor haalbaarheid en duurzaamheid.', 'diespe' ); ?></p>
				<ul>
					<li><?php esc_html_e( 'Energieprojecten', 'diespe' ); ?></li>
					<li><?php esc_html_e( 'Technische haalbaarheidsstudies', 'diespe' ); ?></li>
					<li><?php esc_html_e( 'Toetsing en advies', 'diespe' ); ?></li>
				</ul>
			</div>
			<div class="card">
				<span class="card-icon" aria-hidden="true">&#127795;</span>
				<h3><?php esc_html_e( 'Omgevingsmanagement', 'diespe' ); ?></h3>
				<p><?php esc_html_e( 'Samenwerking, vertrouwen en het versterken van elkaars krachten — binnen en buiten het project.', 'diespe' ); ?></p>
				<ul>
					<li><?php esc_html_e( 'Participatie en omgevingswet', 'diespe' ); ?></li>
					<li><?php esc_html_e( 'Belangenhoudersdialogen', 'diespe' ); ?></li>
					<li><?php esc_html_e( 'Gebiedsontwikkeling', 'diespe' ); ?></li>
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
		<p class="section-intro"><?php esc_html_e( 'Bij DIESPE Omgevingsprojecten hechten we veel waarde aan samenwerking, vertrouwen en het versterken van elkaars krachten.', 'diespe' ); ?></p>
		<div class="contact-grid">
			<div>
				<p><?php esc_html_e( 'We voeren onze diensten en werkzaamheden uit volgens De Nieuwe Regeling 2011 (DNR 2011), herziening juli 2013 — de branchevoorwaarden voor ontwerpen, adviseren en organiseren voor de gebouwde omgeving.', 'diespe' ); ?></p>
				<a class="btn" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Neem contact op', 'diespe' ); ?></a>
			</div>
			<div class="card">
				<h3><?php esc_html_e( 'Waarom DIESPE?', 'diespe' ); ?></h3>
				<ul>
					<li><?php esc_html_e( 'Eerst denken, dan doen', 'diespe' ); ?></li>
					<li><?php esc_html_e( 'Duurzame omgevings- en energieprojecten', 'diespe' ); ?></li>
					<li><?php esc_html_e( 'Persoonlijke betrokkenheid en proactieve aanpak', 'diespe' ); ?></li>
				</ul>
			</div>
		</div>
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
