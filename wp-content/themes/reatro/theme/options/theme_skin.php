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

$options = array(

	array(
		'type' => 'tab_begin'
	),

	array(
		'type' => 'tab_item',
		'name' => esc_attr__('General',  'Twoot')
	),

	array(
		'type' => 'tab_item',
		'name' => esc_attr__('Global',  'Twoot')
	),

	array(
		'type' => 'tab_item',
		'name' => esc_attr__('Top Area',  'Twoot')
	),

	array(
		'type' => 'tab_item',
		'name' => esc_attr__('Bottom Area',  'Twoot')
	),

	array(
		'type' => 'tab_end'
	),

	array(
		'type' => 'tab_content_begin',
		'name' => esc_attr__('General',  'Twoot')
	),

	array(
		'type' => 'group_begin',
		'name' => esc_attr__('Settings',  'Twoot')
	),

	array(
		'name' => esc_attr__('Skins', 'Twoot'),
		'desc' => esc_attr__('Choose the skin you want to display.', 'Twoot'),
		'id' => 'skin',
		'std' => 'red',
		'options' => array(
			'blue' => esc_attr__('Blue',  'Twoot'),
			'brown' => esc_attr__('Brown',  'Twoot'),
			'cyan' => esc_attr__('Cyan',  'Twoot'),
			'green' => esc_attr__('Green',  'Twoot'),
			'navy' => esc_attr__('Navy',  'Twoot'),
			'olive' => esc_attr__('Olive',  'Twoot'),
			'orange' => esc_attr__('Orange',  'Twoot'),
			'pink' => esc_attr__('Pink',  'Twoot'),
			'purple' => esc_attr__('Purple',  'Twoot'),
			'red' => esc_attr__('Red',  'Twoot')
		),
		'type' => 'select'
	),

	array(
		'name' => esc_attr__('Custom Colors',  'Twoot'),
		'desc' => esc_attr__('Enable it, and then you can custom some colors for your theme, the colors will be based on the skin.', 'Twoot'),
		'id' => 'custom_colors',
		'std' => '0',
		'options' => array(
			'1' => 'Yes',
			'0' => 'No'
		),
		'type' => 'radios'
	),

	array(
		'name' => esc_attr__('Custom CSS',  'Twoot'),
		'desc' => __("Add only the css code without <span> &lt;style&gt;&lt;/style&gt; </span> style blocks. They are auto added. it's easy to customize your site.",  'Twoot'),
		'id' => 'custom_css',
		'std' => '',
		'rows' => '12',
		'type' => 'textarea'
	),

	array(
		'type' => 'group_end',
	),

	array(
		'type' => 'group_begin',
		'name' => esc_attr__('Background',  'Twoot')
	),

	array(
		'name' => esc_attr__('Color', 'Twoot'),
		'desc' => esc_attr__('Set the background color.', 'Twoot'),
		'id' => 'bg_color',
		'std' => '#F2F2F2',
		'type' => 'color'
	),

	array(
		'name' => esc_attr__('Image', 'Twoot'),
		'desc' => __('Set the background image.', 'Twoot'),
		'id' => 'bg_image',
		'std' => '',
		'size' => '80',
		'button' => esc_attr__('Upload Image', 'Twoot'),
		'uploader_title' => esc_attr__('Choose Image', 'Twoot'),
		'uploader_button' => esc_attr__('Insert Image', 'Twoot'),
		'type' => 'upload'
	),

	array(
		'name' => esc_attr__('Image Repeat', 'Twoot'),
		'id' => 'bg_image_repeat',
		'std' => 'no-repeat',
		'options' => $repeat_opts,
		'type' => 'select'
	),

	array(
		'name' => esc_attr__('Image Horizontal', 'Twoot'),
		'id' => 'bg_image_horizontal',
		'std' => 'center',
		'options' => $horizontal_opts,
		'type' => 'select'
	),

	array(
		'name' => esc_attr__('Image Vertical', 'Twoot'),
		'id' => 'bg_image_vertical',
		'std' => 'top',
		'options' => $vertical_opts,
		'type' => 'select'
	),

	array(
		'name' => esc_attr__('Image Position', 'Twoot'),
		'id' => 'bg_image_attachment',
		'std' => 'scroll',
		'options' => $attachment_opts,
		'type' => 'select'
	),

	array(
		'type' => 'group_end',
	),

	array(
		'type' => 'tab_content_end'
	),
	// End General



	array(
		'type' => 'tab_content_begin',
		'name' => esc_attr__('Global',  'Twoot')
	),

	array(
		'type' => 'group_begin',
		'name' => esc_attr__('Settings',  'Twoot')
	),

	array(
		'name' => esc_attr__('Content', 'Twoot'),
		'desc' => esc_attr__('Set the content color.', 'Twoot'),
		'id' => 'content_bg_color',
		'std' => '#FFFFFF',
		'type' => 'color'
	),

	array(
		'name' => esc_attr__('Text', 'Twoot'),
		'desc' => esc_attr__('Set the text color.', 'Twoot'),
		'id' => 'text_color',
		'std' => '#555555',
		'type' => 'color'
	),

	array(
		'name' => esc_attr__('Link', 'Twoot'),
		'desc' => esc_attr__('Set the a link color.', 'Twoot'),
		'id' => 'link_color',
		'std' => '#000000',
		'type' => 'color'
	),

	array(
		'name' => esc_attr__('Hover', 'Twoot'),
		'desc' => esc_attr__('Set the a link hover color.', 'Twoot'),
		'id' => 'hover_color',
		'std' => '#A3443E',
		'type' => 'color'
	),

	array(
		'name' => esc_attr__('Hgroup', 'Twoot'),
		'desc' => esc_attr__('Set the hgroup color.', 'Twoot'),
		'id' => 'hgroup_color',
		'std' => '#000000',
		'type' => 'color'
	),

	array(
		'type' => 'group_end',
	),

	array(
		'type' => 'group_begin',
		'name' => esc_attr__('Button',  'Twoot')
	),

	array(
		'name' => esc_attr__('Text Color', 'Twoot'),
		'desc' => esc_attr__('Set the text color.', 'Twoot'),
		'id' => 'button_text_color',
		'std' => '#FFFFFF',
		'type' => 'color'
	),

	array(
		'name' => esc_attr__('Text Hover Color', 'Twoot'),
		'desc' => esc_attr__('Set the hover text color.', 'Twoot'),
		'id' => 'button_text_hover_color',
		'std' => '#FFFFFF',
		'type' => 'color'
	),

	array(
		'name' => esc_attr__('Background Color', 'Twoot'),
		'desc' => esc_attr__('Set the background color.', 'Twoot'),
		'id' => 'button_bg_color',
		'std' => '#000000',
		'type' => 'color'
	),

	array(
		'name' => esc_attr__('Background Hover Color', 'Twoot'),
		'desc' => esc_attr__('Set the background hover color.', 'Twoot'),
		'id' => 'button_bg_hover_color',
		'std' => '#A3443E',
		'type' => 'color'
	),

	array(
		'type' => 'group_end',
	),

	array(
		'type' => 'tab_content_end'
	),
	// End Global


	array(
		'type' => 'tab_content_begin',
		'name' => esc_attr__('Top Area',  'Twoot')
	),

	array(
		'type' => 'group_begin',
		'name' => esc_attr__('TopBar',  'Twoot')
	),

	array(
		'name' => esc_attr__('Link', 'Twoot'),
		'desc' => esc_attr__('Set the link color.', 'Twoot'),
		'id' => 'topbar_link_color',
		'std' => '#CCCCCC',
		'type' => 'color'
	),

	array(
		'name' => esc_attr__('Hover', 'Twoot'),
		'desc' => esc_attr__('Set the hover color.', 'Twoot'),
		'id' => 'topbar_hover_color',
		'std' => '#A3443E',
		'type' => 'color'
	),

	array(
		'name' => esc_attr__('Border', 'Twoot'),
		'desc' => esc_attr__('Set the border color.', 'Twoot'),
		'id' => 'topbar_border_color',
		'std' => '#222222',
		'type' => 'color'
	),

	array(
		'name' => esc_attr__('Background', 'Twoot'),
		'desc' => esc_attr__('Set the background color.', 'Twoot'),
		'id' => 'topbar_bg_color',
		'std' => '#000000',
		'type' => 'color'
	),

	array(
		'type' => 'group_end',
	),

	array(
		'type' => 'group_begin',
		'name' => esc_attr__('Top Widgets',  'Twoot')
	),

	array(
		'name' => esc_attr__('Text', 'Twoot'),
		'desc' => esc_attr__('Set the text color.', 'Twoot'),
		'id' => 'top_widget_text_color',
		'std' => '#CCCCCC',
		'type' => 'color'
	),

	array(
		'name' => esc_attr__('Link', 'Twoot'),
		'desc' => esc_attr__('Set the link color.', 'Twoot'),
		'id' => 'top_widget_link_color',
		'std' => '#CCCCCC',
		'type' => 'color'
	),

	array(
		'name' => esc_attr__('Hover', 'Twoot'),
		'desc' => esc_attr__('Set the hover color.', 'Twoot'),
		'id' => 'top_widget_hover_color',
		'std' => '#A3443E',
		'type' => 'color'
	),

	array(
		'name' => esc_attr__('Widget Title', 'Twoot'),
		'desc' => esc_attr__('Set the widget title text color.', 'Twoot'),
		'id' => 'top_widget_title_color',
		'std' => '#A3443E',
		'type' => 'color'
	),

	array(
		'name' => esc_attr__('Background', 'Twoot'),
		'desc' => esc_attr__('Set the background color.', 'Twoot'),
		'id' => 'top_widget_bg_color',
		'std' => '#222222',
		'type' => 'color'
	),

	array(
		'type' => 'group_end',
	),

	array(
		'type' => 'tab_content_end'
	),
	// End Top Area


	array(
		'type' => 'tab_content_begin',
		'name' => esc_attr__('Bottom Area',  'Twoot')
	),

	array(
		'type' => 'group_begin',
		'name' => esc_attr__('Bottom Menu',  'Twoot')
	),

	array(
		'name' => esc_attr__('Link', 'Twoot'),
		'desc' => esc_attr__('Set the link color.', 'Twoot'),
		'id' => 'bottom_menu_link_color',
		'std' => '#CCCCCC',
		'type' => 'color'
	),

	array(
		'name' => esc_attr__('Hover', 'Twoot'),
		'desc' => esc_attr__('Set the hover color.', 'Twoot'),
		'id' => 'bottom_menu_hover_color',
		'std' => '#A3443E',
		'type' => 'color'
	),

	array(
		'name' => esc_attr__('Border', 'Twoot'),
		'desc' => esc_attr__('Set the border color.', 'Twoot'),
		'id' => 'bottom_menu_border_color',
		'std' => '#0F0F0F',
		'type' => 'color'
	),

	array(
		'name' => esc_attr__('Background', 'Twoot'),
		'desc' => esc_attr__('Set the background color.', 'Twoot'),
		'id' => 'bottom_menu_bg_color',
		'std' => '#000000',
		'type' => 'color'
	),

	array(
		'type' => 'group_end',
	),

	array(
		'type' => 'group_begin',
		'name' => esc_attr__('Bottom Widgets',  'Twoot')
	),

	array(
		'name' => esc_attr__('Text', 'Twoot'),
		'desc' => esc_attr__('Set the text color.', 'Twoot'),
		'id' => 'bottom_widget_text_color',
		'std' => '#CCCCCC',
		'type' => 'color'
	),

	array(
		'name' => esc_attr__('Link', 'Twoot'),
		'desc' => esc_attr__('Set the link color.', 'Twoot'),
		'id' => 'bottom_widget_link_color',
		'std' => '#CCCCCC',
		'type' => 'color'
	),

	array(
		'name' => esc_attr__('Hover', 'Twoot'),
		'desc' => esc_attr__('Set the hover color.', 'Twoot'),
		'id' => 'bottom_widget_hover_color',
		'std' => '#A3443E',
		'type' => 'color'
	),

	array(
		'name' => esc_attr__('Widget Title', 'Twoot'),
		'desc' => esc_attr__('Set the widget title text color.', 'Twoot'),
		'id' => 'bottom_widget_title_color',
		'std' => '#A3443E',
		'type' => 'color'
	),

	array(
		'name' => esc_attr__('Background', 'Twoot'),
		'desc' => esc_attr__('Set the background color.', 'Twoot'),
		'id' => 'bottom_widget_bg_color',
		'std' => '#000000',
		'type' => 'color'
	),

	array(
		'type' => 'group_end',
	),

	array(
		'type' => 'group_begin',
		'name' => esc_attr__('Copyright',  'Twoot')
	),

	array(
		'name' => esc_attr__('Text', 'Twoot'),
		'desc' => esc_attr__('Set the text color.', 'Twoot'),
		'id' => 'copyright_text_color',
		'std' => '#CCCCCC',
		'type' => 'color'
	),

	array(
		'name' => esc_attr__('Link', 'Twoot'),
		'desc' => esc_attr__('Set the link color.', 'Twoot'),
		'id' => 'copyright_link_color',
		'std' => '#A3443E',
		'type' => 'color'
	),

	array(
		'name' => esc_attr__('Hover', 'Twoot'),
		'desc' => esc_attr__('Set the hover color.', 'Twoot'),
		'id' => 'copyright_hover_color',
		'std' => '#A3443E',
		'type' => 'color'
	),

	array(
		'name' => esc_attr__('Border', 'Twoot'),
		'desc' => esc_attr__('Set the border color.', 'Twoot'),
		'id' => 'copyright_border_color',
		'std' => '#0F0F0F',
		'type' => 'color'
	),

	array(
		'name' => esc_attr__('Background', 'Twoot'),
		'desc' => esc_attr__('Set the background color.', 'Twoot'),
		'id' => 'copyright_bg_color',
		'std' => '#000000',
		'type' => 'color'
	),

	array(
		'type' => 'group_end',
	),

	array(
		'type' => 'tab_content_end'
	),
	// End Bottom Area

);


return array('auto' => true, 'name' => 'skin', 'options' => $options);
?>