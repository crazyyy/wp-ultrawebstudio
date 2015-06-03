<?php

/* ************************************************************************************** 
	Enable featured image box
************************************************************************************** */

add_theme_support( 'post-thumbnails' );


/* ************************************************************************************** 
	Add custom admin css
************************************************************************************** */

function swm_add_custom_admin_css() {
   echo '<link rel="stylesheet" href="'. ADMIN_CSS . 'style-wp-admin' .'.css'.'" />'."\n"; 
}

add_action( 'admin_head', 'swm_add_custom_admin_css' ); 

/* ************************************************************************************** 
	 Add post formats
************************************************************************************** */
 
$formats = array( 'aside','gallery','image','link','quote','video');

add_theme_support( 'post-formats', $formats ); 

function swm_admin_scripts() {
	
	wp_register_script('swm-admin-javascripts', get_template_directory_uri() . '/framework/js/admin-javascripts.js', array('jquery','media-upload','thickbox'));
	
	wp_enqueue_script('jquery-ui-sortable');
	wp_enqueue_script('media-upload');
	wp_enqueue_script('thickbox');	
	wp_enqueue_script('swm-admin-javascripts');	
}

function swm_admin_styles() {
	
	wp_enqueue_style('nav-menu'); 	
}

add_action('admin_print_scripts', 'swm_admin_scripts');
add_action('admin_print_styles', 'swm_admin_styles');

// Add default posts and comments RSS feed links to <head>.
add_theme_support( 'automatic-feed-links' );

// This theme styles the visual editor with editor-style.css to match the theme style.
add_editor_style();

if ( ! isset( $content_width ) ) $content_width = 960;

function swm_tag_cloud_fonts($args = array()) {
   $args['smallest'] = 11;
   $args['largest'] = 11;
   $args['unit'] = 'px';
   return $args;
}

add_filter('widget_tag_cloud_args', 'swm_tag_cloud_fonts', 90);

/* ************************************************************************************** 
	 Add revolution slider tables after theme activation
************************************************************************************** */

if ( ! function_exists( 'lambda_theme_activate' ) ) {
	function lambda_theme_activate() {
	
		global $wpdb;
		require_once(ABSPATH . 'wp-admin/includes/upgrade.php');				
		
		//creating the table for rev slider
		$table_lambda_tables = $wpdb->base_prefix . "revslider_sliders"; 
		if($wpdb->get_var("show tables like '$table_lambda_tables'") != $table_lambda_tables) {
			
			$sql = "CREATE TABLE " . $table_lambda_tables ." (
						  id int(9) NOT NULL AUTO_INCREMENT,					  
						  title tinytext NOT NULL,
						  alias tinytext,
						  params text NOT NULL,
							  PRIMARY KEY (id)
				);";
				
		dbDelta($sql);
		}
		
		//creating the table for rev slides
		$table_lambda_tables = $wpdb->prefix . "revslider_slides"; 
		if($wpdb->get_var("show tables like '$table_lambda_tables'") != $table_lambda_tables) {
			
			$sql = "CREATE TABLE " . $table_lambda_tables ." (
					  id int(9) NOT NULL AUTO_INCREMENT,
					  slider_id int(9) NOT NULL,
					  slide_order int not NULL,					  
					  params text NOT NULL,
					  layers text NOT NULL,
					  PRIMARY KEY (id)
					);";
					
		dbDelta($sql);
		}
		
	}
	wp_register_theme_activation_hook(SWM_THEME_NAME, 'lambda_theme_activate');
}

function lambda_theme_deactivate() {


}
wp_register_theme_deactivation_hook(SWM_THEME_NAME, 'lambda_theme_deactivate');


/* ************************************************************************************** 
	Activation/Deactivation hook function
************************************************************************************** */

/**
 *
 * @desc registers a theme activation hook
 * @param string $code : Code of the theme. This can be the base folder of your theme. Eg if your theme is in folder 'mytheme' then code will be 'mytheme'
 * @param callback $function : Function to call when theme gets activated.
 */
function wp_register_theme_activation_hook($code, $function) {
    $optionKey="theme_is_activated_" . $code;
    if(!get_option($optionKey)) {
        call_user_func($function);
        update_option($optionKey , 1);
    }
}

/**
 * @desc registers deactivation hook
 * @param string $code : Code of the theme. This must match the value you provided in wp_register_theme_activation_hook function as $code
 * @param callback $function : Function to call when theme gets deactivated.
 */
function wp_register_theme_deactivation_hook($code, $function) {
    // store function in code specific global
    $GLOBALS["wp_register_theme_deactivation_hook_function" . $code]=$function;

    // create a runtime function which will delete the option set while activation of this theme and will call deactivation function provided in $function
    $fn=create_function('$theme', ' call_user_func($GLOBALS["wp_register_theme_deactivation_hook_function' . $code . '"]); delete_option("theme_is_activated_' . $code. '");');

    // add above created function to switch_theme action hook. This hook gets called when admin changes the theme.
    // Due to wordpress core implementation this hook can only be received by currently active theme (which is going to be deactivated as admin has chosen another one.
    // Your theme can perceive this hook as a deactivation hook.
    add_action("switch_theme", $fn);
}