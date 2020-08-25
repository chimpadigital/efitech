(function($) {
	'use strict';

		var Prelude_Widget_Areas = function(){
			if ( $('.sidebars-column-2').length !== 0 ) {
				this.widget_wrap = $('.sidebars-column-2');
			} else {
				this.widget_wrap = $('.sidebars-column-1');
			}
			this.widget_area = $('#widgets-right');
			this.parent_area = $('.widget-liquid-right');
			this.widget_template = $('#prelude-add-widget-template');
			this.add_form_html();
			this.add_del_button();
			this.bind_events();
		};
	
		Prelude_Widget_Areas.prototype = {
		
			add_form_html: function() {
					
					this.widget_wrap.append( this.widget_template.html() );
					this.widget_name = this.widget_wrap.find('input[name="prelude-add-widget-input"]');
					this.nonce       = this.widget_wrap.find('input[name="prelude-nonce"]').val();
			},
			
			add_del_button: function() {
				var i = 0;
				this.widget_area.find('.sidebar-prelude-custom .widgets-sortables').each(function() {
					if ( i >= preludeWidgetAreasLocalize.count ) {
						var widgetID = $(this).attr('id')
						$(this).append('<div class="prelude-widget-area-footer"><div class="prelude-widget-area-id">ID:<span class="description"> '+ widgetID +'</span></div><div class="prelude-widget-area-buttons"><a href="#" class="prelude-widget-area-delete button-primary">'+ preludeWidgetAreasLocalize.delete +'</a><a href="#" class="prelude-widget-area-delete-cancel button-secondary">'+ preludeWidgetAreasLocalize.cancel +'</a><a href="#" class="prelude-widget-area-delete-confirm button-primary">'+ preludeWidgetAreasLocalize.confirm +'</a></div></div>')
					}
					i++;
				});
			},
			
			bind_events: function() {
				this.parent_area.on( 'click', 'a.prelude-widget-area-delete', function(event) {
					event.preventDefault()
					$(this).hide();
					$(this).next('a.prelude-widget-area-delete-cancel').show().next('a.prelude-widget-area-delete-confirm').show();
				});
				this.parent_area.on( 'click', 'a.prelude-widget-area-delete-cancel', function(event) {
					event.preventDefault()
					$(this).hide();
					$(this).prev('a.prelude-widget-area-delete').show();
					$(this).next('a.prelude-widget-area-delete-confirm').hide();
				});
				this.parent_area.on('click', 'a.prelude-widget-area-delete-confirm', $.proxy( this.delete_widget_area, this));
				$( "#addWidgetAreaForm" ).submit(function() {
						$.proxy( this.add_widget_area, this)
				});
			},

			add_widget_area: function(e) {
				e.preventDefault();
				return false;
			},
			
			// delete the widget_area area with all widgets within, then re calculate the other widget_area ids and re save the order
			delete_widget_area: function(e) {
				var widget = $(e.currentTarget).parents('.widgets-holder-wrap:eq(0)'),
					title = widget.find('.sidebar-name h2'),
					spinner = title.find('.spinner'),
					widget_name = $.trim(title.text()),
					obj = this;
				widget.addClass('closed');
				spinner.css('display', 'inline-block');
				$.ajax({
					type: "POST",
					url: window.ajaxurl,
					data: {
						 action: 'prelude_delete_widget_area',
						 name: widget_name,
						 _wpnonce: obj.nonce
					},
					success: function(response) {     
					 if(response.trim() == 'widget_area-deleted') {
							widget.slideUp(200).remove();
					 } 
					}
				});
			}
		};
	
	$(function() {
		new Prelude_Widget_Areas();
	});
	
})(jQuery);  