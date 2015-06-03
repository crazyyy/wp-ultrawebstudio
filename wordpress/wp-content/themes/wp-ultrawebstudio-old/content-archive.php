	<?php if (have_posts()) : ?>
		
			<?php $post = $posts[0]; 
			
			/* ----------------------------------------------------------------------------------
				Get Page Title
			---------------------------------------------------------------------------------- */
			
			if(get_query_var('author_name')) :
				$curauth = get_userdatabylogin(get_query_var('author_name'));
			else :
				$curauth = get_userdata(get_query_var('author'));
			endif;				
			
			/* ----------------------------------------------------------------------------------
				Get Posts list
			---------------------------------------------------------------------------------- */		
			
			get_template_part('loop', 'standard') 		
			 
			?>
			
		
	<?php endif; ?>	