<?php
define('SWM_THEME_DIR', get_template_directory_uri());
define('SWM_ADMIN', get_template_directory() . '/framework/');
define('SWM_DIRECTORY', get_template_directory_uri());
define('OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/framework/');	
define('SWM_WIDGETS', get_template_directory() . '/framework/widgets/');
define('SWM_METABOXES', get_template_directory() . '/framework/metaboxes/');
define('SWM_POSTTYPES', get_template_directory() . '/framework/post-types/');
define('THEME_CSS', SWM_DIRECTORY . '/css/');
define('SKIN_CSS', SWM_DIRECTORY . '/css/skins/');
define('ADMIN_CSS', SWM_DIRECTORY . '/framework/css/');
define('SWM_SHORTCODES', get_template_directory() . '/framework/shortcodes/');
define('SWM_TINYMCE_DIR', SWM_DIRECTORY . '/framework/shortcodes/tinymce');
define('SWM_THEME_NAME', 'emode');

require_once (SWM_ADMIN . 'options-framework.php');

/* ---> Theme's custom function file <------------------------ */
 
require_once (SWM_ADMIN . 'general-functions.php');

/* ----------------------------------------------------- */

require_once (SWM_ADMIN . 'image-resizer.php');
include_once (SWM_ADMIN . 'sidebars/sidebar.php');
include_once (SWM_ADMIN . 'footers/footer-column.php');
include_once (SWM_WIDGETS . 'flickr-widget.php');
include_once (SWM_WIDGETS . 'advertise-widget.php');
include_once (SWM_WIDGETS . 'recent-posts-widget.php');
include_once (SWM_WIDGETS . 'testimonials-widget.php');
include_once (SWM_WIDGETS . 'contact-info-widget.php');
include_once (SWM_WIDGETS . 'contact-form-widget.php');
include_once (SWM_WIDGETS . 'category-widget.php');
include_once (SWM_ADMIN . 'sidebars/multiple-sidebars.php');
include_once (SWM_ADMIN . 'admin-functions.php');
include_once (SWM_METABOXES . 'meta-box.php');
include_once (SWM_METABOXES . 'meta-box-options.php');
include_once (SWM_POSTTYPES . 'portfolio.php');
include_once (SWM_POSTTYPES . 'slider.php');
include_once (SWM_POSTTYPES . 'testimonial.php');
include_once (SWM_POSTTYPES . 'faq.php');
include_once (SWM_SHORTCODES . 'shortcodes.php');
require_once( SWM_SHORTCODES . 'tinymce/shortcodes.tinymce.php' );

add_theme_support( 'post-thumbnails' );

/* ************************************************************************************** 
	Register Javascripts and CSS Files
************************************************************************************** */

function swm_load_scripts () {
	if (!is_admin()) {
		$template_uri = get_template_directory_uri();
		$swm_google_font_url = of_get_option('swm_google_font_url');			
		$swm_layout_color = of_get_option('swm_layout_color');
		
		wp_register_script('modernizer', $template_uri . '/js/modernizer.js', 'jquery');		
		wp_register_script('jquery-coreplugins', $template_uri . '/js/jquery-core-plugins.js', 'jquery','1.0', TRUE);
		wp_register_script('jquery-plugins', $template_uri . '/js/jquery-plugins.js', 'jquery','1.0', TRUE);
		wp_register_script('validate', $template_uri . '/js/validate.js', 'jquery','1.0', TRUE);	
		wp_register_script('theme-settings', $template_uri . '/js/theme-settings.js', 'jquery','1.0', TRUE);
		wp_register_script('portfolio-sortable', $template_uri . '/js/portfolio-sortable.js', 'jquery', '1.0', TRUE);

		wp_enqueue_script('modernizer');

		wp_enqueue_script('jquery');				
		wp_enqueue_script('jquery-coreplugins');
		wp_enqueue_script('jquery-plugins');	
		wp_enqueue_script('validate');					
		wp_enqueue_script('theme-settings');	
		wp_enqueue_script('portfolio-sortable');		
		
		wp_register_style('main-css', $template_uri . '/style.css', '', '1.0');
		wp_register_style('widgets', $template_uri . '/widgets.css', '', '1.0');
		wp_register_style('shortcodes', $template_uri . '/shortcodes.css', '', '1.0');			
		wp_register_style('sliders', $template_uri . '/sliders.css', '', '1.0');
		wp_register_style('theme-font', $swm_google_font_url);		
		wp_register_style('prettyphoto', $template_uri . '/css/prettyphoto.css', '', '1.0');		
		wp_register_style('font-icons', $template_uri . '/fonts/font-awesome.css', '', '1.0');			
		wp_register_style('screen', $template_uri . '/css/screen.php', '', '1.0');
		wp_register_style('responsive', $template_uri . '/responsive.css', '', '1.0');		
		wp_register_style('custom', $template_uri . '/custom.css', '', '1.0');
		
		wp_enqueue_style('main-css');
		wp_enqueue_style('widgets');
		wp_enqueue_style('shortcodes');	
		wp_enqueue_style('sliders');	
		wp_enqueue_style('theme-font');	
		wp_enqueue_style('prettyphoto');							
		wp_enqueue_style('font-icons');		
		wp_enqueue_style('screen');		
		wp_enqueue_style('responsive');
		wp_enqueue_style('custom');
	}
}
add_action('init', 'swm_load_scripts');

/* ************************************************************************************** 
	Content Width
************************************************************************************** */

if ( ! isset( $content_width ) )
	$content_width = 960;

show_admin_bar(false);