<?php

function optionsframework_option_name() {
	// This gets the theme name from the stylesheet (lowercase and without spaces)
	$themename = get_theme_data(STYLESHEETPATH . '/style.css');
	$themename = $themename['Name'];
	$themename = preg_replace("/\W/", "", strtolower($themename) );
	
	$optionsframework_settings = get_option('optionsframework');
	$optionsframework_settings['id'] = $themename;
	update_option('optionsframework', $optionsframework_settings);
}

function optionsframework_options() {

	// Footer Column
	$footer_column = array(
						"one-column" => "1",
						"two-column" => "2",
						"three-column" => "3",
						"four-column" => "4",
						"five-column" => "5",
						"six-column" => "6"
						);

	// Video Type
	$embed_video_type = array(
						"vid-youtube" => __('YouTube', 'swmtranslate'),
						"vid-vimeo" => __('Vimeo', 'swmtranslate')						
						);	

	// Blog Sidebar
	$sidebar_position = array(
						"left-sidebar" => __('Left Sidebar', 'swmtranslate'),
						"right-sidebar" => __('Right Sidebar', 'swmtranslate')
						);
						
	// Portfolio Single Page
	$portfolio_single_options = array(
						"portfolio-with-right-sidebar" => __('Portfolio Single Page with Right Sidebar', 'swmtranslate'),
						"portfolio-with-left-sidebar" => __('Portfolio Single Page with Left Sidebar', 'swmtranslate'),
						"portfolio-with-fullwidth" => __('Portfolio Single Page with Full Width', 'swmtranslate')
						);					
	
	// Pull all the categories into an array
	$options_categories = array();  
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
    	$options_categories[$category->cat_ID] = $category->cat_name;
	}
	
	// Pull all the pages into an array
	$options_pages = array();  
	$options_pages_obj = get_pages('sort_column=post_parent,menu_order');
	$options_pages[''] = 'Select a page:';
	foreach ($options_pages_obj as $page) {
    	$options_pages[$page->ID] = $page->post_title;
	}
		
	// If using image radio buttons, define a directory path
	$skin_imagepath =  get_stylesheet_directory_uri() . '/framework/images/skins/';
		
	$shortname = 'swm';
	
	$swm_theme_options = array();
		
	/* General Options */

	$swm_theme_options[] = array( 
						"name" => __('General', 'swmtranslate'),
						"id" => $shortname."_general",
						"type" => "heading");
						
	$swm_theme_options[] = array( 
						"name" => __('General Settings', 'swmtranslate'),
						"id" => $shortname."sh1",
						"type" => "sub-heading");						
						
	$swm_theme_options[] = array( 
						"name" => __('Upload Logo', 'swmtranslate'),
						"desc" => __('Upload your company logo image. (recommended size : <strong>239 x 107</strong>).', 'swmtranslate'),						
						"id" => $shortname."_logo",						
						"type" => "upload");

	$swm_theme_options[] = array( 
						"name" => __('Upload Favicon', 'swmtranslate'),
						"desc" => __('Upload <strong>favicon.ico</strong> image in size <strong>16 x 16</strong>. You can generate favicon from www.favicon.cc', 'swmtranslate'),					
						"id" => $shortname."_favicon",
						"type" => "upload");	
	
	$swm_theme_options[] = array( 
						"name" => __('Display Search Bar', 'swmtranslate'),
						"desc" => __('Show/Hide header Search Box', 'swmtranslate'),						
						"id" => $shortname."_search_bar",
						"std" => "1",
						"type" => "checkbox");

	$swm_theme_options[] = array( 
						"name" => __('Display Breadcrumbs', 'swmtranslate'),
						"desc" => __('Show/Hide breadcrumbs', 'swmtranslate'),						
						"id" => $shortname."_breadcrumbs",
						"std" => "1",
						"type" => "checkbox");				
						
	$swm_theme_options[] = array( 
						"name" => __('Display Scroll To Top Arrow Icon', 'swmtranslate'),
						"desc" => __('Show/Hide bottom right <i>Go to Top arrow icon.</i>', 'swmtranslate'),						
						"id" => $shortname."_scroll_to_top",
						"std" => "1",
						"type" => "checkbox");

	$swm_theme_options[] = array( 
						"name" => __('Sidebar Position', 'swmtranslate'),
						"desc" => __('Select sidebar position for all inner pages and posts', 'swmtranslate'),
						"id" => $shortname."_blog_sidebar_position",
						"std" => "right-sidebar",
						"type" => "select",	
						"class" => "mini",
						"options" => $sidebar_position);

	$swm_theme_options[] = array( 
						"name" => __('Set Inner page Header in Home page', 'swmtranslate'),
						"desc" => __('Set ON to remove default home page large header and set inner page header ( like About Us, Testimonials etc. ) and then select inner page from Settings > Reading > Front page display > Front page drop dwon.', 'swmtranslate'),						
						"id" => $shortname."_inner_page_header",
						"std" => "0",
						"type" => "checkbox");	

	$swm_theme_options[] = array( 
						"name" => __('Google  Analytical Code', 'swmtranslate'),
						"desc" => __('Enter your google id (generally it looks like this: UA-XXXXX-X).', 'swmtranslate'),						
						"id" => $shortname."_google_analytical",
						"std" => "",
						"type" => "text");									
	
	/* Styling */
	
	$swm_theme_options[] = array( 
						"name" => __('Styling', 'swmtranslate'),
						"id" => $shortname."_styling",
						"type" => "heading");	

	$swm_theme_options[] = array( 
						"name" => __('Theme\'s Skin Settings', 'swmtranslate'),
						"id" => $shortname."sh2",
						"type" => "sub-heading");

	$swm_theme_options[] = array( 
						"name" => __('Select theme skin', 'swmtranslate'),
						"desc" => '',						
						"id" => $shortname."_theme_skin_style",
						"std" => "__('green', 'swmtranslate'),",
						"type" => "images",
						"options" => array(
							'green' => $skin_imagepath . 'green.png',
							'blue' => $skin_imagepath . 'blue.png',
							'modern_blue' => $skin_imagepath . 'modernblue.png',							
							'dark_blue' => $skin_imagepath . 'darkblue.png',
							'orange' => $skin_imagepath . 'orange.png',
							'dark_orange' => $skin_imagepath . 'darkorange.png',
							'pink' => $skin_imagepath . 'pink.png',
							'red' => $skin_imagepath . 'red.png',
							'dark_maroon' => $skin_imagepath . 'darkmaroon.png',
							'teal' => $skin_imagepath . 'teal.png',
							'khaki' => $skin_imagepath . 'khaki.png',
							'golden' => $skin_imagepath . 'golden.png',
							'brown' => $skin_imagepath . 'brown.png',
							'black' => $skin_imagepath . 'black.png')							
						);

	/* Fonts */
	
	$swm_theme_options[] = array( 
						"name" => __('Fonts', 'swmtranslate'),
						"id" => $shortname."_fonts",
						"type" => "heading");

	$swm_theme_options[] = array( 
						"name" => __('Google Font', 'swmtranslate'),
						"id" => $shortname."sh13",
						"type" => "sub-heading");

	$swm_theme_options[] = array( 
						"name" => __('Import Google Font', 'swmtranslate'),
						"desc" => __('Add google font url as per above example. (Go to http://www.google.com/webfonts > Choose any font and click on "Quick use" link at right side > 3rd section "Add this code to your website" > "Standard" tab > only copy url which starts ..http//... like above example in the box.)', 'swmtranslate'),						
						"id" => $shortname."_google_font_url",
						"std" => 'http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800',						
						"type" => "textarea");

	$swm_theme_options[] = array( 
						"name" => __('Font Name', 'swmtranslate'),
						"desc" => __('In google font page, read how to use font name from 4th section "Integrate the fonts into your CSS", font-family:..', 'swmtranslate'),						
						"id" => $shortname."_google_font_name",
						"std" => "Open Sans",						
						"type" => "text");	

	$swm_theme_options[] = array( 
						"name" => __('Font Weight', 'swmtranslate'),
						"desc" => __('Add font weight in number (200,700) or in word (normal, bold).', 'swmtranslate'),						
						"id" => $shortname."_google_font_weight",
						"std" => "normal",					
						"type" => "text");
						
	$swm_theme_options[] = array( 
						"name" => __('Paregraph Fonts', 'swmtranslate'),
						"id" => $shortname."sh3",
						"type" => "sub-heading");	
	
	$swm_theme_options[] = array( 		
						"name" => __('Content Paragraph Text', 'swmtranslate'),	
						"desc" => __('( Default : Size:12px / Color:#3f3f3f )', 'swmtranslate'),						
						"id" => $shortname."_paragraph_font",
						"std" => array('size' => '12px','color' => '#3f3f3f'),
						"type" => "typography");
						
	$swm_theme_options[] = array( 
						"name" => __('Content Headings', 'swmtranslate'),
						"id" => $shortname."sh4",
						"type" => "sub-heading");
	
	$swm_theme_options[] = array( 
						"name" => __('Page Title', 'swmtranslate'),
						"desc" => __('( Default : Size:30px / Color:#4B5608 )', 'swmtranslate'),						
						"id" => $shortname."_page_title_font",
						"std" => array('size' => '30px','color' => '#4B5608'),
						"type" => "typography");
	
	$swm_theme_options[] = array( 
						"name" => __('Display Border with Headings', 'swmtranslate'),
						"desc" => __('Show/Hide light greay border with headings, sidebar and footer headings', 'swmtranslate'),
						"id" => $shortname."_headings_bottom_border",
						"std" => "1",
						"type" => "checkbox");

	$swm_theme_options[] = array( 
						"name" => __('H1 Heading', 'swmtranslate'),
						"desc" => __('( Default : Size:24px / Color:#222222 )', 'swmtranslate'),						
						"id" => $shortname."_h1_heading_font",
						"std" => array('size' => '24px','color' => '#222222'),
						"type" => "typography");
						
	$swm_theme_options[] = array( 
						"name" => __('H2 Heading', 'swmtranslate'),
						"desc" => __('( Default : Size:20px / Color:#222222 )', 'swmtranslate'),						
						"id" => $shortname."_h2_heading_font",
						"std" => array('size' => '22px','color' => '#222222'),
						"type" => "typography");						
						
	$swm_theme_options[] = array( 
						"name" => __('H3 Heading', 'swmtranslate'),
						"desc" => __('( Default : Size:20px / Color:#222222 )', 'swmtranslate'),						
						"id" => $shortname."_h3_heading_font",
						"std" => array('size' => '20px','color' => '#222222'),
						"type" => "typography");						
						
	$swm_theme_options[] = array( 
						"name" => __('H4 Heading', 'swmtranslate'),
						"desc" => __('( Default : Size:18px / Color:#222222 )', 'swmtranslate'),						
						"id" => $shortname."_h4_heading_font",
						"std" => array('size' => '18px','color' => '#222222'),
						"type" => "typography");						
						
	$swm_theme_options[] = array( 
						"name" => __('H5 Heading', 'swmtranslate'),
						"desc" => __('( Default : Size:14px / Color:#222222 )', 'swmtranslate'),					
						"id" => $shortname."_h5_heading_font",
						"std" => array('size' => '16px','color' => '#222222'),
						"type" => "typography");						
						
	$swm_theme_options[] = array( 
						"name" => __('H6 Heading', 'swmtranslate'),
						"desc" => __('( Default : Size:14px / Color:#222222 )', 'swmtranslate'),						
						"id" => $shortname."_h6_heading_font",
						"std" => array('size' => '14px','color' => '#222222'),
						"type" => "typography");	

	$swm_theme_options[] = array( 
						"name" => __('Blog Post Heading', 'swmtranslate'),
						"desc" => __('( Default : Size:27px / Color:#222222 )', 'swmtranslate'),						
						"id" => $shortname."_blog_post_title_font",
						"std" => array('size' => '27px','color' => '#222222'),
						"type" => "typography");	
						
	$swm_theme_options[] = array( 
						"name" => __('Footer', 'swmtranslate'),
						"id" => $shortname."sh6",
						"type" => "sub-heading");	
						
	$swm_theme_options[] = array( 
						"name" => __('Large Footer Text', 'swmtranslate'),
						"desc" => __('( Default : Size:12px / Color:#a8a8a8 )', 'swmtranslate'),					
						"id" => $shortname."_large_footer_text",
						"std" => array('size' => '12px','color' => '#a8a8a8'),
						"type" => "typography");				
	
	$swm_theme_options[] = array( 
						"name" => __('Small Footer Text', 'swmtranslate'),
						"desc" => __('( Default : Size:11px / Color:#a8a8a8 )', 'swmtranslate'),						
						"id" => $shortname."_small_footer_font",
						"std" => array('size' => '11px','color' => '#a8a8a8'),
						"type" => "typography");


	/* Footer */
	
	$swm_theme_options[] = array( 
						"name" => __('Footer', 'swmtranslate'),
						"id" => $shortname."_footer",
						"type" => "heading");
						
	$swm_theme_options[] = array( 
						"name" => __('Large Footer', 'swmtranslate'),
						"id" => $shortname."sh72",
						"type" => "sub-heading");

	$swm_theme_options[] = array( 
						"name" => __('Display Large Footer', 'swmtranslate'),
						"desc" => __('Show/Hide large footer in all pages', 'swmtranslate'),
						"id" => $shortname."_on_off_large_footer",
						"std" => "1",
						"type" => "checkbox");			
						
	$swm_theme_options[] = array( 
						"name" => __('Footer Columns', 'swmtranslate'),
						"desc" => __('Select footer column.', 'swmtranslate'),						
						"id" => $shortname."_footer_column",
						"std" => "three-column",
						"type" => "select",
						"class" => "mini",
						"options" => $footer_column);

	$swm_theme_options[] = array( 
						"name" => __('Small Footer', 'swmtranslate'),
						"id" => $shortname."sh73",
						"type" => "sub-heading");	

	$swm_theme_options[] = array( 
						"name" => __('Display Small Footer', 'swmtranslate'),
						"desc" => __('Show/Hide small footer in all pages', 'swmtranslate'),
						"id" => $shortname."_on_off_small_footer",
						"std" => "1",
						"type" => "checkbox");
	
	$swm_theme_options[] = array( 
						"name" => __('Small Footer Right Content', 'swmtranslate'),
						"desc" => __('Add copyright text in small footer right side.', 'swmtranslate'),						
						"id" => $shortname."_footer_left_content",
						"std" => __('Copyright, Company Name.', 'swmtranslate'),						
						"type" => "textarea");	
	
	/* Portfolio */
	
	$swm_theme_options[] = array( 
						"name" => __('Portfolio', 'swmtranslate'),
						"id" => $shortname."_portfolio",
						"type" => "heading");
						
	$swm_theme_options[] = array( 
						"name" => __('Portfolio Settings', 'swmtranslate'),
						"id" => $shortname."sh14",
						"type" => "sub-heading");	

	$swm_theme_options[] = array( 
						"name" => __('Portfolio Post Single Page Option', 'swmtranslate'),
						"desc" => '',
						"id" => $shortname."_portfolio_single_options",
						"std" => "portfolio-with-fullwidth",
						"type" => "select",	
						"class" => "mini",
						"options" => $portfolio_single_options);	
	
	$swm_theme_options[] = array( 
						"name" => __('Portfolio Items Parent Page for Breadcrumbs', 'swmtranslate'),
						"desc" => __('Select default parent page for all portfolio items to display in breadcrumbs', 'swmtranslate'),
						"id" => $shortname."_pages_list_portfolio",
						"std" => "",
						"type" => "select",	
						"class" => "mini",
						"options" => $options_pages);


	/* Blog */
	
	$swm_theme_options[] = array( 
						"name" => __('Blog', 'swmtranslate'),
						"id" => $shortname."_blog",
						"type" => "heading");
					
	$swm_theme_options[] = array( 
						"name" => __('Blog Settings', 'swmtranslate'),
						"id" => $shortname."sh17",
						"type" => "sub-heading");
	
	$swm_theme_options[] = array( 
						"name" => __('Display Excerpt', 'swmtranslate'),
						"desc" => __('Show/Hide post summery text in post listing.', 'swmtranslate'),
						"id" => $shortname."_show_excerpt",
						"std" => "1",
						"type" => "checkbox");	

	$swm_theme_options[] = array( 
						"name" => __('Excerpt Length', 'swmtranslate'),
						"desc" => __('Enter post summery text character length (e.g. 200)', 'swmtranslate'),
						"id" => $shortname."_excerpt_length",
						"std" => "250",
						"class" => "mini",
						"type" => "text");	
	
	$swm_theme_options[] = array( 
						"name" => __('Display Post Date', 'swmtranslate'),
						"desc" => __('Show/Hide post date beside title.', 'swmtranslate'),
						"id" => $shortname."_post_date",
						"std" => "1",
						"type" => "checkbox");

	$swm_theme_options[] = array( 
						"name" => __('Display Post Comments Count', 'swmtranslate'),
						"desc" => __('Show/Hide comments number located below post date.', 'swmtranslate'),
						"id" => $shortname."_post_comments_count",
						"std" => "1",
						"type" => "checkbox");																

	$swm_theme_options[] = array( 
						"name" => __('Display Post Author', 'swmtranslate'),
						"desc" => __('Show/Hide post author\'s name located below post content.', 'swmtranslate'),
						"id" => $shortname."_post_author",
						"std" => "1",
						"type" => "checkbox");					

	$swm_theme_options[] = array( 
						"name" => __('Display Post Categories', 'swmtranslate'),
						"desc" => __('Show/Hide post categories  located below post content.', 'swmtranslate'),
						"id" => $shortname."_post_categories",
						"std" => "1",
						"type" => "checkbox");	
	
	$swm_theme_options[] = array( 
						"name" => __('Display Post Tags', 'swmtranslate'),
						"desc" => __('Show/Hide post tags located below post content.', 'swmtranslate'),
						"id" => $shortname."_post_tags",
						"std" => "0",
						"type" => "checkbox");		
					
	$swm_theme_options[] = array( 
						"name" => __('Display Read More Button', 'swmtranslate'),
						"desc" => __('Show/Hide "Read more" button from post listing page.', 'swmtranslate'),
						"id" => $shortname."_post_button",
						"std" => "1",
						"type" => "checkbox");

	$swm_theme_options[] = array( 
						"name" => __('Read More Button Text', 'swmtranslate'),
						"desc" => '',
						"id" => $shortname."_post_button_text",
						"std" => __('Read more', 'swmtranslate'),
						"class" => "mini",
						"type" => "text");					

	$swm_theme_options[] = array( 
						"name" => __('How Many Blog Posts per Page?', 'swmtranslate'),
						"desc" => '',
						"id" => $shortname."_blog_posts_per_page",
						"std" => "5",
						"class" => "mini",
						"type" => "text");				

	$swm_theme_options[] = array( 
						"name" => __('Exclude Categories from Blog', 'swmtranslate'),
						"desc" => __('Add category IDs, separated by commas (e.g. 1,23,56).', 'swmtranslate'),						
						"id" => $shortname."_blog_exclude_categories",
						"std" => "",						
						"type" => "text");			

					
	/* Blog Single */
	
	$swm_theme_options[] = array( 
						"name" => __('Blog Single', 'swmtranslate'),
						"id" => $shortname."sh18",
						"type" => "sub-heading");

	$swm_theme_options[] = array( 
						"name" => __('Display Share This Post', 'swmtranslate'),
						"desc" => __('Show/Hide "Share this post" option in post date section - below post content.', 'swmtranslate'),
						"id" => $shortname."_post_single_share",
						"std" => "1",
						"type" => "checkbox");	
	
	$swm_theme_options[] = array( 
						"name" => __('Display About Author Info', 'swmtranslate'),
						"desc" => __('Show/Hide About author box. (You can set author\'s bio from - Wordpress Admin > Users > Your Profile > About Yourself Box)', 'swmtranslate'),
						"id" => $shortname."_about_author_box",
						"std" => "1",
						"type" => "checkbox");	
						
	$swm_theme_options[] = array( 
						"name" => __('Display Post Comments', 'swmtranslate'),
						"desc" => __('Show/Hide post comments.', 'swmtranslate'),
						"id" => $shortname."_post_comments",
						"std" => "1",
						"type" => "checkbox");
	
						
	/* Error 404 */
	
	$swm_theme_options[] = array( 
						"name" => __('Error 404', 'swmtranslate'),
						"id" => $shortname."_error_page",
						"type" => "heading");
						
	$swm_theme_options[] = array( 
						"name" => __('Error 404 page Settings', 'swmtranslate'),
						"id" => $shortname."sh28",
						"type" => "sub-heading");
	
	$swm_theme_options[] = array( 
						"name" => __('Error 404 Title Text', 'swmtranslate'),
						"desc" => '',
						"id" => $shortname."_error_page_title",
						"std" => "Error 404",					
						"type" => "text");
						
	$swm_theme_options[] = array( 
						"name" => __('Error 404 Message', 'swmtranslate'),
						"desc" => '',
						"id" => $shortname."_error_page_content",
						"std" => '<h1>Oops...</h1>
									
								<h4>The page you were looking for appears to have been moved, deleted or does not exist.</h4>
								<p>You can visit our other pages:</p>									
								<ul>
									<li><a href="#">Home</a></li>
									<li><a href="#">About Us</a></li>								
									<li><a href="#">Services</a></li>
									<li><a href="#">Portfolio</a></li>
									<li><a href="#">Contact Us</a></li>
								</ul>',										
						"type" => "textarea");	
						
	$swm_theme_options[] = array( 
						"name" => __('Error 404 Image', 'swmtranslate'),
						"desc" => __('Sample 404 Error image size - 451px x 257px', 'swmtranslate'),						
						"id" => $shortname."_error_page_image",
						"type" => "upload");	
	
	/* Custom CSS/Javascript */
	
	$swm_theme_options[] = array( 
						"name" => __('Custom CSS/Javascript', 'swmtranslate'),
						"id" => $shortname."_custom_css_js",
						"type" => "heading");

	$swm_theme_options[] = array( 
						"name" => __('Add CSS', 'swmtranslate'),
						"id" => $shortname."sh31",
						"type" => "sub-heading");
						
	$swm_theme_options[] = array( 
						"name" => __('Add Custom CSS code', 'swmtranslate'),
						"desc" => __('Add your custom css style ( e.g. .sample-style { color:#ccc; } )', 'swmtranslate'),
						"id" => $shortname."_custom_css",
						"std" => "",				
						"class" => "large-textarea",
						"type" => "textarea");						
						
	$swm_theme_options[] = array( 
						"name" => __('Add Javascripts', 'swmtranslate'),
						"id" => $shortname."sh32",
						"type" => "sub-heading");
						
	$swm_theme_options[] = array( 
						"name" => __('Add Custom Javascript code', 'swmtranslate'),
						"desc" => '',
						"id" => $shortname."_custom_js",
						"std" => "",				
						"class" => "large-textarea",
						"type" => "textarea");				
	return $swm_theme_options;
}