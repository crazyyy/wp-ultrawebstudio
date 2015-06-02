<?php

/* ************************************************************************************** 
	Slider Post Type
************************************************************************************** */

add_action( 'init', 'swm_posttype_slider' );

	function swm_posttype_slider() {	
		$labels = array(
			'name' => __('Slider', 'swmtranslate'),
		    'singular_name' => __('Slider', 'swmtranslate'),	
			'add_new' => __('Add New Slide', 'swmtranslate'),
			'add_new_item' => __('Slide Caption Title', 'swmtranslate'),
			'edit_item' => __('Edit Slider', 'swmtranslate'),
			'new_item' => __('New Slide', 'swmtranslate'),
			'view_item' => __('View Slides', 'swmtranslate'),
			'search_items' => __('Search Slides', 'swmtranslate'),
			'not_found' =>  __('No slides found', 'swmtranslate'),
			'not_found_in_trash' => __('No slides found in Trash', 'swmtranslate'),
			'parent_item_colon' => ''
		);
		  
		$args = array(
			'labels' => $labels,
			'public' => true,
			'exclude_from_search' => false,
			'publicly_queryable' => true,
			'rewrite' => array('slug' => 'slider'),
			'show_ui' => true, 
			'query_var' => true,
			'capability_type' => 'post',
			'hierarchical' => false,		
			'menu_position' => null,
			'supports' => array('title','editor','thumbnail')
		); 
		  
		register_post_type('slider',$args);	
		flush_rewrite_rules();
	}
	
/* ------------------------------------------------------------------------------ */
 
add_filter("manage_edit-slider_columns", "swm_posttype_slider_edit_columns"); 

	function swm_posttype_slider_edit_columns($columns){  
		$columns = array(  
			"cb" => "<input type=\"checkbox\" />",  
			"title" => __( 'Slide Title' , 'swmtranslate'),
			"Category" => __( 'Category' , 'swmtranslate'),
			'slider-type' => __( 'Slider Type', 'swmtranslate'),
			//'slide-width' => __( 'Slide Width', 'swmtranslate'),		
			"Image" => __( 'Image' , 'swmtranslate'),
			'date' => __( 'Date', 'swmtranslate')
		); 
		return $columns;  
	} 

/* Slider Category ----------------------------------------------------------------- */

add_action( 'init', 'swm_posttype_slider_taxonomies', 0 );

function swm_posttype_slider_taxonomies(){
		
		register_taxonomy(__( "slider_category" , 'swmtranslate'), 
			array(__( "slider" , 'swmtranslate'),), 
			array(
				"hierarchical" => true, 
				"query_var" => true, 
				"label" => __( "Slider Categories" , 'swmtranslate'),
				"singular_label" => __( "Slider Categories" , 'swmtranslate'),
				"rewrite" => array(
					'slug' => 'slider_category', 
					'hierarchical' => true, 
					'with_front' => false )
			)); 
		flush_rewrite_rules();
	}
	
/* ------------------------------------------------------------------------------ */
	
add_action("manage_posts_custom_column",  "swm_posttype_slider_image_column");	
  
function swm_posttype_slider_image_column($column){  	

	global $post;  
	switch ($column)  {  		
			
		case 'Category':  
			echo wp_strip_all_tags( get_the_term_list($post->ID, 'slider_category', '', ', ',''));  
			break;

		case "slider-type":				
			$swm_slider_type = str_replace( '_', ' ', get_post_meta($post->ID, "swm_slider_type", true) );
			echo $swm_slider_type; 		
			break;		
	}  
}

/* Edit "Featured Image" box text --------------------------------------------------- */

add_filter( 'gettext', 'slider_post_edit_change_text', 20, 3 );

function slider_post_edit_change_text( $translated_text, $text, $domain )
{
    if( ( is_slider_admin_page() ) ) {
        switch( $translated_text ) {
        case 'Featured Image' :
            $translated_text = __( 'Add Slide Image', 'circle-carousel' );
        break;
        case 'Set Featured Image' :
            $translated_text = __( 'Set slide image', 'circle-carousel' );
        break;
        case 'Set featured image' :
            $translated_text = __( 'Set slide image', 'circle-carousel' );
        break;
        case 'Remove featured image' :
            $translated_text = __( 'Remove slide image', 'circle-carousel' );
        break;
        }
    }
    return $translated_text;
}

function is_slider_admin_page()
{
    global $pagenow;

    if( $pagenow == 'post-new.php' ) {
        if( isset( $_GET['post_type'] ) && $_GET['post_type'] == 'slider' )
            return true;
    }

    if( $pagenow == 'post.php' ) {
        if( isset( $_GET['post'] ) && get_post_type( $_GET['post'] ) == 'slider' )
            return true;
    }
    return false;
}

if( defined( 'DOING_AJAX' ) && 'DOING_AJAX' ) {
    if( isset( $_POST['post_id'] ) && get_post_type( $_POST['post_id'] ) == 'slider' )
        return true;
}


/* ************************************************************************************** 
	Sort Slider Items
************************************************************************************** */

add_action('admin_menu', 'swm_slider_sort_order_page');

function swm_slider_sort_order_page() {
    
	$swm_sort_order_page_data = add_submenu_page('edit.php?post_type=slider', __('Sort Slider Items', 'swmtranslate'), __('Sort Slider Items', 'swmtranslate'), 'edit_posts', basename(__FILE__), 'swm_slider_sort_order_list'); 	
}

function swm_slider_sort_order_list() {
    $slider_items = new WP_Query('post_type=slider&posts_per_page=-1&orderby=menu_order&order=ASC');
?>
    <div class="wrap">
        <div id="icon-edit" class="icon32 icon32-posts-gallery"><br /></div>
        <h2><?php _e('Sort Slider Items', 'swmtranslate'); ?></h2>
        <p><?php _e('Re-order slides by drag and drop.', 'swmtranslate'); ?></p>

        <ul id="swm_sort_items">
            <?php while( $slider_items->have_posts() ) : $slider_items->the_post(); 
               
            	$postid = get_the_ID();
            	$thumb_img = wp_get_attachment_url(get_post_thumbnail_id($postid));

            		$swm_slider_type = str_replace( '_', ' ', get_post_meta(get_the_id(), "swm_slider_type", true) );
               		if( get_post_status() == 'publish' ) { ?>
	                    <li id="<?php the_id(); ?>" class="menu-item portfolio-sort-items">
	                        <dl class="menu-item-bar">
	                            <dt class="menu-item-handle" style="text-align:center;">
	                                
	                                <?php 

	                                if ($thumb_img) {
	                                	echo '<span><img src="'.swm_resize($thumb_img, 102, 102, true,'c', false).'" alt="" /></span>';
	                                }
	                                ?>

	                                <span><?php the_title(); ?></span> <span style="font-size:11px; display:block; border-top:1px solid #ddd;  padding-top:5px; margin-top:5px;"><?php echo $swm_slider_type; ?></span>
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

add_action('wp_ajax_swm_sort_order', 'swm_save_slider_sort_order');

function swm_save_slider_sort_order() {
   
	global $wpdb;    
    $sort_order = explode(',', $_POST['order']);
    $counter = 0;
    
    foreach($sort_order as $slider_item_id) {
        $wpdb->update($wpdb->posts, array('menu_order' => $counter), array('ID' => $slider_item_id));
        $counter++;
    }
    die(1);
}