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
$format=get_post_format() === false? 'standard':get_post_format();
?>
<h3 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
<header class="entry-meta">
	<?php if($categories_list=get_the_category_list( __( ', ', 'Twoot' ) )) : ?>
	<span class="cats-link">
		<?php printf( __( 'Posted in: %1$s', 'Twoot' ), $categories_list ); ?>
	</span>
	<?php endif; ?>
	<span class="date-link">
		<?php printf( __( 'On: <a href="%1$s" title="%2$s" rel="bookmark">%3$s</a>', 'Twoot' ), esc_url( get_permalink() ), esc_attr( get_the_time() ), get_the_time( get_option('date_format') ) ); ?>
	</span>
	<?php edit_post_link( __( 'Edit', 'Twoot' ), '<span class="edit-link">', '</span>' ); ?>
</header>
<article class="entry-content clearfix">
	<?php echo twoot_generator( 'load_template', 'format-' . $format ); ?>
	<?php echo twoot_generator('post_excerpt', 300, true, '...', __('Continue reading &raquo;', 'Twoot')); ?>
</article>
<footer class="entry-meta">
	<?php if($tags_list = get_the_tag_list( '', __( ', ', 'Twoot' ) )) : ?>
	<span class="tags-link">
		<?php printf( __( 'Tags: %1$s', 'Twoot' ), $tags_list ); ?>
	</span>
	<?php endif; ?>
</footer>