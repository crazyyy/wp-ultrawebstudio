
// start the popup specefic scripts
// safe to use $
jQuery(document).ready(function($) {
    var swms = {
    	loadVals: function()
    	{
    		var shortcode = $('#_swm_shortcode').text(),
    			uShortcode = shortcode;
    		
    		// fill in the gaps eg {{param}}
    		$('.swm-input').each(function() {
    			var input = $(this),
    				id = input.attr('id'),
    				id = id.replace('swm_', ''),		// gets rid of the swm_ prefix
    				re = new RegExp("{{"+id+"}}","g");
    				
    			uShortcode = uShortcode.replace(re, input.val());
    		});
    		
    		// adds the filled-in shortcode as hidden input
    		$('#_swm_ushortcode').remove();
    		$('#swm-sc-form-table').prepend('<div id="_swm_ushortcode" class="hidden">' + uShortcode + '</div>');
    		
    		// updates preview
    		swms.updatePreview();
    	},
    	cLoadVals: function()
    	{
    		var shortcode = $('#_swm_cshortcode').text(),
    			pShortcode = '';
    			shortcodes = '';
    		
    		// fill in the gaps eg {{param}}
    		$('.child-clone-row').each(function() {
    			var row = $(this),
    				rShortcode = shortcode;
    			
    			$('.swm-cinput', this).each(function() {
    				var input = $(this),
    					id = input.attr('id'),
    					id = id.replace('swm_', '')		// gets rid of the swm_ prefix
    					re = new RegExp("{{"+id+"}}","g");
    					
    				rShortcode = rShortcode.replace(re, input.val());
    			});
    	
    			shortcodes = shortcodes + rShortcode + "\n";
    		});
    		
    		// adds the filled-in shortcode as hidden input
    		$('#_swm_cshortcodes').remove();
    		$('.child-clone-rows').prepend('<div id="_swm_cshortcodes" class="hidden">' + shortcodes + '</div>');
    		
    		// add to parent shortcode
    		this.loadVals();
    		pShortcode = $('#_swm_ushortcode').text().replace('{{child_shortcode}}', shortcodes);
    		
    		// add updated parent shortcode
    		$('#_swm_ushortcode').remove();
    		$('#swm-sc-form-table').prepend('<div id="_swm_ushortcode" class="hidden">' + pShortcode + '</div>');
    		
    		// updates preview
    		swms.updatePreview();
    	},
    	children: function()
    	{
    		// assign the cloning plugin
    		$('.child-clone-rows').appendo({
    			subSelect: '> div.child-clone-row:last-child',
    			allowDelete: false,
    			focusFirst: false
    		});
    		
    		// remove button
    		$('.child-clone-row-remove').live('click', function() {
    			var	btn = $(this),
    				row = btn.parent();
    			
    			if( $('.child-clone-row').size() > 1 )
    			{
    				row.remove();
    			}
    			else
    			{
    				alert('You need a minimum of one row');
    			}
    			
    			return false;
    		});
    		
    		// assign jUI sortable
    		$( ".child-clone-rows" ).sortable({
				placeholder: "sortable-placeholder",
				items: '.child-clone-row'
				
			});
    	},
    	
    	resizeTB: function()
    	{
			var	ajaxCont = $('#TB_ajaxContent'),
				tbWindow = $('#TB_window'),
				swmPopup = $('#swm-popup'),
				no_preview = ($('#_swm_preview').text() == 'false') ? true : false;
			
			if( no_preview )
			{
				ajaxCont.css({
					paddingTop: 0,
					paddingLeft: 0,
					height: (tbWindow.outerHeight()-47),
					overflow: 'scroll', // IMPORTANT
					width: 560
				});
				
				tbWindow.css({
					width: ajaxCont.outerWidth(),
					marginLeft: -(ajaxCont.outerWidth()/2)
				});
				
				$('#swm-popup').addClass('no_preview');
			}
			else
			{
				ajaxCont.css({
					padding: 0,
					// height: (tbWindow.outerHeight()-47),
					height: swmPopup.outerHeight()-15,
					overflow: 'hidden' // IMPORTANT
				});
				
				tbWindow.css({
					width: ajaxCont.outerWidth(),
					height: (ajaxCont.outerHeight() + 30),
					marginLeft: -(ajaxCont.outerWidth()/2),
					marginTop: -((ajaxCont.outerHeight() + 47)/2),
					top: '50%'
				});
			}
    	},
    	updatePreview: function()
    	{
    		if( $('#swm-sc-preview').size() > 0 )
    		{
	    		var	shortcode = $('#_swm_ushortcode').html(),
	    			iframe = $('#swm-sc-preview'),
	    			iframeSrc = iframe.attr('src'),
	    			iframeSrc = iframeSrc.split('preview.php'),
	    			iframeSrc = iframeSrc[0] + 'preview.php';
    			
	    		// updates the src value
	    		iframe.attr( 'src', iframeSrc + '?sc=' + base64_encode( shortcode ) );
	    		
	    		// update the height
	    		$('#swm-sc-preview').height( $('#swm-popup').outerHeight()-42 );
    		}
    	},
		load: function()
    	{
    		var	swms = this,
    			popup = $('#swm-popup'),
    			form = $('#swm-sc-form', popup),
    			shortcode = $('#_swm_shortcode', form).text(),
    			popupType = $('#_swm_popup', form).text(),
    			uShortcode = '';
    		
    		// resize TB
    		swms.resizeTB();
    		$(window).resize(function() { swms.resizeTB() });
    		
    		// initialise
    		swms.loadVals();
    		swms.children();
    		swms.cLoadVals();
    		
    		// update on children value change
    		$('.swm-cinput', form).live('change', function() {
    			swms.cLoadVals();
    		});
    		
    		// update on value change
    		$('.swm-input', form).change(function() {
    			swms.loadVals();
    		});
    		
    		// when insert is clicked
    		$('.swm-insert', form).click(function() {    		 			
    			if(window.tinyMCE)
				{
					window.tinyMCE.execInstanceCommand('content', 'mceInsertContent', false, $('#_swm_ushortcode', form).html());
					tb_remove();
				}
    		});
    	}
	}
    
    // run
    $('#swm-popup').livequery( function() { swms.load(); } );
});