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

if( ! class_exists('Twoot_Frontend_Func') ) {
/**
 * Used for frontend funcations
 */
class Twoot_Frontend_Func {

	/**
	* The Featured Thumbnail
	*
	* @since   1.0.0
	*/
	function resize_thumbnail($post_id, $title, $width, $height, $crop) {
		if(function_exists('aq_resize')) {
			$url = wp_get_attachment_url($post_id);
			$thumbnail = aq_resize( $url, $width, $height, $crop, false );
			$html = '<img width="'.$thumbnail[1].'" height="'.$thumbnail[2].'" src="'.$thumbnail[0].'" alt="'.$title.'" title="'.$title.'" />';
			return $html;
		}
	}




	/**
	* The Featured Thumbnail
	*
	* @since   1.0.0
	*/
	function resize_thumbnail_by_url($url, $title, $width, $height, $crop) {	
		if(function_exists('aq_resize')) {
			$thumbnail = aq_resize( $url, $width, $height, $crop, false );

			$html = '<img width="'.$thumbnail[1].'" height="'.$thumbnail[2].'" src="'.$thumbnail[0].'" alt="'.$title.'" title="'.$title.'" />';
			return $html;
		}
	}




	/**
	* Get the post attachment images.
	*
	* @since   1.0.0
	*/
	function full_thumbnail($post_id, $alt, $size = 'full') {
		$attr = array(
			'class'	=> 'attachment-'.$size,
			'alt'	=> $alt
		);
		$html = wp_get_attachment_image($post_id, $size, false, $attr);
		return $html;
	}




	/**
	* Get the post attachment images src.
	*
	* @since   1.0.0
	*/
	function thumbnail_url($post_id) {	
		$html = wp_get_attachment_image_src($post_id, 'full', true);
		return $html[0];	
	}




	/**
	* Get option data.
	*
	* @since   1.0.0
	*/
	function opt($page, $name = NULL) {
		global $theme_options;
		if ($name == NULL) {
			if (isset($theme_options[$page])) {
				return $theme_options[$page];
			} else {
				return false;
			}
		} else {
			if (isset($theme_options[$page][$name])) {
				return $theme_options[$page][$name];
			} else {
				return false;
			}
		}
	}




	/**
	* Get meta data.
	*
	* @since   1.0.0
	*/
	function meta($var, $post_id = NULL) {
		global $post;

		if($post_id == NULL) {
			$id = get_the_ID();
		}else{
			$id = $post_id;
		}

		return get_post_meta($id, TWOOT_PREFIX.$var, true);
	}




	/**
	* Get page form id
	*
	* @since   1.0.0
	*/
	function page_name($id) {
		$page = get_page($id);

		if ($page) {
			return $page->post_title;
		} else {
			return null;
		}
	}




	/**
	* Get rand num.
	*
	* @since   1.0.0
	*/
	function rand_num($length) {
		srand((double)microtime()*1000000 );		
		$num = '';		
		$char_list = '0123456789';		
		for($i = 0; $i < $length; $i++) {
			$num .= substr($char_list,(rand()%(strlen($char_list))), 1);
		}		
		return $num;
	}




	/**
	* Convert hex to rgb color.
	*
	* @since   1.0.0
	*/
	function hex_to_rgb($hex) {
	   $hex = str_replace('#', '', $hex);

	   if(strlen($hex) == 3) {
			$r = hexdec(substr($hex,0,1).substr($hex,0,1));
			$g = hexdec(substr($hex,1,1).substr($hex,1,1));
			$b = hexdec(substr($hex,2,1).substr($hex,2,1));
	   } else {
			$r = hexdec(substr($hex,0,2));
			$g = hexdec(substr($hex,2,2));
			$b = hexdec(substr($hex,4,2));
	   }
	   $rgb = array($r, $g, $b);

	   return implode(',', $rgb); 
	}



	/**
	* Text Truncate.
	*
	* @since   1.0.0
	*/
	function text_truncate($str, $len=12, $dot=true, $pad='...') {
		$i = 0;
		$l = 0;
		$c = 0;
		$a = array();
		while ($l < $len) {
			$t = substr($str, $i, 1);
			if (ord($t) >= 224) {
				$c = 3;
				$t = substr($str, $i, $c);
				$l += 2;
			} elseif (ord($t) >= 192) {
				$c = 2;
				$t = substr($str, $i, $c);
				$l += 2;
			} else {
				$c = 1;
				$l++;
			}

			$i += $c;
			if ($l > $len) break;
			$a[] = $t;
		}
		$re = implode('', $a);
		if (substr($str, $i, 1) !== false) {
			array_pop($a);
			($c == 1) and array_pop($a);
			$re = implode('', $a);
			$dot and $re .= $pad;
		}
		return $re;
	}




	/**
	* Cache CSS
	*
	* @since   1.0.0
	*/
	function cache_css() {
		global $twoot, $blog_id;

		if ( is_writable(TWOOT_CACHE) ) {
			if( is_multisite() ){
				$file = TWOOT_CACHE . '/custom-'.$blog_id.'.css';
			}else{
				$file = TWOOT_CACHE . '/custom.css';
			}

			$fhandle = @fopen($file, 'w+');
			$content = include($twoot->theme_path() . '/theme/functions/custom-css.php');

			if ( $fhandle ) { 
				fwrite($fhandle, $content, strlen($content));
			}
		}
		return false;
	}



	/**
	* convert links to clickable format
	*
	* @since   1.0.0
	*/
	function twitter_convert_links($status,$targetBlank=true,$linkMaxLen=250) {
	 
		// the target
			$target=$targetBlank ? " target=\"_blank\" " : "";
		 
		// convert link to url
			$status = preg_replace("/((http:\/\/|https:\/\/)[^ )]+)/e", "'<a href=\"$1\" title=\"$1\" $target>'. ((strlen('$1')>=$linkMaxLen ? substr('$1',0,$linkMaxLen).'...':'$1')).'</a>'", $status);
		 
		// convert @ to follow
			$status = preg_replace("/(@([_a-z0-9\-]+))/i","<a href=\"http://twitter.com/$2\" title=\"Follow $2\" class=\"follower\" $target>$1</a>",$status);
		 
		// convert # to search
			$status = preg_replace("/(#([_a-z0-9\-]+))/i","<a href=\"https://twitter.com/search?q=$2\" title=\"Search $1\" $target>$1</a>",$status);
		 
		// return the status
			return $status;
	}



	/**
	* convert dates to readable format
	*
	* @since   1.0.0
	*/
	function twitter_relative_time($a) {
		//get current timestampt
		$b = strtotime("now"); 
		//get timestamp when tweet created
		$c = strtotime($a);
		//get difference
		$d = $b - $c;
		//calculate different time values
		$minute = 60;
		$hour = $minute * 60;
		$day = $hour * 24;
		$week = $day * 7;
			
		if(is_numeric($d) && $d > 0) {
			//if less then 3 seconds
			if($d < 3) return "right now";
			//if less then minute
			if($d < $minute) return floor($d) . " seconds ago";
			//if less then 2 minutes
			if($d < $minute * 2) return "about 1 minute ago";
			//if less then hour
			if($d < $hour) return floor($d / $minute) . " minutes ago";
			//if less then 2 hours
			if($d < $hour * 2) return "about 1 hour ago";
			//if less then day
			if($d < $day) return floor($d / $hour) . " hours ago";
			//if more then day, but less then 2 days
			if($d > $day && $d < $day * 2) return "yesterday";
			//if less then year
			if($d < $day * 365) return floor($d / $day) . " days ago";
			//else return more than a year
			return "over a year ago";
		}
	}
}

/*
* Get Front Funcations
* 
*/
function twoot_get_frontend_func($function) {
	global $_Twoot_Frontend_Func;
	if($_Twoot_Frontend_Func==null){
		$_Twoot_Frontend_Func = new Twoot_Frontend_Func;
	}
	$args = array_slice( func_get_args(), 1 );
	return call_user_func_array(array( &$_Twoot_Frontend_Func, $function ), $args );
}

}