<?php
/**
 * light_market functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package light_market
 */

define("COMPANY_NAME", "Магазин MarketSveta");
define("MAIL_RESEND", "noreply@marketsveta.su");

//----Подключене carbon fields
//----Инструкции по подключению полей см. в комментариях themes-fields.php
include "carbon-fields/carbon-fields-plugin.php";

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'crb_attach_theme_options' ); 
function crb_attach_theme_options() {
	require_once __DIR__ . "/themes-fields.php";
}


add_action( 'after_setup_theme', 'crb_load' );
function crb_load() {
	require_once( 'carbon-fields/vendor/autoload.php' );
	\Carbon_Fields\Carbon_Fields::boot();
} 


//-----Блок описания вывода меню
// 1. Осмысленные названия для алиаса и для описания на русском.
// если это меню в подвали пишем - Меню в подвале 
// если в шапке то пишем - Меню в шапке 
// если 2 меню в шапке пишем  - Меню в шапке (верхняя часть)


add_action( 'after_setup_theme', function(){
	register_nav_menus( [
		'menu_hot' => 'Меню актуальных предложений (рядом с каталогом)',
		'menu_cat' => 'Меню каталога',
		'menu_main' => 'Меню основное',
		'menu_corp' => 'Общекорпоративное меню (верхняя шапка)',
		'menu_footer_actual' => 'Меню в подвале (Актуальные)',
	] );
} ); 

add_filter( 'nav_menu_css_class', 'change_menu_item_css_classes', 10, 4 );

function change_menu_item_css_classes( $classes, $item, $args, $depth ) {
	if( 3674 === $item->ID  && 'menu_main' === $args->theme_location ){
		$classes[] = 'menu__catalogy';
	}

	if( 3670 === $item->ID  && 'menu_main' === $args->theme_location ){
		$classes[] = 'menu__shares';
	}

	return $classes;
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
function lipsky_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'light_market_content_width', 640 );
}
// add_action( 'after_setup_theme', 'light_market_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function light_market_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'lipsky' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'lipsky' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
// add_action( 'widgets_init', 'light_market_widgets_init' ); 

/**
 * Enqueue scripts and styles.
 */

// Описываем функцию в которй будем подключать CSS и JS

define("ALL_VERSION", "1.0.3");
function light_market_scripts_styles(){
    global $wp_styles;

		wp_enqueue_style("light_market-fancybox", get_template_directory_uri()."/css/fancybox.css", array(), $style_version, 'all'); //Модальные окна (стили)

		wp_enqueue_style( 'light_market-style', get_stylesheet_uri() );

	wp_enqueue_script( 'jquery');

	wp_enqueue_script( 'light_market-fancybox', get_template_directory_uri() . '/js/jquery.fancybox.min.js', array(), '1.0', true ); 

	wp_enqueue_script( 'light_market-popover', get_template_directory_uri() . '/js/jquery.popover.min.js', array(), '1.0', true ); 

	wp_enqueue_script( 'imasc', get_template_directory_uri().'/js/imask.js', array(), ALL_VERSION , true);


	wp_enqueue_script( 'light_market-slick', get_template_directory_uri() . '/js/slick.min.js', array(), '1.0', true ); 

  wp_enqueue_script( 'jquery-ui', 'https://code.jquery.com/ui/1.12.1/jquery-ui.min.js', array(), '1.0',  true );


	wp_enqueue_script( 'light_market-main', get_template_directory_uri() . '/js/main.js', array(), 1.0, true );

	wp_localize_script( 'light_market-main', 'allAjax', array(
      'ajaxurl' => admin_url( 'admin-ajax.php' ),
      'nonce'   => wp_create_nonce( 'NEHERTUTLAZIT' )
    ) );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	
	if ( is_page(3682))
		{
				wp_enqueue_script( 'vue', get_template_directory_uri().'/js/vue.js', array(), ALL_VERSION , true);
				wp_enqueue_script( 'axios', get_template_directory_uri().'/js/axios.min.js', array(), ALL_VERSION , true);
				wp_enqueue_script( 'bascet', get_template_directory_uri().'/js/bascet.js', array(), ALL_VERSION , true);
		}
}

// Добавляем action для запуска этой функции
add_action( 'wp_enqueue_scripts', 'light_market_scripts_styles', 1 );





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


	// Регистрация кастомного поста

add_action( 'init', 'create_taxonomies' );

function create_taxonomies(){

	register_taxonomy('lightcat', array('light'), array(
		'hierarchical'  => true,
		'labels'        => array(
			'name'              => "Категория товара",
			'singular_name'     => "Категория товара",
			'search_items'      => "Найти категорию товара",
			'all_items'         => __( 'Все категории' ),
			'parent_item'       => __( 'Дочерние категории' ),
			'parent_item_colon' => __( 'Дочерние категории:' ),
			'edit_item'         => __( 'Редактировать категорию' ),
			'update_item'       => __( 'Обновить категорию' ),
			'add_new_item'      => __( 'Добавить новую категорию товара' ),
			'new_item_name'     => __( 'Имя новой категории товара' ),
			'menu_name'         => __( 'Категории товара' ),
		),
		'description' => "Категория товаров для магазина",
		'public' => true,
		'show_ui'       => true,
		'query_var'     => true,
		'show_in_rest'  => true,
		'show_admin_column'     => true,
	));

	register_taxonomy('lightstyle', array('light'), array(
		'hierarchical'  => false,
		'labels'        => array(
			'name'              => "Стиль дизайна",
			'singular_name'     => "Стиль дизайна",
			'search_items'      => "Найти стиль",
			'all_items'         => __( 'Все стили' ),
			'parent_item'       => __( 'Дочерние стили' ),
			'parent_item_colon' => __( 'Дочерние стили:' ),
			'edit_item'         => __( 'Редактировать стиль' ),
			'update_item'       => __( 'Обновить стиль' ),
			'add_new_item'      => __( 'Добавить новый стиль' ),
			'new_item_name'     => __( 'Имя новго стиля товара' ),
			'menu_name'         => __( 'Стили товара' ),
		),
		'description' => "Стиль дизайна товаров",
		'public' => true,
		'show_ui'       => true,
		'query_var'     => true,
		'show_in_rest'  => true,
		'show_admin_column'     => true,
	));
}


add_action('init', 'light_custom_init');

function light_custom_init(){
	register_post_type('light', array(
		'labels'             => array(
			'name'               => 'Продукты', // Основное название типа записи
			'singular_name'      => 'Продукты', // отдельное название записи типа Book
			'add_new'            => 'Добавить новый',
			'add_new_item'       => 'Добавить новый товар',
			'edit_item'          => 'Редактировать товар',
			'new_item'           => 'Новый товар',
			'view_item'          => 'Посмотреть товар',
			'search_items'       => 'Найти товар',
			'not_found'          =>  'Товаров не найдено',
			'not_found_in_trash' => 'В корзине товаров не найдено',
			'parent_item_colon'  => '',
			'menu_name'          => 'Товары'

		  ),
		'taxonomies' => array('lightcat'), 
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => true,
		'capability_type'    => 'post',
		'has_archive'        => true,
		'show_admin_column'        => true,
		'show_in_quick_edit'        => true,
		'hierarchical'       => false,
		'menu_position'      => 5,
		'supports'           => array('title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats')
	) );
}

// _____________________Колонки в таблицу админки

add_filter('manage_posts_columns', 'posts_columns', 5);
add_action('manage_posts_custom_column', 'posts_custom_columns', 5, 2);
 
function posts_columns($defaults){
    $defaults['riv_post_sku'] = __('Артикул');
	$defaults['riv_post_thumbs'] = __('Миниатюра');
	$defaults['riv_post_price'] = __('Цена');
	return $defaults;
}
 
function posts_custom_columns($column_name, $id){
	
	
	if($column_name === 'riv_post_sku'){
		$SKU_t = get_post_meta(get_the_ID(), "_offer_sku", true);
		echo empty($SKU_t)?"-":$SKU_t;
	}
	
	if($column_name === 'riv_post_thumbs'){	
		$img1 = get_the_post_thumbnail_url( get_the_ID(), "thumbnail");
		
		if (empty($img1))
			$img1 = get_bloginfo("template_url")."/img/no-photo.jpg";
		
		echo '<img width = "60" src = "'.$img1.'" />';
			
	
	}
	
	if($column_name === 'riv_post_price'){
		$PRICE = get_post_meta(get_the_ID(), "_offer_price", true);
		echo empty($PRICE)?"0 руб.":$PRICE." руб.";
	}
	
	
}


// Отправка корзины
	
add_action( 'wp_ajax_send_cart', 'send_cart' );
add_action( 'wp_ajax_nopriv_send_cart', 'send_cart' );

function send_cart() {
	if ( empty( $_REQUEST['nonce'] ) ) {
		wp_die( '0' );
	}
	
	if ( check_ajax_referer( 'NEHERTUTLAZIT', 'nonce', false ) ) {

		$headers = array(
			'From: Сайт '.COMPANY_NAME.' <'.MAIL_RESEND.'>',
			'content-type: text/html',
		);
	
		add_filter('wp_mail_content_type', create_function('', 'return "text/html";'));
		
		$adr_to_send = carbon_get_theme_option("mail_to_send");
		$adr_to_send = (empty($adr_to_send))?"asmi046@gmail.com,info@light-snab.ru ":$adr_to_send;
		
		$zak_number = "LS-".date("H").date("s").date("s")."-".rand(100,999);

		$mail_content = "<h1>Заказ на сайте №".$zak_number."</h1>";
		
		$bscet_dec = json_decode(stripcslashes ($_REQUEST["bascet"]));
		
		$mail_content .= "<table style = 'text-align: left;' width = '100%'>";
			$mail_content .= "<tr>";
				$mail_content .= "<th></th>";
				$mail_content .= "<th>ТОВАР</th>";
				$mail_content .= "<th>КОЛЛИЧЕСТВО</th>";
				$mail_content .= "<th>СУММА</th>";
			$mail_content .= "</tr>";

			for ($i = 0; $i<count($bscet_dec); $i++) {
				$mail_content .= "<tr>";
					$mail_content .= "<td><img src = '".$bscet_dec[$i]->picture."' width = '70' height = '70'></td>";
					$mail_content .= "<td><a href = '".$bscet_dec[$i]->lnk."'>".$bscet_dec[$i]->name." / ".$bscet_dec[$i]->sku."</a></td>";
					$mail_content .= "<td>".$bscet_dec[$i]->count."</td>";
					$mail_content .= "<td>".$bscet_dec[$i]->subtotal." р.</td>";
				$mail_content .= "</tr>";
			}

		$mail_content .= "</table>";
		$mail_content .= "<h2>Сумма: ".$_REQUEST["bascetsumm"]." р.</h2>";

		
		$mail_content .= "<strong>Имя:</strong> ".$_REQUEST["name"]."<br/>";
		$mail_content .= "<strong>Телефон:</strong> ".$_REQUEST["phone"]."<br/>";
		$mail_content .= "<strong>e-mail:</strong> ".$_REQUEST["mail"]."<br/>";
		$mail_content .= "<strong>Адрес:</strong> ".$_REQUEST["adres"]."<br/>";
		$mail_content .= "<strong>Комментарий:</strong> ".$_REQUEST["comment"]."<br/>";

		$mail_them = "Заказ на сайте MarketSveta.su";

		
		if (wp_mail($adr_to_send, $mail_them, $mail_content, $headers)) {
			wp_die(json_encode(array("send" => true )));
		}
		else {
			wp_die( 'Ошибка отправки!', '', 403 );
		}
		
	} else {
		wp_die( 'НО-НО-НО!', '', 403 );
	}
}


