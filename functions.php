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
	wp_enqueue_style( 'diespe-style', get_stylesheet_uri(), array(), DIESPE_VERSION );
	wp_enqueue_script( 'diespe-nav', get_template_directory_uri() . '/assets/js/nav.js', array(), DIESPE_VERSION, true );
}
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
}
add_action( 'customize_register', 'diespe_customize_register' );

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
