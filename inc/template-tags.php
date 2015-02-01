<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package about_blank
 */

if ( ! function_exists( 'the_posts_navigation' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 *
 * @todo Remove this function when WordPress 4.3 is released.
 */
function the_posts_navigation() {
	// Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}
	?>
	<nav class="navigation posts-navigation" role="navigation">
		<h2 class="screen-reader-text"><?php _e( 'Posts navigation', 'about_blank' ); ?></h2>
		<div class="nav-links">

			<?php if ( get_next_posts_link() ) : ?>
			<div class="nav-previous"><?php next_posts_link( __( 'Older posts', 'about_blank' ) ); ?></div>
			<?php endif; ?>

			<?php if ( get_previous_posts_link() ) : ?>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts', 'about_blank' ) ); ?></div>
			<?php endif; ?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'about_blank_the_post_navigation' ) ) :
/**
 * Display navigation to next/previous post when applicable.
 *
 * @todo Remove this function when WordPress 4.3 is released.
 */
function about_blank_the_post_navigation() {
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {
		return;
	}
	?>
	<nav class="navigation post-navigation" role="navigation">

		<ul class="pager">
			<?php
				previous_post_link( '<li class="previous">%link</li>', '&larr; %title' );
				next_post_link( '<li class="next">%link</li>', '%title &rarr;' );
			?>
		</ul>
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'about_blank_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function about_blank_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time> updated: <time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		_x( '%s', 'post date', 'about_blank' ),
		$time_string
	);

	$byline = sprintf(
		_x( '%s', 'post author', 'about_blank' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	echo '<span class="posted-on small"><i class="fa fa-calendar"  Title="Date" rel="tooltip"></i>&nbsp;' . $posted_on . '</span><span class="byline small"> | <i class="fa fa-user Title="Author" rel="tooltip"></i>&nbsp; ' . $byline . '</span>';

}
endif;

if ( ! function_exists( 'about_blank_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function about_blank_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' == get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( __( ', ', 'about_blank' ) );
		if ( $categories_list && about_blank_categorized_blog() ) {
			printf( '<span class="cat-links small"><i class="fa fa-folder" title="Categories" rel="tooltip"></i>&nbsp;' . __( '%1$s', 'about_blank' ) . '</span> ', $categories_list );
		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', __( ', ', 'about_blank' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links small"><i class="fa fa-tags" title="Tags" rel="tooltip"></i>&nbsp;' . __( '%1$s', 'about_blank' ) . '</span> ', $tags_list );
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link small"><i class="fa fa-comments" Title="Comments" rel="tooltip"></i>&nbsp;';
		comments_popup_link( __( 'Leave a comment', 'about_blank' ), __( '1 ', 'about_blank' ), __( '% ', 'about_blank' ) );
		echo '</span>';
	}

	edit_post_link( __( 'Edit', 'about_blank' ), '<div class="edit-link"><i class="fa fa-edit"></i>&nbsp;', '</div>' );
}
endif;

if ( ! function_exists( 'the_archive_title' ) ) :
/**
 * Shim for `the_archive_title()`.
 *
 * Display the archive title based on the queried object.
 *
 * @todo Remove this function when WordPress 4.3 is released.
 *
 * @param string $before Optional. Content to prepend to the title. Default empty.
 * @param string $after  Optional. Content to append to the title. Default empty.
 */
function the_archive_title( $before = '', $after = '' ) {
	if ( is_category() ) {
		$title = sprintf( __( 'Category: %s', 'about_blank' ), single_cat_title( '', false ) );
	} elseif ( is_tag() ) {
		$title = sprintf( __( 'Tag: %s', 'about_blank' ), single_tag_title( '', false ) );
	} elseif ( is_author() ) {
		$title = sprintf( __( 'Author: %s', 'about_blank' ), '<span class="vcard">' . get_the_author() . '</span>' );
	} elseif ( is_year() ) {
		$title = sprintf( __( 'Year: %s', 'about_blank' ), get_the_date( _x( 'Y', 'yearly archives date format', 'about_blank' ) ) );
	} elseif ( is_month() ) {
		$title = sprintf( __( 'Month: %s', 'about_blank' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'about_blank' ) ) );
	} elseif ( is_day() ) {
		$title = sprintf( __( 'Day: %s', 'about_blank' ), get_the_date( _x( 'F j, Y', 'daily archives date format', 'about_blank' ) ) );
	} elseif ( is_tax( 'post_format' ) ) {
		if ( is_tax( 'post_format', 'post-format-aside' ) ) {
			$title = _x( 'Asides', 'post format archive title', 'about_blank' );
		} elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) {
			$title = _x( 'Galleries', 'post format archive title', 'about_blank' );
		} elseif ( is_tax( 'post_format', 'post-format-image' ) ) {
			$title = _x( 'Images', 'post format archive title', 'about_blank' );
		} elseif ( is_tax( 'post_format', 'post-format-video' ) ) {
			$title = _x( 'Videos', 'post format archive title', 'about_blank' );
		} elseif ( is_tax( 'post_format', 'post-format-quote' ) ) {
			$title = _x( 'Quotes', 'post format archive title', 'about_blank' );
		} elseif ( is_tax( 'post_format', 'post-format-link' ) ) {
			$title = _x( 'Links', 'post format archive title', 'about_blank' );
		} elseif ( is_tax( 'post_format', 'post-format-status' ) ) {
			$title = _x( 'Statuses', 'post format archive title', 'about_blank' );
		} elseif ( is_tax( 'post_format', 'post-format-audio' ) ) {
			$title = _x( 'Audio', 'post format archive title', 'about_blank' );
		} elseif ( is_tax( 'post_format', 'post-format-chat' ) ) {
			$title = _x( 'Chats', 'post format archive title', 'about_blank' );
		}
	} elseif ( is_post_type_archive() ) {
		$title = sprintf( __( 'Archives: %s', 'about_blank' ), post_type_archive_title( '', false ) );
	} elseif ( is_tax() ) {
		$tax = get_taxonomy( get_queried_object()->taxonomy );
		/* translators: 1: Taxonomy singular name, 2: Current taxonomy term */
		$title = sprintf( __( '%1$s: %2$s', 'about_blank' ), $tax->labels->singular_name, single_term_title( '', false ) );
	} else {
		$title = __( 'Archives', 'about_blank' );
	}

	/**
	 * Filter the archive title.
	 *
	 * @param string $title Archive title to be displayed.
	 */
	$title = apply_filters( 'get_the_archive_title', $title );

	if ( ! empty( $title ) ) {
		echo $before . $title . $after;
	}
}
endif;

if ( ! function_exists( 'the_archive_description' ) ) :
/**
 * Shim for `the_archive_description()`.
 *
 * Display category, tag, or term description.
 *
 * @todo Remove this function when WordPress 4.3 is released.
 *
 * @param string $before Optional. Content to prepend to the description. Default empty.
 * @param string $after  Optional. Content to append to the description. Default empty.
 */
function the_archive_description( $before = '', $after = '' ) {
	$description = apply_filters( 'get_the_archive_description', term_description() );

	if ( ! empty( $description ) ) {
		/**
		 * Filter the archive description.
		 *
		 * @see term_description()
		 *
		 * @param string $description Archive description to be displayed.
		 */
		echo $before . $description . $after;
	}
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function about_blank_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'about_blank_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'about_blank_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so about_blank_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so about_blank_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in about_blank_categorized_blog.
 */
function about_blank_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'about_blank_categories' );
}
add_action( 'edit_category', 'about_blank_category_transient_flusher' );
add_action( 'save_post',     'about_blank_category_transient_flusher' );


if ( ! function_exists( 'about_blank_post_format_type' ) ) :
/**
* Prints icons for different Post Format types.
*/
function about_blank_post_format_type() {
	// Hide category and tag text for pages.
	if ( has_post_format( 'aside' )) {
			echo '<i class="fa fa-file-o"></i>';
	}

	if ( has_post_format( 'image' )) {
			echo '<i class="fa fa-picture-o"></i>';
	}

	if ( has_post_format( 'video' )) {
			echo '<i class="fa fa-video-camera"></i>';
	}

	if ( has_post_format( 'quote' )) {
			echo '<i class="fa fa-quote-left"></i>';
	}

	if ( has_post_format( 'link' )) {
			echo '<i class="fa fa-link"></i>';
	}
}
endif;
