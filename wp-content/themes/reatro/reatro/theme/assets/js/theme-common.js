jQuery(document).ready(function() {

	// Tabs
	function tabs(){
		if ( jQuery().easytabs ) {
			jQuery('.theme-options-page #tab-container').easytabs({
				animationSpeed: 300,
				updateHash: false
			});
		}
	}
	tabs();


	// Chosen
	//jQuery('.chosen').chosen();

	function select(){
		var initChosen = function(element){
			var placeholder = jQuery(element).attr('data-placeholder');
			if(placeholder!=undefined){
				jQuery(element).data("placeholder", placeholder);
			}
			
			if(jQuery(element).data("order")==true){
				jQuery(element).val('');
				jQuery(element).chosen();
				var ordered = jQuery('[name="_'+jQuery(element).attr('id')+'"]');
				var selected = ordered.val().split(',');
				var chosen_object = jQuery(element).data('chosen');
				jQuery.each(selected, function(index, item){
					jQuery.each(chosen_object.results_data, function(i, data){
						if(data.value == item){
							jQuery("#"+data.dom_id).trigger('mouseup');
						}
					});
				});
				jQuery(element).data("backupVal",jQuery(element).val());
				jQuery(element).change(function(){
					var backup = jQuery(this).data("backupVal");
					var current = jQuery(this).val();
					if(backup == null){
						backup = [];
					}
					if(current == null){
						current = [];
					}
					if(backup.length > current.length){							
						jQuery.each(backup, function(index, item) { 
							if(jQuery.inArray(item, current) < 0){
								for(var i=0; i<selected.length; i++){
									if(selected[i] == item){
										selected.splice(i,1);
									}
								}
							}
						});
					}else if(backup.length < current.length){
						jQuery.each(current, function(index, item) { 
							if(jQuery.inArray(item, backup) < 0){
								selected.push(item);
							}
						});
					}
					ordered.val(selected.join(','));
					jQuery(this).data("backupVal",current);
				});
			}else{
				jQuery(element).chosen();
			}
		}
		jQuery("select.chosen").each(function(){
			if(jQuery(this).parents('.postbox').is('.closed')){
				var chosen = jQuery(this);
					
				chosen.parents('.postbox').children('.hndle,.handlediv').bind('clickoutside',function(e){
					initChosen(chosen);
				});
			}else{
				initChosen(this);
			}
		});
	}
	select();


	// Color Picker
	jQuery('.the-color-picker').wpColorPicker();


});