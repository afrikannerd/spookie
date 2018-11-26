<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package spookie
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'spookie' ); ?></a>
	<?php if ( is_front_page()){?>
	<figure class="header-image">
		<?php the_header_image_tag(); ?>
	</figure>
	<?php }?>
	<header id="masthead" class="site-header">
		<div class="site-branding">
			<?php
			the_custom_logo();?>
			<div class="site_branding__text">
			<?php
			
			if ( is_front_page() && is_home() ) :
				?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php
			else :
				?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php
			endif;
			$spookie_description = get_bloginfo( 'description', 'display' );
			if ( $spookie_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo $spookie_description; /* WPCS: xss ok. */ ?></p>
			<?php endif; ?>
			</div><!-- .site-branding__text -->
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'spookie' ); ?></button>
			<?php
			wp_nav_menu( array(
				'theme_location' => 'menu-1',
				'menu_id'        => 'primary-menu',
				'menu-class' => 'navbar nav-pills',
                'walker' => new Spookie_Nav_Menu_Walker()
			) );
			?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
