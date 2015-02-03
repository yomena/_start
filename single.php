<?php
/**
 * The template for displaying all single posts.
 *
 * @package _start
 */

get_header(); ?>

	<div id="primary" class="content-area col-sm-8"><!-- Set col-sm- to 12 when no sidebar, otherwise to 8 -->
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'single' ); ?>

			<?php _start_the_post_navigation(); ?>


			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			?>

		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?><!-- If you remove the Sidebar, set col-sm- to 12 on line 10 -->
<?php get_footer(); ?>
