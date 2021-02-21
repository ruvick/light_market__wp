<?php
/**
 * light_market functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package light_market
 */

add_action( 'carbon_fields_register_fields', 'boots_register_custom_fields' );
function boots_register_custom_fields() {
// путь к пользовательскому файлу определения поля (полей), измените под себя
require_once __DIR__ . '/inc/custom-fields-options/metaboxes.php';
require_once __DIR__ . '/inc/custom-fields-options/theme-options.php';
}
add_action( 'after_setup_theme', 'crb_load' );
function crb_load() {
require_once( get_template_directory() . '/inc/carbon-fields/vendor/autoload.php' );
\Carbon_Fields\Carbon_Fields::boot(); 
}


if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release. 
	define( '_S_VERSION', '1.0.1' );
}

if ( ! function_exists( 'light_market_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function light_market_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on lipsky, use a find and replace
		 * to change 'lipsky' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'light_market', get_template_directory() . '/languages' );

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
// add_action( 'after_setup_theme', function(){
// 	register_nav_menus( [
// 		'menu-1' => 'Меню в шапке',
// 		'menu-2' => 'Мобильное меню',
// 	] ); 
// } );
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Меню в шапке', 'light_market' ),
				'menu-2' => esc_html__( 'Мобильное меню', 'light_market' ),
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
				'light_market_custom_background_args',
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
add_action( 'after_setup_theme', 'light_market_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function light_market_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'light_market_content_width', 640 );
}
add_action( 'after_setup_theme', 'light_market_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function lipsky_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'light_market' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'light_market' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'light_market_widgets_init' ); 

/**
 * Enqueue scripts and styles.
 */
function light_market_scripts() {
	wp_enqueue_style( 'light_market-style', get_stylesheet_uri() );

	wp_enqueue_script( 'jquery');

	// wp_enqueue_script( 'lipsky-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '1.0', true ); 

	wp_enqueue_script( 'light_market-inputmask', get_template_directory_uri() . '/js/jquery.inputmask.bundle.js', array(), 1.0, true );

	wp_enqueue_script( 'light_market-main', get_template_directory_uri() . '/js/main.js', array(), 1.0, true );

	wp_localize_script( 'light_market-main', 'allAjax', array(
      'ajaxurl' => admin_url( 'admin-ajax.php' ),
      'nonce'   => wp_create_nonce( 'NEHERTUTLAZIT' )
    ) );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'light_market_scripts' );




function wp_corenavi() {
  global $wp_query;
  $total = isset( $wp_query->max_num_pages ) ? $wp_query->max_num_pages : 1;
  $a['total'] = $total;
  $a['mid_size'] = 3; // сколько ссылок показывать слева и справа от текущей
  $a['end_size'] = 1; // сколько ссылок показывать в начале и в конце
  $a['prev_text'] = 'Назад'; // текст ссылки "Предыдущая страница"
  $a['next_text'] = 'Далее'; // текст ссылки "Следующая страница"

  if ( $total > 1 ) echo '<nav class="pagination">';
  echo paginate_links( $a );
  if ( $total > 1 ) echo '</nav>';
}


//Добавление "Цитаты" для страниц
function page_excerpt() {
add_post_type_support('page', array('excerpt'));
}
add_action('init', 'page_excerpt');


// Отправщик на почту
add_action( 'wp_ajax_send_work', 'send_work' );
add_action( 'wp_ajax_nopriv_send_work', 'send_work' );

  function send_work() {
    if ( empty( $_REQUEST['nonce'] ) ) {
      wp_die( '0' );
    }
    
    if ( check_ajax_referer( 'NEHERTUTLAZIT', 'nonce', false ) ) {
      
      $headers = array(
        'From: Сайт «ЛИПСКИЙ И ПАРТНЕРЫ» <noreply@lipskiy-konsalting.ru>',
        'content-type: text/html',
      );
    
      add_filter('wp_mail_content_type', create_function('', 'return "text/html";'));
      if (wp_mail(carbon_get_theme_option( 'as_email_send' ), 'Заявка с сайта «ЛИПСКИЙ И ПАРТНЕРЫ»', '<strong>Имя:</strong> '.$_REQUEST["name"]. '<br/> <strong>E-mail:</strong> '.$_REQUEST["email"]. ' <br/> <strong>Телефон:</strong> '.$_REQUEST["tel"], $headers))
        wp_die("<span style = 'color:green;'>Мы свяжемся с Вами в ближайшее время.</span>");
      else wp_die("<span style = 'color:red;'>Сервис недоступен попробуйте позднее.</span>");
      
    } else {
      wp_die( 'НО-НО-НО!', '', 403 );
    }
  }



// Изменение цвета секции на стр Услуги
function my_styles_method() {
	// #ff0000
	$color = carbon_get_the_post_meta('color_field');
	$custom_css = "  
		.services-info__g {
			background: {$color} ;
		}
	";

	wp_add_inline_style( 'light_market-style', $custom_css );
}

add_action( 'wp_enqueue_scripts', 'my_styles_method' );


