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

if(!class_exists('Twoot_Admin_Scripts')){
/**
 * Used for the theme's admin.
 */
class Twoot_Admin_Scripts {

	/**
	* Init the admin functions
	*/
	public function __construct(){

		/*Add CSS*/
		add_action('admin_enqueue_scripts', array($this,'CSS'));

		/*Add JS*/
		add_action('admin_enqueue_scripts', array($this,'JS'));

		/*Add Post Type CSS*/
		add_action( 'admin_head', array($this,'TYPE_CSS') );
	}

	/**
	 * Add CSS to admin
	 */
	public function CSS() {
		$screen = get_current_screen();

		wp_register_style( 'chosen', TWOOT_URL . '/theme/assets/css/chosen.css', false, TWOOT_VERSION, 'all' );
		wp_register_style( 'theme-options', TWOOT_URL . '/theme/assets/css/theme-options.css', false, TWOOT_VERSION, 'all' );
		wp_register_style( 'theme-common', TWOOT_URL . '/theme/assets/css/theme-common.css', false, TWOOT_VERSION, 'all' );
		wp_register_style( 'gallery-metabox', TWOOT_URL . '/theme/assets/css/gallery-metabox.css', false, TWOOT_VERSION, 'all' );

		if ( in_array( $screen->id, array( 'appearance_page_theme_opt', 'appearance_page_theme_skin', 'appearance_page_theme_font' ) ) ) {
			wp_enqueue_style( 'theme-options' );
		}

		if ( in_array( $screen->id, array( 'appearance_page_theme_opt', 'appearance_page_theme_skin', 'appearance_page_theme_font', 'edit-post', 'post', 'edit-page', 'page', 'edit-content_block', 'content_block', 'edit-portfolio', 'portfolio', 'edit-faq', 'faq', 'edit-bx_slider', 'bx_slider', 'edit-category', 'edit-post_tag', 'edit-portfolio_cat', 'edit-portfolio_tag', 'edit-faq_cat', 'widgets' ) ) ) {
			wp_enqueue_style( 'wp-color-picker' );
			wp_enqueue_style( 'chosen' );
			wp_enqueue_style( 'theme-common' );
		}

		if ( in_array( $screen->id, array( 'edit-post', 'post', 'edit-portfolio', 'portfolio' ) ) ) {
			wp_enqueue_style( 'gallery-metabox' );
		}

	}

	/**
	 * Add JS to admin
	 */
	public function JS() {
		$screen = get_current_screen();

		wp_register_script( 'jquery-easytabs', TWOOT_URL . '/theme/assets/js/jquery-easytabs-min.js', array('jquery'), TWOOT_VERSION, false );
		wp_register_script( 'jquery-chosen', TWOOT_URL . '/theme/assets/js/chosen-jquery-min.js', array('jquery'), TWOOT_VERSION, false );
		wp_register_script( 'theme-common', TWOOT_URL . '/theme/assets/js/theme-common.js', array('jquery'), TWOOT_VERSION, false );
		wp_register_script( 'theme-common-metabox', TWOOT_URL . '/theme/assets/js/theme-common-metabox.js', array('jquery'), TWOOT_VERSION, false );
		wp_register_script( 'gallery-metabox', TWOOT_URL . '/theme/assets/js/gallery-metabox.js', array('jquery', 'jquery-ui-sortable'), TWOOT_VERSION, false );

		if ( in_array( $screen->id, array( 'appearance_page_theme_opt', 'appearance_page_theme_skin', 'appearance_page_theme_font' ) ) ) {
			wp_enqueue_media(); 
			wp_enqueue_script( 'jquery-easytabs' );
		}

		if ( in_array( $screen->id, array( 'appearance_page_theme_opt', 'appearance_page_theme_skin', 'appearance_page_theme_font', 'edit-post', 'post', 'edit-page', 'page', 'edit-content_block', 'content_block', 'edit-portfolio', 'portfolio', 'edit-faq', 'faq' ) ) ) {
			wp_enqueue_script( 'wp-color-picker' );
			wp_enqueue_script( 'jquery-chosen' );
			wp_enqueue_script( 'theme-common' );
		}

		if ( in_array( $screen->id, array( 'edit-post', 'post', 'edit-portfolio', 'portfolio' ) ) ) {
			wp_enqueue_script( 'gallery-metabox' );
		}

		if ( in_array( $screen->id, array( 'edit-post', 'post', 'edit-page', 'page', 'edit-portfolio', 'portfolio' ) ) ) {
			wp_enqueue_script( 'theme-common-metabox' );
		}
	}

	/**
	 * Add Post Type CSS
	 */
	 public function TYPE_CSS() {
		 
		$screen = get_current_screen();
		
		if ( in_array( $screen->id, array( 'edit-faq', 'faq', 'edit-content_block', 'content_block' ) ) ) {
			echo '<style type="text/css">#post-preview, #view-post-btn, #edit-slug-box, .wp-list-table span.view {display: none;}</style>';
		}
	}

}

new Twoot_Admin_Scripts();
}
?>