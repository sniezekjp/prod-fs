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
$link = twoot_get_frontend_func('meta', 'post_link')=='custom' && twoot_get_frontend_func('meta', 'custom_url')!=false? twoot_get_frontend_func('meta', 'custom_url'):get_permalink();
$type = twoot_get_frontend_func('meta', 'type')!='standard' && twoot_get_frontend_func('meta', 'type')!='video'? 'gallery':twoot_get_frontend_func('meta', 'type');
?>

<?php if(has_post_thumbnail()) : ?>
<figure class="featured-image img-preload img-hover">
	<a href="<?php echo $link; ?>" title="<?php the_title_attribute(); ?>">
	<?php echo twoot_get_frontend_func('resize_thumbnail', get_post_thumbnail_id(), get_the_title(), 460, 335, true); ?>
	<div class="overlay"></div>
	</a>
	<?php echo twoot_generator('zoom', $type, 'carousel'); ?>
</figure>
<?php endif; ?>
<header class="item-head">
	<?php echo get_the_term_list( get_the_ID(), 'portfolio_cat', '<div class="cats meta">', ', ', '</div>' ); ?>
	<h3 class="title"><a href="<?php echo $link; ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
</header>