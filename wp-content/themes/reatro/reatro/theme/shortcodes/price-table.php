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

if ( !function_exists( 'shortcode_price_table' ) ) {

	function shortcode_price_table( $atts, $content = null) {
		extract(shortcode_atts(array(
			'margin' => 'yes'
		), $atts));

		$table_class=$margin=='yes'? 'outer':'no-margin';

		global $pricing_table_args;
		$pricing_table_args=array();
		$count=0;
		do_shortcode($content);

		$html = '<div class="shortcode-price-table '.$table_class.' clearfix">';

		foreach( $pricing_table_args as $table ) {
			$count++;
			$counts=count($pricing_table_args);
			$class=$count==1? ' first':'';
			$num_class=$counts%$count==0? ' odd':' even';
			$current_class=$table['active']=='yes' ?'active':'dark';

			switch($counts)
			{
				case 1: $grid = 'twelve'; break;
				case 2: $grid = 'six'; break;
				case 3: $grid = 'four'; break;
				case 4: $grid = 'three'; break;
			}

			$html .= '<div class="table-item column '.$current_class.' '.$grid.$class.$num_class.'">';
			$html .= '<div class="inner">';
			$html .= '<h3 class="title">'.$table['title'].'</h3>';
			$html .= '<div class="price">'.$table['currency'].$table['price'].'<span class="sub-price">.'.$table['sub_price'].'</span><em class="time">'.$table['time'].'</em></div>';
			$html .= '<div class="content">'.do_shortcode($table['content']).'</div>';
			if($table['button']&&$table['button_link'])
			{
				$html .= '<div class="btn"><a href="'.$table['button_link'].'" class="button button-medium button-'.$current_class.'" rel="external">'.$table['button'].'</a></div>';
			}
			$html .= '</div>';
			$html .= '</div>';
		}

		$html .= '</div>';

		return $html;
	}

	function shortcode_price_table_item( $atts, $content = null) {
		extract(shortcode_atts(array(
			'title' => 'Your title',
			'currency' => '$',
			'price' => '29',
			'sub_price' => '95',
			'time' => 'per month',
			'active' => 'no',
			'button' => 'Purchase',
			'button_link' => ''
		), $atts));

		global $pricing_table_args;
		$pricing_table_args[] = array(
			'title' => $title,
			'currency' => $currency,
			'price' => $price,
			'sub_price' => $sub_price,
			'time' => $time,
			'active' => $active,
			'button' => $button,
			'button_link' => $button_link,
			'content' => $content
		);
	}

	add_shortcode('price_table', 'shortcode_price_table');
	add_shortcode('price_table_item', 'shortcode_price_table_item');
}
?>