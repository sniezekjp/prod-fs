jQuery(document).ready(function() {

	jQuery('#post-formats-select input').change(check_Format);
	jQuery('#_twoot_type').change(check_Type);

	function check_Format() {
		var format = jQuery('#post-formats-select input:checked').attr('value');

		if(typeof format != 'undefined') {
			jQuery('#post-body div[id^=twoot-metabox-]').hide();
			jQuery('#post-body #twoot-metabox-'+format+'').stop(true,true).fadeIn(500);

			if(format == 'image') {
				jQuery('#post-body div[id^=twoot-metabox-gallery]').stop(true,true).fadeIn(500);
			} 
		}
	}
	check_Format();



	function check_Type() {
		var type = jQuery('#_twoot_type option:selected').attr('value');

		if(typeof type != 'undefined') {
			jQuery('#post-body div[id^=twoot-metabox-gallery]').hide();
			jQuery('#post-body div[id^=twoot-metabox-video]').hide();

			if(type == 'image') {
				jQuery('#post-body div[id^=twoot-metabox-gallery]').stop(true,true).fadeIn(500);
			} 
			
			if(type == 'slider') {
				jQuery('#post-body div[id^=twoot-metabox-gallery]').stop(true,true).fadeIn(500);
			}

			if(type == 'masonry') {
				jQuery('#post-body div[id^=twoot-metabox-gallery]').stop(true,true).fadeIn(500);
			} 
			
			if(type == 'video') {
				jQuery('#post-body div[id^=twoot-metabox-video]').stop(true,true).fadeIn(500);
			} 
		}
	}
	check_Type();

});