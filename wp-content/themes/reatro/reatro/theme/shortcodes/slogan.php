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

if ( !function_exists( 'shortcode_slogan' ) ) {

	function shortcode_slogan($atts, $content = null) {
		extract(shortcode_atts(
			array(
				'title' => 'Title',
				'link' => ''
		), $atts));

		$html = '<div class="shortcode-slogan">';
		$html .= '<div class="slogan-wrap">';

		if($link) {
			$html .= '<h5 class="title"><a href="'.$link.'" rel="external">'.$title.'</a></h5>';
		}else {
			$html .= '<h5 class="title">'.$title.'</h5>';
		}

		$html .= '<div class="content">'.do_shortcode($content).'</div>';

		$html .= '</div>';
		$html .= '</div>';
	
		return $html;
	}

	add_shortcode('slogan', 'shortcode_slogan');
}
?>