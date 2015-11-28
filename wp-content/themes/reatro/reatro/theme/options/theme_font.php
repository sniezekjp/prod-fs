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

global $twoot_google_fonts;

$font_size = array(
	'8' => '8px',
	'9' => '9px',
	'10' => '10px',
	'11' => '11px',
	'12' => '12px',
	'13' => '13px',
	'14' => '14px',
	'15' => '15px',
	'16' => '16px',
	'17' => '17px',
	'18' => '18px',
	'19' => '19px',
	'20' => '20px',
	'21' => '21px',
	'22' => '22px',
	'23' => '23px',
	'24' => '24px',
	'25' => '25px',
	'26' => '26px',
	'27' => '27px',
	'28' => '28px',
	'29' => '29px',
	'30' => '30px',
	'31' => '31px',
	'32' => '32px',
	'33' => '33px',
	'34' => '34px',
	'35' => '35px',
	'36' => '36px',
	'37' => '37px',
	'38' => '38px',
	'39' => '39px',
	'40' => '40px',
	'41' => '41px',
	'42' => '42px',
	'43' => '43px',
	'44' => '44px',
	'45' => '45px',
	'46' => '46px',
	'47' => '47px',
	'48' => '48px',
	'49' => '49px',
	'50' => '50px',
	'51' => '51px',
	'52' => '52px',
	'53' => '53px',
	'54' => '54px'
);

$font_weight = array(
	'bold' => 'Bold',
	'normal' => 'Normal'
);

$text_transform = array(
	'none' => 'None',
	'capitalize' => 'Capitalize',
	'uppercase' => 'Uppercase',
	'lowercase' => 'Lowercase'
);


$options = array(

	array(
		'type' => 'tab_begin'
	),

	array(
		'type' => 'tab_item',
		'name' => esc_attr__('Font Families',  'Twoot')
	),

	array(
		'type' => 'tab_item',
		'name' => esc_attr__('Font Size',  'Twoot')
	),

	array(
		'type' => 'tab_item',
		'name' => esc_attr__('Font Weight',  'Twoot')
	),

	array(
		'type' => 'tab_item',
		'name' => esc_attr__('Text Transform',  'Twoot')
	),

	array(
		'type' => 'tab_end'
	),

	array(
		'type' => 'tab_content_begin',
		'name' => esc_attr__('Font Families',  'Twoot'),
		'class' => 'active'
	),

	array(
		'type' => 'group_begin',
		'name' => esc_attr__('Choose Fonts',  'Twoot')
	),

	array(
		'name' => esc_attr__('Current Google Fonts', 'Twoot'),
		'desc' => esc_attr__('Select the google fonts that you want to use.', 'Twoot'),
		'id' => 'current_google_fonts',
		'prompt' => esc_attr__('&mdash; Select &mdash;', 'Twoot'),
		'chosen' => true,
		'chosen_order' => true,
		'std' => array('Arvo:400|700|400italic|700italic', 'Droid+Serif:400|700|400italic|700italic', 'Headland+One', 'Lato:100|300|400|700|900|100italic|300italic|400italic|700italic|900italic'),
		'options' => $twoot_google_fonts,
		'type' => 'multiselect'
	),

	array(
		'type' => 'group_end',
	),

	array(
		'type' => 'group_begin',
		'name' => esc_attr__('Settings',  'Twoot')
	),

	array(
		'name' => esc_attr__('Body', 'Twoot'),
		'id' => 'ff_body',
		'std' => 'Arvo',
		'options' => array(
			'0' => esc_attr__('None', 'Twoot')
		),
		'target' => 'google_fonts',
		'type' => 'select'
	),

	array(
		'name' => esc_attr__('Logo', 'Twoot'),
		'id' => 'ff_logo',
		'std' => 'Droid Serif',
		'options' => array(
			'0' => esc_attr__('None', 'Twoot')
		),
		'target' => 'google_fonts',
		'type' => 'select'
	),

	array(
		'name' => esc_attr__('Menu', 'Twoot'),
		'id' => 'ff_menu',
		'std' => 'Headland One',
		'options' => array(
			'0' => esc_attr__('None', 'Twoot')
		),
		'target' => 'google_fonts',
		'type' => 'select'
	),

	array(
		'name' => esc_attr__('Sub Menu', 'Twoot'),
		'id' => 'ff_sub_menu',
		'std' => 'Arvo',
		'options' => array(
			'0' => esc_attr__('None', 'Twoot')
		),
		'target' => 'google_fonts',
		'type' => 'select'
	),

	array(
		'name' => esc_attr__('Bottom Menu', 'Twoot'),
		'id' => 'ff_bottom_menu',
		'std' => 'Headland One',
		'options' => array(
			'0' => esc_attr__('None', 'Twoot')
		),
		'target' => 'google_fonts',
		'type' => 'select'
	),

	array(
		'name' => esc_attr__('H1', 'Twoot'),
		'id' => 'ff_h1',
		'std' => 'Headland One',
		'options' => array(
			'0' => esc_attr__('None', 'Twoot')
		),
		'target' => 'google_fonts',
		'type' => 'select'
	),

	array(
		'name' => esc_attr__('H2', 'Twoot'),
		'id' => 'ff_h2',
		'std' => 'Headland One',
		'options' => array(
			'0' => esc_attr__('None', 'Twoot')
		),
		'target' => 'google_fonts',
		'type' => 'select'
	),

	array(
		'name' => esc_attr__('H3', 'Twoot'),
		'id' => 'ff_h3',
		'std' => 'Headland One',
		'options' => array(
			'0' => esc_attr__('None', 'Twoot')
		),
		'target' => 'google_fonts',
		'type' => 'select'
	),

	array(
		'name' => esc_attr__('H4', 'Twoot'),
		'id' => 'ff_h4',
		'std' => 'Droid Serif',
		'options' => array(
			'0' => esc_attr__('None', 'Twoot')
		),
		'target' => 'google_fonts',
		'type' => 'select'
	),

	array(
		'name' => esc_attr__('H5', 'Twoot'),
		'id' => 'ff_h5',
		'std' => 'Headland One',
		'options' => array(
			'0' => esc_attr__('None', 'Twoot')
		),
		'target' => 'google_fonts',
		'type' => 'select'
	),

	array(
		'name' => esc_attr__('H6', 'Twoot'),
		'id' => 'ff_h6',
		'std' => 'Droid Serif',
		'options' => array(
			'0' => esc_attr__('None', 'Twoot')
		),
		'target' => 'google_fonts',
		'type' => 'select'
	),

	array(
		'name' => esc_attr__('Copyright', 'Twoot'),
		'id' => 'ff_copyright',
		'std' => 'Droid Serif',
		'options' => array(
			'0' => esc_attr__('None', 'Twoot')
		),
		'target' => 'google_fonts',
		'type' => 'select'
	),

	array(
		'name' => esc_attr__('Widget Title', 'Twoot'),
		'id' => 'ff_widget_title',
		'std' => 'Droid Serif',
		'options' => array(
			'0' => esc_attr__('None', 'Twoot')
		),
		'target' => 'google_fonts',
		'type' => 'select'
	),

	array(
		'name' => esc_attr__('Section Title', 'Twoot'),
		'id' => 'ff_section_title',
		'std' => 'Droid Serif',
		'options' => array(
			'0' => esc_attr__('None', 'Twoot')
		),
		'target' => 'google_fonts',
		'type' => 'select'
	),

	array(
		'name' => esc_attr__('Item Title', 'Twoot'),
		'id' => 'ff_item_title',
		'std' => 'Droid Serif',
		'options' => array(
			'0' => esc_attr__('None', 'Twoot')
		),
		'target' => 'google_fonts',
		'type' => 'select'
	),

	array(
		'name' => esc_attr__('Woocommerce Amount', 'Twoot'),
		'id' => 'ff_woo_amount',
		'std' => 'Lato',
		'options' => array(
			'0' => esc_attr__('None', 'Twoot')
		),
		'target' => 'google_fonts',
		'type' => 'select'
	),

	array(
		'type' => 'group_end',
	),

	array(
		'type' => 'tab_content_end'
	),
	// End Font Families


	array(
		'type' => 'tab_content_begin',
		'name' => esc_attr__('Font Size',  'Twoot'),
	),

	array(
		'type' => 'group_begin',
		'name' => esc_attr__('Settings',  'Twoot')
	),

	array(
		'name' => esc_attr__('Body', 'Twoot'),
		'id' => 'fs_body',
		'std' => '13',
		'options' => $font_size,
		'type' => 'select'
	),

	array(
		'name' => esc_attr__('Logo', 'Twoot'),
		'id' => 'fs_logo',
		'std' => '48',
		'options' => $font_size,
		'type' => 'select'
	),

	array(
		'name' => esc_attr__('Menu', 'Twoot'),
		'id' => 'fs_menu',
		'std' => '13',
		'options' => $font_size,
		'type' => 'select'
	),

	array(
		'name' => esc_attr__('Sub Menu', 'Twoot'),
		'id' => 'fs_sub_menu',
		'std' => '13',
		'options' => $font_size,
		'type' => 'select'
	),

	array(
		'name' => esc_attr__('Bottom Menu', 'Twoot'),
		'id' => 'fs_bottom_menu',
		'std' => '12',
		'options' => $font_size,
		'type' => 'select'
	),

	array(
		'name' => esc_attr__('H1', 'Twoot'),
		'id' => 'fs_h1',
		'std' => '30',
		'options' => $font_size,
		'type' => 'select'
	),

	array(
		'name' => esc_attr__('H2', 'Twoot'),
		'id' => 'fs_h2',
		'std' => '24',
		'options' => $font_size,
		'type' => 'select'
	),

	array(
		'name' => esc_attr__('H3', 'Twoot'),
		'id' => 'fs_h3',
		'std' => '18',
		'options' => $font_size,
		'type' => 'select'
	),

	array(
		'name' => esc_attr__('H4', 'Twoot'),
		'id' => 'fs_h4',
		'std' => '16',
		'options' => $font_size,
		'type' => 'select'
	),

	array(
		'name' => esc_attr__('H5', 'Twoot'),
		'id' => 'fs_h5',
		'std' => '14',
		'options' => $font_size,
		'type' => 'select'
	),

	array(
		'name' => esc_attr__('H6', 'Twoot'),
		'id' => 'fs_h6',
		'std' => '13',
		'options' => $font_size,
		'type' => 'select'
	),

	array(
		'name' => esc_attr__('Copyright', 'Twoot'),
		'id' => 'fs_copyright',
		'std' => '14',
		'options' => $font_size,
		'type' => 'select'
	),

	array(
		'name' => esc_attr__('Widget Title', 'Twoot'),
		'id' => 'fs_widget_title',
		'std' => '14',
		'options' => $font_size,
		'type' => 'select'
	),

	array(
		'name' => esc_attr__('Section Title', 'Twoot'),
		'id' => 'fs_section_title',
		'std' => '14',
		'options' => $font_size,
		'type' => 'select'
	),

	array(
		'type' => 'group_end',
	),

	array(
		'type' => 'tab_content_end'
	),
	// End Font Size


	array(
		'type' => 'tab_content_begin',
		'name' => esc_attr__('Font Weight',  'Twoot'),
	),

	array(
		'type' => 'group_begin',
		'name' => esc_attr__('Settings',  'Twoot')
	),

	array(
		'name' => esc_attr__('Logo', 'Twoot'),
		'id' => 'fw_logo',
		'std' => 'bold',
		'options' => $font_weight,
		'type' => 'select'
	),

	array(
		'name' => esc_attr__('Menu', 'Twoot'),
		'id' => 'fw_menu',
		'std' => 'normal',
		'options' => $font_weight,
		'type' => 'select'
	),

	array(
		'name' => esc_attr__('Sub Menu', 'Twoot'),
		'id' => 'fw_sub_menu',
		'std' => 'normal',
		'options' => $font_weight,
		'type' => 'select'
	),

	array(
		'name' => esc_attr__('Bottom Menu', 'Twoot'),
		'id' => 'fw_bottom_menu',
		'std' => 'normal',
		'options' => $font_weight,
		'type' => 'select'
	),

	array(
		'name' => esc_attr__('H1', 'Twoot'),
		'id' => 'fw_h1',
		'std' => 'normal',
		'options' => $font_weight,
		'type' => 'select'
	),

	array(
		'name' => esc_attr__('H2', 'Twoot'),
		'id' => 'fw_h2',
		'std' => 'normal',
		'options' => $font_weight,
		'type' => 'select'
	),

	array(
		'name' => esc_attr__('H3', 'Twoot'),
		'id' => 'fw_h3',
		'std' => 'normal',
		'options' => $font_weight,
		'type' => 'select'
	),

	array(
		'name' => esc_attr__('H4', 'Twoot'),
		'id' => 'fw_h4',
		'std' => 'normal',
		'options' => $font_weight,
		'type' => 'select'
	),

	array(
		'name' => esc_attr__('H5', 'Twoot'),
		'id' => 'fw_h5',
		'std' => 'normal',
		'options' => $font_weight,
		'type' => 'select'
	),

	array(
		'name' => esc_attr__('H6', 'Twoot'),
		'id' => 'fw_h6',
		'std' => 'normal',
		'options' => $font_weight,
		'type' => 'select'
	),

	array(
		'name' => esc_attr__('Copyright', 'Twoot'),
		'id' => 'fw_copyright',
		'std' => 'normal',
		'options' => $font_weight,
		'type' => 'select'
	),

	array(
		'name' => esc_attr__('Widget Title', 'Twoot'),
		'id' => 'fw_widget_title',
		'std' => 'bold',
		'options' => $font_weight,
		'type' => 'select'
	),

	array(
		'name' => esc_attr__('Section Title', 'Twoot'),
		'id' => 'fw_section_title',
		'std' => 'bold',
		'options' => $font_weight,
		'type' => 'select'
	),

	array(
		'type' => 'group_end',
	),

	array(
		'type' => 'tab_content_end'
	),
	// End Font Weight


	array(
		'type' => 'tab_content_begin',
		'name' => esc_attr__('Text Transform',  'Twoot'),
	),

	array(
		'type' => 'group_begin',
		'name' => esc_attr__('Settings',  'Twoot')
	),

	array(
		'name' => esc_attr__('Logo', 'Twoot'),
		'id' => 'tt_logo',
		'std' => 'uppercase',
		'options' => $text_transform,
		'type' => 'select'
	),

	array(
		'name' => esc_attr__('Menu', 'Twoot'),
		'id' => 'tt_menu',
		'std' => 'uppercase',
		'options' => $text_transform,
		'type' => 'select'
	),

	array(
		'name' => esc_attr__('Sub Menu', 'Twoot'),
		'id' => 'tt_sub_menu',
		'std' => 'none',
		'options' => $text_transform,
		'type' => 'select'
	),

	array(
		'name' => esc_attr__('Bottom Menu', 'Twoot'),
		'id' => 'tt_bottom_menu',
		'std' => 'uppercase',
		'options' => $text_transform,
		'type' => 'select'
	),

	array(
		'name' => esc_attr__('H1', 'Twoot'),
		'id' => 'tt_h1',
		'std' => 'none',
		'options' => $text_transform,
		'type' => 'select'
	),

	array(
		'name' => esc_attr__('H2', 'Twoot'),
		'id' => 'tt_h2',
		'std' => 'none',
		'options' => $text_transform,
		'type' => 'select'
	),

	array(
		'name' => esc_attr__('H3', 'Twoot'),
		'id' => 'tt_h3',
		'std' => 'none',
		'options' => $text_transform,
		'type' => 'select'
	),

	array(
		'name' => esc_attr__('H4', 'Twoot'),
		'id' => 'tt_h4',
		'std' => 'none',
		'options' => $text_transform,
		'type' => 'select'
	),

	array(
		'name' => esc_attr__('H5', 'Twoot'),
		'id' => 'tt_h5',
		'std' => 'none',
		'options' => $text_transform,
		'type' => 'select'
	),

	array(
		'name' => esc_attr__('H6', 'Twoot'),
		'id' => 'tt_h6',
		'std' => 'none',
		'options' => $text_transform,
		'type' => 'select'
	),

	array(
		'name' => esc_attr__('Copyright', 'Twoot'),
		'id' => 'tt_copyright',
		'std' => 'none',
		'options' => $text_transform,
		'type' => 'select'
	),

	array(
		'name' => esc_attr__('Widget Title', 'Twoot'),
		'id' => 'tt_widget_title',
		'std' => 'uppercase',
		'options' => $text_transform,
		'type' => 'select'
	),

	array(
		'name' => esc_attr__('Section Title', 'Twoot'),
		'id' => 'tt_section_title',
		'std' => 'uppercase',
		'options' => $text_transform,
		'type' => 'select'
	),

	array(
		'type' => 'group_end',
	),

	array(
		'type' => 'tab_content_end'
	),
	// End Text Transform

);


return array('auto' => true, 'name' => 'font', 'options' => $options);
?>