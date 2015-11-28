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

if ( ! class_exists( 'Twoot_Option_Generator' ) ) {

/**
 * Twoot_Option_Generator Class
 *
 * Contains the main functions for Options.
 *
 * @class Twoot_Option_Generator
 * @version	1.0.0
 * @since 1.0.0
 * @package	ThemeWoot
 * @author ThemeWoot Team 
 */

class Twoot_Option_Generator {

	var $name;
	var $options;
	var $saved_options;
	var $generator;

	/**
	 * Constructor
	 * 
	 * @param string $name
	 * @param array $options
	 */
	function Twoot_Option_Generator($name, $options) {

		$this->generator = new Twoot_Generator();		
		$this->name = $name;
		$this->options = $options;
		
		$this->save_options();
		$this->render();
	}

	function save_options() {
		$options = get_option(TWOOT_OPT_KEY . '_' . $this->name);
		
		if (isset($_POST['save_theme_options'])) {
			foreach($this->options as $value) {
				if (isset($value['id']) && ! empty($value['id'])) {
					if (isset($_POST[$value['id']])) {
						switch($value['type']){						
							case 'multiselect':
								if(isset($value['chosen_order']) && $value['chosen_order']){
									if(empty($_POST['_'.$value['id']])){
										$options[$value['id']] = array();
									}else{
										$options[$value['id']] = explode(",", $_POST['_'.$value['id']]);
									}
								}else{
									if(empty($_POST[$value['id']])){
										$options[$value['id']] = array();
									}else{
										$options[$value['id']] = $_POST[$value['id']];
									}
								}	
								break;
							
							default:
								$options[$value['id']] = $_POST[$value['id']];
						}
					} else {
						if ($value['type'] == 'multiselect') {
							$options[$value['id']] = array();
						} else {
							$options[$value['id']] = false;
						}
					}
				}		
			}
			
			if ($options != $this->options) {
				update_option(TWOOT_OPT_KEY . '_' . $this->name, $options);
				global $theme_options;
				$theme_options[$this->name] = $options;

				//Save posts pre page
				update_option( 'posts_per_page', twoot_get_frontend_func('opt', 'opt', 'blog_counts') );

				// Cache the custom css
				twoot_get_frontend_func('cache_css');
				
			}
			echo '<div id="message" class="updated fade"><p><strong>Updated Successfully</strong></p></div>';
		}
		
		$this->saved_options = $options;
	
	}
	// end save options


	function render() {
		echo '<div class="wrap theme-options-page">';
		echo '<div class="theme-options-page-title">';
		echo '<div id="icon-options-general" class="icon32"><br /></div>';
		echo '<h2>'. TWOOT_NAME .'<span>' . esc_attr__('Version: ', 'Twoot') . TWOOT_VERSION . '</span><h2>';
		echo '</div>';
		echo '<form id="theme-form-'.$this->name.'" method="post" action="">';
		echo '<div id="tab-container" class="clearfix">';
		
		foreach($this->options as $option) {
			$this->renderOption($option);
		
		}
		echo '</div>'; /*end tab-content*/
		echo '</div>';
		echo '</form>';
		echo '</div>';
	}
	// end render


	function renderOption($option){	
		global $post;
		if(isset($option['id'])){
			if (isset($this->saved_options[$option['id']])) {
				if( is_string($this->saved_options[$option['id']])){
					$option['value'] = stripslashes($this->saved_options[$option['id']]);
				}else{
					$option['value'] = $this->saved_options[$option['id']];
				}
			}else{
				if(isset($option['std'])){
					$option['value'] = $option['std'];
				}else{
					$option['value'] = '';
					$option['std'] = '';
				}
			}
		}

		if (method_exists($this, $option['type'])) {
			$this->$option['type']($option);
		}elseif (method_exists($this->generator, $option['type'])) { 
			echo '<div class="group clearfix">';
			echo '<h4 class="title"><label for="'.$option['id'].'">' . $option['name'] . '</label></h4>';
			echo '<div class="box">';
			$this->generator->$option['type']($option);
			if(isset($option['desc'])){
				echo '<p class="description">' . $option['desc'] . '</p>';
			}
			echo '</div>';
			echo '</div>';
		}
	}
	// end render option


	function tab_begin() {
		echo '<ul class="tabs etabs clearfix">';
	}
	// end tab


	function tab_item($item) {
		echo '<li class="tab"><a href="#tab-'.sanitize_title($item['name']).'">' .$item['name']. '</a></li>';
	}
	// end item


	function tab_end() {
		echo '</ul>';
		echo '<div class="tabs-content">';
	}
	// end tab


	function tab_content_begin($item) {
		echo '<div id="tab-'.sanitize_title($item['name']).'">';
	}
	// end tab content


	function tab_content_end() {
		echo '</div>';
	}
	// end tab content


	function group_begin($item) {
		echo '<div class="theme-options-group">';
		echo '<div class="sub-title">' . $item['name'] . '</div>';
	}
	// end begin


	function group_end() {
		echo '</div>';
		echo '<div class="submit"><input type="submit" name="save_theme_options" class="button button-primary" value="Save Changes" /></div>';
	}
	// end after

}

}
?>