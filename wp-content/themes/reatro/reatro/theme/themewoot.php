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

if ( ! class_exists( 'Twoot' ) ) {

/**
 * Main Theme Class
 *
 * Contains the main functions for ThemeWoot.
 *
 * @class Twoot
 * @version	1.0.0
 * @since 1.0.0
 * @package	ThemeWoot
 * @author ThemeWoot Team 
 */
class Twoot {

	/**
	 * Theme version.
	 *
	 * @since   1.0.0
	 *
	 * @var     string
	 */
	 public $version = '1.2.9';


	 /**
	 * Plugin version.
	 *
	 * @since   1.0.0
	 *
	 * @var     string
	 */
	 public $plugin_version = '1.1.2';


	 /**
	 * Theme name.
	 *
	 * @since   1.0.0
	 *
	 * @var     string
	 */
	 public $name = 'Reatro';


	 /**
	 * Theme prefix.
	 *
	 * @since   1.0.0
	 *
	 * @var     string
	 */
	 public $prefix = '_twoot_';


	 /**
	 * Theme url
	 *
	 * @since   1.0.0
	 *
	 * @var     string
	 */
	 public $theme_url;


	  /**
	 * Theme path
	 *
	 * @since   1.0.0
	 *
	 * @var     string
	 */
	 public $theme_path;


	  /**
	 * Child theme url
	 *
	 * @since   1.0.0
	 *
	 * @var     string
	 */
	 public $child_theme_url;


	  /**
	 * Child theme path
	 *
	 * @since   1.0.0
	 *
	 * @var     string
	 */
	 public $child_theme_path;


	  /**
	 * Theme template url
	 *
	 * @since   1.0.0
	 *
	 * @var     string
	 */
	 public $template_url;


	  /**
	 * Theme doc url
	 *
	 * @since   1.0.0
	 *
	 * @var     string
	 */
	 public $documentation_url = '';


	/**
	* Twoot Constructor.
	*
	* @since   1.0.0
	*/
	public function __construct() {

		// Define demo constant
		define( 'TWOOT_DEMO', false );

		// Define version constant
		define( 'TWOOT_VERSION', $this->version );

		// Define the latest plugin version constant
		define( 'TWOOT_PLUGIN_VERSION', $this->plugin_version );

		// Define theme name constant
		define( 'TWOOT_NAME', $this->name );

		// Define theme slug name constant
		define( 'TWOOT_SLUG_NAME', strtolower($this->name) );

		// Define theme prefix constant
		define( 'TWOOT_PREFIX', $this->prefix );

		// Define theme opt key constant
		define( 'TWOOT_OPT_KEY', $this->prefix . strtolower(str_replace( ' ', '_', $this->name )) );

		// Define theme path constant
		define( 'TWOOT_PATH', $this->theme_path() );

		// Define theme url constant
		define( 'TWOOT_URL', $this->theme_url() );

		// Define child theme path constant
		define( 'TWOOT_CHILD_THEME_PATH', $this->child_theme_path() );

		// Define theme url constant
		define( 'TWOOT_CHILD_THEME_URL', $this->child_theme_url() );

		// Define cache constant
		define( 'TWOOT_CACHE', $this->theme_path() .'/cache' );

		// Define documentation url constant
		define( 'TWOOT_DOC_URL', $this->documentation_url );

		// Includes
		$this->includes();

		// Hooks
		add_action( 'init', array( $this, 'init' ) );
		add_action( 'after_setup_theme', array( $this, 'supports') );
		add_action( 'wp_enqueue_scripts', array( $this, 'fonts') );
		add_action( 'wp_enqueue_scripts', array( $this, 'styles'), 30 );
		add_action( 'wp_enqueue_scripts', array( $this, 'scripts'), 30 );
		add_action( 'wp_enqueue_scripts', array( $this, 'add_inline_style'), 30 );
	}


	/**
	* Theme support
	*
	* @since   1.0.0
	*/
	public function supports() {

		// Add supports
		if(function_exists('add_theme_support')) {
			add_theme_support('menus');
			add_theme_support('automatic-feed-links');
			add_theme_support('post-thumbnails', array('post', 'portfolio', 'product'));
			add_theme_support('post-formats', array('gallery', 'image', 'video', 'audio'));
		}

		// Load textdomain
		load_theme_textdomain( 'Twoot', $this->theme_path() .'/languages' );

		// Register custom menus
		register_nav_menus( array( 
			'top_menu' => esc_attr__( 'Top Navigation', 'Twoot' ),
			'bottom_menu' => esc_attr__( 'Bottom Navigation', 'Twoot' )
		));

	}


	/**
	* Init
	*
	* @since   1.0.0
	*/
	public function init() {

		// Add editor style
		add_editor_style();

		// Variables
		$this->template_url = apply_filters( 'twoot_template_url', 'templates/' );

		// Load template
		if( ! is_admin() ) {
			add_filter( 'template_include', array( $this, 'template_loader' ) );
		}

	}


	/**
	* Include required core files used in admin and on the frontend.
	*
	* @since   1.0.0
	*/
	function includes() {
		include_once( TWOOT_PATH . '/theme/classes/class-frontend.php' );
		include_once( TWOOT_PATH . '/theme/classes/class-checked.php' );
		include_once( TWOOT_PATH . '/theme/classes/class-sidebar.php' );

		$this->options();

		if ( is_admin() ) {
			$this->admin_includes();
		}

		if ( ! is_admin() ) {
			$this->frontend_includes();
		}

		include_once( TWOOT_PATH . '/theme/functions/function-common.php' );
		include_once( TWOOT_PATH . '/theme/functions/google-fonts.php' );

		if(twoot_get_checked_func('woo_activated')) {
			require_once( TWOOT_PATH . '/theme-woocommerce/woo.php' );
			require_once( TWOOT_PATH . '/theme-woocommerce/woo-generator.php' );
			$_Twoot_Woo=new Twoot_Woo();
			$_Twoot_Woo->init();
		}

		if(twoot_get_checked_func('wpml_activated')) {
			require_once( TWOOT_PATH . '/theme-wpml/wpml-generator.php' );
		}
	}


	/**
	* Options
	*
	* @since   1.0.0
	*/
	function options() {
		global $theme_options;
		$theme_options = array();
		$option_files = array( 'theme_opt', 'theme_skin', 'theme_font' );
		foreach($option_files as $file){
			$page = include( TWOOT_PATH . '/theme/options/' . $file.'.php' );
			$theme_options[$page['name']] = array();
			foreach($page['options'] as $option) {
				if (isset($option['std'])) {
					$theme_options[$page['name']][$option['id']] = $option['std'];
				}
			}
			$theme_options[$page['name']] = array_merge((array) $theme_options[$page['name']], (array) get_option(TWOOT_OPT_KEY . '_' . $page['name']));
		}
	}


	/**
	* Include required admin files.
	*
	* @since   1.0.0
	*/
	public function admin_includes() {
		include_once( TWOOT_PATH . '/theme/classes/class-tgm-plugin-activation.php' );
		include_once( TWOOT_PATH . '/theme/classes/class-backend-scripts.php' );
		include_once( TWOOT_PATH . '/theme/classes/class-permalink.php' );
		include_once( TWOOT_PATH . '/theme/classes/class-generator.php' );
		include_once( TWOOT_PATH . '/theme/classes/class-metabox-generator.php' );
		include_once( TWOOT_PATH . '/theme/classes/class-option-generator.php' );
		include_once( TWOOT_PATH . '/theme/classes/class-simple-buttons.php' );
		if(function_exists('twoot_toolkit_support')) {
			include_once( TWOOT_PATH . '/theme/classes/class-post-types-backend.php' );
		}
		require_once( TWOOT_PATH . '/theme/metaboxes/meta-page.php' );
		require_once( TWOOT_PATH . '/theme/metaboxes/meta-portfolio.php' );
		require_once( TWOOT_PATH . '/theme/metaboxes/meta-gallery.php' );
		require_once( TWOOT_PATH . '/theme/metaboxes/meta-video.php' );
		require_once( TWOOT_PATH . '/theme/metaboxes/meta-audio.php' );
		require_once( TWOOT_PATH . '/theme/metaboxes/meta-content-block.php' );
		include_once( TWOOT_PATH . '/theme/functions/function-backend.php' );
		include_once( TWOOT_PATH . '/theme/shortcodes/tinymce/tinymce.class.php' );
	}


	/**
	* Include required frontend files.
	*
	* @since   1.0.0
	*/
	public function frontend_includes() {
		include_once( TWOOT_PATH . '/theme/functions/aq_resizer.php' );
		include_once( TWOOT_PATH . '/theme/functions/function-frontend.php' );
		include_once( TWOOT_PATH . '/theme/classes/class-theme-generator.php' );
		include_once( TWOOT_PATH . '/theme/classes/class-query.php' );
		include_once( TWOOT_PATH . '/theme/classes/class-template-blog.php' );
		include_once( TWOOT_PATH . '/theme/classes/class-template-grid.php' );
		include_once( TWOOT_PATH . '/theme/classes/class-template-carousel.php' );
		include_once( TWOOT_PATH . '/theme/classes/class-template-related-posts.php' );
	}


	/**
	* Load a template.
	*
	* @since   1.0.0
	*/
	public function template_loader( $template ) {

		$file = '';

		if ( is_singular('portfolio') ) {

			$file 	= 'single-portfolio.php';
			$find[] = $file;
			$find[] = $this->template_url . $file;

		} elseif ( is_tax( 'portfolio_cat' ) || is_tax( 'portfolio_tag' ) ) {

			$term = get_queried_object();

			$file 		= 'taxonomy-' . $term->taxonomy . '.php';
			$find[] 	= 'taxonomy-' . $term->taxonomy . '-' . $term->slug . '.php';
			$find[] 	= $this->template_url . 'taxonomy-' . $term->taxonomy . '-' . $term->slug . '.php';
			$find[] 	= $file;
			$find[] 	= $this->template_url . $file;

		} elseif ( is_post_type_archive( 'portfolio' ) ) {

			$file 	= 'archive-portfolio.php';
			$find[] = $file;
			$find[] = $this->template_url . $file;
		
		}

		if ( $file ) {
			$template = locate_template( $find );
		}

		return $template;

	}


	/**
	* Fonts
	*
	* @since   1.0.0
	*/
	 function fonts() {
		 $current_fonts = twoot_get_frontend_func('opt', 'font', 'current_google_fonts');	
		 if(is_array($current_fonts) && !empty($current_fonts)) {

			$protocol = is_ssl() ? 'https' : 'http';
			$font_families = array();

			foreach($current_fonts as $current_font) {
				$font_families[] = str_replace( '|', ',', $current_font );
			}

			$query_args = array(
				'family' => urlencode(implode( '|', $font_families )),
				'subset' => urlencode('latin,latin-ext')
			);
			$fonts_url = add_query_arg( $query_args, $protocol. '://fonts.googleapis.com/css' );

			wp_enqueue_style( 'google-fonts', esc_url_raw( $fonts_url ), array(), null );
		 }
	 }


	 /**
	* Styles
	*
	* @since   1.0.0
	*/
	function styles() {
		global $blog_id;
		if(is_multisite()){ $file_name = 'custom-'.$blog_id.'.css'; } else { $file_name = 'custom.css'; }
		$skin = twoot_get_frontend_func('opt', 'skin', 'skin');

		// Register CSS
		wp_register_style('ie8', $this->theme_url(). '/css/ie8.css', false, TWOOT_VERSION, 'all');
		wp_register_style('woo', $this->theme_url(). '/theme-woocommerce/woo.css', false, TWOOT_VERSION, 'all');
		wp_register_style('woo-skin', $this->theme_url(). '/theme-woocommerce/skin-'.$skin.'.css', false, TWOOT_VERSION, 'all');
		wp_register_style('wpml', $this->theme_url(). '/theme-wpml/wpml.css', false, TWOOT_VERSION, 'all');
		wp_register_style('wpml-skin', $this->theme_url(). '/theme-wpml/skin-'.$skin.'.css', false, TWOOT_VERSION, 'all');
		wp_register_style('common', $this->theme_url(). '/css/common.css', false, TWOOT_VERSION, 'all');
		wp_register_style('plugins', $this->theme_url(). '/css/plugins.css', false, TWOOT_VERSION, 'all');
		wp_register_style('fontello', $this->theme_url(). '/css/fontello.css', false, TWOOT_VERSION, 'all');
		wp_register_style('fancybox', $this->theme_url(). '/css/jquery.fancybox.css', false, TWOOT_VERSION, 'all');
		wp_register_style('fancybox-thumbs', $this->theme_url(). '/css/jquery.fancybox-thumbs.css', false, TWOOT_VERSION, 'all');
		wp_register_style('style', $this->theme_url(). '/style.css', false, TWOOT_VERSION, 'all');
		wp_register_style('fonts', $this->theme_url(). '/css/fonts.css', false, TWOOT_VERSION, 'all');
		wp_register_style('skin', $this->theme_url(). '/css/skin-'.$skin.'.css', false, TWOOT_VERSION, 'all');
		wp_register_style('cache', $this->theme_url(). '/cache/' . $file_name, false, TWOOT_VERSION, 'all');
		wp_register_style('responsive', $this->theme_url(). '/css/responsive.css', false, TWOOT_VERSION, 'screen');
		wp_register_style('custom', $this->child_theme_url(). '/custom.css', false, TWOOT_VERSION, 'all');

		// Add CSS
		wp_enqueue_style('common');
		wp_enqueue_style('fontello');
		wp_enqueue_style('plugins');
		wp_enqueue_style('fancybox');
		wp_enqueue_style('fancybox-thumbs');
		wp_enqueue_style('style');
		wp_enqueue_style('fonts');
		if(twoot_get_checked_func('woo_activated')) {
			wp_enqueue_style('woo');
			wp_enqueue_style('woo-skin'); 
		}
		if(twoot_get_checked_func('wpml_activated')) {
			wp_enqueue_style('wpml');
			wp_enqueue_style('wpml-skin'); 
		}
		wp_enqueue_style('skin');
		wp_enqueue_style('cache');
		wp_enqueue_style('responsive');
		if(twoot_get_checked_func('IE_check')) { 
			wp_enqueue_style('ie8');
		}
		wp_enqueue_style('custom');
	}


	 /**
	* Scripts
	*
	* @since   1.0.0
	*/
	function scripts() {
		// Register JS
		wp_register_script('twoot-easing', $this->theme_url(). '/js/jquery.easing.min.js', false, '1.3', true);
		wp_register_script('twoot-superfish', $this->theme_url(). '/js/jquery.superfish.js', false, '1.7.3', true);
		wp_register_script('twoot-hoverIntent', $this->theme_url(). '/js/jquery.hoverIntent.js', false, '1.0', true);
		wp_register_script('twoot-appear', $this->theme_url(). '/js/jquery.appear.js', false, '1.0', true);
		wp_register_script('twoot-countTo', $this->theme_url(). '/js/jquery.countTo.js', false, '1.0', true);
		wp_register_script('twoot-preload', $this->theme_url(). '/js/jquery.preload.js', false, '1.0', true);
		wp_register_script('twoot-mousewheel', $this->theme_url(). '/js/jquery.mousewheel.min.js', false, '3.0.6', true);
		wp_register_script('twoot-fitvids', $this->theme_url(). '/js/jquery.fitvids.js', false, '1.0', true);
		wp_register_script('twoot-bxslider', $this->theme_url(). '/js/jquery.bxslider.js', false, '4.1', true);
		wp_register_script('twoot-sticky', $this->theme_url(). '/js/jquery.sticky.js', false, '1.0', true);
		wp_register_script('twoot-nicescroll', $this->theme_url(). '/js/jquery.nicescroll.min.js', false, '3.4.1', true);
		wp_register_script('twoot-isotope', $this->theme_url(). '/js/jquery.isotope.min.js', false, '1.5.25', true);
		wp_register_script('twoot-placeholder', $this->theme_url(). '/js/jquery.placeholder.min.js', false, '1.0', true);
		wp_register_script('twoot-easytabs', $this->theme_url(). '/js/jquery.easytabs.min.js', false, '3.1.1', true);
		wp_register_script('twoot-fancybox', $this->theme_url(). '/js/jquery.fancybox.pack.js', false, '2.1.5', true);
		wp_register_script('twoot-fancybox-media', $this->theme_url(). '/js/jquery.fancybox-media.js', false, '1.0.5', true);
		wp_register_script('twoot-fancybox-thumbs', $this->theme_url(). '/js/jquery.fancybox-thumbs.js', false, '1.0.7', true);
		wp_register_script('twoot-map-api', 'http://maps.google.com/maps/api/js?sensor=false', false, TWOOT_VERSION, true);
		wp_register_script('twoot-gmap', $this->theme_url(). '/js/jquery.gmap.min.js', false, '1.0.0', true);
		wp_register_script('twoot-countdown', $this->theme_url(). '/js/jquery.countdown.js', false, '1.0.0', true);
		wp_register_script('modernizr', $this->theme_url(). '/js/modernizr.js', false, '2.6.2', false);
		wp_register_script('theme-init', $this->theme_url(). '/js/theme-init.js', false, TWOOT_VERSION, true);

		// Add JS
		wp_enqueue_script('jquery');
		if(!wp_script_is('jquery_easing')) {
			wp_enqueue_script('twoot-easing');
		}
		if(twoot_get_checked_func('woo_activated')) {
			wp_dequeue_script('wc-cart-fragments');
		}
		wp_enqueue_script('twoot-map-api');
		wp_enqueue_script('twoot-superfish');
		wp_enqueue_script('twoot-hoverIntent');
		wp_enqueue_script('twoot-appear');
		wp_enqueue_script('twoot-countTo');
		wp_enqueue_script('twoot-preload');
		wp_enqueue_script('twoot-fitvids');
		wp_enqueue_script('twoot-bxslider');
		wp_enqueue_script('twoot-isotope');
		wp_enqueue_script('twoot-placeholder');
		wp_enqueue_script('twoot-easytabs');
		wp_enqueue_script('twoot-mousewheel');
		wp_enqueue_script('twoot-fancybox');
		wp_enqueue_script('twoot-fancybox-media');
		wp_enqueue_script('twoot-fancybox-thumbs');
		if(twoot_get_frontend_func('opt', 'opt', 'show_sticky_header') == true) {
			wp_enqueue_script('twoot-sticky');
		}
		if(twoot_get_frontend_func('opt', 'opt', 'show_nicescroll') == true) {
			wp_enqueue_script('twoot-nicescroll');
		}
		wp_enqueue_script('twoot-gmap');
		wp_enqueue_script('twoot-countdown');
		if(twoot_get_checked_func('IE_check')) {
			wp_enqueue_script('modernizr');
		}
		if( is_singular() && comments_open() && get_option( 'thread_comments' ) == true) {
			wp_enqueue_script( 'comment-reply' );
		}
		wp_enqueue_script('theme-init');
	}


	 /**
	* Head
	*
	* @since   1.0.0
	*/
	function add_inline_style() {
		if( is_tax('portfolio_cat') || is_tax('portfolio_tag') || is_singular('portfolio') || is_tag() || is_category() || is_singular('post') ) {
			// Menu CSS
			global $wpdb;
			$table_post_meta = $wpdb->prefix . 'postmeta';
			$enable_custom_colors = twoot_get_frontend_func('opt', 'skin', 'custom_colors');
			$skin = twoot_get_frontend_func('opt', 'skin', 'skin');

			if($enable_custom_colors==true) {
				$link_color = twoot_get_frontend_func('opt', 'skin', 'link_color');
				$hover_color = twoot_get_frontend_func('opt', 'skin', 'hover_color');
			}else{
				switch($skin) {
					case 'blue': $link_color = '#3E91A3'; $hover_color = '#65676F'; break;
					case 'brown': $link_color = '#784E3D'; $hover_color = '#000'; break;
					case 'cyan': $link_color = '#18ADB5'; $hover_color = '#65676F'; break;
					case 'green': $link_color = '#306E36'; $hover_color = '#000'; break;
					case 'navy': $link_color = '#435960'; $hover_color = '#000'; break;
					case 'olive': $link_color = '#B2C20A'; $hover_color = '#000'; break;
					case 'orange': $link_color = '#F15A23'; $hover_color = '#000'; break;
					case 'pink': $link_color = '#C71C77'; $hover_color = '#000'; break;
					case 'purple': $link_color = '#663399'; $hover_color = '#000'; break;
					case 'red': $link_color = '#A3443E'; $hover_color = '#000'; break;
				}
			}

			if( is_tag() || is_category() || is_singular('post') ) {
				if(get_option('show_on_front')=='page') { 
					$page_item_id=twoot_get_frontend_func('opt', 'opt', 'blog_page_id');
				}else{
					$page_item_id=false;
				}
			} 

			if( is_tax('portfolio_cat') || is_tax('portfolio_tag') || is_singular('portfolio')) { 
				$page_item_id=twoot_get_frontend_func('opt', 'opt', 'portfolio_page_id'); 
			}

			// Check if it has page id
			if($page_item_id==false) { return; } 
			$menu_item_id = $wpdb->get_var("SELECT post_id FROM $table_post_meta WHERE meta_value = '" . $page_item_id . "' AND meta_key = '_menu_item_object_id'"); 

			// Get the menu type
			if (has_nav_menu('top_menu')) { 
				$selecter='#menu';
				$id=$menu_item_id; 
			} else { 
				$selecter='.page';
				$id=$page_item_id; 
			}

			$css = '#top-menu ul li'.$selecter.'-item-'.$id.' a, #top-menu ul li'.$selecter.'-item-'.$id.' ul li a:hover { color: '.$hover_color.'; }';
			$css .= '#top-menu ul li'.$selecter.'-item-'.$id.' ul li a { color: '.$link_color.'; }';

			wp_enqueue_style( 'skin', $this->theme_url(). '/css/skin-'.$skin.'.css' );
			wp_add_inline_style( 'skin', $css );
		}
	}


	/**
	* Theme url
	*
	* @since   1.0.0
	*/
	public function theme_url() {

		if ( $this->theme_url ) { 
			return $this->theme_url;
		}
		return $this->theme_url = get_template_directory_uri();

	}


	/**
	* Theme path
	*
	* @since   1.0.0
	*/
	public function theme_path() {

		if ( $this->theme_path ) { 
			return $this->theme_path;
		}
		return $this->theme_path = get_template_directory();

	}


	/**
	* Child theme url
	*
	* @since   1.0.0
	*/
	public function child_theme_url() {

		if ( $this->child_theme_url ) { 
			return $this->child_theme_url;
		}
		return $this->child_theme_url = get_stylesheet_directory_uri();

	}


	/**
	* Child theme path
	*
	* @since   1.0.0
	*/
	public function child_theme_path() {

		if ( $this->child_theme_path ) { 
			return $this->child_theme_path;
		}
		return $this->child_theme_path = get_stylesheet_directory();

	}
}
}





if ( ! class_exists( 'Twoot_Admin' ) ) {

/**
 * Theme Admin Class
 *
 * Contains the main functions for ThemeWoot Admin.
 *
 * @class Twoot_Admin
 * @version	1.0.0
 * @since 1.0.0
 * @package	ThemeWoot
 * @author ThemeWoot Team 
 */
class Twoot_Admin {

	/**
	* Twoot_Admin Constructor.
	*
	* @since   1.0.0
	*/
	public function __construct() {
		add_action('admin_menu', array($this,'menus'), 9);
		add_action('after_setup_theme', array($this,'activated'));
		add_action('admin_init', array($this,'updated'));
		add_action('admin_notices',  array($this,'notices'));
	}


	/**
	* Menu
	*
	* @since   1.0.0
	*/
	public function menus() {
		add_theme_page( 'Options', esc_attr__('Theme Options',  'Twoot'), 'edit_theme_options', 'theme_opt', array($this,'theme_opt') );
		add_theme_page( 'Skins', esc_attr__('Theme Skins',  'Twoot'), 'edit_theme_options', 'theme_skin', array($this,'theme_skin') );
		add_theme_page( 'Fonts', esc_attr__('Theme Fonts',  'Twoot'), 'edit_theme_options', 'theme_font', array($this,'theme_font') );
	}


	/**
	* theme_opt
	*
	* @since   1.0.0
	*/
	public function theme_opt() {
		$page = include(TWOOT_PATH . '/theme/options/theme_opt.php');
		if($page['auto']) {
			new Twoot_Option_Generator($page['name'], $page['options']);
		}
	}

	/**
	* theme_font
	*
	* @since   1.0.0
	*/
	public function theme_font() {
		$page = include(TWOOT_PATH . '/theme/options/theme_font.php');
		if($page['auto']) {
			new Twoot_Option_Generator($page['name'], $page['options']);
		}
	}

	/**
	* theme_skin
	*
	* @since   1.0.0
	*/
	public function theme_skin() {
		$page = include(TWOOT_PATH . '/theme/options/theme_skin.php');
		if($page['auto']) {
			new Twoot_Option_Generator($page['name'], $page['options']);
		}
	}


	/**
	* Activated
	*
	* @since   1.0.0
	*/
	public function activated() {
		if ( ! twoot_get_checked_func('theme_setup') && 'themes.php' == basename($_SERVER['PHP_SELF']) && isset($_GET['activated']) && $_GET['activated']=='true' ) {
			// Install the data
			require_once(TWOOT_PATH . '/theme/functions/data.php');
			require_once(TWOOT_PATH . '/theme/functions/function-install.php');
			twoot_add_posts();

			// Update option
			$options=array(
				'show_on_front' => 'page',
				'page_on_front' => get_option( TWOOT_PREFIX . 'template_home_id' ),
				'posts_per_page' => twoot_get_frontend_func('opt', 'opt', 'blog_counts'),
				TWOOT_PREFIX . 'portfolio_cat_base' => 'portfolio-cat',
				TWOOT_PREFIX . 'portfolio_tag_base' => 'portfolio-tag',
				TWOOT_PREFIX . 'portfolio_item_base' => 'portfolio-item'
			);

			foreach ($options as $option=>$key) {
				update_option( $option, $key );
			}

			// Once done, we register our setting to make sure we don't duplicate everytime we activate.
			update_option( TWOOT_OPT_KEY . '_setup_status', '1' );
			update_option( TWOOT_OPT_KEY . '_version', TWOOT_VERSION );
			update_option( TWOOT_OPT_KEY . '_plugin_version', TWOOT_PLUGIN_VERSION );


			// Update meta
			update_post_meta(get_option( TWOOT_PREFIX . 'template_home_id' ), '_wp_page_template', 'template-block.php');
			update_post_meta(get_option( TWOOT_PREFIX . 'template_home_id' ), TWOOT_PREFIX . 'layout', 'full');
			update_post_meta(get_option( TWOOT_PREFIX . 'template_portfolio_id' ), '_wp_page_template', 'template-portfolio.php');
			update_post_meta(get_option( TWOOT_PREFIX . 'template_portfolio_id' ), TWOOT_PREFIX . 'layout', 'full');
			update_post_meta(get_option( TWOOT_PREFIX . 'template_blog_id' ), '_wp_page_template', 'template-blog.php');
			update_post_meta(get_option( TWOOT_PREFIX . 'template_blog_id' ), TWOOT_PREFIX . 'layout', 'right');
			update_post_meta(get_option( TWOOT_PREFIX . 'template_contact_id' ), '_wp_page_template', 'template-contact.php');
			update_post_meta(get_option( TWOOT_PREFIX . 'template_contact_id' ), TWOOT_PREFIX . 'layout', 'full');
			update_post_meta(get_option( TWOOT_PREFIX . 'template_coming_soon_id' ), '_wp_page_template', 'template-coming-soon.php');
			update_post_meta(get_option( TWOOT_PREFIX . 'template_coming_soon_id' ), TWOOT_PREFIX . 'layout', 'full');


			// Cache the custom css
			twoot_get_frontend_func('cache_css');
		}
	}


	/**
	* Updated
	*
	* @since   1.0.0
	*/
	public function updated() {
		if( twoot_get_checked_func('theme_version') ) {
			update_option( TWOOT_OPT_KEY . '_version', TWOOT_VERSION );
			update_option( TWOOT_OPT_KEY . '_plugin_version', TWOOT_PLUGIN_VERSION );

			// Cache the custom css
			twoot_get_frontend_func('cache_css');
		}
	}


	/**
	* Notices
	*
	* @since   1.0.0
	*/
	public function notices() {
		global $wp_version;
		$messages = array();

		if ( ! is_writeable(TWOOT_CACHE) ) {
			$messages[]='The cache folder ('.str_replace( WP_CONTENT_DIR, '', TWOOT_CACHE ).') is not writeable, please set the permission for this folder to 777.';
		}

		if ( is_multisite() ) {
			global $blog_id;
			if( ! is_writeable(TWOOT_CACHE . DIRECTORY_SEPARATOR . 'custom-'.$blog_id.'.css') ) {
				$messages[]='The skin style file ('.str_replace( WP_CONTENT_DIR, '', TWOOT_CACHE ) .'/custom-'.$blog_id.'.css'.') is not writeable, please set the permission for this file to 777.';
			}
		} else {
			if ( ! is_writeable(TWOOT_CACHE . DIRECTORY_SEPARATOR . 'custom.css') ) {
				$messages[]='The skin style file ('.str_replace( WP_CONTENT_DIR, '', TWOOT_CACHE ) . '/custom.css'.') is not writeable, please set the permission for this file to 777.';
			}
		}

		if ( ! twoot_get_checked_func('wp_version') ) {
			$messages[]='The current wordpress version('.$wp_version.') is too low. Please upgrade to 3.5 or above.';
		}

		if ( ! twoot_get_checked_func('toolkit_activated') ) {
			$messages[]='You have not installed the plugin: ThemeWoot Toolkit, please install the plugin to get more features.';
		}

		if ( twoot_get_checked_func('theme_setup') && isset( $_GET['activated'] ) ) {
			$messages[]='The ' . get_option( 'current_theme' ) . ' theme was successfully activated.';
		}

		if ( twoot_get_checked_func('plugin_version') && twoot_get_checked_func('toolkit_activated') ) {
			$messages[]='The current twoot toolkit plugin version('.get_option( TWOOT_PREFIX . 'toolkit_version' ).') is too low. Please upgrade to '.TWOOT_PLUGIN_VERSION.'.';
		}

		if(!empty($messages)){
			$html = '<ul>';
			foreach($messages as $message){
				$html .= '<li>'.$message.'</li>';
			}
			$html .= '</ul>';
			echo '<div id="theme-warning" class="error fade"><p><strong>'.sprintf(esc_attr__('%1$s Messages', 'Twoot'), TWOOT_NAME).'</strong><br/>'.$html.'</p></div>';
		}
	}
}

if(is_admin()) { 
	new Twoot_Admin(); 
}
}
?>