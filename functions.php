<?php
/**
 * DIESPE Omgevingsprojecten thema.
 *
 * @package Diespe
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'DIESPE_VERSION', '1.0.0' );

/**
 * Themasetup.
 */
function diespe_setup() {
	load_theme_textdomain( 'diespe', get_template_directory() . '/languages' );

	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'customize-selective-refresh-widgets' );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ) );
	add_theme_support( 'custom-logo', array(
		'height'      => 120,
		'width'       => 360,
		'flex-height' => true,
		'flex-width'  => true,
	) );

	register_nav_menus( array(
		'primary' => __( 'Hoofdmenu', 'diespe' ),
		'footer'  => __( 'Footermenu', 'diespe' ),
	) );
}
add_action( 'after_setup_theme', 'diespe_setup' );

/**
 * Stijlen en scripts.
 */
function diespe_scripts() {
	wp_enqueue_style( 'diespe-fonts', get_template_directory_uri() . '/assets/css/fonts.css', array(), DIESPE_VERSION );
	wp_enqueue_style( 'diespe-style', get_stylesheet_uri(), array( 'diespe-fonts' ), DIESPE_VERSION );
	wp_enqueue_script( 'diespe-nav', get_template_directory_uri() . '/assets/js/nav.js', array(), DIESPE_VERSION, true );
}

/**
 * Huisstijl: logo als standaard custom logo.
 */
function diespe_default_logo( $html ) {
	if ( ! $html ) {
		$html = '<a href="' . esc_url( home_url( '/' ) ) . '" class="custom-logo-link" rel="home">'
			. '<img src="' . esc_url( get_template_directory_uri() . '/assets/img/logo-diespe.svg' ) . '" alt="DIESPE omgevingsprojecten" class="custom-logo">'
			. '</a>';
	}
	return $html;
}
add_filter( 'get_custom_logo', 'diespe_default_logo' );

/**
 * Huisstijl: standaard site-description.
 */
function diespe_site_description( $description ) {
	if ( ! $description ) {
		$description = __( 'Partner in duurzame omgevingsprojecten', 'diespe' );
	}
	return $description;
}
add_filter( 'option_blogdescription', 'diespe_site_description' );

/**
 * Huisstijl: favicon en PWA-manifest.
 */
function diespe_favicons() {
	$base = get_template_directory_uri() . '/assets/img/favicons';
	echo '<link rel="icon" href="' . esc_url( $base . '/favicon.ico' ) . '" sizes="any">' . "\n";
	echo '<link rel="icon" type="image/png" sizes="32x32" href="' . esc_url( $base . '/logo-32.png' ) . '">' . "\n";
	echo '<link rel="icon" type="image/png" sizes="192x192" href="' . esc_url( $base . '/logo-192.png' ) . '">' . "\n";
	echo '<link rel="apple-touch-icon" href="' . esc_url( $base . '/logo-180.png' ) . '">' . "\n";
	echo '<link rel="manifest" href="' . esc_url( $base . '/site.webmanifest' ) . '">' . "\n";
}
add_action( 'wp_head', 'diespe_favicons' );

/**
 * Scripts.
 */
add_action( 'wp_enqueue_scripts', 'diespe_scripts' );

/**
 * Contentbreedte.
 */
function diespe_content_width() {
	$GLOBALS['content_width'] = 760;
}
add_action( 'after_setup_theme', 'diespe_content_width', 0 );

/**
 * Projecten Custom Post Type.
 */
function diespe_register_project_cpt() {
	register_post_type( 'diespe_project', array(
		'labels'       => array(
			'name'          => __( 'Projecten', 'diespe' ),
			'singular_name' => __( 'Project', 'diespe' ),
			'add_new_item'  => __( 'Nieuw project toevoegen', 'diespe' ),
			'edit_item'     => __( 'Project bewerken', 'diespe' ),
			'all_items'     => __( 'Alle projecten', 'diespe' ),
		),
		'public'       => true,
		'has_archive'  => true,
		'menu_icon'    => 'dashicons-hammer',
		'menu_position' => 20,
		'rewrite'      => array( 'slug' => 'projecten' ),
		'supports'     => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions' ),
		'show_in_rest' => true,
	) );

	register_taxonomy( 'diespe_projecttype', 'diespe_project', array(
		'labels'       => array(
			'name'          => __( 'Projecttypes', 'diespe' ),
			'singular_name' => __( 'Projecttype', 'diespe' ),
		),
		'public'       => true,
		'hierarchical' => true,
		'rewrite'      => array( 'slug' => 'projecttype' ),
		'show_in_rest' => true,
	) );
}
add_action( 'init', 'diespe_register_project_cpt' );

/**
 * Widgets.
 */
function diespe_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Zijbalk', 'diespe' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'diespe_widgets_init' );

/**
 * Customizer: contactgegevens.
 *
 * @param WP_Customize_Manager $wp_customize Customizer-object.
 */
function diespe_customize_register( $wp_customize ) {
	$wp_customize->add_section( 'diespe_contact', array(
		'title'    => __( 'Contactgegevens', 'diespe' ),
		'priority' => 30,
	) );

	$fields = array(
		'diespe_phone'    => __( 'Telefoonnummer', 'diespe' ),
		'diespe_email'    => __( 'E-mailadres', 'diespe' ),
		'diespe_address'  => __( 'Adres (straat en nr.)', 'diespe' ),
		'diespe_postal'   => __( 'Postcode en plaats', 'diespe' ),
		'diespe_tagline'  => __( 'Payoff', 'diespe' ),
	);

	foreach ( $fields as $id => $label ) {
		$wp_customize->add_setting( $id, array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		) );
		$wp_customize->add_control( $id, array(
			'label'   => $label,
			'section' => 'diespe_contact',
			'type'    => 'text',
		) );
	}

	$wp_customize->add_setting( 'diespe_hero_afbeelding', array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'diespe_hero_afbeelding', array(
		'label'   => __( 'Hero-afbeelding (ronde uitsnede)', 'diespe' ),
		'section' => 'diespe_contact',
	) ) );
}
add_action( 'customize_register', 'diespe_customize_register' );

/**
 * Contactformulier: weergave (shortcode [diespe_contactformulier]).
 */
function diespe_contact_form_shortcode() {
	if ( shortcode_exists( 'contact-form-7' ) && defined( 'WPCF7_VERSION' ) ) {
		return ''; // CF7 is actief: pagina toont via filter de CF7-shortcode.
	}

	$verzonden = false;
	$fout      = '';

	if ( isset( $_POST['diespe_contact'] ) && wp_verify_nonce( $_POST['diespe_contact_nonce'] ?? '', 'diespe_contact' ) ) {
		if ( ! empty( $_POST['diespe_website'] ) ) {
			$verzonden = true; // honeypot: bots zien succes, mensen merken niets.
		} else {
			$naam    = sanitize_text_field( wp_unslash( $_POST['diespe_naam'] ?? '' ) );
			$email   = sanitize_email( wp_unslash( $_POST['diespe_email'] ?? '' ) );
			$boodschap = sanitize_textarea_field( wp_unslash( $_POST['diespe_boodschap'] ?? '' ) );

			if ( ! $naam || ! $boodschap || ! is_email( $email ) ) {
				$fout = __( 'Vul a.u.b. uw naam, een geldig e-mailadres en een boodschap in.', 'diespe' );
			} else {
				$naar   = get_theme_mod( 'diespe_email' ) ?: get_option( 'admin_email' );
				$onderwerp = sprintf( '[%s] Contactverzoek via website', get_bloginfo( 'name' ) );
				$body   = "Naam: {$naam}\nE-mail: {$email}\n\nBoodschap:\n{$boodschap}";
				$headers = array( 'Reply-To: ' . $email );

				if ( wp_mail( $naar, $onderwerp, $body, $headers ) ) {
					$verzonden = true;
				} else {
					$fout = __( 'Het versturen is mislukt. Probeer het later opnieuw of bel ons rechtstreeks.', 'diespe' );
				}
			}
		}
	}

	ob_start();
	?>
	<div class="diespe-contactform">
		<?php if ( $verzonden ) : ?>
			<p class="diespe-notice diespe-notice--success"><?php esc_html_e( 'Bedankt! Uw bericht is verzonden. Ik neem zo snel mogelijk contact met u op.', 'diespe' ); ?></p>
		<?php else : ?>
			<?php if ( $fout ) : ?>
				<p class="diespe-notice diespe-notice--error"><?php echo esc_html( $fout ); ?></p>
			<?php endif; ?>
			<form method="post" class="form-grid">
				<?php wp_nonce_field( 'diespe_contact', 'diespe_contact_nonce' ); ?>
				<div>
					<label for="diespe_naam"><?php esc_html_e( 'Naam', 'diespe' ); ?> *</label>
					<input type="text" id="diespe_naam" name="diespe_naam" required value="<?php echo esc_attr( sanitize_text_field( wp_unslash( $_POST['diespe_naam'] ?? '' ) ) ); ?>">
				</div>
				<div>
					<label for="diespe_email"><?php esc_html_e( 'E-mailadres', 'diespe' ); ?> *</label>
					<input type="email" id="diespe_email" name="diespe_email" required value="<?php echo esc_attr( sanitize_email( wp_unslash( $_POST['diespe_email'] ?? '' ) ) ); ?>">
				</div>
				<div>
					<label for="diespe_boodschap"><?php esc_html_e( 'Uw boodschap', 'diespe' ); ?> *</label>
					<textarea id="diespe_boodschap" name="diespe_boodschap" rows="6" required><?php echo esc_textarea( sanitize_textarea_field( wp_unslash( $_POST['diespe_boodschap'] ?? '' ) ) ); ?></textarea>
				</div>
				<p style="position:absolute; left:-9999px;" aria-hidden="true">
					<label><?php esc_html_e( 'Vul dit veld niet in', 'diespe' ); ?>
						<input type="text" name="diespe_website" tabindex="-1" autocomplete="off">
					</label>
				</p>
				<div>
					<button type="submit" name="diespe_contact" value="1" class="btn"><?php esc_html_e( 'Verstuur bericht', 'diespe' ); ?></button>
				</div>
			</form>
		<?php endif; ?>
	</div>
	<?php
	return ob_get_clean();
}
add_shortcode( 'diespe_contactformulier', 'diespe_contact_form_shortcode' );

/**
 * Contactformulier: automatisch CF7-shortcode tonen indien actief.
 */
function diespe_cf7_form( $content ) {
	if ( false !== strpos( $content, '[diespe_contactformulier]' ) && defined( 'WPCF7_VERSION' ) ) {
		$cf7_posts = get_posts( array(
			'post_type'      => 'wpcf7_contact_form',
			'posts_per_page' => 1,
			'orderby'        => 'ID',
			'order'          => 'ASC',
		) );
		if ( $cf7_posts ) {
				$content = str_replace( '[diespe_contactformulier]', '[contact-form-7 id="' . $cf7_posts[0]->ID . '"]', $content );
		}
	}
	return $content;
}
add_filter( 'the_content', 'diespe_cf7_form' );

/**
 * Zoekformulier.
 */
function diespe_search_form( $form ) {
	$form = '<form role="search" method="get" class="search-form" action="' . esc_url( home_url( '/' ) ) . '">
		<label class="screen-reader-text">' . __( 'Zoeken naar:', 'diespe' ) . '</label>
		<input type="search" class="search-field" placeholder="' . esc_attr__( 'Zoeken&hellip;', 'diespe' ) . '" value="' . get_search_query() . '" name="s" />
		<button type="submit" class="search-submit btn">' . esc_html__( 'Zoeken', 'diespe' ) . '</button>
	</form>';
	return $form;
}
add_filter( 'get_search_form', 'diespe_search_form' );

/**
 * Uittreksel-lengte.
 */
function diespe_excerpt_length( $length ) {
	return 24;
}
add_filter( 'excerpt_length', 'diespe_excerpt_length' );

/**
 * Uittreksel "meer".
 *
 * @return string
 */
function diespe_excerpt_more( $more ) {
	return '&hellip;';
}
add_filter( 'excerpt_more', 'diespe_excerpt_more' );

/**
 * Zoeken ook op projecten.
 */
function diespe_search_projecten( $query ) {
	if ( ! is_admin() && $query->is_main_query() && $query->is_search() ) {
		$query->set( 'post_type', array( 'post', 'page', 'diespe_project' ) );
	}
}
add_action( 'pre_get_posts', 'diespe_search_projecten' );
