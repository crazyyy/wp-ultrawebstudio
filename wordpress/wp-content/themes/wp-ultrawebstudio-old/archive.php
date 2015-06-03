<?php 

get_header();
	
	/* Display blog posts with sidebar */
	
	$swm_blog_sidebar_position = of_get_option('swm_blog_sidebar_position');	
	
	if ($swm_blog_sidebar_position == 'left-sidebar') {	?>
	
		<div id="left-sidebar">

			<div id="sidebar_large">				
		
				<?php get_sidebar(); ?>	

			</div>

		</div>	
		
		<div class="custom_two_third2 last">
		
			<?php get_template_part('content', 'archive'); ?>

		</div>
		
	<?php } else { ?>
		
		<div class="custom_two_third2">
		
			<?php get_template_part('content', 'archive'); ?>

		</div>
		
		<div id="sidebar_large">				
		
			<?php get_sidebar(); ?>	

		</div>
		
	<?php }	
 
get_footer(); 

?>
