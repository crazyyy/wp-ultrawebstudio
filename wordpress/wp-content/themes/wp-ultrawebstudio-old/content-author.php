

	<?php
		
	/* ----------------------------------------------------------------------------------
		Author Name, Avatar, Description and Website Details
	---------------------------------------------------------------------------------- */		
	if ( have_posts() ) : the_post();
	if(get_query_var('author_name')) :
		$curauth = get_userdatabylogin(get_query_var('author_name'));
	else :
		$curauth = get_userdata(get_query_var('author'));
	endif;
	?>

	<!-- .......... About Author .......... -->	
			
	<div class="about_author">
		<h4 class="title_line"><span><?php _e('About the Author', 'swmtranslate'); ?></span></h4>	

		<a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>">
			<?php echo get_avatar(get_the_author_meta('email'),$size='95',$default=get_template_directory_uri().'/images/thumbs/blog-author.jpg' ); ?>
		</a>			

		<p><?php the_author_meta('description'); ?></p>	
					
		<?php if ($curauth->user_url) { ?>

			<p style="margin-top:10px;"><strong><?php _e('Website:', 'swmtranslate')?></strong> <a href="<?php echo $curauth->user_url; ?>"><?php echo $curauth->user_url; ?></a></p>
	
		<?php } ?>
					
	</div>

	<div class="clear"></div>
	<div class="divider"></div>		
	
	<?php endif; ?>		

	<ul class="clear">		
		
		<?php

		/* ----------------------------------------------------------------------------------
			Author Posts List
		---------------------------------------------------------------------------------- */	
		
		rewind_posts();
		
		if ( have_posts() ) : 
			while (have_posts()) : the_post();
							
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

			<?php endwhile; else: ?>
			<p><?php _e('No posts by this author.', 'swmtranslate'); ?></p>

		<?php endif; ?>		
	</ul>
	
	<?php 
	
	/* ----------------------------------------------------------------------------------
		Pagination
	---------------------------------------------------------------------------------- */	
	
	 /* Display navigation to next/previous pages when applicable */ ?>
<?php if (  $wp_query->max_num_pages > 1 ) : ?>
			 <?php if(function_exists('swm_pagination')) { ?>
				 <?php swm_pagination(); ?>
			 <?php }else{ ?>
				<div id="nav-below" class="navigation">
					<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&laquo;</span> Older', 'templatesquare' ) ); ?></div>
					<div class="nav-next"><?php previous_posts_link( __( 'Newer <span class="meta-nav">&raquo;</span>', 'templatesquare' ) ); ?></div>
				</div><!-- #nav-below -->
			<?php }?>
<?php endif; ?>