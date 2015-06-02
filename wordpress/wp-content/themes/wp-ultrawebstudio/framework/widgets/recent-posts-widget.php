<?php 
class SWM_Recent_Posts extends WP_Widget
{
    function SWM_Recent_Posts(){
		$widget_ops = array('description' => __('Display latest blog posts', 'swmtranslate'));	
		parent::WP_Widget('swm_recent_posts_wid',$name = __('Widget - Recent Posts', 'swmtranslate'),$widget_ops);
    }

  /* Displays the Widget in the front-end */
    function widget($args, $instance){
		extract($args);
		$title = apply_filters('widget_title', !empty($instance['title']) ? $instance['title'] : __('Recent Posts', 'swmtranslate') );
		$no_of_posts = !empty($instance['no_of_posts']) ? $instance['no_of_posts'] : '2' ;
		$readmore_btn = !empty($instance['readmore_btn']) ? $instance['readmore_btn'] : '' ;
		$add_category = !empty($instance['add_category']) ? $instance['add_category'] : '' ;	
		$blog_summery_text = !empty($instance['blog_summery_text']) ? $instance['blog_summery_text'] : 50 ;

		echo $before_widget;
		echo $before_title . $title . $after_title;		
		echo '<div class="sidebar-latest-news">';
		echo '<ul>';
		
		$cnt = 0;
		if($add_category != ""){
			$recentposts = get_posts('category='.$add_category.'&numberposts='.$no_of_posts.'&orderby=ASC');
		}else{
			$recentposts = get_posts('numberposts='.$no_of_posts.'&orderby=ASC');
		}
		
		foreach( $recentposts as $recentpost ) :
		
			/* get thumb image */
			$swm_featured_image = '';				
			$swm_featured_image = wp_get_attachment_url(get_post_thumbnail_id($recentpost->ID));					
			
			$image = swm_resize( $swm_featured_image, 53,53, true,'c', false );
			
			if ($swm_featured_image == "") { 
				$image = get_template_directory_uri()."/images/thumbs/tiny-image.png"; 
			}
			
			$format = get_post_format($recentpost); 
			
			/* display thumb images as per post format */
			if( $swm_featured_image == "" && $format == 'standard' ) { $image = get_template_directory_uri()."/images/thumbs/tiny-image.png"; }
			if( $swm_featured_image == "" && $format == 'video' ) { $image = get_template_directory_uri()."/images/thumbs/format-video.png"; }
			if( $swm_featured_image == "" && $format == 'image' ) { $image = get_template_directory_uri()."/images/thumbs/format-image.png"; }
			if( $swm_featured_image == "" && $format == 'gallery' ) { $image = get_template_directory_uri()."/images/thumbs/format-gallery.png"; }
			if( $swm_featured_image == "" && $format == 'audio' ) { $image = get_template_directory_uri()."/images/thumbs/format-audio.png"; }
			if( $swm_featured_image == "" && $format == 'link' ) { $image = get_template_directory_uri()."/images/thumbs/format-link.png"; }
			if( $swm_featured_image == "" && $format == 'quote' ) { $image = get_template_directory_uri()."/images/thumbs/format-quote.png"; }
			if( $swm_featured_image == "" && $format == 'aside' ) { $image = get_template_directory_uri()."/images/thumbs/format-aside.png"; }				
		
		if($cnt < $no_of_posts){
		?>
			<li>
				<div class="img_padding"><a href="<?php echo get_permalink( $recentpost->ID ); ?>" title="<?php echo $recentpost->post_title; ?>"> 
					<img src="<?php echo $image; ?>" alt="<?php echo $recentpost->post_title; ?>" />
				</a></div>
				
				<p><a href="<?php echo get_permalink( $recentpost->ID ); ?>" class="blog_title"><?php echo swm_short_title($recentpost->post_title,50); ?></a></p>
				<p class="blog_sum"><?php truncate_epost($recentpost->post_content,$blog_summery_text); ?></p>
				
				<?php if ($readmore_btn != '') { ?>
				
					<p><a href="<?php echo get_permalink( $recentpost->ID ); ?>" class="latest-news-read-more"><?php echo $readmore_btn; ?> &raquo;</a></p>

				<?php } ?>
				
				<div class="clear"></div>
			</li>			
			
			<?php
						
			$cnt++;
		}
		
		//wp_reset_postdata();
		wp_reset_query();
		endforeach;	
		echo '</ul>';
		echo '</div>';
		echo '<div class="clear"></div>';
		echo $after_widget;		
	}

  /*Saves the settings. */
    function update($new_instance, $old_instance){
		$instance = $old_instance;
		$instance['title'] = stripslashes($new_instance['title']);
		$instance['no_of_posts'] = stripslashes($new_instance['no_of_posts']);
		$instance['readmore_btn'] = stripslashes($new_instance['readmore_btn']);
		$instance['add_category'] = stripslashes($new_instance['add_category']);		
		$instance['blog_summery_text'] = stripslashes($new_instance['blog_summery_text']);

		return $instance;
	}
	
    function form($instance){
		//Defaults
		$instance = wp_parse_args( (array) $instance, array('title'=> __('Recent Posts', 'swmtranslate'), 'no_of_posts'=>'2','add_category'=>'','blog_summery_text'=>'50', 'readmore_btn'=> __('read more', 'swmtranslate')) );

		$title = htmlspecialchars($instance['title']);
		$no_of_posts = $instance['no_of_posts'];
		$readmore_btn = $instance['readmore_btn'];
		$add_category = $instance['add_category'];
		$blog_summery_text = $instance['blog_summery_text'];		
		
		echo '<p><label for="' . $this->get_field_id('title') . '">' . __('Widget Title:', 'swmtranslate') . '</label><input class="widefat" id="' . $this->get_field_id('title') . '" name="' . $this->get_field_name('title') . '" type="text" value="' . $title . '" /></p>';
		
		echo '<p><label for="' . $this->get_field_id('no_of_posts') . '">' . __('Number of Posts to Display:', 'swmtranslate') . '</label><input class="widefat" id="' . $this->get_field_id('no_of_posts') . '" name="' . $this->get_field_name('no_of_posts') . '" type="text" value="' . $no_of_posts . '" /></p>';

		echo '<p><label for="' . $this->get_field_id('blog_summery_text') . '">' . __('Number of Post Summery Characters:', 'swmtranslate') . '</label><input class="widefat" id="' . $this->get_field_id('blog_summery_text') . '" name="' . $this->get_field_name('blog_summery_text') . '" type="text" value="' . $blog_summery_text . '" /></p>';
		
		echo '<p><label for="' . $this->get_field_id('readmore_btn') . '">' . __('"Read more" Button Name:', 'swmtranslate') . '</label><input class="widefat" id="' . $this->get_field_id('readmore_btn') . '" name="' . $this->get_field_name('readmore_btn') . '" type="text" value="' . $readmore_btn . '" /></p>';	
		
		echo '<p><label for="' . $this->get_field_id('add_category') . '">' . __('Display Specific Categories:', 'swmtranslate') . '</label><input class="widefat" id="' . $this->get_field_id('add_category') . '" name="' . $this->get_field_name('add_category') . '" type="text" value="' . $add_category . '" /><br /><small>' . __('If you want to display specific category(ies) recent posts only, then add Category IDs with comma seperated (e.g. 1,2,3) or <strong>Leave it blank for default.</strong>', 'swmtranslate') . '</small></p>';	
		
	}
}

function SWM_Recent_Posts_Widget() {
  register_widget('SWM_Recent_Posts');
}
add_action('widgets_init', 'SWM_Recent_Posts_Widget');
?>