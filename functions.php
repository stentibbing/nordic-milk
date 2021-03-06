<?php
/**
 * Nordic Milk functions and definitions
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'nordic_milk_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 */
	function nordic_milk_setup() {
		/*
		 * Make theme available for translation.
		 */
		load_theme_textdomain( 'nordic-milk', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 */
		add_theme_support( 'title-tag' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-header' => esc_html__( 'Header Menu', 'nordic-milk' ),
				'menu-footer' => esc_html__( 'Footer Menu', 'nordic-milk' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'nordic_milk_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 */
function nordic_milk_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'nordic_milk_content_width', 640 );
}
add_action( 'after_setup_theme', 'nordic_milk_content_width', 0 );

/**
 * Register widget area.
 */
function nordic_milk_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Language Switcher', 'nordic-milk' ),
			'id'            => 'sidebar-language-switcher',
			'description'   => esc_html__( 'Add language switcher here', 'nordic-milk' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Props', 'nordic-milk' ),
			'id'            => 'sidebar-footer-props',
			'description'   => esc_html__( 'Add footer props here', 'nordic-milk' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Logo', 'nordic-milk' ),
			'id'            => 'sidebar-footer-logo',
			'description'   => esc_html__( 'Add footer logo image here', 'nordic-milk' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Copyright', 'nordic-milk' ),
			'id'            => 'sidebar-footer-copyright',
			'description'   => esc_html__( 'Add footer copyright information here', 'nordic-milk' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'nordic_milk_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function nordic_milk_scripts() {
	wp_enqueue_style( 'nordic-milk-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'nordic-milk-style', 'rtl', 'replace' );

	wp_enqueue_script( 'nordic-milk-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'nordic_milk_scripts' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

