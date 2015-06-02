	<?php		
	
	$exclude_cat = explode(',',of_get_option('swm_blog_exclude_categories'));	
	$items_per_page = of_get_option('swm_blog_posts_per_page');	
	
	$args = array(
		'category__not_in' => $exclude_cat,
		'order'	=> 'desc',
		'orderby'	=> 'date',
		'posts_per_page' => $items_per_page,
		'paged' => get_query_var( 'paged' )
	);
	
	$blog_query = new WP_Query($args); 
	
	while ($blog_query->have_posts()) : $blog_query->the_post();	
		
		$format = get_post_format();

		$swm_blog_sidebar_position = of_get_option('swm_blog_sidebar_position');
		if ($swm_blog_sidebar_position == 'left-sidebar') {	
			$sidebar_position = 'bp_left_sidebar';
		} else {
			$sidebar_position = '';
		}		
		
		if ( $format == 'aside' ) { ?>
			<div class="clear margin20"></div>
			<?php 
		} ?>

		<article class="blog_post <?php echo $sidebar_position; ?>">			

			<?php swm_display_blog_date_section(); ?>	

			<div class="post_wrapper">

					<?php swm_display_post_title_comments_meta(); ?>

				<div class="post_content featured_post">
					<?php swm_display_post_format(); 
							
					/* Display Post Summery/Excerpt */					
					$swm_show_excerpt = of_get_option('swm_show_excerpt');
					$swm_excerpt_length = of_get_option('swm_excerpt_length');
					$format = get_post_format();								
					
					if ( $format != 'quote' && $format != 'aside' ) { 
					
						if($swm_show_excerpt) { ?>
							<p> <?php
							swm_the_excerpt($swm_excerpt_length); ?>
							</p> <?php																	
							
						} else {
							the_content();
						} 
					}

					if ( $format == 'quote'  ||  $format == 'aside') {
						get_template_part( 'includes/' . $format );	
					}
					?>		
					
					<?php swm_display_post_button(); ?>					
					<div class="clear"></div>
				</div>
			</div>			
		</article> <!-- .blog_post -->	

		<div class="clear"></div>		
				
<?php endwhile; ?>	
		
	<?php swm_pagination($blog_query->max_num_pages);	?>