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
	'half' => esc_attr__('Half Width', 'Twoot'),
	'full' => esc_attr__('Full Width', 'Twoot')
);

$types = array(
	'image' => esc_attr__('Image', 'Twoot'),
	'slider' => esc_attr__('Slider', 'Twoot'),
	'masonry' => esc_attr__('Masonry', 'Twoot'),
	'video' => esc_attr__('Video', 'Twoot'),
	'standard' => esc_attr__('Standard', 'Twoot')
);

$config = array(
	'title' => esc_attr__('Portfolio Options', 'Twoot'),
	'id' => 'twoot-metabox-portfolio',
	'pages' => array('portfolio'),
	'callback' => '',
	'context' => 'normal',
	'priority' => 'high',
);

$options = array(

	array(
		'name' => esc_attr__('Layouts', 'Twoot'),
		'desc' => esc_attr__('Choose the layout you wish to display.', 'Twoot'),
		'id' => TWOOT_PREFIX . 'layout',
		'prompt' => esc_attr__('&mdash; Select &mdash;', 'Twoot'),
		'std' => 'full',
		'options' => $layouts,
		'type' => 'select'
	),

	array(
		'name' => esc_attr__('Types', 'Twoot'),
		'desc' => esc_attr__('Choose the type you wish to display.', 'Twoot'),
		'id' => TWOOT_PREFIX . 'type',
		'std' => 'image',
		'options' => $types,
		'type' => 'select'
	),

	array(
		'name' => esc_attr__('Date', 'Twoot'),
		'desc' => esc_attr__('What was the date of the completed item.', 'Twoot'),
		'id' => TWOOT_PREFIX . 'date',
		'std' => '',
		'size' => '60',
		'type' => 'text'
	),

	array(
		'name' => esc_attr__('Client', 'Twoot'),
		'desc' => esc_attr__('The client name of the item.', 'Twoot'),
		'id' => TWOOT_PREFIX . 'client',
		'std' => '',
		'size' => '60',
		'type' => 'text'
	),

	array(
		'name' => esc_attr__('Client Url', 'Twoot'),
		'desc' => esc_attr__('What is the URL for the item?', 'Twoot'),
		'id' => TWOOT_PREFIX . 'client_url',
		'rows' => '2',
		'std' => '',
		'type' => 'textarea'
	),

	array(
		'name' => esc_attr__('Post Link', 'Twoot'),
		'desc' => esc_attr__('Where are you link to?',  'Twoot'),
		'id' => TWOOT_PREFIX . 'post_link',
		'std' => 'post',
		'prompt' => esc_attr__('&mdash; Select &mdash;', 'Twoot'),
		'options' => array(
			'post' => esc_attr__('Link to this post.', 'Twoot'),
			'custom' => esc_attr__('Link to the custom page.', 'Twoot')
		),
		'type' => 'select'
	),

	array(
		'name' => esc_attr__('Custom Link', 'Twoot'),
		'desc' => esc_attr__('Enter the custom link where you link to? Ex: http://google.com', 'Twoot'),
		'id' => TWOOT_PREFIX . 'custom_url',
		'rows' => '2',
		'std' => '',
		'type' => 'textarea'
	),

	array(
		'name' => esc_attr__('Related Posts',  'Twoot'),
		'desc' => esc_attr__('Choose some posts to display in the related works. The post ID&#8217;s to pull posts from. Can be entered as a comma separated list.',  'Twoot'),
		'id' => TWOOT_PREFIX . 'related_posts',
		'std' => '',
		'rows' => '2',
		'type' => 'textarea'
	)

);
new Twoot_Metabox_Generator($config,$options);
?>