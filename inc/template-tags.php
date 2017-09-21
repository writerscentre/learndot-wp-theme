<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package learndot
 */

if ( ! function_exists( 'learndot_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 */
	function learndot_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x( 'Posted on %s', 'post date', 'learndot' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( 'by %s', 'post author', 'learndot' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

	}
endif;

if ( ! function_exists( 'learndot_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function learndot_entry_footer() {
		
		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'learndot' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			),
			'<span class="edit-link">',
			'</span>'
		);

	}
endif; // if ( ! function_exists( 'learndot_entry_footer' ) ) :


if ( ! function_exists( 'learndot_current_user_name' ) ) :

function learndot_current_user_name() {
	$current_user = wp_get_current_user();

	return $current_user->display_name;
}

endif; //if ( ! function_exists( 'learndot_current_user_name' ) ) :


if ( ! function_exists( 'awc_excerpt_by_id' ) ) :
/*
* Gets the excerpt of a specific post ID or object
* @param - $post - object/int - the ID or object of the post to get the excerpt of
* @param - $length - int - the length of the excerpt in words
* @param - $tags - string - the allowed HTML tags. These will not be stripped out
* @param - $extra - string - text to append to the end of the excerpt
*/
function awc_excerpt_by_id($post, $length = 10, $tags = '<a>', $extra = ' ...') {
	$iid = 11111;
	
	if(is_int($post)) {
		// get the post object of the passed ID
		$iid = $post;
		$post = get_post($post);
	} elseif(!is_object($post)) {
		return false;
	}
	//echo $post->ID . '<br />';
	if(has_excerpt($post->ID)) {
		$the_excerpt = $post->post_excerpt;
		//return apply_filters('the_content', $the_excerpt, 100);
		return $the_excerpt;
	} else {
		$the_excerpt = $post->post_content;
	}
 
	$the_excerpt = strip_shortcodes(strip_tags($the_excerpt), $tags);
	$the_excerpt = preg_split('/\b/', $the_excerpt, $length * 2+1);
	$excerpt_waste = array_pop($the_excerpt);
	$the_excerpt = implode($the_excerpt);
	$the_excerpt .= $extra;
	//return apply_filters('the_content', $the_excerpt, 100);
	return $the_excerpt;
	
}

endif; // if ( ! function_exists( 'awc_excerpt_by_id' ) )  