<?php global $swm_theme_options; ?>		

			<div class="clear"></div>
		</div> <!-- #content -->
	</div> <!-- #container -->



<?php

$swm_rev_home_display_type	= get_post_meta(get_the_id(), 'swm_rev_home_display_type', true);
$swm_img_header_home_display_type	= get_post_meta(get_the_id(), 'swm_img_header_home_display_type', true);
$swm_video_header_home_display_type	= get_post_meta(get_the_id(), 'swm_video_header_home_display_type', true);

if (is_page_template('template-home-slider.php')) {  ?>
	<div class="margin10"></div> <?php
} elseif (is_page_template('template-home-revolution-slider.php') && $swm_rev_home_display_type == 'rev_home_default') {  ?>
	<div class="margin10"></div> <?php
} elseif (is_page_template('template-home-image.php') && $swm_img_header_home_display_type == 'img_header_home_default') { ?>
	<div class="margin10"></div> <?php
} elseif (is_page_template('template-home-video.php') && $swm_video_header_home_display_type == 'video_header_home_default') { ?>
	<div class="margin10"></div> <?php
} else {  ?>
	<div class="container_shadow"></div> <?php
} ?>


</div> <!-- #container_main -->

<?php

$swm_on_off_large_footer 	= of_get_option('swm_on_off_large_footer');
$swm_on_off_small_footer 	= of_get_option('swm_on_off_small_footer');
$swm_scroll_to_top 			= of_get_option('swm_scroll_to_top');
$footer_margin = '';

if ( !$swm_on_off_small_footer ) {
	$footer_margin = 'style="margin-bottom:-18px"';
}

if (!is_404()) {

	if ( $swm_on_off_large_footer ) {

	?>

	<!-- ...................... Large Footer ...................... -->

	<div class="footer_border"></div>
	<div id="footer">
		<div class="footer_wrapper">
			<?php  swm_display_footer_column(); 

			if ( $swm_scroll_to_top ) {
			?>	
			<div class="go_top_arrow"><a href="#top" <?php echo $footer_margin; ?>></a></div>
			<?php
			}
			?>

			<div class="clear"></div>
		</div>
	</div>
		
	<!-- ...................... End Large Footer ...................... -->
	<?php

	}


} // end if !is_404

if ( $swm_on_off_small_footer ) {

?>
							
<!-- ...................... Small Footer ...................... -->

	
<div class="small_footer_border"></div>
<div class="small_footer">
	<div class="small_footer_wrapper">
		
		<?php swm_display_footer_menu(); ?>

		<p><?php echo do_shortcode(stripslashes(of_get_option('swm_footer_left_content'))); ?></p>


	<div class="clear"></div>
	</div>
</div>
	
			
<!-- ...................... End Small Footer ...................... -->	

<?php

}

if ( is_singular() ) wp_print_scripts( 'comment-reply' );
wp_footer(); ?>

</body>
</html>	