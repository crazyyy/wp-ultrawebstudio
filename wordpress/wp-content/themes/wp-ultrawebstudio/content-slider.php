<?php

	/* Get Slider name from "theme options" slider page dropdown */
	$swm_get_slider_name = of_get_option('swm_slider_name'); 
					
	if ($swm_get_slider_name == 'nivo-slider') {			
		
		get_template_part('includes/slider', 'nivo');				
		
	} else {
		
		get_template_part('includes/slider', 'skitter');
		
	} 

?>
	      
	