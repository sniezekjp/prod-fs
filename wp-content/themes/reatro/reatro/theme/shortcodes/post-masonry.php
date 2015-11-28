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


if ( !function_exists( 'shortcode_post_masonry' ) )
{
	function shortcode_post_masonry($atts, $content = null)
	{
		extract(shortcode_atts(
			array(
				'ids' => '',
				'width' => '460',
				'height' => '9999',
				'crop' => 'no',
				'lightbox' => 'yes',
				'columns' => 3
		), $atts));

		$ids = explode(',', $ids); 
		$crop = $crop=='yes'? true:false;

		if(is_array($ids) && !empty($ids)) {

			$count = 0;

			// Set the columns
			switch($columns) {
				case 2: $grid = 'six'; break;
				case 3: $grid = 'four'; break;
				case 4: $grid = 'three'; break;
			}

			$html = '<div class="shortcode-post-masonry post-masonry-wrapper outer">';
			$html .= '<ul class="filter-items clearfix">';

			foreach ($ids as $id) {
				$count++;
				$desc=trim(strip_tags(get_post($id)->post_content));
				$caption=trim(strip_tags(get_post($id)->post_excerpt));
				$tilte=$caption!=false? ' title="'.$caption.'"':'';
				$alt=trim(strip_tags(get_post_meta($id, '_wp_attachment_image_alt', true)));
				$class='class="fancybox-gallery"';
				$rel=count($ids)>1? ' rel="gallery-'.get_the_ID().'"':'';

				$html .= '<li class="img-preload img-hover item column '.$grid.'">';
				$html .= '<div class="inner">';

				if($lightbox==true) {
					$html .= '<a href="'.twoot_get_frontend_func('thumbnail_url', $id).'" '.$class.$rel.$tilte.'>'.twoot_get_frontend_func('resize_thumbnail', $id, $caption, $width, $height, $crop).'<div class="overlay"></div></a>';
				} else {
					$html .= twoot_get_frontend_func('resize_thumbnail', $id, $caption, $width, $height, $crop).'<div class="overlay"></div>';
				}

				if($caption) { $html .= '<div class="caption"><span>'.$caption.'</span></div>'; }

				$html .= '</div>';
				$html .= '</li>';
			}

			$html .= '</ul>';
			$html .= '</div>';

			return $html;
		}
	}

	add_shortcode('post_masonry', 'shortcode_post_masonry');
}
?>