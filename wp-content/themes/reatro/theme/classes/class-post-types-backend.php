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
if( ! class_exists( 'Twoot_Post_Types_Backend') ) {
/**
 * Post Types Class
 *
 * @class Twoot_Post_Types
 * @version	1.0
 * @since 1.0
 * @package ThemeWoot
 * @author ThemeWoot Team 
 */
class Twoot_Post_Types_Backend {
	/**
	* This method adds other methods to specific hooks within WordPress.
	* @since     1.0
	* @updated   1.0
	*
	*/
	public function __construct() 
	{
		add_filter('manage_edit-portfolio_columns', array($this,'portfolio_columns'));
		add_action('manage_posts_custom_column',  array($this,'portfolio_custom_columns'));
		add_filter('manage_edit-content_block_columns', array($this,'content_block_columns'));
		add_action('manage_posts_custom_column',  array($this,'content_block_custom_columns'));
	}


	/**
	 * Portfolio Columns
	 * @since     1.0
	 * @updated   1.0
	 *
	 */
	 public function portfolio_columns($columns)
	 {
		$newcolumns = array(
			'cb' => '<input type=\"checkbox\" />',
			'portfolio_thumbnail' => esc_attr__('Featured Image',  'Twoot'),
			'title' => esc_attr__('Title',  'Twoot'),
			'portfolio_categories' => esc_attr__('Categories',  'Twoot'),
			'portfolio_type' => esc_attr__('Types',  'Twoot'),
			'portfolio_layout' => esc_attr__('Layouts',  'Twoot')
		);
		
		$columns= array_merge($newcolumns, $columns);
		
		return $columns;
	}


	/**
	 * Portfolio Custom Columns
	 * @since     1.0
	 * @updated   1.0
	 *
	 */
	 public function portfolio_custom_columns($column)
	 {
		global $post;
		$layouts = array(
			'half' => esc_attr__('Half Width', 'Twoot'),
			'full' => esc_attr__('Full Width', 'Twoot')
		);
		$type = ucwords(twoot_get_frontend_func('meta', 'type'));
		$layout = twoot_get_frontend_func('meta', 'layout');

		switch ($column)
		{
			case 'portfolio_categories':
			$terms = get_the_terms($post->ID, 'portfolio_cat');				
			if (! empty($terms)) {
				foreach($terms as $t)
					$output[] = '<a href="edit.php?post_type=portfolio&portfolio_cat='.$t->slug.'">'. esc_html(sanitize_term_field('name', $t->name, $t->term_id, 'portfolio_cat', 'display')) . '</a>';
				$output = implode(', ', $output);
			} else {
				$t = get_taxonomy('portfolio_cat');
				$output = 'No '.$t->label;
			}
			echo $output;
			break;

			case 'portfolio_thumbnail':
			if ( has_post_thumbnail() ) { the_post_thumbnail('thumbnail'); } else { echo esc_attr__('No featured image',  'Twoot'); }
			break;
			
			case 'portfolio_type':
			echo $type;
			break;
			
			case 'portfolio_layout':
			echo $layouts[$layout];
			break;	
		}
	}



	/**
	 * Content Block Columns
	 * @since     1.0
	 * @updated   1.0
	 *
	 */
	 public function content_block_columns($columns)
	 {
		$newcolumns = array(
			'cb' => '<input type=\"checkbox\" />',
			'content_block_ids' => esc_attr__('IDs',  'Twoot'),
			'title' => esc_attr__('Title',  'Twoot')
		);
		
		$columns= array_merge($newcolumns, $columns);
		
		return $columns;
	}



	/**
	 * Content Block Custom Columns
	 * @since     1.0
	 * @updated   1.0
	 *
	 */
	 public function content_block_custom_columns($column)
	 {
		global $post;

		switch ($column)
		{	
			case 'content_block_ids':
			echo '<span class="content-block-ids-class">'.$post->ID.'</div>';
			break;	
		}
	}
}

new Twoot_Post_Types_Backend();
}