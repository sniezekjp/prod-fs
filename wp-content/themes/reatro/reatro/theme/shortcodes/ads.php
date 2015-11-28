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


if ( !function_exists( 'shortcode_ads' ) )
{
	function shortcode_ads($atts, $content = null)
	{
		global $ad_args;
		$ad_args=array();
		$count=0;
		do_shortcode($content);

		$html = '<div class="shortcode-ads outer clearfix">';

		foreach( $ad_args as $ad ) {
			$count++;
			$counts=count($ad_args);
			$num_class=$counts%$count==0? ' odd':' even';

			switch($counts) {
				case 1: $grid = 'twelve'; break;
				case 2: $grid = 'six'; break;
				case 3: $grid = 'four'; break;
				case 4: $grid = 'three'; break;
			}

			$html .= '<div class="ad-item column '.$grid.$num_class.'">';
			$html .= '<div class="inner">';

			$html .= '<div class="img img-preload img-hover">';
			if($ad['img_url']) { 
				$html .= twoot_get_frontend_func('resize_thumbnail_by_url', $ad['img_url'], $ad['title'], $ad['img_width'], $ad['img_height'], true); 
				$html .= '<div class="overlay"></div>';
			}

			if($ad['title']) { 
				if($ad['link']) { 
					$html .= '<h3 class="title"><span><a href="'.$ad['link'].'">'.$ad['title'].'</a></span></h3>'; 
				} else {
					$html .= '<h3 class="title"><span>'.$ad['title'].'</span></h3>'; 
				}
			}
			$html .= '</div>';

			if($ad['content']) { $html .= '<div class="desc">'.$ad['content'].'</div>'; }

			$html .= '</div>';
			$html .= '</div>';
		}

		$html .= '</div>';

		return $html;
		
	}

	function shortcode_ad($atts, $content = null)
	{
		extract(shortcode_atts(array(
			'title' => 'Your title',
			'img_url' => '',
			'img_width' => 460,
			'img_height' => 245,
			'link' => ''
		), $atts));

		global $ad_args;
		$ad_args[] = array(
			'title' => $title,
			'img_url' => $img_url,
			'img_width' => $img_width,
			'img_height' => $img_height,
			'link' => $link,
			'content' => $content
		);
	}

	add_shortcode('ads', 'shortcode_ads');
	add_shortcode('ad', 'shortcode_ad');
}
?>