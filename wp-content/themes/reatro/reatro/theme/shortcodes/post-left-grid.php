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
if ( !function_exists( 'shortcode_post_left_grid' ) ) {

	function shortcode_post_left_grid($atts, $content = null) {
		extract(shortcode_atts(array(
			'type'	=> 'portfolio_cat',
			'columns' => '4',
			'counts' => '12',
			'cats'=> '',
			'posts' => '',
			'order' => 'DESC',
			'orderby' => 'date',
			'paging' => 'yes'
		), $atts));

		if( ! in_array($type, array('portfolio_cat', 'portfolio_tag', 'product_cat', 'product_tag', 'blog_cat', 'blog_tag'), true) ) {
			return $html = '<div class="the-not-posts">'.esc_attr__('Hi, please check the type option, the current type is not match!', 'Twoot_Toolkit').'</div>';
		}

		switch($type)
		{
			case 'blog_cat': $post_type='post'; $taxonomy='category'; break;
			case 'blog_tag': $post_type='post'; $taxonomy='post_tag'; break;
			case 'portfolio_cat': $post_type='portfolio'; $taxonomy='portfolio_cat'; break;
			case 'portfolio_tag': $post_type='portfolio'; $taxonomy='portfolio_tag'; break;
			case 'product_cat': $post_type='product'; $taxonomy='product_cat'; break;
			case 'product_tag': $post_type='product'; $taxonomy='product_tag'; break;
		}

		$q = new Twoot_Template_Grid(array(
			'columns' => $columns,
			'counts' => $counts,
			'cats'=> $cats,
			'posts' => $posts,
			'order' => $order,
			'orderby' => $orderby,
			'paging' => $paging,
			'post_type'	=> $post_type,
			'taxonomy'  => $taxonomy
		));

		return $q->left_grid();
	}

	add_shortcode('post_left_grid', 'shortcode_post_left_grid');
}

?>