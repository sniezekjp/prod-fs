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

if( ! class_exists( 'Twoot_Template_Blog') )
{
/**
 * Twoot_Template_Blog Class
 *
 * @class Twoot_Template_Blog
 * @version	1.0
 * @since 1.0
 * @package ThemeWoot
 * @author ThemeWoot Team 
 */
class Twoot_Template_Blog {

	private $atts;
	private $entries;

	/**
	* Constructor for the blog
	* @since     1.0
	* @updated   1.0
	*
	*/
	function __construct($atts = array()) 
	{
		$this->atts = shortcode_atts(array(
			'counts' => '5',
			'cats'=> '',
			'posts' => '',
			'order' => 'DESC',
			'orderby' => 'date',
			'post_type'	=> 'post',
			'taxonomy'  => 'category'
		), $atts);
	}


	/**
	* Blog
	* @since     1.0
	* @updated   1.0
	*
	*/
	public function blog()
	{
		extract($this->atts);

		// Get Query
		$query = new Twoot_Query(array(
			'counts' => $counts,
			'cats'=> $cats,
			'posts' => $posts,
			'order' => $order,
			'orderby' => $orderby,
			'post_type'	=> $post_type,
			'taxonomy'  => $taxonomy
		));

		$do_query = new WP_Query($query->do_template_query());
		$this->entries=$do_query;

		// Check if it has posts
		if(empty($this->entries) || empty($this->entries->posts)) 
		{
			return $html = '<div class="the-not-posts">'.esc_attr__('Sorry, there is no posts in the current categories, please add some items in the dashboard!', 'Twoot').'</div>'; 
		}

		// Output HTML
		$html = '<div class="post-blog">';
		$html .= '<ul class="the-blog-list side-blog">';
		while( $this->entries->have_posts() ) {
			$this->entries->the_post();

			$html .= '<li class="post-item">';
			$html .= twoot_generator( 'load_template', 'loop-blog-default' );
			$html .= '</li>';
		}
		$html .= '</ul>';
		$html .= '</div>';
		wp_reset_query();
		$html .= twoot_generator('pagination', $this->entries);

		return $html;
	}




	/**
	* Full Blog
	* @since     1.0
	* @updated   1.0
	*
	*/
	public function full_blog()
	{
		extract($this->atts);

		// Get Query
		$query = new Twoot_Query(array(
			'counts' => $counts,
			'cats'=> $cats,
			'posts' => $posts,
			'order' => $order,
			'orderby' => $orderby,
			'post_type'	=> $post_type,
			'taxonomy'  => $taxonomy
		));

		$do_query = new WP_Query($query->do_template_query());
		$this->entries=$do_query;

		// Check if it has posts
		if(empty($this->entries) || empty($this->entries->posts)) 
		{
			return $html = '<div class="the-not-posts">'.esc_attr__('Sorry, there is no posts in the current categories, please add some items in the dashboard!', 'Twoot').'</div>'; 
		}

		// Output HTML
		$html = '<div class="post-full-blog">';
		$html .= '<ul class="the-blog-list full-blog">';
		while( $this->entries->have_posts() ) {
			$this->entries->the_post();

			$html .= '<li class="post-item">';
			$html .= twoot_generator( 'load_template', 'loop-blog-full' );
			$html .= '</li>';
		}
		$html .= '</ul>';
		$html .= '</div>';
		wp_reset_query();
		$html .= twoot_generator('pagination', $this->entries);

		return $html;
	}
}
}
?>