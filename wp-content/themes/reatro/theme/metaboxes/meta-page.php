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


$layouts = array(
	'left' => esc_attr__('Left Side', 'Twoot'),
	'full' => esc_attr__('Full Width', 'Twoot'),
	'right' => esc_attr__('Right Side', 'Twoot')
);

if(twoot_get_checked_func('woo_activated')) {
	$sidebars = array(
		'0' => esc_attr__('None', 'Twoot'),
		'page' => esc_attr__('Page', 'Twoot'), 
		'blog' => esc_attr__('Blog', 'Twoot'), 
		'portfolio' => esc_attr__('Portfolio', 'Twoot'),
		'shop' => esc_attr__('Shop', 'Twoot'), 
		'search' => esc_attr__('Search', 'Twoot')
	);
}else{
	$sidebars = array(
		'0' => esc_attr__('None', 'Twoot'),
		'page' => esc_attr__('Page', 'Twoot'), 
		'blog' => esc_attr__('Blog', 'Twoot'), 
		'portfolio' => esc_attr__('Portfolio', 'Twoot'),
		'search' => esc_attr__('Search', 'Twoot')
	);
}


$config = array(
	'title' => esc_attr__('Page Options', 'Twoot'),
	'id' => 'twoot-metabox-page',
	'pages' => array('page'),
	'callback' => '',
	'context' => 'normal',
	'priority' => 'high',
);

$options = array(

	array(
		'name' => esc_attr__('Layouts', 'Twoot'),
		'desc' => esc_attr__('Choose the layout you wish to display.',  'Twoot'),
		'id' => TWOOT_PREFIX . 'layout',
		'prompt' => esc_attr__('&mdash; Select &mdash;', 'Twoot'),
		'std' => 'full',
		'options' => $layouts,
		'type' => 'select'
	),

	array(
		'name' => esc_attr__('Page Sidebar', 'Twoot'),
		'desc' => esc_attr__('Choose sidebar for your page.', 'Twoot'),
		'id' => TWOOT_PREFIX . 'sidebar',
		'prompt' => esc_attr__('&mdash; Select &mdash;', 'Twoot'),
		'std' => '',
		'options' => $sidebars,
		'target' => 'sidebar',
		'type' => 'select'
	),

	array(
		'name' => esc_attr__('Slideshow', 'Twoot'),
		'desc' => esc_attr__('Choose slideshow for your page.', 'Twoot'),
		'id' => TWOOT_PREFIX . 'slideshow',
		'prompt' => esc_attr__('&mdash; Select &mdash;', 'Twoot'),
		'std' => '',
		'options' => array('0' => esc_attr__('None', 'Twoot')),
		'target' => 'layerslider',
		'type' => 'select'
	),

	array(
		'name' => esc_attr__('Show Title & Desc', 'Twoot'),
		'desc' => esc_attr__('Choose yes to display the title & desc.',  'Twoot'),
		'id' => TWOOT_PREFIX . 'show_page_header',
		'prompt' => esc_attr__('&mdash; Select &mdash;', 'Twoot'),
		'std' => '1',
		'options' => array(
			'1' => esc_attr__('Yes', 'Twoot'),
			'0' => esc_attr__('No', 'Twoot')
		),
		'type' => 'select'
	),

	array(
		'name' => esc_attr__('Show Line', 'Twoot'),
		'desc' => esc_attr__('Choose yes to display the line for the page header.',  'Twoot'),
		'id' => TWOOT_PREFIX . 'show_line',
		'prompt' => esc_attr__('&mdash; Select &mdash;', 'Twoot'),
		'std' => '1',
		'options' => array(
			'1' => esc_attr__('Yes', 'Twoot'),
			'0' => esc_attr__('No', 'Twoot')
		),
		'type' => 'select'
	),

	array(
		'name' => esc_attr__('Page Title', 'Twoot'),
		'desc' => esc_attr__('Set the title for the page.', 'Twoot'),
		'id' => TWOOT_PREFIX . 'page_title',
		'std' => '',
		'rows' => '2',
		'type' => 'textarea'
	),

	array(
		'name' => esc_attr__('Page Description', 'Twoot'),
		'desc' => esc_attr__('Set the description for the page.', 'Twoot'),
		'id' => TWOOT_PREFIX . 'page_desc',
		'std' => '',
		'rows' => '2',
		'type' => 'textarea'
	)

);
new Twoot_Metabox_Generator($config,$options);
?>