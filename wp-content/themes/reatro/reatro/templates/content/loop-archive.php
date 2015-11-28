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
	<?php the_post_thumbnail('thumbnail'); ?>
	<div class="overlay"></div>
	</a>
</figure>
<?php endif; ?>

<section class="entry-meta">
	<div class="title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></div>
	<div class="meta">
		<?php if($categories_list=get_the_category_list( __( ', ', 'Twoot' ) )) : ?>
		<span class="cats-link">
			<?php printf( __( 'Posted in: %1$s', 'Twoot' ), $categories_list ); ?>
		</span>
		<?php endif; ?>
		<span class="date-link">
			<?php printf( __( 'On: <a href="%1$s" title="%2$s" rel="bookmark">%3$s</a>', 'Twoot' ), esc_url( get_permalink() ), esc_attr( get_the_time() ), get_the_time( get_option('date_format') ) ); ?>
		</span>
	</div>
</section>