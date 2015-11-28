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

if ( !function_exists( 'shortcode_testimonial' ) ) {

	function shortcode_testimonial($atts, $content = null) {
		extract(shortcode_atts(array(
			'avatar' => '',
			'name' => '',
			'role' => ''
		), $atts));

		$html = '<div class="shortcode-testimonial clearfix">';
		if($avatar) { $html .= '<div class="avatar">'.twoot_get_frontend_func('resize_thumbnail_by_url', $avatar, '', 150, 150, true).'</div>'; }
		$html .= '<div class="content">';
		$html .= '<div class="text">'.do_shortcode($content).'</div>';
		if($name && $role) {
			$html .= '<div class="item-header">';
			if($name) { $html .= '<h3 class="name">'.$name.'</h3>'; }
			if($role) { $html .= '<div class="role">'.$role.'</div>'; }
			$html .= '</div>';
		}
		$html .= '</div>';
		$html .= '</div>';
		
		return $html;
	}

	add_shortcode('testimonial', 'shortcode_testimonial');

}
?>