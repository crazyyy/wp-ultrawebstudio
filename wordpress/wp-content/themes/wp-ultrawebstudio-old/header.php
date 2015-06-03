<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<!-- title -->
<title><?php bloginfo('name'); ?><?php wp_title(); ?></title>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />	
<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" />
<?php 
wp_head();
?>
</head>
<body <?php body_class(); ?>>
<?php 
$swm_inner_page_header 			= of_get_option('swm_inner_page_header');
$swm_logo_right_content 		= of_get_option('swm_logo_right_content'); 
$swm_rev_slider_display_type = '';


if (is_page_template('template-home-slider.php') || is_page_template('template-home-white-background.php') || is_page_template('template-home-image.php') || is_page_template('template-home-video.php') || is_page_template('template-home-revolution-slider.php')) {
	$header_bg_name = 'header_bg3';
} else {
	$header_bg_name = 'header_bg3_inner';
}

?>

<div id="header_bg1">
	<div id="header_bg2">
		<div id="<?php echo $header_bg_name; ?>">

			<div id="header">	

				<!-- logo - top menu -->
				<div id="logo-topmenu">
					<div class="logo" id="logo-img">
						<a href="<?php echo home_url(); ?>">
						<?php
						$logo = (of_get_option('swm_logo') <> '') ? esc_attr(of_get_option('swm_logo')) : get_template_directory_uri().'/framework/images/logo.png'; ?>
								<img src="<?php echo esc_url($logo); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>" />
						</a>
					</div>
					<div class="top-menu-border">
						<div class="top-menu">
							<?php swm_display_topmenu(); ?>
						</div> <!-- .top-menu -->	
						<div class="clear"></div>					
					</div>
					<div class="clear"></div>

				<?php 

				if (is_page_template('template-home-revolution-slider.php')) {

				$swm_rev_slider_display_type	= get_post_meta(get_the_id(), 'swm_rev_slider_display_type', true);
				$swm_rev_slider_shortcode 		= get_post_meta(get_the_id(), 'swm_rev_slider_shortcode', true);

				}

				if ( is_page_template('template-home-revolution-slider.php') && $swm_rev_slider_display_type == 'rev_fullwidth' ) { 

				?>
				</div> <!-- #header -->	

				<div class="margin60"></div>
				
				

				<?php
					echo do_shortcode( $swm_rev_slider_shortcode );
				} else {																
								
					if (is_page_template('template-home-slider.php') || is_page_template('template-home-white-background.php')) { 
						get_template_part( 'includes/sliders' );				
					}
					
					if (is_page_template('template-home-image.php')) { 
						get_template_part( 'includes/home-image' );				
					}
					
					if (is_page_template('template-home-video.php')) { 
						get_template_part( 'includes/home-video' );				
					}
					
					if (is_page_template('template-home-revolution-slider.php')) { ?>
						<div id="header_slider" class="slider_padding2">
							<div id="transparent_border">  <?php
								echo do_shortcode( $swm_rev_slider_shortcode ); ?>
							</div>
							<div class="clear"></div>	
						</div>
						<?php	
					}

					if (!is_front_page() || $swm_inner_page_header == true || is_home()){	
					
						if (!is_page_template('template-home-slider.php') && !is_page_template('template-home-white-background.php') && !is_page_template('template-home-image.php') && !is_page_template('template-home-video.php') && !is_page_template('template-home-revolution-slider.php')) { ?>				
							
							<!-- inner header section -->
							<div id="inner_header">
								<?php

								if (is_page())	{
									
									?><h1><?php the_title(); ?></h1><?php
								
								} else {
									
									?><h1><?php swm_get_inner_title(); ?></h1><?php
								}										

								swm_display_searchbox(); ?>

							<div class="clear"></div>
							</div> <!-- #inner_header -->						
						<?php 	

					 	}	 
					 }	

					 ?>
				<div class="clear"></div>

				<?php 

				} // if else template revolution fullwidth



			if ( $swm_rev_slider_display_type != 'rev_fullwidth' ) {
				?>
				</div> <!-- #header -->
			<?php 
				}
			?>

		</div> <!-- #header_bg3 -->
	</div> <!-- #header_bg2 -->
</div> <!-- #header_bg1 -->


<!-- ......................[ Container ]...................... -->

<?php

$swm_rev_home_display_type	= get_post_meta(get_the_id(), 'swm_rev_home_display_type', true);
$swm_img_header_home_display_type	= get_post_meta(get_the_id(), 'swm_img_header_home_display_type', true);
$swm_video_header_home_display_type	= get_post_meta(get_the_id(), 'swm_video_header_home_display_type', true);

if (is_page_template('template-home-slider.php')) {
	$container = 'container_home';
} elseif (is_page_template('template-home-revolution-slider.php') && $swm_rev_home_display_type == 'rev_home_default') {
	$container = 'container_home';
} elseif (is_page_template('template-home-image.php') && $swm_img_header_home_display_type == 'img_header_home_default') {
	$container = 'container_home';
} elseif (is_page_template('template-home-video.php') && $swm_video_header_home_display_type == 'video_header_home_default') {
	$container = 'container_home';
} else {
	$container = 'container';
} ?>

<div id="container_main">
	<div id="<?php echo $container; ?>">
		<div id="content">

				<?php 
				if (!is_page_template('template-portfolio.php') && !is_front_page()) {
					get_template_part( 'includes/breadcrumbs' );
				}
				?>

				<div class="clear"></div>
			