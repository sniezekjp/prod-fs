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

	<?php echo twoot_generator('page_title', 'archive'); ?>

	<?php
		switch (twoot_get_frontend_func('opt', 'opt', 'search_type')) 
		{
			case '1': $types=array('post', 'page', 'portfolio', 'product'); break;
			case '2': $types=array('post', 'page'); break;
			case '3': $types=array('post'); break;
			case '4': $types=array('page'); break;
			case '5': $types=array('portfolio'); break;
			case '6': $types=array('product'); break;
		}

		// Get Query
		$query = new Twoot_Query(array(
			'counts' => 10,
			'post_type'	=> $types
		));

		$do_query = new WP_Query($query->do_global_query());
	?>

	<?php if ( $do_query || $do_query->posts ) : ?>

		<div class="post-search">
			<ul>
			<?php while ( $do_query->have_posts() ) : $do_query->the_post(); ?>
				<li class="post-item">
				<?php echo twoot_generator( 'load_template', 'loop-search' ); ?>
				</li>
			<?php endwhile; ?>
			</ul>
		</div>

		<?php echo twoot_generator('pagination', $do_query); ?>

	<?php else : ?>

		<div class="the-not-posts"><?php esc_attr_e('Sorry, there is no posts in for your query.', 'Twoot'); ?></div>

	<?php endif; ?>

	</div>
</article>
<!--end #primary-->

<?php echo twoot_generator('sidebar', 'search', 'right'); ?>

</div>
<!--end #content-->

<?php get_footer(); ?>