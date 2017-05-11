<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package pakt3
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<article class="span8">
				<h3 class="margTop1">Blog</h3>
				<ul class="list3 blog-box">
		<?php
		if ( have_posts() ) :

			/* Start the Loop */
			while ( have_posts() ) : the_post();
				?>
				<?php get_template_part( 'template-parts/content', 'post' );?>
			<?php
			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>
				</ul>
			</article>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();?>
<div style="clear: both;"></div>
<?php
get_footer();
?>
