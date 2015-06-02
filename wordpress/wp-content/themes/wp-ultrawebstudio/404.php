<?php 

get_header(); 

	$swm_error_page_content = of_get_option('swm_error_page_content');	
	$swm_error_page_image_url = of_get_option('swm_error_page_image');	
	$swm_error_page_image = '<img src="'.$swm_error_page_image_url.'" alt="" />';
	
	/* ----------------------------------------------------------------------------------
				Display Error Image
	---------------------------------------------------------------------------------- */	
	?>
	
	<div class="one_half">

		<?php 

		$error_img = (of_get_option('swm_layout_color') == 'dark') ? 'error-page2.jpg' : 'error-page.jpg';

		$error_page_image = (of_get_option('swm_error_page_image') <> '') ? esc_attr(of_get_option('swm_error_page_image')) : get_template_directory_uri().'/framework/images/'.$error_img; ?>
		
		<img src="<?php echo esc_url($error_page_image); ?>" alt="" />
	
	</div>
	
	<?php
	/* -----------------------------------------------------------------------------------
				Display Content
	----------------------------------------------------------------------------------	*/
	?>
	
	<div class="one_half last">
	
		<?php if ($swm_error_page_content != '') { ?>
		
			<?php echo do_shortcode($swm_error_page_content); ?>	
		
		<?php } else { ?>	
			
			<?php //echo wp_list_pages(); ?>
			
		<?php } ?>
	
	</div>

<?php get_footer(); ?>