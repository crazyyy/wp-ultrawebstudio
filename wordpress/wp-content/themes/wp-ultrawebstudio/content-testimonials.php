<?php 
	
	$count 		=	1;
	$itemlimit 	=	-1;
	$itemlimit	=	rwmb_meta('swm_testimonials_pagination');
	$pageid 	= 	get_the_ID();							
	
	$args = array(
		'post_type' => 'testimonials',
		'orderby'=>'menu_order',
		'order'     => 'ASC',
		'posts_per_page' => $itemlimit,
		'paged' => $paged,
		'type' => get_query_var('type')					      	 	
		);

	$query = new WP_Query( $args );

	/* Get Testimonials style name from "theme options" */
	$swm_testimonial_style = rwmb_meta( 'swm_testimonial_style', 'type=select' );

	while ($query->have_posts()) : $query->the_post();

		$swm_featured_image = wp_get_attachment_url(get_post_thumbnail_id($id));
		$testimonials_client_image = '';
		
		if ($swm_featured_image) {
		
			$testimonials_client_image = '<img class="image_left image_border2" src="'.swm_resize($swm_featured_image, 48,48,true,'c', false).'" alt="" />';
		
		}else  {
			
			$testimonials_client_image = '<img class="image_left round5" src="'.get_template_directory_uri().'/images/thumbs/testimonials-pic.jpg" alt="" />';				
		}			
		
		$swm_client_details = get_post_meta($post->ID, 'swm_client_details', TRUE); 
		$swm_website_title = get_post_meta($post->ID, 'swm_website_title', TRUE); 
		$swm_website_url = get_post_meta($post->ID, 'swm_website_url', TRUE);
	
		if ($swm_testimonial_style == 'image-style') { 				
			
			/* Display Testimonials with Client Image */
			
			?>
			
			
			<div class="testimonials1">
					<?php echo $testimonials_client_image; ?>
					<div class="testimonials-text">					
						<h5> <?php echo	the_title(); ?>
					
						<?php 	if ($swm_client_details) { ?>
								<br /><sup><?php echo $swm_client_details; ?></sup>
						<?php 	}	?>								
					</h5>					
						<?php echo the_content(); ?>							
						<?php 	if ($swm_website_url) { ?>
				
								<p><a href="<?php echo $swm_website_url; ?>" class="client-website"><?php echo $swm_website_title; ?></a></p>
							
						<?php 	} elseif ($swm_website_title) { ?>
								
								<p><a href="<?php echo $swm_website_url; ?>" class="client-website"><?php echo $swm_website_title; ?></a></p>
							
						<?php 	}	?>				
					</div>					
				</div><!--.testimonials1-->

				<div class="clear"></div>
				<div class="divider"></div>
							
			
		<?php } elseif ($swm_testimonial_style == 'box-style') { 
		
					/* Display Testimonials with Box Style */	
					
					?>
			
					<div class="box-testimonials">
						
						<?php echo the_content(); ?>
					
						<div class="box-testimonials-client">
							
							<?php 	if ($swm_website_url) { ?>
						
								<div>													
									<a href="<?php echo $swm_website_url; ?>" class="client-website"><?php echo $swm_website_title; ?></a>
								</div>	
								
							<?php 	} elseif ($swm_website_title) { ?>
									
								<div>		
									<a href="<?php echo $swm_website_url; ?>" class="client-website"><?php echo $swm_website_title; ?></a>
								</div>	
								
							<?php 	}	?>	
							
							
							
							<h5> <?php echo	the_title(); ?>
						
							<?php 	if ($swm_client_details) { ?>
									<br /><sup><?php echo $swm_client_details; ?></sup>
							<?php 	}	?>	
							
							</h5>							
							
														
							
					
						</div> <!--  box-testimonials-client -->
					
					</div> <!-- .box-testimonials -->
			
			
		<?php } else { 
		
					/* Display Testimonials with Quote Style */
		
					?>			
			
					<div class="testimonials2">
						<div class="testimonials-text">							
							<h5> <?php echo	the_title(); ?>
							
								<?php 	if ($swm_client_details) { ?>
										<br /><sup><?php echo $swm_client_details; ?></sup>
								<?php 	}	?>	
								
							</h5>
							
							<?php echo the_content(); ?>	

							<?php 	if ($swm_website_url) { ?>
						
									<p><a href="<?php echo $swm_website_url; ?>" class="client-website"><?php echo $swm_website_title; ?></a></p>
								
							<?php 	} elseif ($swm_website_title) { ?>
									
									<p><a href="<?php echo $swm_website_url; ?>" class="client-website"><?php echo $swm_website_title; ?></a></p>
								
							<?php 	}	?>
							
						</div>						
					</div><!--.testimonials 2 -->
					
					<div class="clear"></div>
					<div class="divider"></div>
			
		<?php } 	
		
		$count++; 
		
		endwhile; ?>

	<div class="clear">										
		<?php swm_pagination($query->max_num_pages); ?>
	</div>	
<span class="clear"></span>