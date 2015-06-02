<?php 
		
	$count 		=	1;
	$itemlimit 	=	-1;
	$itemlimit	=	rwmb_meta( 'swm_faq_pagination');
	$pageid 	= 	get_the_ID();							
	
	$args = array(
		'post_type' => 'faq',
		'orderby'=>'menu_order',
		'order'     => 'ASC',
		'posts_per_page' => $itemlimit,
		'paged' => $paged,
		'type' => get_query_var('type')					      	 	
		);

	$query = new WP_Query( $args );

	/* Get FAQ style name from "theme options" */
		
	$swm_faq_style = rwmb_meta( 'swm_faq_display_style', 'type=select' );

	while ($query->have_posts()) : $query->the_post();
	
		if ($swm_faq_style == 'box-style') {
			
			/* Display FAQs with Box style */	
	?>
			
		<div data-id="closed" class="toggle_box">
			<span class="toggle_box_title"><?php echo the_title(); ?></span>
			<div class="toggle_box_inner">
				<?php echo the_content(); ?>						
			</div>
		</div>
					
		
		<?php } else { 
		
				/* Display FAQs with Icon style */
		?>	
			
						
		<div data-id="closed" class="toggle_icon">
			<span class="toggle_icon_title"><?php echo the_title(); ?></span>
			<div class="toggle_icon_inner">
				<?php echo the_content(); ?>						
			</div>
		</div>
						
		
		<?php } ?>
		
		<?php $count++; ?>						
			
	<?php endwhile; ?>
	
	<div class="clear">										
		<?php swm_pagination($query->max_num_pages); ?>
	</div>	
	
	<span class="clear"></span>