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

if ( !function_exists( 'shortcode_product_carousel' ) ) {
	function shortcode_product_carousel($atts, $content = null) {

		extract(shortcode_atts(array(
			'title' => 'Recent Products',
			'type'	=> 'product_cat',
			'counts' => '16',
			'cats'=> '',
			'posts' => '',
			'order' => 'DESC',
			'orderby' => 'date',
			'auto' => 'false',
			'speed' => '800',
			'pause' => '5000',
			'move_slides' => '4'
		), $atts));

		global $woocommerce;
		$id=twoot_get_frontend_func('rand_num', 5);

		if( ! in_array($type, array('product_cat', 'product_tag'), true) ) {
			return $html = '<div class="the-not-posts">'.esc_attr__('Hi, please check the type option, the current type is not match!', 'Twoot_Toolkit').'</div>';
		}

		// Get Query
		$query = new Twoot_Query(array(
			'counts' => $counts,
			'cats'=> $cats,
			'posts' => $posts,
			'order' => $order,
			'orderby' => $orderby,
    		'post_type' 	 => 'product',
			'taxonomy'  => $type
		));

		$products = new WP_Query($query->do_template_query());

		if ( $products->have_posts() ) {
			$html = '<div class="the-carousel-list the-product-list">';
			$html .= '<h5 class="carousel-title">'.$title.'</h5>';
			$html .= '<ul id="post-carousel-'.$id.'" class="products clearfix">';

			while ( $products->have_posts()) {
				$products->the_post();
				$html .= twoot_generator( 'load_template', 'loop-product-carousel' );
			}
			wp_reset_query();

			$html .= '</ul>';
			$html .= '</div>';

			$html .= twoot_generator('carousel_script', $id, $auto, $speed, $pause, $move_slides, $tag='d');
		}else{
			$html = '<div class="the-not-posts">'.esc_attr__('Hi, please check the type option, the current type is not match!', 'Twoot_Toolkit').'</div>';
		}

		return $html;
	}

	add_shortcode('product_carousel', 'shortcode_product_carousel');
}

?>