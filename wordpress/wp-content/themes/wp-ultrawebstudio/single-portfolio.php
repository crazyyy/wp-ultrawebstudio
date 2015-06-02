<?php 

get_header(); 
			$swm_blog_sidebar_position = of_get_option('swm_blog_sidebar_position');
			$swm_portfolio_single_options = of_get_option('swm_portfolio_single_options');		
			
			if ($swm_portfolio_single_options == 'portfolio-with-fullwidth') { 
			
				if (have_posts()) :
				while (have_posts()) : the_post();
				the_content('');
				endwhile;					
				endif;			
			
			} else {			
			
				if ($swm_portfolio_single_options == 'portfolio-with-left-sidebar') {	?>
					
					<div id="left-sidebar">				
						<div id="sidebar">							
							<?php dynamic_sidebar('Portfolio Single Page Sidebar'); ?>								
						</div>										
					</div>
					
					<div class="custom_two_third last"> <?php
					
						if (have_posts()) :
						while (have_posts()) : the_post();
						the_content('');
						endwhile;					
						endif;	
				?>

					</div>
					
				<?php } else { ?>
					
					<div class="custom_two_third"> <?php
					
						if (have_posts()) :
						while (have_posts()) : the_post();
						the_content('');
						endwhile;					
						endif;	
					?>

					</div>
					
					
					<div id="sidebar">							
						<?php dynamic_sidebar('Portfolio Single Page Sidebar'); ?>								
					</div>				
					
					
				<?php }	
			}		
 
get_footer(); 

?>