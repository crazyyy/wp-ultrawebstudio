<?php 

get_header(); ?>
		
	<!-- *************************************** -->	
	<div class="custom_two_third2">
	
	<?php
	if ( have_posts() ) while ( have_posts() ) : the_post();	
	
	the_content();
	wp_link_pages(array('before' => '<p><strong>'.__('Pages:', 'framework').'</strong> ', 'after' => '</p>', 'next_or_number' => 'number'));
	
	endwhile;		
	?>
	
	</div>	

	<div id="sidebar_large">				
		
		<?php get_sidebar(); ?>	

	</div>

<?php

get_footer(); 

?>