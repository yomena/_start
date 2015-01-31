<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package about_blank
 */
?>

<section class="no-results not-found">
	<header class="page-header">
		<h1 class="page-title"><?php _e( 'Nothing Found', 'about_blank' ); ?></h1>
	</header><!-- .page-header -->

	<div class="page-content">
		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<div class="alert alert-info" role="alert"><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'about_blank' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></div>

		<?php elseif ( is_search() ) : ?>

			<div class="alert alert-warning" role="alert"><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'about_blank' ); ?></div>
			<?php get_search_form(); ?>

		<?php else : ?>

			<div class="alert alert-warning" role="alert"><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'about_blank' ); ?></div>
			<?php get_search_form(); ?>

		<?php endif; ?>
	</div><!-- .page-content -->
</section><!-- .no-results -->
