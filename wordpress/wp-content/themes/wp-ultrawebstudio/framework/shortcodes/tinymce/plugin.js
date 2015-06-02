(function ()
{
	// create swmShortcodes plugin
	tinymce.create("tinymce.plugins.swmShortcodes",
	{
		init: function ( ed, url )
		{
			ed.addCommand("swmPopup", function ( a, params )
			{
				var popup = params.identifier;
				
				// load thickbox
				tb_show("Insert Shortcode", url + "/popup.php?popup=" + popup + "&width=" + 800);
			});
		},
		createControl: function ( btn, e )
		{
			if ( btn == "swm_button" )
			{	
				var a = this;
				
				// adds the tinymce button
				btn = e.createMenuButton("swm_button", {
					title: "Add Shortcode",
					
					/* =========================================================================
					BELOW IS SHORTCODE ICON PATH WHICH YOU CAN CHANGE AS PER YOUR WEBSITE URL
					=========================================================================== */
					
					image: "../wp-content/themes/ultrawebstudio/framework/images/shortcode-icon.png",
					
					icons: false
				});
				
				// adds the dropdown to the button
				btn.onRenderMenu.add(function (c, b) {
					c = b.addMenu({
                        title: "Typography"
                    });
					a.addWithPopup( c, "Button", "button" );
					a.addWithPopup( c, "Column", "columns" );
					a.addWithPopup( c, "Dropcaps", "dropcaps" );
					a.addWithPopup( c, "Highlight", "highlight" );
					a.addWithPopup( c, "Line Break", "linebreak" );
					a.addWithPopup( c, "Promo Text", "promotiontext" );
					a.addWithPopup( c, "Quotes", "quote" );
					a.addWithPopup( c, "Tabs", "tabs" );
					a.addWithPopup( c, "Toggle", "toggle" );
					a.addWithPopup( c, "Tooltip", "tooltip" );

					c = b.addMenu({
                        title: "List Styles"
                    });
					a.addWithPopup( c, "Icons List", "iconlist" );
                    a.addWithPopup( c, "Ordered List", "textlist" );
					a.addWithPopup( c, "Awards List", "awardslist" );

					c = b.addMenu({
                        title: "Info Boxes"
                    });
					a.addWithPopup( c, "Homepage Whitebox", "whitebox" );
					a.addWithPopup( c, "Service Box", "servicebox" );
					a.addWithPopup( c, "Simple Info Box", "infoboxes" );
					a.addWithPopup( c, "Fancy Info Box", "fancybox" );

					a.addWithPopup( b, "Animated Menu", "animatedmenu" );
					a.addWithPopup( b, "Contact Form", "contactform" );
					a.addWithPopup( b, "Gallery", "gallery" );
					a.addWithPopup( b, "Google Map", "googlemap" );
					a.addWithPopup( b, "Horizontal Menu", "horizontalmenu" );
					a.addWithPopup( b, "Image", "image" );

					a.addWithPopup( b, "Recent Posts", "latestnews" );
					a.addWithPopup( b, "Pricing Table", "tables" );
					a.addWithPopup( b, "Services", "serviceslist" );
					a.addWithPopup( b, "Skill Bar", "skillbar" );

					c = b.addMenu({
                        title: "Sliders"
                    });
					a.addWithPopup( c, "Recent Projects Slider", "recentprojectsslider" );
					a.addWithPopup( c, "Logo Slider", "logoslider" );
					a.addWithPopup( c, "Testimonials Slider", "testimonialsslider" );
					a.addWithPopup( c, "Image Slider", "imageslider" );

					c = b.addMenu({
                        title: "Social Media"
                    });

					a.addWithPopup( c, "Social Media Icons", "socialmedia" );
					a.addWithPopup( c, "Flickr Photos", "flickrphotos" );					
					a.addWithPopup( c, "YouTube/Vimeo Video", "video" );

					c = b.addMenu({
                        title: "Testimonials"
                    });

                    a.addWithPopup( c, "Testimonials with Client Image", "testimonials1" );
                    a.addWithPopup( c, "Testimonials with Quote Style", "testimonials2" );
                    a.addWithPopup( c, "Testimonials with Box Style", "testimonials3" );
					
					c = b.addMenu({
                        title: "Team Members"
                    });

					a.addWithPopup( c, "About page Team Member", "teammember" );
					a.addWithPopup( c, "Contact page Team Member", "supportteam" );
					

					
				});
				
				return btn;
			}
			
			return null;
		},
		addWithPopup: function ( ed, title, id ) {
			ed.add({
				title: title,
				onclick: function () {
					tinyMCE.activeEditor.execCommand("swmPopup", false, {
						title: title,
						identifier: id
					})
				}
			})
		},
		addImmediate: function ( ed, title, sc) {
			ed.add({
				title: title,
				onclick: function () {
					tinyMCE.activeEditor.execCommand( "mceInsertContent", false, sc )
				}
			})
		},
		getInfo: function () {
			return {
				longname: 'SWM Shortcodes',
				author: 'Soft Web Media',				
				version: "1.0"
			}
		}
	});
	
	// add swmShortcodes plugin
	tinymce.PluginManager.add("swmShortcodes", tinymce.plugins.swmShortcodes);
})();