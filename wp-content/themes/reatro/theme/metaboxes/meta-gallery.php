<?php
/*
 * @author    Daan Vos de Wael
 * @copyright Copyright (c) 2013, Daan Vos de Wael, http://www.daanvosdewael.com
 * @license   http://en.wikipedia.org/wiki/MIT_License The MIT License
 * https://github.com/DaanVos/gallery-metabox
*/

function add_gallery_metabox() {
	add_meta_box(
	  'twoot-metabox-gallery',
	  esc_attr__('Gallery', 'Twoot'),
	  'gallery_meta_callback',
	  'post',
	  'normal',
	  'high'
	);

	add_meta_box(
	  'twoot-metabox-gallery',
	  esc_attr__('Gallery', 'Twoot'),
	  'gallery_meta_callback',
	  'portfolio',
	  'normal',
	  'high'
	);
}
add_action('add_meta_boxes', 'add_gallery_metabox');



function gallery_meta_callback($post) {
	wp_nonce_field( basename(__FILE__), 'gallery_meta_nonce' );
	$ids = get_post_meta($post->ID, TWOOT_PREFIX.'gallery_id', true);
	?>
	<table class="form-table">
    <tr><td>
	<div class="theme-meta-gallery">
	<div class="add-image"><a class="gallery-add button" href="#" data-uploader-title="Add image(s) to gallery" data-uploader-button-text="Add image(s)">Add image(s)</a></div>
	<ul id="metabox-gallery-list" class="clearfix">
	<?php if ($ids) : foreach ($ids as $key => $value) : $image = wp_get_attachment_image_src($value, 'thumbnail'); ?>
		<li>
		<input type="hidden" name="<?php echo TWOOT_PREFIX; ?>gallery_id[<?php echo $key; ?>]" value="<?php echo $value; ?>">
		<img class="image-preview" src="<?php echo $image[0]; ?>">
		<a class="change-image" href="#" data-uploader-title="Change image" data-uploader-button-text="Change image">Change image</a>
		<a class="remove-image" href="#">Remove image</a>
		</li>
	<?php endforeach; endif; ?>
	</ul>
	</div>
	</td></tr>
    </table>
	<?php
}




function gallery_meta_save($post_id) {
	if (!isset($_POST['gallery_meta_nonce']) || !wp_verify_nonce($_POST['gallery_meta_nonce'], basename(__FILE__))) return;

	if (!current_user_can('edit_post', $post_id)) return;

	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;

	if(isset($_POST[TWOOT_PREFIX.'gallery_id'])) {
	  update_post_meta($post_id, TWOOT_PREFIX.'gallery_id', $_POST[TWOOT_PREFIX.'gallery_id']);
	} else {
	  delete_post_meta($post_id, TWOOT_PREFIX.'gallery_id');
	}
}
add_action('save_post', 'gallery_meta_save');
?>