<?php 

/* Exclude Slider Categories */
global $wpdb;

$terms = rwmb_meta( 'exclude_slider_categories', 'type=taxonomy&taxonomy=slider_category' );
$cats  = array();
$excluce_cats  = array();
$count = '';

//get slider category names
foreach ( $terms as $term ){
   $cats[] .= sprintf( $term->slug);
}		
// get slider category ids                 
foreach ( $cats  as $cat ) {                     
	$catid = $wpdb->get_var("SELECT term_id FROM $wpdb->terms WHERE slug='$cat'");
	$excluce_cats[] = $catid;
}

$args = array(
	'post_type' => 'slider',
	'orderby'=>'menu_order',
	'order'     => 'ASC',
	'posts_per_page' => -1,
	'paged' => $paged,
	'type' => get_query_var('type'),
	'tax_query' => array(
		array(
				'taxonomy' => 'slider_category',
				'field' => 'id',
				'terms' => $excluce_cats,
				'operator' => 'NOT IN',
			)
	) // end of tax_query
);

$query = new WP_Query( $args );	

$swm_page_slider_type 		= get_post_meta($post->ID, 'swm_page_slider_type', TRUE);	
$swm_slider_autoplay		= get_post_meta($post->ID, 'swm_slider_autoplay', TRUE);
$swm_slider_easing			= get_post_meta($post->ID, 'swm_slider_easing', TRUE);
$swm_elastic_animation_type	= get_post_meta($post->ID, 'swm_elastic_animation_type', TRUE);
$swm_flex_animation_type 	= get_post_meta($post->ID, 'swm_flex_animation_type', TRUE);
$swm_slideshow_interval		= get_post_meta($post->ID, 'swm_slideshow_interval', TRUE);
$swm_slideshow_speed 		= get_post_meta($post->ID, 'swm_slideshow_speed', TRUE);
$swm_elastic_title_easing 	= get_post_meta($post->ID, 'swm_elastic_title_easing', TRUE);
$swm_elastic_title_speed 	= get_post_meta($post->ID, 'swm_elastic_title_speed', TRUE);
$swm_flex_direction 		= get_post_meta($post->ID, 'swm_flex_direction', TRUE);
$swm_flex_animation_loop	= get_post_meta($post->ID, 'swm_flex_animation_loop', TRUE);
$swm_flex_smooth_height		= get_post_meta($post->ID, 'swm_flex_smooth_height', TRUE);
$swm_flex_bullet_nav 		= get_post_meta($post->ID, 'swm_flex_bullet_nav', TRUE);
$swm_flex_arrow_nav 		= get_post_meta($post->ID, 'swm_flex_arrow_nav', TRUE);
$swm_flex_thumbnail_arrow_nav = get_post_meta($post->ID, 'swm_flex_thumbnail_arrow_nav', TRUE);
$swm_flex_mouseover 		= get_post_meta($post->ID, 'swm_flex_mouseover', TRUE);
$swm_flex_slider_video 		= get_post_meta($post->ID, 'swm_flex_slider_video', TRUE);

$swm_welcome_heading 		= get_post_meta($post->ID, 'swm_welcome_heading', TRUE);
$swm_welcome_sub_text 		= get_post_meta($post->ID, 'swm_welcome_sub_text', TRUE);
$swm_button1_text 			= get_post_meta($post->ID, 'swm_button1_text', TRUE);
$swm_button1_link 			= get_post_meta($post->ID, 'swm_button1_link', TRUE);
$swm_button2_text 			= get_post_meta($post->ID, 'swm_button2_text', TRUE);
$swm_button2_link 			= get_post_meta($post->ID, 'swm_button2_link', TRUE);

// Elastic Slider ####################################################

if ($swm_page_slider_type == 'Default_Slider') {

	?>
	<div id="header_slider_section">

		<div class="slider_left">
			<div class="header_text">
				<?php 
					if ($swm_welcome_heading) { ?>
						<p class="title_text"><?php echo $swm_welcome_heading; ?></p>
						<?php
					}

					if ($swm_welcome_sub_text) { ?>
				
						<p><?php echo $swm_welcome_sub_text; ?></p>
						
						<?php
					}
				?>
			</div>

			<div class="header_btn">
				<?php 
					if ($swm_button1_text) { ?>						
						<a href="<?php echo $swm_button1_link; ?>" class="button1"><?php echo $swm_button1_text; ?></a>
						<?php
					}

					if ($swm_button2_text) { ?>				
						<a href="<?php echo $swm_button2_link; ?>" class="button2"><?php echo $swm_button2_text; ?></a>						
						<?php
					}
				?>				
			</div>
		</div>

		<div id="swm_default_slider">
			<div class="flexslider swm_home_slider" data-slideAnimation="fade" data-autoSlide="true" data-autoSlideInterval="5000" data-arrowNavigation="true" >
				<ul class="slides">
					 <?php swm_slider_slides(); ?>
				</ul>
			</div>
		</div>		
		<div class="clear"></div>

	</div>

	<script type="text/javascript">
		(function ($) {	$(document).ready(function(){
			jQuery(".swm_home_slider").flexslider({
				animation: '<?php echo $swm_flex_animation_type; ?>',
				pauseOnAction: true,
				slideshow: <?php echo $swm_slider_autoplay; ?>,
				slideshowSpeed: <?php echo $swm_slideshow_interval; ?>,
				easing: '<?php echo $swm_slider_easing; ?>',
				direction: '<?php echo $swm_flex_direction; ?>',
				useCSS: false,
				animationLoop: <?php echo $swm_flex_animation_loop; ?>,
				smoothHeight: <?php echo $swm_flex_smooth_height; ?>,
				animationSpeed: <?php echo $swm_slideshow_speed; ?>,
				controlNav: false,
				directionNav: <?php echo $swm_flex_arrow_nav; ?>,
				pauseOnHover: <?php echo $swm_flex_mouseover; ?>,
				start: function(slider){
					$('body').removeClass('loading');
				}
			});
		}); })(jQuery);
		</script>

		
<?php
}

// Basic Slider ####################################################

if ($swm_page_slider_type == 'Basic_Slider') {		
		?>
		
		<div id="header_slider" class="slider_padding1">
			<div id="transparent_border">
				<div class="flexslider flexslider_basic">
					<ul class="slides">
           				 <?php swm_slider_slides(); ?>
           			</ul>
		       </div>
			</div>			
			<div class="clear"></div>
		</div> <!-- #header_slider -->

		<script type="text/javascript">
		(function ($) {	$(document).ready(function(){
			jQuery(".flexslider_basic").flexslider({
				animation: '<?php echo $swm_flex_animation_type; ?>',
				pauseOnAction: true,
				slideshow: <?php echo $swm_slider_autoplay; ?>,
				slideshowSpeed: <?php echo $swm_slideshow_interval; ?>,
				easing: '<?php echo $swm_slider_easing; ?>',
				direction: '<?php echo $swm_flex_direction; ?>',
				useCSS: false,
				animationLoop: <?php echo $swm_flex_animation_loop; ?>,
				smoothHeight: <?php echo $swm_flex_smooth_height; ?>,
				animationSpeed: <?php echo $swm_slideshow_speed; ?>,
				controlNav: <?php echo $swm_flex_bullet_nav; ?>,
				directionNav: <?php echo $swm_flex_arrow_nav; ?>,
				pauseOnHover: <?php echo $swm_flex_mouseover; ?>,
				start: function(slider){
					$('body').removeClass('loading');
				}
			});
		}); })(jQuery);
		</script>	
<?php
}

// Thumb Slider ####################################################

if ($swm_page_slider_type == 'Thumbnail_Slider') {
?>
	<div id="header_slider" class="slider_padding2">
		<div id="transparent_border">
			<div class="flexslider flexslider_basic">
				<ul class="slides">
	                 <?php swm_slider_slides(); ?>
	      		 </ul>
			</div>

			<div id="thumbnail_slider_wrapper">
				<div id="thumbnail_slider">
			        <div class="flexslider flex_thumbnails">
			          	<ul class="slides">
				            <?php   					
								while ($query->have_posts()) : $query->the_post();	

									$images = rwmb_meta( 'swm_slider_thumb_image', 'type=image' );									

								    if ( $images ) {
								  		foreach ( $images as $image ) {											   	
										   	$thumb = "{$image['url']}";
										    echo '<li><div class="active_slide_layer"></div><img src="'.swm_resize($thumb, 147,71,true,'c', false).'" alt="'.$title.'" /> </li>';
										}
								   	} else {
									    $title = get_the_title();
										$swm_thumb_image = wp_get_attachment_url(get_post_thumbnail_id($id));					
										$swm_slide_thumb_image = '<img src="'.swm_resize($swm_thumb_image, 147,71,true,'c', false).'" alt="'.$title.'" />';	
										?>
										<li>
										 	<div class="active_slide_layer"></div>
										 	<?php echo $swm_slide_thumb_image; ?>
				                        </li>
				                        <?php
			                    	} //end else	
									$count++;  							
								endwhile; wp_reset_query(); 
								?>
	           			</ul>
			        </div>
			    </div> <!-- #thumbnail slider -->
			</div>
						
		</div> <!-- #transparent_border -->				
		<div class="clear"></div>

	</div> <!-- #header_slider -->

	    <script type="text/javascript">
		(function ($) {	$(document).ready(function(){	
			jQuery('.flex_thumbnails').flexslider({
				animation: "slide",
				controlNav: false,
				directionNav: <?php echo $swm_flex_thumbnail_arrow_nav; ?>,
				animationLoop: true,
				slideshow: false,
				itemWidth: 152,
				itemMargin: 5,
				asNavFor: '.flexslider_basic',
				start: function(slider){
					jQuery('body').removeClass('loading');
				}
			});
			jQuery(".flexslider_basic").flexslider({
				animation: '<?php echo $swm_flex_animation_type; ?>',
				pauseOnAction: true,
				controlNav: false,
				slideshow: <?php echo $swm_slider_autoplay; ?>,
				slideshowSpeed: <?php echo $swm_slideshow_interval; ?>,
				easing: '<?php echo $swm_slider_easing; ?>',
				direction: '<?php echo $swm_flex_direction; ?>',
				useCSS: false,
				animationLoop: <?php echo $swm_flex_animation_loop; ?>,
				smoothHeight: <?php echo $swm_flex_smooth_height; ?>,
				animationSpeed: <?php echo $swm_slideshow_speed; ?>,
				directionNav: <?php echo $swm_flex_arrow_nav; ?>,
				pauseOnHover: <?php echo $swm_flex_mouseover; ?>,
				sync: ".flex_thumbnails",
				start: function(slider){
				jQuery('body').removeClass('loading');
				}
			});
		}); })(jQuery);
		</script>	
<?php
}

// Icon Slider ####################################################

if ($swm_page_slider_type == 'Icon_Slider') {
?>
<div id="header_slider" class="slider_padding2">
	<div id="transparent_border">
		<div class="flexslider flexslider_basic">
			<ul class="slides">
    			<?php swm_slider_slides(); ?>
			</ul>
		</div>

		<div id="icon_slider_wrapper">
			<div id="icon_title_slider">
		        <div class="flexslider flex_icon_title">
		        	<ul class="slides">
	            <?php   					
					while ($query->have_posts()) : $query->the_post();
					    
						    $title = get_the_title();							
							$swm_slide_icon_names = get_post_meta($post->ID, 'swm_slide_icon_names', TRUE);
							$swm_slide_icon_subtitle = get_post_meta($post->ID, 'swm_slide_icon_subtitle', TRUE);
							?>
							<li>
								<div class="icon_layer"><i class="<?php echo $swm_slide_icon_names; ?>"></i></div><div class="title_layer"><h3><?php echo $title; ?></h3><p><?php echo $swm_slide_icon_subtitle; ?></p></div>		 	
	                        </li>
	                        <?php
                    	 //end else	
						$count++;  							
					endwhile; wp_reset_query(); 
						?>
					</ul>	
	          </div>
		    </div>	
		</div>	<!-- #thumbnail_slider_wrapper -->

	</div> <!-- #transparent_border -->				
	<div class="clear"></div>

</div> <!-- #header_slider -->

	    <script type="text/javascript">
		(function ($) {	$(document).ready(function(){	
			jQuery('.flex_icon_title').flexslider({
		        animation: "slide",
		        controlNav: false,
		        directionNav: false, 
		        animationLoop: true,
		        slideshow: false,
		        itemWidth: 234,
		        itemMargin: 0,
		        asNavFor: '.flexslider_basic',
		        start: function(slider){
		            jQuery('body').removeClass('loading');
		          }
		      });

			jQuery(".flexslider_basic").flexslider({
				animation: '<?php echo $swm_flex_animation_type; ?>',
				pauseOnAction: true,
				controlNav: false,
				slideshow: <?php echo $swm_slider_autoplay; ?>,
				slideshowSpeed: <?php echo $swm_slideshow_interval; ?>,
				easing: '<?php echo $swm_slider_easing; ?>',
				direction: '<?php echo $swm_flex_direction; ?>',
				useCSS: false,
				animationLoop: <?php echo $swm_flex_animation_loop; ?>,
				smoothHeight: <?php echo $swm_flex_smooth_height; ?>,
				animationSpeed: <?php echo $swm_slideshow_speed; ?>,
				directionNav: <?php echo $swm_flex_arrow_nav; ?>,
				pauseOnHover: <?php echo $swm_flex_mouseover; ?>,
				sync: ".flex_icon_title",
				start: function(slider){
				jQuery('body').removeClass('loading');
				}
			});
		}); })(jQuery);

		</script>

	
<?php
}

?>