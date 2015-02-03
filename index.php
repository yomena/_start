<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package _start
 */

get_header(); ?>

	<div id="primary" class="content-area col-sm-8"><!-- Set col-sm- to 12 when no sidebar, otherwise to 8 -->
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<?php /* _start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'content', get_post_format() );
				?>

			<?php endwhile; ?>

			<?php _start_pagination($pages = '', $range = 2); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?><!-- If you remove the Sidebar, set col-sm- to 12 on line 10 -->
<?php get_footer(); ?>
