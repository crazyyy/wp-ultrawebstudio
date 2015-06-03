<?php

$postType = get_post_type();

if( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) && $postType != 'portfolio' ) { 
	
	$meta_standard = get_post_meta(get_the_ID(), 'swm_meta_standard', true);	
	$swm_meta_standard_square_image = get_post_meta(get_the_ID(), 'swm_meta_standard_square_image', true);
	$swm_featured_image = wp_get_attachment_url(get_post_thumbnail_id($id));

	if ($swm_meta_standard_square_image) {
		$thumb = '<img src="'.swm_resize($swm_featured_image, 120,120 , true,'c', false).'" alt="" />';
		$right_margin = 'sq_img';
	}else {
		$thumb = '<img src="'.swm_resize($swm_featured_image, 653, $meta_standard , true,'c', false).'" alt="" />';	
		$right_margin = 'last std_img';
	}
	
	if ($swm_featured_image) {

		$output = '';		

		$output .= '<div class="pf_featured_img '.$right_margin.'">';
		$output .= '<div class="fade-img2 zoom-icon">';
		$output .= '<a href="'.$swm_featured_image.'" data-rel="prettyPhoto" title="' . get_the_title() . '" class="pff_featured_img">';
		$output .= $thumb;
		$output .= '</a>';
		$output .= '</div>';	
		$output .= '</div>';

		echo $output;
	}
	
} ?>