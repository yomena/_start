<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package _start
 */
?>
	</div><!-- .row -->
	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="container">
			<div class="footer-widget-area">
				<div class="row">
					<div class="col-sm-3">
						<?php dynamic_sidebar( 'footer-1' ); ?>
					</div><!-- .col-sm-3 -->
					<div class="col-sm-3">
						<?php dynamic_sidebar( 'footer-2' ); ?>
					</div><!-- .col-sm-3 -->
					<div class="col-sm-3">
						<?php dynamic_sidebar( 'footer-3' ); ?>
					</div><!-- .col-sm-3 -->
					<div class="col-sm-3">
						<?php dynamic_sidebar( 'footer-4' ); ?>
					</div><!-- .col-sm-3 -->
				</div><!-- .row -->
			</div><!-- .footer-widget-area -->
		<div class="site-info">
			<span class="small"><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a> <?php echo date("Y"); ?></span>
			<a href="#page" class="pull-right"><i class="fa fa-chevron-circle-up" rel="tooltip" title="Back to Top"></i></a>
		</div><!-- .site-info -->
	</div><!-- .container -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
