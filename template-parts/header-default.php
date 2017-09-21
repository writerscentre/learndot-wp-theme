<?php
/**
 * Default Topbar template
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package learndot
 */

?>

<header id="masthead" class="site-header">

	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container">
	    <div class="navbar-header">
	    	<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#awc-topbar-nav" aria-expanded="false">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
	      	</button>
    		<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
	      	<?php 
		      	$custom_logo_id = get_theme_mod( 'custom_logo' );
				$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
				if ( has_custom_logo() ) {
				        echo '<img src="'. esc_url( $logo[0] ) .'">';
				} else {
				        echo '<h1>'. get_bloginfo( 'name' ) .'</h1>';
				} 
			?>
			</a>

	    </div>
		<div class="collapse navbar-collapse" id="awc-topbar-nav">
			<?php

				

				wp_nav_menu( array(
					'theme_location' 	=> 'titlebar',
					'menu_id'        	=> 'primary-nav',
					'menu_class'	 	=> 'nav navbar-nav',
					'container'		 	=> 'ul',
					'fallback_cb'		=> function () { return; }
				) );

				
				
			?>
			
			</ul>
		
		
			<ul class="nav navbar-nav navbar-right">

			<?php if( is_user_logged_in() ) : ?>

				<li class="dropdown">			
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">	
						<span class="topbar-user-name navbar-text"><?php echo learndot_current_user_name(); ?></span>
						<?php echo get_avatar( get_current_user_id(), 40); ?>	
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
			           <?php
							wp_nav_menu( array(
								'theme_location' 	=> 'profile',
								'menu_id'        	=> 'profile-dropdown',
								'menu_class'	 	=> 'profile-nav',
								'container'	=> 'ul',
								'items_wrap' => '%3$s',
								'fallback_cb'		=> function () { return; }
							) );
						?>
			            <li role="separator" class="divider"></li>
			            <li><a href="#"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></li>
		         	</ul>
				</li>

			<?php else : ?>

				<li><button type="button" class="btn btn-primary navbar-btn"><i class="fa fa-sign-in" aria-hidden="true"></i> Sign in</button></li>

			<?php endif; ?>
			</ul>		
	  	</div>
	  	</div>

	</nav>

	
</header><!-- #masthead -->
