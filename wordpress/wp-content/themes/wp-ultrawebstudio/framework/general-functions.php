<?php

/* Index of this file	
	
	(1) Language Translation
	(2) Favicon
	(3) Detect IE8, IE9
	(4) Go to Top Scroll
	(5) Google Analytical
	(6) Word Truncate, Short Title
	(7) Social Media
	(8) Display Post Title in Shortcode blog_posts
	(9) Top Menu and Portfolio Menu
	(10) Add Custom Style
	(11) Inner page Header Title	
	(12) Display Post Format
	(13) Blog Gallery Slider
	(14) Blog Post Left side Date Section
	(15) Blog Post Title
	(16) Blog Post Excerpt
	(17) Blog Post Image Caption Title and Text
	(18) Blog Post Category, Author, Comment Count info
	(19) Post Format Quote and Aside Date
	(20) Portfolio: Excerpt / Button / Portfolio Thumbnail Hover Zoom/Play Icon / 
			Thumbnails & Lightbox Images/Videos / Sortable Portfolio Categories List
	(21) Pagination
	(22) Comments Listing
	(23) Breadcrumbs
	(24) Custom JS
	(25) Validate Email for Contact Form
	(26) Search Form Blank Query
	(27) Left or Right Sidebar
	(28) Display search bar
	(29) Slider Slides	
*/		

/* ************************************************************************************** 
	(1) Language Translation
************************************************************************************** */

load_theme_textdomain('swmtranslate',get_template_directory().'/languages/');

/* ************************************************************************************** 
	(2) Favicon
************************************************************************************** */

if (!function_exists('swm_display_favicon')) {
	function swm_display_favicon() {
		$favicon = (of_get_option('swm_favicon') <> '') ? esc_attr(of_get_option('swm_favicon')) : get_template_directory_uri().'/images/samples/favicon.ico'; ?>
<link rel="shortcut icon" href="<?php echo esc_url($favicon); ?>" type="image/x-icon" />
<?php
	}
}
add_action('wp_head', 'swm_display_favicon');

/* ************************************************************************************** 
	(3) Detect IE8, IE9 and Theme Skin CSS
************************************************************************************** */

if (!function_exists('swm_detect_ie_89')) {
	function swm_detect_ie_89() {

		echo '<!--[if IE 8]><style type="text/css" media="screen"> @import "'.get_template_directory_uri().'/css/ie8.css";</style><![endif]-->';
		echo '<!--[if IE 9]><style type="text/css" media="screen"> @import "'.get_template_directory_uri().'/css/ie9.css";</style><![endif]-->';		
	}
}
add_action('wp_head', 'swm_detect_ie_89');


if (!function_exists('swm_display_theme_skin_style')) {
	function swm_display_theme_skin_style() { 	 		
	          
			$GLOBALS['theme_skin_style'] = of_get_option('swm_theme_skin_style');
	        if($GLOBALS['theme_skin_style'] != '')
	               echo '<link rel="stylesheet" href="'. SKIN_CSS . $GLOBALS['theme_skin_style'] .'.css'.'" />'."\n";
				   
			if($GLOBALS['theme_skin_style'] == '')
	               echo '<link rel="stylesheet" href="'. SKIN_CSS . 'green' .'.css'.'" />'."\n"; 			           
	     }		
	}
add_action('wp_head', 'swm_display_theme_skin_style');

/* ************************************************************************************** 
	(4) Go to Top Scroll
************************************************************************************** */

function swm_go_top_anchor() {		
	
	if (!of_get_option('swm_scroll_to_top')) { 	?>
<style type="text/css"> #topcontrol { display:none;} </style>
	<?php
	} 
}
add_action('wp_head', 'swm_go_top_anchor');
/* ************************************************************************************** 
	(5) Google Analytical
************************************************************************************** */

function swm_display_google_analytical_code() {		
	$swm_display_google_analytical = of_get_option('swm_google_analytical');	
	if(!empty($swm_display_google_analytical)) {
?>
	<script type="text/javascript">
		var _gaq = _gaq || [];
		_gaq.push(['_setAccount', '<?php echo $swm_display_google_analytical; ?>']);
		_gaq.push(['_setDomainName', 'none']);
		_gaq.push(['_setAllowLinker', true]);
		_gaq.push(['_trackPageview']);
		(function() {
			var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		})();
	</script>
<?php  
	}
}
add_action('wp_footer', 'swm_display_google_analytical_code');

/* ************************************************************************************** 
	(6) Word Truncate, Short Title
************************************************************************************** */

function truncate_epost($content,$amount) {
	$truncate = $content; 
	$truncate = preg_replace('@<script[^>]*?>.*?</script>@si', '', $truncate);
	$truncate = preg_replace('@<style[^>]*?>.*?</style>@si', '', $truncate);
	$truncate = strip_tags($truncate);
	$truncate = substr($truncate, 0, strrpos(substr($truncate, 0, $amount), ' ')); 
	echo $truncate;
	echo "...";
}

function swm_short_title($text, $limit) { // Function name ShortenText
  $chars_limit = $limit; // Character length
  $chars_text = strlen($text);
  $text = $text." ";
  $text = substr($text,0,$chars_limit);
  $text = substr($text,0,strrpos($text,' '));
 
  if ($chars_text > $chars_limit)
     { $text = $text."..."; } // Ellipsis
     return $text;
}

/* ************************************************************************************** 
	(8) Display Post Title in Shortcode blog_posts
************************************************************************************** */

function display_post_title_in_sc() {  
		
	$format = get_post_format();
	
	if ( $format != 'aside' && $format != 'quote' && $format != 'link' ) { ?>				

		<div class="post-title">
			
			<h3><a href="<?php the_permalink(); ?>" title="<?php printf(__('Permanent Link to %s', 'swmtranslate'), get_the_title()); ?>" ><?php the_title(); ?></a></h3> 

			<?php swm_display_category_author(); ?>		
				
		</div> <?php				
	}
}

/* ************************************************************************************** 
	(9) Top Menu and Portfolio Menu
************************************************************************************** */

//Register WordPress Menus
function swm_register_menu() {
	register_nav_menus(array(		
		'top-menu' => __('Top Navigation Menu', 'swmtranslate'),
		'footer-menu' => __('Footer Navigation Menu', 'swmtranslate'),		
		'portfolio-menu-1' => __('Portfolio Hover Text Horizontal Menu', 'swmtranslate'),
		'portfolio-menu-2' => __('Portfolio Small Text Horizontal Menu', 'swmtranslate'),
		'portfolio-menu-3' => __('Portfolio Large Text Horizontal Menu', 'swmtranslate')
	));
}
add_action( 'init' , 'swm_register_menu' );

function swm_display_topmenu() {
	wp_nav_menu( array( 
		'theme_location' => 'top-menu', 
		'sort_column' => 'menu_order', 					
		'container' =>false, 
		'menu_class' => 'sf-menu', 
		'menu_id' => 'nav',
		'echo' => true,
		'before' => '', 
		'after' => '', 
		'link_before' => '', 
		'link_after' => '',
		'depth' => 0, 
		'fallback_cb' => 'swm_default_topmenu'				
	) ); 
}

function swm_default_topmenu() {		
	echo __('<ul><li class="menu-setting-msg">Set Top Menu from Wordpress Admin > Appearance > Menus > "Theme Locations" Box</li></ul>', 'swmtranslate');
}

function swm_display_footer_menu() {
	wp_nav_menu( array( 
		'theme_location' => 'footer-menu', 
		'sort_column' => 'menu_order', 					
		'container' =>false, 			
		'echo' => true,
		'before' => '', 
		'after' => '', 
		'link_before' => '', 
		'link_after' => '',
		'depth' => 0, 
		'fallback_cb' => 'swm_default_footer_menu'				
	) );
}

function swm_default_footer_menu() {		
	echo __('<ul><li>Set Footer menu from Wordpress Admin > Appearance > Menus</li></ul>', 'swmtranslate');
}

function swm_display_portfolio_menu() {

	global $swm_pf_display_type,$swm_excluce_pf_cat_tabs;

	if ($swm_pf_display_type == 'Classic_Portfolio_with_Hover_Text') {

		wp_nav_menu( array( 
			'theme_location' => 'portfolio-menu-1', 
			'sort_column' => 'menu_order', 					
			'container'       => 'div', 
			'container_class' => 'horizontal_menu right', 				
			'echo' => true,
			'before' => '', 
			'after' => '', 
			'link_before' => '', 
			'link_after' => '',
			'depth' => 0, 
			'fallback_cb' => ''				
		) );
	}

	if ($swm_pf_display_type == 'Classic_Portfolio_with_Small_Text') {

		wp_nav_menu( array( 
			'theme_location' => 'portfolio-menu-2', 
			'sort_column' => 'menu_order', 					
			'container'       => 'div', 
			'container_class' => 'horizontal_menu right', 				
			'echo' => true,
			'before' => '', 
			'after' => '', 
			'link_before' => '', 
			'link_after' => '',
			'depth' => 0, 
			'fallback_cb' => ''				
		) );
	}

	if ($swm_pf_display_type == 'Classic_Portfolio_with_Large_Text') {

		wp_nav_menu( array( 
			'theme_location' => 'portfolio-menu-3', 
			'sort_column' => 'menu_order', 					
			'container'       => 'div', 
			'container_class' => 'horizontal_menu right', 				
			'echo' => true,
			'before' => '', 
			'after' => '', 
			'link_before' => '', 
			'link_after' => '',
			'depth' => 0, 
			'fallback_cb' => ''				
		) );
	}

	if ($swm_pf_display_type == 'Sortable_Portfolio_with_Hover_Text' || $swm_pf_display_type == 'Sortable_Portfolio_with_Small_Text' || $swm_pf_display_type == 'Sortable_Portfolio_with_Large_Text') {

		if ( have_posts() ) while ( have_posts() ) : the_post();
		?>			
			<div class="horizontal_menu filter_menu right">									
				<ul>
					<li><a href="#" class="active" data-filter="*"><?php _e( 'All', 'swmtranslate' ); ?></a></li>
					<?php if ($swm_excluce_pf_cat_tabs):
							wp_list_categories(array('title_li' => '', 'taxonomy' => 'portfolio_category', 'exclude' => $swm_excluce_pf_cat_tabs, 'order' => 'asc', 'walker' => new Portfolio_Walker())); 
						else:
							wp_list_categories(array('title_li' => '', 'taxonomy' => 'portfolio_category',  'order' => 'asc', 'walker' => new Portfolio_Walker())); 
					endif; ?>
				</ul>
				<div class="clear"></div>
			</div>

		<?php endwhile; 
	}	
}

/* ************************************************************************************** 
	(10) Add Custom Style
************************************************************************************** */
function swm_css_metabox_styles() {

// font size for portfolio page
if (is_page_template('template-portfolio.php')) { 

	$swm_pf_title_font_size 		= get_post_meta(get_the_id(), 'swm_pf_title_font_size', true );
	$swm_pf_excerpt_font_size 		= get_post_meta(get_the_id(), 'swm_pf_excerpt_font_size', true );

echo '<style type="text/css"> #content .pf_box2 .pf_details3 h3, #content .pf_box2 .pf_details3 h3 a,#content .pf_box2 .pf_details3 h3 a:hover,#content .pf_details2 h3, #content .pf_details2 h3 a,#content .pf_details1 h3, #content .pf_details1 h3 a { font-size: '.$swm_pf_title_font_size.'px;}';

echo '#content .pf_details1 div,#content .pf_details2 div,#content .pf_details3 div,#content .pf_details3 ul.the_icons { font-size: '.$swm_pf_excerpt_font_size.'px;}</style>
';

} // end if condition

} //end function

add_action('wp_footer', 'swm_css_metabox_styles');


/* ************************************************************************************** 
	(11) Inner page Header Title
************************************************************************************** */
function swm_get_inner_title() {
	
	if ( is_day() ) :  
		printf( __( 'Archive: %s', 'swmtranslate' ), get_the_date() );
	
	elseif ( is_month() ) :
		printf( __( 'Archive: %s', 'swmtranslate' ), get_the_date('F Y') );
	
	elseif ( is_year() ) :
		printf( __( 'Archive: %s', 'swmtranslate' ), get_the_date('Y') );				
	
	elseif ( is_category() ) : 
		echo single_cat_title();					
		
	elseif ( is_tag() ) :
		printf( __( '%s', 'swmtranslate' ), single_tag_title('',false) );
		
	elseif ( is_author() ) :					
		_e( 'Author Archives', 'swmtranslate' );
		echo $curauth->display_name;
		
	elseif ( is_search() ) :
		printf( __( 'Search', 'swmtranslate' ) );	
	
	elseif ( is_attachment() ) :
		echo the_title();
	
	
	elseif ( is_404() ) :
								
		$swm_error_page_title = of_get_option('swm_error_page_title');	
		
		if ($swm_error_page_title != '') {		
			echo $swm_error_page_title;								
		} else {								
			 _e( '404 Error', 'swmtranslate' );									
		}
	
	elseif ( is_single() ) :	
		
		$category = get_the_category();
		$postType = get_post_type();
				
		if ($postType == 'post') : 	
			echo $category[0]->cat_name;
		endif;
		
		if ($postType == 'portfolio') :
			echo the_title();
		endif;
		
	else :
		_e( 'Blog', 'swmtranslate' );
		
	endif;	
}
	
/* ************************************************************************************** 
	(12) Display Post Format
************************************************************************************** */

function swm_display_post_format() {
	
	$format = get_post_format(); 
				
	if(empty($format)) { 
		$format = 'standard'; 
	}
	if( $format == 'standard' || $format == 'gallery' || $format == 'image' || $format == 'video' ) {
	
		get_template_part( 'includes/' . $format );	
	}
}	

/* ************************************************************************************** 
	(13) Blog Gallery Slider
************************************************************************************** */

if ( !function_exists( 'swm_blog_gallery' ) ) {
    function swm_blog_gallery($postid, $image_size) { ?>
        <script type="text/javascript">
	        jQuery(document).ready(function($){

	        	if ( $.browser.msie ){
				    if($.browser.version == '8.0') {
				    	 $("#flex-<?php echo $postid; ?>").flexslider({
						    slideshow: false,
				            controlNav: true,                           
				            smoothHeight: true,
				            start: function(slider) {
				                slider.container.click(function(event) {
				                    if( !slider.animating ) slider.flexAnimate( slider.getTarget('next') );
				                });
				            }
				        });	
				    }
				}


		       $("#flex-<?php echo $postid; ?>").imagesLoaded( function() {
		        $("#flex-<?php echo $postid; ?>").flexslider({
				    slideshow: false,
		            controlNav: true,                           
		            smoothHeight: true,
		            start: function(slider) {
		                slider.container.click(function(event) {
		                    if( !slider.animating ) slider.flexAnimate( slider.getTarget('next') );
		                });
		            }
		        });	
		       });			
			});
    	</script>
    	<?php

   		$gal_images = rwmb_meta( 'swm_pf_gallery_photos', 'type=thickbox_image' );
		$meta_gallery_img_height = rwmb_meta( 'swm_meta_gallery_img_height');   		
	    
        echo "<div class='pf_featured_img pf_l_img'><div class='swm_slider_box'><div id='flex-$postid' class='flexslider pfi_gallery'>";

        if ( $gal_images ) {
            echo "<ul class='slides'>";
            
            foreach ( $gal_images as $gal_image ) {											   	
			   //	$swm_gal_image = "{$gal_image['url']}";
			   	$swm_gal_image = swm_resize($gal_image['url'], 653, $meta_gallery_img_height, true,'c', false);		
			   	    echo "<li><img src='$swm_gal_image' alt='' /></li>";    
			}           
            echo '</ul>';
        }       
        echo "</div></div></div>";
    }
}

/* ************************************************************************************** 
	(14) Blog Post Left side Date Section
************************************************************************************** */

function swm_display_blog_date_section() { 	

	$swm_post_date = of_get_option('swm_post_date');

	if ($swm_post_date) {

		?>
		<div class="blog_date">	
			<?php the_time('M') ?><sub><?php the_time('d') ?></sub> 
		</div>
		<?php 		
	}  		
 }

/* ************************************************************************************** 
	(15) Blog Post Title, Comments, Author, Category
************************************************************************************** */

function swm_display_post_title_comments_meta() {	

	$id = get_the_ID();	
	$swm_link = get_post_meta($id, 'swm_meta_link_url', TRUE);	
	$swm_post_comments_count = of_get_option('swm_post_comments_count');
	$swm_post_categories = of_get_option('swm_post_categories');	
	$swm_post_author = of_get_option('swm_post_author');	
	$swm_post_tags = of_get_option('swm_post_tags');		
	$swm_post_single_share = of_get_option('swm_post_single_share');
	$format = get_post_format();

	if ( $format != 'aside' && $format != 'quote' ) { 
		?>

		<div class="post_title">

			<?php
			// display comment 
			if ($swm_post_comments_count) {  ?>
				<a href="<?php the_permalink(); ?>" class="comment_icon"><?php comments_number('0', '1', '%'); ?></a>
				<?php 
			}
			
			// display post title
			?>
			<h3><a href="<?php 

			if ( $format == 'link' ) {
				echo $swm_link;
			}else {
				the_permalink();
			}

			 ?>" title="<?php printf(__('Permanent Link to %s', 'swmtranslate'), get_the_title()); ?>" <?php

			 if ( $format == 'link' ) { echo 'target="_blank"'; } ?>

			    ><?php the_title(); ?></a></h3>	
			
		   
			<?php
			// display author, categories, tags
			if ( $swm_post_author || $swm_post_categories || $swm_post_tags) { ?>	
				
				<p> <?php			

					if ($swm_post_author) { ?>
					
						<span><i class="icon-user"></i><?php echo the_author_posts_link(); ?></span>	
					
					<?php } ?>
					
					<?php if ($swm_post_categories) { ?>
					
						<span><i class="icon-folder-open"></i><?php echo the_category(', '); ?></span>
					
					<?php } ?>	

					<?php if ($swm_post_tags && has_tag()) { ?>
			
						<span><i class="icon-tags"></i><?php echo the_tags(' '); ?></span>
				
					<?php } ?>			

					<?php if ($swm_post_single_share && is_single()) { ?>
					
						<i class="icon-share"></i><a href="http://www.addthis.com/bookmark.php" class="addthis_button"><?php _e('Share this post', 'swmtranslate'); ?></a>
						<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=xa-4fd88cbb0c9a49a8"></script>			
					
					<?php }	?>		

				</p> <?php	

			} // end if post author,categories
		
			?>

		</div> <!-- .post title -->
		
		<?php

	} 	//end if				
				
}

/* ************************************************************************************** 
	(16) Blog Post Excerpt
************************************************************************************** */

$swm_show_excerpt = of_get_option('swm_show_excerpt');
$swm_excerpt_length = of_get_option('swm_excerpt_length');	

function swm_the_excerpt($charlength) {
	$excerpt = get_the_excerpt();

	$charlength++;

	if ( mb_strlen( $excerpt ) > $charlength ) {
		$subex = mb_substr( $excerpt, 0, $charlength - 5 );
		$exwords = explode( ' ', $subex );
		$excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
		if ( $excut < 0 ) {
			echo mb_substr( $subex, 0, $excut );
		} else {
			echo $subex;
		}
		//echo '[...]';
	} else {
		echo $excerpt;
	}
}

/* ************************************************************************************** 
	(17) Blog Post Read more button
************************************************************************************** */

function swm_display_post_button() {

	$swm_post_button = of_get_option('swm_post_button');	
	$swm_post_button_text = of_get_option('swm_post_button_text');	
	$format = get_post_format();

	if ( $format != 'quote' ) {

		if ($swm_post_button && !is_single()) { ?>
	
		<p><a href="<?php the_permalink(); ?>" class="white_button"><?php echo $swm_post_button_text; ?></a></p>	


	<?php }

	}

}

/* ************************************************************************************** 
	(17) Blog Post Image Caption Title and Text
************************************************************************************** */

function swm_display_image_caption() {		

	$swm_image_caption_title = get_post_meta(get_the_ID(), 'swm_image_caption_title', true);
	$swm_image_caption_text = get_post_meta(get_the_ID(), 'swm_image_caption_text', true);	
	
	if ($swm_image_caption_title || $swm_image_caption_text != '') {	
		
		echo '<div class="pf_image_caption">';
		
		if ($swm_image_caption_title != '' ) {
			echo '<h4>'.$swm_image_caption_title.'</h4>';
		}
		if ($swm_image_caption_text != '') {
			echo '<p>'.$swm_image_caption_text.'</p>';		
		}
		echo '</div>';
	}	
}

/* ************************************************************************************** 
	(19) Post Format Quote and Aside Date
************************************************************************************** */

function swm_pfquote_pfaside_date() {
	
	$swm_post_date = of_get_option('swm_post_date');
	$format = get_post_format();
		
	if ($swm_post_date){ 

		if ($format == 'quote' || $format == 'aside') { ?>
			
			<span><a href="#" ><i class="icon-time"></i><?php the_time('m.j.Y') ?></a></span>
			
		<?php
		} 
	}	
}

/* ************************************************************************************** 
	(20) Portfolio: Excerpt / Button / Portfolio Thumbnail Hover Zoom/Play Icon / 
		 Thumbnails & Lightbox Images/Videos / Sortable Portfolio Categories List
************************************************************************************** */

/* ========== Portfolio Item Title ========== */

function swm_portfolio_title() {
	
	global $swm_pf_title_text, $swm_pf_item_title_link;
	$id = get_the_ID();
	
	$permalink = get_permalink( $id );
	$title = get_the_title( $id );	
	
	if ($swm_pf_title_text) {
		
		if ($swm_pf_item_title_link) {
			
			echo '<h3><a href="'.$permalink.'" rel="bookmark" title="'.$title.'">'.$title .'</a></h3>';			
			
		}else {
			
			echo '<h3>'.$title .'</h3>';
		}	
		
	}	
}

/* ========== Show/Hide Excerpt and Excerpt Length ========== */

function swm_portfolio_excerpt() {
	
	global $swm_show_portfolio_excerpt,$swm_portfolio_excerpt_length,$swm_pf_display_expert_category;

		if ($swm_pf_display_expert_category != "Hide_Expert") {

			if ($swm_pf_display_expert_category == "Display_Expert") {
			
			echo '<div class="pf_hover_excerpt">';
				swm_the_excerpt($swm_portfolio_excerpt_length);
			echo '</div>';

			} else {
				echo '<p>';
				$terms = get_the_terms( get_the_id(), 'portfolio_category' );
				$count = count($terms); $i=0;
				if ($count > 0) {
					foreach ( $terms as $term ) {
						 $i++;
						echo $term->name;
						if ($count != $i) echo ', ';
					}
				}
				echo '</p>';
			}
		}
}

/* ========== Portfolio Item Button ========== */

function swm_portfolio_button() {
	
	$id = get_the_ID();
	$swm_show_portfolio_button = of_get_option('swm_portfolio_item_button');
	$swm_portfolio_button_text = of_get_option('swm_portfolio_item_button_text');
	$permalink = get_permalink( $id );
	
	if ($swm_show_portfolio_button) {		
		echo '<p><a class="button_small" href="'.$permalink.'">'.$swm_portfolio_button_text.'</a></p>';			
	}	
}

/* ========== Portfolio Item Zoom, Link Icons ========== */

function swm_portfolio_text_icons() {
	$id = get_the_ID();	
	$permalink 				= get_permalink( $id );
	$swm_featured_image 	= wp_get_attachment_url(get_post_thumbnail_id($id));
	$swm_pf_project_type 	= get_post_meta($id, 'swm_portfolio_project_type', true );	
	$video 					= get_post_meta($id, 'swm_portfolio_video', true);	

	global $swm_onoff_pf_hover_link_icon,$swm_onoff_pf_hover_zoom_icon;	

	echo '<div>';

	if ($swm_onoff_pf_hover_link_icon) {

	echo '<a href="'.$permalink.'" class="pf_text_link_icon"></a>';

	}

	if ($swm_pf_project_type == "Video" && $video != '') {

		$large_view = $video;
		$hover_icon = 'pf_text_play_icon';

	} else {

		$large_view = $swm_featured_image;
		$hover_icon = 'pf_text_zoom_icon';
	}


	if ($swm_onoff_pf_hover_zoom_icon) {

		echo '<a class="'.$hover_icon.'" data-rel="prettyPhoto[mygalleryimgs]" title="" href="'.$large_view.'"></a>';			

	}

	echo '</div>';

}

/* ========== Portfolio Thumbnail Hover Zoom/Play Icon ========== */

function swm_portfolio_hover_icon() {
 
	global $swm_onoff_prettyphoto;
	$swm_portfolio_video = get_post_meta(get_the_id(), 'swm_portfolio_video', true);	
	
	if (!$swm_onoff_prettyphoto) { 
	
		echo 'link-icon';
	
	} elseif ($swm_portfolio_video != '') { 
	
		echo 'play-icon';
	
	}else {
		
		echo 'zoom-icon';
	}
}

/* ========== Portfolio Item Thumbnails and Lightbox Images/Videos ========== */

function swm_portfolio_thumb() {
	
	global $swm_onoff_prettyphoto,$swm_pf_display_column,$swm_pf_items_custom_height,$swm_pf_display_type;
	
	$postid 						= get_the_ID();
	$thumb 							= null;	
	$swm_pf_project_type 			= get_post_meta($postid, 'swm_portfolio_project_type', true );	
	$video 							= get_post_meta($postid, 'swm_portfolio_video', true);
	$swm_lightbox_image_title 		= get_post_meta($postid, 'swm_lightbox_image_title', true);
	$swm_lightbox_image_description = get_post_meta($postid, 'swm_lightbox_image_description', true);	
	$images 						= rwmb_meta( 'swm_portfolio_thumb_image', 'type=thickbox_image' );
	$gallery_images 				= rwmb_meta( 'swm_portfolio_project_gallery', 'type=image' );	

	$swm_attached_image = wp_get_attachment_url(get_post_thumbnail_id($postid));

	if ($swm_pf_project_type == "Video" && $video != '') {

		$large_view = $video;

	} else {

		$large_view = $swm_attached_image;
	}						

	    if ( $images ) {
	  		foreach ( $images as $image ) {											   	
			   	$swm_featured_image = "{$image['url']}";		    
			}
	   	} else {	
			$swm_featured_image = $swm_attached_image;
		}
		
		if ($swm_pf_display_type == 'Sortable_Portfolio_with_Hover_Text' ||  $swm_pf_display_type == 'Classic_Portfolio_with_Hover_Text') {

			if ( $swm_pf_display_column == 'pf_2col' ) { $thumb = '<img src="'.swm_resize($swm_featured_image, 430, $swm_pf_items_custom_height, true,'c', false).'" alt="'.$swm_lightbox_image_title.'" />'; }	
			if ( $swm_pf_display_column == 'pf_3col' ) { $thumb = '<img src="'.swm_resize($swm_featured_image, 290, $swm_pf_items_custom_height, true,'c', false).'" alt="'.$swm_lightbox_image_title.'" />'; }
			if ( $swm_pf_display_column == 'pf_4col' ) { $thumb = '<img src="'.swm_resize($swm_featured_image, 214, $swm_pf_items_custom_height, true,'c', false).'" alt="'.$swm_lightbox_image_title.'" />'; }

		} else {

			if ( $swm_pf_display_column == 'pf_2col' ) { $thumb = '<img src="'.swm_resize($swm_featured_image, 427, $swm_pf_items_custom_height, true,'c', false).'" alt="'.$swm_lightbox_image_title.'" />'; }	
			if ( $swm_pf_display_column == 'pf_3col' ) { $thumb = '<img src="'.swm_resize($swm_featured_image, 274, $swm_pf_items_custom_height, true,'c', false).'" alt="'.$swm_lightbox_image_title.'" />'; }
			if ( $swm_pf_display_column == 'pf_4col' ) { $thumb = '<img src="'.swm_resize($swm_featured_image, 197, $swm_pf_items_custom_height, true,'c', false).'" alt="'.$swm_lightbox_image_title.'" />'; }
		}
		
		if($swm_onoff_prettyphoto) {

			$output = '<a data-rel="prettyPhoto[mygallery1]" title="'.$swm_lightbox_image_description.'" href="'.$large_view.'">'.$thumb.'</a>';
					
		}
		else {	
			$output = '<a title="'.get_the_title($postid).'" href="'.get_permalink($postid).'">'.$thumb.'</a>';
		}
		
		echo $output;

	
}

/* ===== Sortable Portfolio Categories List ===== */

class Portfolio_Walker extends Walker_Category {
	function start_el(&$output, $category, $depth, $args) {
		
		extract($args);
		
		$cat_name = esc_attr( $category->name);
		$cat_name = apply_filters( 'list_cats', $cat_name, $category );
		$link = '<a href="#" data-filter=".'.strtolower(preg_replace('/\s+/', '-', $cat_name)).'" title="'.$cat_name.'">'.$cat_name.'</a> ';			

		if ( isset($show_count) && $show_count )
			$link .= ' (' . intval($category->count) . ')';
		if ( isset($show_date) && $show_date ) {
			$link .= ' ' . gmdate('Y-m-d', $category->last_update_timestamp);
		}
		if ( isset($current_category) && $current_category )
			$_current_category = get_category( $current_category );
		if ( 'list' == $args['style'] ) {
			$output .= "<li>$link";			
		} else {
			$output .= "\t$link<br />\n";
		}
	}
}


/* ************************************************************************************** 
	(21) Pagination
************************************************************************************** */

function swm_pagination($pages = '', $range = 2)
{  
	$showitems = ($range * 2)+1;  

	global $paged;
	if(empty($paged)) $paged = 1;

	if($pages == '') {
		global $wp_query;
		$pages = $wp_query->max_num_pages;
		if(!$pages) {
			$pages = 1;
		}
	}   

	$prevPage = __( 'Prev', 'swmtranslate' );
	$nextPage = __( 'Next', 'swmtranslate' );	

	if(1 != $pages) {
		echo "<div class='clear'></div><div class='horizontal_menu pagination_menu left'><ul>";
		//if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<li><a class='page-first' href='".get_pagenum_link(1)."'><i class='icon-angle-left'></i> First</a></a></li>";
		if($paged > 1 /* && $showitems < $pages */ ) echo "<li><a class='page-previous' href='".get_pagenum_link($paged - 1)."'><i class='icon-angle-left'></i> $prevPage</a></li>";

		for ($i=1; $i <= $pages; $i++) {
			if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )) {
				echo ($paged == $i)? "<li><a href='".get_pagenum_link($i)."' class='current' >".$i."</a></li>":"<li><a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a></li>";
			}
		}

		if ($paged < $pages /* && $showitems < $pages */) echo "<li><a class='page-next' href='".get_pagenum_link($paged + 1)."'>$nextPage <i class='icon-angle-right'></i></a></li>";  
		//if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<li><a class='page-last' href='".get_pagenum_link($pages)."'>Last <i class='icon-angle-right'></i></a></a></li>";
		echo "</ul></div>\n";
	}
}

/* ************************************************************************************** 
	(22) Comments Listing
************************************************************************************** */

if ( ! function_exists( 'swm_comment_listing' ) ) {

	function swm_comment_listing( $comment, $args, $depth ) {
		
		$GLOBALS['comment'] = $comment;
		
		switch ( $comment->comment_type ) :
			case '' : ?>				
							
				<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
					<article id="comment-<?php comment_ID(); ?>" class="comment_body clearfix">
						<div class="comment_avatar">
							<?php echo get_avatar( $comment, 45 ); ?>		
						</div> <!-- end .comment_avatar -->

						<div class="comment_postinfo">
							<span class="comment_author"><?php printf( __( '%s', 'swmtranslate' ), sprintf( '%s ', get_comment_author_link()." " ) );  ?></span>				
							<span class="comment_date">
								<?php
										/* translators: 1: date, 2: time */
										printf( __( '%1$s at %2$s ', 'swmtranslate' ), get_comment_date(),  get_comment_time() ); ?> - <?php 

										comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) );?>		

									 <?php edit_comment_link( __( '(Edit)', 'swmtranslate' ), ' ' );									
									?>	

							</span>
						</div> <!-- end .comment_postinfo -->

						<div class="comment_area">
							
							<div class="comment-content">
								<?php comment_text();
									if ( $comment->comment_approved == '0' ) : ?>									
										<p><em><?php _e( 'Your comment is awaiting moderation.', 'swmtranslate' ); ?></em></p>								
								<?php 
									endif; ?>
										
							</div> <!-- end comment-content-->
							<div class="clear"></div>
						</div> <!-- end comment_area-->
					</article> <!-- end comment-body -->
					<div class="clear"></div>
										
				<?php
				break;
			case 'pingback'  :
			case 'trackback' : ?>
				
			<li class="post pingback">
				<p><?php _e( 'Pingback:', 'swmtranslate' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __('(Edit)', 'swmtranslate'), ' ' ); ?></p>
			<?php
					break;
		endswitch;
	}
}

/* ************************************************************************************** 
	(23) Breadcrumbs
************************************************************************************** */

function swm_display_breadcrumbs() {
	if (of_get_option('swm_breadcrumbs')) {		
		swm_breadcrumbs_nav();		
	}		
}

if (!function_exists('swm_breadcrumbs_nav')) {
	function swm_breadcrumbs_nav() {

		global $post;
		$home = __( 'Home', 'swmtranslate' );
		
		// Breadcrumb navigation
		if (is_page() && !is_front_page() || is_single() || is_category()) {
			//echo '<ul class="breadcrumbs">';				
			echo '<li class="no_link">You Are Here: </li>';
			echo '<li class="breadcrumb-home"><a href="'.get_bloginfo('url').'">'.$home.'</a></li>';
	 
		if (is_page()) {
			$ancestors = get_post_ancestors($post);
	 
			if ($ancestors) {
				$ancestors = array_reverse($ancestors);
	 
				foreach ($ancestors as $crumb) {
				echo '<li><a href="'.get_permalink($crumb).'">'.get_the_title($crumb).'</a></li>';
				}
			}
		}
	 
		if (is_single()) {
			$category = get_the_category();
			echo '<li><a href="'.get_category_link($category[0]->cat_ID).'">'.$category[0]->cat_name.'</a></li>';
		}
	 
		if (is_category()) {
			$category = get_the_category();
			echo '<li>'.$category[0]->cat_name.'</li>';
		}
	 
		// Current page
		if (is_page() || is_single()) {
			echo '<li>'.get_the_title().'</li>';
		}
		//echo '</ul>';
		} elseif (is_front_page()) {
			// Front page
			//echo '<ul class="breadcrumbs">';
			//echo '<li class="breadcrumb-home"><a href="'.get_bloginfo('url').'">'.$home.'</a></li>';
			//echo '<li class="current">Home Page</li>';
			//echo '</ul>';
		}

	}
}

/* ************************************************************************************** 
	(24) Custom JS
************************************************************************************** */

if (!function_exists('swm_display_custom_js')) {
	function swm_display_custom_js() {
		
		$swm_custom_js = of_get_option('swm_custom_js');
		
		if ($swm_custom_js != '') {				
			echo '<script type="text/javascript">';
			echo $swm_custom_js;
			echo '</script>';
			
		}
	}
}
add_action('wp_footer', 'swm_display_custom_js');

/* ************************************************************************************** 
	(25) Validate Email for Contact Form
************************************************************************************** */

function validateEmail($email){
	return eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $email);
}

/* ************************************************************************************** 
	(26) Search Form Blank Query
************************************************************************************** */

add_filter( 'request', 'my_request_filter' );
function my_request_filter( $query_vars ) {
    if( isset( $_GET['s'] ) && empty( $_GET['s'] ) ) {
        $query_vars['s'] = " ";
    }
    return $query_vars;
}

/* ************************************************************************************** 
	(27) Left or Right Sidebar
************************************************************************************** */

function swm_sidebar_alignment() {
	
	 $swm_blog_sidebar_position = of_get_option('swm_blog_sidebar_position');

	 if ($swm_blog_sidebar_position == 'left-sidebar') {
	 	echo 'left';
	 }else {
	 	echo 'right';
	 }		
}

/* ************************************************************************************** 
	(28) Display search bar
************************************************************************************** */

function swm_display_searchbox() {
						
	$swm_search_bar = of_get_option('swm_search_bar');	

	if ($swm_search_bar) { ?>	
		
		<div class="search_box">								
			<form method="get" action="<?php echo home_url(); ?>/">								
				<input type="text" name="s" id="s" />				
				<input type="submit" class="search-icon" name="submit" id="searchsubmit" value="" />				
			</form>
		</div>		
		<?php 
	} 	
}				
				
/* ************************************************************************************** 
	(29) Slider Slides
************************************************************************************** */

function swm_slider_slides() {

	global $wpdb;

	/* Exclude Slider Categories */

	$terms = rwmb_meta( 'swm_exclude_slider_categories', 'type=taxonomy&taxonomy=slider_category' );
	
	$cats  = array();
	$excluce_cats  = array();	

	//get slider category names
	foreach ( $terms as $term ){
	   $cats[] .= sprintf( $term->slug);
	}		
	// get slider category ids                 
	foreach ( $cats  as $cat ) {                     
		$catid = $wpdb->get_var("SELECT term_id FROM $wpdb->terms WHERE slug='$cat'");
		$excluce_cats[] = $catid;
	}
						
	$count 		=	0;
	$itemlimit 	=	-1;				      		
	$pageid 	= 	get_the_ID();

	$args = array(
  	 	'post_type' => 'slider',
  	 	'posts_per_page' => -1,
  	 	'orderby'=>'menu_order',
  	 	'order'     => 'ASC',
  	 	'tax_query' => array(
			array(
					'taxonomy' => 'slider_category',
					'field' => 'id',
					'terms' => $excluce_cats,
					'operator' => 'NOT IN',
					)
			));

	$query = new WP_Query( $args );

	while ($query->have_posts()) : $query->the_post();	

		$title = get_the_title();
		$content = get_the_content();
		$id = get_the_ID();
		$swm_featured_image = wp_get_attachment_url(get_post_thumbnail_id($id));		

		/* Get slider metabox data */					
		$swm_slider_image_link = get_post_meta(get_the_id(), 'swm_slider_image_link', TRUE);		
		$swm_flex_slider_video = get_post_meta(get_the_id(), 'swm_flex_slider_video', TRUE);
		$swm_slider_type = get_post_meta(get_the_id(), 'swm_slider_type', TRUE);

		if ($swm_slider_type == 'Default_Slider') {
			$swm_slide_image = '<img src="'.swm_resize($swm_featured_image, 494,313,true,'c', false).'" alt="'.$title.'" />';			
		} else {
			$swm_slide_image = '<img src="'.swm_resize($swm_featured_image, 936,360,true,'c', false).'" alt="'.$title.'" />';
		}	

		if ($swm_flex_slider_video) {
			$fluid_vid_class = 'fluid-video';
		}else {
			$fluid_vid_class = '';
		}
		?>									
		
		<li class="<?php echo $fluid_vid_class; ?>">
	       <?php 

			if ($swm_flex_slider_video && $swm_slider_type != 'Default_Slider') {

				echo $swm_flex_slider_video;

			} elseif ($swm_slider_image_link) { 

				   echo '<a href="'.$swm_slider_image_link.'">'.$swm_slide_image.'</a>'; 

			} else {

	       		echo $swm_slide_image; 
	       	}

	       $swm_caption_display 	= get_post_meta(get_the_id(), 'swm_caption_display', TRUE);
	       $swm_caption_location 	= get_post_meta(get_the_id(), 'swm_caption_location', TRUE);       

	       if ($swm_caption_display) {

	       		if ($swm_slider_type != 'Default_Slider') {        	
	        		
	        		if (!$swm_flex_slider_video) {
		        		?> 
			            <div class="flex-caption <?php echo $swm_caption_location; ?>">
			                <?php if ($title)  { ?><h3><?php echo $title; ?></h3> <?php }
			                if ($content){ ?><p><?php echo do_shortcode( $content ); ?></p><?php } ?>
			            </div>
			        	<?php 
		        	}
	        	}

	   		 } ?>

	    </li>							
			
		<?php																

		$count++;  
	
	endwhile; 	wp_reset_query(); 

}