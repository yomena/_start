<?php
/**
 * @package _start
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title">
		<?php _start_post_format_type(); ?><!-- Prints icons for Post Format type -->
			<?php the_title( sprintf( '<a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a>' ); ?>
		</h1>

		<?php if ( 'post' == get_post_type() ) : ?>



		<div class="entry-meta">
			<?php _start_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content media">

		<?php	if ( has_post_thumbnail() ) : ?>
			<div class="media-left">
				<?php the_post_thumbnail(thumbnail);?>
			</div>
		<?php endif; ?>

	<div class="media-body">
		<?php
			/* translators: %s: Name of current post */
			the_content( sprintf(
				__( 'Continue reading <span class="meta-nav">...</span>', '_start' ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );
		?>

		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', '_start' ),
				'after'  => '</div>',
			) );
		?>

		<footer class="entry-footer">
			<?php _start_entry_footer(); ?>
		</footer><!-- .entry-footer -->
	</div><!-- .media-body -->

</div><!-- .entry-content -->






</article><!-- #post-## -->
