<?php

add_action( 'widgets_init', 'swm_add_flickr_widget' );

function swm_add_flickr_widget() {
	register_widget( 'SWM_Flickr_Widget' );
}

class SWM_Flickr_Widget extends WP_Widget {

	function SWM_Flickr_Widget() {			
			$widget_ops = array( 'classname' => '', 'description' => __('Show your Flickr pictures on your site', 'swmtranslate'));				
			$this->WP_Widget( 'flickr-widget', __('Widget - Flickr Photos', 'swmtranslate'), $widget_ops );
	}
		
	function widget( $args, $instance ) {
		extract( $args );

		/* User-selected settings. */
		$swm_flickr_title = apply_filters('widget_title', $instance['title'] );
		$swm_flickr_userid = $instance['flickr_userid'];
		$swm_number_of_photos = $instance['number-of-photos'];		
		
		echo $before_widget;		
		echo $before_title.$swm_flickr_title.$after_title;
		echo '<div class="flickr_photos sidebar_gallery" data-display-photos="'.$swm_number_of_photos.'" data-flickr-id="'.$swm_flickr_userid.'"></div>';
		echo $after_widget;	
	
	}
	
	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array( 'title' => 'Flickr Photos', 'flickr_userid' => '90291761@N02','number-of-photos' => '8' );
		$instance = wp_parse_args( (array) $instance, $defaults );
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Widget Title', 'swmtranslate') ?></label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:95%;" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'flickr_userid' ); ?>"><?php _e('Flickr Userid: (<a href="http://idgettr.com/" target="_blank" >Help</a>)', 'swmtranslate') ?></label>
			<input id="<?php echo $this->get_field_id( 'flickr_userid' ); ?>" name="<?php echo $this->get_field_name( 'flickr_userid' ); ?>" value="<?php echo $instance['flickr_userid']; ?>" style="width:95%;" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'number-of-photos' ); ?>"><?php _e('Number of Photos to Display:', 'swmtranslate') ?></label>
			<input id="<?php echo $this->get_field_id( 'number-of-photos' ); ?>" name="<?php echo $this->get_field_name( 'number-of-photos' ); ?>" value="<?php echo $instance['number-of-photos']; ?>" style="width:95%;" />
		</p>			
		<?php	
	}
}	