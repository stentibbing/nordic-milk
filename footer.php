<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Nordic_Milk
 */

?>
	<div id="footer-wrapper">
		<footer id="colophon" class="site-footer">
			<nav id="menu-footer" class="main-navigation">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'menu-footer',
					)
				);
				?>
			</nav><!-- #menu-footer -->
			<?php if ( is_active_sidebar( 'sidebar-footer-props' )): ?>
			<div id="footer-props" class="widget-area">
				<?php dynamic_sidebar( 'sidebar-footer-props' ); ?>
			</div>
			<div id="footer-branding">
				<?php endif; ?><!-- #footer-props -->
				<?php if ( is_active_sidebar( 'sidebar-footer-logo' )): ?>
				<div id="footer-logo" class="widget-area">
					<?php dynamic_sidebar( 'sidebar-footer-logo' ); ?>
				</div>
				<?php endif; ?><!-- #footer-logo -->
				<?php if ( is_active_sidebar( 'sidebar-footer-copyright' )): ?>
				<div id="footer-copyright" class="widget-area">
					<?php dynamic_sidebar( 'sidebar-footer-copyright' ); ?>
				</div>
				<?php endif; ?><!-- #footer-copyright -->
			</div>
		</footer><!-- #colophon -->
	</div>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
