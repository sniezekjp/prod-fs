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
	<a href="<?php the_permalink(); ?>"><?php echo get_the_post_thumbnail( $post->ID, 'thumbnail' ); ?>
	<div class="overlay"></div>
	</a>

	<section class="entry-date">
		<?php echo '<span class="day">'.get_the_time('d').'</span>'; ?>
		<?php echo '<span class="month">'.get_the_time('M').'</span>'; ?>
	</section>
</figure>
<?php endif; ?>

<section class="entry-box">
	<h3 class="title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
	<?php if($categories_list=get_the_category_list( __( ', ', 'Twoot' ) )) : ?>
	<div class="cats-link">
		<?php printf( __( 'Posted in: %1$s', 'Twoot' ), $categories_list ); ?>
	</div>
	<?php endif; ?>
	<div class="desc"><?php echo twoot_generator('the_excerpt', 100, true, '...'); ?></div>
</section>