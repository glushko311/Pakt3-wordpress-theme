<?php
/**
 * pakt3 functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package pakt3
 */


// ---- новый walker для меню -----
// свой класс построения меню:

class Walker_Nav_Menu_Dropdown extends Walker_Nav_Menu {
	function start_lvl(&$output, $depth){
		$indent = str_repeat("\t", $depth); // don't output children opening tag (`<ul>`)
	}
	function end_lvl(&$output, $depth){
		$indent = str_repeat("\t", $depth); // don't output children closing tag
	}
	/**
	 * Start the element output.
	 *
	 * @param  string $output Passed by reference. Used to append additional content.
	 * @param  object $item   Menu item data object.
	 * @param  int $depth     Depth of menu item. May be used for padding.
	 * @param  array $args    Additional strings.
	 * @return void
	 */
	function start_el(&$output, $item, $depth, $args) {
		$url = '#' !== $item->url ? $item->url : '';
		$output .= '<option value="' . $url . '">' . $item->title;
	}
	function end_el(&$output, $item, $depth){
		$output .= "</option>\n"; // replace closing </li> with the option tag
	}
}

class magomra_walker_nav_menu extends Walker_Nav_Menu {

// add classes to ul sub-menus
	function start_lvl( &$output, $depth ) {
		// depth dependent classes
		$indent = ( $depth > 0  ? str_repeat( "\t", $depth ) : '' ); // code indent
		$display_depth = ( $depth + 1); // because it counts the first submenu as 0
		$classes = array(
				'sub-menu',
				'submenu',
				( $display_depth == 3  ? 'submenu1' : '' ),
//				( $display_depth >=2 ? 'sub-sub-menu' : '' ),
//				'menu-depth-' . $display_depth
		);
		$class_names = implode( ' ', $classes );

		// build html
		$output .= "\n" . $indent . '<ul class="' . $class_names . '">' . "\n";
	}

// add main/sub classes to li's and links
	function start_el( &$output, $item, $depth, $args ) {
		global $wp_query;
		$indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // code indent

		// depth dependent classes
		$depth_classes = array(
				( $depth == 0 ? 'sub-menu' : '' ),
//				( $depth >=2 ? 'sub-sub-menu-item' : '' ),
//				( $depth % 2 ? 'menu-item-odd' : 'menu-item-even' ),
//				'menu-item-depth-' . $depth
		);
		$depth_class_names = esc_attr( implode( ' ', $depth_classes ) );

		// passed classes
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$class_names = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) );

		// build html
		$output .= $indent . '<li id="nav-menu-item-'. $item->ID . '" class="' . $depth_class_names . ' ' . $class_names . '">';

		// link attributes
		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
		$attributes .= ' class="menu-link ' . ( $depth > 0 ? 'sub-menu-link' : 'main-menu-link' ) . '"';

		$item_output = sprintf( '%1$s<a%2$s>%3$s%4$s%5$s</a>%6$s',
				$args->before,
				$attributes,
				$args->link_before,
				apply_filters( 'the_title', $item->title, $item->ID ),
				$args->link_after,
				$args->after
		);

		// build html
		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
}
// ---- новый walker для меню -----



if ( ! function_exists( 'pakt3_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function pakt3_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on pakt3, use a find and replace
	 * to change 'pakt3' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'pakt3', get_template_directory() . '/languages' );

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
	register_nav_menu( 'primary', 'Primary menu' );
	register_nav_menu( 'primary_en', 'Primary menu english' );
	register_nav_menu('primary_ua', 'Primary menu ukrainian');
	register_nav_menu('primary_ih', 'Primary menu idish');



	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );
	add_theme_support('custom-logo');


	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'pakt3_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'pakt3_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function pakt3_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'pakt3_content_width', 640 );
}
add_action( 'after_setup_theme', 'pakt3_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function pakt3_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'pakt3' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'pakt3' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s span4">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'pakt3_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function pakt3_scripts() {
	wp_enqueue_style( 'pakt3-style', get_stylesheet_uri() );

	wp_enqueue_script( 'pakt3-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'pakt3-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'pakt3_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

//----------------Подключения в head начало-------------------------
//----------------Подключение CSS начало----------------------------
wp_register_style(
		'bootstrap-css', // хэндл
		get_template_directory_uri() . '/css/bootstrap.css', // URL стилевой таблицы
		array( ), // массив зависимых стилей
		'1.2', // номер версии
		'all' // CSS медиа-тип
);
wp_register_style(
		'responsive', // хэндл
		get_template_directory_uri() . '/css/responsive.css', // URL стилевой таблицы
		array( ), // массив зависимых стилей
		'1.2', // номер версии
		'all' // CSS медиа-тип
);

wp_register_style(
		'style', // хэндл
		get_template_directory_uri() . '/css/style.css', // URL стилевой таблицы
		array( ), // массив зависимых стилей
		'1.2', // номер версии
		'all' // CSS медиа-тип
);

wp_register_style(
		'camera', // хэндл
		get_template_directory_uri() . '/css/camera.css', // URL стилевой таблицы
		array( ), // массив зависимых стилей
		'1.2', // номер версии
		'all' // CSS медиа-тип
);

wp_register_style(
		'ie-css', // хэндл
		get_template_directory_uri() . '/css/ie.css', // URL стилевой таблицы
		array( ), // массив зависимых стилей
		'1.2', // номер версии
		'all' // CSS медиа-тип
);


wp_enqueue_style('bootstrap-css');
wp_enqueue_style('responsive');
wp_enqueue_style('style');
wp_enqueue_style('camera');
wp_enqueue_style('ie-css');
wp_style_add_data('ie-css', 'conditional', 'lt IE 9');


//----------------Подключение CSS конец-----------------------------

//----------------Подключение JS скриптов начало -------------------
function my_scripts_init () {
	if ( !is_admin() ) {
		//подключение в head
		wp_deregister_script('jquery-core');
		wp_register_script('jquery-core', get_template_directory_uri() .'/js/jquery.js', false, false, false);
		wp_enqueue_script('jquery');

		wp_register_script('jquery-migrate', get_template_directory_uri() .'/js/jquery-migrate-1.1.1.js', false, false, false);
		wp_enqueue_script( 'jquery-migrate', get_template_directory_uri() . '/js/jquery-migrate-1.1.1.js', '1.0', array('jquery'));//подключение скрипта

		wp_register_script('superfish', get_template_directory_uri() .'/js/superfish.js', false, false, false);
		wp_enqueue_script( 'superfish', get_template_directory_uri() . '/js/superfish.js', '1.0', array('jquery'));//подключение скрипта

		wp_register_script('jquery_mobilemenu', get_template_directory_uri() .'/js/jquery.mobilemenu.js', false, false, false);
		wp_enqueue_script( 'jquery_mobilemenu', get_template_directory_uri() . '/js/jquery.mobilemenu.js', '1.0', array('jquery'));//подключение скрипта

		wp_register_script('jquery_easing', get_template_directory_uri() .'/js/jquery.easing.1.3.js', false, false, false);
		wp_enqueue_script( 'jquery_easing', get_template_directory_uri() . '/js/jquery.easing.1.3.js', '1.0', array('jquery'));//подключение скрипта

		wp_register_script('jquery_ui_totop', get_template_directory_uri() .'/js/jquery.ui.totop.js', false, false, false);
		wp_enqueue_script( 'jquery_ui_totop', get_template_directory_uri() . '/js/jquery.ui.totop.js', '1.0', array('jquery'));//подключение скрипта

		wp_register_script('jquery_equalheights', get_template_directory_uri() .'/js/jquery.equalheights.js', false, false, false);
		wp_enqueue_script( 'jquery_equalheights', get_template_directory_uri() . '/js/jquery.equalheights.js', '1.0', array('jquery'));//подключение скрипта

		wp_register_script('camera_js', get_template_directory_uri() .'/js/camera.js', false, false, false);
		wp_enqueue_script( 'camera_js', get_template_directory_uri() . '/js/camera.js', '1.0', array('jquery'));//подключение скрипта

		wp_register_script('jquery_mobile_customized', get_template_directory_uri() .'/js/jquery.mobile.customized.min.js', false, false, false);
		wp_enqueue_script( 'jquery_mobile_customized', get_template_directory_uri() . '/js/jquery.mobile.customized.min.js', '1.0', array('jquery'));//подключение скрипта
		wp_script_add_data( 'jquery_mobile_customized', 'conditional', 'gt IE 9' );


		wp_register_script('html5shim', "http://html5shim.googlecode.com/svn/trunk/html5.js", false, false, false);
		wp_enqueue_script( 'html5shim', get_template_directory_uri() . "http://html5shim.googlecode.com/svn/trunk/html5.js", '1.0', array('jquery'));//подключение скрипта
		wp_script_add_data( 'html5shim', 'conditional', 'lt IE 9' );


		wp_register_script('jquery_mobile_customized', get_template_directory_uri() .'/js/camera.js', false, false, false);
		wp_enqueue_script( 'jquery_mobile_customized', get_template_directory_uri() . '/js/camera.js', '1.0', array('jquery'));//подключение скрипта
		wp_script_add_data( 'jquery_mobile_customized', 'conditional', 'lt IE 9' );

		wp_register_script('language_js', get_template_directory_uri() .'/js/language.js', false, false, true);
		wp_enqueue_script( 'language_js', get_template_directory_uri() . '/js/language.js', '1.0', array('jquery'));//подключение скрипта



		//подключение в футере
		wp_register_script('bootstrap_js', get_template_directory_uri() .'/js/bootstrap.js', false, false, true);
		wp_enqueue_script( 'bootstrap_js', get_template_directory_uri() . '/js/bootstrap.js', '1.0', array('jquery'));//подключение скрипта

	}
}

add_action('wp_enqueue_scripts', 'my_scripts_init');

//переключалка языков начало
function check_home_page(){
	if(get_page_name_not_mark()==''){
		return true;
	}else{
		return false;
	}
} //проверяет является ли текущая страница главной true/false

function check_is_search(){
	if(isset($_GET['s']) && $_GET['s']!=''){
		return true;
	}else{
		return false;
	}
}

function get_marker_of_page(){
	$page_marker = explode('-lang-', $_SERVER['REQUEST_URI'])[1];
	$page_marker = explode('/', $page_marker)[0];
//	$page_marker = explode('-lang-', $page_marker)[1];
//	echo $page_marker;
//	if($page_marker=='category'){
//		$page_marker = 'category/'.explode('/', $_SERVER['REQUEST_URI'])[3];
//		$page_marker = explode('-lang-', $page_marker)[1];
//	}
	return $page_marker;
}// возвращает языковой маркер текущей страницы

function get_page_name_not_mark(){
	$page_name = explode('/', $_SERVER['REQUEST_URI'])[1];
	$page_name = explode('-lang-', $page_name)[0];
	if($page_name=='category'){
		$page_name = 'category/'.explode('/', $_SERVER['REQUEST_URI'])[2];
		$page_name = explode('-lang-', $page_name)[0];
	}
	return $page_name;
}// возвращает название(url) текущей страницы без языкового маркера

function get_page_name_with_mark(){
	if(isset($_COOKIE['lang'])){
		if(check_home_page()){
			return "home"."-lang-".$_COOKIE['lang'];
		}
		if(isset($_GET['s'])){
			?>
		    <?php
			return '?s='.($_GET['s']);
		}
		$page_name = get_page_name_not_mark()."-lang-".$_COOKIE['lang'];
		return $page_name;
	}else{
		return get_page_name_not_mark();
	}
}// возвращает название(url) текущей страницы с языковым маркером

function set_lang_cookie(){
	if(isset($_POST['lang_switch'])&& !empty($_POST['lang_switch'])) {
		setcookie("lang", "", time() - 36000, 0, '/');
		setcookie("lang", $_POST['lang_switch'], 0, '/');
	}
}//устанавливает языковую куку

function delete_lang_cookie(){
	setcookie("lang", "", time() - 36000, 0, '/');
}//удаляет языковую куку


function check_page_lang($lang){
	if(get_marker_of_page() == '' && $lang=='ru'){
		return true;
	}
	if(get_marker_of_page() == $lang){
		return true;

	}else{
		return false;
	}
}//язык по умолчанию выставить здесь

function redirect_to_lang_page(){
	$extra = get_page_name_with_mark();
	if($_POST['lang_switch']=='ru' || $_COOKIE['lang']=='ru'){
		$extra = get_page_name_not_mark();
	}
	$host  = $_SERVER['HTTP_HOST'];
	$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');

	@header("Location: http://$host$uri/$extra");
}//язык по умолчанию выставить здесь

function change_lang_main(){
	set_lang_cookie();

	if(isset($_COOKIE['lang'])){
		if(check_page_lang($_COOKIE['lang']) == false){
			redirect_to_lang_page();
		}
	}

	if(isset($_POST['lang_switch'])){
		if(check_page_lang($_POST['lang_switch']) == false){
			redirect_to_lang_page();
		}
	}
}
//переключалка языков конец

// обрезка поста для превью начало
function the_truncated_post($symbol_amount) {
	$filtered = strip_tags( preg_replace('@<style[^>]*?>.*?</style>@si', '', preg_replace('@<script[^>]*?>.*?</script>@si', '', apply_filters('the_content', get_the_content()))) );
	echo substr($filtered, 0, strrpos(substr($filtered, 0, $symbol_amount), ' ')) . '...';
}
// обрезка поста для превью конец

//получение ID категории начало
function getCurrentCatID(){
		global $wp_query;
		if(is_category() || is_single()){
		$cat_ID = get_query_var('cat');
		}
	return $cat_ID;
}
//получение ID категории конец