<?php
/*
Template Name: Section - Image Right
*/
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
	</header><!-- .entry-header -->
	<div class="entry-content row">
		<div class="col-sm-7">
		<?php the_content(); ?>
		</div>

		<div class="col-sm-5">
				<?php if ( has_post_thumbnail() ) { ?>
						<?php the_post_thumbnail( 'large-image', array( 'class' => 'img-responsive' ) ); ?>
				<?php } ?>
		</div>

	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php edit_post_link( __( 'Edit', '_start' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
