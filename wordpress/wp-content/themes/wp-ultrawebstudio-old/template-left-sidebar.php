<?php 
/*
Template Name: Left Sidebar Page
*/

get_header(); ?>
	
		<div id="left-sidebar">

			<div id="sidebar_large">				
		
				<?php get_sidebar(); ?>	

			</div>

		</div>	
		
		<div class="custom_two_third2 last">
	
		<?php
			if ( have_posts() ) while ( have_posts() ) : the_post(); 
			
				the_content();
		
			endwhile;	?>	
	</div>
	
<?php

get_footer(); ?>