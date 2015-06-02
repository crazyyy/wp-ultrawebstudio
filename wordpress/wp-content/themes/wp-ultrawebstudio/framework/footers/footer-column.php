<?php 
 
function swm_display_footer_column() {
	
	$swm_get_footer_column = of_get_option('swm_footer_column'); 
	
	if ( $swm_get_footer_column == 'one-column') { ?>
		<div class="one_full"> <?php dynamic_sidebar('First Footer Widget Area') ?> </div>			
		
	<?php } elseif ($swm_get_footer_column == 'two-column') { ?>
		<div class="one_half"> <?php dynamic_sidebar('First Footer Widget Area') ?> </div>
		<div class="one_half last"> <?php dynamic_sidebar('Second Footer Widget Area') ?> </div>		
	
	<?php } elseif ($swm_get_footer_column == 'three-column') { ?>
		<div class="one_third"> <?php dynamic_sidebar('First Footer Widget Area') ?> </div>
		<div class="one_third"> <?php dynamic_sidebar('Second Footer Widget Area') ?> </div>
		<div class="one_third last"> <?php dynamic_sidebar('Third Footer Widget Area') ?> </div>		
		
	<?php } elseif ($swm_get_footer_column == 'four-column') { ?>
		<div class="one_fourth"> <?php dynamic_sidebar('First Footer Widget Area') ?> </div>
		<div class="one_fourth"> <?php dynamic_sidebar('Second Footer Widget Area') ?> </div>	
		<div class="one_fourth"> <?php dynamic_sidebar('Third Footer Widget Area') ?> </div>
		<div class="one_fourth last"> <?php dynamic_sidebar('Fourth Footer Widget Area') ?> </div>				
		
	<?php } elseif ($swm_get_footer_column == 'five-column') { ?>
		<div class="one_fifth"> <?php dynamic_sidebar('First Footer Widget Area') ?> </div>
		<div class="one_fifth"> <?php dynamic_sidebar('Second Footer Widget Area') ?> </div>
		<div class="one_fifth"> <?php dynamic_sidebar('Third Footer Widget Area') ?> </div>	
		<div class="one_fifth"> <?php dynamic_sidebar('Fourth Footer Widget Area') ?> </div>
		<div class="one_fifth last"> <?php dynamic_sidebar('Fifth Footer Widget Area') ?> </div>				
		
	<?php } elseif ($swm_get_footer_column == 'six-column') { ?>
		<div class="one_sixth"> <?php dynamic_sidebar('First Footer Widget Area') ?> </div>
		<div class="one_sixth"> <?php dynamic_sidebar('Second Footer Widget Area') ?> </div>
		<div class="one_sixth"> <?php dynamic_sidebar('Third Footer Widget Area') ?> </div>	
		<div class="one_sixth"> <?php dynamic_sidebar('Fourth Footer Widget Area') ?> </div>
		<div class="one_sixth"> <?php dynamic_sidebar('Fifth Footer Widget Area') ?> </div>
		<div class="one_sixth last"> <?php dynamic_sidebar('Sixth Footer Widget Area') ?> </div>	
    <?php } 
 }