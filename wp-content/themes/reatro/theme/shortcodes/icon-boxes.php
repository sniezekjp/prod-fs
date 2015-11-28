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

if ( !function_exists( 'shortcode_icon_boxes' ) ) {
	function shortcode_icon_boxes( $atts, $content = null) {
		extract(shortcode_atts(array(
			'margin' => 'yes'
		), $atts));

		$box_class=$margin=='yes'? 'outer':'no-margin';

		global $box_args;
		$box_args=array();
		$count=0;
		do_shortcode($content);

		$html = '<div class="shortcode-icon-box '.$box_class.' clearfix">';

		foreach( $box_args as $box ) {
			$count++;
			$counts=count($box_args);
			$class=$count==1? ' first':'';
			$num_class=$counts%$count==0? ' odd':' even';

			switch($counts) {
				case 1: $grid = 'twelve'; break;
				case 2: $grid = 'six'; break;
				case 3: $grid = 'four'; break;
				case 4: $grid = 'three'; break;
			}

			$html .= '<div class="icon-box-item column '.$grid.$class.$num_class.'">';
			$html .= '<div class="inner">';
			$html .= '<div class="icon"><i class="'.$box['icon'].'"></i></div>';
			if($box['link']) {
				$html .= '<h3 class="title"><a href="'.$box['link'].'">'.$box['title'].'</a></h3>';
			}else{
				$html .= '<h3 class="title">'.$box['title'].'</h3>';
			}
			$html .= '<div class="content">'.do_shortcode($box['content']).'</div>';
			$html .= '</div>';
			$html .= '</div>';
		}

		$html .= '</div>';

		return $html;
	}

	function shortcode_icon_box( $atts, $content = null) {
		extract(shortcode_atts(array(
			'title' => 'Your title',
			'icon' => '',
			'link' => ''
		), $atts));

		global $box_args;
		$box_args[] = array(
			'title' => $title,
			'icon' => $icon,
			'link' => $link,
			'content' => $content
		);
	}

	add_shortcode('icon_boxes', 'shortcode_icon_boxes');
	add_shortcode('icon_box', 'shortcode_icon_box');
}
?>