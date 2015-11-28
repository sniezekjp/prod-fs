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
?>
<?php if( has_post_thumbnail() ) : ?>
<div class="post-image-wrapper">
	<figure class="img-preload img-hover">
	<?php if(!is_singular('post')) : ?>
		<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark">
			<?php //echo twoot_get_frontend_func('resize_thumbnail', get_post_thumbnail_id(), get_the_title(), 620, 350, true); ?>
			<?php the_post_thumbnail(array(620, 350)); ?>
			<div class="overlay"></div>
		</a>
	<?php else : ?>
		<?php the_post_thumbnail(array(620, 350)); ?>
	<?php endif; ?>
	</figure>
</div>
<?php endif; ?>