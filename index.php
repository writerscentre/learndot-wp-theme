<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package learndot
 */

get_header(); ?>

<div class="row clearfix">
	<div id="primary" class="col col-md-8 content-area">
		<main id="main" class="site-main">
		

		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) : ?>
				<header class="index-header">
					<span class="screen-reader-text"><?php single_post_title(); ?></span>
					<h1 class="page-title"><?php single_post_title(); ?></h1>
				</header>

			<?php
			endif;

			
			while ( have_posts() ) : the_post();
				if ( is_singular() ) :
					get_template_part( 'template-parts/content', get_post_format() );
				else:
					get_template_part( 'template-parts/content', 'excerpt' );	
				endif;
				
				

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>

</div>

<?php
get_footer();
