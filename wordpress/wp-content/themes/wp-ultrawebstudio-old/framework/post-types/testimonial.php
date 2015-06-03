<?php

/* ************************************************************************************** 
	Testimonials Post Type
************************************************************************************** */

add_action( 'init', 'swm_posttype_testimonials' );

	function swm_posttype_testimonials() {	
		$labels = array(
			'name' => __( 'Testimonials', 'swmtranslate'),
			'singular_name' => __( 'Testimonial' , 'swmtranslate'),
			'add_new' =>  __( 'Add New' , 'swmtranslate'),
			'add_new_item' => __('Add New testimonial', 'swmtranslate'),
			'edit_item' => __('Edit Testimonial', 'swmtranslate'),
			'new_item' => __('New Testimonial Item', 'swmtranslate'),
			'view_item' => __('View Testimonial Item', 'swmtranslate'),
			'search_items' => __('Search Testimonials', 'swmtranslate'),
			'not_found' =>  __('No testimonial items found', 'swmtranslate'),
			'not_found_in_trash' => __('No testimonial items found in Trash', 'swmtranslate'),
			'parent_item_colon' => ''
		);
		  
		$args = array(
			'labels' => $labels,
			'public' => true,
			'exclude_from_search' => false,
			'publicly_queryable' => true,
			'rewrite' => array('slug' => 'testimonials'),
			'show_ui' => true, 
			'query_var' => true,
			'capability_type' => 'post',
			'hierarchical' => false,		
			'menu_position' => null,
			'supports' => array('title','editor','thumbnail')
		); 
		  
		register_post_type(__( 'testimonials' , 'swmtranslate'),$args);	
		flush_rewrite_rules();
	}
	
/* ------------------------------------------------------------------------------ */
 
add_filter("manage_edit-testimonials_columns", "swm_posttype_testimonials_edit_columns"); 

	function swm_posttype_testimonials_edit_columns($columns){  
		$columns = array(  
			"cb" => "<input type=\"checkbox\" />",  
			"title" => __( 'Client Name' , 'swmtranslate'),
			"client-details" => __( 'Client Details' , 'swmtranslate'),
			"website-name" => __( 'Company or Website Name' , 'swmtranslate'),
			"website-url" => __( 'Website URL' , 'swmtranslate')
		); 
		return $columns;  
	} 
	
/* ------------------------------------------------------------------------------ */
	
add_action("manage_posts_custom_column",  "swm_posttype_testimonials_image_column");	
  
function swm_posttype_testimonials_image_column($column){  
	global $post;  
	switch ($column)  {
		
		case "title":  
			echo get_the_title();  
			break;
			
		case "client-details":
			if(get_post_meta($post->ID, "swm_client_details", true)){
				echo get_post_meta($post->ID, "swm_client_details", true);
			} else {echo '---';}
			break;
			
		case "website-name":
			if(get_post_meta($post->ID, "swm_website_title", true)){
				echo get_post_meta($post->ID, "swm_website_title", true);
			} else {echo '---';}
			break;
			
		case "website-url":
			if(get_post_meta($post->ID, "swm_website_url", true)){
				echo get_post_meta($post->ID, "swm_website_url", true);
			} else {echo '---';}
			break;
			
	}  
}

/* Edit "Featured Image" box text --------------------------------------------------- */

add_filter( 'gettext', 'testimonials_post_edit_change_text', 20, 3 );

function testimonials_post_edit_change_text( $translated_text, $text, $domain )
{
    if( ( is_testimonials_admin_page() ) ) {
        switch( $translated_text ) {
        case 'Featured Image' :
            $translated_text = __( 'Add Client Image', 'circle-carousel' );
        break;
        case 'Set Featured Image' :
            $translated_text = __( 'Set client image', 'circle-carousel' );
        break;
        case 'Set featured image' :
            $translated_text = __( 'Set client image', 'circle-carousel' );
        break;
        case 'Remove featured image' :
            $translated_text = __( 'Remove client image', 'circle-carousel' );
        break;
        }
    }
    return $translated_text;
}

function is_testimonials_admin_page()
{
    global $pagenow;

    if( $pagenow == 'post-new.php' ) {
        if( isset( $_GET['post_type'] ) && $_GET['post_type'] == 'testimonials' )
            return true;
    }

    if( $pagenow == 'post.php' ) {
        if( isset( $_GET['post'] ) && get_post_type( $_GET['post'] ) == 'testimonials' )
            return true;
    }
    return false;
}

if( defined( 'DOING_AJAX' ) && 'DOING_AJAX' ) {
    if( isset( $_POST['post_id'] ) && get_post_type( $_POST['post_id'] ) == 'testimonials' )
        return true;
}


/* ************************************************************************************** 
	Sort Testimonials
************************************************************************************** */

add_action('admin_menu', 'swm_testimonials_sort_order_page');

function swm_testimonials_sort_order_page() {
    
	$swm_sort_order_page_data = add_submenu_page('edit.php?post_type=testimonials', __('Sort Testimonials', 'swmtranslate'), __('Sort Testimonials', 'swmtranslate'), 'edit_posts', basename(__FILE__), 'swm_testimonials_sort_order_list'); 	
}

function swm_testimonials_sort_order_list() {
    $testimonials_items = new WP_Query('post_type=testimonials&posts_per_page=-1&orderby=menu_order&order=ASC');
?>
    <div class="wrap">
        <div id="icon-edit" class="icon32"><br /></div>
        <h2><?php _e('Sort Testimonials', 'swmtranslate'); ?></h2>
        <p><?php _e('Re-order testimonials items by drag up/down. The top testimonials item will be displayed first. ', 'swmtranslate'); ?></p>

        <ul id="swm_sort_items">
            <?php while( $testimonials_items->have_posts() ) : $testimonials_items->the_post(); ?>
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

add_action('wp_ajax_swm_sort_order', 'swm_save_testimonials_sort_order');

function swm_save_testimonials_sort_order() {
   
	global $wpdb;    
    $sort_order = explode(',', $_POST['order']);
    $counter = 0;
    
    foreach($sort_order as $testimonials_item_id) {
        $wpdb->update($wpdb->posts, array('menu_order' => $counter), array('ID' => $testimonials_item_id));
        $counter++;
    }
    die(1);
}