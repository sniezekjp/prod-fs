<?php
// Custom CSS
$custom_css = twoot_get_frontend_func('opt', 'skin', 'custom_css');
$logo_pt=twoot_get_frontend_func('opt', 'opt', 'logo_pt');
$logo_pb=twoot_get_frontend_func('opt', 'opt', 'logo_pb');





// Block CSS
$block_query = get_posts(array(
	'posts_per_page' => -1,
	'post_type'	=> 'content_block',
	'post_status' => 'publish'
));

$block_css = '';
if(is_array($block_query) && !empty($block_query)) {
	foreach ($block_query as $block) {
		$id=$block->ID;
		$block_custom_css = twoot_get_frontend_func('meta', 'block_custom_css', $id);

		if($block_custom_css) { 
			$block_css .= $block_custom_css; 
		}
	}
}





// Font CSS
$ff_body = twoot_get_frontend_func('opt', 'font', 'ff_body');
$ff_logo = twoot_get_frontend_func('opt', 'font', 'ff_logo');
$ff_menu = twoot_get_frontend_func('opt', 'font', 'ff_menu');
$ff_sub_menu = twoot_get_frontend_func('opt', 'font', 'ff_sub_menu');
$ff_bottom_menu = twoot_get_frontend_func('opt', 'font', 'ff_bottom_menu');
$ff_h1 = twoot_get_frontend_func('opt', 'font', 'ff_h1');
$ff_h2 = twoot_get_frontend_func('opt', 'font', 'ff_h2');
$ff_h3 = twoot_get_frontend_func('opt', 'font', 'ff_h3');
$ff_h4 = twoot_get_frontend_func('opt', 'font', 'ff_h4');
$ff_h5 = twoot_get_frontend_func('opt', 'font', 'ff_h5');
$ff_h6 = twoot_get_frontend_func('opt', 'font', 'ff_h6');
$ff_copyright = twoot_get_frontend_func('opt', 'font', 'ff_copyright');
$ff_widget_title = twoot_get_frontend_func('opt', 'font', 'ff_widget_title');
$ff_section_title = twoot_get_frontend_func('opt', 'font', 'ff_section_title');
$ff_item_title = twoot_get_frontend_func('opt', 'font', 'ff_item_title');
$ff_woo_amount = twoot_get_frontend_func('opt', 'font', 'ff_woo_amount');


$fs_body = twoot_get_frontend_func('opt', 'font', 'fs_body');
$fs_logo = twoot_get_frontend_func('opt', 'font', 'fs_logo');
$fs_menu = twoot_get_frontend_func('opt', 'font', 'fs_menu');
$fs_sub_menu = twoot_get_frontend_func('opt', 'font', 'fs_sub_menu');
$fs_bottom_menu = twoot_get_frontend_func('opt', 'font', 'fs_bottom_menu');
$fs_h1 = twoot_get_frontend_func('opt', 'font', 'fs_h1');
$fs_h2 = twoot_get_frontend_func('opt', 'font', 'fs_h2');
$fs_h3 = twoot_get_frontend_func('opt', 'font', 'fs_h3');
$fs_h4 = twoot_get_frontend_func('opt', 'font', 'fs_h4');
$fs_h5 = twoot_get_frontend_func('opt', 'font', 'fs_h5');
$fs_h6 = twoot_get_frontend_func('opt', 'font', 'fs_h6');
$fs_copyright = twoot_get_frontend_func('opt', 'font', 'fs_copyright');
$fs_widget_title = twoot_get_frontend_func('opt', 'font', 'fs_widget_title');
$fs_section_title = twoot_get_frontend_func('opt', 'font', 'fs_section_title');
$fs_body_rem = $fs_body/10;
$fs_logo_rem = $fs_logo/10;
$fs_menu_rem = $fs_menu/10;
$fs_sub_menu_rem = $fs_sub_menu/10;
$fs_bottom_menu_rem = $fs_bottom_menu/10;
$fs_h1_rem = $fs_h1/10;
$fs_h2_rem = $fs_h2/10;
$fs_h3_rem = $fs_h3/10;
$fs_h4_rem = $fs_h4/10;
$fs_h5_rem = $fs_h5/10;
$fs_h6_rem = $fs_h6/10;
$fs_copyright_rem = $fs_copyright/10;
$fs_widget_title_rem = $fs_widget_title/10;
$fs_section_title_rem = $fs_section_title/10;


$fw_logo = twoot_get_frontend_func('opt', 'font', 'fw_logo');
$fw_menu = twoot_get_frontend_func('opt', 'font', 'fw_menu');
$fw_sub_menu = twoot_get_frontend_func('opt', 'font', 'fw_sub_menu');
$fw_bottom_menu = twoot_get_frontend_func('opt', 'font', 'fw_bottom_menu');
$fw_h1 = twoot_get_frontend_func('opt', 'font', 'fw_h1');
$fw_h2 = twoot_get_frontend_func('opt', 'font', 'fw_h2');
$fw_h3 = twoot_get_frontend_func('opt', 'font', 'fw_h3');
$fw_h4 = twoot_get_frontend_func('opt', 'font', 'fw_h4');
$fw_h5 = twoot_get_frontend_func('opt', 'font', 'fw_h5');
$fw_h6 = twoot_get_frontend_func('opt', 'font', 'fw_h6');
$fw_copyright = twoot_get_frontend_func('opt', 'font', 'fw_copyright');
$fw_widget_title = twoot_get_frontend_func('opt', 'font', 'fw_widget_title');
$fw_section_title = twoot_get_frontend_func('opt', 'font', 'fw_section_title');


$tt_logo = twoot_get_frontend_func('opt', 'font', 'tt_logo');
$tt_menu = twoot_get_frontend_func('opt', 'font', 'tt_menu');
$tt_sub_menu = twoot_get_frontend_func('opt', 'font', 'tt_sub_menu');
$tt_bottom_menu = twoot_get_frontend_func('opt', 'font', 'tt_bottom_menu');
$tt_h1 = twoot_get_frontend_func('opt', 'font', 'tt_h1');
$tt_h2 = twoot_get_frontend_func('opt', 'font', 'tt_h2');
$tt_h3 = twoot_get_frontend_func('opt', 'font', 'tt_h3');
$tt_h4 = twoot_get_frontend_func('opt', 'font', 'tt_h4');
$tt_h5 = twoot_get_frontend_func('opt', 'font', 'tt_h5');
$tt_h6 = twoot_get_frontend_func('opt', 'font', 'tt_h6');
$tt_copyright = twoot_get_frontend_func('opt', 'font', 'tt_copyright');
$tt_widget_title = twoot_get_frontend_func('opt', 'font', 'tt_widget_title');
$tt_section_title = twoot_get_frontend_func('opt', 'font', 'tt_section_title');






// Body CSS
$bg_color = twoot_get_frontend_func('opt', 'skin', 'bg_color');
$bg_image = twoot_get_frontend_func('opt', 'skin', 'bg_image');
$bg_image_repeat = twoot_get_frontend_func('opt', 'skin', 'bg_image_repeat');
$bg_image_horizontal = twoot_get_frontend_func('opt', 'skin', 'bg_image_horizontal');
$bg_image_vertical = twoot_get_frontend_func('opt', 'skin', 'bg_image_vertical');
$bg_image_attachment = twoot_get_frontend_func('opt', 'skin', 'bg_image_attachment');

if($bg_image) {
	$body_bg_css = 'body { background: url('.$bg_image.') '.$bg_color.' '.$bg_image_repeat.' '.$bg_image_horizontal.' '.$bg_image_vertical.' '.$bg_image_attachment.' }'."\n";
}else {
	$body_bg_css = 'body {  background: '.$bg_color.' }'."\n";
}






// Skin CSS
$enable_custom_colors = twoot_get_frontend_func('opt', 'skin', 'custom_colors');
$content_bg_color = twoot_get_frontend_func('opt', 'skin', 'content_bg_color');
$text_color = twoot_get_frontend_func('opt', 'skin', 'text_color');
$link_color = twoot_get_frontend_func('opt', 'skin', 'link_color');
$hover_color = twoot_get_frontend_func('opt', 'skin', 'hover_color');
$hover_rgb_color = twoot_get_frontend_func('hex_to_rgb', $hover_color);
$hgroup_color = twoot_get_frontend_func('opt', 'skin', 'hgroup_color');
$button_text_color = twoot_get_frontend_func('opt', 'skin', 'button_text_color');
$button_text_hover_color = twoot_get_frontend_func('opt', 'skin', 'button_text_hover_color');
$button_bg_color = twoot_get_frontend_func('opt', 'skin', 'button_bg_color');
$button_bg_hover_color = twoot_get_frontend_func('opt', 'skin', 'button_bg_hover_color');
$topbar_link_color = twoot_get_frontend_func('opt', 'skin', 'topbar_link_color');
$topbar_hover_color = twoot_get_frontend_func('opt', 'skin', 'topbar_hover_color');
$topbar_border_color = twoot_get_frontend_func('opt', 'skin', 'topbar_border_color');
$topbar_bg_color = twoot_get_frontend_func('opt', 'skin', 'topbar_bg_color');
$top_widget_text_color = twoot_get_frontend_func('opt', 'skin', 'top_widget_text_color');
$top_widget_link_color = twoot_get_frontend_func('opt', 'skin', 'top_widget_link_color');
$top_widget_hover_color = twoot_get_frontend_func('opt', 'skin', 'top_widget_hover_color');
$top_widget_title_color = twoot_get_frontend_func('opt', 'skin', 'top_widget_title_color');
$top_widget_bg_color = twoot_get_frontend_func('opt', 'skin', 'top_widget_bg_color');
$bottom_widget_text_color = twoot_get_frontend_func('opt', 'skin', 'bottom_widget_text_color');
$bottom_widget_link_color = twoot_get_frontend_func('opt', 'skin', 'bottom_widget_link_color');
$bottom_widget_hover_color = twoot_get_frontend_func('opt', 'skin', 'bottom_widget_hover_color');
$bottom_widget_title_color = twoot_get_frontend_func('opt', 'skin', 'bottom_widget_title_color');
$bottom_widget_bg_color = twoot_get_frontend_func('opt', 'skin', 'bottom_widget_bg_color');
$bottom_menu_link_color = twoot_get_frontend_func('opt', 'skin', 'bottom_menu_link_color');
$bottom_menu_hover_color = twoot_get_frontend_func('opt', 'skin', 'bottom_menu_hover_color');
$bottom_menu_border_color = twoot_get_frontend_func('opt', 'skin', 'bottom_menu_border_color');
$bottom_menu_bg_color = twoot_get_frontend_func('opt', 'skin', 'bottom_menu_bg_color');
$copyright_text_color = twoot_get_frontend_func('opt', 'skin', 'copyright_text_color');
$copyright_link_color = twoot_get_frontend_func('opt', 'skin', 'copyright_link_color');
$copyright_hover_color = twoot_get_frontend_func('opt', 'skin', 'copyright_hover_color');
$copyright_border_color = twoot_get_frontend_func('opt', 'skin', 'copyright_border_color');
$copyright_bg_color = twoot_get_frontend_func('opt', 'skin', 'copyright_bg_color');

$custom_colors = '';
if($enable_custom_colors == true) {
$custom_colors = '
body .rows {
	background: '.$content_bg_color.';
}
body { 
	color: '.$text_color.';
}
a { 
	color: '.$link_color.'; 
}
a:hover { 
	color: '.$hover_color.'; 
}
h1, h2, h3, h4, h5, h6, dl dt, b, strong  { 
	color: '.$hgroup_color.'; 
}
.button-dark,
.button-active:hover,
.button-light:hover,
a.more-link:hover,
input[type="submit"],
button[type="submit"],
.shortcode-gmap .map-controls li a:hover,
.shortcode-social-icons a,
.the-grid-list.top-grid .filter-menu ul.filter li a,
.pagination .pagin a,
.shortcode-icon-box .icon-box-item .icon i,
.woo .quantity .plus,
.woo .quantity .minus {
	background: '.$button_bg_color.';
	color: '.$button_text_color.';
}
.button-active,
.button-dark:hover,
a.more-link,
input[type="submit"]:hover,
button[type="submit"]:hover,
.shortcode-gmap .map-controls li a,
.shortcode-social-icons a:hover,
.the-grid-list.top-grid .filter-menu ul.filter li a.active,
.the-grid-list.top-grid .filter-menu ul.filter li a:hover,
.pagination .pagin span.current,
.pagination .pagin a:hover,
.shortcode-icon-box .icon-box-item:hover .icon i,
.woo .quantity .plus:hover,
.woo .quantity .minus:hover {
	background: '.$button_bg_hover_color.';
	color: '.$button_text_hover_color.';
}
.site-topbar {
	background: '.$topbar_bg_color.';
}
.top-social-icons a {
	color: '.$topbar_link_color.';
}
.top-social-icons a:hover {
	color: #FFF;
	background: '.$topbar_hover_color.';
}
.top-search-bt {
	color: '.$topbar_link_color.';
	border-left: 1px solid '.$topbar_border_color.';
	border-right: 1px solid '.$topbar_border_color.';
}
#woo-user-menu ul li a,
.wpml-language-switcher .actived-language a,
.wpml-language-switcher ul li a {
	color: '.$topbar_link_color.';
}
#woo-user-menu ul li a:hover,
#woo-user-menu ul li.selected a,
.wpml-language-switcher .actived-language a:hover {
	color: '.$topbar_hover_color.';
}
#woo-user-menu ul li ul,
.wpml-language-switcher ul {
	background: '.$topbar_bg_color.';
}
#woo-user-menu ul li ul li a:hover,
.wpml-language-switcher ul li a:hover {
	background: '.$topbar_hover_color.';
	color: #FFF;
}
.top-widgets-area {
	background: '.$top_widget_bg_color.';
}
.top-widgets-area,
.top-widgets-area .widget-contact-details strong {
	color: '.$top_widget_text_color.';
}
.top-widgets-area a {
	color: '.$top_widget_link_color.';
}
.top-widgets-area a:hover {
	color: '.$top_widget_hover_color.'; 
}
.top-widgets-area .widget h3 {
	color: '.$top_widget_title_color.'; 
}
.top-widgets-area .widget_tag_cloud .tagcloud a,
.top-widgets-area .widget_product_tag_cloud .tagcloud a {
	border: 1px solid '.$top_widget_link_color.';
}
.top-widgets-area .widget_tag_cloud .tagcloud a:hover,
.top-widgets-area .widget_product_tag_cloud .tagcloud a:hover {
	border: 1px solid '.$top_widget_hover_color.';
}
.top-widgets-area .widget_calendar #wp-calendar,
.top-widgets-area .widget_calendar #wp-calendar th,
.top-widgets-area .widget_calendar #wp-calendar td {
	border-color: '.$top_widget_link_color.';
}
.top-widgets-area .widget-social-icons a {
	border: 1px solid '.$top_widget_link_color.';
}
.top-widgets-area .widget-social-icons a:hover {
	border: 1px solid '.$top_widget_hover_color.';
}
.site-bottom-menu {
	background: '.$bottom_menu_bg_color.';
}
.site-bottom-menu.has-line {
	border-bottom: 1px solid '.$bottom_menu_border_color.';
}
#bottom-menu ul li a {
	color: '.$bottom_menu_link_color.';
}
#bottom-menu ul li a:hover {
	color: '.$bottom_menu_hover_color.'; 
}
.bottom-widgets-area {
	background: '.$bottom_widget_bg_color.';
}
.bottom-widgets-area,
.bottom-widgets-area .widget-contact-details strong {
	color: '.$bottom_widget_text_color.';
}
.bottom-widgets-area a {
	color: '.$bottom_widget_link_color.';
}
.bottom-widgets-area a:hover {
	color: '.$bottom_widget_hover_color.'; 
}
.bottom-widgets-area .widget h3 {
	color: '.$bottom_widget_title_color.';
}
.bottom-widgets-area .widget_tag_cloud .tagcloud a,
.bottom-widgets-area .widget_product_tag_cloud .tagcloud a {
	border: 1px solid '.$bottom_widget_link_color.';
}
.bottom-widgets-area .widget_tag_cloud .tagcloud a:hover,
.bottom-widgets-area .widget_product_tag_cloud .tagcloud a:hover {
	border: 1px solid '.$bottom_widget_hover_color.';
}
.bottom-widgets-area .widget_calendar #wp-calendar,
.bottom-widgets-area .widget_calendar #wp-calendar th,
.bottom-widgets-area .widget_calendar #wp-calendar td {
	border-color: '.$bottom_widget_link_color.';
}
.bottom-widgets-area .widget-social-icons a {
	border: 1px solid '.$bottom_widget_link_color.';
}
.bottom-widgets-area .widget-social-icons a:hover {
	border: 1px solid '.$bottom_widget_hover_color.';
}
.site-bottom {
	background: '.$copyright_bg_color.';
	color: '.$copyright_text_color.';
}
.site-bottom.has-line {
	border-top: 1px solid '.$copyright_border_color.';
}
.site-bottom a {
	color: '.$copyright_link_color.'; 
}
.site-bottom a:hover {
	color: '.$copyright_hover_color.'; 
}
.bottom-social-icons a {
	color: '.$copyright_link_color.';
}
.bottom-social-icons a:hover {
	color: #FFF;
	background: '.$copyright_hover_color.';
}
::-moz-selection,
::selection { 
	color: #FFF; 
	background: '.$hover_color.';
}
.entry-content a { color: '.$hover_color.'; }
.entry-content a:hover { color: '.$link_color.'; }
.the-not-posts,
.nopassword {
	background: '.$hover_color.';
	color: #FFF;
}
.img-hover .zoom {
	background: '.$hover_color.';
	color: #FFF;
}
.img-hover .zoom:hover {
	box-shadow: 0 0 0 0 rgba('.$hover_rgb_color.',0.5);
	-o-box-shadow: 0 0 0 0 rgba('.$hover_rgb_color.',0.5);
	-moz-box-shadow: 0 0 0 0 rgba('.$hover_rgb_color.',0.5);
	-webkit-border-shadow: 0 0 0 0 rgba('.$hover_rgb_color.',0.5);
}
a.top-widgets-area-switch {
	background-color: rgba('.$hover_rgb_color.',1);
	color: #FFF;
}
a.top-widgets-area-switch:hover {
	background-color: rgba('.$hover_rgb_color.',0.9); 
}
.ie8 a.top-widgets-area-switch {
	background-color: '.$hover_color.';
	color: #FFF;
}
.nicescroll-rails div {
	background: '.$hover_color.' !important;
}
.top-search-wrapper {
	background: '.$hover_color.';
}
#top-menu ul li.selected a,
#top-menu ul li.current-page a,
#top-menu ul li a:hover,
#top-menu ul li ul li a:hover {
	color: '.$hover_color.'; 
}
#top-menu ul li ul {
	border-top: 3px solid '.$hover_color.';
}
.side-widgets-area .widget_tag_cloud .tagcloud a:hover,
.side-widgets-area .widget-social-icons a:hover,
.side-widgets-area .widget_product_tag_cloud .tagcloud a:hover {
	border: 1px solid '.$hover_color.';
}
.side-widgets-area .widget_nav_menu ul li a:hover,
.shortcode-tab .tabs li.tab a:hover,
.shortcode-left-tab .tabs li.tab a:hover,
.shortcode-team-members .role,
.shortcode-testimonial-carousel .testimonial-carousel li .role,
.shortcode-testimonial .role,
.shortcode-progress-bar .title span,
.shortcode-number .count,
.related-posts li .entry-meta .date a:hover,
.the-grid-list ul li .item-head .cats,
.the-grid-list ul li .item-head .cats a,
.post-blog .post-item .entry-meta a:hover,
.post-full-blog .the-blog-list li.post-item header.entry-meta a:hover,
.post-archive ul li.post-item .entry-meta .meta a:hover,
.shortcode-latest-blog .entry-box .cats-link a:hover,
.post-search ul li.post-item header.entry-meta a:hover,
.post-portfolio .entry-meta .row a:hover,
.commentlist li.comment .comment-meta .fn a:hover,
.commentlist li.comment .comment-awaiting-moderation,
#woo-mini-cart .shopping-cart a:hover,
.woo ul.products li.product-item .item-head .cats,
.woo ul.products li.product-item .item-head .cats a,
.woo ul.products li.product-item .item-head .price del,
.woo ul.products li.product-item .item-head .price del .amount,
.woo .entry-summary .summary-content .price del,
.woo .entry-summary .summary-content .price del .amount,
.woo .entry-summary .summary-content .product_meta .sku,
.woo .entry-summary .summary-content .product_meta a:hover,
.woo .woocommerce-tabs .tabs li a:hover,
.woo .entry-purchase-summary .total .amount {
	color: '.$hover_color.';
}
.shortcode-price-table .table-item.active .price,
.shortcode-accordion .acc-item .tog.active .icon,
.shortcode-accordion .acc-item .tog:hover .icon,
.shortcode-toggle .tog-item .tog.active .icon,
.shortcode-toggle .tog-item .tog:hover .icon,
.contact-page .wpcf7 span.wpcf7-not-valid-tip,
.contact-page .error-message,
.contact-page div.wpcf7-validation-errors,
.contact-page div.wpcf7-mail-sent-ng,
.contact-page div.wpcf7-spam-blocked,
#page-coming-soon .bottom-social-icons a:hover,
.commentlist li.comment .comment-action a:hover,
.price_slider_wrapper .ui-widget-header {
	background: '.$hover_color.';
}
.shortcode-testimonial-carousel .bx-wrapper .bx-controls-direction a:hover,
.shortcode-twitter-carousel .bx-wrapper .bx-controls-direction a:hover,
.the-carousel-list .bx-wrapper .bx-controls-direction a:hover,
.post-pagenation ul li a:hover {
	border: 2px solid '.$hover_color.';
	color: '.$hover_color.';
}
.shortcode-latest-blog .entry-date,
a.responsive-mini-cart em.item-counts,
.woo ul.products li.product-item .onsale,
.woo .entry-product-images .onsale {
	background: '.$hover_color.';
	color: #FFF;
}
';
}







return  <<<CSS
/*This is the custom css via theme options.*/
.site-logo { 
	padding-top: {$logo_pt}px; 
	padding-bottom: {$logo_pb}px; 
}
body,
button, input, select, textarea { 
	font-family: '{$ff_body}', Arial, Helvetica, serif, sans-serif;
	font-size: {$fs_body}px;
	font-size: {$fs_body_rem}rem;
}
.site-logo #logo h1.title {
	font-family: '{$ff_logo}', Georgia, Times, serif, sans-serif;
	font-size: {$fs_logo}px;
	font-size: {$fs_logo_rem}rem;
	font-weight: {$fw_logo};
	text-transform: {$tt_logo};
}
#top-menu ul li a,
.responsive-menu ul li a {
	font-family: '{$ff_menu}', Georgia, Times, serif, sans-serif;
	font-size: {$fs_menu}px;
	font-size: {$fs_menu_rem}rem;
	font-weight: {$fw_menu};
	text-transform: {$tt_menu};
}
#top-menu ul li ul li a,
.responsive-menu ul li ul li a {
	font-family: '{$ff_sub_menu}', Arial, Helvetica, serif, sans-serif;
	font-size: {$fs_sub_menu}px;
	font-size: {$fs_sub_menu_rem}rem;
	font-weight: {$fw_sub_menu};
	text-transform: {$tt_sub_menu};
}
h1 {
	font-family: '{$ff_h1}', Georgia, Times, serif, sans-serif;
	font-size: {$fs_h1}px;
	font-size: {$fs_h1_rem}rem;
	font-weight: {$fw_h1};
	text-transform: {$tt_h1};
}
h2 {
	font-family: '{$ff_h2}', Georgia, Times, serif, sans-serif;
	font-size: {$fs_h2}px;
	font-size: {$fs_h2_rem}rem;
	font-weight: {$fw_h2};
	text-transform: {$tt_h2};
}
h3 {
	font-family: '{$ff_h3}', Georgia, Times, serif, sans-serif;
	font-size: {$fs_h3}px;
	font-size: {$fs_h3_rem}rem;
	font-weight: {$fw_h3};
	text-transform: {$tt_h3};
}
h4 {
	font-family: '{$ff_h4}', Georgia, Times, serif, sans-serif;
	font-size: {$fs_h4}px;
	font-size: {$fs_h4_rem}rem;
	font-weight: {$fw_h4};
	text-transform: {$tt_h4};
}
h5 {
	font-family: '{$ff_h5}', Georgia, Times, serif, sans-serif;
	font-size: {$fs_h5}px;
	font-size: {$fs_h5_rem}rem;
	font-weight: {$fw_h5};
	text-transform: {$tt_h5};
}
h6 {
	font-family: '{$ff_h6}', Georgia, Times, serif, sans-serif;
	font-size: {$fs_h6}px;
	font-size: {$fs_h6_rem}rem;
	font-weight: {$fw_h6};
	text-transform: {$tt_h6};
}
#bottom-menu ul li a {
	font-family: '{$ff_bottom_menu}', Georgia, Times, serif, sans-serif;
	font-size: {$fs_bottom_menu}px;
	font-size: {$fs_bottom_menu_rem}rem;
	font-weight: {$fw_bottom_menu};
	text-transform: {$tt_bottom_menu};
}
.site-footer .site-copy {
	font-family: '{$ff_copyright}', Georgia, Times, serif, sans-serif;
	font-size: {$fs_copyright}px;
	font-size: {$fs_copyright_rem}rem;
	font-weight: {$fw_copyright};
	text-transform: {$tt_copyright};
}
.widget h3 {
	font-family: '{$ff_widget_title}', Georgia, Times, serif, sans-serif;
	font-size: {$fs_widget_title}px;
	font-size: {$fs_widget_title_rem}rem;
	font-weight: {$fw_widget_title};
	text-transform: {$tt_widget_title};
}
.shortcode-team-members h3.name,
.shortcode-testimonial-carousel .testimonial-carousel li h3.name,
.shortcode-testimonial h3.name,
.shortcode-latest-blog h3.title,
.the-grid-list ul li .item-head h3.title,
.the-blog-list ul li.post-item .item-content .title,
.post-blog .post-item h3.entry-title,
.post-full-blog .the-blog-list li.post-item .entry-title,
.post-portfolio h1.entry-title,
.woo ul.products li .item-head h3.title,
.woo ul.products li.product-category  h3.title,
.woo .entry-summary h1.entry-title {
	font-family: '{$ff_item_title}', Georgia, Times, serif, sans-serif;
}
.shortcode-latest-blog h5.sub-title,
.the-carousel-list .carousel-title,
.related-posts .sub-title,
#comments #comments-title,
#respond #reply-title,
.woo .woocommerce-tabs h2.entry-title,
.woo .woocommerce-cart-table table th,
.woo .woocommerce-cart-table .cart_totals h2,
.woo .woocommerce-cart-table .coupon h3,
.woo .cart-collaterals h2,
.woo .checkout-customer h3,
.woo .entry-purchase-summary h2,
.woo .create-new-account h3,
.woo .billing-form h3,
.woo .shipping-form h3,
.woo .register-form h2,
.woo .login-form h2,
.woo .user-center-wrap h2.title,
.woo .edit-address h3 {
	font-family: '{$ff_section_title}', Georgia, Times, serif, sans-serif;
	font-size: {$fs_section_title}px;
	font-size: {$fs_section_title_rem}rem;
	font-weight: {$fw_section_title};
	text-transform: {$tt_section_title};
}
.woo ul.products li.product-item .item-head .price .amount,
.woo .entry-summary .price .amount,
.woo .woocommerce-cart-table table td.product-subtotal {
	font-family: '{$ff_woo_amount}', Helvetica, Arial, serif, sans-serif;
}
$block_css
$body_bg_css
$custom_colors
$custom_css
CSS;
?>