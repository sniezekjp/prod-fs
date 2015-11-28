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
<header class="entry-meta">
	<span class="date-link">
		<?php printf( __( 'On: <a href="%1$s" title="%2$s" rel="bookmark">%3$s</a>', 'Twoot' ), esc_url( get_permalink() ), esc_attr( get_the_time() ), get_the_time( get_option('date_format') ) ); ?>
	</span>
</header>

<h3 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a></h3>

<article class="entry-content clearfix">
	<?php echo twoot_generator('the_excerpt', 300, true, '...'); ?>
</article>