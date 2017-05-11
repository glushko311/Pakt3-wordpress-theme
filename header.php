<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package pakt3
 */
change_lang_main();//запуск переключалки(function.php)


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Home</title>
	<meta charset="utf-8">
	<link rel="icon" href="<?php bloginfo("template_directory"); ?>/img/favicon.ico" type="image/x-icon">
	<link rel="shortcut icon" href="<?php bloginfo("template_directory"); ?>/img/favicon.ico" type="image/x-icon" />
	<meta name="description" content="Your description">
	<meta name="keywords" content="Your keywords">
	<meta name="author" content="Your name">
	<meta name = "format-detection" content = "telephone=no" />
	<meta name="viewport" content="width=device-width,initial-scale=1.0">

	<!--JS-->
	<?php wp_head(); ?>

	<script>
		$(document).ready(function(){
			jQuery('.camera_wrap').camera();
			function goToByScroll(id){$('html,body').animate({scrollTop: $("#"+id).offset().top},'slow');}
		});
	</script>

	<!--[if lt IE 8]>
	<div style='text-align:center'>
		<a href="http://www.microsoft.com/windows/internet-explorer/default.aspx?ocid=ie6_countdown_bannercode">
			<img src="http://www.theie6countdown.com/img/upgrade.jpg"border="0"alt=""/>
		</a>
	</div>
	<![endif]-->

</head>
<body <?php body_class(); ?> >
<header>
	<div class="container">
		<h1 class="brand">
			<a href="http://pakt3.foss-art-soft.com/">
				<?php the_custom_logo(); ?>
			</a>
		</h1>

		<div class="container-search">
			<form id="search" class="search" action="http://pakt3.foss-art-soft.com/"  method="GET" accept-charset="utf-8">
				<input type="text" onfocus="if(this.value =='' ) this.value=''" onblur="if(this.value=='') this.value=''" value="" name="s">
				<a href="#" onClick="document.getElementById('search').submit()"><img src="<?php bloginfo("template_directory"); ?>/img/magnify.png" alt=""></a>
			</form>
			<form class="lang_switch_form" action="" method="POST">
				<select class="lang_switch_select" name="lang_switch" id="lang_switch1">
					<option <?php if(!isset($_COOKIE['lang']) || $_COOKIE['lang']=='ru'){echo 'selected';}?> value="ru">Русский</option>
					<option <?php if(isset($_COOKIE['lang']) && $_COOKIE['lang']=='en'){echo 'selected';}?> value="en">English</option>
					<option <?php if(isset($_COOKIE['lang']) && $_COOKIE['lang']=='ua'){echo 'selected';}?> value="ua">Українська</option>
<!--				<option --><?php //if(isset($_COOKIE['lang']) && $_COOKIE['lang']=='ih'){echo 'selected';}?><!-- value="ih">ייִדיש</option>-->

				</select>
			</form>
		</div>

	</div>
	<div class="container">
		<div class="navbar navbar_ clearfix">
			<div class="navbar-inner">
				<div class="clearfix">
					<div class="nav-collapse nav-collapse_ collapse">
							<?php
							switch(get_marker_of_page()){
								case 'ru':
									$menu_id = 'primary';
									break;
								case 'en':
									$menu_id = 'primary_en';
									break;
								case 'ua':
									$menu_id = 'primary_ua';
									break;
								case 'ih':
									$menu_id = 'primary_ih';
									break;
								default:
									$menu_id = 'primary';
							}
							wp_nav_menu(array(
									'theme_location' => $menu_id,
									'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
									'menu_class' => 'nav sf-menu clearfix',
									'depth' => 3,
									'walker' => new magomra_walker_nav_menu()
							)); ?>

					</div>
				</div>
			</div>
		</div>

		<?php
		//* Do NOT include the opening php tag
		// Nav Menu Dropdown Class
//		include_once('wordpress/wp-content/themes/pakt3/lib/classes/nav-menu-dropdown.php' );
//		wp_nav_menu( array(
//			// 'theme_location' => 'mobile',
//				'menu'           => 'mobile',
//				'walker'         => new Walker_Nav_Menu_Dropdown(),
//				'items_wrap'     => '<div class="mobile-menu"><form><select class="select-menu" onchange="if (this.value) window.location.href=this.value">%3$s</select></form></div>'
//		) );
		?>
	</div>
	<div class="shadow">
		<div class="container">
			<div class="row">
				<article class="span12">
					<figure><img src="<?php bloginfo("template_directory"); ?>/img/shadow.png" alt="shadow"></figure>
				</article>
			</div>
		</div>
	</div>
</header>


<!--<!DOCTYPE html>-->
<!--<html --><?php //language_attributes(); ?><!-->
<!--<head>-->
<!--<meta charset="--><?php //bloginfo( 'charset' ); ?><!--">-->
<!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
<!--<link rel="profile" href="http://gmpg.org/xfn/11">-->
<!---->
<?php //wp_head(); ?>
<!--</head>-->
<!---->
<!--<body --><?php //body_class(); ?><!-->
<!--<div id="page" class="site">-->
<!--	<a class="skip-link screen-reader-text" href="#content">--><?php //esc_html_e( 'Skip to content', 'pakt3' ); ?><!--</a>-->
<!---->
<!--	<header id="masthead" class="site-header" role="banner">-->
<!--		<div class="site-branding">-->
<!--			--><?php
//			if ( is_front_page() && is_home() ) : ?>
<!--				<h1 class="site-title"><a href="--><?php //echo esc_url( home_url( '/' ) ); ?><!--" rel="home">--><?php //bloginfo( 'name' ); ?><!--</a></h1>-->
<!--			--><?php //else : ?>
<!--				<p class="site-title"><a href="--><?php //echo esc_url( home_url( '/' ) ); ?><!--" rel="home">--><?php //bloginfo( 'name' ); ?><!--</a></p>-->
<!--			--><?php
//			endif;
//
//			$description = get_bloginfo( 'description', 'display' );
//			if ( $description || is_customize_preview() ) : ?>
<!--				<p class="site-description">--><?php //echo $description; /* WPCS: xss ok. */ ?><!--</p>-->
<!--			--><?php
//			endif; ?>
<!--		</div><!-- .site-branding -->
<!---->
<!--		<nav id="site-navigation" class="main-navigation" role="navigation">-->
<!--			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">--><?php //esc_html_e( 'Primary Menu', 'pakt3' ); ?><!--</button>-->
<!--			--><?php //wp_nav_menu( array( 'theme_location' => 'menu-1', 'menu_id' => 'primary-menu' ) ); ?>
<!--		</nav><!-- #site-navigation -->
<!--	</header><!-- #masthead -->
<!---->
<!--	<div id="content" class="site-content">-->


