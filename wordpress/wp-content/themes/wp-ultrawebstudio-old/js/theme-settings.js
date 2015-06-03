/* Index of this file

	(1) Image Hover fade effect
	(2) Tabs and Toggles Script
	(3) Hover Social Media Icons	
	(4) Animated Menu
	(5) Flickr Widget
	(6) Ordered List
	(7) Hide Info Boxes
	(8) Flex slider * - Post Format Gallery, Logo, Recent Projects etc.
	(9) Rotate Testimonials
	(10) Portfolio
	(11) Mobile menu
	(12) prettyPhoto media fix
	(13) Comment Form
	

*/

(function ($) {	$(document).ready(function(){
// Do not delete above line
/****************************************************************/
/****************************************************************/

jQuery("a[data-rel^='prettyPhoto']").prettyPhoto();
jQuery('.fitVids').fitVids();
jQuery('.fluid-video').fitVids();
jQuery("#contactForm").validate();
jQuery("#contactForm2").validate();

/***************************************************************
* (1) Image Hover fade effect *
****************************************************************/

$(document).ready(function(){

	$(".fade-img").show();
	$(".fade-img img").fadeTo('normal', 1, function() {
		$get_id = $(this).parent().parent().attr("data-lang");
		if($get_id !== ""){
			$(this).parent().parent().addClass($get_id);
			$(this).hover(function(){
				$(this).fadeTo('normal', 0.2);
			}, function() {
					$(this).fadeTo('normal', 1);
			});
		}
	});

	$(".fade-img2").show();
	$(".fade-img2 img").fadeTo('fast', 1.0, function() {
		$get_id = $(this).parent().parent().attr("data-lang");
		if($get_id !== ""){
			$(this).parent().parent().addClass($get_id);
			$(this).hover(function(){
				$(this).fadeTo('fast', 0.1);
			}, function() {
					$(this).fadeTo('fast', 1.0);
			});
		}
	});

	$(".fade-img3").show();
	$(".fade-img3").fadeTo('normal', 1, function() {
		$get_id = $(this).parent().parent().attr("a");
		if($get_id !== ""){
			$(this).parent().parent().addClass($get_id);
			$(this).hover(function(){
				$(this).fadeTo('normal', 0.7);
			}, function() {
					$(this).fadeTo('normal', 1);
			});
		}
	});

	$(".flexslider .slides > li .tm_hover").fadeTo("normal", 0);
	$(".flexslider .slides > li .tm_hover").hover(function(){
	$(this).stop().fadeTo("normal", 1.0);
	},function(){
	$(this).stop().fadeTo("normal", 0);
	});

	$(".my_tab_style1").tabs({ fx: { opacity: 'show' } });
	$(".my_tab_style2").tabs({ event: "mouseover" });

});

/***************************************************************
* (2) Tabs and Toggles Script *
****************************************************************/


$(".toggle_box").each( function () {
	if($(this).attr('data-id') == 'closed') {
		$(this).accordion({ header: '.toggle_box_title', collapsible: true, active: false  });
	} else {
		$(this).accordion({ header: '.toggle_box_title', collapsible: true});
	}
});

$(".toggle_icon").each( function () {
	if($(this).attr('data-id') == 'closed') {
		$(this).accordion({ header: '.toggle_icon_title', collapsible: true, active: false  });
	} else {
		$(this).accordion({ header: '.toggle_icon_title', collapsible: true});
	}
});

/***************************************************************
* (3) Hover Social Media Icons *
****************************************************************/

$(".social-icons ul li,.sm_icons ul li").fadeTo("normal", 0.4);
	$(".social-icons ul li,.sm_icons ul li").hover(function(){
		$(this).stop().fadeTo("normal", 1);
	},function(){
		$(this).stop().fadeTo("normal", 0.4);
	});

/***************************************************************
* (4) Animated Menu *
****************************************************************/

$("#sti-menu").each(function(){
	var $this				= $(this),
		hoverMenuBg			= $this.attr("data-hoverMenuBg") || '#ee7e2c',
		defaultBg			= $this.attr("data-defaultBg") || '#ffffff',
		defaultText			= $this.attr("data-defaultText") || '#313131',
		defaultIconColor	= $this.attr("data-defaultIcon") || '#ee7e2c';

	$(this).iconmenu({
		boxAnimSpeed		: 300,
		defaultTextColor	: defaultText,
		defaultBgHoverColor	: hoverMenuBg,
		defaultBgColor		: defaultBg,
		defaultIconColor	: defaultIconColor
	});

});

/***************************************************************
* (5) Flickr Widget *
****************************************************************/

// Flickr Widget
var flickrId = $(".flickr_photos").attr("data-flickr-id") || '90291761@N02',
	flickrDisplayPhotos = parseInt($(".flickr_photos").attr("data-display-photos") || 6);

$(".flickr_photos").append('<ul id="cbox" class="thumbs ">');

$('#cbox').jflickrfeed({
	limit	: flickrDisplayPhotos,
	qstrings: {
		id: flickrId  // replace example flickr id with your flickr id
	},
	itemTemplate: '<li>'+'<a href="{{link}}" title="{{title}}">' + '<img src="{{image_s}}" alt="{{title}}" />' + '</a>' + '</li>'
});

// Flickr Content area
var flickrId2 = $(".flickr_photos2").attr("data-flickr-id2") || '90291761@N02',
	flickrDisplayPhotos2 = parseInt($(".flickr_photos2").attr("data-display-photos2") || 6);

$(".flickr_photos2").append('<ul id="cbox2" class="thumbs ">');

$('#cbox2').jflickrfeed({
	limit	: flickrDisplayPhotos2,
	qstrings: {
		id: flickrId2  // replace example flickr id with your flickr id
	},
	itemTemplate: '<li>'+'<a href="{{link}}" title="{{title}}">' + '<img src="{{image_s}}" alt="{{title}}" />' + '</a>' + '</li>'
});


/***************************************************************
* (6) Ordered List *
****************************************************************/

$(".steps_with_circle ol").each (function () {
    $("li", this).each (function (i) {
        $(this).prepend("<span>" + (i+1) + "</span>" );
    });
});

$(".steps_with_box ol li:first")
    .addClass("first");
    $(".steps_with_box ol li:last")
    .addClass("last");

/***************************************************************
* (7) Hide Info Boxes *
****************************************************************/

function hide_boxes(){
	$('span.hide-boxes,p.hide-boxes2').click(function() {
		$(this).parent().fadeOut();
	});
}
hide_boxes();

/***************************************************************
* (8) Flex slider * - Post Format Gallery, Logo, Recent Projects etc.
****************************************************************/

// Image Slider -Shortcodes

$(".swm_image_slider").each(function(){

	var $this				= $(this),
		slideAnimation		= $this.attr("data-slideAnimation") || 'fade',
		autoslideOn			= $this.attr("data-autoSlide") || 0,
		autoslideInterval	= parseInt($this.attr("data-autoSlideInterval") || 7000),
		bulletNav			= $this.attr("data-bulletNavigation") || true,
		arrowNav			= $this.attr("data-arrowNavigation") || true;

	if(autoslideOn == "true") { autoslideOn = true; } else { autoslideOn = false; }
	if(bulletNav == "true") { bulletNav = true; } else { bulletNav = false; }
	if(arrowNav == "true") { arrowNav = true; } else { arrowNav = false; }	
	
	$(this).flexslider({
		animation: slideAnimation,
		slideshow: autoslideOn,
		controlNav: bulletNav,
		directionNav : arrowNav,
		slideshowSpeed: autoslideInterval,
		smoothHeight: true,
		useCSS: false,
		start: function(slider){
			$('body').removeClass('loading');
		}
	});
	

});

// Post Format Gallery Slider

$(".swm_slider").each(function(){

	var $this				= $(this),
		autoslideOn			= $this.attr("data-autoSlide") || 0,
		autoslideInterval	= parseInt($this.attr("data-autoSlideInterval") || 7000),
		bulletNav			= $this.attr("data-bulletNavigation") || true,
		arrowNav			= $this.attr("data-arrowNavigation") || true;

	if(autoslideOn == "true") { autoslideOn = true; } else { autoslideOn = false; }
	if(bulletNav == "true") { bulletNav = true; } else { bulletNav = false; }
	if(arrowNav == "true") { arrowNav = true; } else { arrowNav = false; }

	if ( $.browser.msie ){
    if($.browser.version == '8.0') {
		$(this).flexslider({
			animation: "slide",
			slideshow: autoslideOn,
			controlNav: bulletNav,
			directionNav : arrowNav,
			slideshowSpeed: autoslideInterval,
            smoothHeight: true,
            start: function(slider){
				$('body').removeClass('loading');
			}
        });
    }
}

	$(this).imagesLoaded( function() {
		$(this).flexslider({
		animation: "slide",
		slideshow: autoslideOn,
		controlNav: bulletNav,
		directionNav : arrowNav,
		slideshowSpeed: autoslideInterval,
		smoothHeight: true,
		useCSS: false,
		start: function(slider){
			$('body').removeClass('loading');
		}
		});
	});

});

// Recent Projects Slider

$(".rp_slider").each(function(){

	var $this				= $(this),
		autoslideOn			= $this.attr("data-autoSlide") || 0,
		autoslideInterval	= parseInt($this.attr("data-autoSlideInterval") || 7000);

	if(autoslideOn == "true") { autoslideOn = true; } else { autoslideOn = false; }

	$(this).imagesLoaded( function() {
        $(this).flexslider({
			slideshowSpeed: autoslideInterval,
			animation: "slide",
			animationLoop: true,
			itemWidth: 163,
			itemMargin: 20,
			slideshow: autoslideOn
        });
	});
});

// Recent Projects Slider Home

$(".rp_slider_home").each(function(){

	var $this				= $(this),
		autoslideOn			= $this.attr("data-autoSlide") || 0,
		autoslideInterval	= parseInt($this.attr("data-autoSlideInterval") || 7000);

	if(autoslideOn == "true") { autoslideOn = true; } else { autoslideOn = false; }

	$(this).imagesLoaded( function() {
        $(this).flexslider({
			slideshowSpeed: autoslideInterval,
			animation: "slide",
			animationLoop: true,
			itemWidth: 163,
			itemMargin: 20,
			slideshow: autoslideOn
        });
	});
});

// Logo Slider

$(".logo_slider").each(function(){

	var $this				= $(this),
		autoslideOn			= $this.attr("data-autoSlide") || 0,
		autoslideInterval	= parseInt($this.attr("data-autoSlideInterval") || 7000);

	if(autoslideOn == "true") { autoslideOn = true; } else { autoslideOn = false; }
	
	$(this).imagesLoaded( function() {
        $(this).flexslider({
			slideshowSpeed: autoslideInterval,
			animation: "slide",
			animationLoop: true,
			itemWidth: 148,
			itemMargin: 2,
			slideshow: autoslideOn
        });
	});
});

// Team Member Slider

$(".tm_slider").each(function(){

	var $this				= $(this),
		autoslideOn			= $this.attr("data-autoSlide") || 0,
		autoslideInterval	= parseInt($this.attr("data-autoSlideInterval") || 7000);

	if(autoslideOn == "true") { autoslideOn = true; } else { autoslideOn = false; }

	$(this).imagesLoaded( function() {
        $(this).flexslider({
			slideshowSpeed: autoslideInterval,
			animation: "slide",
			animationLoop: true,
			itemWidth: 175,
			itemMargin: 15,
			slideshow: autoslideOn
        });
	});
});

/***************************************************************
* (9) Rotate Testimonials *
****************************************************************/

$(".testimonials-bx-slider").each(function(){

	var $this				= $(this),
		animationType		= $this.attr("data-animationType") || 'fade',
		autoSlideshow		= $this.attr("data-autoSlideshow") || true,
		smoothHeight		= $this.attr("data-smoothHeight") || true,
		pauseHover			= $this.attr("data-pauseHover") || true,
		displayNavigation	= $this.attr("data-displayNavigation") || true,
		slideshowSpeed		= parseInt($this.attr("data-slideshowSpeed") || 500),
		slideshowInterval	= parseInt($this.attr("data-slideshowInterval") || 4000);

	if(autoSlideshow == "true") { autoSlideshow = true; } else { autoSlideshow = false; }
	if(smoothHeight == "true") { smoothHeight = true; } else { smoothHeight = false; }
	if(pauseHover == "true") { pauseHover = true; } else { pauseHover = false; }
	if(displayNavigation == "true") { displayNavigation = true; } else { displayNavigation = false; }

	$(this).bxSlider({
		mode: animationType,
		auto:autoSlideshow,
		autoHover:pauseHover,
		adaptiveHeight: smoothHeight,
		adaptiveHeightSpeed:500,
		speed:slideshowSpeed,
		pause:slideshowInterval,
		controls:displayNavigation
	});
});

/***************************************************************
* (10) Portfolio *
****************************************************************/

$(".pf_sort").imagesLoaded( function() {
	$('.pf_sort').isotope({
	itemSelector: '.pf_isotope',
	masonry: {
		//custom addition
	}
	});
});

$('.filter_menu a').click(function(){
	var selector = $(this).attr('data-filter');
	$('.pf_sort').isotope({filter: selector});
	$('.filter_menu a.active').removeClass('active');
	$(this).addClass('active');
	return false;
});

/***************************************************************
* (11) Mobile menu *
****************************************************************/

 $('.sf-menu').tinyNav({
    active: 'active',  // class name of active link
    header: 'Navigation'  // default display text for dropdown
});

/***************************************************************
* (12) prettyPhoto media fix *
****************************************************************/

// store the viewport width in a variable
var viewportWidth = $('body').innerWidth();

$("a.lightbox").prettyPhoto({
    theme: 'pp_default',
    changepicturecallback: function(){
        // 1024px is presumed here to be the widest mobile device. Adjust at will.
        if (viewportWidth < 1025) {
            $(".pp_pic_holder.pp_default").css("top",window.pageYOffset+"px");
        }
    }
});

/***************************************************************
* (13) Comment Form *
****************************************************************/

var $comment_form = $('form#commentform');
$comment_form.find('input:text, textarea').each(function(index,domElements){
	var $comment_input = jQuery(domElements),
		$comment_label = $comment_input.siblings('label'),
		comment_label_value = $comment_input.siblings('label').text();
	if ( $comment_label.length ) {
		$comment_label.hide();
		if ( $comment_input.siblings('span.required') ) {
			comment_label_value += $comment_input.siblings('span.required').text();
			$comment_input.siblings('span.required').hide();
		}
		$comment_input.val(comment_label_value);
	}
}).bind('focus',function(){
	var comment_label = jQuery(this).siblings('label').text();
	if ( jQuery(this).siblings('span.required').length ) comment_label += jQuery(this).siblings('span.required').text();
	if (jQuery(this).val() === comment_label) jQuery(this).val("");
}).bind('blur',function(){
	var comment_label = jQuery(this).siblings('label').text();
	if ( jQuery(this).siblings('span.required').length ) comment_label += jQuery(this).siblings('span.required').text();
	if (jQuery(this).val() === "") jQuery(this).val( comment_label );
});

$comment_form.submit(function(){
	$comment_form.find('input:text, textarea').each(function(index,domElements){
		var $comment_input = jQuery(domElements),
			$comment_label = $comment_input.siblings('label'),
			comment_label_value = $comment_input.siblings('label').text();

		if ( $comment_label.length && $comment_label.is(':hidden') ) {
			if ( $comment_label.text() === $comment_input.val() )
				$comment_input.val( '' );
		}
	});
});

/****************************************************************/
/****************************************************************/
}); })(jQuery);
// Do not delete above line