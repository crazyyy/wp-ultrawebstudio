<?php 

if ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) { 
    
   $swm_image_post_format_image_height = get_post_meta(get_the_ID(), 'swm_pf_image_height', true);
    $swm_featured_image = wp_get_attachment_url(get_post_thumbnail_id($id));
	
	$thumb = '<img src="'.swm_resize($swm_featured_image, 653, $swm_image_post_format_image_height, true,'c', false).'" alt="" />';
	?>
	
<div class="pf_featured_img pf_l_img">	
<div class="post_format pf_image">				
	<div class="fade-img2" data-lang="zoom-icon" >	
		<a href="<?php echo $swm_featured_image; ?>" data-rel="prettyPhoto" title="<?php the_title(); ?>"><?php echo $thumb; ?></a>
	</div>	
	<?php swm_display_image_caption(); ?>	
	<div class="clear"></div>					
</div>				
</div>
<div class="clear_pf"></div>	
	
		
<?php	
}
 
?>