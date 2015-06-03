<?php 
$meta_quote = get_post_meta($post->ID, 'swm_meta_quote', TRUE); 
$meta_quote_source = get_post_meta($post->ID, 'swm_meta_quote_source', TRUE); 
$meta_quote_source_url = get_post_meta($post->ID, 'swm_meta_quote_source_url', TRUE); 
?>

<div class="pf_quote">
<i class="icon-quote-left"></i>
<p><a href="<?php the_permalink(); ?>" title=""><?php echo $meta_quote; ?></a></p>

	<?php
	if ($meta_quote_source != '') {
		if ($meta_quote_source_url != '') { ?>
		<span><a href="<?php echo $meta_quote_source_url; ?>"><?php echo $meta_quote_source; ?></a></span>	
		<?php } else { ?>	
		<span><?php echo $meta_quote_source; ?></span>
		
	<?php }
	}
	?> 
 <div class="clear"></div>
</div>