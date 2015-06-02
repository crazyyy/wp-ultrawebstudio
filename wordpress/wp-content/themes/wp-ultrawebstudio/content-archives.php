		
		
		<?php

			$swm_archives_pagination 		= get_post_meta(get_the_id(), 'swm_archives_pagination', true);
			$swm_onoff_archives_month 		= get_post_meta(get_the_id(), 'swm_onoff_archives_month', true);
			$swm_onoff_archives_categories 	= get_post_meta(get_the_id(), 'swm_onoff_archives_categories', true);
		
			/* ----------------------------------------------------------------------------------
				Query
			---------------------------------------------------------------------------------- */

			$exclude_cat = explode(',',of_get_option('swm_archives_exclude_categories'));
			$items_per_page = of_get_option('swm_archives_posts_per_page');	
			
			$args = array(
				'category__not_in' => $exclude_cat,
				'order'	=> 'asc',
				'orderby'	=> 'menu_order',
				'posts_per_page' => $swm_archives_pagination,
				'paged' => get_query_var( 'paged' )
			);
			$blog_query = new WP_Query($args); 
			
			/* ----------------------------------------------------------------------------------
				Posts List
			---------------------------------------------------------------------------------- */
			?>
			<div class="archives-table">
				<ul>
				
					<li class="tbl-heading">						
						<span class="date">Date</span>
						<span class="post">Post</span>						
					</li> <?php
					
					if (have_posts()) : while ($blog_query->have_posts()) : $blog_query->the_post(); ?>				
					
					<li <?php post_class(); ?> id="post-<?php the_ID(); ?>">
						<span class="date"><?php the_time('Y.m.d') ?></span>
						<span class="post">
							<a href="<?php the_permalink() ?>" title="<?php the_title_attribute() ?>" rel="bookmark"><?php the_title() ?></a>
						</span>					
					</li>			
					
					<?php endwhile; ?>
					<?php endif; ?>	
				
				</ul>
				<div class="clear"></div>
			</div>				
			
			<?php 
			
			/* ----------------------------------------------------------------------------------
				Pagination
			---------------------------------------------------------------------------------- */
			
			swm_pagination($blog_query->max_num_pages);	?>		
		
			<div class="clear"></div>			
		
			<?php
			/* ----------------------------------------------------------------------------------
				Archives by Month and Categories
			---------------------------------------------------------------------------------- */
			

			if ($swm_onoff_archives_month) {

			?>						
			
				<div class="one_third">
				<h4><?php _e('Archives by Month:', 'swmtranslate')?></h4>
				<ul>
					<?php wp_get_archives('type=monthly'); ?>
				</ul>
				</div>
				<?php
			}
			
			if ($swm_onoff_archives_categories) {

			?>
			
				<div class="one_third last">
				<h4><?php _e('Archives by Categories:', 'swmtranslate')?></h4>
				<ul>
					 <?php wp_list_categories(); ?>
				</ul>
				</div>
				<?php
			}

			?>
			
	