<?php if (!is_front_page()){ ?>		
	
	<!-- ...................... Title / Search / Breadcrumbs ...................... -->				
	<div id="title-bar">
		<h1><?php swm_get_inner_title(); ?></h1>
		
		<?php 
		if (of_get_option('swm_breadcrumbs')) {		
		
		?>
		
		<!--Breadcrumb-->
		<div id="breadcrumb">
			
			<ul>
			
				<?php $home = __( 'Home', 'swmtranslate' ); ?>			
				
				<li class="breadcrumb-home"><a href="<?php echo home_url(); ?>"><?php esc_html_e('Home','swmtranslate') ?></a></li>
				
					<?php
					
					if(get_query_var('author_name')) :
						$curauth = get_userdatabylogin(get_query_var('author_name'));
					else :
						$curauth = get_userdata(get_query_var('author'));
					endif;

							
					
					if (!is_single()) { ?>
					
						<li class="current">
							<?php if( is_tag() ) : 
								esc_html_e('Posts Tagged ','swmtranslate')?><span>&quot;</span><?php single_tag_title();?><span>&quot;</span> <?php
							elseif (is_day()) : 
								esc_html_e('Posts made in ','swmtranslate').the_time('F jS, Y');
							elseif (is_month()) : 
								esc_html_e('Posts made in ','swmtranslate').the_time('F, Y');
							elseif (is_year()) :
								esc_html_e('Posts made in ','swmtranslate').the_time('Y');
							elseif (is_search()) : 
								esc_html_e('Search results for ','swmtranslate'); ?><span>&quot;</span><?php the_search_query();?><span>&quot;</span> <?php				
							elseif (is_category()) :
								single_cat_title();
							elseif (is_author()) :
								esc_html_e('Posts by ','swmtranslate'); echo ' ',$curauth->nickname;
							elseif (is_404()) :
								
								$swm_error_page_title = of_get_option('swm_error_page_title');	
								
								if ($swm_error_page_title != '') {		
									echo $swm_error_page_title;								
								} else {								
									 _e( '404 Error', 'swmtranslate' );									
								}							
							
							
							elseif (is_page()) :
								wp_title('');
							endif; ?>
						
						</li> <?php				
					}
					
					if (is_single()) {					
						
						$postType = get_post_type();
				
						if($postType == 'post') {
							
							$category = get_the_category();
							$catlink = get_category_link( $category[0]->cat_ID );
							echo '<li><a href="'.esc_url($catlink).'">'.esc_html($category[0]->cat_name).'</a></li><li class="current">'.swm_short_title(get_the_title(),50).'</li>';
							
						} 	else if($postType == 'attachment')	{ echo '<li class="current">'.get_the_title().'</li>'; }
						
							else if($postType == 'portfolio')	{
							
							$terms = get_the_term_list( $post->ID, 'portfolio_category', '', '$$$', '' );
							$terms = explode('$$$',$terms);	
							$catlink = get_category_link( $category[0]->cat_ID );
							$swm_pages_list_portfolio = of_get_option('swm_pages_list_portfolio');	
							
							if ($swm_pages_list_portfolio) {								
									echo '<li><a href="'.get_post_permalink($swm_pages_list_portfolio).'" >'.get_the_title($swm_pages_list_portfolio).'</a></li><li class="current">'.get_the_title().'</li>';									
							} else {
								echo '<li class="current">'.get_the_title().'</li>';
							}							
						}						
					}
					?>
					
				</ul>
		</div> <!-- #breadcrumb -->	
		<div class="clear"></div>

		<?php	} ?>	
		
	</div>	<!-- #title-bar -->				
	<!-- ...................... End Title / Search / Breadcrumbs ...................... -->	
	
<?php } ?>