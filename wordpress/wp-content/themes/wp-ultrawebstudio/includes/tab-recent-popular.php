<?php
	
	$postid = get_the_ID();
	$title = get_the_title();
	
	$swm_featured_image = '';				
	$swm_featured_image = wp_get_attachment_url(get_post_thumbnail_id($postid));					
	
	$image = swm_resize( $swm_featured_image, 44,44, true,'c', false );	
	
	if ($swm_featured_image == "") { $image = get_template_directory_uri()."/images/thumbs/tiny-image2.png";	}	
	
	/* Display thumb images as per post format */
	$format = "";
	if(get_post_type() != 'post') 	{ $format = get_post_type(); }
	if(empty($format)) 				{ $format = get_post_format(); }
	if(empty($format)) 				{ $format = 'standard'; }
	
	if( $format == 'video' 	) 	{ $image = get_template_directory_uri()."/images/thumbs/format-video2.png"; }
	if( $format == 'audio' 	) 	{ $image = get_template_directory_uri()."/images/thumbs/format-audio2.png"; }
	if( $format == 'link' 	) 	{ $image = get_template_directory_uri()."/images/thumbs/format-link2.png"; }
	if( $format == 'quote' 	) 	{ $image = get_template_directory_uri()."/images/thumbs/format-quote2.png"; }
	if( $format == 'aside' 	) 	{ $image = get_template_directory_uri()."/images/thumbs/format-aside2.png"; } 
?>

<li class="<?php $format; ?>">
	<a href="<?php echo get_permalink( $post->ID ); ?>" title="<?php echo the_title(); ?>"> 
		<img src="<?php echo $image; ?>" alt="<?php echo $post->post_title; ?>" />
	</a>

	<p><a href="<?php echo get_permalink( $postid ); ?>" class="blog_title"><?php echo swm_short_title($title,50); ?></a>
	<span><?php the_time('F j, Y - g:i a') ?></span>
	</p>	
	
</li>