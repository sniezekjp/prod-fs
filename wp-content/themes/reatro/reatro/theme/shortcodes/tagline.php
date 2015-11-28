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

if ( !function_exists( 'shortcode_tagline' ) ) {

	function shortcode_tagline($atts, $content = null) {
		extract(shortcode_atts(
			array(
				'title' => 'Title',
				'link' => '',
				'button' => ''
		), $atts));

		$html = '<div class="shortcode-tagline">';
		$html .= '<div class="tagline-wrap">';

		if($link) {
			$html .= '<h5 class="title"><a href="'.$link.'" rel="external">'.$title.'</a></h5>';
		}else {
			$html .= '<h5 class="title">'.$title.'</h5>';
		}

		$html .= '<div class="content">'.do_shortcode($content).'</div>';

		if($link && $button) {
			$html .= '<div class="goto"><a href="'.$link.'" rel="external" class="button button-medium button-active">'.$button.'</a></div>';
		}

		$html .= '</div>';
		$html .= '</div>';
	
		return $html;
	}

	add_shortcode('tagline', 'shortcode_tagline');
}
?>