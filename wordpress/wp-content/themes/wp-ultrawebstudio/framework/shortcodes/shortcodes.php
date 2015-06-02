<?php

/* ************************************************************************************** 
	DISPLAY SHORTCODES IN SIDEBAR, TEXT FIELDS, COMMENTS ETC.
************************************************************************************** */

add_filter( 'comment_text', 'shortcode_unautop');
add_filter( 'comment_text', 'do_shortcode' );

add_filter( 'the_excerpt', 'shortcode_unautop');
add_filter( 'the_excerpt', 'do_shortcode' );

add_filter( 'widget_text', 'shortcode_unautop');
add_filter( 'widget_text', 'do_shortcode');

add_filter( 'term_description', 'shortcode_unautop');
add_filter( 'term_description', 'do_shortcode' );

/* ************************************************************************************** 
     DISABLE WORDPRESS AUTOMATIC FORMATTING ON POSTS
************************************************************************************** */

function swm_sc_autop_fix($content) {   
    $array = array (
        '<p>[' 		=> '[',      
        ']</p>' 	=> ']',       
        ']<br />' 	=> ']'
    );

    $content = strtr($content, $array);

    return $content;
}

add_filter('the_content', 'swm_sc_autop_fix');

/* ************************************************************************************** 
     COLUMNS
************************************************************************************** */

function swm_column($atts, $content = null, $column) {
	return '<div class="'.$column.'">' . do_shortcode($content) . '</div>';
}
function swm_column_last($atts, $content = null, $column) {
	return '<div class="'.str_replace('_last','',$column).' last">' . do_shortcode($content) . '</div><div class="clear"></div>';
}

add_shortcode('one_full', 'swm_column');
add_shortcode('one_half', 'swm_column');
add_shortcode('one_third', 'swm_column');
add_shortcode('one_fourth', 'swm_column');
add_shortcode('one_fifth', 'swm_column');
add_shortcode('one_sixth', 'swm_column');
add_shortcode('two_third', 'swm_column');
add_shortcode('three_fourth', 'swm_column');
add_shortcode('four_fifth', 'swm_column');
add_shortcode('five_sixth', 'swm_column');
add_shortcode('one_full', 'swm_column');
add_shortcode('one_half_last', 'swm_column_last');
add_shortcode('one_third_last', 'swm_column_last');
add_shortcode('one_fourth_last', 'swm_column_last');
add_shortcode('one_fifth_last', 'swm_column_last');
add_shortcode('one_sixth_last', 'swm_column_last');
add_shortcode('two_third_last', 'swm_column_last');
add_shortcode('three_fourth_last', 'swm_column_last');
add_shortcode('four_fifth_last', 'swm_column_last');
add_shortcode('five_sixth_last', 'swm_column_last');

/* ************************************************************************************** 
     HEADINGS
************************************************************************************** */

function swm_headings($atts, $content = null, $heading) {
	return '<'.$heading.' class="title_line"><span>' . do_shortcode($content) . '</span></'.$heading.'>';
}

add_shortcode('h1', 'swm_headings');
add_shortcode('h2', 'swm_headings');
add_shortcode('h3', 'swm_headings');
add_shortcode('h4', 'swm_headings');
add_shortcode('h5', 'swm_headings');
add_shortcode('h6', 'swm_headings');

/* ************************************************************************************** 
     OTHER HTML ELEMENTS
************************************************************************************** */

function swm_html_elements($atts, $content = null, $heading) {
	return '<'.$heading.'>' . do_shortcode($content) . '</'.$heading.'>';
}

add_shortcode('p', 'swm_html_elements');
add_shortcode('div', 'swm_html_elements');
add_shortcode('span', 'swm_html_elements');
add_shortcode('sub', 'swm_html_elements');
add_shortcode('sup', 'swm_html_elements');
add_shortcode('small', 'swm_html_elements');

/* ************************************************************************************** 
     PRE-DEFINDED TEXT
************************************************************************************** */

function swm_pretext($atts, $content = null, $heading) {

	return '<'.$heading.'>' . do_shortcode(str_replace('<br />', '', $content)) . '</'.$heading.'>';
}
add_shortcode('pre', 'swm_pretext');
add_shortcode('code', 'swm_pretext');

/* ************************************************************************************** 
    HIGHLIGHTINGS
************************************************************************************** */

function swm_highlight($atts, $content = null, $highlight) {	
	return '<span class="'.$highlight.'">'. do_shortcode($content) .'</span>';
}

add_shortcode('highlight_yellow', 'swm_highlight');
add_shortcode('highlight_black', 'swm_highlight');
add_shortcode('highlight_green', 'swm_highlight');
add_shortcode('highlight_grey', 'swm_highlight');
add_shortcode('highlight_blue', 'swm_highlight');
add_shortcode('highlight_red', 'swm_highlight');

/* ************************************************************************************** 
    DROPCAPS
************************************************************************************** */

function swm_dropcap($atts, $content = null) {	

	extract( shortcode_atts( array (			
			'shape' => '',
			'size' => '',			
			'color' => ''	
		), $atts ) );

	return '<span class="dropcap '.$size.' '.$color.' '.$shape.'">' . do_shortcode($content) . '</span>';
}

add_shortcode('dropcap', 'swm_dropcap');


/* ************************************************************************************** 
	FANCY BOXES
************************************************************************************** */

function swm_fancy_box( $atts, $content = null ) {
	extract( shortcode_atts( array (
		'title' => '',
		'color' => 'purple'	
	), $atts ) );
  
	$hide_box_img =  '<img src="'.get_template_directory_uri().'/images/icons/info-close.png" alt="" />';
		
	$output = '';	
	$output .=  '<div class="myfancy-box round5">';
	$output .=  '<p class="hide-boxes2">'.$hide_box_img.'</p>';		
	$output .=  '<h3 class="'.$color.'-box">'.$title.'</h3>';	
	$output .=  do_shortcode($content);
	$output .=  '</div>';	
  
	return $output;   
}

add_shortcode( 'fancybox', 'swm_fancy_box' );

/* ************************************************************************************** 
    INFO BOXES
************************************************************************************** */

function swm_infobox($atts, $content = null, $infobox) {	
	return '<p class="'.$infobox.'-box round5"> <span class="hide-boxes">x</span>' . do_shortcode($content) . '</p>';
}

add_shortcode('info', 'swm_infobox');
add_shortcode('error', 'swm_infobox');
add_shortcode('success', 'swm_infobox');
add_shortcode('note', 'swm_infobox');
add_shortcode('download', 'swm_infobox');
add_shortcode('warning', 'swm_infobox');

/* ************************************************************************************** 
    LIST STYLES
************************************************************************************** */

function swm_list($atts, $content = null, $list) {		
	return '<div class="'.$list.'">' . do_shortcode($content) . '</div>';
}

/* Un-ordered List */
add_shortcode('list_lower_roman', 'swm_list');
add_shortcode('list_upper_roman', 'swm_list');
add_shortcode('list_lower_alpha', 'swm_list');
add_shortcode('list_upper_alpha', 'swm_list');
add_shortcode('steps_with_box', 'swm_list');
add_shortcode('steps_with_circle', 'swm_list');

/* ************************************************************************************** 
    PULL QUOTES
************************************************************************************** */

function swm_pull_quote($atts, $content = null, $quote) {	
	return '<span class="'.$quote.'">' . do_shortcode($content) . '</span>';
}

add_shortcode('pullquote_left', 'swm_pull_quote');
add_shortcode('pullquote_right', 'swm_pull_quote');

/* ************************************************************************************** 
    BLOCK QUOTE
************************************************************************************** */

function swm_blockquote( $atts, $content = null ) {
	extract( shortcode_atts( array (
		'sub_text' => '',
		'blockquote_border' => 'border_top_bottom'		
	), $atts ) );

	$divider = '<div class="divider"></div>'; 
	$output = '';

	$output .= '<blockquote>';	

	if ($blockquote_border == 'border_top_bottom') { $output .= $divider; }
	if ($blockquote_border == 'border_top') { $output .= $divider; }

	$output .= '<p>';	
	$output .= do_shortcode($content);
	$output .= '</p><div>';
	$output .= $sub_text;	
	$output .= '</div>';

	if ($blockquote_border == 'border_top_bottom') { $output .= $divider; }
	if ($blockquote_border == 'border_bottom') { $output .= $divider; }

	$output .= '</blockquote>';
	

	return $output;

} add_shortcode('blockquote', 'swm_blockquote');

/* ************************************************************************************** 
    TOOGLE CONTENT
************************************************************************************** */

function swm_toggle_content( $atts, $content = null ) {
	extract( shortcode_atts( array (
		'title' => '',
		'style' => 'toggle_box',
		'status' => 'closed'	
	), $atts ) );
	
	$output = '';
	$output .= '<div data-id="'.$status.'" class="'.$style.'">';
	$output .= '<span class="'.$style.'_title">'.$title.'</span>';
	$output .= '<div class="'.$style.'_inner">';
	$output .= do_shortcode($content);
	$output .= '</div>';
	$output .= '</div>';

	return $output;
} add_shortcode('toggle', 'swm_toggle_content');


/* ************************************************************************************** 
    TABS
************************************************************************************** */

function swm_tab_init( $atts, $content = null ) {
	
	$title = explode(",",$atts['title']);
	$style = $atts['style'];
	$total_tabs = count($title);	
	$output = "";
	$output .= '<div class="my_tabs my_tab_'.$style.'">	';
	$output .= '<ul class="tab-nav tab-clearfix">';
	
	foreach($title as $key=>$value){
		$output .= '<li><a href="#tab'.($key+1).'">'.$value.'</a></li>';
	}
	
	$output .= '</ul>';
	$output .= do_shortcode($content);
	$output .= '</div>';
	
	return $output;
	
} add_shortcode('tabs', 'swm_tab_init');

function swm_tab_container( $atts, $content = null ) {
	
	$output = '';
	$output .= do_shortcode($content);	
	
	return $output;
	
} add_shortcode('tab_container', 'swm_tab_container');

function swm_tab_content( $atts, $content = null ) {
	
	$tab = $atts['tabno'];
	$output = '';	
	$output .= '<div id="tab'.$tab.'" class="my_tab">';
	$output .= do_shortcode($content);
	$output .= '</div>';
	
	return $output;
	
} add_shortcode('tab', 'swm_tab_content');

/* ************************************************************************************** 
   BUTTONS
************************************************************************************** */

function swm_buttons($atts, $content = null) {		
	extract( shortcode_atts( array (
		'color' => 'purple',
		'shape' => 'square',		
		'link' => '#',
		'target' => '_self',
		'size' => 'small'		
	), $atts ) );	
	
	$output= '';
	$output .= '<a href="'.$link.'" class="button '.$color.' '.$shape.' '.$size.'" target="'.$target.'">'. do_shortcode($content) . '</a>';
	return $output;
}

add_shortcode('button', 'swm_buttons');

/* ************************************************************************************** 
   BUTTON BORDERS
************************************************************************************** */

function swm_border_button($atts, $content = null) {		
	extract( shortcode_atts( array (
		'color' => 'purple',
		'shape' => 'square',		
		'link' => '#',
		'size' => 'small'		
	), $atts ) );		
	
	$output= '';
	$output .= '<div class="border_button">';
	$output .= do_shortcode($content);
	$output .= '</div>';

	return $output;
}

add_shortcode('border_button', 'swm_border_button');

/* ************************************************************************************** 
   PRICING TABLES
************************************************************************************** */

function swm_pricing_table( $atts, $content = null ) {
	extract( shortcode_atts( array (
		'position' => '',
		'column' => 'sixth',
		'title' => 'Table Title',		
		'price' => '$19',
		'skin' => 'orange',
		'price_sub_text' => '',
		'special_table' => 'false',
		'button_size' => 'small',
		'button_shape' => 'square',
		'button_link' => '#',
		'button_text' => ''
	), $atts ) );
  
	$output = '';  

	if ($special_table == 'true') {
		$output .=  '<div class="pt_special">';
	}
	
	$output .=  '<div class="pt_one_'.$column.' '.$position.'">';
	$output .=  '<div class="pricing_table round5">';
	$output .=  '<div class="pricing_table_top bg_'.$skin.' round5">';
	$output .=  '<div class="pricing_table_title">';
	$output .=  '<h3>'.$title.'</h3>';										
	$output .=  '<div class="pricing_table_price"><p class="table-price">'.$price.'<sub>'.$price_sub_text.'</sub></p></div>';	
	$output .=  '</div>';		
	$output .=  '</div>';
	$output .=  do_shortcode($content);	
	$output .=  '<div class="pricing-table2-bottom">';
	
	if ($button_text) {	
		$output .=  '<a href="'.$button_link.'" class="button '.$button_shape.' '.$button_size.' '.$skin.'">'.$button_text.'</a>';	
	}
	
	$output .=  '</div>';
	$output .=  '</div>';
	$output .=  '</div>';

	if ($special_table == 'true') {
		$output .=  '</div>';
	}
	
	return $output;   
}

add_shortcode( 'pricing_table', 'swm_pricing_table' );

/* ************************************************************************************** 
  HOME PAGE PROMOTION TEXT
************************************************************************************** */

function swm_promotion_text( $atts, $content = null ) {
	extract( shortcode_atts( array (
		'button_link' => '#',
		'button_text' => 'Order Today',
		'sub_text' => '',
		'target' => '_self'
	), $atts ) );
  
	$p_margin = '';
	$output = '';	

	if ($sub_text == '') { $p_margin = 'style="margin-top:8px;"'; }
	
	$output .= '<div class="clear"></div>';	
	$output .= '<div class="promotion_box">';
	$output .= '<div class="left">';
	$output .= '<p '.$p_margin.'>' . do_shortcode($content).'<sub>'.$sub_text.'</sub></p>';	
	$output .= '</div>';	
	$output .= '<div class="right">';
	$output .= '<a href="'.$button_link.'" class="button large square skin_color" target="'.$target.'">'.$button_text.'</a>';			
	$output .= '</div>';
	$output .= '<div class="clear"></div>';
	$output .= '</div>';	
	
	return $output;   
}

add_shortcode( 'promotion_text', 'swm_promotion_text' );

/* ************************************************************************************** 
  IMAGE FRAME WITH ALIGNMENT
************************************************************************************** */

function swm_image_frames($atts, $content=null) {	
	
	extract( shortcode_atts( array (
		'lightbox' => '',
		'align' => '',
		'link' => '',
		'border' => '',
		'src' => '',
		'alt' => '',
		'title' => '',
		'target' => '_self'
	), $atts ) );
	
	$output  = '';
	
	if(isset($lightbox)  && $lightbox != "false") { 
		$lightbox = 'data-rel="prettyPhoto"'; 
	}else {
		$lightbox = '';
	} 	
	
	if(isset($align) && $align == "center") 
	$output .= '<div class="center">';
	
	if(isset($link)  && $link != "") 
	$output .= '<a href="'.$link.'" title="'.$title.'" '.$lightbox.' target="'.$target.'" >';
	
	$output .= '<img alt="'.$alt.'" src="'.$src.'" class="image_'.$align.' '.$border.'" />';
	
	if(isset($link) && $link != "") 
	$output .= '</a>';
	
	if(isset($align) && $align == "center") 
	$output .= '</div>';	
	
	return $output;
}

add_shortcode( 'image', 'swm_image_frames' );

/* ************************************************************************************** 
  QUOTE TEXT
************************************************************************************** */
function swm_quote_text($atts, $content = null) {
	return '<div class="quote-text">' . do_shortcode($content) . '</div>';
}

add_shortcode('quote_text', 'swm_quote_text');

/* ************************************************************************************** 
  TEAM MEMBER
************************************************************************************** */

function swm_team_member( $atts, $content = null ) {
	extract( shortcode_atts( array (
		'image_src' => '',
		'alt' => '',
		'name' => 'John Doe',
		'position' => 'Director',
		'style' => 'style1',
		'column' => 'one_fourth',		
		'social_media' => 'true',
		'twitter' => '',
		'facebook' => '',
		'vimeo' => '',
		'youtube' => '',
		'rss' => '',
		'flickr' => '',
		'linkedin' => '',
		'blogger' => '',
		'delicious' => '',
		'digg' => '',
		'technorati' => '',
		'stumbleupon' => '',
		'skype' => ''		
	), $atts ) );

	$client_info = '<h6>'.$name.'<sub>'.$position.'</sub></h6>';	
		
	$output = '';

	$output .= '<div class="team_member_wrapper">';
	$output .= '<div class="'.$column.'">';	
	$output .= '<div class="'.$style.'">';
	$output .= '<div class="tm_img_div"><img src="'.$image_src.'" alt="'.$alt.'" class="image_border"></div>';		
	$output .= '<div class="tm_box_content">';

	if ($style == 'tm_style2'){
		$output .= 	$client_info;
	}

	if ($social_media == 'true') {

		$output .= '<div class="tm_box_content"><div class="tm_social_media">';
		$output .= '<ul>';

		if ($twitter) { $output .= '<li><a href="'.$twitter.'" class="sm_twitter tipUp" title="'.__('Twitter','swmtranslate').'"></a></li>'; }
		if ($facebook) { $output .= '<li><a href="'.$facebook.'" class="sm_facebook tipUp" title="'.__('Facebook','swmtranslate').'"></a></li>'; }
		if ($vimeo) { $output .= '<li><a href="'.$vimeo.'" class="sm_vimeo tipUp" title="'.__('Vimeo','swmtranslate').'"></a></li>'; }
		if ($youtube) { $output .= '<li><a href="'.$youtube.'" class="sm_youtube tipUp" title="'.__('You Tube','swmtranslate').'"></a></li>'; }
		if ($rss) { $output .= '<li><a href="'.$rss.'" class="sm_rss tipUp" title="'.__('RSS','swmtranslate').'"></a></li>'; }
		if ($flickr) { $output .= '<li><a href="'.$flickr.'" class="sm_flickr tipUp" title="'.__('Flickr','swmtranslate').'"></a></li>'; }
		if ($linkedin) { $output .= '<li><a href="'.$linkedin.'" class="sm_linkedin tipUp" title="'.__('Linkedin','swmtranslate').'"></a></li>'; }
		if ($blogger) { $output .= '<li><a href="'.$blogger.'" class="sm_blogger tipUp" title="'.__('Blogger','swmtranslate').'"></a></li>'; }
		if ($delicious) { $output .= '<li><a href="'.$delicious.'" class="sm_delicious tipUp" title="'.__('Delicious','swmtranslate').'"></a></li>'; }
		if ($digg) { $output .= '<li><a href="'.$digg.'" class="sm_digg tipUp" title="'.__('Digg','swmtranslate').'"></a></li>'; }
		if ($technorati) { $output .= '<li><a href="'.$technorati.'" class="sm_technorati tipUp" title="'.__('Technorati','swmtranslate').'"></a></li>'; }
		if ($stumbleupon) { $output .= '<li><a href="'.$stumbleupon.'" class="sm_stumbleupon tipUp" title="'.__('Stumbleupon','swmtranslate').'"></a></li>'; }
		if ($skype) { $output .= '<li><a href="'.$skype.'" class="sm_skype tipUp" title="'.__('Skype','swmtranslate').'"></a></li>'; }

		$output .= '</ul>';
		$output .= '<div class="clear"></div>';	
		$output .= '</div></div>';
	}

	if ($style == 'tm_style1'){
		$output .= 	$client_info;
		$output .=  do_shortcode($content);	
	}

	$output .= '</div>';
	$output .= '</div>';
	$output .= '</div>';
	$output .= '</div>';
  
	return $output;   
}

add_shortcode( 'team_member', 'swm_team_member' );

/* ************************************************************************************** 
    LINE BREAK / GO TOP
************************************************************************************** */

function swm_hr( $atts, $content = null ) {
	return '<hr />';
} add_shortcode('hr2', 'swm_hr');

function swm_divider2( $atts, $content = null ) {	
	return '<div class="divider"></div>';
} 	add_shortcode('hr', 'swm_divider2');
	add_shortcode('hr1', 'swm_divider2');

function swm_break( $atts, $content = null ) {
	return '<br />';
} add_shortcode('break', 'swm_break');

function swm_clear( $atts, $content = null ) {
	return '<div class="clear"></div>';
} add_shortcode('clear', 'swm_clear');

function swm_top( $atts, $content = null ) {	
	return '<div class="divider"></div><div class="gotop2"><a href="#top">T0P &uarr;</a></div><br />';
} add_shortcode('top', 'swm_top');

function swm_top2( $atts, $content = null ) {	
	return '<hr /><br /><div class="gotop"><a href="#top">T0P &uarr;</a></div>';
} add_shortcode('top2', 'swm_top2');


/* ************************************************************************************** 
   WORDPRESS GALLERY
************************************************************************************** */
   
remove_shortcode('gallery', 'gallery_shortcode');    
add_shortcode('gallery', 'swm_gallery_sc');

function swm_gallery_sc($attr) {
  $post = get_post();
	
  static $instance = 0;
  $instance++;

  if (!empty($attr['ids'])) {
    if (empty($attr['orderby'])) {
      $attr['orderby'] = 'post__in';
    }
    $attr['include'] = $attr['ids'];
  }

  $output = apply_filters('post_gallery', '', $attr);

  if ($output != '') {
    return $output;
  }

  if (isset($attr['orderby'])) {
    $attr['orderby'] = sanitize_sql_orderby($attr['orderby']);
    if (!$attr['orderby']) {
      unset($attr['orderby']);
    }
  }

  extract(shortcode_atts(array(
    'order' => 'ASC',
    'orderby' => 'menu_order ID',
    'id' => $post->ID,
    'itemtag' => '',
    'caption' => '',
    'caption_fontsize' => '14',
    'description_fontsize' => '12',
    'description_length' => '70',
    'gallery_style' => 'image_with_small_caption',   
    'images_per_page' => '12',
    'image_height' => '',
    'columns' => '3',     
    'include' => '',
    'exclude' => ''
  ), $attr));

  $id = intval($id);

	if ($order === 'RAND') {
		$orderby = 'none';
	}
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	if (!empty($include)) {
		$_attachments = get_posts(array('post_status'=>'inherit', 'include' => $include, 'post_status' => 'inherit','numberposts' => 5, 'posts_per_page' => 5, 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby,'paged' => $paged));

	$attachments = array();
	foreach ($_attachments as $key => $val) {
	  	$attachments[$val->ID] = $_attachments[$key];
	}
	} elseif (!empty($exclude)) {
		$attachments = get_children(array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby));
	} else {
		$attachments = get_children(array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby));
	}

	if (empty($attachments)) {
	return '';
	}

	if (is_feed()) {
		$output = "\n";
	foreach ($attachments as $att_id => $attachment) {
	  	$output .= wp_get_attachment_link($att_id, $size, true) . "\n";
	}
		return $output;
	}  	

  	// Work out how many pages we need and what page we are currently on
	$imageCount = count($attachments);
	$pageCount = ceil($imageCount / $images_per_page);
	
	if (isset($_GET ['galleryPage'])) {
	$currentPage = intval($_GET ['galleryPage']);
	}
	if ( empty($currentPage) || $currentPage<=0 ) $currentPage=1;
	
	$maxImage = $currentPage * $images_per_page;
	$minImage = ($currentPage-1) * $images_per_page;	
	$prevPage = $currentPage-1;
	$nextPage = $currentPage+1;
	$prevText = __('Prev', 'swmtranslate');
	$nextText = __('Next ', 'swmtranslate');
	$pagination = '';

	global $paged;
	if(empty($paged)) $paged = 1;

	
	if ($pageCount > 1)	{
		$page_link= get_permalink();
		$page_link_perma= true;
		if ( strpos($page_link, '?')!==false )
			$page_link_perma= false;		

		$pagination = "<div class='clear'></div><div class='horizontal_menu pagination_menu left'><ul>";
		
		if($prevPage != 0 ) {
			$pagination .= '<li><a class="page-previous" href="'.$page_link. ( ($page_link_perma?'?':'&amp;') ). 'galleryPage='.$prevPage.'"><i class="icon-angle-left"></i>'.$prevText.'</a></li>';
		}

		for ( $j=1; $j<= $pageCount; $j++) {
			if ( $j==$currentPage )				
				$pagination .= "<li><a href='#' class='current' >".$j."</a></li>";
			else				
				$pagination .= '<li><a href="'.$page_link. ( ($page_link_perma?'?':'&amp;') ). 'galleryPage='.$j.'" class="inactive">'.$j.'</a></li>';
		}

		if($nextPage <= $pageCount) {
			$pagination .= '<li><a class="page-next" href="'.$page_link. ( ($page_link_perma?'?':'&amp;') ). 'galleryPage='.$nextPage.'">'.$nextText.'  <i class="icon-angle-right"></i></a></li>';
		}

		$pagination .= "</ul></div>\n";

	} // end if pageCount 

  	$column_name = '';
		
	if ($columns == '4') { 
		$column_name = '4col'; 
	} elseif ($columns == '3') {
		$column_name = '3col'; 
	} elseif ($columns == '2') {
		$column_name = '2col'; 
	}

	$pf_add_class ='';

	if ($gallery_style == 'image_with_hover_caption') {
		$pf_add_class = 'pfHover';
	}
	
	$output .= "<div class='wp-gallery portfolio pf_$column_name pf_sort $pf_add_class clear'>";
	
	$i = 0;
	$k = 0;
  	foreach ($attachments as $id => $attachment) {

  		if ($k >= $minImage && $k < $maxImage) {

	    	$link = isset($attr['link']) && 'file' == $attr['link'] ? wp_get_attachment_link($id, $columns, false, false) : wp_get_attachment_link($id, $columns, true, false);
			
			$itemtagclass = "gallery".$attachment->post_parent;
			$image = wp_get_attachment_image_src($id, "Full", $icon = false);			
			$image_caption = wptexturize($attachment->post_excerpt);
			$image_title = $attachment->post_title;		
			$image_desc = $attachment->post_content;		
			$image_alt = get_post_meta($attachment->ID, '_wp_attachment_image_alt', true);
			$pf_details = $gallery_style == 'image_with_small_caption' ? 'pf_details1' : 'pf_details2';			

			// image description length

			if ( mb_strlen( $image_desc ) > $description_length ) {
				$subex = mb_substr( $image_desc, 0, $description_length - 5 );
				$exwords = explode( ' ', $subex );
				$excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
				if ( $excut < 0 ) {
					$new_desc = mb_substr( $subex, 0, $excut );
				} else {
					$new_desc = $subex;
				}				
			} else {
				$new_desc =  $image_desc;
			}
			
			// resize image as per gallery style

			if ($gallery_style == 'image_with_hover_caption') {

				if ( $columns == '2' ) { $final_image = swm_resize($image[0], 430, $image_height, true,'c', false); }	
				if ( $columns == '3' ) { $final_image = swm_resize($image[0], 290, $image_height, true,'c', false); }
				if ( $columns == '4' ) { $final_image = swm_resize($image[0], 214, $image_height, true,'c', false); }

			} else {

				if ( $columns == '2' ) { $final_image = swm_resize($image[0], 427, $image_height, true,'c', false); }	
				if ( $columns == '3' ) { $final_image = swm_resize($image[0], 274, $image_height, true,'c', false); }
				if ( $columns == '4' ) { $final_image = swm_resize($image[0], 197, $image_height, true,'c', false); }
			}			
		
			if ($gallery_style == 'image_with_small_caption' || $gallery_style == 'image_with_large_caption') {

				$output .= '<div class="pf_box pf_isotope">';
				$output .= '<div class="pf_img">';
				$output .= '<div class="fade-img2" data-lang="zoom-icon" >';		
				$output .= "<a href='{$image[0]}' data-rel='prettyPhoto[mygallery1]' title='$image_alt' ><img  src='$final_image' alt='$image_caption' /></a>";
				$output .= '</div>';
				$output .= '</div>';

				if ($image_caption != '' && $caption == 'true') {
					$output .= "<div class='$pf_details'>";
					$output .= '<h3 style="font-size:'.$caption_fontsize.'px;">'.$image_caption.'</h3>';		
					
					if ($new_desc != '') { 
						$output .= '<p style="font-size:'.$description_fontsize.'px;">'.$new_desc.'</p>'; 
					}

					$output .= '</div>';
				}
				$output .= '</div>'; // .pf_box

			} else {
				
				$output .= '<div class="pf_box2 pf_isotope">';
				$output .= '<div class="pf_img">';
				$output .= '<div class="pf_overlay" >';
				$output .= "<img  src='{$image[0]}' alt='' />";
				$output .= '<div class="clear"></div>';
				$output .= '<div class="pf_details3">';
				$output .= '<div class="pf_details3_text">';

				if ($image_caption != '' && $caption == 'true') {
					
					$output .= '<h3 style="font-size:'.$caption_fontsize.'px;">'.$image_caption.'</h3>';

					if ($new_desc != '') { 
						$output .= '<p style="font-size:'.$description_fontsize.'px;">'.$new_desc.'</p>'; 
					}					
				}	

				$output .= "<a href='{$image[0]}' data-rel='prettyPhoto[mygallery1]' title='$image_alt' class='pf_text_zoom_icon' ></a>";
				$output .= '</div>';
				$output .= '</div>';
				$output .= '</div>';
				$output .= '</div>';
				$output .= '</div>'; // .pf_box2	
				

			}	// end else

 		 } // end if

 		 $k++;  

  	} // end for each	

 	$output .= '</div>'; // .portfolio 	

 	$output .= $pagination;

	return $output;		
  
} // end function
	



/* ************************************************************************************** 
  RECENT POSTS
************************************************************************************** */

function swm_recent_posts( $atts ) {
	extract( shortcode_atts( array( 
		'post_limit' => 2, 
		'style' => 'image_style', 
		'link_text' => '', 
		'desc_limit' => '55' ), $atts ) );

	$q = new WP_Query( 'posts_per_page=' . $post_limit );

	$output = '';

	if ($style == 'circle_style') {

		$output .= '<div class="rc_posts">';
		$output .= '<ul>';	

		while ( $q->have_posts() ) { 
			$q->the_post();
			
			$output .= '<li>';
			$output .= '<div class="rcp_date">' . get_the_date('d') . '<sub>' . get_the_date('M') . '</sub></div>';
			$output .= '<div class="rp_content">';
			$output .= '<h4><a href="' . get_permalink() . '">' . get_the_title() . '</a></h4>';
			$output .= '<p>';			

			$truncate = get_the_content();
			$truncate = preg_replace('@<script[^>]*?>.*?</script>@si', '', $truncate);
			$truncate = preg_replace('@<style[^>]*?>.*?</style>@si', '', $truncate);
			$truncate = strip_tags($truncate);
			$truncate = substr($truncate, 0, strrpos(substr($truncate, 0, $desc_limit), ' ')); 
			
			$output .= $truncate;
			
			$output .='</p>';		
			
			if ($link_text != '') {
				$output .= '<a href="' . get_permalink() . '" class="read-more">' . $link_text . ' <i class="icon-double-angle-right"></i></a>';		
			}

			$output .= '</div>';
			
			$output .= '</li>';		
		}
		
		wp_reset_query();	
		
		$output .= '</ul>';
		$output .= '</div>';

	} else {

		$output .= '<div class="recent_posts_list1">';
		$output .= '<ul>';		

		while ( $q->have_posts() ) { 
			$q->the_post();

			$num_comments = get_comments_number();

			if ( comments_open() ) {
				if ( $num_comments == 0 ) {
					$comments = __('No Comments','swmtranslate');
				} elseif ( $num_comments > 1 ) {
					$comments = $num_comments . __(' Comments','swmtranslate');
				} else {
					$comments = __('1 Comment','swmtranslate');
				}
				$write_comments = '<a href="' . get_comments_link() .'">'. $comments.'</a>';
			}

			$format = get_post_format();	

			if ($format == '') {
				$format = 'standard';
			}

			$output .= '<li>';
			$output .= '<div class="recent_posts_list1_date">' . get_the_date('d') . '<span>' . get_the_date('M') . '</span></div>';
			$output .= '<div class="pf_icons"><a href="' . get_permalink() . '" class="pf_'.$format.'"></a></div>';
			$output .= '<h5><a href="' . get_permalink() . '">' . get_the_title() . '</a></h5>';
			$output .= '<p>'.$write_comments.'</p>';
			$output .= '</li>';
		}
		
		wp_reset_query();	

		$output .= '</ul>';
		$output .= '</div>';

	} 

	return $output;
}

add_shortcode( 'recent_posts', 'swm_recent_posts' );

/* ************************************************************************************** 
   SOCIAL MEDIA
************************************************************************************** */

function swm_social_media( $atts, $content = null ) {	
  extract( shortcode_atts( array (		
		'size' => ''		
	), $atts ) );
	
	
	$output = '';   
	$output .=  '<div class="sm_icons">';		
	$output .=  '<ul>';
	$output .=  do_shortcode($content);	
	$output .=  '</ul>';
	$output .=  '</div>'; 
  
	return $output;   
}

add_shortcode( 'social_media', 'swm_social_media' );


function swm_social_media_sc( $atts, $content = null, $media ) {
	
	extract( shortcode_atts( array (		
		'link' => '',
		'title' => ''
	), $atts ) );
	
	if ($link != '') {
  
		$output = ''; 	
		$output .=  '<li>';
		$output .=  '<a href="'.$link.'" class="sm-'.$media.' tipUp" title="'.$media.'"></a>';	
		$output .=  '</li>';
	  
		return $output; 

	}	
}

add_shortcode( 'twitter', 'swm_social_media_sc' );
add_shortcode( 'facebook', 'swm_social_media_sc' );
add_shortcode( 'youtube', 'swm_social_media_sc' );
add_shortcode( 'flickr', 'swm_social_media_sc' );
add_shortcode( 'linkedin', 'swm_social_media_sc' );
add_shortcode( 'delicious', 'swm_social_media_sc' );
add_shortcode( 'vimeo', 'swm_social_media_sc' );
add_shortcode( 'rss', 'swm_social_media_sc' );
add_shortcode( 'apple', 'swm_social_media_sc' );
add_shortcode( 'blogger', 'swm_social_media_sc' );
add_shortcode( 'brightkite', 'swm_social_media_sc' );
add_shortcode( 'designfloat', 'swm_social_media_sc' );
add_shortcode( 'digg', 'swm_social_media_sc' );
add_shortcode( 'dopplr', 'swm_social_media_sc' );
add_shortcode( 'friendfeed', 'swm_social_media_sc' );
add_shortcode( 'gamespot', 'swm_social_media_sc' );
add_shortcode( 'google', 'swm_social_media_sc' );
add_shortcode( 'lastfm', 'swm_social_media_sc' );
add_shortcode( 'mixx', 'swm_social_media_sc' );
add_shortcode( 'mobileme', 'swm_social_media_sc' );
add_shortcode( 'myspace', 'swm_social_media_sc' );
add_shortcode( 'netvibes', 'swm_social_media_sc' );
add_shortcode( 'newsvine', 'swm_social_media_sc' );
add_shortcode( 'openid', 'swm_social_media_sc' );
add_shortcode( 'picasa', 'swm_social_media_sc' );
add_shortcode( 'posterous', 'swm_social_media_sc' );
add_shortcode( 'reddit', 'swm_social_media_sc' );
add_shortcode( 'skype', 'swm_social_media_sc' );
add_shortcode( 'stumbleupon', 'swm_social_media_sc' );
add_shortcode( 'technorati', 'swm_social_media_sc' );
add_shortcode( 'tumblr', 'swm_social_media_sc' );
add_shortcode( 'viddler', 'swm_social_media_sc' );
add_shortcode( 'virb', 'swm_social_media_sc' );
add_shortcode( 'wordpress', 'swm_social_media_sc' );
add_shortcode( 'yahoo', 'swm_social_media_sc' );
add_shortcode( 'yahoobuzz', 'swm_social_media_sc' );
add_shortcode( 'yelp', 'swm_social_media_sc' );

/* ************************************************************************************** 
   RECENT PROJECTS SLIDER
************************************************************************************** */

function swm_rp_slider( $atts, $content = null ) {
	extract( shortcode_atts( array (		
		'title' => '',
		'auto_slide' => '',
		'page_type' => 'inner',
		'button_text' => '',
		'button_link' => '',
		'slider_speed' => '7000'

	), $atts ) );
	
	$output = '';	

	if ($page_type == 'home') {
		$output .=  '<h4><span class="title_color">'.$title.'</span></h4>';	
		$output .=  '<div class="rp_slider_wrapper_home">';
		$output .=  '<div class="rp_slider_wrapper">';
		$page_slider = 'rp_slider_home';
	}else {
		$page_slider = 'rp_slider';
	}

	$output .=  '<div class="flexslider '.$page_slider.' swm_list_slider" data-autoSlide="'.$auto_slide.'" data-autoSlideInterval="'.$slider_speed.'">';	
	
	if ($page_type == 'inner') {
		$output .=  '<h4>'.$title.'</h4>';	
	}	
	
	$output .=  '<ul class="slides rp_slides">';		
	$output .=  do_shortcode($content);
	$output .=  '</ul>';
	$output .=  '</div>';

	if ($page_type == 'home') {
		$output .=  '</div>';
		$output .=  '</div>';
	}

	if ($button_text) {
	
		$output .=  '<br />';
		$output .=  '<div class="right">';
		$output .=  '<a href="'.$button_link.'" class="button skin_color round tiny rp_home_button">'.$button_text.' <i class="icon-circle-arrow-right"></i></a>';
		$output .=  '</div>';

	}
  
	return $output;   
}

add_shortcode( 'rp_slider', 'swm_rp_slider' );

function swm_rp_slide( $atts, $content = null ) {
	extract( shortcode_atts( array (		
		'link' => '',
		'title' => '',
		'project_title' => '',
		'project_details' => '',
		'project_title_link' => '#',
		'lightbox' => '',		
		'src' => '',
		'alt' => ''
	), $atts ) );

	$lightbox_on = '';
	$output = '';
	$hover_icon = '';

	if ($lightbox == 'true')	{ 
		$lightbox_on = 'data-rel="prettyPhoto[rp_gallery]"';
		$hover_icon = 'zoom';

	 }else {
	 	$hover_icon = 'doc';
	 }	
		
	$output .=  '<li>';
	$output .=  '<div class="rp_box">';
	
	if ($link != '') { $output .= '<div class="fade-img2" data-lang="'.$hover_icon.'-icon" ><a href="'.$link.'" '.$lightbox_on.'  title="'.$title.'">'; }		
	$output .= '<img width="145" height="145" src="'.swm_resize($src, 145,145, true,'c', false).'" alt="'.$alt.'" />';	
	if ($link != '') { $output .= '</a></div>'; }	

	$output .=  '</div>';
	$output .=  '</li>';	
	
	return $output;
	
}

add_shortcode( 'rp_slide', 'swm_rp_slide' );

/* ************************************************************************************** 
   LOGO SLIDER
************************************************************************************** */

function swm_logo_slider( $atts, $content = null ) {
	extract( shortcode_atts( array (		
		'title' => '',
		'auto_slide' => '',
		'slider_speed' => '7000'

	), $atts ) );	
	
	$output = '';

	$output .=  '<div class="flexslider logo_slider swm_list_slider" data-autoSlide="'.$auto_slide.'" data-autoSlideInterval="'.$slider_speed.'">';
	$output .=  '<div class="list_slider_title"><span>'.$title.'</span></div>';	
	$output .=  '<div class="logo_slider_wrapper">';
	$output .=  '<ul class="slides logo_slides" >';		
	$output .=  do_shortcode($content);
	$output .=  '</ul>';
	$output .=  '</div>';
	$output .=  '</div>';
	
	return $output;   
}

add_shortcode( 'logo_slider', 'swm_logo_slider' );

function swm_logo_slide( $atts, $content = null ) {
	extract( shortcode_atts( array (		
		'link' => '#',		
		'lightbox' => '',
		'title' => '',
		'src' => '',
		'alt' => ''
	), $atts ) );

	$lightbox_on = '';
	$output = '';
	$hover_icon = '';

	if ($lightbox == 'true')	{ 
		$lightbox_on = 'data-rel="prettyPhoto[rp_gallery]"';
	 }
		
	$output .=  '<li>';	

	if ($link != '') { $output .= ''; }		
	$output .= '<a href="'.$link.'" '.$lightbox_on.' title="'.$title.'"><img src="'.$src.'" alt="'.$alt.'" /></a>';
	$output .=  '</li>';	
	
	return $output;
	
}

add_shortcode( 'logo_slide', 'swm_logo_slide' );


/* ************************************************************************************** 
    MAP
************************************************************************************** */

function swm_google_map($atts, $content = null) {
   extract(shortcode_atts(array(     
      "height" => '',
      "src" => ''
   ), $atts));
   return '<p class="my_map2 image_border" style="display:block;font-size: 0; line-height: 0;"><iframe style="width:100%" width="" height="'.$height.'" src="'.$src.'&amp;iwloc=near&amp;output=embed"></iframe></p><div class="clear"></div>';
}
add_shortcode("google_map", "swm_google_map");

/* ************************************************************************************** 
   HORIZONTAL TAB
************************************************************************************** */

function swm_horizontal_tab( $atts, $content = null ) {			
	
	$output = '';		
	$output .=  '<div class="horizontal_menu right" style="margin-top:-34px;">';
	$output .=  '<ul>';		
	$output .=  do_shortcode($content);
	$output .=  '</ul>';	
	$output .=  '</div>';	
	$output .=  '<div class="clear"></div>';
  
	return $output;   
}

add_shortcode( 'horizontal_tab', 'swm_horizontal_tab' );

function swm_menu_tab( $atts, $content = null ) {
	extract( shortcode_atts( array (		
		'link' => '',
		'text' => 'tab',
		'active'=>''
	), $atts ) );

	$output = '';

	$active_class = '';

	if ($active == 'true' || $active == 'yes') {
		
		$active_class = ' class="active"';
	}		
	
	
	$output .= '<li><a href="'.$link.'" '.$active_class.'>'.$text.'</a></li>';
	
	return $output;
	
}

add_shortcode( 'menu_tab', 'swm_menu_tab' );


/* ************************************************************************************** 
	TOOLTIPS
************************************************************************************** */

function swm_tooltips( $atts, $content = null ) {
	extract( shortcode_atts( array (
		'position' => 'tipUp',		
		'tooltip_text' => 'tooltip text here'	
	), $atts ) );
		
	$output = '';	
	$output .=  ' <a class="'.$position.'" href="#" title="'.$tooltip_text.'">';		
	$output .=  do_shortcode($content);
	$output .=  '</a>';	
  
	return $output;   
}

add_shortcode( 'tooltip', 'swm_tooltips' );


/* ************************************************************************************** 
    FLICKR PHOTOS
************************************************************************************** */

function swm_flickr_photos($atts, $content = null) {
   extract(shortcode_atts(array(     
      "display_photos" => '',
      "flickr_id" => ''
   ), $atts));
   return '<div class="flickr_photos2 sidebar_gallery" data-display-photos2="'.$display_photos.'" data-flickr-id2="'.$flickr_id.'" ></div>';
}
add_shortcode("flickr_sc", "swm_flickr_photos");

/* ************************************************************************************** 
   SKILL BAR
************************************************************************************** */

function swm_skill_bar($atts, $content = null) {
   extract(shortcode_atts(array(     
      "skill_name" => 'HTML',
      "bar_color" => 'grey',
      "percentage" => '50%'
   ), $atts));  

   	$output = '';
		
	$output .= '<div class="p_bar p_bar_'.$bar_color.'">';							
	$output .= '<div class="p_bar_arrow"></div>';
	$output .= '<div class=" p_bar_bg" style="width:'.$percentage.'">';
	$output .= '<span class="p_title">'.$skill_name.'</span>';
	$output .= '<span class="p_num">'.$percentage.'</span>	';
	$output .= '</div>';					
	$output .= '</div>';
  
	return $output;  

}
add_shortcode("skill_bar", "swm_skill_bar");

/* ************************************************************************************** 
	SUPPORT TEAM
************************************************************************************** */

function swm_supportteam( $atts, $content = null ) {
	extract( shortcode_atts( array (
		'image_src' => '',
		'name' => '',		
		'position' => '',
		'email' => '',
		'phone' => ''	
	), $atts ) );

	$output = '';
		
	$output = '<div class="support_team">';
	$output .= '<div><img src="'.$image_src.'" alt="" class="image_border"/></div>';
	$output .= '<p><strong>'.$name.'</strong></p>';
	$output .= '<p>'.$position.'</p>';

	if ($email != '') { $output .= '<p><a href="mailto:'.$email.'"> '.$email.'</a></p>'; }

	if ($phone != '') { $output .= '<p>'.$phone.'</p>'; }

	$output .= '</div>';
  
	return $output;   
}

add_shortcode( 'support_team', 'swm_supportteam' );

/* ************************************************************************************** 
	SERVICES
************************************************************************************** */

function swm_serviceslist( $atts, $content = null ) {
	extract( shortcode_atts( array (
		'image_src' => '',
		'title' => '',		
		'sub_title' => '',
		'services_style' => ''
	), $atts ) );
		
	$output = '';

	switch ($services_style) {			

		case 'services-medium':
			$output .= '<div class="services_icon_medium">';
			$output .= '<div class="services_icon_img"><img src="'.$image_src.'" alt="" /></div>';
			$output .= '<div class="services_mid_content">';
			$output .= '<h4>'.$title.'<small>'.$sub_title.'</small></h4>';
			$output .=  do_shortcode($content);		
			$output .= '</div>';
			$output .= '</div>';
			break;

		case 'services-large':
			$output .= '<div class="services_icon_large">';
			$output .= '<div><span class="services_icon_img"><img src="'.$image_src.'" alt="" /></span></div>';
			$output .= '<h4>'.$title.'</h4>';
			$output .=  do_shortcode($content);		
			$output .= '</div>';
			break;

		case 'services-small':
			$output .= '<div class="services_icon_small">';
			$output .= '<div><span class="services_icon_img"><img src="'.$image_src.'" alt="" /></span></div>';
			$output .= '<div class="services_small_content">';
			$output .= '<h4>'.$title.'</h4>';
			$output .=  do_shortcode($content);		
			$output .= '</div>';
			$output .= '</div>';
			break;
	}
  
	return $output;   
}

add_shortcode( 'our_service', 'swm_serviceslist' );

/* **************************************************************************************
   IMAGE SLIDER
************************************************************************************** */

function swm_image_slider( $atts, $content = null ) {	
	extract( shortcode_atts( array (		
		'auto_play' => 'true',
		'slide_interval' => '5000',
		'animation_type' => 'fade',
		'bullet_navigation' => 'true',
		'arrow_navigation' => 'true'	
					
	), $atts ) );			
	
	$output = '';		
	$output .=  '<div class="swm_slider_box image_border">';
	$output .=  '<div class="swm_image_slider flexslider" data-slideAnimation="'.$animation_type.'" data-autoSlide="'.$auto_play.'" data-autoSlideInterval="'.$slide_interval.'" data-bulletNavigation="'.$bullet_navigation.'" data-arrowNavigation="'.$arrow_navigation.'" >';
	$output .=  '<ul class="slides">';		
	$output .=  do_shortcode($content);
	$output .=  '</ul>';	
	$output .=  '</div>';	
	$output .=  '</div>';	

  
	return $output;   
}

add_shortcode( 'image_slider', 'swm_image_slider' );

function swm_image_slide( $atts, $content = null ) {
	extract( shortcode_atts( array (		
		'src' => '',
		'alt' => ''		
	), $atts ) );

	$output = '';
	
	$output .= '<li><img src="'.$src.'" alt="'.$alt.'" /></li>';
	
	return $output;	
}

add_shortcode( 'image_slide', 'swm_image_slide' );

/* **************************************************************************************
   LIST ICON
************************************************************************************** */

function swm_icon_list( $atts, $content = null ) {		
	
	$output = '';		
	$output .=  '<ul class="the_icons">';		
	$output .=  do_shortcode($content);
	$output .=  '</ul>';	
	$output .=  '<div class="clear"></div>';
  
	return $output;   
}

add_shortcode( 'icon_list', 'swm_icon_list' );

function swm_icon( $atts, $content = null ) {
	extract( shortcode_atts( array (		
		'icon_name' => ''
		
	), $atts ) );

	$output = '';
	
	$output .= '<li class="'.$icon_name.'">';
	$output .=  do_shortcode($content);
	$output .=  '</li>';	
	
	return $output;	
}

add_shortcode( 'icon', 'swm_icon' );


function swm_my_icon( $atts, $content = null ) {
	extract( shortcode_atts( array (		
		'icon_name' => ''
		
	), $atts ) );
	
	$output = '';
	$output .= '<i class="'.$icon_name.'"></i>';	
	
	return $output;	
}

add_shortcode( 'my_icon', 'swm_my_icon' );


/* **************************************************************************************
   AWARDS ICON
************************************************************************************** */

function swm_awards_list( $atts, $content = null ) {	
	
	$output = '';		
	$output .=  '<ul class="our_awards">';		
	$output .=  do_shortcode($content);
	$output .=  '</ul>';	
	$output .=  '<div class="clear"></div>';
  
	return $output;   
}

add_shortcode( 'awards_list', 'swm_awards_list' );

function swm_award( $atts, $content = null ) {
	extract( shortcode_atts( array (		
		'title' => '',
		'website_name' => '',
		'website_url' => ''
		
	), $atts ) );

	$output = '';
	
	$output .= '<li>'.$title.'<sub><a href="'.$website_url.'">'.$website_name.'</a></sub></li>';	
	
	return $output;	
}

add_shortcode( 'award', 'swm_award' );

/* ************************************************************************************** 
   VIDEO
************************************************************************************** */

function swm_video($atts, $content = null) {
   extract(shortcode_atts(array(     
      "source" => '',
      "width" => '608',
      "height" => '347'
      
   ), $atts));
   return '<div class="fitVids image_border" style="padding-top:5px;"><iframe width="'.$width.'" height="'.$height.'" src="'.$source.'" frameborder="0" allowfullscreen webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div>';
}
add_shortcode("video", "swm_video");

/* ************************************************************************************** 
   CONTACT FORM
************************************************************************************** */
function swm_contact_form($atts, $content = null) {
   extract(shortcode_atts(array(     
      "email" => '',
      "subject" => ''      
      
   ), $atts));

	$nameError = '';
	$emailError = '';
	$commentError = '';
	$output = '';					

	if(isset($_POST['submitted'])) {
		if(trim($_POST['contactName']) === '') {
			$nameError = 'Please enter your name.';
			$hasError = true;
		} else {
			$name = trim($_POST['contactName']);
		}		
		if(trim($_POST['email']) == '')  {
				$emailError = 'Please enter your email address.';
				$hasError = true;
			} else if (!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", trim($_POST['email']))) {
				$emailError = 'You entered an invalid email address.';
				$hasError = true;
			} else {
				$client_email = trim($_POST['email']);
			}
			
		if(trim($_POST['comments']) === '') {
			$commentError = 'Please enter a message.';
			$hasError = true;
		} else {
			if(function_exists('stripslashes')) {
				$comments = stripslashes(trim($_POST['comments']));
			} else {
				$comments = trim($_POST['comments']);
			}
		}
			
		if(!isset($hasError)) {
			
			if (!isset($email) || ($email == '') ){
				$email = get_option('admin_email');
			}
			
			$body = "Name: $name \n\nEmail: $client_email \n\nComments: $comments";
			$headers = 'From: '.$name.' <'.$client_email.'>' . "\r\n" . 'Reply-To: ' . $client_email;
			
			mail($email, $subject, $body, $headers);
			$emailSent = true;
		}		
	} 				

	// Contact Form Labels
	$label_name = __('<strong>Name</strong> <span>(required)</span>', 'swmtranslate');
	$label_email = __('<strong>Email</strong> <span>(required)</span>', 'swmtranslate');
	$label_message = __('<strong>Comment</strong> <span>(required)</span>', 'swmtranslate');
	$label_submit = __('Submit', 'swmtranslate');	
	$message_success = __('Thank you, your email was sent successfully.', 'swmtranslate'); 
	$message_error = __('Sorry, an error occured.', 'swmtranslate');
	$the_permalink = get_permalink();	
	
	if(isset($emailSent) && $emailSent == true) { 

		$output .= "<div id='smessage'><p>$message_success</p></div>";

	} else { 		

		if(isset($hasError) || isset($captchaError)) { 
			$output .= "<p id='msg' class='error'>$message_error<p>";
		} 
				
		$output .= "<div id='contact_form'>";
		
		$output .= "<form action='$the_permalink' id='contactForm' method='post'>";															
									
		$output .= "<div class='one_third'>";

		$output .= "<label for='contactName'>$label_name</label>";							
		
		$output .=	"<input type='text' name='contactName' id='contactName' value='";

		if(isset($_POST['contactName'])) 
		 	echo $_POST['contactName'];

		$output .= "' class='required input-text' />";

		if($nameError != '') {
			$output .= "<span class='error'>$nameError</span>"; 
		} 

		$output .= "</div>";	
		
		$output .= "<div class='one_third last'>";						
																				
		$output .= "<label for='email'>$label_email</label>";					
				
		$output .= "<input type='text' name='email' id='email' value='";

		if(isset($_POST['email']))  
			echo $_POST['email'];

		$output .= "' class='required input-text email' />";

		if($emailError != '') {
			$output .= "<span class='error'>$emailError</span>";
		}

		$output .= "</div>";	

		$output .= "<div class='clear'>";

		$output .= "<label for='commentsText'>$label_message</label>";

		$output .= "<textarea name='comments' id='commentsText' rows='20' cols='30' class='required input-textarea'>";

		if(isset($_POST['comments'])) { 
			if(function_exists('stripslashes')) { 
				echo stripslashes($_POST['comments']); 
			} else { 
				echo $_POST['comments']; 
			} 
		}

		$output .= "</textarea>";

		if($commentError != '') {
			$output .= "<span class='error'>$commentError</span>"; 
		}
		
		$output .= "</div>";			
				
		$output .= "<input type='hidden' name='submitted' id='submitted' value='true' />";
		//$output .= "<button type='formButton' class='button_medium'><span>$label_submit</span></button>";

		$output .= "<p class='formButton'><input name='submit' type='submit' id='submit' value='$label_submit' /></p>";
					
		
		$output .= "</form>";
		$output .= "</div>";
		$output .= "<div class='clear'></div>";
	} 

	return $output;		
				
}
add_shortcode("contact_form", "swm_contact_form");


/* ************************************************************************************** 
	TESTIMONIALS
************************************************************************************** */

function swm_testimonials_client_image( $atts, $content = null ) {
	extract( shortcode_atts( array (
		'client_image_url' => '',
		'client_name' => '',		
		'client_details' => '',
		'website_title' => '',
		'website_url' => ''
	), $atts ) );
		
	$output = '';

	$output .= '<div class="testimonials1">';
	$output .= '<img src="'.$client_image_url.'" class="image_left image_border2" alt="" />';
	$output .= '<div class="testimonials-text">';
	$output .= '<h5>'.$client_name.'<br />';
	$output .= '<sup>'.$client_details.'</sup></h5>';
	$output .=  do_shortcode($content);		
	if ($website_title) {
	$output .= '<p><a href="'.$website_url.'" class="client-website">'.$website_title.'</a></p>';
	}
	$output .= '</div>';
	$output .= '</div><div class="clear"></div>';		
  
	return $output;   
}

add_shortcode( 'testimonials_with_client_image', 'swm_testimonials_client_image' );


function swm_testimonials_quote_style( $atts, $content = null ) {
	extract( shortcode_atts( array (		
		'client_name' => '',		
		'client_details' => '',
		'website_title' => '',
		'website_url' => ''
	), $atts ) );
		
	$output = '';

	$output .= '<div class="testimonials2">';			
	$output .= '<div class="testimonials-text">';
	$output .= '<h5>'.$client_name.'<br />';
	$output .= '<sup>'.$client_details.'</sup></h5>';
	$output .=  do_shortcode($content);	

	if ($website_title) {
	$output .= '<p><a href="'.$website_url.'" class="client-website">'.$website_title.'</a></p>';
	}

	$output .= '</div>';
	$output .= '</div>';		
  
	return $output;   
}

add_shortcode( 'testimonials_quote_style', 'swm_testimonials_quote_style' );


function swm_testimonials_box_style( $atts, $content = null ) {
	extract( shortcode_atts( array (		
		'client_name' => '',		
		'client_details' => ''		
	), $atts ) );
		
	$output = '';

	$output .= '<div class="box-testimonials" >';
	$output .=  do_shortcode($content);					
	$output .= '<div class="box-testimonials-client" style="margin-bottom:0;">';
	$output .= '<h5>'.$client_name.'<br />';
	$output .= '<sup>'.$client_details.'</sup></h5>';			
	$output .= '</div>';
	$output .= '</div>';

	return $output;   
}

add_shortcode( 'testimonials_box_style', 'swm_testimonials_box_style' );


/* ************************************************************************************** 
	ANIMATED MENU
************************************************************************************** */

function swm_animated_menu( $atts, $content = null ) {

	extract( shortcode_atts( array (		
		'hover_color' => '#ee7e2c',
		'defaultBg' => '#ffffff',
		'defaultText' => '#313131',
		'icon_color' => '#ee7e2c'

	), $atts ) );	

	$output = '';
	$output .= '<ul id="sti-menu" class="sti-menu" data-hoverMenuBg="'.$hover_color.'" data-defaultBg="'.$defaultBg.'" data-defaultText="'.$defaultText.'" data-defaultIcon="'.$icon_color.'">';
	$output .=  do_shortcode($content);	
	$output .= '</ul>';
	return $output;   
	
}
add_shortcode( 'animated_menu', 'swm_animated_menu' );

function swm_animated_menu_item( $atts, $content = null ) {

	extract( shortcode_atts( array (		
		'link' => '#',		
		'icon' => 'icon-cog',	
		'title' => 'service title',			
		'sub_title' => 'service sub title text here',
		'hover_text_color' => '#fff'		
	), $atts ) );	

	$output = '';
	$output .= '<li data-hovercolor="'.$hover_text_color.'">';
	$output .= '<a href="'.$link.'">';
	$output .= '<h2 data-type="mText" class="sti-item">'.$title.'</h2>';
	$output .= '<h3 data-type="sText" class="sti-item">'.$sub_title.'</h3>';
	$output .= '<span data-type="myIcon" class="sti-icon '.$icon.' sti-item"></span>';
	$output .= '</a>';
	$output .= '</li>';

	return $output;   

}
add_shortcode( 'animated_menu_item', 'swm_animated_menu_item' );


function swm_service_box( $atts, $content = null ) {
	extract( shortcode_atts( array (		
		'image_src' => '',		
		'link' => '',	
		'column' => 'one_fourth',	
		'link_text' => '',		
		'style' => 'fcb_style1',	
		'title' => 'service title'		
	), $atts ) );

	$output = '';	
	$output .= '<div class="fancy_content_box_wrapper">';
	$output .= '<div class="'.$column.'">';
	$output .= '<div class="fancy_content_box">';
	$output .= '<div class="'.$style.'">';
	$output .= '<div class="fcb_title">'.$title.'</div>';
	$output .= '</div>';
	$output .= '<div class="fcb_content">';
	$output .= '<p><img src="'.$image_src.'" alt=""></p>';
	$output .=  do_shortcode($content);	
	$output .= '<p><a href="'.$link.'"><i class="icon-double-angle-right"></i>'.$link_text.'</a></p>';	
	$output .= '</div>';
	$output .= '</div>';
	$output .= '</div>';
	$output .= '</div>';

	return $output;   
}

add_shortcode( 'service_box', 'swm_service_box' );

/* ************************************************************************************** 
	HOME PAGE WHITEBOX
************************************************************************************** */

function swm_home_whiteboxes( $atts, $content = null ) {
	extract( shortcode_atts( array (		
		'title' => '',
		'position' => ''
		
	), $atts ) );

	$output = '';

	$output .= '<div class="left">';
	$output .= '<div class="whitebox_shadow '.$position.'">';
	$output .= '<div class="whitebox">';
	$output .= '<div class="whitebox_bot">';
	$output .= '<div class="whitebox_top">';
	$output .= '<h3>'.$title.'</h3>';
	$output .= '<div class="whitebox_text">	';									
	$output .=  do_shortcode($content);	
	$output .= '<div class="clear"></div>	';									
	$output .= '</div>';
	$output .= '</div>';
	$output .= '</div>';
	$output .= '</div>';
	$output .= '</div>';
	$output .= '<div class="whitebox_shadow2"></div>';
	$output .= '</div>';
	
	return $output;	
}

add_shortcode( 'whitebox', 'swm_home_whiteboxes' );


/* ************************************************************************************** 
   TESTIMONIALS SLIDER
************************************************************************************** */

function swm_testimonials_slider( $atts, $content = null ) {
	extract( shortcode_atts( array (		
		'title' => '',
		'auto_slide' => '',
		'slider_speed' => '7000',
		'navigation' => 'true'

	), $atts ) );
	
	$output = '';

	$output .=  '<h4><span class="title_color">'.$title.'</span></h4>';
	$output .=  '<div class="testimonials-bx-slider-wrap testimonials-home-slider">';
	$output .=  '<div class="testimonials-bx-slider" data-animationType="fade" data-autoSlideshow="'.$auto_slide.'" data-slideshowSpeed="500" data-slideshowInterval="'.$slider_speed.'" data-pauseHover="true" data-displayNavigation="'.$navigation.'" data-smoothHeight="true" >';
	$output .=  do_shortcode($content);
	$output .=  '</div>';
	$output .=  '<div class="clear"></div>';
	$output .=  '</div>';
	$output .=  '<div class="clear"></div>';
  
	return $output;   
}

add_shortcode( 'testimonials_slider', 'swm_testimonials_slider' );

function swm_testimonials_slide( $atts, $content = null ) {
	extract( shortcode_atts( array (		
		'client_name' => '',
		'client_details' => ''		
	), $atts ) );
	
	$output = '';
	

	$output .=  '<div class="box-testimonials" ><p>';
	$output .=  do_shortcode($content);						
	$output .=  '</p><div class="box-testimonials-client" style="margin-bottom:0;">';			
	$output .=  '<h5>'.$client_name.'  <sup>'.$client_details.'</sup></h5>';
	$output .=  '</div>';
	$output .=  '<div class="clear"></div>';				
	$output .=  '</div>';	
	
	return $output;
	
}

add_shortcode( 'testimonials_slide', 'swm_testimonials_slide' );