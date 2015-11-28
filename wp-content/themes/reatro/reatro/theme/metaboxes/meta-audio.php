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
	'title' => esc_attr__('Audio', 'Twoot'),
	'id' => 'twoot-metabox-audio',
	'pages' => array('post'),
	'callback' => '',
	'context' => 'normal',
	'priority' => 'high',
);

$options = array(

	array(
		'name' => esc_attr__('Sound Cloud Url', 'Twoot'),
		'desc' => esc_attr__('Enter the sound cloud url.',  'Twoot'),
		'id' => TWOOT_PREFIX . 'soundcloud_url',
		'rows' => '2',
		'std' => '',
		'type' => 'textarea'
	),

	array(
		'name' => esc_attr__('Embed Code', 'Twoot'),
		'desc' => esc_attr__('If you are using something other than Sound Cloud, paste the embed code here.',  'Twoot'),
		'id' => TWOOT_PREFIX . 'audio_code',
		'rows' => '6',
		'std' => '',
		'type' => 'textarea'
	)
	
);
new Twoot_Metabox_Generator($config,$options);
?>
