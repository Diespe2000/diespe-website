<?php
/**
 * Headersjabloon.
 *
 * @package Diespe
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Ga naar de inhoud', 'diespe' ); ?></a>

<header class="site-header" role="banner">
	<div class="container header-inner">
		<div class="site-branding">
			<?php if ( has_custom_logo() ) : ?>
				<?php the_custom_logo(); ?>
			<?php else : ?>
				<div class="site-identity">
					<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">DIESPE</a></p>
				</div>
			<?php endif; ?>
			<?php
			$description = get_bloginfo( 'description', 'display' );
			if ( $description ) :
				?>
				<p class="site-description"><?php echo esc_html( $description ); ?></p>
			<?php endif; ?>
		</div>

		<button class="nav-toggle" aria-expanded="false" aria-controls="primary-nav">
			<span></span><span></span><span></span>
			<span class="screen-reader-text"><?php esc_html_e( 'Menu', 'diespe' ); ?></span>
		</button>

		<nav id="primary-nav" class="main-nav" role="navigation" aria-label="<?php esc_attr_e( 'Hoofdmenu', 'diespe' ); ?>">
			<?php
			wp_nav_menu( array(
				'theme_location' => 'primary',
				'container'     => false,
				'fallback_cb'   => false,
			) );
			?>
		</nav>
	</div>
</header>

<main id="content" role="main">
