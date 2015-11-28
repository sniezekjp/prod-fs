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




/**
* Fixed Posts per page & pagination
*
* @since   1.0.0
*/
function twoot_posts_per_page( $value ) {
	if ( is_tax('portfolio_cat') || is_tax('portfolio_tag') ) {
        $posts_per_page = twoot_get_frontend_func('opt', 'opt', 'portfolio_counts');
    } else {
        $posts_per_page = twoot_get_frontend_func('opt', 'opt', 'blog_counts');
    }
    return $posts_per_page;
}

function twoot_init_posts_per_page() {
    add_filter( 'option_posts_per_page', 'twoot_posts_per_page' ); 
}
add_action( 'init', 'twoot_init_posts_per_page', 0 );




/**
* Post navigation
*
* @since   1.0.0
*/
function twoot_post_navigation($query = false) { 
	global $wp_query;
	$q = ($query) ? $query : $wp_query;
	?>
	<?php if ( $q->max_num_pages > 1 ) : ?>
	<nav class="post-navigation clearfix">
		<div class="nav-previous column six"><?php next_posts_link( __( '<span class="meta-nav">&lsaquo;</span> Older posts', 'Twoot' ) ); ?></div>
		<div class="nav-next column six"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rsaquo;</span>', 'Twoot' ) ); ?></div>
	</nav><!-- # .navigation -->
	<?php endif; ?>
	<?php
}




/**
* Register the widgets
*
* @since   1.0.0
*/
if ( function_exists('register_sidebar') ) {
	$sidebars = array(
		'page' => esc_attr__('Page', 'Twoot'), 
		'blog' => esc_attr__('Blog', 'Twoot'), 
		'portfolio' => esc_attr__('Portfolio', 'Twoot'), 
		'search' => esc_attr__('Search', 'Twoot')
	);

	foreach ($sidebars as $key => $name)
	{	
		register_sidebar( array (
			'name' => $name,
			'id' => $key.'-widget-area',
			'before_widget' => '<div class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="title">',
			'after_title' => '</h3>'
		));
	}

	$top_widgets_column = twoot_get_frontend_func('opt', 'opt', 'top_widgets_column');
	$widgets_column = twoot_get_frontend_func('opt', 'opt', 'widgets_column');

	for ($i = 1; $i <= $top_widgets_column; $i++)
	{
		register_sidebar(array(
			'name' => 'Top Widget '.$i,
			'id' => 'top-widget-area-'.$i,
			'before_widget' => '<div class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="title">',
			'after_title' => '</h3>',
		));
	}

	for ($i = 1; $i <= $widgets_column; $i++)
	{
		register_sidebar(array(
			'name' => 'Footer Widget '.$i,
			'id' => 'bottom-widget-area-'.$i,
			'before_widget' => '<div class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="title">',
			'after_title' => '</h3>',
		));
	}
}
?>