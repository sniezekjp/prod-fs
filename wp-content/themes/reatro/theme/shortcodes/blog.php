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

if ( !function_exists( 'shortcode_blog' ) ) {
	function shortcode_blog($atts, $content = null) {
		extract(shortcode_atts(array(
			'type'	=> 'blog_cat',
			'counts' => '5',
			'cats'=> '',
			'posts' => '',
			'order' => 'DESC',
			'orderby' => 'date'
		), $atts));


		if( ! in_array($type, array('blog_cat', 'blog_tag'), true) ) {
			return $html = '<div class="the-not-posts">'.esc_attr__('Hi, please check the type option, the current type is not match!', 'Twoot_Toolkit').'</div>';
		}


		switch($type) {
			case 'blog_cat': $taxonomy='category'; break;
			case 'blog_tag': $taxonomy='post_tag'; break;
		}


		$q = new Twoot_Template_Blog(array(
			'counts' => $counts,
			'cats'=> $cats,
			'posts' => $posts,
			'order' => $order,
			'orderby' => $orderby,
			'post_type'	=> 'post',
			'taxonomy'  => $taxonomy
		));

		$html = $q->blog();

		return $html;
	}

	add_shortcode('blog', 'shortcode_blog');
}
?>