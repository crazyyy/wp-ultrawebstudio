<?php

/* ************************************************************************************** 
	FAQ Post Type
************************************************************************************** */

add_action( 'init', 'swm_posttype_faq' );

	function swm_posttype_faq() {	
		$labels = array(
			'name' => __( 'FAQs', 'swmtranslate'),
			'singular_name' => __( 'FAQ' , 'swmtranslate'),
			'add_new' => __('Add New FAQ', 'swmtranslate'),
			'add_new_item' => __('Add New FAQ', 'swmtranslate'),
			'edit_item' => __('Edit FAQ', 'swmtranslate'),
			'new_item' => __('New FAQ Item', 'swmtranslate'),
			'view_item' => __('View FAQ Item', 'swmtranslate'),
			'search_items' => __('Search FAQ', 'swmtranslate'),
			'not_found' =>  __('No FAQ items found', 'swmtranslate'),
			'not_found_in_trash' => __('No FAQ items found in Trash', 'swmtranslate'),
			'parent_item_colon' => ''
		);
		  
		$args = array(
			'labels' => $labels,
			'public' => true,
			'exclude_from_search' => false,
			'publicly_queryable' => true,
			'rewrite' => array('slug' => 'faq'),
			'show_ui' => true, 
			'query_var' => true,
			'capability_type' => 'post',
			'hierarchical' => false,		
			'menu_position' => null,
			'supports' => array('title','editor')
		); 
		  
		register_post_type( 'faq',$args);	
		flush_rewrite_rules();
	}
	
/* ------------------------------------------------------------------------------ */
 
add_filter("manage_edit-faq_columns", "swm_posttype_faq_edit_columns"); 

	function swm_posttype_faq_edit_columns($columns){  
		$columns = array(  
			"cb" => "<input type=\"checkbox\" />",  
			"title" => __( 'FAQs', 'swmtranslate')
			
		); 
		return $columns;  
	} 
	
/* ------------------------------------------------------------------------------ */
	
add_action("manage_posts_custom_column",  "swm_posttype_faq_image_column");	
  
function swm_posttype_faq_image_column($column){  
	global $post;  
	switch ($column)  {
		
		case 'title':  
			echo get_the_title();  
			break;	
			
	}  
}
/* ************************************************************************************** 
	Sort FAQs
************************************************************************************** */

add_action('admin_menu', 'swm_faq_sort_order_page');

function swm_faq_sort_order_page() {
    
	$swm_sort_order_page_data = add_submenu_page('edit.php?post_type=faq', __('Sort FAQs', 'swmtranslate'), __('Sort FAQs', 'swmtranslate'), 'edit_posts', basename(__FILE__), 'swm_faq_sort_order_list'); 	
}

function swm_faq_sort_order_list() {
    $faq_items = new WP_Query('post_type=faq&posts_per_page=-1&orderby=menu_order&order=ASC');
?>
    <div class="wrap">
        <div id="icon-edit" class="icon32"><br /></div>
        <h2><?php _e('Sort FAQs', 'swmtranslate'); ?></h2>
        <p><?php _e('Re-order FAQ items by drag up/down. The top FAQ item will be displayed first. ', 'swmtranslate'); ?></p>

        <ul id="swm_sort_items">
            <?php while( $faq_items->have_posts() ) : $faq_items->the_post(); ?>
                <?php if( get_post_status() == 'publish' ) { ?>
                    <li id="<?php the_id(); ?>" class="menu-item">
                        <dl class="menu-item-bar">
                            <dt class="menu-item-handle">
                                <span class="menu-item-title sortable-item-title"><?php the_title(); ?></span>
                            </dt>
                        </dl>
                        <ul class="menu-item-transport"></ul>
                    </li>
                <?php } ?>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
        </ul>
    </div>
<?php }

add_action('wp_ajax_swm_sort_order', 'swm_save_faq_sort_order');

function swm_save_faq_sort_order() {
   
	global $wpdb;    
    $sort_order = explode(',', $_POST['order']);
    $counter = 0;
    
    foreach($sort_order as $faq_item_id) {
        $wpdb->update($wpdb->posts, array('menu_order' => $counter), array('ID' => $faq_item_id));
        $counter++;
    }
    die(1);
}