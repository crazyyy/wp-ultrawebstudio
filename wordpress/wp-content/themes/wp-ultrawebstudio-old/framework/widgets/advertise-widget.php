<?php 

function SWM_Advertise_Widget_Display() {
	register_widget('SWM_Advertise_Widget');
}

add_action('widgets_init', 'SWM_Advertise_Widget_Display');

class SWM_Advertise_Widget extends WP_Widget
{
    function SWM_Advertise_Widget(){
		$widget_ops = array('description' => __('Display advertise image with link, title tag and alt tag', 'swmtranslate'));
		$control_ops = array('width' => 450);
		parent::WP_Widget('swm_advertise_wid',$name=__('Widget - Advertise', 'swmtranslate'),$widget_ops,$control_ops);
	}

  /* Frond-end layout  */
    function widget($args, $instance){
		extract($args);
		
		$swm_widget_title = apply_filters( 'widget_title', !empty( $instance['title'] ) ? esc_html( $instance['title'] ) : ''  );			
		$open_new_window = isset($instance['open_new_window']) ? $instance['open_new_window'] : false;
		
		$adv_image_path[1] = !empty($instance['adv_image_one_path']) ? esc_url($instance['adv_image_one_path']) : '' ;
		$adv_image_url[1] = !empty($instance['adv_image_one_url']) ? esc_url($instance['adv_image_one_url']) : '' ;
		$adv_image_title_tag[1] = !empty($instance['adv_image_one_title_tag']) ? esc_attr($instance['adv_image_one_title_tag']) : '' ;
		$adv_image_alt_tag[1] = !empty($instance['adv_image_one_alt_tag']) ? esc_attr($instance['adv_image_one_alt_tag']) : '' ;
		
		$adv_image_path[2] = !empty($instance['adv_image_two_path']) ? esc_url($instance['adv_image_two_path']) : '' ;
		$adv_image_url[2] = !empty($instance['adv_image_two_url']) ? esc_url($instance['adv_image_two_url']) : '' ;
		$adv_image_title_tag[2] = !empty($instance['adv_image_two_title_tag']) ? esc_attr($instance['adv_image_two_title_tag']) : '' ;
		$adv_image_alt_tag[2] = !empty($instance['adv_image_two_alt_tag']) ? esc_attr($instance['adv_image_two_alt_tag']) : '' ;
		
		$adv_image_path[3] = !empty($instance['adv_image_three_path']) ? esc_url($instance['adv_image_three_path']) : '' ;
		$adv_image_url[3] = !empty($instance['adv_image_three_url']) ? esc_url($instance['adv_image_three_url']) : '' ;
		$adv_image_title_tag[3] = !empty($instance['adv_image_three_title_tag']) ? esc_attr($instance['adv_image_three_title_tag']) : '' ;
		$adv_image_alt_tag[3] = !empty($instance['adv_image_three_alt_tag']) ? esc_attr($instance['adv_image_three_alt_tag']) : '' ;
		
		$adv_image_path[4] = !empty($instance['adv_image_four_path']) ? esc_url($instance['adv_image_four_path']) : '' ;
		$adv_image_url[4] = !empty($instance['adv_image_four_url']) ? esc_url($instance['adv_image_four_url']) : '' ;
		$adv_image_title_tag[4] = !empty($instance['adv_image_four_title_tag']) ? esc_attr($instance['adv_image_four_title_tag']) : '' ;
		$adv_image_alt_tag[4] = !empty($instance['adv_image_four_alt_tag']) ? esc_attr($instance['adv_image_four_alt_tag']) : '' ;
		
		$adv_image_path[5] = !empty($instance['adv_image_five_path']) ? esc_url($instance['adv_image_five_path']) : '' ;
		$adv_image_url[5] = !empty($instance['adv_image_five_url']) ? esc_url($instance['adv_image_five_url']) : '' ;
		$adv_image_title_tag[5] = !empty($instance['adv_image_five_title_tag']) ? esc_attr($instance['adv_image_five_title_tag']) : '' ;
		$adv_image_alt_tag[5] = !empty($instance['adv_image_five_alt_tag']) ? esc_attr($instance['adv_image_five_alt_tag']) : '' ;
		
		$adv_image_path[6] = !empty($instance['adv_image_six_path']) ? esc_url($instance['adv_image_six_path']) : '' ;
		$adv_image_url[6] = !empty($instance['adv_image_six_url']) ? esc_url($instance['adv_image_six_url']) : '' ;
		$adv_image_title_tag[6] = !empty($instance['adv_image_six_title_tag']) ? esc_attr($instance['adv_image_six_title_tag']) : '' ;
		$adv_image_alt_tag[6] = !empty($instance['adv_image_six_alt_tag']) ? esc_attr($instance['adv_image_six_alt_tag']) : '' ;
		
		$adv_image_path[7] = !empty($instance['adv_image_seven_path']) ? esc_url($instance['adv_image_seven_path']) : '' ;
		$adv_image_url[7] = !empty($instance['adv_image_seven_url']) ? esc_url($instance['adv_image_seven_url']) : '' ;
		$adv_image_title_tag[7] = !empty($instance['adv_image_seven_title_tag']) ? esc_attr($instance['adv_image_seven_title_tag']) : '' ;
		$adv_image_alt_tag[7] = !empty($instance['adv_image_seven_alt_tag']) ? esc_attr($instance['adv_image_seven_alt_tag']) : '' ;
		
		$adv_image_path[8] = !empty($instance['adv_image_eight_path']) ? esc_url($instance['adv_image_eight_path']) : '' ;
		$adv_image_url[8] = !empty($instance['adv_image_eight_url']) ? esc_url($instance['adv_image_eight_url']) : '' ;
		$adv_image_title_tag[8] = !empty($instance['adv_image_eight_title_tag']) ? esc_attr($instance['adv_image_eight_title_tag']) : '' ;
		$adv_image_alt_tag[8] = !empty($instance['adv_image_eight_alt_tag']) ? esc_attr($instance['adv_image_eight_alt_tag']) : '' ;

		echo $before_widget;

		if ( $swm_widget_title )
		echo $before_title . $swm_widget_title . $after_title;
?>	
<div class="sidebar-advertise">
<ul>
<?php
for ($i = 1; $i <= 8; $i++ ) {
	if ($adv_image_path[$i] <> '') { ?>
		<li>
		<a href="<?php echo $adv_image_url[$i] ?>" <?php if ($open_new_window == 1) echo('target="_blank"') ?> >
		<img src="<?php echo $adv_image_path[$i]; ?>" alt="<?php echo $adv_image_title_tag[$i]; ?>" title="<?php echo $adv_image_alt_tag[$i]; ?>" />
		</a>
		</li>
<?php };
}
?>
</ul>
<div class="clear"></div>
</div>

<?php
		echo $after_widget;
	}
	/* Update new */
    function update($new_instance, $old_instance){
		$instance = $old_instance;
		
		$instance['title'] = stripslashes($new_instance['title']);		
		
		$instance['open_new_window'] = 0;		
		
		if ( isset($new_instance['open_new_window']) ) $instance['open_new_window'] = 1;
		
		$instance['adv_image_one_path'] = esc_url($new_instance['adv_image_one_path']);
		$instance['adv_image_one_url'] = esc_url($new_instance['adv_image_one_url']);
		$instance['adv_image_one_title_tag'] = esc_attr($new_instance['adv_image_one_title_tag']);
		$instance['adv_image_one_alt_tag'] = esc_attr($new_instance['adv_image_one_alt_tag']);
		
		$instance['adv_image_two_path'] = esc_url($new_instance['adv_image_two_path']);
		$instance['adv_image_two_url'] = esc_url($new_instance['adv_image_two_url']);
		$instance['adv_image_two_title_tag'] = esc_attr($new_instance['adv_image_two_title_tag']);
		$instance['adv_image_two_alt_tag'] = esc_attr($new_instance['adv_image_two_alt_tag']);
		
		$instance['adv_image_three_path'] = esc_url($new_instance['adv_image_three_path']);
		$instance['adv_image_three_url'] = esc_url($new_instance['adv_image_three_url']);
		$instance['adv_image_three_title_tag'] = esc_attr($new_instance['adv_image_three_title_tag']);
		$instance['adv_image_three_alt_tag'] = esc_attr($new_instance['adv_image_three_alt_tag']);
		
		$instance['adv_image_four_path'] = esc_url($new_instance['adv_image_four_path']);
		$instance['adv_image_four_url'] = esc_url($new_instance['adv_image_four_url']);
		$instance['adv_image_four_title_tag'] = esc_attr($new_instance['adv_image_four_title_tag']);
		$instance['adv_image_four_alt_tag'] = esc_attr($new_instance['adv_image_four_alt_tag']);
		
		$instance['adv_image_five_path'] = esc_url($new_instance['adv_image_five_path']);
		$instance['adv_image_five_url'] = esc_url($new_instance['adv_image_five_url']);
		$instance['adv_image_five_title_tag'] = esc_attr($new_instance['adv_image_five_title_tag']);
		$instance['adv_image_five_alt_tag'] = esc_attr($new_instance['adv_image_five_alt_tag']);
		
		$instance['adv_image_six_path'] = esc_url($new_instance['adv_image_six_path']);
		$instance['adv_image_six_url'] = esc_url($new_instance['adv_image_six_url']);
		$instance['adv_image_six_title_tag'] = esc_attr($new_instance['adv_image_six_title_tag']);
		$instance['adv_image_six_alt_tag'] = esc_attr($new_instance['adv_image_six_alt_tag']);
		
		$instance['adv_image_seven_path'] = esc_url($new_instance['adv_image_seven_path']);
		$instance['adv_image_seven_url'] = esc_url($new_instance['adv_image_seven_url']);
		$instance['adv_image_seven_title_tag'] = esc_attr($new_instance['adv_image_seven_title_tag']);
		$instance['adv_image_seven_alt_tag'] = esc_attr($new_instance['adv_image_seven_alt_tag']);
		
		$instance['adv_image_eight_path'] = esc_url($new_instance['adv_image_eight_path']);
		$instance['adv_image_eight_url'] = esc_url($new_instance['adv_image_eight_url']);
		$instance['adv_image_eight_title_tag'] = esc_attr($new_instance['adv_image_eight_title_tag']);
		$instance['adv_image_eight_alt_tag'] = esc_attr($new_instance['adv_image_eight_alt_tag']);

		return $instance;
	}
  
    function form($instance){
		/* Defaults display */
		$instance = wp_parse_args( (array) $instance, array(
			'title'=> __('Advertise', 'swmtranslate'), 			
			'open_new_window' => true, 			
			'adv_image_one_path'=>'', 
			'adv_image_one_url'=>'',
			'adv_image_one_title_tag'=>'', 
			'adv_image_one_alt_tag'=>'', 
			'adv_image_two_path'=>'', 
			'adv_image_two_url'=>'', 
			'adv_image_two_title_tag'=>'', 
			'adv_image_two_alt_tag'=>'',
			'adv_image_three_path'=>'', 
			'adv_image_three_url'=>'',
			'adv_image_three_title_tag'=>'', 
			'adv_image_three_alt_tag'=>'',
			'adv_image_four_path'=>'', 
			'adv_image_four_url'=>'',
			'adv_image_four_title_tag'=>'', 
			'adv_image_four_alt_tag'=>'',
			'adv_image_five_path'=>'', 
			'adv_image_five_url'=>'',
			'adv_image_five_title_tag'=>'', 
			'adv_image_five_alt_tag'=>'',
			'adv_image_six_path'=>'', 
			'adv_image_six_url'=>'',
			'adv_image_six_title_tag'=>'',
			'adv_image_six_alt_tag'=>'', 
			'adv_image_seven_path'=>'', 
			'adv_image_seven_url'=>'',
			'adv_image_seven_title_tag'=>'',
			'adv_image_seven_alt_tag'=>'',
			'adv_image_eight_path'=>'', 
			'adv_image_eight_url'=>'',
			'adv_image_eight_title_tag'=>'',
			'adv_image_eight_alt_tag'=>'') );

		$swm_widget_title = esc_html($instance['title']);
		$adv_image_path[1] = esc_url($instance['adv_image_one_path']);
		$adv_image_url[1] = esc_url($instance['adv_image_one_url']);
		$adv_image_title_tag[1] = esc_attr($instance['adv_image_one_title_tag']);
		$adv_image_alt_tag[1] = esc_attr($instance['adv_image_one_alt_tag']);
		
		$adv_image_path[2] = esc_url($instance['adv_image_two_path']);
		$adv_image_url[2] = esc_url($instance['adv_image_two_url']);
		$adv_image_title_tag[2] = esc_attr($instance['adv_image_two_title_tag']);
		$adv_image_alt_tag[2] = esc_attr($instance['adv_image_two_alt_tag']);
		
		$adv_image_path[3] = esc_url($instance['adv_image_three_path']);
		$adv_image_url[3] = esc_url($instance['adv_image_three_url']);
		$adv_image_title_tag[3] = esc_attr($instance['adv_image_three_title_tag']);
		$adv_image_alt_tag[3] = esc_attr($instance['adv_image_three_alt_tag']);
		
		$adv_image_path[4] = esc_url($instance['adv_image_four_path']);
		$adv_image_url[4] = esc_url($instance['adv_image_four_url']);
		$adv_image_title_tag[4] = esc_attr($instance['adv_image_four_title_tag']);
		$adv_image_alt_tag[4] = esc_attr($instance['adv_image_four_alt_tag']);
		
		$adv_image_path[5] = esc_url($instance['adv_image_five_path']);
		$adv_image_url[5] = esc_url($instance['adv_image_five_url']);
		$adv_image_title_tag[5] = esc_attr($instance['adv_image_five_title_tag']);
		$adv_image_alt_tag[5] = esc_attr($instance['adv_image_five_alt_tag']);
		
		$adv_image_path[6] = esc_url($instance['adv_image_six_path']);
		$adv_image_url[6] = esc_url($instance['adv_image_six_url']);
		$adv_image_title_tag[6] = esc_attr($instance['adv_image_six_title_tag']);
		$adv_image_alt_tag[6] = esc_attr($instance['adv_image_six_alt_tag']);
		
		$adv_image_path[7] = esc_url($instance['adv_image_seven_path']);
		$adv_image_url[7] = esc_url($instance['adv_image_seven_url']);
		$adv_image_title_tag[7] = esc_attr($instance['adv_image_seven_title_tag']);
		$adv_image_alt_tag[7] = esc_attr($instance['adv_image_seven_alt_tag']);
		
		$adv_image_path[8] = esc_url($instance['adv_image_eight_path']);
		$adv_image_url[8] = esc_url($instance['adv_image_eight_url']);
		$adv_image_title_tag[8] = esc_attr($instance['adv_image_eight_title_tag']);
		$adv_image_alt_tag[8] = esc_attr($instance['adv_image_eight_alt_tag']);

		/* Widget Title */
		
		echo '<p><label for="' . $this->get_field_id('title') . '">' . _e('Widget Title', 'swmtranslate') . '</label><input class="widefat" id="' . $this->get_field_id('title') . '" name="' . $this->get_field_name('title') . '" type="text" value="' . $swm_widget_title . '" /></p>'; 		
		
		
		echo __('<p><small><strong>Image size 100px x 100px</strong>.</small></p>', 'swmtranslate');
		
		
		/* Open in New Window */
		?>
		
		<input class="checkbox" type="checkbox" <?php checked($instance['open_new_window'], true) ?> id="<?php echo $this->get_field_id('open_new_window'); ?>" name="<?php echo $this->get_field_name('open_new_window'); ?>" />
		<label for="<?php echo $this->get_field_id('open_new_window'); ?>"><?php _e('Check this box if you want to open all advertise images links in a <strong>New Window</strong>.', 'swmtranslate') ?></label><br /><br />		
		
		<?php
		
		/* Advertise Image 1 */
		
		echo '<div class="swm_advertise_widget">';			
		echo '<div class="swm_advertise_widget_title">' . __('Advertise Image 1', 'swmtranslate') . '</div>';			
		echo '<p><label for="' . $this->get_field_id('adv_image_one_path') . '">' . __('Image Path:', 'swmtranslate') . '</label><input id="' . $this->get_field_id('adv_image_one_path') . '" name="' . $this->get_field_name('adv_image_one_path') . '" type="text" value="' . $adv_image_path[1] . '" /></p>';		
		echo '<p><label for="' . $this->get_field_id('adv_image_one_url') . '">' . __('Image Link URL:', 'swmtranslate') . '</label><input id="' . $this->get_field_id('adv_image_one_url') . '" name="' . $this->get_field_name('adv_image_one_url') . '" type="text" value="' . $adv_image_url[1] . '" /></p>';		
		echo '<p><label for="' . $this->get_field_id('adv_image_one_title_tag') . '">' . __('Image Title Tag:', 'swmtranslate') . '</label><input id="' . $this->get_field_id('adv_image_one_title_tag') . '" name="' . $this->get_field_name('adv_image_one_title_tag') . '" type="text" value="' . $adv_image_title_tag[1] . '" /></p>';		
		echo '<p><label for="' . $this->get_field_id('adv_image_two_alt_tag') . '">' . __('Image Alt Tag:', 'swmtranslate') . '</label><input id="' . $this->get_field_id('adv_image_two_alt_tag') . '" name="' . $this->get_field_name('adv_image_two_alt_tag') . '" type="text" value="' . $adv_image_alt_tag[1] . '" /></p>';		
		echo '<div class="clear"></div>';			
		echo '</div>';
		
		/* Advertise Image 2 */
		
		echo '<div class="swm_advertise_widget">';			
		echo '<div class="swm_advertise_widget_title">' . __('Advertise Image 2', 'swmtranslate') . '</div>';			
		echo '<p><label for="' . $this->get_field_id('adv_image_two_path') . '">' . __('Image Path:', 'swmtranslate') . '</label><input id="' . $this->get_field_id('adv_image_two_path') . '" name="' . $this->get_field_name('adv_image_two_path') . '" type="text" value="' . $adv_image_path[2] . '" /></p>';		
		echo '<p><label for="' . $this->get_field_id('adv_image_two_url') . '">' . __('Image Link URL:', 'swmtranslate') . '</label><input id="' . $this->get_field_id('adv_image_two_url') . '" name="' . $this->get_field_name('adv_image_two_url') . '" type="text" value="' . $adv_image_url[2] . '" /></p>';		
		echo '<p><label for="' . $this->get_field_id('adv_image_two_title_tag') . '">' . __('Image Title Tag:', 'swmtranslate') . '</label><input id="' . $this->get_field_id('adv_image_two_title_tag') . '" name="' . $this->get_field_name('adv_image_two_title_tag') . '" type="text" value="' . $adv_image_title_tag[2] . '" /></p>';		
		echo '<p><label for="' . $this->get_field_id('adv_image_one_alt_tag') . '">' . __('Image Alt Tag:', 'swmtranslate') . '</label><input id="' . $this->get_field_id('adv_image_one_alt_tag') . '" name="' . $this->get_field_name('adv_image_one_alt_tag') . '" type="text" value="' . $adv_image_alt_tag[2] . '" /></p>';		
		echo '<div class="clear"></div>';			
		echo '</div>';
		
		/* Advertise Image 3 */
		
		echo '<div class="swm_advertise_widget">';			
		echo '<div class="swm_advertise_widget_title">' . __('Advertise Image 3', 'swmtranslate') . '</div>';			
		echo '<p><label for="' . $this->get_field_id('adv_image_three_path') . '">' . __('Image Path:', 'swmtranslate') . '</label><input id="' . $this->get_field_id('adv_image_three_path') . '" name="' . $this->get_field_name('adv_image_three_path') . '" type="text" value="' . $adv_image_path[3] . '" /></p>';		
		echo '<p><label for="' . $this->get_field_id('adv_image_three_url') . '">' . __('Image Link URL:', 'swmtranslate') . '</label><input id="' . $this->get_field_id('adv_image_three_url') . '" name="' . $this->get_field_name('adv_image_three_url') . '" type="text" value="' . $adv_image_url[3] . '" /></p>';		
		echo '<p><label for="' . $this->get_field_id('adv_image_three_title_tag') . '">' . __('Image Title Tag:', 'swmtranslate') . '</label><input id="' . $this->get_field_id('adv_image_three_title_tag') . '" name="' . $this->get_field_name('adv_image_three_title_tag') . '" type="text" value="' . $adv_image_title_tag[3] . '" /></p>';		
		echo '<p><label for="' . $this->get_field_id('adv_image_three_alt_tag') . '">' . __('Image Alt Tag:', 'swmtranslate') . '</label><input id="' . $this->get_field_id('adv_image_three_alt_tag') . '" name="' . $this->get_field_name('adv_image_three_alt_tag') . '" type="text" value="' . $adv_image_alt_tag[3] . '" /></p>';		
		echo '<div class="clear"></div>';			
		echo '</div>';
		
		/* Advertise Image 4 */
		
		echo '<div class="swm_advertise_widget">';			
		echo '<div class="swm_advertise_widget_title">' . __('Advertise Image 4', 'swmtranslate') . '</div>';			
		echo '<p><label for="' . $this->get_field_id('adv_image_four_path') . '">' . __('Image Path:', 'swmtranslate') . '</label><input id="' . $this->get_field_id('adv_image_four_path') . '" name="' . $this->get_field_name('adv_image_four_path') . '" type="text" value="' . $adv_image_path[4] . '" /></p>';		
		echo '<p><label for="' . $this->get_field_id('adv_image_four_url') . '">' . __('Image Link URL:', 'swmtranslate') . '</label><input id="' . $this->get_field_id('adv_image_four_url') . '" name="' . $this->get_field_name('adv_image_four_url') . '" type="text" value="' . $adv_image_url[4] . '" /></p>';		
		echo '<p><label for="' . $this->get_field_id('adv_image_four_title_tag') . '">' . __('Image Title Tag:', 'swmtranslate') . '</label><input id="' . $this->get_field_id('adv_image_four_title_tag') . '" name="' . $this->get_field_name('adv_image_four_title_tag') . '" type="text" value="' . $adv_image_title_tag[4] . '" /></p>';		
		echo '<p><label for="' . $this->get_field_id('adv_image_four_alt_tag') . '">' . __('Image Alt Tag:', 'swmtranslate') . '</label><input id="' . $this->get_field_id('adv_image_four_alt_tag') . '" name="' . $this->get_field_name('adv_image_four_alt_tag') . '" type="text" value="' . $adv_image_alt_tag[4] . '" /></p>';		
		echo '<div class="clear"></div>';			
		echo '</div>';
		
		/* Advertise Image 5 */
		
		echo '<div class="swm_advertise_widget">';			
		echo '<div class="swm_advertise_widget_title">' . __('Advertise Image 5', 'swmtranslate') . '</div>';			
		echo '<p><label for="' . $this->get_field_id('adv_image_five_path') . '">' . __('Image Path:', 'swmtranslate') . '</label><input id="' . $this->get_field_id('adv_image_five_path') . '" name="' . $this->get_field_name('adv_image_five_path') . '" type="text" value="' . $adv_image_path[5] . '" /></p>';		
		echo '<p><label for="' . $this->get_field_id('adv_image_five_url') . '">' . __('Image Link URL:', 'swmtranslate') . '</label><input id="' . $this->get_field_id('adv_image_five_url') . '" name="' . $this->get_field_name('adv_image_five_url') . '" type="text" value="' . $adv_image_url[5] . '" /></p>';		
		echo '<p><label for="' . $this->get_field_id('adv_image_five_title_tag') . '">' . __('Image Title Tag:', 'swmtranslate') . '</label><input id="' . $this->get_field_id('adv_image_five_title_tag') . '" name="' . $this->get_field_name('adv_image_five_title_tag') . '" type="text" value="' . $adv_image_title_tag[5] . '" /></p>';		
		echo '<p><label for="' . $this->get_field_id('adv_image_five_alt_tag') . '">' . __('Image Alt Tag:', 'swmtranslate') . '</label><input id="' . $this->get_field_id('adv_image_five_alt_tag') . '" name="' . $this->get_field_name('adv_image_five_alt_tag') . '" type="text" value="' . $adv_image_alt_tag[5] . '" /></p>';		
		echo '<div class="clear"></div>';			
		echo '</div>';
		
		/* Advertise Image 6 */
		
		echo '<div class="swm_advertise_widget">';			
		echo '<div class="swm_advertise_widget_title">' . __('Advertise Image 6', 'swmtranslate') . '</div>';			
		echo '<p><label for="' . $this->get_field_id('adv_image_six_path') . '">' . __('Image Path:', 'swmtranslate') . '</label><input id="' . $this->get_field_id('adv_image_six_path') . '" name="' . $this->get_field_name('adv_image_six_path') . '" type="text" value="' . $adv_image_path[6] . '" /></p>';		
		echo '<p><label for="' . $this->get_field_id('adv_image_six_url') . '">' . __('Image Link URL:', 'swmtranslate') . '</label><input id="' . $this->get_field_id('adv_image_six_url') . '" name="' . $this->get_field_name('adv_image_six_url') . '" type="text" value="' . $adv_image_url[6] . '" /></p>';		
		echo '<p><label for="' . $this->get_field_id('adv_image_six_title_tag') . '">' . __('Image Title Tag:', 'swmtranslate') . '</label><input id="' . $this->get_field_id('adv_image_six_title_tag') . '" name="' . $this->get_field_name('adv_image_six_title_tag') . '" type="text" value="' . $adv_image_title_tag[6] . '" /></p>';		
		echo '<p><label for="' . $this->get_field_id('adv_image_six_alt_tag') . '">' . __('Image Alt Tag:', 'swmtranslate') . '</label><input id="' . $this->get_field_id('adv_image_six_alt_tag') . '" name="' . $this->get_field_name('adv_image_six_alt_tag') . '" type="text" value="' . $adv_image_alt_tag[6] . '" /></p>';		
		echo '<div class="clear"></div>';			
		echo '</div>';
		
		/* Advertise Image 7 */
		
		echo '<div class="swm_advertise_widget">';			
		echo '<div class="swm_advertise_widget_title">' . __('Advertise Image 7', 'swmtranslate') . '</div>';			
		echo '<p><label for="' . $this->get_field_id('adv_image_seven_path') . '">' . __('Image Path:', 'swmtranslate') . '</label><input id="' . $this->get_field_id('adv_image_seven_path') . '" name="' . $this->get_field_name('adv_image_seven_path') . '" type="text" value="' . $adv_image_path[7] . '" /></p>';		
		echo '<p><label for="' . $this->get_field_id('adv_image_seven_url') . '">' . __('Image Link URL:', 'swmtranslate') . '</label><input id="' . $this->get_field_id('adv_image_seven_url') . '" name="' . $this->get_field_name('adv_image_seven_url') . '" type="text" value="' . $adv_image_url[7] . '" /></p>';		
		echo '<p><label for="' . $this->get_field_id('adv_image_seven_title_tag') . '">' . __('Image Title Tag:', 'swmtranslate') . '</label><input id="' . $this->get_field_id('adv_image_seven_title_tag') . '" name="' . $this->get_field_name('adv_image_seven_title_tag') . '" type="text" value="' . $adv_image_title_tag[7] . '" /></p>';		
		echo '<p><label for="' . $this->get_field_id('adv_image_seven_alt_tag') . '">' . __('Image Alt Tag:', 'swmtranslate') . '</label><input id="' . $this->get_field_id('adv_image_seven_alt_tag') . '" name="' . $this->get_field_name('adv_image_seven_alt_tag') . '" type="text" value="' . $adv_image_alt_tag[7] . '" /></p>';		
		echo '<div class="clear"></div>';			
		echo '</div>';
		
		/* Advertise Image 8 */
		
		echo '<div class="swm_advertise_widget">';			
		echo '<div class="swm_advertise_widget_title">' . __('Advertise Image 8', 'swmtranslate') . '</div>';			
		echo '<p><label for="' . $this->get_field_id('adv_image_eight_path') . '">' . __('Image Path:', 'swmtranslate') . '</label><input id="' . $this->get_field_id('adv_image_eight_path') . '" name="' . $this->get_field_name('adv_image_eight_path') . '" type="text" value="' . $adv_image_path[8] . '" /></p>';		
		echo '<p><label for="' . $this->get_field_id('adv_image_eight_url') . '">' . __('Image Link URL:', 'swmtranslate') . '</label><input id="' . $this->get_field_id('adv_image_eight_url') . '" name="' . $this->get_field_name('adv_image_eight_url') . '" type="text" value="' . $adv_image_url[8] . '" /></p>';		
		echo '<p><label for="' . $this->get_field_id('adv_image_eight_title_tag') . '">' . __('Image Title Tag:', 'swmtranslate') . '</label><input id="' . $this->get_field_id('adv_image_eight_title_tag') . '" name="' . $this->get_field_name('adv_image_eight_title_tag') . '" type="text" value="' . $adv_image_title_tag[8] . '" /></p>';		
		echo '<p><label for="' . $this->get_field_id('adv_image_eight_alt_tag') . '">' . __('Image Alt Tag:', 'swmtranslate') . '</label><input id="' . $this->get_field_id('adv_image_eight_alt_tag') . '" name="' . $this->get_field_name('adv_image_eight_alt_tag') . '" type="text" value="' . $adv_image_alt_tag[8] . '" /></p>';		
		echo '<div class="clear"></div>';			
		echo '</div>';		
	}
}
?>