<?php
/**
 * Template Name: Blog Full Width
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

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<div class="site-content container pt pb clearfix">

<article id="primary-wrapper" class="twelve">
	<div class="inner">

	<?php if (have_posts()) : the_post(); ?>
		<?php if(get_the_content()) : ?>
		<div class="post-content">
			<?php the_content(); ?>
		</div>
		<?php endif; ?>
	<?php endif; ?>

	<?php
		$q = new Twoot_Template_Blog(array(
			'counts' => twoot_get_frontend_func('opt', 'opt', 'blog_counts'),
			'cats'=> '',
			'posts' => '',
			'order' => 'DESC',
			'orderby' => 'date',
			'post_type'	=> 'post',
			'taxonomy'  => 'category'
		));
		echo $q->full_blog();
	?>

	</div>
</article>
<!--end #primary-->

</div>
</div>
<!--end #content-->

<?php get_footer(); ?>