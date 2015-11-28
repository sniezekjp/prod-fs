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

if ( !function_exists( 'shortcode_testimonial_carousel' ) ) {

	function shortcode_testimonial_carousel($atts, $content = null) {

		extract(shortcode_atts(array(
			'auto' => 'true',
			'speed' => '800',
			'pause' => '5000',
			'mode' => 'fade'
		), $atts));

		global $testimonials;
		$testimonials = array();
		$pager_count = -1;
		do_shortcode($content);


		$html = '<div class="shortcode-testimonial-carousel">';

		$html .= '<ul class="testimonial-carousel" data-auto="'.$auto.'" data-speed="'.$speed.'" data-pause="'.$pause.'" data-mode="'.$mode.'">';

		foreach( $testimonials as $testimonial ) {

			$html .= '<li>';

			if($testimonial['content']) {
				$html .= '<div class="content clearfix">'.do_shortcode($testimonial['content']).'</div>';
			}

			if($testimonial['name'] && $testimonial['role']) {

				$html .= '<div class="item-header">';
				if($testimonial['name']) { $html .= '<h3 class="name">'.$testimonial['name'].'</h3>'; }
				if($testimonial['role']) { $html .= '<div class="role">'.$testimonial['role'].'</div>'; }
				$html .= '</div>';

			}

			$html .= '</li>';

		}

		$html .= '</ul>';

		$html .= '<ul id="bx-gallery-pager">';

		foreach ( $testimonials as $testimonial ) {
			$pager_count++;

			if($testimonial['avatar']) {
				$html .= '<li><a data-slide-index="'.$pager_count.'" href="">'.twoot_get_frontend_func('resize_thumbnail_by_url', $testimonial['avatar'], '', 150, 150, true).'</a></li>';
			}
		}

		$html .= '</ul>';

		$html .= '</div>';
		
		return $html;

	}

	function shortcode_testimonial_item($atts, $content = null) {
		extract(shortcode_atts(array(
			'avatar' => '',
			'name' => '',
			'role' => ''
		), $atts));

		global $testimonials;

		$testimonials[] = array(
			'avatar' => $avatar,
			'name' => $name,
			'role' => $role,
			'content' => $content
		);
	}

	add_shortcode('testimonial_carousel', 'shortcode_testimonial_carousel');
	add_shortcode('testimonial_item', 'shortcode_testimonial_item');

}
?>