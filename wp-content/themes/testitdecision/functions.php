<?php
/**
 * TestITDecision functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package TestITDecision
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'testitdecision_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function testitdecision_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on TestITDecision, use a find and replace
		 * to change 'testitdecision' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'testitdecision', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'testitdecision' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'testitdecision_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
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
add_action( 'after_setup_theme', 'testitdecision_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function testitdecision_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'testitdecision_content_width', 640 );
}
add_action( 'after_setup_theme', 'testitdecision_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function testitdecision_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'testitdecision' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'testitdecision' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'testitdecision_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function testitdecision_scripts() {
	wp_enqueue_style( 'testitdecision-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'testitdecision-style', 'rtl', 'replace' );
    wp_enqueue_style( 'test-style_less', get_template_directory_uri() . '/style/teststyle.css');
    wp_enqueue_style( 'test-fontawesome_css', get_template_directory_uri() . '/style/all.min.css' );
    wp_enqueue_style( 'test-bootstrap_css', get_template_directory_uri() . '/style/bootstrap.min.css' );


    wp_deregister_script('jquery');
    wp_register_script('jquery', get_template_directory_uri() . '/scripts/jQuery.js', false, null, false);
    wp_enqueue_script('jquery');
    wp_enqueue_script( 'test-script_js', get_template_directory_uri() . '/scripts/script.js', array(), '20151215', false );
    wp_enqueue_script( 'test-fontawesome_js', get_template_directory_uri() . '/scripts/all.min.js', array(), '20151215', true );
    wp_enqueue_script( 'test-bootstrap_js', get_template_directory_uri() . '/scripts/bootstrap.min.js', array(), '20151215', false );
    wp_enqueue_script( 'testitdecision-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'testitdecision_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}
require_once get_template_directory() . '/inc/carbon-fields/carbon-fields-plugin.php';

add_action('carbon_fields_register_fields', 'crb_register_custom_fields');
function crb_register_custom_fields() {

    require_once __DIR__ . '/inc/custom-fields/global-fields.php';
}
## Отключает новый редактор блоков в WordPress (Гутенберг).
## ver: 1.0
if( 'disable_gutenberg' ){
    add_filter( 'use_block_editor_for_post_type', '__return_false', 100 );

    // отключим подключение базовых css стилей для блоков
    // ВАЖНО! когда выйдут виджеты на блоках или что-то еще, эту строку нужно будет комментировать
    remove_action( 'wp_enqueue_scripts', 'wp_common_block_scripts_and_styles' );

    // Move the Privacy Policy help notice back under the title field.
    add_action( 'admin_init', function(){
        remove_action( 'admin_notices', [ 'WP_Privacy_Policy_Content', 'notice' ] );
        add_action( 'edit_form_after_title', [ 'WP_Privacy_Policy_Content', 'notice' ] );
    } );
}

show_admin_bar( false );

add_action('init', 'great_project_custom_init');
function great_project_custom_init() {
    register_post_type('great_project', array(
        'labels' => array(
            'name' => 'САМЫЕ БОЛЬШИЕ ПРОЕКТЫ', // Основное название типа записи
            'singular_name' => 'САМЫЕ БОЛЬШИЕ ПРОЕКТЫ', // отдельное название записи типа Book
            'add_new' => 'Добавить новый',
            'add_new_item' => 'Добавить новый',
            'edit_item' => 'Редактировать',
            'new_item' => 'Новый',
            'view_item' => 'Посмотреть',
            'search_items' => 'Найти',
            'not_found' => 'Проектов не найдено',
            'not_found_in_trash' => 'В корзине проектов не найдено',
            'parent_item_colon' => '',
            'menu_name' => 'САМЫЕ БОЛЬШИЕ ПРОЕКТЫ'
        ),
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => array('title', 'editor')
    ));
}
add_action('init', 'answer_custom_init');
function answer_custom_init() {
    register_post_type('answer', array(
        'labels' => array(
            'name' => 'Ответы на вопросы', // Основное название типа записи
            'singular_name' => 'Ответы на вопросы', // отдельное название записи типа Book
            'add_new' => 'Добавить новый',
            'add_new_item' => 'Добавить новый',
            'edit_item' => 'Редактировать',
            'new_item' => 'Новый',
            'view_item' => 'Посмотреть',
            'search_items' => 'Найти',
            'not_found' => 'Ответов не найдено',
            'not_found_in_trash' => 'В корзине ответов не найдено',
            'parent_item_colon' => '',
            'menu_name' => 'Ответы на вопросы'
        ),
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => array('title', 'editor')
    ));
}
add_action('init', 'reviews_custom_init');
function reviews_custom_init() {
    register_post_type('reviews', array(
        'labels' => array(
            'name' => 'Отзывы', // Основное название типа записи
            'singular_name' => 'Отзывы', // отдельное название записи типа Book
            'add_new' => 'Добавить новый',
            'add_new_item' => 'Добавить новый',
            'edit_item' => 'Редактировать',
            'new_item' => 'Новый',
            'view_item' => 'Посмотреть',
            'search_items' => 'Найти',
            'not_found' => 'Отзывов не найдено',
            'not_found_in_trash' => 'В корзине отзывов не найдено',
            'parent_item_colon' => '',
            'menu_name' => 'Отзывы'
        ),
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => array('title', 'editor')
    ));
}