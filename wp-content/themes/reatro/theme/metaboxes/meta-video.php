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


$config = array(
	'title' => esc_attr__('Video', 'Twoot'),
	'id' => 'twoot-metabox-video',
	'pages' => array('post', 'portfolio'),
	'callback' => '',
	'context' => 'normal',
	'priority' => 'high',
);

$options = array(
	array(
		'name' => esc_attr__('Embed Player', 'Twoot'),
		'id' => TWOOT_PREFIX . 'video_player',
		'desc' => esc_attr__('Choose the embed player of video you wish to display.',  'Twoot'),
		'prompt' => esc_attr__('&mdash; Select &mdash;','Twoot'),
		'std' => 'youtube',
		'options' => array(
			'youtube' => esc_attr__('Youtube', 'Twoot'),
			'vimeo' => esc_attr__('Vimeo', 'Twoot'),
		),
		'type' => 'select'
	),

	array(
		'name' => esc_attr__('Youtube Or Vimeo Url', 'Twoot'),
		'desc' => __('
		Enter the Youtube or Vimeo Url,
		<br /><span>Vimeo ex: http://vimeo.com/57148705</span><br />
		<span>Youtube ex: http://youtu.be/gTix7FDHZcA</span>',  'Twoot'),
		'id' => TWOOT_PREFIX . 'video_url',
		'rows' => '2',
		'std' => '',
		'type' => 'textarea'
	),

	array(
		'name' => esc_attr__('Embed Code', 'Twoot'),
		'desc' => esc_attr__('If you are using something other than Youtube or Vimeo, paste the embed code here.',  'Twoot'),
		'id' => TWOOT_PREFIX . 'video_code',
		'rows' => '8',
		'std' => '',
		'type' => 'textarea'
	)
);
new Twoot_Metabox_Generator($config,$options);
?>