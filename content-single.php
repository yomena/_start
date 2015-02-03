<?php
/**
 * @package _start
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title">
			<?php _start_post_format_type(); ?><!-- Prints icons for Post Format type -->
			<?php the_title(); ?>
		</h1>
		<div class="entry-meta">
			<?php _start_posted_on(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', '_start' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php _start_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
