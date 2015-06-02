<?php

$sample_image = SWM_THEME_DIR . '/framework/shortcodes/tinymce/images/';
$google_map_sample = $sample_image . 'google_map_link.jpg';
$google_map_img = '<img src="'.$google_map_sample.'" alt="Google map screenshot" />';

/* ************************************************************************************** 
   TOGGLE
************************************************************************************** */

$swm_shortcodes['toggle'] = array(
	'params' => array(		
		'style' => array(
			'type' => 'select',
			'label' => __('Toogle Style', 'swmtranslate'),
			'desc' => '',
			'options' => array(
				'toggle_box' => __('Box Style', 'swmtranslate'),
				'toggle_icon' => __('Icon Style', 'swmtranslate')							
			)
		),
		'status' => array(
			'type' => 'select',
			'label' => __('Toogle Status', 'swmtranslate'),
			'desc' => '',
			'options' => array(
				'closed' => __('Close', 'swmtranslate'),
				'open' => __('Open', 'swmtranslate')							
			)
		),
		'title' => array(
			'type' => 'text',
			'label' => __('Toggle Content Title', 'swmtranslate'),
			'desc' => __('Add the title that will go above the toggle content', 'swmtranslate'),
			'std' => __('Title', 'swmtranslate')
		),
		'content' => array(
			'std' => __(' [p] Insert toggle content here [/p]  ', 'swmtranslate'),
			'type' => 'textarea',
			'label' => __('Toggle Content', 'swmtranslate'),
			'desc' => __('Add the toggle content. If you are adding more than one line then you can remove [p]...[/p] shortcode because wordpress will automatically add paragraph tag for all next lines.', 'swmtranslate'),
		)
		
	),
	'shortcode' => '[toggle style="{{style}}" status="{{status}}" title="{{title}}"] {{content}} [/toggle]',
	'no_preview' => true, 
	'popup_title' => __('Insert Toggle Content Shortcode', 'swmtranslate')
);

/* ************************************************************************************** 
   TABS
************************************************************************************** */

$swm_shortcodes['tabs'] = array(         
        'params' => array(
            'style' => array(
				'type' => 'select',
				'label' => __('Tab Display Style', 'swmtranslate'),
				'desc' => '',
				'options' => array(
					'style1' => __('Display content by click', 'swmtranslate'),
					'style2' => __('Display content on mouseover', 'swmtranslate')							
					)
			),
            'title1' => array(
                'std' => __('Tab 1', 'swmtranslate'),
                'type' => 'text',
                'label' => __('Tab 1 Title', 'swmtranslate'),
                'desc' => '',
            ),
            'content1' => array(
			'std' => __('Insert tab description here', 'swmtranslate'),
			'type' => 'textarea',
			'label' => __('Tab 1 Description', 'swmtranslate'),
			'desc' => '',
			),
			'title2' => array(
                'std' => __('Tab 2', 'swmtranslate'),
                'type' => 'text',
                'label' => __('Tab 2 Title', 'swmtranslate'),
                'desc' => '',
            ),
            'content2' => array(
			'std' => __('Insert tab description here', 'swmtranslate'),
			'type' => 'textarea',
			'label' => __('Tab 2 Description', 'swmtranslate'),
			'desc' => '',
			),
			'title3' => array(
                'std' => __('Tab 3', 'swmtranslate'),
                'type' => 'text',
                'label' => __('Tab 3 Title', 'swmtranslate'),
                'desc' => '',
            ),
            'content3' => array(
			'std' => __('Insert tab description here', 'swmtranslate'),
			'type' => 'textarea',
			'label' => __('Tab 3 Description', 'swmtranslate'),
			'desc' => '',
			),
			'title4' => array(
                'std' => __('Tab 4', 'swmtranslate'),
                'type' => 'text',
                'label' => __('Tab 4 Title', 'swmtranslate'),
                'desc' => '',
            ),
            'content4' => array(
			'std' => __('Insert tab description here', 'swmtranslate'),
			'type' => 'textarea',
			'label' => __('Tab 4 Description', 'swmtranslate'),
			'desc' => '',
			)
        ),
        'shortcode' => '[tabs style="{{style}}" title="{{title1}},{{title2}},{{title3}},{{title4}}"] 
[tab_container] 
[tab tabno="1"] {{content1}} [/tab] 
[tab tabno="2"] {{content2}} [/tab] 
[tab tabno="3"] {{content3}} [/tab] 
[tab tabno="4"] {{content4}} [/tab] 
[/tab_container] 
[/tabs]',        
		'no_preview' => true, 
		'popup_title' => __('Insert Tabs Shortcode', 'swmtranslate')   
);

/* ************************************************************************************** 
   COLUMNS
************************************************************************************** */

$swm_shortcodes['columns'] = array(
	'params' => array(),
	'shortcode' => ' {{child_shortcode}} ', // as there is no wrapper shortcode
	'popup_title' => __('Insert Columns Shortcode', 'swmtranslate'),
	'no_preview' => true,
	
	// child shortcode is clonable & sortable
	'child_shortcode' => array(
		'params' => array(
			'column' => array(
				'type' => 'select',
				'label' => __('Column Type', 'swmtranslate'),
				'desc' => __('Select the type, ie width of the column.', 'swmtranslate'),
				'options' => array(
					'one_third' => __('One Third', 'swmtranslate'),
					'one_third_last' => __('One Third Last', 'swmtranslate'),
					'two_third' => __('Two Third', 'swmtranslate'),
					'two_third_last' => __('Two Third Last', 'swmtranslate'),
					'one_half' => __('One Half', 'swmtranslate'),
					'one_half_last' => __('One Half Last', 'swmtranslate'),
					'one_fourth' => __('One Fourth', 'swmtranslate'),
					'one_fourth_last' => __('One Fourth Last', 'swmtranslate'),
					'three_fourth' => __('Three Fourth', 'swmtranslate'),
					'three_fourth_last' => __('Three Fourth Last', 'swmtranslate'),
					'one_fifth' => __('One Fifth', 'swmtranslate'),
					'one_fifth_last' => __('One Fifth Last', 'swmtranslate'),
					'two_fifth' => __('Two Fifth', 'swmtranslate'),
					'two_fifth_last' => __('Two Fifth Last', 'swmtranslate'),
					'three_fifth' => __('Three Fifth', 'swmtranslate'),
					'three_fifth_last' => __('Three Fifth Last', 'swmtranslate'),
					'four_fifth' => __('Four Fifth', 'swmtranslate'),
					'four_fifth_last' => __('Four Fifth Last', 'swmtranslate'),
					'one_sixth' => __('One Sixth', 'swmtranslate'),
					'one_sixth_last' => __('One Sixth Last', 'swmtranslate'),
					'five_sixth' => __('Five Sixth', 'swmtranslate'),
					'five_sixth_last' => __('Five Sixth Last', 'swmtranslate')					
				)
			),
			'content' => array(
				'std' => '',
				'type' => 'textarea',
				'label' => __('Column Content', 'swmtranslate'),
				'desc' => __('Add the column content.', 'swmtranslate'),
			)
		),
		'shortcode' => '[{{column}}] {{content}} [/{{column}}] ',
		'clone_button' => __('Add New Column', 'swmtranslate')
	)
);

/* ************************************************************************************** 
   HIGHLIGHT
************************************************************************************** */

$swm_shortcodes['highlight'] = array(
	'params' => array(
		'style' => array(
			'type' => 'select',
			'label' => __('Text Highlighting Style', 'swmtranslate'),
			'desc' => __('Select text highlight color', 'swmtranslate'),
			'options' => array(
				'highlight_yellow' => __('Yellow', 'swmtranslate'),
				'highlight_black' => __('Black', 'swmtranslate'),
				'highlight_blue' => __('Blue', 'swmtranslate'),
				'highlight_green' => __('Green', 'swmtranslate'),
				'highlight_red' => __('Red', 'swmtranslate'),
				'highlight_grey' => __('Grey', 'swmtranslate')				
			)
		),
		'content' => array(
			'std' => __('Highlighting Text', 'swmtranslate'),
			'type' => 'textarea',
			'label' => __('Highlight Text', 'swmtranslate'),
			'desc' => __('Add the highlight text', 'swmtranslate'),
		)
		
	),
	'shortcode' => '[{{style}}] {{content}} [/{{style}}]',
	'no_preview' => true, 
	'popup_title' => __('Insert Highlight Shortcode', 'swmtranslate')
);

/* ************************************************************************************** 
   DROPCAPS
************************************************************************************** */

$swm_shortcodes['dropcaps'] = array(
	'params' => array(
		'color' => array(
			'type' => 'select',
			'label' => __('Dropcap Color', 'swmtranslate'),
			'desc' => __('Select button color', 'swmtranslate'),
			'options' => array(					
				'blue' => __('Blue', 'swmtranslate'),
				'brown' => __('Brown', 'swmtranslate'),
				'golden' => __('Golden', 'swmtranslate'),
				'green' => __('Green', 'swmtranslate'),
				'grey' => __('Grey', 'swmtranslate'),
				'navy_blue' => __('Navy Blue', 'swmtranslate'),
				'orange' => __('Orange', 'swmtranslate'),
				'pink' => __('Pink', 'swmtranslate'),
				'purple' => __('Purple', 'swmtranslate'),
				'red' => __('Red', 'swmtranslate'),
				'teal' => __('Teal', 'swmtranslate'),	
				'white' => __('White', 'swmtranslate'),
				'yellow' => __('Yellow', 'swmtranslate'),
				'dc_nocolor' => __('No Color', 'swmtranslate'),															
			)
		),
		'shape' => array(
			'type' => 'select',
			'label' => __('Dropcap Shape', 'swmtranslate'),
			'desc' => __('Select dropcaps style', 'swmtranslate'),
			'options' => array(
				'' => '',
				'square' => __('Square', 'swmtranslate'),
				'round' => __('Round', 'swmtranslate'),
				'round1' => __('Round 1', 'swmtranslate'),
				'round2' => __('Round 2', 'swmtranslate'),
				'round3' => __('Round 3', 'swmtranslate')
			)
		),
		'size' => array(
			'type' => 'select',
			'label' => __('Dropcap Size', 'swmtranslate'),
			'desc' => __('Select dropcaps size', 'swmtranslate'),
			'options' => array(				
				'dc_small' => __('Small', 'swmtranslate'),
				'dc_medium' => __('Medium', 'swmtranslate'),
				'dc_large' => __('Large', 'swmtranslate')				
			)
		),
		'content' => array(
			'std' => __('A', 'swmtranslate'),
			'type' => 'textarea',
			'label' => __('Dropcap Text', 'swmtranslate'),
			'desc' => __('Add the dropcap text', 'swmtranslate'),
		)
		
	),
	'shortcode' => '[dropcap color="{{color}}" shape="{{shape}}" size="{{size}}"] {{content}} [/dropcap]',
	'no_preview' => true, 
	'popup_title' => __('Insert Dropcaps Shortcode', 'swmtranslate')
);

/* ************************************************************************************** 
   INFO BOXES
************************************************************************************** */

$swm_shortcodes['infoboxes'] = array(
	'params' => array(
		'style' => array(
			'type' => 'select',
			'label' => __('Info Box Style', 'swmtranslate'),
			'desc' => __('Select info box style', 'swmtranslate'),
			'options' => array(
				'info' => __('Info', 'swmtranslate'),
				'success' => __('Success', 'swmtranslate'),
				'error' => __('Error', 'swmtranslate'),
				'warning' => __('Warning', 'swmtranslate'),
				'download' => __('Download', 'swmtranslate'),
				'note' => __('Note', 'swmtranslate')				
			)
		),
		'content' => array(
			'std' => __('Sample text', 'swmtranslate'),
			'type' => 'textarea',
			'label' => __('Info Box Text', 'swmtranslate'),
			'desc' => __('Add the info box text', 'swmtranslate'),
		)
		
	),
	'shortcode' => '[{{style}}] {{content}} [/{{style}}]',
	'no_preview' => true, 
	'popup_title' => __('Insert Info Box Shortcode', 'swmtranslate')
);

/* ************************************************************************************** 
   LIST STYLES
************************************************************************************** */

$swm_shortcodes['textlist'] = array(
	'params' => array(
		'style' => array(
			'type' => 'select',
			'label' => __('Ordered List Style', 'swmtranslate'),
			'desc' => __('Select list style', 'swmtranslate'),
			'options' => array(					
				'steps_with_circle' => __('Steps with circle icons style', 'swmtranslate'),
				'steps_with_box' => __('Steps with Box style', 'swmtranslate'),
				'list_lower_roman' => __('Lower Roman', 'swmtranslate'),
				'list_upper_roman' => __('Upper Roman', 'swmtranslate'),
				'list_lower_alpha' => __('Lower Alpha', 'swmtranslate'),
				'list_upper_alpha' => __('Upper Alpha', 'swmtranslate')											
			)
		),
		'content' => array(
			'std' => '
<ol>
<li> Item One </li>
<li> Item Two </li>
<li> Item Three </li>
</ol>',
			'type' => 'textarea',
			'label' => __('List Content', 'swmtranslate'),
			'desc' => '',
		)		
	),
	'shortcode' => '[{{style}}] {{content}} [/{{style}}]',
	'no_preview' => true,
	'popup_title' => __('Insert List Shortcode', 'swmtranslate')
);

/* ************************************************************************************** 
   QUOTES
************************************************************************************** */

$swm_shortcodes['quote'] = array(
	'params' => array(
		'style' => array(
			'type' => 'select',
			'label' => __('Quote Style', 'swmtranslate'),
			'desc' => __('Select quote style', 'swmtranslate'),
			'options' => array(
				'pullquote_left' => __('Pull Quote Left', 'swmtranslate'),
				'pullquote_right' => __('Pull Quote Right', 'swmtranslate'),
				'blockquote' => __('Block Quote', 'swmtranslate')								
			)
		),
		'content' => array(
			'std' => __('This is sample text', 'swmtranslate'),
			'type' => 'textarea',
			'label' => __('Quote Text', 'swmtranslate'),
			'desc' => __('Add the quote text', 'swmtranslate'),
		),
		'sub_text' => array(
			'std' => __('add sub text here', 'swmtranslate'),
			'type' => 'textarea',
			'label' => __('Sub line text for blockquote', 'swmtranslate'),
			'desc' => __('add sub line text in above box (only applied for blockquote)', 'swmtranslate'),
		),
		'blockquote_border' => array(
			'type' => 'select',
			'label' => __('Blockquote Border', 'swmtranslate'),
			'desc' => __('Select border display style', 'swmtranslate'),
			'options' => array(
				'border_top_bottom' => __('Border Top and Bottom', 'swmtranslate'),
				'border_top' => __('Border Top Only', 'swmtranslate'),
				'border_bottom' => __('Border Bottom Only', 'swmtranslate'),				
				'no_border' => __('No Border', 'swmtranslate')								
			)
		),
		
	),
	'shortcode' => '[{{style}}  sub_text="{{sub_text}}" blockquote_border="{{blockquote_border}}"] {{content}} [/{{style}}]',
	'no_preview' => true, 
	'popup_title' => __('Insert Quote Shortcode', 'swmtranslate')
);

/* ************************************************************************************** 
   BUTTONS
************************************************************************************** */

$swm_shortcodes['button'] = array(
	'params' => array(
		'color' => array(
			'type' => 'select',
			'label' => __('Button Color', 'swmtranslate'),
			'desc' => __('Select button color', 'swmtranslate'),
			'options' => array(				
				'skin_color' => __('Skin Color', 'swmtranslate'),
				'blue' => __('Blue', 'swmtranslate'),
				'brown' => __('Brown', 'swmtranslate'),
				'golden' => __('Golden', 'swmtranslate'),
				'green' => __('Green', 'swmtranslate'),
				'grey' => __('Grey', 'swmtranslate'),
				'navy_blue' => __('Navy Blue', 'swmtranslate'),
				'orange' => __('Orange', 'swmtranslate'),
				'pink' => __('Pink', 'swmtranslate'),
				'purple' => __('Purple', 'swmtranslate'),
				'red' => __('Red', 'swmtranslate'),
				'teal' => __('Teal', 'swmtranslate'),	
				'white' => __('White', 'swmtranslate'),
				'yellow' => __('Yellow', 'swmtranslate')																
			)
		),
		'size' => array(
			'type' => 'select',
			'label' => __('Button Size', 'swmtranslate'),
			'desc' => __('Select display size of button".', 'swmtranslate'),
			'options' => array(				
				'tiny' => __('Tiny', 'swmtranslate'),
				'small' => __('Small', 'swmtranslate'),
				'medium' => __('Medium', 'swmtranslate'),
				'large' => __('Large', 'swmtranslate'),
				'xlarge' => __('X Large', 'swmtranslate')																	
			)
		),
		'shape' => array(
			'type' => 'select',
			'label' => __('Button Shape', 'swmtranslate'),
			'desc' => '',
			'options' => array(
				'square' => __('Square', 'swmtranslate'),	
				'round' => __('Round', 'swmtranslate')
			)
		),		
		'link' => array(
			'type' => 'text',
			'label' => __('Button Link', 'swmtranslate'),
			'desc' => '',
			'std' => '#'
		),
		'content' => array(
			'std' => __('Read more', 'swmtranslate'),
			'type' => 'textarea',
			'label' => __('Button Text', 'swmtranslate'),
			'desc' => __('Add the button text', 'swmtranslate')
		)
		
	),
	'shortcode' => '[button color="{{color}}" size="{{size}}" shape="{{shape}}"  link="{{link}}"] {{content}} [/button]',
	'no_preview' => true, 
	'popup_title' => __('Insert Button Shortcode', 'swmtranslate')
);

/* ************************************************************************************** 
   PRICING TABLES
************************************************************************************** */

$swm_shortcodes['tables'] = array(
	'params' => array(
		'table_column' => array(
			'type' => 'select',
			'label' => __('Table Column', 'swmtranslate'),
			'desc' => '',
			'options' => array(
				'2' => __('Two Column Table', 'swmtranslate'),
				'3' => __('Three Column Table', 'swmtranslate'),	
				'4' => __('Four Column Table', 'swmtranslate'),				
				'5' => __('Five Column Table', 'swmtranslate'),
				'6' => __('Six Column Table', 'swmtranslate')
			)
		),
		'skin' => array(
			'type' => 'select',
			'label' => __('Table Skin Color', 'swmtranslate'),
			'desc' => '',
			'options' => array(
				'blue' => __('Blue', 'swmtranslate'),
				'brown' => __('Brown', 'swmtranslate'),
				'golden' => __('Golden', 'swmtranslate'),
				'green' => __('Green', 'swmtranslate'),
				'grey' => __('Grey', 'swmtranslate'),
				'navy_blue' => __('Navy Blue', 'swmtranslate'),
				'orange' => __('Orange', 'swmtranslate'),
				'pink' => __('Pink', 'swmtranslate'),
				'purple' => __('Purple', 'swmtranslate'),
				'red' => __('Red', 'swmtranslate'),
				'teal' => __('Teal', 'swmtranslate'),	
				'white' => __('White', 'swmtranslate'),
				'yellow' => __('Yellow', 'swmtranslate')									
			)
		),
		'title' => array(
			'type' => 'text',
			'label' => __('Table Title', 'swmtranslate'),
			'desc' => '',
			'std' => __('Title Here', 'swmtranslate')
		),		
		
		'price' => array(
			'type' => 'text',
			'label' => __('Price', 'swmtranslate'),
			'desc' => '',
			'std' => '$19'
		),
		'price_sub_text' => array(
			'type' => 'text',
			'label' => __('Price Sub Text', 'swmtranslate'),
			'desc' => '',
			'std' => ''
		),
		'button_size' => array(
			'type' => 'select',
			'label' => __('Button Size', 'swmtranslate'),
			'desc' => '',
			'options' => array(
				'tiny' => __('Small', 'swmtranslate'),
				'small' => __('Small', 'swmtranslate'),	
				'medium' => __('Medium', 'swmtranslate'),				
				'large' => __('Large', 'swmtranslate'),
				'xlarge' => __('XLarge', 'swmtranslate')
			)
		),
		'button_shape' => array(
			'type' => 'select',
			'label' => __('Button Shape', 'swmtranslate'),
			'desc' => '',
			'options' => array(
				'square' => __('Square', 'swmtranslate'),	
				'round' => __('Round', 'swmtranslate')
			)
		),	
		'button_text' => array(
			'type' => 'text',
			'label' => __('Button Text', 'swmtranslate'),
			'desc' => '',
			'std' => __('Buy Now!', 'swmtranslate')
		),
		'button_link' => array(
			'type' => 'text',
			'label' => __('Button Link', 'swmtranslate'),
			'desc' => '',
			'std' => '#'
		),			
		'special_table' => array(
			'type' => 'select',
			'label' => __('Special Table', 'swmtranslate'),
			'desc' => __('Select Yes to make this table larger than other tables. ', 'swmtranslate'),
			'options' => array(
				'false' => __('No', 'swmtranslate'),	
				'true' => __('Yes', 'swmtranslate')
			)
		),
		'position' => array(
			'type' => 'select',
			'label' => __('Table Position', 'swmtranslate'),
			'desc' => __('If this is last table (i.e. three column third table, four column fourth table, five column fifth tablr or six column sixth table) then select "Last Position" from above dropdown menu.', 'swmtranslate'),
			'options' => array(
				'other' => '',				
				'last' => __('Last Position', 'swmtranslate')												
			)
		),		
		'content' => array(
			'std' => '
<ul>
<li> Table Item One </li>
<li> Table Item Two </li>
<li> Table Item Three </li>
</ul>',
			'type' => 'textarea',
			'label' => __('Table Content', 'swmtranslate'),
			'desc' => __('Add the table content in list format.', 'swmtranslate'),
		)
		
	),
	'shortcode' => '[pricing_table column="{{table_column}}" skin="{{skin}}" title="{{title}}" price="{{price}}" price_sub_text="{{price_sub_text}}" button_size="{{button_size}}"  button_link="{{button_link}}" button_text="{{button_text}}" special_table="{{special_table}}" position="{{position}}"] {{content}} [/pricing_table]',
	'no_preview' => true,
	'popup_title' => __('Insert Table Shortcode', 'swmtranslate')
);

/* ************************************************************************************** 
   GALLERY
************************************************************************************** */

$swm_shortcodes['gallery'] = array(
	'params' => array(		
		'columns' => array(
			'type' => 'select',
			'label' => __('Columns', 'swmtranslate'),
			'desc' => __('Select column as per images size.', 'swmtranslate'),
			'options' => array(
				'4' => __('4 Column Gallery', 'swmtranslate'),
				'3' => __('3 Column Gallery', 'swmtranslate'),
				'2' => __('2 Column Gallery', 'swmtranslate')								
			)
		),
		'caption' => array(
			'type' => 'select',
			'label' => __('Display Caption', 'swmtranslate'),
			'desc' => __('show/hide image caption and description', 'swmtranslate'),
			'options' => array(
				'false' => __('No', 'swmtranslate'),
				'true' => __('Yes', 'swmtranslate')
										
			)
		),
		'gallery_style' => array(
			'type' => 'select',
			'label' => __('Columns', 'swmtranslate'),
			'desc' => __('Select column as per images size.', 'swmtranslate'),
			'options' => array(
				'image_with_hover_caption' => __('Gallery with Hover Caption', 'swmtranslate'),
				'image_with_small_caption' => __('Gallery with Small Caption', 'swmtranslate'),
				'image_with_large_caption' => __('Gallery with Large Caption', 'swmtranslate')								
			)
		),
		'caption_fontsize' => array(
			'type' => 'text',
			'label' => __('Caption Font Size', 'swmtranslate'),
			'desc' => '',
			'std' => '14'
		),
		'description_fontsize' => array(
			'type' => 'text',
			'label' => __('Description Font Size', 'swmtranslate'),
			'desc' => '',
			'std' => '12'
		),
		'description_length' => array(
			'type' => 'text',
			'label' => __('Description Length', 'swmtranslate'),
			'desc' => __('Description text character length', 'swmtranslate'),
			'std' => '70'
		),		
		'image_height' => array(
			'type' => 'text',
			'label' => __('Images Height', 'swmtranslate'),
			'desc' => __('Add custom height or leave it blank for auto image height', 'swmtranslate'),
			'std' => ''
		),
		'images_per_page' => array(
			'type' => 'text',
			'label' => __('Images Per Page', 'swmtranslate'),
			'desc' => '',
			'std' => '12'
		),
		'include' => array(
			'type' => 'textarea',
			'label' => __('Include Imaggs by ID', 'swmtranslate'),
			'desc' => __('Enter image ids seperate by comma e.g. 234,6453,239,7832 ', 'swmtranslate'),
			'std' =>''
		),
		'order' => array(
			'type' => 'select',
			'label' => __('Order', 'swmtranslate'),
			'desc' => __('Specify the sort order used to display thumbnails.', 'swmtranslate'),
			'std' => 'ASC',
			'options' => array(
				'ASC' => __('Ascending Order ', 'swmtranslate'),
				'DESC' => __('Descending Order', 'swmtranslate')								
			)
		),
		'orderby' => array(
			'type' => 'select',
			'label' => __('Order By', 'swmtranslate'),
			'desc' => __('Specify how to sort the display thumbnails', 'swmtranslate'),
			'std' => 'menu_order',
			'options' => array(
				'menu_order' => __('Menu Order', 'swmtranslate'),
				'post_date' => __('Post Date', 'swmtranslate'),
				'ID' => __('ID', 'swmtranslate'),								
				'rand' => __('Random ', 'swmtranslate')		
			)
		),
	),
	'shortcode' => '[gallery columns="{{columns}}" caption="{{caption}}" gallery_style="{{gallery_style}}" caption_fontsize="{{caption_fontsize}}" description_fontsize="{{description_fontsize}}" description_length="{{description_length}}" image_height="{{image_height}}" images_per_page="{{images_per_page}}" order="{{order}}" orderby="{{orderby}}" include="{{include}}" ]',
	'no_preview' => true,
	'popup_title' => __('Insert Gallery Shortcode', 'swmtranslate')
);

/* ************************************************************************************** 
   RECENT POSTS
************************************************************************************** */

$swm_shortcodes['latestnews'] = array(
	'params' => array(
		'style' => array(
			'type' => 'select',
			'label' => __('Recent Posts Style', 'swmtranslate'),
			'desc' => '',
			'options' => array(								
				'circle_style' => __('Display Posts with Circle Style', 'swmtranslate'),													
				'box_style' => __('Display Posts with Box Style', 'swmtranslate')
			)
		),
		'post_limit' => array(
			'type' => 'text',
			'label' => __('Post Limit', 'swmtranslate'),
			'desc' => __('Number of posts to display', 'swmtranslate'),
			'std' => '2'
		),
		'desc_limit' => array(
			'type' => 'text',
			'label' => __('Description Limit', 'swmtranslate'),
			'desc' => __('Number of characters to display in summery text <br />(if Recent Posts Style is "Display Posts with Circle Style" then enter number otherwise leave it blank.)', 'swmtranslate'),
			'std' => '150'
		),		
		'link_text' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Link text', 'swmtranslate'),
			'desc' => __('if Recent Posts Style is "Display Posts with Circle Style" then add link text (e.g. Read more) otherwise leave it blank.', 'swmtranslate'),
		)		
	),
	'shortcode' => '[recent_posts style="{{style}}" post_limit="{{post_limit}}" desc_limit="{{desc_limit}}" link_text="{{link_text}}" ]',
	'no_preview' => true, 
	'popup_title' => __('Insert Recent Posts Shortcode', 'swmtranslate')
);

/* ************************************************************************************** 
   TEAM MEMBER
************************************************************************************** */

$swm_shortcodes['teammember'] = array(
	'params' => array(
		'style' => array(
			'type' => 'select',
			'label' => __('Team Member Style', 'swmtranslate'),
			'desc' => '',
			'options' => array(				
				'tm_style1' => __('Team Member with Large Text', 'swmtranslate'),
				'tm_style2' => __('Team Member with Small Text', 'swmtranslate')													
			)
		),
		'image_src' => array(
			'type' => 'text',
			'label' => __('Team Member Photo', 'swmtranslate'),
			'desc' => __('Enter team member image url - size: 401 x 401', 'swmtranslate'),
			'std' => $sample_image.'team_member1.jpg'
		),
		'name' => array(
			'type' => 'text',
			'label' => __('Name', 'swmtranslate'),
			'desc' => '',
			'std' => __('John Doe', 'swmtranslate')
		),
		'position' => array(
			'type' => 'text',
			'label' => __('Position', 'swmtranslate'),
			'desc' => '',
			'std' => __('Project Manager', 'swmtranslate')
		),		
		'content' => array(
			'std' => '',
			'type' => 'textarea',
			'label' => __('Team Member Info', 'swmtranslate'),
			'desc' => __('if Team Member Style is "Team Member with Large Text"  then add text otherwise leave it blank.', 'swmtranslate'),
		),		
		'column' => array(
			'type' => 'select',
			'label' => __('Display Column', 'swmtranslate'),
			'desc' => '',
			'std' => '',
			'options' => array(				
				'one_half' => __('2 Column', 'swmtranslate'),
				'one_third' => __('3 Column', 'swmtranslate'),
				'one_fourth' => __('4 Column', 'swmtranslate'),
				'one_fifth' => __('5 Column', 'swmtranslate'),
				'one_sixth' => __('6 Column', 'swmtranslate')													
			)
		),		
		'social_media' => array(
			'type' => 'select',
			'label' => __('Social Media Icons', 'swmtranslate'),
			'desc' => '',
			'std' => '',
			'options' => array(				
				'true' => __('Display', 'swmtranslate'),
				'false' => __('Hide', 'swmtranslate')													
			)
		),
		'twitter' => array(
			'type' => 'text',
			'label' => __('Twitter URL', 'swmtranslate'),
			'desc' => '',
			'std' => '#'
		),	
		'facebook' => array(
			'type' => 'text',
			'label' => __('Facebook URL', 'swmtranslate'),
			'desc' => '',
			'std' => '#'
		),	
		'vimeo' => array(
			'type' => 'text',
			'label' => __('Vimeo URL', 'swmtranslate'),
			'desc' => '',
			'std' => ''
		),	
		'youtube' => array(
			'type' => 'text',
			'label' => __('YouTube URL', 'swmtranslate'),
			'desc' => '',
			'std' => ''
		),	
		'flickr' => array(
			'type' => 'text',
			'label' => __('Flickr URL', 'swmtranslate'),
			'desc' => '',
			'std' => ''
		),
		'linkedin' => array(
			'type' => 'text',
			'label' => __('Linkedin URL', 'swmtranslate'),
			'desc' => '',
			'std' => ''
		),
		'rss' => array(
			'type' => 'text',
			'label' => __('RSS URL', 'swmtranslate'),
			'desc' => '',
			'std' => ''
		),
		'blogger' => array(
			'type' => 'text',
			'label' => __('Blogger URL', 'swmtranslate'),
			'desc' => '',
			'std' => ''
		),
		'delicious' => array(
			'type' => 'text',
			'label' => __('Delicious URL', 'swmtranslate'),
			'desc' => '',
			'std' => ''
		),
		'digg' => array(
			'type' => 'text',
			'label' => __('Digg URL', 'swmtranslate'),
			'desc' => '',
			'std' => ''
		),
		'technorati' => array(
			'type' => 'text',
			'label' => __('Technorati URL', 'swmtranslate'),
			'desc' => '',
			'std' => ''
		),
		'stumbleupon' => array(
			'type' => 'text',
			'label' => __('Stumbleupon URL', 'swmtranslate'),
			'desc' => '',
			'std' => ''
		),
		'skype' => array(
			'type' => 'text',
			'label' => __('Sype URL', 'swmtranslate'),
			'desc' => '',
			'std' => ''
		)
		
	),
	'shortcode' => '[team_member style="{{style}}" image_src="{{image_src}}" name="{{name}}" position="{{position}}" column="{{column}}"  social_media="{{social_media}}" twitter="{{twitter}}" facebook="{{facebook}}" vimeo="{{vimeo}}" youtube="{{youtube}}" rss="{{rss}}" flickr="{{flickr}}" linkedin="{{linkedin}}" blogger="{{blogger}}" delicious="{{delicious}}" digg="{{digg}}" technorati="{{technorati}}" stumbleupon="{{stumbleupon}}" skype="{{skype}}" ] {{content}} [/team_member]',
	'no_preview' => true, 
	'popup_title' => __('Insert Team Member Shortcode', 'swmtranslate')
);

/* ************************************************************************************** 
   IMAGE
************************************************************************************** */

$swm_shortcodes['image'] = array(	
	'params' => array(
		'src' => array(
			'type' => 'text',
			'label' => __('Image Source URL', 'swmtranslate'),
			'desc' => '',
			'std' => $sample_image.'sample-image.jpg'
		),		
		'link' => array(
			'type' => 'text',
			'label' => __('Link on Image', 'swmtranslate'),
			'desc' => __('If you want to add lightbox property on this image then give full size image path in above box.', 'swmtranslate'),
			'std' => '#'
		),
		'align' => array(
			'type' => 'select',
			'label' => __('Image Alignment', 'swmtranslate'),
			'desc' => __('Select column as per images size.', 'swmtranslate'),
			'options' => array(
				'left' => __('Left Align', 'swmtranslate'),
				'right' => __('Right Align', 'swmtranslate'),
				'center' => __('Center Align', 'swmtranslate')											
			)
		),
		'border' => array(
			'type' => 'select',
			'label' => __('Add Border', 'swmtranslate'),
			'desc' => '',
			'options' => array(
				'image_border' => __('Yes', 'swmtranslate'),
				'none' => __('No', 'swmtranslate')											
			)
		),
		'lightbox' => array(
			'type' => 'select',
			'label' => __('Image Alignment', 'swmtranslate'),
			'desc' => __('Enable/Disable large image preview in lightbox', 'swmtranslate'),
			'options' => array(
				'false' => __('Lightbox Disable', 'swmtranslate'),	
				'true' => __('Lightbox Enable', 'swmtranslate')																	
			)
		),
		'alt' => array(
			'type' => 'text',
			'label' => __('Image Alternate Text', 'swmtranslate'),
			'desc' => '',
			'std' => ''
		),		
		'title' => array(
			'type' => 'text',
			'label' => __('Image Title Text', 'swmtranslate'),
			'desc' => '',
			'std' => ''
		)		
	),
	'shortcode' => '[image src="{{src}}" align="{{align}}" border="{{border}}" link="{{link}}" alt="{{alt}}" title="{{title}}" lightbox="{{lightbox}}" ]',
	'no_preview' => true, 
	'popup_title' => __('Insert Image Shortcode', 'swmtranslate')
);

/* ************************************************************************************** 
   PROMOTION BOX
************************************************************************************** */

$swm_shortcodes['promotiontext'] = array(
	'params' => array(
		'button_text' => array(
			'type' => 'text',
			'label' => __('Button Text', 'swmtranslate'),
			'desc' => '',
			'std' => __('Signup Now!', 'swmtranslate')
		),
		'button_link' => array(
			'type' => 'text',
			'label' => __('Button Link', 'swmtranslate'),
			'desc' => '',
			'std' => '#'
		),		
		'content' => array(
			'std' => __('Discover the hidden business secrets for your success lorem ipsum', 'swmtranslate'),
			'type' => 'textarea',
			'label' => __('Promotion Text', 'swmtranslate'),
			'desc' => __('Add the promotion text', 'swmtranslate'),
		),
		'sub_text' => array(
			'std' => __('this is sub line promo text', 'swmtranslate'),
			'type' => 'textarea',
			'label' => __('Sub line promo text', 'swmtranslate'),
			'desc' => __('Add the subline promotext', 'swmtranslate'),
		)

	),
	'shortcode' => '[promotion_text button_text="{{button_text}}" button_link="{{button_link}}" sub_text="{{sub_text}}" ] {{content}} [/promotion_text]',
	'no_preview' => true,
	'popup_title' => __('Insert Promo Text Shortcode', 'swmtranslate')
);

/* ************************************************************************************** 
   FANCY BOX
************************************************************************************** */

$swm_shortcodes['fancybox'] = array(
	'params' => array(
		'title' => array(
			'type' => 'text',
			'label' => __('Title Text', 'swmtranslate'),
			'desc' => '',
			'std' => __('Title Text', 'swmtranslate')
		),
		'skin' => array(
			'type' => 'select',
			'label' => __('Title Color', 'swmtranslate'),
			'desc' => '',
			'options' => array(
				'blue' => __('Blue', 'swmtranslate'),
				'brown' => __('Brown', 'swmtranslate'),
				'golden' => __('Golden', 'swmtranslate'),
				'green' => __('Green', 'swmtranslate'),
				'grey' => __('Grey', 'swmtranslate'),
				'navy_blue' => __('Navy Blue', 'swmtranslate'),
				'orange' => __('Orange', 'swmtranslate'),
				'pink' => __('Pink', 'swmtranslate'),
				'purple' => __('Purple', 'swmtranslate'),
				'red' => __('Red', 'swmtranslate'),
				'teal' => __('Teal', 'swmtranslate'),	
				'white' => __('White', 'swmtranslate'),
				'yellow' => __('Yellow', 'swmtranslate')									
			)
		),		
		'content' => array(
			'std' => __('Insert fancybox text here', 'swmtranslate'),
			'type' => 'textarea',
			'label' => __('Promotion Box Text', 'swmtranslate'),
			'desc' => __('Add the promotion box text', 'swmtranslate'),
		)		
	),
	'shortcode' => '[fancybox title="{{title}}" color="{{skin}}" ] {{content}} [/fancybox]',
	'no_preview' => true,
	'popup_title' => __('Insert Promotion Box Shortcode', 'swmtranslate')
);

/* ************************************************************************************** 
   LINE BREAKS
************************************************************************************** */

$swm_shortcodes['linebreak'] = array(
	'params' => array(
		'linebreak' => array(
			'type' => 'select',
			'label' => __('Toogle Type', 'swmtranslate'),
			'desc' => '',
			'options' => array(
				'hr' => __('Double line Horizontal Line', 'swmtranslate'),				
				'top' => __('Horizontal line with "Top" link', 'swmtranslate'),
				'top2' => __('Horizontal line with "Top" link style 2', 'swmtranslate')				
			)
		),
		'infotext' => array(
			'type' => 'infotext',
			'label' => __('Note:', 'swmtranslate'),
			'desc' => '',
			'std' => __('If you want to give simple line break then use shortcode [break] <br />
					  Use shortcode [clear] to fix content left or right floating problems.', 'swmtranslate')
		)		
	),
	'shortcode' => '[{{linebreak}}]',
	'no_preview' => true, 
	'popup_title' => __('Insert Line Break Shortcode', 'swmtranslate')
);

/* ************************************************************************************** 
   SOCIAL MEDIA
************************************************************************************** */

$swm_shortcodes['socialmedia'] = array(
	'params' => array(				
		'twitter_link' => array(
			'type' => 'text',
			'label' => __('Twitter', 'swmtranslate'),
			'desc' => '',
			'std' => '#'
		),
		'facebook_link' => array(
			'type' => 'text',
			'label' => __('Facebook', 'swmtranslate'),
			'desc' => '',
			'std' => '#'
		),
		'youtube_link' => array(
			'type' => 'text',
			'label' => __('YouTube', 'swmtranslate'),
			'desc' => '',
			'std' => '#'
		),
		'flickr_link' => array(
			'type' => 'text',
			'label' => __('Flickr', 'swmtranslate'),
			'desc' => '',
			'std' => '#'
		),
		'linkedin_link' => array(
			'type' => 'text',
			'label' => __('Linkedin', 'swmtranslate'),
			'desc' => '',
			'std' => '#'
		),
		'vimeo_link' => array(
			'type' => 'text',
			'label' => __('Vimeo', 'swmtranslate'),
			'desc' => '',
			'std' => '#'
		),
		'rss_link' => array(
			'type' => 'text',
			'label' => __('RSS', 'swmtranslate'),
			'desc' => '',
			'std' => '#'
		),
		'blogger_link' => array(
			'type' => 'text',
			'label' => __('Blogger', 'swmtranslate'),
			'desc' => '',
			'std' => '#'
		),
		'delicious_link' => array(
			'type' => 'text',
			'label' => __('Delicious', 'swmtranslate'),
			'desc' => '',
			'std' => '#'
		),
		'digg_link' => array(
			'type' => 'text',
			'label' => __('Digg', 'swmtranslate'),
			'desc' => '',
			'std' => '#'
		),
		'technorati_link' => array(
			'type' => 'text',
			'label' => __('Technorati', 'swmtranslate'),
			'desc' => '',
			'std' => '#'
		),
		'stumbleupon_link' => array(
			'type' => 'text',
			'label' => __('StumbleUpon', 'swmtranslate'),
			'desc' => '',
			'std' => '#'
		),
		'skype_link' => array(
			'type' => 'text',
			'label' => __('Skype', 'swmtranslate'),
			'desc' => '',
			'std' => '#'
		),
		'wordpress_link' => array(
			'type' => 'text',
			'label' => __('Wordpress', 'swmtranslate'),
			'desc' => '',
			'std' => '#'
		),
		'yahoo_link' => array(
			'type' => 'text',
			'label' => __('Yahoo', 'swmtranslate'),
			'desc' => '',
			'std' => '#'
		),
		'picasa_link' => array(
			'type' => 'text',
			'label' => __('Picasa', 'swmtranslate'),
			'desc' => '',
			'std' => '#'
		)
		
	),
	'shortcode' => '
	
	[social_media] 
	
	[twitter link="{{twitter_link}}"]
	[facebook link="{{facebook_link}}"]
	[youtube link="{{youtube_link}}"]
	[flickr link="{{flickr_link}}"]
	[linkedin link="{{linkedin_link}}"]
	[vimeo link="{{vimeo_link}}"]
	[rss link="{{rss_link}}"]
	[blogger link="{{blogger_link}}"]	
	[delicious link="{{delicious_link}}"]
	[digg link="{{digg_link}}"]
	[technorati link="{{technorati_link}}"]
	[stumbleupon link="{{stumbleupon_link}}"]
	[skype link="{{skype_link}}"]
	[wordpress link="{{wordpress_link}}"]
	[yahoo link="{{yahoo_link}}"]
	[picasa link="{{picasa_link}}"]
	
	[/social_media]',
	
	'no_preview' => true,
	'popup_title' => __('Insert Social Media Shortcode', 'swmtranslate')
);

/* ************************************************************************************** 
   RECENT PROJECT SLIDER
************************************************************************************** */

$swm_shortcodes['recentprojectsslider'] = array(
    'params' => array(
		'title' => array(
                'std' => 'Recent Projects',
                'type' => 'text',
                'label' => __('Slider Title', 'swmtranslate'),
                'desc' => '',
        ),			
		'page_type' => array(
				'type' => 'select',
				'label' => __('Display Page', 'swmtranslate'),
				'desc' => __('If you want to rotate slides auto then select yes', 'swmtranslate'),
				'options' => array(
					'inner' => __('Inner page with white background', 'swmtranslate'),
					'home' => __('Default Home page - Two Third Column', 'swmtranslate')														
			)		         
		),
		'auto_slide' => array(
				'type' => 'select',
				'label' => __('Auto Slide', 'swmtranslate'),
				'desc' => __('If you want to rotate slides auto then select yes', 'swmtranslate'),
				'options' => array(
					'true' => __('Yes', 'swmtranslate'),
					'false' => __('No', 'swmtranslate')														
			)		         
		),
		'slider_speed' => array(
                'std' => '7000',
                'type' => 'text',
                'label' => __('Slider Speed', 'swmtranslate'),
                'desc' => __('Intreval between two slides. 1000=1 second, 5000= 5 second', 'swmtranslate'),
        ),
        'button_text' => array(
                'std' => '',
                'type' => 'text',
                'label' => __('Button Text', 'swmtranslate'),
                'desc' => __('Add button text like - View All Projects', 'swmtranslate'),
        ),
        'button_link' => array(
                'std' => '',
                'type' => 'text',
                'label' => __('Button Link', 'swmtranslate'),
                'desc' => __('Add button link', 'swmtranslate'),
        ),
	),
    	
    'no_preview' => true,
    'shortcode' => '[rp_slider title="{{title}}" page_type="{{page_type}}" auto_slide="{{auto_slide}}" slider_speed="{{slider_speed}}" button_text="{{button_text}}" button_link="{{button_link}}"] {{child_shortcode}} [/rp_slider]',
    'popup_title' => __('Insert Recent Projects Slider Shortcode', 'swmtranslate'),
    
    'child_shortcode' => array(
        'params' => array(
            'src' => array(
                'std' => $sample_image.'recentproject1.jpg',
                'type' => 'text',
                'label' => __('Slide Image Source', 'swmtranslate'),
                'desc' => __('Image size : 219px width and 173px height', 'swmtranslate'),
            ),
			'link' => array(
                'std' => '#',
                'type' => 'text',
                'label' => __('Link on Image', 'swmtranslate'),
                'desc' => __('Give large image or page url as per your requirement', 'swmtranslate'),
            ),
            'lightbox' => array(
				'type' => 'select',
				'label' => __('Lightbox', 'swmtranslate'),
				'desc' => __('Select event you want after click on thumbnail', 'swmtranslate'),
				'options' => array(
					'true' => __('Display Large Image In Lightbox', 'swmtranslate'),
					'false' => __('Disable Lightbox and Go to link page', 'swmtranslate')														
				)		         
			),
			'project_title' => array(
                'std' => __('Project title text', 'swmtranslate'),
                'type' => 'text',
                'label' => __('Project Title', 'swmtranslate'),
                'desc' => '',
            ),
            'project_title_link' => array(
                'std' => __('Project title link', 'swmtranslate'),
                'type' => 'text',
                'label' => __('Project Title Link', 'swmtranslate'),
                'desc' => '',
            ),
            'project_details' => array(
                'std' => __('project details text', 'swmtranslate'),
                'type' => 'text',
                'label' => __('Project Details', 'swmtranslate'),
                'desc' => '',
            )  

        ),
        'shortcode' => '[rp_slide src="{{src}}" link="{{link}}" lightbox="{{lightbox}}" project_title="{{project_title}}" project_title_link="{{project_title_link}}" project_details="{{project_details}}"]',
		'no_preview' => true, 
        'clone_button' => __('Add Another Slide', 'swmtranslate')
    )
);

/* ************************************************************************************** 
   LOGO SLIDER
************************************************************************************** */

$swm_shortcodes['logoslider'] = array(
    'params' => array(
		'title' => array(
                'std' => 'Client Logos',
                'type' => 'text',
                'label' => __('Slider Title', 'swmtranslate'),
                'desc' => '',
            ),				
		'auto_slide' => array(
				'type' => 'select',
				'label' => __('Auto Slide', 'swmtranslate'),
				'desc' => __('If you want to rotate slides auto then select yes', 'swmtranslate'),
				'options' => array(
					'true' => __('Yes', 'swmtranslate'),
					'false' => __('No', 'swmtranslate')														
			)		         
		),
		'slider_speed' => array(
                'std' => '7000',
                'type' => 'text',
                'label' => __('Slider Speed', 'swmtranslate'),
                'desc' => __('Intreval between two slides. 1000=1 second, 5000= 5 second', 'swmtranslate'),
            )

	),
    	
    'no_preview' => true,
    'shortcode' => '[logo_slider title="{{title}}" auto_slide="{{auto_slide}}" slider_speed="{{slider_speed}}"] {{child_shortcode}} [/logo_slider]',
    'popup_title' => __('Insert Logo Slider  Shortcode', 'swmtranslate'),
    
    'child_shortcode' => array(
        'params' => array(
            'src' => array(
                'std' => $sample_image.'lg1.jpg',
                'type' => 'text',
                'label' => __('Slide Image Source', 'swmtranslate'),
                'desc' => __('Image size : 146px width and 104px height', 'swmtranslate'),
            ),
			'link' => array(
                'std' => '#',
                'type' => 'text',
                'label' => __('Link on Image', 'swmtranslate'),
                'desc' => __('Give large image or page url as per your requirement', 'swmtranslate'),
            ),
            'lightbox' => array(
				'type' => 'select',
				'label' => __('Lightbox', 'swmtranslate'),
				'desc' => __('Select event you want after click on thumbnail', 'swmtranslate'),
				'options' => array(
					'true' => __('Display Large Image In Lightbox', 'swmtranslate'),
					'false' => __('Disable Lightbox and Go to link page', 'swmtranslate')														
				)		         
			)
			

        ),
        'shortcode' => '[logo_slide src="{{src}}" alt="" link="{{link}}" lightbox="{{lightbox}}" ]',
		'no_preview' => true, 
        'clone_button' => __('Add Another Slide', 'swmtranslate')
    )
);

/* ************************************************************************************** 
   GOOGLE MAP
************************************************************************************** */

$swm_shortcodes['googlemap'] = array(
	'params' => array(		
		'height' => array(
                'std' => '300',
                'type' => 'text',
                'label' => __('Google Map Height', 'swmtranslate'),
                'desc' => '',
            ),
		'src' => array(
                'std' => 'https://maps.google.com/maps?q=new+york&hl=en&ll=40.714346,-74.005966&spn=0.055103,0.132093&hnear=New+York&t=m&z=14',
                'type' => 'text',
                'label' => __('Google Map URL', 'swmtranslate'),
                'desc' => 'Go to google map website, add your address in search box and copy google map URL as per below screenshot.<br /><br />'.$google_map_img,
            )		
	),
	'shortcode' => '[google_map height="{{height}}" src="{{src}}"] ',
	'no_preview' => true, 
	'popup_title' => __('Insert Google Map  Shortcode', 'swmtranslate')
);


/* ************************************************************************************** 
   HORIZONTAL MENU
************************************************************************************** */

$swm_shortcodes['horizontalmenu'] = array(         
        'params' => array(
            'text1' => array(
                'std' => __('Tab 1 Text', 'swmtranslate'),
                'type' => 'text',
                'label' => __('Tab 1 Text', 'swmtranslate'),
                'desc' => '',
            ),
            'link1' => array(
			'std' => '#',
			'type' => 'text',
			'label' => __('Tab 1 link', 'swmtranslate'),
			'desc' => '',
			),
			'text2' => array(
                'std' => __('Tab 2 Text', 'swmtranslate'),
                'type' => 'text',
                'label' => __('Tab 2 Text', 'swmtranslate'),
                'desc' => '',
            ),
            'link2' => array(
			'std' => '#',
			'type' => 'text',
			'label' => __('Tab 2 link', 'swmtranslate'),
			'desc' => '',
			),
			'text3' => array(
                'std' => __('Tab 3 Text', 'swmtranslate'),
                'type' => 'text',
                'label' => __('Tab 3 Text', 'swmtranslate'),
                'desc' => '',
            ),
            'link3' => array(
			'std' => '#',
			'type' => 'text',
			'label' => __('Tab 3 link', 'swmtranslate'),
			'desc' => '',
			),
			'text4' => array(
                'std' => __('Tab 4 Text', 'swmtranslate'),
                'type' => 'text',
                'label' => __('Tab 4 Text', 'swmtranslate'),
                'desc' => '',
            ),
            'link4' => array(
			'std' => '#',
			'type' => 'text',
			'label' => __('Tab 4 link', 'swmtranslate'),
			'desc' => '',
			)
        ),
        'shortcode' => '[horizontal_tab]
[menu_tab text="{{text1}}" link="{{link1}}" active="true"]
[menu_tab text="{{text2}}" link="{{link2}}"]
[menu_tab text="{{text3}}" link="{{link3}}"]
[menu_tab text="{{text4}}" link="{{link4}}" ]
[/horizontal_tab]',        
		'no_preview' => true, 
		'popup_title' => __('Insert Horizontal Menu Shortcode', 'swmtranslate')   
);

/* ************************************************************************************** 
   TOOLTIPS
************************************************************************************** */

$swm_shortcodes['tooltip'] = array(
	'params' => array(
		'position' => array(
			'type' => 'select',
			'label' => __('Tooltip Position', 'swmtranslate'),
			'desc' => __('Select tooltip display position', 'swmtranslate'),
			'options' => array(
				'tipUp' => __('Up', 'swmtranslate'),
				'tipDown' => __('Down', 'swmtranslate'),	
				'tipLeft' => __('Left', 'swmtranslate'),
				'tipRight' => __('Right', 'swmtranslate')
			)
		),
		'tooltip_text' => array(
			'std' => __('Exmaple of tooltip text', 'swmtranslate'),
			'type' => 'textarea',
			'label' => __('Tooltip Text', 'swmtranslate'),
			'desc' => __('Enter text which you want to display in tooltip', 'swmtranslate'),
		),
		'content' => array(
			'std' => __('Tooltip', 'swmtranslate'),
			'type' => 'text',
			'label' => __('Content', 'swmtranslate'),
			'desc' => ''
		)
		
	),
	'shortcode' => '[tooltip position="{{position}}" tooltip_text="{{tooltip_text}}"] {{content}} [/tooltip]',
	'no_preview' => true, 
	'popup_title' => __('Insert Tooltips Shortcode', 'swmtranslate')
);

/* ************************************************************************************** 
   FLICKR PHOTOS
************************************************************************************** */

$swm_shortcodes['flickrphotos'] = array(
	'params' => array(		
		'flickr_id' => array(
                'std' => '90291761@N02',
                'type' => 'text',
                'label' => __('Flickr Id', 'swmtranslate'),
                'desc' => __('<a target="_blank" href="http://idgettr.com/">Help to find Flickr Id</a>', 'swmtranslate'),                
            ),
		'display_photos' => array(
                'std' => '6',
                'type' => 'text',
                'label' => __('Display Photos', 'swmtranslate'),
                'desc' => 'Number of display photos',
            )		
	),
	'shortcode' => '[flickr_sc flickr_id="{{flickr_id}}" display_photos="{{display_photos}}" ] ',
	'no_preview' => true, 
	'popup_title' => __('Insert Flickr Shortcode', 'swmtranslate')
);

/* ************************************************************************************** 
   SKILL BAR
************************************************************************************** */

$swm_shortcodes['skillbar'] = array(
	'params' => array(),
	'shortcode' => ' {{child_shortcode}} ', // as there is no wrapper shortcode
	'popup_title' => __('Insert Skill Bar Shortcode', 'swmtranslate'),
	'no_preview' => true,
	
	// child shortcode is clonable & sortable
	'child_shortcode' => array(
		'params' => array(
			'skill_name' => array(
				'std' => 'HTML',
				'type' => 'text',
				'label' => __('Skill Name', 'swmtranslate'),
				'desc' => __('Add skill name e.g. HTML', 'swmtranslate'),
			),			
			'bar_color' => array(
			'type' => 'select',
			'label' => __('Skill Bar Color', 'swmtranslate'),
			'desc' => '',
			'options' => array(
				'skin_color' => __('Skin Color', 'swmtranslate'),
				'blue' => __('Blue', 'swmtranslate'),
				'brown' => __('Brown', 'swmtranslate'),
				'golden' => __('Golden', 'swmtranslate'),
				'green' => __('Green', 'swmtranslate'),
				'grey' => __('Grey', 'swmtranslate'),
				'navy_blue' => __('Navy Blue', 'swmtranslate'),
				'orange' => __('Orange', 'swmtranslate'),
				'pink' => __('Pink', 'swmtranslate'),
				'purple' => __('Purple', 'swmtranslate'),
				'red' => __('Red', 'swmtranslate'),
				'teal' => __('Teal', 'swmtranslate'),	
				'white' => __('White', 'swmtranslate'),
				'yellow' => __('Yellow', 'swmtranslate')									
				)
			),	
			'percentage' => array(
				'std' => '50%',
				'type' => 'text',
				'label' => __('Skill Percentage', 'swmtranslate'),
				'desc' => __('Add skill percentage e.g. 40%', 'swmtranslate'),
			)			
		),
		'shortcode' => '[skill_bar skill_name="{{skill_name}}" bar_color="{{bar_color}}" percentage="{{percentage}}" ] ',
		'clone_button' => __('Add Another Skill', 'swmtranslate')
	)
);

/* ************************************************************************************** 
   SUPPORT TEAM
************************************************************************************** */

$swm_shortcodes['supportteam'] = array(
	'params' => array(
		'image_src' => array(
			'type' => 'text',
			'label' => __('Team Member Photo', 'swmtranslate'),
			'desc' => 'Size- 99px width and 93px height',
			'std' => $sample_image.'/team_member_small1.jpg'
		),
		'name' => array(
			'type' => 'text',
			'label' => __('Name', 'swmtranslate'),
			'desc' => '',
			'std' => __('John Doe', 'swmtranslate')
		),
		'position' => array(
			'type' => 'text',
			'label' => __('Position', 'swmtranslate'),
			'desc' => '',
			'std' => __('Project Manager', 'swmtranslate')
		),		
		'email' => array(
			'type' => 'text',
			'label' => __('Email Id', 'swmtranslate'),
			'desc' => '',
			'std' => __('info@yourdomain.com', 'swmtranslate')
		),	
		'phone' => array(
			'type' => 'text',
			'label' => __('Phone No.', 'swmtranslate'),
			'desc' => '',
			'std' => '880-654-3210'
		)		
		
	),
	'shortcode' => '[support_team image_src="{{image_src}}" name="{{name}}" position="{{position}}" email="{{email}}" phone="{{phone}}" ]',
	'no_preview' => true, 
	'popup_title' => __('Insert Support Team Shortcode', 'swmtranslate')
);

/* ************************************************************************************** 
   SERVICES
************************************************************************************** */

$swm_shortcodes['serviceslist'] = array(
    'params' => array(),
    'no_preview' => true,
    'shortcode' => '{{child_shortcode}}',
    'popup_title' => __('Insert Services Shortcode', 'swmtranslate'),
    
    'child_shortcode' => array(
        'params' => array(
            'services_style' => array(
				'type' => 'select',
				'label' => __('Services Content Style', 'swmtranslate'),
				'desc' => '',
				'options' => array(					
					'services-small' => __('Small circle icons (icon size - 40x40 )', 'swmtranslate'),
					'services-medium' => __('Medium circle icons with sub title (icon size - 43x43 )', 'swmtranslate'),
					'services-large' => __('Large circle icons with sub title (icon size - 64x64 )', 'swmtranslate')											
				)
			),	
            'image_src' => array(
                'std' => $sample_image.'services_icon.png',
                'type' => 'text',
                'label' => __('Icon URL', 'swmtranslate'),
                'desc' => '- Add services icon full url as per given example url <br /> - Use ICON SIZE as per selected cotnent style from "Services Content Style" dropdown',
            ),
            'title' => array(
                'std' => 'Service Title',
                'type' => 'text',
                'label' => __('Service Title', 'swmtranslate'),
                'desc' => '',
            ),			
			'sub_title' => array(
                'std' => '',
                'type' => 'text',
                'label' => __('Sub Title', 'swmtranslate'),
                'desc' => 'Leave it blank if you are using small or large circle icons option from "Services Content Style" dropdown',
            ),
            'content' => array(
                'std' => 'Lorem ipsum dolor sit amet, consectetur adipisg elitm Ut tincidunt purus iaculis ipsum dctum non dtum quam sceleri.',
                'type' => 'textarea',
                'label' => __('Services Content', 'swmtranslate'),
                'desc' => __('Add long/short description of the service ', 'swmtranslate'),
            ),            
        ),
        'shortcode' => '[our_service services_style="{{services_style}}" title="{{title}}" image_src="{{image_src}}" sub_title="{{sub_title}}"] {{content}} [/our_service]',
		'no_preview' => true, 
        'clone_button' => __('Add Another Service', 'swmtranslate')
    )
);

/* ************************************************************************************** 
   IMAGE SLIDER
************************************************************************************** */

$swm_shortcodes['imageslider'] = array(
    'params' => array(
    	'animation_type' => array(
			'type' => 'select',
			'label' => __('Animation Type', 'swmtranslate'),
			'desc' => '',
			'options' => array(					
				'fade' => __('Fade', 'swmtranslate'),
				'slide' => __('Slide', 'swmtranslate')												
			)
		),
		'auto_play' => array(
			'type' => 'select',
			'label' => __('Auto Play', 'swmtranslate'),
			'desc' => '',
			'options' => array(					
				'true' => __('Yes', 'swmtranslate'),
				'false' => __('No', 'swmtranslate')												
			)
		),
		'bullet_navigation' => array(
			'type' => 'select',
			'label' => __('Display Bullet Navigation', 'swmtranslate'),
			'desc' => '',
			'options' => array(					
				'true' => __('Yes', 'swmtranslate'),
				'false' => __('No', 'swmtranslate')												
			)
		),
		'arrow_navigation' => array(
			'type' => 'select',
			'label' => __('Display Arrow Navigation', 'swmtranslate'),
			'desc' => '',
			'options' => array(					
				'true' => __('Yes', 'swmtranslate'),
				'false' => __('No', 'swmtranslate')												
			)
		),
		'slide_interval' => array(
			'type' => 'text',
			'label' => __('Slideshow Speed', 'swmtranslate'),
			'desc' => __('Intreval between two slides. 1000=1 second, 5000= 5 second', 'swmtranslate'),
			'std' => '5000'		
		)
    ),
    'no_preview' => true,
    'shortcode' => '[image_slider animation_type="{{animation_type}}" auto_play="{{auto_play}}" bullet_navigation="{{bullet_navigation}}" arrow_navigation="{{arrow_navigation}}" slide_interval="{{slide_interval}}"] {{child_shortcode}} [/image_slider]',
    'popup_title' => __('Insert Image Slider Shortcode', 'swmtranslate'),
    
    'child_shortcode' => array(
        'params' => array(
            'src' => array(
				'type' => 'text',
				'label' => __('Image Source URL', 'swmtranslate'),
				'desc' => 'Maximum image width : 940px, height size is flexible.',
				'std' => $sample_image.'image_slide.jpg'
			)                        
        ),        
        'shortcode' => '[image_slide src="{{src}}" alt=""]',
		'no_preview' => true, 
        'clone_button' => __('Add Another Slide', 'swmtranslate')
    )
);

/* ************************************************************************************** 
   LIST ICONS
************************************************************************************** */

$swm_shortcodes['iconlist'] = array(
	   		'params' => array(
	    		'infotext' => array(
				'type' => 'infotext',
				'label' => __('Note:', 'swmtranslate'),
				'desc' => __('If you want to use icon without list style then you can use simple shortcode </br > [my_icon icon_name="icon-star"]', 'swmtranslate'),
				'std' => ''
			)
    	),
    'no_preview' => true,
    'shortcode' => '[icon_list] {{child_shortcode}} [/icon_list]',
    'popup_title' => __('Insert List Icons Shortcode', 'swmtranslate'),
    
    'child_shortcode' => array(
        'params' => array(
            'icon_name' => array(
				'type' => 'text',
				'label' => __('Icon Name', 'swmtranslate'),
				'desc' => 'Add icon name, you can refer icon name <a href="http://evolve.premiumthemes.in/list-styles.html" target="_blank">from this page</a>.',
				'std' => 'icon-star'
			),
			'content' => array(
                'std' => 'Lorem ipsum dolor sit amet, consectetur adipisg elitm Ut tincidunt purus iaculis ipsum dctum non dtum quam sceleri.',
                'type' => 'textarea',
                'label' => __('List Content', 'swmtranslate'),
                'desc' => '',
            ), 
        ),
        'shortcode' => '[icon icon_name="{{icon_name}}"] {{content}} [/icon]',
		'no_preview' => true, 
        'clone_button' => __('Add Another Item', 'swmtranslate')
    )
);

/* ************************************************************************************** 
   AWARD LIST
************************************************************************************** */

$swm_shortcodes['awardslist'] = array(
    'params' => array(),
    'no_preview' => true,
    'shortcode' => '[awards_list] {{child_shortcode}} [/awards_list]',
    'popup_title' => __('Insert Awards List Shortcode', 'swmtranslate'),
    
    'child_shortcode' => array(
        'params' => array(
            'title' => array(
				'type' => 'text',
				'label' => __('Award Title', 'swmtranslate'),
				'desc' => '',
				'std' => 'Web Design Award 2012'
			),
			 'website_name' => array(
				'type' => 'text',
				'label' => __('Website Name', 'swmtranslate'),
				'desc' => '',
				'std' => 'Web Design Awards'
			),
			'website_url' => array(
                'std' => 'http://www.exampleurl.com',
                'type' => 'text',
                'label' => __('Website URL', 'swmtranslate'),
                'desc' => ''
            ), 
        ),
        'shortcode' => '[award title="{{title}}" website_name="{{website_name}}" website_url="{{website_url}}"]',
		'no_preview' => true, 
        'clone_button' => __('Add Another Item', 'swmtranslate')
    )
);

/* ************************************************************************************** 
   VIDEO
************************************************************************************** */

$swm_shortcodes['video'] = array(
	'params' => array(
		'source' => array(
			'type' => 'text',
			'label' => __('Video URL', 'swmtranslate'),
			'desc' => __('Enter embed YouTube/Vimeo video URL.<br />Use sample URLs and replace video ids in  sample URL<br /> YouTube : http://www.youtube.com/embed/sn1GG20V_m8 <br />Vimeo: http://player.vimeo.com/video/30955798 <br /> ', 'swmtranslate'),
			'std' => 'http://www.youtube.com/embed/sn1GG20V_m8'
		)		
	),
	'shortcode' => '[video source="{{source}}" ]',
	'no_preview' => true, 
	'popup_title' => __('Insert Video Shortcode', 'swmtranslate')
);

/* ************************************************************************************** 
   CONTACT FORM
************************************************************************************** */

$swm_shortcodes['contactform'] = array(
	'params' => array(		
		'email' => array(
                'std' => 'info@domainname.com',
                'type' => 'text',
                'label' => __('Email Id', 'swmtranslate'),
                'desc' => __('Enter email address where you want to receive contact form emails', 'swmtranslate'),
            ),
		'subject' => array(
                'std' => 'Contact Form',
                'type' => 'text',
                'label' => __('Subject Text', 'swmtranslate'),
                'desc' => __('Enter subject message which will display in your email inbox subject section', 'swmtranslate'),
            )		
	),
	'shortcode' => '[contact_form email="{{email}}" subject="{{subject}}" ] ',
	'no_preview' => true, 
	'popup_title' => __('Insert Contact Form Shortcode', 'swmtranslate')
);

/* ************************************************************************************** 
   Testimonials
************************************************************************************** */

$swm_shortcodes['testimonials1'] = array(
	'params' => array(
		'client_image_url' => array(
			'type' => 'text',
			'label' => __('Client\'s Image URL', 'swmtranslate'),
			'desc' => __('Enter client\'s image url. Default size 48px width, 48px height.', 'swmtranslate'),
			'std' => $sample_image.'client1.jpg'
		),
		'client_name' => array(
			'type' => 'text',
			'label' => __('Client Name', 'swmtranslate'),
			'desc' => '',
			'std' => __('John Doe', 'swmtranslate')
		),
		'client_details' => array(
			'type' => 'text',
			'label' => __('Client Details', 'swmtranslate'),
			'desc' => '',
			'std' => __('Art Director, NY.', 'swmtranslate')
		),
		'website_title' => array(
			'type' => 'text',
			'label' => __('Website Title', 'swmtranslate'),
			'desc' => __('This is optional field', 'swmtranslate'),
			'std' => __('Loremips Inc.', 'swmtranslate')
		),
		'website_url' => array(
			'type' => 'text',
			'label' => __('Website URL', 'swmtranslate'),
			'desc' => __('This is optional field', 'swmtranslate'),
			'std' => __('http://www.loremips.com', 'swmtranslate')
		),			
		'content' => array(
			'std' => __('client testimonials text here lorem ipsum dolor sit amet consectetur adipiscing elit roin vestibulum auctor enim in commodo', 'swmtranslate'),
			'type' => 'textarea',
			'label' => __('Testimonial', 'swmtranslate'),
			'desc' => '',
		)		
	),
	'shortcode' => '[testimonials_with_client_image client_image_url="{{client_image_url}}" client_name="{{client_name}}" client_details="{{client_details}}" website_title="{{website_title}}" website_url="{{website_url}}" ] {{content}} [/testimonials_with_client_image]',
	'no_preview' => true,
	'popup_title' => __('Insert Testimonials with Client Image Shortcode', 'swmtranslate')
);

$swm_shortcodes['testimonials2'] = array(
	'params' => array(		
		'client_name' => array(
			'type' => 'text',
			'label' => __('Client Name', 'swmtranslate'),
			'desc' => '',
			'std' => __('John Doe', 'swmtranslate')
		),
		'client_details' => array(
			'type' => 'text',
			'label' => __('Client Details', 'swmtranslate'),
			'desc' => '',
			'std' => __('Art Director, NY.', 'swmtranslate')
		),
		'website_title' => array(
			'type' => 'text',
			'label' => __('Website Title', 'swmtranslate'),
			'desc' => __('This is optional field', 'swmtranslate'),
			'std' => __('Loremips Inc.', 'swmtranslate')
		),
		'website_url' => array(
			'type' => 'text',
			'label' => __('Website URL', 'swmtranslate'),
			'desc' => __('This is optional field', 'swmtranslate'),
			'std' => __('http://www.loremips.com', 'swmtranslate')
		),			
		'content' => array(
			'std' => __('client testimonials text here lorem ipsum dolor sit amet consectetur adipiscing elit roin vestibulum auctor enim in commodo', 'swmtranslate'),
			'type' => 'textarea',
			'label' => __('Testimonial', 'swmtranslate'),
			'desc' => '',
		)		
	),
	'shortcode' => '[testimonials_quote_style client_name="{{client_name}}" client_details="{{client_details}}" website_title="{{website_title}}" website_url="{{website_url}}" ] {{content}} [/testimonials_quote_style]',
	'no_preview' => true,
	'popup_title' => __('Insert Testimonials with Quote Style Shortcode', 'swmtranslate')
);

$swm_shortcodes['testimonials3'] = array(
	'params' => array(		
		'client_name' => array(
			'type' => 'text',
			'label' => __('Client Name', 'swmtranslate'),
			'desc' => '',
			'std' => __('John Doe', 'swmtranslate')
		),
		'client_details' => array(
			'type' => 'text',
			'label' => __('Client Details', 'swmtranslate'),
			'desc' => '',
			'std' => __('Art Director, NY.', 'swmtranslate')
		),				
		'content' => array(
			'std' => __('[p]client testimonials text here lorem ipsum dolor sit amet consectetur adipiscing elit roin vestibulum auctor enim in commodo[/p]', 'swmtranslate'),
			'type' => 'textarea',
			'label' => __('Testimonial', 'swmtranslate'),
			'desc' => '',
		)		
	),
	'shortcode' => '[testimonials_box_style client_name="{{client_name}}" client_details="{{client_details}}" ] {{content}} [/testimonials_box_style]',
	'no_preview' => true,
	'popup_title' => __('Insert Testimonials with Box Style Shortcode', 'swmtranslate')
);


/* ************************************************************************************** 
   ANIMATED MENU
************************************************************************************** */

$swm_shortcodes['animatedmenu'] = array(
	'params' => array(
		'hover_color' => array(
			'type' => 'text',
			'label' => __('Mouseover Color', 'swmtranslate'),
			'desc' => __('Enter color code for mouse over all menu items', 'swmtranslate'),
			'std' => '#798c09'
		),
		'icon_color' => array(
			'type' => 'text',
			'label' => __('Icon Color', 'swmtranslate'),
			'desc' => __('Enter color code for icon on white background', 'swmtranslate'),
			'std' => '#798c09'
		)
		
	),		
	'shortcode' => ' [animated_menu hover_color="{{hover_color}}" icon_color="{{icon_color}}" ] {{child_shortcode}} [/animated_menu]', // as there is no wrapper shortcode
	'popup_title' => __('Insert Animated Menu', 'swmtranslate'),
	'no_preview' => true,
	
	// child shortcode is clonable & sortable
	'child_shortcode' => array(
		'params' => array(
			'link' => array(
			'type' => 'text',
			'label' => __('Menu Item Link', 'swmtranslate'),
			'desc' => '',
			'std' => '#'
		),	
		'icon' => array(
			'type' => 'text',
			'label' => __('Icon Name', 'swmtranslate'),
			'desc' => __('Enter icon name. <a href="http://fortawesome.github.com/Font-Awesome/" target="_blank">Click</a> to get icon names', 'swmtranslate'),
			'std' => 'icon-cog'
		),	
		'title' => array(
			'type' => 'text',
			'label' => __('Title Text', 'swmtranslate'),
			'desc' => '',
			'std' => __('Service Title Text', 'swmtranslate')
		),	
		'sub_title' => array(
			'type' => 'text',
			'label' => __('Sub-title Text', 'swmtranslate'),
			'desc' => '',
			'std' => __('sub title text', 'swmtranslate')
		),
		'hover_text_color' => array(
			'type' => 'text',
			'label' => __('Mouseover Text Color', 'swmtranslate'),
			'desc' => __('Enter color code for mouse over text this menu item', 'swmtranslate'),
			'std' => '#fff'
		)	
			
	),
	'shortcode' => '[animated_menu_item link="{{link}}" icon="{{icon}}" title="{{title}}" sub_title="{{sub_title}}" hover_text_color="{{hover_text_color}}"]',
	'clone_button' => __('Add New Menu Item', 'swmtranslate')
	)
);

/* ************************************************************************************** 
   ANIMATED MENU
************************************************************************************** */

$swm_shortcodes['servicebox'] = array(
	'params' => array(		
		'style' => array(
			'type' => 'select',
			'label' => __('Title Style', 'swmtranslate'),
			'desc' => '',
			'options' => array(
				'fcb_style1' => __('Title with Skin Color Background', 'swmtranslate'),				
				'fcb_style2' => __('Title with White Background', 'swmtranslate')				
			)
		),
		'title' => array(
			'type' => 'text',
			'label' => __('Title Text', 'swmtranslate'),
			'desc' => '',
			'std' => __('Service Title Text', 'swmtranslate')
		),	
		'image_src' => array(
                'std' => $sample_image.'lg1.jpg',
                'type' => 'text',
                'label' => __('Service Image URL', 'swmtranslate'),
                'desc' => '',
        ),
		'link' => array(
            'std' => '#',
            'type' => 'text',
            'label' => __('Read More Link', 'swmtranslate'),
            'desc' => '',
        ),
        'link_text' => array(
            'std' => 'Read more',
            'type' => 'text',
            'label' => __('Read More Link Text', 'swmtranslate'),
            'desc' => '',
        ),
        'column' => array(
			'type' => 'select',
			'label' => __('Display Column', 'swmtranslate'),
			'desc' => '',
			'std' => '',
			'options' => array(				
				'one_half' => __('2 Column', 'swmtranslate'),
				'one_third' => __('3 Column', 'swmtranslate'),
				'one_fourth' => __('4 Column', 'swmtranslate')															
			)
		),
		'content' => array(
			'std' => __('short description text of this service', 'swmtranslate'),
			'type' => 'textarea',
			'label' => __('Service Summery Text', 'swmtranslate'),
			'desc' => '',
		)		
	),
	'shortcode' => '[service_box style="{{style}}" title="{{title}}" image_src="{{image_src}}" link="{{link}}" link_text="{{link_text}}" column="{{column}}" ]{{content}}  [/service_box]',
	'no_preview' => true, 
	'popup_title' => __('Insert Service Box Shortcode', 'swmtranslate')
);

/* ************************************************************************************** 
   HOME PAGE WHITEBOX
************************************************************************************** */

$swm_shortcodes['whitebox'] = array(
	'params' => array(		
		'title' => array(
			'type' => 'text',
			'label' => __('Whitebox Title Text', 'swmtranslate'),
			'desc' => '',
			'std' => __('What We Do', 'swmtranslate')
		),							
		'content' => array(
			'std' => __('add whitebox content here', 'swmtranslate'),
			'type' => 'textarea',
			'label' => __('Whitebox Content', 'swmtranslate'),
			'desc' => '',
		),
		'position' => array(
			'type' => 'select',
			'label' => __('Whitebox Position', 'swmtranslate'),
			'desc' => '',
			'options' => array(
				'other' => __('First (Left) or Second (Middle) Position', 'swmtranslate'),				
				'last' => __('Third Position (Right)', 'swmtranslate')				
			)
		)		
	),
	'shortcode' => '[whitebox title="{{title}}" position="{{position}}" ]{{content}}[/whitebox]',
	'no_preview' => true, 
	'popup_title' => __('Insert Whitebox Shortcode', 'swmtranslate')
);



/* ************************************************************************************** 
   RECENT PROJECT SLIDER
************************************************************************************** */

$swm_shortcodes['testimonialsslider'] = array(
    'params' => array(
		'title' => array(
                'std' => 'Testimonials',
                'type' => 'text',
                'label' => __('Slider Title', 'swmtranslate'),
                'desc' => '',
        ),		
		'auto_slide' => array(
				'type' => 'select',
				'label' => __('Auto Rotation', 'swmtranslate'),
				'desc' => __('Select yes to auto rotate testimonials slides', 'swmtranslate'),
				'options' => array(
					'true' => __('Yes', 'swmtranslate'),
					'false' => __('No', 'swmtranslate')														
			)		         
		),
		'navigation' => array(
				'type' => 'select',
				'label' => __('Arrow Navigation', 'swmtranslate'),
				'desc' => __('Select yes to display arrow navigation', 'swmtranslate'),
				'options' => array(
					'true' => __('Yes', 'swmtranslate'),
					'false' => __('No', 'swmtranslate')														
			)		         
		),
		'slider_speed' => array(
                'std' => '7000',
                'type' => 'text',
                'label' => __('Slider Speed', 'swmtranslate'),
                'desc' => __('Intreval between two slides. 1000=1 second, 5000= 5 second', 'swmtranslate'),
        )
	),
    	
    'no_preview' => true,
    'shortcode' => '[testimonials_slider title="{{title}}" auto_slide="{{auto_slide}}" navigation="{{navigation}}" slider_speed="{{slider_speed}}"] {{child_shortcode}} [/testimonials_slider]',
    'popup_title' => __('Insert Testimonials Slider Shortcode', 'swmtranslate'),
    
    'child_shortcode' => array(
        'params' => array(            
			'client_name' => array(
                'std' => __('John Doe', 'swmtranslate'),
                'type' => 'text',
                'label' => __('Client Name', 'swmtranslate'),
                'desc' => '',
            ),
            'client_details' => array(
                'std' => __('Businessman', 'swmtranslate'),
                'type' => 'text',
                'label' => __('Client Details', 'swmtranslate'),
                'desc' => '',
            ),
            'content' => array(
                'std' => __('add client testimonial text here', 'swmtranslate'),
                'type' => 'textarea',
                'label' => __('Client Testimonial', 'swmtranslate'),
                'desc' => '',
            )  

        ),
        'shortcode' => '[testimonials_slide client_name="{{client_name}}" client_details="{{client_details}}"] {{content}} [/testimonials_slide]',
		'no_preview' => true, 
        'clone_button' => __('Add Another Slide', 'swmtranslate')
    )
);