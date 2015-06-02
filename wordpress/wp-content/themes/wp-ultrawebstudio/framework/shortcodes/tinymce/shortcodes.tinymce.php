<?php

/* Thanks to Orman Clark and Themezilla.com team for sharing awesome shortcodes plugin : http://www.themezilla.com/plugins/zillashortcodes */

class swm_tinymce {	

	function __construct() {
		
		add_action('init', array( &$this, 'init' ));		
		add_action('admin_init', array( &$this, 'admin_init' ));
		
	}	
	
	// --------------------------------------------------------------------------
	
	/**
	 * Registers TinyMCE rich editor buttons
	 *
	 * @return	void
	 */
	function init() {
		
		if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') )
			return;
	
		if ( get_user_option('rich_editing') == 'true' ) {
			
			add_filter( 'mce_external_plugins', array( &$this, 'add_rich_plugins' ) );
			add_filter( 'mce_buttons', array( &$this, 'register_rich_buttons' ) );
		}
	}
	
	// --------------------------------------------------------------------------
	
	/**
	 * Defins TinyMCE rich editor js plugin
	 *
	 * @return	void
	 */
	function add_rich_plugins( $plugin_array ) {
		
		$plugin_array['swmShortcodes'] = SWM_TINYMCE_DIR . '/plugin.js';
		return $plugin_array;
	}
	
	// --------------------------------------------------------------------------
	
	/**
	 * Adds TinyMCE rich editor buttons
	 *
	 * @return	void
	 */
	function register_rich_buttons( $buttons ) {
		
		array_push( $buttons, "|", 'swm_button' );
		return $buttons;
	}
	
	// --------------------------------------------------------------------------
	
	function admin_init() {
		
		// css
		wp_enqueue_style( 'swm-popup', SWM_TINYMCE_DIR . '/css/popup.css', false, '1.0', 'all' );
		
		// js
		wp_enqueue_script('jquery-ui-sortable');
		wp_enqueue_script( 'jquery-livequery', SWM_TINYMCE_DIR . '/js/jquery.livequery.js', false, '1.1.1', false );
		wp_enqueue_script( 'jquery-appendo', SWM_TINYMCE_DIR . '/js/jquery.appendo.js', false, '1.0', false );
		wp_enqueue_script( 'base64', SWM_TINYMCE_DIR . '/js/base64.js', false, '1.0', false );
		wp_enqueue_script( 'swm-popup', SWM_TINYMCE_DIR . '/js/popup.js', false, '1.0', false );
	}
	
}

new swm_tinymce();

?>