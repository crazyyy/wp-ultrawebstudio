<?php 
header("Content-type: text/css; charset: UTF-8");
require_once( '../../../../wp-load.php' );

$swm_paragraph_font = of_get_option('swm_paragraph_font');
$swm_page_title_font = of_get_option('swm_page_title_font');
$swm_h1_heading_font = of_get_option('swm_h1_heading_font');
$swm_h2_heading_font = of_get_option('swm_h2_heading_font');
$swm_h3_heading_font = of_get_option('swm_h3_heading_font');
$swm_h4_heading_font = of_get_option('swm_h4_heading_font');
$swm_h5_heading_font = of_get_option('swm_h5_heading_font');
$swm_h6_heading_font = of_get_option('swm_h6_heading_font'); 

$swm_pf_excerpt_font_size = of_get_option('swm_pf_excerpt_fontsize'); 

$swm_large_footer_text = of_get_option('swm_large_footer_text');
$swm_blog_post_title_font = of_get_option('swm_blog_post_title_font');
$swm_small_footer_font = of_get_option('swm_small_footer_font');

$swm_custom_css = of_get_option('swm_custom_css');

// ========== common elements ========== 

if ($swm_paragraph_font != "") { 
	echo 'body, a, #sidebar,#sidebar a,#sidebar ul li,#sidebar .tweet .tweet_list li, #content a.pf_readmore_btn:hover,.query .tweet_list li,.reply a,#content .comment-text cite,#content .comment-text cite a,#content ul.ordered_list li span,ul.our_awards li sub,ul.our_awards li sub a,.services_icon_small h4 small,.services_icon_medium h4 small,.pricing_table ul li,.pricing_table ul li a,
.team_member h5 sub,#content .support_team p a,#content .testimonials_left h5 sub,.testimonials_left a,#content .blog_post h3 a:hover,.horizontal_menu,.horizontal_menu a,.horizontal_menu li a,.post_bottom_bg,.post_bottom_bg span a,blockquote div,#sidebar .testimonials_slider ul li .client_testimonials h5,#sidebar .testimonials_slider ul li .client_testimonials h5 sub,code,pre,#content .content_tweet > .tweet .tweet_list li,.promotion_box p sub { color:'.$swm_paragraph_font['color'].'; }
'; 
}  //end if

// ========== headings and paragraph ========== 

if ($swm_paragraph_font != "") { 
	echo '#content p {font-size:'.$swm_paragraph_font['size'].';}
'; }

if ($swm_page_title_font != "") { 
	echo '#inner_header h1 { color:'.$swm_page_title_font['color'].';font-size:'.$swm_page_title_font['size'].'; }
'; }

if ($swm_h1_heading_font != "") { 
	echo '#content h1,#content h1 a { color:'.$swm_h1_heading_font['color'].';font-size:'.$swm_h1_heading_font['size'].'; }
'; }

if ($swm_h2_heading_font != "") { 
	echo '#content h2,#content h2 a { color:'.$swm_h2_heading_font['color'].';font-size:'.$swm_h2_heading_font['size'].'; }
'; }

if ($swm_h3_heading_font != "") { 
	echo '#content h3,#content h3 a { color:'.$swm_h3_heading_font['color'].';font-size:'.$swm_h3_heading_font['size'].'; }
'; }

if ($swm_h4_heading_font != "") { 
	echo '#content h4,#content h4 a,.list_slider_title { color:'.$swm_h4_heading_font['color'].';font-size:'.$swm_h4_heading_font['size'].'; }
'; }

if ($swm_h5_heading_font != "") { 
	echo '#content h5,#content h5 a { color:'.$swm_h5_heading_font['color'].';font-size:'.$swm_h5_heading_font['size'].'; }
'; }

if ($swm_h6_heading_font != "") { 
	echo '#content h6,#content h6 a { font-size:'.$swm_h6_heading_font['size'].'; }
'; }

if ($swm_large_footer_text != "") { 
	echo '#footer ul li,.large-footer ul li a,.small-footer p,#footer .tagcloud a,#footer p,#footer a,#footer .my_toggle .my_toggle_title,#footer .my_tabs ul.tab-nav li a,#footer .tweet .tweet_list li, footer .query .tweet_list li,#footer .testimonials_slider ul li .client_testimonials h5 sub,#footer select { color:'.$swm_large_footer_text['color'].';font-size:'.$swm_large_footer_text['size'].'; }
'; }
  
if ($swm_blog_post_title_font != "") { 
	echo '#content .blog_post h3,#content .blog_post h3 a { color:'.$swm_blog_post_title_font['color'].';font-size:'.$swm_blog_post_title_font['size'].'; }
'; }
  
if ($swm_small_footer_font != "") { 
	echo '.small-footer,.small-footer p,.small-footer p a { color:'.$swm_small_footer_font['color'].';font-size:'.$swm_small_footer_font['size'].'; }
'; } 

// ========== Google font ========== 

$swm_google_font_name = of_get_option('swm_google_font_name');
$swm_google_font_weight = of_get_option('swm_google_font_weight');

echo '
h1, h2, h3, h4, h5, h6,.pf_quote, .post_bottom_bg span.post_button a,.reply a,.call_section,.recent_posts_list1_date,.fcb_title,.comment_author,#content .comment-text cite,#content .pf_box h3,.list_slider_title,.blog_post_date_comments,.blog_post_date_comments2,.caption.big_teal,ul.our_awards li,blockquote,.home_readmore,#content .promotion_box p,#content .steps_with_circle ol li span,.tbl-heading,.button.medium,.button.large,.button.xlarge,.slider_left p.title_text { font-family: "'.$swm_google_font_name.'", arial, verdana, tahoma; font-weight: '.$swm_google_font_weight.';}
';

echo '.pf_quote { font-weight:normal; } #content .pf_box h3 { font-weight:bold; font-family:arial, tahoma } #content .promotion_box p sub {font-weight:normal;}
';

echo '.small-footer .tm_social_media { background:none;}
';

// ========== page title borders ========== 

$swm_headings_bottom_border = of_get_option('swm_headings_bottom_border');


if ($swm_headings_bottom_border){
echo  '#content h1,#content h2,#content h3,#content h4,#content h5,#content h6,.list_slider_title { margin:0 0 15px 0; border-bottom: 1px solid #e2e2e2; padding-bottom: 12px; box-shadow:  0px 1px 0px #fff; }
#sidebar h1,#sidebar h2,#sidebar h3,#sidebar h4,#sidebar h5,#sidebar h6,#footer h1,#footer h2,#footer h3,#footer h4,#footer h5,#footer h6 { border-bottom: 0; box-shadow: none;}
#content h1.hideborder,#content h2.hideborder,#content h3.hideborder,#content h4.hideborder,#content h5.hideborder,#content h6.hideborder { padding:0; border:0; }
';
} //end if

// ========== custom css ========== 

if ($swm_custom_css != '') { 
	echo $swm_custom_css; 
}
 
?>