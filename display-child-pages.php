<?php
/*
Template Name: Display Child Pages
*/
?>

<?php get_header(); ?>




<?php

		global $wp_query;

		// is Page a parent page
		if ( $post->post_parent == 0 ) {

				// on a parent page, get child pages
				$pages = get_pages( 'hierarchical=0&sort_column=menu_order&parent=' . $post->ID );

				// loop through child pages
				foreach ( $pages as $post ){

						setup_postdata( $post );

						// get the template name for the child page
						$template_name = get_post_meta( $post->ID, '_wp_page_template', true );
						$template_name = ( 'default' == $template_name ) ? 'section-standart.php' : $template_name;

						// default page template_part content-page.php
						$slug = 'section-standart';

						// check if the slug exists for the child page
						if ( locate_template( basename( $template_name ) , $load, $require_once ) != '' ) {
								$slug = pathinfo( $template_name, PATHINFO_FILENAME );
						}

						// load the content template for the child page
						get_template_part( $slug );
				}
		}
		?>




<?php get_footer(); ?>
