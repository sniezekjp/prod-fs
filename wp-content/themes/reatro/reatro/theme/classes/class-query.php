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


if( ! class_exists( 'Twoot_Query') )
{
/**
 * Twoot_Query Class
 *
 * @class Twoot_Query
 * @version	1.0
 * @since 1.0
 * @package ThemeWoot
 * @author ThemeWoot Team 
 */
class Twoot_Query {

	public $atts;


	/**
	* This method adds other methods to specific hooks within WordPress.
	* @since     1.0
	* @updated   1.0
	*
	*/
	function __construct($atts = array()) 
	{
		$this->atts = shortcode_atts(array(
			'counts' => '12',
			'cats'=> '',
			'posts' => '',
			'order' => 'DESC',
			'orderby' => 'date',
			'post_type'	=> 'portfolio',
			'taxonomy'  => 'portfolio_cat'
		), $atts);
	}


	/**
	 * Fetch new entries for template
	 * @since     1.0
	 * @updated   1.0
	 *
	 */
	public function do_template_query($params = array())
	{
		$query = array();
		if(empty($params)) $params = $this->atts;

		// Get portfolio cats
		if(!empty($params['cats'])) { $term_ids = explode(',', $params['cats']); }

		// Get portfolio cats
		if(!empty($params['posts'])) { $post_ids = explode(',', $params['posts']); }

		// Set the paged value
		if (get_query_var('paged') ) {
		     $paged = get_query_var('paged');
		} elseif (get_query_var('page')) {
		     $paged = get_query_var('page');
		} else {
		     $paged = 1;
		}

		// Get post items via Posts Or Cats
		if(isset($post_ids[0]) && !empty($post_ids[0]) && is_array($post_ids) && !empty($post_ids))
		{
			$query = array( 
				'post_type' => $params['post_type'],
				'posts_per_page' => $params['counts'],
				'order' => $params['order'],
				'orderby' => $params['orderby'],
				'paged' 	=> $paged,
				'post_status' => 'publish',
				'post__in' => $post_ids
			);
		}
		elseif(isset($term_ids[0]) && !empty($term_ids[0]) && is_array($term_ids) && !empty($term_ids))
		{
			$query = array( 
				'post_type' => $params['post_type'],
				'posts_per_page' => $params['counts'],
				'order' => $params['order'],
				'orderby' => $params['orderby'],
				'paged' 	=> $paged,
				'post_status' => 'publish',
				'tax_query' => array( array( 'taxonomy' => $params['taxonomy'], 'field' => 'id', 'terms' => $term_ids, 'operator' => 'IN'))
			);
		}
		else
		{
			$query = array( 
				'post_type' => $params['post_type'],
				'posts_per_page' => $params['counts'],
				'order' => $params['order'],
				'orderby' => $params['orderby'],
				'paged' 	=> $paged,
				'post_status' => 'publish'
			);
		}

		return $query;
	}


	/**
	*  Fetch new entries for archive
	* @since     1.0
	* @updated   1.0
	*
	*/
	public function do_global_query($params = array())
	{
		global $wp_query;
				
		$query = array();

		// Set the paged value
		if (get_query_var('paged') ) {
		     $paged = get_query_var('paged');
		} elseif (get_query_var('page')) {
		     $paged = get_query_var('page');
		} else {
		     $paged = 1;
		}

		if(empty($params)) $params = $this->atts;
		$query = array( 
			'post_type' => $params['post_type'],
			'posts_per_page' => $params['counts'],
			'order' => $params['order'],
			'orderby' => $params['orderby'],
			'paged' 	=> $paged,
			'post_status' => 'publish'
		);

		$query = array_merge( $wp_query->query, $query );

		return $query;
	}


	/**
	*  Fetch new entries for related posts
	* @since     1.0
	* @updated   1.0
	*
	*/
	public function do_related_query($params = array())
	{
		global $post;
		$query = array();
		if(empty($params)) $params = $this->atts;

		// Get portfolio cats
		if(!empty($params['posts'])) { $post_ids = explode(',', $params['posts']); }

		// Get post items via Posts Or Cats
		if(isset($post_ids[0]) && !empty($post_ids[0]) && is_array($post_ids) && !empty($post_ids))
		{
			$query = array( 
				'post_type' => $params['post_type'],
				'posts_per_page' => $params['counts'],
				'order' => $params['order'],
				'orderby' => $params['orderby'],
				'post_status' => 'publish',
				'post__in' => $post_ids
			);
		}
		else
		{
			$terms = wp_get_post_terms($post->ID, $params['taxonomy']);

			if($terms && !empty($terms))
			{
				$term_ids = array();
				foreach($terms as $term) {
					$term_ids[] = $term->term_id;
				}
			}
			if(isset($term_ids[0]) && !empty($term_ids[0]) && is_array($term_ids) && !empty($term_ids))
			{
				$query = wp_parse_args($query, array(
					'post_type' => $params['post_type'],
					'posts_per_page' => $params['counts'],
					'order' => $params['order'],
					'orderby' => $params['orderby'],
					'post_status' => 'publish',
					'post__not_in' => array($post->ID),
					'tax_query' => array( array( 'taxonomy' => $params['taxonomy'], 'field' => 'id', 'terms' => $term_ids, 'operator' => 'IN'))
				));
			}
		}
		return $query;
	}
}
}
?>