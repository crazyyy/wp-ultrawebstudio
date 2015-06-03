/* **************************************************************************************
	Upload Button
************************************************************************************** */

jQuery(document).ready(function() {

	jQuery('#swm_upload_title_icon_button').click(function() {
		
		window.send_to_editor = function(html) {
			
			imgurl = jQuery('img',html).attr('src');
			jQuery('#swm_header_title_icon').val(imgurl);
			tb_remove();
		};
		tb_show('', 'media-upload.php?post_id=1&amp;type=image&amp;TB_iframe=true');
		return false;
		
	});
});

/* **************************************************************************************
	Sort Portfolio Items
************************************************************************************** */

jQuery(document).ready(function($) {
    var swm_item_list = $('#swm_sort_items');
    
    swm_item_list.sortable({
        update: function(event, ui) {
            
            my_options = {
                url: ajaxurl,
                type: 'POST',
                async: true,
                cache: false,
                dataType: 'json',
                data:{
                    action: 'swm_sort_order',
                    order: swm_item_list.sortable('toArray').toString()
                },
                success: function(response) {
                    return;
                },
                error: function(xhr,textStatus,e) {
                    alert('There was an error saving the update.');
                    return;
                }
            };
            $.ajax(my_options);
        }
    });
});

/* **************************************************************************************
	Post Formats
************************************************************************************** */

(function ($) {	$(document).ready(function(){
 
	// meta boxes
	var m_faq = $( '#swm_faq_page' ),
		m_home_image = $( '#swm_home_page_image_header' ),
		m_home_video = $( '#swm_home_page_video_header' ),
		m_portfolio = $( '#swm_portfolio_page_image_header' ),
		m_testimonials = $( '#swm_testimonials_page' );
	
	function metabox_show_metaboxes() {
		var template = $( '#page_template' ).val();
		
		// remove by default
		m_faq.hide();
		m_home_image.hide();
		m_home_video.hide();
		m_portfolio.hide();
		m_testimonials.hide();
		
		//faq page
		if ( template == 'template-faq.php' ) {
			m_faq.show();
		}
		// home with image header
		else if ( template == 'template-home-image.php' ) {
			m_home_image.show();
		}
		// home with video header
		else if ( template == 'template-home-video.php' ) {
			m_home_video.show();
		}
		// portfolio page
		else if ( template == 'template-portfolio.php' ) {
			m_portfolio.show();
		}
		// testimonials page
		else if ( template == 'template-testimonials.php' ) {
			m_testimonials.show();
		}
		
	}
	
	// Fire the function immediately
	metabox_show_metaboxes();
	
	$( '#page_template' ).on( 'change', metabox_show_metaboxes );

}); })(jQuery);

/* **************************************************************************************
	Post Metabox Display as per Post Format
************************************************************************************** */

(function ($) {	$(document).ready(function(){
 
	// meta boxes
	var m_standard = $( '#swm-meta-box-standard' ),
		m_image = $( '#swm-meta-box-image' ),
		m_link = $( '#swm-meta-box-link' ),
		m_video = $( '#swm-meta-box-video' ),
		m_audio = $( '#swm-meta-box-audio' ),
		m_quote = $( '#swm-meta-box-quote' ),
		m_gallery = $( '#swm-meta-box-gallery' ),
		standard_onlick = $('#post-format-0'),
		image_onlick = $('#post-format-image'),
		link_onlick = $('#post-format-link'),
		video_onlick = $('#post-format-video'),
		audio_onlick = $('#post-format-audio'),
		quote_onlick = $('#post-format-quote'),
		gallery_onlick = $('#post-format-gallery');
		aside_onlick = $('#post-format-aside');
	
	function metabox_show_post_metaboxes() {
		var post_format = $( '#post-formats-select input' ).val();
		
		// remove by default
		m_image.css('display', 'none');
		m_link.css('display', 'none');
		m_audio.css('display', 'none');
		m_video.css('display', 'none');
		m_quote.css('display', 'none');
		m_gallery.css('display', 'none');
		m_standard.css('display', 'block');
		
		// standard
		if ( standard_onlick.is(':checked') ) {
			m_standard.css('display', 'block');
		}
		// aside
		if ( aside_onlick.is(':checked') ) {
			m_standard.css('display', 'none');
		}
		// image
		if ( image_onlick.is(':checked') ) {
			m_image.css('display', 'block');
			m_standard.css('display', 'none');
		}
		// link
		if ( link_onlick.is(':checked') ) {
			m_link.css('display', 'block');
			m_standard.css('display', 'none');
		}
		// video
		if ( video_onlick.is(':checked') ) {
			m_video.css('display', 'block');
			m_standard.css('display', 'none');
		}
		// audio
		if ( audio_onlick.is(':checked') ) {
			m_audio.css('display', 'block');
			m_standard.css('display', 'none');
		}
		// quote
		if ( quote_onlick.is(':checked') ) {
			m_quote.css('display', 'block');
			m_standard.css('display', 'none');
		}
		// gallery
		if ( gallery_onlick.is(':checked') ) {
			m_gallery.css('display', 'block');
			m_standard.css('display', 'none');
		}

	}

	// Fire the function immediately
	metabox_show_post_metaboxes();

	$( '#post-formats-select' ).on( 'change', metabox_show_post_metaboxes );

}); })(jQuery);

/* **************************************************************************************
	Page Options Display as per Page Template
************************************************************************************** */

(function ($) {	$(document).ready(function(){

	// meta boxes
	var m_faq = $( '#swm_faq_page' ),
		m_home_image = $( '#swm_home_page_image_header' ),
		m_home_video = $( '#swm_home_page_video_header' ),
		m_portfolio = $( '#swm_portfolio_page_image_header' ),
		m_testimonials = $( '#swm_testimonials_page' ),
		m_home_slider = $( '#swm-mb-theme-slider-options' );
		m_archives = $( '#swm_archives_page' );
		m_revolution = $( '#swm_home_page_revolution_slider' );

	function metabox_show_metaboxes() {
		var template = $( '#page_template' ).val();

		// remove by default
		m_faq.hide();
		m_home_image.hide();
		m_home_video.hide();
		m_portfolio.hide();
		m_testimonials.hide();
		m_home_slider.hide();
		m_archives.hide();
		m_revolution.hide();

		//faq page
		if ( template == 'template-faq.php' ) {
			m_faq.show();
		}
		// home with image header
		else if ( template == 'template-home-image.php' ) {
			m_home_image.show();
		}
		// home with video header
		else if ( template == 'template-home-video.php' ) {
			m_home_video.show();
		}
		// home with revolution slider
		else if ( template == 'template-home-revolution-slider.php' ) {
			m_revolution.show();
		}
		// portfolio page
		else if ( template == 'template-portfolio.php' ) {
			m_portfolio.show();
		}
		// testimonials page
		else if ( template == 'template-testimonials.php' ) {
			m_testimonials.show();
		}
		// home slider page
		else if ( template == 'template-home-slider.php' || template == 'template-home-white-background.php' ) {
			m_home_slider.show();
		}
		// archives
		else if ( template == 'template-archives.php' ) {
			m_archives.show();
		}
	}
	// Fire the function immediately
	metabox_show_metaboxes();
	$( '#page_template' ).on( 'change', metabox_show_metaboxes );

}); })(jQuery);

/***************************************************************
 * Select Dropdown
 ****************************************************************/

(function ($){
	$.fn.aselect = function (options) {
		var defaults = {};
		var options = $.extend(defaults, options);
		return this.each(function (){

		$(this).not('.jquery-aselect').each(function(){
			var width = parseInt(options.width) || $(this).outerWidth();
			$(this).attr('autocomplete', 'off').addClass('jquery-aselect')
			.wrap(
				$(document.createElement('div')).addClass('jquery-aselect-wrap').css({width: width})
			).before(
				$(document.createElement('span'))
				.addClass('jquery-aselect-selected-text').width(width).css('background-position-x',(width-250)+'px')
			).css({  });
		}).change(function(){
			var selectedText = $(this).find(':selected').text();
			$(this).prev().text(selectedText);
		}).trigger('change');
		});
};
})(jQuery);

jQuery(function (){jQuery('select.swm_admin_dropdown').aselect({width:'250px'});});
jQuery(function (){jQuery('select.swm_admin_dropdown_small').aselect({width:'80px'});});
jQuery(function (){jQuery('select.swm_metabox_dropdown').aselect({width:'395px'});});


/***************************************************************
 * Tooltip * http://onehackoranother.com/projects/jquery/tipsy/
 ****************************************************************/
 (function($) {
	$(function() {
    $('.tipDown').tipsy		({gravity: 'n'});
    $('.tipUp').tipsy		({gravity: 's'});
    $('.tipLeft').tipsy		({gravity: 'e'});
    $('.tipRight').tipsy	({gravity: 'w'});
	$('.tipForm').tipsy		({gravity: 's', trigger:'focus'});
  });

$.fn.tipsy=function(options){options=$.extend({},$.fn.tipsy.defaults,options);return this.each(function(){var opts=$.fn.tipsy.elementOptions(this,options);$(this).hover(function(){$.data(this,"cancel.tipsy",true);var tip=$.data(this,"active.tipsy");if(!tip){tip=$('<div class="tipsy"><div class="tipsy-inner"/></div>');tip.css({position:"absolute",zIndex:100000});$.data(this,"active.tipsy",tip);}if($(this).attr("title")||typeof($(this).attr("original-title"))!="string"){$(this).attr("original-title",$(this).attr("title")||"").removeAttr("title");}var title;if(typeof opts.title=="string"){title=$(this).attr(opts.title=="title"?"original-title":opts.title);}else{if(typeof opts.title=="function"){title=opts.title.call(this);}}tip.find(".tipsy-inner")[opts.html?"html":"text"](title||opts.fallback);var pos=$.extend({},$(this).offset(),{width:this.offsetWidth,height:this.offsetHeight});tip.get(0).className="tipsy";tip.remove().css({top:0,left:0,visibility:"hidden",display:"block"}).appendTo(document.body);var actualWidth=tip[0].offsetWidth,actualHeight=tip[0].offsetHeight;var gravity=(typeof opts.gravity=="function")?opts.gravity.call(this):opts.gravity;switch(gravity.charAt(0)){case"n":tip.css({top:pos.top+pos.height,left:pos.left+pos.width/2-actualWidth/2}).addClass("tipsy-north");break;case"s":tip.css({top:pos.top-actualHeight,left:pos.left+pos.width/2-actualWidth/2}).addClass("tipsy-south");break;case"e":tip.css({top:pos.top+pos.height/2-actualHeight/2,left:pos.left-actualWidth}).addClass("tipsy-east");break;case"w":tip.css({top:pos.top+pos.height/2-actualHeight/2,left:pos.left+pos.width}).addClass("tipsy-west");break;}if(opts.fade){tip.css({/* opacity:0, */display:"block",visibility:"visible"}).animate({opacity:1.0});}else{tip.css({visibility:"visible"});}},function(){$.data(this,"cancel.tipsy",false);var self=this;setTimeout(function(){if($.data(this,"cancel.tipsy")){return;}var tip=$.data(self,"active.tipsy");if(opts.fade){tip.stop().fadeOut(function(){$(this).remove();});}else{tip.remove();}},100);});});};$.fn.tipsy.elementOptions=function(ele,options){return $.metadata?$.extend({},options,$(ele).metadata()):options;};$.fn.tipsy.defaults={fade:true,fallback:"",gravity:"n",html:true,title:"title"};$.fn.tipsy.autoNS=function(){return $(this).offset().top>($(document).scrollTop()+$(window).height()/2)?"s":"n";};$.fn.tipsy.autoWE=function(){return $(this).offset().left>($(document).scrollLeft()+$(window).width()/2)?"e":"w";};})(jQuery);



/***************************************************************
 * Checkbox on-off
 ****************************************************************/

 (function($){
	$.fn.tzCheckbox = function(options){

		// Default On / Off labels:

		options = $.extend({
			labels : ['ON','OFF']
		},options);

		return this.each(function(){
			var originalCheckBox = $(this),
				labels = [];

			// Checking for the data-on / data-off HTML5 data attributes:
			if(originalCheckBox.data('on')){
				labels[0] = originalCheckBox.data('on');
				labels[1] = originalCheckBox.data('off');
			}
			else labels = options.labels;

			// Creating the new checkbox markup:
			var checkBox = $('<span>',{
				'class'	: 'tzCheckBox '+(this.checked?'checked':''),
				'html':	'<span class="tzCBContent">'+labels[this.checked?0:1]+
						'</span><span class="tzCBPart"></span>'
			});

			// Inserting the new checkbox, and hiding the original:
			checkBox.insertAfter(originalCheckBox.hide());

			checkBox.click(function(){
				checkBox.toggleClass('checked');

				var isChecked = checkBox.hasClass('checked');

				// Synchronizing the original checkbox:
				originalCheckBox.attr('checked',isChecked);
				checkBox.find('.tzCBContent').html(labels[isChecked?0:1]);
			});

			// Listening for changes on the original and affecting the new one:
			originalCheckBox.bind('change',function(){
				checkBox.click();
			});
		});
	};
})(jQuery);

jQuery(document).ready(function(){
	jQuery('input.checkbox_on_off').tzCheckbox({labels:['Enable','Disable']});
	jQuery('input.checkbox_on_off_metabox').tzCheckbox({labels:['Enable','Disable']});
});


/* **************************************************************************************
	Slider Post Options Display as per Slider Type
************************************************************************************** */

(function ($) {	$(document).ready(function(){

	// meta boxes
	var field_icon = $( '.swm_id_swm_slide_icon_names' ),
		field_icon_title = $( '.swm_id_swm_slide_icon_subtitle' ),
		field_thumbnail = $( '.swm_id_swm_slider_thumb_image' ),
		field_default_slider = $( '.swm_id_swm_caption_display,.swm_id_swm_caption_location,.swm_id_swm_flex_slider_video' );

	function metabox_slider_dropdown() {
		var slider_type = $( '#swm_slider_type' ).val();

		// remove by default	
		field_default_slider.hide();
		field_icon.hide();
		field_icon_title.hide();
		field_thumbnail.hide();

		// basic slider
		if ( slider_type == 'Basic_Slider' ) {
			field_icon.hide();
			field_thumbnail.show();
			field_default_slider.show();
		}
		// thumbnail slider
		else if ( slider_type == 'Thumbnail_Slider' ) {
			field_icon.hide();
			field_thumbnail.show();
			field_default_slider.show();
		}
		// icon slider
		else if ( slider_type == 'Icon_Slider' ) {
			field_icon.show();
			field_icon_title.show();
			field_thumbnail.hide();
			field_default_slider.show();
		}
	}

	// Fire the function immediately
	metabox_slider_dropdown();

	$( '#swm_slider_type' ).on( 'change', metabox_slider_dropdown );

}); })(jQuery);

/* **************************************************************************************
	Slider Page meta options Display as per Slider Type
************************************************************************************** */

(function ($) {	$(document).ready(function(){

	// meta boxes
	var default_slider_fields = $( '.swm_id_swm_elastic_animation_type,.swm_id_swm_elastic_title_easing,.swm_id_swm_elastic_title_speed,.swm_id_swm_welcome_heading,.swm_id_swm_welcome_sub_text,.swm_id_swm_button1_text,.swm_id_swm_button1_link,.swm_id_swm_button2_text,.swm_id_swm_button2_link' ),
		flex_slider_fields = $( '.swm_id_swm_flex_smooth_height' ),
		flex_basic_slider_fields = $( '.swm_id_swm_flex_bullet_nav' );
		flex_thumbnail_slider_fields = $( '.swm_id_swm_flex_thumbnail_arrow_nav' );

	function metabox_page_slider_dropdown() {
		var slider_type = $( '#swm_page_slider_type' ).val();

		// remove by default
		default_slider_fields.show();
		flex_slider_fields.hide();
		flex_basic_slider_fields.hide();
		flex_thumbnail_slider_fields.hide();

		// basic slider
		if ( slider_type == 'Basic_Slider' ) {
			default_slider_fields.hide();
			flex_slider_fields.show();
			flex_basic_slider_fields.show();
		}
		else if ( slider_type == 'Icon_Slider') {
			default_slider_fields.hide();
			flex_slider_fields.show();
			flex_basic_slider_fields.hide();
		}
		else if ( slider_type == 'Thumbnail_Slider') {
			default_slider_fields.hide();
			flex_slider_fields.show();
			flex_basic_slider_fields.hide();
			flex_thumbnail_slider_fields.show();
		}
	}
	// Fire the function immediately
	metabox_page_slider_dropdown();
	$( '#swm_page_slider_type' ).on( 'change', metabox_page_slider_dropdown );

}); })(jQuery);


/* **************************************************************************************
	Portfolio Page meta options Display as per Portfolio Type
************************************************************************************** */

(function ($) {	$(document).ready(function(){

	// meta boxes
	var pf_hover_text = $( '.swm_id_swm_onoff_pf_hover_zoom_icon,.swm_id_swm_onoff_pf_hover_link_icon' ),
		pf_large_text = $( '.swm_id_swm_pf_items_link_text' );

	function metabox_page_portfolio_dropdown() {
		var pf_type = $( '#swm_portfolio_page_type' ).val();

		// remove by default
		pf_hover_text.show();
		pf_large_text.hide();

		if ( pf_type == 'Classic_Portfolio_with_Small_Text' || pf_type == 'Sortable_Portfolio_with_Small_Text') {
			pf_hover_text.hide();
			pf_large_text.hide();
		}
		else if ( pf_type == 'Classic_Portfolio_with_Large_Text' || pf_type == 'Sortable_Portfolio_with_Large_Text') {
			pf_hover_text.hide();
			pf_large_text.show();
		}
	}
	// Fire the function immediately
	metabox_page_portfolio_dropdown();
	$( '#swm_portfolio_page_type' ).on( 'change', metabox_page_portfolio_dropdown );

}); })(jQuery);

/* **************************************************************************************
	Post Type Portfolio  meta options Display as per Project Type
************************************************************************************** */

(function ($) {	$(document).ready(function(){

	// meta boxes
	var project_image = $( '.swm_id_swm_portfolio_thumb_image' ),
		project_video = $( '.swm_id_swm_portfolio_video' );		

	function metabox_portfolio_project_dropdown() {
		var project_type = $( '#swm_portfolio_project_type' ).val();

		// remove by default
		project_image.show();
		project_video.hide();		

		if ( project_type == 'Video') {
			project_image.show();
			project_video.show();
		}		
	}
	// Fire the function immediately
	metabox_portfolio_project_dropdown();
	$( '#swm_portfolio_project_type' ).on( 'change', metabox_portfolio_project_dropdown );

}); })(jQuery);


/* **************************************************************************************
	Theme Options - light and dark layout  - font options
************************************************************************************** */

(function ($) {	$(document).ready(function(){

	// meta boxes
	var lightfonts = $( 'li a#swm_fonts_tab' ),
		darkfonts = $( 'li a#swm_dark_fonts_tab' );

	function swm_layout_color() {
		var layout_type = $( '#swm_layout_color' ).val();

		// remove by default
		lightfonts.parent().show();
		darkfonts.parent().hide();

		if ( layout_type == 'dark') {
			lightfonts.parent().hide();
			darkfonts.parent().show();
		}
	}
	// Fire the function immediately
	swm_layout_color();
	$( '#swm_layout_color' ).on( 'change', swm_layout_color );

}); })(jQuery);