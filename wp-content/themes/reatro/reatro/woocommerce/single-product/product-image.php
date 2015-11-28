<?php
/**
 * Single Product Image
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $post, $woocommerce, $product;

$attachment_ids = $product->get_gallery_attachment_ids();
?>
<?php if ( $attachment_ids ) : ?>
<?php
$count = 0;
$pager_count = -1;
$image_opt=get_option('shop_single_image_size');
?>
<div class="images">

<div class="bx-slider post-gallery-wrapper">
<ul class="post-gallery" class="clearfix">
<?php
	foreach ($attachment_ids as $id) {
		$count++;
		$class='class="fancybox-gallery"';
		$rel=count($attachment_ids)>1? ' rel="gallery-'.get_the_ID().'"':'';
		$caption=trim(strip_tags(get_post($id)->post_excerpt));
		$tilte=$caption!=false? 'title="'.$caption.'"':'';
		$alt = trim(strip_tags(get_post_meta($id, '_wp_attachment_image_alt', true)));

		echo '<li class="img-preload img-hover">';
		echo '<a href="'.twoot_get_frontend_func('thumbnail_url', $id).'" '.$class.$rel.$tilte.'>'.twoot_get_frontend_func('full_thumbnail', $id, $alt, $size = 'shop_single').'<div class="overlay"></div></a>';
		echo '</li>';
	}
?>
</ul>
</div>

<div class="post-gallery-pager">
<ul id="bx-gallery-pager">
<?php
	foreach ($attachment_ids as $id) {
		$pager_count++;
		$alt = trim(strip_tags(get_post_meta($id, '_wp_attachment_image_alt', true)));

		echo '<li class="img-hover"><a data-slide-index="'.$pager_count.'" href="">'.twoot_get_frontend_func('full_thumbnail', $id, $alt, $size = 'shop_thumbnail').'</a></li>';
	}
?>
</ul>
</div>

</div>
<?php endif; ?>
