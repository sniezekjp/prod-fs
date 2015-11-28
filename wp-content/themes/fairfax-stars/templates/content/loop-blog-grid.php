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

<?php if(has_post_thumbnail()) : ?>
<figure class="featured-image img-preload img-hover">
	<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
	<?php //echo twoot_get_frontend_func('resize_thumbnail', get_post_thumbnail_id(), get_the_title(), 460, 335, true); ?>
	<?php the_post_thumbnail(array(460, 335)); ?>
	<div class="overlay"></div>
	</a>
</figure>
<?php endif; ?>
<header class="item-head item-head-blog">
	<div class="date"><?php echo get_the_time( get_option('date_format') ); ?></div>
	<h3 class="title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
	<div class="desc"><?php echo twoot_generator('the_excerpt', 90, true, '...'); ?></div>
</header>