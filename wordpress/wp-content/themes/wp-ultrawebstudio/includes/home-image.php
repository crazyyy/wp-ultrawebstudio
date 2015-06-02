<?php

	$swm_featured_image = wp_get_attachment_url(get_post_thumbnail_id($id));
	$thumb = '<img src="'.swm_resize($swm_featured_image, 940, '', true,'c', false).'" alt="" />';

?>

<div id="image_header" class="slider_padding2">
	<div id="transparent_border2">
		<div class="header_image">
			<?php echo $thumb; ?>	
		</div>
	</div>		
	<div class="clear"></div>					
</div>