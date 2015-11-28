<?php
/*-----------------------------------------------------------------------------------*/
/*	Accordions Config
/*-----------------------------------------------------------------------------------*/
$zilla_shortcodes['accordions'] = array(

	'params' => array(),
	'no_preview' => true,
	'shortcode' => '[accordions] {{child_shortcode}} [/accordions]',
	'popup_title' => __('Insert Accordions Shortcode', 'Twoot'),

	'child_shortcode' => array(
		'params' => array(
			'title' => array(
				'std' => 'Title',
				'type' => 'text',
				'label' => __('Title', 'Twoot'),
				'desc' => __('Title of the accordion.', 'Twoot')
			),
			'content' => array(
				'std' => 'Content',
				'type' => 'textarea',
				'label' => __('Content', 'Twoot'),
				'desc' => __('Add the accordion content', 'Twoot')
			)
		),
		'shortcode' => '[accordion title="{{title}}"] {{content}} [/accordion]',
		'clone_button' => __('Add accordion', 'Twoot')
	)
);




/*-----------------------------------------------------------------------------------*/
/*	Ads Config
/*-----------------------------------------------------------------------------------*/
$zilla_shortcodes['ads'] = array(

	'params' => array(),
	'no_preview' => true,
	'shortcode' => '[ads] {{child_shortcode}} [/ads]',
	'popup_title' => __('Insert Ads Shortcode', 'Twoot'),

	'child_shortcode' => array(
		'params' => array(
			'title' => array(
				'std' => 'Title',
				'type' => 'text',
				'label' => __('Ad Title', 'Twoot'),
				'desc' => __('Title of the ad', 'Twoot')
			),
			'img_url' => array(
				'std' => '',
				'type' => 'text',
				'label' => __('Image Url', 'Twoot'),
				'desc' => __('The image url for ad.', 'Twoot')
			),
			'img_width' => array(
				'std' => '460',
				'type' => 'text',
				'label' => __('Image Width', 'Twoot'),
				'desc' => __('The image width.', 'Twoot')
			),
			'img_height' => array(
				'std' => '245',
				'type' => 'text',
				'label' => __('Image Height', 'Twoot'),
				'desc' => __('The image height.', 'Twoot')
			),
			'link' => array(
				'std' => '',
				'type' => 'text',
				'label' => __('Link', 'Twoot'),
				'desc' => __('The link of ad.', 'Twoot')
			),
			'content' => array(
				'std' => 'Ad Content',
				'type' => 'textarea',
				'label' => __('Ad Content', 'Twoot'),
				'desc' => __('Add the ad content', 'Twoot')
			)
		),
		'shortcode' => '[ad title="{{title}}" img_url="{{img_url}}" img_width="{{img_width}}" img_height="{{img_height}}" link="{{link}}"] {{content}} [/ad]',
		'clone_button' => __('Add Ad', 'Twoot')
	)
);




/*-----------------------------------------------------------------------------------*/
/*	Audio Config
/*-----------------------------------------------------------------------------------*/
$zilla_shortcodes['audio'] = array(

	'no_preview' => true,
	'params' => array(
		'soundcloud_url' => array(
			'std' => 'http://api.soundcloud.com/tracks/100556971',
			'type' => 'text',
			'label' => __('Soundcloud Url', 'Twoot'),
			'desc' => __('The url of audio, it is from SoundCloud.', 'Twoot')
		),
		'height' => array(
			'std' => '166',
			'type' => 'text',
			'label' => __('Height', 'Twoot'),
			'desc' => __('The height for the soundcloud.', 'Twoot')
		),
		'embed' => array(
			'std' => '',
			'type' => 'textarea',
			'label' => __('Embed', 'Twoot'),
			'desc' => __('If you want to add some other embed code, you can use this option.', 'Twoot')
		)
	),
	'shortcode' => '[audio soundcloud_url="{{soundcloud_url}}" height="{{height}}" embed="{{embed}}"]',
	'popup_title' => __('Insert Audio Shortcode', 'Twoot')
);




/*-----------------------------------------------------------------------------------*/
/*	Blog Config
/*-----------------------------------------------------------------------------------*/
$zilla_shortcodes['blog'] = array(

	'no_preview' => true,
	'params' => array(
		'type' => array(
			'std' => '',
			'type' => 'select',
			'label' => __('Type', 'Twoot'),
			'desc' => __('The type for the post item.', 'Twoot'),
			'options' => array(
				'blog_cat' => 'Blog Cat',
				'blog_tag' => 'Blog Tag'
			)
		),
		'counts' => array(
			'std' => '5',
			'type' => 'text',
			'label' => __('Counts', 'Twoot'),
			'desc' => __('The number of posts to display on each page.', 'Twoot')
		),
		'cats' => array(
			'std' => '5',
			'type' => 'text',
			'label' => __('Cats', 'Twoot'),
			'desc' => __("The category ID's to pull posts from. Can be entered as a comma separated list.", 'Twoot')
		),
		'posts' => array(
			'std' => '5',
			'type' => 'text',
			'label' => __('Posts', 'Twoot'),
			'desc' => __("The post ID's to pull posts from. Can be entered as a comma separated list.", 'Twoot')
		),
		'order' => array(
			'std' => 'DESC',
			'type' => 'select',
			'label' => __('Order', 'Twoot'),
			'desc' => __("Designates the ascending or descending order of the 'orderby' parameter.", 'Twoot'),
			'options' => array(
				'ASC' => 'ASC',
				'DESC' => 'DESC'
			)
		),
		'orderby' => array(
			'std' => 'date',
			'type' => 'select',
			'label' => __('Orderby', 'Twoot'),
			'desc' => __('Sort retrieved posts by parameter.', 'Twoot'),
			'options' => array(
				'ID' => 'ID',
				'title' => 'Title',
				'name' => 'Name',
				'date' => 'Date',
				'rand' => 'Rand',
				'comment_count' => 'Comment Count'
			)
		)
	),
	'shortcode' => '[blog type="{{type}}" counts="{{counts}}" cats="{{cats}}" posts="{{posts}}" order="{{order}}" orderby="{{orderby}}"]',
	'popup_title' => __('Insert Blog Shortcode', 'Twoot')
);




/*-----------------------------------------------------------------------------------*/
/*	Blog Carousel Config
/*-----------------------------------------------------------------------------------*/
$zilla_shortcodes['blog_carousel'] = array(

	'no_preview' => true,
	'params' => array(
		'title' => array(
			'std' => 'Recent News',
			'type' => 'text',
			'label' => __('Title', 'Twoot'),
			'desc' => __('The title for the post carousel.', 'Twoot')
		),
		'type' => array(
			'std' => '',
			'type' => 'select',
			'label' => __('Type', 'Twoot'),
			'desc' => __('The type for the post item.', 'Twoot'),
			'options' => array(
				'blog_cat' => 'Blog Cat',
				'blog_tag' => 'Blog Tag'
			)
		),
		'counts' => array(
			'std' => '5',
			'type' => 'text',
			'label' => __('Counts', 'Twoot'),
			'desc' => __('The number of posts to display on each page.', 'Twoot')
		),
		'cats' => array(
			'std' => '5',
			'type' => 'text',
			'label' => __('Cats', 'Twoot'),
			'desc' => __("The category ID's to pull posts from. Can be entered as a comma separated list.", 'Twoot')
		),
		'posts' => array(
			'std' => '5',
			'type' => 'text',
			'label' => __('Posts', 'Twoot'),
			'desc' => __("The post ID's to pull posts from. Can be entered as a comma separated list.", 'Twoot')
		),
		'order' => array(
			'std' => 'DESC',
			'type' => 'select',
			'label' => __('Order', 'Twoot'),
			'desc' => __("Designates the ascending or descending order of the 'orderby' parameter.", 'Twoot'),
			'options' => array(
				'ASC' => 'ASC',
				'DESC' => 'DESC'
			)
		),
		'orderby' => array(
			'std' => 'date',
			'type' => 'select',
			'label' => __('Orderby', 'Twoot'),
			'desc' => __('Sort retrieved posts by parameter.', 'Twoot'),
			'options' => array(
				'ID' => 'ID',
				'title' => 'Title',
				'name' => 'Name',
				'date' => 'Date',
				'rand' => 'Rand',
				'comment_count' => 'Comment Count'
			)
		),
		'auto' => array(
			'std' => 'false',
			'type' => 'select',
			'label' => __('Auto', 'Twoot'),
			'desc' => __('Auto play the slider (true/false).', 'Twoot'),
			'options' => array(
				'true' => 'True',
				'false' => 'False'
			)
		),
		'speed' => array(
			'std' => '800',
			'type' => 'text',
			'label' => __('Speed', 'Twoot'),
			'desc' => __('Slide transition duration (in ms).', 'Twoot')
		),
		'pause' => array(
			'std' => '5000',
			'type' => 'text',
			'label' => __('Pause', 'Twoot'),
			'desc' => __('The amount of time (in ms) between each auto transition.', 'Twoot')
		),
		'move_slides' => array(
			'std' => '2',
			'type' => 'select',
			'label' => __('Move Slides', 'Twoot'),
			'desc' => __('The number of slides to move on transition.', 'Twoot'),
			'options' => array(
				'1' => '1',
				'2' => '2'
			)
		)
	),
	'shortcode' => '[blog_carousel title="{{title}}" type="{{type}}" counts="{{counts}}" cats="{{cats}}" posts="{{posts}}" order="{{order}}" orderby="{{orderby}}" auto="{{auto}}" speed="{{speed}}" pause="{{pause}}" move_slides="{{move_slides}}"]',
	'popup_title' => __('Insert Blog Carousel Shortcode', 'Twoot')
);




/*-----------------------------------------------------------------------------------*/
/*	Blog Full Config
/*-----------------------------------------------------------------------------------*/
$zilla_shortcodes['blog_full'] = array(

	'no_preview' => true,
	'params' => array(
		'type' => array(
			'std' => '',
			'type' => 'select',
			'label' => __('Type', 'Twoot'),
			'desc' => __('The type for the post item.', 'Twoot'),
			'options' => array(
				'blog_cat' => 'Blog Cat',
				'blog_tag' => 'Blog Tag'
			)
		),
		'counts' => array(
			'std' => '16',
			'type' => 'text',
			'label' => __('Counts', 'Twoot'),
			'desc' => __('The number of posts to display on each page.', 'Twoot')
		),
		'cats' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Cats', 'Twoot'),
			'desc' => __("The category ID's to pull posts from. Can be entered as a comma separated list.", 'Twoot')
		),
		'posts' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Posts', 'Twoot'),
			'desc' => __("The post ID's to pull posts from. Can be entered as a comma separated list.", 'Twoot')
		),
		'order' => array(
			'std' => 'DESC',
			'type' => 'select',
			'label' => __('Order', 'Twoot'),
			'desc' => __("Designates the ascending or descending order of the 'orderby' parameter.", 'Twoot'),
			'options' => array(
				'ASC' => 'ASC',
				'DESC' => 'DESC'
			)
		),
		'orderby' => array(
			'std' => 'date',
			'type' => 'select',
			'label' => __('Orderby', 'Twoot'),
			'desc' => __('Sort retrieved posts by parameter.', 'Twoot'),
			'options' => array(
				'ID' => 'ID',
				'title' => 'Title',
				'name' => 'Name',
				'date' => 'Date',
				'rand' => 'Rand',
				'comment_count' => 'Comment Count'
			)
		)
	),
	'shortcode' => '[blog_full type="{{type}}" counts="{{counts}}" cats="{{cats}}" posts="{{posts}}" order="{{order}}" orderby="{{orderby}}"]',
	'popup_title' => __('Insert Blog Full Shortcode', 'Twoot')
);




/*-----------------------------------------------------------------------------------*/
/*	Button Config
/*-----------------------------------------------------------------------------------*/
$zilla_shortcodes['button'] = array(

	'no_preview' => true,
	'params' => array(
		'style' => array(
			'std' => '',
			'type' => 'select',
			'label' => __('Style', 'Twoot'),
			'desc' => __('The style for button.', 'Twoot'),
			'options' => array(
				'dark' => 'Dark',
				'active' => 'Active',
				'light' => 'Light'
			)
		),
		'size' => array(
			'std' => 'medium',
			'type' => 'select',
			'label' => __('Size', 'Twoot'),
			'desc' => __('The size for button.', 'Twoot'),
			'options' => array(
				'small' => 'Small',
				'medium' => 'Medium',
				'large' => 'Large'
			)
		),
		'link' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Link', 'Twoot'),
			'desc' => __('The link url of button.', 'Twoot')
		),
		'target' => array(
			'std' => 'self',
			'type' => 'select',
			'label' => __('Target', 'Twoot'),
			'desc' => __('The target for button.', 'Twoot'),
			'options' => array(
				'self' => 'Self',
				'blank' => 'Blank'
			)
		)
	),
	'shortcode' => '[button style="{{style}}" size="{{size}}" link="{{link}}" target="{{target}}"]',
	'popup_title' => __('Insert Button Shortcode', 'Twoot')
);




/*-----------------------------------------------------------------------------------*/
/*	Best Sellers Carousel Config
/*-----------------------------------------------------------------------------------*/
$zilla_shortcodes['best_sellers_product_carousel'] = array(

	'no_preview' => true,
	'params' => array(
		'title' => array(
			'std' => 'Best Sellers',
			'type' => 'text',
			'label' => __('Title', 'Twoot'),
			'desc' => __('The title for the post carousel.', 'Twoot')
		),
		'counts' => array(
			'std' => '16',
			'type' => 'text',
			'label' => __('Counts', 'Twoot'),
			'desc' => __('The number of posts to display on each page.', 'Twoot')
		),
		'order' => array(
			'std' => 'DESC',
			'type' => 'select',
			'label' => __('Order', 'Twoot'),
			'desc' => __("Designates the ascending or descending order of the 'orderby' parameter.", 'Twoot'),
			'options' => array(
				'ASC' => 'ASC',
				'DESC' => 'DESC'
			)
		),
		'orderby' => array(
			'std' => 'date',
			'type' => 'select',
			'label' => __('Orderby', 'Twoot'),
			'desc' => __('Sort retrieved posts by parameter.', 'Twoot'),
			'options' => array(
				'ID' => 'ID',
				'title' => 'Title',
				'name' => 'Name',
				'date' => 'Date',
				'rand' => 'Rand',
				'comment_count' => 'Comment Count',
				'menu_order' => 'Menu Order'
			)
		),
		'auto' => array(
			'std' => 'false',
			'type' => 'select',
			'label' => __('Auto', 'Twoot'),
			'desc' => __('Auto play the slider (true/false).', 'Twoot'),
			'options' => array(
				'true' => 'True',
				'false' => 'False'
			)
		),
		'speed' => array(
			'std' => '800',
			'type' => 'text',
			'label' => __('Speed', 'Twoot'),
			'desc' => __('Slide transition duration (in ms).', 'Twoot')
		),
		'pause' => array(
			'std' => '5000',
			'type' => 'text',
			'label' => __('Pause', 'Twoot'),
			'desc' => __('The amount of time (in ms) between each auto transition.', 'Twoot')
		),
		'move_slides' => array(
			'std' => '4',
			'type' => 'select',
			'label' => __('Move Slides', 'Twoot'),
			'desc' => __('The number of slides to move on transition.', 'Twoot'),
			'options' => array(
				'1' => '1',
				'2' => '2',
				'3' => '3',
				'4' => '4'
			)
		)
	),
	'shortcode' => '[best_sellers_product_carousel title="{{title}}" counts="{{counts}}" order="{{order}}" orderby="{{orderby}}" auto="{{auto}}" speed="{{speed}}" pause="{{pause}}" move_slides="{{move_slides}}"]',
	'popup_title' => __('Insert Best Sellers Carousel Shortcode', 'Twoot')
);




/*-----------------------------------------------------------------------------------*/
/*	Featured Products Carousel Config
/*-----------------------------------------------------------------------------------*/
$zilla_shortcodes['featured_product_carousel'] = array(

	'no_preview' => true,
	'params' => array(
		'title' => array(
			'std' => 'Featured Products',
			'type' => 'text',
			'label' => __('Title', 'Twoot'),
			'desc' => __('The title for the post carousel.', 'Twoot')
		),
		'counts' => array(
			'std' => '16',
			'type' => 'text',
			'label' => __('Counts', 'Twoot'),
			'desc' => __('The number of posts to display on each page.', 'Twoot')
		),
		'order' => array(
			'std' => 'DESC',
			'type' => 'select',
			'label' => __('Order', 'Twoot'),
			'desc' => __("Designates the ascending or descending order of the 'orderby' parameter.", 'Twoot'),
			'options' => array(
				'ASC' => 'ASC',
				'DESC' => 'DESC'
			)
		),
		'orderby' => array(
			'std' => 'date',
			'type' => 'select',
			'label' => __('Orderby', 'Twoot'),
			'desc' => __('Sort retrieved posts by parameter.', 'Twoot'),
			'options' => array(
				'ID' => 'ID',
				'title' => 'Title',
				'name' => 'Name',
				'date' => 'Date',
				'rand' => 'Rand',
				'comment_count' => 'Comment Count',
				'menu_order' => 'Menu Order'
			)
		),
		'auto' => array(
			'std' => 'false',
			'type' => 'select',
			'label' => __('Auto', 'Twoot'),
			'desc' => __('Auto play the slider (true/false).', 'Twoot'),
			'options' => array(
				'true' => 'True',
				'false' => 'False'
			)
		),
		'speed' => array(
			'std' => '800',
			'type' => 'text',
			'label' => __('Speed', 'Twoot'),
			'desc' => __('Slide transition duration (in ms).', 'Twoot')
		),
		'pause' => array(
			'std' => '5000',
			'type' => 'text',
			'label' => __('Pause', 'Twoot'),
			'desc' => __('The amount of time (in ms) between each auto transition.', 'Twoot')
		),
		'move_slides' => array(
			'std' => '4',
			'type' => 'select',
			'label' => __('Move Slides', 'Twoot'),
			'desc' => __('The number of slides to move on transition.', 'Twoot'),
			'options' => array(
				'1' => '1',
				'2' => '2',
				'3' => '3',
				'4' => '4'
			)
		)
	),
	'shortcode' => '[featured_product_carousel title="{{title}}" counts="{{counts}}" order="{{order}}" orderby="{{orderby}}" auto="{{auto}}" speed="{{speed}}" pause="{{pause}}" move_slides="{{move_slides}}"]',
	'popup_title' => __('Insert Featured Products Carousel Shortcode', 'Twoot')
);





/*-----------------------------------------------------------------------------------*/
/*	OnSale Carousel Config
/*-----------------------------------------------------------------------------------*/
$zilla_shortcodes['onsale_product_carousel'] = array(

	'no_preview' => true,
	'params' => array(
		'title' => array(
			'std' => 'OnSale',
			'type' => 'text',
			'label' => __('Title', 'Twoot'),
			'desc' => __('The title for the post carousel.', 'Twoot')
		),
		'counts' => array(
			'std' => '16',
			'type' => 'text',
			'label' => __('Counts', 'Twoot'),
			'desc' => __('The number of posts to display on each page.', 'Twoot')
		),
		'order' => array(
			'std' => 'DESC',
			'type' => 'select',
			'label' => __('Order', 'Twoot'),
			'desc' => __("Designates the ascending or descending order of the 'orderby' parameter.", 'Twoot'),
			'options' => array(
				'ASC' => 'ASC',
				'DESC' => 'DESC'
			)
		),
		'orderby' => array(
			'std' => 'date',
			'type' => 'select',
			'label' => __('Orderby', 'Twoot'),
			'desc' => __('Sort retrieved posts by parameter.', 'Twoot'),
			'options' => array(
				'ID' => 'ID',
				'title' => 'Title',
				'name' => 'Name',
				'date' => 'Date',
				'rand' => 'Rand',
				'comment_count' => 'Comment Count',
				'menu_order' => 'Menu Order'
			)
		),
		'auto' => array(
			'std' => 'false',
			'type' => 'select',
			'label' => __('Auto', 'Twoot'),
			'desc' => __('Auto play the slider (true/false).', 'Twoot'),
			'options' => array(
				'true' => 'True',
				'false' => 'False'
			)
		),
		'speed' => array(
			'std' => '800',
			'type' => 'text',
			'label' => __('Speed', 'Twoot'),
			'desc' => __('Slide transition duration (in ms).', 'Twoot')
		),
		'pause' => array(
			'std' => '5000',
			'type' => 'text',
			'label' => __('Pause', 'Twoot'),
			'desc' => __('The amount of time (in ms) between each auto transition.', 'Twoot')
		),
		'move_slides' => array(
			'std' => '4',
			'type' => 'select',
			'label' => __('Move Slides', 'Twoot'),
			'desc' => __('The number of slides to move on transition.', 'Twoot'),
			'options' => array(
				'1' => '1',
				'2' => '2',
				'3' => '3',
				'4' => '4'
			)
		)
	),
	'shortcode' => '[onsale_product_carousel title="{{title}}" counts="{{counts}}" order="{{order}}" orderby="{{orderby}}" auto="{{auto}}" speed="{{speed}}" pause="{{pause}}" move_slides="{{move_slides}}"]',
	'popup_title' => __('Insert OnSale Products Carousel Shortcode', 'Twoot')
);




/*-----------------------------------------------------------------------------------*/
/*	Product Carousel Config
/*-----------------------------------------------------------------------------------*/
$zilla_shortcodes['product_carousel'] = array(

	'no_preview' => true,
	'params' => array(
		'title' => array(
			'std' => 'Recent Products',
			'type' => 'text',
			'label' => __('Title', 'Twoot'),
			'desc' => __('The title for the post carousel.', 'Twoot')
		),
		'type' => array(
			'std' => '',
			'type' => 'select',
			'label' => __('Type', 'Twoot'),
			'desc' => __('The type for the post item.', 'Twoot'),
			'options' => array(
				'product_cat' => 'Product Cat',
				'product_tag' => 'Product Tag'
			)
		),
		'counts' => array(
			'std' => '16',
			'type' => 'text',
			'label' => __('Counts', 'Twoot'),
			'desc' => __('The number of posts to display on each page.', 'Twoot')
		),
		'cats' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Cats', 'Twoot'),
			'desc' => __("The category ID's to pull posts from. Can be entered as a comma separated list.", 'Twoot')
		),
		'posts' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Posts', 'Twoot'),
			'desc' => __("The post ID's to pull posts from. Can be entered as a comma separated list.", 'Twoot')
		),
		'order' => array(
			'std' => 'DESC',
			'type' => 'select',
			'label' => __('Order', 'Twoot'),
			'desc' => __("Designates the ascending or descending order of the 'orderby' parameter.", 'Twoot'),
			'options' => array(
				'ASC' => 'ASC',
				'DESC' => 'DESC'
			)
		),
		'orderby' => array(
			'std' => 'date',
			'type' => 'select',
			'label' => __('Orderby', 'Twoot'),
			'desc' => __('Sort retrieved posts by parameter.', 'Twoot'),
			'options' => array(
				'ID' => 'ID',
				'title' => 'Title',
				'name' => 'Name',
				'date' => 'Date',
				'rand' => 'Rand',
				'comment_count' => 'Comment Count',
				'menu_order' => 'Menu Order'
			)
		),
		'auto' => array(
			'std' => 'false',
			'type' => 'select',
			'label' => __('Auto', 'Twoot'),
			'desc' => __('Auto play the slider (true/false).', 'Twoot'),
			'options' => array(
				'true' => 'True',
				'false' => 'False'
			)
		),
		'speed' => array(
			'std' => '800',
			'type' => 'text',
			'label' => __('Speed', 'Twoot'),
			'desc' => __('Slide transition duration (in ms).', 'Twoot')
		),
		'pause' => array(
			'std' => '5000',
			'type' => 'text',
			'label' => __('Pause', 'Twoot'),
			'desc' => __('The amount of time (in ms) between each auto transition.', 'Twoot')
		),
		'move_slides' => array(
			'std' => '4',
			'type' => 'select',
			'label' => __('Move Slides', 'Twoot'),
			'desc' => __('The number of slides to move on transition.', 'Twoot'),
			'options' => array(
				'1' => '1',
				'2' => '2',
				'3' => '3',
				'4' => '4'
			)
		)
	),
	'shortcode' => '[product_carousel title="{{title}}" type="{{type}}" counts="{{counts}}" cats="{{cats}}" posts="{{posts}}" order="{{order}}" orderby="{{orderby}}" auto="{{auto}}" speed="{{speed}}" pause="{{pause}}" move_slides="{{move_slides}}"]',
	'popup_title' => __('Insert Products Carousel Shortcode', 'Twoot')
);




/*-----------------------------------------------------------------------------------*/
/*	Columns Config
/*-----------------------------------------------------------------------------------*/
$zilla_shortcodes['columns'] = array(

	'params' => array(),
	'no_preview' => true,
	'shortcode' => '[columns] {{child_shortcode}}  [/columns]',
	'popup_title' => __('Insert Columns Shortcode', 'Twoot'),

	'child_shortcode' => array(
        'params' => array(
            'col' => array(
                'type' => 'select',
				'label' => __('Column Type', 'Twoot'),
				'desc' => __('Select the type, ie width of the column.', 'Twoot'),
				'options' => array(
					'1/2' => 'One Half',
					'1/3' => 'One Third',
					'2/3' => 'Two Thirds',
					'1/4' => 'One Fourth',
					'3/4' => 'Three Fourth',
				)
            ),
			'content' => array(
                'std' => '',
                'type' => 'textarea',
				'label' => __('Column Content', 'Twoot'),
				'desc' => __('Add the column content.', 'Twoot'),
            )
        ),
        'shortcode' => '[column col="{{col}}"] {{content}} [/column]',
        'clone_button' => __('Add Column', 'Twoot')
    )
);




/*-----------------------------------------------------------------------------------*/
/*	Faqs Config
/*-----------------------------------------------------------------------------------*/
$zilla_shortcodes['faqs'] = array(

	'no_preview' => true,
	'params' => array(
		'counts' => array(
			'std' => '12',
			'type' => 'text',
			'label' => __('Counts', 'Twoot'),
			'desc' => __('The number of posts to display on each page.', 'Twoot')
		),
		'cats' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Cats', 'Twoot'),
			'desc' => __("The category ID's to pull posts from. Can be entered as a comma separated list.", 'Twoot')
		),
		'posts' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Posts', 'Twoot'),
			'desc' => __("The post ID's to pull posts from. Can be entered as a comma separated list.", 'Twoot')
		),
		'order' => array(
			'std' => 'DESC',
			'type' => 'select',
			'label' => __('Order', 'Twoot'),
			'desc' => __("Designates the ascending or descending order of the 'orderby' parameter.", 'Twoot'),
			'options' => array(
				'ASC' => 'ASC',
				'DESC' => 'DESC'
			)
		),
		'orderby' => array(
			'std' => 'date',
			'type' => 'select',
			'label' => __('Orderby', 'Twoot'),
			'desc' => __('Sort retrieved posts by parameter.', 'Twoot'),
			'options' => array(
				'ID' => 'ID',
				'title' => 'Title',
				'name' => 'Name',
				'date' => 'Date',
				'rand' => 'Rand',
				'comment_count' => 'Comment Count',
				'menu_order' => 'Menu Order'
			)
		),
		'filter' => array(
			'std' => 'yes',
			'type' => 'select',
			'label' => __('Filter', 'Twoot'),
			'desc' => __('Show the sort menu.', 'Twoot'),
			'options' => array(
				'yes' => 'Yes',
				'no' => 'No'
			)
		)
	),
	'shortcode' => '[faqs counts="{{counts}}" cats="{{cats}}" posts="{{posts}}" order="{{order}}" orderby="{{orderby}}" filter="{{filter}}"]',
	'popup_title' => __('Insert Faqs Shortcode', 'Twoot')
);





/*-----------------------------------------------------------------------------------*/
/*	Gmap Config
/*-----------------------------------------------------------------------------------*/
$zilla_shortcodes['gmap'] = array(

	'no_preview' => true,
	'params' => array(
		'height' => array(
			'std' => '500',
			'type' => 'text',
			'label' => __('Height', 'Twoot'),
			'desc' => __('The number of map height.', 'Twoot')
		),
		'lat' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Lat', 'Twoot'),
			'desc' => __('The number of map lat.', 'Twoot')
		),
		'lng' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Lng', 'Twoot'),
			'desc' => __('The number of map lng.', 'Twoot')
		),
		'icon' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Icon', 'Twoot'),
			'desc' => __('The icon url for the map.', 'Twoot')
		),
		'zoom' => array(
			'std' => '14',
			'type' => 'text',
			'label' => __('Zoom', 'Twoot'),
			'desc' => __('The number of map zoom.', 'Twoot')
		),
		'dragging' => array(
			'std' => 'yes',
			'type' => 'select',
			'label' => __('Dragging', 'Twoot'),
			'desc' => __('Dragging able for the map (yes/no).', 'Twoot'),
			'options' => array(
				'yes' => 'Yes',
				'no' => 'No'
			)
		),
		'mousewheel' => array(
			'std' => 'yes',
			'type' => 'select',
			'label' => __('Mousewheel', 'Twoot'),
			'desc' => __('Mousewheel able for the map (yes/no).', 'Twoot'),
			'options' => array(
				'yes' => 'Yes',
				'no' => 'No'
			)
		)
	),
	'shortcode' => '[gmap height="{{height}}" lat="{{lat}}" lng="{{lng}}" icon="{{icon}}" zoom="{{zoom}}" dragging="{{dragging}}" mousewheel="{{mousewheel}}"]',
	'popup_title' => __('Insert Gmap Shortcode', 'Twoot')
);





/*-----------------------------------------------------------------------------------*/
/*	Icon Config
/*-----------------------------------------------------------------------------------*/
$zilla_shortcodes['icon'] = array(

	'no_preview' => true,
	'params' => array(
		'size' => array(
			'std' => 'medium',
			'type' => 'select',
			'label' => __('Size', 'Twoot'),
			'desc' => __('The size for button.', 'Twoot'),
			'options' => array(
				'small' => 'Small',
				'medium' => 'Medium',
				'large' => 'Large'
			)
		),
		'name' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Name', 'Twoot'),
			'desc' => __('The name for icon.', 'Twoot')
		)
	),
	'shortcode' => '[icon size="{{size}}" name="{{name}}"]',
	'popup_title' => __('Insert Icon Shortcode', 'Twoot')
);





/*-----------------------------------------------------------------------------------*/
/*	Icon Boxes  Config
/*-----------------------------------------------------------------------------------*/
$zilla_shortcodes['icon_boxes'] = array(

	'params' => array(),
	'no_preview' => true,
	'shortcode' => '[icon_boxes] {{child_shortcode}} [/icon_boxes]',
	'popup_title' => __('Insert Icon Boxes Shortcode', 'Twoot'),

	'child_shortcode' => array(
		'params' => array(
			'title' => array(
				'std' => '',
				'type' => 'text',
				'label' => __('Title', 'Twoot'),
				'desc' => __('Title of the icon box.', 'Twoot')
			),
			'icon' => array(
				'std' => '',
				'type' => 'text',
				'label' => __('Icon', 'Twoot'),
				'desc' => __('The icon font for icon box.', 'Twoot')
			),
			'link' => array(
				'std' => '',
				'type' => 'text',
				'label' => __('Link', 'Twoot'),
				'desc' => __('The link of icon box.', 'Twoot')
			)
		),
		'shortcode' => '[icon_box title="{{title}}" icon="{{icon}}" link="{{link}}"] {{content}} [/icon_box]',
		'clone_button' => __('Add Icon Box.', 'Twoot')
	)
);





/*-----------------------------------------------------------------------------------*/
/*	Image  Config
/*-----------------------------------------------------------------------------------*/
$zilla_shortcodes['image'] = array(

	'no_preview' => true,
	'params' => array(
		'title' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Title', 'Twoot'),
			'desc' => __('Title of the image.', 'Twoot')
		),
		'url' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Url', 'Twoot'),
			'desc' => __('The image url for image.', 'Twoot')
		),
		'width' => array(
			'std' => '460',
			'type' => 'text',
			'label' => __('Width', 'Twoot'),
			'desc' => __('The image width.', 'Twoot')
		),
		'height' => array(
			'std' => '245',
			'type' => 'text',
			'label' => __('Height', 'Twoot'),
			'desc' => __('The image height.', 'Twoot')
		),
		'crop' => array(
			'std' => 'yes',
			'type' => 'select',
			'label' => __('Crop', 'Twoot'),
			'desc' => __('Crop the image or not.', 'Twoot'),
			'options' => array(
				'yes' => 'Yes',
				'no' => 'No'
			)
		),
		'link' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Link', 'Twoot'),
			'desc' => __('The link of icon box.', 'Twoot')
		),
		'lightbox' => array(
			'std' => 'yes',
			'type' => 'select',
			'label' => __('Lightbox', 'Twoot'),
			'desc' => __('Show the image with lightbox or not.', 'Twoot'),
			'options' => array(
				'yes' => 'Yes',
				'no' => 'No'
			)
		)
	),
	'shortcode' => '[image title="{{title}}" url="{{url}}" width="{{width}}" height="{{height}}" crop="{{crop}}" link="{{link}}" lightbox="{{lightbox}}"]',
	'popup_title' => __('Insert Image Shortcode', 'Twoot')
);




/*-----------------------------------------------------------------------------------*/
/*	Portfolio Carousel Config
/*-----------------------------------------------------------------------------------*/
$zilla_shortcodes['portfolio_carousel'] = array(

	'no_preview' => true,
	'params' => array(
		'title' => array(
			'std' => 'Recent Works',
			'type' => 'text',
			'label' => __('Title', 'Twoot'),
			'desc' => __('The title for the post carousel.', 'Twoot')
		),
		'type' => array(
			'std' => '',
			'type' => 'select',
			'label' => __('Type', 'Twoot'),
			'desc' => __('The type for the post item.', 'Twoot'),
			'options' => array(
				'portfolio_cat' => 'Portfolio Cat',
				'portfolio_tag' => 'Portfolio Tag'
			)
		),
		'counts' => array(
			'std' => '16',
			'type' => 'text',
			'label' => __('Counts', 'Twoot'),
			'desc' => __('The number of posts to display on each page.', 'Twoot')
		),
		'cats' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Cats', 'Twoot'),
			'desc' => __("The category ID's to pull posts from. Can be entered as a comma separated list.", 'Twoot')
		),
		'posts' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Posts', 'Twoot'),
			'desc' => __("The post ID's to pull posts from. Can be entered as a comma separated list.", 'Twoot')
		),
		'order' => array(
			'std' => 'DESC',
			'type' => 'select',
			'label' => __('Order', 'Twoot'),
			'desc' => __("Designates the ascending or descending order of the 'orderby' parameter.", 'Twoot'),
			'options' => array(
				'ASC' => 'ASC',
				'DESC' => 'DESC'
			)
		),
		'orderby' => array(
			'std' => 'date',
			'type' => 'select',
			'label' => __('Orderby', 'Twoot'),
			'desc' => __('Sort retrieved posts by parameter.', 'Twoot'),
			'options' => array(
				'ID' => 'ID',
				'title' => 'Title',
				'name' => 'Name',
				'date' => 'Date',
				'rand' => 'Rand',
				'comment_count' => 'Comment Count',
				'menu_order' => 'Menu Order'
			)
		),
		'auto' => array(
			'std' => 'false',
			'type' => 'select',
			'label' => __('Auto', 'Twoot'),
			'desc' => __('Auto play the slider (true/false).', 'Twoot'),
			'options' => array(
				'true' => 'True',
				'false' => 'False'
			)
		),
		'speed' => array(
			'std' => '800',
			'type' => 'text',
			'label' => __('Speed', 'Twoot'),
			'desc' => __('Slide transition duration (in ms).', 'Twoot')
		),
		'pause' => array(
			'std' => '5000',
			'type' => 'text',
			'label' => __('Pause', 'Twoot'),
			'desc' => __('The amount of time (in ms) between each auto transition.', 'Twoot')
		),
		'move_slides' => array(
			'std' => '4',
			'type' => 'select',
			'label' => __('Move Slides', 'Twoot'),
			'desc' => __('The number of slides to move on transition.', 'Twoot'),
			'options' => array(
				'1' => '1',
				'2' => '2',
				'3' => '3',
				'4' => '4'
			)
		)
	),
	'shortcode' => '[portfolio_carousel title="{{title}}" type="{{type}}" counts="{{counts}}" cats="{{cats}}" posts="{{posts}}" order="{{order}}" orderby="{{orderby}}" auto="{{auto}}" speed="{{speed}}" pause="{{pause}}" move_slides="{{move_slides}}"]',
	'popup_title' => __('Insert Portfolio Carousel Shortcode', 'Twoot')
);






/*-----------------------------------------------------------------------------------*/
/*	Post Grid Config
/*-----------------------------------------------------------------------------------*/
$zilla_shortcodes['post_grid'] = array(

	'no_preview' => true,
	'params' => array(
		'type' => array(
			'std' => '',
			'type' => 'select',
			'label' => __('Type', 'Twoot'),
			'desc' => __('The type for the post item.', 'Twoot'),
			'options' => array(
				'blog_cat' => 'Blog Cat',
				'blog_tag' => 'Blog Tag',
				'portfolio_cat' => 'Portfolio Cat',
				'portfolio_tag' => 'Portfolio Tag',
				'product_cat' => 'Product Cat',
				'product_tag' => 'Product Tag'
			)
		),
		'columns' => array(
			'std' => '4',
			'type' => 'select',
			'label' => __('Columns', 'Twoot'),
			'desc' => __('The number of columns.', 'Twoot'),
			'options' => array(
				'2' => '2',
				'3' => '3',
				'4' => '4'
			)
		),
		'counts' => array(
			'std' => '16',
			'type' => 'text',
			'label' => __('Counts', 'Twoot'),
			'desc' => __('The number of posts to display on each page.', 'Twoot')
		),
		'cats' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Cats', 'Twoot'),
			'desc' => __("The category ID's to pull posts from. Can be entered as a comma separated list.", 'Twoot')
		),
		'posts' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Posts', 'Twoot'),
			'desc' => __("The post ID's to pull posts from. Can be entered as a comma separated list.", 'Twoot')
		),
		'order' => array(
			'std' => 'DESC',
			'type' => 'select',
			'label' => __('Order', 'Twoot'),
			'desc' => __("Designates the ascending or descending order of the 'orderby' parameter.", 'Twoot'),
			'options' => array(
				'ASC' => 'ASC',
				'DESC' => 'DESC'
			)
		),
		'orderby' => array(
			'std' => 'date',
			'type' => 'select',
			'label' => __('Orderby', 'Twoot'),
			'desc' => __('Sort retrieved posts by parameter.', 'Twoot'),
			'options' => array(
				'ID' => 'ID',
				'title' => 'Title',
				'name' => 'Name',
				'date' => 'Date',
				'rand' => 'Rand',
				'comment_count' => 'Comment Count',
				'menu_order' => 'Menu Order'
			)
		),
		'filter' => array(
			'std' => 'yes',
			'type' => 'select',
			'label' => __('Filter', 'Twoot'),
			'desc' => __('Show the sort menu.', 'Twoot'),
			'options' => array(
				'yes' => 'Yes',
				'no' => 'No'
			)
		),
		'paging' => array(
			'std' => 'yes',
			'type' => 'select',
			'label' => __('Paging', 'Twoot'),
			'desc' => __('Show the paging.', 'Twoot'),
			'options' => array(
				'yes' => 'Yes',
				'no' => 'No'
			)
		)
	),
	'shortcode' => '[post_grid type="{{type}}" columns="{{columns}}" counts="{{counts}}" cats="{{cats}}" posts="{{posts}}" order="{{order}}" orderby="{{orderby}}" filter="{{filter}}" paging="{{paging}}"]',
	'popup_title' => __('Insert Post Grid Shortcode', 'Twoot')
);





/*-----------------------------------------------------------------------------------*/
/*	Post Left Grid Config
/*-----------------------------------------------------------------------------------*/
$zilla_shortcodes['post_left_grid'] = array(

	'no_preview' => true,
	'params' => array(
		'type' => array(
			'std' => '',
			'type' => 'select',
			'label' => __('Type', 'Twoot'),
			'desc' => __('The type for the post item.', 'Twoot'),
			'options' => array(
				'blog_cat' => 'Blog Cat',
				'blog_tag' => 'Blog Tag',
				'portfolio_cat' => 'Portfolio Cat',
				'portfolio_tag' => 'Portfolio Tag',
				'product_cat' => 'Product Cat',
				'product_tag' => 'Product Tag'
			)
		),
		'columns' => array(
			'std' => '4',
			'type' => 'select',
			'label' => __('Columns', 'Twoot'),
			'desc' => __('The number of columns.', 'Twoot'),
			'options' => array(
				'2' => '2',
				'3' => '3'
			)
		),
		'counts' => array(
			'std' => '16',
			'type' => 'text',
			'label' => __('Counts', 'Twoot'),
			'desc' => __('The number of posts to display on each page.', 'Twoot')
		),
		'cats' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Cats', 'Twoot'),
			'desc' => __("The category ID's to pull posts from. Can be entered as a comma separated list.", 'Twoot')
		),
		'posts' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Posts', 'Twoot'),
			'desc' => __("The post ID's to pull posts from. Can be entered as a comma separated list.", 'Twoot')
		),
		'order' => array(
			'std' => 'DESC',
			'type' => 'select',
			'label' => __('Order', 'Twoot'),
			'desc' => __("Designates the ascending or descending order of the 'orderby' parameter.", 'Twoot'),
			'options' => array(
				'ASC' => 'ASC',
				'DESC' => 'DESC'
			)
		),
		'orderby' => array(
			'std' => 'date',
			'type' => 'select',
			'label' => __('Orderby', 'Twoot'),
			'desc' => __('Sort retrieved posts by parameter.', 'Twoot'),
			'options' => array(
				'ID' => 'ID',
				'title' => 'Title',
				'name' => 'Name',
				'date' => 'Date',
				'rand' => 'Rand',
				'comment_count' => 'Comment Count',
				'menu_order' => 'Menu Order'
			)
		),
		'paging' => array(
			'std' => 'yes',
			'type' => 'select',
			'label' => __('Paging', 'Twoot'),
			'desc' => __('Show the paging.', 'Twoot'),
			'options' => array(
				'yes' => 'Yes',
				'no' => 'No'
			)
		)
	),
	'shortcode' => '[post_left_grid type="{{type}}" columns="{{columns}}" counts="{{counts}}" cats="{{cats}}" posts="{{posts}}" order="{{order}}" orderby="{{orderby}}" paging="{{paging}}"]',
	'popup_title' => __('Insert Post Left Grid Shortcode', 'Twoot')
);





/*-----------------------------------------------------------------------------------*/
/*	Post Images Config
/*-----------------------------------------------------------------------------------*/
$zilla_shortcodes['post_images'] = array(

	'no_preview' => true,
	'params' => array(
		'ids' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('IDs', 'Twoot'),
			'desc' => __("The image ID's to pull posts from. Can be entered as a comma separated list.", 'Twoot')
		),
		'width' => array(
			'std' => '940',
			'type' => 'text',
			'label' => __('Width', 'Twoot'),
			'desc' => __('The image width.', 'Twoot')
		),
		'height' => array(
			'std' => '600',
			'type' => 'text',
			'label' => __('Height', 'Twoot'),
			'desc' => __('The image height.', 'Twoot')
		),
		'crop' => array(
			'std' => 'yes',
			'type' => 'select',
			'label' => __('Crop', 'Twoot'),
			'desc' => __('Crop the image or not.', 'Twoot'),
			'options' => array(
				'yes' => 'Yes',
				'no' => 'No'
			)
		),
		'lightbox' => array(
			'std' => 'yes',
			'type' => 'select',
			'label' => __('Lightbox', 'Twoot'),
			'desc' => __('Show the image with lightbox or not.', 'Twoot'),
			'options' => array(
				'yes' => 'Yes',
				'no' => 'No'
			)
		)
	),
	'shortcode' => '[post_images ids="{{ids}}" width="{{width}}" height="{{height}}" crop="{{crop}}" lightbox="{{lightbox}}"]',
	'popup_title' => __('Insert Post Image Shortcode', 'Twoot')
);





/*-----------------------------------------------------------------------------------*/
/*	Post Masonry Config
/*-----------------------------------------------------------------------------------*/
$zilla_shortcodes['post_masonry'] = array(

	'no_preview' => true,
	'params' => array(
		'ids' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('IDs', 'Twoot'),
			'desc' => __("The image ID's to pull posts from. Can be entered as a comma separated list.", 'Twoot')
		),
		'width' => array(
			'std' => '460',
			'type' => 'text',
			'label' => __('Width', 'Twoot'),
			'desc' => __('The image width.', 'Twoot')
		),
		'height' => array(
			'std' => '9999',
			'type' => 'text',
			'label' => __('Height', 'Twoot'),
			'desc' => __('The image height.', 'Twoot')
		),
		'crop' => array(
			'std' => 'no',
			'type' => 'select',
			'label' => __('Crop', 'Twoot'),
			'desc' => __('Crop the image or not.', 'Twoot'),
			'options' => array(
				'yes' => 'Yes',
				'no' => 'No'
			)
		),
		'lightbox' => array(
			'std' => 'yes',
			'type' => 'select',
			'label' => __('Lightbox', 'Twoot'),
			'desc' => __('Show the image with lightbox or not.', 'Twoot'),
			'options' => array(
				'yes' => 'Yes',
				'no' => 'No'
			)
		),
		'columns' => array(
			'std' => '4',
			'type' => 'select',
			'label' => __('Columns', 'Twoot'),
			'desc' => __('The number of columns.', 'Twoot'),
			'options' => array(
				'2' => '2',
				'3' => '3',
				'4' => '4'
			)
		)
	),
	'shortcode' => '[post_masonry ids="{{ids}}" width="{{width}}" height="{{height}}" crop="{{crop}}" lightbox="{{lightbox}}" columns="{{columns}}"]',
	'popup_title' => __('Insert Post Masonry Shortcode', 'Twoot')
);





/*-----------------------------------------------------------------------------------*/
/*	Post Slider Config
/*-----------------------------------------------------------------------------------*/
$zilla_shortcodes['post_slider'] = array(

	'no_preview' => true,
	'params' => array(
		'ids' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('IDs', 'Twoot'),
			'desc' => __("The image ID's to pull posts from. Can be entered as a comma separated list.", 'Twoot')
		),
		'width' => array(
			'std' => '460',
			'type' => 'text',
			'label' => __('Width', 'Twoot'),
			'desc' => __('The image width.', 'Twoot')
		),
		'height' => array(
			'std' => '9999',
			'type' => 'text',
			'label' => __('Height', 'Twoot'),
			'desc' => __('The image height.', 'Twoot')
		),
		'crop' => array(
			'std' => 'yes',
			'type' => 'select',
			'label' => __('Crop', 'Twoot'),
			'desc' => __('Crop the image or not.', 'Twoot'),
			'options' => array(
				'yes' => 'Yes',
				'no' => 'No'
			)
		),
		'lightbox' => array(
			'std' => 'yes',
			'type' => 'select',
			'label' => __('Lightbox', 'Twoot'),
			'desc' => __('Show the image with lightbox or not.', 'Twoot'),
			'options' => array(
				'yes' => 'Yes',
				'no' => 'No'
			)
		),
		'auto' => array(
			'std' => 'false',
			'type' => 'select',
			'label' => __('Auto', 'Twoot'),
			'desc' => __('Auto play the slider (true/false).', 'Twoot'),
			'options' => array(
				'true' => 'True',
				'false' => 'False'
			)
		),
		'speed' => array(
			'std' => '800',
			'type' => 'text',
			'label' => __('Speed', 'Twoot'),
			'desc' => __('Slide transition duration (in ms).', 'Twoot')
		),
		'pause' => array(
			'std' => '5000',
			'type' => 'text',
			'label' => __('Pause', 'Twoot'),
			'desc' => __('The amount of time (in ms) between each auto transition.', 'Twoot')
		),
		'mode' => array(
			'std' => 'fade',
			'type' => 'select',
			'label' => __('Mode', 'Twoot'),
			'desc' => __('Type of transition between slides.', 'Twoot'),
			'options' => array(
				'fade' => 'Fade',
				'horizontal' => 'Horizontal',
				'vertical' => 'Vertical'
			)
		)
	),
	'shortcode' => '[post_slider ids="{{ids}}" width="{{width}}" height="{{height}}" crop="{{crop}}" lightbox="{{lightbox}}" auto="{{auto}}" speed="{{speed}}" pause="{{pause}}" mode="{{mode}}"]',
	'popup_title' => __('Insert Post Slider Shortcode', 'Twoot')
);





/*-----------------------------------------------------------------------------------*/
/*	Progress Bar Config
/*-----------------------------------------------------------------------------------*/
$zilla_shortcodes['progress_bar'] = array(

	'no_preview' => true,
	'params' => array(
		'title' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Title', 'Twoot'),
			'desc' => __('The title for progress bar.', 'Twoot')
		),
		'percent' => array(
			'std' => '80',
			'type' => 'text',
			'label' => __('Percent', 'Twoot'),
			'desc' => __('The percent for progress bar.', 'Twoot')
		)
	),
	'shortcode' => '[progress_bar title="{{title}}" percent="{{percent}}"]',
	'popup_title' => __('Insert Progress Bar Shortcode', 'Twoot')
);




/*-----------------------------------------------------------------------------------*/
/*	Price Tables Config
/*-----------------------------------------------------------------------------------*/
$zilla_shortcodes['price_table'] = array(

	'params' => array(),
	'no_preview' => true,
	'shortcode' => '[price_table] {{child_shortcode}} [/price_table]',
	'popup_title' => __('Insert Price Table Shortcode', 'Twoot'),

	'child_shortcode' => array(
		'params' => array(
			'title' => array(
				'std' => 'Title',
				'type' => 'text',
				'label' => __('Title', 'Twoot'),
				'desc' => __('The title for price table.', 'Twoot')
			),
			'currency' => array(
				'std' => '$',
				'type' => 'text',
				'label' => __('Currency', 'Twoot'),
				'desc' => __('The currency for price table.', 'Twoot')
			),
			'price' => array(
				'std' => '',
				'type' => 'text',
				'label' => __('Price', 'Twoot'),
				'desc' => __('The price for price table.', 'Twoot')
			),
			'sub_price' => array(
				'std' => '',
				'type' => 'text',
				'label' => __('Sub Price', 'Twoot'),
				'desc' => __('The sub price for price table.', 'Twoot')
			),
			'time' => array(
				'std' => '',
				'type' => 'text',
				'label' => __('Time', 'Twoot'),
				'desc' => __('The time for price table.', 'Twoot')
			),
			'button' => array(
				'std' => '',
				'type' => 'text',
				'label' => __('Button', 'Twoot'),
				'desc' => __('The button text for price table.', 'Twoot')
			),
			'button_link' => array(
				'std' => '',
				'type' => 'text',
				'label' => __('Button Link', 'Twoot'),
				'desc' => __('The button link for price table.', 'Twoot')
			),
			'content' => array(
				'std' => 'Content',
				'type' => 'textarea',
				'label' => __('Content', 'Twoot'),
				'desc' => __('Add the price table content', 'Twoot')
			)
		),
		'shortcode' => '[price_table_item title="{{title}}" currency="{{currency}}" price="{{price}}" sub_price="{{sub_price}}" time="{{time}}" button="{{button}}" button_link="{{button_link}}"] {{content}} [/price_table_item]',
		'clone_button' => __('Add Price Table', 'Twoot')
	)
);





/*-----------------------------------------------------------------------------------*/
/*	Latest Blog Config
/*-----------------------------------------------------------------------------------*/
$zilla_shortcodes['latest_blog'] = array(

	'no_preview' => true,
	'params' => array(
		'title' => array(
			'std' => 'Latest Blog',
			'type' => 'text',
			'label' => __('Title', 'Twoot'),
			'desc' => __('The title for the latest blog.', 'Twoot')
		),
		'top_counts' => array(
			'std' => '1',
			'type' => 'text',
			'label' => __('Top Counts', 'Twoot'),
			'desc' => __('The number of posts to display on each page.', 'Twoot')
		),
		'last_counts' => array(
			'std' => '3',
			'type' => 'text',
			'label' => __('Last Counts', 'Twoot'),
			'desc' => __('The number of posts to display on each page.', 'Twoot')
		),
		'cats' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Cats', 'Twoot'),
			'desc' => __("The category ID's to pull posts from. Can be entered as a comma separated list.", 'Twoot')
		),
		'posts' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Posts', 'Twoot'),
			'desc' => __("The post ID's to pull posts from. Can be entered as a comma separated list.", 'Twoot')
		)
	),
	'shortcode' => '[latest_blog title="{{title}}" top_counts="{{top_counts}}" last_counts="{{last_counts}}" cats="{{cats}}" posts="{{posts}}"]',
	'popup_title' => __('Insert Latest Blog Shortcode', 'Twoot')
);





/*-----------------------------------------------------------------------------------*/
/*	Message Boxes Config
/*-----------------------------------------------------------------------------------*/
$zilla_shortcodes['message_box'] = array(

	'no_preview' => true,
	'params' => array(
		'style' => array(
			'std' => 'default',
			'type' => 'select',
			'label' => __('Style', 'Twoot'),
			'desc' => __('The style for message box.', 'Twoot'),
			'options' => array(
				'default' => 'Default',
				'success' => 'Success',
				'warning' => 'Warning',
				'notice' => 'Notice'
			)
		),
		'close' => array(
			'std' => 'yes',
			'type' => 'select',
			'label' => __('Close', 'Twoot'),
			'desc' => __('The close button for message box.', 'Twoot'),
			'options' => array(
				'yes' => 'Yes',
				'no' => 'No'
			)
		)
	),
	'shortcode' => '[message_box style="{{style}}" close="{{close}}"]',
	'popup_title' => __('Insert Message Box Shortcode', 'Twoot')
);




/*-----------------------------------------------------------------------------------*/
/*	Number Config
/*-----------------------------------------------------------------------------------*/
$zilla_shortcodes['number'] = array(

	'no_preview' => true,
	'params' => array(
		'title' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Title', 'Twoot'),
			'desc' => __('The title for number.', 'Twoot')
		),
		'percent' => array(
			'std' => '80',
			'type' => 'text',
			'label' => __('Percent', 'Twoot'),
			'desc' => __('The percent for number.', 'Twoot')
		)
	),
	'shortcode' => '[number title="{{title}}" percent="{{percent}}"]',
	'popup_title' => __('Insert Number Shortcode', 'Twoot')
);




/*-----------------------------------------------------------------------------------*/
/*	Social Icons
/*-----------------------------------------------------------------------------------*/
$zilla_shortcodes['social_icons'] = array(

	'params' => array(),
	'no_preview' => true,
	'shortcode' => '[social_icons] {{child_shortcode}} [/social_icons]',
	'popup_title' => __('Insert Social Icons Shortcode', 'Twoot'),

	'child_shortcode' => array(
        'params' => array(
			 'type' => array(
				'type' => 'select',
				'label' => __('Type', 'Twoot'),
				'desc' => __('Select the type for the social icons.', 'Twoot'),
				'options' => array(
					'duckduckgo' => 'Duckduckgo',
					'aim' => 'Aim',
					'delicious' => 'Delicious',
					'smashmag' => 'Smashmag',
					'fivehundredpx' => 'Fivehundredpx',
					'forrst' => 'Forrst',
					'blogger' => 'Blogger',
					'viadeo' => 'Viadeo',
					'youtube' => 'Youtube',
					'facebook' => 'Facebook',
					'github' => 'Github',
					'twitter' => 'Twitter',
					'flickr' => 'Flickr',
					'vimeo' => 'Vimeo',
					'google' => 'Google',
					'pinterest' => 'Pinterest',
					'tumblr' => 'Tumblr',
					'linkedin' => 'Linkedin',
					'dribbble' => 'Dribbble',
					'stumbleupon' => 'Stumbleupon',
					'box' => 'Box',
					'spotify' => 'Spotify',
					'instagram' => 'Instagram',
					'dropbox' => 'Dropbox',
					'flattr' => 'Flattr',
					'skype' => 'Skype',
					'soundcloud' => 'Soundcloud',
					'behance' => 'Behance',
					'vkontakte' => 'Vkontakte'
				)
			 ),
			 'link' => array(
				'std' => 'http://google.com',
				'type' => 'text',
				'label' => __('Link', 'Twoot'),
				'desc' => __('Link of the social icon.', 'Twoot')
			 )
        ),
        'shortcode' => '[social_icon type="{{type}}" link="{{link}}"]',
        'clone_button' => __('Add Social Icon', 'Twoot')
    )
);





/*-----------------------------------------------------------------------------------*/
/*	Slogan Config
/*-----------------------------------------------------------------------------------*/
$zilla_shortcodes['slogan'] = array(

	'no_preview' => true,
	'params' => array(
		'title' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Title', 'Twoot'),
			'desc' => __('The title for slogan.', 'Twoot')
		),
		'link' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Link', 'Twoot'),
			'desc' => __('The link for slogan.', 'Twoot')
		),
		'content' => array(
			'std' => 'Content',
			'type' => 'textarea',
			'label' => __('Content', 'Twoot'),
			'desc' => __('Add the content.', 'Twoot')
		)
	),
	'shortcode' => '[slogan title="{{title}}" link="{{link}}"] {{content}} [/slogan]',
	'popup_title' => __('Insert Slogan Shortcode', 'Twoot')
);




/*-----------------------------------------------------------------------------------*/
/*	Tagline Config
/*-----------------------------------------------------------------------------------*/
$zilla_shortcodes['tagline'] = array(

	'no_preview' => true,
	'params' => array(
		'title' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Title', 'Twoot'),
			'desc' => __('The title for tagline.', 'Twoot')
		),
		'link' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Link', 'Twoot'),
			'desc' => __('The link for tagline.', 'Twoot')
		),
		'content' => array(
			'std' => 'Content',
			'type' => 'textarea',
			'label' => __('Content', 'Twoot'),
			'desc' => __('Add the content.', 'Twoot')
		)
	),
	'shortcode' => '[tagline title="{{title}}" link="{{link}}"] {{content}} [/tagline]',
	'popup_title' => __('Insert Tagline Shortcode', 'Twoot')
);




/*-----------------------------------------------------------------------------------*/
/*	Team Members Config
/*-----------------------------------------------------------------------------------*/
$zilla_shortcodes['team_members'] = array(

	'params' => array(),
	'no_preview' => true,
	'shortcode' => '[team_members] {{child_shortcode}} [/team_members]',
	'popup_title' => __('Insert Team Members Shortcode', 'Twoot'),

	'child_shortcode' => array(
		'params' => array(
			'avatar' => array(
				'std' => '',
				'type' => 'text',
				'label' => __('Avatar', 'Twoot'),
				'desc' => __('The image url for avatar.', 'Twoot')
			),
			'name' => array(
				'std' => '',
				'type' => 'text',
				'label' => __('Name', 'Twoot'),
				'desc' => __('The name for member.', 'Twoot')
			),
			'role' => array(
				'std' => '',
				'type' => 'text',
				'label' => __('Role', 'Twoot'),
				'desc' => __('The role for member.', 'Twoot')
			),
			'content' => array(
				'std' => '',
				'type' => 'textarea',
				'label' => __('Content', 'Twoot'),
				'desc' => __('Add the content', 'Twoot')
			)
		),
		'shortcode' => '[team_member avatar="{{avatar}}" name="{{name}}" role="{{role}}"] {{content}} [/team_member]',
		'clone_button' => __('Add Team Member', 'Twoot')
	)
);




/*-----------------------------------------------------------------------------------*/
/*	Testimonial Config
/*-----------------------------------------------------------------------------------*/
$zilla_shortcodes['testimonial'] = array(

	'no_preview' => true,
	'params' => array(
		'avatar' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Avatar', 'Twoot'),
			'desc' => __('The image url for avatar.', 'Twoot')
		),
		'name' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Name', 'Twoot'),
			'desc' => __('The name for member.', 'Twoot')
		),
		'role' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Role', 'Twoot'),
			'desc' => __('The role for member.', 'Twoot')
		),
		'content' => array(
			'std' => '',
			'type' => 'textarea',
			'label' => __('Content', 'Twoot'),
			'desc' => __('Add the content', 'Twoot')
		)
	),
	'shortcode' => '[testimonial avatar="{{avatar}}" name="{{name}}" role="{{role}}"] {{content}} [/testimonial]',
	'clone_button' => __('Add Testimonial', 'Twoot')
);




/*-----------------------------------------------------------------------------------*/
/*	Testimonial Carousel Config
/*-----------------------------------------------------------------------------------*/
$zilla_shortcodes['testimonial_carousel'] = array(

	'params' => array(),
	'no_preview' => true,
	'shortcode' => '[testimonial_carousel] {{child_shortcode}} [/testimonial_carousel]',
	'popup_title' => __('Insert Testimonial Carousel Shortcode', 'Twoot'),

	'child_shortcode' => array(
		'params' => array(
			'avatar' => array(
				'std' => '',
				'type' => 'text',
				'label' => __('Avatar', 'Twoot'),
				'desc' => __('The image url for avatar.', 'Twoot')
			),
			'name' => array(
				'std' => '',
				'type' => 'text',
				'label' => __('Name', 'Twoot'),
				'desc' => __('The name for member.', 'Twoot')
			),
			'role' => array(
				'std' => '',
				'type' => 'text',
				'label' => __('Role', 'Twoot'),
				'desc' => __('The role for member.', 'Twoot')
			),
			'content' => array(
				'std' => '',
				'type' => 'textarea',
				'label' => __('Content', 'Twoot'),
				'desc' => __('Add the content', 'Twoot')
			)
		),
		'shortcode' => '[testimonial_item avatar="{{avatar}}" name="{{name}}" role="{{role}}"] {{content}} [/testimonial_item]',
		'clone_button' => __('Add testimonial item', 'Twoot')
	)
);






/*-----------------------------------------------------------------------------------*/
/*	Twitter Carousel Config
/*-----------------------------------------------------------------------------------*/
$zilla_shortcodes['twitter_carousel'] = array(

	'no_preview' => true,
	'params' => array(
		'counts' => array(
			'std' => '5',
			'type' => 'text',
			'label' => __('Counts', 'Twoot'),
			'desc' => __('The number of slider item.', 'Twoot')
		),
		'cache' => array(
			'std' => '1',
			'type' => 'text',
			'label' => __('Cache', 'Twoot'),
			'desc' => __('The cache time (in hour).', 'Twoot')
		),
		'auto' => array(
			'std' => 'true',
			'type' => 'select',
			'label' => __('Auto', 'Twoot'),
			'desc' => __('Auto play the slider (true/false).', 'Twoot'),
			'options' => array(
				'true' => 'True',
				'false' => 'False'
			)
		),
		'speed' => array(
			'std' => '800',
			'type' => 'text',
			'label' => __('Speed', 'Twoot'),
			'desc' => __('Slide transition duration (in ms).', 'Twoot')
		),
		'pause' => array(
			'std' => '5000',
			'type' => 'text',
			'label' => __('Pause', 'Twoot'),
			'desc' => __('The amount of time (in ms) between each auto transition.', 'Twoot')
		),
		'mode' => array(
			'std' => 'fade',
			'type' => 'select',
			'label' => __('Mode', 'Twoot'),
			'desc' => __('Type of transition between slides.', 'Twoot'),
			'options' => array(
				'fade' => 'Fade',
				'horizontal' => 'Horizontal',
				'vertical' => 'Vertical'
			)
		)
	),
	'shortcode' => '[twitter_carousel counts="{{counts}}" cache="{{cache}}" auto="{{auto}}" speed="{{speed}}" pause="{{pause}}" mode="{{mode}}"]',
	'popup_title' => __('Insert Twitter Carousel Shortcode', 'Twoot')
);





/*-----------------------------------------------------------------------------------*/
/*	Toggle Config
/*-----------------------------------------------------------------------------------*/
$zilla_shortcodes['toggles'] = array(

	'params' => array(),
	'no_preview' => true,
	'shortcode' => '[toggles] {{child_shortcode}} [/toggles]',
	'popup_title' => __('Insert Toggles Shortcode', 'Twoot'),

	'child_shortcode' => array(
		'params' => array(
			'title' => array(
				'std' => 'Title',
				'type' => 'text',
				'label' => __('Title', 'Twoot'),
				'desc' => __('Title of the toggle.', 'Twoot')
			),
			'content' => array(
				'std' => 'Content',
				'type' => 'textarea',
				'label' => __('Content', 'Twoot'),
				'desc' => __('Add the toggle content', 'Twoot')
			)
		),
		'shortcode' => '[toggle title="{{title}}"] {{content}} [/toggle]',
		'clone_button' => __('Add toggle', 'Twoot')
	)
);





/*-----------------------------------------------------------------------------------*/
/*	Tab Config
/*-----------------------------------------------------------------------------------*/
$zilla_shortcodes['tabs'] = array(

	'params' => array(),
	'no_preview' => true,
	'shortcode' => '[tabs] {{child_shortcode}} [/tabs]',
	'popup_title' => __('Insert Tabs Shortcode', 'Twoot'),

	'child_shortcode' => array(
		'params' => array(
			'title' => array(
				'std' => 'Title',
				'type' => 'text',
				'label' => __('Title', 'Twoot'),
				'desc' => __('Title of the tab.', 'Twoot')
			),
			'content' => array(
				'std' => 'Content',
				'type' => 'textarea',
				'label' => __('Content', 'Twoot'),
				'desc' => __('Add the tab content', 'Twoot')
			)
		),
		'shortcode' => '[tab title="{{title}}"] {{content}} [/tab]',
		'clone_button' => __('Add tab', 'Twoot')
	)
);





/*-----------------------------------------------------------------------------------*/
/*	Left Tab Config
/*-----------------------------------------------------------------------------------*/
$zilla_shortcodes['left_tabs'] = array(

	'params' => array(),
	'no_preview' => true,
	'shortcode' => '[left_tabs] {{child_shortcode}} [/left_tabs]',
	'popup_title' => __('Insert Left Tabs Shortcode', 'Twoot'),

	'child_shortcode' => array(
		'params' => array(
			'title' => array(
				'std' => 'Title',
				'type' => 'text',
				'label' => __('Title', 'Twoot'),
				'desc' => __('Title of the tab.', 'Twoot')
			),
			'content' => array(
				'std' => 'Content',
				'type' => 'textarea',
				'label' => __('Content', 'Twoot'),
				'desc' => __('Add the tab content', 'Twoot')
			)
		),
		'shortcode' => '[left_tab title="{{title}}"] {{content}} [/left_tab]',
		'clone_button' => __('Add tab', 'Twoot')
	)
);





/*-----------------------------------------------------------------------------------*/
/*	Video Config
/*-----------------------------------------------------------------------------------*/
$zilla_shortcodes['video'] = array(

	'no_preview' => true,
	'params' => array(
	    'type' => array(
			'std' => 'youtube',
			'type' => 'select',
			'label' => __('Type', 'Twoot'),
			'desc' => __('Type of video.', 'Twoot'),
			'options' => array(
				'youtube' => 'Youtube',
				'vimeo' => 'Vimeo'
			)
		),
		'url' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Url', 'Twoot'),
			'desc' => __('The url for youtube or vimeo.', 'Twoot')
		),
		'width' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Width', 'Twoot'),
			'desc' => __('The width for video.', 'Twoot')
		),
		'height' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Height', 'Twoot'),
			'desc' => __('The height for video.', 'Twoot')
		),
		'embed' => array(
			'std' => '',
			'type' => 'textarea',
			'label' => __('Embed', 'Twoot'),
			'desc' => __('If you want to add some other embed code, you can use this option.', 'Twoot')
		)
	),
	'shortcode' => '[video type="{{type}}" url="{{url}}" width="{{width}}" height="{{height}}" embed="{{embed}}"]',
	'popup_title' => __('Insert Video Shortcode', 'Twoot')
);
?>