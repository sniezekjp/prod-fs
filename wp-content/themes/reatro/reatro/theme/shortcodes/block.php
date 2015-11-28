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

/*
* Block
*/

if ( !function_exists( 'shortcode_block' ) ) {

	function shortcode_block($atts, $content = null) {
		extract(shortcode_atts(
			array(
				'ids' => '',
		), $atts));

		$ids = explode(',', $ids);

		if(is_array($ids) && !empty($ids)) {

			$output = '';

			foreach($ids as $id) {
				$output .= '<div id="block-'.$id.'" class="shortcode-block" style="'.shortcode_block_css($id).'">';
				$output .= '<div class="container">';
				$output .= '<div class="inner">';
				$output .= do_shortcode(get_post($id)->post_content);
				$output .= '</div>';
				$output .= '</div>';
				$output .= '</div>';
			}

			return $output;	
		}
	}

	add_shortcode('block', 'shortcode_block');



	function shortcode_block_css($id) {
		$pt = twoot_get_frontend_func('meta', 'padding_top', $id);
		$pb = twoot_get_frontend_func('meta', 'padding_bottom', $id);
		$bg_color = twoot_get_frontend_func('meta', 'background_color', $id);
		$bg_image = twoot_get_frontend_func('meta', 'background_image', $id);
		$bg_repeat = twoot_get_frontend_func('meta', 'background_repeat', $id);
		$bg_horizontal = twoot_get_frontend_func('meta', 'background_horizontal', $id);
		$bg_vertical = twoot_get_frontend_func('meta', 'background_vertical', $id);
		$bg_attachment = twoot_get_frontend_func('meta', 'background_attachment', $id);
		

		$output = $pt? 'padding-top:'.$pt.'px;':'';
		$output .= $pb? 'padding-bottom:'.$pb.'px;':'';
		$output .= $bg_color? 'background-color:'.$bg_color.';':'';

		if($bg_image) {
			$output .= $bg_image? 'background-image:url('.$bg_image.');':'';
			$output .= $bg_repeat? 'background-repeat:'.$bg_repeat.';':'';
			$output .= $bg_horizontal && $bg_vertical? 'background-position:'.$bg_horizontal.' '.$bg_vertical.';':'';
			$output .= $bg_attachment? 'background-attachment:'.$bg_attachment.';':'';
		}

		return $output;
	}

}
?>