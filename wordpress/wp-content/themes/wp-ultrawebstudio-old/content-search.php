<ul class="search-list">	
		
		<?php

		/* ----------------------------------------------------------------------------------
			Search List
		---------------------------------------------------------------------------------- */	
		
		if ( have_posts() ) : 
			while (have_posts()) : the_post(); ?>					
				
				<li>
					<h5><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h5>
					<p>
						<?php
						ob_start();
						the_content();
						$old_content = ob_get_clean();
						$new_content = strip_tags($old_content);
						echo substr($new_content,0,300).'...';
						?>
					</p>
				</li>
						

		<?php endwhile; 

		else: ?>
			
			<h3><?php _e('No Results Found.', 'swmtranslate'); ?></h3>
			
			<p><?php _e('We\'re sorry, but the page you requested could not be found. Try refining your search, or use the navigation above to locate the post.', 'swmtranslate'); ?></p>

	<?php endif; ?>		
</ul>
	
	<?php 
	
	/* ----------------------------------------------------------------------------------
		Pagination
	---------------------------------------------------------------------------------- */	
	
	 /* Display navigation to next/previous pages when applicable */ ?>
<?php if (  $wp_query->max_num_pages > 1 ) : ?>
			 <?php if(function_exists('swm_pagination')) { ?>
				 <?php swm_pagination(); ?> <br /><br />
			 <?php }else{ ?>
				<div id="nav-below" class="navigation">
					<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&laquo;</span> Older', 'templatesquare' ) ); ?></div>
					<div class="nav-next"><?php previous_posts_link( __( 'Newer <span class="meta-nav">&raquo;</span>', 'templatesquare' ) ); ?></div>
				</div><!-- #nav-below -->
			<?php }?>
<?php endif; ?>