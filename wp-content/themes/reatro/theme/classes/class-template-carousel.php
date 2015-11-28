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
if( ! class_exists( 'Twoot_Template_Carousel') )
{
/**
 * Twoot_Template_Carousel Class
 *
 * @class Twoot_Template_Carousel
 * @version	1.0
 * @since 1.0
 * @package ThemeWoot
 * @author ThemeWoot Team 
 */
class Twoot_Template_Carousel {

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
			'counts' => '16',
			'cats'=> '',
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

		$loop=($post_type=='portfolio')? 'portfolio':'blog';

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
		if(empty($this->entries) || empty($this->entries->posts)) return;

		// Output HTML
		$html = '';
		while( $this->entries->have_posts() ) {
			$this->entries->the_post();
			$html .= '<li class="post-item column">';
			$html .= twoot_generator( 'load_template', 'loop-' . $loop . '-carousel' );
			$html .= '</li>';
		}
		wp_reset_query();

		return $html;
	}
}
}
?>