<?php

class Contact_Form_Widget extends WP_Widget {

    function __construct() {       
        $widget_ops = array('classname' => '', 'description' => __('Contact Form widget with name, email and comments field','swmtranslate'));            
        parent::__construct('contact-form-widget', __('Widget - Contact Form','swmtranslate'), $widget_ops);
    }

    function widget( $args, $instance ) {
        extract($args);
        $title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );          
		$contact_name = !empty($instance['contact_name']) ? esc_attr($instance['contact_name']) : '' ;
		$contact_email = !empty($instance['contact_email']) ? esc_attr($instance['contact_email']) : '' ;
		$contact_button = !empty($instance['contact_button']) ? esc_attr($instance['contact_button']) : '' ;
		$message_success = apply_filters( 'widget_text', empty( $instance['message_success'] ) ? '' : $instance['message_success'], $instance );	

		$nameError = '';
		$emailError = '';
		$commentError = '';
		$emailTo = of_get_option('swm_contact_form_email');					
		$subject = (of_get_option('swm_contact_form_subject') <> '') ? stripslashes(of_get_option('swm_contact_form_subject')) : 'Message from '.$name.'';					

		if(isset($_POST['submittedform'])) {
			
			/* name */
			if(trim($_POST['contactNameInput']) === '') {
				$nameError = 'Please enter your name.';
				$hasError = true;
			} else {
				$name = trim($_POST['contactNameInput']);
			}		
			
			/* email */
			if(trim($_POST['contactEmailInput']) == '')  {
					$emailError = 'Please enter your email address.';
					$hasError = true;
				} else if (!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", trim($_POST['contactEmailInput']))) {
					$emailError = 'You entered an invalid email address.';
					$hasError = true;
				} else {
					$contactEmailInput = trim($_POST['contactEmailInput']);
				}
			
			/* comments */
			if(trim($_POST['contactComments']) === '') {
				$commentError = 'Please enter a message.';
				$hasError = true;
			} else {
				if(function_exists('stripslashes')) {
					$contactComments = stripslashes(trim($_POST['contactComments']));
				} else {
					$contactComments = trim($_POST['contactComments']);
				}
			}
				
			if(!isset($hasError)) {
				
				if (!isset($emailTo) || ($emailTo == '') ){
					$emailTo = get_option('admin_email');
				}
				
				$body = "Name: $name \n\nEmail: $contactEmailInput \n\nComments: $contactComments";
				$headers = 'From: '.$name.' <'.$contactEmailInput.'>' . "\r\n" . 'Reply-To: ' . $contactEmailInput;
				
				mail($emailTo, $subject, $body, $headers);
				$emailSent = true;
			}			
		} 		
		
		echo $before_widget;		
		echo $before_title.$title.$after_title;		
		
		?> 		
			
		<div id="contact-form-widget">			
			
			<?php if(isset($emailSent) && $emailSent == true) { ?>

				<div class="contactform-success">
					<?php echo $message_success; ?>					
				</div>

			<?php } else { ?>		

				<?php if(isset($hasError) || isset($captchaError)) { ?>
					<p class="contactform-error"><?php _e('Sorry, an error occured.', 'swmtranslate') ?><p>
					<div class="clear"></div>
				<?php } ?>

				<form action="<?php the_permalink(); ?>" id="contactForm2" method="post">	
					
					<label for="contactNameInput"><?php echo $contact_name; ?></label>							
					<input type="text" name="contactNameInput" id="contactNameInput" value="<?php if(isset($_POST['contactNameInput'])) echo $_POST['contactNameInput'];?>" class="required widgetFormInput" tabindex="1" /><div class="clear"></div>
					<?php if($nameError != '') { ?>
						<span class="error"><?php echo $nameError; ?></span> 
					<?php } ?>								
					
					<label for="contactEmailInput"><?php echo $contact_email; ?></label>				
					<input type="text" name="contactEmailInput" id="contactEmailInput" value="<?php if(isset($_POST['contactEmailInput']))  echo $_POST['contactEmailInput'];?>" class="required email widgetFormInput" tabindex="2" /><div class="clear"></div>
					<?php if($emailError != '') { ?>
						<span class="error"><?php echo $emailError; ?></span>
					<?php } ?>				
											
					<textarea name="contactComments" id="commentsText" rows="2" cols="2" class="required widgetFormTextarea"><?php if(isset($_POST['contactComments'])) { if(function_exists('stripslashes')) { echo stripslashes($_POST['contactComments']); } else { echo $_POST['contactComments']; } } ?></textarea>
					<?php if($commentError != '') { ?>
						<span class="error"><?php echo $commentError; ?></span> 
					<?php } ?>
					<div class="clear"></div>
					
					<input type="hidden" name="submittedform" id="submittedform" value="true" />					
					
					<!-- <button type="submit" class="formButton"><span><?php //echo $contact_button; ?></span></button> -->
					
					<p class="formButton"><input name="submit" type="submit" id="submit" value="<?php echo $contact_button; ?>" /></p>
			
				</form>
			<?php } ?>	

		</div>	<!--End Form One Fourth -->			
				
	<?php		
		
    echo $after_widget;	
	
	}

    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);		
        $instance['contact_name'] =  $new_instance['contact_name'];
		$instance['contact_email'] =  $new_instance['contact_email'];
		$instance['contact_button'] =  $new_instance['contact_button'];
		
		if ( current_user_can('unfiltered_html') ) {           
			$instance['message_success'] =  $new_instance['message_success'];
        } else {            
			$instance['message_success'] = stripslashes( wp_filter_post_kses( addslashes($new_instance['message_success']) ) );
        } 
		
        return $instance;
    }

    function form( $instance ) {
		
		$head_phone_icon = SWM_THEME_DIR . '/images/samples/headphone.png';
		
        $instance = wp_parse_args( (array) $instance, array( 
'title' => 'Get in Touch', 
'contact_name' => 'Name',
'contact_email' => 'Email', 
'contact_button' => 'Submit',
'message_success' => 'Thank you, your email was sent successfully.',
		) );
        $title = strip_tags($instance['title']);
        $contact_name = $instance['contact_name'];
		$contact_email = $instance['contact_email'];
		$contact_button = $instance['contact_button'];
		$message_success = esc_textarea($instance['message_success']);	
		
?>
        <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'swmtranslate'); ?></label><br />
        <input style="width:99%;"  id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>		
		
		<p><label for="<?php echo $this->get_field_id('contact_name'); ?>"><?php _e('<strong>Name</strong> Field Label:', 'swmtranslate'); ?></label><br />
        <input style="width:99%;"  id="<?php echo $this->get_field_id('contact_name'); ?>" name="<?php echo $this->get_field_name('contact_name'); ?>" type="text" value="<?php echo esc_attr($contact_name); ?>" /></p>
		
		<p><label for="<?php echo $this->get_field_id('contact_email'); ?>"><?php _e('<strong>Email</strong> Field Label:', 'swmtranslate'); ?></label><br />
        <input style="width:99%;"  id="<?php echo $this->get_field_id('contact_email'); ?>" name="<?php echo $this->get_field_name('contact_email'); ?>" type="text" value="<?php echo esc_attr($contact_email); ?>" /></p>
		
		<p><label for="<?php echo $this->get_field_id('contact_button'); ?>"><?php _e('<strong>Submit</strong> Button Text:', 'swmtranslate'); ?></label><br />
        <input style="width:99%;"  id="<?php echo $this->get_field_id('contact_button'); ?>" name="<?php echo $this->get_field_name('contact_button'); ?>" type="text" value="<?php echo esc_attr($contact_button); ?>" /></p>

		<p><label for="<?php echo $this->get_field_id('message_success'); ?>"><?php _e('Thank You Message:', 'swmtranslate'); ?></label><br />
		<textarea  class="widefat" rows="10" cols="20" id="<?php echo $this->get_field_id('message_success'); ?>" name="<?php echo $this->get_field_name('message_success'); ?>"><?php echo $message_success; ?></textarea></p>			
       
<?php
    }
}


add_action( 'widgets_init', 'swm_contact_form_widget' );

function swm_contact_form_widget() {
	register_widget( 'Contact_Form_Widget' );
}