<?php

function SWM_Testimonials_Widget_Display() {
	register_widget('SWM_Testimonials_Widget');
}

add_action('widgets_init', 'SWM_Testimonials_Widget_Display');

class SWM_Testimonials_Widget extends WP_Widget {
	
    function SWM_Testimonials_Widget(){			
		$widget_ops = array( 'classname' => '', 'description' => __('Display Testimoinals with Rotation', 'swmtranslate') );				
		$this->WP_Widget( 'testimonials-widget', __('Widget - Testimonials', 'swmtranslate'), $widget_ops );
	}
		
	function widget( $args, $instance ) {
		extract( $args );

		/* User-selected settings. */
		$swm_testimonials_title = apply_filters('widget_title', $instance['title'] );
		$animation_type = apply_filters('animation_type', $instance['animation_type'] );
		$open_new_window = $instance['open_new_window'] ? '1' : '0';		
		$hide_client_name = $instance['hide_client_name'] ? '1' : '0';
		$hide_client_details = $instance['hide_client_details'] ? '1' : '0';
		$hide_client_website = $instance['hide_client_website'] ? '1' : '0';
		$auto_slideshow = $instance['auto_slideshow'] ? 'true' : 'false';
		$pause_slideshow = $instance['pause_slideshow'] ? 'true' : 'false';
		$smooth_height = $instance['smooth_height'] ? 'true' : 'false';
		$display_navigation = $instance['display_navigation'] ? 'true' : 'false';
		$testimonials_word_limit = !empty($instance['testimonials_word_limit']) ? $instance['testimonials_word_limit'] : '150' ;
		$testimonials_post_limit = !empty($instance['testimonials_post_limit']) ? $instance['testimonials_post_limit'] : '' ;
		$slideshow_speed = !empty($instance['slideshow_speed']) ? $instance['slideshow_speed'] : '500' ;
		$slideshow_interval = !empty($instance['slideshow_interval']) ? $instance['slideshow_interval'] : '500' ;
		
		echo $before_widget;		
		echo $before_title.$swm_testimonials_title.$after_title;		
		
		rewind_posts();
		wp_reset_query();
		
		echo '<div class="testimonials-bx-slider-wrap">';
		echo '<div class="testimonials-bx-slider" data-animationType="'.$animation_type.'" data-autoSlideshow="'.$auto_slideshow.'" data-slideshowSpeed="'.$slideshow_speed.'" data-slideshowInterval="'.$slideshow_interval.'" data-pauseHover="'.$pause_slideshow.'" data-displayNavigation="'.$display_navigation.'" data-smoothHeight="'.$smooth_height.'" >';
		
			$count 		=	1;
			$itemlimit 	=	-1;		
			$pageid 	= 	get_the_ID();							
			
			$args = array(
				'post_type' => 'testimonials',
				'orderby'=>'menu_order',
				'order' => 'ASC',			
				'showposts' => $testimonials_post_limit,	
				'type' => get_query_var('type')					      	 	
				);

			$query = new WP_Query( $args );
			
			while ($query->have_posts()) : $query->the_post();					
				
				$swm_client_details = get_post_meta(get_the_ID(), 'swm_client_details', TRUE); 
				$swm_website_title = get_post_meta(get_the_ID(), 'swm_website_title', TRUE); 
				$swm_website_url = get_post_meta(get_the_ID(), 'swm_website_url', TRUE); ?>		
				
				<div class="box-testimonials" >
				<?php 					
					//client testimonial
					$words = explode(" ",strip_tags(get_the_content()));
					$content = implode(" ",array_splice($words,0,$testimonials_word_limit));
					echo '<p>'.$content.'</p>';					
					
					// client name
					if ($hide_client_name == 0) { ?>
						<div class="box-testimonials-client" style="margin-bottom:0;">				
							<h5><?php echo the_title(); ?>  <?php

								//client position
								if ($hide_client_details == 0) { 
							 
									if ($swm_client_details) {

										echo '<sup>'.$swm_client_details.'</sup>'; 
									}						
								}

								//client website
								if ($hide_client_website == 0) { 				
									if ($swm_website_url) { ?>							
										<div><a class="clientWebsite" href="<?php echo $swm_website_url; ?>" <?php if ($open_new_window == 1) echo('target="_blank"') ?> ><?php echo $swm_website_title; ?></a></div>
									<?php } elseif ($swm_website_title) { ?>							
										<div><a class="clientWebsite" href="<?php echo $swm_website_url; ?>" <?php if ($open_new_window == 1) echo('target="_blank"') ?> ><?php echo $swm_website_title; ?></a></div>
									<?php }	
								}?>

							</h5>
						</div>
						<div class="clear"></div>	<?php
					}	 ?>	
				
				</div> <!-- box-testimonials -->				
				<?php 					
				$count++; 				
			endwhile; 
		echo'</div>';

		echo '<div class="clear"></div>';		

		echo'</div>';
	
		echo $after_widget;
	}	
	
	/*Saves the settings. */
    function update($new_instance, $old_instance){
		$instance = $old_instance;
		$instance['title'] = stripslashes($new_instance['title']);		
		$instance['animation_type'] = stripslashes($new_instance['animation_type']);	
		$instance['open_new_window'] = !empty($new_instance['open_new_window']) ? 1 : 0;		
		$instance['hide_client_name'] = !empty($new_instance['hide_client_name']) ? 1 : 0;
		$instance['hide_client_details'] = !empty($new_instance['hide_client_details']) ? 1 : 0;
		$instance['hide_client_website'] = !empty($new_instance['hide_client_website']) ? 1 : 0;
		$instance['auto_slideshow'] = !empty($new_instance['auto_slideshow']) ? true : false;
		$instance['pause_slideshow'] = !empty($new_instance['pause_slideshow']) ? true : false;
		$instance['smooth_height'] = !empty($new_instance['smooth_height']) ? true : false;
		$instance['display_navigation'] = !empty($new_instance['display_navigation']) ? true : false;
		$instance['testimonials_word_limit'] = stripslashes($new_instance['testimonials_word_limit']);
		$instance['testimonials_post_limit'] = stripslashes($new_instance['testimonials_post_limit']);
		$instance['slideshow_speed'] = stripslashes($new_instance['slideshow_speed']);
		$instance['slideshow_interval'] = stripslashes($new_instance['slideshow_interval']);

		return $instance;
	}
	
	function form( $instance ) {

		/* Set up some default widget settings */
		
		$defaults = array( 
			'title' => __('Testimonials', 'swmtranslate'), 
			'open_new_window' => true,
			'hide_quote_icon' => false,			
			'hide_client_details' => false,
			'hide_client_website' => true,			
			'hide_client_name' => false,
			'testimonials_word_limit' => 30,
			'testimonials_post_limit' => '',
			'animation_type' => 'fade',	
			'slideshow_speed' => 500,	
			'slideshow_interval' => 4000,	
			'auto_slideshow' => true,	
			'pause_slideshow' => true,	
			'smooth_height' => true,	
			'display_navigation' => true,	
		);
		$instance = wp_parse_args( (array) $instance, $defaults );
		
		$title = htmlspecialchars($instance['title']);		
		$animation_type = htmlspecialchars($instance['animation_type']);
		$open_new_window = isset($instance['open_new_window']) ? (bool) $instance['open_new_window'] :false;		
		$hide_client_name = isset($instance['hide_client_name']) ? (bool) $instance['hide_client_name'] :false;
		$hide_client_details = isset($instance['hide_client_details']) ? (bool) $instance['hide_client_details'] :false;
		$hide_client_website = isset($instance['hide_client_website']) ? (bool) $instance['hide_client_website'] :true;
		$auto_slideshow = isset($instance['auto_slideshow']) ? (bool) $instance['auto_slideshow'] :true;
		$pause_slideshow = isset($instance['pause_slideshow']) ? (bool) $instance['pause_slideshow'] :true;
		$smooth_height = isset($instance['smooth_height']) ? (bool) $instance['smooth_height'] :true;
		$display_navigation = isset($instance['display_navigation']) ? (bool) $instance['display_navigation'] :true;
		$testimonials_word_limit = $instance['testimonials_word_limit'];
		$testimonials_post_limit = $instance['testimonials_post_limit'];
		$slideshow_speed = $instance['slideshow_speed'];
		$slideshow_interval = $instance['slideshow_interval'];
		
		?>
		
		<p>
			<small><?php _e('Add Clients Testimonials from left menu "Testimonials" > <a href="post-new.php?post_type=testimonials">Add New</a>', 'swmtranslate') ?></small>
		</p>
		
		<hr />
		
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Widget Title:', 'swmtranslate') ?></label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:95%;" />
		</p>
		
		<hr />

		<p>
			<label for="<?php echo $this->get_field_id( 'testimonials_word_limit' ); ?>"><?php _e('Word Limit:', 'swmtranslate') ?></label>
			<input id="<?php echo $this->get_field_id( 'testimonials_word_limit' ); ?>" name="<?php echo $this->get_field_name( 'testimonials_word_limit' ); ?>" value="<?php echo $instance['testimonials_word_limit']; ?>" style="width:95%;" /><br >
			<small><?php _e('Set word limit of testimonial, leave it blank for full testimonial.', 'swmtranslate') ?></small>
		</p>
		<hr />

		<p>
			<label for="<?php echo $this->get_field_id( 'animation_type' ); ?>"><?php _e('Animation Style', 'swmtranslate') ?></label>
			<input id="<?php echo $this->get_field_id( 'animation_type' ); ?>" name="<?php echo $this->get_field_name( 'animation_type' ); ?>" value="<?php echo $instance['animation_type']; ?>" style="width:95%;" /><br >
			<small><?php _e('Type of transition between slides:<br /> horizontal, fade', 'swmtranslate') ?></small>
		</p>
		<hr />

		<p>
			<label for="<?php echo $this->get_field_id( 'slideshow_speed' ); ?>"><?php _e('Slideshow Speed', 'swmtranslate') ?></label>
			<input id="<?php echo $this->get_field_id( 'slideshow_speed' ); ?>" name="<?php echo $this->get_field_name( 'slideshow_speed' ); ?>" value="<?php echo $instance['slideshow_speed']; ?>" style="width:95%;" /><br >
			<small><?php _e('Slide transition duration (in ms)', 'swmtranslate') ?></small>
		</p>
		<hr />

		<p>
			<label for="<?php echo $this->get_field_id( 'slideshow_interval' ); ?>"><?php _e('Slideshow Interval', 'swmtranslate') ?></label>
			<input id="<?php echo $this->get_field_id( 'slideshow_interval' ); ?>" name="<?php echo $this->get_field_name( 'slideshow_interval' ); ?>" value="<?php echo $instance['slideshow_interval']; ?>" style="width:95%;" /><br >
			<small><?php _e('The amount of time (in ms) between each auto transition', 'swmtranslate') ?></small>
		</p>
		<hr />

		<p>
			<label for="<?php echo $this->get_field_id( 'testimonials_post_limit' ); ?>"><?php _e('Number of Testimonials to Display:', 'swmtranslate') ?></label>
			<input id="<?php echo $this->get_field_id( 'testimonials_post_limit' ); ?>" name="<?php echo $this->get_field_name( 'testimonials_post_limit' ); ?>" value="<?php echo $instance['testimonials_post_limit']; ?>" style="width:95%;" /><br >
			<small><?php _e('Set testimoinals slides limit, leave it blank to slide all testimonials.', 'swmtranslate') ?></small>
		</p>

		<hr /><br />
		
		<p>
			<input class="checkbox" type="checkbox" <?php checked($instance['open_new_window'], true) ?> id="<?php echo $this->get_field_id('open_new_window'); ?>" name="<?php echo $this->get_field_name('open_new_window'); ?>" />
			<label for="<?php echo $this->get_field_id('open_new_window'); ?>"><?php _e('Open client\'s website in <strong>New Window</strong>', 'swmtranslate') ?></label>	
		</p>
		
		<p>
			<input class="checkbox" type="checkbox" <?php checked($instance['hide_client_name'], true) ?> id="<?php echo $this->get_field_id('hide_client_name'); ?>" name="<?php echo $this->get_field_name('hide_client_name'); ?>" />
			<label for="<?php echo $this->get_field_id('hide_client_name'); ?>"><?php _e('Hide Client <strong>Name</strong>', 'swmtranslate') ?></label>		
		</p>
		
		<p>
			<input class="checkbox" type="checkbox" <?php checked($instance['hide_client_details'], true) ?> id="<?php echo $this->get_field_id('hide_client_details'); ?>" name="<?php echo $this->get_field_name('hide_client_details'); ?>" />
			<label for="<?php echo $this->get_field_id('hide_client_details'); ?>"><?php _e('Hide Client<strong> Details</strong>', 'swmtranslate') ?></label>		
		</p>
		
		<p>
			<input class="checkbox" type="checkbox" <?php checked($instance['hide_client_website'], true) ?> id="<?php echo $this->get_field_id('hide_client_website'); ?>" name="<?php echo $this->get_field_name('hide_client_website'); ?>" />
			<label for="<?php echo $this->get_field_id('hide_client_website'); ?>"><?php _e('Hide <strong>Website URL</strong>', 'swmtranslate') ?></label>		
		</p>

		<p>
			<input class="checkbox" type="checkbox" <?php checked($instance['auto_slideshow'], true) ?> id="<?php echo $this->get_field_id('auto_slideshow'); ?>" name="<?php echo $this->get_field_name('auto_slideshow'); ?>" />
			<label for="<?php echo $this->get_field_id('auto_slideshow'); ?>"><?php _e('Auto Slideshow', 'swmtranslate') ?></label>		
		</p>

		<p>
			<input class="checkbox" type="checkbox" <?php checked($instance['pause_slideshow'], true) ?> id="<?php echo $this->get_field_id('pause_slideshow'); ?>" name="<?php echo $this->get_field_name('pause_slideshow'); ?>" />
			<label for="<?php echo $this->get_field_id('pause_slideshow'); ?>"><?php _e('Pause Slideshow on mouseover', 'swmtranslate') ?></label>		
		</p>

		<p>
			<input class="checkbox" type="checkbox" <?php checked($instance['smooth_height'], true) ?> id="<?php echo $this->get_field_id('smooth_height'); ?>" name="<?php echo $this->get_field_name('smooth_height'); ?>" />
			<label for="<?php echo $this->get_field_id('smooth_height'); ?>"><?php _e('Smooth Auto Height', 'swmtranslate') ?></label>		
		</p>

		<p>
			<input class="checkbox" type="checkbox" <?php checked($instance['display_navigation'], true) ?> id="<?php echo $this->get_field_id('display_navigation'); ?>" name="<?php echo $this->get_field_name('display_navigation'); ?>" />
			<label for="<?php echo $this->get_field_id('display_navigation'); ?>"><?php _e('Display Navigation Arrows', 'swmtranslate') ?></label>		
		</p>
		
		<hr />
		
		
		<?php	
	}
}	