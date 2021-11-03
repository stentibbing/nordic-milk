<?php
/**
 * The header for our theme
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
<?php wp_body_open(); ?>

<div id="burger-menu-container">
	<div id="burger-menu-button">
		<div id="burger-menu-icon"></div>
		<span id="burger-menu-label">Menu</span>
	</div>
	<div id="burger-menu">
		<?php
		wp_nav_menu(
			array(
				'theme_location' => 'menu-header',
			)
		);
		?>
	</div>
</div>

<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'nordic-milk' ); ?></a>

	<div class="scroll-down"><div class="scroll-down-text">scroll</div><div class="scroll-down-arrow"></div></div>

	<header id="masthead" class="site-header">
		
		<div class="site-branding">
			<?php
			the_custom_logo();
			?>
		</div><!-- .site-branding -->
			
		<?php if ( is_active_sidebar( 'sidebar-language-switcher' )): ?>
			<div id="language-switcher" class="widget-area">
				<?php dynamic_sidebar( 'sidebar-language-switcher' ); ?>
			</div>
		<?php endif; ?><!-- #language-switcher -->

		<nav id="menu-header" class="main-navigation">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-header',
				)
			);
			?>
		</nav><!-- #menu-header -->
	</header><!-- #masthead -->
