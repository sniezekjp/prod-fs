<?php
/**
 * @package WordPress
 * @subpackage ThemeWoot
 * @author ThemeWoot Team 
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.txt
 */

if ( ! class_exists( 'Twoot_Generator' ) ) {

/**
 * Generator Class
 *
 * Contains the main functions for Metaboxes & Options.
 *
 * @class Twoot_Generator
 * @version	1.0.0
 * @since 1.0.0
 * @package	ThemeWoot
 * @author ThemeWoot Team 
 */

class Twoot_Generator {

	function text($item) {
		extract($this->option_atts(array(
			'id' => '',
			'std' => '',
			'value' => '',
			'size' => '10',
			'class'=> ''
		), $item));
		$class = $class?' class="'.$class.'"':'';
		
		echo '<input'.$class.' name="' . $id . '" id="' . $id . '" type="text" size="' . $size . '" value="' . $value . '" />';
	}
	// end text


	function textarea($item) {
		extract($this->option_atts(array(
			'id' => '',
			'std' => '',
			'value' => '',
			'rows' => '7',
			'class'=> 'code'
		), $item));
		$class = $class?' class="'.$class.'"':'';
		
		echo '<textarea'.$class.' rows="' . $rows . '" name="' . $id . '" id="' . $id . '" type="textarea">' . $value . '</textarea>';
	}
	// end textarea


	function select($item) {
		extract($this->option_atts(array(
			'id' => '',
			'std' => '',
			'value' => '',
			'chosen' => false,
			'target' => NULL,
			'options' => array(),
			'prompt' => NULL,
			'class'=> ''
		), $item));

		if (!is_null($target)) {
			$options += $this->get_select_target_options($target);
		}

		if ($chosen == true){
			if($class){
				$class .= ' chosen';
			}else{
				$class = 'chosen';
			}
		}

		$class = $class?' class="'.$class.'"':'';
		echo '<select'.$class.' name="' . $id . '" id="' . $id . '">';
		if(!is_null($prompt)){
			echo '<option value="">'.$prompt.'</option>';
		}
		
		if(is_array($options)){
			foreach($options as $key => $option) {
				if(is_array($option)){
					echo '<optgroup label="' . $key . '">';
					foreach($option as $k => $o) {
						echo '<option value="' . $k . '"';
						if ($k == $value) {
							echo ' selected="selected"';
						}
						echo '>' . $o . '</option>';
					}
					echo "</optgroup>";
				}else{
					echo '<option value="' . $key . '"';
					if ($key == $value) {
						echo ' selected="selected"';
					}
					echo '>' . $option . '</option>';
				}
			}
		}
		
		echo '</select>';		
	}
	// select


	function multiselect($item) {
		extract($this->option_atts(array(
			'id' => '',
			'std' => array(),
			'value' => array(),
			'size' => '5',
			'chosen' => false,
			'chosen_order' => false,
			'class'=> '',
			'target' => NULL,
			'prompt' => '',
			'options' => array()
		), $item));
		if(empty($value)){
			$value = array();
		}
		if ($chosen == true){
			if($class){
				$class .= ' chosen';
			}else{
				$class = 'chosen';
			}
		}
		$class = $class?' class="'.$class.'"':'';
		if (!is_null($target)) {
			$options += $this->get_select_target_options($target);
		}
		
		if (!empty($prompt)) {
			$prompt = ' data-placeholder="'.$prompt.'"';
		}
		if($chosen_order == true){
			echo '<input type="hidden" name="_'.$id.'" value="'.implode(",", $value).'" />';
			$order = ' data-order="true"';
		}else{
			$order = '';
		}
		echo '<select'.$class.$prompt.$order.' name="' . $id . '[]" id="' . $id . '" multiple="true" size="' . $size . '" style="height:auto" >';
		
		foreach($options as $key => $option) {
			if(is_array($option)){
				echo '<optgroup label="' . $key . '">';
				foreach($option as $k => $o) {
					echo '<option value="' . $k . '"';
					if(is_array($value) && in_array($k, $value)) {
						echo ' selected="selected"';
					}
					echo '>' . $o . '</option>';
				}
				echo "</optgroup>";
			}else{
				echo '<option value="' . $key . '"';
				if(is_array($value) && in_array($key, $value)) {
					echo ' selected="selected"';
				}
				echo '>' . $option . '</option>';
			}
		}
		echo '</select>';		
	}
	// multiselect


	function checkboxes($item) {
		extract($this->option_atts(array(
			'id' => '',
			'std' => array(),
			'value' => array(),
			'target' => NULL,
			'options' => array(),
		), $item));
		
		if (!is_null($target)) {
			$options += $this->get_select_target_options($target);
		}
		echo '<div class="checkboxes-wrap">';
		
		foreach($options as $key => $option) {
			echo '<label><input type="checkbox" value="' . $key . '" name="' . $id . '[]"';
			if (is_array($value) && in_array($key, $value)) {
				echo ' checked="checked"';
			}
			echo '>' . $option . '</label><br/>';
		}
		echo '</div>';
	}
	// checkboxes


	function radios($item) {
		extract($this->option_atts(array(
			'id' => '',
			'std' => array(),
			'value' => array(),
			'target' => NULL,
			'options' => array(),
		), $item));
		
		if (!is_null($target)) {
			$options += $this->get_select_target_options($target);
		}
		$i = 0;
		echo '<div class="radios-wrap">';
		foreach($options as $key => $option) {
			$i++;
			$checked = '';
			if ($key == $value) {
				$checked = ' checked="checked"';
			}
			
			echo '<input type="radio" id="' . $id . '_' . $i . '" name="' . $id . '" value="' . $key . '" ' . $checked . ' />';
			echo '<label for="' . $id . '_' . $i . '">' . $option . '</label><br />';
		}
		echo '</div>';
	}
	// radios


	function color($item) {
		extract($this->option_atts(array(
			'id' => '',
			'std' => '',
			'value' => '',
			'class' => '',
		), $item));
		
		$class = $class?' class="'.$class.' the-color-picker"':' class="the-color-picker"';
		
		echo '<div class="color-input-wrap"><input'.$class.' name="'.$id.'" id="'.$id.'" type="text"  value="'. $value.'" /></div>';
		
	}
	// end color


	function upload($item) {
		extract($this->option_atts(array(
			'id' => '',
			'std' => '',
			'value' => '',
			'size' => '80',
			'button' => 'Upload Image',
			'uploader_title' => 'Choose Image',
			'uploader_button' => 'Insert Image',
			'class' => ''
		), $item));

		$value = empty($value) ? '' : htmlspecialchars($value);
		echo '<div class="upload-wrap">';
		echo '<input name="'.$id.'" id="custom_media_'.$id.'" type="text" size="' . $size . '" value="'.$value.'" />';
		echo '<span class="or">OR</span>';
		echo '<a href="#" id="custom_media_'.$id.'_button" class="upload_image_button button" data-uploader-title="'.$uploader_title.'" data-uploader-button-text="'.$uploader_button.'">'.$button.'</a>';
		echo '</div>';

		echo '<script type="text/javascript">'."\n";
		echo '//<![CDATA['."\n";
		echo 'jQuery(document).ready(function() {'."\n";
		echo 'jQuery("#custom_media_'.$id.'_button").on("click", function( event ){'."\n";

		echo '	// Uploading files'."\n";
		echo '	var wp_file_frame;'."\n";

		echo '	event.preventDefault();'."\n";

		echo '	// If the media frame already exists, reopen it.'."\n";
		echo '	if ( wp_file_frame ) {'."\n";
		echo '	  wp_file_frame.open();'."\n";
		echo '	  return;'."\n";
		echo '	}'."\n";

		echo '	// Create the media frame.'."\n";
		echo '	wp_file_frame = wp.media.frames.wp_file_frame = wp.media({'."\n";
		echo '	  title: jQuery( this ).data( "uploader-title" ),'."\n";
		echo '	  button: {'."\n";
		echo '		text: jQuery( this ).data( "uploader-button-text" ),'."\n";
		echo '	  },'."\n";
		echo '	  multiple: false  // Set to true to allow multiple files to be selected'."\n";
		echo '	});'."\n";

		echo '	// When an image is selected, run a callback.'."\n";
		echo '	wp_file_frame.on( "select", function() {'."\n";
		echo '	  // We set multiple to false so only get one image from the uploader'."\n";
		echo '	  attachment = wp_file_frame.state().get("selection").first().toJSON();'."\n";

		echo '	  // Do something with attachment.id and/or attachment.url here'."\n";
		echo '	  jQuery("#custom_media_'.$id.'").val(attachment.url);'."\n";
		echo '	});'."\n";

		echo '	// Finally, open the modal'."\n";
		echo '	wp_file_frame.open();'."\n";
		echo '});'."\n";
		echo '});'."\n";
		echo '//]]>'."\n";
		echo '</script>'."\n";
	}
	// upload


	function get_select_target_options($type) {

		global $wpdb;
		$table_layerslider = $wpdb->prefix . 'layerslider';
		$options = array();
		switch($type){
			case 'page':
				$entries = get_pages('title_li=&orderby=name');
				foreach($entries as $key => $entry) {
					$options[$entry->ID] = $entry->post_title;
				}
				break;
			case 'cat':
				$entries = get_categories('orderby=name&hide_empty=0');
				foreach($entries as $key => $entry) {
					$options[$entry->term_id] = $entry->name;
				}
				break;
			case 'post':
				$entries = get_posts('orderby=title&numberposts=-1&order=ASC');
				foreach($entries as $key => $entry) {
					$options[$entry->ID] = $entry->post_title;
				}
				break;
			case 'portfolio':
				$entries = get_posts('post_type=portfolio&orderby=title&numberposts=-1&order=ASC');
				foreach($entries as $key => $entry) {
					$options[$entry->ID] = $entry->post_title;
				}
				break;
			case 'portfolio_cat':
				$entries = get_terms('portfolio_cat','orderby=name&hide_empty=0');
				foreach($entries as $key => $entry) {
					$options[$entry->slug] = $entry->name;
				}
				break;
			case 'post_types':
				foreach( get_post_types( array('public'=>true), 'objects' ) as $post_type ) {
					$options[$post_type->name] = esc_html($post_type->labels->name).' ('.esc_html($post_type->name).')';
				}
				break;
			case 'sidebar':
				$sidebars = get_option('_twoot_sidebars');
				if(is_array($sidebars) && !empty($sidebars)) {
					foreach($sidebars as $sidebar) {
						$options[sanitize_title($sidebar)] = $sidebar;
					}
				}
				break;
			case 'google_fonts':
				global $twoot_google_fonts;
				$current_google_fonts = twoot_get_frontend_func('opt', 'font', 'current_google_fonts');
				if(is_array($current_google_fonts) && !empty($current_google_fonts)) {
					foreach($current_google_fonts as $current_google_font) {

						$font = $twoot_google_fonts[$current_google_font];
						$options[$font] = $font;
					}
				}
				break;
			case 'wpcf7':
				$entries = get_posts('post_type=wpcf7_contact_form&orderby=title&numberposts=-1&order=ASC');
				if(is_array($entries) && !empty($entries)) {
					foreach($entries as $key => $entry) {
						$options[$entry->ID] = $entry->post_title;
					}
				}
				break;
			case 'layerslider':
				if ( function_exists( 'layerslider' ) ) {
					$entries = $wpdb->get_results( "SELECT * FROM $table_layerslider WHERE flag_hidden = '0' AND flag_deleted = '0' ORDER BY date_c ASC LIMIT 100" );
					if(is_array($entries) && !empty($entries)) {
						foreach($entries as $key => $entry) {
							$options[$entry->id] = $entry->name;
						}
					}
				}
				break;
		}
		return $options;
	}
	// select target


	function option_atts($pairs, $atts){
		$atts = (array)$atts;
		$out = array();
		foreach($pairs as $name => $std) {
			if ( array_key_exists($name, $atts) )
				$out[$name] = $atts[$name];
			else
				$out[$name] = $std;
		}
		return $out;
	}
	// option atts

}

}

?>