<?php
/*
Template Name: Full Width Page
*/

get_header(); 
	/* display page content below portfolio items */
	if (have_posts()) :
	while (have_posts()) : the_post();
	the_content('');
	endwhile;					
	endif;			

get_footer(); ?>