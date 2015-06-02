<?php 
/*
Template Name: Home page with Video Header
*/

get_header(); 
	
	/* Display page content */	
	if (have_posts()) :
		while (have_posts()) : the_post();
			the_content('');
		endwhile;					
	endif; 	
 
get_footer(); 

?>