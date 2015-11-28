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

if( ! class_exists( 'Twoot_Generator') )
{
/**
 * Twoot_Generator Class
 *
 * @class Twoot_Generator
 * @version	1.0
 * @since 1.0
 * @package ThemeWoot
 * @author ThemeWoot Team 
 */
class Twoot_Generator {

	/*
	 * Logo
	*/
	function logo() {
		$html = '<div id="logo">';
		$html .= '<h1 class="title">';
		$html .= '<a href="'.home_url( '/' ).'" title="'.esc_attr__( get_bloginfo( 'name', 'display' ) ).'" rel="nofollow">';
		if($logo = twoot_get_frontend_func('opt', 'opt', 'standard_logo')) {
			$html .= '<img src="'.$logo.'" class="standard-logo" />';
		}else{
			$html .= get_bloginfo( 'name' );
		}
		$html .= '</a>';
		$html .= '</h1>';

		if(twoot_get_frontend_func('opt', 'opt', 'show_tagline')) {
			if($tagline=twoot_get_frontend_func('opt', 'opt', 'tagline_text')) {
				$html .= '<p class="tagline">'. stripslashes($tagline).'</p>';
			}
		}
		$html .= '</div>';
		
		return $html;
	}





	/*
	 * Retina Logo
	*/
	function retina_logo() {
		if($retina_logo_url=twoot_get_frontend_func('opt', 'opt', 'retina_logo')) {
			global $wpdb;
			$table_name = $wpdb->prefix . 'posts';
			$retina_logo_id = $wpdb->get_var("SELECT ID FROM $table_name WHERE guid = '" . $retina_logo_url . "' AND post_type = 'attachment'");
			$retina_logo = wp_get_attachment_image_src($retina_logo_id, 'full', true);
			$src = $retina_logo[0];
			$width = $retina_logo[1]/2;
			$height = $retina_logo[2]/2;

			$html = '
			<script type="text/javascript">
			//<![CDATA[
			jQuery(document).ready(function() {
				var retina=window.devicePixelRatio>1? true:false;
				if(retina){jQuery("#logo .standard-logo").attr("src","'.$src.'").attr("width","'.$width.'").attr("height","'.$height.'");}
			});
			//]]>
			</script>';

			return $html;
		}
	}





	/*
	 * Menu
	*/
	function menu() {
		$html = '<nav id="top-menu">';
		$html .= '<ul class="sf-menu clearfix">';
		if (has_nav_menu('top_menu')) {
			$args = array( 
				'container' => '',
				'items_wrap' => '%3$s',
				'depth' => 0,
				'echo' => false,
				'theme_location' => 'top_menu'
			);
			$html .= wp_nav_menu($args); 
		} else {
			$args = array(
				'title_li' => 0,
				'depth' => 0,
				'echo' => false,
				'sort_column' => 'menu_order'
			);
			$html .= wp_list_pages($args); 
		}
		$html .= '</ul>';
		$html .= '</nav>';

		return $html;
	}





	/*
	 * Responsive Menu
	*/
	function responsive_menu() {
		$html = '<nav class="responsive-menu-wrap hide">';
		$html .= '<div class="responsive-menu-switch-wrap clearfix">';
		$html .= '<a href="#" class="responsive-menu-switch twoot-icon open" id="toggle-top-responsive-menu"></a>';
		if(twoot_get_checked_func('woo_activated')) { $html .= twoot_woo_generator('responsive_mini_cart'); }
		$html .= '</div>';
		$html .= '<div class="responsive-menu top-responsive-menu hide">';
		$html .= '<ul>';
		if (has_nav_menu('top_menu')) {
			$args = array( 
				'container' => '',
				'items_wrap' => '%3$s',
				'depth' => 0,
				'echo' => false,
				'theme_location' => 'top_menu'
			);
			$html .= wp_nav_menu($args); 
		} else {
			$args = array(
				'title_li' => 0,
				'depth' => 0,
				'echo' => false,
				'sort_column' => 'menu_order'
			);
			$html .= wp_list_pages($args); 
		}
		$html .= '</ul>';
		$html .= '</div>';
		$html .= '</nav>';

		return $html;
	}





	/*
	 * Bottom Menu
	*/
	function bottom_menu() {
		if (has_nav_menu('bottom_menu')) {
			$args = array( 
				'container' => '',
				'items_wrap' => '%3$s',
				'depth' => 0,
				'echo' => false,
				'theme_location' => 'bottom_menu'
			);

			$html = '<footer class="site-bottom-menu has-line">';
			$html .= '<section class="container">';
			$html .= '<div class="inner">';
			$html .= '<nav id="bottom-menu">';
			$html .= '<ul class="clearfix">';
			$html .= wp_nav_menu($args); 
			$html .= '</ul>';
			$html .= '</nav>';
			$html .= '</div>';
			$html .= '</section>';
			$html .= '</footer>';

			return $html;
		} 
	}




	/*
	 * Social Icons
	*/
	function social_icons($position, $show_icons) {
		
		$icons = $this->icons();

		$icons_text = array(
			'behance' => esc_attr__('Behance', 'Twoot'),
			'dribbble' => esc_attr__('Dribbble', 'Twoot'),
			'facebook' => esc_attr__('Facebook', 'Twoot'),
			'flickr' => esc_attr__('Flickr', 'Twoot'),
			'fivehundredpx' => esc_attr__('500PX', 'Twoot'),
			'google' => esc_attr__('Google+', 'Twoot'),
			'linkedin' => esc_attr__('Linkedin', 'Twoot'),
			'instagram' => esc_attr__('Instagram', 'Twoot'),
			'pinterest' => esc_attr__('Pinterest', 'Twoot'),
			'rss' => esc_attr__('Rss', 'Twoot'),
			'soundcloud' => esc_attr__('Soundcloud', 'Twoot'),
			'tumblr' => esc_attr__('Tumblr', 'Twoot'),
			'twitter' => esc_attr__('Twitter', 'Twoot'),
			'vimeo' => esc_attr__('Vimeo', 'Twoot'),
			'youtube' => esc_attr__('Youtube', 'Twoot')
		);
		$current_icons = twoot_get_frontend_func('opt', 'opt', 'current_social_icons');
		$all_icons = array('behance', 'dribbble', 'facebook', 'flickr', 'fivehundredpx', 'google', 'linkedin', 'instagram', 'pinterest', 'rss', 'soundcloud', 'tumblr', 'twitter', 'vimeo', 'youtube');

		if($show_icons) 
		{
			$html = '<div class="social-icons '.$position.'-social-icons">';
			if(is_array($current_icons) && !empty($current_icons)) {
				foreach($current_icons as $current_icon)
				{
					if(in_array($current_icon, $all_icons, true))
					{
						if($icons[$current_icon]) {
							$html .= '<a href="'.$icons[$current_icon].'" class="'.$current_icon.'" rel="external"><i class="icon twoot-icon-'.$current_icon.'"></i>';
							if($position=='top') { 
								$html .= '<div class="tip"><div class="text">'.$icons_text[$current_icon].'<span></span></div></div>'; 
							}
							$html .= '</a>'; 
						}
					}
				}
			}
			$html .= '</div>';

			return $html;
		}
	}





	/*
	 * Icons
	*/
	function icons() {
		$icons = array(
			'behance' => twoot_get_frontend_func('opt', 'opt', 'behance'),
			'dribbble' => twoot_get_frontend_func('opt', 'opt', 'dribbble'),
			'facebook' => twoot_get_frontend_func('opt', 'opt', 'facebook'),
			'flickr' => twoot_get_frontend_func('opt', 'opt', 'flickr'),
			'fivehundredpx' => twoot_get_frontend_func('opt', 'opt', 'fivehundredpx'),
			'google' => twoot_get_frontend_func('opt', 'opt', 'google'),
			'linkedin' => twoot_get_frontend_func('opt', 'opt', 'linkedin'),
			'instagram' => twoot_get_frontend_func('opt', 'opt', 'instagram'),
			'pinterest' => twoot_get_frontend_func('opt', 'opt', 'pinterest'),
			'rss' => twoot_get_frontend_func('opt', 'opt', 'rss'),
			'soundcloud' => twoot_get_frontend_func('opt', 'opt', 'soundcloud'),
			'tumblr' => twoot_get_frontend_func('opt', 'opt', 'tumblr'),
			'twitter' => twoot_get_frontend_func('opt', 'opt', 'twitter'),
			'vimeo' => twoot_get_frontend_func('opt', 'opt', 'vimeo'),
			'youtube' => twoot_get_frontend_func('opt', 'opt', 'youtube')
		);

		return $icons;
	}





	/*
	 * Search
	*/
	function search() {
		if(twoot_get_frontend_func('opt', 'opt', 'show_search')) {
			$html = '<div class="top-search">';
			$html .= '<a class="top-search-bt open" href="#"><i class="icon twoot-icon"></i></a>';
			$html .= '</div>';
			$html .= '<div class="top-search-wrapper hide">';
			$html .= '<div id="searchform" class="container">';
			$html .= '<form action="'.home_url('/').'" method="get" class="inner">';
			$html .= '<input type="text" class="text-field" name="s" size="24" value="" placeholder="'.esc_attr__('Enter your keywords here...', 'Twoot').'" />';

			switch (twoot_get_frontend_func('opt', 'opt', 'search_type')) 
			{
				case '5':
					$html .= '<input type="hidden" name="post_type" value="portfolio" />';
				break;

				case '6':
					$html .= '<input type="hidden" name="post_type" value="product" />';
				break;
			}

			$html .= '</form>';
			$html .= '</div>';
			$html .= '</div>';

			return $html;
		}
	}





	/*
	 * Page Title
	*/
	function page_title($type) {
		switch ($type) 
		{
			case 'page':
				if(!is_front_page() && twoot_get_frontend_func('meta', 'show_page_header')==true) 
				{
					$class = twoot_get_frontend_func('meta', 'show_line')==true?' has-line':'';
					$title = twoot_get_frontend_func('meta', 'page_title')? twoot_get_frontend_func('meta', 'page_title'):get_the_title();
					$desc = twoot_get_frontend_func('meta', 'page_desc');
					$html = '<header class="site-page-header'.$class.' clearfix">';
					$html .= '<div class="entry-page-header">';
					$html .= '<h1 class="entry-title">'.$title.'</h1>';
					if($desc) { $html .= '<div class="entry-desc">'.stripslashes($desc).'</div>'; }
					$html .= '</div>';
					$html .= '</header>';

					return $html;
				}
			break;

			case 'archive':
				$desc = '';
				if ( is_category() )
				{
					$args = array ('<p>', '</p>');
					$title = single_cat_title('',false);
					$desc = str_replace($args, '', term_description());
				}
				elseif (is_day())
				{
					$title = esc_attr__('Archive for date:','Twoot')." ".get_the_time('F jS, Y');
				}
				elseif (is_month())
				{
					$title = esc_attr__('Archive for month:','Twoot')." ".get_the_time('F, Y');
				}
				elseif (is_year())
				{
					$title = esc_attr__('Archive for year:','Twoot')." ".get_the_time('Y');
				}
				elseif (is_search())
				{
					switch (twoot_get_frontend_func('opt', 'opt', 'search_type')) 
					{
						case '1': $types=array('post', 'page', 'portfolio', 'product'); break;
						case '2': $types=array('post', 'page'); break;
						case '3': $types=array('post'); break;
						case '4': $types=array('page'); break;
						case '5': $types=array('portfolio'); break;
						case '6': $types=array('product'); break;
					}

					// Get Query
					$query = new Twoot_Query(array('post_type'	=> $types));
					$do_query = new WP_Query($query->do_global_query());

					if(!empty($do_query->found_posts))
					{
						if($do_query->found_posts > 1)
						{
							$title =  $do_query->found_posts ." ". esc_attr__('search results for:','Twoot')." ".esc_attr__( get_search_query() );
						}
						else
						{
							$title =  $do_query->found_posts ." ". esc_attr__('search result for:','Twoot')." ".esc_attr__( get_search_query() );
						}
					}
					else
					{
						if(!empty($_GET['s']))
						{
							$title = esc_attr__('Search results for:','Twoot')." ".esc_attr__( get_search_query() );
						}
						else
						{
							$title = esc_attr__('To search the site please enter a valid term','Twoot');
						}
					}

				}
				elseif (is_author())
				{
					$curauth = (get_query_var('author_name')) ? get_user_by('slug', get_query_var('author_name')) : get_userdata(get_query_var('author'));
					$title = esc_attr__('Author Archive','Twoot')." ";

					if(isset($curauth->nickname)) $title .= esc_attr__('for:','Twoot')." ".$curauth->nickname;

				}
				elseif (is_tag())
				{
					$title = esc_attr__('Tag Archive for:','Twoot')." ".single_tag_title('',false);
				}
				elseif(is_tax())
				{
					$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
					$title = $term->name;
					$args = array ('<p>', '</p>');
					$desc = str_replace($args, '', term_description());
				}
				else
				{
					$title = esc_attr__('Archives','Twoot')." ";
				}

				if (isset($_GET['paged']) && !empty($_GET['paged']))
				{
					$title .= " (".esc_attr__('Page','Twoot')." ".$_GET['paged'].")";
				}

				$html = '<header class="site-page-header has-line clearfix">';
				$html .= '<div class="entry-page-header">';
				$html .= '<h1 class="entry-title">'.$title.'</h1>';
				if($desc) { $html .= '<div class="entry-desc">'.stripslashes($desc).'</div>'; }
				$html .= '</div>';
				$html .= '</header>';

				return $html;
			break;
		}
	}





	/*
	 * Sidebar
	*/
	function sidebar($widget, $layout) {

		$html = '<aside id="secondary" class="sidebar-'.$layout.' side-widgets-area  column four">';
		$html .= '<div class="inner">';
		ob_start();
		dynamic_sidebar($widget.'-widget-area');
		$html .= ob_get_clean();
		$html .= '</div>';
		$html .= '</aside>';
		$html .= '<!--end #secondary-->';

		return $html;
	}






	/*
	 * Pagination
	*/
	function pagination($query = false) {
		global $paged, $wp_query;

		// set the query variable (default $wp_query)
		$q = ($query) ? $query : $wp_query;

		if(get_query_var('paged')) {
		     $paged = get_query_var('paged');
		} elseif(get_query_var('page')) {
		     $paged = get_query_var('page');
		} else {
		     $paged = 1;
		}

		$html = '';
		$prev = $paged - 1;
		$next = $paged + 1;
		$range = 2; // only edit this if you want to show more page-links
		$showitems = ($range * 2)+1;

		$pages = $q->max_num_pages;
		if(!$pages)
		{
			$pages = 1;
		}

		if($pages >1)
		{
			$html .= "<div class='pagination clearfix'>";
			$html .= "<div class='column three prev'>";
			$html .= ($paged > 1)? "<a href='".get_pagenum_link($prev)."'>".esc_attr__('&lsaquo; Previous', 'Twoot')."</a>":"<span class='disabled'>".esc_attr__('&lsaquo; Previous', 'Twoot')."</span>";
			$html .= "</div>";
			$html .= "<div class='column six pagin'>";
			$html .= ($paged > 2 && $paged > $range+1 && $showitems < $pages)? "<a href='".get_pagenum_link(1)."'>&laquo;</a>":"";

			for ($i=1; $i <= $pages; $i++)
			{
				if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
				{
					$html .= ($paged == $i)? "<span class='current'>".$i."</span>":"<a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a>";
				}
			}

			$html .= ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) ? "<a href='".get_pagenum_link($pages)."'>&raquo;</a>":"";
			$html .= "</div>";
			$html .= "<div class='column three next'>";
			$html .= ($paged < $pages) ? "<a href='".get_pagenum_link($next)."'>".esc_attr__('Next &rsaquo;', 'Twoot')."</a>" :"<span class='disabled'>".esc_attr__('Next &rsaquo;', 'Twoot')."</span>";
			$html .= "</div>";
			$html .= "</div>\n";
		}

		return $html;
	}






	/*
	 * Zoom
	*/
	function zoom($type, $fancybox) {
		$link = twoot_get_frontend_func('meta', 'post_link')=='custom' && twoot_get_frontend_func('meta', 'custom_url')!=false? twoot_get_frontend_func('meta', 'custom_url'):get_permalink();

		switch ($type) 
		{
			case 'standard':
				$html = '<a href="'.$link.'" class="zoom"><i class="twoot-icon-forward"></i></a>';
				return $html;
			break;

			case 'gallery':
				$ids = twoot_get_frontend_func('meta', 'gallery_id');
				if(is_array($ids) && !empty($ids))
				{
					$count = 0;
					$html = '';
					foreach ($ids as $id) {
						$count++;
						$caption=trim(strip_tags(get_post($id)->post_excerpt));
						$class=$count>1? 'class="fancybox-'.$fancybox.' hide"':'class="fancybox-'.$fancybox.' zoom"';
						$icon=$count==1? '<i class="twoot-icon-image"></i>':'';
						$rel=count($ids)>1? ' rel="gallery-'.get_the_ID().'"':'';
						$tilte=$caption!=false? ' title="'.$caption.'"':'';
						$html .= '<a href="'.twoot_get_frontend_func('thumbnail_url', $id).'" '.$class.$rel.$tilte.'>'.$icon.'</a>';
					}
				}else{
					$html = '<a href="'.$link.'" class="zoom"><i class="twoot-icon-forward"></i></a>';
				}
				return $html;
			break;

			case 'video':
				// replace the link and get the the embed id.
				$array = array (
					'http://www.youtube.com/watch?v=', 
					'http://youtu.be/',
					'http://www.youtube.com/embed/',
					'http://vimeo.com/',
					'http://player.vimeo.com/video/'
				);

				$id=trim(str_replace($array, '', twoot_get_frontend_func('meta', 'video_url')));

				if( twoot_get_frontend_func('meta', 'video_code')==false && $id ) {
					$link=twoot_get_frontend_func('meta', 'video_player')=='youtube'? 'http://www.youtube.com/watch?v='.$id:'http://vimeo.com/'.$id;
					$html = '<a href="'.$link.'" class="zoom"><i class="twoot-icon-video"></i></a>';
				}else{
					$html = '<a href="'.$link.'" class="zoom"><i class="twoot-icon-forward"></i></a>';
				}
				return $html;
			break;
		}
	}






	/*
	 * Post Slider
	*/
	function post_slider($ids, $width, $height, $crop, $lightbox) {
		if(is_array($ids) && !empty($ids))
		{
			$count = 0;
			$type=is_singular(array( 'post', 'portfolio' ))? 'single':'list';
			$html = '<div id="post-slider-'.get_the_ID().'" class="bx-slider post-slider-wrapper">';
			$html .= '<ul class="post-slider post-slider-'.$type.'">';
			foreach ($ids as $id) {
				$count++;
				$desc=trim(strip_tags(get_post($id)->post_content));
				$caption=trim(strip_tags(get_post($id)->post_excerpt));
				$tilte=$caption!=false? ' title="'.$caption.'"':'';
				$alt = trim(strip_tags(get_post_meta($id, '_wp_attachment_image_alt', true)));
				$class=is_singular(array( 'post', 'portfolio' ))? 'class="fancybox-gallery"':'class="not-fancybox-gallery"';
				$rel=is_singular(array( 'post', 'portfolio' )) && count($ids)>1? ' rel="gallery-'.get_the_ID().'"':'';
				$link=is_singular(array( 'post', 'portfolio' ))? twoot_get_frontend_func('thumbnail_url', $id):get_permalink();
				$html .= '<li class="img-preload img-hover">';

				if(is_singular(array( 'post', 'portfolio' )) && $lightbox==false)
				{
					$html .= twoot_get_frontend_func('resize_thumbnail', $id, $caption, $width, $height, $crop).'<div class="overlay"></div>';
				}
				else
				{
					$html .= '<a href="'.$link.'" '.$class.$rel.$tilte.'>'.twoot_get_frontend_func('resize_thumbnail', $id, $caption, $width, $height, $crop).'<div class="overlay"></div></a>';
				}

				if($caption) { $html .= '<div class="bx-caption"><span>'.$caption.'</span></div>'; }
				$html .= '</li>';
			}
			$html .= '</ul>';
			$html .= '</div>';

			return $html;
		}
	}






	/*
	* Post Masonry
	*/
	function post_masonry($ids, $width, $height, $crop, $lightbox, $columns) {
		if(is_array($ids) && !empty($ids))
		{
			$count = 0;

			// Set the columns
			switch($columns) {
				case 2: $grid = 'six'; break;
				case 3: $grid = 'four'; break;
				case 4: $grid = 'three'; break;
			}

			$html = '<div class="post-masonry-wrapper outer">';
			$html .= '<ul class="filter-items clearfix">';

			foreach ($ids as $id) {
				$count++;
				$desc=trim(strip_tags(get_post($id)->post_content));
				$caption=trim(strip_tags(get_post($id)->post_excerpt));
				$tilte=$caption!=false? ' title="'.$caption.'"':'';
				$alt = trim(strip_tags(get_post_meta($id, '_wp_attachment_image_alt', true)));
				$class=is_singular(array( 'post', 'portfolio' ))? 'class="fancybox-gallery"':'class="not-fancybox-gallery"';
				$rel=is_singular(array( 'post', 'portfolio' )) && count($ids)>1? ' rel="gallery-'.get_the_ID().'"':'';
				$link=is_singular(array( 'post', 'portfolio' ))? twoot_get_frontend_func('thumbnail_url', $id):get_permalink();

				$html .= '<li class="img-preload img-hover item column '.$grid.'">';
				$html .= '<div class="inner">';

				if(is_singular(array( 'post', 'portfolio' )) && $lightbox==false)
				{
					$html .= twoot_get_frontend_func('resize_thumbnail', $id, $caption, $width, $height, $crop).'<div class="overlay"></div>';
				}
				else
				{
					$html .= '<a href="'.$link.'" '.$class.$rel.$tilte.'>'.twoot_get_frontend_func('resize_thumbnail', $id, $caption, $width, $height, $crop).'<div class="overlay"></div></a>';
				}

				if($caption) { $html .= '<div class="caption"><span>'.$caption.'</span></div>'; }

				$html .= '</div>';
				$html .= '</li>';
			}

			$html .= '</ul>';
			$html .= '</div>';

			return $html;
		}
	}






	/*
	 * Post Image
	*/
	function post_image($ids, $width, $height, $crop, $lightbox) {
		if(is_array($ids) && !empty($ids))
		{
			$count = 0;
			$html = '<div class="post-image-wrapper">';
			$html .= '<ul>';
			foreach ($ids as $id) {
				$count++;
				$desc=trim(strip_tags(get_post($id)->post_content));
				$caption=trim(strip_tags(get_post($id)->post_excerpt));
				$tilte=$caption!=false? ' title="'.$caption.'"':'';
				$alt = trim(strip_tags(get_post_meta($id, '_wp_attachment_image_alt', true)));
				$class=is_singular(array( 'post', 'portfolio' ))? 'class="fancybox-gallery"':'class="not-fancybox-gallery"';
				$rel=count($ids)>1? ' rel="gallery-'.get_the_ID().'"':'';
				$link=is_singular(array( 'post', 'portfolio' ))? twoot_get_frontend_func('thumbnail_url', $id):get_permalink();

				$html .= '<li>';
				$html .= '<figure class="img-preload img-hover">';
				
				if(is_singular(array( 'post', 'portfolio' )) && $lightbox==false) {
					$html .= twoot_get_frontend_func('resize_thumbnail', $id, $caption, $width, $height, $crop).'<div class="overlay"></div>';
				} else {
					$html .= '<a href="'.$link.'" '.$class.$rel.$tilte.'>'.twoot_get_frontend_func('resize_thumbnail', $id, $caption, $width, $height, $crop).'<div class="overlay"></div></a>';
				}

				$html .= '</figure>';

				if($caption) { $html .= '<div class="image-caption">'.$caption.'</div>'; }

				$html .= '</li>';

				if (! is_singular(array( 'post', 'portfolio' )) && $count==1 ) { break; }
			}
			$html .= '</ul>';
			$html .= '</div>';

			return $html;
		}
	}




	/*
	 * Post Video
	*/
	function post_video($type, $url, $embed, $width, $height) {
		$tag='iframe';
		if($width == false) { $width = 940; }
		if($height == false) { $height = $width * 9/16; }

		if($type=='youtube')
		{
			$args = array (
				'http://www.youtube.com/watch?v=', 
				'http://youtu.be/',
				'http://www.youtube.com/embed/'
			);
		}
		else
		{
			$args = array (
				'http://vimeo.com/',
				'http://player.vimeo.com/video/'
			);
		}
		$id = trim(str_replace( $args, '', $url ));

		$html = '<div class="post-video-wrapper fitvids">';
		if($embed) {
			$html .= $embed;
		}else{
			if($type=='youtube') {
				$html .= '<'.$tag.' width="'.$width.'" height="'.$height.'" src="http://www.youtube.com/embed/'.$id.'?rel=0" frameborder="0" allowfullscreen></'.$tag.'>';
			}elseif($type=='vimeo') {
				$html .= '<'.$tag.' width="'.$width.'" height="'.$height.'" src="http://player.vimeo.com/video/'.$id.'" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></'.$tag.'>';
			}
		}
		$html .= '</div>';

		return $html;
	}





	/*
	 * Post Audio
	*/
	function post_audio($url, $embed, $height=166) {
		$tag='iframe';
		$id = trim(str_replace( 'http://api.soundcloud.com/tracks/', '', $url ));

		$html = '<div class="post-audio-wrapper fitvids">';
		if($embed) {
			$html .= $embed;
		}else{
			$html .= '<'.$tag.' width="100%" height="'.$height.'" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=http://api.soundcloud.com/tracks/'.$id.'"></'.$tag.'>';
		}
		$html .= '</div>';

		return $html;
	}




	/*
	 * Post Excerpt
	*/
	function post_excerpt($length, $dot, $pad, $more_text) {
		$more_link = '<p><a href="'.get_permalink().'" class="more-link">'.$more_text.'</a></p>';
		$excerpt = get_post(get_the_id())->post_excerpt;

		if($excerpt !== false)
		{
			$html = get_the_excerpt();
			$html .= $more_link;
		}

		if($excerpt == false)
		{
			global $more;
			$more = 0;
			$content = get_the_content($more_text);
			$content = str_replace(']]>', ']]&gt;', apply_filters('the_content', $content));
			$pos = strpos(get_the_content(), 'class="more-link"');

			if($pos !== false)
			{
				$html = $content;
			}
			else
			{
				$html = twoot_get_frontend_func('text_truncate', strip_tags($content), $length, $dot, $pad);
				$html .= $more_link;
			}
		}

		return $html;
	}



	/*
	 * The Excerpt
	*/
	function the_excerpt($length, $dot, $pad) {
		$excerpt = get_post(get_the_id())->post_excerpt;

		if($excerpt !== false)
		{
			$content = get_the_excerpt();
			$content = str_replace(array ('[', ']'), '', apply_filters('the_excerpt', $content));
		}
		else
		{
			$content = get_the_content();
			$content = str_replace(']]>', ']]&gt;', apply_filters('the_content', $content));
		}

		$html = twoot_get_frontend_func('text_truncate',  strip_tags($content), $length, $dot, $pad);
		
		return $html;
	}




	/*
	 * Portfolio Meta
	*/
	function portfolio_meta() {
		$html = '<div class="entry-meta">';
		if($client=twoot_get_frontend_func('meta', 'client')) { 
			$html .= '<div class="row client"><strong>'.esc_attr__('Client:', 'Twoot').'</strong>'.$client.'</div>'; 
		}
		if($date=twoot_get_frontend_func('meta', 'date')) { 
			$html .= '<div class="row date"><strong>'.esc_attr__('Date:', 'Twoot').'</strong>'.$date.'</div>'; 
		}
		if($categories=get_the_term_list( get_the_ID(), 'portfolio_cat', '', ', ', '')) {
			$html .= '<div class="row categories"><strong>'.esc_attr__('Categories:', 'Twoot').'</strong>'.$categories.'</div>';
		}
		if($tags=get_the_term_list( get_the_ID(), 'portfolio_tag', '', ', ', '')) {
			$html .= '<div class="row tags"><strong>'.esc_attr__('Tags:', 'Twoot').'</strong>'.$tags.'</div>';
		}
		if($client_url=twoot_get_frontend_func('meta', 'client_url')) {
			$html .= '<div class="client-url"><a href="'.$client_url.'" class="button button-medium button-active">'.esc_attr__('Launch Project &raquo;', 'Twoot').'</a></div>'; 
		}
		$html .= '</div>';

		return $html;
	}






	/*
	 * Top Widgets
	*/
	function top_widgets() {
		$columns=twoot_get_frontend_func('opt', 'opt', 'top_widgets_column');

		switch($columns)
		{
			case 1: $class = 'twelve'; break;
			case 2: $class = 'six'; break;
			case 3: $class = 'four'; break;
			case 4: $class = 'three'; break;
		}

		if($columns == '1')
		{
			if ( ! is_active_sidebar( 'top-widget-area-1' ))
			return;
		}
		elseif($columns == '2')
		{
			if ( ! is_active_sidebar( 'top-widget-area-1' )
				&& ! is_active_sidebar( 'top-widget-area-2' )
			)
			return;
		}
		elseif($columns == '3')
		{
			if ( ! is_active_sidebar( 'top-widget-area-1' )
				&& ! is_active_sidebar( 'top-widget-area-2' )
				&& ! is_active_sidebar( 'top-widget-area-3' )
			)
			return;
		}
		elseif($columns == '4')
		{
			if ( ! is_active_sidebar( 'top-widget-area-1' )
				&& ! is_active_sidebar( 'top-widget-area-2' )
				&& ! is_active_sidebar( 'top-widget-area-3' )
				&& ! is_active_sidebar( 'top-widget-area-4' )
			)
			return;
		}


		if(twoot_get_frontend_func('opt', 'opt', 'show_top_widgets'))
		{
			$html = '<header class="top-widgets-area hide">';
			$html .= '<section class="container clearfix">';
			for ($i = 1; $i <= $columns; $i++)
			{
				$html .= '<div class="'.$class.' column">';
				$html .= '<div class="inner">';
				ob_start();
				dynamic_sidebar('top-widget-area-'.$i);
				$html .= ob_get_clean();
				$html .= '</div>';
				$html .= '</div>';
			}
			$html .= '</section>';
			$html .= '</header>';

			return $html;
		}
	}






	/*
	 * Bottom Widgets
	*/
	function bottom_widgets() {
		$columns=twoot_get_frontend_func('opt', 'opt', 'widgets_column');

		switch($columns)
		{
			case 1: $class = 'twelve'; break;
			case 2: $class = 'six'; break;
			case 3: $class = 'four'; break;
			case 4: $class = 'three'; break;
		}

		if($columns == '1')
		{
			if ( ! is_active_sidebar( 'bottom-widget-area-1' ))
			return;
		}
		elseif($columns == '2')
		{
			if ( ! is_active_sidebar( 'bottom-widget-area-1' )
				&& ! is_active_sidebar( 'bottom-widget-area-2' )
			)
			return;
		}
		elseif($columns == '3')
		{
			if ( ! is_active_sidebar( 'bottom-widget-area-1' )
				&& ! is_active_sidebar( 'bottom-widget-area-2' )
				&& ! is_active_sidebar( 'bottom-widget-area-3' )
			)
			return;
		}
		elseif($columns == '4')
		{
			if ( ! is_active_sidebar( 'bottom-widget-area-1' )
				&& ! is_active_sidebar( 'bottom-widget-area-2' )
				&& ! is_active_sidebar( 'bottom-widget-area-3' )
				&& ! is_active_sidebar( 'bottom-widget-area-4' )
			)
			return;
		}

		if(twoot_get_frontend_func('opt', 'opt', 'show_widgets'))
		{
			$html = '<footer class="bottom-widgets-area">';
			$html .= '<section class="container clearfix">';
			for ($i = 1; $i <= $columns; $i++)
			{
				$html .= '<div class="'.$class.' column">';
				$html .= '<div class="inner">';
				ob_start();
				dynamic_sidebar('bottom-widget-area-'.$i);
				$html .= ob_get_clean();
				$html .= '</div>';
				$html .= '</div>';
			}
			$html .= '</section>';
			$html .= '</footer>';

			return $html;
		}
	}



	/**
	* Load template
	*
	* @since   1.0.0
	*/
	function load_template($slug) {

		$file = TWOOT_PATH . '/templates/custom-content/' . $slug . '.php';

		if ( file_exists( $file ) ) {
			$located = 'custom-content';
		} else { 
			$located = 'content';
		}

		ob_start();
		get_template_part( 'templates/' . $located . '/' . $slug );
		$template = ob_get_clean();

		return $template;
	}



	/**
	* Carousel script
	*
	* @since   1.0.0
	*/
	function carousel_script($id, $auto, $speed, $pause, $move_slides, $tag) {
		$html = '
		<script type="text/javascript">
		jQuery(document).ready(function() {
			jQuery("#post-carousel-'.$id.'").bxSlider({
				auto: '.$auto.',
				speed: '.$speed.',
				pause: '.$pause.',
				moveSlides: '.$move_slides.',
				minSlides: 1,
				maxSlides: '.$tag.'_scrollCount,
				slideWidth: '.$tag.'_itemWidth,
				slideMargin: '.$tag.'_itemMargin,
				touchEnabled: true,
				easing: "easeOutCubic",
				nextText: "",
				prevText: "",
				pager: false
			});
		});
		</script>';

		return $html;
	}

}



/*
* Get theme generator
* 
*/
function twoot_generator($function){
	global $_Twoot_Generator;
	if($_Twoot_Generator==null){
		$_Twoot_Generator = new Twoot_Generator();
	}
	$args = array_slice( func_get_args(), 1 );
	return call_user_func_array(array( &$_Twoot_Generator, $function ), $args );
}
}
?>