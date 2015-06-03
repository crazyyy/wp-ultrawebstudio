<?php



$prefix = 'swm_';

global $swm_meta_boxes;

$swm_meta_boxes = array();

/* #########################################################################################
	PAGE OPTIONS
############################################################################################ */

/* *********************************************************
	HOME PAGE VIDEO HEADER
********************************************************** */

$swm_meta_boxes[] = array(
	'id' => 'swm_home_page_video_header',	
	'title' => __('Home Page Header Video', 'swmtranslate'),	
	'pages' => array(		
		'page'
	),	
	'context' => 'normal',	
	'priority' => 'high',
	
	'fields' => array(		
		array(
			'name' => __('Add YouTube/Vimeo video embed or embedded code','swmtranslate'),
			'desc' => '',
			'id' => "{$prefix}home_page_header_video",
			'type' => 'textarea',
			'cols' => '20',
			'rows' => '3'
		),
		array(
			'name' => __('Home Page Display Type', 'swmtranslate'),
			'desc' => __('Select home page content dipslay type ', 'swmtranslate'),
			'id' => "{$prefix}video_header_home_display_type",
			'type' => 'select',			
			'std' => 'video_header_home_default',
			'options'  => array(
				'video_header_home_default' => __('Display Content with Default Home page Style', 'swmtranslate'),
				'video_header_home_whitebg' => __('Display Conent in white background like Inner page Style)', 'swmtranslate'),					
			),				
		),
	)
);

/* *********************************************************
	HOME PAGE IMAGE HEADER
********************************************************** */

$swm_meta_boxes[] = array(
	'id' => 'swm_home_page_image_header',	
	'title' => __('Home Page Image Header', 'swmtranslate'),	
	'pages' => array(		
		'page'
	),
	'context' => 'normal',	
	'priority' => 'high',
	
	'fields' => array(		
		array(
			'name' => __('Upload Image from "Featured Image Box"','swmtranslate'),
			'desc' => __('Upload image from right side "<strong>Featured Image</strong>" box. Image width - 940px, height is flexible.', 'swmtranslate'),
			'id'   => "{$prefix}home_page_header_image",
			'type' => 'info',
		),
		array(
			'name' => __('Home Page Display Type', 'swmtranslate'),
			'desc' => __('Select home page content dipslay type ', 'swmtranslate'),
			'id' => "{$prefix}img_header_home_display_type",
			'type' => 'select',			
			'std' => 'img_header_home_default',
			'options'  => array(
				'img_header_home_default' => __('Display Content with Default Home page Style', 'swmtranslate'),
				'img_header_home_whitebg' => __('Display Conent in white background like Inner page Style)', 'swmtranslate'),					
			),				
		),
	)
);

/* *********************************************************
	HOME PAGE REVOLUTION SLIDER
********************************************************** */

$swm_meta_boxes[] = array(
	'id' => 'swm_home_page_revolution_slider',	
	'title' => __('Home Page Revolution Slider', 'swmtranslate'),	
	'pages' => array(		
		'page'
	),
	'context' => 'normal',	
	'priority' => 'high',
	
	'fields' => array(					
		array(
			'name' => __('Slider Display Type', 'swmtranslate'),
			'desc' => __('Select slider dipslay type ', 'swmtranslate'),
			'id' => "{$prefix}rev_slider_display_type",
			'type' => 'select',			
			'std' => 'rev_responsive_width',
			'options'  => array(
				'rev_responsive_width' => __('Responsive (940px width)', 'swmtranslate'),
				'rev_fullwidth' => __('Full Width Slider (1920px or more width)', 'swmtranslate'),					
			),				
		),
		array( 
			'name' => __('Add Slider Shortcode', 'swmtranslate'),
			'desc' => __('Add revolution slider shortcode e.g. [rev_slider revolution]<br /> You have to install revolution slider plugin and generate shortcode ', 'swmtranslate'),
			'id' => "{$prefix}rev_slider_shortcode",
			'std' => "",			
			"type" => "text"
		),
		array(
			'name' => __('Home Page Display Type', 'swmtranslate'),
			'desc' => __('Select home page content dipslay type ', 'swmtranslate'),
			'id' => "{$prefix}rev_home_display_type",
			'type' => 'select',			
			'std' => 'rev_home_default',
			'options'  => array(
				'rev_home_default' => __('Display Content with Default Home page Style', 'swmtranslate'),
				'rev_home_whitebg' => __('Display Conent in white background like Inner page Style)', 'swmtranslate'),					
			),				
		),
	)
);

/* *********************************************************
	PORTFOLIO PAGE
********************************************************** */

$swm_meta_boxes[] = array(
	'id' => 'swm_portfolio_page_image_header',	
	'title' => __('Portfolio Page Options', 'swmtranslate'),	
	'pages' => array(		
		'page'
	),
	'context' => 'normal',	
	'priority' => 'high',
	
	'fields' => array(	
		array(
				'name' => __('Portfolio Type', 'swmtranslate'),
				'desc' => __('Select Portfolio type', 'swmtranslate'),
				'id' => "{$prefix}portfolio_page_type",
				'type' => 'select',			
				'std' => 'Sortable_Portfolio_with_Hover_Text',
				'options'  => array(
					'Sortable_Portfolio_with_Hover_Text' => __('Sortable Portfolio with Hover Text', 'swmtranslate'),					
					'Sortable_Portfolio_with_Small_Text' => __('Sortable Portfolio with Small Text', 'swmtranslate'),
					'Sortable_Portfolio_with_Large_Text' => __('Sortable Portfolio with Large Text', 'swmtranslate'),
					'Classic_Portfolio_with_Hover_Text' => __('Classic Portfolio with Hover Text', 'swmtranslate'),					
					'Classic_Portfolio_with_Small_Text' => __('Classic Portfolio with Small Text', 'swmtranslate'),
					'Classic_Portfolio_with_Large_Text' => __('Classic Portfolio with Large Text', 'swmtranslate'),
				),				
			),
		array(
			'name' => __('Portfolio Column', 'swmtranslate'),
			'desc' => __('Select portfolio display column', 'swmtranslate'),
			'id' => "{$prefix}pf_display_column",
			'type' => 'select',			
			'std' => '4_Column_Portfolio',
			'options'  => array(
				'2_Column_Portfolio' => __('2 Column Portfolio', 'swmtranslate'),
				'3_Column_Portfolio' => __('3 Column Portfolio', 'swmtranslate'),
				'4_Column_Portfolio' => __('4 Column Portfolio', 'swmtranslate'),				
			),				
		),
		array(
			'name' => __('Exclude Portfolio Categories', 'swmtranslate'),
			'desc' => __('Checked categories will be excluded from page display.', 'swmtranslate'),		
			'id' => "{$prefix}exclude_pf_categories",
			'type' => 'taxonomy',			
			'options' => array(
				'taxonomy' => 'portfolio_category',			
				'type' => 'checkbox_tree',					
				'args' => array()					
			)		
		),			
		array( 
			'name' => __('Display Portfolio Item Title', 'swmtranslate'),
			'desc' => __('Enable/Disable portfolio item title text', 'swmtranslate'),
			'id' => "{$prefix}pf_title_text",
			'std' => "1",
			"type" => "checkbox",
		),
		array( 
			'name' => __('Add link on Portfolio Item Title', 'swmtranslate'),
			'desc' => __('Enable/Disable permalink on item title text', 'swmtranslate'),
			'id' => "{$prefix}pf_item_title_link",
			'std' => "0",
			"type" => "checkbox",
		),
		array( 
			'name' => __('Portfolio Item Title Font Size', 'swmtranslate'),
			'desc' => __('Enter portfolio title text font size <br />( only enter number e.g. 14  ) ', 'swmtranslate'),
			'id' => "{$prefix}pf_title_font_size",
			'std' => "14",			
			"type" => "text"
		),			
		array(
			'name' => __('Display Excerpt or Category Names', 'swmtranslate'),
			'desc' => __('Select portfolio sort description text type or hide it', 'swmtranslate'),
			'id' => "{$prefix}pf_display_expert_category",
			'type' => 'select',			
			'std' => 'Display_Expert',
			'options'  => array(
				'Display_Expert' => __('Display Expert Text', 'swmtranslate'),
				'Display_Category_Names' => __('Display Category Names', 'swmtranslate'),					
				'Hide_Expert' => __('Hide Expert Text or Category Names', 'swmtranslate'),
			),				
		),			
		array( 
			'name' => __('Excerpt Length', 'swmtranslate'),
			'desc' => __('Portfolio sort description characters length (e.g. 100)', 'swmtranslate'),
			'id' => "{$prefix}pf_excerpt_length",
			'std' => "100",			
			"type" => "text",
		),	
		array( 
			'name' => __('Portfolio Item Excerpt Font Size', 'swmtranslate'),
			'desc' => __('Enter portfolio sort description text font size <br />( only enter number e.g. 11  ) ', 'swmtranslate'),
			'id' => "{$prefix}pf_excerpt_font_size",
			'std' => "12",			
			"type" => "text"
		),
		array( 
			'name' => __('Read More Link Text', 'swmtranslate'),
			'desc' => __('Enter text for read more link  or leave this field blank to disable it', 'swmtranslate'),
			'id' => "{$prefix}pf_items_link_text",
			'std' => "",			
			"type" => "text",
		),							
		array( 
			'name' => __('Display Images/Videos on Lightbox', 'swmtranslate'),
			'desc' => __('Enable/Disable lightbox feature (open large image in popup). If disable then link image to portfolio single page', 'swmtranslate'),
			'id' => "{$prefix}onoff_pf_prettyphoto",
			'std' => "1",
			"type" => "checkbox",
		),
		array( 
			'name' => __('Custom Height for Thumbnails', 'swmtranslate'),
			'desc' => __('Add custom height for thumbnails e.g. 150 or leave it blank for auto height', 'swmtranslate'),
			'id' => "{$prefix}pf_items_custom_height",
			'std' => "",			
			"type" => "text",
		),
		array( 
			'name' => __('Pagination', 'swmtranslate'),
			'desc' => __('Add number to display portfolio items per page e.g. 12', 'swmtranslate'),
			'id' => "{$prefix}pf_items_pagination",
			'std' => "12",			
			"type" => "text",
		),
		array( 
			'name' => __('Display Zoom Icon on Hover', 'swmtranslate'),
			'desc' => __('Enable/Disable zoom/video icon on mouse over', 'swmtranslate'),
			'id' => "{$prefix}onoff_pf_hover_zoom_icon",
			'std' => "1",
			"type" => "checkbox",
		),		
		array( 
			'name' => __('Display Link Icon on Hover', 'swmtranslate'),
			'desc' => __('Enable/Disable link icon on mouse over', 'swmtranslate'),
			'id' => "{$prefix}onoff_pf_hover_link_icon",
			'std' => "1",
			"type" => "checkbox",
		)
	)

);

/* *********************************************************
	FAQ PAGE
********************************************************** */

$swm_meta_boxes[] = array(
	'id' => 'swm_faq_page',	
	'title' => __('FAQs Page Options', 'swmtranslate'),
	'pages' => array(		
		'page'
	),	
	'context' => 'normal',	
	'priority' => 'high',
	
	'fields' => array(	
		array(
			'name'     => __('FAQs Style', 'swmtranslate'),
			'desc' => __('Select FAQs Style', 'swmtranslate'),
			'id'       => "{$prefix}faq_display_style",
			'type'     => 'select',
			'my_class' => 'swm_divider_line',
			'std' => 'icon-style',			
			'options'  => array(
				"box-style" => __('Box Style', 'swmtranslate'),
				"icon-style" => __('Icon Style', 'swmtranslate'),
			),
		),				
		array(
			'name' => __('Display FAQs per page', 'swmtranslate'),
			'desc' => __('Add number to display faq items per page e.g. 12', 'swmtranslate'),
			'id' => "{$prefix}faq_pagination",
			'type' => 'text',
			'std' => '15'
		)
	)

);

/* *********************************************************
	TESTIMONIALS PAGE
********************************************************** */

$swm_meta_boxes[] = array(
	'id' => 'swm_testimonials_page',
	'title' => __('Testimonials Page Options', 'swmtranslate'),
	'pages' => array(		
		'page'
	),	
	'context' => 'normal',	
	'priority' => 'high',
	
	'fields' => array(	
		array(
			'name'     => __('Testimonials Style', 'swmtranslate'),
			'desc' => __('Select Testimonials Style', 'swmtranslate'),
			'id'       => "{$prefix}testimonial_style",
			'type'     => 'select',
			'my_class' => 'swm_divider_line',
			'std' => 'icon-style',			
			'options'  => array(
				"quote-style" => __('Testimonials with Quote Style', 'swmtranslate'),
				"image-style" => __('Testimonials with Client Image', 'swmtranslate'),
				"box-style" => __('Testimonials with Box Style', 'swmtranslate')
			),
		),				
		array(
			'name' => __('Display FAQs per page', 'swmtranslate'),
			'desc' => __('Add number to display testimonials items per page e.g. 12', 'swmtranslate'),
			'id' => "{$prefix}testimonials_pagination",
			'type' => 'text',
			'std' => '6'
		)
	)

);

/* *********************************************************
	ARCHIVES PAGE
********************************************************** */

$swm_meta_boxes[] = array(
	'id' => 'swm_archives_page',
	'title' => __('Archives Page Options', 'swmtranslate'),
	'pages' => array(		
		'page'
	),	
	'context' => 'normal',	
	'priority' => 'high',
	
	'fields' => array(	
		array(
			'name' => __('Display Posts per page', 'swmtranslate'),
			'desc' => __('Add number to display blog posts per page in the table e.g. 12', 'swmtranslate'),
			'id' => "{$prefix}archives_pagination",
			'type' => 'text',
			'std' => '12'
		),
		array( 
			'name' => __('Display Archives by Month', 'swmtranslate'),
			'desc' => __('Enable/Disable archives by months list.', 'swmtranslate'),
			'id' => "{$prefix}onoff_archives_month",
			'std' => "1",
			"type" => "checkbox",
		),			
		array( 
			'name' => __('Display Archives by Categories', 'swmtranslate'),
			'desc' => __('Enable/Disable archives by categories list.', 'swmtranslate'),
			'id' => "{$prefix}onoff_archives_categories",
			'std' => "1",
			"type" => "checkbox",
		)
	)

);


/* #########################################################################################
	POST OPTIONS
############################################################################################ */


/* *********************************************************
	POST TYPE STANDARD
********************************************************** */

$swm_meta_boxes[] = array(
	'id' => 'swm-meta-box-standard',	
	'title' => __('Post Format Standard - Featured Image Custom Height (Optional)', 'swmtranslate'),
	'pages' => array('post'),	
	'context' => 'normal',	
	'priority' => 'high',	
	'fields' => array(		
		array( "name" => __('Display "Featured Image" in square shape','swmtranslate'),
				"desc" => __('Set "ON" to display featured image in Square shape - 120px x 120px','swmtranslate'),				
				'id' => "{$prefix}meta_standard_square_image",
				"type" => "checkbox",
				"std" => '0'
		),
		array( "name" => __('Add custom height of featured image','swmtranslate'),
				"desc" => __('Leave it blank to display featured image with auto height','swmtranslate'),				
				'id' => "{$prefix}meta_standard",
				"type" => "text",
				"std" => ''
		)
	)
);

/* *********************************************************
	POST TYPE IMAGE
********************************************************** */

$swm_meta_boxes[] = array(
	'id' => 'swm-meta-box-image',
	'title' =>  __('Add Image Info', 'swmtranslate'),
	'pages' => array('post'),	
	'context' => 'normal',	
	'priority' => 'high',	
	'fields' => array(		
		array( "name" => __('Image Caption Title','swmtranslate'),
				"desc" => '',
				"id" => "{$prefix}image_caption_title",
				"type" => "text",
				'my_class2' => 'rwmb-text-large',
				"std" => ''
		),
		array( "name" => __('Image Caption Text','swmtranslate'),
				"desc" => '',
				"id" => "{$prefix}image_caption_text",
				"type" => "textarea",
				"std" => ''
		),
		array( "name" => __('Add custom height of featured image (optional)','swmtranslate'),
				"desc" => __('Leave it blank to display featured image with auto height','swmtranslate'),
				"id" => "{$prefix}pf_image_height",
				"type" => "text",
				"class" => "pf_custom_height",
				"std" => ''
		)
	)
);



/* *********************************************************
	POST TYPE GALLERY
********************************************************** */

$swm_meta_boxes[] = array(
	'id' => 'swm-meta-box-gallery',
	'title' =>  __('Add Gallery Images', 'swmtranslate'),
	'pages' => array('post'),	
	'context' => 'normal',	
	'priority' => 'high',	
	'fields' => array(		
		array(
			'name' => 'Upload Images or Insert Images from Media Library',
			'id' => "{$prefix}pf_gallery_photos",
			'type' => 'thickbox_image',
			'max_file_uploads' => 40,
		),
		array( "name" => __('Add custom height for  all gallery images','swmtranslate'),
				"desc" => __('Leave it blank to display gallery images with auto height','swmtranslate'),				
				'id' => "{$prefix}meta_gallery_img_height",
				"type" => "text",
				"std" => ''
		)
	)
);



/* *********************************************************
	POST TYPE LINK
********************************************************** */

$swm_meta_boxes[] = array(
	'id' => 'swm-meta-box-link',
	'title' =>  __('Add Link URL', 'swmtranslate'),
	'pages' => array('post'),	
	'context' => 'normal',	
	'priority' => 'high',	
	'fields' => array(		
		array( "name" => __('Link URL ( e.g. http://www.domain.com )','swmtranslate'),
				"desc" => '',
				"id" => "{$prefix}meta_link_url",
				"type" => "text",
				'my_class2' => 'rwmb-text-large',
				"std" => ''
		)
	)
);

/* *********************************************************
	POST TYPE QUOTE
********************************************************** */

$swm_meta_boxes[] = array(
	'id' => 'swm-meta-box-quote',
	'title' =>  __('Add Quote', 'swmtranslate'),
	'pages' => array('post'),	
	'context' => 'normal',	
	'priority' => 'high',	
	'fields' => array(		
		array( "name" => __('Add Quote Text','swmtranslate'),
				"desc" => '',
				"id" => "{$prefix}meta_quote",
				"type" => "textarea",
				"std" => ''
		),
		array( "name" => __('Source Name (optional)','swmtranslate'),
				"desc" => '',
				"id" => "{$prefix}meta_quote_source",
				"type" => "text",
				"std" => ''
		),
		array( "name" => __('Source URL (optional)','swmtranslate'),
				"desc" => '',
				"id" => "{$prefix}meta_quote_source_url",
				"type" => "text",
				"std" => ''
		)
	)
);

/* *********************************************************
	POST TYPE VIDEO
********************************************************** */

$swm_meta_boxes[] = array(
	'id' => 'swm-meta-box-video',
	'title' =>  __('Add Video', 'swmtranslate'),
	'pages' => array('post'),	
	'context' => 'normal',	
	'priority' => 'high',	
	'fields' => array(		
		array( "name" => __('Embedded Video','swmtranslate'),
				'desc' => '',
				"id" => "{$prefix}meta_video_title1",
				"type" => "info",
				"std" => ''
		),	
		array( "name" => __('Add YouTube/Vimeo video embed or embedded code','swmtranslate'),
				'desc' => __('default  width - 616', 'swmtranslate'),
				"id" => "{$prefix}meta_video",
				"type" => "textarea",
				'my_class' => 'swm_divider_line',
				"std" => ''
		)		
	)
);

/* #########################################################################################
	CUSTOM POST OPTIONS
############################################################################################ */

/* *********************************************************
	PORTFOLIO
********************************************************** */

$swm_meta_boxes[] = array(
	'id' => 'swm-meta-box-portfolio',
	'title' =>  __('Add Media Details', 'swmtranslate'),
	'pages' => array('portfolio'),	
	'context' => 'normal',	
	'priority' => 'high',	
	'fields' => array(		
		array(
				'name' => __('Project Type', 'swmtranslate'),
				'desc' => __('Select portfolio project type', 'swmtranslate'),
				'id' => "{$prefix}portfolio_project_type",
				'type' => 'select',			
				'std' => 'Image',
				'options'  => array(
					'Image' => __('Image', 'swmtranslate'),					
					'Video' => __('Video', 'swmtranslate'),					
				),				
			),
		array(
			'name' => __('Add YouTube/Vimeo Video URL', 'swmtranslate'),
			'desc' => __('Add YouTube/Vimeo video url <br /> <small>Vimeo Example : http://vimeo.com/16795595</small>', 'swmtranslate'),
			'id' => "{$prefix}portfolio_video",
			'type' => 'text',			
			'std' => ''
		),
		array(
				'name' => __('Lightbox Image/Media Title (optional)', 'swmtranslate'),
				'desc' => '',
				'id' => "{$prefix}lightbox_image_title",
				'type' => 'text',				
				'std' => ''
			),
		array(
				'name' => __('Lightbox Image/Media Description (optional)', 'swmtranslate'),
				'desc' => '',
				'id' => "{$prefix}lightbox_image_description",
				'type' => 'textarea',
				'std' => ''
			),
		array(
			'name' => __('Add Thumbnail Image (optional)  ', 'swmtranslate'),
			'desc' => __('Upload thumbnail image as per given size in the help file. You can leave this option because portfolio script also generates auto thumbnail of portfolio\'s large image.', 'swmtranslate'),
			'id' => "{$prefix}portfolio_thumb_image",
			'type'  => 'thickbox_image',
		)
	)
);


/* *********************************************************
	TESTIMONIALS
********************************************************** */

$swm_meta_boxes[] = array(
	'id' => 'swm-meta-box-testimonials',
	'title' =>  __('Testimonial Options', 'swmtranslate'),
	'pages' => array('testimonials'),	
	'context' => 'normal',	
	'priority' => 'high',	
	'fields' => array(			
		
		array(
				'name' => __('Client Details (optional)', 'swmtranslate'),
				'desc' => __('Client designation, city or country name etc. ', 'swmtranslate'),
				'id' => "{$prefix}client_details",
				'my_class' => 'swm_divider_line',
				'type' => 'text',
				'std' => ''
		),
		array(
				'name' => __('Website Title (optional)', 'swmtranslate'),
				'desc' => __('Client website or company name', 'swmtranslate'),
				'id' => "{$prefix}website_title",
				'my_class' => 'swm_divider_line',
				'type' => 'text',
				'std' => ''
		),
		array(
				'name' => __('Website URL (optional)', 'swmtranslate'),
				'desc' => __('Client website url', 'swmtranslate'),
				'id' => "{$prefix}website_url",
				'type' => 'text',
				'std' => ''
		)	
	)
);

/* *********************************************************
	SLIDER
********************************************************** */

$swm_meta_boxes[] = array(
	'id' => 'swm-meta-box-slider',
	'title' =>  __('Add Slide Details', 'swmtranslate'),
	'pages' => array('slider'),	
	'context' => 'normal',	
	'priority' => 'high',	
	'fields' => array(	
		array(
				'name' => __('Slider Type', 'swmtranslate'),
				'desc' => __('Select slider type', 'swmtranslate'),
				'id' => "{$prefix}slider_type",
				'type' => 'select',
				'my_class' => '',
				'std' => 'Elastic_Slider',
				'options'  => array(
					'Default_Slider' => __('Default Slider', 'swmtranslate'),
					'Basic_Slider' => __('Basic Slider', 'swmtranslate'),			
					'Thumbnail_Slider' => __('Thumbnail Slider', 'swmtranslate'),
					'Icon_Slider' => __('Icon Slider', 'swmtranslate'),
				),				
			),
		array(				
			'name' => __('Icon Name <small>Get Icon Name <a href="http://fortawesome.github.com/Font-Awesome/" target="_blank">Here</a></small>', 'swmtranslate'),
			'desc' => __('Enter icon name to display in Icon slider before title and sub title text.<br />(e.g. icon-desktop, icon-user, icon-phone)', 'swmtranslate'),
			'id' => "{$prefix}slide_icon_names",
			'type' => 'text',
			'std' => 'icon-desktop',
		),	
		array(				
			'name' => __('Icon Sub Title Text', 'swmtranslate'),
			'desc' => __('Enter sub title text to display below title', 'swmtranslate'),
			'id' => "{$prefix}slide_icon_subtitle",
			'type' => 'text',
			'std' => 'sub title text',
		),
		array(
				'name' => __('Display Caption', 'swmtranslate'),
				'desc' => __('Show/Hide Caption title and description text in this slide', 'swmtranslate'),
				'id' => "{$prefix}caption_display",
				'type' => 'checkbox',
				'std' => '1',							
			),	
		array(
			'name' => __('Caption Location', 'swmtranslate'),
			'desc' => __('Select caption display location', 'swmtranslate'),
			'id' => "{$prefix}caption_location",
			'type' => 'select',
			'my_class' => '',
			'std' => '',
			'options'  => array(
				'caption_top_left' => __('Top Left', 'swmtranslate'),
				'caption_top_right' => __('Top Right', 'swmtranslate'),
				'caption_bottom_left' => __('Bottom Left', 'swmtranslate'),				
				'caption_bottom_right' => __('Bottom Right', 'swmtranslate'),				
			),				
		),		
		array(
			'name' => __('Video Slide', 'swmtranslate'),
			'desc' => __('Add YouTube/Vimeo video embed or embedded code', 'swmtranslate'),
			'id' => "{$prefix}flex_slider_video",
			'type' => 'textarea',			
			'my_class2' => 'rwmb-text-large',
			'std' => ''
		),		
		array(				
			'name' => __('Hyperlink URL for image slide (optional)', 'swmtranslate'),
			'desc' => __('If you want to clickable image slide then enter url of the page/post', 'swmtranslate'),
			'id' => "{$prefix}slider_image_link",
			'type' => 'text',
			'std' => ''
		),		
		array(
			'name' => __('Add Slide Thumbnail Image (optional) <br /><small>Size for Thumbnail Slider - 152px x 73px</small>', 'swmtranslate'),
			'desc' => __('Upload thumbnail image as per given size. You can leave this option because slider script also generates auto thumbnail of slide\'s large image.', 'swmtranslate'),
			'id'               => "{$prefix}slider_thumb_image",
			'type'             => 'plupload_image',
			'max_file_uploads' => 1
		)
	)
);


/* *********************************************************
	SLIDER PAGE OPTIONS
********************************************************** */

// Easings
$slider_easing = array(
	"swing" => "swing",
	"easeInQuad" => "easeInQuad",
	"easeOutQuad" => "easeOutQuad",
	"easeInOutQuad" => "easeInOutQuad",
	"easeInCubic" => "easeInCubic",
	"easeOutCubic" => "easeOutCubic",
	"easeInOutCubic" => "easeInOutCubic",
	"easeInQuart" => "easeInQuart",
	"easeOutQuart" => "easeOutQuart",
	"easeInOutQuart" => "easeInOutQuart",
	"easeInSine" => "easeInSine",
	"easeOutSine" => "easeOutSine",
	"easeInOutSine" => "easeInOutSine",
	"easeInExpo" => "easeInExpo",
	"easeOutExpo" => "easeOutExpo",
	"easeInOutExpo" => "easeInOutExpo",
	"easeInQuint" => "easeInQuint",
	"easeOutQuint" => "easeOutQuint",
	"easeInOutQuint" => "easeInOutQuint",
	"easeInCirc" => "easeInCirc",
	"easeOutCirc" => "easeOutCirc",
	"easeInOutCirc" => "easeInOutCirc",
	"easeInElastic" => "easeInElastic",
	"easeOutElastic" => "easeOutElastic",
	"easeInOutElastic" => "easeInOutElastic",
	"easeInBack" => "easeInBack",
	"easeOutBack" => "easeOutBack",
	"easeInOutBack" => "easeInOutBack",
	"easeInBounce" => "easeInBounce",
	"easeOutBounce" => "easeOutBounce",
	"easeInOutBounce" => "easeInOutBounce"
);

// Slider Options ####################################################

$swm_meta_boxes[] = array(
	'id' => 'swm-mb-theme-slider-options',
	'title' =>  __('Slider Options', 'swmtranslate'),
	'pages' => array('page'),	
	'context' => 'normal',	
	'priority' => 'high',	
	'fields' => array(	
		array(
				'name' => __('Slider Type', 'swmtranslate'),
				'desc' => __('Select slider type', 'swmtranslate'),
				'id' => "{$prefix}page_slider_type",
				'type' => 'select',				
				'std' => 'Basic_Slider',
				'options'  => array(
					'Default_Slider' => __('Default Slider', 'swmtranslate'),
					'Basic_Slider' => __('Basic Slider', 'swmtranslate'),			
					'Thumbnail_Slider' => __('Thumbnail Slider', 'swmtranslate'),
					'Icon_Slider' => __('Icon Slider', 'swmtranslate'),
				),				
			),
		array(
			'name' => __('Exclude Slider Categories', 'swmtranslate'),
			'desc' => __('Checked categories will be excluded from page display.', 'swmtranslate'),		
			'id' => "{$prefix}exclude_slider_categories",
			'type' => 'taxonomy',					
			'options' => array(
				'taxonomy' => 'slider_category',			
				'type' => 'checkbox_tree',					
				'args' => array()					
			)		
		),
		array(				
			'name' => __('Welcome Heading Text', 'swmtranslate'),
			'desc' => __('Enter welcome heading text', 'swmtranslate'),
			'id' => "{$prefix}welcome_heading",
			'type' => 'text',
			'std' => ''
		),	
		array(				
			'name' => __('Welcome Sub Text', 'swmtranslate'),
			'desc' => __('Enter weblcome sub text, short intro text', 'swmtranslate'),
			'id' => "{$prefix}welcome_sub_text",
			'type' => 'textarea',
			'std' => ''
		),	
		array(				
			'name' => __('Button 1 Text', 'swmtranslate'),
			'desc' => __('Enter button 1 text e.g. VIEW PORTFOLIO', 'swmtranslate'),
			'id' => "{$prefix}button1_text",
			'type' => 'text',
			'std' => ''
		),	
		array(				
			'name' => __('Button 1 Link', 'swmtranslate'),
			'desc' => __('Enter button 1 URL', 'swmtranslate'),
			'id' => "{$prefix}button1_link",
			'type' => 'text',
			'std' => '#'
		),	
		array(				
			'name' => __('Button 2 Text', 'swmtranslate'),
			'desc' => __('Enter button 2 text e.g. VIEW PACKAGES', 'swmtranslate'),
			'id' => "{$prefix}button2_text",
			'type' => 'text',
			'std' => ''
		),	
		array(				
			'name' => __('Button 2 Link', 'swmtranslate'),
			'desc' => __('Enter button 2 URL', 'swmtranslate'),
			'id' => "{$prefix}button2_link",
			'type' => 'text',
			'std' => '#'
		),	

		array(
				'name' => __('Slideshow Easing', 'swmtranslate'),
				'desc' => __('Select slideshow  easing <br />Default: easeOutExpo', 'swmtranslate'),
				'id' => "{$prefix}slider_easing",
				'type' => 'select',
				'std' => 'easeOutExpo',
				'options'  => $slider_easing,				
			),		
		array(
				'name' => __('Auto Play', 'swmtranslate'),
				'desc' => __('Enable/Disable slideshow Auto Play', 'swmtranslate'),
				'id' => "{$prefix}slider_autoplay",
				'type' => 'checkbox',
				'std' => '1',							
			),		
		array(				
			'name' => __('Slideshow Interval', 'swmtranslate'),
			'desc' => __('Enter time between two slide animation <br /> 1000 = 1 second, 5000 = 5 seconds<br />Default: 3000', 'swmtranslate'),
			'id' => "{$prefix}slideshow_interval",
			'type' => 'text',
			'std' => '3000',
		),	
		array(				
			'name' => __('Slideshow Speed', 'swmtranslate'),
			'desc' => __('Enter time for slideshow animation speed <br /> 1000 = 1 second, 5000 = 5 seconds<br />Default: 800', 'swmtranslate'),
			'id' => "{$prefix}slideshow_speed",
			'type' => 'text',
			'std' => '800'
		),				
		array(
			'name' => __('Animation  Type', 'swmtranslate'),
			'desc' => __('Select slideshow transition style', 'swmtranslate'),
			'id' => "{$prefix}flex_animation_type",
			'type' => 'select',
			'std' => 'sides',
			'options'  => array(
				'fade' => __('Fade', 'swmtranslate'),
				'slide' => __('Slide', 'swmtranslate'),				
			),				
		),
		array(
			'name' => __('Slide Direction', 'swmtranslate'),
			'desc' => __('Select slideshow transition style', 'swmtranslate'),
			'id' => "{$prefix}flex_direction",
			'type' => 'select',
			'std' => 'sides',
			'options'  => array(
				'horizontal' => __('Horizontal', 'swmtranslate'),
				'vertical' => __('Vertical', 'swmtranslate'),				
			),				
		),		
		array(
				'name' => __('Animation Loop', 'swmtranslate'),
				'desc' => __('Enable/Disable slideshow animation loop', 'swmtranslate'),
				'id' => "{$prefix}flex_animation_loop",
				'type' => 'checkbox',
				'std' => '1',							
			),
		array(
				'name' => __('Smooth Height', 'swmtranslate'),
				'desc' => __('Enable/Disable slideshow with flexible height', 'swmtranslate'),
				'id' => "{$prefix}flex_smooth_height",
				'type' => 'checkbox',
				'std' => '0',							
			),
		array(
				'name' => __('Bullet Navigation', 'swmtranslate'),
				'desc' => __('Enable/Disable bullet navigation', 'swmtranslate'),
				'id' => "{$prefix}flex_bullet_nav",
				'type' => 'checkbox',
				'std' => '1',							
			),
		array(
				'name' => __('Arrow Navigation', 'swmtranslate'),
				'desc' => __('Enable/Disable slideshow next previous arrows', 'swmtranslate'),
				'id' => "{$prefix}flex_arrow_nav",
				'type' => 'checkbox',
				'std' => '1',							
			),
		array(
				'name' => __('Thumbnails Arrow Navigation', 'swmtranslate'),
				'desc' => __('Enable/Disable thumbnail slides next previous arrows', 'swmtranslate'),
				'id' => "{$prefix}flex_thumbnail_arrow_nav",
				'type' => 'checkbox',
				'std' => '1',							
			),

		array(
				'name' => __('Pause on Mouseover', 'swmtranslate'),
				'desc' => __('Enable/Disable slideshow animation pause on mouseover', 'swmtranslate'),
				'id' => "{$prefix}flex_mouseover",
				'type' => 'checkbox',
				'std' => '1',							
			)
		
	)
);

/* ********************************************************** */

// Display All Meta Boxes

function swm_register_page_meta_boxes()
{
	if (!class_exists('RW_Meta_Box'))
		return;
	
	global $swm_meta_boxes;
	foreach ($swm_meta_boxes as $meta_box) {
		new RW_Meta_Box($meta_box);
	}
}
add_action('admin_init', 'swm_register_page_meta_boxes');