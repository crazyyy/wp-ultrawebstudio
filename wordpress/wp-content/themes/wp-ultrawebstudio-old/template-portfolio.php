<?php
/*
Template Name: Portfolio Page
*/

get_header(); 

/* Get portfolio page options */
$items_per_page	= -1;

$swm_pf_display_type 			= get_post_meta(get_the_id(), 'swm_portfolio_page_type', true );
$pf_column 						= get_post_meta(get_the_id(), 'swm_pf_display_column', true );
$swm_pf_display_expert_category	= get_post_meta(get_the_id(), 'swm_pf_display_expert_category', true );
$swm_pf_title_text 				= get_post_meta(get_the_id(), 'swm_pf_title_text', true );
$swm_pf_item_title_link 		= get_post_meta(get_the_id(), 'swm_pf_item_title_link', true );
$items_per_page					= get_post_meta(get_the_id(), 'swm_pf_items_pagination', true );
$swm_show_portfolio_excerpt		= get_post_meta(get_the_id(), 'swm_show_pf_excerpt', true );
$swm_portfolio_excerpt_length	= get_post_meta(get_the_id(), 'swm_pf_excerpt_length', true );
$swm_onoff_prettyphoto 			= get_post_meta(get_the_id(), 'swm_onoff_pf_prettyphoto', true );
$swm_onoff_pf_hover_zoom_icon 	= get_post_meta(get_the_id(), 'swm_onoff_pf_hover_zoom_icon', true);
$swm_onoff_pf_hover_link_icon 	= get_post_meta(get_the_id(), 'swm_onoff_pf_hover_link_icon', true);
$swm_pf_items_link_text 		= get_post_meta(get_the_id(), 'swm_pf_items_link_text', true);
$swm_pf_items_custom_height		= get_post_meta(get_the_id(), 'swm_pf_items_custom_height', TRUE);

/* Exclude Portfolio Categories */

$terms = rwmb_meta( 'swm_exclude_pf_categories', 'type=taxonomy&taxonomy=portfolio_category' );

$cats  = array();
$excluce_pf_cats  = array();

foreach ( $terms as $term ){
   $cats[] .= sprintf( $term->slug);
}		
               
foreach ( $cats  as $cat ) {                     
	$catid = $wpdb->get_var("SELECT term_id FROM $wpdb->terms WHERE slug='$cat'");
	$excluce_pf_cats[] = $catid;
}

$swm_excluce_pf_cat_tabs = join(',', $excluce_pf_cats);
?>	

<?php 
/* get portfolio column to display */


$swm_pf_display_column = '';

switch ($pf_column) {
	case '2_Column_Portfolio':
		$swm_pf_display_column = 'pf_2col';
		break;

	case '3_Column_Portfolio':
		$swm_pf_display_column = 'pf_3col';
		break;

	default:
		$swm_pf_display_column = 'pf_4col';
		break;
}

// Portfolio Posts Query

$args = array(
	'post_type' => 'portfolio',
	'orderby'=>'menu_order',
	'order'     => 'ASC',
	'posts_per_page' => $items_per_page,
	'paged' => $paged,
	'type' => get_query_var('type'),
	'tax_query' => array(
		array(
			'taxonomy' => 'portfolio_category',
			'field' => 'id',
			'terms' => $excluce_pf_cats,
			'operator' => 'NOT IN',
			)
	) // end of tax_query
);

$query = new WP_Query( $args );

// Display Breadcrumbs

get_template_part( 'includes/breadcrumbs' );

// Classic Portfolio Navigation
	swm_display_portfolio_menu();	
	?><div class="clear"></div><?php

/* ************************************************************************************** 
	DISPLAY SORTABLE AND CLASSIC PORTFOLIOS
************************************************************************************** */

// Display Portfolio with Hover Text

if ($swm_pf_display_type == 'Classic_Portfolio_with_Hover_Text' || $swm_pf_display_type == 'Sortable_Portfolio_with_Hover_Text') {

?>
<div class="margin10"></div>  					
<div class="portfolio <?php echo $swm_pf_display_column; ?> pf_sort pfHover">
	<?php
		while ($query->have_posts()) : $query->the_post();
		$terms = get_the_terms( get_the_ID(), 'portfolio_category' );
		global $swm_pf_display_type;		
		$swm_pf_project_type  = get_post_meta( get_the_ID(), 'swm_portfolio_project_type', true );	
	?>

	<div class="<?php if($swm_pf_display_type == 'Sortable_Portfolio_with_Hover_Text') { foreach ($terms as $term) { echo strtolower(preg_replace('/\s+/', '-', $term->name)). ' '; } } ?> pf_box2 pf_isotope">
		<div class="pf_img">
			<div class="pf_overlay" >
				<?php swm_portfolio_thumb(); ?>	
				<div class="clear"></div>
				
				<div class="pf_details3">
					<div class="pf_details3_text">
						<?php 
						swm_portfolio_title(); 			                   
						swm_portfolio_excerpt(); 
						swm_portfolio_text_icons();?>						
					</div>
				</div>	
				
			</div>
		</div>		
	</div>
	<?php endwhile;	wp_reset_query(); ?>

</div> <!-- .portfolio -->

<?php
}

// Display Portfolio with Small Text

if ($swm_pf_display_type == 'Classic_Portfolio_with_Small_Text' || $swm_pf_display_type == 'Sortable_Portfolio_with_Small_Text') {

?>
 					
<div class="portfolio <?php echo $swm_pf_display_column; ?> pf_sort pfSmall">
	<?php
		while ($query->have_posts()) : $query->the_post(); 
		$terms = get_the_terms( get_the_ID(), 'portfolio_category' );
		global $swm_pf_display_type;	
	?>

	<div class="<?php if($swm_pf_display_type == 'Sortable_Portfolio_with_Small_Text') { foreach ($terms as $term) { echo strtolower(preg_replace('/\s+/', '-', $term->name)). ' '; } } ?> pf_box pf_isotope">				
		<div class="pf_img">
			<div class="fade-img2" data-lang="<?php swm_portfolio_hover_icon(); ?>" >
				<?php swm_portfolio_thumb(); ?>	
			</div>
		</div>
		<div class="pf_details1">				
			<?php 
			swm_portfolio_title(); 			                   
			swm_portfolio_excerpt(); 			
			?>	
		</div>
	</div>
	<?php endwhile;	wp_reset_query(); ?>

</div> <!-- .portfolio -->

<?php

}

// Display Portfolio with Large Text

if ($swm_pf_display_type == 'Classic_Portfolio_with_Large_Text' || $swm_pf_display_type == 'Sortable_Portfolio_with_Large_Text') {

?>
 					
<div class="portfolio <?php echo $swm_pf_display_column; ?> pf_sort pfLarge">
	<?php
		while ($query->have_posts()) : $query->the_post();	

		$terms = get_the_terms( get_the_ID(), 'portfolio_category' );
		global $swm_pf_display_type;

	?>

	<div class="<?php if($swm_pf_display_type == 'Sortable_Portfolio_with_Large_Text') { foreach ($terms as $term) { echo strtolower(preg_replace('/\s+/', '-', $term->name)). ' '; } } ?> pf_box pf_isotope">				
		<div class="pf_img">
			<div class="fade-img2" data-lang="<?php swm_portfolio_hover_icon(); ?>" >
				<?php swm_portfolio_thumb(); ?>	
			</div>
		</div>
		<div class="pf_details2">				
			<?php 
			swm_portfolio_title(); 
			swm_portfolio_excerpt();						
			
			if ($swm_pf_items_link_text) {
				?>		
				<p class="right"><a href="<?php the_permalink(); ?>" class="pf_readmore_btn"><?php echo $swm_pf_items_link_text; ?></a></p>
				<?php 
			} ?>
			<div class="clear"></div>
		</div>
	</div>
	<?php endwhile;	wp_reset_query(); ?>

</div> <!-- .portfolio -->

<?php
}
?>
				

<?php
/* portfolio pagination  */				
	swm_pagination($query->max_num_pages); 
?>

<?php 
	/* display page content below portfolio items */
	if (have_posts()) :
	while (have_posts()) : the_post();
	the_content('');
	endwhile;					
	endif;			

get_footer();