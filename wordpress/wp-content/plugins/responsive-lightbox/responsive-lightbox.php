<?php
/*
Plugin Name: Responsive Lightbox
Description: Responsive Lightbox allows users to view larger versions of images and galleries in a lightbox (overlay) effect optimized for mobile devices.
Version: 1.5.0
Author: dFactory
Author URI: http://www.dfactory.eu/
Plugin URI: http://www.dfactory.eu/plugins/responsive-lightbox/
License: MIT License
License URI: http://opensource.org/licenses/MIT
Text Domain: responsive-lightbox
Domain Path: /languages

Responsive Lightbox
Copyright (C) 2013-2015, Digital Factory - info@digitalfactory.pl

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
*/

// exit if accessed directly
if ( ! defined( 'ABSPATH' ) )
	exit;

define( 'RESPONSIVE_LIGHTBOX_URL', plugins_url( '', __FILE__ ) );
define( 'RESPONSIVE_LIGHTBOX_PATH', plugin_dir_path( __FILE__ ) );
define( 'RESPONSIVE_LIGHTBOX_REL_PATH', dirname( plugin_basename( __FILE__ ) ) . '/' );

include_once( RESPONSIVE_LIGHTBOX_PATH . 'includes/class-frontend.php' );
include_once( RESPONSIVE_LIGHTBOX_PATH . 'includes/class-settings.php' );

/**
 * Responsive Lightbox class.
 *
 * @class Responsive_Lightbox
 * @version	1.5.0
 */
class Responsive_Lightbox {

	public $defaults = array(
		'settings'		 => array(
			'script'						=> 'swipebox',
			'selector'						=> 'lightbox',
			'galleries'						=> true,
			'gallery_image_size'			=> 'full',
			'gallery_image_title'			=> 'default',
			'force_custom_gallery'			=> false,
			'videos'						=> true,
			'image_links'					=> true,
			'images_as_gallery'				=> false,
			'deactivation_delete'			=> false,
			'loading_place'					=> 'header',
			'enable_custom_events'			=> false,
			'custom_events'					=> 'ajaxComplete'
		),
		'configuration'	 => array(
			'prettyphoto'	 => array(
				'animation_speed'			=> 'normal',
				'slideshow'					=> false,
				'slideshow_delay'			=> 5000,
				'slideshow_autoplay'		=> false,
				'opacity'					=> 75,
				'show_title'				=> true,
				'allow_resize'				=> true,
				'allow_expand'				=> true,
				'width'						=> 1080,
				'height'					=> 720,
				'separator'					=> '/',
				'theme'						=> 'pp_default',
				'horizontal_padding'		=> 20,
				'hide_flash'				=> false,
				'wmode'						=> 'opaque',
				'video_autoplay'			=> false,
				'modal'						=> false,
				'deeplinking'				=> false,
				'overlay_gallery'			=> true,
				'keyboard_shortcuts'		=> true,
				'social'					=> false
			),
			'swipebox'		 => array(
				'animation'					=> 'css',
				'force_png_icons'			=> false,
				'hide_close_mobile'			=> false,
				'hide_bars'					=> true,
				'hide_bars_delay'			=> 5000,
				'video_max_width'			=> 1080,
				'loop_at_end'				=> false
			),
			'fancybox'		 => array(
				'modal'						=> false,
				'show_overlay'				=> true,
				'show_close_button'			=> true,
				'enable_escape_button'		=> true,
				'hide_on_overlay_click'		=> true,
				'hide_on_content_click'		=> false,
				'cyclic'					=> false,
				'show_nav_arrows'			=> true,
				'auto_scale'				=> true,
				'scrolling'					=> 'yes',
				'center_on_scroll'			=> true,
				'opacity'					=> true,
				'overlay_opacity'			=> 70,
				'overlay_color'				=> '#666',
				'title_show'				=> true,
				'title_position'			=> 'outside',
				'transitions'				=> 'fade',
				'easings'					=> 'swing',
				'speeds'					=> 300,
				'change_speed'				=> 300,
				'change_fade'				=> 100,
				'padding'					=> 5,
				'margin'					=> 5,
				'video_width'				=> 1080,
				'video_height'				=> 720
			),
			'nivo'			 => array(
				'effect'					=> 'fade',
				'click_overlay_to_close'	=> true,
				'keyboard_nav'				=> true,
				'error_message'				=> 'The requested content cannot be loaded. Please try again later.'
			),
			'imagelightbox'	 => array(
				'animation_speed'			=> 250,
				'preload_next'				=> true,
				'enable_keyboard'			=> true,
				'quit_on_end'				=> false,
				'quit_on_image_click'		=> false,
				'quit_on_document_click'	=> true
			)
		),
		'version'		 => '1.5.0'
	);
	public $options = array();
	private static $_instance;
	
	private function __clone() {}

	private function __wakeup() {}

	/**
	 * Main Events Maker instance.
	 */
	public static function instance() {
		if ( self::$_instance === null ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	public function __construct() {
		register_activation_hook( __FILE__, array( &$this, 'activate_multisite' ) );
		register_deactivation_hook( __FILE__, array( &$this, 'deactivate_multisite' ) );

		// change from older versions
		$db_version = get_option( 'responsive_lightbox_version' );

		if ( version_compare( ($db_version === false ? '1.0.0' : $db_version ), '1.0.5', '<' ) ) {
			if ( ($array = get_option( 'rl_settings' )) !== false ) {
				update_option( 'responsive_lightbox_settings', $array );
				delete_option( 'rl_settings' );
			}

			if ( ($array = get_option( 'rl_configuration' )) !== false ) {
				update_option( 'responsive_lightbox_configuration', $array );
				delete_option( 'rl_configuration' );
			}
		}

		// update plugin version
		update_option( 'responsive_lightbox_version', $this->defaults['version'], '', 'no' );

		$this->options['settings'] = array_merge( $this->defaults['settings'], (($array = get_option( 'responsive_lightbox_settings' )) === false ? array() : $array ) );

		// for multi arrays we have to merge them separately
		$db_conf_opts = ( ( $base = get_option( 'responsive_lightbox_configuration' ) ) === false ? array() : $base );

		foreach ( $this->defaults['configuration'] as $script => $settings ) {
			$this->options['configuration'][$script] = array_merge( $settings, (isset( $db_conf_opts[$script] ) ? $db_conf_opts[$script] : array() ) );
		}

		// actions
		add_action( 'plugins_loaded', array( &$this, 'load_textdomain' ) );
		add_action( 'wp_enqueue_scripts', array( &$this, 'front_scripts_styles' ) );
		add_action( 'admin_enqueue_scripts', array( &$this, 'admin_scripts_styles' ) );

		// filters
		add_filter( 'plugin_action_links', array( &$this, 'plugin_settings_link' ), 10, 2 );
	}

	public function activate_single() {
		add_option( 'responsive_lightbox_settings', $this->defaults['settings'], '', 'no' );
		add_option( 'responsive_lightbox_configuration', $this->defaults['configuration'], '', 'no' );
		add_option( 'responsive_lightbox_version', $this->defaults['version'], '', 'no' );
	}
	
	public function deactivate_single( $multi = false ) {
		if ( $multi === true ) {
			$options = get_option( 'responsive_lightbox_settings' );
			$check = $options['deactivation_delete'];
		} else
			$check = $this->options['settings']['deactivation_delete'];

		if ( $check === true ) {
			delete_option( 'responsive_lightbox_settings' );
			delete_option( 'responsive_lightbox_configuration' );
			delete_option( 'responsive_lightbox_version' );
		}
	}

	public function activate_multisite( $networkwide ) {
		if ( is_multisite() && $networkwide ) {
			global $wpdb;

			$activated_blogs = array();
			$current_blog_id = $wpdb->blogid;
			$blogs_ids = $wpdb->get_col( $wpdb->prepare( 'SELECT blog_id FROM ' . $wpdb->blogs, '' ) );

			foreach ( $blogs_ids as $blog_id ) {
				switch_to_blog( $blog_id );
				$this->activate_single();
				$activated_blogs[] = (int) $blog_id;
			}

			switch_to_blog( $current_blog_id );
			update_site_option( 'responsive_lightbox_activated_blogs', $activated_blogs, array() );
		} else
			$this->activate_single();
	}

	public function deactivate_multisite( $networkwide ) {
		if ( is_multisite() && $networkwide ) {
			global $wpdb;

			$current_blog_id = $wpdb->blogid;
			$blogs_ids = $wpdb->get_col( $wpdb->prepare( 'SELECT blog_id FROM ' . $wpdb->blogs, '' ) );

			if ( ($activated_blogs = get_site_option( 'responsive_lightbox_activated_blogs', false, false )) === false )
				$activated_blogs = array();

			foreach ( $blogs_ids as $blog_id ) {
				switch_to_blog( $blog_id );
				$this->deactivate_single( true );

				if ( in_array( (int) $blog_id, $activated_blogs, true ) )
					unset( $activated_blogs[array_search( $blog_id, $activated_blogs )] );
			}

			switch_to_blog( $current_blog_id );
			update_site_option( 'responsive_lightbox_activated_blogs', $activated_blogs );
		} else
			$this->deactivate_single();
	}

	/**
	 * Load textdomain
	 */
	public function load_textdomain() {
		load_plugin_textdomain( 'responsive-lightbox', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
	}

	/**
	 * Add links to Support Forum
	 */
	public function plugin_extend_links( $links, $file ) {
		if ( ! current_user_can( 'install_plugins' ) )
			return $links;

		$plugin = plugin_basename( __FILE__ );

		if ( $file == $plugin ) {
			return array_merge(
				$links, array( sprintf( '<a href="http://www.dfactory.eu/support/forum/responsive-lightbox/" target="_blank">%s</a>', __( 'Support', 'responsive-lightbox' ) ) )
			);
		}

		return $links;
	}

	/**
	 * Add links to Settings page
	 */
	public function plugin_settings_link( $links, $file ) {
		if ( ! is_admin() || ! current_user_can( 'manage_options' ) )
			return $links;

		static $plugin;

		$plugin = plugin_basename( __FILE__ );

		if ( $file == $plugin ) {
			$settings_link = sprintf( '<a href="%s">%s</a>', admin_url( 'options-general.php' ) . '?page=responsive-lightbox', __( 'Settings', 'responsive-lightbox' ) );
			array_unshift( $links, $settings_link );
		}

		return $links;
	}
	
	/**
	 * Enqueue admin scripts and styles
	 */
	public function admin_scripts_styles( $page ) {
		if ( $page === 'settings_page_responsive-lightbox' ) {
			
			wp_register_script(
				'responsive-lightbox-admin', plugins_url( 'js/admin.js', __FILE__ ), array( 'jquery', 'wp-color-picker' )
			);
			wp_enqueue_script( 'responsive-lightbox-admin' );

			wp_localize_script(
				'responsive-lightbox-admin', 'rlArgs', array(
				'resetSettingsToDefaults'	 => __( 'Are you sure you want to reset these settings to defaults?', 'responsive-lightbox' ),
				'resetScriptToDefaults'		 => __( 'Are you sure you want to reset this script settings to defaults?', 'responsive-lightbox' ),
				)
			);

			wp_enqueue_style( 'wp-color-picker' );

			wp_register_style(
				'responsive-lightbox-admin', plugins_url( 'css/admin.css', __FILE__ )
			);
			wp_enqueue_style( 'responsive-lightbox-admin' );
		}
	}

	/**
	 * Enqueue frontend scripts and styles
	 */
	public function front_scripts_styles() {
		$args = apply_filters( 'rl_lightbox_args', array(
			'script'			 => $this->options['settings']['script'],
			'selector'			 => $this->options['settings']['selector'],
			'custom_events'		 => ($this->options['settings']['enable_custom_events'] === true ? ' ' . $this->options['settings']['custom_events'] : ''),
			'activeGalleries'	 => $this->get_boolean_value( $this->options['settings']['galleries'] )
		) );

		if ( $args['script'] === 'prettyphoto' ) {
			wp_register_script(
				'responsive-lightbox-prettyphoto', plugins_url( 'assets/prettyphoto/js/jquery.prettyPhoto.js', __FILE__ ), array( 'jquery' ), '', ($this->options['settings']['loading_place'] === 'header' ? false : true )
			);

			wp_enqueue_script( 'responsive-lightbox-prettyphoto' );

			wp_register_style(
				'responsive-lightbox-prettyphoto-front', plugins_url( 'assets/prettyphoto/css/prettyPhoto.css', __FILE__ )
			);

			wp_enqueue_style( 'responsive-lightbox-prettyphoto-front' );

			$args = array_merge(
				$args, array(
				'animationSpeed'	 => $this->options['configuration']['prettyphoto']['animation_speed'],
				'slideshow'			 => $this->get_boolean_value( $this->options['configuration']['prettyphoto']['slideshow'] ),
				'slideshowDelay'	 => $this->options['configuration']['prettyphoto']['slideshow_delay'],
				'slideshowAutoplay'	 => $this->get_boolean_value( $this->options['configuration']['prettyphoto']['slideshow_autoplay'] ),
				'opacity'			 => sprintf( '%.2f', ($this->options['configuration']['prettyphoto']['opacity'] / 100 ) ),
				'showTitle'			 => $this->get_boolean_value( $this->options['configuration']['prettyphoto']['show_title'] ),
				'allowResize'		 => $this->get_boolean_value( $this->options['configuration']['prettyphoto']['allow_resize'] ),
				'allowExpand'		 => $this->get_boolean_value( $this->options['configuration']['prettyphoto']['allow_expand'] ),
				'width'				 => $this->options['configuration']['prettyphoto']['width'],
				'height'			 => $this->options['configuration']['prettyphoto']['height'],
				'separator'			 => $this->options['configuration']['prettyphoto']['separator'],
				'theme'				 => $this->options['configuration']['prettyphoto']['theme'],
				'horizontalPadding'	 => $this->options['configuration']['prettyphoto']['horizontal_padding'],
				'hideFlash'			 => $this->get_boolean_value( $this->options['configuration']['prettyphoto']['hide_flash'] ),
				'wmode'				 => $this->options['configuration']['prettyphoto']['wmode'],
				'videoAutoplay'		 => $this->get_boolean_value( $this->options['configuration']['prettyphoto']['video_autoplay'] ),
				'modal'				 => $this->get_boolean_value( $this->options['configuration']['prettyphoto']['modal'] ),
				'deeplinking'		 => $this->get_boolean_value( $this->options['configuration']['prettyphoto']['deeplinking'] ),
				'overlayGallery'	 => $this->get_boolean_value( $this->options['configuration']['prettyphoto']['overlay_gallery'] ),
				'keyboardShortcuts'	 => $this->get_boolean_value( $this->options['configuration']['prettyphoto']['keyboard_shortcuts'] ),
				'social'			 => $this->get_boolean_value( $this->options['configuration']['prettyphoto']['social'] )
				)
			);
		} elseif ( $args['script'] === 'swipebox' ) {
			wp_register_script(
				'responsive-lightbox-swipebox', plugins_url( 'assets/swipebox/js/jquery.swipebox.min.js', __FILE__ ), array( 'jquery' ), '', ($this->options['settings']['loading_place'] === 'header' ? false : true )
			);

			wp_enqueue_script( 'responsive-lightbox-swipebox' );

			wp_register_style(
				'responsive-lightbox-swipebox-front', plugins_url( 'assets/swipebox/css/swipebox.min.css', __FILE__ )
			);

			wp_enqueue_style( 'responsive-lightbox-swipebox-front' );

			$args = array_merge(
				$args, array(
				'animation'					=> $this->get_boolean_value( ($this->options['configuration']['swipebox']['animation'] === 'css' ? true : false ) ),
				'hideCloseButtonOnMobile'	=> $this->get_boolean_value( $this->options['configuration']['swipebox']['hide_close_mobile'] ),
				'hideBars'					=> $this->get_boolean_value( $this->options['configuration']['swipebox']['hide_bars'] ),
				'hideBarsDelay'				=> $this->options['configuration']['swipebox']['hide_bars_delay'],
				'videoMaxWidth'				=> $this->options['configuration']['swipebox']['video_max_width'],
				'useSVG'					=> ! $this->options['configuration']['swipebox']['force_png_icons'],
				'loopAtEnd'					=> $this->get_boolean_value( $this->options['configuration']['swipebox']['loop_at_end'] )
				)
			);
		} elseif ( $args['script'] === 'fancybox' ) {
			wp_register_script(
				'responsive-lightbox-fancybox', plugins_url( 'assets/fancybox/jquery.fancybox-1.3.4.js', __FILE__ ), array( 'jquery' ), '', ($this->options['settings']['loading_place'] === 'header' ? false : true )
			);

			wp_enqueue_script( 'responsive-lightbox-fancybox' );

			wp_register_style(
				'responsive-lightbox-fancybox-front', plugins_url( 'assets/fancybox/jquery.fancybox-1.3.4.css', __FILE__ )
			);

			wp_enqueue_style( 'responsive-lightbox-fancybox-front' );

			$args = array_merge(
				$args, array(
				'modal'				 => $this->get_boolean_value( $this->options['configuration']['fancybox']['modal'] ),
				'showOverlay'		 => $this->get_boolean_value( $this->options['configuration']['fancybox']['show_overlay'] ),
				'showCloseButton'	 => $this->get_boolean_value( $this->options['configuration']['fancybox']['show_close_button'] ),
				'enableEscapeButton' => $this->get_boolean_value( $this->options['configuration']['fancybox']['enable_escape_button'] ),
				'hideOnOverlayClick' => $this->get_boolean_value( $this->options['configuration']['fancybox']['hide_on_overlay_click'] ),
				'hideOnContentClick' => $this->get_boolean_value( $this->options['configuration']['fancybox']['hide_on_content_click'] ),
				'cyclic'			 => $this->get_boolean_value( $this->options['configuration']['fancybox']['cyclic'] ),
				'showNavArrows'		 => $this->get_boolean_value( $this->options['configuration']['fancybox']['show_nav_arrows'] ),
				'autoScale'			 => $this->get_boolean_value( $this->options['configuration']['fancybox']['auto_scale'] ),
				'scrolling'			 => $this->options['configuration']['fancybox']['scrolling'],
				'centerOnScroll'	 => $this->get_boolean_value( $this->options['configuration']['fancybox']['center_on_scroll'] ),
				'opacity'			 => $this->get_boolean_value( $this->options['configuration']['fancybox']['opacity'] ),
				'overlayOpacity'	 => $this->options['configuration']['fancybox']['overlay_opacity'],
				'overlayColor'		 => $this->options['configuration']['fancybox']['overlay_color'],
				'titleShow'			 => $this->get_boolean_value( $this->options['configuration']['fancybox']['title_show'] ),
				'titlePosition'		 => $this->options['configuration']['fancybox']['title_position'],
				'transitions'		 => $this->options['configuration']['fancybox']['transitions'],
				'easings'			 => $this->options['configuration']['fancybox']['easings'],
				'speeds'			 => $this->options['configuration']['fancybox']['speeds'],
				'changeSpeed'		 => $this->options['configuration']['fancybox']['change_speed'],
				'changeFade'		 => $this->options['configuration']['fancybox']['change_fade'],
				'padding'			 => $this->options['configuration']['fancybox']['padding'],
				'margin'			 => $this->options['configuration']['fancybox']['margin'],
				'videoWidth'		 => $this->options['configuration']['fancybox']['video_width'],
				'videoHeight'		 => $this->options['configuration']['fancybox']['video_height']
				)
			);
		} elseif ( $args['script'] === 'nivo' ) {
			wp_register_script(
				'responsive-lightbox-nivo', plugins_url( 'assets/nivo/nivo-lightbox.min.js', __FILE__ ), array( 'jquery' ), '', ($this->options['settings']['loading_place'] === 'header' ? false : true )
			);

			wp_enqueue_script( 'responsive-lightbox-nivo' );

			wp_register_style(
				'responsive-lightbox-nivo-front', plugins_url( 'assets/nivo/nivo-lightbox.css', __FILE__ )
			);

			wp_enqueue_style( 'responsive-lightbox-nivo-front' );

			wp_register_style(
				'responsive-lightbox-nivo-front-template', plugins_url( 'assets/nivo/themes/default/default.css', __FILE__ )
			);

			wp_enqueue_style( 'responsive-lightbox-nivo-front-template' );

			$args = array_merge(
				$args, array(
				'effect'				 => $this->options['configuration']['nivo']['effect'],
				'clickOverlayToClose'	 => $this->get_boolean_value( $this->options['configuration']['nivo']['click_overlay_to_close'] ),
				'keyboardNav'			 => $this->get_boolean_value( $this->options['configuration']['nivo']['keyboard_nav'] ),
				'errorMessage'			 => esc_attr( $this->options['configuration']['nivo']['error_message'] )
				)
			);
		} elseif ( $args['script'] === 'imagelightbox' ) {
			wp_register_script(
				'responsive-lightbox-imagelightbox', plugins_url( 'assets/imagelightbox/js/imagelightbox.min.js', __FILE__ ), array( 'jquery' ), '', ($this->options['settings']['loading_place'] === 'header' ? false : true )
			);

			wp_enqueue_script( 'responsive-lightbox-imagelightbox' );

			wp_register_style(
				'responsive-lightbox-imagelightbox-front', plugins_url( 'assets/imagelightbox/css/imagelightbox.css', __FILE__ )
			);

			wp_enqueue_style( 'responsive-lightbox-imagelightbox-front' );

			$args = array_merge(
				$args, array(
				'animationSpeed'		 => $this->options['configuration']['imagelightbox']['animation_speed'],
				'preloadNext'			 => $this->get_boolean_value( $this->options['configuration']['imagelightbox']['preload_next'] ),
				'enableKeyboard'		 => $this->get_boolean_value( $this->options['configuration']['imagelightbox']['enable_keyboard'] ),
				'quitOnEnd'				 => $this->get_boolean_value( $this->options['configuration']['imagelightbox']['quit_on_end'] ),
				'quitOnImageClick'		 => $this->get_boolean_value( $this->options['configuration']['imagelightbox']['quit_on_image_click'] ),
				'quitOnDocumentClick'	 => $this->get_boolean_value( $this->options['configuration']['imagelightbox']['quit_on_document_click'] ),
				)
			);
		}

		wp_register_script(
			'responsive-lightbox-front', plugins_url( 'js/front.js', __FILE__ ), array( 'jquery' ), '', ($this->options['settings']['loading_place'] === 'header' ? false : true )
		);

		wp_enqueue_script( 'responsive-lightbox-front' );

		wp_add_inline_style(
			'responsive-lightbox-swipebox', '#swipebox-action #swipebox-close, #swipebox-action #swipebox-prev, #swipebox-action #swipebox-next { background-image: url(\'assets/swipebox/source/img/icons.png\') !important; }'
		);

		wp_localize_script(
			'responsive-lightbox-front', 'rlArgs', $args
		);
	}

	/**
	 * Helper: convert value to boolean
	 */
	private function get_boolean_value( $option ) {
		return ( $option === true ? 1 : 0 );
	}

}

/**
 * Initialise Responsive Lightbox.
 */
function Responsive_Lightbox() {
	static $instance;

	// first call to instance() initializes the plugin
	if ( $instance === null || ! ($instance instanceof Responsive_Lightbox) ) {
		$instance = Responsive_Lightbox::instance();
	}

	return $instance;
}

$responsive_lightbox = Responsive_Lightbox();