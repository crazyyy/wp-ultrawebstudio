<?php

class RT_Widget_Text extends WP_Widget {

    function __construct() {       
        $widget_ops = array('classname' => '', 'description' => __('Show Name, Email, Phone and Map','swmtranslate'));
        $control_ops = array('width' => 400, 'height' => 350);       
        parent::__construct('contact-info-widget', __('Widget - Contact Info','swmtranslate'), $widget_ops, $control_ops);
    }

    function widget( $args, $instance ) {
        extract($args);
        $title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
        $contact_address = apply_filters( 'widget_text', empty( $instance['contact_address'] ) ? '' : $instance['contact_address'], $instance );        
        $contact_phone = apply_filters( 'widget_text', empty( $instance['contact_phone'] ) ? '' : $instance['contact_phone'], $instance );
		$contact_email = !empty($instance['contact_email']) ? esc_attr($instance['contact_email']) : '' ;
		$contact_map = apply_filters( 'widget_text', empty( $instance['contact_map'] ) ? '' : $instance['contact_map'], $instance );		
		$contact_text = apply_filters( 'widget_text', empty( $instance['contact_text'] ) ? '' : $instance['contact_text'], $instance );
		
        echo $before_widget;
        if ( !empty( $title ) ) { echo $before_title . $title . $after_title; }

		if ( !empty( $contact_text ) ) { 
			echo '<div class="my_contact_text"><p>'.$contact_text.'</p></div>';				
		}

		echo '<div class="contact_info">';		

		if ( !empty( $contact_map ) ) { 
			echo '<div class="my_map">'.$contact_map.'</div>';				
		}	

		echo '<ul class="the_icons">';

		if ( !empty( $contact_address ) ) { 
			echo '<li class="icon-map-marker">'.$contact_address.'</li>';			
				
		}
		if ( !empty( $contact_phone ) ) { 
			echo '<li class="icon-phone">'.$contact_phone.'</li>';
		}
		if ( !empty( $contact_email ) ) { 
			echo '<li class="icon-envelope"><a href="mailto:'.$contact_email.'">'.$contact_email.'</a></li>';	
		}

		echo '</ul>';

		echo '</div>';		 
        
		echo $after_widget;
    }

    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['contact_email'] = esc_attr($new_instance['contact_email']);
        if ( current_user_can('unfiltered_html') ) {
            $instance['contact_address'] =  $new_instance['contact_address'];
            $instance['contact_phone'] =  $new_instance['contact_phone'];			
			$instance['contact_map'] =  $new_instance['contact_map'];
			$instance['contact_text'] =  $new_instance['contact_text'];
        } else {
            $instance['contact_address'] = stripslashes( wp_filter_post_kses( addslashes($new_instance['contact_address']) ) );
            $instance['contact_phone'] = stripslashes( wp_filter_post_kses( addslashes($new_instance['contact_phone']) ) );			
			$instance['contact_map'] = stripslashes( wp_filter_post_kses( addslashes($new_instance['contact_map']) ) );
			$instance['contact_text'] = stripslashes( wp_filter_post_kses( addslashes($new_instance['contact_text']) ) );
        } 		
        return $instance;
    }

    function form( $instance ) {
        $instance = wp_parse_args( (array) $instance, array( 
'title' => 'Contact Info', 
'contact_address' => '542 West Loop South,
Lipsum 520, NY 12345. ', 
'contact_phone' => '888 654 3210 ',
'contact_email' => 'info@domainname.com', 
'contact_text' => 'Lorem ipsum dolor sit amet, consectetur acing elit. Aenean non urna dolor aecena.', 
'contact_map' => '<iframe width="100" height="250" src="https://maps.google.co.in/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=+&amp;q=new+york&amp;ie=UTF8&amp;hq=&amp;hnear=New+York,+United+States&amp;t=m&amp;z=15&amp;ll=40.714353,-74.005973&amp;iwloc=near&amp;output=embed"></iframe>',
		) );
        $title = strip_tags($instance['title']);
        $contact_address = esc_textarea($instance['contact_address']);
        $contact_phone = esc_textarea($instance['contact_phone']);
		$contact_email = esc_attr($instance['contact_email']);
		$contact_map = esc_textarea($instance['contact_map']);			
		$contact_text = esc_textarea($instance['contact_text']);
		
?>
        <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'swmtranslate'); ?></label><br />
        <input style="width:99%;"  id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>

        
        <p><label for="<?php echo $this->get_field_id('contact_text'); ?>"><?php _e('Info description:', 'swmtranslate'); ?></label><br />
		<textarea  class="widefat" rows="10" cols="20" id="<?php echo $this->get_field_id('contact_text'); ?>" name="<?php echo $this->get_field_name('contact_text'); ?>"><?php echo $contact_text; ?></textarea></p>
		
		<p><label for="<?php echo $this->get_field_id('contact_map'); ?>"><?php _e('Google Map Embedded Code:', 'swmtranslate'); ?></label><br />
		<textarea  class="widefat" rows="10" cols="20" id="<?php echo $this->get_field_id('contact_map'); ?>" name="<?php echo $this->get_field_name('contact_map'); ?>"><?php echo $contact_map; ?></textarea></p>         
       
		<p><label for="<?php echo $this->get_field_id('contact_phone'); ?>"><?php _e('Phone:', 'swmtranslate'); ?></label><br />
		<textarea  class="widefat" rows="2" cols="20" id="<?php echo $this->get_field_id('contact_phone'); ?>" name="<?php echo $this->get_field_name('contact_phone'); ?>"><?php echo $contact_phone; ?></textarea></p>
		
		<p><label for="<?php echo $this->get_field_id('contact_email'); ?>"><?php _e('Email:', 'swmtranslate'); ?></label><br />
		<input style="width:99%;"  id="<?php echo $this->get_field_id('contact_email'); ?>" name="<?php echo $this->get_field_name('contact_email'); ?>" type="text" value="<?php echo esc_attr($contact_email); ?>" /></p>
		
		<p><label for="<?php echo $this->get_field_id('contact_address'); ?>"><?php _e('Address:', 'swmtranslate'); ?></label><br />
		<textarea  class="widefat" rows="2" cols="20" id="<?php echo $this->get_field_id('contact_address'); ?>" name="<?php echo $this->get_field_name('contact_address'); ?>"><?php echo $contact_address; ?></textarea></p>	
       
<?php
    }
}

add_action( 'widgets_init', create_function( '', 'register_widget( "RT_Widget_Text" );' ) );
