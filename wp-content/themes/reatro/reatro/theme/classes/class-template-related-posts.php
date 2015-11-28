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

if( ! class_exists( 'Twoot_Template_Related_Posts') )
{
/**
 * Twoot_Template_Related_Posts Class
 *
 * @class Twoot_Template_Related_Posts
 * @version	1.0
 * @since 1.0
 * @package ThemeWoot
 * @author ThemeWoot Team 
 */
class Twoot_Template_Related_Posts {

	private $atts;
	private $entries;


	/**
	* Constructor for the carousel
	* @since     1.0
	* @updated   1.0
	*
	*/
	function __construct($atts = array()) 
	{
		$this->atts = shortcode_atts(array(
			'layout' => '',
			'title' => '',
			'counts' => '16',
			'posts' => '',
			'order' => 'DESC',
			'orderby' => 'date',
			'post_type'	=> 'portfolio',
			'taxonomy'  => 'portfolio_cat'
		), $atts);
	}


	/**
	* Carousel
	* @since     1.0
	* @updated   1.0
	*
	*/
	public function carousel()
	{
		extract($this->atts);

		// Get Query
		$query = new Twoot_Query(array(
			'counts' => $counts,
			'posts' => $posts,
			'order' => $order,
			'orderby' => $orderby,
			'post_type'	=> $post_type,
			'taxonomy'  => $taxonomy
		));

		$do_query = new WP_Query($query->do_related_query());
		$this->entries=$do_query;

		// Check if it has posts
		if(empty($this->entries) || empty($this->entries->posts)) return;

		// Output HTML
		$html = '<div class="the-carousel-list the-grid-list related-works pt mt inner">';
		$html .= '<h5 class="carousel-title">'.$title.'</h5>';
		$html .= '<ul id="related-post-carousel" class="clearfix">';
		while( $this->entries->have_posts() ) {
			$this->entries->the_post();
			$html .= '<li class="post-item column">';
			$html .= twoot_generator( 'load_template', 'loop-portfolio-carousel' );
			$html .= '</li>';
		}
		wp_reset_query();
		$html .= '</ul>';
		$html .= '</div>';

		return $html;
	}


	/**
	* Grid
	* @since     1.0
	* @updated   1.0
	*
	*/
	public function grid()
	{
		extract($this->atts);

		// Get Query
		$query = new Twoot_Query(array(
			'counts' => $counts,
			'posts' => $posts,
			'order' => $order,
			'orderby' => $orderby,
			'post_type'	=> $post_type,
			'taxonomy'  => $taxonomy
		));

		$do_query = new WP_Query($query->do_related_query());
		$this->entries=$do_query;

		// Check if it has posts
		if(empty($this->entries) || empty($this->entries->posts)) return;

		// Output HTML
		$html = '<div class="the-carousel-list the-grid-list related-works pt mt inner">';
		$html .= '<h5 class="carousel-title">'.$title.'</h5>';
		$html .= '<div class="outer">';
		$html .= '<ul class="filter-items clearfix">';
		while( $this->entries->have_posts() ) {
			$this->entries->the_post();
			$html .= '<li class="item column three">';
			$html .= '<div class="inner">';
			$html .= twoot_generator( 'load_template', 'loop-portfolio-grid' );
			$html .= '</div>';
			$html .= '</li>';
		}
		wp_reset_query();
		$html .= '</ul>';
		$html .= '</div>';
		$html .= '</div>';

		return $html;
	}



	/**
	* Post
	* @since     1.0
	* @updated   1.0
	*
	*/
	public function post()
	{
		extract($this->atts);

		// Get Query
		$query = new Twoot_Query(array(
			'counts' => $counts,
			'posts' => $posts,
			'order' => $order,
			'orderby' => $orderby,
			'post_type'	=> $post_type,
			'taxonomy'  => $taxonomy
		));

		$do_query = new WP_Query($query->do_related_query());
		$this->entries=$do_query;

		// Check if it has posts
		if(empty($this->entries) || empty($this->entries->posts)) return;

		// Output HTML
		$html = '<div class="related-posts pt mt">';
		$html .= '<h5 class="sub-title">'.$title.'</h5>';
		$html .= '<div class="outer">';
		$html .= '<ul class="clearfix">';
		while( $this->entries->have_posts() ) {
			$this->entries->the_post();
			$html .= '<li class="item column six">';
			$html .= '<div class="inner clearfix">';
			$html .= twoot_generator( 'load_template', 'loop-related-posts' );
			$html .= '</div>';
			$html .= '</li>';
		}
		wp_reset_query();
		$html .= '</ul>';
		$html .= '</div>';
		$html .= '</div>';

		return $html;
	}
}
}
?>