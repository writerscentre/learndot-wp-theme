<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package learndot
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(' post-excerpt' ); ?>>
	<header class="entry-header">
		<?php		
			the_title( '<h2 class="excerpt-entry-title entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		 ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			echo awc_excerpt_by_id(get_the_ID(), 40);			
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php learndot_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
