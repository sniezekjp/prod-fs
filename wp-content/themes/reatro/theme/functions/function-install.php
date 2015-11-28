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
* Add Posts
*
* @since   1.0.0
*/
function twoot_add_posts() {

	global $data;
	/**
	* Home
	*
	* @since   1.0.0
	*
	* @var     string
	*/
	twoot_add_post( 'page', esc_sql( _x('home', 'page_slug', 'Twoot') ), TWOOT_PREFIX . 'template_home_id', esc_attr__('Home', 'Twoot'), '' );


	/**
	* Portfolio
	*
	* @since   1.0.0
	*
	* @var     string
	*/
	twoot_add_post( 'page', esc_sql( _x('portfolio', 'page_slug', 'Twoot') ), TWOOT_PREFIX . 'template_portfolio_id', esc_attr__('Portfolio', 'Twoot'), '' );


	/**
	* Blog
	*
	* @since   1.0.0
	*
	* @var     string
	*/
	twoot_add_post( 'page', esc_sql( _x('blog', 'page_slug', 'Twoot') ), TWOOT_PREFIX . 'template_blog_id', esc_attr__('Blog', 'Twoot'), '' );


	/**
	* Pages
	*
	* @since   1.0.0
	*
	* @var     string
	*/
	twoot_add_post( 'page', esc_sql( _x('pages', 'page_slug', 'Twoot') ), TWOOT_PREFIX . 'template_pages_id', esc_attr__('Pages', 'Twoot'), '' );


		/**
		* About US
		*
		* @since   1.0.0
		*
		* @var     string
		*/
		twoot_add_post( 'page', esc_sql( _x('about-us', 'page_slug', 'Twoot') ), TWOOT_PREFIX . 'template_about_us_id', esc_attr__('About Us', 'Twoot'), $data['template_about_us_id'], get_option(TWOOT_PREFIX . 'template_pages_id') );


		/**
		* Contact
		*
		* @since   1.0.0
		*
		* @var     string
		*/
		twoot_add_post( 'page', esc_sql( _x('contact', 'page_slug', 'Twoot') ), TWOOT_PREFIX . 'template_contact_id', esc_attr__('Contact', 'Twoot'), $data['template_contact_id'], get_option(TWOOT_PREFIX . 'template_pages_id') );


		/**
		* FAQ
		*
		* @since   1.0.0
		*
		* @var     string
		*/
		twoot_add_post( 'page', esc_sql( _x('faq', 'page_slug', 'Twoot') ), TWOOT_PREFIX . 'template_faq_id', esc_attr__('FAQ', 'Twoot'), $data['template_faq_id'], get_option(TWOOT_PREFIX . 'template_pages_id') );


		/**
		* Team
		*
		* @since   1.0.0
		*
		* @var     string
		*/
		twoot_add_post( 'page', esc_sql( _x('team', 'page_slug', 'Twoot') ), TWOOT_PREFIX . 'template_team_id', esc_attr__('Team', 'Twoot'), $data['template_team_id'], get_option(TWOOT_PREFIX . 'template_pages_id') );


		/**
		* Pricing
		*
		* @since   1.0.0
		*
		* @var     string
		*/
		twoot_add_post( 'page', esc_sql( _x('pricing', 'page_slug', 'Twoot') ), TWOOT_PREFIX . 'template_pricing_id', esc_attr__('Pricing', 'Twoot'), $data['template_pricing_id'], get_option(TWOOT_PREFIX . 'template_pages_id') );


		/**
		* Services
		*
		* @since   1.0.0
		*
		* @var     string
		*/
		twoot_add_post( 'page', esc_sql( _x('services', 'page_slug', 'Twoot') ), TWOOT_PREFIX . 'template_services_id', esc_attr__('Services', 'Twoot'), $data['template_services_id'], get_option(TWOOT_PREFIX . 'template_pages_id') );


		/**
		* Coming Soon
		*
		* @since   1.0.0
		*
		* @var     string
		*/
		twoot_add_post( 'page', esc_sql( _x('coming-soon', 'page_slug', 'Twoot') ), TWOOT_PREFIX . 'template_coming_soon_id', esc_attr__('Coming Soon', 'Twoot'), '', get_option(TWOOT_PREFIX . 'template_pages_id') );
}






/**
* Add Post
*
* @since   1.0.0
*/
function twoot_add_post( $type, $slug, $option, $page_title = '', $page_content = '', $post_parent = 0 ) {
	global $wpdb;
	 
	$option_value = get_option( $option );

	if ( $option_value > 0 && get_post( $option_value ) ) {
		return;
	}
	
	$page_found = $wpdb->get_var( $wpdb->prepare( "SELECT ID FROM " . $wpdb->posts . " WHERE post_name = %s LIMIT 1;", $slug ) );
	if ( $page_found ) {
		if ( ! $option_value ) {
			update_option( $option, $page_found );
		}
		return;
	}

	$page_data = array(
        'post_status' 		=> 'publish',
        'post_type' 		=> $type,
        'post_author' 		=> 1,
        'post_name' 		=> $slug,
        'post_title' 		=> $page_title,
        'post_content' 		=> $page_content,
        'post_parent' 		=> $post_parent,
        'comment_status' 	=> 'closed'
    );
    $page_id = wp_insert_post( $page_data );

    update_option( $option, $page_id );
}
?>