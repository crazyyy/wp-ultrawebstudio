<?php 

$meta_video                 = get_post_meta($post->ID, 'swm_meta_video', true); 

if( !empty($meta_video) ) {	
	
	echo '<div class="pf_featured_img pf_l_img">';
	echo "<div class='fitVids'>";
	echo stripslashes(htmlspecialchars_decode($meta_video));	
	echo "</div>";	
	echo "</div>";	
}

?>

