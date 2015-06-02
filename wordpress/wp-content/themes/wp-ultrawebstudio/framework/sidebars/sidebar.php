<?php

 if ( function_exists('register_sidebar') ) {      

	register_sidebar( array(
	'name' => __('Blog Sidebar', 'swmtranslate'),
	'description' => 'Sidebar for blog section',
	'before_widget' => '<div class="sidebar_box"><div class="sidebar_box_shadow1"><div class="sidebar_box_shadow2">',
	'after_widget' => '<div class="clear"></div></div></div></div>',
	'before_title' => '<h3>',
	'after_title' => '</h3>'
	));	
	
	register_sidebar( array(
	'name' => __('Portfolio Single Page Sidebar', 'swmtranslate'),
	'description' => 'Sidebar for portfolio single page',
	'before_widget' => '',
	'after_widget' => '<div class="clear"></div>',
	'before_title' => '<h3>',
	'after_title' => '</h3>'
	));		
	
	register_sidebar(array(
	'name' => __('First Footer Widget Area', 'swmtranslate'),
	'description' => '',
	'before_widget' => '<div class="widget">',
	'after_widget' => '</div>',
	'before_title' => '<h3>',
	'after_title' => '</h3>'
	));

	register_sidebar(array(
	'name' => __('Second Footer Widget Area', 'swmtranslate'),
	'description' => '',
	'before_widget' => '<div class="widget">',
	'after_widget' => '</div>',
	'before_title' => '<h3>',
	'after_title' => '</h3>'
	));

	register_sidebar(array(
	'name' => __('Third Footer Widget Area', 'swmtranslate'),
	'description' => '',
	'before_widget' => '<div class="widget">',
	'after_widget' => '</div>',
	'before_title' => '<h3>',
	'after_title' => '</h3>'
	));

	register_sidebar(array(
	'name' => __('Fourth Footer Widget Area', 'swmtranslate'),
	'description' => '',
	'before_widget' => '<div class="widget">',
	'after_widget' => '</div>',
	'before_title' => '<h3>',
	'after_title' => '</h3>'
	));

	register_sidebar(array(
	'name' => __('Fifth Footer Widget Area', 'swmtranslate'),
	'description' => '',
	'before_widget' => '<div class="widget">',
	'after_widget' => '</div>',
	'before_title' => '<h3>',
	'after_title' => '</h3>'
	));

	register_sidebar(array(
	'name' => __('Sixth Footer Widget Area', 'swmtranslate'),
	'description' => '',
	'before_widget' => '<div class="widget">',
	'after_widget' => '</div>',
	'before_title' => '<h3>',
	'after_title' => '</h3>'
	));

 }	
	
?>