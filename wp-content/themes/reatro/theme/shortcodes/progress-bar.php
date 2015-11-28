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

if ( !function_exists( 'shortcode_progress_bar' ) ) {

	function shortcode_progress_bar($atts, $content = null) {
		extract(shortcode_atts(
			array(
				'title' => 'Title',
				'percent' => '80'
		), $atts));

		$html = '<div class="shortcode-progress-bar progress-bar" data-percent="'.$percent.'">';
		$html .= '<h5 class="title">'.$title.'<span>'.$percent.'%</span></h5>';
		$html .= '<span class="percentage"></span>';
		$html .= '<div class="bar"></div>';
		$html .= '</div>';
	
		return $html;
	}

	add_shortcode('progress_bar', 'shortcode_progress_bar');
}
?>