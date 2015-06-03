<div id="video_header" class="slider_padding2">
	<div id="transparent_border3">
		<div class='fitVids'>
			<?php
				$pageid = get_the_ID();
				$swm_homepage_vid = get_post_meta( $post->ID, 'swm_home_page_header_video', true );

				echo stripslashes(htmlspecialchars_decode($swm_homepage_vid));
				
			?>
		</div>
	</div>
	<div class="clear"></div>					
</div>
