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

if ( ! class_exists( 'Twoot_Metabox_Generator' ) ) {

/**
 * Twoot_Metabox_Generator Class
 *
 * Contains the main functions for Metaboxes.
 *
 * @class Twoot_Metabox_Generator
 * @version	1.0.0
 * @since 1.0.0
 * @package	ThemeWoot
 * @author ThemeWoot Team 
 */

class Twoot_Metabox_Generator {

	var $config;
	var $options;
	var $saved_options;
	var $generator;

	/**
	 * Constructor
	 * 
	 * @param string $config
	 * @param array $options
	 */
	function Twoot_Metabox_Generator($config, $options) {

		$this->generator = new Twoot_Generator();		
		$this->config = $config;
		$this->options = $options;
		
		add_action('admin_menu', array($this, 'create'));
		add_action('save_post', array($this, 'save'));
	}


	function create() {
		if (function_exists('add_meta_box')) {
			if (! empty($this->config['callback']) && function_exists($this->config['callback'])) {
				$callback = $this->config['callback'];
			} else {
				$callback = array($this, 'render');
			}
			if(is_array($this->config['pages'])){
				foreach($this->config['pages'] as $page) {
					add_meta_box($this->config['id'], $this->config['title'], $callback, $page, $this->config['context'], $this->config['priority']);
				}
			}
		}
	}
	// create


	function save($post_id) {
		if (! isset($_POST[$this->config['id'] . '_noncename'])) {
			return $post_id;
		}
		
		if (! wp_verify_nonce($_POST[$this->config['id'] . '_noncename'], plugin_basename(__FILE__))) {
			return $post_id;
		}
		
		if ('page' == $_POST['post_type']) {
			if (! current_user_can('edit_page', $post_id)) {
				return $post_id;
			}
		} else {
			if (! current_user_can('edit_post', $post_id)) {
				return $post_id;
			}
		}
		
		if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
			return $post_id;
		}
		
		foreach($this->options as $option) {
			if (isset($option['id']) && ! empty($option['id'])) {
				
				if (isset($_POST[$option['id']])) {
					switch ($option['type']) {
						case 'multiselect':
							if(isset($option['chosen_order']) && $option['chosen_order']){
								if(empty($_POST['_'.$option['id']])){
									$value = array();
								}else{
									$value = explode(",",$_POST['_'.$option['id']]);
								}
							}else{
								if(empty($_POST[$option['id']])){
									$value = array();
								}else{
									$value = $_POST[$option['id']];
								}
							}		
							break;
						
						default:
							$value = $_POST[$option['id']];
					}
				} else {
					$value = false;
				}
				
				if (get_post_meta($post_id, $option['id']) == "") {
					add_post_meta($post_id, $option['id'], $value, true);
				} elseif ($value != get_post_meta($post_id, $option['id'], true)) {
					update_post_meta($post_id, $option['id'], $value);
				} elseif ($value == "") {
					delete_post_meta($post_id, $option['id'], get_post_meta($post_id, $option['id'], true));
				}

				// Cache the custom css
				twoot_get_frontend_func('cache_css');
			}
		}
	}
	// save


	function render() {
		foreach($this->options as $option) {
			$this->renderOption($option);
		}
		
		echo '<input type="hidden" name="' . $this->config['id'] . '_noncename" id="' . $this->config['id'] . '_noncename" value="' . wp_create_nonce(plugin_basename(__FILE__)) . '" />';
	}
	// render


	function renderOption($option){
		global $post;
		if (isset($option['id'])) {
			$value = get_post_meta($post->ID, $option['id'], true);
			if ($value != "") {
				$option['value'] = $value;
			}else{
				$option['value'] = $option['std'];
			}
		}

		echo '<div class="theme-metabox-table">';
		echo '<div class="theme-metabox-box clearfix">';

		if (method_exists($this->generator, $option['type'])) { 
			echo '<div class="theme-metabox-name">';
			echo '<label for="' . $option['name'] . '">' . $option['name'] . '</label>';
			if (isset($option['desc'])) { echo '<span class="theme-metabox-desc theme-metabox-block">'.$option['desc'].'</span>'; }
			echo '</div>';

			echo '<div class="theme-metabox-content">';
			$this->generator->$option['type']($option);
			echo '</div>';

		}elseif (method_exists($this, $option['type'])) {
			$this->$option['type']($option);
		}

		echo '</div><div class="clear"></div>';
		echo '</div>';
	}
	// render option

}

}
?>