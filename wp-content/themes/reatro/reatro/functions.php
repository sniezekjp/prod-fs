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
include_once( 'theme/themewoot.php' );

/**
*  Init Twoot class
*
* @since   1.0.0
*
*/
if ( class_exists( 'Twoot' ) ) {
	$GLOBALS['twoot'] = new Twoot();
}


/**
*  Add toolkit supports
*
* @since   1.0.0
*
*/
if( function_exists( 'twoot_toolkit_support' ) ) {

	// Post Types
	twoot_toolkit_support( 'post_type', array( 
		'portfolio', 
		'faq', 
		'content_block' 
	) );


	// Shortcodes
	if(twoot_get_checked_func('woo_activated')) {
		$shortcodes = array(
			'accordion',
			'ads',
			'audio',
			'block',
			'blog',
			'blog_carousel',
			'blog_full',
			'button',
			'column',
			'faqs',
			'gmap',
			'icon',
			'icon_boxes',
			'image',
			'left_tab',
			'latest_blog',
			'portfolio_carousel',
			'post_grid',
			'post_images',
			'post_left_grid',
			'post_masonry',
			'post_slider',
			'price_table',
			'progress_bar',
			'message_box',
			'number',
			'simple_buttons',
			'slogan',
			'social_icons',
			'tab',
			'tagline',
			'team_members',
			'testimonial',
			'testimonial_carousel',
			'toggle',
			'twitter_carousel',
			'video',
			'best_sellers_product_carousel',
			'featured-product-carousel',
			'onsale-product-carousel',
			'product_carousel'
		);
	}else{
		$shortcodes = array(
			'accordion',
			'ads',
			'audio',
			'block',
			'blog',
			'blog_carousel',
			'blog_full',
			'button',
			'column',
			'faqs',
			'gmap',
			'icon',
			'icon_boxes',
			'image',
			'left_tab',
			'latest_blog',
			'portfolio_carousel',
			'post_grid',
			'post_images',
			'post_left_grid',
			'post_masonry',
			'post_slider',
			'price_table',
			'progress_bar',
			'message_box',
			'number',
			'simple_buttons',
			'slogan',
			'social_icons',
			'tab',
			'tagline',
			'team_members',
			'testimonial',
			'testimonial_carousel',
			'toggle',
			'twitter_carousel',
			'video'
		);
	}

	twoot_toolkit_support( 'shortcode', $shortcodes );

	// Widgets
	twoot_toolkit_support( 'widget', array(
		'blog',
		'comments',
		'contact_details',
		'dribbble',
		'flickr',
		'portfolio',
		'portfolio_tags',
		'social_icons',
		'twitter'
	) );
}
?>