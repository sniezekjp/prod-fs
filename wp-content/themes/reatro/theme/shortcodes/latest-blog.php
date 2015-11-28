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

if ( !function_exists( 'shortcode_latest_blog' ) ) {

	function shortcode_latest_blog($atts, $content = null) {

		extract(shortcode_atts(array(
			'title' => 'Latest Blog',
			'top_counts'=> '1',
			'last_counts'=> '3',
			'cats'=> '',
			'posts' => ''
		), $atts));

		global $post;

		// Get Query
		$top_query = new Twoot_Query(array(
			'counts' => $top_counts,
			'cats'=> $cats,
			'posts' => $posts,
			'order' => 'DESC',
			'orderby' => 'date',
			'post_type'	=> 'post',
			'taxonomy'  => 'category'
		));

		$last_query = new Twoot_Query(array(
			'counts' => ($last_counts+1),
			'cats'=> $cats,
			'posts' => $posts,
			'order' => 'DESC',
			'orderby' => 'date',
			'post_type'	=> 'post',
			'taxonomy'  => 'category'
		));

		$do_top_query = new WP_Query($top_query->do_template_query());
		$do_last_query = new WP_Query($last_query->do_template_query());

		$count=0;

		$html = '<div class="shortcode-latest-blog">';
		$html .= '<h5 class="sub-title">'.$title.'</h5>';
		$html .= '<div class="outer clearfix">';

		$html .= '<div class="the-top-loop column six">';
		$html .= '<div class="inner">';
		$html .= '<ul>';
		while( $do_top_query->have_posts() ) {
			$do_top_query->the_post();
			$do_not_duplicate[] = $post->ID;

			$html .= '<li class="post-item clearfix">';
			$html .= twoot_generator( 'load_template', 'loop-top-latest-blog' );
			$html .= '</li>';
		}
		$html .= '</ul>';
		$html .= '</div>';
		$html .= '</div>';
		wp_reset_query();


		$html .= '<div class="the-last-loop column six">';
		$html .= '<div class="inner">';
		$html .= '<ul>';
		while( $do_last_query->have_posts() ) {
			$do_last_query->the_post();
			if (in_array($post->ID, $do_not_duplicate)) { continue; }

			// Num class
			$count++;
			$num_class=$do_last_query->post_count%$count==0? 'odd':'even';

			$html .= '<li class="post-item '.$num_class.' clearfix">';
			$html .= twoot_generator( 'load_template', 'loop-last-latest-blog' );
			$html .= '</li>';
		}
		$html .= '</ul>';
		$html .= '</div>';
		$html .= '</div>';
		wp_reset_query();

		$html .= '</div>';
		$html .= '</div>';

		return $html;

	}

	add_shortcode('latest_blog', 'shortcode_latest_blog');
}
?>