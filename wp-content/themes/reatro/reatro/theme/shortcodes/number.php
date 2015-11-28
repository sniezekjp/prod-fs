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

if ( !function_exists( 'shortcode_number' ) ) {

	function shortcode_number($atts, $content = null) {
		extract(shortcode_atts(
			array(
				'title' => 'Title',
				'percent' => '80'
		), $atts));

		$html = '<div class="shortcode-number number-counter" data-percent="'.$percent.'">';
		$html .= '<span class="count"></span>';
		$html .= '<h5 class="title">'.$title.'</h5>';
		$html .= '</div>';
	
		return $html;
	}

	add_shortcode('number', 'shortcode_number');
}
?>