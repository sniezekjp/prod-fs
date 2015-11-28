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

$repeat_opts = array(
	'no-repeat' => esc_attr__('No Repeat', 'Twoot'),
	'repeat-x' => esc_attr__('Repeat only Horizontally', 'Twoot'),
	'repeat-y' => esc_attr__('Repeat only Vertically', 'Twoot'),
	'repeat' => esc_attr__('Repeat both Vertically and Horizontally', 'Twoot')
);

$horizontal_opts = array(
	'left' => esc_attr__('Left', 'Twoot'),
	'right' => esc_attr__('Right', 'Twoot'),
	'center' => esc_attr__('Center', 'Twoot')
);

$vertical_opts = array(
	'top' => esc_attr__('Top', 'Twoot'),
	'bottom' => esc_attr__('Bottom', 'Twoot'),
	'center' => esc_attr__('Center', 'Twoot')
);

$attachment_opts = array(
	'fixed' => esc_attr__('Fixed', 'Twoot'),
	'scroll' => esc_attr__('Scroll', 'Twoot')
);

$config = array(
	'title' => esc_attr__('Block Options', 'Twoot'),
	'id' => 'twoot-metabox-content-block',
	'pages' => array('content_block'),
	'callback' => '',
	'context' => 'normal',
	'priority' => 'high',
);

$options = array(

	array(
		'name' => esc_attr__('Padding Top', 'Twoot'),
		'desc' => esc_attr__('Set the padding value with pixel.', 'Twoot'),
		'id' => TWOOT_PREFIX . 'padding_top',
		'std' => '',
		'size' => '10',
		'type' => 'text'
	),

	array(
		'name' => esc_attr__('Padding Bottom', 'Twoot'),
		'desc' => esc_attr__('Set the padding value with pixel.', 'Twoot'),
		'id' => TWOOT_PREFIX . 'padding_bottom',
		'std' => '',
		'size' => '10',
		'type' => 'text'
	),

	array(
		'name' => esc_attr__('Background Color', 'Twoot'),
		'desc' => esc_attr__('Set the background color.', 'Twoot'),
		'id' => TWOOT_PREFIX . 'background_color',
		'std' => '#FFFFFF',
		'type' => 'color'
	),

	array(
		'name' => esc_attr__('Background Image', 'Twoot'),
		'desc' => esc_attr__('Set the background image.', 'Twoot'),
		'id' => TWOOT_PREFIX . 'background_image',
		'std' => '',
		'size' => '80',
		'button' => esc_attr__('Upload Image', 'Twoot'),
		'uploader_title' => esc_attr__('Choose Image', 'Twoot'),
		'uploader_button' => esc_attr__('Insert Image', 'Twoot'),
		'type' => 'upload'
	),

	array(
		'name' => esc_attr__('Background Repeat', 'Twoot'),
		'id' => TWOOT_PREFIX . 'background_repeat',
		'std' => 'no-repeat',
		'options' => $repeat_opts,
		'type' => 'select'
	),

	array(
		'name' => esc_attr__('Background Horizontal', 'Twoot'),
		'id' => TWOOT_PREFIX . 'background_horizontal',
		'std' => 'center',
		'options' => $horizontal_opts,
		'type' => 'select'
	),

	array(
		'name' => esc_attr__('Background Vertical', 'Twoot'),
		'id' => TWOOT_PREFIX . 'background_vertical',
		'std' => 'top',
		'options' => $vertical_opts,
		'type' => 'select'
	),

	array(
		'name' => esc_attr__('Background Position', 'Twoot'),
		'id' => TWOOT_PREFIX . 'background_attachment',
		'std' => 'scroll',
		'options' => $attachment_opts,
		'type' => 'select'
	),

	array(
		'name' => esc_attr__('Custom CSS', 'Twoot'),
		'desc' => esc_attr__('Enter your custom css here.', 'Twoot'),
		'id' => TWOOT_PREFIX . 'block_custom_css',
		'std' => '',
		'rows' => '10',
		'type' => 'textarea'
	)

);
new Twoot_Metabox_Generator($config,$options);
?>