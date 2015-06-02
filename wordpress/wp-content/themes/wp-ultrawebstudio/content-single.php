<?php

/* ----------------------------------------------------------------------------------
	Post Details
---------------------------------------------------------------------------------- */	
				
if (have_posts()) : while (have_posts()) : the_post();			
	
	$postType = get_post_type();

	if ($postType == 'portfolio') {
		
		the_content();
		
	} else { 		
		
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
					
					if ( $format == 'quote') {
						get_template_part( 'includes/' . $format );	
					} else {
							the_content();
					} 
					?>		
					
					<?php swm_display_post_button(); ?>					
					<div class="clear"></div>
				</div>
			</div>			
		</article> <!-- .blog_post -->	

		<div class="clear"></div>
		
		<?php
		
		/* ----------------------------------------------------------------------------------
			About Author Box
		---------------------------------------------------------------------------------- */		
		
		$swm_about_author_box = of_get_option('swm_about_author_box');
		$url = get_the_author_meta( 'user_login' );
		$url = str_replace(' ' , '-', $url );
		
		if(get_query_var('author_name')) :
			$curauth = get_userdatabylogin(get_query_var('author_name'));
		else :
			$curauth = get_userdata(get_query_var('author'));
		endif;	
		
		if ($swm_about_author_box) { ?>				
			
			<div class="about_author">
				<h4 class="title_line"><span><?php _e('About the Author', 'swmtranslate'); ?></span></h4>	

				<a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>">
					<?php echo get_avatar(get_the_author_meta('email'),$size='75',$default=get_template_directory_uri().'/images/thumbs/blog-author.jpg' ); ?>
				</a>			

				<p><?php the_author_meta('description'); ?></p>	
							
			</div>

			<div class="clear"></div>				
		
		<?php }	
		
		
		/* ----------------------------------------------------------------------------------
			Post Comments
		---------------------------------------------------------------------------------- */	
		
		$swm_post_comments = of_get_option('swm_post_comments');
		
		if ($swm_post_comments) {
		
			comments_template('', true); 		
		
		}
		
	}		
	
endwhile;
endif; 
?>