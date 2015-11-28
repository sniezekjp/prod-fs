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
<?php get_header(); ?>

<div class="site-content container pt pb clearfix">

<article id="primary-wrapper" class="column eight">
	<div class="inner">

	<?php if ( have_posts() ) : ?>

		<div class="post-blog">
			<ul class="the-blog-list side-blog">
			<?php while ( have_posts() ) : the_post(); ?>
				<li class="post-item">
				<?php echo twoot_generator( 'load_template', 'loop-blog-default' ); ?>
				</li>
			<?php endwhile; ?>
			</ul>
		</div>

		<?php echo twoot_generator('pagination'); ?>

	<?php else : ?>

		<div class="the-not-posts"><?php esc_attr_e('Sorry, there is no posts in the current categories, please add some items in the dashboard!', 'Twoot'); ?></div>

	<?php endif; ?>

	</div>
</article>
<!--end #primary-->

<?php get_sidebar(); ?>

</div>
<!--end #content-->

<?php get_footer(); ?>