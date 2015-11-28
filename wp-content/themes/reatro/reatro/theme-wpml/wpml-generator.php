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


if ( ! class_exists( 'Twoot_WPML_Generator' ) ) {
/**
 * WPML Class
 *
 * Contains the main functions for WPML
 *
 * @class Twoot_WPML_Generator
 * @version	1.0.0
 * @since 1.0.0
 * @package	ThemeWoot
 * @author ThemeWoot Team 
 */
class Twoot_WPML_Generator {

	/**
	* WPML
	*
	* @since   1.0.0
	*/
	function language_switcher() {
		
		$languages = icl_get_languages('skip_missing=0&orderby=id');
		if(is_array($languages) && !empty($languages)) {

			$html = '<div class="wpml-language-switcher">';
			foreach($languages as $lang) {
				if($lang['active']) {
					$html .= '<div class="actived-language">';
					$html .= '<a href="'.$lang['url'].'">';
					$html .= '<span class="language-flag"><img title="'.$lang['native_name'].'" src="'.$lang['country_flag_url'].'" /></span>';
					//$html .= '<span class="language-native">'.$lang['native_name'].'</span>';
					$html .= '<span class="language-translated">'.$lang['translated_name'].'</span>';
					$html .= '</a>';
					$html .= '</div>';
				}
			}

			$html .= '<ul class="wpml-language-list">';
			foreach($languages as $lang) {
				if(!$lang['active']) {
					$html .= '<li class="language-'.$lang['language_code'].'">';
					$html .= '<a href="'.$lang['url'].'">';
					$html .= '<span class="language-flag"><img title="'.$lang['native_name'].'" src="'.$lang['country_flag_url'].'" /></span>';
					//$html .= '<span class="language-native">'.$lang['native_name'].'</span>';
					$html .= '<span class="language-translated">'.$lang['translated_name'].'</span>';
					$html .= '</a>';
					$html .= '</li>';
				}
			}
			$html .= '</ul>';
			$html .= '</div>';

			return $html;
		}
	}

}


/*
* Get wpml generator
* 
*/
function twoot_wpml_generator($function) {
	global $_Twoot_WPML_Generator;
	if($_Twoot_WPML_Generator==null){
		$_Twoot_WPML_Generator = new Twoot_WPML_Generator;
	}
	$args = array_slice( func_get_args(), 1 );
	return call_user_func_array(array( &$_Twoot_WPML_Generator, $function ), $args );
}

}
?>