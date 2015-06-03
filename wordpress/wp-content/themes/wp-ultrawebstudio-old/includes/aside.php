<?php
/* Display Post Summery/Excerpt */					
			
$swm_show_excerpt = of_get_option('swm_show_excerpt');
$swm_excerpt_length = of_get_option('swm_excerpt_length');
?>
<div style="margin-top:-20px;">
<?php
the_content();							

?>
</div>