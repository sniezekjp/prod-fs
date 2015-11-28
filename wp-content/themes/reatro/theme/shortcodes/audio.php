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

if ( !function_exists( 'shortcode_audio' ) ) {
	function shortcode_audio($atts, $content = null) {
		extract(shortcode_atts(
			array(
				'soundcloud_url' => '',
				'height' => 166,
				'embed' => ''
		), $atts));

		$tag='iframe';
		$id = trim(str_replace( 'http://api.soundcloud.com/tracks/', '', $soundcloud_url ));

		$html = '<div class="shortcode-audio fitvids">';
		if($embed) {
			$html .= $embed;
		}else{
			$html .= '<'.$tag.' width="100%" height="'.$height.'" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=http://api.soundcloud.com/tracks/'.$id.'"></'.$tag.'>';
		}
		$html .= '</div>';

		return $html;
	}

	add_shortcode('audio', 'shortcode_audio');
}
?>