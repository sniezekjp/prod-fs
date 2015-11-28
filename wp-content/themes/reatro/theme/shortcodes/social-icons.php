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


if ( !function_exists( 'shortcode_social_icons' ) ) {

	function shortcode_social_icons($atts, $content = null) {
		global $icons_array;
		$icons_array = array();

		do_shortcode($content);

		$html = '<div class="shortcode-social-icons clearfix">';

		foreach( $icons_array as $icon ) {
			$html .= '<a href="'.$icon['link'].'" title="'.ucwords($icon['type']).'" class="'.$icon['type'].'" rel="external"><i class="icon twoot-icon-'.$icon['type'].'"></i></a>';
		}

		$html .= '</div>';
		
		return $html;
	}

	function shortcode_social_icon($atts, $content = null) {
		extract(shortcode_atts(array(
			'type' => '',
			'link' => '#'
		), $atts));

		global $icons_array;

		$icons_array[] = array(
			'type' => $type,
			'link' => $link
		);
	}

	add_shortcode('social_icons', 'shortcode_social_icons');
	add_shortcode('social_icon', 'shortcode_social_icon');
}
?>