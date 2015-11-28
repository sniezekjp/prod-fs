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


if( ! class_exists('Twoot_Checked_Func') ) {
/**
 * Used for frontend and backend funcations
 */
class Twoot_Checked_Func {

	/**
	* Check the current wordpress version.
	*
	* @since   1.0.0
	*/
	function wp_version() {
		global $wp_version;	
		$wp_check   = '3.5';
		$is_checked  =  version_compare($wp_version, $wp_check, '>=');
		
		if ( $is_checked ) { 
			return true; 
		} else { 
			return false; 
		}
	}



	/**
	* Check the theme version.
	*
	* @since   1.0.0
	*/
	function theme_version() {
		$theme_check = get_option( TWOOT_OPT_KEY . '_version' );
		$is_checked  =  version_compare( TWOOT_VERSION, $theme_check, '!=' );
		
		if ( $is_checked ) { 
			return true; 
		} else { 
			return false; 
		}
	}



	/**
	* Check the plugin version.
	*
	* @since   1.0.0
	*/
	function plugin_version() {
		$plugin_check = get_option( TWOOT_PREFIX . 'toolkit_version' );
		$is_checked  =  version_compare( TWOOT_PLUGIN_VERSION, $plugin_check, '>' );
		
		if ( $is_checked ) { 
			return true; 
		} else { 
			return false; 
		}
	}



	/**
	* Check the theme setup status.
	*
	* @since   1.0.0
	*/
	function theme_setup() {
		$is_status = get_option( TWOOT_OPT_KEY . '_setup_status' );		
		if ( $is_status ) { 
			return true;
		} else { 
			return false; 
		}
	}



	/**
	* Check if WooCommerce is activated
	*
	* @since   1.0.0
	*/
	function woo_activated() {
		if ( class_exists( 'woocommerce' ) ) { 
			return true; 
		} else { 
			return false; 
		}
	}



	/**
	* Check if ThemeWoot ToolKit is activated
	*
	* @since   1.0.0
	*/
	function toolkit_activated() {
		if ( class_exists( 'Twoot_ToolKit' ) ) { 
			return true; 
		} else { 
			return false; 
		}
	}



	/**
	* Check if WPML is activated
	*
	* @since   1.0.0
	*/
	function wpml_activated() {
		if(defined('ICL_SITEPRESS_VERSION') && defined('ICL_LANGUAGE_CODE'))  { 
			return true; 
		} else { 
			return false; 
		}
	}



	/**
	* Check the IE version
	*
	* @since   1.0.0
	*/
	function IE_check() {
		global $is_IE;
		$current_version = preg_match('/MSIE ([0-9]+)([a-zA-Z0-9.]+)/', $_SERVER['HTTP_USER_AGENT'], $browser_version)? $browser_version[1]:'';

		if ( $current_version == '8' && $is_IE ) { 
			return true; 
		} else { 
			return false; 
		}
	}



	/**
	* Check the current woocommerce version.
	*
	* @since   1.0.0
	*/
	function woocommerce_version($check_version) {
		$is_checked  =  version_compare(WOOCOMMERCE_VERSION, $check_version, '>=');
		
		if ( $is_checked ) { 
			return true; 
		} else { 
			return false; 
		}
	}
}


/*
* Get Back Funcations
* 
*/
function twoot_get_checked_func($function){
	global $_Twoot_Checked_Func;
	if($_Twoot_Checked_Func==null){
		$_Twoot_Checked_Func = new Twoot_Checked_Func;
	}
	$args = array_slice( func_get_args(), 1 );
	return call_user_func_array(array( &$_Twoot_Checked_Func, $function ), $args );
}

}
?>