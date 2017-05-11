<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package pakt3
 */

get_header(); ?>

	<div class="container padBot">
		<div class="row">
			<article class="span6 offset1 error">
				<img src="<?php bloginfo("template_directory"); ?>/img/error.jpg" alt="error404">
			</article>
			<article class="span4 error-search">
				<h3>Sorry!<br>Page not found</h3>
				<p class="margBot3">The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.</p>
				<p class="margBot3">Please try using our search box below to look for information on the internet.</p>
				<div class="row">
					<article class="span3">
						<form id="search-404" class="search" action="http://foss-art-soft.shilov.dn.ua/pakt3/"  method="GET" accept-charset="utf-8">
							<input type="text" onfocus="if(this.value =='' ) this.value=''" onblur="if(this.value=='') this.value=''" value="" name="s">
							<a href="#" onClick="document.getElementById('search-404').submit()" class="btn btn-primary">Search</a>
						</form>
<!--						--><?php //get_search_form(); ?>
<!--						<form id="search-404" class="search"  action="search.php" method="GET" accept-charset="utf-8">-->
<!--							<input type="text" onfocus="if(this.value =='' ) this.value=''" onblur="if(this.value=='') this.value=''" value="" name="s">-->
<!--							<a href="#" onClick="document.getElementById('search').submit()"><img src="--><?php //bloginfo("template_directory"); ?><!--/img/magnify.png" alt=""></a>-->
<!--						</form>-->
					</article>
				</div>
			</article>
		</div>
	</div>
<!--	<div id="primary" class="content-area">-->
<!--		<main id="main" class="site-main" role="main">-->
<!---->
<!--			<section class="error-404 not-found">-->
<!--				<header class="page-header">-->
<!--					<h1 class="page-title">--><?php //esc_html_e( 'Oops! That page can&rsquo;t be found.', 'pakt3' ); ?><!--</h1>-->
<!--				</header><!-- .page-header -->
<!---->
<!--				<div class="page-content">-->
<!--					<p>--><?php //esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'pakt3' ); ?><!--</p>-->
<!---->
<!--					--><?php
//						get_search_form();
//
//						the_widget( 'WP_Widget_Recent_Posts' );
//
//						// Only show the widget if site has multiple categories.
//						if ( pakt3_categorized_blog() ) :
//					?>
<!---->
<!--					<div class="widget widget_categories">-->
<!--						<h2 class="widget-title">--><?php //esc_html_e( 'Most Used Categories', 'pakt3' ); ?><!--</h2>-->
<!--						<ul>-->
<!--						--><?php
//							wp_list_categories( array(
//								'orderby'    => 'count',
//								'order'      => 'DESC',
//								'show_count' => 1,
//								'title_li'   => '',
//								'number'     => 10,
//							) );
//						?>
<!--						</ul>-->
<!--					</div><!-- .widget -->
<!---->
<!--					--><?php
//						endif;
//
//						/* translators: %1$s: smiley */
//						$archive_content = '<p>' . sprintf( esc_html__( 'Try looking in the monthly archives. %1$s', 'pakt3' ), convert_smilies( ':)' ) ) . '</p>';
//						the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$archive_content" );
//
//						the_widget( 'WP_Widget_Tag_Cloud' );
//					?>
<!---->
<!--				</div><!-- .page-content -->
<!--			</section><!-- .error-404 -->
<!---->
<!--		</main><!-- #main -->
<!--	</div><!-- #primary -->

<?php
get_footer();
