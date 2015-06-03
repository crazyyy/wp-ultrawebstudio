<?php

/* ************************************************************************************** 
	Portfolio Post Type
************************************************************************************** */

add_action( 'init', 'swm_posttype_portfolio' );

	function swm_posttype_portfolio() {	
		$labels = array(
			'name' => __( 'Portfolio', 'swmtranslate'),
			'singular_name' => __( 'Portfolio', 'swmtranslate'),
			'add_new' =>  __( 'Add New' , 'swmtranslate'),
			'add_new_item' => __('Add New Portfolio', 'swmtranslate'),
			'edit_item' => __('Edit Portfolio', 'swmtranslate'),
			'new_item' => __('New Portfolio Item', 'swmtranslate'),
			'view_item' => __('View Portfolio Item', 'swmtranslate'),
			'search_items' => __('Search Portfolio Items', 'swmtranslate'),
			'not_found' =>  __('No portfolio items found', 'swmtranslate'),
			'not_found_in_trash' => __('No portfolio items found in Trash', 'swmtranslate'),
			'parent_item_colon' => ''
		);
		  
		$args = array(
			'labels' => $labels,
			'public' => true,
			'exclude_from_search' => false,
			'publicly_queryable' => true,
			'rewrite' => array('slug' => 'portfolio'),
			'show_ui' => true, 
			'query_var' => true,
			'capability_type' => 'post',
			'hierarchical' => false,		
			'menu_position' => null,
			'supports' => array('title','editor','thumbnail','excerpt')
		); 
		  
		register_post_type(__( 'portfolio' , 'swmtranslate'),$args);	
		flush_rewrite_rules();
	}
	
/* ------------------------------------------------------------------------------ */	

add_action( 'init', 'swm_posttype_portfolio_taxonomies', 0 );

	function swm_posttype_portfolio_taxonomies(){
		
		register_taxonomy(__( "portfolio_category" , 'swmtranslate'), 
			array(__( "portfolio" , 'swmtranslate'),), 
			array(
				"hierarchical" => true, 
				"query_var" => true, 
				"label" => __( "Portfolio Categories" , 'swmtranslate'),
				"singular_label" => __( "Portfolio Categories" , 'swmtranslate'),
				"rewrite" => array(
					'slug' => 'portfolio_category', 
					'hierarchical' => true, 
					'with_front' => false )
			)); 
		flush_rewrite_rules();
	}
	
/* ------------------------------------------------------------------------------ */
 
add_filter("manage_edit-portfolio_columns", "swm_posttype_portfolio_edit_columns"); 

	function swm_posttype_portfolio_edit_columns($columns){  
		$columns = array(  
			"cb" => "<input type=\"checkbox\" />",  
			"title" => __( 'Portfolio Item Title' , 'swmtranslate'),			
			"Category" => __( 'Category' , 'swmtranslate'),			
			"Image" => __( 'Image' , 'swmtranslate'),
			'date' => __( 'Date', 'swmtranslate')
		); 
		return $columns;  
	} 
	
/* ------------------------------------------------------------------------------ */
	
add_action("manage_posts_custom_column",  "swm_posttype_portfolio_image_column");	
  
function swm_posttype_portfolio_image_column($column){  
	global $post;  
	switch ($column)  { 

		case 'Category':  
			echo wp_strip_all_tags( get_the_term_list($post->ID, 'portfolio_category', '', ', ',''));  
			break;		
			
		case 'Image':  
			echo get_the_post_thumbnail($post->ID, array(80,80));  
			break;
	}  
}

/* Edit "Featured Image" box text --------------------------------------------------- */

add_filter( 'gettext', 'portfolio_post_edit_change_text', 20, 3 );

function portfolio_post_edit_change_text( $translated_text, $text, $domain )
{
    if( ( is_portfolio_admin_page() ) ) {
        switch( $translated_text ) {
        case 'Featured Image' :
            $translated_text = __( 'Add Portfolio Image', 'circle-carousel' );
        break;
        case 'Set Featured Image' :
            $translated_text = __( 'Set portfolio image', 'circle-carousel' );
        break;
        case 'Set featured image' :
            $translated_text = __( 'Set portfolio image', 'circle-carousel' );
        break;
        case 'Remove featured image' :
            $translated_text = __( 'Remove portfolio image', 'circle-carousel' );
        break;
        }
    }
    return $translated_text;
}

function is_portfolio_admin_page()
{
    global $pagenow;

    if( $pagenow == 'post-new.php' ) {
        if( isset( $_GET['post_type'] ) && $_GET['post_type'] == 'portfolio' )
            return true;
    }

    if( $pagenow == 'post.php' ) {
        if( isset( $_GET['post'] ) && get_post_type( $_GET['post'] ) == 'portfolio' )
            return true;
    }
    return false;
}

if( defined( 'DOING_AJAX' ) && 'DOING_AJAX' ) {
    if( isset( $_POST['post_id'] ) && get_post_type( $_POST['post_id'] ) == 'portfolio' )
        return true;
}

/* ************************************************************************************** 
	Sort Portfolio Items
************************************************************************************** */

add_action('admin_menu', 'swm_portfolio_sort_order_page');

function swm_portfolio_sort_order_page() {
    
	$swm_sort_order_page_data = add_submenu_page('edit.php?post_type=portfolio', __('Sort Portfolio Items', 'swmtranslate'), __('Sort Portfolio Items', 'swmtranslate'), 'edit_posts', basename(__FILE__), 'swm_portfolio_sort_order_list'); 	
}

function swm_portfolio_sort_order_list() {
    $portfolio_items = new WP_Query('post_type=portfolio&posts_per_page=-1&orderby=menu_order&order=ASC');   
?>
    <div class="wrap">
        <div id="icon-edit" class="icon32"><br /></div>
        <h2><?php _e('Sort Portfolio Items', 'swmtranslate'); ?></h2>
        <p><?php _e('Re-order portfolio items by drag and drop.', 'swmtranslate'); ?></p>

        <ul id="swm_sort_items">
            <?php while( $portfolio_items->have_posts() ) : $portfolio_items->the_post(); 
               	
            	$postid = get_the_ID();
            	$thumb_img = wp_get_attachment_url(get_post_thumbnail_id($postid));

               	if( get_post_status() == 'publish' ) { ?>
                    <li id="<?php the_id(); ?>" class="menu-item portfolio-sort-items">
                        <dl class="menu-item-bar">
                            <dt class="menu-item-handle">
                                <?php 

                                if ($thumb_img) {
                                	echo '<span><img src="'.swm_resize($thumb_img, 102, 102, true,'c', false).'" alt="" /></span>';
                                }
                                ?>

                                <span><?php the_title(); ?></span>
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

add_action('wp_ajax_swm_sort_order', 'swm_save_portfolio_sort_order');

function swm_save_portfolio_sort_order() {
   
	global $wpdb;    
    $sort_order = explode(',', $_POST['order']);
    $counter = 0;
    
    foreach($sort_order as $portfolio_item_id) {
        $wpdb->update($wpdb->posts, array('menu_order' => $counter), array('ID' => $portfolio_item_id));
        $counter++;
    }
    die(1);
}