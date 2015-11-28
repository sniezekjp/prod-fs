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



if( ! class_exists( 'Twoot_Portfolio_Permalink') )
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
class Twoot_Portfolio_Permalink {

	public function __construct() {
		add_action( 'admin_init', array( $this, 'permalink_init') );

		if ( isset( $_POST['permalink_structure'] ) || isset( $_POST['category_base'] ) ) {
			update_option( TWOOT_PREFIX . 'portfolio_cat_base', untrailingslashit( $_POST['portfolio_cat_base'] ));
			update_option( TWOOT_PREFIX . 'portfolio_tag_base', untrailingslashit( $_POST['portfolio_tag_base'] ));
			update_option( TWOOT_PREFIX . 'portfolio_item_base', untrailingslashit( $_POST['portfolio_item_base'] ));
		}
	}

	public function permalink_init() {
		register_setting( 'permalink', 'portfolio_cat_base', '' );
		register_setting( 'permalink', 'portfolio_tag_base', '' );
		register_setting( 'permalink', 'portfolio_item_base', '' );

        add_settings_field('portfolio_cat_base', '<label for="portfolio_cat_base">'.esc_attr__( 'Portfolio category base', 'Twoot' ).'</label>' , array($this, 'fields_portfolio_cat_base') , 'permalink', 'optional');
		add_settings_field('portfolio_tag_base', '<label for="portfolio_tag_base">'.esc_attr__( 'Portfolio tag base', 'Twoot' ).'</label>' , array($this, 'fields_portfolio_tag_base') , 'permalink', 'optional');
		add_settings_field('portfolio_item_base', '<label for="portfolio_item_base">'.esc_attr__( 'Portfolio item base', 'Twoot' ).'</label>' , array($this, 'fields_portfolio_item_base') , 'permalink', 'optional');
	}

	function fields_portfolio_cat_base() {
		echo '<input type="text" id="portfolio_cat_base" name="portfolio_cat_base" value="' . get_option( TWOOT_PREFIX . 'portfolio_cat_base' ) . '" class="regular-text code" />';
	}

	function fields_portfolio_tag_base() {
		echo '<input type="text" id="portfolio_tag_base" name="portfolio_tag_base" value="' . get_option( TWOOT_PREFIX . 'portfolio_tag_base' ) . '" class="regular-text code" />';
	}

	function fields_portfolio_item_base() {
		echo '<input type="text" id="portfolio_item_base" name="portfolio_item_base" value="' . get_option( TWOOT_PREFIX . 'portfolio_item_base' ) . '" class="regular-text code" />';
	}
}
new Twoot_Portfolio_Permalink();
}
?>